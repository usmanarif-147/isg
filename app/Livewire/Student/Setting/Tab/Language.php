<?php

namespace App\Livewire\Student\Setting\Tab;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Language extends Component
{
    public $currentLanguage;

    public function mount()
    {
        $this->currentLanguage = Auth::user()->language;
    }

    public function switchLanguage($lang)
    {
        $user = Auth::user();
        $user->language = $lang;
        $user->save();

        $this->currentLanguage = $lang;
        session()->put('locale', $lang);
        return redirect(request()->header('Referer'));
    }
    public function render()
    {
        return view('livewire.student.setting.tab.language');
    }
}
