<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Lead;

class Landing extends Component
{
    public $name;
    public $last_name;
    public $email;
    public $phone;
    public $registrationSuccessful = false;
    protected function rules()
    {
        return [
            'name' => 'required | regex:/^[a-zA-Z\s]+$/ | max:60',
            'last_name' => 'required |regex:/^[a-zA-Z\s]+$/ | max:60',
            'email' => 'required | email | max:60 | unique:leads',
            'phone' => 'required | numeric | min_digits:9 | max_digits:12',
        ];
    }
    protected function messages()
    {
        return [
        'name.regex' => 'El campo :attribute solo puede contener letras y espacios.',
        'last_name.regex' => 'El campo :attribute solo puede contener letras y espacios.',
        ];
    }
    public function updatedName()
    {
        $this->validateOnly('name');
    }
    public function updatedLastName()
    {
        $this->validateOnly('last_name');
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
            'last_name'  => $this->last_name,
            'email'     => $this->email,
            'phone'     => $this->phone,
        ]);
        $this->registrationSuccessful = true;
        // return redirect()->to('/');
    }
    public function render()
    {
        return view('livewire.landing')->layout('layouts.web');
    }
}
