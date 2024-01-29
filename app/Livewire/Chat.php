<?php

namespace App\Livewire;

use App\Models\Message;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Chat extends Component
{
    public $users;
    public $sender_id;
    public $messages;
    public $showChatContent = false;

   


    public function chatData($sender_id)
    {
        $this->showChatContent = true;
        return back();
        if ($sender_id) {
            // If a parameter is provided, use it
            $this->sender_id = $sender_id;
        } 
        else {
           
            $this->word;
        }
        $data = Message::get();

        // if ($data) {
        //     $this->message = $dictionaryEntry->Meaning;
        //     $this->nepaliMeaning = $dictionaryEntry->nepali_meaning;

        //     $dictionaryEntry->visit()->withData(['word' => $this->word])->withUser()->withIp();
        // } else {
        //     $this->definition = 'Word not found in the dictionary.';
        //     $this->nepaliMeaning = null;
        // }
    }




    public function render()
    {

        if (!empty($this->sender_id)) {
            $this->messages = Message::get();
        } else {
            // Fetch 5 random words when the search input is empty
            // $this->messages = Message::get();
        }
        $this->users = DB::table('messages')
            ->join('users', 'users.id', '=', 'messages.sender_id')
            ->select('users.name', DB::raw('MAX(messages.created_at) as latest_created_at'), 'messages.sender_id')
            ->groupBy('users.name', 'messages.sender_id')
            ->orderByDesc('latest_created_at')
            ->get();
        return view('livewire.chat');
    }
}