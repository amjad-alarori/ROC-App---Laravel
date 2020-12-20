<?php

namespace App\View\Components\form;

use Illuminate\View\Component;

class ModalButton extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
//        return function (array $data) {
            return view('components.form.modal-button', );
//        };
    }
}
