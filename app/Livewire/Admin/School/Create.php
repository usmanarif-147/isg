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

    public function storeSchool()
    {

        $this->validate();
        if ($this->photo) {
            $this->photo = Storage::disk('public')->put('/schools', $this->photo);
        }

        $school = User::create([
            'name'  => $this->name,
            'email' => $this->email,
            'photo' => $this->photo,
            'role'  => 2,
            'password'  => bcrypt($this->password)
        ]);

        $required_fields = [
            'front_side' => [
                'first_name' => 0,
                'last_name' => 0,
                'full_name' => 0,
                'cnic' => 0,
                'phone_number' => 0,
                'photo' => 0,
                'student_id' => 0,
                'address' => 0,
                'dob' => 0,
                'gender' => 0
            ],
            'back_side' => [
                'first_name' => 0,
                'last_name' => 0,
                'full_name' => 0,
                'cnic' => 0,
                'phone_number' => 0,
                'photo' => 0,
                'student_id' => 0,
                'address' => 0,
                'dob' => 0,
                'gender' => 0
            ]
        ];

        Template::create([
            'school_id' => $school->id,
            'name' => $school->name,
            'logo' => $school->photo,
            'required_fields' => $required_fields
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