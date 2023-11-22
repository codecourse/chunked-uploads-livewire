<?php

namespace App\Livewire;

use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Livewire\Component;
use Livewire\WithFileUploads;
use Nette\NotImplementedException;
use Pion\Laravel\ChunkUpload\Handler\ContentRangeUploadHandler;
use Pion\Laravel\ChunkUpload\Receiver\FileReceiver;

class Upload extends Component
{
    public function mount()
    {
        if (!method_exists($this, 'onSuccess')) {
            throw new NotImplementedException('An onSuccess handler method is required.');
        }
    }

    public function handleSuccess($name, $path)
    {
        $this->onSuccess(new UploadedFile($path, $name));
    }

    public function handleChunk(Request $request)
    {
        $receiver = new FileReceiver(
            UploadedFile::fake()->createWithContent('file', $request->getContent()),
            $request,
            ContentRangeUploadHandler::class,
        );

        $save = $receiver->receive();

        if ($save->isFinished()) {
            return response()->json([
                'file' => $save->getFile()->getRealPath()
            ]);
        }

        $save->handler();
    }

    public function render()
    {
        return view('livewire.upload');
    }
}
