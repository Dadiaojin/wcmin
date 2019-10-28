<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<meta name="renderer" content="webkit|ie-comp|ie-stand">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
<meta http-equiv="Cache-Control" content="no-siteapp" />
<!--[if lt IE 9]>
<script type="text/javascript" src="lib/html5shiv.js"></script>
<script type="text/javascript" src="lib/respond.min.js"></script>
<![endif]-->
<link rel="stylesheet" type="text/css" href="{{asset('admins')}}/static/h-ui/css/H-ui.min.css" />
<link rel="stylesheet" type="text/css" href="{{asset('admins')}}/static/h-ui.admin/css/H-ui.admin.css" />
<link rel="stylesheet" type="text/css" href="{{asset('admins')}}/lib/Hui-iconfont/1.0.8/iconfont.css" />
<link rel="stylesheet" type="text/css" href="{{asset('admins')}}/static/h-ui.admin/skin/default/skin.css" id="skin" />
<link rel="stylesheet" type="text/css" href="{{asset('admins')}}/static/h-ui.admin/css/style.css" />
<!--[if IE 6]>
<script type="text/javascript" src="lib/DD_belatedPNG_0.0.8a-min.js" ></script>
<script>DD_belatedPNG.fix('*');</script>
<![endif]-->
<title>新增物品</title>
<link href="{{asset('admins')}}/lib/webuploader/0.1.5/webuploader.css" rel="stylesheet" type="text/css" />
</head>

<style>  
    #filePicker div:nth-child(2){width:100%!important;height:100%!important;}  
</style> 
<body>
<div class="page-container">
	<form class="form form-horizontal" id="form-goods-add" enctype="multipart/form-data">
           <input type="hidden" name="_token" value="{{csrf_token()}}">
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>物品名称：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text" value="" placeholder="" id="" name="goods_name">
			</div>
		</div>
           
           <div class="row cl">
			<label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>物品类型：</label>
			<div class="formControls col-xs-8 col-sm-9">
                            
                            <select name="cat_id">
                                @foreach($cat_id as $v)
                         <option value ="{{$v->id}}">{{$v->cat_name}}</option>
                        @endforeach
                        </select>
                            
			</div>
		</div>
            <div class="row cl">
			<label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>价格：</label>
			<div class="formControls col-xs-8 col-sm-9">
                            <input type="text" class="input-text" value="" placeholder="" id="" name="goods_price">
			</div>
		</div>
           
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>简略描述：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text" value="" placeholder="" id="" name="goods_desc">
			</div>
		</div>
            <div class="row cl">
			<label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>库存：</label>
			<div class="formControls col-xs-8 col-sm-9">
                            <input type="number" class="input-text" value="" placeholder="" id="" name="stock">
			</div>
		</div>
		
		
		
		
	
	
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2">缩略图：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<div class="uploader-thum-container">
                                    <input type="text" class="input-text" value="" placeholder="" id="goods_thumb" name="goods_thumb">
					<div id="fileList" class="uploader-list"></div>
                                        <div id="a">
                                            <div class="b" style="width: 700px">
                                                <div class="sr-only" style="width: 0%"></div>
                                            </div>
                                            
                                        </div>
					<div id="filePicker">选择图片</div>
					
				</div>
			</div>
		</div>
		
		<div class="row cl">
			<div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-2">
                           <!-- <button  class="btn btn-primary radius" type="button" onclick="submit()"><i class="Hui-iconfont">&#xe632;</i> 保存并提交审核</button>-->
                            <input type="submit" value="提交">
                            
				<button  onClick="layer_close();" class="btn btn-default radius" type="button">&nbsp;&nbsp;取消&nbsp;&nbsp;</button>
			</div>
		</div>
	</form>
</div>

 {{-- 错误提示显示validation --}}
     @if(count($errors)>0)
        <div>
            @foreach($errors->all() as $error)
            <p>{{$error}}</p>
            @endforeach
        </div>
        @endif
<!--_footer 作为公共模版分离出去-->
<script type="text/javascript" src="{{asset('admins')}}/lib/jquery/1.9.1/jquery.min.js"></script> 
<script type="text/javascript" src="{{asset('admins')}}/lib/layer/2.4/layer.js"></script>
<script type="text/javascript" src="{{asset('admins')}}/static/h-ui/js/H-ui.min.js"></script> 
<script type="text/javascript" src="{{asset('admins')}}/static/h-ui.admin/js/H-ui.admin.js"></script> <!--/_footer /作为公共模版分离出去-->

<!--请在下方写此页面业务相关的脚本-->
<script type="text/javascript" src="{{asset('admins')}}/lib/jquery.validation/1.14.0/jquery.validate.js"></script> 
<script type="text/javascript" src="{{asset('admins')}}/lib/jquery.validation/1.14.0/validate-methods.js"></script> 
<script type="text/javascript" src="{{asset('admins')}}/lib/jquery.validation/1.14.0/messages_zh.js"></script> 
<script type="text/javascript" src="{{asset('admins')}}/lib/webuploader/0.1.5/webuploader.min.js"></script> 
<script type="text/javascript">
function article_save(){
	alert("刷新父级的时候会自动关闭弹层。")
	window.parent.location.reload();
}

function submit(){
    document.getElementsByTagName("form")[0].submit();
}




$(function(){
	$('.skin-minimal input').iCheck({
		checkboxClass: 'icheckbox-blue',
		radioClass: 'iradio-blue',
		increaseArea: '20%'
	});
       
    })
//初始化文件上传
var uploader = WebUploader.create({
   
    auto:true,//立即上传
    //加载swf
    swf:'{{asset("admins/lib/webuploader/0.1.5/Uploader.swf")}}',
    server:'{{url("admin/goods/uploadimg")}}', //文件处理路径
    pick:'#filePicker',
    resize:false,
    //允许选择图片文件
    
    accept:{
        title:'Images',
        extensions:'gif,jpeg,jpg,png',
        //mimeTypes: 'image/jpg,image/jpeg,image/png'
        mimeTypes:'image/*'
    },
    //令牌
    formData:{
        "_token":"{{csrf_token()}}",
    }
    
});
uploader.on('uploadSuccess',function(file,data){
    
    console.log(data)
    //data返回上传文件路径
    var info=data.info;
   var imgs='<img style="width: 100px; margin-bottom: 10px" src="{{asset('')}}'+info+'">';
    $("#fileList").html(imgs);
    $("#a .sr-only").hide();
    $("#goods_thumb").val("/"+info);
    console.log(info)
    layer.msg("上传成功");
    
});

uploader.on("uploadProgress",function(file,percentage){
    $("#a .sr-only").css('width'.percentage*100+'%');
});




$("#form-goods-add").submit(function(event){
    //阻止表单默认提交
    event.preventDefault();
	//获取表单数据
	var data = $(this).serialize();
	//ajax提交
	$.ajax({
		type:'post',
		url:'{{url("admin/goods/add")}}',
		data:data,
		dataType:"json",
		success:function(msg){
			//msg服务器返回json格式数据
			if(msg.info==1){
				//成功
				parent.window.location.href= parent.window.location.href;
				layer_close();
                       // console.log(msg.info);
			}
			else{
				//失败
				layer.msg("添加失败"+msg.error,{icon:5,time:3000});
			}
		}
	});
})


        
            
            


</script>
</body>
</html>