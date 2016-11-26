-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2013 年 11 月 22 日 07:40
-- 服务器版本: 5.5.24-log
-- PHP 版本: 5.4.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `team`
--

-- --------------------------------------------------------

--
-- 表的结构 `audits`
--

CREATE TABLE IF NOT EXISTS `audits` (
  `id` varchar(36) NOT NULL,
  `event` varchar(255) NOT NULL,
  `model` varchar(255) NOT NULL,
  `entity_id` varchar(36) NOT NULL,
  `json_object` text NOT NULL,
  `description` text,
  `source_id` varchar(255) DEFAULT NULL,
  `created` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `audits`
--

INSERT INTO `audits` (`id`, `event`, `model`, `entity_id`, `json_object`, `description`, `source_id`, `created`) VALUES
('525a26c3-31fc-4fed-b8a9-07fc82c20753', 'DELETE', 'Customer', '58', '{"Customer":{"id":"58","firstName":"qwerty","lastName":"qwerty","address":"iusatgfiusydui","phone":"12345678","email":"oiasydfhrusye@yyy.com","birthday":"17-05-2013","gender":"Male","customer_name":"qwerty qwerty"}}', NULL, NULL, '2013-10-13 04:51:15'),
('525a2744-72b8-469a-bf87-07fc82c20753', 'DELETE', 'Customer', '62', '{"Customer":{"id":"62","firstName":"addfda","lastName":"sdf","address":"adfd","phone":"1243","email":"sdfe@qq.com","birthday":"21-05-2013","gender":"Male","customer_name":"addfda sdf"}}', NULL, '62', '2013-10-13 04:53:24'),
('525a2886-6674-47cd-964b-07fc82c20753', 'DELETE', 'Customer', '59', '{"Customer":{"id":"59","firstName":"denny","lastName":"lshglakdhglsdf","address":"liasgfligh","phone":"12345","email":"justin@ashfkjsdfhk.com","birthday":"17-05-2013","gender":"Male","customer_name":"denny lshglakdhglsdf"}}', NULL, '62', '2013-10-13 04:58:46'),
('525a92bb-d8b4-49a5-9742-07fc82c20753', 'CREATE', 'Job', '87', '{"Job":{"id":"87","customer_id":"64","startTime":"2013-10-10 15:00:00","endTime":"2013-10-10 15:30:00","status":"NotFinished","title":"adfa","comment":"asdf","Staff":"10,11","Service":"2,3"}}', NULL, '62', '2013-10-13 12:31:55'),
('525a9929-30f4-4d4f-8a37-07fc82c20753', 'CREATE', 'User', '117', '{"User":{"id":"117","username":null,"password":"d74d6fa75b89ed612dfa01d579679b03c5a4e3cf","role":"3","customer_id":"70","token_hash":"d74d6fa75b89ed612dfa01d579679b03c5a4e3cf","staff_id":"0"}}', NULL, '64', '2013-10-13 12:59:21'),
('525a9929-5944-4c44-946a-07fc82c20753', 'CREATE', 'Customer', '70', '{"Customer":{"id":"70","firstName":"JK","lastName":"k","address":"asdf","phone":"1234","email":"asdf@something.com","birthday":"08-10-2013","gender":"Male","customer_name":"JK k"}}', NULL, '64', '2013-10-13 12:59:21'),
('525a9929-88d4-47cf-ba99-07fc82c20753', 'EDIT', 'User', '117', '{"User":{"id":"117","username":"asdf@something.com","password":"d74d6fa75b89ed612dfa01d579679b03c5a4e3cf","role":"3","customer_id":"70","token_hash":"d74d6fa75b89ed612dfa01d579679b03c5a4e3cf","staff_id":"0"}}', NULL, '64', '2013-10-13 12:59:21'),
('525b7e50-83bc-4a00-8a00-07fc82c20753', 'EDIT', 'Pagecontent', '15', '{"Pagecontent":{"id":"15","page":"trades","content":"<p><span><strong>A List of Recommended Trades<\\/strong><\\/span><\\/p>\\r\\n<p>&nbsp;<\\/p>\\r\\n<p><span>Electrician<\\/span><\\/p>\\r\\n<p>&nbsp;<\\/p>\\r\\n<p>S &amp; D Electrical<br \\/>Call Steve:&nbsp;<strong>0407 541 016<\\/strong><\\/p>\\r\\n<p><a href=\\"mailto:someone@example.com?Subject=Hello%20again\\" target=\\"_top\\">Send E-Mail<\\/a><\\/p>\\r\\n<p>&nbsp;<\\/p>\\r\\n<p><span>Painting<\\/span><\\/p>\\r\\n<p>&nbsp;<\\/p>\\r\\n<p>Quality painting service<br \\/>Call Dave:&nbsp;<strong>0411 695 858<\\/strong><br \\/><br \\/><span>Plumbing<\\/span><br \\/>Garry The Plumber<\\/p>\\r\\n<p>Call Garry:&nbsp;<strong>0418 351 112<\\/strong><br \\/><br \\/><span>For all your phone and communication needs<\\/span><br \\/>Inspired Communications<br \\/>Call Mary:&nbsp;<strong>0423 024 256<\\/strong><br \\/><br \\/><span>Large Tree Work or Qualified Arborist<\\/span><br \\/>Cd mc leod Pty Ltd<br \\/>Call Mark:&nbsp;<strong>0438 511 178<\\/strong><br \\/>Treescape Pty Ltd<br \\/>Call Peter:&nbsp;<strong>0417 322 232<\\/strong><br \\/><br \\/><span>Mulch and Soil Supply<\\/span><br \\/>Fulton''s Pty Ltd<br \\/>Call:&nbsp;<strong>9824 3041<\\/strong><br \\/><br \\/><span>Large and Small Industrial Bins<\\/span><br \\/>Combined Bulk Bins<br \\/>Call Rob:&nbsp;<strong>0418 120 212<\\/strong><\\/p>\\r\\n<p>&nbsp;<\\/p>\\r\\n<p>For all your air conditioning needs<\\/p>\\r\\n<p>Luke Mc Donell<\\/p>\\r\\n<p><strong>J Belle Services 0413884290<\\/strong><\\/p>"}}', NULL, '64', '2013-10-14 05:17:04'),
('525b7e9f-4870-49c1-a0ca-07fc82c20753', 'EDIT', 'Pagecontent', '15', '{"Pagecontent":{"id":"15","page":"trades","content":"<h1>A List of Recommended Trades<\\/h1>\\r\\n<p><span>Electrician<\\/span><\\/p>\\r\\n<p>&nbsp;<\\/p>\\r\\n<p>S &amp; D Electrical<br \\/>Call Steve:&nbsp;<strong>0407 541 016<\\/strong><\\/p>\\r\\n<p><a href=\\"mailto:someone@example.com?Subject=Hello%20again\\" target=\\"_top\\">Send E-Mail<\\/a><\\/p>\\r\\n<p>&nbsp;<\\/p>\\r\\n<p><span>Painting<\\/span><\\/p>\\r\\n<p>&nbsp;<\\/p>\\r\\n<p>Quality painting service<br \\/>Call Dave:&nbsp;<strong>0411 695 858<\\/strong><br \\/><br \\/><span>Plumbing<\\/span><br \\/>Garry The Plumber<\\/p>\\r\\n<p>Call Garry:&nbsp;<strong>0418 351 112<\\/strong><br \\/><br \\/><span>For all your phone and communication needs<\\/span><br \\/>Inspired Communications<br \\/>Call Mary:&nbsp;<strong>0423 024 256<\\/strong><br \\/><br \\/><span>Large Tree Work or Qualified Arborist<\\/span><br \\/>Cd mc leod Pty Ltd<br \\/>Call Mark:&nbsp;<strong>0438 511 178<\\/strong><br \\/>Treescape Pty Ltd<br \\/>Call Peter:&nbsp;<strong>0417 322 232<\\/strong><br \\/><br \\/><span>Mulch and Soil Supply<\\/span><br \\/>Fulton''s Pty Ltd<br \\/>Call:&nbsp;<strong>9824 3041<\\/strong><br \\/><br \\/><span>Large and Small Industrial Bins<\\/span><br \\/>Combined Bulk Bins<br \\/>Call Rob:&nbsp;<strong>0418 120 212<\\/strong><\\/p>\\r\\n<p>&nbsp;<\\/p>\\r\\n<p>For all your air conditioning needs<\\/p>\\r\\n<p>Luke Mc Donell<\\/p>\\r\\n<p><strong>J Belle Services 0413884290<\\/strong><\\/p>"}}', NULL, '64', '2013-10-14 05:18:23'),
('525b7ebd-c6cc-4c53-9f19-07fc82c20753', 'EDIT', 'Pagecontent', '15', '{"Pagecontent":{"id":"15","page":"trades","content":"<h1>A List of Recommended Trades<\\/h1>\\r\\n<h3>Electrician<\\/h3>\\r\\n<p>&nbsp;<\\/p>\\r\\n<p>S &amp; D Electrical<br \\/>Call Steve:&nbsp;<strong>0407 541 016<\\/strong><\\/p>\\r\\n<p><a href=\\"mailto:someone@example.com?Subject=Hello%20again\\" target=\\"_top\\">Send E-Mail<\\/a><\\/p>\\r\\n<p>&nbsp;<\\/p>\\r\\n<p><span>Painting<\\/span><\\/p>\\r\\n<p>&nbsp;<\\/p>\\r\\n<p>Quality painting service<br \\/>Call Dave:&nbsp;<strong>0411 695 858<\\/strong><br \\/><br \\/><span>Plumbing<\\/span><br \\/>Garry The Plumber<\\/p>\\r\\n<p>Call Garry:&nbsp;<strong>0418 351 112<\\/strong><br \\/><br \\/><span>For all your phone and communication needs<\\/span><br \\/>Inspired Communications<br \\/>Call Mary:&nbsp;<strong>0423 024 256<\\/strong><br \\/><br \\/><span>Large Tree Work or Qualified Arborist<\\/span><br \\/>Cd mc leod Pty Ltd<br \\/>Call Mark:&nbsp;<strong>0438 511 178<\\/strong><br \\/>Treescape Pty Ltd<br \\/>Call Peter:&nbsp;<strong>0417 322 232<\\/strong><br \\/><br \\/><span>Mulch and Soil Supply<\\/span><br \\/>Fulton''s Pty Ltd<br \\/>Call:&nbsp;<strong>9824 3041<\\/strong><br \\/><br \\/><span>Large and Small Industrial Bins<\\/span><br \\/>Combined Bulk Bins<br \\/>Call Rob:&nbsp;<strong>0418 120 212<\\/strong><\\/p>\\r\\n<p>&nbsp;<\\/p>\\r\\n<p>For all your air conditioning needs<\\/p>\\r\\n<p>Luke Mc Donell<\\/p>\\r\\n<p><strong>J Belle Services 0413884290<\\/strong><\\/p>"}}', NULL, '64', '2013-10-14 05:18:53'),
('525b7f0a-ce70-4244-8869-07fc82c20753', 'EDIT', 'Pagecontent', '15', '{"Pagecontent":{"id":"15","page":"trades","content":"<h1>A List of Recommended Trades<\\/h1>\\r\\n<h3>Electrician<\\/h3>\\r\\n<p>S &amp; D Electrical<br \\/>Call Steve:&nbsp;<strong>0407 541 016<\\/strong><\\/p>\\r\\n<p><a href=\\"mailto:steve.mcalroy@optusnet.com.au\\">Send E-Mail<\\/a><\\/p>\\r\\n<p>&nbsp;<\\/p>\\r\\n<p><span>Painting<\\/span><\\/p>\\r\\n<p>&nbsp;<\\/p>\\r\\n<p>Quality painting service<br \\/>Call Dave:&nbsp;<strong>0411 695 858<\\/strong><br \\/><br \\/><span>Plumbing<\\/span><br \\/>Garry The Plumber<\\/p>\\r\\n<p>Call Garry:&nbsp;<strong>0418 351 112<\\/strong><br \\/><br \\/><span>For all your phone and communication needs<\\/span><br \\/>Inspired Communications<br \\/>Call Mary:&nbsp;<strong>0423 024 256<\\/strong><br \\/><br \\/><span>Large Tree Work or Qualified Arborist<\\/span><br \\/>Cd mc leod Pty Ltd<br \\/>Call Mark:&nbsp;<strong>0438 511 178<\\/strong><br \\/>Treescape Pty Ltd<br \\/>Call Peter:&nbsp;<strong>0417 322 232<\\/strong><br \\/><br \\/><span>Mulch and Soil Supply<\\/span><br \\/>Fulton''s Pty Ltd<br \\/>Call:&nbsp;<strong>9824 3041<\\/strong><br \\/><br \\/><span>Large and Small Industrial Bins<\\/span><br \\/>Combined Bulk Bins<br \\/>Call Rob:&nbsp;<strong>0418 120 212<\\/strong><\\/p>\\r\\n<p>&nbsp;<\\/p>\\r\\n<p>For all your air conditioning needs<\\/p>\\r\\n<p>Luke Mc Donell<\\/p>\\r\\n<p><strong>J Belle Services 0413884290<\\/strong><\\/p>"}}', NULL, '64', '2013-10-14 05:20:10'),
('525b7f48-47ac-41c4-a8bf-07fc82c20753', 'EDIT', 'Pagecontent', '15', '{"Pagecontent":{"id":"15","page":"trades","content":"<h1>A List of Recommended Trades<\\/h1>\\r\\n<h3>Electrician<\\/h3>\\r\\n<p>S &amp; D Electrical<\\/p>\\r\\n<p>Call Steve: <strong>0407 541 016<\\/strong><\\/p>\\r\\n<p><a href=\\"mailto:steve.mcalroy@optusnet.com.au\\">Send E-Mail<\\/a><\\/p>\\r\\n<p>&nbsp;<\\/p>\\r\\n<p><span>Painting<\\/span><\\/p>\\r\\n<p>&nbsp;<\\/p>\\r\\n<p>Quality painting service<br \\/>Call Dave:&nbsp;<strong>0411 695 858<\\/strong><br \\/><br \\/><span>Plumbing<\\/span><br \\/>Garry The Plumber<\\/p>\\r\\n<p>Call Garry:&nbsp;<strong>0418 351 112<\\/strong><br \\/><br \\/><span>For all your phone and communication needs<\\/span><br \\/>Inspired Communications<br \\/>Call Mary:&nbsp;<strong>0423 024 256<\\/strong><br \\/><br \\/><span>Large Tree Work or Qualified Arborist<\\/span><br \\/>Cd mc leod Pty Ltd<br \\/>Call Mark:&nbsp;<strong>0438 511 178<\\/strong><br \\/>Treescape Pty Ltd<br \\/>Call Peter:&nbsp;<strong>0417 322 232<\\/strong><br \\/><br \\/><span>Mulch and Soil Supply<\\/span><br \\/>Fulton''s Pty Ltd<br \\/>Call:&nbsp;<strong>9824 3041<\\/strong><br \\/><br \\/><span>Large and Small Industrial Bins<\\/span><br \\/>Combined Bulk Bins<br \\/>Call Rob:&nbsp;<strong>0418 120 212<\\/strong><\\/p>\\r\\n<p>&nbsp;<\\/p>\\r\\n<p>For all your air conditioning needs<\\/p>\\r\\n<p>Luke Mc Donell<\\/p>\\r\\n<p><strong>J Belle Services 0413884290<\\/strong><\\/p>"}}', NULL, '64', '2013-10-14 05:21:12'),
('525b7fbe-83f8-464b-901f-07fc82c20753', 'EDIT', 'Pagecontent', '15', '{"Pagecontent":{"id":"15","page":"trades","content":"<h1>A List of Recommended Trades<\\/h1>\\r\\n<h3>Electrician<\\/h3>\\r\\n<p>S &amp; D Electrical<br \\/>Call Steve: <strong>0407 541 016<\\/strong><br \\/> <a href=\\"mailto:steve.mcalroy@optusnet.com.au\\">Send E-Mail<\\/a><\\/p>\\r\\n<h3>Painting<\\/h3>\\r\\n<p>Quality painting service<br \\/>Call Dave:<strong>0411 695 858<\\/strong><br \\/><br \\/><span>Plumbing<\\/span><br \\/>Garry The Plumber<\\/p>\\r\\n<p>Call Garry:&nbsp;<strong>0418 351 112<\\/strong><br \\/><br \\/><span>For all your phone and communication needs<\\/span><br \\/>Inspired Communications<br \\/>Call Mary:&nbsp;<strong>0423 024 256<\\/strong><br \\/><br \\/><span>Large Tree Work or Qualified Arborist<\\/span><br \\/>Cd mc leod Pty Ltd<br \\/>Call Mark:&nbsp;<strong>0438 511 178<\\/strong><br \\/>Treescape Pty Ltd<br \\/>Call Peter:&nbsp;<strong>0417 322 232<\\/strong><br \\/><br \\/><span>Mulch and Soil Supply<\\/span><br \\/>Fulton''s Pty Ltd<br \\/>Call:&nbsp;<strong>9824 3041<\\/strong><br \\/><br \\/><span>Large and Small Industrial Bins<\\/span><br \\/>Combined Bulk Bins<br \\/>Call Rob:&nbsp;<strong>0418 120 212<\\/strong><\\/p>\\r\\n<p>&nbsp;<\\/p>\\r\\n<p>For all your air conditioning needs<\\/p>\\r\\n<p>Luke Mc Donell<\\/p>\\r\\n<p><strong>J Belle Services 0413884290<\\/strong><\\/p>"}}', NULL, '64', '2013-10-14 05:23:10'),
('525b81b0-4200-44ad-b162-07fc82c20753', 'EDIT', 'Pagecontent', '15', '{"Pagecontent":{"id":"15","page":"trades","content":"<h1>A List of Recommended Trades<\\/h1>\\r\\n<h3>Electrician<\\/h3>\\r\\n<p>S &amp; D Electrical<br \\/>Call Steve: <strong>0407 541 016<\\/strong><br \\/><a href=\\"mailto:steve.mcalroy@optusnet.com.au\\">Send E-Mail<\\/a><\\/p>\\r\\n<h3>Painting<\\/h3>\\r\\n<p>Quality painting service<br \\/>Call Dave:<strong>0411 695 858<\\/strong><br \\/><a href=\\"mailto:millwood6@optusnet.com.au\\">Send E-Mail<\\/a><\\/p>\\r\\n<h3>Plumbing<\\/h3>\\r\\n<p>Garry The Plumber<\\/p>\\r\\n<p>Call Garry:<strong>0418 351 112<\\/strong><\\/p>\\r\\n<h3>For all your phone and communication needs<\\/h3>\\r\\n<p>Inspired Communications<br \\/>Call Mary:<strong>0423 024 256<\\/strong><br \\/><a href=\\"mailto:mary@beinspired.com.au\\">Send E-Mail<\\/a><\\/p>\\r\\n<h3>Large Tree Work or Qualified Arborist<\\/h3>\\r\\n<p>Cd mc leod Pty Ltd<br \\/>Call Mark:<strong>0438 511 178<\\/strong><\\/p>\\r\\n<p>Treescape Pty Ltd<br \\/>Call Peter:<strong>0417 322 232<\\/strong><br \\/><br \\/><span>Mulch and Soil Supply<\\/span><br \\/>Fulton''s Pty Ltd<br \\/>Call:&nbsp;<strong>9824 3041<\\/strong><br \\/><br \\/><span>Large and Small Industrial Bins<\\/span><br \\/>Combined Bulk Bins<br \\/>Call Rob:&nbsp;<strong>0418 120 212<\\/strong><\\/p>\\r\\n<p>&nbsp;<\\/p>\\r\\n<p>For all your air conditioning needs<\\/p>\\r\\n<p>Luke Mc Donell<\\/p>\\r\\n<p><strong>J Belle Services 0413884290<\\/strong><\\/p>"}}', NULL, '64', '2013-10-14 05:31:28'),
('525b82a9-cb88-41c3-80a8-07fc82c20753', 'EDIT', 'Pagecontent', '15', '{"Pagecontent":{"id":"15","page":"trades","content":"<h1>A List of Recommended Trades<\\/h1>\\r\\n<h3>Electrician<\\/h3>\\r\\n<p>S &amp; D Electrical<br \\/>Call Steve: <strong>0407 541 016<\\/strong><br \\/><a href=\\"mailto:steve.mcalroy@optusnet.com.au\\">Send E-Mail<\\/a><\\/p>\\r\\n<h3>Painting<\\/h3>\\r\\n<p>Quality painting service<br \\/>Call Dave:<strong>0411 695 858<\\/strong><br \\/><a href=\\"mailto:millwood6@optusnet.com.au\\">Send E-Mail<\\/a><\\/p>\\r\\n<h3>Plumbing<\\/h3>\\r\\n<p>Garry The Plumber<\\/p>\\r\\n<p>Call Garry:<strong>0418 351 112<\\/strong><\\/p>\\r\\n<h3>For all your phone and communication needs<\\/h3>\\r\\n<p>Inspired Communications<br \\/>Call Mary:<strong>0423 024 256<\\/strong><br \\/><a href=\\"mailto:mary@beinspired.com.au\\">Send E-Mail<\\/a><\\/p>\\r\\n<h3>Large Tree Work or Qualified Arborist<\\/h3>\\r\\n<p>Cd mc leod Pty Ltd<br \\/>Call Mark:<strong>0438 511 178<\\/strong><\\/p>\\r\\n<p>Treescape Pty Ltd<br \\/>Call Peter:<strong>0417 322 232<\\/strong><a href=\\"mailto:peter@treescape.com.au\\">Send E-Mail<\\/a><\\/p>\\r\\n<h3>Mulch and Soil Supply<\\/h3>\\r\\n<p>Fulton''s Pty Ltd<br \\/>Call:<strong>9824 3041<\\/strong><\\/p>\\r\\n<p><span>Large and Small Industrial Bins<\\/span><br \\/>Combined Bulk Bins<br \\/>Call Rob:&nbsp;<strong>0418 120 212<\\/strong><\\/p>\\r\\n<p>&nbsp;<\\/p>\\r\\n<p>For all your air conditioning needs<\\/p>\\r\\n<p>Luke Mc Donell<\\/p>\\r\\n<p><strong>J Belle Services 0413884290<\\/strong><\\/p>"}}', NULL, '64', '2013-10-14 05:35:37'),
('525b84c6-0e70-4d4b-80f2-07fc82c20753', 'EDIT', 'Pagecontent', '15', '{"Pagecontent":{"id":"15","page":"trades","content":"<h1>A List of Recommended Trades<\\/h1>\\r\\n<h3>Electrician<\\/h3>\\r\\n<p>S &amp; D Electrical<br \\/>Call Steve: <strong>0407 541 016<\\/strong><br \\/><a href=\\"mailto:steve.mcalroy@optusnet.com.au\\">Send E-Mail<\\/a><\\/p>\\r\\n<h3>Painting<\\/h3>\\r\\n<p>Quality painting service<br \\/>Call Dave: <strong>0411 695 858<\\/strong><br \\/><a href=\\"mailto:millwood6@optusnet.com.au\\">Send E-Mail<\\/a><\\/p>\\r\\n<h3>Plumbing<\\/h3>\\r\\n<p>Garry The Plumber<\\/p>\\r\\n<p>Call Garry: <strong>0418 351 112<\\/strong><\\/p>\\r\\n<h3>For all your phone and communication needs<\\/h3>\\r\\n<p>Inspired Communications<br \\/>Call Mary: <strong>0423 024 256<\\/strong><br \\/><a href=\\"mailto:mary@beinspired.com.au\\">Send E-Mail<\\/a><\\/p>\\r\\n<h3>Large Tree Work or Qualified Arborist<\\/h3>\\r\\n<p>Cd mc leod Pty Ltd<br \\/>Call Mark: <strong>0438 511 178<\\/strong><\\/p>\\r\\n<p>&nbsp;<\\/p>\\r\\n<p>Treescape Pty Ltd<br \\/>Call Peter: <strong>0417 322 232<\\/strong><br \\/><a href=\\"mailto:peter@treescape.com.au\\">Send E-Mail<\\/a><\\/p>\\r\\n<h3>Mulch and Soil Supply<\\/h3>\\r\\n<p>Fulton''s Pty Ltd<br \\/>Call: <strong>9824 3041<\\/strong><\\/p>\\r\\n<h3>Large and Small Industrial Bins<\\/h3>\\r\\n<p>Combined Bulk Bins<br \\/>Call Rob: <strong>0418 120 212<\\/strong><br \\/><a href=\\"mailto:robertcroft61@hotmail.com\\">Send E-Mail<\\/a><\\/p>\\r\\n<h3>For all your travel needs<\\/h3>\\r\\n<p>Travel Managers<br \\/>Sylvia Katsiavos<br \\/><a href=\\"mailto:sylviak@travelmanagers.com.au\\">Send E-Mail<\\/a><\\/p>\\r\\n<h3>For all your air conditioning needs<\\/h3>\\r\\n<p>Luke Mc Donell<\\/p>\\r\\n<p>J Belle Services <strong>0413884290<\\/strong><br \\/><a href=\\"mailto:Jbelle1@live.com.au\\">Send E-Mail<\\/a><\\/p>"}}', NULL, '64', '2013-10-14 05:44:38'),
('525b850e-3974-40fd-ba4e-07fc82c20753', 'EDIT', 'Pagecontent', '15', '{"Pagecontent":{"id":"15","page":"trades","content":"<h1>A List of Recommended Trades<\\/h1>\\r\\n<h3>Electrician<\\/h3>\\r\\n<p>S &amp; D Electrical<br \\/>Call Steve: <strong>0407 541 016<\\/strong><br \\/><a href=\\"mailto:steve.mcalroy@optusnet.com.au\\">Send E-Mail<\\/a><\\/p>\\r\\n<h3>Painting<\\/h3>\\r\\n<p>Quality painting service<br \\/>Call Dave: <strong>0411 695 858<\\/strong><br \\/><a href=\\"mailto:millwood6@optusnet.com.au\\">Send E-Mail<\\/a><\\/p>\\r\\n<h3>Plumbing<\\/h3>\\r\\n<p>Garry The Plumber<br \\/>Call Garry: <strong>0418 351 112<\\/strong><\\/p>\\r\\n<h3>For all your phone and communication needs<\\/h3>\\r\\n<p>Inspired Communications<br \\/>Call Mary: <strong>0423 024 256<\\/strong><br \\/><a href=\\"mailto:mary@beinspired.com.au\\">Send E-Mail<\\/a><\\/p>\\r\\n<h3>Large Tree Work or Qualified Arborist<\\/h3>\\r\\n<p>Cd mc leod Pty Ltd<br \\/>Call Mark: <strong>0438 511 178<\\/strong><\\/p>\\r\\n<p>&nbsp;<\\/p>\\r\\n<p>Treescape Pty Ltd<br \\/>Call Peter: <strong>0417 322 232<\\/strong><br \\/><a href=\\"mailto:peter@treescape.com.au\\">Send E-Mail<\\/a><\\/p>\\r\\n<h3>Mulch and Soil Supply<\\/h3>\\r\\n<p>Fulton''s Pty Ltd<br \\/>Call: <strong>9824 3041<\\/strong><\\/p>\\r\\n<h3>Large and Small Industrial Bins<\\/h3>\\r\\n<p>Combined Bulk Bins<br \\/>Call Rob: <strong>0418 120 212<\\/strong><br \\/><a href=\\"mailto:robertcroft61@hotmail.com\\">Send E-Mail<\\/a><\\/p>\\r\\n<h3>For all your travel needs<\\/h3>\\r\\n<p>Travel Managers<br \\/>Sylvia Katsiavos<br \\/><a href=\\"mailto:sylviak@travelmanagers.com.au\\">Send E-Mail<\\/a><\\/p>\\r\\n<h3>For all your air conditioning needs<\\/h3>\\r\\n<p>Luke Mc Donell<br \\/>J Belle Services <strong>0413884290<\\/strong><br \\/><a href=\\"mailto:Jbelle1@live.com.au\\">Send E-Mail<\\/a><\\/p>"}}', NULL, '64', '2013-10-14 05:45:50'),
('525b856b-77fc-413c-aaed-07fc82c20753', 'EDIT', 'Pagecontent', '15', '{"Pagecontent":{"id":"15","page":"trades","content":"<h1>A List of Recommended Trades<\\/h1>\\r\\n<div class=\\"col-sm-12\\">\\r\\n<h3>Electrician<\\/h3>\\r\\n<p>S &amp; D Electrical<br \\/>Call Steve: <strong>0407 541 016<\\/strong><br \\/><a href=\\"mailto:steve.mcalroy@optusnet.com.au\\">Send E-Mail<\\/a><\\/p>\\r\\n<h3>Painting<\\/h3>\\r\\n<p>Quality painting service<br \\/>Call Dave: <strong>0411 695 858<\\/strong><br \\/><a href=\\"mailto:millwood6@optusnet.com.au\\">Send E-Mail<\\/a><\\/p>\\r\\n<h3>Plumbing<\\/h3>\\r\\n<p>Garry The Plumber<br \\/>Call Garry: <strong>0418 351 112<\\/strong><\\/p>\\r\\n<h3>For all your phone and communication needs<\\/h3>\\r\\n<p>Inspired Communications<br \\/>Call Mary: <strong>0423 024 256<\\/strong><br \\/><a href=\\"mailto:mary@beinspired.com.au\\">Send E-Mail<\\/a><\\/p>\\r\\n<h3>Large Tree Work or Qualified Arborist<\\/h3>\\r\\n<p>Cd mc leod Pty Ltd<br \\/>Call Mark: <strong>0438 511 178<\\/strong><\\/p>\\r\\n<p>&nbsp;<\\/p>\\r\\n<p>Treescape Pty Ltd<br \\/>Call Peter: <strong>0417 322 232<\\/strong><br \\/><a href=\\"mailto:peter@treescape.com.au\\">Send E-Mail<\\/a><\\/p>\\r\\n<\\/div>\\r\\n<div class=\\"col-sm-12\\">\\r\\n<h3>Mulch and Soil Supply<\\/h3>\\r\\n<p>Fulton''s Pty Ltd<br \\/>Call: <strong>9824 3041<\\/strong><\\/p>\\r\\n<h3>Large and Small Industrial Bins<\\/h3>\\r\\n<p>Combined Bulk Bins<br \\/>Call Rob: <strong>0418 120 212<\\/strong><br \\/><a href=\\"mailto:robertcroft61@hotmail.com\\">Send E-Mail<\\/a><\\/p>\\r\\n<h3>For all your travel needs<\\/h3>\\r\\n<p>Travel Managers<br \\/>Sylvia Katsiavos<br \\/><a href=\\"mailto:sylviak@travelmanagers.com.au\\">Send E-Mail<\\/a><\\/p>\\r\\n<h3>For all your air conditioning needs<\\/h3>\\r\\n<p>Luke Mc Donell<br \\/>J Belle Services <strong>0413884290<\\/strong><br \\/><a href=\\"mailto:Jbelle1@live.com.au\\">Send E-Mail<\\/a><\\/p>\\r\\n<\\/div>"}}', NULL, '64', '2013-10-14 05:47:23'),
('525b8584-1c18-440f-9c51-07fc82c20753', 'EDIT', 'Pagecontent', '15', '{"Pagecontent":{"id":"15","page":"trades","content":"<h1>A List of Recommended Trades<\\/h1>\\r\\n<div class=\\"col-sm-6\\">\\r\\n<h3>Electrician<\\/h3>\\r\\n<p>S &amp; D Electrical<br \\/>Call Steve: <strong>0407 541 016<\\/strong><br \\/><a href=\\"mailto:steve.mcalroy@optusnet.com.au\\">Send E-Mail<\\/a><\\/p>\\r\\n<h3>Painting<\\/h3>\\r\\n<p>Quality painting service<br \\/>Call Dave: <strong>0411 695 858<\\/strong><br \\/><a href=\\"mailto:millwood6@optusnet.com.au\\">Send E-Mail<\\/a><\\/p>\\r\\n<h3>Plumbing<\\/h3>\\r\\n<p>Garry The Plumber<br \\/>Call Garry: <strong>0418 351 112<\\/strong><\\/p>\\r\\n<h3>For all your phone and communication needs<\\/h3>\\r\\n<p>Inspired Communications<br \\/>Call Mary: <strong>0423 024 256<\\/strong><br \\/><a href=\\"mailto:mary@beinspired.com.au\\">Send E-Mail<\\/a><\\/p>\\r\\n<h3>Large Tree Work or Qualified Arborist<\\/h3>\\r\\n<p>Cd mc leod Pty Ltd<br \\/>Call Mark: <strong>0438 511 178<\\/strong><\\/p>\\r\\n<p>&nbsp;<\\/p>\\r\\n<p>Treescape Pty Ltd<br \\/>Call Peter: <strong>0417 322 232<\\/strong><br \\/><a href=\\"mailto:peter@treescape.com.au\\">Send E-Mail<\\/a><\\/p>\\r\\n<\\/div>\\r\\n<div class=\\"col-sm-6\\">\\r\\n<h3>Mulch and Soil Supply<\\/h3>\\r\\n<p>Fulton''s Pty Ltd<br \\/>Call: <strong>9824 3041<\\/strong><\\/p>\\r\\n<h3>Large and Small Industrial Bins<\\/h3>\\r\\n<p>Combined Bulk Bins<br \\/>Call Rob: <strong>0418 120 212<\\/strong><br \\/><a href=\\"mailto:robertcroft61@hotmail.com\\">Send E-Mail<\\/a><\\/p>\\r\\n<h3>For all your travel needs<\\/h3>\\r\\n<p>Travel Managers<br \\/>Sylvia Katsiavos<br \\/><a href=\\"mailto:sylviak@travelmanagers.com.au\\">Send E-Mail<\\/a><\\/p>\\r\\n<h3>For all your air conditioning needs<\\/h3>\\r\\n<p>Luke Mc Donell<br \\/>J Belle Services <strong>0413884290<\\/strong><br \\/><a href=\\"mailto:Jbelle1@live.com.au\\">Send E-Mail<\\/a><\\/p>\\r\\n<\\/div>"}}', NULL, '64', '2013-10-14 05:47:48'),
('525b85a5-7670-49cd-b9f6-07fc82c20753', 'EDIT', 'Pagecontent', '15', '{"Pagecontent":{"id":"15","page":"trades","content":"<h1>A List of Recommended Trades<\\/h1>\\r\\n<div class=\\"col-sm-6\\">\\r\\n<h3>Electrician<\\/h3>\\r\\n<p>S &amp; D Electrical<br \\/>Call Steve: <strong>0407 541 016<\\/strong><br \\/><a href=\\"mailto:steve.mcalroy@optusnet.com.au\\">Send E-Mail<\\/a><\\/p>\\r\\n<h3>Painting<\\/h3>\\r\\n<p>Quality painting service<br \\/>Call Dave: <strong>0411 695 858<\\/strong><br \\/><a href=\\"mailto:millwood6@optusnet.com.au\\">Send E-Mail<\\/a><\\/p>\\r\\n<h3>Plumbing<\\/h3>\\r\\n<p>Garry The Plumber<br \\/>Call Garry: <strong>0418 351 112<\\/strong><\\/p>\\r\\n<h3>For all your phone and communication needs<\\/h3>\\r\\n<p>Inspired Communications<br \\/>Call Mary: <strong>0423 024 256<\\/strong><br \\/><a href=\\"mailto:mary@beinspired.com.au\\">Send E-Mail<\\/a><\\/p>\\r\\n<h3>Large Tree Work or Qualified Arborist<\\/h3>\\r\\n<p>Cd Mc Leod Pty Ltd<br \\/>Call Mark: <strong>0438 511 178<\\/strong><\\/p>\\r\\n<p>&nbsp;<\\/p>\\r\\n<p>Treescape Pty Ltd<br \\/>Call Peter: <strong>0417 322 232<\\/strong><br \\/><a href=\\"mailto:peter@treescape.com.au\\">Send E-Mail<\\/a><\\/p>\\r\\n<\\/div>\\r\\n<div class=\\"col-sm-6\\">\\r\\n<h3>Mulch and Soil Supply<\\/h3>\\r\\n<p>Fulton''s Pty Ltd<br \\/>Call: <strong>9824 3041<\\/strong><\\/p>\\r\\n<h3>Large and Small Industrial Bins<\\/h3>\\r\\n<p>Combined Bulk Bins<br \\/>Call Rob: <strong>0418 120 212<\\/strong><br \\/><a href=\\"mailto:robertcroft61@hotmail.com\\">Send E-Mail<\\/a><\\/p>\\r\\n<h3>For all your travel needs<\\/h3>\\r\\n<p>Travel Managers<br \\/>Sylvia Katsiavos<br \\/><a href=\\"mailto:sylviak@travelmanagers.com.au\\">Send E-Mail<\\/a><\\/p>\\r\\n<h3>For all your air conditioning needs<\\/h3>\\r\\n<p>Luke Mc Donell<br \\/>J Belle Services <strong>0413884290<\\/strong><br \\/><a href=\\"mailto:Jbelle1@live.com.au\\">Send E-Mail<\\/a><\\/p>\\r\\n<\\/div>"}}', NULL, '64', '2013-10-14 05:48:21'),
('525b8750-c2a8-49ab-882a-07fc82c20753', 'DELETE', 'Service', '2', '{"Service":{"id":"2","description":"d","price":"2","name":"a"}}', NULL, '64', '2013-10-14 05:55:28'),
('525b8753-5ae0-40e6-afd6-07fc82c20753', 'DELETE', 'Service', '3', '{"Service":{"id":"3","description":"haha","price":"0","name":"shan"}}', NULL, '64', '2013-10-14 05:55:31'),
('525b8756-d430-4b3a-9d2d-07fc82c20753', 'DELETE', 'Service', '4', '{"Service":{"id":"4","description":"dafdfdsa","price":"6","name":"adfe"}}', NULL, '64', '2013-10-14 05:55:34'),
('525b87af-bd1c-47ca-aeb4-07fc82c20753', 'CREATE', 'Service', '5', '{"Service":{"id":"5","description":"Removing weeds from the garden","price":"0","name":"Weeding","Job":""}}', NULL, '64', '2013-10-14 05:57:03'),
('525b87d8-ef84-4ca1-b837-07fc82c20753', 'CREATE', 'Service', '6', '{"Service":{"id":"6","description":"a","price":"0","name":"Lawns and Edge","Job":""}}', NULL, '64', '2013-10-14 05:57:44'),
('525b87e7-c008-4e52-b0a9-07fc82c20753', 'CREATE', 'Service', '7', '{"Service":{"id":"7","description":"a","price":"0","name":"Weed Spraying","Job":""}}', NULL, '64', '2013-10-14 05:57:59'),
('525b880b-a4dc-445a-a0ea-07fc82c20753', 'CREATE', 'Service', '8', '{"Service":{"id":"8","description":"a","price":"0","name":"Fertilising","Job":""}}', NULL, '64', '2013-10-14 05:58:35'),
('525b882b-5194-4c52-b07d-07fc82c20753', 'CREATE', 'Service', '9', '{"Service":{"id":"9","description":"a","price":"0","name":"Pest and Disease Control","Job":""}}', NULL, '64', '2013-10-14 05:59:07'),
('525b8839-1da0-48b2-8b12-07fc82c20753', 'CREATE', 'Service', '10', '{"Service":{"id":"10","description":"a","price":"0","name":"Trimming Shrubs","Job":""}}', NULL, '64', '2013-10-14 05:59:21'),
('525b8848-f0dc-4345-8240-07fc82c20753', 'CREATE', 'Service', '11', '{"Service":{"id":"11","description":"a","price":"0","name":"Trimming Creepers","Job":""}}', NULL, '64', '2013-10-14 05:59:36'),
('525b8859-4208-4092-a3ea-07fc82c20753', 'CREATE', 'Service', '12', '{"Service":{"id":"12","description":"a","price":"0","name":"Trimming Hedges","Job":""}}', NULL, '64', '2013-10-14 05:59:53'),
('525b886f-b730-43de-8ff3-07fc82c20753', 'CREATE', 'Service', '13', '{"Service":{"id":"13","description":"a","price":"0","name":"Mulching","Job":""}}', NULL, '64', '2013-10-14 06:00:15'),
('525b8884-2568-49ce-ba29-07fc82c20753', 'CREATE', 'Service', '14', '{"Service":{"id":"14","description":"a","price":"0","name":"Rubbish Removal","Job":""}}', NULL, '64', '2013-10-14 06:00:36'),
('525b889c-6de0-4960-8749-07fc82c20753', 'CREATE', 'Service', '15', '{"Service":{"id":"15","description":"a","price":"0","name":"Planting - 150mm","Job":""}}', NULL, '64', '2013-10-14 06:01:00'),
('525b88aa-2164-49df-b661-07fc82c20753', 'CREATE', 'Service', '16', '{"Service":{"id":"16","description":"a","price":"0","name":"Planting - 200mm","Job":""}}', NULL, '64', '2013-10-14 06:01:14'),
('525b88be-3368-4e21-b7d5-07fc82c20753', 'CREATE', 'Service', '17', '{"Service":{"id":"17","description":"a","price":"0","name":"Planting Annuals","Job":""}}', NULL, '64', '2013-10-14 06:01:34'),
('525b88d7-95d0-472d-8e29-07fc82c20753', 'CREATE', 'Service', '18', '{"Service":{"id":"18","description":"a","price":"0","name":"Sprinkler Check","Job":""}}', NULL, '64', '2013-10-14 06:01:59'),
('525b88f5-6fc4-4c83-9bd8-07fc82c20753', 'CREATE', 'Service', '19', '{"Service":{"id":"19","description":"a","price":"0","name":"Irrigations Works","Job":""}}', NULL, '64', '2013-10-14 06:02:29'),
('525b8939-ac24-4ebb-bbd0-07fc82c20753', 'CREATE', 'User', '118', '{"User":{"id":"118","username":null,"password":"d74d6fa75b89ed612dfa01d579679b03c5a4e3cf","role":"3","customer_id":"71","token_hash":"d74d6fa75b89ed612dfa01d579679b03c5a4e3cf","staff_id":"0"}}', NULL, '64', '2013-10-14 06:03:37'),
('525b8939-cbc8-47c8-bac9-07fc82c20753', 'CREATE', 'Customer', '71', '{"Customer":{"id":"71","firstName":"Caroline","lastName":"Pan","address":"123 Here Court Dandenong 3000","phone":"1234","email":"asdf@asdf.com","birthday":"08-10-2013","gender":"Female","customer_name":"Caroline Pan"}}', NULL, '64', '2013-10-14 06:03:37'),
('525b8939-d6b4-4e40-bd23-07fc82c20753', 'EDIT', 'User', '118', '{"User":{"id":"118","username":"asdf@asdf.com","password":"d74d6fa75b89ed612dfa01d579679b03c5a4e3cf","role":"3","customer_id":"71","token_hash":"d74d6fa75b89ed612dfa01d579679b03c5a4e3cf","staff_id":"0"}}', NULL, '64', '2013-10-14 06:03:37'),
('525b8b18-27a8-4bd9-bc8d-07fc82c20753', 'CREATE', 'Staff', '20', '{"Staff":{"id":"20","firstName":"Justin","lastName":"Kim","address":"123 Somewhere Court Dandenong 3000","phone":"123456778","email":"jskim19@student.monash.edu","gender":"Male","birthday":"11-09-1989","mobilePhone":null,"taxFile":null,"licence":null,"emergencyContact":"12345678","position":null,"dateOfHire":null,"dateOfTermination":null,"bank":null,"emergencyName":"Denny","emergencyRelationship":"Friend","staff_name":"Justin Kim","Job":""}}', NULL, '64', '2013-10-14 06:11:36'),
('525b8b18-3664-4395-a8e7-07fc82c20753', 'CREATE', 'User', '119', '{"User":{"id":"119","username":null,"password":"ae9a76d7c5bc3b6f60d2fc2a798a6a9ec966a004","role":"2","customer_id":"0","token_hash":"ae9a76d7c5bc3b6f60d2fc2a798a6a9ec966a004","staff_id":"20"}}', NULL, '64', '2013-10-14 06:11:36'),
('525b8b18-79a8-491a-bc4b-07fc82c20753', 'EDIT', 'User', '119', '{"User":{"id":"119","username":"jskim19@student.monash.edu","password":"ae9a76d7c5bc3b6f60d2fc2a798a6a9ec966a004","role":"2","customer_id":"0","token_hash":"ae9a76d7c5bc3b6f60d2fc2a798a6a9ec966a004","staff_id":"20"}}', NULL, '64', '2013-10-14 06:11:36'),
('525b8bb8-0450-4872-93e1-07fc82c20753', 'CREATE', 'Customer', '72', '{"Customer":{"id":"72","firstName":"Jim","lastName":"Kustin","address":"123 Here Caulfield 3800","phone":"123456778","email":"jimkustin@gmail.com","birthday":"11-09-1989","gender":"Male","customer_name":"Jim Kustin"}}', NULL, '64', '2013-10-14 06:14:16'),
('525b8bb8-7c60-415f-b1a3-07fc82c20753', 'EDIT', 'User', '120', '{"User":{"id":"120","username":"jimkustin@gmail.com","password":"ae9a76d7c5bc3b6f60d2fc2a798a6a9ec966a004","role":"3","customer_id":"72","token_hash":"ae9a76d7c5bc3b6f60d2fc2a798a6a9ec966a004","staff_id":"0"}}', NULL, '64', '2013-10-14 06:14:16'),
('525b8bb8-c8e0-4551-b22d-07fc82c20753', 'CREATE', 'User', '120', '{"User":{"id":"120","username":null,"password":"ae9a76d7c5bc3b6f60d2fc2a798a6a9ec966a004","role":"3","customer_id":"72","token_hash":"ae9a76d7c5bc3b6f60d2fc2a798a6a9ec966a004","staff_id":"0"}}', NULL, '64', '2013-10-14 06:14:16'),
('525b8bef-7b50-44eb-a5fd-07fc82c20753', 'CREATE', 'Job', '88', '{"Job":{"id":"88","customer_id":"72","startTime":"2013-10-16 09:15:00","endTime":"2013-10-16 09:45:00","status":"NotFinished","title":"Jim Kustin Lawn","comment":"","Staff":"20","Service":"6"}}', NULL, '64', '2013-10-14 06:15:11'),
('525b8bf4-7170-4043-a2e9-07fc82c20753', 'EDIT', 'Job', '88', '{"Job":{"id":"88","customer_id":"72","startTime":"2013-10-16 09:15:00","endTime":"2013-10-16 10:00:00","status":"NotFinished","title":"Jim Kustin Lawn","comment":"","Staff":"20","Service":"6"}}', NULL, '64', '2013-10-14 06:15:16'),
('525b8bfe-c2b8-4a76-ac81-07fc82c20753', 'EDIT', 'Job', '88', '{"Job":{"id":"88","customer_id":"72","startTime":"2013-10-16 09:15:00","endTime":"2013-10-16 10:45:00","status":"NotFinished","title":"Jim Kustin Lawn","comment":"","Staff":"20","Service":"6"}}', NULL, '64', '2013-10-14 06:15:26'),
('525b8c00-d4f0-44e9-a378-07fc82c20753', 'EDIT', 'Job', '88', '{"Job":{"id":"88","customer_id":"72","startTime":"2013-10-16 09:15:00","endTime":"2013-10-16 10:15:00","status":"NotFinished","title":"Jim Kustin Lawn","comment":"","Staff":"20","Service":"6"}}', NULL, '64', '2013-10-14 06:15:28'),
('525bd75f-a4d8-4e8a-af18-07fc82c20753', 'EDIT', 'Pagecontent', '15', '{"Pagecontent":{"id":"15","page":"trades","content":"<h1>A List of Recommended Trades<\\/h1>\\r\\n<div class=\\"col-sm-6\\">\\r\\n<h3>Electrician<\\/h3>\\r\\n<p>S &amp; D Electrical<br \\/>Call Steve: <strong>0407 541 016<\\/strong><br \\/><a href=\\"mailto:steve.mcalroy@optusnet.com.au\\">Send E-Mail<\\/a><\\/p>\\r\\n<h3>Painting<\\/h3>\\r\\n<p>Quality painting service<br \\/>Call Dave: <strong>0411 695 858<\\/strong><br \\/><a href=\\"mailto:millwood6@optusnet.com.au\\">Send E-Mail<\\/a><\\/p>\\r\\n<h3>Plumbing<\\/h3>\\r\\n<p>Garry The Plumber<br \\/>Call Garry: <strong>0418 351 112<\\/strong><\\/p>\\r\\n<h3>For all your phone and communication needs<\\/h3>\\r\\n<p>Inspired Communications<br \\/>Call Mary: <strong>0423 024 256<\\/strong><br \\/><a href=\\"mailto:mary@beinspired.com.au\\">Send E-Mail<\\/a><\\/p>\\r\\n<h3>Large Tree Work or Qualified Arborist<\\/h3>\\r\\n<p>Cd Mc Leod Pty Ltd<br \\/>Call Mark: <strong>0438 511 178<\\/strong><\\/p>\\r\\n<p>Treescape Pty Ltd<br \\/>Call Peter: <strong>0417 322 232<\\/strong><br \\/><a href=\\"mailto:peter@treescape.com.au\\">Send E-Mail<\\/a><\\/p>\\r\\n<\\/div>\\r\\n<div class=\\"col-sm-6\\">\\r\\n<h3>Mulch and Soil Supply<\\/h3>\\r\\n<p>Fulton''s Pty Ltd<br \\/>Call: <strong>9824 3041<\\/strong><\\/p>\\r\\n<h3>Large and Small Industrial Bins<\\/h3>\\r\\n<p>Combined Bulk Bins<br \\/>Call Rob: <strong>0418 120 212<\\/strong><br \\/><a href=\\"mailto:robertcroft61@hotmail.com\\">Send E-Mail<\\/a><\\/p>\\r\\n<h3>For all your travel needs<\\/h3>\\r\\n<p>Travel Managers<br \\/>Sylvia Katsiavos<br \\/><a href=\\"mailto:sylviak@travelmanagers.com.au\\">Send E-Mail<\\/a><\\/p>\\r\\n<h3>For all your air conditioning needs<\\/h3>\\r\\n<p>Luke Mc Donell<br \\/>J Belle Services <strong>0413884290<\\/strong><br \\/><a href=\\"mailto:Jbelle1@live.com.au\\">Send E-Mail<\\/a><\\/p>\\r\\n<\\/div>"}}', NULL, '64', '2013-10-14 11:37:03'),
('525bf388-e6b4-4b98-b056-07fc82c20753', 'CREATE', 'Job', '89', '{"Job":{"id":"89","customer_id":"72","startTime":"2013-10-15 09:30:00","endTime":"2013-10-15 10:00:00","status":"NotFinished","title":"IE test","comment":"","Staff":"20","Service":"8"}}', NULL, '64', '2013-10-14 13:37:12'),
('525bf3b7-e140-4838-bba3-07fc82c20753', 'CREATE', 'Job', '90', '{"Job":{"id":"90","customer_id":"72","startTime":"2013-10-15 09:15:00","endTime":"2013-10-15 09:30:00","status":"NotFinished","title":"IE test 2","comment":"","Staff":"20","Service":"5,6"}}', NULL, '64', '2013-10-14 13:37:59'),
('525bf3c2-4398-4391-8eda-07fc82c20753', 'EDIT', 'Job', '89', '{"Job":{"id":"89","customer_id":"72","startTime":"2013-10-15 11:30:00","endTime":"2013-10-15 12:00:00","status":"NotFinished","title":"IE test","comment":"","Staff":"20","Service":"8"}}', NULL, '64', '2013-10-14 13:38:10'),
('525bf3c4-66e0-4292-b00d-07fc82c20753', 'EDIT', 'Job', '89', '{"Job":{"id":"89","customer_id":"72","startTime":"2013-10-15 12:00:00","endTime":"2013-10-15 12:30:00","status":"NotFinished","title":"IE test","comment":"","Staff":"20","Service":"8"}}', NULL, '64', '2013-10-14 13:38:12'),
('525bf3c6-4c00-4849-982b-07fc82c20753', 'EDIT', 'Job', '89', '{"Job":{"id":"89","customer_id":"72","startTime":"2013-10-15 12:45:00","endTime":"2013-10-15 13:15:00","status":"NotFinished","title":"IE test","comment":"","Staff":"20","Service":"8"}}', NULL, '64', '2013-10-14 13:38:14'),
('525bf3c8-6798-4b59-8d5a-07fc82c20753', 'EDIT', 'Job', '90', '{"Job":{"id":"90","customer_id":"72","startTime":"2013-10-15 08:15:00","endTime":"2013-10-15 08:30:00","status":"NotFinished","title":"IE test 2","comment":"","Staff":"20","Service":"5,6"}}', NULL, '64', '2013-10-14 13:38:16'),
('525bf4c2-07d8-4f79-9666-07fc82c20753', 'CREATE', 'Job', '91', '{"Job":{"id":"91","customer_id":"72","startTime":"1970-01-01 00:00:00","endTime":"1970-01-01 00:00:00","status":"NotFinished","title":"IE 10 test","comment":"","Staff":"20","Service":"5"}}', NULL, '64', '2013-10-14 13:42:26'),
('525c1221-5224-4f8d-b791-07fc82c20753', 'EDIT', 'Job', '90', '{"Job":{"id":"90","customer_id":"72","startTime":"2013-10-15 08:15:00","endTime":"2013-10-15 09:00:00","status":"NotFinished","title":"IE test 2","comment":"","Staff":"20","Service":"5,6"}}', NULL, '64', '2013-10-14 15:47:45'),
('525c2092-0a20-4891-83bf-07fc82c20753', 'CREATE', 'Job', '92', '{"Job":{"id":"92","customer_id":"72","startTime":"2013-10-14 16:49:00","endTime":"2013-10-14 16:49:00","status":"NotFinished","title":"sdfg","comment":"sdg","Staff":"","Service":""}}', NULL, '64', '2013-10-14 16:49:22'),
('525c214a-d7a8-4a09-a5b6-07fc82c20753', 'CREATE', 'Job', '93', '{"Job":{"id":"93","customer_id":"72","startTime":"2013-10-14 16:49:00","endTime":"2013-10-14 16:49:00","status":"NotFinished","title":"asdfgsdfg","comment":"","Staff":"20","Service":""}}', NULL, '64', '2013-10-14 16:52:26'),
('525c219d-1a70-4a7a-a7b2-07fc82c20753', 'CREATE', 'Job', '94', '{"Job":{"id":"94","customer_id":"72","startTime":"2013-10-14 16:52:00","endTime":"2013-10-14 16:52:00","status":"Finished","title":"sdfg","comment":"","Staff":"20","Service":"8"}}', NULL, '64', '2013-10-14 16:53:49'),
('525c2237-e094-4099-ba55-07fc82c20753', 'CREATE', 'Job', '95', '{"Job":{"id":"95","customer_id":"72","startTime":"2013-10-14 16:54:00","endTime":"2013-10-14 16:54:00","status":"NotFinished","title":"asdfasdfgsdfgsdfg","comment":"","Staff":"","Service":"5,6,7,9,10"}}', NULL, '64', '2013-10-14 16:56:23'),
('525c2453-b688-4f5f-88e6-07fc82c20753', 'CREATE', 'Job', '96', '{"Job":{"id":"96","customer_id":"72","startTime":"2013-10-14 17:05:00","endTime":"2013-10-14 17:05:00","status":"Finished","title":"this test","comment":"","Staff":"20","Service":"11,13,15"}}', NULL, '64', '2013-10-14 17:05:23'),
('525c251b-4f68-40bc-897e-07fc82c20753', 'DELETE', 'Job', '94', '{"Job":{"id":"94","customer_id":"72","startTime":"2013-10-14 16:52:00","endTime":"2013-10-14 16:52:00","status":"Finished","title":"sdfg","comment":""}}', NULL, '64', '2013-10-14 17:08:43'),
('525c251f-2d98-4923-a26d-07fc82c20753', 'DELETE', 'Job', '93', '{"Job":{"id":"93","customer_id":"72","startTime":"2013-10-14 16:49:00","endTime":"2013-10-14 16:49:00","status":"NotFinished","title":"asdfgsdfg","comment":""}}', NULL, '64', '2013-10-14 17:08:47'),
('525c2522-eccc-4eab-b0f7-07fc82c20753', 'DELETE', 'Job', '96', '{"Job":{"id":"96","customer_id":"72","startTime":"2013-10-14 17:05:00","endTime":"2013-10-14 17:05:00","status":"Finished","title":"this test","comment":""}}', NULL, '64', '2013-10-14 17:08:50'),
('525c2525-70e4-4633-ad67-07fc82c20753', 'DELETE', 'Job', '95', '{"Job":{"id":"95","customer_id":"72","startTime":"2013-10-14 16:54:00","endTime":"2013-10-14 16:54:00","status":"NotFinished","title":"asdfasdfgsdfgsdfg","comment":""}}', NULL, '64', '2013-10-14 17:08:53'),
('525c2528-c21c-4ff3-b113-07fc82c20753', 'DELETE', 'Job', '92', '{"Job":{"id":"92","customer_id":"72","startTime":"2013-10-14 16:49:00","endTime":"2013-10-14 16:49:00","status":"NotFinished","title":"sdfg","comment":"sdg"}}', NULL, '64', '2013-10-14 17:08:56'),
('525c273b-ec60-4b3f-8e25-07fc82c20753', 'EDIT', 'Job', '91', '{"Job":{"id":"91","customer_id":"72","startTime":"1970-01-01 01:00:00","endTime":"1970-01-01 01:00:00","status":"Finished","title":"IE 10 test","comment":"","Staff":"20","Service":"5"}}', NULL, '64', '2013-10-14 17:17:47'),
('525c2794-71e0-47a8-96d1-07fc82c20753', 'EDIT', 'Job', '90', '{"Job":{"id":"90","customer_id":"72","startTime":"2013-10-15 08:15:00","endTime":"2013-10-15 09:00:00","status":"Finished","title":"IE test 2","comment":"","Staff":"20","Service":"5,6"}}', NULL, '64', '2013-10-14 17:19:16'),
('525c279f-dad8-47f5-ae67-07fc82c20753', 'DELETE', 'Job', '91', '{"Job":{"id":"91","customer_id":"72","startTime":"1970-01-01 01:00:00","endTime":"1970-01-01 01:00:00","status":"Finished","title":"IE 10 test","comment":""}}', NULL, '64', '2013-10-14 17:19:27'),
('525c2890-a188-4edf-8780-07fc82c20753', 'CREATE', 'Job', '97', '{"Job":{"id":"97","customer_id":"72","startTime":"1970-01-01 00:00:00","endTime":"1970-01-01 00:00:00","status":"NotFinished","title":"IE test 3","comment":"","Staff":"20","Service":"6,7"}}', NULL, '64', '2013-10-14 17:23:28'),
('525c2a2f-5508-4f07-8eb7-07fc82c20753', 'CREATE', 'Job', '98', '{"Job":{"id":"98","customer_id":"72","startTime":"1970-01-01 00:00:00","endTime":"1970-01-01 00:00:00","status":"NotFinished","title":"IE test again","comment":"","Staff":"20","Service":"5"}}', NULL, '64', '2013-10-14 17:30:23'),
('525c2a51-6fc8-433b-8319-07fc82c20753', 'CREATE', 'Job', '99', '{"Job":{"id":"99","customer_id":"72","startTime":"1970-01-01 00:00:00","endTime":"1970-01-01 00:00:00","status":"NotFinished","title":"ie teast this","comment":"","Staff":"20","Service":"5"}}', NULL, '64', '2013-10-14 17:30:57'),
('525c2ada-a928-4a6f-bb74-07fc82c20753', 'CREATE', 'Job', '100', '{"Job":{"id":"100","customer_id":"72","startTime":"2013-10-18 09:00:00","endTime":"2013-10-18 09:30:00","status":"NotFinished","title":"Ie test IE10","comment":"","Staff":"20","Service":"6"}}', NULL, '64', '2013-10-14 17:33:14'),
('525c3183-5d00-4e9f-b860-07fc82c20753', 'CREATE', 'Job', '101', '{"Job":{"id":"101","customer_id":"72","startTime":"2013-10-18 11:30:00","endTime":"2013-10-18 11:45:00","status":"NotFinished","title":"sdfg","comment":"","Staff":"20","Service":"5"}}', NULL, '64', '2013-10-14 18:01:39'),
('525ca9c6-af88-4a70-baa9-07fc82c20753', 'EDIT', 'Job', '88', '{"Job":{"id":"88","customer_id":"72","startTime":"2013-10-16 09:15:00","endTime":"2013-10-16 10:15:00","status":"Finished","title":"Jim Kustin Lawn","comment":"","Staff":"20","Service":"6"}}', NULL, '64', '2013-10-15 02:34:46'),
('525cabb5-8824-48fe-b2b1-07fc82c20753', 'CREATE', 'Job', '102', '{"Job":{"id":"102","customer_id":"72","startTime":"1970-01-01 00:00:00","endTime":"1970-01-01 00:00:00","status":"NotFinished","title":"asdf","comment":"","Staff":"20","Service":"14"}}', NULL, '64', '2013-10-15 02:43:01'),
('525cb90f-864c-44e7-b625-07fc82c20753', 'CREATE', 'User', '121', '{"User":{"id":"121","username":"c","password":"ae9a76d7c5bc3b6f60d2fc2a798a6a9ec966a004","role":"1","customer_id":"0","token_hash":"ae9a76d7c5bc3b6f60d2fc2a798a6a9ec966a004","staff_id":"0"}}', NULL, '62', '2013-10-15 03:39:59'),
('525cbfd1-d47c-4da4-aeb0-16dccc2dd690', 'DELETE', 'User', '121', '{"User":{"id":"121","username":"c","password":"ae9a76d7c5bc3b6f60d2fc2a798a6a9ec966a004","role":"1","customer_id":"0","token_hash":"ae9a76d7c5bc3b6f60d2fc2a798a6a9ec966a004","staff_id":"0"}}', NULL, '62', '2013-10-15 04:08:49'),
('52627402-4eec-495a-b673-1a98cc2dd690', 'CREATE', 'Job', '103', '{"Job":{"id":"103","customer_id":"72","startTime":"2013-10-20 18:58:00","endTime":"2013-10-19 11:58:00","status":"Finished","title":"hi","comment":"","Staff":"20","Service":"8"}}', NULL, '62', '2013-10-19 11:58:58'),
('526274b3-d9bc-4764-b2de-1a98cc2dd690', 'CREATE', 'Job', '104', '{"Job":{"id":"104","customer_id":"72","startTime":"2013-10-20 18:01:00","endTime":"2013-10-19 12:01:00","status":"Finished","title":"fghjkl;","comment":"","Staff":"20","Service":"5"}}', NULL, '62', '2013-10-19 12:01:55');

-- --------------------------------------------------------

--
-- 表的结构 `audit_deltas`
--

CREATE TABLE IF NOT EXISTS `audit_deltas` (
  `id` varchar(36) NOT NULL,
  `audit_id` varchar(36) NOT NULL,
  `property_name` varchar(255) NOT NULL,
  `old_value` text,
  `new_value` text,
  PRIMARY KEY (`id`),
  KEY `audit_id` (`audit_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `audit_deltas`
--

INSERT INTO `audit_deltas` (`id`, `audit_id`, `property_name`, `old_value`, `new_value`) VALUES
('525a9929-5834-4b28-96a3-07fc82c20753', '525a9929-88d4-47cf-ba99-07fc82c20753', 'username', NULL, 'asdf@something.com'),
('525b7e50-9a30-46cc-9897-07fc82c20753', '525b7e50-83bc-4a00-8a00-07fc82c20753', 'content', '<p><span><strong>A List of Recommended Trades</strong></span><br /><span>Electrician</span><br />S &amp; D Electrical<br />Call Steve:&nbsp;<strong>0407 541 016</strong></p>\r\n<p><a href="mailto:someone@example.com?Subject=Hello%20again" target="_top">Send E-Mail</a></p>\r\n<p><br /><br /><span>Painting</span><br />Quality painting service<br />Call Dave:&nbsp;<strong>0411 695 858</strong><br /><br /><span>Plumbing</span><br />Garry The Plumber</p>\r\n<p>Call Garry:&nbsp;<strong>0418 351 112</strong><br /><br /><span>For all your phone and communication needs</span><br />Inspired Communications<br />Call Mary:&nbsp;<strong>0423 024 256</strong><br /><br /><span>Large Tree Work or Qualified Arborist</span><br />Cd mc leod Pty Ltd<br />Call Mark:&nbsp;<strong>0438 511 178</strong><br />Treescape Pty Ltd<br />Call Peter:&nbsp;<strong>0417 322 232</strong><br /><br /><span>Mulch and Soil Supply</span><br />Fulton''s Pty Ltd<br />Call:&nbsp;<strong>9824 3041</strong><br /><br /><span>Large and Small Industrial Bins</span><br />Combined Bulk Bins<br />Call Rob:&nbsp;<strong>0418 120 212</strong></p>', '<p><span><strong>A List of Recommended Trades</strong></span></p>\r\n<p>&nbsp;</p>\r\n<p><span>Electrician</span></p>\r\n<p>&nbsp;</p>\r\n<p>S &amp; D Electrical<br />Call Steve:&nbsp;<strong>0407 541 016</strong></p>\r\n<p><a href="mailto:someone@example.com?Subject=Hello%20again" target="_top">Send E-Mail</a></p>\r\n<p>&nbsp;</p>\r\n<p><span>Painting</span></p>\r\n<p>&nbsp;</p>\r\n<p>Quality painting service<br />Call Dave:&nbsp;<strong>0411 695 858</strong><br /><br /><span>Plumbing</span><br />Garry The Plumber</p>\r\n<p>Call Garry:&nbsp;<strong>0418 351 112</strong><br /><br /><span>For all your phone and communication needs</span><br />Inspired Communications<br />Call Mary:&nbsp;<strong>0423 024 256</strong><br /><br /><span>Large Tree Work or Qualified Arborist</span><br />Cd mc leod Pty Ltd<br />Call Mark:&nbsp;<strong>0438 511 178</strong><br />Treescape Pty Ltd<br />Call Peter:&nbsp;<strong>0417 322 232</strong><br /><br /><span>Mulch and Soil Supply</span><br />Fulton''s Pty Ltd<br />Call:&nbsp;<strong>9824 3041</strong><br /><br /><span>Large and Small Industrial Bins</span><br />Combined Bulk Bins<br />Call Rob:&nbsp;<strong>0418 120 212</strong></p>\r\n<p>&nbsp;</p>\r\n<p>For all your air conditioning needs</p>\r\n<p>Luke Mc Donell</p>\r\n<p><strong>J Belle Services 0413884290</strong></p>'),
('525b7e9f-f2a0-4a61-b602-07fc82c20753', '525b7e9f-4870-49c1-a0ca-07fc82c20753', 'content', '<p><span><strong>A List of Recommended Trades</strong></span></p>\r\n<p>&nbsp;</p>\r\n<p><span>Electrician</span></p>\r\n<p>&nbsp;</p>\r\n<p>S &amp; D Electrical<br />Call Steve:&nbsp;<strong>0407 541 016</strong></p>\r\n<p><a href="mailto:someone@example.com?Subject=Hello%20again" target="_top">Send E-Mail</a></p>\r\n<p>&nbsp;</p>\r\n<p><span>Painting</span></p>\r\n<p>&nbsp;</p>\r\n<p>Quality painting service<br />Call Dave:&nbsp;<strong>0411 695 858</strong><br /><br /><span>Plumbing</span><br />Garry The Plumber</p>\r\n<p>Call Garry:&nbsp;<strong>0418 351 112</strong><br /><br /><span>For all your phone and communication needs</span><br />Inspired Communications<br />Call Mary:&nbsp;<strong>0423 024 256</strong><br /><br /><span>Large Tree Work or Qualified Arborist</span><br />Cd mc leod Pty Ltd<br />Call Mark:&nbsp;<strong>0438 511 178</strong><br />Treescape Pty Ltd<br />Call Peter:&nbsp;<strong>0417 322 232</strong><br /><br /><span>Mulch and Soil Supply</span><br />Fulton''s Pty Ltd<br />Call:&nbsp;<strong>9824 3041</strong><br /><br /><span>Large and Small Industrial Bins</span><br />Combined Bulk Bins<br />Call Rob:&nbsp;<strong>0418 120 212</strong></p>\r\n<p>&nbsp;</p>\r\n<p>For all your air conditioning needs</p>\r\n<p>Luke Mc Donell</p>\r\n<p><strong>J Belle Services 0413884290</strong></p>', '<h1>A List of Recommended Trades</h1>\r\n<p><span>Electrician</span></p>\r\n<p>&nbsp;</p>\r\n<p>S &amp; D Electrical<br />Call Steve:&nbsp;<strong>0407 541 016</strong></p>\r\n<p><a href="mailto:someone@example.com?Subject=Hello%20again" target="_top">Send E-Mail</a></p>\r\n<p>&nbsp;</p>\r\n<p><span>Painting</span></p>\r\n<p>&nbsp;</p>\r\n<p>Quality painting service<br />Call Dave:&nbsp;<strong>0411 695 858</strong><br /><br /><span>Plumbing</span><br />Garry The Plumber</p>\r\n<p>Call Garry:&nbsp;<strong>0418 351 112</strong><br /><br /><span>For all your phone and communication needs</span><br />Inspired Communications<br />Call Mary:&nbsp;<strong>0423 024 256</strong><br /><br /><span>Large Tree Work or Qualified Arborist</span><br />Cd mc leod Pty Ltd<br />Call Mark:&nbsp;<strong>0438 511 178</strong><br />Treescape Pty Ltd<br />Call Peter:&nbsp;<strong>0417 322 232</strong><br /><br /><span>Mulch and Soil Supply</span><br />Fulton''s Pty Ltd<br />Call:&nbsp;<strong>9824 3041</strong><br /><br /><span>Large and Small Industrial Bins</span><br />Combined Bulk Bins<br />Call Rob:&nbsp;<strong>0418 120 212</strong></p>\r\n<p>&nbsp;</p>\r\n<p>For all your air conditioning needs</p>\r\n<p>Luke Mc Donell</p>\r\n<p><strong>J Belle Services 0413884290</strong></p>'),
('525b7ebd-1f68-4327-84fd-07fc82c20753', '525b7ebd-c6cc-4c53-9f19-07fc82c20753', 'content', '<h1>A List of Recommended Trades</h1>\r\n<p><span>Electrician</span></p>\r\n<p>&nbsp;</p>\r\n<p>S &amp; D Electrical<br />Call Steve:&nbsp;<strong>0407 541 016</strong></p>\r\n<p><a href="mailto:someone@example.com?Subject=Hello%20again" target="_top">Send E-Mail</a></p>\r\n<p>&nbsp;</p>\r\n<p><span>Painting</span></p>\r\n<p>&nbsp;</p>\r\n<p>Quality painting service<br />Call Dave:&nbsp;<strong>0411 695 858</strong><br /><br /><span>Plumbing</span><br />Garry The Plumber</p>\r\n<p>Call Garry:&nbsp;<strong>0418 351 112</strong><br /><br /><span>For all your phone and communication needs</span><br />Inspired Communications<br />Call Mary:&nbsp;<strong>0423 024 256</strong><br /><br /><span>Large Tree Work or Qualified Arborist</span><br />Cd mc leod Pty Ltd<br />Call Mark:&nbsp;<strong>0438 511 178</strong><br />Treescape Pty Ltd<br />Call Peter:&nbsp;<strong>0417 322 232</strong><br /><br /><span>Mulch and Soil Supply</span><br />Fulton''s Pty Ltd<br />Call:&nbsp;<strong>9824 3041</strong><br /><br /><span>Large and Small Industrial Bins</span><br />Combined Bulk Bins<br />Call Rob:&nbsp;<strong>0418 120 212</strong></p>\r\n<p>&nbsp;</p>\r\n<p>For all your air conditioning needs</p>\r\n<p>Luke Mc Donell</p>\r\n<p><strong>J Belle Services 0413884290</strong></p>', '<h1>A List of Recommended Trades</h1>\r\n<h3>Electrician</h3>\r\n<p>&nbsp;</p>\r\n<p>S &amp; D Electrical<br />Call Steve:&nbsp;<strong>0407 541 016</strong></p>\r\n<p><a href="mailto:someone@example.com?Subject=Hello%20again" target="_top">Send E-Mail</a></p>\r\n<p>&nbsp;</p>\r\n<p><span>Painting</span></p>\r\n<p>&nbsp;</p>\r\n<p>Quality painting service<br />Call Dave:&nbsp;<strong>0411 695 858</strong><br /><br /><span>Plumbing</span><br />Garry The Plumber</p>\r\n<p>Call Garry:&nbsp;<strong>0418 351 112</strong><br /><br /><span>For all your phone and communication needs</span><br />Inspired Communications<br />Call Mary:&nbsp;<strong>0423 024 256</strong><br /><br /><span>Large Tree Work or Qualified Arborist</span><br />Cd mc leod Pty Ltd<br />Call Mark:&nbsp;<strong>0438 511 178</strong><br />Treescape Pty Ltd<br />Call Peter:&nbsp;<strong>0417 322 232</strong><br /><br /><span>Mulch and Soil Supply</span><br />Fulton''s Pty Ltd<br />Call:&nbsp;<strong>9824 3041</strong><br /><br /><span>Large and Small Industrial Bins</span><br />Combined Bulk Bins<br />Call Rob:&nbsp;<strong>0418 120 212</strong></p>\r\n<p>&nbsp;</p>\r\n<p>For all your air conditioning needs</p>\r\n<p>Luke Mc Donell</p>\r\n<p><strong>J Belle Services 0413884290</strong></p>'),
('525b7f0a-b20c-4720-aaa3-07fc82c20753', '525b7f0a-ce70-4244-8869-07fc82c20753', 'content', '<h1>A List of Recommended Trades</h1>\r\n<h3>Electrician</h3>\r\n<p>&nbsp;</p>\r\n<p>S &amp; D Electrical<br />Call Steve:&nbsp;<strong>0407 541 016</strong></p>\r\n<p><a href="mailto:someone@example.com?Subject=Hello%20again" target="_top">Send E-Mail</a></p>\r\n<p>&nbsp;</p>\r\n<p><span>Painting</span></p>\r\n<p>&nbsp;</p>\r\n<p>Quality painting service<br />Call Dave:&nbsp;<strong>0411 695 858</strong><br /><br /><span>Plumbing</span><br />Garry The Plumber</p>\r\n<p>Call Garry:&nbsp;<strong>0418 351 112</strong><br /><br /><span>For all your phone and communication needs</span><br />Inspired Communications<br />Call Mary:&nbsp;<strong>0423 024 256</strong><br /><br /><span>Large Tree Work or Qualified Arborist</span><br />Cd mc leod Pty Ltd<br />Call Mark:&nbsp;<strong>0438 511 178</strong><br />Treescape Pty Ltd<br />Call Peter:&nbsp;<strong>0417 322 232</strong><br /><br /><span>Mulch and Soil Supply</span><br />Fulton''s Pty Ltd<br />Call:&nbsp;<strong>9824 3041</strong><br /><br /><span>Large and Small Industrial Bins</span><br />Combined Bulk Bins<br />Call Rob:&nbsp;<strong>0418 120 212</strong></p>\r\n<p>&nbsp;</p>\r\n<p>For all your air conditioning needs</p>\r\n<p>Luke Mc Donell</p>\r\n<p><strong>J Belle Services 0413884290</strong></p>', '<h1>A List of Recommended Trades</h1>\r\n<h3>Electrician</h3>\r\n<p>S &amp; D Electrical<br />Call Steve:&nbsp;<strong>0407 541 016</strong></p>\r\n<p><a href="mailto:steve.mcalroy@optusnet.com.au">Send E-Mail</a></p>\r\n<p>&nbsp;</p>\r\n<p><span>Painting</span></p>\r\n<p>&nbsp;</p>\r\n<p>Quality painting service<br />Call Dave:&nbsp;<strong>0411 695 858</strong><br /><br /><span>Plumbing</span><br />Garry The Plumber</p>\r\n<p>Call Garry:&nbsp;<strong>0418 351 112</strong><br /><br /><span>For all your phone and communication needs</span><br />Inspired Communications<br />Call Mary:&nbsp;<strong>0423 024 256</strong><br /><br /><span>Large Tree Work or Qualified Arborist</span><br />Cd mc leod Pty Ltd<br />Call Mark:&nbsp;<strong>0438 511 178</strong><br />Treescape Pty Ltd<br />Call Peter:&nbsp;<strong>0417 322 232</strong><br /><br /><span>Mulch and Soil Supply</span><br />Fulton''s Pty Ltd<br />Call:&nbsp;<strong>9824 3041</strong><br /><br /><span>Large and Small Industrial Bins</span><br />Combined Bulk Bins<br />Call Rob:&nbsp;<strong>0418 120 212</strong></p>\r\n<p>&nbsp;</p>\r\n<p>For all your air conditioning needs</p>\r\n<p>Luke Mc Donell</p>\r\n<p><strong>J Belle Services 0413884290</strong></p>'),
('525b7f48-8cf0-4b58-9f8b-07fc82c20753', '525b7f48-47ac-41c4-a8bf-07fc82c20753', 'content', '<h1>A List of Recommended Trades</h1>\r\n<h3>Electrician</h3>\r\n<p>S &amp; D Electrical<br />Call Steve:&nbsp;<strong>0407 541 016</strong></p>\r\n<p><a href="mailto:steve.mcalroy@optusnet.com.au">Send E-Mail</a></p>\r\n<p>&nbsp;</p>\r\n<p><span>Painting</span></p>\r\n<p>&nbsp;</p>\r\n<p>Quality painting service<br />Call Dave:&nbsp;<strong>0411 695 858</strong><br /><br /><span>Plumbing</span><br />Garry The Plumber</p>\r\n<p>Call Garry:&nbsp;<strong>0418 351 112</strong><br /><br /><span>For all your phone and communication needs</span><br />Inspired Communications<br />Call Mary:&nbsp;<strong>0423 024 256</strong><br /><br /><span>Large Tree Work or Qualified Arborist</span><br />Cd mc leod Pty Ltd<br />Call Mark:&nbsp;<strong>0438 511 178</strong><br />Treescape Pty Ltd<br />Call Peter:&nbsp;<strong>0417 322 232</strong><br /><br /><span>Mulch and Soil Supply</span><br />Fulton''s Pty Ltd<br />Call:&nbsp;<strong>9824 3041</strong><br /><br /><span>Large and Small Industrial Bins</span><br />Combined Bulk Bins<br />Call Rob:&nbsp;<strong>0418 120 212</strong></p>\r\n<p>&nbsp;</p>\r\n<p>For all your air conditioning needs</p>\r\n<p>Luke Mc Donell</p>\r\n<p><strong>J Belle Services 0413884290</strong></p>', '<h1>A List of Recommended Trades</h1>\r\n<h3>Electrician</h3>\r\n<p>S &amp; D Electrical</p>\r\n<p>Call Steve: <strong>0407 541 016</strong></p>\r\n<p><a href="mailto:steve.mcalroy@optusnet.com.au">Send E-Mail</a></p>\r\n<p>&nbsp;</p>\r\n<p><span>Painting</span></p>\r\n<p>&nbsp;</p>\r\n<p>Quality painting service<br />Call Dave:&nbsp;<strong>0411 695 858</strong><br /><br /><span>Plumbing</span><br />Garry The Plumber</p>\r\n<p>Call Garry:&nbsp;<strong>0418 351 112</strong><br /><br /><span>For all your phone and communication needs</span><br />Inspired Communications<br />Call Mary:&nbsp;<strong>0423 024 256</strong><br /><br /><span>Large Tree Work or Qualified Arborist</span><br />Cd mc leod Pty Ltd<br />Call Mark:&nbsp;<strong>0438 511 178</strong><br />Treescape Pty Ltd<br />Call Peter:&nbsp;<strong>0417 322 232</strong><br /><br /><span>Mulch and Soil Supply</span><br />Fulton''s Pty Ltd<br />Call:&nbsp;<strong>9824 3041</strong><br /><br /><span>Large and Small Industrial Bins</span><br />Combined Bulk Bins<br />Call Rob:&nbsp;<strong>0418 120 212</strong></p>\r\n<p>&nbsp;</p>\r\n<p>For all your air conditioning needs</p>\r\n<p>Luke Mc Donell</p>\r\n<p><strong>J Belle Services 0413884290</strong></p>'),
('525b7fbe-4880-4971-83d6-07fc82c20753', '525b7fbe-83f8-464b-901f-07fc82c20753', 'content', '<h1>A List of Recommended Trades</h1>\r\n<h3>Electrician</h3>\r\n<p>S &amp; D Electrical</p>\r\n<p>Call Steve: <strong>0407 541 016</strong></p>\r\n<p><a href="mailto:steve.mcalroy@optusnet.com.au">Send E-Mail</a></p>\r\n<p>&nbsp;</p>\r\n<p><span>Painting</span></p>\r\n<p>&nbsp;</p>\r\n<p>Quality painting service<br />Call Dave:&nbsp;<strong>0411 695 858</strong><br /><br /><span>Plumbing</span><br />Garry The Plumber</p>\r\n<p>Call Garry:&nbsp;<strong>0418 351 112</strong><br /><br /><span>For all your phone and communication needs</span><br />Inspired Communications<br />Call Mary:&nbsp;<strong>0423 024 256</strong><br /><br /><span>Large Tree Work or Qualified Arborist</span><br />Cd mc leod Pty Ltd<br />Call Mark:&nbsp;<strong>0438 511 178</strong><br />Treescape Pty Ltd<br />Call Peter:&nbsp;<strong>0417 322 232</strong><br /><br /><span>Mulch and Soil Supply</span><br />Fulton''s Pty Ltd<br />Call:&nbsp;<strong>9824 3041</strong><br /><br /><span>Large and Small Industrial Bins</span><br />Combined Bulk Bins<br />Call Rob:&nbsp;<strong>0418 120 212</strong></p>\r\n<p>&nbsp;</p>\r\n<p>For all your air conditioning needs</p>\r\n<p>Luke Mc Donell</p>\r\n<p><strong>J Belle Services 0413884290</strong></p>', '<h1>A List of Recommended Trades</h1>\r\n<h3>Electrician</h3>\r\n<p>S &amp; D Electrical<br />Call Steve: <strong>0407 541 016</strong><br /> <a href="mailto:steve.mcalroy@optusnet.com.au">Send E-Mail</a></p>\r\n<h3>Painting</h3>\r\n<p>Quality painting service<br />Call Dave:<strong>0411 695 858</strong><br /><br /><span>Plumbing</span><br />Garry The Plumber</p>\r\n<p>Call Garry:&nbsp;<strong>0418 351 112</strong><br /><br /><span>For all your phone and communication needs</span><br />Inspired Communications<br />Call Mary:&nbsp;<strong>0423 024 256</strong><br /><br /><span>Large Tree Work or Qualified Arborist</span><br />Cd mc leod Pty Ltd<br />Call Mark:&nbsp;<strong>0438 511 178</strong><br />Treescape Pty Ltd<br />Call Peter:&nbsp;<strong>0417 322 232</strong><br /><br /><span>Mulch and Soil Supply</span><br />Fulton''s Pty Ltd<br />Call:&nbsp;<strong>9824 3041</strong><br /><br /><span>Large and Small Industrial Bins</span><br />Combined Bulk Bins<br />Call Rob:&nbsp;<strong>0418 120 212</strong></p>\r\n<p>&nbsp;</p>\r\n<p>For all your air conditioning needs</p>\r\n<p>Luke Mc Donell</p>\r\n<p><strong>J Belle Services 0413884290</strong></p>'),
('525b81b0-9634-4744-a09a-07fc82c20753', '525b81b0-4200-44ad-b162-07fc82c20753', 'content', '<h1>A List of Recommended Trades</h1>\r\n<h3>Electrician</h3>\r\n<p>S &amp; D Electrical<br />Call Steve: <strong>0407 541 016</strong><br /> <a href="mailto:steve.mcalroy@optusnet.com.au">Send E-Mail</a></p>\r\n<h3>Painting</h3>\r\n<p>Quality painting service<br />Call Dave:<strong>0411 695 858</strong><br /><br /><span>Plumbing</span><br />Garry The Plumber</p>\r\n<p>Call Garry:&nbsp;<strong>0418 351 112</strong><br /><br /><span>For all your phone and communication needs</span><br />Inspired Communications<br />Call Mary:&nbsp;<strong>0423 024 256</strong><br /><br /><span>Large Tree Work or Qualified Arborist</span><br />Cd mc leod Pty Ltd<br />Call Mark:&nbsp;<strong>0438 511 178</strong><br />Treescape Pty Ltd<br />Call Peter:&nbsp;<strong>0417 322 232</strong><br /><br /><span>Mulch and Soil Supply</span><br />Fulton''s Pty Ltd<br />Call:&nbsp;<strong>9824 3041</strong><br /><br /><span>Large and Small Industrial Bins</span><br />Combined Bulk Bins<br />Call Rob:&nbsp;<strong>0418 120 212</strong></p>\r\n<p>&nbsp;</p>\r\n<p>For all your air conditioning needs</p>\r\n<p>Luke Mc Donell</p>\r\n<p><strong>J Belle Services 0413884290</strong></p>', '<h1>A List of Recommended Trades</h1>\r\n<h3>Electrician</h3>\r\n<p>S &amp; D Electrical<br />Call Steve: <strong>0407 541 016</strong><br /><a href="mailto:steve.mcalroy@optusnet.com.au">Send E-Mail</a></p>\r\n<h3>Painting</h3>\r\n<p>Quality painting service<br />Call Dave:<strong>0411 695 858</strong><br /><a href="mailto:millwood6@optusnet.com.au">Send E-Mail</a></p>\r\n<h3>Plumbing</h3>\r\n<p>Garry The Plumber</p>\r\n<p>Call Garry:<strong>0418 351 112</strong></p>\r\n<h3>For all your phone and communication needs</h3>\r\n<p>Inspired Communications<br />Call Mary:<strong>0423 024 256</strong><br /><a href="mailto:mary@beinspired.com.au">Send E-Mail</a></p>\r\n<h3>Large Tree Work or Qualified Arborist</h3>\r\n<p>Cd mc leod Pty Ltd<br />Call Mark:<strong>0438 511 178</strong></p>\r\n<p>Treescape Pty Ltd<br />Call Peter:<strong>0417 322 232</strong><br /><br /><span>Mulch and Soil Supply</span><br />Fulton''s Pty Ltd<br />Call:&nbsp;<strong>9824 3041</strong><br /><br /><span>Large and Small Industrial Bins</span><br />Combined Bulk Bins<br />Call Rob:&nbsp;<strong>0418 120 212</strong></p>\r\n<p>&nbsp;</p>\r\n<p>For all your air conditioning needs</p>\r\n<p>Luke Mc Donell</p>\r\n<p><strong>J Belle Services 0413884290</strong></p>'),
('525b82a9-bb4c-46b0-b514-07fc82c20753', '525b82a9-cb88-41c3-80a8-07fc82c20753', 'content', '<h1>A List of Recommended Trades</h1>\r\n<h3>Electrician</h3>\r\n<p>S &amp; D Electrical<br />Call Steve: <strong>0407 541 016</strong><br /><a href="mailto:steve.mcalroy@optusnet.com.au">Send E-Mail</a></p>\r\n<h3>Painting</h3>\r\n<p>Quality painting service<br />Call Dave:<strong>0411 695 858</strong><br /><a href="mailto:millwood6@optusnet.com.au">Send E-Mail</a></p>\r\n<h3>Plumbing</h3>\r\n<p>Garry The Plumber</p>\r\n<p>Call Garry:<strong>0418 351 112</strong></p>\r\n<h3>For all your phone and communication needs</h3>\r\n<p>Inspired Communications<br />Call Mary:<strong>0423 024 256</strong><br /><a href="mailto:mary@beinspired.com.au">Send E-Mail</a></p>\r\n<h3>Large Tree Work or Qualified Arborist</h3>\r\n<p>Cd mc leod Pty Ltd<br />Call Mark:<strong>0438 511 178</strong></p>\r\n<p>Treescape Pty Ltd<br />Call Peter:<strong>0417 322 232</strong><br /><br /><span>Mulch and Soil Supply</span><br />Fulton''s Pty Ltd<br />Call:&nbsp;<strong>9824 3041</strong><br /><br /><span>Large and Small Industrial Bins</span><br />Combined Bulk Bins<br />Call Rob:&nbsp;<strong>0418 120 212</strong></p>\r\n<p>&nbsp;</p>\r\n<p>For all your air conditioning needs</p>\r\n<p>Luke Mc Donell</p>\r\n<p><strong>J Belle Services 0413884290</strong></p>', '<h1>A List of Recommended Trades</h1>\r\n<h3>Electrician</h3>\r\n<p>S &amp; D Electrical<br />Call Steve: <strong>0407 541 016</strong><br /><a href="mailto:steve.mcalroy@optusnet.com.au">Send E-Mail</a></p>\r\n<h3>Painting</h3>\r\n<p>Quality painting service<br />Call Dave:<strong>0411 695 858</strong><br /><a href="mailto:millwood6@optusnet.com.au">Send E-Mail</a></p>\r\n<h3>Plumbing</h3>\r\n<p>Garry The Plumber</p>\r\n<p>Call Garry:<strong>0418 351 112</strong></p>\r\n<h3>For all your phone and communication needs</h3>\r\n<p>Inspired Communications<br />Call Mary:<strong>0423 024 256</strong><br /><a href="mailto:mary@beinspired.com.au">Send E-Mail</a></p>\r\n<h3>Large Tree Work or Qualified Arborist</h3>\r\n<p>Cd mc leod Pty Ltd<br />Call Mark:<strong>0438 511 178</strong></p>\r\n<p>Treescape Pty Ltd<br />Call Peter:<strong>0417 322 232</strong><a href="mailto:peter@treescape.com.au">Send E-Mail</a></p>\r\n<h3>Mulch and Soil Supply</h3>\r\n<p>Fulton''s Pty Ltd<br />Call:<strong>9824 3041</strong></p>\r\n<p><span>Large and Small Industrial Bins</span><br />Combined Bulk Bins<br />Call Rob:&nbsp;<strong>0418 120 212</strong></p>\r\n<p>&nbsp;</p>\r\n<p>For all your air conditioning needs</p>\r\n<p>Luke Mc Donell</p>\r\n<p><strong>J Belle Services 0413884290</strong></p>'),
('525b84c6-7d34-4414-9b85-07fc82c20753', '525b84c6-0e70-4d4b-80f2-07fc82c20753', 'content', '<h1>A List of Recommended Trades</h1>\r\n<h3>Electrician</h3>\r\n<p>S &amp; D Electrical<br />Call Steve: <strong>0407 541 016</strong><br /><a href="mailto:steve.mcalroy@optusnet.com.au">Send E-Mail</a></p>\r\n<h3>Painting</h3>\r\n<p>Quality painting service<br />Call Dave:<strong>0411 695 858</strong><br /><a href="mailto:millwood6@optusnet.com.au">Send E-Mail</a></p>\r\n<h3>Plumbing</h3>\r\n<p>Garry The Plumber</p>\r\n<p>Call Garry:<strong>0418 351 112</strong></p>\r\n<h3>For all your phone and communication needs</h3>\r\n<p>Inspired Communications<br />Call Mary:<strong>0423 024 256</strong><br /><a href="mailto:mary@beinspired.com.au">Send E-Mail</a></p>\r\n<h3>Large Tree Work or Qualified Arborist</h3>\r\n<p>Cd mc leod Pty Ltd<br />Call Mark:<strong>0438 511 178</strong></p>\r\n<p>Treescape Pty Ltd<br />Call Peter:<strong>0417 322 232</strong><a href="mailto:peter@treescape.com.au">Send E-Mail</a></p>\r\n<h3>Mulch and Soil Supply</h3>\r\n<p>Fulton''s Pty Ltd<br />Call:<strong>9824 3041</strong></p>\r\n<p><span>Large and Small Industrial Bins</span><br />Combined Bulk Bins<br />Call Rob:&nbsp;<strong>0418 120 212</strong></p>\r\n<p>&nbsp;</p>\r\n<p>For all your air conditioning needs</p>\r\n<p>Luke Mc Donell</p>\r\n<p><strong>J Belle Services 0413884290</strong></p>', '<h1>A List of Recommended Trades</h1>\r\n<h3>Electrician</h3>\r\n<p>S &amp; D Electrical<br />Call Steve: <strong>0407 541 016</strong><br /><a href="mailto:steve.mcalroy@optusnet.com.au">Send E-Mail</a></p>\r\n<h3>Painting</h3>\r\n<p>Quality painting service<br />Call Dave: <strong>0411 695 858</strong><br /><a href="mailto:millwood6@optusnet.com.au">Send E-Mail</a></p>\r\n<h3>Plumbing</h3>\r\n<p>Garry The Plumber</p>\r\n<p>Call Garry: <strong>0418 351 112</strong></p>\r\n<h3>For all your phone and communication needs</h3>\r\n<p>Inspired Communications<br />Call Mary: <strong>0423 024 256</strong><br /><a href="mailto:mary@beinspired.com.au">Send E-Mail</a></p>\r\n<h3>Large Tree Work or Qualified Arborist</h3>\r\n<p>Cd mc leod Pty Ltd<br />Call Mark: <strong>0438 511 178</strong></p>\r\n<p>&nbsp;</p>\r\n<p>Treescape Pty Ltd<br />Call Peter: <strong>0417 322 232</strong><br /><a href="mailto:peter@treescape.com.au">Send E-Mail</a></p>\r\n<h3>Mulch and Soil Supply</h3>\r\n<p>Fulton''s Pty Ltd<br />Call: <strong>9824 3041</strong></p>\r\n<h3>Large and Small Industrial Bins</h3>\r\n<p>Combined Bulk Bins<br />Call Rob: <strong>0418 120 212</strong><br /><a href="mailto:robertcroft61@hotmail.com">Send E-Mail</a></p>\r\n<h3>For all your travel needs</h3>\r\n<p>Travel Managers<br />Sylvia Katsiavos<br /><a href="mailto:sylviak@travelmanagers.com.au">Send E-Mail</a></p>\r\n<h3>For all your air conditioning needs</h3>\r\n<p>Luke Mc Donell</p>\r\n<p>J Belle Services <strong>0413884290</strong><br /><a href="mailto:Jbelle1@live.com.au">Send E-Mail</a></p>'),
('525b850e-c248-4f37-87c5-07fc82c20753', '525b850e-3974-40fd-ba4e-07fc82c20753', 'content', '<h1>A List of Recommended Trades</h1>\r\n<h3>Electrician</h3>\r\n<p>S &amp; D Electrical<br />Call Steve: <strong>0407 541 016</strong><br /><a href="mailto:steve.mcalroy@optusnet.com.au">Send E-Mail</a></p>\r\n<h3>Painting</h3>\r\n<p>Quality painting service<br />Call Dave: <strong>0411 695 858</strong><br /><a href="mailto:millwood6@optusnet.com.au">Send E-Mail</a></p>\r\n<h3>Plumbing</h3>\r\n<p>Garry The Plumber</p>\r\n<p>Call Garry: <strong>0418 351 112</strong></p>\r\n<h3>For all your phone and communication needs</h3>\r\n<p>Inspired Communications<br />Call Mary: <strong>0423 024 256</strong><br /><a href="mailto:mary@beinspired.com.au">Send E-Mail</a></p>\r\n<h3>Large Tree Work or Qualified Arborist</h3>\r\n<p>Cd mc leod Pty Ltd<br />Call Mark: <strong>0438 511 178</strong></p>\r\n<p>&nbsp;</p>\r\n<p>Treescape Pty Ltd<br />Call Peter: <strong>0417 322 232</strong><br /><a href="mailto:peter@treescape.com.au">Send E-Mail</a></p>\r\n<h3>Mulch and Soil Supply</h3>\r\n<p>Fulton''s Pty Ltd<br />Call: <strong>9824 3041</strong></p>\r\n<h3>Large and Small Industrial Bins</h3>\r\n<p>Combined Bulk Bins<br />Call Rob: <strong>0418 120 212</strong><br /><a href="mailto:robertcroft61@hotmail.com">Send E-Mail</a></p>\r\n<h3>For all your travel needs</h3>\r\n<p>Travel Managers<br />Sylvia Katsiavos<br /><a href="mailto:sylviak@travelmanagers.com.au">Send E-Mail</a></p>\r\n<h3>For all your air conditioning needs</h3>\r\n<p>Luke Mc Donell</p>\r\n<p>J Belle Services <strong>0413884290</strong><br /><a href="mailto:Jbelle1@live.com.au">Send E-Mail</a></p>', '<h1>A List of Recommended Trades</h1>\r\n<h3>Electrician</h3>\r\n<p>S &amp; D Electrical<br />Call Steve: <strong>0407 541 016</strong><br /><a href="mailto:steve.mcalroy@optusnet.com.au">Send E-Mail</a></p>\r\n<h3>Painting</h3>\r\n<p>Quality painting service<br />Call Dave: <strong>0411 695 858</strong><br /><a href="mailto:millwood6@optusnet.com.au">Send E-Mail</a></p>\r\n<h3>Plumbing</h3>\r\n<p>Garry The Plumber<br />Call Garry: <strong>0418 351 112</strong></p>\r\n<h3>For all your phone and communication needs</h3>\r\n<p>Inspired Communications<br />Call Mary: <strong>0423 024 256</strong><br /><a href="mailto:mary@beinspired.com.au">Send E-Mail</a></p>\r\n<h3>Large Tree Work or Qualified Arborist</h3>\r\n<p>Cd mc leod Pty Ltd<br />Call Mark: <strong>0438 511 178</strong></p>\r\n<p>&nbsp;</p>\r\n<p>Treescape Pty Ltd<br />Call Peter: <strong>0417 322 232</strong><br /><a href="mailto:peter@treescape.com.au">Send E-Mail</a></p>\r\n<h3>Mulch and Soil Supply</h3>\r\n<p>Fulton''s Pty Ltd<br />Call: <strong>9824 3041</strong></p>\r\n<h3>Large and Small Industrial Bins</h3>\r\n<p>Combined Bulk Bins<br />Call Rob: <strong>0418 120 212</strong><br /><a href="mailto:robertcroft61@hotmail.com">Send E-Mail</a></p>\r\n<h3>For all your travel needs</h3>\r\n<p>Travel Managers<br />Sylvia Katsiavos<br /><a href="mailto:sylviak@travelmanagers.com.au">Send E-Mail</a></p>\r\n<h3>For all your air conditioning needs</h3>\r\n<p>Luke Mc Donell<br />J Belle Services <strong>0413884290</strong><br /><a href="mailto:Jbelle1@live.com.au">Send E-Mail</a></p>'),
('525b856b-0aa8-471d-9219-07fc82c20753', '525b856b-77fc-413c-aaed-07fc82c20753', 'content', '<h1>A List of Recommended Trades</h1>\r\n<h3>Electrician</h3>\r\n<p>S &amp; D Electrical<br />Call Steve: <strong>0407 541 016</strong><br /><a href="mailto:steve.mcalroy@optusnet.com.au">Send E-Mail</a></p>\r\n<h3>Painting</h3>\r\n<p>Quality painting service<br />Call Dave: <strong>0411 695 858</strong><br /><a href="mailto:millwood6@optusnet.com.au">Send E-Mail</a></p>\r\n<h3>Plumbing</h3>\r\n<p>Garry The Plumber<br />Call Garry: <strong>0418 351 112</strong></p>\r\n<h3>For all your phone and communication needs</h3>\r\n<p>Inspired Communications<br />Call Mary: <strong>0423 024 256</strong><br /><a href="mailto:mary@beinspired.com.au">Send E-Mail</a></p>\r\n<h3>Large Tree Work or Qualified Arborist</h3>\r\n<p>Cd mc leod Pty Ltd<br />Call Mark: <strong>0438 511 178</strong></p>\r\n<p>&nbsp;</p>\r\n<p>Treescape Pty Ltd<br />Call Peter: <strong>0417 322 232</strong><br /><a href="mailto:peter@treescape.com.au">Send E-Mail</a></p>\r\n<h3>Mulch and Soil Supply</h3>\r\n<p>Fulton''s Pty Ltd<br />Call: <strong>9824 3041</strong></p>\r\n<h3>Large and Small Industrial Bins</h3>\r\n<p>Combined Bulk Bins<br />Call Rob: <strong>0418 120 212</strong><br /><a href="mailto:robertcroft61@hotmail.com">Send E-Mail</a></p>\r\n<h3>For all your travel needs</h3>\r\n<p>Travel Managers<br />Sylvia Katsiavos<br /><a href="mailto:sylviak@travelmanagers.com.au">Send E-Mail</a></p>\r\n<h3>For all your air conditioning needs</h3>\r\n<p>Luke Mc Donell<br />J Belle Services <strong>0413884290</strong><br /><a href="mailto:Jbelle1@live.com.au">Send E-Mail</a></p>', '<h1>A List of Recommended Trades</h1>\r\n<div class="col-sm-12">\r\n<h3>Electrician</h3>\r\n<p>S &amp; D Electrical<br />Call Steve: <strong>0407 541 016</strong><br /><a href="mailto:steve.mcalroy@optusnet.com.au">Send E-Mail</a></p>\r\n<h3>Painting</h3>\r\n<p>Quality painting service<br />Call Dave: <strong>0411 695 858</strong><br /><a href="mailto:millwood6@optusnet.com.au">Send E-Mail</a></p>\r\n<h3>Plumbing</h3>\r\n<p>Garry The Plumber<br />Call Garry: <strong>0418 351 112</strong></p>\r\n<h3>For all your phone and communication needs</h3>\r\n<p>Inspired Communications<br />Call Mary: <strong>0423 024 256</strong><br /><a href="mailto:mary@beinspired.com.au">Send E-Mail</a></p>\r\n<h3>Large Tree Work or Qualified Arborist</h3>\r\n<p>Cd mc leod Pty Ltd<br />Call Mark: <strong>0438 511 178</strong></p>\r\n<p>&nbsp;</p>\r\n<p>Treescape Pty Ltd<br />Call Peter: <strong>0417 322 232</strong><br /><a href="mailto:peter@treescape.com.au">Send E-Mail</a></p>\r\n</div>\r\n<div class="col-sm-12">\r\n<h3>Mulch and Soil Supply</h3>\r\n<p>Fulton''s Pty Ltd<br />Call: <strong>9824 3041</strong></p>\r\n<h3>Large and Small Industrial Bins</h3>\r\n<p>Combined Bulk Bins<br />Call Rob: <strong>0418 120 212</strong><br /><a href="mailto:robertcroft61@hotmail.com">Send E-Mail</a></p>\r\n<h3>For all your travel needs</h3>\r\n<p>Travel Managers<br />Sylvia Katsiavos<br /><a href="mailto:sylviak@travelmanagers.com.au">Send E-Mail</a></p>\r\n<h3>For all your air conditioning needs</h3>\r\n<p>Luke Mc Donell<br />J Belle Services <strong>0413884290</strong><br /><a href="mailto:Jbelle1@live.com.au">Send E-Mail</a></p>\r\n</div>'),
('525b8584-5db0-4326-8846-07fc82c20753', '525b8584-1c18-440f-9c51-07fc82c20753', 'content', '<h1>A List of Recommended Trades</h1>\r\n<div class="col-sm-12">\r\n<h3>Electrician</h3>\r\n<p>S &amp; D Electrical<br />Call Steve: <strong>0407 541 016</strong><br /><a href="mailto:steve.mcalroy@optusnet.com.au">Send E-Mail</a></p>\r\n<h3>Painting</h3>\r\n<p>Quality painting service<br />Call Dave: <strong>0411 695 858</strong><br /><a href="mailto:millwood6@optusnet.com.au">Send E-Mail</a></p>\r\n<h3>Plumbing</h3>\r\n<p>Garry The Plumber<br />Call Garry: <strong>0418 351 112</strong></p>\r\n<h3>For all your phone and communication needs</h3>\r\n<p>Inspired Communications<br />Call Mary: <strong>0423 024 256</strong><br /><a href="mailto:mary@beinspired.com.au">Send E-Mail</a></p>\r\n<h3>Large Tree Work or Qualified Arborist</h3>\r\n<p>Cd mc leod Pty Ltd<br />Call Mark: <strong>0438 511 178</strong></p>\r\n<p>&nbsp;</p>\r\n<p>Treescape Pty Ltd<br />Call Peter: <strong>0417 322 232</strong><br /><a href="mailto:peter@treescape.com.au">Send E-Mail</a></p>\r\n</div>\r\n<div class="col-sm-12">\r\n<h3>Mulch and Soil Supply</h3>\r\n<p>Fulton''s Pty Ltd<br />Call: <strong>9824 3041</strong></p>\r\n<h3>Large and Small Industrial Bins</h3>\r\n<p>Combined Bulk Bins<br />Call Rob: <strong>0418 120 212</strong><br /><a href="mailto:robertcroft61@hotmail.com">Send E-Mail</a></p>\r\n<h3>For all your travel needs</h3>\r\n<p>Travel Managers<br />Sylvia Katsiavos<br /><a href="mailto:sylviak@travelmanagers.com.au">Send E-Mail</a></p>\r\n<h3>For all your air conditioning needs</h3>\r\n<p>Luke Mc Donell<br />J Belle Services <strong>0413884290</strong><br /><a href="mailto:Jbelle1@live.com.au">Send E-Mail</a></p>\r\n</div>', '<h1>A List of Recommended Trades</h1>\r\n<div class="col-sm-6">\r\n<h3>Electrician</h3>\r\n<p>S &amp; D Electrical<br />Call Steve: <strong>0407 541 016</strong><br /><a href="mailto:steve.mcalroy@optusnet.com.au">Send E-Mail</a></p>\r\n<h3>Painting</h3>\r\n<p>Quality painting service<br />Call Dave: <strong>0411 695 858</strong><br /><a href="mailto:millwood6@optusnet.com.au">Send E-Mail</a></p>\r\n<h3>Plumbing</h3>\r\n<p>Garry The Plumber<br />Call Garry: <strong>0418 351 112</strong></p>\r\n<h3>For all your phone and communication needs</h3>\r\n<p>Inspired Communications<br />Call Mary: <strong>0423 024 256</strong><br /><a href="mailto:mary@beinspired.com.au">Send E-Mail</a></p>\r\n<h3>Large Tree Work or Qualified Arborist</h3>\r\n<p>Cd mc leod Pty Ltd<br />Call Mark: <strong>0438 511 178</strong></p>\r\n<p>&nbsp;</p>\r\n<p>Treescape Pty Ltd<br />Call Peter: <strong>0417 322 232</strong><br /><a href="mailto:peter@treescape.com.au">Send E-Mail</a></p>\r\n</div>\r\n<div class="col-sm-6">\r\n<h3>Mulch and Soil Supply</h3>\r\n<p>Fulton''s Pty Ltd<br />Call: <strong>9824 3041</strong></p>\r\n<h3>Large and Small Industrial Bins</h3>\r\n<p>Combined Bulk Bins<br />Call Rob: <strong>0418 120 212</strong><br /><a href="mailto:robertcroft61@hotmail.com">Send E-Mail</a></p>\r\n<h3>For all your travel needs</h3>\r\n<p>Travel Managers<br />Sylvia Katsiavos<br /><a href="mailto:sylviak@travelmanagers.com.au">Send E-Mail</a></p>\r\n<h3>For all your air conditioning needs</h3>\r\n<p>Luke Mc Donell<br />J Belle Services <strong>0413884290</strong><br /><a href="mailto:Jbelle1@live.com.au">Send E-Mail</a></p>\r\n</div>'),
('525b85a5-4aa8-4a2f-8da9-07fc82c20753', '525b85a5-7670-49cd-b9f6-07fc82c20753', 'content', '<h1>A List of Recommended Trades</h1>\r\n<div class="col-sm-6">\r\n<h3>Electrician</h3>\r\n<p>S &amp; D Electrical<br />Call Steve: <strong>0407 541 016</strong><br /><a href="mailto:steve.mcalroy@optusnet.com.au">Send E-Mail</a></p>\r\n<h3>Painting</h3>\r\n<p>Quality painting service<br />Call Dave: <strong>0411 695 858</strong><br /><a href="mailto:millwood6@optusnet.com.au">Send E-Mail</a></p>\r\n<h3>Plumbing</h3>\r\n<p>Garry The Plumber<br />Call Garry: <strong>0418 351 112</strong></p>\r\n<h3>For all your phone and communication needs</h3>\r\n<p>Inspired Communications<br />Call Mary: <strong>0423 024 256</strong><br /><a href="mailto:mary@beinspired.com.au">Send E-Mail</a></p>\r\n<h3>Large Tree Work or Qualified Arborist</h3>\r\n<p>Cd mc leod Pty Ltd<br />Call Mark: <strong>0438 511 178</strong></p>\r\n<p>&nbsp;</p>\r\n<p>Treescape Pty Ltd<br />Call Peter: <strong>0417 322 232</strong><br /><a href="mailto:peter@treescape.com.au">Send E-Mail</a></p>\r\n</div>\r\n<div class="col-sm-6">\r\n<h3>Mulch and Soil Supply</h3>\r\n<p>Fulton''s Pty Ltd<br />Call: <strong>9824 3041</strong></p>\r\n<h3>Large and Small Industrial Bins</h3>\r\n<p>Combined Bulk Bins<br />Call Rob: <strong>0418 120 212</strong><br /><a href="mailto:robertcroft61@hotmail.com">Send E-Mail</a></p>\r\n<h3>For all your travel needs</h3>\r\n<p>Travel Managers<br />Sylvia Katsiavos<br /><a href="mailto:sylviak@travelmanagers.com.au">Send E-Mail</a></p>\r\n<h3>For all your air conditioning needs</h3>\r\n<p>Luke Mc Donell<br />J Belle Services <strong>0413884290</strong><br /><a href="mailto:Jbelle1@live.com.au">Send E-Mail</a></p>\r\n</div>', '<h1>A List of Recommended Trades</h1>\r\n<div class="col-sm-6">\r\n<h3>Electrician</h3>\r\n<p>S &amp; D Electrical<br />Call Steve: <strong>0407 541 016</strong><br /><a href="mailto:steve.mcalroy@optusnet.com.au">Send E-Mail</a></p>\r\n<h3>Painting</h3>\r\n<p>Quality painting service<br />Call Dave: <strong>0411 695 858</strong><br /><a href="mailto:millwood6@optusnet.com.au">Send E-Mail</a></p>\r\n<h3>Plumbing</h3>\r\n<p>Garry The Plumber<br />Call Garry: <strong>0418 351 112</strong></p>\r\n<h3>For all your phone and communication needs</h3>\r\n<p>Inspired Communications<br />Call Mary: <strong>0423 024 256</strong><br /><a href="mailto:mary@beinspired.com.au">Send E-Mail</a></p>\r\n<h3>Large Tree Work or Qualified Arborist</h3>\r\n<p>Cd Mc Leod Pty Ltd<br />Call Mark: <strong>0438 511 178</strong></p>\r\n<p>&nbsp;</p>\r\n<p>Treescape Pty Ltd<br />Call Peter: <strong>0417 322 232</strong><br /><a href="mailto:peter@treescape.com.au">Send E-Mail</a></p>\r\n</div>\r\n<div class="col-sm-6">\r\n<h3>Mulch and Soil Supply</h3>\r\n<p>Fulton''s Pty Ltd<br />Call: <strong>9824 3041</strong></p>\r\n<h3>Large and Small Industrial Bins</h3>\r\n<p>Combined Bulk Bins<br />Call Rob: <strong>0418 120 212</strong><br /><a href="mailto:robertcroft61@hotmail.com">Send E-Mail</a></p>\r\n<h3>For all your travel needs</h3>\r\n<p>Travel Managers<br />Sylvia Katsiavos<br /><a href="mailto:sylviak@travelmanagers.com.au">Send E-Mail</a></p>\r\n<h3>For all your air conditioning needs</h3>\r\n<p>Luke Mc Donell<br />J Belle Services <strong>0413884290</strong><br /><a href="mailto:Jbelle1@live.com.au">Send E-Mail</a></p>\r\n</div>'),
('525b8939-1a24-4e2a-9530-07fc82c20753', '525b8939-d6b4-4e40-bd23-07fc82c20753', 'username', NULL, 'asdf@asdf.com'),
('525b8b18-42e8-4183-ae61-07fc82c20753', '525b8b18-79a8-491a-bc4b-07fc82c20753', 'username', NULL, 'jskim19@student.monash.edu'),
('525b8bb8-bcb4-402b-b085-07fc82c20753', '525b8bb8-7c60-415f-b1a3-07fc82c20753', 'username', NULL, 'jimkustin@gmail.com'),
('525b8bf4-7b98-4301-aeb7-07fc82c20753', '525b8bf4-7170-4043-a2e9-07fc82c20753', 'endTime', '2013-10-16 09:45:00', '2013-10-16 10:00:00'),
('525b8bfe-c468-48e6-bd73-07fc82c20753', '525b8bfe-c2b8-4a76-ac81-07fc82c20753', 'endTime', '2013-10-16 10:00:00', '2013-10-16 10:45:00'),
('525b8c00-1e48-44d6-b629-07fc82c20753', '525b8c00-d4f0-44e9-a378-07fc82c20753', 'endTime', '2013-10-16 10:45:00', '2013-10-16 10:15:00'),
('525bd75f-9cd0-4a1e-ac89-07fc82c20753', '525bd75f-a4d8-4e8a-af18-07fc82c20753', 'content', '<h1>A List of Recommended Trades</h1>\r\n<div class="col-sm-6">\r\n<h3>Electrician</h3>\r\n<p>S &amp; D Electrical<br />Call Steve: <strong>0407 541 016</strong><br /><a href="mailto:steve.mcalroy@optusnet.com.au">Send E-Mail</a></p>\r\n<h3>Painting</h3>\r\n<p>Quality painting service<br />Call Dave: <strong>0411 695 858</strong><br /><a href="mailto:millwood6@optusnet.com.au">Send E-Mail</a></p>\r\n<h3>Plumbing</h3>\r\n<p>Garry The Plumber<br />Call Garry: <strong>0418 351 112</strong></p>\r\n<h3>For all your phone and communication needs</h3>\r\n<p>Inspired Communications<br />Call Mary: <strong>0423 024 256</strong><br /><a href="mailto:mary@beinspired.com.au">Send E-Mail</a></p>\r\n<h3>Large Tree Work or Qualified Arborist</h3>\r\n<p>Cd Mc Leod Pty Ltd<br />Call Mark: <strong>0438 511 178</strong></p>\r\n<p>&nbsp;</p>\r\n<p>Treescape Pty Ltd<br />Call Peter: <strong>0417 322 232</strong><br /><a href="mailto:peter@treescape.com.au">Send E-Mail</a></p>\r\n</div>\r\n<div class="col-sm-6">\r\n<h3>Mulch and Soil Supply</h3>\r\n<p>Fulton''s Pty Ltd<br />Call: <strong>9824 3041</strong></p>\r\n<h3>Large and Small Industrial Bins</h3>\r\n<p>Combined Bulk Bins<br />Call Rob: <strong>0418 120 212</strong><br /><a href="mailto:robertcroft61@hotmail.com">Send E-Mail</a></p>\r\n<h3>For all your travel needs</h3>\r\n<p>Travel Managers<br />Sylvia Katsiavos<br /><a href="mailto:sylviak@travelmanagers.com.au">Send E-Mail</a></p>\r\n<h3>For all your air conditioning needs</h3>\r\n<p>Luke Mc Donell<br />J Belle Services <strong>0413884290</strong><br /><a href="mailto:Jbelle1@live.com.au">Send E-Mail</a></p>\r\n</div>', '<h1>A List of Recommended Trades</h1>\r\n<div class="col-sm-6">\r\n<h3>Electrician</h3>\r\n<p>S &amp; D Electrical<br />Call Steve: <strong>0407 541 016</strong><br /><a href="mailto:steve.mcalroy@optusnet.com.au">Send E-Mail</a></p>\r\n<h3>Painting</h3>\r\n<p>Quality painting service<br />Call Dave: <strong>0411 695 858</strong><br /><a href="mailto:millwood6@optusnet.com.au">Send E-Mail</a></p>\r\n<h3>Plumbing</h3>\r\n<p>Garry The Plumber<br />Call Garry: <strong>0418 351 112</strong></p>\r\n<h3>For all your phone and communication needs</h3>\r\n<p>Inspired Communications<br />Call Mary: <strong>0423 024 256</strong><br /><a href="mailto:mary@beinspired.com.au">Send E-Mail</a></p>\r\n<h3>Large Tree Work or Qualified Arborist</h3>\r\n<p>Cd Mc Leod Pty Ltd<br />Call Mark: <strong>0438 511 178</strong></p>\r\n<p>Treescape Pty Ltd<br />Call Peter: <strong>0417 322 232</strong><br /><a href="mailto:peter@treescape.com.au">Send E-Mail</a></p>\r\n</div>\r\n<div class="col-sm-6">\r\n<h3>Mulch and Soil Supply</h3>\r\n<p>Fulton''s Pty Ltd<br />Call: <strong>9824 3041</strong></p>\r\n<h3>Large and Small Industrial Bins</h3>\r\n<p>Combined Bulk Bins<br />Call Rob: <strong>0418 120 212</strong><br /><a href="mailto:robertcroft61@hotmail.com">Send E-Mail</a></p>\r\n<h3>For all your travel needs</h3>\r\n<p>Travel Managers<br />Sylvia Katsiavos<br /><a href="mailto:sylviak@travelmanagers.com.au">Send E-Mail</a></p>\r\n<h3>For all your air conditioning needs</h3>\r\n<p>Luke Mc Donell<br />J Belle Services <strong>0413884290</strong><br /><a href="mailto:Jbelle1@live.com.au">Send E-Mail</a></p>\r\n</div>'),
('525bf3c2-5518-41b1-a874-07fc82c20753', '525bf3c2-4398-4391-8eda-07fc82c20753', 'endTime', '2013-10-15 10:00:00', '2013-10-15 12:00:00'),
('525bf3c2-d66c-4b11-b758-07fc82c20753', '525bf3c2-4398-4391-8eda-07fc82c20753', 'startTime', '2013-10-15 09:30:00', '2013-10-15 11:30:00'),
('525bf3c4-d008-474f-abc6-07fc82c20753', '525bf3c4-66e0-4292-b00d-07fc82c20753', 'startTime', '2013-10-15 11:30:00', '2013-10-15 12:00:00'),
('525bf3c4-dd08-4e4b-a94c-07fc82c20753', '525bf3c4-66e0-4292-b00d-07fc82c20753', 'endTime', '2013-10-15 12:00:00', '2013-10-15 12:30:00'),
('525bf3c6-86ac-4cc9-874a-07fc82c20753', '525bf3c6-4c00-4849-982b-07fc82c20753', 'startTime', '2013-10-15 12:00:00', '2013-10-15 12:45:00'),
('525bf3c6-9b7c-438d-8047-07fc82c20753', '525bf3c6-4c00-4849-982b-07fc82c20753', 'endTime', '2013-10-15 12:30:00', '2013-10-15 13:15:00'),
('525bf3c8-8ad4-4232-a670-07fc82c20753', '525bf3c8-6798-4b59-8d5a-07fc82c20753', 'startTime', '2013-10-15 09:15:00', '2013-10-15 08:15:00'),
('525bf3c8-ae18-468f-8bc2-07fc82c20753', '525bf3c8-6798-4b59-8d5a-07fc82c20753', 'endTime', '2013-10-15 09:30:00', '2013-10-15 08:30:00'),
('525c1221-b524-4656-8a17-07fc82c20753', '525c1221-5224-4f8d-b791-07fc82c20753', 'endTime', '2013-10-15 08:30:00', '2013-10-15 09:00:00'),
('525c273b-6110-4d62-b28f-07fc82c20753', '525c273b-ec60-4b3f-8e25-07fc82c20753', 'startTime', '1970-01-01 00:00:00', '1970-01-01 01:00:00'),
('525c273b-b224-4569-baa5-07fc82c20753', '525c273b-ec60-4b3f-8e25-07fc82c20753', 'endTime', '1970-01-01 00:00:00', '1970-01-01 01:00:00'),
('525c273b-e098-46a9-a86a-07fc82c20753', '525c273b-ec60-4b3f-8e25-07fc82c20753', 'status', 'NotFinished', 'Finished'),
('525c2794-dc90-47c2-a694-07fc82c20753', '525c2794-71e0-47a8-96d1-07fc82c20753', 'status', 'NotFinished', 'Finished'),
('525ca9c6-c5c4-47cb-a0fb-07fc82c20753', '525ca9c6-af88-4a70-baa9-07fc82c20753', 'status', 'NotFinished', 'Finished');

-- --------------------------------------------------------

--
-- 表的结构 `customers`
--

CREATE TABLE IF NOT EXISTS `customers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstName` varchar(50) COLLATE latin1_bin NOT NULL,
  `lastName` varchar(50) COLLATE latin1_bin NOT NULL,
  `address` varchar(255) COLLATE latin1_bin NOT NULL,
  `phone` varchar(20) COLLATE latin1_bin NOT NULL,
  `email` varchar(50) COLLATE latin1_bin NOT NULL,
  `birthday` date DEFAULT NULL,
  `gender` enum('Male','Female') COLLATE latin1_bin DEFAULT 'Male',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_bin AUTO_INCREMENT=73 ;

--
-- 转存表中的数据 `customers`
--

INSERT INTO `customers` (`id`, `firstName`, `lastName`, `address`, `phone`, `email`, `birthday`, `gender`) VALUES
(72, 'Jim', 'Kustin', '123 Here Caulfield 3800', '123456778', 'jimkustin@gmail.com', '1989-09-11', 'Male');

-- --------------------------------------------------------

--
-- 表的结构 `jobs`
--

CREATE TABLE IF NOT EXISTS `jobs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_id` int(11) NOT NULL,
  `startTime` datetime DEFAULT NULL,
  `endTime` datetime DEFAULT NULL,
  `status` enum('Finished','NotFinished') NOT NULL DEFAULT 'NotFinished',
  `title` varchar(50) NOT NULL,
  `comment` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=105 ;

--
-- 转存表中的数据 `jobs`
--

INSERT INTO `jobs` (`id`, `customer_id`, `startTime`, `endTime`, `status`, `title`, `comment`) VALUES
(88, 72, '2013-10-16 09:15:00', '2013-10-16 10:15:00', 'Finished', 'Jim Kustin Lawn', ''),
(89, 72, '2013-10-15 12:45:00', '2013-10-15 13:15:00', 'NotFinished', 'IE test', ''),
(90, 72, '2013-10-15 08:15:00', '2013-10-15 09:00:00', 'Finished', 'IE test 2', ''),
(97, 72, '1970-01-01 00:00:00', '1970-01-01 00:00:00', 'NotFinished', 'IE test 3', ''),
(98, 72, '1970-01-01 00:00:00', '1970-01-01 00:00:00', 'NotFinished', 'IE test again', ''),
(99, 72, '1970-01-01 00:00:00', '1970-01-01 00:00:00', 'NotFinished', 'ie teast this', ''),
(100, 72, '2013-10-18 09:00:00', '2013-10-18 09:30:00', 'NotFinished', 'Ie test IE10', ''),
(101, 72, '2013-10-18 11:30:00', '2013-10-18 11:45:00', 'NotFinished', 'sdfg', ''),
(102, 72, '1970-01-01 00:00:00', '1970-01-01 00:00:00', 'NotFinished', 'asdf', ''),
(103, 72, '2013-10-20 18:58:00', '2013-10-19 11:58:00', 'Finished', 'hi', ''),
(104, 72, '2013-10-20 18:01:00', '2013-10-19 12:01:00', 'Finished', 'fghjkl;', '');

-- --------------------------------------------------------

--
-- 表的结构 `job_services`
--

CREATE TABLE IF NOT EXISTS `job_services` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `job_id` int(50) NOT NULL,
  `service_id` int(50) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `job_id` (`job_id`),
  KEY `job_id_2` (`job_id`),
  KEY `service_id` (`service_id`),
  KEY `job_id_3` (`job_id`),
  KEY `service_id_2` (`service_id`),
  KEY `service_id_3` (`service_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=159 ;

--
-- 转存表中的数据 `job_services`
--

INSERT INTO `job_services` (`id`, `job_id`, `service_id`) VALUES
(129, 89, 8),
(146, 97, 6),
(147, 97, 7),
(148, 98, 5),
(149, 99, 5),
(150, 100, 6),
(151, 101, 5),
(152, 90, 5),
(153, 90, 6),
(155, 88, 6),
(156, 102, 14),
(157, 103, 8),
(158, 104, 5);

-- --------------------------------------------------------

--
-- 表的结构 `job_staffs`
--

CREATE TABLE IF NOT EXISTS `job_staffs` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `job_id` int(50) NOT NULL,
  `staff_id` int(50) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `job_id` (`job_id`),
  KEY `staff_id` (`staff_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=211 ;

--
-- 转存表中的数据 `job_staffs`
--

INSERT INTO `job_staffs` (`id`, `job_id`, `staff_id`) VALUES
(191, 89, 20),
(200, 97, 20),
(201, 98, 20),
(202, 99, 20),
(203, 100, 20),
(204, 101, 20),
(205, 90, 20),
(207, 88, 20),
(208, 102, 20),
(209, 103, 20),
(210, 104, 20);

-- --------------------------------------------------------

--
-- 表的结构 `news`
--

CREATE TABLE IF NOT EXISTS `news` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `title` varchar(200) NOT NULL,
  `date` date NOT NULL,
  `body` longtext NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=33 ;

--
-- 转存表中的数据 `news`
--

INSERT INTO `news` (`id`, `title`, `date`, `body`) VALUES
(21, 'another time test', '2013-08-23', 'testing'),
(22, 'Test edit', '2013-08-23', 'zxczxvzxvz'),
(23, 'Caroline', '2013-08-23', 'Showing it to caroline'),
(24, 'Order maintain', '2013-08-25', 'Testing'),
(25, 'Order testing 2', '2013-08-25', 'Something needs to be in the bodyy\r\n'),
(27, 'A380 Celebrates 5 years in Service', '2013-08-28', 'Airbus A380 celebrates five years in service:\r\n\r\nThe Airbus A380 celebrated its fifth anniversary in service with its largest customer Emirates earlier this month.\r\n\r\nThe Dubai-based carrier was the second airline to receive the A380 following Singapore Airlines and operated its first scheduled A380 flight from its homebase\r\n\r\nto New York on August 1, 2008 – a route which remains its longest non-stop service.\r\n\r\nIt now flies the superjumbo to 21 destinations in Emirates’ network including Auckland, Moscow, Hong Kong, Bangkok and Manchester.\r\n\r\nAll five of its daily flights from London Heathrow to Dubai are now operated by the A380 -a significant increase in capacity on the aircraft used on the route previously.\r\n\r\nThe airline currently has 35 A380s, whose wings are built at Broughton, Flintshire, in its fleet and have a further 55 on order.\r\n\r\nIn all, 37 airports have been visited, either for scheduled flights, one-off special appearances or because of diversions.\r\n\r\nNext month British Airways will become the third European operator of the aircraft operating flights to Hong Kong and Los Angeles.\r\n\r\nEmirates’ Middle Eastern rivals, Qatar Airways and Etihad, are preparing to take delivery of their A380s in 2014.\r\n\r\nEtihad Airways president James Hogan recently unveiled a series of major changes to its Australian operations based on the introduction of the A380 on key routes from Abu Dhabi to Sydney and Melbourne.\r\n\r\nHe said new routes and upgraded airport facilities are also planned.\r\n\r\nSkymark Airlines of Japan, Asiana of Korea and French overseas airline Air Austral will also receive their first A380s next year.'),
(28, 'Bayside News No.4', '2013-08-28', 'This is the 4th newsletter'),
(29, 'Presentation', '2013-08-30', 'Adding news'),
(30, 'testing font', '2013-09-17', '<p><span style="font-family: ''comic sans ms'', sans-serif; font-size: large;">Hi how are u</span></p>'),
(31, '', '2013-09-17', '<p><span style="color: #00ff00;"><strong><em>wd'';jas;ojdpoasjdposajd</em></strong></span></p>'),
(32, 'Test for wesdnesd', '2013-09-18', '<p><span style="color: #00ff00;">Testing</span></p>');

-- --------------------------------------------------------

--
-- 表的结构 `pagecontents`
--

CREATE TABLE IF NOT EXISTS `pagecontents` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `page` varchar(30) NOT NULL,
  `content` longtext NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- 转存表中的数据 `pagecontents`
--

INSERT INTO `pagecontents` (`id`, `page`, `content`) VALUES
(15, 'trades', '<h1>A List of Recommended Trades</h1>\r\n<div class="col-sm-6">\r\n<h3>Electrician</h3>\r\n<p>S &amp; D Electrical<br />Call Steve: <strong>0407 541 016</strong><br /><a href="mailto:steve.mcalroy@optusnet.com.au">Send E-Mail</a></p>\r\n<h3>Painting</h3>\r\n<p>Quality painting service<br />Call Dave: <strong>0411 695 858</strong><br /><a href="mailto:millwood6@optusnet.com.au">Send E-Mail</a></p>\r\n<h3>Plumbing</h3>\r\n<p>Garry The Plumber<br />Call Garry: <strong>0418 351 112</strong></p>\r\n<h3>For all your phone and communication needs</h3>\r\n<p>Inspired Communications<br />Call Mary: <strong>0423 024 256</strong><br /><a href="mailto:mary@beinspired.com.au">Send E-Mail</a></p>\r\n<h3>Large Tree Work or Qualified Arborist</h3>\r\n<p>Cd Mc Leod Pty Ltd<br />Call Mark: <strong>0438 511 178</strong></p>\r\n<p>Treescape Pty Ltd<br />Call Peter: <strong>0417 322 232</strong><br /><a href="mailto:peter@treescape.com.au">Send E-Mail</a></p>\r\n</div>\r\n<div class="col-sm-6">\r\n<h3>Mulch and Soil Supply</h3>\r\n<p>Fulton''s Pty Ltd<br />Call: <strong>9824 3041</strong></p>\r\n<h3>Large and Small Industrial Bins</h3>\r\n<p>Combined Bulk Bins<br />Call Rob: <strong>0418 120 212</strong><br /><a href="mailto:robertcroft61@hotmail.com">Send E-Mail</a></p>\r\n<h3>For all your travel needs</h3>\r\n<p>Travel Managers<br />Sylvia Katsiavos<br /><a href="mailto:sylviak@travelmanagers.com.au">Send E-Mail</a></p>\r\n<h3>For all your air conditioning needs</h3>\r\n<p>Luke Mc Donell<br />J Belle Services <strong>0413884290</strong><br /><a href="mailto:Jbelle1@live.com.au">Send E-Mail</a></p>\r\n</div>'),
(18, 'home', '<h1>Home</h1>\r\n<p>The Bayside Gardener Pty Ltd was established in 1983 and is a leader in garden maintenance excellence in Melbourne.</p>\r\n<p>We strive for the best possible outcome for our clients with value for money being of utmost importance.</p>\r\n<p>We maintain commercial as well as domestic properties but specialize in rejuvenating home gardens by upgrading planting, irrigation, soil types and mulching. We then offer regular maintenance of the site to make sure the garden blossoms.</p>\r\n<p>Our staff of 15 young energetic qualified staff are knowledgeable, obliging and will be on time.<br />The director of the firm, Michael, offers a consultancy service where he will visit your garden and prepare a report of what is required.</p>\r\n<p>We also offer plant brokerage. This is a service where we source plants at all different sizes at the best possible price saving our clients considerable amounts of money compared to buying plants at retail cost at nurseries.&nbsp;<br />We have now developed software to enable clients through this web site and their own personal log in password to monitor work being done at their properties, the times spent and costs involved.</p>\r\n<p>If you want horticultural excellence and a firm that sets itself apart from all others BY ITS quality and service contact&nbsp;The Bayside Gardener Pty Ltd.</p>'),
(19, 'history', '<h1>The History of The Bayside Gardener</h1>\r\n			<p>The beginning of the business that was to become The Bayside Gardener Pty Ltd was when Michael Amerena registered the name in October 1983. In the early days he was a sole trader and began to maintain the gardens for faimily and friends etc.</p>\r\n			<p>As the business slowly grew Michael formed a partnership not only with his wife Helen but in a business structure as well.</p>\r\n			<p>Steadily his client base grew until in 2005 a company structure was born and named The Bayside Gardener Pty Ltd.</p>\r\n			<p>The business now employs 15 staff and has over 120 regular clients. It sevices many of the elite clients of Melbourne as well as maintains the smaller traditional Melbourne gardens.</p>\r\n			<p>The Bayside Gardener Pty Ltd is one of the largest and most successful garden maintenace firm in Melbourne.</p>');

-- --------------------------------------------------------

--
-- 表的结构 `photos`
--

CREATE TABLE IF NOT EXISTS `photos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `file_path` varchar(255) NOT NULL,
  `thumb_path` varchar(255) NOT NULL,
  `staff_id` int(11) DEFAULT NULL,
  `promotion_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=29 ;

--
-- 转存表中的数据 `photos`
--

INSERT INTO `photos` (`id`, `file_path`, `thumb_path`, `staff_id`, `promotion_id`) VALUES
(14, 'staffImage/16/images.jpg', 'staffImage/16/images_thumb.jpg', 16, 0),
(16, 'staffImage/16/images.jpeg', 'staffImage/16/images_thumb.jpeg', 16, 0),
(17, 'staffImage/16/images.jpeg', 'staffImage/16/images_thumb.jpeg', 16, 0),
(19, 'staffImage/17/315459_456802674389869_318890768_n.jpg', 'staffImage/17/315459_456802674389869_318890768_n_thumb.jpg', 17, 0),
(24, 'promotionImage/32/]ZP2TJML64YPTRAB0MBTL4U.jpg', 'promotionImage/32/]ZP2TJML64YPTRAB0MBTL4U_thumb.jpg', NULL, 32),
(25, 'promotionImage/35/banner promotion.png', 'promotionImage/35/banner promotion_thumb.png', NULL, 35),
(26, 'staffImage/14/LOGO.png', 'staffImage/14/LOGO_thumb.png', 14, NULL),
(27, 'staffImage/19/1712-9.jpg', 'staffImage/19/1712-9_thumb.jpg', 19, NULL),
(28, 'staffImage/20/8756.pip_8756_0120.jpg', 'staffImage/20/8756_thumb.pip_8756_0120', 20, NULL);

-- --------------------------------------------------------

--
-- 表的结构 `promotions`
--

CREATE TABLE IF NOT EXISTS `promotions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(2000) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=36 ;

--
-- 转存表中的数据 `promotions`
--

INSERT INTO `promotions` (`id`, `title`, `date`) VALUES
(28, 'huio', '2013-10-08'),
(29, 'gi', '2013-10-08'),
(30, 'h', '2013-10-08'),
(31, 'aqewer', '2013-10-08'),
(32, 'i', '2013-10-08'),
(34, 'hullo', '2013-10-08'),
(35, 'iop', '2013-10-08');

-- --------------------------------------------------------

--
-- 表的结构 `roles`
--

CREATE TABLE IF NOT EXISTS `roles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role_name` varchar(50) COLLATE latin1_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_bin AUTO_INCREMENT=4 ;

--
-- 转存表中的数据 `roles`
--

INSERT INTO `roles` (`id`, `role_name`) VALUES
(1, 'Admin'),
(2, 'Staff'),
(3, 'Customer');

-- --------------------------------------------------------

--
-- 表的结构 `services`
--

CREATE TABLE IF NOT EXISTS `services` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `description` varchar(255) COLLATE latin1_bin NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `name` varchar(50) COLLATE latin1_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_bin AUTO_INCREMENT=20 ;

--
-- 转存表中的数据 `services`
--

INSERT INTO `services` (`id`, `description`, `price`, `name`) VALUES
(5, 'Removing weeds from the garden', '0', 'Weeding'),
(6, 'a', '0', 'Lawns and Edge'),
(7, 'a', '0', 'Weed Spraying'),
(8, 'a', '0', 'Fertilising'),
(9, 'a', '0', 'Pest and Disease Control'),
(10, 'a', '0', 'Trimming Shrubs'),
(11, 'a', '0', 'Trimming Creepers'),
(12, 'a', '0', 'Trimming Hedges'),
(13, 'a', '0', 'Mulching'),
(14, 'a', '0', 'Rubbish Removal'),
(15, 'a', '0', 'Planting - 150mm'),
(16, 'a', '0', 'Planting - 200mm'),
(17, 'a', '0', 'Planting Annuals'),
(18, 'a', '0', 'Sprinkler Check'),
(19, 'a', '0', 'Irrigations Works');

-- --------------------------------------------------------

--
-- 表的结构 `staffs`
--

CREATE TABLE IF NOT EXISTS `staffs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstName` varchar(50) COLLATE latin1_bin NOT NULL,
  `lastName` varchar(50) COLLATE latin1_bin NOT NULL,
  `address` varchar(255) COLLATE latin1_bin NOT NULL,
  `phone` varchar(20) COLLATE latin1_bin NOT NULL,
  `email` varchar(50) COLLATE latin1_bin NOT NULL,
  `gender` enum('Male','Female') COLLATE latin1_bin NOT NULL DEFAULT 'Male',
  `birthday` date DEFAULT NULL,
  `mobilePhone` varchar(20) COLLATE latin1_bin DEFAULT NULL,
  `taxFile` varchar(20) COLLATE latin1_bin DEFAULT NULL,
  `licence` varchar(20) COLLATE latin1_bin DEFAULT NULL,
  `emergencyContact` varchar(50) COLLATE latin1_bin DEFAULT NULL,
  `position` varchar(20) COLLATE latin1_bin DEFAULT NULL,
  `dateOfHire` date DEFAULT NULL,
  `dateOfTermination` date DEFAULT NULL,
  `bank` varchar(50) COLLATE latin1_bin DEFAULT NULL,
  `emergencyName` varchar(60) COLLATE latin1_bin DEFAULT NULL,
  `emergencyRelationship` varchar(60) COLLATE latin1_bin DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_bin AUTO_INCREMENT=21 ;

--
-- 转存表中的数据 `staffs`
--

INSERT INTO `staffs` (`id`, `firstName`, `lastName`, `address`, `phone`, `email`, `gender`, `birthday`, `mobilePhone`, `taxFile`, `licence`, `emergencyContact`, `position`, `dateOfHire`, `dateOfTermination`, `bank`, `emergencyName`, `emergencyRelationship`) VALUES
(20, 'Justin', 'Kim', '123 Somewhere Court Dandenong 3000', '123456778', 'jskim19@student.monash.edu', 'Male', '1989-09-11', NULL, NULL, NULL, '12345678', NULL, NULL, NULL, NULL, 'Denny', 'Friend');

-- --------------------------------------------------------

--
-- 表的结构 `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `role` varchar(50) DEFAULT NULL,
  `customer_id` int(11) NOT NULL,
  `token_hash` varchar(1000) NOT NULL,
  `staff_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=121 ;

--
-- 转存表中的数据 `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role`, `customer_id`, `token_hash`, `staff_id`) VALUES
(62, 'caroline', 'ae9a76d7c5bc3b6f60d2fc2a798a6a9ec966a004', '1', 0, 'ae9a76d7c5bc3b6f60d2fc2a798a6a9ec966a004', 0),
(63, 'Denny', 'ae9a76d7c5bc3b6f60d2fc2a798a6a9ec966a004', '1', 0, 'ae9a76d7c5bc3b6f60d2fc2a798a6a9ec966a004', 0),
(64, 'Justin', 'ae9a76d7c5bc3b6f60d2fc2a798a6a9ec966a004', '1', 0, 'ae9a76d7c5bc3b6f60d2fc2a798a6a9ec966a004', 0),
(65, 'Mush', 'ae9a76d7c5bc3b6f60d2fc2a798a6a9ec966a004', '1', 0, 'ae9a76d7c5bc3b6f60d2fc2a798a6a9ec966a004', 0),
(78, 'michael', '614935b9984a85a1577bf6273c6880ee6bb967e8', '1', 0, '614935b9984a85a1577bf6273c6880ee6bb967e8', 0),
(119, 'jskim19@student.monash.edu', 'ae9a76d7c5bc3b6f60d2fc2a798a6a9ec966a004', '2', 0, 'ae9a76d7c5bc3b6f60d2fc2a798a6a9ec966a004', 20),
(120, 'jimkustin@gmail.com', 'ae9a76d7c5bc3b6f60d2fc2a798a6a9ec966a004', '3', 72, 'ae9a76d7c5bc3b6f60d2fc2a798a6a9ec966a004', 0);

--
-- 限制导出的表
--

--
-- 限制表 `job_services`
--
ALTER TABLE `job_services`
  ADD CONSTRAINT `job_services_ibfk_1` FOREIGN KEY (`job_id`) REFERENCES `jobs` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `job_services_ibfk_2` FOREIGN KEY (`service_id`) REFERENCES `services` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- 限制表 `job_staffs`
--
ALTER TABLE `job_staffs`
  ADD CONSTRAINT `job_staffs_ibfk_1` FOREIGN KEY (`job_id`) REFERENCES `jobs` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `job_staffs_ibfk_2` FOREIGN KEY (`staff_id`) REFERENCES `staffs` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
