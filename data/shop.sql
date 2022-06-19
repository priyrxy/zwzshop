CREATE DATABASE IF NOT EXISTS `shop` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `shop`;
-- 数据库重新导入一次就是重新执行这个.sql文件，如果只修改导入后的数据库，那么重新导入后修改的内容就都不存在了
-- 管理员
DROP TABLE IF EXISTS shop_admin;
CREATE TABLE shop_admin(
    id tinyint unsigned auto_increment key,
    username varchar(20) not null unique,
    password char(32) not null,
    email varchar(50) not null
)ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=UTF8;

-- 商家
DROP TABLE IF EXISTS shop_er;
CREATE TABLE shop_er(
    id tinyint unsigned auto_increment key,
    username varchar(20) not null unique,
    password char(32) not null,
    email varchar(50) not null
)ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=UTF8;

-- 供货商
DROP TABLE IF EXISTS shop_prov;
CREATE TABLE shop_prov(
    id tinyint unsigned auto_increment key,
    username varchar(20) not null unique,
    password char(32) not null,
    email varchar(50) not null
)ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=UTF8;

-- 商品分类
DROP TABLE IF EXISTS shop_cate;
CREATE TABLE shop_cate(
id smallint unsigned auto_increment key,
cName varchar(50) unique
)ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

-- 产品
DROP TABLE IF EXISTS shop_pro;
CREATE TABLE shop_pro(
id int unsigned auto_increment key,
pName varchar(50) not null unique,
pSn varchar(50) not null,
pNum int unsigned default 1,
mPrice decimal(10,2) not null,
iPrice decimal(10,2) not null,
pDesc text,
pubTime int unsigned not null,
isShow tinyint(1) default 1,
isHot tinyint(1) default 0,
cId smallint unsigned not null
)ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

-- 用户
DROP TABLE IF EXISTS shop_user;
CREATE TABLE shop_user(
id int unsigned auto_increment key,
username varchar(20) not null unique,
password char(32) not null,
sex enum("保密","男","女") not null,
email varchar(50) not null,
regTime int unsigned not null
)ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

-- 相册
DROP TABLE IF EXISTS shop_album;
CREATE TABLE shop_album(
id int unsigned auto_increment key,
pid int unsigned not null,
albumPath varchar(50) not null
)ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;