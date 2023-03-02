<?php

namespace Modules\ERP\Http\Requests\TransactionPurpose;

use Illuminate\Foundation\Http\FormRequest;

class IndexRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'sort_key' => 'nullable',
            'sort_type' => 'required_with:sort_key',
            'type' => 'nullable|string',
            'title' => 'nullable|string',
            'page' => 'nullable|numeric',
            'per_page' => 'nullable|numeric'
        ];
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
}
