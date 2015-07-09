<?php
class AccountHandler {

	public static function get_list($start,$end){
		$dao =  new PowerAccountMySqlDAO();
		$exsit = $dao->queryAndPage($start,$end);
		return $exsit;
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
   
     $account_name = $_COOKIE['user_id'];
	 $pass_token = $_COOKIE['pass_token'];

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
}
?>