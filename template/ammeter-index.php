<!DOCTYPE html>
<html>
 <?php include ('include/head_script.php')?>
<body>
  <div class="n-layout">
    <?php include ('include/header.php')?>

        <div class="n-container">

      <div class="n-nav-left">
        <ul>
          <li class="current"><a href="/ammeter"><span class="glyphicon glyphicon-cloud" aria-hidden="true"></span><span class="vl-m">录入电表 - 杉实环境</span></a></li>
          <li><a href="/ammeter-other"><span class="glyphicon glyphicon-grain" aria-hidden="true"></span><span class="vl-m">录入电表 - 用能公司</a></li>

        </ul>
      </div>

      <div class="n-right-content">
        <h4 class="tab-to-title">录入电表 - 杉实环境</h4>
        <div class="n-check-area">
          <div class="input-group-item clearfix">
            <span class="name">基站名称：</span>
            <input type="text" class="form-control" required autofocus id="stationName"/>
          </div>
          <div class="input-group-item clearfix">
            <span class="name">基站电表采集时间：</span>
            <input type="text" class="form-control form_datetime" readonly value="2014-04-14 12:30" required   id="readTime"/>
          </div>
          <div class="input-group-item clearfix">
            <span class="name">基站电表采集值：</span>
            <input type="text" class="form-control" required  id="du" />
          </div>
          <div class="input-group-item tl-r">
            <button type="button" class="btn btn-default" id="create">确定</button>
          </div>
        </div>


        <table class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>基站名称</th>
              <th>采集时间</th>
              <th>录入值</th>
              <th>电表值</th>
              <th>最新E值</th>
              <th>录入人</th>
              <th>录入时间</th>
              <th>操作</th>
            </tr>
          </thead>
          <tbody id="content">


          </tbody>
        </table>

      </div>

    </div>

  </div>
</body>

<script type="text/javascript" src="/static/src/js/datepicker/bootstrap-datetimepicker.js"></script>
<script type="text/javascript">
$(function () {
    $(".form_datetime").datetimepicker({
      format: 'yyyy-mm-dd h:i',
      language: 'cn',
      autoclose:true

    });
        //显示所有项目名称
    	$get('/ammeter/ownList',{
            	start:0,
		end:15
	},function(d){

	   var data = d.data;
	   var html = '';
		for (var i=0;i<data.length;i++){
			var _d = data[i];
			html += '<tr>\
					  <td>'+_d.stationName+'</td>\
					  <td>'+_d.readTime+'</td>\
					  <td>'+_d.ammeterNormal+'</td>\
					  <td>'+_d.operater+'</td>\
					  <td>'+_d.createTime+'</td>\
					</tr>';
		}
            $('#content').html(html);
     });

});
$('#create').click(function(){
	$.post('/ammeter/ownAdd',{
	  stationName:$('#stationName').val(),
          readTime:$('#readTime').val(),
          du:$('#du').val(),
	},function(d){
		if(d.code == 0){
                    alert('抄表成功');
                    $('#stationName').val('');
                    $('#du').val('');
		}else{
                    alert('基站名称有误');
                }
	},'json');
});
</script>
</html>
