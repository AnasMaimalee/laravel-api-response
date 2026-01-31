<?php

namespace Maimalee\LaravelApiResponse\Exceptions;

use Illuminate\Contracts\Validation\Validator;

class ApiValidationException extends ApiException
{
    public static function from(Validator $validator): self
    {
        return new self(
            'Validation failed',
            422,
            $validator->errors()->toArray()
        );
    }
}
