-- phpMyAdmin SQL Dump
-- version 4.4.10
-- http://www.phpmyadmin.net
--
-- Host: localhost:8889
-- Generation Time: Aug 14, 2018 at 04:25 PM
-- Server version: 5.5.42
-- PHP Version: 5.6.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `abtest`
--

-- --------------------------------------------------------

--
-- Table structure for table `abtests`
--

CREATE TABLE `abtests` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `code` varchar(255) DEFAULT NULL,
  `page1` varchar(1024) DEFAULT NULL,
  `page2` varchar(1024) DEFAULT NULL,
  `page1_hits` int(11) NOT NULL DEFAULT '0',
  `page2_hits` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `abtests`
--

INSERT INTO `abtests` (`id`, `name`, `code`, `page1`, `page2`, `page1_hits`, `page2_hits`) VALUES
(1, 'test 1', 'test1', 'http://frontend:7777/r=page1', 'http://frontend:7777/?r=site/landing2', 4, 4),
(2, 'test 2', '', '', 'http://nexturl', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `conversions`
--

CREATE TABLE `conversions` (
  `id` int(11) NOT NULL,
  `session_id` int(11) DEFAULT NULL,
  `session_history_id` int(11) DEFAULT NULL,
  `orderno` varchar(32) DEFAULT NULL,
  `ts` datetime DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `conversions`
--

INSERT INTO `conversions` (`id`, `session_id`, `session_history_id`, `orderno`, `ts`) VALUES
(1, 1, 3, NULL, '2018-08-14 15:25:24'),
(2, 2, 7, NULL, '2018-08-14 15:28:18'),
(3, 6, 14, NULL, '2018-08-14 15:57:20');

-- --------------------------------------------------------

--
-- Table structure for table `migration`
--

CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1534271282),
('m130524_201442_init', 1534271289),
('m180814_183322_userup', 1534271996);

-- --------------------------------------------------------

--
-- Table structure for table `session`
--

CREATE TABLE `session` (
  `id` int(11) NOT NULL,
  `pageid` int(11) DEFAULT NULL,
  `ip` varchar(64) DEFAULT NULL,
  `sid` varchar(80) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `last_hit_at` datetime DEFAULT NULL,
  `abtest_id` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `session`
--

INSERT INTO `session` (`id`, `pageid`, `ip`, `sid`, `created_at`, `last_hit_at`, `abtest_id`) VALUES
(1, 1, '::1', 'c01dfd59028ceef40444b4e7033ae7d50b800341', '2018-08-14 15:11:05', NULL, 1),
(2, 2, '::1', '37e14d09a88641c825b487bf50e368106d783cac', '2018-08-14 15:27:47', NULL, 1),
(3, 1, '::1', '987f448e100615d3e44ad9369e36d30ee7c31359', '2018-08-14 15:28:43', NULL, 1),
(4, 2, '::1', 'b55d905e926ca2250f652571cd31afbc79b65bef', '2018-08-14 15:30:30', NULL, 1),
(5, 2, '::1', '6017c6761662bf0fc6ba4a4ba7990764556eb8da', '2018-08-14 15:32:00', NULL, 1),
(6, 2, '::1', '8914f5fde39ae78d091b96aec3b090952ce048ac', '2018-08-14 15:56:03', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `session_history`
--

CREATE TABLE `session_history` (
  `id` int(11) NOT NULL,
  `ts` datetime DEFAULT NULL,
  `url` varchar(1024) DEFAULT NULL,
  `query_string` varchar(2048) DEFAULT NULL,
  `pagetype` varchar(32) DEFAULT NULL,
  `key1` varchar(128) DEFAULT NULL,
  `key2` varchar(128) DEFAULT NULL,
  `session_id` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `session_history`
--

INSERT INTO `session_history` (`id`, `ts`, `url`, `query_string`, `pagetype`, `key1`, `key2`, `session_id`) VALUES
(1, '2018-08-14 15:24:24', 'http://frontend:7777/index.php?r=site%2Fhit&random=992a62d2dde58fa6d0d904c01afe6b95', NULL, NULL, NULL, NULL, 1),
(2, '2018-08-14 15:24:47', 'http://frontend:7777/index.php?r=site%2Fhit&random=a4235208ee35e3e773c8d941861da840', NULL, NULL, NULL, NULL, 1),
(3, '2018-08-14 15:25:24', 'conversion', NULL, NULL, NULL, NULL, 1),
(4, '2018-08-14 15:25:37', 'conversion', NULL, NULL, NULL, NULL, 1),
(5, '2018-08-14 15:28:17', 'http://frontend:7777/index.php?r=site%2Fhit&random=6ea94d951990d4b89a9930383a070096', NULL, NULL, NULL, NULL, 2),
(6, '2018-08-14 15:28:18', 'http://frontend:7777/index.php?r=site%2Fhit&random=81757ff2c29dd807f6ebc77f99db7cd5', NULL, NULL, NULL, NULL, 2),
(7, '2018-08-14 15:28:18', 'conversion', NULL, NULL, NULL, NULL, 2),
(8, '2018-08-14 15:47:04', 'conversion', NULL, NULL, NULL, NULL, 1),
(9, '2018-08-14 15:56:39', 'http://frontend:7777/index.php?r=site%2Fhit&random=f8db4a327200e23b89e4be0382fe3de4', NULL, NULL, NULL, NULL, 6),
(10, '2018-08-14 15:56:44', 'http://frontend:7777/index.php?r=site%2Fhit&random=c36c5e8bdc7c77603e7f8b7ac3458ce7', NULL, NULL, NULL, NULL, 6),
(11, '2018-08-14 15:56:44', 'http://frontend:7777/index.php?r=site%2Fhit&random=a5e53369c957223a3dc068678eb8a6ab', NULL, NULL, NULL, NULL, 6),
(12, '2018-08-14 15:56:44', 'http://frontend:7777/index.php?r=site%2Fhit&random=03ed1f3c606a5c7e5a4b9021547c3b80', NULL, NULL, NULL, NULL, 6),
(13, '2018-08-14 15:56:45', 'http://frontend:7777/index.php?r=site%2Fhit&random=03ed1f3c606a5c7e5a4b9021547c3b80', NULL, NULL, NULL, NULL, 6),
(14, '2018-08-14 15:57:20', 'conversion', NULL, NULL, NULL, NULL, 6),
(15, '2018-08-14 15:57:31', 'conversion', NULL, NULL, NULL, NULL, 6);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `created_at`, `updated_at`) VALUES
(2, 'admin', '', '$2y$13$rOiP.p7XOzX8IfBOtOZKhOFj8KT2d/jDpm7Jf1PJWS6D9hgNVeVNy', NULL, 'admin', 10, 1534271996, 1534271996);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `abtests`
--
ALTER TABLE `abtests`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ix_code` (`code`);

--
-- Indexes for table `conversions`
--
ALTER TABLE `conversions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ix_session` (`session_id`),
  ADD KEY `ix_history` (`session_history_id`),
  ADD KEY `ix_order` (`orderno`);

--
-- Indexes for table `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Indexes for table `session`
--
ALTER TABLE `session`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ix_sid` (`sid`),
  ADD KEY `ix_abtest` (`abtest_id`);

--
-- Indexes for table `session_history`
--
ALTER TABLE `session_history`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ix_url` (`url`(255)),
  ADD KEY `ix_pagetype` (`pagetype`),
  ADD KEY `ix_key1` (`key1`),
  ADD KEY `ix_key2` (`key2`),
  ADD KEY `ix_session` (`session_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `password_reset_token` (`password_reset_token`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `abtests`
--
ALTER TABLE `abtests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `conversions`
--
ALTER TABLE `conversions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `session`
--
ALTER TABLE `session`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `session_history`
--
ALTER TABLE `session_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;

  
