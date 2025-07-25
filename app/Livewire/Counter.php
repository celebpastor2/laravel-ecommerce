<?php

namespace App\Livewire;

use Livewire\Component;

class Counter extends Component
{
    public $balance = 0;
    public function render()
    {
        return view('livewire.counter');
    }

    public function increment(){
        $this->balance += 2;
    }

    public function decrement(){
        $this->balance += 2;
    }
}
