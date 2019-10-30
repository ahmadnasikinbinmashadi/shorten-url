<script type="text/javascript">
	$(document).ready(function() {
        initSlider();
        
		$('#module').on('change', function() {
            var id = $(this).val();
            var school_subject = $('#school_subject');
            var loading = '<div class="overlay"><i class="fa fa-spinner fa-spin" style="margin-left:50%;font-size:20px;"></i></div>';

            $.ajax({
                url: "{{ route('admin.paket-soal.ajax-get-subjects-by-module') }}",
                type: 'POST',
                dataType: "JSON",
                data: {
                    id: id,
                    _token: "{!! csrf_token() !!}"
                },
                beforeSend: function() {
                    // show loading icon
                    $('.box-loader').append(loading);
                }
            })
            .done (function(data) {
                // process data response
                var option = new Option("{!! trans('backend::app.label.choose_lesson') !!}", '', true, true);
                school_subject.empty();
                school_subject.append(option);
                $.each(data, function(key, value) {
                    // create the option and append to Select2
                    option = new Option(value.name, value.id, true, false);
                    school_subject.append(option);
                });
                school_subject.select2();
                school_subject.prop('disabled', false);
            })
            .fail (function(xhr, status, error) {
                // show error message
                var errorMessage = xhr.status +': '+ xhr.statusText;
                alert('Error - '+ errorMessage);
            })
            .always (function() {
                // hide loading icon
                $('.overlay').remove();
            });
        });

        $('#school_subject').on('change', function() {
            var id        = $(this).val();
            var module_id = $('#module option:selected').val();
            var theme     = $('#theme');
            var loading = '<div class="overlay"><i class="fa fa-spinner fa-spin" style="margin-left:50%;font-size:20px;"></i></div>';

            $.ajax({
                url: "{{ route('admin.paket-soal.ajax-get-themes-by-subject') }}",
                type: 'POST',
                dataType: "JSON",
                data: {
                    subject_id: id,
                    module_id: module_id,
                    _token: "{!! csrf_token() !!}"
                },
                beforeSend: function() {
                    // show loading icon
                    $('.box-loader-subject').append(loading);
                }
            })
            .done (function(data) {
                // process data response
                var option = new Option("{!! trans('backend::app.label.choose_topic') !!}", '', true, true);
                theme.empty();
                theme.append(option);
                $.each(data, function(key, value) {
                    // create the option and append to Select2
                    option = new Option(value.theme_name, value.id, true, false);
                    theme.append(option);
                });
                theme.select2();
                theme.prop('disabled', false);
            })
            .fail (function(xhr, status, error) {
                // show error message
                var errorMessage = xhr.status +': '+ xhr.statusText;
                alert('Error - '+ errorMessage);
            })
            .always (function() {
                // hide loading icon
                $('.overlay').remove();
            });
        });

        
	});

    function initSlider()
    {
        $(document).on('change', '[type="checkbox"]', function(i, elm){
            if ($(this).is(':checked')) {
                $(this).val(1);
                $('input[name=max_time]').prop('disabled', false);
            }else{
                $(this).val(0);
                $('input[name=max_time]').prop('disabled', true);
            }
        });

        $.each($("input[type=checkbox]"), function(i, elm) {
            var value = $(this).val();
            if(value == 1) {
                $(this).prop("checked", true);
                $('input[name=max_time]').prop('disabled', false);
            } else {
                $('input[name=max_time]').prop('disabled', true);
            }
        });
    }
</script>