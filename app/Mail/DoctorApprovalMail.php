<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Doctor;

class DoctorApprovalMail extends Mailable
{
    use Queueable, SerializesModels;

    public $doctor;

    public function __construct(Doctor $doctor)
    {
        $this->doctor = $doctor;
    }

    public function build()
    {
        return $this->subject('Your doctor account request has been approved')
                    ->view('emails.doctor-approval')
                    ->with([
                        'doctorName' => $this->doctor->user->first_name . ' ' . $this->doctor->user->last_name,
                        'email' => $this->doctor->user->email,
                    ]);
    }
}
