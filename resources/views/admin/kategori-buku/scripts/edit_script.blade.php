@include('backend::admin.kategori-buku.scripts.function')

<script type="text/javascript">
	$(document).ready(function() {
		var main_parent = JSON.parse(JSON.stringify({!! $main_parent !!}));
        var kateg_buku = JSON.parse(JSON.stringify({!! $katbuku !!}));
		var index = "{!! $index !!}";
        var parent_selected = $('select[name=parent_id] option:selected').val();

		    generateDropdown(kateg_buku, index);
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
                $('.box_child_'+index).html( '' );

                if(data.length > 0) {
                    addDropdown(data, index);
                }
            }
        });
    });
</script>