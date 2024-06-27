<?php

namespace App\Livewire\Category;

use App\Models\Category;
use Livewire\Attributes\Validate;
use Livewire\Component;

class Edit extends Component
{
    public Category $category;

    #[Validate('required', message: 'Inserisci la categoria')]
    public $name = '';

    public function mount()
    {
        $this->name = $this->category->name;
       
    }

    public function update()
    {
        $this->validate();
        $this->category->update([
            'name' => $this->name,
            
        ]);

        return redirect()->route('categories.index');
    }
    public function render()
    {
        return view('livewire.category.edit');
    }
}
