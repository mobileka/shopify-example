<?php namespace Mobileka\Providers;

use Illuminate\Routing\FilterServiceProvider as ServiceProvider;

class FilterServiceProvider extends ServiceProvider
{
    /**
	 * The filters that should run before all requests.
	 *
	 * @var array
	 */
    protected $before = [
        'Mobileka\Http\Filters\MaintenanceFilter',
    ];

    /**
	 * The filters that should run after all requests.
	 *
	 * @var array
	 */
    protected $after = [
        //
    ];

    /**
	 * All available route filters.
	 *
	 * @var array
	 */
    protected $filters = [
        'auth' => 'Mobileka\Http\Filters\AuthFilter',
        'auth.basic' => 'Mobileka\Http\Filters\BasicAuthFilter',
        'auth.shopify' => 'Mobileka\Http\Filters\ShopifyAuthFilter',
        'csrf' => 'Mobileka\Http\Filters\CsrfFilter',
        'guest' => 'Mobileka\Http\Filters\GuestFilter',
    ];

}
