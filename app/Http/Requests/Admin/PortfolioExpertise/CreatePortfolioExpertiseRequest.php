<?php

namespace App\Http\Requests\Admin\PortfolioExpertise;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

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
            'expertise_id' => [
                'required',
                'array',
                'min:1',
                'exists:expertise,id',
                Rule::unique('portfolio_expertise')
                    ->where('portfolio_id',$this->request->get('portfolio_id'))
                    ->where('expertise_id',$this->request->get('expertise_id'))
            ]
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
