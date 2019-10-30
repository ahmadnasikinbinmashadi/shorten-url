<script type="text/javascript">
	function notification_messages(message, type) {
        var type_status = "Failed!";

        if(type == "success"){ 
            type_status = "Success!";
        }

        if($.isArray(message)) {
            var flash_message = '';
            for (var i = 0; i < message.length; i++) {
                flash_message = flash_message + message[i];
            };
        }else{
            flash_message = message;
        }

        $.confirm({
            title: type_status,
            content: flash_message,
            type: 'custom',
            buttons: {
                confirm: {
                    text: 'OK',
                    btnClass: 'btn-blue',
                    keys: ['enter'],
                    action: function(){
                        if (type == "success" ) {
                            $('#refresh').trigger('click');
                        }
                    }
                }
            }
        });
    }

    function getRandom() {
        return Math.random().toString(36).substring(2);
    }

    function addDropdown(data, index, selectedOpt='') {
        var optionIndex = getRandom();
        var dropdownOption = '';

        $.each( data, function(key, value) {
            dropdownOption += '<option '+ selectedOpt +' value="'+key+'">'+value+'</option>';
        });

        dropdownTemplate = _.template( $('#select-template').html() );

        element = dropdownTemplate({
              index: index
              ,optionIndex: optionIndex
              ,dropdownOption: dropdownOption
        });

        $('#container_field').append( element );
        $('#answer-field-'+optionIndex).append(dropdownOption);
        $('#answer-field-'+optionIndex).select2();
    }

    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#img_preview')
                    .attr('src', e.target.result);
            };

            reader.readAsDataURL(input.files[0]);
        } else {
        	$('#img_preview')
                    .attr('src', "{!! asset('assets/img/no_image.jpeg') !!}");
        }
    }

    function formatRupiah(angka, prefix)
    {
        var number_string = angka.replace(/[^,\d]/g, '').toString(),
            split    = number_string.split(','),
            sisa     = split[0].length % 3,
            rupiah     = split[0].substr(0, sisa),
            ribuan     = split[0].substr(sisa).match(/\d{3}/gi);
            
        if (ribuan) {
            separator = sisa ? '.' : '';
            rupiah += separator + ribuan.join('.');
        }
        
        rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
        return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
    }
</script>