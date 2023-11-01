<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Sweetalert extends Component
{
    /**
     * Create a new component instance.
     */
    public $type;
    public $head;
    public $body;
    public function __construct($type, $head ,$body)
    {
        $this->type = $type;
        $this->head = $head;
        $this->body = $body;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.sweetalert');
    }
}
