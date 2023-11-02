<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ImageUserProfile extends Component
{
    /**
     * Create a new component instance.
     */
    public $photo;
    public $width;
    public $height;
    public function __construct($photo, $width = '40px', $height = '40px')
    {
        $this->photo = $photo;
        $this->width .= $width;
        $this->height .= $height;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.image-user-profile');
    }
}
