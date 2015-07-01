<?php
class AccountHandler {
  public static function add($accountName,$accountPassword){
    $dao =  new PowerAccountMySqlDAO();
	$current_time = time();
	$salt = '';
	$salt_arr = range(0,5);
	shuffle($salt_arr);
	foreach($salt_arr as $values){
	  $salt.=$values;
	}
	
	$exsit = $dao->queryByAccountName($accountName);
	if($exsit){
	  return false;
	};
	$accountPassword = md5(md5($accountPassword).$salt);
	
	$account = new PowerAccount();
	
	$account->accountName = $accountName;
	$account->accountPassword = $accountPassword;
	$account->accountSalt = $salt;
	$account->accoutType = 1;
	$account->createTime = $current_time;
	$account->lastLoginTime = $current_time;
	$account->status = 0;
	$dao->insert($account);
	return true;
  }
}
?>