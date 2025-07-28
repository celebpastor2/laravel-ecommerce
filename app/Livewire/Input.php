<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Form;

class Input extends Component
{
    public $input = "";
    public $data = "";
    public $submit = "Submit";
    public $class = "btn";

    public function oninput(){
        $this->input;
        Form::create([
            "data" => $this->input
        ]);
        $this->input = "";
    }
    public function render()
    {
        return view('livewire.input');
    }

    public function updatinginput(){
        $this->submit = "Submitting";
        $this->class = "btn disabled";
    }

    public function updated(){
        $this->input = "Property Updated";
    }

    public function mount(){
        $this->input = "Mounted";
        $this->data = "Check Data";
    }

}
