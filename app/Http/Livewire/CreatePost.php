<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Livewire\Component;

class CreatePost extends Component
{

    public $open = true;

    public $title, $content;

    protected $rules = [
        'title' => 'required',
        'content' => 'required',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function save()
    {
        $this->validate();

        Post::create([
            'title' => $this->title,
            'content' => $this->content,
        ]);

        $this->reset(['open', 'title', 'content']);

        $this->emitTo('show-post','render');

        $this->emit('alert', 'El post se creo satisfactoriamente');

    }

    public function render()
    {
        return view('livewire.create-post');
    }
}
