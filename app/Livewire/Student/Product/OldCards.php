<?php

namespace App\Livewire\Student\Product;

use App\Models\Template;
use App\Models\User;
use Livewire\Component;

class OldCards extends Component
{

    public $tab = 1;

    public $frontFormFields, $backFormFields;

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

        foreach (array_merge($this->frontFormFields, $this->backFormFields) as $field) {
            $this->formData[$field['model']] = '';
        }
    }

    public function showFrontForm()
    {
        $this->tab = 1;
    }
    public function showBackForm()
    {
        $this->tab = 2;
    }

    protected function rules()
    {
        // $frontFormRules = [];
        // $backFormRules = [];
        // if ($this->tab == 1) {
        //     foreach ($this->frontFormFields as $field) {
        //         $frontFormRules[$field['model']] = $field['validation_rules'];
        //     }
        //     return $frontFormRules;
        // }
        // if ($this->tab == 2) {
        //     foreach ($this->backFormFields as $field) {
        //         $backFormRules[$field['model']] = $field['validation_rules'];
        //     }
        //     return $backFormRules;
        // }

        $rules = [];
        if ($this->tab == 1) {
            foreach ($this->frontFormFields as $field) {
                $rules[$field['model']] = $field['validation_rules'];
            }
        } elseif ($this->tab == 2) {
            foreach ($this->backFormFields as $field) {
                $rules[$field['model']] = $field['validation_rules'];
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
        dd($data);
    }

    public function saveBackForm()
    {
        $data = $this->validate();
        dd($data);
    }

    public function render()
    {

        return view('livewire.student.product.cards');
    }
}
