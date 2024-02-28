$(function () {
  $(".dropify").dropify({
    messages: {
      default: "Drag and drop a file here or click",
      replace: "Drag and drop or click to replace",
      remove: "Remove",
      error: "Ooops, something wrong appended.",
    },
    error: { fileSize: "The file size is too big (1M max)." },
  }),
    $(".summernote").summernote({
      height: 240,
      minHeight: null,
      maxHeight: null,
      focus: !1,
    }),
    $(".select2").select2(),
    $(".select2-limiting").select2({ maximumSelectionLength: 2 });
});
