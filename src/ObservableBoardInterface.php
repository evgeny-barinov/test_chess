<?php

namespace Chess;


interface ObservableBoardInterface extends BoardInterface
{
    /**
     * @param BoardObserverInterface $observer
     * @param null $figureId
     * @return mixed
     */
    public function addObserver(BoardObserverInterface $observer, $figureId = null);
}
