<form
    x-on:submit.prevent="submit"
    x-data="{
        uploader: null,
        submit () {
            const file = $refs.file.files[0]

            if (!file) {
                return
            }

            this.uploader = createUpload({
                file: file,
                endpoint: '{{ route('dummy') }}',
                method: 'post',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                chunkSize: 10 * 1024, // 10mb
            })
        }
    }"
>
    <div class="flex items-center">
        <input type="file" id="file" x-ref="file" class="flex-grow">
        <x-primary-button>
            Upload
        </x-primary-button>
    </div>
</form>
