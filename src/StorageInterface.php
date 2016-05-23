<?php

namespace Chess;


interface StorageInterface
{
    /**
     * @param $id
     * @param $data
     * @return mixed
     */
    public function set($id, $data);

    /**
     * @param $id
     * @return mixed
     */
    public function get($id);
}