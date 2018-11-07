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

		<div class="box-body">

			<!--tab页-->
			<div class="nav-tabs-custom">

				<!--tab头-->
				<ul class="nav nav-tabs">
					<li class="active">
						<a href="#home" data-toggle="tab">商品基本信息</a>
					</li>
					<li>
						<a href="#pic_upload" data-toggle="tab">商品图片</a>
					</li>
					<li>
						<a href="#customAttribute" data-toggle="tab">扩展属性</a>
					</li>
					<li>
						<a href="#spec" data-toggle="tab">规格</a>
					</li>
				</ul>
				<!--tab头/-->
				<form action="http://localhost:4545/seller/doadd" method="post" enctype="multipart/form-data">
					@csrf
				<!--tab内容-->
				<div class="tab-content"> 
					<!--表单内容-->
					<div class="tab-pane active" id="home">
						<div class="row data-type">
							<div class="col-md-2 title">商品分类</div>

							<div class="col-md-10 data">
								<table>
									<tr>
										<td>
											<select name="cat1" class="form-control cat_1">
												<option value="">请选择分类</option>
												@foreach ($category as $v)
													<option value="{{$v['id']}}">{{$v['cat_name']}}</option>
												@endforeach
											</select>
										</td>
										<td>
											<select name="cat2" class="form-control select-sm cat_2">
													<option value="">请选择上级分类</option>
											</select>
										</td>
										<td>
											<select name="cat3" class="form-control select-sm cat_3">
													<option value="">请选择上级分类</option>
											</select>
										</td>
									</tr>
								</table>

							</div>


							<div class="col-md-2 title">商品名称</div>
							<div class="col-md-10 data">
								<input type="text" name="goods_name" class="form-control" placeholder="商品名称" value="">
							</div>

							<div class="col-md-2 title">商品封面</div>
							<div class="col-md-10 data">
								<div class="v_logo">

								</div>
								<input type="file" class="logo" name="logo" class="form-control">
							</div>

							<div class="col-md-2 title">品牌</div>
							<div class="col-md-10 data">
								<table>
									<tr>
										<td>
											<select name="brand_id" class="form-control">
												<option value="">请选择品牌</option>
												@foreach ($brand as $v)
													<option value="{{$v->id}}">{{$v->brand_name}}</option>
												@endforeach
											</select>
										</td>
									</tr>
									
								</table>
								
							</div>

							<div class="col-md-2 title">副标题</div>
							<div class="col-md-10 data">
								<input name="subtitle" type="text" class="form-control" placeholder="副标题" value="">
							</div>

							<div class="col-md-2 title editer">商品介绍</div>
							<div class="col-md-10 data editer">
								<textarea name="content" style="width:800px;height:400px;visibility:hidden;"></textarea>
							</div>
						</div>
					</div>

					<!--图片上传-->
					<div class="tab-pane" id="pic_upload">
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


					<!--扩展属性-->
					<div class="tab-pane" id="customAttribute">
						<div class="row data-type">
							<div class="btn-group">
								<button type="button" id="add_attr" class="btn btn-default" title="新建" >
									<i class="fa fa-file-o"></i> 新建
								</button>
							</div>
							<div id="attr">
								<div>
								<div class="col-md-2 title">属性名:</div>
									<div class="col-md-10 data">
										<input name="attr[]" class="form-control" placeholder="属性名">
									</div>
								</div>
								<div>
									<div class="col-md-2 title">属性值:</div>
									<div class="col-md-10 data">
										<input name="attr_value[]" class="form-control" placeholder="属性值">
									</div>
								</div>
							</div>
							
						</div>
					</div>
				</div>
				<!--tab内容/-->
				<!--表单内容/-->
				

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
	$(".logo").change(function(){
		var file = this.files[0]
		var url = getObjectUrl(file)
		var str = "<img width='120' height='auto' src='"+url+"' alt=''>"
		$('.v_logo').html(str)
	})

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

	// 添加属性
	var attrStr = `<br><br><br><br><br><br>                                                                                                                                                     <div>
									<div class="col-md-2 title">属性名:</div>
									<div class="col-md-10 data">
										<input name="attr[]" class="form-control" placeholder="属性名">
									</div>
								</div>
								<div>
									<div class="col-md-2 title">属性值:</div>
									<div class="col-md-10 data">
										<input name="attr_value[]" class="form-control" placeholder="属性值">
									</div>
								</div>`
	$("#add_attr").click(function(){
		$("#attr").append(attrStr)
	})
	
	// 添加SKU
	var skuStr = `  <tr>
						<td>
							<input name='sku_name[]' class="form-control" placeholder="SKU名称">
						</td>
						<td>
							<input name='price[]' class="form-control" placeholder="价格">
						</td>
						<td>
							<input name='stock[]' class="form-control" placeholder="库存数量">
						</td>
					</tr>`
	$("#add_sku").click(function(){
		$(".sku").append(skuStr)
	})

	$(".cat_1").change(function(){
		console.log($(this).val())
		var id = $(this).val()
		$.ajax({
			type:"GET",
			url:"{{Route('getParent')}}",
			data:{id:id},
			dataType:'json',
			success:function(data){
				var str = '';
				for(var i=0;i<data.length;i++)
				{
					str += "<option value='"+data[i]['id']+"'>"+data[i]['cat_name']+"</option>"
				}
				$(".cat_2").html(str)
				$(".cat_2").trigger('change')
			}
		})
	})

	$(".cat_2").change(function(){
		console.log($(this).val())
		var id = $(this).val()
		$.ajax({
			type:"GET",
			url:"{{Route('getParent')}}",
			data:{id:id},
			dataType:'json',
			success:function(data){
				var str = '';
				for(var i=0;i<data.length;i++)
				{
					str += "<option value='"+data[i]['id']+"'>"+data[i]['cat_name']+"</option>"
				}
				$(".cat_3").html(str)
			}
		})
	})
</script>