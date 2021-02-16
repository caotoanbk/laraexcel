@extends('layouts.app')

@section('content')
<div class="card mt-3" style="font-size: 14px;">
    <div class="card-header bg-dark text-white text-center">Bảng công</div>
    <div class="card-body">
        <div class="table-responsive" style="margin:0 auto;">
          <table class="table table-bordered table-sm" id="bangcong_table" style="width: 100%;margin-top: 10px;">
              <thead>
                  <th>Mã số OS</th>
                  <th>CMND</th>
                  <th>Họ tên</th>
                  <th>Ngày vào</th>
                  <th>Line</th>
                  <th>B.Phận</th>
                  <th>Ngày công</th>
                  <th>GC</th>
                  <th>TC</th>
                  <th>GC1</th>
                  <th>TC1</th>
                  <th>GC2</th>
                  <th>TC2</th>
                  <th>Loại ngày</th>
              </thead>

              <tbody></tbody>
          </table>
        </div>
      </div>
</div>
@endsection

@section('javascript')
<script>
    $(function() {
        $('.alert.alert-success').delay(2000).slideUp();
        var columnConfig = [];

        columnConfig.push({data: 'maos', name: 'maos', className: 'none'});
        columnConfig.push({data: 'cmt', name: 'cmt'});
        columnConfig.push({data: 'hoten', name: 'hoten'});
        columnConfig.push({data: 'ngayvao', name: 'ngayvao', className: 'none'});
        columnConfig.push({data: 'line', name: 'line'});
        columnConfig.push({data: 'bophan', name: 'bophan', searchable: false, orderable: false});
        columnConfig.push({data: 'ngay_lam', name: 'ngay_lam'});
        columnConfig.push({data: 'gc', name: 'gc'});
        columnConfig.push({data: 'tc', name: 'tc'});
        columnConfig.push({data: 'gc1', name: 'gc1'});
        columnConfig.push({data: 'tc1', name: 'tc1'});
        columnConfig.push({data: 'gc2', name: 'gc2'});
        columnConfig.push({data: 'tc2', name: 'tc2'});
        columnConfig.push({data: 'day_type', name: 'day_type', searchable: false, orderable: false});

        $('#bangcong_table').DataTable({
            "dom": "<'row'<'col-sm-12 col-md-4'l><'col-sm-12 col-md-4'<'toolbar'>><'col-sm-12 col-md-4'f>>" + "<'row'<'col-sm-12'tr>>" +
"<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
            "processing": true,
            "responsive": true,
            "select": {
                style:    'os',
                selector: 'tr'
            },
            "serverSide": true,
            "method": 'get',
            "scrollX": true,
            "select": true,
            "paging": true,
            "pageLength": 10,
            "ajax": {
                "url": '{!! route('bangcong.data') !!}',
                "type": 'get'
            },
            "columns": columnConfig
        });
        
        //$('select[name=bangcong_table_length]').removeClass('form-control').addClass('select_tbl_uv');
    });
</script>
@endsection