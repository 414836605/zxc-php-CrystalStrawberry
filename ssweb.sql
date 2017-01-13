#创建数据库
create database ssweb charset utf8;
#选择数据库
use ssweb;
#创建表
/*-------------管理员模块-------------*/
#管理员
create table ss_admin(
	admin_id int unsigned not null auto_increment primary key comment '管理员ID',
	admin_name varchar(50) not null default '' comment '管理员名',
	password char(32) not null default '' comment '管理员密码'
)engine=MyISAM charset=utf8;
/*-------------管理员模块结束-------------*/

/*-------------用户模块-------------*/
#用户表
create table ss_user(
	user_id int unsigned not null auto_increment primary key comment '用户ID',
	user_name varchar(50) not null default '' comment '用户名',
	password char(32) not null default '' comment '用户密码',
	email varchar(50) not null default '' comment '用户邮箱',
	phone char(32) not null default '' comment '用户电话',
	realname varchar(10) not null default '' comment '用户真实姓名',
	works varchar(50) not null default '' comment '用户工作'
)engine=MyISAM charset=utf8;
/*-------------用户模块结束-------------*/

/*-------------产品模块-------------*/
#产品类别表
create table ss_category(
	cate_id smallint unsigned not null auto_increment primary key comment '产品类别ID',
	cate_name varchar(50) not null default '' comment '类别名',
	parent_id smallint unsigned not null default 0 comment '父ID(为零是顶级分类)' 
)engine=MyISAM charset=utf8;
#产品表
create table ss_product(
	prod_id int unsigned not null auto_increment primary key comment '产品ID',
	prod_name varchar(50) not null default '' comment '产品名',
	description_url varchar(50) not null default '' comment '产品描述',
	image_url varchar(50) not null default '' comment '产品图片地址',
	download_url varchar(50) not null default '' comment '产品下载地址',
	detail_url varchar(50) not null default '' comment '产品详细描述',
	price decimal(10,2) not null default 0 comment '产品价格',
	cate_id smallint not null default 0 comment '产品类别ID' 
)engine=MyISAM charset=utf8;
/*-------------产品模块结束-------------*/

/*-------------案例模块-------------*/
#案例表
create table ss_case(
	case_id int unsigned not null auto_increment primary key comment '案例ID',
	case_name varchar(50) not null default '' comment '案例名',
	description_url varchar(50) not null default '' comment '案例描述',
	image_url varchar(50) not null default '' comment '案例图片地址',
	download_url varchar(50) not null default '' comment '案例下载地址',
	detail_url varchar(50) not null default '' comment '案例详细描述',
	cate_id smallint not null default 0 comment '产品类别ID' 
)engine=MyISAM charset=utf8;
/*-------------案例模块结束-------------*/

/*-------------新闻模块-------------*/
#新闻表
create table ss_news(
	news_id int unsigned not null auto_increment primary key comment '新闻ID',
	title varchar(50) not null default '' comment '新闻标题',
	detail_url varchar(50) not null default '' comment '新闻详细地址'
)engine=MyISAM charset=utf8;
/*-------------新闻模块结束-------------*/

/*-------------下载模块-------------*/
#下载表
create table ss_download(
	down_id int unsigned not null auto_increment primary key comment '下载ID',
	name varchar(50) not null default '' comment '下载名称',
	down_url varchar(50) not null default '' comment '下载地址'
)engine=MyISAM charset=utf8;
/*-------------下载模块结束-------------*/

/*-------------视频模块-------------*/
#视频表
create table ss_video(
	video_id int unsigned not null auto_increment primary key comment '视频ID',
	name varchar(50) not null default '' comment '视频名称',
	description varchar(255) not null default '' comment '视频描述'
)engine=MyISAM charset=utf8;
/*-------------视频模块结束-------------*/

/*-------------消息模块-------------*/
#消息表
create table ss_message(
	mess_id int unsigned not null auto_increment primary key comment '消息ID',
	user_id int unsigned not null default 0 comment '用户ID',
	detail varchar(500) not null default '' comment '消息内容'
)engine=MyISAM charset=utf8;
/*-------------消息模块结束-------------*/

/*-------------订单模块-------------*/
#订单表
create table ss_order(
	order_id int unsigned not null auto_increment primary key comment '订单ID',
	order_name varchar(50) not null default '' comment '订单名称', 
	user_id int unsigned not null default 0 comment '用户ID',
	prod_id int unsigned not null default 0 comment '产品ID',
	progress smallint unsigned not null default 0 comment'订单进度',
	state smallint unsigned not null default 0 comment'订单状态'
)engine=MyISAM charset=utf8;
/*-------------订单模块结束-------------*/



#测试数据
insert into ss_admin(admin_name, password) values ('admin', '21232F297A57A5A743894A0E4A801FC3');
insert into ss_admin(admin_name, password) values ('admin', 'admin');

