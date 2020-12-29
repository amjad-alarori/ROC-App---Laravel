<?php

namespace App\View\Components;

use Illuminate\View\Component;
use function PHPUnit\Framework\isNull;

class ProfileCard extends Component
{
    private $cardImage;
    private $title;
    private $bgImage;

    /**
     * Create a new component instance.
     *
     * @param $cardImage
     * @param $title
     * @param $bgImage
     */
    public function __construct($cardImage, $title, $bgImage = null)
    {
        $this->cardImage = $cardImage;
        $this->title = $title;
        $this->bgImage = $bgImage;
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
                'bgImage' => $this->bgImage,
                'title' => $this->title
            ]);
    }
}
