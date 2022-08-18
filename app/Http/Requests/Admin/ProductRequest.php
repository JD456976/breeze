<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => ['string','required'],
            'tin' => ['required'],
            'color' => ['required'],
            'scent' => ['required'],
        ];
    }
}
