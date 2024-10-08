<?php

namespace App\View\Components\Custom;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ConfirmPopup extends Component
{
    public $method, $actionBtnText, $actionBtnColor, $body;
    /**
     * Create a new component instance.
     */
    public function __construct($method, $actionBtnText, $actionBtnColor, $body)
    {
        $this->method = $method;
        $this->actionBtnText = $actionBtnText;
        $this->actionBtnColor = $actionBtnColor;
        $this->body = $body;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.custom.confirm-popup');
    }
}
