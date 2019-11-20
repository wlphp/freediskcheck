<?php
//popen此函数必须从php禁用函数里面去掉
if(function_exists("fsockopen")){
	//返回数据
	$rt['sta']='0';
	$rt['msg']='popen函数被禁用，请检查对应php版本的php.ini';
	echo json_encode($rt);die;	
	
}
$fp = popen('df -lh | grep -E "^(/)"',"r");
$arr=array();
$i=0;
//输出文本中所有的行，直到文件结束为止。
while(!feof($fp))
{
 $arr[$i]= fgets($fp);//fgets()函数从文件指针中读取一行
 $i++;
}
fclose($fp);
$arr=array_filter($arr); //去掉空数组
foreach ($arr  as $key=>$val){
	$rs = preg_replace("/\s{2,}/",' ',$val); //把多个空格换成 ""
    $hd = explode(" ", $rs);
	$item['zone']=$hd[0];
  	$item['total_space']=$hd[1];
  	$item['uesd_space']=$hd[2];
    $item['free_space']=$hd[3];
  	$item['percent']=$hd[4];
    $item['mount_point']=trim($hd[5],"\n");
    $arr1[]=$item;
}

//返回数据
$rt['sta']='1';
$rt['msg']='ok';
$rt['rs']=$arr1;
echo json_encode($rt);die;


