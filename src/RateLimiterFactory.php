<?php

namespace Codeages\Plumber;

use Codeages\RateLimiter\RateLimiter;
use Codeages\RateLimiter\Storage\RedisStorage;

class RateLimiterFactory
{
    private $options;

    public function __construct($options = [])
    {
        $this->options = $options;
    }

    /**
     * @param $name
     * @return RateLimiter
     * @throws PlumberException
     * @throws QueueException
     */
    public function create($name)
    {
        if (!isset($this->options[$name])) {
            throw new QueueException("RateLimiter '{$name}' config is not exist.");
        }

        $options = $this->options[$name];
        if (!isset($options['storage'])) {
            throw new QueueException("RateLimiter '{$name}' config is invalid.");
        }

        switch ($options['storage']) {
            case 'redis':
                $limiter = new RateLimiter(
                    "plumber:rate_limiter:{$name}",
                    $options['allowance'],
                    $options['period'],
                    new RedisStorage($options['redis']['host'], $options['redis']['port'])
                );
                break;
            default:
                throw new PlumberException("RateLimiter {$name} storage {$options['storage']} is not support.");
                break;
        }

        return $limiter;
    }
}