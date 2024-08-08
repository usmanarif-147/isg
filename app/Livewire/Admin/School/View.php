<?php

namespace App\Livewire\Admin\School;

use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Livewire\Component;
use Livewire\WithFileUploads;

class View extends Component
{
    use WithFileUploads;

    public $photoPreviewUrl;

    public $general = 1, $login = 1, $platform = 1;

    public $platforms;
    public $selected_platforms = [];

    public
        $schoolId,
        $name,
        $email,
        $password,
        $photo,
        $oldPhoto;


    /**
     * Mount
     */
    public function mount()
    {
        $this->schoolId = request()->id;
        $school = User::find($this->schoolId);
        if (!$school) {
            abort(404);
        }

        $this->name = $school->name;
        $this->email = $school->email;
        $this->oldPhoto = $school->photo;
        $this->photoPreviewUrl = url('') . '/storage/' . $school->photo;
    }

    /**
     * Validation Rules
     */
    protected function rules()
    {
        if ($this->general) {
            return [
                'name'          =>      ['required'],
                'photo'         =>      ['nullable', 'image', 'mimes:jpeg,jpg,png,webp'],
            ];
        }
        if ($this->login) {
            return [
                'email'         =>      ['required', 'email',  Rule::unique('users')->ignore($this->schoolId)],
                'password'      =>      ['required'],
            ];
        }
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

    public function updateGeneral()
    {
        $this->general = 1;
        $this->login = 0;

        $this->validate();

        if ($this->photo) {
            if ($this->oldPhoto) {
                Storage::disk('public')->delete($this->oldPhoto);
            }
            $this->photo = Storage::disk('public')->put('/schools', $this->photo);
        } else {
            $this->photo = $this->oldPhoto;
        }

        User::where('id', $this->schoolId)->update([
            'name' => $this->name,
            'photo' => $this->photo,
        ]);

        $this->reset('photo');

        $this->dispatch('swal:modal', [
            'title' =>  'Success',
            'text' => 'School Details Updated Successfully.',
            'icon' => 'success'
        ]);
    }

    public function updateLogin()
    {
        $this->general = 0;
        $this->login = 1;
        $this->validate();

        User::where('id', $this->schoolId)->update([
            'email' => $this->email,
            'password' => bcrypt($this->password),
        ]);

        $this->dispatch('swal:modal', [
            'title' =>  'Success',
            'text' => 'School Details Updated Successfully.',
            'icon' => 'success'
        ]);
    }

    public function render()
    {
        return view('livewire.admin.school.view');
    }
}
