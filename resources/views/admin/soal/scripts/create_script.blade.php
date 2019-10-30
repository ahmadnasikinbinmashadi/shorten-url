@include('backend::admin.soal.scripts.function')
@include('backend::admin.soal.scripts.event')

<script type="text/javascript">
    $(document).ready(function() {
    	var model_soal = $('#model_soal_id option:selected').data('slug');
        
        initSequence(model_soal);
        // clear form
    	resetForm();
    	// initial scoring
        initDefaultScoring();
        // initial checkbox slider
        initCheckboxSlider();

        loadTinyMce();
    });
</script>