<div>
    @forelse($files as $file)
        <div wire:key="{{ $file->id }}">
            {{ $file->file_name }} ({{ $file->file_path }})
        </div>
    @empty
        No files yet
    @endforelse
</div>
