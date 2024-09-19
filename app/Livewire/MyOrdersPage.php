<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\Attributes\Url;
use Livewire\WithPagination;
use App\Models\Order;



#[Title('My Orders Page - EuphoriaColombo')]
class MyOrdersPage extends Component
{
    use WithPagination;
    public function render()
    {
        $my_orders =Order::where('user_id', auth()->id())->latest()->paginate(5);
        return view('livewire.my-orders-page',[
            'my_orders'=>$my_orders
        ]);
    }
}
