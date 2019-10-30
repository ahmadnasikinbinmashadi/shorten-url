@include('backend::admin.soal.scripts.function')
@include('backend::admin.soal.scripts.event')

<script type="text/javascript">
	$(document).ready(function() {
        var sequences = JSON.parse(JSON.stringify({!! ($pilihan_jawaban) !!}));
        var model_soal = $('#model_soal_id option:selected').data('slug');

        generateOption(model_soal, sequences, '.option-container', null, '', '');
        initDefaultScoring();
        // initial checkbox slider
        initCheckboxSlider();
        loadTinyMce();

        $('a.icon-jfi-trash').on('click', function() {
        	var id   = $(this).data('id');
        	var type = $(this).data('type');
        	var elm = $(this);

	        $.confirm({
                title: 'Konfirmasi',
                content: 'Apakah anda yakin mau menghapus gambar ini?',
                type: 'custom',
                buttons: {
                    no: {
                        text: 'BATAL',
                        keys: ['N'],
                        action: function () {
                        }
                    },
                    yes: {
                        text: 'IYA',
                        btnClass: 'btn-blue',
                        keys: ['y'],
                        action: function () {
                            $.ajax({
                                type: 'POST',
                                url: "{!! route('admin.soal.ajax-delete-image') !!}",
                                data: {
                                    _token: "{!! csrf_token() !!}"
                                    ,id: id
                                    ,type  : type
                                },
                                success: function(data) {
                                    notification_messages(data.message, data.status, elm);
                                }
                            });
                        }
                    },
                }
            });
        });
    });
</script>