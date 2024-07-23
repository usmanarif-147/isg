<?php

namespace App\Livewire\School\Student;

use App\Models\Platform;
use App\Models\User;
use App\Models\UserProfile;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;

    public $platforms;

    public
        $first_name,
        $last_name,
        $email,
        $password,
        $selected_platforms = [],
        $photo;

    public function mount()
    {
        $this->platforms = Platform::where('status', 1)->pluck('title', 'id');
    }

    /**
     * Validation Rules
     */
    protected function rules()
    {
        return [
            'first_name'            =>      ['required'],
            'last_name'             =>      ['required'],
            'selected_platforms'    =>      ['sometimes', 'array'],
            'email'                 =>      ['required', 'email', 'unique:users,email'],
            'password'              =>      ['required'],
            'photo'                 =>      ['required', 'image', 'mimes:jpeg,jpg,png,webp'],
        ];
    }

    public function updated($fields)
    {
        $this->validateOnly($fields);
    }

    public function storeStudent()
    {

        $this->validate();
        if ($this->photo) {
            $this->photo = Storage::disk('public')->put('/students', $this->photo);
        }

        $user = User::create([
            'school_id' => auth()->id(),
            'first_name'  => $this->first_name,
            'last_name'  => $this->last_name,
            'email'  => $this->email,
            'roll_number'  => \Str::uuid(),
            'photo'  => $this->photo,
            'password'  => bcrypt($this->password),
            'role' => 3
        ]);

        if (count($this->selected_platforms)) {
            $user->platforms()->sync($this->selected_platforms);
        }

        $this->reset(['first_name', 'last_name', 'email', 'photo', 'password', 'selected_platforms']);

        session()->flash('message', 'Student Create Successfully.');
    }

    public function render()
    {
        return view('livewire.school.student.create');
    }
}