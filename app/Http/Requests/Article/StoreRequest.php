<?php

namespace App\Http\Requests\Article;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    
    public function rules(): array
    {
        return [
            'title' => ['requared', 'string', 'max:255'],
            'body' => ['string', 'max:1000'],
            'preview' => ['iamge']
        ];
    }
}
