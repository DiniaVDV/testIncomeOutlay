<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OutlayIncomeRequest extends FormRequest
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
            'comment' => 'required',
			'typeOfRecord' => 'required',
			'amount' => 'required|numeric',
        ];
    }
	
	/**
     * Получить сообщения об ошибках для определённых правил проверки.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'comment.required' => 'Необходимо написать комментарий.',
            'typeOfRecord.required' => 'Необходимо выбрать тип записи.',
            'amount.required' => 'Необходимо указать сумму.',
            'amount.numeric' => 'Необходимо указать число в поле сумма.',
        ];
    }
}
