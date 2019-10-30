<script type="text/javascript">
	function generateDropdown(data, index)
    {
        $.ajax({
            type: 'GET',
            url: "{{ route('admin.katbuku.ajax-break-dropdown') }}",
            data: {id: data.id},
            dataType: 'html',
            beforeSend: function() {

            },
            success: function(response) {
                var child = JSON.parse(response);
                console.log(child);

               
            }

        });
    }

    function getParent(data) {
        $.ajax({
            type: 'GET',
            url: "{{ route('admin.katbuku.ajax-get-parent') }}",
            data: {id: data.parent_id},
            dataType: 'html',
            beforeSend: function() {

            },
            success: function(response) {
                parent = JSON.parse(response);
            }

        });
    }

    function getRandom() {
        return Math.random().toString(36).substring(2);
    }

    function addDropdown(data, index) {
        var optionIndex = getRandom();
        var dropdownOption = '';
        var selectedOpt = '';

        $.each( data, function(key, value) {

            if(value.data_selected != null) {
                if(value.id == value.data_selected) {
                    selectedOpt = 'selected';
                }
            }

            dropdownOption += '<option '+ selectedOpt +' value="'+value.id+'">'+value.name+'</option>';
        });

        dropdownTemplate = _.template( $('#select-template').html() );

        element = dropdownTemplate({
            index: index
            ,optionIndex: optionIndex
            ,dropdownOption: dropdownOption
        });

        $('.box_child_'+index).html( element );
        $('#answer-field-'+optionIndex).append(dropdownOption);
    }

    function setParent(me, name) {
        if(name == 'child_id') {
            me.attr('name', 'parent_id');
        }
    }
</script>