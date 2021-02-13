<?php

namespace App\Http\Requests\PortfolioSlider;

use Illuminate\Foundation\Http\FormRequest;

class CreatePortfolioSliderRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'portfolio_id'=>'required|exists:portfolio,id',
            'image' => 'required|mimes:jpg,png,jpeg|max:1024'
        ];
    }

    public function attributes()
    {
        return [
            'portfolio_id'=>'آیدی نمونه کار',
            'image' => 'اسلایدر نمونه کار'
        ];
    }
}
