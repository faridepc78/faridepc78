<?php

namespace App\Http\Requests\Admin\PortfolioCategory;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePortfolioCategoryRequest extends FormRequest
{
    public function authorize()
    {
        return auth()->check() == true;
    }

    public function rules()
    {
        $id = request()->route('portfolio_category');

        return [
            'name' => ['required', 'string', 'max:255'],
            'slug' => ['required', 'string', 'max:255', 'unique:portfolio_category,slug,' . $id],
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'نام دسته بندی نمونه کار',
            'slug' => 'اسلاگ دسته بندی نمونه کار'
        ];
    }
}
