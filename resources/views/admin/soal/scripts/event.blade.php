<script type="text/javascript">
	var counter_panel = 1;
    
    $('#education_id').on('change', function() {
        var id = $(this).val();
        var classSelect = $('#kelas');
        var loading = '<div class="overlay"><i class="fa fa-spinner fa-spin" style="margin-left:50%;font-size:20px;"></i></div>';

        $.ajax({
            url: "{{ route('admin.soal.ajax-get-classes-by-education') }}",
            type: 'POST',
            dataType: "JSON",
            data: {
                id: id,
                _token: "{!! csrf_token() !!}"
            },
            beforeSend: function() {
                // show loading icon
                $('.box-loader-education').append(loading);
            },
            success: function(response) {
                // hide loading icon
                $('.overlay').remove();

                // process data response
                var option = new Option("{!! trans('backend::app.label.choose_class') !!}", '', true, true);
                classSelect.empty();
                classSelect.append(option);
                $.each(response, function(key, value) {
                    // create the option and append to Select2
                    option = new Option(value.name, value.id, true, false);
                    classSelect.append(option);
                });
                classSelect.select2();
            },
            error: function(xhr, status, error) {
                var errorMessage = xhr.status +': '+ xhr.statusText;
                alert('Erorr - '+ errorMessage);
            }
        });
    });

    $('#kelas').on('change', function() {
        var id = $(this).val();
        var moduleSelect = $('#module');
        var loading = '<div class="overlay"><i class="fa fa-spinner fa-spin" style="margin-left:50%;font-size:20px;"></i></div>';

        $.ajax({
            url: "{{ route('admin.soal.ajax-get-modules-by-class') }}",
            type: 'POST',
            dataType: "JSON",
            data: {
                id: id,
                _token: "{!! csrf_token() !!}"
            },
            beforeSend: function() {
                // show loading icon
                $('.box-loader-class').append(loading);
            },
            success: function(response) {
                // hide loading icon
                $('.overlay').remove();

                // process data response
                var option = new Option("{!! trans('backend::app.label.choose_module') !!}", '', true, true);
                moduleSelect.empty();
                moduleSelect.append(option);
                $.each(response, function(key, value) {
                    // create the option and append to Select2
                    option = new Option(value.name, value.id, true, false);
                    moduleSelect.append(option);
                });
                moduleSelect.select2();
            },
            error: function(xhr, status, error) {
                var errorMessage = xhr.status +': '+ xhr.statusText;
                alert('Error - '+ errorMessage);
            }
        });
    });

    $('#module').on('change', function() {
        var id = $(this).val();
        var school_subject = $('#mapel');
        var loading = '<div class="overlay"><i class="fa fa-spinner fa-spin" style="margin-left:50%;font-size:20px;"></i></div>';

        $.ajax({
            url: "{{ route('admin.soal.ajax-get-subjects-by-module') }}",
            type: 'POST',
            dataType: "JSON",
            data: {
                id: id,
                _token: "{!! csrf_token() !!}"
            },
            beforeSend: function() {
                // show loading icon
                $('.box-loader-module').append(loading);
            },
            success: function(response) {
                // hide loading icon
                $('.overlay').remove();
                
                // process data response
                var option = new Option("{!! trans('backend::app.label.choose_lesson') !!}", '', true, true);
                school_subject.empty();
                school_subject.append(option);
                $.each(response, function(key, value) {
                    // create the option and append to Select2
                    option = new Option(value.name, value.id, true, false);
                    school_subject.append(option);
                });
                school_subject.select2();
            },
            error: function(xhr, status, error) {
                var errorMessage = xhr.status +': '+ xhr.statusText;
                alert('Error - '+ errorMessage);
            }
        });
    });

    $('#mapel').on('change', function() {
        var subject_id = $(this).val();
        var module_id  = $('#module option:selected').val();
        var themeSelect = $('#tema');
        var loading = '<div class="overlay"><i class="fa fa-spinner fa-spin" style="margin-left:50%;font-size:20px;"></i></div>';

        $.ajax({
            url: "{{ route('admin.soal.ajax-get-themes-by-lesson-module') }}",
            type: 'POST',
            dataType: "JSON",
            data: {
                subject_id: subject_id,
                module_id: module_id,
                _token: "{!! csrf_token() !!}"
            },
            beforeSend: function() {
                // show loading icon
                $('.box-loader-subject').append(loading);
            },
            success: function(response) {
                // hide loading icon
                $('.overlay').remove();

                // process data response
                var option = new Option("{!! trans('backend::app.label.choose_topic') !!}", '', true, true);
                themeSelect.empty();
                themeSelect.append(option);
                $.each(response, function(key, value) {
                    // create the option and append to Select2
                    option = new Option(value.theme_name, value.id, true, false);
                    themeSelect.append(option);
                });
                themeSelect.select2();
            },
            error: function(xhr, status, error) {
                var errorMessage = xhr.status +': '+ xhr.statusText;
                alert('Error - '+ errorMessage);   
            }
        });
    });

    $('#tema').on('change', function() {
        var id = $(this).val();
        var packageSelect = $('#paket');
        var loading = '<div class="overlay"><i class="fa fa-spinner fa-spin" style="margin-left:50%;font-size:20px;"></i></div>';
        

        $.ajax({
            url: "{{ route('admin.soal.ajax-get-package-by-theme') }}",
            type: 'POST',
            dataType: "JSON",
            data: {
                id: id,
                _token: "{!! csrf_token() !!}"
            },
            beforeSend: function() {
                // show loading icon
                $('.box-loader-topic').append(loading);
            },
            success: function(response) {
                // hide loading icon
                $('.overlay').remove();

                // process data response
                var option = new Option("{!! trans('backend::app.label.choose_package') !!}", '', true, true);
                packageSelect.empty();
                packageSelect.append(option);
                $.each(response, function(key, value) {
                    // create the option and append to Select2
                    option = new Option(value.name, value.id, true, false);
                    packageSelect.append(option);
                });
                packageSelect.select2();
            },
            error: function(xhr, status, error) {
                var errorMessage = xhr.status +': '+ xhr.statusText;
                alert('Error - '+ errorMessage);
            }
        });
    });

    $(document).on('change', '#scoring', function() {
        initDefaultScoring();
    });

    $(document).on('change', '#model_soal_id', function() {
        var model = $('option:selected', this).data('slug');
        removeAllSequence();
        initSequence(model);
        loadTinyMce();
    });

    $(document).on('click', '#add_option', function() {
        var model_soal = $('#model_soal_id option:selected').data('slug');
        
        if(model_soal == '' || model_soal == null) {
            $.alert({
                title: "{!! trans('backend::app.label.warning') !!}",
                content: "{!! trans('backend::app.label.pelase_choose_field', ['field' => trans('backend::app.label.question_type')]) !!}",
            });
        } else {
            if(counter_panel <= 5) {
                switch(model_soal) {
                    case 'ordering':    
                        addOptionOrdering( false, '.option-container', counter_panel, '', '', false, '' );
                        resetCounter();
                        break;
                    default:
                        addOptionSingleChoice( false, '.option-container', counter_panel, '', '', false, '' );
                        resetCounter();
                }

                initDefaultScoring();
                loadTinyMce();
                counter_panel++;
            } else {
             $.alert({
                    title: "{!! trans('backend::app.label.warning') !!}",
                    content: "{!! trans('backend::app.label.max_total_input', ['amount' => 5]) !!}",
                });
            }
        }
    });	

    $(document).on('click', '.delete_option', function() {
    	var index = $(this).data('index');
        $('.panel-option-' + index).remove();
        resetCounter();
    });

    $(document).on('click', '#remove_all_option', function() {
    	removeAllSequence();
    });

    $(document).on('keyup keydown keypress', 'textarea[name=pertanyaan]', function() {
        var model_soal = $('#model_soal_id option:selected').data('slug');

        if(model_soal == 'fill_in') {
            var stringsearch = "_"
                ,str = $(this).val();

            removeAllSequence();
            generateSequence(model_soal, stringsearch, str);
            resetCounter();
        }
    });

    $(document).on('click', '.btn_submit', function(e) {
        e.preventDefault();

        var type = $(this).val();
        var form_name = $(this).data('form');

        if (form_name == 'create') {
            $('input[name="type_save"]').val('');
            $('input[name="type_save"]').val(type);
        }

        /* Validation form */
        var form = $("#soal-form");
        validationForm(form);

        if($("#soal-form").valid()) {
            $("#soal-form").submit();
        }
    });
</script>