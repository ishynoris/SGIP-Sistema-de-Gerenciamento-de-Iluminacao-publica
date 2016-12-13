<?php

abstract class Controller
{
    private $array;

    function __construct($array)
    {
        $this->array = $array;
    }

    public abstract function triggerInput($input);

    public function getInputAction(){

        foreach ($this->array as $ïnput) {
            if (isset($_POST[$ïnput])) {
                return $ïnput;
            }
        }
    }
}