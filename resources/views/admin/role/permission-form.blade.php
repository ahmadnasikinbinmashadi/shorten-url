
<div class="box-header with-border col-md-offset-2 col-md-8" >
    {!! Form::label('permission', trans('backend::app.label.permission'), ['class' => 'control-label']) !!}
</div>

<div class="table-responsive col-md-8 col-md-offset-2">
    <table id="role-permissions-table" class="table table-hover table-bordered table-condensed table-responsive" style="border: none">
        <thead>
            <tr>
                <th width="10%">&nbsp;</th>
                <th width="10%">&nbsp;</th>
                <th class="text-center">{!! trans('backend::app.table.menu') !!}</th>
                <th class="text-center" width="10%">{!! trans('backend::app.table.view') !!}</th>
                <th class="text-center" width="10%">{!! trans('backend::app.table.save') !!}</th>
                <th class="text-center" width="10%">{!! trans('backend::app.table.edit') !!}</th>
                <th class="text-center" width="10%">{!! trans('backend::app.table.delete') !!}</th>
            </tr>
            <tr>
                <th class="text-center">
                    <div class="checkbox icheck">
                        <label>
                            {{ Form::checkbox('check_all', 1, null, ['class' => 'check_all', 'id' => 'check_all']) }}
                        </label>
                    </div>
                </th>
                <th class="text-center">&nbsp;</th>
                <th class="text-center">&nbsp;</th>
                <th class="text-center" width="10%">
                    <div class="checkbox icheck">
                        <label>
                            {!! Form::checkbox('check_view') !!}
                        </label>
                    </div>
                </th>
                <th class="text-center" width="10%">
                    <div class="checkbox icheck">
                        <label>
                            {!! Form::checkbox('check_create') !!}
                        </label>
                    </div>
                </th>
                <th class="text-center" width="10%">
                    <div class="checkbox icheck">
                        <label>
                            {!! Form::checkbox('check_update') !!}
                        </label>
                    </div>
                </th>
                <th class="text-center" width="10%">
                    <div class="checkbox icheck">
                        <label>
                            {!! Form::checkbox('check_delete') !!}
                        </label>
                    </div>
                </th>
            </tr>
        </thead>
        <tbody >
            @if(!empty($features))
                @foreach($features as $key => $menu)
                    @if(hasPermission($menu->name))
                    <tr>
                        <td class="text-center">
                            <div class="checkbox icheck">
                                <label>
                                    @if(!$menu->is_parent)
                                        {!! Form::checkbox('check_menus[]', 1, null, ['class' => 'check_menu side_menu_'.$key]) !!}
                                    @endif
                                </label>
                            </div>
                        </td>
                        <td class="text-right valign-bottom">
                            @if($menu->is_parent)
                                <i class="fa fa-{{$menu->icon}}"></i>
                            @elseif(empty($menu->parent))
                                <i class="fa fa-{{$menu->icon}}"></i>  
                            @endif
                        </td>
                        <td class="text-left valign-bottom ">
                            @if(!empty($menu->parent))
                                <i class="fa fa-angle-right"></i>&nbsp;
                                {{$menu->display_name}}
                            @else
                                <b>{{$menu->display_name}}<b>
                            @endif
                            {!! Form::hidden('permission_id['.$menu->id.']', $menu->name, ['id' => 'permission_id']) !!}
                        </td>
                        <td class="text-center">
                            <div class="checkbox icheck">
                                <label>
                                    @if(!$menu->is_parent)
                                        {!! Form::hidden('menu_view['.$menu->id.']', 0, ['class' => 'check_view']) !!}
                                        @if(hasPermission($menu->name.'.view'))
                                            {!! Form::checkbox('menu_view['.$menu->id.']', 1, is_role_permission($menu->name.'.view', $permissions), ['class' => 'checkbox_view chk menu_'.$key, 'data-chk' => 'menu_'.$key]) !!}
                                        @else
                                            -
                                        @endif
                                    @endif
                                </label>
                            </div>
                        </td>
                        <td class="text-center">
                            <div class="checkbox icheck">
                                <label>
                                    @if(!$menu->is_parent)
                                        {!! Form::hidden('menu_create['.$menu->id.']', 0, ['class' => 'check_create']) !!}
                                        @if(hasPermission($menu->name.'.create'))
                                            {!! Form::checkbox('menu_create['.$menu->id.']', 1, is_role_permission($menu->name.'.create', $permissions), ['class' => 'checkbox_create chk menu_'.$key, 'data-chk' => 'menu_'.$key]) !!}
                                        @else
                                            -
                                        @endif
                                    @endif
                                </label>
                            </div>
                        </td>
                        <td class="text-center">
                            <div class="checkbox icheck">
                                <label>
                                    @if(!$menu->is_parent)
                                        {!! Form::hidden('menu_update['.$menu->id.']', 0, ['class' => 'check_update']) !!}
                                        @if(hasPermission($menu->name.'.edit'))
                                            {!! Form::checkbox('menu_update['.$menu->id.']', 1, is_role_permission($menu->name.'.edit', $permissions), ['class' => 'checkbox_update chk menu_'.$key, 'data-chk' => 'menu_'.$key]) !!}
                                        @else
                                            -
                                        @endif
                                    @endif
                                </label>
                            </div>
                        </td>
                        <td class="text-center">
                            <div class="checkbox icheck">
                                <label>
                                    @if(!$menu->is_parent)
                                        {!! Form::hidden('menu_delete['.$menu->id.']', 0, ['class' => 'check_delete']) !!}
                                        @if(hasPermission($menu->name.'.delete'))
                                            {!! Form::checkbox('menu_delete['.$menu->id.']', 1, is_role_permission($menu->name.'.delete', $permissions), ['class' => 'checkbox_delete chk menu_'.$key, 'data-chk' => 'menu_'.$key]) !!}
                                        @else
                                            -
                                        @endif
                                    @endif
                                </label>
                            </div>
                        </td>
                    </tr>
                    @endif
                @endforeach
            @endif
        </tbody>
    </table>
</div>