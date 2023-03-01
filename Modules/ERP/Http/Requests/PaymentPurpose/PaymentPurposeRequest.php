<?php

namespace Modules\ERP\Http\Requests\PaymentPurpose;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Enum;
use Modules\ERP\Enum\PaymentPurposeType;

class PaymentPurposeRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'type' => ['required', new Enum(PaymentPurposeType::class)],
            'title' => 'required|unique:payment_purposes'
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
