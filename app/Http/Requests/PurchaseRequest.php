<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PurchaseRequest extends FormRequest
{
    public function rules()
    {
        return [
            'purchases' => 'required|array',
            'purchases.*.team_id' => 'required|exists:teams,id',
            'purchases.*.drink_id' => 'required|exists:drinks,id',
            'purchases.*.amount' => 'required|numeric|min:1'
        ];
    }
}
