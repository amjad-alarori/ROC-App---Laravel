<?php

namespace App\View\Components\form;

use Illuminate\View\Component;

class Modal extends Component
{
    public $title;
    public $submitText;

    /**
     * Create a new component instance.
     *
     * @param $title
     * @param $submitText
     */
    public function __construct($title, $submitText)
    {
        $this->title = $title;
        $this->submitText = $submitText;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.form.modal', ['title' => $this->title, 'submitText' => $this->submitText]);
    }
}
