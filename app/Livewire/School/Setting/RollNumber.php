<?php

namespace App\Livewire\School\Setting;

use App\Models\RollNumberPrefix;
use Livewire\Component;

class RollNumber extends Component
{

    public
        $rollNumberId,
        $prefix;

    /**
     * Mount
     */
    public function mount()
    {
        $rollNumberPrefix = RollNumberPrefix::where('school_id', auth()->id())->first();
        if (!$rollNumberPrefix) {
            abort(404);
        }
        $this->rollNumberId = $rollNumberPrefix->id;
        $this->prefix = $rollNumberPrefix->prefix;
    }

    /**
     * Validation Rules
     */
    protected function rules()
    {
        return [
            'prefix'   =>     ['required'],
        ];
    }

    public function updated($fields)
    {
        $this->validateOnly($fields);
    }

    public function updatePrefix()
    {
        $this->validate();

        RollNumberPrefix::where('id', $this->rollNumberId)->update([
            'prefix' => $this->prefix,
        ]);

        session()->flash('generalMessage', 'Roll Number Prefix Updated Successfully.');
    }

    public function render()
    {
        return view('livewire.school.setting.roll-number');
    }
}
