<?php

namespace App\Livewire\Student\Setting\Tab;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class ChangePassword extends Component
{

    public $message = '';

    public $current_password,
        $password,
        $password_confirmation;

    public function rules()
    {
        return [
            'current_password' => 'required',
            'password' => 'required|min:8|confirmed',
        ];
    }

    public function updatedFileds($fields)
    {
        $this->validateOnly($fields);
    }

    public function updatePassword()
    {
        $this->validate();
        if (!Hash::check($this->current_password, Auth::user()->password)) {
            $this->message = 'The current password is incorrect.';
        } else {
            User::where('id', auth()->id())->update([
                'password' => Hash::make($this->password),
            ]);
            $this->message = 'Password updated successfully.';
        }
        $this->resetFields();
    }

    public function resetFields()
    {
        $this->current_password = '';
        $this->password = '';
        $this->password_confirmation = '';
    }


    public function render()
    {
        return view('livewire.student.setting.tab.change-password');
    }
}
