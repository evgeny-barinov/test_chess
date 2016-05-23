<?php

namespace Chess;


class FigurePawn implements FigureInterface
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
        return 'pawn';
    }
}
