<?php

namespace App\View\Components;

use Illuminate\View\Component;

class CandidateForm extends Component
{
    public $action;
    public $candidate;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($action, $candidate)
    {
        $this->action = $action;
        $this->candidate = $candidate;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.candidate-form');
    }
}
