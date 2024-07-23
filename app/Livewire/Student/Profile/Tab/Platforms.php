<?php

namespace App\Livewire\Student\Profile\Tab;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Platforms extends Component
{
    public $platforms;

    public $platformId, $platformTitle, $platformIcon;

    public $label, $path;

    public $modalTitle, $modalFormAction, $modalBtnColor, $modalBtnText;

    public $userPlatform;

    protected function rules()
    {
        return [
            'path'      => ['required'],
        ];
    }

    public function updated($fields)
    {
        $this->validateOnly($fields);
    }

    public function addPlatform($id, $title)
    {
        $this->platformId = $id;
        $this->platformTitle = $title;
        $this->modalTitle = "Add";
        $this->modalFormAction = "savePlatform";
        $this->modalBtnColor = "btn-primary";
        $this->modalBtnText = "Save";

        $this->dispatch('show-modal');
    }
    public function savePlatform()
    {
        $this->validate();
        DB::table('platform_user')
            ->where('platform_id', $this->platformId)
            ->where('user_id', auth()->id())
            ->update([
                'path' => $this->path,
                'status' => 1
            ]);
        $this->reset('path');
        $this->dispatch('hide-modal');
        $this->dispatch('update-platforms');
        $this->resetFields();
    }

    public function editPlatform($id, $title)
    {
        $userPlatform = DB::table('platform_user')
            ->where('platform_id', $id)
            ->where('user_id', auth()->id())
            ->first();

        $this->path = $userPlatform->path;
        $this->platformId = $id;
        $this->platformTitle = $title;
        $this->modalTitle = "Update";
        $this->modalFormAction = "updatePlatform";
        $this->modalBtnColor = "btn-warning";
        $this->modalBtnText = "Update";

        $this->dispatch('show-modal');
    }

    public function updatePlatform()
    {
        $this->validate();
        DB::table('platform_user')
            ->where('platform_id', $this->platformId)
            ->where('user_id', auth()->id())
            ->update([
                'path' => $this->path,
            ]);

        $this->reset('path');
        $this->dispatch('hide-modal');
        $this->dispatch('update-platforms');
        $this->resetFields();
    }

    public function changePlatformStatus($id)
    {
        $status = DB::table('platform_user')
            ->where('platform_id', $id)
            ->where('user_id', auth()->id())
            ->first()
            ->status;
        DB::table('platform_user')
            ->where('platform_id', $id)
            ->where('user_id', auth()->id())
            ->update([
                'status' => !$status,
            ]);
        $this->dispatch('update-platforms');
    }

    public function closeModal()
    {
        $this->dispatch('hide-modal');
        $this->resetFields();
    }

    public function resetFields()
    {
        $this->path = '';
        $this->platformId = '';
        $this->platformTitle = '';
        $this->modalTitle = '';
        $this->modalFormAction = '';
        $this->modalBtnColor = '';
        $this->modalBtnText = '';
    }

    public function render()
    {
        $this->platforms = User::select(
            'users.id as user_id',
            'platforms.id as platform_id',
            'platforms.title as platform_title',
            'platforms.icon as platform_icon',
            'platform_user.path as platform_user_path',
            'platform_user.status as platform_user_status',
        )
            ->leftJoin('platform_user', 'users.id', 'platform_user.user_id')
            ->leftJoin('platforms', 'platform_user.platform_id', 'platforms.id')
            ->where('users.id', auth()->id())
            ->get();

        return view('livewire.student.profile.tab.platforms');
    }
}
