<?php

namespace App\Livewire;

use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Livewire\Component;
use Livewire\WithFileUploads;
use Pion\Laravel\ChunkUpload\Handler\ContentRangeUploadHandler;
use Pion\Laravel\ChunkUpload\Receiver\FileReceiver;

class Upload extends Component
{
    public function handleChunk(Request $request)
    {
        $receiver = new FileReceiver(
            UploadedFile::fake()->createWithContent('file', $request->getContent()),
            $request,
            ContentRangeUploadHandler::class,
        );

        $save = $receiver->receive();

        if ($save->isFinished()) {
            // $save->getFile()
        }

        $save->handler();
    }

    public function render()
    {
        return view('livewire.upload');
    }
}
