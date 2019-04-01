<?php
/**
 * Created by PhpStorm.
 * User: link7
 * Date: 01/04/2019
 * Time: 23:59
 */

namespace App\Security;

use App\Entity\User;

class UserProvider
{
    /**
     * Tells Symfony to use this provider for this User class.
     */
    public function supportsClass($class)
    {
        return User::class === $class;
    }
}