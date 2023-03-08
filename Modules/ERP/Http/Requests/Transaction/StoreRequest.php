<?php

namespace Modules\ERP\Http\Requests\Transaction;

use Modules\ERP\Enum\TransactionPurposeType;
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
        // dd($this);
        return [
            'receiver_id' => 'required_without:payer_id|integer',
            'payer_id' => 'required_without:receiver_id|integer',
            'purpose_id' => 'required|numeric|exists:transaction_purposes,id',
            'amount' => 'integer|required',
            'description' => 'string|nullable',
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
