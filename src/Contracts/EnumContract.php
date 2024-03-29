<?php

/*
 * This file is part of the Tomeet/laravel-enum.
 *
 * (c) Tomeet <tomeet@sohu.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Tomeet\Enum\Laravel\Contracts;

interface EnumContract
{
    /**
     * Return the enum as an array.
     *
     * [string $key => mixed $value]
     *
     * @return array
     */
    public static function toArray(): array;

    /**
     * Cast the current instance to string and get the value.
     *
     * @return string
     */
    public function __toString(): string;

    /**
     * Determine if this instance is equivalent to a given value.
     *
     * @param  mixed  $enumValue
     * @return bool
     */
    public function is($enumValue): bool;
}
