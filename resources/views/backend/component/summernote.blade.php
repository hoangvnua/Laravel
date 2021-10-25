
  <textarea id="summernote" rows="8" name="content">
      @isset($content)
           {{ $content }}    
      @endisset
  </textarea>


@push('stack-scripts')
  <script>
    $(function () {
      // Summernote
      $('#summernote').summernote()

      // CodeMirror
      CodeMirror.fromTextArea(document.getElementById("codeMirrorDemo"), {
        mode: "htmlmixed",
        theme: "monokai"
      });
    })
  </script>
@endpush
