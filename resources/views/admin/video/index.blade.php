@extends('templates.master')

@section('header')
<link rel="stylesheet" type="text/css" href="{{ asset('css/dataTables.bootstrap.css') }}"/>
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
						<h2>@lang('news/backend.list')</h2>
						<div class="clearfix"></div>
					</div>
					<!-- X-title -->
					
					<!-- X-content -->
					<div class="x_content">
						<div id="list">
							<div class="form-group">
								<table id="video_list" class="table">
									<thead>
											<th>@lang('news/backend.id')</th>
											<th>@lang('news/backend.title')</th>
											<th>@lang('news/backend.avatar')</th>
											<th>@lang('news/backend.created_at')</th>
											<th>@lang('news/backend.function')</th>
									</thead>
									<tbody>
									</tbody>
								</table>
							</div>
						</div>
						<div class="form-group">
							<div class="col-md-3 col-sm-3 col-xs-12"></div>
							<div class="col-md-6 col-sm-6 col-xs-12 text-center">
								<button class="btn btn-default">@lang('category/backend.cancel')</button>
								<button class="btn btn-primary" type="submit">@lang('category/backend.add')</button>
							</div>
						</div>
					</div>
					<!-- X-content -->
				</div>
			</div>
		</div>
	</div>
</form>
<!-- Modal delete-->
<div id="modal-delete" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title"></h4>
			</div>
			<div class="modal-body">
				<p>@lang('news/backend.warning_delete')</p>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">@lang('news/backend.cancel')</button>
				<a href="" id="news-delete"  class="btn btn-danger" >@lang('news/backend.delete')</a>
			</div>
		</div>
	</div>
</div>
@endsection
@push('scripts')
<script type="text/javascript" src="{{ asset('js/dataTables.min.js') }}"></script>
<script type="text/javascript">
	var list = $('#video_list').DataTable({
		processing : true,
		serverSide : true,
		ajax : "{{ route('admin.video.data') }}",
		columns : [
			{"data":null,
				"render" : function (data, type, full, meta) {
					return meta.row+1; 
				},
				"searchable": false,
				"orderable": false 
			},
			{data : 'title'},
			{
				data : 'title_image', 
				name : 'title_image',
				"searchable": false,
				"orderable": false,
				render : function (data, type, full, meta) {
					var string = '<img src="{{ asset("images/videos/avatar") }}/'+data+'" height="50px" width="60px">';
					return string;
				}
			},
			{data : 'created_at', name : 'created_at'},
			{
				data : 'id', 
				"searchable": false,
				render : function (data, type, full, meta) {
					var string = '<a href="{{ route("admin.video.edit") }}/'+data+'" class="btn btn-xs btn-warning">Sửa</a>';
					string +=	'<button type="button" onclick="get_detail(this.value);return false;" value="'+data+'" class="btn btn-xs btn-danger">Xóa</button>';
					return string;
				}
			}
		],
	});

	function get_detail(id) {
		$.ajax({
			url : "{{ route('admin.video.detail') }}",
			data : { id:id },
			type : "GET",
		}).done(function(data) {
			console.log(data);
			$('.modal-title').text("{{Lang::get('news/backend.article')}}: "+data.title);
			$('#news-delete').attr('href',"{{ route('admin.video.delete') }}"+"/"+data.id);
			$('#modal-delete').modal("show");
		});
	}

	$('#news-delete').on('click', function(e) {
		e.preventDefault();
		$('#modal-delete').modal('hide');
		$.ajax({
			url : $(this).attr('href'),
			type : "GET",
		}).done(function(data) {
			if (data == 1) {
				list.draw();
				toastr.error('{{ Lang::get("news/backend.success") }}');
			} else {
				toastr.error('{{ Lang::get("news/backend.errors") }}');
			}
			$('#modal-delete').modal('hide');
		});
	});
</script>
@endpush