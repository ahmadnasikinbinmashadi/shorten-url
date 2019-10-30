@include('backend::admin.module.scripts.function')

<script type="text/javascript">
    var i = $('.input_author').length - 1;

    $(document).on('click', '.add_author', function() {
        i++;
          var data = JSON.parse(JSON.stringify({!! $authors !!}));
          addDropdown(data, i);

          $('.input_author').css('margin-bottom', '10px');
    });

    $(document).on('click', '.remove_author', function() {
        $(this).closest('div').remove();
    });

    $("#imgInp").change(function(){
        readURL(this);
    });
    
    if ($('input[name=is_partner]').val() == 0) {
        $(document).on('change', 'select[name=publisher_id]', function(){
            var id      = $(this).val();
            var author  = $('#author');
            var loading = '<div class="overlay"><i class="fa fa-spinner fa-spin" style="margin-left:50%;font-size:20px;"></i></div>';

            $.ajax({
                url: "{{ route('admin.module.ajax-set-format-code-number') }}",
                type: 'POST',
                data: {
                    id: id,
                    _token: "{!! csrf_token() !!}"
                },
                beforeSend: function() {
                    // show loading icon
                    $('.overlay').remove();
                    $('.box-loader').append(loading);
                },
                success: function(response) {
                    // hide loading icon
                    $('.overlay').remove();

                    // process data response
                    $('input[name=code_number]').val('');
                    $('input[name=code_number]').val(response);
                },
                error: function(xhr, status, error) {
                    var errorMessage = xhr.status + ': ' + xhr.statusText;
                    alert('Error - ' + errorMessage);
                }
            });

            $.ajax({
                url: "{{ route('admin.module.ajax-get-authors-by-publisher') }}",
                type: 'POST',
                dataType: "JSON",
                data: {
                    id: id,
                    _token: "{!! csrf_token() !!}"
                },
                beforeSend: function() {
                    // show loading icon
                    $('.overlay').remove();
                    $('.box-loader').append(loading);
                },
                success: function(response) {
                    // hide loading icon
                    $('.overlay').remove();

                    // list authors by publishers
                    var option = new Option('Pilih Penulis', '', true, true);
                    author.empty();
                    author.append(option);
                    $.each(response, function(key, value) {
                        // create the option and append to Select2
                        option = new Option(value, key, true, false);
                        author.append(option);
                    });
                    author.select2();
                },
                error: function(xhr, status, error) {
                    var errorMessage = xhr.status +': '+ xhr.statusText;
                    alert('Error - '+ errorMessage);
                }
            });
        });
    } else {
        var id     = $('input[name=publisher_id]').val();
        var author = $('#author');

        setTimeout(function() {
            $.ajax({
                url: "{{ route('admin.module.ajax-set-format-code-number') }}",
                type: 'POST',
                data: {
                    id: id,
                    _token: "{!! csrf_token() !!}"
                },
                success: function(response) {
                    // process data response
                    $('#code_number').val('');
                    $('#code_number').val(response);
                },
                error: function(xhr, status, error) {
                    var errorMessage = xhr.status +': '+ xhr.statusText;
                    alert('Error - '+ errorMessage);
                }
            });

            $.ajax({
                url: "{{ route('admin.module.ajax-get-authors-by-publisher') }}",
                type: 'POST',
                dataType: "JSON",
                data: {
                    id: id,
                    _token: "{!! csrf_token() !!}"
                },
                success: function(response) {

                    // list authors by publishers
                    var option = new Option('Pilih Penulis', '', true, true);
                    author.empty();
                    author.append(option);
                    $.each(response, function(key, value) {
                        // create the option and append to Select2
                        option = new Option(value, key, true, false);
                        author.append(option);
                    });
                    author.select2();
                },
                error: function(xhr, status, error) {
                    var errorMessage = xhr.status +': '+ xhr.statusText;
                    alert('Error - '+ errorMessage);
                }
            });
        }, 500);
    }

    $(document).on('keyup', '#abc', function() {
        var price = $(this).val();
        $(this).val(formatRupiah(price));
    });
</script>