@extends('templates.master')

@section('header')
<link rel="stylesheet" type="text/css" href="{{ asset('css/select2.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('css/switchery.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('iCheck/skins/flat/green.css') }}">
@endsection

@section('content')
<form class="form-horizontal form-label-left" method="POST" enctype="multipart/form-data">
	{{ csrf_field() }}
	<div class="">
		<div class="page-title">
			<div class="title_left">
				<h3>@lang('news/backend.news')</h3>
			</div>
		</div>
		<div class="clearfix"></div>
		<div class="row">
			<div class="clearfix"></div>
			<div class="col-md-12 col-sm-12 col-xs-12">
				<div class="x_panel">
					<!-- X-title -->
					<div class="x_title">
						<h2>@lang('news/backend.add')</h2>
						<div class="clearfix"></div>
					</div>
					<!-- X-title -->

					<!-- X-content -->
					<div class="x_content">
						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="title">@lang('news/backend.title') <span class="required">*</span>
							</label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<input type="text" name="title" id="title" required="required" class="form-control col-md-7 col-xs-12">
							</div>
						</div>
						<div class="form-group">
							<label for="categories" class="control-label col-md-3 col-sm-3 col-xs-12">@lang('news/backend.categories') <span class="required">*</span></label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<select id="categories" class="form-control col-md-7 col-xs-12" name="categories[]" multiple="multiple" required>
										<?php foreach ($category_list as $key => $value): ?>
											<option value="{{ $value->id }}">{{ $value->title }}</option>
										<?php endforeach ?>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12">@lang('news/backend.hot')</label>
							<div class="col-md-9 col-sm-9 col-xs-12">
								<div class="">
									<label>
										<input type="checkbox" class="js-switch" name="is_hot" value="1" checked /> 
									</label>
								</div>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12">@lang('news/backend.view_mode')</label>
							<div class="col-md-9 col-sm-9 col-xs-12">
								<div class="">
									<label>
										<input type="radio" name="view_mode" id="view_mode_all" class="flat" checked value="all" /> @lang('news/backend.all') &nbsp
										<input type="radio" name="view_mode" id="view_mode_member" class="flat" value="member" />&nbsp @lang('news/backend.only_member')
									</label>
								</div>
							</div>
						</div>
						<div class="form-group">
							<label for="categories" class="control-label col-md-3 col-sm-3 col-xs-12">@lang('news/backend.title_image') <span class="required">*</span></label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<input type="file" class="form-control" name="title_image" id="title_image" required>
								<div class="form-group">
									<img src="" class="img img-thumbnail" id="preview_title_image" width="500px" height="auto" style="display: none;">
								</div>
							</div>
						</div>
						<div class="form-group">
							<label for="categories" class="control-label col-md-3 col-sm-3 col-xs-12">@lang('news/backend.video')</span></label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<input type="file" class="form-control" name="video" id="video">
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="content">@lang('news/backend.content') <span class="required">*</span>
							</label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<textarea id="content" name="content" required class="form-control col-md-7 col-xs-12"></textarea>
							</div>
						</div>
						<div class="form-group">
							<div class="col-md-3 col-sm-3 col-xs-12"></div>
							<div class="col-md-6 col-sm-6 col-xs-12 text-center">
								<button class="btn btn-default">@lang('news/backend.cancel')</button>
								<button class="btn btn-primary">@lang('news/backend.add')</button>
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
<script type="text/javascript" src="{{ asset('ckeditor_full/ckeditor.js') }}"></script>
<!-- <script src="http://cdn.ckeditor.com/4.7.1/standard-all/ckeditor.js"></script> -->
<!-- <script src="//cdn.ckeditor.com/4.7.1/full/ckeditor.js"></script> -->
<script type="text/javascript" src="{{ asset('ckfinder/ckfinder.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/select2.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/switchery.js') }}"></script>
<script type="text/javascript" src="{{ asset('iCheck/icheck.js') }}"></script>
<script type="text/javascript" >
	CKEDITOR.replace( 'content');
	$('#categories').select2({
		placeholder : "{{ Lang::get('news/backend.select_category') }}",
	});
</script>
<script type="text/javascript">
	function readURL(input) {
		if (input.files && input.files[0]) {
			var reader = new FileReader();
			reader.onload = function(e) {
				$('#preview_title_image').attr('src', e.target.result);
				$('#preview_title_image').css('display', 'block');
				console.log(e.target.result);
			}
			reader.readAsDataURL(input.files[0]);
		}
	}
	$("#title_image").change(function() {
		readURL(this);
	});
</script>
@endpush

