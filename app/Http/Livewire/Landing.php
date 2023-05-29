<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Lead;

class Landing extends Component
{
    public $name;
    public $lastname;
    public $email;
    public $phone;
    public $registrationSuccessful = false;
    protected function rules()
    {
        return [
            'name' => 'required | string | max:30',
            'lastname' => 'required |string | max:30',
            'email' => 'required | email | max:30',
            'phone' => 'required | numeric | min_digits:9 | max_digits:12',
        ];
    }
    public function updatedName()
    {
        $this->validateOnly('name');
    }
    public function updatedLastName()
    {
        $this->validateOnly('lastname');
    }
    public function updatedEmail()
    {
        $this->validateOnly('email');
    }
    public function updatedPhone()
    {
        $this->validateOnly('phone');
    }
    public function save()
    {
        $this->validate();
        Lead::create([
            'name'      => $this->name,
            'lastname'  => $this->lastname,
            'email'     => $this->email,
            'phone'     => $this->phone,
        ]);
        $this->registrationSuccessful = true;
    }
    public function render()
    {
        return view('livewire.landing')->layout('layouts.web');
    }
}
