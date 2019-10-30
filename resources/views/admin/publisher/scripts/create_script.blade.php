<script type="text/javascript">
	$(document).ready(function() {
		$(document).on('ifClicked', 'input[type=radio]', function(){
            var id = $(this).val();

            // show loading icon
            $('.overlay').remove();
            loading = '<div class="overlay"><i class="fa fa-spinner fa-spin" style="margin-left:50%;font-size:20px;"></i></div>';
            $('.box-loader').append(loading);

            setTimeout(function() {
                $.ajax({
                    url: "{{ route('admin.publisher.ajax-set-format-code-number') }}",
                    type: 'POST',
                    data: {
                        id: id,
                        _token: "{!! csrf_token() !!}"
                    },
                    success: function(response) {
                        // hide loading icon
                        $('.overlay').remove();

                        // process data response
                        $('input[name=code_number]').val('');
                        $('input[name=code_number]').val(response);
                        
                    }
                });
            }, 1000);
        });
	});
</script>