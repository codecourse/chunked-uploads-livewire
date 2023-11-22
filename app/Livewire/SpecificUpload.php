<?php

namespace App\Livewire;

use Illuminate\Http\UploadedFile;
use Livewire\Component;

class SpecificUpload extends Upload
{
    public function onSuccess(UploadedFile $file)
    {
        dd($file);
    }
}
