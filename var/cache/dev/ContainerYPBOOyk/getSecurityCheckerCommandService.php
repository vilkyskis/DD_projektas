<?php

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.
// Returns the private 'SensioLabs\Security\Command\SecurityCheckerCommand' shared service.

include_once $this->targetDirs[3].'/vendor/sensiolabs/security-checker/SensioLabs/Security/SecurityChecker.php';
include_once $this->targetDirs[3].'/vendor/symfony/console/Command/Command.php';
include_once $this->targetDirs[3].'/vendor/sensiolabs/security-checker/SensioLabs/Security/Command/SecurityCheckerCommand.php';

$this->privates['SensioLabs\Security\Command\SecurityCheckerCommand'] = $instance = new \SensioLabs\Security\Command\SecurityCheckerCommand(new \SensioLabs\Security\SecurityChecker());

$instance->setName('security:check');

return $instance;
