<?php

namespace App\Http\Livewire;

use App\Models\Notification;
use Livewire\Component;

use Illuminate\Support\Facades\Redirect;


class NotificationCounter extends Component
{
    public $count;
    public $type;
    public $refreshEnabled = false;

   // protected $listeners = ['notificationAdded' => 'updateCount'];
   protected $listeners = ['notificationAdded' => 'updateCount', 'resetCount' => 'resetCount'];
   protected $refresh = 60;
    public function mount($type)
    {
        $this->type = $type;
        $this->updateCount();
    }

    public function updateCount()
    {
        $this->count = Notification::where('user_id', auth()->id())
            ->where('type', $this->type)
            ->where('status', 'Non lu')
            ->count();
       // $this->enableRefresh();
       // $this->emit('enableRefresh');
    }
    public function resetCount()
    {
        $this->count = 0;
        $this->emitSelf('updateCount');
        $this->emitSelf('updateCount');
        //$this->emit('enableRefresh');
        // Activer le rafraîchissement automatique après l'appel de resetCount
        //$this->enableRefresh();
        //$this->enableRefresh();
    }
    // public function enableRefresh()
    // {
    //     $this->refreshEnabled = true;
    // }
    //public function updated()
    //{
        // if ($this->refreshEnabled) {
        //     $this->updateCount();
        // }
       // $this->refresh = 0;
   // }
    public function render()
    {
        return view('livewire.notification-counter');
    }
    //public function resetCount()
   // {
        // if ($type == $this->type) {
        //     $this->count = 0;
        // }
       // $this->count = 0;
    //}
}
