<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Form;
use App\Models\User;
use App\Events\SendMail;
use Illuminate\Support\Facades\Hash;

class Input extends Component
{
    public $input = "";
    public $data = "";
    public $submit = "Submit";
    public $class = "btn";
    public $email = "";
    public $phone = "";
    public $username = "";
    public $password = "";
    public $firstName = "";
    public $lastName = "";
    protected $rules = [
        'firstName' => 'required|min:3',
        'lastName'  => 'required|min:3',
        'email'     => 'required|min:3|unique:users',
        'password'  => 'required|min:8',
        'username'  => 'required|unique:users|min:3'
    ];

    protected $messages = [
        'firstName.min' => 'First Name must be greater than 3 characters',
        'lastName.min' => 'Last Name must be greater than 3 characters',
        'email.unique' => 'Email already Registered, Login Instead',
        'username.unique' => 'Username Taken, Use another',
        'password.min' => 'Password must be greater than 8 characters',
    ];

    public function oninput()
    {
        $this->validate();
        $this->class = "btn disabled";
        $this->submit = "Submitting";
        User::create([
            "name" => $this->firstName . ' ' . $this->lastName,
            "username" => $this->username,
            "password" => Hash::make($this->password),
            "email" => $this->email
        ]);
        $this->email = "";
        $mail = [
            'subject'   => "Welcome To Dashboard",
            'mail'      => "This is the Content",
            'email'     => $this->email,
            'isHtml'    => false
        ];
        event(new SendMail($mail));
    }

    public function updatingEmail()
    {
        $this->submit = "Submitting";
        $this->class = "btn disabled";
    }

    public function updatedEmail($value)
    {
        $this->email = strtolower(trim($value));
        $this->class = "btn";
         $this->submit = "Submitted";
    }

    public function updatingPhone($value)
    {
        $value = preg_replace('/[^0-9]/', '', $value);
        if (strlen($value) === 10) {
            $value = substr($value, 0, 3).'-'.substr($value, 3, 3).'-'.substr($value, 6);
        }
        $this->phone = $value;
    }

    public function mount()
    {
        $this->data = "Check Data";
    }

    public function render()
    {
        return view('livewire.input');
    }
}