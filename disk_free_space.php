<?php

$path=substr(dirname(dirname(__FILE__)),0,2); //获取盘符
$free = @disk_free_space($path);   //计算剩余字节数
$total= @disk_total_space($path);   //计算整个磁盘总大小


$rt['sta']='1';
$rt['msg']='ok';
$rt['path']=$path;
$rt['total_space']=getFilesize($total);
$rt['free_space']=getFilesize($free);
$rt['unit']='GB';
echo json_encode($rt);die;




/*核心函数*/
function getFilesize($num){
  $p = 3;
  $format = 'GB';
  $num /= pow(1024, $p);
  return number_format($num, 3);
}