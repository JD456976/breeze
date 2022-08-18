<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class TinRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => ['string','required'],
        ];
    }
}
