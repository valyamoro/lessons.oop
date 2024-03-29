<?php
declare(strict_types=1);

namespace App\L_18_02_24\core;


use App\L_18_02_24\core\Validation\Validator;

abstract class Model
{
    public Validator $validator;

    public function __construct()
    {
        $this->validator = new Validator();
    }

}
