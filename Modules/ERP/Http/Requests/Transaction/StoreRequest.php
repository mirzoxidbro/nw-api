<?php

namespace Modules\ERP\Http\Requests\Transaction;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Enum;

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
            'receiver_id' => 'required_without:payer_id|integer',
            'payer_id' => 'required_without:receiver_id|integer',
            'purpose_id' => 'required|numeric|exists:payment_purposes,id',
            'amount' => 'integer|required',
            'description' => 'nullable',
            'type' => 'required'
            // 'type' => ['required', new Enum(Factories::class)]
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
