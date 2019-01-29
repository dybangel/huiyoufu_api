<?php
#跨域访问
/*
会有福服务器API
*/
$debug=false;
header("Access-Control-Allow-Origin: *");
#echo sizeof($_GET);
if(sizeof($_GET)==0){
	echo "缺少调用参数";
	exit;
}

$str = $_SERVER['QUERY_STRING'];
$arr = explode('&', $str);
#$res = array();
$pv="";
$pn="";
 #k 是数字下标 v是key=value
foreach ($arr as $k => $v) {
    $arr = explode('=', $v);
   # echo "v=".$v."<br>";
    #echo $arr[0]."<br>";
    #echo $arr[1]."<br>";
    
    #给数组赋值
    if($arr[0]!='action' && $arr[0]!='null'){
  	  if($pv==''){
  		  $pv='"'.$arr[1].'"';
  	  }else{
  		  $pv=$pv.',"'.$arr[1].'"';
  	  }
    }else{
    	$pn=$arr[1];
    }
    #$res[$arr[0]] = $arr[1];
}
$pv='('.$pv.')';

$dsql="call ".$pn.$pv;
if($debug=='true'){
	$s=dirname(__FILE__); //获的服务器路劲
  	$ff=$s."/par.txt";
  	file_put_contents($ff, $dsql."\r\n",FILE_APPEND);  //给图片文件写入数据
}

 # exit;

$action=$_GET['action'];
if(isset($_GET['member_id'])){
$member_id=$_GET['member_id'];

}



$dbhostip="127.0.0.1";
$username="root";
$userpassword="123456";
$dbdatabasename="huiyoufu";
$link=mysqli_connect($dbhostip,$username,$userpassword,$dbdatabasename) or die("Unable to connect to db!");
$link->query("SET NAMES utf8");



#$res=mysqli_query($link,$sql);
#字符集
mysqli_query($link,"SET NAMES UTF8"); 
$result =mysqli_query($link,$dsql);
if(!mysqli_affected_rows($link)){
    echo json_encode('null');exit;
}
//var_dump($result);exit;
		while($row=mysqli_fetch_assoc($result)){
			// foreach ($row as $k=>$v) {
			// 	$row["$k"] = iconv('GB2312', 'UTF-8', $v);
			// }
		   //$myarray['array'] = $row;
		   $myarray[] = $row;
		}

echo json_encode($myarray);
// echo json_encode((object)$arr);
mysqli_close($link);

?>