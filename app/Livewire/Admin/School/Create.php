<?php

namespace App\Livewire\Admin\School;

use App\Models\RollNumberPrefix;
use App\Models\Template;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;

    public $photoPreviewUrl = null;

    public
        $name,
        $email,
        $password,
        $photo;

    /**
     * Validation Rules
     */
    protected function rules()
    {
        return [
            'name'            =>      ['required'],
            'email'           =>      ['required', 'email', 'unique:users,email'],
            'password'        =>      ['required'],
            'photo'           =>      ['nullable', 'image', 'mimes:jpeg,jpg,png,webp'],
        ];
    }

    public function updated($fields)
    {
        $this->validateOnly($fields);
    }

    public function updatedPhoto()
    {
        $this->validateOnly('photo');
        $this->photoPreviewUrl = $this->photo->temporaryUrl();
    }

    public function storeSchool()
    {

        $this->validate();
        $logo = '';
        if ($this->photo) {
            $this->photo = Storage::disk('public')->put('/schools', $this->photo);
            $logo = Storage::disk('public')->put('/schoolLogos', $this->photo);
        }

        $school = User::create([
            'name'  => $this->name,
            'email' => $this->email,
            'photo' => $this->photo,
            'role'  => 2,
            'password'  => bcrypt($this->password)
        ]);

        Template::create([
            'school_id' => $school->id,
            'name' => $school->name,
            'logo' => $logo,
            'front_side' => getTemplateFrontSide(),
            'back_side' => getTemplateBackSide(),
        ]);

        RollNumberPrefix::create([
            'school_id' => $school->id,
            'prefix' => str_replace(" ", "-", $school->name),
        ]);

        $this->reset(['name', 'email', 'photo', 'password']);

        session()->flash('message', 'School Create Successfully.');
    }

    public function render()
    {
        return view('livewire.admin.school.create');
    }
}
