<?php

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.
// Returns the private 'console.error_listener' shared service.

include_once $this->targetDirs[3].'/vendor/symfony/console/EventListener/ErrorListener.php';

$a = new \Symfony\Bridge\Monolog\Logger('console');
$a->pushHandler(($this->privates['monolog.handler.console'] ?? $this->privates['monolog.handler.console'] = new \Symfony\Bridge\Monolog\Handler\ConsoleHandler(NULL, true, array())));
$a->pushHandler(($this->privates['monolog.handler.main'] ?? $this->getMonolog_Handler_MainService()));

return $this->privates['console.error_listener'] = new \Symfony\Component\Console\EventListener\ErrorListener($a);
