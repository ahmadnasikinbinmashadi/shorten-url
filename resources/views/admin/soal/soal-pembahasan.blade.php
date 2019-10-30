<div class="box-body">
    <div class="col-md-offset-1 col-md-10">
        <div class="box box-solid box-primary" data-widget="box-widget">
            <div class="box-header">
                <h4 class="box-title" style="font-size: 15px;">{!! trans('backend::app.label.pertanyaan_gambar_suara') !!}</h4>
                <div class="box-tools">
                    <!-- This will cause the box to collapse when clicked -->
                    <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                </div>
            </div>
            <div class="box-body">
                <div class="form-group">
                    <label class="col-md-3 control-label">{!! trans('backend::app.table.head.title.soal.pertanyaan') !!} {!! trans('backend::app.label.mandatory_icon') !!}</label>
                    <div class="col-sm-9">
                        {!! Form::textarea('pertanyaan', (isset($soal->pertanyaan)) ? $soal->pertanyaan : null, ['class' => 'form-control tinymce editor_x', 'id' => 'pertanyaan']) !!} 
                        <span id="note_question" style="display: none;">Masukkan tanda (_) underscore untuk membuat isian</span>
                    </div>
                </div>

                <div class="form-group{{ Form::hasError('gambar_pertanyaan') }}">
                    <label class="col-md-3 control-label">{!! trans('backend::app.table.head.title.soal.file') !!}</label>
                    <div class="col-sm-4">
                        {!! Form::file('gambar_pertanyaan', ['class' => 'form-control']) !!}
                        {!! Form::errorMsg('gambar_pertanyaan') !!}
                    </div>
                </div>

                @include('backend::admin.soal.preview-file-question')

                <div class="form-group{{ Form::hasError('suara') }}">
                    <label class="col-md-3 control-label">{!! trans('backend::app.table.head.title.soal.suara') !!}</label>
                    <div class="col-sm-4">
                        {!! Form::file('suara_pertanyaan', ['class' => 'form-control']) !!}
                        {!! Form::errorMsg('suara') !!}
                    </div>
                </div>

                <div class="form-group{{ Form::hasError('bobot') }}">
                    <label class="col-md-3 control-label">{!! trans('backend::app.table.head.title.soal.bobot') !!} {!! trans('backend::app.label.mandatory_icon') !!}</label>
                    <div class="col-sm-4">
                        {!! Form::text('bobot_pertanyaan', (isset($soal->bobot)) ? $soal->bobot : null, ['class' => 'form-control']) !!}
                        {!! Form::errorMsg('bobot') !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-offset-1 col-md-10">
        <div class="box box-solid box-primary" data-widget="box-widget">
            <div class="box-header">
                <h4 class="box-title" style="font-size: 15px;">{!! trans('backend::app.label.pembahasan_gambar_suara') !!}</h4>
                <div class="box-tools">
                    <!-- This will cause the box to collapse when clicked -->
                    <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                </div>
            </div>
            <div class="box-body">
                <div class="form-group">
                    <label class="col-md-3 control-label">{!! trans('backend::app.table.head.title.soal.pembahasan') !!} {!! trans('backend::app.label.mandatory_icon') !!}</label>
                    <div class="col-sm-9">
                        {!! Form::textarea('pembahasan', (isset($pembahasan_soal->isi)) ? $pembahasan_soal->isi : null, ['class' => 'form-control tinymce']) !!}
                    </div>
                </div>

                <div class="form-group{{ Form::hasError('gambar_pembahasan') }}">
                    <label class="col-md-3 control-label">{!! trans('backend::app.table.head.title.soal.file') !!}</label>
                    <div class="col-sm-4">
                        {!! Form::file('gambar_pembahasan', ['class' => 'form-control']) !!}
                        {!! Form::errorMsg('gambar_pembahasan') !!}
                    </div>
                </div>

                @include('backend::admin.soal.preview-file-explanation')

                <div class="form-group{{ Form::hasError('suara') }}">
                    <label class="col-md-3 control-label">{!! trans('backend::app.table.head.title.soal.suara') !!}</label>
                    <div class="col-sm-4">
                        {!! Form::file('suara_pembahasan', ['class' => 'form-control']) !!}
                        {!! Form::errorMsg('suara') !!}
                    </div>
                </div>

                <div class="form-group">
                    <label for="label" class="col-sm-3 control-label">
                        {{ trans('backend::app.table.head.title.soal.tampil_pembahasan') }}
                    </label> 
                    <div class="col-md-4">
                        <label class="switch">
                          <input type="checkbox" name="is_show" value="{{ (isset($pembahasan_soal->is_show)) ? $pembahasan_soal->is_show : 1 }}">
                          <span class="slider round"></span>
                        </label>
                        {!! Form::errorMsg('is_show') !!}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-offset-1 col-md-10">
        <div class="box box-solid box-primary" data-widget="box-widget">
            <div class="box-header">
                <h4 class="box-title" style="font-size: 15px;">{!! trans('backend::app.label.jawaban') !!}</h4>
                <div class="box-tools">
                    <!-- This will cause the box to collapse when clicked -->
                    <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                </div>
            </div>
            <div class="box-body">
                <div class="col-sm-9">
                    <a class="btn btn-primary btn-sm" href="javascript:;" id="add_option">Tambah Jawaban</a>
                    <a class="btn btn-danger btn-modal-form btn-create btn-sm" href="javascript:;" data-background="modal-primary" id="remove_all_option">Hapus Semua Jawaban</a>
                </div>
                <div class="col-md-12 col-lg-12">
                    <hr>
                </div>

                <div class="option-container col-md-12 col-lg-12"></div>
            </div>
        </div>
    </div>
</div>