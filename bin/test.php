<?php

use Docker\API\Model\ContainerConfig;
use Docker\Docker;
use Symfony\Component\Debug\Debug;

set_time_limit(0);

require_once __DIR__.'/../vendor/autoload.php';

Debug::enable();
$kernel = new \App\Kernel('dev', true);
$kernel->boot();

/** @var Docker $docker */
$docker = $kernel->getContainer()->get(Docker::class);

$containerManager = $docker->getContainerManager();
$containerCreateResult = $containerManager->create(
    (new ContainerConfig())
        ->setImage('debian')
        ->setCmd(['sleep', '10'])
);
$containerId = $containerCreateResult->getId();
$containerManager->start($containerId);

while (true) {
    \usleep(500000);

    $findResponse = $containerManager->find($containerId);
    $serviceState = $findResponse->getState();
    echo "Running: ".(int) $serviceState->getRunning()."\t";
    echo "ExitCode: {$serviceState->getExitCode()}\t";
    echo "LSOF: ".exec('lsof | wc -l')."\n";
    if (!$serviceState->getRunning()) {
        $serviceResult = $serviceState->getExitCode();
        break;
    }

    // Other stuff
}

$containerManager->remove($containerId);

while (true) {
    sleep(1);
};
while (true) {
sleep(1);
};