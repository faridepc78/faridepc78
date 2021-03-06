<?php

namespace App\Http\Requests\Admin\PortfolioSlider;

use Illuminate\Foundation\Http\FormRequest;

class CreatePortfolioSliderRequest extends FormRequest
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
        return [
            'portfolio_id' => ['required', 'exists:portfolio,id'],
            'image' => ['required', 'mimes:jpg,png,jpeg', 'max:5120']
        ];
    }

    public function attributes()
    {
        return [
            'portfolio_id' => 'آیدی نمونه کار',
            'image' => 'اسلایدر نمونه کار'
        ];
    }
}
