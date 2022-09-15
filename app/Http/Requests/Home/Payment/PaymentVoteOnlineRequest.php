<?php

namespace App\Http\Requests\Home\Payment;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\ValidationException;

class PaymentVoteOnlineRequest extends FormRequest
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
            'name' => 'required',
            'email' => 'required|email',
            'quantity' => 'required',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Name is required!',
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        // return errors in json object/array
        if($this->wantsJson()){
            $response = response()->json([
                "success" => false,
                'errors' => $validator->getMessageBag()->toArray(),
            ]);
        }

        throw (new ValidationException($validator, $response ?? null))
            ->errorBag($this->errorBag)
            ->redirectTo($this->getRedirectUrl());
    }
}
