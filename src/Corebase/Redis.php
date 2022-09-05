<?php

namespace App\Corebase;

use Predis\Client as Client;

class Redis
{
    private const SETTINGS = [
        'scheme' => 'tcp',
        'host'   => '127.0.0.1',
        'port'   => 6379,
        'ttl' => 3600,

    ];

    private const REDIS_KEY = 1;

    /**
     * Create client
     */
    private static function client()
    {
        $client = new Client(self::SETTINGS['scheme'] . ':' .self::SETTINGS['host'] . ':' . self::SETTINGS['port']);
        $client->select(self::REDIS_KEY);

        return $client;
    }

    public static function set($name, $input, $ttlSet = false, $serializer = false)
    {
        $client = self::client();
        
        if ($serializer) {
            $client->set(self::arrayToString($name), serialize($input));
        } else {
            $client->set(self::arrayToString($name), json_encode($input));
        }

        if ($ttlSet) {
            $client->expire(self::arrayToString($name), self::SETTINGS['ttl']);
        }
    }

    public static function get($name, $serializer = false)
    {
        $client = self::client();

        if ($serializer) {
            $response = unserialize($client->get(self::arrayToString($name)));
        } else {
            $response = json_decode($client->get(self::arrayToString($name)));
        }

        return $response;
    }

    /**
     * Create the hierarchical structure
     */
    private static function arrayToString($name)
    {
        return (is_array($name)) ? implode(":", $name) : $name;
    }
}