insert into ss_user(user_name, password, email, phone, realname, works) values ('user1', 'password1', 'email1', 'phone1', 'realname1', 'works1');
insert into ss_user(user_name, password, email, phone, realname, works) values ('user2', 'password2', 'email2', 'phone2', 'realname2', 'works2');
insert into ss_user(user_name, password, email, phone, realname, works) values ('user3', 'password3', 'email3', 'phone3', 'realname3', 'works3');
insert into ss_user(user_name, password, email, phone, realname, works) values ('user4', 'password4', 'email4', 'phone4', 'realname4', 'works4');
insert into ss_user(user_name, password, email, phone, realname, works) values ('user5', 'password5', 'email5', 'phone5', 'realname5', 'works5');
insert into ss_user(user_name, password, email, phone, realname, works) values ('user6', 'password6', 'email6', 'phone6', 'realname6', 'works6');
insert into ss_user(user_name, password, email, phone, realname, works) values ('user7', 'password7', 'email7', 'phone7', 'realname7', 'works7');
insert into ss_user(user_name, password, email, phone, realname, works) values ('user8', 'password8', 'email8', 'phone8', 'realname8', 'works8');
insert into ss_user(user_name, password, email, phone, realname, works) values ('user9', 'password9', 'email9', 'phone9', 'realname9', 'works9');
insert into ss_user(user_name, password, email, phone, realname, works) values ('user10', 'password10', 'email10', 'phone10', 'realname10', 'works10');
insert into ss_user(user_name, password, email, phone, realname, works) values ('user11', 'password11', 'email11', 'phone11', 'realname11', 'works11');
	
insert into ss_category(cate_name, parent_id) values ('类别1', 0);
insert into ss_category(cate_name, parent_id) values ('类别2', 1);
insert into ss_category(cate_name, parent_id) values ('类别3', 2);
insert into ss_category(cate_name, parent_id) values ('类别4', 2);
insert into ss_category(cate_name, parent_id) values ('类别5', 3);
insert into ss_category(cate_name, parent_id) values ('类别6', 3);
insert into ss_category(cate_name, parent_id) values ('类别7', 4);
insert into ss_category(cate_name, parent_id) values ('类别8', 4);
insert into ss_category(cate_name, parent_id) values ('类别9', 5);
insert into ss_category(cate_name, parent_id) values ('类别10', 5);
insert into ss_category(cate_name, parent_id) values ('类别11', 6);

insert into ss_product(prod_name, description_url, image_url, download_url, detail_url, price, cate_id) values ('产品1', '描述1', '图片1', '下载1', '详细1', 1000, 1);
insert into ss_product(prod_name, description_url, image_url, download_url, detail_url, price, cate_id) values ('产品2', '描述2', '图片2', '下载2', '详细2', 1000, 1);
insert into ss_product(prod_name, description_url, image_url, download_url, detail_url, price, cate_id) values ('产品3', '描述3', '图片3', '下载3', '详细3', 1000, 1);
insert into ss_product(prod_name, description_url, image_url, download_url, detail_url, price, cate_id) values ('产品4', '描述4', '图片4', '下载4', '详细4', 1000, 1);
insert into ss_product(prod_name, description_url, image_url, download_url, detail_url, price, cate_id) values ('产品5', '描述5', '图片5', '下载5', '详细5', 1000, 1);
insert into ss_product(prod_name, description_url, image_url, download_url, detail_url, price, cate_id) values ('产品6', '描述6', '图片6', '下载6', '详细6', 1000, 2);
insert into ss_product(prod_name, description_url, image_url, download_url, detail_url, price, cate_id) values ('产品7', '描述7', '图片7', '下载7', '详细7', 1000, 2);
insert into ss_product(prod_name, description_url, image_url, download_url, detail_url, price, cate_id) values ('产品8', '描述8', '图片8', '下载8', '详细8', 1000, 2);
insert into ss_product(prod_name, description_url, image_url, download_url, detail_url, price, cate_id) values ('产品9', '描述9', '图片9', '下载9', '详细9', 1000, 2);
insert into ss_product(prod_name, description_url, image_url, download_url, detail_url, price, cate_id) values ('产品10', '描述10', '图片10', '下载10', '详细10', 1000, 2);

insert into ss_case(case_name, description_url, image_url, download_url, detail_url, cate_id) values ('案例1', '描述1', '图片1', '下载1', '详细描述1', 1);
insert into ss_case(case_name, description_url, image_url, download_url, detail_url, cate_id) values ('案例2', '描述2', '图片2', '下载2', '详细描述2', 1);
insert into ss_case(case_name, description_url, image_url, download_url, detail_url, cate_id) values ('案例3', '描述3', '图片3', '下载3', '详细描述3', 1);
insert into ss_case(case_name, description_url, image_url, download_url, detail_url, cate_id) values ('案例4', '描述4', '图片4', '下载4', '详细描述4', 1);
insert into ss_case(case_name, description_url, image_url, download_url, detail_url, cate_id) values ('案例5', '描述5', '图片5', '下载5', '详细描述5', 1);	
insert into ss_case(case_name, description_url, image_url, download_url, detail_url, cate_id) values ('案例6', '描述6', '图片6', '下载6', '详细描述6', 1);
insert into ss_case(case_name, description_url, image_url, download_url, detail_url, cate_id) values ('案例7', '描述7', '图片7', '下载7', '详细描述7', 1);
insert into ss_case(case_name, description_url, image_url, download_url, detail_url, cate_id) values ('案例8', '描述8', '图片8', '下载8', '详细描述8', 1);	
insert into ss_case(case_name, description_url, image_url, download_url, detail_url, cate_id) values ('案例9', '描述9', '图片9', '下载9', '详细描述9', 1);
insert into ss_case(case_name, description_url, image_url, download_url, detail_url, cate_id) values ('案例10', '描述10', '图片10', '下载10', '详细描述10', 1);
insert into ss_case(case_name, description_url, image_url, download_url, detail_url, cate_id) values ('案例11', '描述11', '图片11', '下载11', '详细描述11', 1);	
insert into ss_case(case_name, description_url, image_url, download_url, detail_url, cate_id) values ('案例12', '描述12', '图片12', '下载12', '详细描述12', 1);

