<?php namespace Mobileka\Repositories;

/**
 * Class BaseRepository
 * @package Mobileka\Repositories
 */
abstract class BaseRepository
{
    /**
     * @return \Illuminate\Database\Eloquent\Model
     */
    abstract public function getModel();
}
