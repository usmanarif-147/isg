<?php

namespace App\Livewire\School\Setting;

use App\Models\Template as ModelsTemplate;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class Template extends Component
{
    use WithFileUploads;

    public $photoPreviewUrl;

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
        $this->photoPreviewUrl = url('') . '/storage/' . $template->logo;

        $this->front_side_fields = $template->front_side;
        $this->back_side_fields = $template->back_side;

        $this->selected_front_side_fields = array_keys(array_filter($this->front_side_fields, fn ($field) => $field['enabled']));
        $this->selected_back_side_fields = array_keys(array_filter($this->back_side_fields, fn ($field) => $field['enabled']));
    }

    /**
     * Validation Rules
     */
    protected function rules()
    {
        if ($this->general) {
            return [
                'name'    =>      ['required'],
                'logo'    =>      ['required', 'image', 'mimes:jpeg,jpg,png,webp'],
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

    public function updatedLogo()
    {
        $this->validateOnly('logo');
        $this->photoPreviewUrl = $this->logo->temporaryUrl();
    }

    public function updateGeneral()
    {
        $this->general = 1;
        $this->front_side = 0;
        $this->back_side = 0;

        $this->validate();

        if ($this->logo) {
            if ($this->oldLogo) {
                Storage::disk('public')->delete($this->oldLogo);
            }
            $this->logo = Storage::disk('public')->put('/school-logos', $this->logo);
        } else {
            $this->logo = $this->oldLogo;
        }

        ModelsTemplate::where('id', $this->templateId)->update([
            'name' => $this->name,
            'logo' => $this->logo
        ]);

        session()->flash('generalMessage', 'Student Details Updated Successfully.');
    }

    public function updateFrontSideFields()
    {
        $this->general = 0;
        $this->front_side = 1;
        $this->back_side = 0;
        $this->validate();

        foreach ($this->front_side_fields as $key => &$field) {
            $field['enabled'] = in_array($key, $this->selected_front_side_fields) ? 1 : 0;
        }

        ModelsTemplate::where('id', $this->templateId)
            ->update(['front_side' => $this->front_side_fields]);

        session()->flash('frontSideMessage', 'Front Fields Updated Successfully.');
    }

    public function updateBackSideFields()
    {
        $this->general = 0;
        $this->front_side = 0;
        $this->back_side = 1;

        $data = $this->validate();

        foreach ($this->back_side_fields as $key => &$field) {
            $field['enabled'] = in_array($key, $this->selected_back_side_fields) ? 1 : 0;
        }

        ModelsTemplate::where('id', $this->templateId)
            ->update(['back_side' => $this->back_side_fields]);

        session()->flash('backSideMessage', 'Back Side Fields Updated Successfully.');
    }

    public function render()
    {
        return view('livewire.school.setting.template');
    }
}
