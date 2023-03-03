<?php

namespace Modules\ERP\Http\Requests\OrderItem;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Enum;
use Modules\ERP\Enum\CarpetStatus;
use Modules\ERP\Enum\CarpetType;

class StoreRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'order_id' => 'required|numeric|exists:orders,id',
            'width' => 'required|numeric',
            'height' => 'required|numeric',
            'type' => ['required', new Enum(CarpetType::class)],
            'status' => ['required', new Enum(CarpetStatus::class)],
            'info' => 'nullable|string'
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
