<?php namespace Mobileka\Http\Controllers;

use App;
use Illuminate\View\View;
use Input;
use Mobileka\Contracts\Repositories\HookRepositoryInterface;
use Mobileka\Contracts\Repositories\StoreRepositoryInterface;
use Mobileka\Http\Requests\CreateHookRequest;
use Redirect;
use Response;

/**
 * Class HookController
 * @package Mobileka\Http\Controllers
 */
class HookController extends BaseController
{
    /**
     * @var HookRepositoryInterface
     */
    protected $hookRepository;
    /**
     * @var StoreRepositoryInterface
     */
    protected $storeRepository;

    /**
     * @param HookRepositoryInterface  $hookRepository
     * @param StoreRepositoryInterface $storeRepository
     */
    public function __construct(HookRepositoryInterface $hookRepository, StoreRepositoryInterface $storeRepository)
    {
        $this->hookRepository = $hookRepository;
        $this->storeRepository = $storeRepository;
    }

    /**
     * @param $storeId
     * @return View|mixed
     */
    public function index($storeId)
    {
        if (!$store = $this->storeRepository->getItem($storeId)) {
            return $this->respondNotFound();
        }

        $items = $this->hookRepository->getCollection($store);

        return view('hooks.index', compact('items', 'store'));
    }

    /**
     * @param $storeId
     * @return View|mixed
     */
    public function create($storeId)
    {
        if (!$store = $this->storeRepository->getItem($storeId)) {
            return $this->respondNotFound();
        }

        return view('hooks.create', compact('store'));
    }

    /**
     * @param CreateHookRequest $request
     * @param                                           $storeId
     * @return mixed
     */
    public function store(CreateHookRequest $request, $storeId)
    {
        if (!$store = $this->storeRepository->getItem($storeId)) {
            return $this->respondNotFound();
        }

        $this->hookRepository->create($store, $request->all());

        return Redirect::route('stores.hooks.index', [$storeId]);
    }

    /**
     * @param int $storeId
     * @param int $id
     * @return mixed
     */
    public function destroy($storeId, $id)
    {
        if (!$store = $this->storeRepository->getItem($storeId)) {
            return $this->respondNotFound();
        }

        $this->hookRepository->delete($store, $id);

        return Redirect::route('stores.hooks.index', [$storeId]);
    }
}
