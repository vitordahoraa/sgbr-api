<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateLocalRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true; // Auth not required for this task
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {

        $method = $this->method();

        if($method == 'PUT'){ // check the method used in the update 
            return [
                'name' => ['required'],
                'state' => ['required'],
                'city' => ['required'],
                'slug' => ['required']
            ];
        }
        else{
            return [
                'name' => ['sometimes','required'],
                'state' => ['sometimes','required'],
                'city' => ['sometimes','required'],
                'slug' => ['sometimes','required']
            ];
    }
    }
}
