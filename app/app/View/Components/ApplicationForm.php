<?php

namespace App\View\Components;

use Illuminate\View\Component;

class ApplicationForm extends Component
{
    public $action;
    public $candidates;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($action, $candidates)
    {
        $this->action = $action;
        $this->candidates = $candidates;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.application-form');
    }
}
