<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Icon extends Component
{
    public $name;
    public $class;
    public $size;

    public function __construct(string $name, string $class = '', string $size = null)
    {
        $this->name = $name;
        $this->class = $class;
        $this->size = $size;
    }

    public function render()
    {
        return view('components.icon');
    }
}

