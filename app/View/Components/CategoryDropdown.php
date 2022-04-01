<?php

namespace App\View\Components;

use App\Models\Category;
use Illuminate\View\Component;

class CategoryDropdown extends Component
{

    public function render()
    {
        return view('components.category-dropdown')
            ->with([
                'categories' => Category::all(),
                'currentcat' => Category::firstwhere('slug', request('category'))
            ]);
    }
}
