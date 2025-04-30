<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Doctor;

class DoctorRejectionMail extends Mailable
{
    use Queueable, SerializesModels;

    public $doctor;

    public function __construct(Doctor $doctor)
    {
        $this->doctor = $doctor;
    }

    public function build()
    {
        return $this->view('emails.doctor-rejection')
                    ->subject('WeCare - Your Doctor Registration Application Status');
    }
}
