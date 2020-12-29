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
     * @var string
     */
    private $compId;


    /**
     * Create a new component instance.
     * @param String $order
     * @param $collapsed
     * @param string $compId
     */
    public function __construct(string $order, $collapsed, $compId = 'accordionComp')
    {
        $this->order = $order;
        $this->collapsed = $collapsed;
        $this->compId = $compId;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.cards.accordion-card', ['order' => $this->order, 'collapsed' => $this->collapsed, 'compId' => $this->compId]);
    }
}
