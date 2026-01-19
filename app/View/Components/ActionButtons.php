<?php

namespace App\View\Components;

use Illuminate\View\Component;

class ActionButtons extends Component
{
    public $viewUrl;
    public $editUrl;
    public $deleteUrl;

    public $viewPermission;
    public $editPermission;
    public $deletePermission;

    public $confirm;

    public function __construct(
        $viewUrl = null,
        $editUrl = null,
        $deleteUrl = null,

        $viewPermission = null,
        $editPermission = null,
        $deletePermission = null,

        $confirm = 'Are you sure you want to delete this item?'
    ) {
        $this->viewUrl = $viewUrl;
        $this->editUrl = $editUrl;
        $this->deleteUrl = $deleteUrl;

        $this->viewPermission = $viewPermission;
        $this->editPermission = $editPermission;
        $this->deletePermission = $deletePermission;

        $this->confirm = $confirm;
    }

    public function render()
    {
        return view('components.action-buttons');
    }
}
