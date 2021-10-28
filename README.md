# 服务器磁盘定时巡检

#### 介绍
服务器磁盘定时巡检 服务器端，部署到php站点6666



1.  windows版本和linux版本，window版本只能监控站点所在磁盘，linux版本能监测所有分区，linux需要取消禁用函数popen
2.  源码仅供参考学习使用。
3. composer使用方法
   include("vendor/autoload.php");
   use   diskfree\HelloComposer;
   HelloComposer::test();

  
