<?php

use Codeages\Plumber\Plumber;

class PlumberTest extends \PHPUnit\Framework\TestCase
{
    public function testStart()
    {
        $options = $this->getDefaultOption();

        $plumber = new Plumber('start', $options);
    }

    protected function getDefaultOption()
    {
        return [
            'workers' => [
                [
                    'class' => 'Codeages\Plumber\Example\Example2Worker',
                    'numn' => 1,
                    'topic' => 'test_redis_topic',
                    'queue' => 'default',
                    'tube' => 'test',
                ],
            ],
            'queues' => [
                'default' => [
                    'type' => 'redis',
                    'host' => '127.0.0.1',
                    'port' => '6679',
                ],
            ],
            'rate_limiter' => [
                'default' => [
                    'storage' => 'redis',
                    'redis' => ['host' => '127.0.0.1', 'port' => '6379', 'password' => null],
                    'allowance' => 5,
                    'period' => 60,
                ]
            ],
            'log_path' => __DIR__ . '/plumber.log',
            'pid_path' => __DIR__ . '/plumber.pid',
        ];
    }
}
