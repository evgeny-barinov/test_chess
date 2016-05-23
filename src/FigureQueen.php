<?php

namespace Chess;


class FigureQueen implements FigureInterface
{
    /**
     * @inheritdoc
     */
    public function move($x, $y) 
    {
         
    }

    /**
     * @inheritdoc
     */
    public function getId()
    {
        return 'queen';
    }
}
