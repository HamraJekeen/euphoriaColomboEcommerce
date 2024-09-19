<?php

namespace App\Livewire;
use Livewire\Component;
use App\Models\Order;
use App\Models\User;
use Livewire\Attribute\title;



#[Title('success')]
class SuccessPage extends Component
{
    public function render()

    {
        $latest_order =Order::with('address')->where('user_id',auth()->user()->id)->latest()->first();
        
        return view('livewire.success-page',[
            'order' => $latest_order,
        ]);

    }
}
