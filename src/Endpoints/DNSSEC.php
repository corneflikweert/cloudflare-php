<?php
namespace Cloudflare\API\Endpoints;

use Cloudflare\API\Adapter\Adapter;
use Cloudflare\API\Traits\BodyAccessorTrait;

class DNSSEC implements API
{
    use BodyAccessorTrait;

    private $adapter;

    public function __construct(Adapter $adapter)
    {
        $this->adapter = $adapter;
    }

    public function getDetails(string $zoneID): \stdClass
    {
        $user = $this->adapter->get('zones/' . $zoneID . '/dnssec/');
        $this->body = json_decode($user->getBody());
        return $this->body->result;
    }
}
