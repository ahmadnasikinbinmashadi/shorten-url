@include('backend::admin.paket-soal.styles.tinymce-skin')

<div id="import-modal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">{!! trans('backend::app.label.import_soal') !!}</h4>
            </div>
            <div class="modal-body">
                {!! Form::open(['id' => 'import-form', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                <!-- <div role="tabpanel" class="tox tox-dialog__body-content" style="height: 71px;" aria-labelledby="aria_5841457814181550046710767">
                    <div class="tox-form">
                        <div class="tox-form__group tox-form__group--stretched">
                            <div class="tox-dropzone-container">
                                <div class="tox-dropzone">
                                    <p>Drag & Drop file here</p>
                                    <button type="button" id="btn-import" data-alloy-tabstop="true" tabindex="-1" class="tox-button tox-button--secondary" style="position: relative;">Browse File
                                        <input name="file" id="soal-import" type="file" multiple="multiple" style="display: none;">
                                    </button>
                                </div>
                            </div>
                        </div>  
                    </div>  
                </div> --> 
                <div class="form-group">
                    <input name="file" id="soal-import" type="file" multiple="multiple" class="form-control">
                </div>       
            </div>
            <div class="modal-footer">
                    <a id="modal-cancel" href="#" class="btn btn-default" data-dismiss="modal">{!! trans('backend::app.button.cancel') !!}</a>&nbsp;
                    {!! Form::submit('Upload', ['class' => 'btn btn-primary']) !!}
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $('[data-tables=true]').on('click', '[data-button=import]', function(e) {
            var id = $(this).attr('data-id');
            $('#import-form').attr('action', "{{ route('admin.soal.import') }}?paket_id="+id);
            $('#import-modal').modal('show');
            e.preventDefault();
        });
    });
</script>
