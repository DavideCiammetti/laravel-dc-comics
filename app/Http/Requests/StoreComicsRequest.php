<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreComicsRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title'=>'required|max:25',
            'description'=>'required|min:20|max:255',
            'thumb'=>'required',
            'price'=>'required',
            'series'=>'nullable',
            'sale_date'=>'nullable',
            'type'=>'nullable',
            'artists'=>'nullable',
            'writers'=>'nullable'
        ];
    }

    public function message(){
        return  [
            'title.required'=> 'il titolo è obbligatorio',
            'title.max'=> 'massimo 5 caratteri',
            'description.required'=> 'il campo description è obbligatorio',
            'description.min'=> 'minimo 20 caratteri',
            'description.max'=> 'massimo 255 caratteri',
            'thumb.required'=>'campo obbligatorio',
            'price.require'=>'campo obbligatorio',
            'thumb.required'=>'campo obbligatorio',
        ];
    }
}
