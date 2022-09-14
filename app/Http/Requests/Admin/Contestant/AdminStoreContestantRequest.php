<?php

namespace App\Http\Requests\Admin\Contestant;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\ValidationException;


class AdminStoreContestantRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'name' => 'required|unique:contestants,name|min:4',
            'image' => 'required|mimes:jpg,jpeg,png|image|max:5048',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Name is required!',
            'name.unique' => 'This name already exists!',
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
