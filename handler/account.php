<?php
class AccountHandler {

	//获得用户列表
	public static function get_list($start=0,$end=15){
		$dao =  new PowerAccountMySqlExtDAO();
		$exsit = $dao->queryAndPage($start,$end);
		$total = $dao->getTotalNum();
		$res = array();
		for($i=0;$i<count($exsit);$i++){
			$d = $exsit[$i];

			array_push($res,array(
				'id'=>$d->accountId,
				'name'=>$d->accountName,
				'type'=>$d->accoutType,
			));
		}
		return array(
			'data'=>$res,
			'total'=>$total
		);
	}
	
	
	//获得用户列表 同时获得用户的所属项目
	public static function get_list_with_project($start=0,$end=15){
		$data = AccountHandler::get_list($start,$end);
		$projectDao = new ProwerProjectMySqlDAO();
		$users = $data['data'];
		for($i=0;$i<count($users);$i++){
			$user = $users[$i];
			$project = AccountHandler::get_user_project($user['id']);
			if($project){
				$res = array();
				for($k=0;$k<count($project);$k++){
					$project_id = $project[$k]->projectId;
					$project_id = intval($project_id);
					$project_detail = $projectDao->load($project_id);
					if($project_detail){
						array_push($res,$project_detail);
					}
				}
				$data['data'][$i]['project'] = $res;
			} else {
				$data['data'][$i]['project'] = array();
			}
		}
		
		return $data;
	
	}
  
  //增加账户
  public static function add($accountName,$accountPassword,$accountType=1){
    $dao =  new PowerAccountMySqlDAO();
	$current_time = time();
	$salt = '';
	
	//生成随机盐
	$salt_arr = range(0,5);
	shuffle($salt_arr);
	foreach($salt_arr as $values){
	  $salt.=$values;
	}
	
	$exsit = $dao->queryByAccountName($accountName);
	if($exsit){
	  return false;
	};
	$accountPassword = md5(md5($accountPassword.$salt).$accountName);
	
	$account = new PowerAccount();
	
	//账户注册客户端传来的字段
	$account->accountName = $accountName;
	$account->accountPassword = $accountPassword;
	$account->accoutType = $accountType;
	
	$account->accountSalt = $salt;
	$account->createTime = $current_time;
	$account->lastLoginTime = $current_time;
	$account->status = 0;
	$dao->insert($account);
	return true;
  }
  
   //账户登陆
   public static function sign_in($accountName,$accountPassword){
       $dao =  new PowerAccountMySqlDAO();
       $exsit = $dao->queryByAccountName($accountName);
	   if($exsit){
		 $exsit = $exsit[0];
	   }else{
		  return 1;
	   }
	   $salt = $exsit->accountSalt;
	   $pass_token = md5($accountPassword.$salt);
	   $accountPassword = md5($pass_token.$accountName);
	   session_start();
	   $_SESSION['user_login'.$accountName] = $accountPassword;	   
	   if($accountPassword == $exsit->accountPassword){
	       return array('data'=>$exsit,'pass_token'=>$pass_token);
	   }else{
	       return 2;
	   }
   }
   
   //判断用户是否登录
   public static function is_login(){
   
     $account_name = $_COOKIE['user_name'];
	 $pass_token = $_COOKIE['pass_token'];
	 $account_id = $_COOKIE['user_id'];

	 if($account_name && $pass_token){
	    //用passtoken计算用户密码
	    $client_key = md5($pass_token.$account_name);
		session_start();
	    $session_status = $_SESSION['user_login'.$account_name];
		if($session_status){
		   if($session_status == $client_key){
			 return true;
		   }else{
		     return false;
		   }
		}else{
			$dao =  new PowerAccountMySqlDAO();
			$exsit = $dao->queryByAccountName($account_name);
			if($exsit){
				$exsit = $exsit[0];
				$accountPassword = $exsit->accountPassword;
				if($accountPassword == $client_key){
					//登录状态放在session里面 防止再查库
					$_SESSION['user_login'.$account_name] = $accountPassword;
					return true;
				}else{
					return false;
				}
			}else{
				return false;
			}
		}
	 }else{
		return false;
	 }
   
   }
   
    //判断用户是否登录
   public static function change_account_status($status,$accountName){
	  $dao =  new PowerAccountMySqlDAO();
      $exsit = $dao->updateAccountStatus($status,$accountName);
   }
   
   //把一个用户账户添加到一个项目中去
    public static function add_to_project($accountId,$projectId){
		$dao =  new PowerAccountAccessProjectMySqlExtDAO();
		$project = new PowerAccountAccessProject();
		
		//检测是否添加过该用户到本项目
		$if_exsit = $dao->queryByAccountId_And_ProjectId($accountId,$projectId);
		if($if_exsit){
		   if(count($if_exsit)>0){
			   return false;
		   }
		}
		$current_time = time();
		$project->accountId = $accountId;
		$project->projectId = $projectId;
		$project->status = 0;
		$project->createTime = $current_time;
		$dao->insert($project);
		return true;
	}
	
	//获得用一个用户的所有项目权限
	public static function get_user_project($accountId){
		$dao =  new PowerAccountAccessProjectMySqlDAO();
		$data = $dao->queryByAccountId($accountId);
		return $data;
	}
	
	//从项目中移除用户
	public static function remove_from_project($accountId,$projectId){
		$dao =  new PowerAccountAccessProjectMySqlExtDAO();
		$dao->removeUserFromProject($accountId,$projectId);
		return true;
	}
	
	//检测用户是否有访问项目的权限
	public static function get_project_auth($accountId,$projectId){
	
	}
}
?>