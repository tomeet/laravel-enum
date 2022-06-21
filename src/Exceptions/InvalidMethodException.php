<?php

/*
 * This file is part of the Tomeet/laravel-enum.
 *
 * (c) Tomeet <tomeet@sohu.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Tomeet\Enum\Laravel\Exceptions;

use Exception;
use Tomeet\Enum\Laravel\Enum;

class InvalidMethodException extends Exception
{
    /**
     * Create an InvalidMethodException.
     *
     * @param $invalidMethod
     * @param  Enum|string  $enumClass
     */
    public function __construct($invalidMethod, $enumClass)
    {
        $enumClassName = class_basename($enumClass);

        parent::__construct("Cannot found $invalidMethod method on $enumClassName class.", 405);
    }
}
