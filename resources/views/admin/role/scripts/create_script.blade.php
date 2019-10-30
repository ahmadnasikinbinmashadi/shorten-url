<script type="text/javascript">
	$(document).ready(function() {
		/* Inisialize */
	    $('.icheck').iCheck({
	        checkboxClass: 'icheckbox_square-blue'
	    });

        enable_disable_partner();

        /* */
        $('select[name=is_partner]').change( function() {
            enable_disable_partner();
        });

	    /* Manage check all table permission */
        $('#check_all').on('ifClicked', function() {
              var chkToggle;
              $(this).is(':checked') ? chkToggle = "uncheck" : chkToggle = "check";
              $('input.check_menu').iCheck(chkToggle);
              $('input[type="checkbox"]').iCheck(chkToggle);
              $('input[name="check_view"]').iCheck(chkToggle);
              $('input[name="check_create"]').iCheck(chkToggle);
              $('input[name="check_update"]').iCheck(chkToggle);
              $('input[name="check_delete"]').iCheck(chkToggle);
        });

        $('input[name="check_view"]').on('ifClicked', function() {
            var chkToggle;
            $('input.check_all').iCheck('uncheck');
            $(this).is(':checked') ? chkToggle = "uncheck" : chkToggle = "check";
            $('input.checkbox_view').iCheck(chkToggle);
            if(chkToggle == 'uncheck'){
                $('input.checkbox_create').iCheck(chkToggle);
                $('input.checkbox_update').iCheck(chkToggle);
                $('input.checkbox_delete').iCheck(chkToggle);
                $('input[name="check_create"]').iCheck(chkToggle);
                $('input[name="check_update"]').iCheck(chkToggle);
                $('input[name="check_delete"]').iCheck(chkToggle);
            }
        });

        $('.checkbox_view').on('ifClicked', function() {
            $('input[name="check_view"]').iCheck('uncheck');
            $('input.check_all').iCheck('uncheck');
            var chkToggle;
            $(this).is(':checked') ? chkToggle = "uncheck" : chkToggle = "check";
            if(chkToggle == 'uncheck'){
                $(this).closest('tr').find('input.checkbox_create').prop('checked',false).iCheck('update');
                $(this).closest('tr').find('input.checkbox_update').prop('checked',false).iCheck('update');
                $(this).closest('tr').find('input.checkbox_delete').prop('checked',false).iCheck('update');
            }
            $(this).closest('tr').find('input.check_menu').prop('checked',false).iCheck('update');
        });

        $('input[name="check_create"]').on('ifClicked', function() {
            var chkToggle;
            $('input.check_all').iCheck('uncheck');
            $(this).is(':checked') ? chkToggle = "uncheck" : chkToggle = "check";
            $('input.checkbox_create').iCheck(chkToggle);
            if(chkToggle == 'check'){
                $('input.checkbox_view').iCheck(chkToggle);
                $('input[name="check_view"]').iCheck(chkToggle);
            }
        });

        $('.checkbox_create').on('ifClicked', function() {
            var chkToggle;
            $('input.check_all').iCheck('uncheck');
            $(this).is(':checked') ? chkToggle = "uncheck" : chkToggle = "check";
            var checkUpdateBtn = $($(this).closest('tr').find('input.checkbox_update')).is(':checked');
            var checkDeleteBtn = $($(this).closest('tr').find('input.checkbox_delete')).is(':checked');

            if(chkToggle == 'uncheck'){
                $('input[name="check_create"]').iCheck('uncheck');
                if(checkUpdateBtn || checkDeleteBtn){
                    $(this).closest('tr').find('input.checkbox_view').prop('checked',true).iCheck('update');
                }
            }else{
                $(this).closest('tr').find('input.checkbox_view').prop('checked',true).iCheck('update');
            } 
            $(this).closest('tr').find('input.check_menu').prop('checked',false).iCheck('update'); 
        });

        $('input[name="check_update"]').on('ifClicked', function() {
            var chkToggle;
            $('input.check_all').iCheck('uncheck');
            $(this).is(':checked') ? chkToggle = "uncheck" : chkToggle = "check";
            $('input.checkbox_update').iCheck(chkToggle);

            if(chkToggle == 'check'){
                $('input.checkbox_view').iCheck(chkToggle);
                $('input[name="check_view"]').iCheck(chkToggle);
            }
        });

        $('.checkbox_update').on('ifClicked', function() {
            $('input[name="check_update"]').iCheck('uncheck');
            $('input.check_all').iCheck('uncheck'); 
            var chkToggle;
            $(this).is(':checked') ? chkToggle = "uncheck" : chkToggle = "check";
            var checkCreateBtn = $($(this).closest('tr').find('input.checkbox_create')).is(':checked');
            var checkDeleteBtn = $($(this).closest('tr').find('input.checkbox_delete')).is(':checked');

            if(chkToggle == 'uncheck'){
                if(checkCreateBtn || checkDeleteBtn){
                    $(this).closest('tr').find('input.checkbox_view').prop('checked',true).iCheck('update');
                }
            }else{
                $(this).closest('tr').find('input.checkbox_view').prop('checked',true).iCheck('update');
            }  
            $(this).closest('tr').find('input.check_menu').prop('checked',false).iCheck('update'); 
        });

        $('input[name="check_delete"]').on('ifClicked', function() {
            var chkToggle;
            $('input.check_all').iCheck('uncheck');
            $(this).is(':checked') ? chkToggle = "uncheck" : chkToggle = "check";
            $('input.checkbox_delete').iCheck(chkToggle);
            if(chkToggle == 'check'){
                $('input.checkbox_view').iCheck(chkToggle);
                $('input[name="check_view"]').iCheck(chkToggle);
            }
        });

        $('.checkbox_delete').on('ifClicked', function() {
            var chkToggle;
            $('input.check_all').iCheck('uncheck');
            $(this).is(':checked') ? chkToggle = "uncheck" : chkToggle = "check";
            $('input[name="check_delete"]').iCheck('uncheck');

            var checkCreateBtn = $($(this).closest('tr').find('input.checkbox_create')).is(':checked');
            var checkUpdateBtn = $($(this).closest('tr').find('input.checkbox_update')).is(':checked');

            if(chkToggle == 'uncheck'){
                if(checkCreateBtn || checkUpdateBtn){
                    $(this).closest('tr').find('input.checkbox_view').prop('checked',true).iCheck('update');
                }
            }else{
                $(this).closest('tr').find('input.checkbox_view').prop('checked',true).iCheck('update');
            } 
            $(this).closest('tr').find('input.check_menu').prop('checked',false).iCheck('update'); 
              
        });

        $.each($('.check_menu'), function(i, elm) {
            $(this).on('ifChecked', function(e) {
                $(elm).closest('tr').find('input:checkbox').prop('checked',true).iCheck('update');
            });

            $(this).on('ifUnchecked', function(e) {
                $(elm).closest('tr').find('input:checkbox').prop('checked',false).iCheck('update');
                $('input.check_all').iCheck('uncheck');
                $('input[name="check_create"]').iCheck('uncheck');
                $('input[name="check_view"]').iCheck('uncheck');
                $('input[name="check_update"]').iCheck('uncheck');
                $('input[name="check_delete"]').iCheck('uncheck');
            });

        });

        $('.chk').on('ifClicked', function() {
            $(this).is(':checked') ? count = -1 : count = 1;
            $('.'+$(this).data('chk')).each(function(val) {
            console.log($(this).is(':checked'));
                $(this).is(':checked') ? count++ : ''; 
            });

            if (count == 4) {
                $('.side_'+$(this).data('chk')).iCheck('check');
            } else {
                $('.side_'+$(this).data('chk')).iCheck('uncheck');
            }
        });
	});

    function enable_disable_partner()
    {
        var is_partner = $('select[name=is_partner]').val();
        if(is_partner == 1) {
            $('select[name=publisher_id]').removeAttr('disabled');
            $('span#mandatory_icon').removeClass('hidden');
        } else {
            var elmPublisher = document.getElementById("publisher_id");
            if(elmPublisher) {
                $('select[name=publisher_id]').attr('disabled', 'disabled');
                $('select[name=publisher_id]').select2();
                document.getElementById("publisher_id").selectedIndex = "0";
                $('select[name=publisher_id]').trigger('change');
                $('span#mandatory_icon').addClass('hidden');
                $('.form-group.has-error label').css('color', '#333333');
                $('.form-group.has-success label').css('color', '#333333');
                $('.form-group.has-error #publisher_id-error').hide();
                $('.form-group.has-success #publisher_id-error').hide();
            }
        }
    }
</script>