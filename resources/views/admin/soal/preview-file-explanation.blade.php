@if(! empty($pembahasan_soal->gambar))
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
                                            <b title="">{!! $pembahasan_soal->gambar !!}</b>
                                        </span>
                                        <span class="jFiler-item-others"></span>
                                    </div>
                                    <div class="jFiler-item-thumb-image">
                                        @if(check_type_file_from_filename($pembahasan_soal->gambar) == 'image')
                                            <a href="{!! get_media_url('soal/discussion', $pembahasan_soal->gambar) !!}" data-toggle="lightbox">
                                                <img src="{!!get_media_url('soal/discussion', $pembahasan_soal->gambar) !!}" draggable="false">
                                            </a>
                                        @else
                                            <span class="jFiler-icon-file f-file f-file-ext-{!! pathinfo($pembahasan_soal->gambar, PATHINFO_EXTENSION) !!}" style="-webkit-box-shadow: #409024 42px -55px 0px 0px inset; -moz-box-shadow: #409024 42px -55px 0px 0px inset; box-shadow: #409024 42px -55px 0px 0px inset;">.{!! pathinfo($pembahasan_soal->gambar, PATHINFO_EXTENSION) !!}
                                            </span>
                                        @endif
                                    </div>                                
                                </div>  
                                <div class="jFiler-item-assets jFiler-row">                         
                                    <ul class="list-inline pull-right">                        
                                        <li><a class="icon-jfi-trash jFiler-item-trash-action" data-id="{!! $pembahasan_soal->id !!}" data-type="discussion"></a></li>                      
                                    </ul>                                    
                                </div>                
                            </div>                        
                        </div>                    
                    </li>
                </ul>
            </div>
        </div>
    </div>
@endif