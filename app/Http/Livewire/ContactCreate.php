<?php

namespace App\Http\Livewire;

use App\Contact;
use Livewire\Component;

class ContactCreate extends Component
{
    public $first_name;
    public $last_name;
    public $phone_number;
    public $email;

    public function render()
    {
        return view('livewire.contact-create');
    }

    public function addContact()
    {
        Contact::create([
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'phone_number' => $this->phone_number,
            'email' => $this->email
        ]);

        session()->flash('success', 'Added new contact.');
        $this->first_name = '';
        $this->last_name = '';
        $this->phone_number = '';
        $this->email = '';
        $this->emit('contactAdded');
        // return redirect()->to()
    }
}
