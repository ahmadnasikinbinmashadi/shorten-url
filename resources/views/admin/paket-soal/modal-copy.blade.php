<!-- Modal Form copy data -->
<div id="modal-copy" class="modal fade" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                {!! trans('backend::app.label.copy') !!}
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="box box-primary">
                            <div class="box-header">
                            </div>
                            {!! Form::open(['url' => route('admin.paket-soal.multi-copy'), 'class' => 'form-horizontal', 'autocomplete' => 'off']) !!}
                            <div class="box-body">
                                <input type="hidden" name="from_package_ids" id="ids" value="">
                                <div class="col-md-12" style="margin-bottom: 2%;">
                                    <div class="form-group{{ Form::hasError('module_id') }}">
                                        <label class="col-md-4 control-label">{!! trans('backend::app.table.head.title.paket.module') !!} {!! trans('backend::app.label.mandatory_icon') !!}</label>
                                        <div class="col-sm-5">
                                            <div class="box-loader"></div>
                                            {!! Form::select('module_id', $modules, null, ['class' => 'form-control', 'id' => 'module', 'placeholder' => 'Pilih Module', 'style' => 'width:200px;']) !!}
                                            {!! Form::errorMsg('module_id') !!}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12" style="margin-bottom: 2%;">
                                    <div class="form-group{{ Form::hasError('subject_id') }}">
                                        <label class="col-md-4 control-label">{!! trans('backend::app.table.head.title.paket.subject') !!} {!! trans('backend::app.label.mandatory_icon') !!}</label>
                                        <div class="col-sm-5">
                                            <div class="box-loader-subject"></div>
                                            {!! Form::select('subject_id', [], null, ['class' => 'form-control','id' => 'school_subject','placeholder' => "Pilih Mata Pelajaran", 'disabled' => 'disabled', 'style' => 'width:200px;']) !!}
                                            {!! Form::errorMsg('subject_id') !!}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12" style="margin-bottom: 2%;">
                                    <div class="form-group{{ Form::hasError('theme_id') }}">
                                        <label class="col-md-4 control-label">{!! trans('backend::app.table.head.title.paket.theme') !!} {!! trans('backend::app.label.mandatory_icon') !!}</label>
                                        <div class="col-sm-5">
                                            {!! Form::select('theme_id', [], null, ['class' => 'form-control', 'placeholder' => 'Pilih Tema', 'disabled' => 'disabled', 'id' => 'theme', 'style' => 'width:200px;']) !!}
                                            {!! Form::errorMsg('theme_id') !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="box-footer">
                                <div class="pull-right">
                                    <a id="modal-cancel" href="#" class="btn btn-default" data-dismiss="modal">{!! trans('backend::app.button.cancel') !!}</a>
                                    {!! Form::submit(trans('backend::app.button.copy'), ['class' => 'btn btn-primary']) !!}
                                </div>
                            </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
{!! JsValidator::formRequest('App\Modules\Backend\Http\Requests\CopyPackageRequest') !!}

<script type="text/javascript">
    $(document).ready(function() {
        $('#module').on('change', function() {
            var id = $(this).val();
            var school_subject = $('#school_subject');

            // show loading icon
            $('.overlay').remove();
            loading = '<div class="overlay"><i class="fa fa-spinner fa-spin" style="margin-left:50%;font-size:20px;"></i></div>';
            $('.box-loader').append(loading);

            setTimeout(function() {
                $.ajax({
                    url: "{{ route('admin.paket-soal.ajax-get-subjects-by-module') }}",
                    type: 'POST',
                    data: {
                        id: id,
                        _token: "{!! csrf_token() !!}"
                    },
                    success: function(response) {
                        // hide loading icon
                        $('.overlay').remove();
                        
                        // process data response
                        var data = JSON.parse(response);
                        var option = new Option('Pilih Mata Pelajaran', '', true, true);
                        school_subject.empty();
                        school_subject.append(option);
                        $.each(data, function(key, value) {
                            // create the option and append to Select2
                            option = new Option(value.name, value.id, true, false);
                            school_subject.append(option);
                        });
                        school_subject.select2();
                        school_subject.prop('disabled', false);
                    }
                });
            }, 1000);
        });

        $('#school_subject').on('change', function() {
            var id        = $(this).val();
            var module_id = $('#module option:selected').val();
            var theme     = $('#theme');

            // show loading icon
            $('.overlay').remove();
            loading = '<div class="overlay"><i class="fa fa-spinner fa-spin" style="margin-left:50%;font-size:20px;"></i></div>';
            $('.box-loader-subject').append(loading);

            setTimeout(function() {
                $.ajax({
                    url: "{{ route('admin.paket-soal.ajax-get-themes-by-subject') }}",
                    type: 'POST',
                    data: {
                        subject_id: id,
                        module_id: module_id,
                        _token: "{!! csrf_token() !!}"
                    },
                    success: function(response) {
                        // hide loading icon
                        $('.overlay').remove();
                        
                        // process data response
                        var data = JSON.parse(response);
                        var option = new Option('Pilih Tema', '', true, true);
                        theme.empty();
                        theme.append(option);
                        $.each(data, function(key, value) {
                            // create the option and append to Select2
                            option = new Option(value.theme_name, value.id, true, false);
                            theme.append(option);
                        });
                        theme.select2();
                        theme.prop('disabled', false);
                    }
                });
            }, 1000);
        });
    });
</script>
