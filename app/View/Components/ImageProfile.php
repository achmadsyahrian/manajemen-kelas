<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ImageProfile extends Component
{
    /**
     * Create a new component instance.
     */
    public $photo;
    public function __construct($photo)
    {
        $this->photo = $photo;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.images.image-profile');
    }
}
