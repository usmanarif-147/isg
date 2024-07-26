<?php

namespace App\Livewire\Admin\Setting;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class ChangePassword extends Component
{

    public $message = '', $background = '';
    public
        $old_password,
        $password,
        $password_confirmation;

    public function rules()
    {
        return [
            'old_password' => ['required'],
            'password' => ['required', 'confirmed'],
        ];
    }

    public function updated($fields)
    {
        $this->validateOnly($fields);
    }

    public function updatePassword()
    {
        $data = $this->validate();

        $user = User::where('id', auth()->id());
        if (!Hash::check($this->old_password, $user->first()->password)) {
            $this->message = 'Old Password is incorrect';
            $this->background = 'alert-danger';
        } else {
            User::where('id', auth()->id())->update([
                'password' => Hash::make($this->password)
            ]);
            $this->message = 'Password updated successfully';
            $this->background = 'alert-success';
        }
        $this->reset(['old_password', 'password', 'password_confirmation']);
    }

    public function resetFields()
    {
        $this->resetErrorBag();
        $this->old_password = '';
        $this->password = '';
        $this->password_confirmation = '';
    }


    public function render()
    {
        return view('livewire.admin.setting.change-password');
    }
}
