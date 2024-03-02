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
        ->select('users.name', 'trade_transactions.trade_type', 'trade_transactions.purchase_amount', 'trade_transactions.purchase_price', 'trade_transactions.created_at')
        ->where('trade_transactions.trade_status', null)->latest('trade_transactions.created_at','desc')->get();

            
        return view('livewire.active-trading');
    }
}