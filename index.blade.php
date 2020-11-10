@extends('admin.backend.layouts.master')
@section('title','Result')

@section('content')
@can('result-create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            
            <a class="btn btn-default" data-toggle="modal" data-target="#addResult" style="cursor: pointer;">
                <i class="fa fa-upload"></i> Import result from spreadsheet
            </a>

            <div class="modal fade" id="addResult">
                <div class="modal-dialog">
                    <form action="{{ route('admin.import-result')}}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}

                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Import from Spreadsheet</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span></button>
                        </div>
                        <div class="modal-body">
                        Make sure to upload an .xlsx or .xls file and adhere to our format <a href="{{ url('/sample/result_sample.xlsx')}}"> (download template)</a>
                            <br><br>
                            <input type="hidden" name="id" value="{{$id}}">
                            <input type="file" name="file" id=""file>
                        
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-success" >Import</button>
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </form>
                   
                </div>
         
            </div>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.result.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-result">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.result.fields.id') }}
                        </th>
                        <th>
                            Level
                        </th>
                        <th>
                            Course
                        </th>
                        <th>
                            Semester
                        </th>
                        <th>
                            Exam Year
                        </th>
                        <th>
                            Symbol
                        </th>
                        <th>
                            SGPA
                        </th>                        
                        <th>
                            Result
                        </th>
                        <th>
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($results as $key => $result)
                        <tr data-entry-id="{{ $result->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $loop->index + 1 ?? '' }}
                            </td>
                            <td>
                                {{ $result->average_grade ?? '' }}
                            </td>
                            <td>
                                {{ $result->course->name ?? '' }}
                            </td>
                            <td>
                                {{ $result->semester ?? '' }}
                            </td>
                             <td>
                                {{ $result->year ?? '' }}
                            </td>
                            <td>
                                {{ $result->symbol_no ?? '' }}
                            </td>
                            <td>
                                {{ $result->sgpa ?? '' }}
                            </td>
                            <td>
                                {{ $result->result ?? '' }}
                            </td>
                            <td>
                                    {{-- @can('result-show')
                                        <a class="btn btn-xs btn-primary" href="{{ route('admin.results.show', $result->id) }}">
                                            {{ trans('global.view') }}
                                        </a>
                                    @endcan

                                    @can('result-edit')
                                        <a class="btn btn-xs btn-info" href="{{ route('admin.results.edit', $result->id) }}">
                                            {{ trans('global.edit') }}
                                        </a>
                                    @endcan --}}

                                @can('result-delete')
                                    <form action="{{ route('admin.results.destroy', $result->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
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
@can('result-delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.results.massDestroy') }}",
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
          headers: {'x-csrf-token': $('meta[name="csrf-token"]').attr('content')},
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
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  });
  $('.datatable-result:not(.ajaxTable)').DataTable({ buttons: dtButtons })
    $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
        $($.fn.dataTable.tables(true)).DataTable()
            .columns.adjust();
    });
})

</script>
@endsection
