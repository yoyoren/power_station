<?php
	//定义字节和位数的转化
	define('BYTE_1',8);
	
	//无符号是15个bit
	define('BYTE_2_UNSIGN',15);
	define('BYTE_2',16);
	
	define('BYTE_4',32);
	define('BYTE_8',64);
	
	//文件的版本信息是固定的4字节
	define('FILE_VERSION_SIZE',BYTE_4);
	
	//ECU数据中一个数据体是56个字节
	define('FILE_CONTENT_SIZE',56 * BYTE_1);
	
	class ECUHandler {
		public static function read($path=ECU_ROOT_PATH.'laogang/ecu1234567-20280601-131706.engy'){
			$file = fopen($path,'rb');
			$content=fread($file,filesize($path));
			
			//按16位转成整数
			$byte_array = unpack("N*",$content);
			
			$decode_content = '';
			//按字节转成2进制序列，并补0
			for($i=1;$i<=count($byte_array);$i++){
				$_data = $byte_array[$i];
				$_data = decbin($_data);
				$_str_data = strval($_data);
				$l = strlen($_str_data);
				$plus_zero = '';
				if($l < BYTE_4){
				for($k = 0;$k<(BYTE_4 - $l); $k++){
						$plus_zero .= '0'; 
					}
					$_str_data = $plus_zero.$_str_data;
				}
				$decode_content .= $_str_data;
				
			}
			$file_version = bindec(substr($decode_content,0,FILE_VERSION_SIZE));
			$file_content = array(); 
			
			//一个ECU中可能是多个文件数据 56字节是一个数据
			$file_count = (strlen($decode_content) - FILE_VERSION_SIZE)/FILE_CONTENT_SIZE;
			
			//文件指针的起始位置
			$head_poiner = FILE_VERSION_SIZE;
			
			for($i = 0;$i < $file_count; $i++){
				$one_file_content = substr($decode_content,$head_poiner,FILE_CONTENT_SIZE);
				
				//指针前移一个完整数据字段的大小
				$head_poiner += FILE_CONTENT_SIZE;
				array_push($file_content,array(
					'date'=>date('Y-m-d H:i:s',bindec(substr($one_file_content,0,BYTE_4))),
					'tempature'=>bindec(substr($one_file_content,32,BYTE_1)),
					'egy_save_status'=>bindec(substr($one_file_content,40,BYTE_1)),
					'fault_code'=>substr($one_file_content,48,BYTE_1),
					'relay_status'=>substr($one_file_content,56,BYTE_1),
					'elec_engy'=>array(
						bindec(substr($one_file_content,64,BYTE_4))/100,
						bindec(substr($one_file_content,96,BYTE_4))/100,
						bindec(substr($one_file_content,128,BYTE_4))/100,
						bindec(substr($one_file_content,160,BYTE_4))/100,
					),
					
					'elec_power'=>array(
						bindec(substr($one_file_content,192,BYTE_2)),
						bindec(substr($one_file_content,208,BYTE_2)),
						bindec(substr($one_file_content,224,BYTE_2)),
						bindec(substr($one_file_content,240,BYTE_2)),
					),
					
					'temperature'=>array(
						bindec(substr($one_file_content,257,BYTE_2_UNSIGN))/100,
						bindec(substr($one_file_content,273,BYTE_2_UNSIGN))/100,
						bindec(substr($one_file_content,289,BYTE_2_UNSIGN))/100,
						bindec(substr($one_file_content,305,BYTE_2_UNSIGN))/100,
						bindec(substr($one_file_content,321,BYTE_2_UNSIGN))/100,
						bindec(substr($one_file_content,337,BYTE_2_UNSIGN))/100,
						bindec(substr($one_file_content,353,BYTE_2_UNSIGN))/100,
						bindec(substr($one_file_content,369,BYTE_2_UNSIGN))/100,
						bindec(substr($one_file_content,385,BYTE_2_UNSIGN))/100,
						bindec(substr($one_file_content,401,BYTE_2_UNSIGN))/100,
					),
					
					'humidity'=>array(
						bindec(substr($one_file_content,416,BYTE_1)),
						bindec(substr($one_file_content,424,BYTE_1)),
					),
					
					'reserved'=>array(
						bindec(substr($one_file_content,432,BYTE_1)),
						bindec(substr($one_file_content,440,BYTE_1)),
					)
					
				));
				
			}
			
			return array(
				file_version => $file_version, 
				file_content => $file_content, 
			);
		}
	}
?>