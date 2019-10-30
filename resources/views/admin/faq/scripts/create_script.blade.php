@include('backend::admin.faq.scripts.function')

<script type="text/javascript">
    $(document).ready(function() {
        loadTinyMce();
        
        //tambah group
        $('#add_group').on('click', function(e) {
            $('#add-group-modal').modal('show');
            e.preventDefault();

            // simpan data group
            save_group();
        });
    });
</script>