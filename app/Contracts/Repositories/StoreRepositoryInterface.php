<?php namespace Mobileka\Contracts\Repositories;

/**
 * Interface StoreRepositoryInterface
 * @package Mobileka\Contracts\Repositories
 */
interface StoreRepositoryInterface
{
    /**
     * @param  int $take Maximum number of items to return
     * @return \Illuminate\Pagination\Paginator
     */
    public function getCollection($take = 5);

    /**
     * @param  int $id
     * @return \Illuminate\Database\Eloquent\Collection|null
     */
    public function getItem($id);

    /**
     * @param  array $input
     * @return \Mobileka\Store
     */
    public function create($input = []);

    /**
     * @param  int $id
     * @return void
     */
    public function delete($id);
}
