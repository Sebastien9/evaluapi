<?php
declare(strict_types=1);

namespace App\Application\Actions\jobdating;

use Psr\Http\Message\ResponseInterface as Response;

class ViewjobAction extends jobAction
{
    /**
     * {@inheritdoc}
     */
    protected function action(): Response
    {
        $jobId = (int) $this->resolveArg('id');
        $job = $this->jobRepository->findjobOfId($jobId);

        $this->logger->info("job of id `${jobId}` was viewed.");

        return $this->respondWithData($job);
    }
}
