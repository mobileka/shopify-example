<?php namespace Mobileka\Services;

use League\OAuth2\Client\Provider\AbstractProvider as BaseProvider;
use League\OAuth2\Client\Token\AccessToken;

/**
 * Class Shopify
 * @package Mobileka\Services
 */
class Shopify extends BaseProvider
{
    /**
     * @var string
     */
    protected $storeUrl;

    /**
     * @return string
     */
    public function urlAuthorize()
    {
        return "{$this->storeUrl}admin/oauth/authorize";
    }

    /**
     * @return string
     */
    public function urlAccessToken()
    {
        return "{$this->storeUrl}admin/oauth/access_token";
    }

    /**
     * @param $storeUrl
     */
    public function setStoreUrl($storeUrl)
    {
        $this->storeUrl = $storeUrl;
    }

    /**
     * @return string
     */
    public function getStoreUrl()
    {
        return $this->storeUrl;
    }

    /**
     * @return \Guzzle\Service\Client
     */
    public function getHttpClient()
    {
        $client = clone $this->httpClient;

        return $client;
    }

    /**
     * @param \League\OAuth2\Client\Token\AccessToken $token
     */
    public function urlUserDetails(AccessToken $token)
    {
    }

    /**
     * @param                                         $response
     * @param \League\OAuth2\Client\Token\AccessToken $token
     */
    public function userDetails($response, AccessToken $token)
    {
    }
}
