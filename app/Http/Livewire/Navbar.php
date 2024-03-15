<?php

namespace App\Http\Livewire;
use App\Models\Notification;
use App\Models\User;
use Livewire\Component;

class Navbar extends Component
{
    public $notificationCount=1;
    // public $count;
    // public $type;

    // protected $listeners = ['notificationAdded' => 'updateCount'];

    // public function mount($type)
    // {
    //     $this->type = $type;
    //     $this->updateCount();
    // }

    // public function updateCount()
    // {
    //     $this->count = Notification::where('user_id', auth()->id())
    //         ->where('type', $this->type)
    //         ->count();
    // }
    public function render()
    {

        return view('livewire.navbar');
    }
    public function resetCount($type)
    {
        auth()->user()->notifications()
            ->where('type', $type)
            ->update(['status' => 'Lu']);
        $this->emit('resetCount', $type);
    
    }
}
