<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Card extends Component
{
    public ?string $header;
    public ?string $headerClass;
    public ?string $footer;
    public ?string $footerClass;
    public ?string $href;
    public ?string $target;

    /**
     * Create a new component instance.
     */
    public function __construct(
        string $header = null,
        string $headerClass = null,
        string $footer = null,
        string $footerClass = null,
        string $href = null,
        string $target = null,
    ) {
        $this->header = $header;
        $this->headerClass = $headerClass;
        $this->footer = $footer;
        $this->footerClass = $footerClass;
        $this->href = $href;
        $this->target = $target;
    }

    /**
     * Get the view that represents the component.
     */
    public function render()
    {
        return view('components.card');
    }
}
