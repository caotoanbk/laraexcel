@extends('layouts.app')
@section('content')
	<div class="container">		
		<div class="mt-3">
		  <div>
		  		@if ($message = Session::get('success'))
					<div class="alert alert-success" role="alert">
						{{ Session::get('success') }}
					</div>
				@endif


				@if ($message = Session::get('error'))
					<div class="alert alert-danger" role="alert">
						{{ Session::get('error') }}
					</div>
				@endif


				<h3>Tải lên bảng công tháng:</h3>
				<form style="border: 4px solid #a1a1a1;margin-top: 15px;padding: 20px;" action="{{ URL::to('importExcel') }}" method="post" enctype="multipart/form-data">
					<div class="form-group">
						<label for="" class="control-label col-sm-2">Excel File:</label>
						<div class="col-sm-10">
							<input required type="file" name="import_file" style="border: none; margin-top:5px;" accept=".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel"/>

						</div>
					</div>
					{{ csrf_field() }}
					<div class="form-group">
						<label class="control-label col-sm-2">Công ty</label>
						<div class="col-sm-8">
						{!! Form::select('congty', $clients , null, ['placeholder' => 'Select..', 'class' => 'form-control', 'required']) !!}
						</div>
					</div>
					<div class="form-group">
						<label for="" class="control-label col-sm-2">Tháng:</label>
						<div class="col-sm-8">

							<input name="month" type="text" required="required" placeholder="tháng" class="form-control datepickr"/>
						</div>
					</div>

					<div class="form-group">
						<div class="col-sm-8 col-sm-offset-2">
							<button type="submit" class="btn btn-primary">Import CSV or Excel File</button>
							</div>	
					</div>


				</form>


		  </div>
		</div>
	</div>

@endsection

@section('javascript')
	<script>
	flatpickr('.datepickr',{enableTime: false, dateFormat: "Y-m", allowInput: true});
	</script>
@endsection