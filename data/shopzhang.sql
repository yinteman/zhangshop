/*创建数据库*/
CREATE DATABASE IF  NOT EXISTS shopZhang;
USE shopZhang;
/***管理员表*/
DROP TABLE IF EXISTS `zhang_admin`;
CREATE TABLE `zhang_admin`(
`id` smallint unsigned auto_increment key,
`username` varchar(20) not null unique,
`password` char(32) not null,
`email` varchar(50) not null);
/*********分类表*************/
DROP TABLE IF EXISTS `zhang_cat`;
CREATE TABLE `zhang_cat`(
`id` smallint unsigned auto_increment key,
`cname` varchar(50) unique);
/**********商品表**********/
DROP TABLE IF EXISTS `zhang_pro`;
CREATE TABLE `zhang_pro`(
`id` int unsigned auto_increment key,
`pname` varchar(50) not null unique,
`psn` varchar(50) not null,
`pnum` int unsigned default 1,
`mprice` decimal(10,2) not null,
`iprice` decimal(10,2) not null,
`pdesc` text,
`pimg` varchar(50) not null,
`pubtime` int unsigned not null,
`isshow` tinyint(1) default 1,
`ishot` tinyint(1) default 0,
`cid` smallint unsigned not null);
/*********用户表*********/
DROP TABLE IF EXISTS `zhang_user`;
CREATE TABLE `zhang_user`(
`id` int unsigned auto_increment key,
`username` varchar(20) not null unique,
`password` char(32) not null,
`sex` enum("mal","femal","unsee") not null default "unsee",
`face` varchar(50) not null,
`regtime` int unsigned not null);
/**********相册表**************/
DROP TABLE IF EXISTS `zhang_album`;
CREATE TABLE `zhang_album`(
`id` int unsigned auto_increment key,
`pid` int unsigned not null,
`albumpath` varchar(50) not null);

/***********添加管理员*/
INSERT INTO `zhang_admin`(`username`,`password`,`email`)VALUES('moliuxuan','b294ea8f4dc002586789ce8b67572a5d','moliuxuan@163.com');
