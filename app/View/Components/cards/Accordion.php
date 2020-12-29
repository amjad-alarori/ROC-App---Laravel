<?php

namespace App\View\Components\cards;

use Illuminate\View\Component;

class Accordion extends Component
{
    /**
     * @var string
     */
    private $compId;

    /**
     * Create a new component instance.
     *
     * @param string $compId
     */
    public function __construct($compId='accordionComp')
    {
        $this->compId = $compId;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.cards.accordion',['compId'=>$this->compId]);
    }
}
