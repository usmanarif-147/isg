<?php

namespace App\Livewire\Student\Product;

use App\Models\StudentCard;
use App\Models\Template;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class Cards extends Component
{
    use WithFileUploads;

    public $tab = 1;

    public $frontFormFields, $backFormFields;
    public $frontFormData = [], $backFormData = [];

    public $cardStatus;

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

        $this->studentCardDetails();
    }

    public function studentCardDetails()
    {

        $studentCard = StudentCard::where('student_id', auth()->id())->first();
        $this->cardStatus = $studentCard->status;

        $frontSide = $studentCard->front_side;
        $backSide = $studentCard->back_side;
        foreach ($this->frontFormFields as $field) {
            $this->frontFormData[$field['model']] = '';
        }

        foreach ($this->frontFormData as $key => $value) {
            if (array_key_exists($key, $frontSide)) {
                $this->frontFormData[$key] = $frontSide[$key];
            } else {
                $this->frontFormData[$key] = '';
            }
        }
        foreach ($this->backFormFields as $field) {
            $this->backFormData[$field['model']] = '';
        }

        foreach ($this->backFormData as $key => $value) {
            if (array_key_exists($key, $backSide)) {
                $this->backFormData[$key] = $backSide[$key];
            } else {
                $this->backFormData[$key] = '';
            }
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

        $data['photo'] = isset($data['photo']) ? Storage::disk('public')->put('/cards', $data['photo']) : null;

        StudentCard::where('student_id', auth()->id())->update([
            'front_side' => $data,
            'status' => 1
        ]);

        $this->dispatch('swal:modal', [
            'title' => 'Success',
            'text' => 'Front Card Details Filled Successfully.',
            'icon' => 'success'
        ]);
    }

    public function saveBackForm()
    {
        $data = $this->validate();

        $data = $data['backFormData'];

        $data['photo'] = isset($data['photo']) ? Storage::disk('public')->put('/cards', $data['photo']) : null;

        StudentCard::where('student_id', auth()->id())->update([
            'back_side' => $data,
            'status' => 1
        ]);

        $this->dispatch('swal:modal', [
            'title' => 'Success',
            'text' => 'Back Card Details Filled Successfully.',
            'icon' => 'success'
        ]);
    }

    public function render()
    {
        return view('livewire.student.product.cards');
    }
}
