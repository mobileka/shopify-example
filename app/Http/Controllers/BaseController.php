<?php namespace Mobileka\Http\Controllers;

use Illuminate\Routing\Controller;
use Response;

/**
 * Class BaseController
 * @package Mobileka\Http\Controllers
 */
class BaseController extends Controller
{
    /**
     * @return mixed
     */
    public function respondNotFound()
    {
        return Response::view('errors.404', [], 404);
    }
}
