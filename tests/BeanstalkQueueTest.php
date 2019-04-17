<?php

use Monolog\Logger;

class BeanstalkQueueTest extends \PHPUnit\Framework\TestCase
{
    public function testListenTopic()
    {
        $options = [
            'host' => '127.0.0.1',
            'port' => '11300',
        ];
        $q = new \Codeages\Plumber\Queue\BeanstalkQueue($options, $this->getLogger());
        $topic = $q->listenTopic('test_beanstalk_topic');

        $this->assertNotNull($topic);
    }

    protected function getLogger()
    {
        $logger = new Logger('test');

        return $logger;
    }
}