<?php

namespace App\Http\Requests;

use App\Consts\ValidateMessageConst;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class ExampleRequest extends FormRequest
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
            'example' => [
                'required'
            ],
        ];
    }

    public function messages(): array
    {
        return [
            'example.required' => ValidateMessageConst::MESSAGE['EXAMPLE']['example.required'],
        ];
    }

    /**
     * @param Validator $validator
     * @throw HttpResponseException
     * @see FormRequest::failedValidation()
     */
    protected function failedValidation(Validator $validator)
    {
        $response['status'] = false;
        $response['result_data'] = [];
        $response['message_code'] = 'V_EXAMPLE';
        $response['errors'] = $validator->errors()->toArray();

        throw new HttpResponseException(
            response()->json($response, 200)->header('Access-Control-Allow-Origin', '*')
        );
    }
}
