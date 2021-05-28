<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\Example;

/**
 * ExapmleRepository class
 */
class ExampleRepository
{
    /**
     * @param string $email
     * @return Example|null
     */
    public function getDetail(): ?Example
    {
        $result = Example::first();

        return $result;
    }
}

