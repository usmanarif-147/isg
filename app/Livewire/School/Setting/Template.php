<?php

namespace App\Livewire\School\Setting;

use App\Models\Template as ModelsTemplate;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class Template extends Component
{
    use WithFileUploads;

    public $general = 1, $front_side = 1, $back_side = 1;

    public $front_side_fields, $back_side_fields;
    public $selected_front_side_fields = [], $selected_back_side_fields = [];

    public
        $templateId,
        $name,
        $logo,
        $oldLogo;


    /**
     * Mount
     */
    public function mount()
    {

        $template = ModelsTemplate::where('school_id', auth()->id())->first();
        if (!$template) {
            abort(404);
        }
        $this->templateId = $template->id;

        $this->name = $template->name;
        $this->oldLogo = $template->logo;
        $this->front_side_fields = $template->required_fields['front_side'];
        $this->back_side_fields = $template->required_fields['back_side'];

        // $this->platforms = Platform::where('status', 1)
        // ->pluck('title', 'id');

        // $this->selected_platforms = $student->platforms->pluck('id')->toArray();
    }

    /**
     * Validation Rules
     */
    protected function rules()
    {
        if ($this->general) {
            return [
                'name'    =>      ['required'],
                'logo'    =>      ['nullable', 'image', 'mimes:jpeg,jpg,png,webp'],
            ];
        }
        if ($this->front_side) {
            return [
                'selected_front_side_fields'    =>      ['sometimes', 'array'],
            ];
        }
        if ($this->back_side) {
            return [
                'selected_back_side_fields'     =>      ['sometimes', 'array'],
            ];
        }
    }

    public function updated($fields)
    {
        $this->validateOnly($fields);
    }

    public function updateGeneral()
    {
        $this->general = 1;
        $this->front_side = 0;
        $this->back_side = 0;

        $data = $this->validate();
        dd($data);

        if ($this->logo) {
            if ($this->oldLogo) {
                Storage::disk('public')->delete($this->oldLogo);
            }
            $this->logo = Storage::disk('public')->put('/schools', $this->logo);
        } else {
            $this->logo = $this->oldLogo;
        }

        // User::where('id', $this->studentId)->update([
        //     'first_name' => $this->first_name,
        //     'last_name' => $this->last_name,
        //     'photo' => $this->photo,
        // ]);

        // $this->reset('photo');

        session()->flash('generalMessage', 'Student Details Updated Successfully.');
    }

    public function updateFrontSideFields()
    {
        $this->general = 0;
        $this->front_side = 1;
        $this->back_side = 0;
        $data = $this->validate();
        dd($data);

        // User::where('id', $this->studentId)->update([
        //     'email' => $this->email,
        //     'password' => bcrypt($this->password),
        // ]);

        // session()->flash('loginMessage', 'Student Details Updated Successfully.');
    }

    public function updateBackSideFields()
    {
        $this->general = 0;
        $this->front_side = 0;
        $this->back_side = 1;

        $data = $this->validate();
        dd($data);

        // $user = User::where('id', $this->studentId)->first();

        // $user->platforms()->sync($this->selected_platforms);

        // session()->flash('platformMessage', 'Student Platforms Updated Successfully.');
    }

    public function render()
    {
        return view('livewire.school.setting.template');
    }
}
