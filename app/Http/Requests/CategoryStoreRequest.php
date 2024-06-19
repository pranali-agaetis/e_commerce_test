<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Str;

class CategoryStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => ['required', 'alpha',],
            'slug' => ['required', 'alpha']
        ];
    }

    /**
     * Prepare the data for validation.
     */
    protected function prepareForValidation(): void
    {
        if ($this->qty < 0) {
            $this->stock = 'low';
        }

        $this->merge([
            'name' => strtolower($this->name),
            'slug' => Str::slug($this->name),
            'qty'  => $this->qty,
            'stock' => $this->stock
        ]);
    }
}
