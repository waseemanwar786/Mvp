@extends('layouts.admin')
@section('content')
@can('user_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{  route("admin.events.create") }}">
                {{ trans('global.add') }} {{ trans('cruds.event.title') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.event.title') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Event">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            Id
                        </th>
                        <th>
                            Title
                        </th>
                        <th>
                            Status
                        </th>
                        <th>
                            Slug
                        </th>
                        <th>
                            Image
                        </th>
                        <th>
                            Description
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                @foreach($events as $key => $event)
                        <tr data-entry-id="$event->id">
                            <td>

                            </td>
                            <td>
                            {{ $event->id ?? '' }}
                            </td>
                            <td>
                            {{ $event->title ?? '' }}
                            </td>
                            <td>
                            {{ $event->status ? "Active": "Inactive" ?? '' }}
                            </td>
                            <td>
                            {{ $event->slug ?? '' }}
                            </td>
                            <td>
                                <a href="{{asset($event->image)}}" target="_blank"><img src="{{asset($event->image)}}" width="30px" height="30px"/></a>
                            </td>
                            <td>
                            {!! $event->description ?? '' !!}
                            </td>
                            <td>

                                <a class="btn btn-xs text-white btn-warning" href="{{ route('admin.events.users', $event->id) }}">Users</a>

                                @can('event_show')
                                    <a class="btn btn-xs text-white btn-primary" target="_blank" href="{{ route('events.frontend', $event->slug) }}">View</a>
                                @endcan

                                @can('event_edit')
                                    <a class="btn btn-xs text-white btn-info" href="{{ route('admin.events.edit' , $event->id) }}">Edit</a>
                                @endcan

                                @can('event_delete')
                                <form action="{{ route('admin.events.delete', $event->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                    </form>
                                    </form>
                                @endcan

                            </td>

                        </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('event_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.users.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
          return $(entry).data('entry-id')
      });

      if (ids.length === 0) {
        alert('{{ trans('global.datatables.zero_selected') }}')

        return
      }

      if (confirm('{{ trans('global.areYouSure') }}')) {
        $.ajax({
          headers: {'x-csrf-token': _token},
          method: 'POST',
          url: config.url,
          data: { ids: ids, _method: 'DELETE' }})
          .done(function () { location.reload() })
      }
    }
  }
  dtButtons.push(deleteButton)
@endcan

  $.extend(true, $.fn.dataTable.defaults, {
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  });
  let table = $('.datatable-Event:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });

})

</script>
@endsection
