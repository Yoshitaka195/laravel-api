<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\User;
use App\Exceptions\DataAccessException;
use Illuminate\Support\Facades\Hash;

/**
 * AdminUserRepository class
 */
class UserRepository
{
    /**
     * @param string $email
     * @return User|null
     */
    public function getDetail(): ?User
    {
        $result = User::first();

        return $result;
    }
}