insert into ss_news(title, detail_url) values('新闻1', '详细描述1');
insert into ss_news(title, detail_url) values('新闻2', '详细描述2');
insert into ss_news(title, detail_url) values('新闻3', '详细描述3');
insert into ss_news(title, detail_url) values('新闻4', '详细描述4');
insert into ss_news(title, detail_url) values('新闻5', '详细描述5');
insert into ss_news(title, detail_url) values('新闻6', '详细描述6');
insert into ss_news(title, detail_url) values('新闻7', '详细描述7');
insert into ss_news(title, detail_url) values('新闻8', '详细描述8');
insert into ss_news(title, detail_url) values('新闻9', '详细描述9');

insert into ss_download(name, down_url) values('名称1', '下载地址1');
insert into ss_download(name, down_url) values('名称2', '下载地址2');
insert into ss_download(name, down_url) values('名称3', '下载地址3');
insert into ss_download(name, down_url) values('名称4', '下载地址4');
insert into ss_download(name, down_url) values('名称5', '下载地址5');
insert into ss_download(name, down_url) values('名称6', '下载地址6');
insert into ss_download(name, down_url) values('名称7', '下载地址7');
insert into ss_download(name, down_url) values('名称8', '下载地址8');
insert into ss_download(name, down_url) values('名称9', '下载地址9');
insert into ss_download(name, down_url) values('名称10', '下载地址10');

insert into ss_video(name, description) values ('视频1', '详细描述1');
insert into ss_video(name, description) values ('视频2', '详细描述2');
insert into ss_video(name, description) values ('视频3', '详细描述3');
insert into ss_video(name, description) values ('视频4', '详细描述4');
insert into ss_video(name, description) values ('视频5', '详细描述5');
insert into ss_video(name, description) values ('视频6', '详细描述6');
insert into ss_video(name, description) values ('视频7', '详细描述7');
insert into ss_video(name, description) values ('视频8', '详细描述8');
insert into ss_video(name, description) values ('视频9', '详细描述9');
insert into ss_video(name, description) values ('视频10', '详细描述10');
insert into ss_video(name, description) values ('视频11', '详细描述11');
insert into ss_video(name, description) values ('视频12', '详细描述12');

insert into ss_message(user_id, detail) values (1, '详细信息1');
insert into ss_message(user_id, detail) values (1, '详细信息2');
insert into ss_message(user_id, detail) values (1, '详细信息3');
insert into ss_message(user_id, detail) values (1, '详细信息4');
insert into ss_message(user_id, detail) values (1, '详细信息5');
insert into ss_message(user_id, detail) values (1, '详细信息6');
insert into ss_message(user_id, detail) values (1, '详细信息7');
insert into ss_message(user_id, detail) values (1, '详细信息8');
insert into ss_message(user_id, detail) values (1, '详细信息9');
insert into ss_message(user_id, detail) values (1, '详细信息10');
insert into ss_message(user_id, detail) values (1, '详细信息11');

insert into ss_order(order_name, user_id, prod_id, progress, state) values ('订单1', 1, 1, 1, 1);
insert into ss_order(order_name, user_id, prod_id, progress, state) values ('订单2', 1, 1, 1, 1);
insert into ss_order(order_name, user_id, prod_id, progress, state) values ('订单3', 1, 1, 1, 1);
insert into ss_order(order_name, user_id, prod_id, progress, state) values ('订单4', 1, 1, 1, 1);
insert into ss_order(order_name, user_id, prod_id, progress, state) values ('订单5', 1, 1, 1, 1);
insert into ss_order(order_name, user_id, prod_id, progress, state) values ('订单6', 1, 1, 1, 1);
insert into ss_order(order_name, user_id, prod_id, progress, state) values ('订单7', 1, 1, 1, 1);
insert into ss_order(order_name, user_id, prod_id, progress, state) values ('订单8', 1, 1, 1, 1);
insert into ss_order(order_name, user_id, prod_id, progress, state) values ('订单9', 1, 1, 1, 1);
insert into ss_order(order_name, user_id, prod_id, progress, state) values ('订单10', 1, 1, 1, 1);
insert into ss_order(order_name, user_id, prod_id, progress, state) values ('订单11', 1, 1, 1, 1);
insert into ss_order(order_name, user_id, prod_id, progress, state) values ('订单12', 1, 1, 1, 1);