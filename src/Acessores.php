<?php

namespace Agenda;

class Acessores
{
    /**
     * Set attribute
     * @param $key
     * @param $value
     */
    public function set($key , $value)
    {
        $this->$key = $value;
    }

    /**
     * Get data for key
     *
     * @param $key
     * @return mixed The value
     */
    public function get($key)
    {
        return $this->$key;
    }
}