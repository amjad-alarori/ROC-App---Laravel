<?php

namespace App\View\Components\cards;

use Illuminate\View\Component;

class CardWFull extends Component
{
    protected $title;
    /**
     * @var bool
     */
    private $withFoot;

    /**
     * Create a new component instance.
     *
     * @param $title
     * @param bool $withFoot
     */
    public function __construct($title, $withFoot=true)
    {
        $this->title=$title;
        $this->withFoot = $withFoot;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.cards.card-w-full',['title'=>$this->title, 'withFoot'=>$this->withFoot]);
    }
}
