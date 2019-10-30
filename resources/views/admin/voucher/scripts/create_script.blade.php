<script type="text/javascript">
    $(document).ready(function() {
        $('.datetimepicker').datetimepicker();

        $('select[name=type]').on('change', function() {
        	var type = $(this).val();
            showHide(type);
        });

        function showHide(type)
        {
            if(type == 'multi') {
                $('#box-total').hide();
                $('input[name=total]').val(0);
                $('#box-voucher-code').show();

                $('span#voucher_code-error').html('');
                $('#box-voucher-code').removeClass('has-error');
                $('#box-voucher-code').removeClass('has-success');
            } else {
                $('#box-voucher-code').hide();
                $('input[name=voucher_code]').val(null);
                $('#box-total').show();

                $('span#total-error').html('');
                $('#box-total').removeClass('has-error');
                $('#box-total').removeClass('has-success');
            }
        }
    });
</script>