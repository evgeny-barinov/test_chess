<?php

namespace Chess;


interface FigureInterface
{
    /**
     * implement figure move algo
     * x, y current coords
     * @param  $x
     * @param  $y
     * @return bool return true if figure can move to $x, $y, else return false
     */
    public function move($x, $y);
    
    public function getId();
}
