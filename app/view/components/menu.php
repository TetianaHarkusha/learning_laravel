<?php

namespace App\View\Components;

use Illuminate\View\Component;

class menu extends Component
{
    public $class;
    public $liClass;
    public $aClassFirst;
    public $aClass;
    /**
     * Create a new component instance.
     *
     * @param string $class
     * @param string $liClass
     * @param string $aClassFirst
     * @param string $aClass
     * @return void
     */
    public function __construct(string $class, string $liClass, string $aClassFirst, string $aClass)
    {
        $this->class = $class;
        $this->liClass = $liClass;
        $this->aClassFirst = $aClassFirst;
        $this->aClass = $aClass;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.menu');
    }
}
