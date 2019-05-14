<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContributionRequest extends FormRequest
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
            'percent' => 'required|numeric',
            'min_term' => 'required|integer',
            'isReplenishment' => 'boolean',
            'isWithdrawal' => 'boolean',
            'isCapitalization' => 'boolean'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Поле "Название" обязательно для заполнения.',
            'percent.required' => 'Поле "Процент" обязательно для заполнения.',
            'min_term.required' => 'Поле "Минимальный срок" обязательно для заполнения.',
            'requirements.required' => 'Поле "Требуемые документы" обязательно для заполнения.',
            'percent.numeric' => 'Поле "Процент" должно быть в числовом формате',
            'min_term.integer' => 'Поле "Минимальный срок" должно быть в целочисленном формате'
        ];
    }
}
