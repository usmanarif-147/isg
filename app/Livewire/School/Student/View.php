<?php

namespace App\Livewire\School\Student;

use App\Models\Platform;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Livewire\Component;
use Livewire\WithFileUploads;

class View extends Component
{
    use WithFileUploads;

    public $general = 1, $login = 1, $platform = 1;

    public $photoPreviewUrl;

    public $platforms;
    public $selected_platforms = [];

    public
        $studentId,
        $first_name,
        $last_name,
        $email,
        $password,
        $photo,
        $oldPhoto;


    /**
     * Mount
     */
    public function mount()
    {
        $this->studentId = request()->id;
        $student = User::find($this->studentId);
        if (!$student) {
            abort(404);
        }

        $this->platforms = Platform::where('status', 1)
            ->pluck('title', 'id');
        $this->first_name = $student->first_name;
        $this->last_name = $student->last_name;
        $this->email = $student->email;

        $this->oldPhoto = $student->photo;
        $this->photoPreviewUrl = url('') . '/storage/' . $student->photo;

        $this->selected_platforms = $student->platforms->pluck('id')->toArray();
    }

    /**
     * Validation Rules
     */
    protected function rules()
    {
        if ($this->general) {
            return [
                'first_name'    =>      ['required'],
                'last_name'     =>      ['required'],
                'photo'         =>      ['nullable', 'image', 'mimes:jpeg,jpg,png,webp'],
            ];
        }
        if ($this->login) {
            return [
                'email'         =>      ['required', 'email',  Rule::unique('users')->ignore($this->studentId)],
                'password'      =>      ['required'],
            ];
        }
        if ($this->platform) {
            return [
                'selected_platforms'    =>      ['sometimes', 'array'],
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
        $this->platform = 0;

        $this->validate();

        if ($this->photo) {
            if ($this->oldPhoto) {
                Storage::disk('public')->delete($this->oldPhoto);
            }
            $this->photo = Storage::disk('public')->put('/students', $this->photo);
        } else {
            $this->photo = $this->oldPhoto;
        }

        User::where('id', $this->studentId)->update([
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'photo' => $this->photo,
        ]);

        $this->reset('photo');

        $this->dispatch('swal:modal', [
            'title' =>  'Success',
            'text' => 'Student Details Updated Successfully.',
            'icon' => 'success'
        ]);
    }

    public function updateLogin()
    {
        $this->general = 0;
        $this->login = 1;
        $this->platform = 0;
        $this->validate();

        User::where('id', $this->studentId)->update([
            'email' => $this->email,
            'password' => bcrypt($this->password),
        ]);

        $this->dispatch('swal:modal', [
            'title' =>  'Success',
            'text' => 'Student Details Updated Successfully.',
            'icon' => 'success'
        ]);
    }

    public function updatePlatform()
    {
        $this->general = 0;
        $this->login = 0;
        $this->platform = 1;

        $this->validate();

        $user = User::where('id', $this->studentId)->first();

        $user->platforms()->sync($this->selected_platforms);

        $this->dispatch('swal:modal', [
            'title' =>  'Success',
            'text' => 'Student Platforms Updated Successfully.',
            'icon' => 'success'
        ]);
    }

    public function render()
    {
        return view('livewire.school.student.view');
    }
}
