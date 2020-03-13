<?php
declare(strict_types=1);

namespace App\Application\Actions\User;

use Psr\Http\Message\ResponseInterface as Response;

class updateAction extends UserAction
{
    /**
     * {@inheritdoc}
     */
    protected function action(): Response
    {
        $userId = (int) $this->resolveArg('id');

        $data = $this->getFormData();

         /**
         * @var User
         */

        $user = $this->userRepository->findUserOfId($userId);

        /**
         * @var bool
         */

        $response = $user->update($data);

        $this->logger->info("User of id `${userId}` updated.");

        return $this->respondWithData(['updated'=>$response, "data"=>$user]);
    }
}
