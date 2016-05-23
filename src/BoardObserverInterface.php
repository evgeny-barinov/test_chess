<?php

namespace Chess;


interface BoardObserverInterface
{
    public function onAdd(FigureInterface $figure);
}