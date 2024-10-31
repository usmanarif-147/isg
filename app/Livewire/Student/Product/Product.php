<?php

namespace App\Livewire\Student\Product;

use App\Models\StudentCard;
use App\Models\Template;
use Livewire\Component;

class Product extends Component
{
    public $card, $hasEnabledFront, $hasEnabledBack;
    public function mount()
    {
        $this->card = StudentCard::where('student_id', auth()->id())->first();
        $schoolTemplate = Template::where('school_id', $this->card->school_id)->first();
        $frontSide = $schoolTemplate->front_side;
        $backSide = $schoolTemplate->back_side;
        $this->hasEnabledFront = array_filter($frontSide, fn($item) => isset ($item['enabled']) && $item['enabled'] === 1);
        $this->hasEnabledBack = array_filter($backSide, fn($item) => isset ($item['enabled']) && $item['enabled'] === 1);
    }
    public function render()
    {
        return view('livewire.student.product.product');
    }
}
