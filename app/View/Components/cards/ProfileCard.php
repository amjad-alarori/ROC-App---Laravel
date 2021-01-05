<?php

namespace App\View\Components\cards;

use Illuminate\View\Component;
use function PHPUnit\Framework\isNull;

class ProfileCard extends Component
{
    private $cardImage;
    private $title;

    /**
     * Create a new component instance.
     *
     * @param $cardImage
     * @param $title
     */
    public function __construct($cardImage, $title)
    {
        $this->cardImage = $cardImage;
        $this->title = $title;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.cards.profile-card',
            [
                'cardImage' => $this->cardImage,
                'title' => $this->title
            ]);
    }
}
