<?php

namespace Modules\ERP\Http\Requests\OrderItem;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Enum;
use Modules\ERP\Enum\CarpetStatus;
use Modules\ERP\Enum\CarpetType;

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
            'status' => ['nullable', new Enum(CarpetStatus::class)],
            'type' => ['nullable', new Enum(CarpetType::class)],
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
