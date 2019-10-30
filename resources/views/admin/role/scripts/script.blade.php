<script>
    $(document).ready(function() {        
      var table = $('#role-table').DataTable({
          processing: true,
          serverSide: true,
          ajax: {
              "url": '{!! action('Admin\RoleController@datatables') !!}',
              "data": function(data) {
                  data.field_name = $('#field_name option:selected').val();
                  data.operator = $('#operator option:selected').val();
                  data.filter_value = $('#search').val();
              }
          },
          columns: [
              {data: 'name', name: 'name', searchable: true},
              {data: 'count_user', name: 'count_user', searchable: false},
              {data: 'created_at', name: 'created_at'},
              {data: 'created_name', name: 'created_user.fullname', searchable: true},
              {data: 'updated_at', name: 'updated_at'},
              {data: 'updated_name', name: 'updated_user.fullname', searchable: true},
              {data: 'deleted_at', name: 'deleted_at'},
              {data: 'deleted_name', name: 'deleted_user.fullname', searchable: true},
              {data: 'action', name: 'action', class: 'center-align', searchable: false, orderable: false}
          ],
          responsive: true,
          "scrollX": true,   // enables horizontal scrolling
          dom: 'lBfrtip',            
          buttons: ['excel']
      });

      $(".dt-buttons").css('margin-left', '10px');
      $("div.dataTables_length label").addClass('pull-left');

      /* Reload*/
      $('#refresh').on('click', function(event){
          event.preventDefault();
          table.ajax.reload();
      });
    });
</script>