<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Str;

class PatientForm extends Component
{
    public $code;
    public $name;
    public $birthdate;
    public $Address;
    public $telephone;
    public $Message;

    public function render()
    {
        $this->code = Str::random(5);
        return view('livewire.patient-form');
    }
}
