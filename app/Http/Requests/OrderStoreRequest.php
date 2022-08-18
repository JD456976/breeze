<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderStoreRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'tin' => ['required'],
            'color' => ['required'],
            'scent' => ['required'],
        ];
    }
}
