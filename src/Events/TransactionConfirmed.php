<?php

namespace PostMix\LaravelBitaps\Events;


class TransactionConfirmed
{
    public $data;
    
    public function __construct($data)
    {
        $this->data = $data;
    }  
    
}