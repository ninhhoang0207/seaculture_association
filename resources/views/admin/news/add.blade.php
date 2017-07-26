@extends('templates.master')

@section('header')
<link rel="stylesheet" type="text/css" href="{{ asset('css/select2.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('css/switchery.css') }}">
@endsection

@section('content')
<form class="form-horizontal form-label-left">
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
								<select id="categories" class="form-control col-md-7 col-xs-12" name="categories" multiple="multiple">
										<option>Tin tức Hot</option>
										<option>Tin tức Hot</option>
										<option>Tin tức Hot</option>
										<option>Tin nổi bật</option>
										<option>Tin nổi bật</option>
										<option>Tin nổi bật</option>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12">@lang('news/backend.hot')</label>
							<div class="col-md-9 col-sm-9 col-xs-12">
								<div class="">
									<label>
										<input type="checkbox" class="js-switch" value="checked" checked /> 
									</label>
								</div>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="content">@lang('news/backend.content') <span class="required">*</span>
							</label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<input type="text" id="content" name="content" required="required" class="form-control col-md-7 col-xs-12">
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
<script type="text/javascript" src="{{ asset('ckeditor/ckeditor.js') }}"></script>
<script type="text/javascript" src="{{ asset('ckfinder/ckfinder.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/select2.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/switchery.js') }}"></script>
<script type="text/javascript" >
	CKEDITOR.replace( 'content');
	$('#categories').select2();
</script>
@endpush

