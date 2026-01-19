<?php

namespace App\View\Components;

use Illuminate\View\Component;

class PageHeader extends Component
{
    public $title;
    public $breadcrumbs;

    public function __construct($title = null, $breadcrumbs = null)
    {
        $this->title = $title;
        $this->breadcrumbs = $breadcrumbs;
    }

    public function render()
    {
        return view('components.page-header');
    }
}
