<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Form extends Component
{
    public $record;
    /**
     * Create a new component instance.
     *
     *  @param array $record
     *  @return void
     */
    public function __construct($record)
    {
        if (isset($record)) {
            $this->record = $record;
        }
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.form.index');
    }
}
