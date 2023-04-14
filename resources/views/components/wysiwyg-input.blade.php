<textarea id="tinymce-wysiwyg" {!! $attributes->merge() !!}>
    {{ $slot }}
</textarea>

@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/6.4.1/tinymce.min.js" integrity="sha512-in/06qQzsmVw+4UashY2Ta0TE3diKAm8D4aquSWAwVwsmm1wLJZnDRiM6e2lWhX+cSqJXWuodoqUq91LlTo1EA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        tinymce.init({
            selector: '#tinymce-wysiwyg',
            plugins: 'advlist link image lists'
        });
    </script>
@endpush
