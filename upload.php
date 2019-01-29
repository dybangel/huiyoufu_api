<?php 
 $s=dirname(__FILE__); //获的服务器路劲

# ob_start();
# $arr[]=var_dump($_POST);
# $result = ob_get_clean();

# //$post=print_r($_POST);
#  $ff=$s."/uploads/"."post.txt";
 # file_put_contents($ff, sizeof($_POST));  //给图片文件写入数据
$time =time();        //获得当前时间戳

for($x=0; $x<sizeof($_POST); $x++){
	$files=$_POST['files'.($x+1)];
	$file='';

	if (strstr($files,",")){
  		$files = explode(',',$files);
		$file = $files[1];
	}

$tmp  = base64_decode($file);
$fp=$s."/uploads/".$time."-".$x.".jpg";  //确定图片文件位置及名称
         //写文件
file_put_contents( $fp, $tmp);  //给图片文件写入数据

}
  

// $time =time();        //获得当前时间戳
// $files =$_POST['files1'];
// $file='';

// if (strstr($files,",")){
//   $files = explode(',',$files);
// $file = $files[1];
// }

// //$files1 = substr($files1,22);  //百度一下就可以知道base64前面一段需要清除掉才能用。
//      //解码
// $tmp  = base64_decode($file);
// $fp=$s."/uploads/".$time.".jpg";  //确定图片文件位置及名称
//          //写文件
// file_put_contents( $fp, $tmp);  //给图片文件写入数据



// $time =time();        //获得当前时间戳
// $files =$_POST['files2'];
// $file='';

// if (strstr($files,",")){
//   $files = explode(',',$files);
// $file = $files[1];
// }

// //$files1 = substr($files1,22);  //百度一下就可以知道base64前面一段需要清除掉才能用。
//      //解码
// $tmp  = base64_decode($file);
// $fp=$s."/uploads/".$time."-2".".jpg";  //确定图片文件位置及名称
//          //写文件
// file_put_contents( $fp, $tmp);  //给图片文件写入数据

echo 1;
?>