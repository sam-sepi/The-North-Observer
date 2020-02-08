<?php

namespace North;

abstract class House implements \SplObserver
{
    protected $house;
    protected $deaths = array();
    protected $members = array();
    protected $alive = array();
    protected $dead = array();

    public function __construct(string $house)
    {
        $this->house = $house;
    }

    /**
     * Observer interface
     * @param  \SplSubject $subject
     * @return void
     */
    public function update(\SplSubject $subject)
    {
        $deaths = $subject;
        $this->deaths = $deaths->getDeaths();

        $this->memberFate();
    }

    /**
     * getMembers
     * @return array
     */
    public function getMembers(): array
    {
        return $this->members;
    }

    /**
     * getHouse
     * @return string
     */
    public function getHouse(): string
    {
        return $this->house;
    }

    /**
     * memberFate
     */
    private function memberFate()
    {
        for($i=0; $i < count($this->deaths); $i++)
        {
            if($this->deaths[$i]['house'] == $this->house)
            {
                $members[$i] = $this->deaths[$i]['name'];
            }
        }

        $this->alive = array_diff($this->members, $members);
        $this->dead = array_intersect($this->members, $members);
    }

    /**
     * getAlive
     * @return array
     */
    public function getAlive(): array
    {
        return $this->alive;
    }

    /**
     * getDead
     * @return array
     */
    public function getDead(): array
    {
        return $this->dead;
    }
}