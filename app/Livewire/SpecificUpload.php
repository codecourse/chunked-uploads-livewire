<?php

namespace App\Livewire;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Str;
use Livewire\Component;

class SpecificUpload extends Upload
{
    public function onSuccess(UploadedFile $file)
    {
        auth()->user()->files()->create([
            'file_name' => $file->getClientOriginalName(),
            'file_path' => $file->storeAs('uploads', Str::uuid())
        ]);
    }
}
