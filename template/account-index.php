<!DOCTYPE html>
<html>
 <?php include ('include/head_script.php')?>
<body>
  <div class="n-layout">
    <?php include ('include/header.php')?>
    <div class="n-container">
      <?php include ('include/nav_account.php')?>
	  <script>$('#account_nav_0').addClass('current');</script>
      <div class="n-right-content">
        <h4 class="tab-to-title">权限管理</h4>
        <div class="tl-r" style="margin-bottom:20px;">
          <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal">+ 增加用户</button>
        </div>
        <p style="color:#ff4400;">页面提示：点击增加用户按钮即可出来弹窗表单</p>
        <table class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>账户名</th>
              <th>用户姓名</th>
              <th>项目</th>
              <th>角色</th>
              <th>操作</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>hzhgeg</td>
              <td>张宇飞</td>
              <td>项目1/项目2/项目3</td>
              <td>管理员</td>
              <td>
                <button type="button" class="btn btn-default">编辑</button>
                <button type="button" class="btn btn-default">删除</button>
              </td>
            </tr>

            <tr>
              <td>hzhgeg</td>
              <td>张宇飞</td>
              <td>项目1</td>
              <td>操作人员</td>
              <td>
                <button type="button" class="btn btn-default">编辑</button>
                <button type="button" class="btn btn-default">删除</button>
              </td>
            </tr>

            <tr>
              <td>hzhgeg</td>
              <td>张宇飞</td>
              <td>项目1/项目2</td>
              <td>局方人员</td>
              <td>
                <button type="button" class="btn btn-default">编辑</button>
                <button type="button" class="btn btn-default">删除</button>
              </td>
            </tr>
          </tbody>
        </table>

        <div class="tl-r">
          <p>每页显示15条信息，查看更多请翻页。</p>
          <ul class="pagination">
            <li>
              <a href="#" aria-label="Previous">
                <span aria-hidden="true">&laquo;</span>
              </a>
            </li>
            <li><a href="#">1</a></li>
            <li><a href="#">2</a></li>
            <li><a href="#">3</a></li>
            <li><a href="#">4</a></li>
            <li><a href="#">5</a></li>
            <li>
              <a href="#" aria-label="Next">
                <span aria-hidden="true">&raquo;</span>
              </a>
            </li>
          </ul>
        </div>

      </div>

    </div>

  </div>


<div class="modal fade" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">添加用户</h4>
      </div>
      <div class="modal-body">

        <div class="n-check-area" style="border:0 none;">
          <div class="input-group-item clearfix">
            <span class="name">账户名：</span>
            <input type="text" class="form-control" required autofocus />
          </div>
          <div class="input-group-item clearfix">
            <span class="name">用户姓名：</span>
            <input type="text" class="form-control" required />
          </div>
          <div class="input-group-item clearfix">
            <span class="name">密码：</span>
            <input type="password" class="form-control" required />
          </div>
          <div class="input-group-item clearfix">
            <span class="name">密码确认：</span>
            <input type="password" class="form-control" required />
          </div>
          <div class="input-group-item clearfix">
            <span class="name">角色确认：</span>
            <select class="name" style="margin-top:6px;">
              <option>管理员</option>
              <option>管理员</option>
              <option>管理员</option>
            </select>
          </div>
          <div class="input-group-item clearfix">
            <span class="name">项目分配：</span>
            <label style="margin-right:20px;"><input type="checkbox" />项目1</label>
            <label style="margin-right:20px;"><input type="checkbox" />项目3</label>
            <label style="margin-right:20px;"><input type="checkbox" />项目2</label>
          </div>
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
        <button type="button" class="btn btn-success">确定</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<script>
	$.get('/account/list',{
	  start:0,
	  end:10
	},function(d){
		if(d.code == 0){
			var data = d.data;
		}
	},'json');
</script>
</body>
</html>
