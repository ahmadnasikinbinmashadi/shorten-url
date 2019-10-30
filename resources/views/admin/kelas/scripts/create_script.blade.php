@include('backend::admin.kelas.scripts.function')

<script type="text/javascript">
	$(document).ready(function() {
		$('#education_id').each(function() {
            $(this).on('change', function() {
            	var id   = $(this).val();
                var slug = this.options[this.selectedIndex].getAttribute('data-slug');

                if(slug != 'umum') {
					addDropdown(slug);
				} else {
					addText();
				}
            });
        });
	});
</script>