<?php

namespace App\Livewire;

use App\Models\Post;
use Livewire\Component;

class Search extends Component
{
    public $search = '';

    public function render()
    {
        $results = Post::where('title', 'like', '%' . $this->search . '%')->get();

        return view('livewire.search', ['results' => $results]);
    }
}
