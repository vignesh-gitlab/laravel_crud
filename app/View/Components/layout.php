<?php

namespace App\View\Components;

use Illuminate\View\Component;

class layout extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $title;
    public $pageTitle;
    public function __construct($title = 'CRUD', $pageTitle = 'CRUD')
    {
        $this->title = $title;
        $this->pageTitle = $pageTitle;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.layout');
    }
}