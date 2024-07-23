<?php

namespace App\Livewire\Student\Profile;

use App\Models\User;
use App\Models\UserProfile;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class Edit extends Component
{
    use WithFileUploads;

    public $student;

    public $profile_photo_preview, $cover_photo_preview, $old_profile_photo, $old_cover_photo;

    public
        $about_me,
        $full_name,
        $profile_photo,
        $cover_photo,
        $cnic,
        $blood_group,
        $phone,
        $dob,
        $nationality,
        $gender,
        $bio;

    public function mount()
    {
        $student = UserProfile::where('user_id', auth()->id())->first();

        $this->about_me = $student->about_me;
        $this->full_name = $student->full_name;
        $this->profile_photo_preview = url('storage') . '/' . $student->profile_photo;
        $this->cover_photo_preview = url('storage') . '/' . $student->cover_photo;
        $this->old_profile_photo = $student->profile_photo;
        $this->old_cover_photo  = $student->cover_photo;
        $this->cnic = $student->cnic;
        $this->blood_group = $student->blood_group;
        $this->phone = $student->phone;
        $this->dob = $student->dob;
        $this->nationality = $student->nationality;
        $this->gender = $student->gender;
        $this->bio = $student->bio;
    }

    /**
     * Validation Rules
     */
    protected function rules()
    {
        return [
            'about_me'          =>      ['sometimes', 'string', 'max:255'],
            'full_name'         =>      ['sometimes', 'string', 'max:255'],
            'cnic'              =>      ['sometimes', 'string', 'max:20'],
            'blood_group'       =>      ['sometimes', 'string', 'max:10'],
            'phone'             =>      ['sometimes', 'string', 'max:20'],
            'dob'               =>      ['sometimes', 'date'],
            'nationality'       =>      ['sometimes', 'string', 'max:255'],
            'gender'            =>      ['sometimes', 'string', 'max:10'],
            'bio'               =>      ['sometimes', 'string'],
            'profile_photo'     =>      ['sometimes', 'nullable', 'mimes:jpg,jpeg,png,webp', 'max:4096'],
            'cover_photo'       =>      ['sometimes', 'nullable', 'mimes:jpg,jpeg,png,webp', 'max:4096'],
        ];
    }

    public function updated($fields)
    {
        $this->validateOnly($fields);
    }
    public function updatedProfilePhoto()
    {
        $this->profile_photo_preview = $this->profile_photo->temporaryUrl();
    }
    public function updatedCoverPhoto()
    {
        $this->cover_photo_preview = $this->cover_photo->temporaryUrl();
    }

    public function updateProfile()
    {
        $data = $this->validate();
        if ($this->profile_photo) {
            if ($this->old_profile_photo) {
                Storage::disk('public')->delete($this->old_profile_photo);
            }
            $this->profile_photo = Storage::disk('public')->put('/students', $this->profile_photo);
        }
        if ($this->cover_photo) {
            if ($this->old_cover_photo) {
                Storage::disk('public')->delete($this->old_cover_photo);
            }
            $this->cover_photo = Storage::disk('public')->put('/students', $this->cover_photo);
        }

        UserProfile::where('user_id', auth()->id())
            ->update([
                'about_me'      => $this->about_me,
                'full_name'     => $this->full_name,
                'profile_photo' => $this->profile_photo ?? $this->old_profile_photo,
                'cover_photo'   => $this->cover_photo ?? $this->old_cover_photo,
                'cnic'          => $this->cnic,
                'blood_group'   => $this->blood_group,
                'phone'         => $this->phone,
                'dob'           => $this->dob,
                'nationality'   => $this->nationality,
                'gender'        => $this->gender,
                'bio'           => $this->bio,
            ]);

        session()->flash('message', 'Profile Updated Successfully.');
    }

    public function render()
    {
        return view('livewire.student.profile.edit');
    }
}
