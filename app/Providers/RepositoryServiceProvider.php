<?php namespace Mobileka\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
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
            'Mobileka\Contracts\Repositories\StoreRepositoryInterface',
            'Mobileka\Repositories\SqlStoreRepository'
        );

        $this->app->bind(
            'Mobileka\Contracts\Repositories\HookRepositoryInterface',
            'Mobileka\Repositories\ApiHookRepository'
        );
    }
}
