-- phpMyAdmin SQL Dump
-- version 4.4.15.10
-- https://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 2021-07-21 19:41:26
-- 服务器版本： 5.6.50-log
-- PHP Version: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inte_codepay9_cn`
--

-- --------------------------------------------------------

--
-- 表的结构 `pay_config`
--

CREATE TABLE IF NOT EXISTS `pay_config` (
  `k` varchar(32) NOT NULL,
  `v` text
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `pay_config`
--

INSERT INTO `pay_config` (`k`, `v`) VALUES
('version', ''),
('admin_user', 'admin'),
('admin_pass', '123456'),
('gonggao', '平台不会为任何违法违规(包括但不限于：外挂、破解、淫秽、涉赌、政治、钓鱼、诈骗)网站提供接入服务\r\n禁止出售内容：破解软件，游戏辅助(外挂)，翻墙/VPN，短信轰炸，色情软件/盒子(卡密)，支付宝等包含公民身份信息的账号，等不限于此的违法违规内容'),
('sitename', 'aote码支付'),
('title', '系统欢迎你！'),
('keywords', '码支付-支付狗-聚合-易支付免签约支付,个人支付宝即时到账接口,支付宝免签约接口,支付宝即时到账接口,微信免签接口,微信免签,支付宝辅助收款,API支付对接,码支付,微支付,优云宝_秒冲宝'),
('description', '码支付-支付狗-易支付免签支付专为个人、企业收款而生的支付工具。为支付宝、微信支付的个人账户、企业账号，提供即时到账收款API接口。安全可靠，费率低。'),
('money_rate', '97'),
('qqjump', '0'),
('huiyuan', '535680'),
('qrcode_key', ''),
('block_account', '17820159876'),
('transfer_type', ''),
('mail_smtp', 'smtp.qq.com'),
('mail_port', '465'),
('mail_name', '2074286140@qq.com'),
('mail_pwd', ''),
('captcha_open', '0'),
('captcha_id', ''),
('captcha_key', ''),
('template', 'Aotpays'),
('qq', '88888888'),
('qq_qun', '88888888'),
('zero_pid', '10692'),
('zero_key', ''),
('edtc1jg', '1'),
('edtc1ed', '100'),
('edtc2jg', '10'),
('edtc2ed', '1000'),
('edtc3jg', '500'),
('edtc3ed', '500000'),
('edtc4jg', '999'),
('edtc4ed', '99999'),
('settle_money', '10'),
('edczbl', '100'),
('zczsed', '100'),
('build', '2019-05-04 21:59:11'),
('SKY', '0c1c9e99b247e4d090a49dc90cca65f2'),
('cdnserver', '1'),
('app_id', ''),
('alipay_public_key', ''),
('merchant_private_key', ''),
('alipay_api', '0'),
('alipay_pid', '18282828'),
('alipay_key', '1818288'),
('alipay_eurl', 'http://uk.wlian.xyz/'),
('alipay_epid', '1000'),
('alipay_ekey', 'fHp561H65i668uu5AEf866irVgiAa8pH'),
('alipay2_api', '0'),
('qqpay_api', '0'),
('qqpay_pid', ''),
('qqpay_subid', ''),
('qqpay_key', ''),
('qqpay_eurl', ''),
('qqpay_epid', ''),
('qqpay_ekey', ''),
('wxpay_api', '0'),
('wxpay_pid', ''),
('wxpay_subid', ''),
('wxpay_key', ''),
('wxpay_eurl', ''),
('wxpay_epid', ''),
('wxpay_ekey', ''),
('local_domain', 'ys.codepay9.cn'),
('haoservice_key', ''),
('gong', '这是一个弹出公告'),
('huiyuan1', '5'),
('huiyuan2', '15'),
('huiyuan3', '60'),
('gjclj', '百度云盘|萝莉'),
('cztype', 'qqpay'),
('qqhulian', 'http://yy.codepay9.cn/'),
('qqhulianpid', '325435'),
('qqhuliankey', '6546776'),
('qqcheck', '');

-- --------------------------------------------------------

--
-- 表的结构 `pay_down`
--

CREATE TABLE IF NOT EXISTS `pay_down` (
  `id` int(11) NOT NULL,
  `name` varchar(18) NOT NULL,
  `url` varchar(88) NOT NULL,
  `readme` varchar(88) NOT NULL,
  `addtime` varchar(10) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `pay_down`
--

INSERT INTO `pay_down` (`id`, `name`, `url`, `readme`, `addtime`) VALUES
(1, '对接文档', './down/pay.doc', '', '2018-06-02'),
(5, 'VHMS 支付集成包', './down/4.zip', '', '2020-10-11'),
(7, 'SDK下载PHP版', './down/Hack_Sdk.zip', '', '2020-10-11'),
(8, 'swap 支付集成包', './down/3.zip', '', '2020-10-11'),
(11, '安卓获取cookie工具', 'https://cloud.189.cn/t/U7juErfum67j', '登录支付宝网站：https://auth.alipay.com\r\n财付通网站：https://www.tenpay.com', '2020-11-25'),
(12, '安卓一键取cookie', 'https://ruu.lanzous.com/iIxoQjvmc5e', '安卓傻瓜式一键获取cookie', '2021-01-17');

-- --------------------------------------------------------

--
-- 表的结构 `pay_emailtz`
--

CREATE TABLE IF NOT EXISTS `pay_emailtz` (
  `email_id` int(11) NOT NULL,
  `email_smtp` varchar(100) DEFAULT NULL,
  `email_port` varchar(20) DEFAULT NULL,
  `email_name` varchar(30) DEFAULT NULL,
  `email_pass` varchar(100) DEFAULT NULL,
  `email_wx` int(2) DEFAULT '0',
  `email_ali` int(2) DEFAULT '0',
  `email_qq` int(2) DEFAULT '0',
  `ali_tz` int(2) DEFAULT '0',
  `wx_tz` int(2) DEFAULT '0',
  `qq_tz` int(2) DEFAULT '0',
  `email_pid` varchar(50) DEFAULT NULL,
  `email_status` int(4) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `pay_emailtz`
--

INSERT INTO `pay_emailtz` (`email_id`, `email_smtp`, `email_port`, `email_name`, `email_pass`, `email_wx`, `email_ali`, `email_qq`, `ali_tz`, `wx_tz`, `qq_tz`, `email_pid`, `email_status`) VALUES
(1, 'smtp.qq.com', '465', '2074286140@qq.com', 'xhytkdgzuhydcjia', 1, 1, 1, 1, 1, 1, '10371', 1);

-- --------------------------------------------------------

--
-- 表的结构 `pay_order`
--

CREATE TABLE IF NOT EXISTS `pay_order` (
  `trade_no` varchar(64) NOT NULL,
  `out_trade_no` varchar(64) NOT NULL,
  `notify_url` varchar(128) DEFAULT NULL,
  `return_url` varchar(128) DEFAULT NULL,
  `type` varchar(20) NOT NULL,
  `pid` varchar(14) NOT NULL,
  `addtime` varchar(20) DEFAULT NULL,
  `endtime` varchar(20) DEFAULT NULL,
  `name` varchar(64) NOT NULL,
  `money` varchar(32) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '0',
  `transfer_status` int(1) NOT NULL DEFAULT '0',
  `transfer_result` varchar(64) DEFAULT NULL,
  `transfer_date` datetime DEFAULT NULL,
  `tmoney` varchar(32) NOT NULL,
  `price` varchar(20) DEFAULT NULL,
  `software` int(1) NOT NULL DEFAULT '0',
  `outtime` varchar(20) NOT NULL,
  `pay_id` varchar(30) NOT NULL,
  `chuli` int(1) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `pay_qrlist`
--

CREATE TABLE IF NOT EXISTS `pay_qrlist` (
  `id` int(11) NOT NULL,
  `pid` varchar(18) NOT NULL,
  `pic_url` varchar(88) NOT NULL,
  `qr_url` varchar(255) NOT NULL,
  `type` varchar(8) NOT NULL,
  `money` varchar(8) NOT NULL,
  `addtime` varchar(10) NOT NULL,
  `pic_url1` varchar(88) DEFAULT NULL,
  `qr_url1` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `pay_settle`
--

CREATE TABLE IF NOT EXISTS `pay_settle` (
  `account` varchar(32) NOT NULL,
  `batch` varchar(20) NOT NULL,
  `fee` decimal(10,2) NOT NULL,
  `id` int(11) NOT NULL,
  `money` decimal(10,2) NOT NULL,
  `pid` int(11) NOT NULL,
  `qq` varchar(32) NOT NULL,
  `status` int(1) NOT NULL,
  `time` datetime NOT NULL,
  `type` varchar(10) NOT NULL,
  `username` varchar(10) NOT NULL,
  `jsfangshi` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `pay_user`
--

CREATE TABLE IF NOT EXISTS `pay_user` (
  `pid` int(32) NOT NULL,
  `pass` varchar(128) NOT NULL,
  `qq` varchar(10) NOT NULL,
  `qq_uid` varchar(32) NOT NULL,
  `jsfangshi` varchar(32) NOT NULL,
  `account` varchar(32) DEFAULT NULL,
  `username` varchar(10) DEFAULT NULL,
  `cardNo` varchar(32) DEFAULT NULL,
  `issmrz` int(1) NOT NULL DEFAULT '0',
  `money` decimal(10,2) NOT NULL,
  `rate` varchar(5) DEFAULT NULL,
  `ali_login` varchar(20) DEFAULT NULL,
  `wx_login` varchar(20) DEFAULT NULL,
  `qq_login` varchar(20) DEFAULT NULL,
  `active` int(1) NOT NULL DEFAULT '1',
  `outtime` varchar(20) NOT NULL,
  `paymb` decimal(10,2) NOT NULL,
  `pay_gg` varchar(88) NOT NULL DEFAULT '系统公告：付款后请务必回到此页面！',
  `apply` int(1) DEFAULT '0',
  `alipid` varchar(20) NOT NULL,
  `alicookie` text,
  `qqcookie` text,
  `shopname` text,
  `qqzf` int(11) NOT NULL DEFAULT '0',
  `zfb` int(11) NOT NULL DEFAULT '1',
  `weixin` int(11) NOT NULL DEFAULT '0',
  `sj` int(128) NOT NULL DEFAULT '1609996723',
  `jies` int(11) NOT NULL DEFAULT '0',
  `nameid` text,
  `zsname` text,
  `sjian` text NOT NULL,
  `f2fid` text,
  `f2fpublic` text,
  `f2fkey` varchar(2000) DEFAULT NULL,
  `f2fpay` varchar(2) DEFAULT NULL,
  `alipayid` text,
  `wxcornzt` varchar(2) DEFAULT NULL,
  `jine` text NOT NULL,
  `jine2` text,
  `key` varchar(128) DEFAULT NULL,
  `pwd` varchar(128) DEFAULT NULL,
  `shopname2` text,
  `shopname3` text,
  `alicookie1` text,
  `mail_smtp` varchar(23) DEFAULT NULL,
  `mail_port` varchar(23) DEFAULT NULL,
  `mail_name` varchar(23) DEFAULT NULL,
  `mail_pwd` varchar(23) DEFAULT NULL,
  `payQQ` varchar(10) DEFAULT NULL,
  `qqcookie1` text,
  `payQQ1` varchar(10) DEFAULT NULL
) ENGINE=MyISAM AUTO_INCREMENT=10991 DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pay_config`
--
ALTER TABLE `pay_config`
  ADD PRIMARY KEY (`k`);

--
-- Indexes for table `pay_down`
--
ALTER TABLE `pay_down`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pay_emailtz`
--
ALTER TABLE `pay_emailtz`
  ADD PRIMARY KEY (`email_id`);

--
-- Indexes for table `pay_order`
--
ALTER TABLE `pay_order`
  ADD PRIMARY KEY (`trade_no`);

--
-- Indexes for table `pay_qrlist`
--
ALTER TABLE `pay_qrlist`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pay_settle`
--
ALTER TABLE `pay_settle`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pay_user`
--
ALTER TABLE `pay_user`
  ADD PRIMARY KEY (`pid`),
  ADD KEY `key` (`pass`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pay_down`
--
ALTER TABLE `pay_down`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `pay_emailtz`
--
ALTER TABLE `pay_emailtz`
  MODIFY `email_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `pay_qrlist`
--
ALTER TABLE `pay_qrlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pay_settle`
--
ALTER TABLE `pay_settle`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pay_user`
--
ALTER TABLE `pay_user`
  MODIFY `pid` int(32) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10991;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
