<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Icon extends Component
{
    public string $style;

    public string $name;

    public function __construct(string $name, ?string $style = null)
    {
        $this->name = $name;
        $this->style = $style ?? 'outline';
    }

    public function render()
    {
        return view('components.icon');
    }
}
