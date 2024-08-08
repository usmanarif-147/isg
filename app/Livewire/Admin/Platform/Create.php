<?php

namespace App\Livewire\Admin\Platform;

use App\Models\Platform;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;

    public $photoPreviewUrl;
    public
        $title,
        $icon;

    /**
     * Validation Rules
     */
    protected function rules()
    {
        return [
            'title'    =>      ['required'],
            'icon'     =>      ['required', 'image', 'mimes:jpeg,jpg,png,webp'],
        ];
    }

    public function updated($fields)
    {
        $this->validateOnly($fields);
    }

    public function updatedIcon()
    {
        $this->validateOnly('icon');
        $this->photoPreviewUrl = $this->icon->temporaryUrl();
    }

    public function storePlatform()
    {
        $this->validate();
        if ($this->icon) {
            $this->icon = Storage::disk('public')->put('/platform', $this->icon);
        }

        Platform::create([
            'title'  => $this->title,
            'icon'  => $this->icon,
        ]);

        $this->reset();

        $this->dispatch('swal:modal', [
            'title' =>  'Success',
            'text' => 'Platform Added Succesfully',
            'icon' => 'success'
        ]);
    }

    #[On('ok-button-clicked')]
    public function okButtonClicked()
    {
        $this->redirectRoute('admin.platforms');
    }

    public function render()
    {
        return view('livewire.admin.platform.create');
    }
}
