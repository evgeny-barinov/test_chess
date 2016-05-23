<?php

namespace Chess;


class FigureKing implements FigureInterface
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
        return 'king';
    }
}
