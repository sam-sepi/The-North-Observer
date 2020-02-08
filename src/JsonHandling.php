<?php

namespace North;

class JsonHandling
{
    private $path = __DIR__ . '/json/';

    /**
     * Decode
     * @param  string $jsondata
     * @return obj.
     */
    public function decode($jsondata): array
    {
        $data = json_decode($jsondata, true);

        if($data) 
        {
            return $data;
        }
    }

    /**
     * Read
     * @param  string $file
     * @return array
     */
    public function readAndDecode(string $file)
    {
        return $this->decode(file_get_contents($this->path . $file));
    }

    /**
     * Write
     * @param  string $file 
     * @return void
     */
    public function writeAndEncode(array $data, string $file)
    { 
        $file = $this->path . $file;

        if(is_dir($this->path)) 
        {
            $fh  = fopen($file, 'w+') or die("Error fopen function");
            fwrite($fh, json_encode($data));
            fclose($fh);
            
        }else {
            
            if(mkdir($this->path, 0777) === true) 
            {
                $this->writeAndEncode($data, $file);
            
            }else {
                
                die('Error mkdir Vd. Logger::writeLogTxt');
            }
        }
    }

}