<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Table extends Component
{
    public $columnNames;
    public $records;
    /**
     * Create a new component instance.
     *
     * @param array $columnNames
     * @param array $user
     * @return void
     */
    public function __construct($columnNames, $records)
    {
        $this->columnNames = $columnNames;
        $this->records = $records;
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
