<?php

/*
 * This file is part of the Tomeet/laravel-enum.
 *
 * (c) Tomeet <tomeet@sohu.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Tomeet\Enum\Laravel\Http\Requests\Rules;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\Lang;
use InvalidArgumentException;

class EnumKey implements Rule
{
    /**
     * @var string|\Tomeet\Enum\Laravel\Enum
     */
    protected $enumClass;

    /**
     * The name of the rule.
     */
    protected $rule = 'enum_key';

    /**
     * @var bool
     */
    protected $strict;

    /**
     * Create a new rule instance.
     *
     * @param  string|\Tomeet\Enum\Laravel\Enum  $enumClass
     * @param  bool  $strict
     * @return void
     */
    public function __construct($enumClass, bool $strict = true)
    {
        $this->enumClass = $enumClass;
        $this->strict = $strict;

        if (! class_exists($this->enumClass)) {
            throw new InvalidArgumentException("Cannot validate against the enum, the class {$this->enumClass} doesn't exist.");
        }
    }

    /**
     * Convert the rule to a validation string.
     *
     * @return string
     *
     * @see \Illuminate\Validation\ValidationRuleParser::parseParameters
     */
    public function __toString()
    {
        $strict = $this->strict ? 'true' : 'false';

        return "{$this->rule}:{$this->enumClass},{$strict}";
    }

    /**
     * Get the validation error message.
     *
     * @return string|array
     */
    public function message()
    {
        return Lang::get('enums.validations.enum_key');
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        if (is_subclass_of($value, \Tomeet\Enum\Laravel\Enum::class)) {
            $value = $value->key;
        }

        return $this->enumClass::hasKey($value, $this->strict);
    }
}
