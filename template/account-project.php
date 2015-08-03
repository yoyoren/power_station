<!DOCTYPE html>
<html>
 <?php include ('include/head_script.php')?>
<body>
  <div class="n-layout">
    <?php include ('include/header.php')?>

    <div class="n-container">
      <?php include ('include/nav_account.php')?>
	  <script>$('#account_nav_1').addClass('current');</script>
      <div class="n-right-content">
        <h4 class="tab-to-title">创建项目</h4>

        <div class="n-check-area" style="border:0 none;">
          <div class="input-group-item clearfix" style="display:none">
            <span class="name">已有项目：</span>
            <span style="margin-right:20px;">上海杉实</span><span style="margin-right:20px;">上海杉实</span>
          </div>
          <div class="input-group-item clearfix">
            <span class="name">项目名称：</span>
            <input type="text" id="p_name" class="form-control" required autofocus />
          </div>
          <div class="input-group-item clearfix">
            <span class="name"></span>
            <button type="button" class="btn btn-default" id="create">确定</button>
          </div>

        </div>
		
        <h4 class="tab-to-title">项目管理</h4>
        <table class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>项目序号</th>
              <th>项目</th>
              <th>操作</th>
            </tr>
          </thead>
          <tbody id="project_list"></tbody>
        </table>
      </div>

    </div>

  </div>


<div class="modal fade" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">提示</h4>
      </div>
      <div class="modal-body">

        <div class="n-check-area" style="border:0 none;">
          <p style="text-align:center; color:#ff4400;">创建成功</p>
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success" data-dismiss="modal">确定</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
</body>
<script>
var project_list = $('#project_list')
$get('/project/list',{
	},function(d){
	   var data = d.data;
	   var html = '';
	   for(var i=0;i<data.length;i++){
	      html += '<tr><td>'+data[i].id+'</td><td data-id="'+data[i].id+'">'+data[i].projectName+'</td><td><button type="button" class="btn btn-default project_del" data-id="'+data[i].id+'">删除</button></td></tr>';
	   }	   
	   project_list.html(html);
	});
$('#create').click(function(){
	var name = $('#p_name');
	$post('/project/add',{
	  name:name.val()
	},function(d){
		if(d.code == 0){
			alert('创建成功');
			location.reload();
		}
	});
});

$('body').delegate('.project_del','click',function(){
	var _this = $(this);
	var del = confirm('确认删除该项目？');
	var id = _this.data('id');
	$post('/project/remove',{
	  id:id
	},function(d){
		if(d.code == 0){
			alert('删除成功');
			_this.parent().parent().remove();
		}
	});
});

</script>

</html>
