/*
Navicat MySQL Data Transfer

Source Server         : 搜搜网
Source Server Version : -----
Source Host           : 119.23.254.64:3306
Source Database       : searchWeb

Target Server Type    : MYSQL
Target Server Version : 50540
File Encoding         : 65001

Date: 2017-05-07 
*/

create table account(
userName varchar(20) NOT NULL PRIMARY KEY,
password varchar(20) NOT NULL
)CHARSET=utf8;

create table banner(
id int(8) NOT NULL AUTO_INCREMENT PRIMARY KEY,
url varchar(500) NOT NULL
)CHARSET=utf8;

create table hotSearch(
id int(8) NOT NULL AUTO_INCREMENT PRIMARY KEY,
title varchar(10) NOT NULL,
url varchar(500) NOT NULL
)CHARSET=utf8;

create table collectImgs(
id int(8) NOT NULL AUTO_INCREMENT PRIMARY KEY,
url varchar(500) NOT NULL,
userName varchar(20) NOT NULL
)CHARSET=utf8;