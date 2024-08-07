<?php

namespace App\Livewire\Student;

use Livewire\Component;
use SimpleSoftwareIO\QrCode\Facades\QrCode as FacadesQrCode;

class Share extends Component
{
    public function render()
    {
        $rollNumber = auth()->user()->roll_number;
        $qrCode = FacadesQrCode::size(150)->generate(url('') . '/' . $rollNumber);

        return view('livewire.student.share', [
            'qrCode' => $qrCode,
            'rollNumber' => $rollNumber
        ]);
    }
}
