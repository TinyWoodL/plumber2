<?php

namespace Codeages\Plumber;

use Swoole\Process;

/**
 * Describes a swoole_process-aware instance.
 */
interface ProcessAwareInterface
{
    /**
     * Sets a process instance on the object.
     *
     * @param Process $process
     *
     * @return void
     */
    public function setProcess(Process $process);

}