<?php
declare(strict_types=1);

namespace App\Infrastructure\Persistence\jobdating;

use App\Domain\jobdating\job;
use App\Domain\jobdating\jobNotFoundException;
use App\Domain\jobdating\jobRepository;

class InMemoryjobRepository implements jobRepository
{
    /**
     * @var job[]
     */
    private $jobs;

    /**
     * InMemoryjobRepository constructor.
     *
     * @param array|null $jobs
     */
    public function __construct(array $jobs = null)
    {
        $this->jobs = $jobs ?? $this->_load();
    }
        private function _load(){
            return[
            1 => new job(1, 'apple', 'lundi', 'lyon', '10h'),
            2 => new job(2, 'microsoft', 'lundi', 'lyon', '11h'),
            3 => new job(3, 'samsung', 'mardi', 'saint-genis', '15h'),
            4 => new job(4, 'huawei', 'mardi', 'saint-genis', '16h'),
            5 => new job(5, 'xiaomo', 'mardi', 'saint-genis', '15h15'),
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function findAll(): array
    {
        //request bdd
        // return results
        return array_values($this->jobs);
    }

    /**
     * {@inheritdoc}
     */
    public function findjobOfId(int $id): job
    {
        //request bss
        //if idjob not found
        if (!isset($this->jobs[$id])) {
            throw new jobNotFoundException();
        }

        // return job
        return $this->jobs[$id];
    }
}
