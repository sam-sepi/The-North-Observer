<?php

namespace North;

class Deaths implements \SplSubject, \JsonSerializable
{

    public $deaths = array();
    private $observers = array();

    /**
     * __construct
     * @param string $file
     */
    public function __construct(string $file = null)
    {
        $json = new JsonHandling();
        
        $this->file = is_string($file) ? $file : 'deaths.json';

        $path = __DIR__ . '/json/';

        if(file_exists($path . $this->file))
        {
            $this->deaths = $json->readAndDecode($this->file);
        }

        $this->observers = new \SplObjectStorage();
    }

    /**
     * addDeaths
     * @param  string $name
     * @param  string $house
     * @param  string $book
     */
    public function addDeath(string $name, string $house, string $book)
    {
        $death = [
            'name' => $name,
            'house' => $house,
            'book' => $book
        ];
        
        if(!in_array($death, $this->deaths)) 
        {
            array_push($this->deaths, $death);
        }
        
        $json = new JsonHandling();
        $json->writeAndEncode($this->deaths, $this->file);
    }

    /**
     * attach
     * @param  \SplObserver $observer
     * @return void
     */
    public function attach(\SplObserver $observer)
    {
        $this->observers->attach($observer);
    }

    /**
     * detach
     * @param  \SplObserver $observer
     * @return void
     */
    public function detach(\SplObserver $observer)
    {
        $this->observers->detach($observer);
    }
    
    /**
     * notify
     */
    public function notify()
    {
        foreach ($this->observers as $observer) 
        {
            $observer->update($this);
        }
    }

    /**
     * getDeaths
     * @return array
     */
    public function getDeaths(): array
    {
        return $this->deaths;
    }

    /**
     * jsonSerialize
     * @return array
     */
    public function jsonSerialize(): array
    {
        return $this->deaths;
    }
}
