@extends('templates.master')
@section('title')
@lang('category/backend.header')
@endsection
@section('content')
<form class="form-horizontal form-label-left" enctype="multipart/form-data">
	<div class="">
		<div class="page-title">
			<div class="title_left">
				<h3>@lang('category/backend.category')</h3>
			</div>
		</div>
		<div class="clearfix"></div>
		<div class="row">
			<div class="clearfix"></div>
			<div class="col-md-12 col-sm-12 col-xs-12">
				<div class="x_panel">
					<!-- X-title -->
					<div class="x_title">
						<h2>@lang('category/backend.add')</h2>
						<div class="nav navbar-right">
							<button class="btn btn-success" id="btn_add" onclick="add_child();return false;">@lang('category/backend.add_child')</button>
						</div>
						<div class="clearfix"></div>
					</div>
					<!-- X-title -->

					<!-- X-content -->
					<div class="x_content">
						<div id="add_category">
							<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="title">@lang('category/backend.input_category') <span class="required">*</span>
								</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input type="text" name="title" id="title" required="required" class="form-control col-md-7 col-xs-12">
								</div>
							</div>
						</div>
						<div id="add_child_category" style="display: none;">
							<div class="form-group">
								<label for="category" class="control-label col-md-3 col-sm-3 col-xs-12">@lang('category/backend.category') <span class="required">*</span></label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<select id="category_list" class="form-control col-md-7 col-xs-12" name="category_list" disabled required="">
									</select>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="title">@lang('category/backend.input_child') <span class="required">*</span>
								</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input type="text" name="title_child" id="title_child" required="required" class="form-control col-md-7 col-xs-12" disabled>
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="col-md-3 col-sm-3 col-xs-12"></div>
							<div class="col-md-6 col-sm-6 col-xs-12 text-center">
								<button class="btn btn-default">@lang('category/backend.cancel')</button>
								<button class="btn btn-primary">@lang('category/backend.add')</button>
							</div>
						</div>
					</div>
					<!-- X-content -->
				</div>
			</div>
		</div>
	</div>
</form>
@endsection
@push('scripts')
<script type="text/javascript">

	function add_child() {
	
			$('#add_child_category').css('display','block');
			$('#category_list').attr('disabled',false);
			$('#title_child').attr('disabled',false);
			$('#add_category').css('display','none');
			$('#title').attr('disabled',true);
			$('#category_list').select2({
				placeholder: "{{Lang::get('category/backend.select_category')}}",
			});
			$('#btn_add').text('{{ Lang::get("category/backend.add_child") }}');
			$('#btn_add').attr('onclick','add_category();return false;');
	}

	function add_category() {

			$('#add_child_category').css('display','none');
			$('#category_list').attr('disabled',true);
			$('#title_child').attr('disabled',true);
			$('#add_category').css('display','block');
			$('#title').attr('disabled',false);
			$('#btn_add').text('{{ Lang::get("category/backend.add_category") }}');
			$('#btn_add').attr('onclick','add_child();return false;');

	}
</script>
@endpush

