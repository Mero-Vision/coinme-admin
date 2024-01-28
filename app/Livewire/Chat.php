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

    public $showChatContent=true;


    public function chatData($sender_id)
    {
        $this->showChatContent = true;
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