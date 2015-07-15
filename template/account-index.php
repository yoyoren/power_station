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
          <button type="button" id="add" class="btn btn-success">+ 增加用户</button>
        </div>
        <table class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>账户名</th>
              <th>项目</th>
              <th>角色</th>
              <th>操作</th>
            </tr>
          </thead>
          <tbody id="data_container">

          </tbody>
        </table>

        <div class="tl-r">
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


<div class="modal" id="add_user_dialog" style="display:none">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close cancel_add_user_confirm"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">添加用户</h4>
      </div>
      <div class="modal-body">

        <div class="n-check-area" style="border:0 none;">
          <div class="input-group-item clearfix">
            <span class="name">账户名：</span>
            <input type="text" id="name" class="form-control" required autofocus />
          </div>
          <div class="input-group-item clearfix" style="display:none">
            <span class="name">用户姓名：</span>
            <input type="text" class="form-control" required />
          </div>
          <div class="input-group-item clearfix">
            <span class="name">密码：</span>
            <input type="password"  id="password" class="form-control" required />
          </div>
          <div class="input-group-item clearfix">
            <span class="name">密码确认：</span>
            <input type="password"  id="password_repeate" class="form-control" required />
          </div>
          <div class="input-group-item clearfix">
            <span class="name">角色确认：</span>
            <select class="name" style="margin-top:6px;" id="role">
              <option value="1">管理员</option>
              <option value="2">普通用户</option>
              <option value="3">局方用户</option>
            </select>
          </div>
          <div class="input-group-item clearfix project_list" id="add_project_list">
            <span class="name">项目分配：</span>
          </div>
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default cancel_add_user_confirm">关闭</button>
        <button type="button" class="btn btn-success" id="add_user_confirm">确定</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


<div class="modal" id="edit_user_dialog" style="display:none">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close cancel_edit_user_confirm"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">编辑用户</h4>
      </div>
      <div class="modal-body">

        <div class="n-check-area" style="border:0 none;">
          <div class="input-group-item clearfix">
            <span class="name">账户名：</span>
            <input type="text" id="edit_name" class="form-control" disbale="disable" required autofocus />
          </div>
          <div class="input-group-item clearfix">
            <span class="name">角色修改：</span>
            <select class="name" style="margin-top:6px;" id="role">
              <option value="1">管理员</option>
              <option value="2">普通用户</option>
              <option value="3">局方用户</option>
            </select>
          </div>
          <div class="input-group-item clearfix project_list" id="edit_project_list">
            <span class="name">项目分配：</span>
          </div>
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default cancel_edit_user_confirm">关闭</button>
        <button type="button" class="btn btn-success" id="edit_user_confirm">确定</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


<div class="modal-backdrop" id="mask" style="display:none;opacity:0.8"></div>
<script>
	var USER_TYPE = {
		1:'超级管理员',
		2:'普通用户',
		3:'局方用户'
	}
	
	//新增用户
	$('#add').click(function(){
		$('#add_user_dialog').show();
		$('#mask').show();
	});
	
	$('.cancel_add_user_confirm').click(function(){
		$('#add_user_dialog').hide();
		$('#mask').hide();
	});
	
	//弹框确认新增用户 
	$('#add_user_confirm').click(function(){

		var name = $('#name').val();
		var password = $('#password').val();
		var role = $('#role').val();
		var projects_input = $('#add_project_list').find('input');
		var projects_add_arr = [];
		var projects_remove_arr = [];
		for(var i=0;i<projects_input.length;i++){
			var _id = $(projects_input[i]).data('id');
			if(projects_input[i].checked){
				projects_add_arr.push(_id);
			}else{
				projects_remove_arr.push(_id);
			}
		}
		$.post('/account/add',{
		  name:name,
		  password:password,
		  type : role
		},function(d){
			if(d.code == 0){
				var id = d.data.id;
				$('#add_user_dialog').hide();
				$('#mask').hide();
				
				//增加项目
				$.post('/account/addproject_mass',{
				  project_id:projects_add_arr.join(','),
				  user_id:id
				},function(d){

				},'json');
				
				//删除项目
				$.post('/account/removeproject_mass',{
				  project_id:projects_remove_arr.join(','),
				  user_id:id
				},function(d){

				},'json');
				
				alert('添加成功！');
				
			} else {
			
			
			}
		},'json');
	});
	
	//全部的项目列表
	$get('/project/list',{
	
	},function(d){
		var project = d.data;
		var html = '';
		for(var i=0;i<project.length;i++){
			var d = project[i];
			html+='<label style="margin-right:20px;"><input data-id="'+d.id+'" type="checkbox" />'+d.projectName+'</label>';
		}
		$('.project_list').append(html);
	},'json');
	
	
	//编辑用户
	$('#edit_user_confirm').click(function(){
		var user_id;
		var role;
		$.post('/account/updateinfo',{
		  user_id:user_id,
		  type:role
		},function(d){
			if(d.code == 0){
				var id = d.data.id;
				$('#add_user_dialog').hide();
				$('#mask').hide();
				
				//增加项目
				$.post('/account/addproject_mass',{
				  project_id:projects_add_arr.join(','),
				  user_id:id
				},function(d){

				},'json');
				
				//删除项目
				$.post('/account/removeproject_mass',{
				  project_id:projects_remove_arr.join(','),
				  user_id:id
				},function(d){

				},'json');
				
				alert('添加成功！');
				
			} else {
			
			
			}
		},'json');
		
	});
	
	$('.cancel_edit_user_confirm').click(function(){
		$('#edit_user_dialog').hide();
		$('#mask').hide();
	});
	
	
	//编辑删除用户
	$('body').delegate('.user_edit','click',function(){
		var _this = $(this);
		var name = _this.data('name');
		var id = _this.data('id');
		$('#edit_name').val(name);
		$('#edit_user_dialog').show();
		$('#mask').show();
	}).delegate('.user_del','click',function(){
		var _this = $(this);
		var id = _this.data('id');
	});
	
	//用户列表
	$get('/account/list_with_project',{
	  start:0,
	  end:15
	},function(d){
		if(d.code == 0){
			var users = d.data.data;
			var html = '';
			for(var i=0;i<users.length;i++){
				var d = users[i];
				var project = d.project;
				var projectName = [];
				for(var j=0;j<project.length;j++){
					projectName.push(project[j].projectName);
				}
				html+='<tr>\
						<td>'+d.name+'</td>\
						<td>'+projectName.join('/')+'</td>\
						<td>'+USER_TYPE[d.type]+'</td>\
						  <td>\
							<button type="button" class="btn btn-default user_edit" data-name="'+d.name+'" data-id="'+d.id+'">编辑</button>\
							<button type="button" class="btn btn-default user_del" data-id="'+d.id+'">删除</button>\
						  </td>\
						</tr>';
			}
			
			$('#data_container').html(html);
		}
	},'json');
</script>
</body>
</html>
