<script type="underscore/template" id="select-template">
    <div class="form-group">
        <div class="col-sm-5 col-md-offset-3">
            <select class="form-control valid parent_field" maxlength="255" name="child_id" id="answer-field-<%=optionIndex%>" data-index="<%=optionIndex%>" aria-invalid="false">
                <option value="0" selected="selected">NONE</option>
            </select>
        </div>
    </div>

    <div class="box_child_<%=optionIndex%>"></div>
</script>