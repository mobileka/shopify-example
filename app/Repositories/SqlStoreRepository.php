<?php namespace Mobileka\Repositories;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Paginator;
use Mobileka\Contracts\Repositories\StoreRepositoryInterface;
use Mobileka\Store;

/**
 * Class SqlStoreRepository
 * @package Mobileka\Repositories
 */
class SqlStoreRepository extends BaseRepository implements StoreRepositoryInterface
{
    /**
     * @return Store
     */
    public function getModel()
    {
        return new Store;
    }

    /**
     * @param int $take
     * @return Paginator
     */
    public function getCollection($take = 5)
    {
        return $this->getModel()->paginate($take);
    }

    /**
     * @param $id
     * @return Collection
     */
    public function getItem($id)
    {
        return $this->getModel()->find($id);
    }

    /**
     * @param array $input
     * @return Store
     */
    public function create($input = [])
    {
        $store = $this->getModel()->fill($input);
        $store->save();

        return $store;
    }

    /**
     * @param $id
     * @return void
     */
    public function delete($id)
    {
        if ($model = $this->getItem($id)) {
            $model->delete();
        }
    }
}
