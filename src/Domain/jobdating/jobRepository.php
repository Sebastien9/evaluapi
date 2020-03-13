<?php
declare(strict_types=1);

namespace App\Domain\jobdating;

interface jobRepository
{
    /**
     * @return job[]
     */
    public function findAll(): array;

    /**
     * @param int $id
     * @return job
     * @throws jobNotFoundException
     */
    public function findjobOfId(int $id): job;
}
