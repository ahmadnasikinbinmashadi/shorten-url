<script type="text/javascript">
	function add_refresh_select2(data, elm)
	{
		elm.empty();
        $.each(data, function(key, value) {
            // create the option and append to Select2
            option = new Option(value.name, value.id, true, false);
            elm.append(option);
        });
        elm.select2();
	}

	function save_group()
	{
		$('#btn-save-group').on('click', function() {
            var url        = $('form#form-add-group').attr('action');
            var data       = $('form#form-add-group').serializeArray();
            var group_name = $('input[name=group_name]').val();
            var alert_error = '<span id="group-name-error" class="help-block error-help-block">The group name field is required.</span>';
            if( group_name == '' || group_name == null ) {
                $('#add-group-modal').find('.form-group').addClass('has-error');
                $('#add-group-modal').find('.form-group div').append(alert_error);
                return false;
            }

            $.ajax({
                type: 'POST'
                ,url: url
                ,data: data
                ,success: function(response) {
                    $('#add-group-modal').modal('hide');
                    $('input[name=group_name]').val('');

                    var elm  = $('select[name=faq_group_id]');
                    var data = JSON.parse(response);
                    add_refresh_select2(data, elm);
                }
            });
        });
	}

	function loadTinyMce()
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
</script>