<?php

namespace App\Casts;

use Illuminate\Contracts\Database\Eloquent\CastsAttributes;
use Illuminate\Database\Eloquent\Model;

class UserTypeCast implements CastsAttributes
{

    /**
     * All user types
     * 
     * @var array<string>
     */
    const TYPES = ['super', 'admin', 'agent', 'simple'];

    /**
     * Cast the given value.
     *
     * @param  array<string, mixed>  $attributes
     */
    public function get(Model $model, string $key, mixed $value, array $attributes): mixed
    {
        return UserTypeCast::TYPES[$value];
    }

    /**
     * Prepare the given value for storage.
     *
     * @param  array<string, mixed>  $attributes
     */
    public function set(Model $model, string $key, mixed $value, array $attributes): mixed
    {
        return !is_numeric($value) && ($pos = array_search($value, UserTypeCast::TYPES)) ? $pos : $value;
    }
}
