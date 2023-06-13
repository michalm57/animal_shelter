<?php

namespace Modules\Animals\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Modules\Animal\Entities\Animal;
use Modules\Employee\Entities\Employeee;

class AnimalRequest extends FormRequest
{
    /**
     * @return array
     */
    public function rules(): array
    {
        return [
            'name' => [
                'required',
                'string',
            ],
            'type_of_animal' => [
                'required',
                Rule::in(Animal::getEnumValues()),
            ],
            'employee_id' => [
                'nullable',
                Rule::in(Employeee::getIds()),
            ],
        ];
    }
}
