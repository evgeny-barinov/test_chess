<?php

namespace Chess;


class Board implements ObservableBoardInterface
{
    protected $data = [];

    protected $id;

    protected $observers = [];

    protected $anyObservers = [];

    public function __construct($boardId)
    {
        $this->id = $boardId;
    }

    public function add(FigureInterface $figure, $x, $y)
    {
        if (!empty($this->data[$x][$y])) {
            throw new Exception("Can't add figure {$figure->getId()} to [$x, $y] position");
        }

        $this->data[$x][$y] = $figure;
        $this->onAdd($figure);
    }

    /**
     * @param $figureId
     * @param $x
     * @param $y
     */
    public function del($figureId, $x, $y)
    {
        unset($this->data[$x][$y]);
    }

    /**
     * @param $figureId
     * @param $x
     * @param $y
     * @param $x1
     * @param $y1
     * @throws Exception
     */
    public function move($figureId, $x, $y, $x1, $y1)
    {
        /**
         * @var $figure FigureInterface
         */
        $figure = isset($this->data[$x][$y]) ? $this->data[$x][$y] : false;

        if (!$figure || $figure->getId() !== $figureId) {
            throw new Exception("Incorrect figure $figureId in [$x, $y]");
        }
        
        if (!empty($this->data[$x1][$y1]) || !$figure->move($x1, $y1)) {
            throw new Exception("Can't move figure $figureId to [$x1, $y1] position");
        }

        $this->add($figure, $x1, $y1);
        $this->del($figureId, $x, $y);
    }

    public function save(StorageInterface $storage)
    {
        $storage->set($this->id, $this->data);
    }

    public function restore(StorageInterface $storage)
    {
        $this->data = $storage->get($this->id);
    }

    /**
     * @param BoardObserverInterface $observer
     * @param string|null $figureId
     * @return null
     */
    public function addObserver(BoardObserverInterface $observer, $figureId = null)
    {
        if (is_null($figureId)) {
            $this->anyObservers[] = $observer;
        } else {
            $this->observers[$figureId][] = $observer;
        }
    }

    protected function onAdd(FigureInterface $figure)
    {
        /**
         * @var BoardObserverInterface $observer
         */
        $observers = $this->anyObservers;

        if (!empty($this->observers[$figure->getId()])) {
            $observers = array_merge($observers, $this->observers[$figure->getId()]);
        }

        foreach ($observers as $observer) {
            $observer->onAdd($figure);
        }
    }

}
