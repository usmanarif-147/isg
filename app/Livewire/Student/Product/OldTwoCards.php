<?php

namespace App\Livewire\Student\Product;

use App\Models\StudentCard;
use App\Models\Template;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class OldTwoCards extends Component
{
    use WithFileUploads;

    public $tab = 1, $method = 'saveFrontForm', $data = '', $formSide = '';

    public $frontFormFields, $backFormFields;
    public $frontFormData = [], $backFormData = [];

    public function mount()
    {
        $student = User::where('id', auth()->id())->first();
        $schoolTemplate = Template::where('school_id', $student->school_id)->first();
        $frontSide = $schoolTemplate->front_side;
        $backSide = $schoolTemplate->back_side;

        $this->frontFormFields = array_filter($frontSide, function ($field) {
            return $field['enabled'] == 1;
        });

        usort($this->frontFormFields, function ($a, $b) {
            $order = ['text' => 1, 'email' => 2, 'date' => 3, 'select' => 4, 'file' => 5];
            return $order[$a['input_type']] <=> $order[$b['input_type']];
        });

        $this->backFormFields = array_filter($backSide, function ($field) {
            return $field['enabled'] == 1;
        });

        usort($this->backFormFields, function ($a, $b) {
            $order = ['text' => 1, 'email' => 2, 'date' => 3, 'select' => 4, 'file' => 5];
            return $order[$a['input_type']] <=> $order[$b['input_type']];
        });

        foreach ($this->frontFormFields as $field) {
            $this->frontFormData[$field['model']] = '';
        }
        foreach ($this->backFormFields as $field) {
            $this->backFormData[$field['model']] = '';
        }
        $this->showFrontForm();
    }

    public function showFrontForm()
    {
        $this->tab = 1;
        $this->method = 'saveFrontForm';
        $this->data = $this->frontFormFields;
        $this->formSide = 'frontFormData';
    }
    public function showBackForm()
    {
        $this->tab = 2;
        $this->method = 'saveBackForm';
        $this->data = $this->backFormFields;
        $this->formSide = 'backFormData';
    }

    protected function rules()
    {
        $rules = [];
        if ($this->tab == 1) {
            foreach ($this->frontFormFields as $field) {
                $rules['frontFormData.' . $field['model']] = $field['validation_rules'];
            }
        } elseif ($this->tab == 2) {
            foreach ($this->backFormFields as $field) {
                $rules['backFormData.' . $field['model']] = $field['validation_rules'];
            }
        }
        return $rules;
    }

    public function updated($fields)
    {
        $this->validateOnly($fields);
    }

    public function saveFrontForm()
    {
        $data = $this->validate();

        $data = $data['frontFormData'];

        if ($data['photo']) {
            $data['photo'] = Storage::disk('public')->put('/cards', $data['photo']);
        }

        StudentCard::where('student_id', auth()->id())->update([
            'front_side' => $data
        ]);

        dd("student front side updated");
    }

    public function saveBackForm()
    {
        $data = $this->validate();

        $data = $data['backFormData'];

        if ($data['photo']) {
            $data['photo'] = Storage::disk('public')->put('/cards', $data['photo']);
        }

        StudentCard::where('student_id', auth()->id())->update([
            'back_side' => $data
        ]);

        dd("student back side updated");
    }

    public function render()
    {

        return view('livewire.student.product.cards');
    }
}
