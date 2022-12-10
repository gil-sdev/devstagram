<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Models\Post;

class ListarPost extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $posts;

    public function __construct($post)
    {
        $this->posts = $post;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        // Se encia automaticamente la variable publica o prpoedad posts a la vista
        return view('components.listar-post');
    }
}
