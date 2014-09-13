<?php namespace Mobileka\Providers;

use Config;
use Illuminate\Support\ServiceProvider;
use Mobileka\Services\Shopify;
use Mobileka\Store;
use URL;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any necessary services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            'shopify',
            function ($app, Store $store) {
                $provider = new Shopify(
                    [
                        'clientId' => Config::get('shopify.key'),
                        'clientSecret' => Config::get('shopify.secret'),
                        'redirectUri' => URL::route('stores.setStoreToken', [$store->id]),
                    ]
                );

                $provider->setStoreUrl($store->getUrl());

                $provider->setScopes(
                    [
                        'read_orders',
                        'read_products',
                        'read_customers',
                    ]
                );

                return $provider;
            }
        );
    }
}
