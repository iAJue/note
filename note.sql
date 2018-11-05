# Host: localhost  (Version: 5.5.53)
# Date: 2018-11-05 20:36:09
# Generator: MySQL-Front 5.3  (Build 4.234)

/*!40101 SET NAMES utf8 */;

#
# Structure for table "no_contents"
#

DROP TABLE IF EXISTS `no_contents`;
CREATE TABLE `no_contents` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL DEFAULT '',
  `content` text NOT NULL,
  `type` bit(1) NOT NULL DEFAULT b'0',
  `user_id` int(11) unsigned NOT NULL DEFAULT '0',
  `folder_id` int(11) unsigned NOT NULL DEFAULT '0',
  `created_at` int(11) unsigned NOT NULL DEFAULT '0',
  `updated_at` int(11) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

#
# Data for table "no_contents"
#

/*!40000 ALTER TABLE `no_contents` DISABLE KEYS */;
INSERT INTO `no_contents` VALUES (1,'欢迎使用萌音云笔记','###### 非常感谢使用萌音云笔记平台\n\n[官网](https://note.52ecy.cn/ \"官网\") | [官方交流群](http://shang.qq.com/wpa/qunwpa?idkey=826e8e5961b8acf3eb7bb4fd8595a59e38deb618deaee70912dd0c4cd9f97457 \"官方交流群\") |  [Blog](https://www.52ecy.cn \"Blog\") | [GitHub](https://github.com/178146582/note \"GitHub\")\n\n**基于优雅的Laravel `+` 超难用的MDUI `=` 萌音云笔记，一个高效的在线云笔记、专注技术文档在线创作、阅读、分享和托管**\n\n#### 项目起源\n某日，在[某社区官方交流群](http://shang.qq.com/wpa/qunwpa?idkey=826e8e5961b8acf3eb7bb4fd8595a59e38deb618deaee70912dd0c4cd9f97457 \"某社区官方交流群\")中 群主的RBQ 说了一句：\n> 帮我写一个云笔记呗\n\n另外，由于博主剩下的时间不多了，很多计划中的功能便割舍了.....无奈╮(╯▽╰)╭\n好吧，一般我不喜欢介绍项目功能，你们自个发掘吧！\n\n## 安装需求\n* LNMP/AMP With PHP5.6.4+\n* OpenSSL、PDO、Mbstring、Tokenizer、XML\n* Composer\n\n下载\n------------\n#### 1. Clone本项目\n```\ngit clone https://github.com/178146582/note.git\n```\n#### 2. composer安装扩展包\n\n```\ncomposer install\n```\n\n#### 3.参考laravel安装\n\n> 中间省略一万步\n\n#### xx.完成\n- 给本项目一个Star~ （注意，这部尤为重要）\n- 访问你的域名即可\n\n# [投喂❤点我](https://pay.52ecy.cn/?cid=23&pid=22 \"投喂\")\n![](/images/upload/Pot3xqwxvk0oIDW7cwrRmPJXYIpLIEUlRKL48rJw.png)',b'0',1,1,1541409918,1541421182);
/*!40000 ALTER TABLE `no_contents` ENABLE KEYS */;

#
# Structure for table "no_folders"
#

DROP TABLE IF EXISTS `no_folders`;
CREATE TABLE `no_folders` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL DEFAULT '',
  `user_id` int(11) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

#
# Data for table "no_folders"
#

/*!40000 ALTER TABLE `no_folders` DISABLE KEYS */;
INSERT INTO `no_folders` VALUES (1,'默认文件夹',1);
/*!40000 ALTER TABLE `no_folders` ENABLE KEYS */;

#
# Structure for table "no_users"
#

DROP TABLE IF EXISTS `no_users`;
CREATE TABLE `no_users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL DEFAULT '',
  `password` varchar(255) NOT NULL DEFAULT '',
  `email` varchar(255) NOT NULL DEFAULT '',
  `token` int(11) NOT NULL DEFAULT '0',
  `ip` varchar(255) NOT NULL DEFAULT '',
  `status` int(1) NOT NULL DEFAULT '0',
  `created_at` int(11) unsigned NOT NULL DEFAULT '0',
  `updated_at` int(11) unsigned NOT NULL DEFAULT '0',
  `photo` varchar(255) NOT NULL DEFAULT '',
  `sign` varchar(255) NOT NULL DEFAULT '',
  `cover` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='用户表';

#
# Data for table "no_users"
#

/*!40000 ALTER TABLE `no_users` DISABLE KEYS */;
INSERT INTO `no_users` VALUES (1,'root','eyJpdiI6IkhaNldHQm9GM3c3M0U1VGtTTld2QXc9PSIsInZhbHVlIjoiUm9Lc3VkUEd3eUdScHZRNUNoazlUUT09IiwibWFjIjoiM2RkZTZmY2E0Y2FjY2I2NTYwMzEwZDc3NWM4YmU5N2E2YWE1ZGZkYjMyZmYxZjVkZmQyMDQxM2ViMWIwNDc3OSJ9','root@root.com',0,'',0,0,1541402991,'avatars/0384d893a79d7eed6b8963a59c593232.png','','');
/*!40000 ALTER TABLE `no_users` ENABLE KEYS */;
