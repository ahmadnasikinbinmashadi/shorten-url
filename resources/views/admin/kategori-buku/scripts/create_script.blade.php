@include('backend::admin.kategori-buku.scripts.function')

<script type="text/javascript">
	$(document).ready(function() {
        $('.select2').select2();
	});

	$(document).on('change', '.parent_field', function(){
        var id = $(this).val();
        var index = $(this).data('index');
        var name = $(this).attr('name');
        setParent($(this), name);
        
        $.ajax({
            type: "GET",
            url: "{{route('admin.katbuku.ajax-get-child')}}",
            data: {id: id},
            dataType: "html",
            beforeSend: function(){
            },
            success: function(response){
                var data = JSON.parse(response);
                console.log(data);
                $('.box_child_'+index).html( '' );

                if(data.length > 0) {
                    addDropdown(data, index);
                }
            }
        });
    });
</script>