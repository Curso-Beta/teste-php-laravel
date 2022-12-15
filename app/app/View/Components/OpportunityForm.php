<?php

namespace App\View\Components;

use Illuminate\View\Component;

class OpportunityForm extends Component
{
    public $action;
    public $opportunity;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($action, $opportunity)
    {
        $this->action = $action;
        $this->opportunity = $opportunity;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.opportunity-form');
    }
}
