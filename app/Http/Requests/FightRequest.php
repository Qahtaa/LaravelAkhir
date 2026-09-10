<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FightRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'red_fighter_id' => ['required', 'exists:fighters,id', 'different:blue_fighter_id'],
            'blue_fighter_id' => ['required', 'exists:fighters,id'],
            'weight_class' => ['required', 'string', 'max:255'],
            'match_time' => ['required', 'date'],
            'status' => ['sometimes', 'required', 'in:Upcoming,Live,Finished'],
        ];
    }
}
