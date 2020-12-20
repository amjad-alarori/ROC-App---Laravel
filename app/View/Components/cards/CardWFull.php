<?php

namespace App\View\Components\cards;

use Illuminate\View\Component;

class CardWFull extends Component
{
    protected $title;

    /**
     * Create a new component instance.
     *
     * @param $title
     */
    public function __construct($title)
    {
        $this->title=$title;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.cards.card-w-full',['title'=>$this->title]);
    }
}
