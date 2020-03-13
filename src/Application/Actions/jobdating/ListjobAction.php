<?php
declare(strict_types=1);

namespace App\Application\Actions\jobdating;

use Psr\Http\Message\ResponseInterface as Response;

class ListjobAction extends jobAction
{
    /**
     * {@inheritdoc}
     */
    protected function action(): Response
    {
        $jobs = $this->jobRepository->findAll();

        $this->logger->info("jobs list was viewed.");

        return $this->respondWithData($jobs);
    }
}
