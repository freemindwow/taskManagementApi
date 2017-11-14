<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TaskRequest extends FormRequest
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
        switch($this->method()) {
            case 'POST': {
                return [
                    'name' => 'required',
                    'user_id' => 'required|exists:users,id'
                ];
            }
            case 'PUT':
            case 'PATCH': {
                return [
                    'name' => 'sometimes|required',
                    'user_id' => 'sometimes|required|exists:users,id'
                ];
            }
        }
    }

    /**
     * @return array
     */
    public function attributes()
    {
        return [
            'name' => 'Task name',
            'user_id' => 'User ID'
        ];
    }
}
