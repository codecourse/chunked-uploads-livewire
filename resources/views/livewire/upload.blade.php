<form
    x-on:submit.prevent="submit"
    x-data="{
        submit () {
            const file = $refs.file.files[0]

            if (!file) {
                return
            }

            // chunk
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
