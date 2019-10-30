<script type="text/javascript">
	$(document).ready(function() {
		$('#module').on('change', function() {
            var id             = $(this).val();
            var school_subject = $('#school_subject');
            var loading        = '<div class="overlay"><i class="fa fa-spinner fa-spin" style="margin-left:50%;font-size:20px;"></i></div>';

            $.ajax({
                url: "{{ route('admin.theme.ajax-get-subjects-by-module') }}",
                type: 'POST',
                dataType: "JSON",
                data: {
                    id: id,
                    _token: "{!! csrf_token() !!}"
                },
                beforeSend: function() {
                    // show loading icon
                    $('.overlay').remove();
                    $('.box-loader').append(loading);
                },
                success: function(response) {
                    // hide loading icon
                    $('.overlay').remove();
                    
                    // process data response
                    var option = new Option('Pilih Mata Pelajaran', '', true, true);
                    school_subject.empty();
                    school_subject.append(option);
                    $.each(response, function(key, value) {
                        // create the option and append to Select2
                        option = new Option(value.name, value.id, true, false);
                        school_subject.append(option);
                    });
                    school_subject.select2();
                    school_subject.prop('disabled', false);
                },
                error: function(xhr, status, error) {
                    var errorMessage = xhr.status +': '+ xhr.statusText;
                    alert('Error - '+ errorMessage);
                }
            });
        });
	});
</script>