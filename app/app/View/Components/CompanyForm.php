<?php

namespace App\View\Components;

use Illuminate\View\Component;

class CompanyForm extends Component
{
    public $company;
    public $action;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($action, $company = null)
    {
        $this->action = $action;
        $this->company = $company;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.company-form');
    }
}
