<?php
declare(strict_types=1);

namespace App\Application\Actions\jobdating;

use Psr\Http\Message\ResponseInterface as Response;

class updatejobAction extends jobAction
{
    /**
     * {@inheritdoc}
     */
    protected function action(): Response
    {
        $jobId = (int) $this->resolveArg('id');

        $data = $this->getFormData();

         /**
         * @var job
         */

        $job = $this->jobRepository->findjobOfId($jobId);

        /**
         * @var bool
         */

        $response = $job->update($data);

        $this->logger->info("job of id `${jobId}` updated.");

        return $this->respondWithData(['updated'=>$response, "data"=>$job]);
    }
}
