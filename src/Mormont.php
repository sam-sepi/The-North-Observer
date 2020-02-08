<?php

namespace North;

use North\House;

class Mormont extends House
{
    protected $members = [
        'Maege',
        'Dacey',
        'Alysane',
        'Lyra',
        'Joelle',
        'Lyanna',
        'Jeor',
        'Jorah'
    ];

    public function __construct()
    {
        parent::__construct('Mormont');
    }
}
