<script type="underscore/template" id="select-template">
	<div class="input-group input_author">
        <select class="form-control" name="author[<%=index%>]" id="answer-field-<%=optionIndex%>">
            <option value="" selected="selected">NONE</option>
        </select>
        <span class="input-group-btn">
            <button class="btn btn-default add_author" type="button"><i class="fa fa-plus fa-fw"></i></button>
            <button class="btn btn-default remove_author" type="button"><i class="fa fa-close fa-fw"></i></button>
        </span>
    </div>
</script>