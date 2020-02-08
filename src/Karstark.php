<?php

namespace North;

use North\House;

class Karstark extends House
{
    protected $members = [

        'Rickard',
        'Harrion',
        'Torrhen',
        'Eddard',
        'Alys',
        'Arnolf',
        'Cregan',
        'Arthor'
    ];

    /**
     * __construct
     */
    public function __construct()
    {
        parent::__construct('Karstark');
    }

}