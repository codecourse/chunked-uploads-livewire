<form
    class="space-y-6"
    x-on:submit.prevent="submit"
    x-data="{
        uploader: null,
        progress: 0,
        submit () {
            const file = $refs.file.files[0]

            if (!file) {
                return
            }

            this.uploader = createUpload({
                file: file,
                endpoint: '{{ route('livewire.upload') }}',
                method: 'post',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                chunkSize: 10 * 1024, // 10mb
            })

            this.uploader.on('progress', (progress) => {
                this.progress = progress.detail
            })

            this.uploader.on('success', () => {
                this.uploader = null
                this.progress = 0
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

    <template x-if="uploader">
        <div>
            <div class="bg-gray-100 shadow-inner h-3 rounded overflow-hidden">
                <div class="bg-blue-500 h-full transition-all duration-200" x-bind:style="{ width: `${progress}%` }"></div>
            </div>
        </div>
    </template>
</form>
