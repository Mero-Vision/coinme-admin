<?php

namespace App\Livewire;

use App\Models\TradeTransaction;
use Livewire\Component;

class ActiveTrading extends Component
{

    public $trades = [];

    
    public function render()
    {
        $this->trades = TradeTransaction::join('users', 'users.id','=', 'trade_transactions.client_id')
        ->where('trade_status', null)->latest()->get();

            
        return view('livewire.active-trading');
    }
}