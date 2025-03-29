<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class TextSelect extends Component
{
   
    /**
     * Create a new component instance.
     */
    public $name;
    public $label;
    public $options;

    public function __construct($name, $label, $options)
    {
        $this->name = $name;
        $this->label = $label;
        $this->options = $options; // This will be the collection or array passed from the controller
    }

    public function render()
    {
        return view('components.text-select');
    }
}
