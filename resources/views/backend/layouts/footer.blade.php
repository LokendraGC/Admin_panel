<footer class="main-footer">
    <strong>Copyright &copy; 2024 <a href=""></a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
        <b>Version</b> 3.2.0
    </div>


    <script src="../../plugins/jquery/jquery.min.js"></script>
    <script>
        $(function() {
            // Initialize Summernote with initial height
            $('.editor').summernote({
                height: 300, // Initial height in pixels
            });

            // Function to change Summernote height
            function changeSummernoteHeight(height) {
                $('.editor').summernote('option', 'height', height);
            }

            // CodeMirror
            CodeMirror.fromTextArea(document.getElementById("codeMirrorDemo"), {
                mode: "htmlmixed",
                theme: "monokai"
            });
        })
    </script>

    <script>
        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                // "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": true,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });
    </script>

    <script>
        $(function() {
            //Initialize Select2 Elements
            $('.select2').select2()

            //Initialize Select2 Elements
            $('.select2bs4').select2({
                theme: 'bootstrap4'
            })
        });
    </script>

<script>
    function removeNode(button) {
        // get data-name form DOM elements of invocation i.e this
        let fieldName = button.getAttribute('data-name');

        // Find the parent node of the button (which is the file preview item)
        var filePreviewItem = button.closest('.file-preview-item');

        // Create a hidden input element
        var hiddenInput = document.createElement('input');
        hiddenInput.type = 'hidden';
        hiddenInput.name = fieldName + '_remove'; // Set the name attribute as needed
        hiddenInput.value = 1; // Set the value attribute

        // Insert the hidden input element before the file preview item
        filePreviewItem.parentNode.insertBefore(hiddenInput, filePreviewItem);

        // Remove the file preview item from the DOM
        filePreviewItem.remove();
    }
</script>


</footer>

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
</aside>
