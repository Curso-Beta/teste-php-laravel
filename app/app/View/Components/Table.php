<?php

namespace App\View\Components;

use Illuminate\Support\Arr;
use Illuminate\View\Component;
use stdClass;

class Table extends Component
{
    public $modelName;
    public $attr;
    public $heads;
    public $action;
    public $filters;
    public $columns;
    public $routeCreate;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($modelName, $action)
    {
        $className = "App\Models\\$modelName";
        $this->columns = ($className)::VISIBLE;
        $this->heads = ($className)::LABELS;
        $this->action = $action;
        $this->attr = array_combine(array_slice($this->heads, 1), $this->columns);
        $this->filters = array_slice($this->attr, 1);
        $this->routeCreate = Route(strtolower($modelName).'.create');
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.table');
    }
}
