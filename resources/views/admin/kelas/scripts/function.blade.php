<script type="text/javascript">
	function addDropdown(slug) {
        var optionIndex = getRandom();
        var dropdownOption = '';
        var selectedOpt = '';

        $.ajax({
            type: "GET",
            url: "{{route('admin.kelas.ajax-get-classes-by-education')}}",
            data: {
                slug: slug
            },
            dataType: "html",
            beforeSend: function(){
            },
            success: function(response){
                var data = JSON.parse(response);
                $.each( data, function(key, value) {
		            dropdownOption += '<option '+ selectedOpt +' value="'+key+'">'+value+'</option>';
		        });

		        dropdownTemplate = _.template( $('#select-template').html() );

		        element = dropdownTemplate({
		            optionIndex: optionIndex
		            ,dropdownOption: dropdownOption
		        });

		        $('#box-kelas-name').html( element );
		        $('#kelas-name-field-'+optionIndex).append(dropdownOption);
            }
        });
    }

    function addText()
    {
    	textTemplate = _.template( $('#text-template').html() );
    	$('#box-kelas-name').html( textTemplate );
    }

    function getRandom() {
        return Math.random().toString(36).substring(2);
    }
</script>