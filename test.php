<?php 
 //phpinfo();
 //snmpget -v2c -c redwoodsh 192.168.88.133 1.3.6.1.4.1.682.1.x.0
 $res = snmpget("192.168.88.133", "redwoodsh", "1.3.6.1.4.1.682.1.2.0");
 $res = snmpwalk("192.168.88.133", "redwoodsh", "1.3.6.1.4.1.682.1.22");
 var_dump($res);
?>