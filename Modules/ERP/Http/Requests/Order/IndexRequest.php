<?php

namespace Modules\ERP\Http\Requests\Order;

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
            'user_id' => 'nullable|numeric|exists:users,id',
            'location' => 'nullable|string',
            'amount' => 'nullable|integer',
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
