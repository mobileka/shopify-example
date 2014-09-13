<?php namespace Mobileka\Contracts\Repositories;

/**
 * Interface HookRepositoryInterface
 * @package Mobileka\Contracts\Repositories
 */
interface HookRepositoryInterface
{
    /**
     * @param  \Mobileka\Store $store
     * @return array
     */
    public function getCollection($store);

    /**
     * @param \Mobileka\Store $store
     * @param array           $input
     * @return bool
     */
    public function create($store, $input = []);

    /**
     * @param  \Mobileka\Store $store
     * @param  int             $id
     * @return void
     */
    public function delete($store, $id);
}
