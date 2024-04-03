<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Route;
use Livewire\Component;

class AdminSidebar extends Component
{
    public $is_open = true, $currRoute;

    public function mount()
    {
        // Initialize the current route property when the component is mounted
        $this->currRoute = Route::currentRouteName();
    }

    public function setIsOpen()
    {
        $this->is_open = !$this->is_open;
    }

    public function render()
    {
        return view('livewire.admin-sidebar');
    }
}
