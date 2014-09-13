<?php namespace Mobileka\Repositories;

use Mobileka\Contracts\Repositories\HookRepositoryInterface;
use Mobileka\Hook;
use Mobileka\Store;

/**
 * Class ApiHookRepository
 * @package Mobileka\Repositories
 */
class ApiHookRepository extends BaseRepository implements HookRepositoryInterface
{
    /**
     * @return Hook
     */
    public function getModel()
    {
        return new Hook;
    }

    /**
     * @param Store $store
     * @return array
     */
    public function getCollection($store)
    {
        return $this->getModel()->setStore($store)->all();
    }

    /**
     * @param Store $store
     * @param array $input
     * @return bool
     */
    public function create($store, $input = [])
    {
        return $this->getModel()->setStore($store)->create($input);
    }

    /**
     * @param Store $store
     * @param int   $id
     * @return void
     */
    public function delete($store, $id)
    {
        $this->getModel()->setStore($store)->delete($id);
    }
}
