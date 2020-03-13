<?php
declare(strict_types=1);

use App\Domain\User\UserRepository;
use App\Infrastructure\Persistence\User\InMemoryUserRepository;

use App\Domain\jobdating\jobRepository;
use App\Infrastructure\Persistence\jobdating\InMemoryjobRepository;
use DI\ContainerBuilder;

return function (ContainerBuilder $containerBuilder) {
    // Here we map our UserRepository interface to its in memory implementation
    $containerBuilder->addDefinitions([
        UserRepository::class => \DI\autowire(InMemoryUserRepository::class),
        jobRepository::class => \DI\autowire(InMemoryjobRepository::class),

    ]);


};
