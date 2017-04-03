<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class CategoryCreateRequest extends FormRequest
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
    	if ($this->route('category') && ($id = $this->route('category')) > 0) {
    		return [
    			'name' => 'required|unique:category,name,' + $id
            	'description' => 'max:500',
            	'isstart' => 'numeric|in:0,1',
    		];
    	}
        return [
            'name' => 'required|unique:category,name',
            'description' => 'required|max:500',
            'isstart' => 'required|numeric|in:0,1',
        ];
    }


    /**
     * Get the proper failed validation response for the request.
     *
     * @param  array  $errors
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function response(array $errors)
    {
        return response()->error($errors);
    }
}