<?php

namespace App\Livewire\Admin\Platform;

use App\Models\Platform;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class View extends Component
{
    use WithFileUploads;

    public
        $platformId,
        $title,
        $oldIcon,
        $icon;

    /**
     * Mount
     */
    public function mount()
    {
        $this->platformId = request()->id;
        $platform = Platform::find($this->platformId);
        if (!$platform) {
            abort(404);
        }

        $this->title = $platform->title;
        $this->oldIcon = $platform->icon;
    }

    /**
     * Validation Rules
     */
    protected function rules()
    {
        return [
            'title'         =>      ['required'],
            'icon'          =>      ['nullable', 'image', 'mimes:jpeg,jpg,png,webp'],
        ];
    }

    public function updatedPlatform($fields)
    {
        $this->validateOnly($fields);
    }

    public function updatePlatform()
    {

        $this->validate();

        if ($this->icon) {
            if ($this->oldIcon) {
                Storage::disk('public')->delete($this->oldIcon);
            }
            $this->icon = Storage::disk('public')->put('/platform', $this->icon);
        } else {
            $this->icon = $this->oldIcon;
        }

        Platform::where('id', $this->platformId)->update([
            'title' => $this->title,
            'icon' => $this->icon,
        ]);

        $this->reset('icon');

        session()->flash('message', 'Platform Details Updated Successfully.');
    }

    public function render()
    {
        return view('livewire.admin.platform.view');
    }
}
