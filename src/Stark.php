<?php

namespace North;

use North\House;

class Stark extends House
{
    protected $members = [

        'Eddard',
        'Catelyn',
        'Robb',
        'Sansa',
        'Arya',
        'Brandon',
        'Rickon',
        'Benjen'
    ];

    /**
     * __construct
     */
    public function __construct()
    {
        parent::__construct('Stark');
    }

}