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
          <div class="input-group-item clearfix">
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
$('#create').click(function(){
	var name = $('#p_name');
	$.post('/project/add',{
	  name:name.val()
	},function(d){
		if(d.code == 0){
			alert('创建成功');
		}
	},'json');
});
</script>

</html>
