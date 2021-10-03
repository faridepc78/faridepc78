<?php

namespace App\Http\Requests\Admin\PortfolioExpertise;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CreatePortfolioExpertiseRequest extends FormRequest
{
    public function authorize()
    {
        return auth()->check() == true;
    }

    public function prepareForValidation()
    {
        return $this->merge([
            'portfolio_id' => request()->id
        ]);
    }

    public function rules()
    {
        $id = $this->request->get('portfolio_id');

        return [
            'portfolio_id' => ['required', 'exists:portfolio,id'],
            'expertise_id' => [
                'required',
                'array',
                'min:1',
                'exists:expertise,id',
                Rule::unique('portfolio_expertise')
                    ->where('portfolio_id', $id)
                    ->where('expertise_id', $id)
            ]
        ];
    }

    public function attributes()
    {
        return [
            'portfolio_id' => 'آیدی نمونه کار',
            'expertise_id' => 'تخصص نمونه کار'
        ];
    }
}
