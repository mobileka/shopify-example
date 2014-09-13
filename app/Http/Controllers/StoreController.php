<?php namespace Mobileka\Http\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\View\View;
use Input;
use Mobileka\Contracts\Repositories\StoreRepositoryInterface;
use Mobileka\Http\Requests\CreateStoreRequest;
use Redirect;
use App;

/**
 * Class StoreController
 * @package Mobileka\Http\Controllers
 */
class StoreController extends Controller
{
    /**
     * @var StoreRepositoryInterface
     */
    protected $repository;

    /**
     * @param StoreRepositoryInterface $repository
     */
    public function __construct(StoreRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @return View
     */
    public function index()
    {
        $paginator = $this->repository->getCollection(Input::get('take', 5));
        $items = $paginator->getCollection();

        return view('stores.index', compact('items', 'paginator'));
    }

    /**
     * @return View
     */
    public function create()
    {
        return view('stores.create');
    }

    /**
     * @param CreateStoreRequest $request
     * @return mixed
     */
    public function store(CreateStoreRequest $request)
    {
        $store = $this->repository->create($request->all());

        return $this->setStoreToken($store->id);
    }

    /**
     * @param $id
     * @return mixed
     */
    public function setStoreToken($id)
    {
        $store = $this->repository->getItem($id);

        $provider = App::make('shopify', $store);

        if ($code = Input::get('code')) {
            $store->token = serialize($provider->getAccessToken('authorization_code', compact('code')));
            $store->save();

            return Redirect::route('stores.index');
        }

        return Redirect::to($provider->getAuthorizationUrl());
    }

    /**
     * @param $id
     * @return mixed
     */
    public function destroy($id)
    {
        $this->repository->delete($id);

        return Redirect::route('stores.index');
    }
}
