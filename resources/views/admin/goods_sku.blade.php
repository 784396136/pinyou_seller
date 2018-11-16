<!DOCTYPE html>
<html>

<head>
	<!-- 页面meta -->
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>商品编辑</title>
	<!-- Tell the browser to be responsive to screen width -->
	<meta content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no" name="viewport">

	<link rel="stylesheet" href="/plugins/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="/plugins/adminLTE/css/AdminLTE.css">
	<link rel="stylesheet" href="/plugins/adminLTE/css/skins/_all-skins.min.css">
	<link rel="stylesheet" href="/css/style.css">
	<script src="/plugins/jQuery/jquery-2.2.3.min.js"></script>
	<script src="/plugins/bootstrap/js/bootstrap.min.js"></script>

	<!-- 富文本编辑器 -->
	<link rel="stylesheet" href="/plugins/kindeditor/themes/default/default.css" />
	<script charset="utf-8" src="/plugins/kindeditor/kindeditor-min.js"></script>
	<script charset="utf-8" src="/plugins/kindeditor/lang/zh_CN.js"></script>



	<style>
		.v_logo{
			width: 350px;
			display: inline-block;
		}
		input[type=file]{
			display: inline;
		}
		.img_preview{
			text-align: center;
		}
		td{
			vertical-align:middle !important;
		}
	</style>

</head>

<body class="hold-transition skin-red sidebar-mini">

	<!-- 正文区域 -->
	<section class="content">
		<form action="{{Route('goodsDoSku',['id'=>$id])}}" method="post" enctype="multipart/form-data">
		<div class="box-body">

			<!--tab页-->
			<div class="nav-tabs-custom">

				<!--tab头-->
				<ul class="nav nav-tabs">
					<li class="active">
						<a href="#home" data-toggle="tab">规格</a>
					</li>
				</ul>
				<table id="dataList" class="table table-bordered table-striped table-hover dataTable">
					<thead>
						<tr>
							<th class="sorting_asc">SKU名称</th>
							<th class="sorting">价格</th>
							<th class="sorting">库存</th>
						</tr>
					</thead>
					<tbody>
						@foreach ($sku as $v)
							<tr>
								<td>{{$v->sku_name}}</td>
								<td>{{$v->price}}</td>
								<td>{{$v->stock}}</td>
							</tr>
						@endforeach
					</tbody>
				<!--tab头/-->
					@csrf
					<!--tab内容-->
					<div class="tab-content">
						<!--表单内容-->
						<div class="tab-pane active" id="home">
							<div>

								<div class="row data-type">
									<table class="table table-bordered table-striped table-hover dataTable">
										<thead>
											<tr>
												<th class="sorting">SKU名称</th>
												<th class="sorting">价格</th> 
												<th class="sorting">库存</th>
											</tr>
										</thead>
										<tbody class="sku">
											<tr>
												<td>
													<input name="sku_name" class="form-control" placeholder="SKU名称">
												</td>
												<td>
													<input name="price" class="form-control" placeholder="价格">
												</td>
												<td>
													<input name="stock" class="form-control" placeholder="库存数量">
												</td>
											</tr>
										</tbody>
									</table>

								</div>

							</div>
						</div>
					</div>
					<!--tab内容/-->
					<!--表单内容/-->
					@foreach ($data as $k=>$v) 
					<div class="name">
						<input type="checkbox" name="attr_name{{$k}}" value="{{$v->n_id}}">{{$v->attr_name}}
					</div>
					<div class="value">
						@foreach ($v->value_list as $n=>$v2)
							<input type="radio" name="attr_value{{$k}}" value="{{$v->id_list[$n]}}">{{$v2}}
						@endforeach
					</div>
					@endforeach
					<div class="row data-type">
							<!-- 颜色图片 -->
							<div class="btn-group">
								<button type="button" id="add_img" class="btn btn-default" title="新建" >
									<i class="fa fa-file-o"></i> 新建
								</button>
							</div>

							<table class="table table-bordered table-striped table-hover dataTable">
								<thead>
									<tr>
										<th class="sorting">图片</th>
										<th class="sorting">操作</th>
								</thead>
								<tbody class="imgs">
									<tr>
										<td class="img_preview">
											<img alt="" src="" width="100px" height="100px">
										</td>
										<td>
											<input name='image[]' class="preview" type="file">
											<button type="button" class="btn btn-default" title="删除"><i class="fa fa-trash-o"></i> 删除</button>
										</td>
									</tr>
								</tbody>
							</table>

						</div>
			</div>




		</div>
		<div class="btn-toolbar list-toolbar">
			<button type="submit" class="btn btn-primary"><i class="fa fa-save"></i>保存</button>
			<button class="btn btn-default">返回列表</button>
		</div>
		</form>
	</section>



	<!-- 正文区域 /-->
	<script type="text/javascript">

		var editor;
		KindEditor.ready(function (K) {
			editor = K.create('textarea[name="content"]', {
				allowFileManager: true
			});
		});

	</script>
</body>

</html>
<script>
	// 把图片转成一个字符串
	function getObjectUrl(file) {
		var url = null;
		if (window.createObjectURL != undefined) {
			url = window.createObjectURL(file)
		} else if (window.URL != undefined) {
			url = window.URL.createObjectURL(file)
		} else if (window.webkitURL != undefined) {
			url = window.webkitURL.createObjectURL(file)
		}
		return url
	}

	$(".preview").change(function(){
		// 获取选择的图片
		var file = this.files[0]
		// 生成图片路径
		var url = getObjectUrl(file)

		var str = "<img width='120' height='auto' src='"+url+"' alt=''>"
		$(this).parent().prev(".img_preview").html(str)
		
	})
// 添加图片
var imgStr = ` <tr>
					<td class="img_preview">
						<img alt="" src="" width="100px" height="100px">
					</td>
					<td>
						<input name='image[]' class="preview" type="file" name="" id="">
						<button type="button" class="btn btn-default" title="删除"><i class="fa fa-trash-o"></i> 删除</button>
					</td>
				</tr>`;

	$('#add_img').click(function(){
		$(".imgs").append(imgStr)
		$(".preview").change(function(){
			// 获取选择的图片
			var file = this.files[0]
			// 生成图片路径
			var url = getObjectUrl(file)

			var str = "<img width='120' height='auto' src='"+url+"' alt=''>"
			$(this).parent().prev(".img_preview").html(str)
			
		})
	})
</script>