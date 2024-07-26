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
        $student = User::where('id', auth()->id())->first();
        if ($student->student_profile) {

            $profile = $student->student_profile;

            $this->about_me = $profile[0]['about_me'];
            $this->full_name = $profile[1]['full_name'];
            $this->cnic = $profile[2]['cnic'];
            $this->blood_group = $profile[3]['blood_group'];
            $this->phone = $profile[4]['phone'];
            $this->dob = $profile[5]['dob'];
            $this->nationality = $profile[6]['nationality'];
            $this->gender = $profile[7]['gender'];
            $this->bio = $profile[8]['bio'];

            $this->old_profile_photo = $profile[9]['profile_photo'];
            $this->old_cover_photo  = $profile[10]['cover_photo'];
            $this->profile_photo_preview = url('storage') . '/' . $profile[9]['profile_photo'];
            $this->cover_photo_preview = url('storage') . '/' . $profile[10]['cover_photo'];
        }
    }

    /**
     * Validation Rules
     */
    protected function rules()
    {
        // $rules = [
        //     'about_me'          =>      ['sometimes', 'string', 'max:255'],
        //     'full_name'         =>      ['sometimes', 'string', 'max:255'],
        //     'cnic'              =>      ['sometimes', 'string', 'max:20'],
        //     'blood_group'       =>      ['sometimes', 'string', 'max:10'],
        //     'phone'             =>      ['sometimes', 'string', 'max:20'],
        //     'dob'               =>      ['sometimes', 'date'],
        //     'nationality'       =>      ['sometimes', 'string', 'max:255'],
        //     'gender'            =>      ['sometimes', 'string', 'max:10'],
        //     'bio'               =>      ['sometimes', 'string'],
        //     'profile_photo'     =>      ['sometimes', 'nullable', 'mimes:jpg,jpeg,png,webp', 'max:4096'],
        //     'cover_photo'       =>      ['sometimes', 'nullable', 'mimes:jpg,jpeg,png,webp', 'max:4096'],
        // ];

        return [
            'about_me'          =>      'sometimes|string|max:255',
            'full_name'         =>      'sometimes|string|max:255',
            'cnic'              =>      'sometimes|string|max:20',
            'blood_group'       =>      'sometimes|string|max:10',
            'phone'             =>      'sometimes|string|max:20',
            'dob'               =>      'sometimes|date',
            'nationality'       =>      'sometimes|string|max:255',
            'gender'            =>      'sometimes|string|max:10',
            'bio'               =>      'sometimes|string',
            'profile_photo'     =>      'sometimes|nullable|mimes:jpg,jpeg,png,webp|max:4096',
            'cover_photo'       =>      'sometimes|nullable|mimes:jpg,jpeg,png,webp|max:4096',
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
        $studentData = [];

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

        foreach ($data as $key => $value) {
            if ($key == 'profile_photo') {
                array_push($studentData, ['enabled' => 1,  $key => $this->profile_photo ?? $this->old_profile_photo]);
            } elseif ($key == 'cover_photo') {
                array_push($studentData, ['enabled' => 1,  $key => $this->cover_photo ?? $this->old_cover_photo]);
            } else {
                array_push($studentData, ['enabled' => 1,  $key => $value]);
            }
        }

        User::where('id', auth()->id())->update(['student_profile' => $studentData]);

        session()->flash('message', 'Profile Updated Successfully.');
    }

    public function render()
    {
        return view('livewire.student.profile.edit');
    }
}
