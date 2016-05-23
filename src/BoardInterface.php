<?php

namespace Chess;


interface BoardInterface
{
    public function add(FigureInterface $figure, $x, $y);

    public function del($figureId, $x, $y);

    public function move($figureId, $x, $y, $x1, $y1);
    
    public function save(StorageInterface $storage);
    
    public function restore(StorageInterface $storage);
}
