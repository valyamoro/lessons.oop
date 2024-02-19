<?php
declare(strict_types=1);

namespace App\L_18_02_24\Services;

use App\L_18_02_24\core\Model;

class BaseService
{
    public function __construct(protected BaseRepository $repository)
    {

    }

}
