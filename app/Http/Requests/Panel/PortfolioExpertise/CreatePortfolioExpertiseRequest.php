<?php

namespace App\Http\Requests\Panel\PortfolioExpertise;

use Illuminate\Foundation\Http\FormRequest;

class CreatePortfolioExpertiseRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'portfolio_id'=>'required|exists:portfolio,id',
            'expertise_id' => 'required|array|min:1|exists:expertise,id|unique:portfolio_expertise,expertise_id'
        ];
    }

    public function attributes()
    {
        return [
            'portfolio_id'=>'آیدی نمونه کار',
            'expertise_id' => 'تخصص نمونه کار'
        ];
    }
}
