<?php

namespace App\Traits;

trait ClientValidationRulesTrait
{
    public function getClientValidationRules()
    {
        return [
            'name' => 'required',
            'gender' => 'required',
            'phone' => 'required',
            'email' => 'required | email',
            'address' => 'required',
            'nationality' => 'required',
            'date_of_birth' => 'required|date|before:today',
            'education_background' => 'required',
            'preferred_mode_of_contact' => 'required',
        ];
    }
}
