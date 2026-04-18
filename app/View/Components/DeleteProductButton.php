<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class DeleteProductButton extends Component
{
    public string $action;
    public string $confirm;

    /**
     * Create a new component instance.
     */
    public function __construct(string $action, string $confirm = 'Are you sure want to delete this item?')
    {
        $this->action = $action;
        $this->confirm = $confirm;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.delete-product-button');
    }
}
