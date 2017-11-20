<?php

namespace LaravelShop\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ThankYouRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'       => 'required|string',
            'email'      => 'required|email',
            'tel'        => 'required|string',
            'department' => 'string',
            'comment'    => 'string'
        ];
    }
}
