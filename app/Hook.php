<?php namespace Mobileka;

use Mobileka\Services\MosaiqArray as Arr;
use Mobileka\Services\Shopify;

/**
 * @property int    id
 * @property string topic
 * @property string address
 * @property string created_at
 * @property string updated_at
 * @property string fields
 * @property string metafield_namespaces
 * @property string store
 */
class Hook extends Shopify
{
    /**
     * @var array
     */
    public $fillable = ['id', 'topic', 'address'];

    /**
     * @var \Mobileka\Store
     */
    protected $store;

    /**
     * @param \Mobileka\Store $store
     * @return $this
     */
    public function setStore($store)
    {
        $this->store = $store;

        return $this;
    }

    /**
     * @return \Mobileka\Store $store
     */
    public function getStore()
    {
        return $this->store;
    }

    /**
     * @return \Guzzle\Service\Client
     * @throws \Exception
     */
    public function getHttpClient()
    {
        if (!$this->getStore()) {
            throw new \Exception('Please provide Store before doing requests');
        }

        $client = parent::getHttpClient();
        $client->setDefaultOption('headers', ['X-Shopify-Access-Token' => $this->getStore()->token]);

        return $client;
    }

    /**
     * @return mixed
     * @throws \Exception
     */
    public function all()
    {
        $url = $this->getStore()->getUrl('admin/webhooks.json');
        $response = $this->getHttpClient()->get($url)->send()->json();

        return $response['webhooks'];
    }

    /**
     * @param $data
     * @return mixed
     * @throws \Exception
     */
    public function create($data)
    {
        $data = Arr::make($data)->only($this->fillable);
        $data['format'] = 'json';
        $data = ['webhook' => $data];
        $url = $this->getStore()->getUrl('admin/webhooks.json');

        $request = $this->getHttpClient()->post($url, null, json_encode($data))->setHeader(
            "Content-Type",
            "application/json"
        );

        $response = $request->send()->json();

        return $response['webhook'];
    }

    /**
     * @param $id
     * @throws \Exception
     */
    public function delete($id)
    {
        $url = $this->getStore()->getUrl('admin/webhooks/' . $id . '.json');
        $this->getHttpClient()->delete($url)->send()->json();
    }
}


/*
 * orders/create, orders/delete, orders/updated, orders/paid, orders/cancelled, orders/fulfilled,
 * orders/partially_fulfilled, carts/create, carts/update, checkouts/create, checkouts/update, checkouts/delete,
 * refunds/create, products/create, products/update, products/delete, collections/create, collections/update,
 * collections/delete, customer_groups/create, customer_groups/update, customer_groups/delete, customers/create,
 * customers/enable, customers/disable, customers/update, customers/delete, fulfillments/create, fulfillments/update,
 * shop/update, app/uninstalled
 */