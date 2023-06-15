<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class SweetAlert extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public string $title,
        public string $text,
        public string $icon,

        public string $confirmtext,
        public string $confirmcolor,
        public string $confirmicon,
        public string $confirmresult,

        public string $canceltext,
        public string $cancelcolor,
        public string $cancelicon,
        public string $cancelresult,

        public string $url,
        public array $body
    )
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.sweet-alert');
    }
}
