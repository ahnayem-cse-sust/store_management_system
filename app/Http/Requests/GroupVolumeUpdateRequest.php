<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GroupVolumeUpdateRequest extends FormRequest
{
    public function authorize()
    {
        edit();

        return true;
    }

    public function rules()
    {
        return [];
    }
}