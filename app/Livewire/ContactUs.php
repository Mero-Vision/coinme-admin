<?php

namespace App\Livewire;

use App\Models\ContactUs as ModelsContactUs;
use Livewire\Component;
use Livewire\Attributes\Validate;

class ContactUs extends Component
{
    #[Validate('required')]
    public $name;

    #[Validate('exists:users,id_number')]
    public $id_number;

    #[Validate(['required','email'])]
    public $email;

    #[Validate('required')]
    public $message;

    protected $messages = [
        'id_number.exists' => 'The provided ID number does not exist.',
    ];

    public function save(){
        ModelsContactUs::create(
            $this->validate()


        );
        sweetalert()->addSuccess('Contact has been send successfully!');
        return $this->redirect('/contact-us');
    }
    
    public function render()
    {
        return view('livewire.contact-us');
    }
}