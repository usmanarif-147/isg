<?php

namespace App\Livewire\Student;

use App\Models\User;
use Livewire\Component;
use SimpleSoftwareIO\QrCode\Facades\QrCode as FacadesQrCode;

class Share extends Component
{
    public $showShareOptions = false;

    public function toggleShareOptions()
    {
        $this->showShareOptions = !$this->showShareOptions;
    }
    public function render()
    {

        $rollNumber = auth()->user()->roll_number;
        $school = User::where('id', auth()->user()->school_id)->first();
        $url = url('') . '/' . $school->name . '/' . $rollNumber . '/profile';
        $qrCode = FacadesQrCode::size(150)->generate($url);

        $shareUrls = [
            'facebook' => 'https://www.facebook.com/sharer/sharer.php?u=' . urlencode($url),
            'twitter' => 'https://twitter.com/intent/tweet?url=' . urlencode($url),
            'linkedin' => 'https://www.linkedin.com/shareArticle?mini=true&url=' . urlencode($url),
            'whatsapp' => 'https://wa.me/?text=' . urlencode($url),
        ];

        return view('livewire.student.share', [
            'qrCode' => $qrCode,
            'rollNumber' => $rollNumber,
            'url' => $url,
            'shareUrls' => $shareUrls
        ]);
    }
}
