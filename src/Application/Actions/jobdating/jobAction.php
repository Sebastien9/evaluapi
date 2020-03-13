<?php
declare(strict_types=1);

namespace App\Application\Actions\jobdating;

use App\Application\Actions\Action;
use App\Domain\jobdating\jobRepository;
use Psr\Log\LoggerInterface;

abstract class jobAction extends Action
{
    /**
     * @var jobRepository
     */
    protected $jobRepository;

    /**
     * @param LoggerInterface $logger
     * @param jobRepository  $jobRepository
     */
    public function __construct(LoggerInterface $logger, jobRepository $jobRepository)
    {
        parent::__construct($logger);
        $this->jobRepository = $jobRepository;
    }
}
