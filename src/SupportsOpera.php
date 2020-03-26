<?php

namespace Appstract\DuskDrivers\Opera;

use Symfony\Component\Process\Process;

trait SupportsOpera
{
    /**
     * The OperaDriver process instance.
     */
    protected static $operaProcess;

    /**
     * Start the Opera process.
     *
     * @return void
     */
    public static function startOperaDriver()
    {
        static::$operaProcess = static::buildOperaProcess();

        static::$operaProcess->start();

        static::afterClass(function () {
            static::stopOperaDriver();
        });
    }

    /**
     * Stop the Operadriver process.
     *
     * @return void
     */
    public static function stopOperaDriver()
    {
        if (static::$operaProcess) {
            static::$operaProcess->stop();
        }
    }

    /**
     * Build the process to run the Operadriver.
     *
     * @return \Symfony\Component\Process\Process
     */
    protected static function buildOperaProcess()
    {
        return new Process(
            [realpath(__DIR__.'/../bin/operadriver-'.static::driverSuffix())],
            null,
            static::operaEnvironment()
        );
    }

    /**
     * Get the Chromedriver environment variables.
     *
     * @return array
     */
    protected static function operaEnvironment()
    {
        if (PHP_OS === 'Darwin' || PHP_OS === 'WINNT') {
            return [];
        }

        return ['DISPLAY' => ':0'];
    }

    /**
     * Get the suffix for the Chromedriver binary.
     *
     * @return string
     */
    protected static function driverSuffix()
    {
        switch (PHP_OS) {
            case 'Darwin':
                return 'mac';
            case 'WINNT':
                return 'win.exe';
            default:
                return 'linux';
        }
    }
}
