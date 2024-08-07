<?php

namespace App\Livewire\Student;

use App\Models\User;
use Livewire\Component;
use SimpleSoftwareIO\QrCode\Facades\QrCode as FacadesQrCode;

class Share extends Component
{
    public function render()
    {

        $rollNumber = auth()->user()->roll_number;
        $school = User::where('id', auth()->user()->school_id)->first();
        $url = url('') . '/' . $school->name . '/' . $rollNumber;
        $qrCode = FacadesQrCode::size(150)->generate($url);

        return view('livewire.student.share', [
            'qrCode' => $qrCode,
            'rollNumber' => $rollNumber,
            'url' => $url
        ]);
    }
}
