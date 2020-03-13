<?php
declare(strict_types=1);

namespace App\Domain\jobdating;

use App\Domain\DomainException\DomainRecordNotFoundException;

class jobNotFoundException extends DomainRecordNotFoundException
{
    public $message = 'The job you requested does not exist.';
}
