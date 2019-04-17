<?php

class RedisQueueTest extends \PHPUnit\Framework\TestCase
{
    public function testListenTopic()
    {
        $options = [
            'host' => '127.0.0.1',
            'port' => '6379',
        ];
        $q = new \Codeages\Plumber\Queue\RedisQueue($options);
        $topic = $q->listenTopic('test_beanstalk_topic');

        $this->assertNotNull($topic);
    }
}
