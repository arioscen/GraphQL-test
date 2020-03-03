<?php

namespace App\GraphQL\Directives;

use Illuminate\Validation\Rule;
use Nuwave\Lighthouse\Schema\Directives\ValidationDirective;

class UpdateUserValidationDirective extends ValidationDirective
{
    /**
     * @return mixed[]
     */
    public function rules(): array
    {
        return [
            'id' => ['required'],
            'name' => ['sometimes', 'required'],
            'email' => ['sometimes', 'required', 'email', Rule::unique('users', 'email')->ignore($this->args['id'], 'id')],
            'password' => ['sometimes', 'required']
        ];
    }
}