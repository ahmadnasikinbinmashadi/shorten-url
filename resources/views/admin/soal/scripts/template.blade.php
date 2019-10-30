<script type="underscore/template" id="single-choice-template">
    <div class="box box-primary direct-chat-primary panel-option-<%= index %>" data-index="<%= index %>">
        <input type="hidden" name="<%= baseName%>[<%=index%>][answer_id]" value="" class="idField">
        <div class="box-header with-border">
            <h3 class="box-title">Jawaban <%= urutan %></h3>
            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool delete_option" data-index="<%=index%>"><i class="fa fa-times"></i></button>
            </div>
        </div>
        <div class="box-body">
            <div class="form-group">
                <label class="col-md-3 control-label">Isi Jawaban </label>
                <div class="col-sm-9">
                    <textarea class="form-control jawabanField tinymce" name="<%= baseName%>[<%=index%>][pilihan_jawaban]" cols="50" rows="10"></textarea>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-3 control-label">Bobot <span style="font-size:18px;color:red">*</span></label>
                <div class="col-sm-4">
                    <input class="form-control bobotField" maxlength="255" name="<%= baseName%>[<%=index%>][bobot_jawaban]" type="text">
                </div>
            </div>
            <div class="form-group">
                <label for="label" class="col-sm-3 control-label">
                    Jawaban Benar ?
                </label> 
                <div class="col-md-4">
                    <label class="switch">
                      <input type="checkbox" class="correctField" name="<%= baseName%>[<%=index%>][is_correct]" value="" data-index="<%= index %>">
                      <span class="slider round"></span>
                    </label>
                </div>
            </div>
            <div class="form-group{{ Form::hasError('sequence') }}">
                <label class="col-md-3 control-label">File </label>
                <div class="col-sm-4">
                    <input class="form-control imgJawaban upload" name="<%= baseName%>[<%=index%>][gambar_jawaban]" type="file">
                    {!! Form::errorMsg('sequence') !!}
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-3 control-label"></label>
                <div class="col-md-4">
                    <div class="jFiler-items jFiler-row" style="margin-bottom:-30px;">
                        <ul class="jFiler-items-list jFiler-items-grid">
                            <li class="jFiler-item jFiler-no-thumbnail" data-jfiler-index="2" style="">
                                <div class="jFiler-item-container">
                                    <div class="jFiler-item-inner">
                                        <div class="jFiler-item-thumb">
                                            <div class="jFiler-item-status"></div>
                                            <div class="jFiler-item-info">
                                                <span class="jFiler-item-title">
                                                    
                                                </span>
                                                <span class="jFiler-item-others"></span>
                                            </div>
                                            <div class="jFiler-item-thumb-image">
                                                <a href="" data-toggle="lightbox" class="linkImage">
                                                    <img class="img-fluid" id="fileJawaban-<%=index%>" src="{!! asset('assets/img/no_image.jpeg') !!}" draggable="false">
                                                </a>
                                            </div>                                
                                        </div>
                                        <div class="jFiler-item-assets jFiler-row">                                       
                                            <ul class="list-inline pull-right">                                            
                                                <li><a class="icon-jfi-trash jFiler-item-trash-action" data-id="<%=answer.id%>" data-type="answer"></a></li>                                        
                                            </ul>                                    
                                        </div>               
                                    </div>                        
                                </div>                    
                            </li>
                        </ul>
                    </div>
                </div>
            </div>  
            <div class="form-group">
                <label class="col-md-3 control-label">Suara</label>
                <div class="col-sm-4">
                    <input class="form-control voiceJawaban" name="<%= baseName%>[<%=index%>][suara_jawaban]" type="file">
                </div>
            </div>
        </div>
    </div>
</script>

<script type="underscore/template" id="fill-in-template">
        <div class="box box-primary direct-chat-primary panel-option-<%= index %>" data-index="<%= index %>">
            <input type="hidden" name="<%= baseName%>[<%=index%>][answer_id]" value="" class="idField">
            <div class="box-header with-border">
                <h3 class="box-title">Jawaban <%= urutan %></h3>
            </div>
            <div class="box-body">
                <div class="form-group">
                    <label class="col-md-4 control-label">Isi Jawaban <span style="font-size:18px;color:red">*</span></label>
                    <div class="col-sm-8">
                        <textarea class="form-control jawabanField tinymce" name="<%= baseName%>[<%=index%>][pilihan_jawaban]" cols="50" rows="10"></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-4 control-label">Bobot <span style="font-size:18px;color:red">*</span></label>
                    <div class="col-sm-8">
                        <input class="form-control bobotField" maxlength="255" name="<%= baseName%>[<%=index%>][bobot_jawaban]" type="text">
                    </div>
                </div>
            </div>
        </div>
</script>

<script type="underscore/template" id="ordering-template">
    <div class="col-md-6">
        <div class="box box-primary direct-chat-primary panel-option-<%= index %>" data-index="<%= index %>">
            <div class="box-header with-border">
                <h3 class="box-title">Jawaban <%= urutan %></h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool delete_option" data-index="<%=index%>"><i class="fa fa-times"></i></button>
                </div>
            </div>
            <div class="box-body">
                <div class="form-group">
                    <label class="col-md-4 control-label">Isi Jawaban <span style="font-size:18px;color:red">*</span></label>
                    <div class="col-sm-8">
                        <textarea class="form-control jawabanField" name="<%= baseName%>[<%=index%>][pilihan_jawaban]" cols="50" rows="10"></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-4 control-label">Bobot <span style="font-size:18px;color:red">*</span></label>
                    <div class="col-sm-8">
                        <input class="form-control bobotField" maxlength="255" name="<%= baseName%>[<%=index%>][bobot_jawaban]" type="text">
                    </div>
                </div>
                <div class="form-group">
                    <label for="label" class="col-sm-4 control-label">
                        No Urut
                        <span style="font-size:18px;color:red">*</span>
                    </label> 
                    <div class="col-md-8">
                        <input class="form-control noUrutField" maxlength="255" name="<%= baseName%>[<%=index%>][no_urut]" type="text">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-4 control-label">File </label>
                    <div class="col-sm-8">
                        <input class="form-control imgJawaban" name="<%= baseName%>[<%=index%>][gambar_jawaban]" type="file">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-4 control-label">Suara</label>
                    <div class="col-sm-8">
                        <input class="form-control voiceJawaban" name="<%= baseName%>[<%=index%>][suara_jawaban]" type="file">
                    </div>
                </div>
            </div>
        </div>
    </div>
</script>