<!DOCTYPE html>
<html>
 <?php include ('include/head_script.php')?>
<body>
  <div class="n-layout">
    <?php include ('include/header.php')?>

    <div class="n-container">

      <div class="n-nav-left">
        <ul>
          <li class="current"><a href="/log"><span class="glyphicon glyphicon-cloud" aria-hidden="true"></span><span class="vl-m">工作日志</span></a></li>
          <li id="nav_base_8"><a href="/base/create"><span class="glyphicon glyphicon-grain" aria-hidden="true"></span><span class="vl-m">基站创建</a></li>
        </ul>
      </div>

      <div class="n-right-content">
        <h4 class="tab-to-title">工作日志</h4>
        <div class="n-check-area">
          <div class="n-check-item2">
            <span class="name">日期</span>
            <input type="text" id="createTime" class="form-control form_datetime" value="" />
          </div>
          <div class="n-check-item2">
            <span class="name">工作类型</span>
            <select id="logType">
              <option value="">全部</option>
              <option value="0">创建</option>
              <option value="1">修改</option>
              <option value="2">删除</option>
            </select>
          </div>
          <div class="n-check-item2">
            <span class="name">操作者</span>
            <select id="operater">
                
            </select>
          </div>
            <button type="button" class="btn btn-default" onclick="search()">确定</button>
        </div>

        <table class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>记录时间</th>
              <th>基站名称</th>
              <th>操作类型</th>
              <th>修改项目</th>
              <th>原来</th>
              <th>当前</th>
              <th>操作者</th>
            </tr>
          </thead>
          <tbody id="container">
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
</body>


<script type="text/javascript" src="/static/src/js/datepicker/bootstrap-datetimepicker.js"></script>

<script type="text/javascript">
$(function () {
    $(".form_datetime").datetimepicker({
      format: 'yyyy-mm-dd',
      language: 'cn',
      minView: "month",
      autoclose:true 
    });
    $get('/log/list',{
		start:0,
		end:15
	},function(d){
		var data = d.data;
		var html = '';
		for (var i=0;i<data.length;i++){
			var _d = data[i];
			html += '<tr>\
					  <td>'+_d.createTime+'</td>\
					  <td>'+_d.stationName+'</td>\
					  <td>'+_d.workType+'</td>\
					  <td>'+_d.logDesc+'</td>\
					  <td>'+_d.originValue+'</td>\
					  <td>'+_d.currentValue+'</td>\
					  <td>'+_d.operater+'</td>\
					</tr>';
		}
		$('#container').html(html);
	   
    });
        $get('/log/operater',{
		
	},function(d){
		var data = d.data;
		var html = '';
		for (var i=0;i<data.length;i++){
			var _d = data[i];
			html += "<option value=\""+_d.accountId+"\">"+_d.accountName+"</option>";										
		}
		$('#operater').html(html);
	   
    });

});
window.search = function(){
	$.post('/log/list',{
		start:0,
		end:10,
                createTime:$("#createTime").val(),
                logType:$("#logType").val(),
                operaterId:$("#operater").val()
                
	},function(d){
            	var data = d.data;
		var html = '';
		for (var i=0;i<data.length;i++){
			var _d = data[i];
			html += '<tr>\
					  <td>'+_d.createTime+'</td>\
					  <td>'+_d.stationName+'</td>\
					  <td>'+_d.workType+'</td>\
					  <td>'+_d.logDesc+'</td>\
					  <td>'+_d.originValue+'</td>\
					  <td>'+_d.currentValue+'</td>\
					  <td>'+_d.operater+'</td>\
					</tr>';
		}
		$('#container').html(html);
	},'json');
}
</script>
</html>
