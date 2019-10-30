<script type="text/javascript">
    function generateOption(model_soal, sequences, parent, counter, name, indexAnswer)
    {
        $.each(sequences, function (key, sequence) {
            switch(model_soal) {
                case 'fill_in':
                    addOptionFillIn(
                        ((key == 0 && parent == '.option-container') ? true : false)
                        , parent
                        , key++
                        , name
                        , indexAnswer
                        , ((parent == '.option-container') ? false : true)
                        , sequence
                    );
                    break;
                case 'ordering':
                    addOptionOrdering(
                        ((key == 0 && parent == '.option-container') ? true : false)
                        , parent
                        , key++
                        , name
                        , indexAnswer
                        , ((parent == '.option-container') ? false : true)
                        , sequence
                    );
                    break;
                default:
                    addOptionSingleChoice(
                        ((key == 0 && parent == '.option-container') ? true : false)
                        , parent
                        , key++
                        , name
                        , indexAnswer
                        , ((parent == '.option-container') ? false : true)
                        , sequence
                    );
            }
        });
    }

	function addOptionSingleChoice(is_first, parent, counter, baseName, indexAnswer, is_child, dataBind){
        var dataIndex = [];
        var maxIndex = 0;
        var panel;
        var selectType;
        var urutan = 0;
        var index = getRandom();
        var deleteName = 'delete-sequence';
        var addName = 'add-sequence';
        baseName = 'sequence';
        indexAnswer = index;

        if(is_first == true) {
            urutan = 1;
        } else {
        	urutan = counter + 1;
        }

        seqTemplate = _.template( $("#single-choice-template").html() );

        panel = seqTemplate({
            baseName: baseName
            , deleteName: deleteName
            , counter: counter
            , indexAnswer: indexAnswer
            , addName: addName
            , index: index
            , isChild: is_child
            , urutan: urutan
            , answer: dataBind
        });

        $( parent ).append( panel );

        $( "[data-toggle='toggle']" ).bootstrapToggle( 'destroy' )
        $( "[data-toggle='toggle']" ).bootstrapToggle();
        if ( is_first == true ) {
            $( '.delete-sequence' ).hide();
            $('.correctField').val(1);
        }

        if ( typeof(dataBind) == "object" ) {
            setData(dataBind, index, indexAnswer, null);
        }
    }

    function addOptionFillIn(is_first, parent, counter, baseName, indexAnswer, is_child, dataBind){
        var dataIndex = [];
        var maxIndex = 0;
        var panel;
        var selectType;
        var urutan = 0;
        var index = getRandom();
        var deleteName = 'delete-sequence';
        var addName = 'add-sequence';
        baseName = 'sequence';
        indexAnswer = index;

        if(is_first == true) {
            urutan = 1;
        } else {
            urutan = counter + 1;
        }

        seqTemplate = _.template( $("#fill-in-template").html() );

        panel = seqTemplate({
            baseName: baseName
            , deleteName: deleteName
            , counter: counter
            , indexAnswer: indexAnswer
            , addName: addName
            , index: index
            , isChild: is_child
            , urutan: urutan
        });

        $( parent ).append( panel );

        $( "[data-toggle='toggle']" ).bootstrapToggle( 'destroy' )
        $( "[data-toggle='toggle']" ).bootstrapToggle();

        if ( typeof(dataBind) == "object" ) {
            setData(dataBind, index, indexAnswer, null);
        }
    }

    function addOptionOrdering(is_first, parent, counter, baseName, indexAnswer, is_child, dataBind){
        var dataIndex = [];
        var maxIndex = 0;
        var panel;
        var selectType;
        var urutan = 0;
        var index = getRandom();
        var deleteName = 'delete-sequence';
        var addName = 'add-sequence';
        baseName = 'sequence';
        indexAnswer = index;

        if(is_first == true) {
            urutan = 1;
        } else {
            urutan = counter + 1;
        }

        seqTemplate = _.template( $("#ordering-template").html() );

        panel = seqTemplate({
            baseName: baseName
            , deleteName: deleteName
            , counter: counter
            , indexAnswer: indexAnswer
            , addName: addName
            , index: index
            , isChild: is_child
            , urutan: urutan
        });

        $( parent ).append( panel );

        $( "[data-toggle='toggle']" ).bootstrapToggle( 'destroy' )
        $( "[data-toggle='toggle']" ).bootstrapToggle();

        if ( typeof(dataBind) == "object" ) {
            setData(dataBind, index, indexAnswer, null);
        }
    }

    function getRandom() {
        return Math.random().toString(36).substring(2);
    };

    function setData(dataBind, index, indexAnswer, optionIndex) {
        parent = $('.panel-option-' + index);

        if ( parent.length > 0 ) {

            pilihan_jawaban = $(parent.find('.jawabanField')[0]);
            pilihan_jawaban.val(dataBind.isi);

            bobot = $(parent.find('.bobotField')[0]);
            bobot.val(dataBind.bobot);

            is_correct = $(parent.find('.correctField')[0]);
            is_correct.val(dataBind.is_correct);

            var is_correct = dataBind.is_correct;

            if(is_correct > 0){
                parent.find('[type=checkbox]').attr('checked', true);
            }

            var image     = "{!! get_media_url('soal/answer_choice', '"+dataBind.gambar+"') !!}";
            var type_file = "{!! check_type_file_from_filename('"+dataBind.gambar+"') !!}";
            var no_image  = "{!! asset('assets/img/no_image.jpeg') !!}";

            file_jawaban = $(parent.find('#fileJawaban-'+index));
            file_jawaban.attr('src', image);

            file_title = $(parent.find('.jFiler-item-title'));
            file_title.append('<b title="">'+dataBind.gambar+'</b>');
            link_image = $(parent.find('.linkImage')[0]);
            link_image.attr('href', image);

            file_size = $(parent.find('.jFiler-item-others'));

            answer_id = $(parent.find('.idField'));
            answer_id.val(dataBind.id);
        }

        if(!jQuery.isEmptyObject($(parent.find(".rule-"+index)[0]))){
            $(".rule-"+index).val(dataBind.rules);
        } 

        if(!jQuery.isEmptyObject($(parent.find(".media-preview-"+index)[0]))){
            if(dataBind.media != null){
                $(".media-preview-"+index).attr('src', window.location.origin +'/'+dataBind.media).show();
                $(".old-media-"+index).val(dataBind.media);
            }
        }  
    }

    function checkImageExists(imageUrl, callBack) {
        var imageData = new Image();
        imageData.onload = function() {
        callBack(true);
        };
        imageData.onerror = function() {
        callBack(false);
        };
        imageData.src = imageUrl;
    }

    function initCheckboxSlider()
    {
        $.each($("input[type=checkbox]"), function(i, elm) {
            var value = $(this).val();
            if(value == 1) {
                $(this).prop("checked", true);
            }
        });

        $(document).on('change', '[type="checkbox"]', function(i, elm){
            if ($(this).is(':checked')) {
                $(this).val(1);
            }else{
                $(this).val(0);
            }
        });

        $(document).on('change', '.correctField', function() {
            var model_soal = $('#model_soal_id option:selected').data('slug');
            if(model_soal == 'single_choice') {
                initCheckboxSingleChoice($(this).data('index'));
            }
        });
    }

    function initCheckboxSingleChoice(index)
    {
        $.each($('.correctField'), function(i, me) {
            if( $(me).data('index') == index) {
                $(me).prop('checked', true);
            } else {
                $(me).prop('checked', false);
                $(me).val(0);
            }
        });
    }

    function initDefaultScoring()
    {
        var scoring = $('#scoring option:selected').val();
        if(scoring == 'default') {
            $('input[name=bobot_pertanyaan]').val(1);
            $('input[name=bobot_pertanyaan]').prop('readonly', true);
            $('.bobotField').prop('readonly', true);
        } else {
            $('input[name=bobot_pertanyaan]').prop('readonly', false);
            $('.bobotField').prop('readonly', false);
        }
    }

    function resetForm()
    {
        $('textarea[name=pertanyaan]').val('');
        $('input[name=gambar_pertanyaan]').val('');
        $('input[name=suara_pertanyaan]').val('');
        $('input[name=bobot_pertanyaan]').val('');
        $('textarea[name=pembahasan]').val('');
        $('input[name=gambar_pembahasan]').val('');
        $('.jawabanField').val('');
        $('.bobotField').val('');
        $('.imgJawaban').val('');
        $('.voiceJawaban').val('');
    }

    function initSequence(model_soal)
    {
        switch(model_soal) {
            case 'fill_in':
                addOptionFillIn( true, '.option-container', null, '', '', false, '' );
                $('#add_option').hide();
                $('#remove_all_option').hide();
                $('#note_question').show();
                break;
            case 'ordering':
                addOptionOrdering( true, '.option-container', null, '', '', false, '' );
                $('.delete_option').hide();
                $('#note_question').hide();
                $('#add_option').show();
                $('#remove_all_option').show();

                // clear form
                resetForm();
                break;
            default:
                addOptionSingleChoice( true, '.option-container', null, '', '', false, '' );
                $('.delete_option').hide();
                $('#note_question').hide();
                $('#add_option').show();
                $('#remove_all_option').show();
                
                // clear form
                resetForm();
                // initial scoring
                initDefaultScoring();
                // initial checkbox slider
                initCheckboxSlider();
        }
    }

    function generateSequence(model_soal, stringsearch, str)
    {
        for(var i=count=0; i<str.length; count+=+(stringsearch===str[i++]));

        for (var x = 0; x < count; x++) {
            initSequence(model_soal);    
        }
    }

    function resetCounter()
    {
        $('.direct-chat-primary').find('.box-title').each(function(index, value) {
            var counter = index + 1;
            $(this).text('Jawaban '+counter);
        });
        var len = $('.direct-chat-primary').find('.box-title').length;
        counter_panel = len;
    }

    function removeAllSequence()
    {
        $('.option-container').html('');
        counter_panel = 0;
    }

    function loadTinyMcev5()
    {
        tinymce.init({
            selector: "textarea.tinymce",
            setup: function (editor) {
                editor.on('init change', function () {
                    editor.save();
                });
            },
            plugins: [
                "advlist autolink lists link image charmap print preview anchor",
                "searchreplace visualblocks code fullscreen",
                "insertdatetime media table paste"
            ],
            toolbar: "insertfile | bullist numlist outdent indent | imageupload",
            /* without images_upload_url set, Upload tab won't show up*/

            automatic_uploads: true,

            /* we override default upload handler to simulate successful upload*/
            images_upload_url: "",
            file_picker_types: 'image',
            file_picker_callback: function(cb, value, meta) {
                var input = document.createElement('input');
                input.setAttribute('type', 'file');
                input.setAttribute('accept', 'image/*');
                input.onchange = function() {
                    var file = this.files[0];

                    var reader = new FileReader();
                    reader.readAsDataURL(file);
                    reader.onload = function () {
                        var id = 'blobid' + (new Date()).getTime();
                        var blobCache =  tinymce.activeEditor.editorUpload.blobCache;
                        var base64 = reader.result.split(',')[1];
                        var blobInfo = blobCache.create(id, file, base64);
                        blobCache.add(blobInfo);
                        cb(blobInfo.blobUri(), { title: file.name });
                    };
                };
                input.click();
            }
        });
    }

    function loadTinyMce() //version 4.3.3
    {
        tinymce.init({
          selector: "textarea.tinymce",
          height: 200,
          skin: 'lightgray',
          setup: function (editor) {
                editor.on('init change', function () {
                    editor.save();
                });
            },
          plugins: 'print preview fullpage searchreplace autolink directionality visualblocks code visualchars fullscreen image link media template codesample table charmap hr pagebreak nonbreaking anchor insertdatetime advlist lists textcolor wordcount imagetools contextmenu colorpicker textpattern paste',
          external_plugins: {
                'tiny_mce_wiris' : "{!! asset('assets/plugins/mathtype-tinymce4/plugin.min.js') !!}"
            },
          toolbar1: 'formatselect | bold italic strikethrough forecolor backcolor | link | alignleft aligncenter alignright alignjustify  | numlist bullist outdent indent  | removeformat | tiny_mce_wiris_formulaEditor | tiny_mce_wiris_formulaEditorChemistry',
          image_advtab: true,
          content_css: [
            '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
            '//www.tinymce.com/css/codepen.min.css'
          ]
         });
    }

    function toTop() {
        $('body,html').animate({
            scrollTop: 0
        }, 800);
        return false;
    };

    function notification_messages(message, type, elm) {
        var type_status = "Failed!";
        var no_image  = "{!! asset('assets/img/no_image.jpeg') !!}";

        if(type == "success"){ 
            type_status = "Success!";
        }

        if($.isArray(message)) {
            var flash_message = '';
            for (var i = 0; i < message.length; i++) {
                flash_message = flash_message + message[i];
            };
        }else{
            flash_message = message;
        }

        $.confirm({
            title: type_status,
            content: flash_message,
            type: 'custom',
            buttons: {
                confirm: {
                    text: 'OK',
                    btnClass: 'btn-blue',
                    keys: ['enter'],
                    action: function(){
                        if (type == "success" ) {
                            elm.closest('div').parent().find('img').attr('src', no_image); 
                            elm.closest('div').parent().find('.jFiler-item-title').text('');
                        }
                    }
                }
            }
        });
    }

    function validationForm(form)
    {
        jQuery.validator.setDefaults({
            debug: true,
            success: "valid",
            highlight: function(element) {
                $(element).closest('.form-group').removeClass('has-success');
                $(element).closest('.form-group').addClass('has-error');
            },
            unhighlight: function(element) {
                $(element).closest('.form-group').removeClass('has-error');
                $(element).closest('.form-group').addClass('has-success');
            },
            errorElement: 'span',
            errorClass: 'help-block',
            errorPlacement: function(error, element) {
                if(element.parent('.input-group').length) {
                    error.insertAfter(element.parent());
                } else {
                    error.insertAfter(element);
                }
            }
        });

        $.validator.addMethod("filesize_max", function(value, element, param) {
            var isOptional = this.optional(element),
                file, max_size = 150000;
            
            if(isOptional) {
                return isOptional;
            }
            
            if ($(element).attr("type") === "file") {
                if (element.files && element.files.length) {
                    file = element.files[0];       
                    if(file.size > max_size) {     
                        return false; 
                    } else {
                        return true;
                    }
                }
            }
        }, "The image may not be greater than 150 kilobytes.");

        $.validator.addClassRules("upload", {
            extension: 'jpg|jpeg|png',
            filesize_max: true
        });

        form.validate({
                errorPlacement: function errorPlacement(error, element) {  
                element.after(error);
            },
            rules:  {
            },
            messages: {
                name: {
                    required: "<p class='text-danger custom-td'>{{ trans('validation.required', [ 'attribute' => 'name']) }}</p>",
                    maxlength: "<p class='text-danger custom-td'>{{ trans('validation.max.string', [ 'attribute' => 'name', 'max' => '30']) }}</p>",
                },
                image: {
                    required: "<p class='text-danger custom-td'>{{ trans('validation.required', [ 'attribute' => 'image']) }}</p>",
                    extension: "<p class='text-danger custom-td'>{{ trans('validation.mimes', [ 'attribute' => 'image', 'values' => 'jpg, png']) }}</p>",
                },
                duration: {
                    required: "<p class='text-danger custom-td'>{{ trans('validation.required', [ 'attribute' => 'name']) }}</p>",
                }
            }
        });
    }

    function additionalValidationForm(field, value, index)
    {
        if (! $.trim(value)) {
            if (!$('#editor-error-message'+index).length) {
                $('textarea[name="'+field+'"]').closest('.form-group').removeClass('has-success');
                $('textarea[name="'+field+'"]').closest('.form-group').addClass('has-error');
                $('<span id="editor-error-message'+index+'" style="color:#dd4b39;display:block;margin-top:5px;margin-bottom:10px;">This field is required.</span>').insertAfter($(tinyMCE.get(field).getContainer()));
            }
            return 'error';
        } else {
            if ($('#editor-error-message'+index)) {
                $('textarea[name="'+field+'"]').closest('.form-group').removeClass('has-error');
                $('textarea[name="'+field+'"]').closest('.form-group').addClass('has-success');
                $('#editor-error-message'+index).remove();
            }
            return 'success';
        }
    }
</script>
