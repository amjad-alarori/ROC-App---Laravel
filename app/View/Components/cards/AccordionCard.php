<?php

namespace App\View\Components\cards;

use Illuminate\View\Component;
use phpDocumentor\Reflection\Types\Boolean;

class AccordionCard extends Component
{
    /**
     * @var String
     */
    private $order;
    /**
     * @var Boolean
     */
    private $collapsed;


    /**
     * Create a new component instance.
     * @param String $order
     * @param $collapsed
     */
    public function __construct(String $order, $collapsed)
    {
        $this->order = $order;
        $this->collapsed = $collapsed;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.cards.accordion-card', ['order'=>$this->order, 'collapsed'=>$this->collapsed]);
    }
}
