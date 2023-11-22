<?php

namespace App\Livewire;

use Livewire\Component;

class FileIndex extends Component
{
    protected $listeners = [
        'refresh' => '$refresh'
    ];

    public function render()
    {
        return view('livewire.file-index', [
            'files' => auth()->user()->files()->latest()->get()
        ]);
    }
}
