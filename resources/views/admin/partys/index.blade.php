@extends('layouts.admin')
@section('content')
<div class="card">
    <div class="row">
        <div class="col-md-12">
            <div class="card-body">
                <div class="card-header">
                    {{ trans('cruds.party_list') }}
                </div>
                <div class="table-responsive">
                    <table class=" table table-bordered table-striped table-hover datatable datatable-User">
                        <thead>
                            <tr>
                                <th width="10">

                                </th>
                                <th>
                                    {{ trans('cruds.actions') }}
                                </th>
                                <th>
                                    {{ trans('cruds.party_code') }}
                                </th>
                                <th>
                                    {{ trans('cruds.party_name') }}
                                </th>
                                <th>
                                    {{ trans('cruds.contact_person') }}
                                </th>
                                <th>
                                    {{ trans('cruds.email') }}
                                </th>
                                <th>{{ __('cruds.phone') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($partys as $key => $party)
                            <tr data-entry-id="{{ $party->id }}">
                                <td>

                                </td>
                                <td>
                                    @if(show())
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.party.show', $party->id) }}">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    @endif
                                    @if(edit())
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.party.edit', $party->id) }}">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    @endif
                                    @if(delete())
                                    <form action="{{ route('admin.party.destroy', $party->id) }}" method="POST"
                                        onsubmit="return confirm('{{ trans('cruds.areYouSure') }}');"
                                        style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <button type="submit" class="btn btn-xs btn-danger">
                                            <i class="fas fa-trash"></i></button>
                                    </form>
                                    @endif
                                </td>
                                <td>
                                    {{ $party->party_code ?? '' }}
                                </td>
                                <td>
                                    {{ $party->party_name ?? '' }}
                                </td>
                                <td>
                                    {{ $party->contact_person ?? '' }}
                                </td>
                                <td> {{ $party->email ?? '' }}</td>
                                <td>{{ $party->contact_no ?? '' }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
@parent
<script>
$(function() {
    let route = "{{ route('admin.section_requisition_management.party.massDestroy') }}";
    let hasPermission = 0;
    <?php if (delete()) {?>
    hasPermission = 1;
    <?php }?>
    deleteSelected(route, hasPermission);
})

$(document).on("click", ".editAction", function() {
    let response = editAction(this);
    acl = response.acl;
    acl = acl.split(',');
    $("#update_id").val(response.id);
    $("#name").val(response.name);
    $("#email").val(response.email);
    $("#roles").val(response.role_id).trigger('change');
    
    $("#country_id").val(response.country_id).trigger('change');
    setTimeout(() => {
        $("#acl").val(acl).trigger('change');
        $("#office_id").val(response.office_id).trigger('change');
    }, 1000);
})
</script>
@endsection