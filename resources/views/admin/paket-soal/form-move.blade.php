<div class="row">
    <div class="col-md-12">
        <div class="box box-primary">
            <div class="box-header">
            </div>
            {!! Form::open(['url' => route('admin.paket-soal.move'), 'class' => 'form-horizontal', 'autocomplete' => 'off']) !!}
            <div class="box-body">
                <div class="col-md-12">
                    <div class="form-group{{ Form::hasError('module_id') }}">
                        <label class="col-md-3 control-label">{!! trans('backend::app.table.head.title.paket.module') !!} </label>
                        <img style="height:150px; width:130px;" src="{!! get_media_url('module/thumb', $module->image) !!}"/>
                    </div>
                </div>
                <div class="col-md-12" style="margin-bottom: 1%;">
                    <div class="form-group{{ Form::hasError('module_id') }}">
                        <label class="col-md-3 control-label">{!! trans('backend::app.table.head.title.paket.package') !!} </label>
                        <label class="control-label">{!! $package->name !!}</label>
                    </div>
                </div>
                <div class="col-md-12" style="margin-bottom: 2%;">
                    <span><b>Pilih Paket Tujuan: </b></span>
                </div>
                <input type="hidden" name="from_package_id" id="id" value="{{ $package->id }}">
                <div class="col-md-12" style="margin-bottom: 2%;">
                    <div class="form-group{{ Form::hasError('module_id') }}">
                        <label class="col-md-3 control-label">{!! trans('backend::app.table.head.title.paket.module') !!} {!! trans('backend::app.label.mandatory_icon') !!}</label>
                        <div class="col-sm-5">
                            <div class="box-loader"></div>
                            <select name="module_id" id="module_id" class="form-control opt_select2" style="width: 250px;">
                                <option value="" data-pattern="">Pilih Module</option>
                                @if($module_images)
                                    @foreach($module_images as $list)
                                        <option value="{{ $list->id }}" data-slug="{{ $list->module_slug }}" data-image="{{ $list->image }}">{{ $list->name }}</option>
                                    @endforeach
                                @endif
                            </select>
                            {!! Form::errorMsg('module_id') !!}
                        </div>
                    </div>
                </div>
                <div class="col-md-12" style="margin-bottom: 2%;">
                    <div class="form-group{{ Form::hasError('subject_id') }}">
                        <label class="col-md-3 control-label">{!! trans('backend::app.table.head.title.paket.subject') !!} {!! trans('backend::app.label.mandatory_icon') !!}</label>
                        <div class="col-sm-5">
                            <div class="box-loader-subject"></div>
                            {!! Form::select('subject_id', [], null, ['class' => 'form-control','id' => 'school_subject_id','placeholder' => "Pilih Mata Pelajaran", 'disabled' => 'disabled', 'style' => 'width:250px;']) !!}
                            {!! Form::errorMsg('subject_id') !!}
                        </div>
                    </div>
                </div>
                <div class="col-md-12" style="margin-bottom: 2%;">
                    <div class="form-group{{ Form::hasError('theme_id') }}">
                        <label class="col-md-3 control-label">{!! trans('backend::app.table.head.title.paket.theme') !!} {!! trans('backend::app.label.mandatory_icon') !!}</label>
                        <div class="col-sm-5">
                            <div class="box-loader-theme"></div>
                            {!! Form::select('theme_id', [], null, ['class' => 'form-control', 'placeholder' => 'Pilih Tema', 'disabled' => 'disabled', 'id' => 'theme_id', 'style' => 'width:250px;']) !!}
                            {!! Form::errorMsg('theme_id') !!}
                        </div>
                    </div>
                </div>
                <div class="col-md-12" style="margin-bottom: 2%;">
                    <div class="form-group{{ Form::hasError('package_id') }}">
                        <label class="col-md-3 control-label">{!! trans('backend::app.table.head.title.paket.package') !!} {!! trans('backend::app.label.mandatory_icon') !!}</label>
                        <div class="col-sm-5">
                            {!! Form::select('package_id', [], null, ['class' => 'form-control', 'placeholder' => 'Pilih Paket', 'disabled' => 'disabled', 'id' => 'package_id', 'style' => 'width:250px;']) !!}
                            {!! Form::errorMsg('package_id') !!}
                        </div>
                    </div>
                </div>
            </div>
            <div class="box-footer">
                <div class="pull-right">
                    <a id="modal-cancel" href="#" class="btn btn-default" data-dismiss="modal">{!! trans('backend::app.button.cancel') !!}</a>
                    {!! Form::submit(trans('backend::app.button.move'), ['class' => 'btn btn-primary']) !!}
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>
{!! JsValidator::formRequest('App\Modules\Backend\Http\Requests\CopyPackageRequest') !!}

<script type="text/javascript">
    $(document).ready(function() {
        $(".opt_select2").select2({
            templateResult: formatState,
            templateSelection: formatSelection,
            escapeMarkup: function (m) {
                return m;
            }
        });

        $('#module_id').on('change', function() {
            var id = $(this).val();
            var school_subject = $('#school_subject_id');

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

        $('#school_subject_id').on('change', function() {
            var id        = $(this).val();
            var module_id = $('#module_id option:selected').val();
            var theme     = $('#theme_id');

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

        $('#theme_id').on('change', function() {
            var id        = $(this).val();
            var package     = $('#package_id');

            // show loading icon
            $('.overlay').remove();
            loading = '<div class="overlay"><i class="fa fa-spinner fa-spin" style="margin-left:50%;font-size:20px;"></i></div>';
            $('.box-loader-theme').append(loading);

            setTimeout(function() {
                $.ajax({
                    url: "{{ route('admin.soal.ajax-get-package-by-theme') }}",
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
                        var option = new Option('Pilih Paket', '', true, true);
                        package.empty();
                        package.append(option);
                        $.each(data, function(key, value) {
                            // create the option and append to Select2
                            option = new Option(value.id+'. '+value.name, value.id, true, false);
                            package.append(option);
                        });
                        package.select2();
                        package.prop('disabled', false);
                    }
                });
            }, 1000);
        });
    });

    function formatState (opt) {
        if (!opt.id) {
            return opt.text.toUpperCase();
        } 

        var optimage = $(opt.element).attr('data-image');
        if(!optimage){
            var $opt = $(
               '<span><img style="height:49px; width:49px;" src="{!! url('assets/img', "no_image.jpeg") !!}"/> ' + opt.text.toUpperCase() + '</span>'
            );
           return $opt;
        } else {                    
            var $opt = $(
               '<span><img style="height:49px; width:49px;" src="{!! get_media_url('module/thumb', "'+optimage+'") !!}"/> ' + opt.text.toUpperCase() + '</span>'
            );
            return $opt;
        }
    };

    function formatSelection(opt)
    {
        if (opt.id.length > 0 ) {
            return opt.text.toUpperCase() + "&nbsp;<i class='fa fa-dot-circle-o'></i>";
        } else {
            return opt.text.toUpperCase();
        }
    }
</script>