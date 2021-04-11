<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Post;

class ShowPost extends Component
{

    public $search, $row = 'id', $direction = 'desc';

    protected $listeners = ['render']; // CUANDO ES IGUAL AL NOMBRE DEL METODO NO ES NECESARIO ESPECIFICAR

    public function render()
    {
        $posts = Post::where('title', 'like', '%' . $this->search . '%')
                        ->orWhere('content', 'like', '%' . $this->search . '%')
                        ->orderBy($this->row, $this->direction)
                        ->get();

        return view('livewire.show-post', compact('posts'));
    }

    public function order($row)
    {

        if($this->row == $row)
        {
            $this->direction = $this->direction == 'desc' ? 'asc' : 'desc';
            // if($this->direction == 'desc') $this->direction = 'asc';
            // else $this->direction = 'desc';
        }
        else
        {
            $this->row = $row;
            $this->direction = 'asc';
        }

    }
}
