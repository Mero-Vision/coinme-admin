<?php

namespace App\Livewire;

use App\Models\Message;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Chat extends Component
{
    public $users;
    public $sender_id;
    public $sender_message;

    public $showChatContent;


    public function chatData($sender_id)
    {

        // $this->showChatContent = true;
        // if ($sender_id) {
        //     $this->sender_id = $sender_id;
        // } else {
        //     $this->sender_id = null;

        // }

        // $chatData = Message::get();

        // if ($chatData->isNotEmpty()) {
        //     $this->sender_message = $chatData->pluck('sender_message')->implode("\n");
        //     $this->showChatContent = true; // Set the variable to show the chat content
        // } else {
        //     $this->sender_message = null;
        //     $this->showChatContent = true; // Set the variable to hide the chat content
        // }
    }




    public function render()
    {

        $this->showChatContent;

        $this->users = DB::table('messages')
            ->join('users', 'users.id', '=', 'messages.sender_id')
            ->select('users.name', DB::raw('MAX(messages.created_at) as latest_created_at'), 'messages.sender_id')
            ->groupBy('users.name', 'messages.sender_id')
            ->orderByDesc('latest_created_at')
            ->get();
        return view('livewire.chat');
    }
}