<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Waavi\Sanitizer\Laravel\SanitizesInput;

class StoreProduct extends FormRequest
{
    use SanitizesInput;

    public function validateResolved()
    {
        {
            $this->sanitize();
            parent::validateResolved();
        }
    }
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
            'title' => 'required|min:5|max:255',
            'image' => 'nullable',
            'weight' => 'required|numeric',
            'price' => 'required|numeric',
            'stock' => 'required|numeric',
            'in_stock' => 'nullable|boolean'
        ];
    }

    public function filters()
    {
        return [
            'title' => 'trim|lowercase',
        ];
    }
}
