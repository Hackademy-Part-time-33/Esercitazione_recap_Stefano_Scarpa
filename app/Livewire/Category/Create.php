<?php

namespace App\Livewire\Category;

use App\Models\Category;
use Livewire\Attributes\Validate;
use Livewire\Component;

class Create extends Component
{

    #[Validate('required')]

    public $name = '';

    public function store(){
        Category::create([
            'name' => $this->name,
        ]);

        return redirect()->route('categories.index');
    }

    public function render()
    {
        return view('livewire.category.create');
    }
}
