<!DOCTYPE html>
<html>
 <?php include ('include/head_script.php')?>
<body>
  <div class="n-layout">
    <?php include ('include/header.php')?>

    <div class="n-container">

      <?php include ('include/nav_base.php')?>
	  <script>$('#nav_base_7').addClass('current');</script>

      <div class="n-right-content">
        <h4 class="tab-to-title">远程配置</h4>
        <div class="current-name-area clearfix">
          <span class="vl-m fl-l name"><b>001</b>基站</span>

          <div class="fl-r">
            <div class="btn-group">
              <button type="button" class="btn btn-default">
                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span><span class="vl-m">前一个基站</span>
              </button>
              <button type="button" class="btn btn-default">
                <span class="vl-m">后一个基站</span><span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
              </button>
            </div>
          </div>

        </div>


        <div class="nav-tabs-content">



         <table id="get_table" class="table table-bordered table-striped" role="grid">
          <thead>
            <tr>
              <th>属性</th>
			  <th>值</th>
			  <th>操作</th>
            </tr>
          </thead>
		  <tr>
              <td>ECU unique ID</td>
			  <td></td>
			  <td><button data-id="1">查询</button></td>
          </tr>
		  <tr>
              <td>ECU site ID</td>
			  <td></td>
			  <td><button data-id="2">查询</button></td>
          </tr>
		  <tr>
              <td>ECU IP地址</td>
			  <td></td>
			  <td><button data-id="3">查询</button></td>
          </tr>
		  <tr>
              <td>ECU 电源按钮状态</td>
			  <td></td>
			  <td><button data-id="4">查询</button></td>
          </tr>
		  <tr>
              <td>ECU 硬件版本</td>
			  <td></td>
			  <td><button data-id="5">查询</button></td>
          </tr>
		  <tr>
              <td>ECU 软件版本</td>
			  <td></td>
			  <td><button data-id="6">查询</button></td>
          </tr>
		  <tr>
              <td>3G卡号</td>
			  <td></td>
			  <td><button data-id="7">查询</button></td>
          </tr>
		  <tr>
              <td>Server/Addr</td>
			  <td></td>
			  <td><button data-id="8">查询</button></td>
          </tr>
		  <tr>
              <td>FTP服务器地址</td>
			  <td></td>
			  <td><button data-id="9">查询</button></td>
          </tr>
		  <tr>
              <td>FTP用户名密码</td>
			  <td></td>
			  <td><button data-id="10">查询</button></td>
          </tr>
		  <tr>
              <td>SERVER</td>
			  <td></td>
			  <td><button data-id="11">查询</button></td>
          </tr>
		  <tr>
              <td>故障信息</td>
			  <td></td>
			  <td><button data-id="11">查询</button></td>
          </tr>
		  <tr>
              <td>节能控制周期</td>
			  <td></td>
			  <td><button data-id="12">查询</button></td>
          </tr>
		  <tr>
              <td>上报周期</td>
			  <td></td>
			  <td><button data-id="13">查询</button></td>
          </tr>
		  <tr>
              <td>ECU节能控制状态</td>
			  <td></td>
			  <td><button data-id="14">查询</button></td>
          </tr>
		  <tr>
              <td>室内目标温度</td>
			  <td></td>
			  <td><button data-id="15">查询</button></td>
          </tr>
		  <tr>
              <td>开室内温度门限</td>
			  <td></td>
			  <td><button data-id="16">查询</button></td>
          </tr>
		  <tr>
              <td>关室内温度门限</td>
			  <td></td>
			  <td><button data-id="17">查询</button></td>
          </tr>
		  <tr>
              <td>开新风机的室内温度门限</td>
			  <td></td>
			  <td><button data-id="18">查询</button></td>
          </tr>
		  <tr>
              <td>关新风机的室内温度门限</td>
			  <td></td>
			  <td><button data-id="19">查询</button></td>
          </tr>
		  <tr>
              <td>新风机可用时室外温度门限</td>
			  <td></td>
			  <td><button data-id="20">查询</button></td>
          </tr>
		  <tr>
              <td>故障码</td>
			  <td></td>
			  <td><button data-id="21">查询</button></td>
          </tr>
		  </table>
        </div>

      </div>

    </div>

  </div>
</body>

<script>
$('#get_table').find('button').click(function(){
	var id = $(this).data('id');
	$get('/remote/get',{
		id:id
	},function(d){
		
	});
});
</script>
</html>
