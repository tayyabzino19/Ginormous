-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 05, 2022 at 11:01 AM
-- Server version: 8.0.30-0ubuntu0.20.04.2
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `freelancer`
--

-- --------------------------------------------------------

--
-- Table structure for table `apis`
--

CREATE TABLE `apis` (
  `id` bigint UNSIGNED NOT NULL,
  `request` json DEFAULT NULL,
  `response` json DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `name`, `code`, `created_at`, `updated_at`) VALUES
(1, 'Afghanistan', 'AF', NULL, NULL),
(2, 'Aland Islands', 'AX', NULL, NULL),
(3, 'Albania', 'AL', NULL, NULL),
(4, 'Algeria', 'DZ', NULL, NULL),
(5, 'American Samoa', 'AS', NULL, NULL),
(6, 'Andorra', 'AD', NULL, NULL),
(7, 'Angola', 'AO', NULL, NULL),
(8, 'Anguilla', 'AI', NULL, NULL),
(9, 'Antarctica', 'AQ', NULL, NULL),
(10, 'Antigua and Barbuda', 'AG', NULL, NULL),
(11, 'Argentina', 'AR', NULL, NULL),
(12, 'Armenia', 'AM', NULL, NULL),
(13, 'Aruba', 'AW', NULL, NULL),
(14, 'Australia', 'AU', NULL, NULL),
(15, 'Austria', 'AT', NULL, NULL),
(16, 'Azerbaijan', 'AZ', NULL, NULL),
(17, 'Bahamas', 'BS', NULL, NULL),
(18, 'Bahrain', 'BH', NULL, NULL),
(19, 'Bangladesh', 'BD', NULL, NULL),
(20, 'Barbados', 'BB', NULL, NULL),
(21, 'Belarus', 'BY', NULL, NULL),
(22, 'Belgium', 'BE', NULL, NULL),
(23, 'Belize', 'BZ', NULL, NULL),
(24, 'Benin', 'BJ', NULL, NULL),
(25, 'Bermuda', 'BM', NULL, NULL),
(26, 'Bhutan', 'BT', NULL, NULL),
(27, 'Bolivia', 'BO', NULL, NULL),
(28, 'Bonaire, Saint Eustatius and Saba', 'BQ', NULL, NULL),
(29, 'Bosnia and Herzegovina', 'BA', NULL, NULL),
(30, 'Botswana', 'BW', NULL, NULL),
(31, 'Bouvet Island', 'BV', NULL, NULL),
(32, 'Brazil', 'BR', NULL, NULL),
(33, 'British Indian Ocean Territory', 'IO', NULL, NULL),
(34, 'Brunei Darussalam', 'BN', NULL, NULL),
(35, 'Bulgaria', 'BG', NULL, NULL),
(36, 'Burkina Faso', 'BF', NULL, NULL),
(37, 'Burundi', 'BI', NULL, NULL),
(38, 'Cambodia', 'KH', NULL, NULL),
(39, 'Cameroon', 'CM', NULL, NULL),
(40, 'Canada', 'CA', NULL, NULL),
(41, 'Cape Verde', 'CV', NULL, NULL),
(42, 'Cayman Islands', 'KY', NULL, NULL),
(43, 'Central African Republic', 'CF', NULL, NULL),
(44, 'Chad', 'TD', NULL, NULL),
(45, 'Chile', 'CL', NULL, NULL),
(46, 'China', 'CN', NULL, NULL),
(47, 'Christmas Island', 'CX', NULL, NULL),
(48, 'Cocos (Keeling) Islands', 'CC', NULL, NULL),
(49, 'Colombia', 'CO', NULL, NULL),
(50, 'Comoros', 'KM', NULL, NULL),
(51, 'Congo', 'CG', NULL, NULL),
(52, 'Congo, The Democratic Republic of the', 'CD', NULL, NULL),
(53, 'Cook Islands', 'CK', NULL, NULL),
(54, 'Costa Rica', 'CR', NULL, NULL),
(55, 'Cote D\'Ivoire', 'CI', NULL, NULL),
(56, 'Croatia', 'HR', NULL, NULL),
(57, 'Cuba', 'CU', NULL, NULL),
(58, 'Curacao', 'CW', NULL, NULL),
(59, 'Cyprus', 'CY', NULL, NULL),
(60, 'Czech Republic', 'CZ', NULL, NULL),
(61, 'Denmark', 'DK', NULL, NULL),
(62, 'Djibouti', 'DJ', NULL, NULL),
(63, 'Dominica', 'DM', NULL, NULL),
(64, 'Dominican Republic', 'DO', NULL, NULL),
(65, 'Ecuador', 'EC', NULL, NULL),
(66, 'Egypt', 'EG', NULL, NULL),
(67, 'El Salvador', 'SV', NULL, NULL),
(68, 'Equatorial Guinea', 'GQ', NULL, NULL),
(69, 'Eritrea', 'ER', NULL, NULL),
(70, 'Estonia', 'EE', NULL, NULL),
(71, 'Ethiopia', 'ET', NULL, NULL),
(72, 'Falkland Islands (Malvinas)', 'FK', NULL, NULL),
(73, 'Faroe Islands', 'FO', NULL, NULL),
(74, 'Fiji', 'FJ', NULL, NULL),
(75, 'Finland', 'FI', NULL, NULL),
(76, 'France', 'FR', NULL, NULL),
(77, 'French Guiana', 'GF', NULL, NULL),
(78, 'French Polynesia', 'PF', NULL, NULL),
(79, 'French Southern Territories', 'TF', NULL, NULL),
(80, 'Gabon', 'GA', NULL, NULL),
(81, 'Gambia', 'GM', NULL, NULL),
(82, 'Georgia', 'GE', NULL, NULL),
(83, 'Germany', 'DE', NULL, NULL),
(84, 'Ghana', 'GH', NULL, NULL),
(85, 'Gibraltar', 'GI', NULL, NULL),
(86, 'Greece', 'GR', NULL, NULL),
(87, 'Greenland', 'GL', NULL, NULL),
(88, 'Grenada', 'GD', NULL, NULL),
(89, 'Guadeloupe', 'GP', NULL, NULL),
(90, 'Guam', 'GU', NULL, NULL),
(91, 'Guatemala', 'GT', NULL, NULL),
(92, 'Guernsey', 'GG', NULL, NULL),
(93, 'Guinea', 'GN', NULL, NULL),
(94, 'Guinea-Bissau', 'GW', NULL, NULL),
(95, 'Guyana', 'GY', NULL, NULL),
(96, 'Haiti', 'HT', NULL, NULL),
(97, 'Heard Island and McDonald Islands', 'HM', NULL, NULL),
(98, 'Holy See (Vatican City State)', 'VA', NULL, NULL),
(99, 'Honduras', 'HN', NULL, NULL),
(100, 'Hong Kong', 'HK', NULL, NULL),
(101, 'Hungary', 'HU', NULL, NULL),
(102, 'Iceland', 'IS', NULL, NULL),
(103, 'India', 'IN', NULL, NULL),
(104, 'Indonesia', 'ID', NULL, NULL),
(105, 'Iran, Islamic Republic of', 'IR', NULL, NULL),
(106, 'Iraq', 'IQ', NULL, NULL),
(107, 'Ireland', 'IE', NULL, NULL),
(108, 'Isle of Man', 'IM', NULL, NULL),
(109, 'Israel', 'IL', NULL, NULL),
(110, 'Italy', 'IT', NULL, NULL),
(111, 'Jamaica', 'JM', NULL, NULL),
(112, 'Japan', 'JP', NULL, NULL),
(113, 'Jersey', 'JE', NULL, NULL),
(114, 'Jordan', 'JO', NULL, NULL),
(115, 'Kazakhstan', 'KZ', NULL, NULL),
(116, 'Kenya', 'KE', NULL, NULL),
(117, 'Kiribati', 'KI', NULL, NULL),
(118, 'Korea, Democratic People\'s Republic of', 'KP', NULL, NULL),
(119, 'Korea, Republic of', 'KR', NULL, NULL),
(120, 'Kosovo', 'XK', NULL, NULL),
(121, 'Kuwait', 'KW', NULL, NULL),
(122, 'Kyrgyzstan', 'KG', NULL, NULL),
(123, 'Lao People\'s Democratic Republic', 'LA', NULL, NULL),
(124, 'Latvia', 'LV', NULL, NULL),
(125, 'Lebanon', 'LB', NULL, NULL),
(126, 'Lesotho', 'LS', NULL, NULL),
(127, 'Liberia', 'LR', NULL, NULL),
(128, 'Libya', 'LY', NULL, NULL),
(129, 'Liechtenstein', 'LI', NULL, NULL),
(130, 'Lithuania', 'LT', NULL, NULL),
(131, 'Luxembourg', 'LU', NULL, NULL),
(132, 'Macau', 'MO', NULL, NULL),
(133, 'Macedonia', 'MK', NULL, NULL),
(134, 'Madagascar', 'MG', NULL, NULL),
(135, 'Malawi', 'MW', NULL, NULL),
(136, 'Malaysia', 'MY', NULL, NULL),
(137, 'Maldives', 'MV', NULL, NULL),
(138, 'Mali', 'ML', NULL, NULL),
(139, 'Malta', 'MT', NULL, NULL),
(140, 'Marshall Islands', 'MH', NULL, NULL),
(141, 'Martinique', 'MQ', NULL, NULL),
(142, 'Mauritania', 'MR', NULL, NULL),
(143, 'Mauritius', 'MU', NULL, NULL),
(144, 'Mayotte', 'YT', NULL, NULL),
(145, 'Mexico', 'MX', NULL, NULL),
(146, 'Micronesia, Federated States of', 'FM', NULL, NULL),
(147, 'Moldova, Republic of', 'MD', NULL, NULL),
(148, 'Monaco', 'MC', NULL, NULL),
(149, 'Mongolia', 'MN', NULL, NULL),
(150, 'Montenegro', 'ME', NULL, NULL),
(151, 'Montserrat', 'MS', NULL, NULL),
(152, 'Morocco', 'MA', NULL, NULL),
(153, 'Mozambique', 'MZ', NULL, NULL),
(154, 'Myanmar', 'MM', NULL, NULL),
(155, 'Namibia', 'NA', NULL, NULL),
(156, 'Nauru', 'NR', NULL, NULL),
(157, 'Nepal', 'NP', NULL, NULL),
(158, 'Netherlands', 'NL', NULL, NULL),
(159, 'New Caledonia', 'NC', NULL, NULL),
(160, 'New Zealand', 'NZ', NULL, NULL),
(161, 'Nicaragua', 'NI', NULL, NULL),
(162, 'Niger', 'NE', NULL, NULL),
(163, 'Nigeria', 'NG', NULL, NULL),
(164, 'Niue', 'NU', NULL, NULL),
(165, 'Norfolk Island', 'NF', NULL, NULL),
(166, 'Northern Cyprus', 'XC', NULL, NULL),
(167, 'Northern Mariana Islands', 'MP', NULL, NULL),
(168, 'Norway', 'NO', NULL, NULL),
(169, 'Oman', 'OM', NULL, NULL),
(170, 'Pakistan', 'PK', NULL, NULL),
(171, 'Palau', 'PW', NULL, NULL),
(172, 'Palestinian Territory', 'PS', NULL, NULL),
(173, 'Panama', 'PA', NULL, NULL),
(174, 'Papua New Guinea', 'PG', NULL, NULL),
(175, 'Paraguay', 'PY', NULL, NULL),
(176, 'Peru', 'PE', NULL, NULL),
(177, 'Philippines', 'PH', NULL, NULL),
(178, 'Pitcairn Islands', 'PN', NULL, NULL),
(179, 'Poland', 'PL', NULL, NULL),
(180, 'Portugal', 'PT', NULL, NULL),
(181, 'Puerto Rico', 'PR', NULL, NULL),
(182, 'Qatar', 'QA', NULL, NULL),
(183, 'Reunion', 'RE', NULL, NULL),
(184, 'Romania', 'RO', NULL, NULL),
(185, 'Russian Federation', 'RU', NULL, NULL),
(186, 'Rwanda', 'RW', NULL, NULL),
(187, 'Saint Barthelemy', 'BL', NULL, NULL),
(188, 'Saint Helena', 'SH', NULL, NULL),
(189, 'Saint Kitts and Nevis', 'KN', NULL, NULL),
(190, 'Saint Lucia', 'LC', NULL, NULL),
(191, 'Saint Martin', 'MF', NULL, NULL),
(192, 'Saint Pierre and Miquelon', 'PM', NULL, NULL),
(193, 'Saint Vincent and the Grenadines', 'VC', NULL, NULL),
(194, 'Samoa', 'WS', NULL, NULL),
(195, 'San Marino', 'SM', NULL, NULL),
(196, 'Sao Tome and Principe', 'ST', NULL, NULL),
(197, 'Saudi Arabia', 'SA', NULL, NULL),
(198, 'Senegal', 'SN', NULL, NULL),
(199, 'Serbia', 'RS', NULL, NULL),
(200, 'Seychelles', 'SC', NULL, NULL),
(201, 'Sierra Leone', 'SL', NULL, NULL),
(202, 'Singapore', 'SG', NULL, NULL),
(203, 'Sint Maarten (Dutch part)', 'SX', NULL, NULL),
(204, 'Slovakia', 'SK', NULL, NULL),
(205, 'Slovenia', 'SI', NULL, NULL),
(206, 'Solomon Islands', 'SB', NULL, NULL),
(207, 'Somalia', 'SO', NULL, NULL),
(208, 'South Africa', 'ZA', NULL, NULL),
(209, 'South Georgia and the South Sandwich Islands', 'GS', NULL, NULL),
(210, 'Spain', 'ES', NULL, NULL),
(211, 'Sri Lanka', 'LK', NULL, NULL),
(212, 'Sudan', 'SD', NULL, NULL),
(213, 'Suriname', 'SR', NULL, NULL),
(214, 'Svalbard and Jan Mayen', 'SJ', NULL, NULL),
(215, 'Swaziland', 'SZ', NULL, NULL),
(216, 'Sweden', 'SE', NULL, NULL),
(217, 'Switzerland', 'CH', NULL, NULL),
(218, 'Syrian Arab Republic', 'SY', NULL, NULL),
(219, 'Taiwan', 'TW', NULL, NULL),
(220, 'Tajikistan', 'TJ', NULL, NULL),
(221, 'Tanzania, United Republic of', 'TZ', NULL, NULL),
(222, 'Thailand', 'TH', NULL, NULL),
(223, 'Timor-Leste', 'TL', NULL, NULL),
(224, 'Togo', 'TG', NULL, NULL),
(225, 'Tokelau', 'TK', NULL, NULL),
(226, 'Tonga', 'TO', NULL, NULL),
(227, 'Trinidad and Tobago', 'TT', NULL, NULL),
(228, 'Tunisia', 'TN', NULL, NULL),
(229, 'Turkey', 'TR', NULL, NULL),
(230, 'Turkmenistan', 'TM', NULL, NULL),
(231, 'Turks and Caicos Islands', 'TC', NULL, NULL),
(232, 'Tuvalu', 'TV', NULL, NULL),
(233, 'Uganda', 'UG', NULL, NULL),
(234, 'Ukraine', 'UA', NULL, NULL),
(235, 'United Arab Emirates', 'AE', NULL, NULL),
(236, 'United Kingdom', 'GB', NULL, NULL),
(237, 'United States', 'US', NULL, NULL),
(238, 'United States Minor Outlying Islands', 'UM', NULL, NULL),
(239, 'Uruguay', 'UY', NULL, NULL),
(240, 'Uzbekistan', 'UZ', NULL, NULL),
(241, 'Vanuatu', 'VU', NULL, NULL),
(242, 'Venezuela', 'VE', NULL, NULL),
(243, 'Vietnam', 'VN', NULL, NULL),
(244, 'Virgin Islands, British', 'VG', NULL, NULL),
(245, 'Virgin Islands, U.S.', 'VI', NULL, NULL),
(246, 'Wallis and Futuna', 'WF', NULL, NULL),
(247, 'Western Sahara', 'EH', NULL, NULL),
(248, 'Yemen', 'YE', NULL, NULL),
(249, 'Zambia', 'ZM', NULL, NULL),
(250, 'Zimbabwe', 'ZW', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `currencies`
--

CREATE TABLE `currencies` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `currencies`
--

INSERT INTO `currencies` (`id`, `name`, `code`, `created_at`, `updated_at`) VALUES
(1, 'US Dollar', 'USD', NULL, NULL),
(2, 'New Zealand Dollar', 'NZD', NULL, NULL),
(3, 'Australian Dollar', 'AUD', NULL, NULL),
(4, 'British Pounds', 'GBP', NULL, NULL),
(5, 'HongKong Dollar', 'HKD', NULL, NULL),
(6, 'Singapore Dollar', 'SGD', NULL, NULL),
(7, 'Euro', 'EUR', NULL, NULL),
(8, 'Canadian Dollar', 'CAD', NULL, NULL),
(9, 'Indian Rupee', 'INR', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `designations`
--

CREATE TABLE `designations` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bonus_amount` int DEFAULT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `designations`
--

INSERT INTO `designations` (`id`, `name`, `bonus_amount`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Internee', 500, 'active', '2021-04-07 08:09:28', '2021-04-07 08:09:47');

-- --------------------------------------------------------

--
-- Table structure for table `enders`
--

CREATE TABLE `enders` (
  `id` bigint UNSIGNED NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `copied_counter` int NOT NULL DEFAULT '0',
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `enders`
--

INSERT INTO `enders` (`id`, `description`, `copied_counter`, `status`, `created_at`, `updated_at`) VALUES
(1, 'I am willing to provide you with intricate details that will get your project started. \r\nLooking forward to your response.', 0, 'active', '2021-07-09 18:02:50', '2021-07-09 18:02:50'),
(2, 'I am ready to initiate your project and discuss valuable Insights. \r\nLooking forward to your response.', 0, 'active', '2021-07-09 18:04:34', '2021-07-09 18:04:34'),
(3, 'I have valuable insights regarding your project, that we can discuss in a chat ahead.\r\nGet in touch soon.', 0, 'active', '2021-07-09 18:05:46', '2021-07-09 18:05:46'),
(4, 'You will be astonished to hear more about my strategy to get your project delivered.\r\nLooking forward to wor with you.', 0, 'active', '2021-07-09 18:06:43', '2021-07-09 18:06:43'),
(5, 'You can expect to get the best output from my end. I have more information to share.\r\nLooking forward to your response.', 0, 'active', '2021-07-09 18:07:48', '2021-07-09 18:07:48'),
(6, 'I am keenly interested to get your project started.\r\nDrop a line and get started.', 0, 'active', '2021-07-09 18:08:40', '2021-07-09 18:08:40'),
(7, 'I hope to get along with you for this project as I have a strong proposition to bring your idea to life. \r\nLooking forward to your response.\r\nThank you.', 0, 'active', '2021-07-12 09:50:32', '2021-07-12 09:50:32'),
(8, 'My proposition to take your project ahead with a proven strategy, opening exciting corridors for you, is just a call away. \r\nLooking forward to getting started.', 0, 'active', '2021-07-12 09:54:23', '2021-07-12 09:55:09'),
(9, 'I prefer to discuss the project details ahead on chat and give my views to take your project forward. \r\nTruly thankful for your consideration.', 0, 'active', '2021-07-12 11:02:16', '2021-07-12 11:02:16'),
(10, 'I prefer to discuss the project details ahead on chat and give valuable insight to take your project forward. \r\nHope to hear from you soon.', 0, 'active', '2021-07-12 11:02:19', '2021-07-12 11:05:17'),
(11, 'I am looking forward to hearing from you to take your project forward. \r\nThanks', 0, 'active', '2021-07-12 11:09:32', '2021-07-12 11:09:32'),
(12, 'I never settle for average results as I have strong Insightful Views and Sustainability.\r\nLooking forward to discussing your project ahead.', 0, 'active', '2021-07-12 11:13:01', '2021-07-12 11:13:01'),
(13, 'The project sounds creative, and I might have some brilliant ideas that can uplift your project. \r\nI will be thankful if we initiate a chat to move ahead.', 0, 'active', '2021-07-12 11:18:56', '2021-07-12 11:18:56'),
(14, 'The project caught my attention, and the intriguing details have helped me develop some ideas to take it forward.\r\nI will be thankful if allowed to share my views.', 0, 'active', '2021-07-12 11:22:26', '2021-07-12 11:22:26'),
(15, 'The project details have increased my curiosity. I have various plans in my mind to take it to the next level. \r\nI will gladly share my views if given a chance.', 0, 'active', '2021-07-12 11:26:25', '2021-07-12 11:26:25'),
(16, 'I can share additional information and discuss in chat my strategy for your project.\r\nLooking forward to your response.', 0, 'active', '2021-07-12 11:29:53', '2021-07-12 11:29:53'),
(17, 'If you would like to move forward with our proposal, please get in touch to discuss and plan the next steps right away.\r\nTruly thankful for your time.', 0, 'active', '2021-07-12 11:41:45', '2021-07-12 11:41:45'),
(18, 'Well, we can work to put bring the best outcome to your project. I hope to hear from you soon. \r\nThank you for your precious time.', 0, 'active', '2021-07-12 11:47:48', '2021-07-12 11:47:48'),
(19, 'Kindly get in touch, so we begin the discussion and planning of your project. \r\nThank you for reviewing my proposal.', 0, 'active', '2021-07-12 11:50:07', '2021-07-12 11:50:07'),
(20, 'If this proposal sounds promising, you should not wait and get in touch straight away to begin. \r\nI am thankful for your time and consideration.', 0, 'active', '2021-07-12 11:55:51', '2021-07-12 11:55:51'),
(21, 'If the proposal sounds intriguing, you should get in touch, so I provide you more interesting concepts relevant to the project. \r\nI am thankful for reviewing my proposal.', 0, 'active', '2021-07-12 11:58:10', '2021-07-12 11:58:10'),
(22, 'I am sure this proposal has left some questions unanswered. I am willing to help clarify any confusion and start the project. \r\nGet in touch now.  Thank you.', 0, 'active', '2021-07-12 12:02:13', '2021-07-12 12:02:13'),
(23, 'We can move ahead with your project by clarifying any ambiguity. Leave a message to discuss ahead.\r\nTruly grateful for your time.', 0, 'active', '2021-07-12 12:05:28', '2021-07-12 12:05:28'),
(24, 'I hope this proposal clarifies my vision to initiate your project. To discuss any ambiguities, please get in touch.\r\nReally grateful for your time.', 0, 'active', '2021-07-12 12:07:53', '2021-07-12 12:07:53'),
(25, 'Feel free to reach out in case you have questions left unanswered. I will readily discuss my plan to initiate and take your project ahead.', 0, 'active', '2021-07-12 12:11:03', '2021-07-12 12:11:03'),
(26, 'I am always open to discuss, so feel free to reach out. I will be glad to help you get your objective. \r\nThank you for your time.', 0, 'active', '2021-07-12 12:16:44', '2021-07-12 12:16:44'),
(27, 'I hope the information above was useful. I am always available to discuss important details to move your project ahead. \r\nLooking forward to a pleasant discussion.', 0, 'active', '2021-07-12 12:19:28', '2021-07-12 12:19:28'),
(28, 'Your project sounds productive and has great potential. I am really looking forward to start this project.\r\nGet in touch so I provide you my plan to take it ahead.', 0, 'active', '2021-07-12 12:25:31', '2021-07-12 12:25:31'),
(29, 'Looking forward to discussing and launching your project to success.  \r\nJust drop a line, and I will be with you in no time', 0, 'active', '2021-07-12 12:34:36', '2021-07-12 12:34:36'),
(30, 'Discussing your project will give you a better approach to take it forward. \r\nI look forward to having a chat to begin ahead.', 0, 'active', '2021-07-12 12:37:10', '2021-07-12 12:37:10'),
(31, 'I am excited to work on this project with you, and I can also share an outline I created just for your project.\r\nLooking forward to your response.', 0, 'active', '2021-07-12 17:06:06', '2021-07-12 17:06:06'),
(32, 'Looking forward to bring your project to life. I can provide some interesting statistics and strategies to get your project started.\r\nHoping to get a reply.', 0, 'active', '2021-07-12 17:07:57', '2021-07-12 17:07:57'),
(33, 'Your project got me hooked, and I have developed a strategy to take it forward after in-depth research.\r\nGet in touch to start your project right away', 0, 'active', '2021-07-12 17:09:11', '2021-07-12 17:09:11'),
(34, 'I found your project interesting to work on and have researched my way to create a project outline. \r\nI can provide you the details to start your project.', 0, 'active', '2021-07-12 17:10:51', '2021-07-12 17:10:51'),
(35, 'Your project got me hooked, and I have already created a timeline to take it ahead. \r\nLooking forward to your positive response.', 0, 'active', '2021-07-12 17:12:49', '2021-07-12 17:12:49'),
(36, 'Your project motivated me, and I have some brilliant ideas to take it ahead. \r\nI will be thankful for your brief time to discuss the details.', 0, 'active', '2021-07-12 17:14:28', '2021-07-12 17:14:28'),
(37, 'I always put and extra effort into my work. I would love to hop on a call and discuss the plan to take your project ahead.', 0, 'active', '2021-07-12 17:19:02', '2021-07-12 17:19:02'),
(38, 'Your project truly mesmerized me and I would feel honored to include your project in my work portfolio.', 0, 'active', '2021-07-12 17:19:52', '2021-07-12 17:19:52'),
(39, 'Your project inspired me, and I wish to execute it to perfection. \r\nI would be thankful if provided a chance to take on such an opportunity.', 0, 'active', '2021-07-12 17:21:55', '2021-07-12 17:21:55'),
(40, 'Your project looks promising, and I have ideas popping up right away. \r\nLooking forward to initiating the project.', 0, 'active', '2021-07-12 17:24:02', '2021-07-12 17:24:02'),
(41, 'I plan to bring your brilliant project to life. I have already done some groundwork and wish to discuss the details with you ahead.', 0, 'active', '2021-07-12 17:26:08', '2021-07-12 17:26:08'),
(42, 'I have developed some interesting strategies to make our project fruitful. \r\nFeel free to discuss the strategy ahead.', 0, 'active', '2021-07-12 17:27:09', '2021-07-12 17:27:09'),
(43, 'If this proposal sounds good you better hear about the strategy I have devised to execute your project. \r\nGet in touch to get started.', 0, 'active', '2021-07-12 17:28:37', '2021-07-12 17:28:37'),
(44, 'I look forward to work on this project and many others with you. I have some details to share so drop a message.', 0, 'active', '2021-07-12 17:29:34', '2021-07-12 17:29:34'),
(45, 'I am pursuing to create a worldly project for you. I have already done some groundwork. \r\nLet\'s get talking and initiate your project.', 0, 'active', '2021-07-12 17:31:36', '2021-07-12 17:31:36'),
(46, 'Your project got me hooked, and I wish to take it forward. \r\nKindly spare a few minutes so I can share some ideas to get started.', 0, 'active', '2021-07-12 17:33:14', '2021-07-12 17:33:14'),
(47, 'I found your project intriguing and would love to execute it perfectly. \r\nI would be thankful if you took out a few minutes to discuss the plan ahead.', 0, 'active', '2021-07-12 17:34:51', '2021-07-12 17:34:51'),
(48, 'I have some crucial ideas that might be revolutionary for your project.\r\nLooking forward to discuss this with you.', 0, 'active', '2021-07-12 17:36:09', '2021-07-12 17:36:09'),
(49, 'I have planned out a beautiful execution strategy. \r\nFeel free to reach out.', 0, 'active', '2021-07-12 17:37:07', '2021-07-12 17:37:07'),
(50, 'If you find this proposal promising, you can always reach out to discuss details ahead.\r\nLooking forward to your response.', 0, 'active', '2021-07-12 17:51:46', '2021-07-12 17:51:46'),
(51, 'I hope this proposal sounds intriguing to you. We can always discuss the prospect for your project. \r\nLooking forward to your feedback.', 0, 'active', '2021-07-12 17:52:51', '2021-07-12 17:52:51'),
(52, 'I am keenly looking forward to pursuing this project. I have already formulated a plan and look forward to discussing it with you.', 0, 'active', '2021-07-12 17:53:56', '2021-07-12 17:53:56'),
(53, 'The plan to take your project ahead involves a strong outline.\r\nI will look forward to share interesting details through chat.', 0, 'active', '2021-07-12 17:55:36', '2021-07-12 17:55:36'),
(54, 'Your project got me hooked, and I have already formulated a plan to execute it. \r\nLooking forward to your reply.', 0, 'active', '2021-07-12 17:56:48', '2021-07-12 17:56:48'),
(55, 'It\'s an interesting project to work on, and I have developed some insight I would like to share. \r\nKindly drop a line to discuss ahead.', 0, 'active', '2021-07-12 17:58:08', '2021-07-12 17:58:08'),
(56, 'I would love to share some intricate details I have to initiate your project.\r\nFeel free to reach out.', 0, 'active', '2021-07-12 17:58:56', '2021-07-12 17:58:56'),
(57, 'I am glad to share more information on your project. \r\nLooking forward to discussing with you.', 0, 'active', '2021-07-12 17:59:40', '2021-07-12 17:59:40'),
(58, 'I found your project interesting and have created an outline after careful assessment.\r\nIt will be impactful and fruitful, so let\'s discuss it on the call.', 0, 'active', '2021-07-12 18:00:56', '2021-07-12 18:00:56'),
(59, 'I propose to provide you an outline before you look to initiate your project. \r\nI will look forward to your response to discuss ahead.', 0, 'active', '2021-07-12 18:02:14', '2021-07-12 18:02:14'),
(60, 'After careful analysis of your project, I have developed a visionary plan. \r\nReady to discuss! Drop a message.', 0, 'active', '2021-07-12 18:03:44', '2021-07-12 18:03:59'),
(61, 'I am ready to take on your project with a solid plan. Looking forward to providing crucial information to you.', 0, 'active', '2021-07-12 18:05:10', '2021-07-12 18:05:10'),
(62, 'I am willing to take your project ahead with a solid strategy. I am always open to discuss with you.\r\nLooking forward to your response.', 0, 'active', '2021-07-13 09:24:59', '2021-07-13 09:24:59'),
(63, 'I plan to take your project ahead with a solid strategy. I have some crucial detail that could be helpful fr your project.\r\nLooking forward to sharing the details on chat.', 0, 'active', '2021-07-13 09:26:48', '2021-07-13 09:26:48'),
(64, 'I have done some homework regarding your project, and I wish to share the details with you.\r\nWaiting to hear from you to get started.', 0, 'active', '2021-07-13 09:29:23', '2021-07-13 09:29:23'),
(65, 'As I have done some groundwork on your project, I wish o share some startling ideas to initiate the project. \r\nGet in touch to discuss ahead.', 0, 'active', '2021-07-13 09:31:17', '2021-07-13 09:31:17'),
(66, 'I have worked to build a solid strategy for your project. We can discuss the details ahead.\r\nWaiting to hear from you.', 0, 'active', '2021-07-13 09:36:22', '2021-07-13 09:36:22'),
(67, 'I am pursuing to start your project and have devised a robust plan for it. \r\nLooking forward to discussing the details.', 0, 'active', '2021-07-13 09:37:38', '2021-07-13 09:37:38'),
(68, 'I am pursuing to initiate your project, and I have already devised a robust strategy to take it forward. \r\nLooking forward to discussing the details.', 0, 'active', '2021-07-13 09:39:43', '2021-07-13 09:40:15'),
(69, 'Devising a strong plan ahead for our project requires a brief discussion with you.\r\nWaiting to hear from you.', 0, 'active', '2021-07-13 09:41:22', '2021-07-13 09:41:22'),
(70, 'I am devising a robust plan to start your project. We can always discuss via chat.\r\nWaiting to hear from you.', 0, 'active', '2021-07-13 09:44:25', '2021-07-13 09:44:49'),
(71, 'Your project got me hooked and I have created an outline to direct your project ahead. \r\nLooking forward to discuss the details.', 0, 'active', '2021-07-13 11:28:35', '2021-07-13 11:28:35'),
(72, 'Your project sounds promising and interesting. Therefore I have already created an outline to move ahead. \r\nYou can reach out here to discuss the details.', 0, 'active', '2021-07-13 11:30:20', '2021-07-13 11:30:20'),
(73, 'Your interesting project got my attention, and I have already sorted out a strategy to take it forward. \r\nLooking forward to discussing this ahead.', 0, 'active', '2021-07-13 11:31:26', '2021-07-13 11:31:26'),
(74, 'I am highly motivated to begin your project. Looking forward to an excellent experience.\r\nYou can reach out here to discuss the plan ahead.', 0, 'active', '2021-07-13 11:33:01', '2021-07-13 11:33:01'),
(75, 'It\'s an interesting project to work on, and I have a robust plan to execute it.\r\nYou can reach out to discuss the details.', 0, 'active', '2021-07-13 11:37:49', '2021-07-13 11:37:49'),
(76, 'Your project sounds inspirational, and I aim to deliver it for you. \r\nLooking forward to your response.', 0, 'active', '2021-07-13 11:39:00', '2021-07-13 11:39:00'),
(77, 'I found our project interesting and have a strong intention to deliver it with perfection. \r\nYou can reach out to get started.', 0, 'active', '2021-07-13 11:42:19', '2021-07-13 11:42:19'),
(78, 'Your project got me hooked, and I am fully committed to delivering it with excellence. \r\nLooking forward to working with you.', 0, 'active', '2021-07-13 11:44:18', '2021-07-13 11:44:18'),
(79, 'I have created a well-deined outline to execute your project. \r\nLooking to discuss the details with you.', 0, 'active', '2021-07-13 11:46:08', '2021-07-13 11:46:08'),
(80, 'Your interesting project got my attention. So I did some research to ideate on your project. \r\nWaiting to hear from you to get started.', 0, 'active', '2021-07-13 11:49:35', '2021-07-13 11:49:35');

-- --------------------------------------------------------

--
-- Table structure for table `excludes`
--

CREATE TABLE `excludes` (
  `id` bigint UNSIGNED NOT NULL,
  `countries` json DEFAULT NULL,
  `currencies` json DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `freelancer_api_clients`
--

CREATE TABLE `freelancer_api_clients` (
  `id` bigint UNSIGNED NOT NULL,
  `client_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `auth_key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('connected','invalid') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'invalid',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `freelancer_api_clients`
--

INSERT INTO `freelancer_api_clients` (`id`, `client_id`, `auth_key`, `status`, `created_at`, `updated_at`) VALUES
(1, '53598218', 'FBK1GHW5um3R6nIXJlS7baqTm6aGPR', 'connected', '2021-04-05 18:06:43', '2021-04-05 18:06:43');

-- --------------------------------------------------------

--
-- Table structure for table `industries`
--

CREATE TABLE `industries` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `industry_item`
--

CREATE TABLE `industry_item` (
  `id` bigint UNSIGNED NOT NULL,
  `industry_id` int NOT NULL,
  `item_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `details` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `item_skill`
--

CREATE TABLE `item_skill` (
  `id` bigint UNSIGNED NOT NULL,
  `item_id` int NOT NULL,
  `skill_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `item_type`
--

CREATE TABLE `item_type` (
  `id` bigint UNSIGNED NOT NULL,
  `item_id` int NOT NULL,
  `type_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `languages`
--

CREATE TABLE `languages` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `languages`
--

INSERT INTO `languages` (`id`, `name`, `code`, `created_at`, `updated_at`) VALUES
(1, 'English', 'en', '2021-04-05 18:06:43', '2021-04-05 18:06:43'),
(2, 'Português', 'pt', '2021-04-05 18:06:43', '2021-04-05 18:06:43'),
(3, 'Français', 'fr', '2021-04-05 18:06:43', '2021-04-05 18:06:43'),
(4, 'Türkçe', 'tr', '2021-04-05 18:06:43', '2021-04-05 18:06:43');

-- --------------------------------------------------------

--
-- Table structure for table `language_project_filter`
--

CREATE TABLE `language_project_filter` (
  `id` bigint UNSIGNED NOT NULL,
  `language_id` int NOT NULL,
  `project_filter_id` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `language_project_filter`
--

INSERT INTO `language_project_filter` (`id`, `language_id`, `project_filter_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `leaves`
--

CREATE TABLE `leaves` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` int NOT NULL,
  `reason` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `leave_date` date DEFAULT NULL,
  `leave_date_from` date DEFAULT NULL,
  `leave_date_to` date DEFAULT NULL,
  `leave_time_from` time DEFAULT NULL,
  `leave_time_to` time DEFAULT NULL,
  `type` enum('short_leave','half_day','full_day','multiple_days') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'short_leave',
  `status` enum('pending','accepted','rejected') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `live_feeds`
--

CREATE TABLE `live_feeds` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` int NOT NULL,
  `project_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `seo_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `preview_description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `budget` json DEFAULT NULL,
  `currency` json DEFAULT NULL,
  `upgrades` json DEFAULT NULL,
  `bid_stats` json DEFAULT NULL,
  `reputation` json DEFAULT NULL,
  `time_submitted` int DEFAULT NULL,
  `time_updated` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `live_feed_details`
--

CREATE TABLE `live_feed_details` (
  `id` bigint UNSIGNED NOT NULL,
  `live_feed_id` int NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `jobs` json DEFAULT NULL,
  `attachments` json DEFAULT NULL,
  `reputation` json DEFAULT NULL,
  `status` json DEFAULT NULL,
  `country` json DEFAULT NULL,
  `registration_date` int DEFAULT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `public_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avatar_cdn` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `live_feed_proposals`
--

CREATE TABLE `live_feed_proposals` (
  `id` bigint UNSIGNED NOT NULL,
  `bid_id` int NOT NULL,
  `live_feed_id` int NOT NULL,
  `bidder_id` int NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `public_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tagline` text COLLATE utf8mb4_unicode_ci,
  `avatar_cdn` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount` decimal(8,2) DEFAULT NULL,
  `period` int DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `submitdate` int DEFAULT NULL,
  `reputation` json DEFAULT NULL,
  `country` json DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2021_02_18_114915_create_designations_table', 1),
(5, '2021_02_23_100601_create_items_table', 1),
(6, '2021_02_23_103328_create_skills_table', 1),
(7, '2021_02_23_103523_create_types_table', 1),
(8, '2021_02_23_103554_create_industries_table', 1),
(9, '2021_02_23_140013_create_item_skill_table', 1),
(10, '2021_02_23_140631_create_industry_item_table', 1),
(11, '2021_02_23_140649_create_item_type_table', 1),
(12, '2021_02_23_153535_create_starters_table', 1),
(13, '2021_02_24_100007_create_tech_stars_table', 1),
(14, '2021_02_24_100255_create_enders_table', 1),
(15, '2021_02_24_100317_create_portfolio_initiators_table', 1),
(16, '2021_02_24_123114_create_leaves_table', 1),
(17, '2021_03_02_102932_create_options_table', 1),
(18, '2021_03_08_124429_create_sessions_table', 1),
(19, '2021_03_15_161739_create_project_filters_table', 1),
(20, '2021_03_15_174641_create_project_filter_skill_table', 1),
(21, '2021_03_16_130037_create_languages_table', 1),
(22, '2021_03_16_133945_create_language_project_filter_table', 1),
(23, '2021_03_17_124208_create_live_feeds_table', 1),
(24, '2021_03_18_121919_create_live_feed_details_table', 1),
(25, '2021_03_19_123454_create_live_feed_proposals_table', 1),
(26, '2021_03_22_145627_create_projects_table', 1),
(27, '2021_03_24_153146_create_project_details_table', 1),
(28, '2021_03_24_160337_create_project_proposals_table', 1),
(29, '2021_03_25_123226_create_apis_table', 1),
(30, '2021_03_30_152507_create_freelancer_api_clients_table', 1),
(31, '2021_04_02_105605_create_countries_table', 1),
(32, '2021_04_02_113431_create_currencies_table', 1),
(33, '2021_04_02_120111_create_excludes_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `options`
--

CREATE TABLE `options` (
  `id` bigint UNSIGNED NOT NULL,
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `options`
--

INSERT INTO `options` (`id`, `key`, `value`, `created_at`, `updated_at`) VALUES
(1, 'phase_2', 'inactive', '2021-04-05 18:06:43', '2021-04-05 18:06:43');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `portfolio_initiators`
--

CREATE TABLE `portfolio_initiators` (
  `id` bigint UNSIGNED NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `copied_counter` int NOT NULL DEFAULT '0',
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `portfolio_initiators`
--

INSERT INTO `portfolio_initiators` (`id`, `description`, `copied_counter`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Graphic Design- I was amazed when I read your job description as I just completed a very similar project. \r\nPlease check out here:', 0, 'active', '2021-07-13 15:32:38', '2021-07-13 15:32:38'),
(2, 'Logo design- I have created logo designs for various multinational companies. \r\nKindly visit the link below.', 0, 'active', '2021-07-13 15:38:02', '2021-07-13 15:38:02'),
(3, 'Ecommerce- I have created various e-commerce websites ranging from clothing brands to grocery stores and baby products. \r\nYou can view my work here.', 0, 'active', '2021-07-13 15:41:01', '2021-07-13 15:41:41'),
(4, 'Wordpress- I have developed various high-quality Wordpress sites. You can view the websites and my Plugins below.', 0, 'active', '2021-07-13 15:42:49', '2021-07-13 15:42:49'),
(5, 'UI/UX- I have just completed a UI/ UX of a project similar to yours. You can check out the recent UI/UX project and my other works in my Portfolio.', 0, 'active', '2021-07-13 16:02:16', '2021-07-13 16:02:16'),
(6, 'SEO- I have helped various websites ran among the best search engines. You can view my recent work through the link below.', 0, 'active', '2021-07-13 16:03:28', '2021-07-13 16:03:28'),
(7, 'Full-stack developer- I have provided front-end and back-end service to various international organizations. You can check out my work here.', 0, 'active', '2021-07-13 16:04:45', '2021-07-13 16:04:45'),
(8, 'Web design- I have designed and developed websites and apps for renowned companies across the globe. \r\nFind out links to my work here.', 0, 'active', '2021-07-13 16:06:15', '2021-07-13 16:08:41'),
(9, 'Graphic Design- I have created stunning and creative graphical elements to be displayed digitally. \r\nPlease have a look at my finest works.', 0, 'active', '2021-07-13 16:11:15', '2021-07-13 16:11:15'),
(10, 'SEM-I have helped websites get featured through search engine marketing campaigns. have a look at my finest work here.', 0, 'active', '2021-07-13 16:11:23', '2021-07-13 16:11:23'),
(11, 'Wordpress plugins- I have created useful Wordpress plugins and also customize them. You can check out my WordPress plugins here.', 0, 'active', '2021-07-13 16:12:28', '2021-07-13 16:12:28'),
(12, 'Ecommerce- I have immense experience in developing e-commerce websites. I can easily maintain, edit and modify your site. Check out my previous work.', 0, 'active', '2021-07-13 16:34:07', '2021-07-13 16:34:07'),
(13, 'UI/ UX- I have created a similar project earlier to give you an idea about my skillset. You can analyze this project and other projects in the links below.', 0, 'active', '2021-07-13 16:38:06', '2021-07-13 16:38:06'),
(14, 'Web development- I recently have been working on websites that have similar development requirements to yours. \r\nYou can view these projects in the links given below.', 0, 'active', '2021-07-13 16:43:11', '2021-07-13 16:43:11'),
(15, 'SMM- I am running a social media campaign similar to yours that has been viral. Have a look at his campaign and others, which have gained a huge following.', 0, 'active', '2021-07-13 16:45:15', '2021-07-13 16:45:15'),
(16, 'Logo design- I just designed a classy logo for a client with similar requirements. You can check this logo out along with my other projects.', 0, 'active', '2021-07-13 16:47:34', '2021-07-13 16:47:34'),
(17, 'Graphic design- I created attractive content with a layout and typography you would definitely like. Please give them a look at my portfolio.', 0, 'active', '2021-07-13 16:49:58', '2021-07-13 16:49:58'),
(18, 'Wordpress- I have developed a beautiful website with a theme pattern you would enjoy. Please give it a look at this link.', 0, 'active', '2021-07-13 16:51:09', '2021-07-13 16:51:09'),
(19, 'SEO- I recently helped improve the ranking and traffic for a brand similar to yours. Give a look at the campaign here.', 0, 'active', '2021-07-13 16:52:34', '2021-07-13 16:52:34'),
(20, 'Ecommerce- I have worked with international e-commerce brands. You can find my e-commerce sites here.', 0, 'active', '2021-07-13 16:54:02', '2021-07-13 16:54:02'),
(21, 'Mobile application- I recently created a cross-platform mobile application for this multinational company. Kindly view the website here.', 0, 'active', '2021-07-13 16:55:33', '2021-07-13 16:55:33'),
(22, 'Web Design- I create user-friendly websites with innovative designs. Discover the best projects I recently delivered.', 0, 'active', '2021-07-13 16:56:55', '2021-07-13 16:56:55'),
(23, 'Logo Design- I have widescale experience creating brand-specific logos. You can discover the best logos that bring out brand identities here.', 0, 'active', '2021-07-13 16:59:01', '2021-07-13 16:59:01'),
(24, 'WordPress- I recently created a productive website for a Blog similar to your project. You can view my work at the link given below.', 0, 'active', '2021-07-13 17:02:37', '2021-07-13 17:02:37'),
(25, 'Graphic designer-  I created a minimalistic website design recently. You can check it out to get inspiration for your brand.', 0, 'active', '2021-07-13 17:04:25', '2021-07-13 17:04:25'),
(26, 'Mobile Application- I create highly engaging and interactive applications which are compatible with different mobile apps. You can observe my portfolio here', 0, 'active', '2021-07-13 17:07:00', '2021-07-13 17:07:00'),
(27, 'Ecommerce- I have proven experience with Woocommerce plugins. You can check out my work similar to your project below.', 0, 'active', '2021-07-13 17:08:36', '2021-07-13 17:08:36'),
(28, 'Full-stack developer- I developed this website using Mean/Mern stack technology to improve functionality. You can find this project here.', 0, 'active', '2021-07-13 17:15:07', '2021-07-13 17:15:07'),
(29, 'Wordpress plugins- I have written a couple of WordPress plugins relevant to your work. Take a look below.', 0, 'active', '2021-07-13 17:17:03', '2021-07-13 17:17:03'),
(30, 'SE0/SEM- I have worked with google adwords to improve the training and audience outreach. Check out my work in the link below.', 0, 'active', '2021-07-13 17:18:38', '2021-07-13 17:19:57'),
(31, 'UI/UX- I have created highly engaging UI and UX and optimized the website for a renowned business.  You can view my work here.', 0, 'active', '2021-07-13 17:21:24', '2021-07-13 17:21:24'),
(32, 'Website developer-  Developed a sleek website with outstanding interface and experience. Check out this website below.', 0, 'active', '2021-07-13 17:25:39', '2021-07-13 17:25:39'),
(33, 'SMM- I managed the social media of this company from the same industry as yours. You can view the campaign and its success rate n the provided links.', 0, 'active', '2021-07-13 17:26:52', '2021-07-13 17:26:52'),
(34, 'Logo Design- I created an animated logo for the website of this huge firm. You can get a good idea about my work from my portfolio.', 0, 'active', '2021-07-13 17:28:09', '2021-07-13 17:28:09'),
(35, 'Ecommerce- I created this well-organized e-commerce website with categories of web pages. You can view all my e-commerce projects below.', 0, 'active', '2021-07-13 17:29:45', '2021-07-13 17:29:45'),
(36, 'Ecommerce- I can create exceptional and elegant e-commerce websites that will keep your customers hooked. You can give a look at my previous work here.', 0, 'active', '2021-07-13 17:47:43', '2021-07-13 17:48:10'),
(37, 'Full-stack developer- I have created websites and apps using cornerstone technology. You can check out my technology stack from my previous projects.', 0, 'active', '2021-07-13 17:49:55', '2021-07-13 17:49:55'),
(38, 'Graphic design- I have created visually attractive graphical content for websites globally. You can review all my work in my portfolio.', 0, 'active', '2021-07-13 17:52:08', '2021-07-13 17:52:08'),
(39, 'SEO- I have proven experience in gaining organic traffic to websites. You can see my work below.', 0, 'active', '2021-07-13 17:53:23', '2021-07-13 17:53:23'),
(40, 'Graphic design- Creating graphical templates that depict your imagination and ideas is my specialty. I have worked with diverse projects, so check them out.', 0, 'active', '2021-07-13 17:55:43', '2021-07-13 17:56:11'),
(41, 'Graphic Design- I work to create modern designs and bring innovation to your digital platform. So, discover my work here.', 0, 'active', '2021-07-13 17:59:09', '2021-07-13 17:59:09'),
(42, 'Web Design- I design websites that truly represent your brand identity and leave an inspiring first impression on your audience. You can check out the previous work I have done here.', 0, 'active', '2021-07-13 18:03:08', '2021-07-13 18:03:08'),
(43, 'SMM- I keep your social media updated and engage your audience. You can see my proven campaigns in the links below.', 0, 'active', '2021-07-13 18:04:53', '2021-07-13 18:04:53'),
(44, 'WordPress PLugins- I develop plugins that help the functionality of your CMS sites. View work similar to your project here.', 0, 'active', '2021-07-13 18:06:52', '2021-07-13 18:06:52'),
(45, 'Ecommerce- I create engaging e-commerce websites to get your customers buying. View my previous success stories here.', 0, 'active', '2021-07-13 18:08:20', '2021-07-13 18:08:20'),
(46, 'Mobile Application- I have developed mobile apps using hybrid platforms.  You can view my successful mobile applications here.', 0, 'active', '2021-07-13 18:11:25', '2021-07-13 18:11:25'),
(47, 'Logo design- I design highly graphical logos for enterprises and brands. You can find inspiration from my portfolio here.', 0, 'active', '2021-07-13 18:14:38', '2021-07-13 18:14:38'),
(48, 'Web Development- I create agile websites and apps using cutting-edge technology. You can find my portfolio below.', 0, 'active', '2021-07-13 18:15:51', '2021-07-13 18:15:51'),
(49, 'SEO- I work with a well-organized strategy to bring an organic audience to your page.  Check out my successful campaigns here.', 0, 'active', '2021-07-13 18:17:59', '2021-07-13 18:17:59'),
(50, 'Graphic Design- I love to create innovative and creative designs. You can discover my sleek and elegant work below.', 0, 'active', '2021-07-13 18:19:20', '2021-07-13 18:19:20'),
(51, 'WordPress - As a highly skilled WordPress developer, I wish to give you an excellent experience. \r\nYou can get in touch to discuss important details.', 0, 'active', '2021-07-14 09:45:40', '2021-07-14 09:45:40'),
(52, 'UI/UX- I have brilliant design ideas in my mind for your web app that will give aesthetic visuals to your audience. \r\nYou can view my portfolio for references.', 0, 'active', '2021-07-14 09:51:20', '2021-07-14 09:53:51'),
(53, 'Full-stack Developer- I specialize in developing across a full range of technologies, from front-end prototyping to a complete set of back-end services. View the links below to find out more.', 0, 'active', '2021-07-14 09:52:51', '2021-07-14 09:54:39'),
(54, 'SMM- Your brand sounds entertaining, and I have created highly engaging campaigns similar to your brand earlier. \r\nYou can give them a look below.', 0, 'active', '2021-07-14 09:59:38', '2021-07-14 09:59:38'),
(55, 'Ecommerce- I recently completed an e-commerce website with the big commerce platform.\r\nMy previous work sample will help you understand how the big commerce platform is the best option for your company.', 0, 'active', '2021-07-14 10:04:12', '2021-07-14 10:04:12'),
(56, 'Logo Design- My logos depict the elegance and class of your website. You can view my portfolios to get an idea about my work.', 0, 'active', '2021-07-14 10:06:28', '2021-07-14 10:06:28'),
(57, 'Web design- I am skilled in developing and designing aesthetic websites. You can check my work in the provided links.', 0, 'active', '2021-07-14 10:09:32', '2021-07-14 10:09:32'),
(58, 'SEO- I fully optimize websites with knowledgeable and top-notch content along with offsite optimization.  You can look at my previous work to get a better idea.', 0, 'active', '2021-07-14 10:12:46', '2021-07-14 10:12:46'),
(59, 'WordPress-  Setting up and Customizing your WordPress website is our passion. You can find out the latest sites I completed similar to your requirements here.', 0, 'active', '2021-07-14 10:30:48', '2021-07-14 10:30:48'),
(60, 'Graphic design- Your concepts for the design can be an instant hit if created with creativity. I have worked on similar designs earlier, which are viewable here.', 0, 'active', '2021-07-14 10:35:30', '2021-07-14 10:35:30'),
(61, 'SEM- Your business can receive an instant boost with the marketing plan you have in mind. I can implement your strategy successfully because of my previous relevant experience you can view below.', 0, 'active', '2021-07-14 10:38:38', '2021-07-14 10:38:38'),
(62, 'UI/UX- I passionately design easy-to-use UI/UX for websites and apps. My portfolio will give you a better idea of my skill and experience, so view it below.', 0, 'active', '2021-07-14 10:40:37', '2021-07-14 10:40:37'),
(63, 'E-commerce- Getting your products to generate higher sales is simple if you got an engaging website. I have worked with various international e-commerce groups and have a distinguished portfolio that can be viewed here.', 0, 'active', '2021-07-14 10:44:11', '2021-07-14 10:44:11'),
(64, 'WordPress Plugin- to improve the functionality of a WordPress site, I can write and customize Wordpress plugins. You can find out my Plugins at the WordPress plugins store or view them in the link below.', 0, 'active', '2021-07-14 10:48:55', '2021-07-14 10:48:55'),
(65, 'Graphic design- I create a diverse range of graphical content with an innovative and aesthetic approach. You can discover my work in the portfolio below.', 0, 'active', '2021-07-14 10:50:46', '2021-07-14 10:50:46'),
(66, 'Mobile app- I have created apps with higher user engagement. You can view my recently developed apps that are similar to your project below.', 0, 'active', '2021-07-14 10:54:06', '2021-07-14 10:54:06'),
(67, 'SMM- I have managed social media for various recognized brands gaining them an audience through excellent posts and attractive captions.  I have attached the links of work similar to your project and others to give you an idea about my work.', 0, 'active', '2021-07-14 10:58:41', '2021-07-14 10:58:41'),
(68, 'Web development- I provide end-to-end web development services and create responsive websites and apps. You can view my relevant work through the provided link.', 0, 'active', '2021-07-14 11:00:03', '2021-07-14 11:00:03'),
(69, 'Logo design- The logo designs must be the true representation of the Brand Identity. I have made elegant logos for the top companies globally that you can view here.', 0, 'active', '2021-07-14 11:06:10', '2021-07-15 10:23:56'),
(70, 'SEO- I have optimized various company websites that have ranked well in search engines. You can view my best work attached below.', 0, 'active', '2021-07-14 11:07:52', '2021-07-14 11:07:52'),
(71, 'WordPress- I passionately create, customize and upgrade WordPress sites for international clients. Your work requires skills that I possess. You can view my relevant work in the provided links.', 0, 'active', '2021-07-14 11:09:56', '2021-07-14 11:09:56'),
(72, 'E-commerce- Your customers need the best digital experience to buy from you online. I have worked on e-commerce sites for international chains that are viewable in the link below.', 0, 'active', '2021-07-14 11:12:18', '2021-07-14 11:12:18'),
(73, 'Full-stack developer- As a full-stack developer,  I have delivered top quality websites and app for recognized organizations. You can get a better look at my work in my portfolio attached below.', 0, 'active', '2021-07-14 11:15:00', '2021-07-15 10:45:07'),
(74, 'Graphic Design- I have created visually appealing designs that have a lasting impact on the viewers of your site. I have created high-quality visuals for a company similar to yours. Please find my portfolio below to view my work.', 0, 'active', '2021-07-14 11:22:35', '2021-07-15 10:39:11'),
(75, 'UI/UX- The user engagement depends on the interface and performance of your website or application. I design every aspect of your project, considering both these features.\r\nWould you please take a minute and view my portfolio?', 0, 'active', '2021-07-14 11:26:07', '2021-07-15 10:37:53'),
(76, 'SMM- Marketing through social media requires long-term planning and a good grip over Data Analysis. I keep these features under consideration to make my previous campaigns go viral. You can check them out below.', 0, 'active', '2021-07-14 11:30:38', '2021-07-15 10:36:14'),
(77, 'Plugins- The plugins I have written are available on the WordPress store and help users improve the functionality of their websites.  Please check out the links to get a better idea of my work.', 0, 'active', '2021-07-14 11:33:28', '2021-07-14 11:33:28'),
(78, 'Mobile Application- I have created multipurpose, highly engaging mobile applications over the past few years. You can find out my recent work here.', 0, 'active', '2021-07-14 11:36:42', '2021-07-14 11:36:42'),
(79, 'Logo Designs- Logo designs need to represent the company identity thoroughly. I create logos based on your brand identity, and my previous work resembles your project. Find my work below.', 0, 'active', '2021-07-14 11:39:22', '2021-07-15 10:34:29'),
(81, 'SEO- SEO is not only focused on including keywords to your site. Therefore, I focus on adding unique content to your page and improving on-page performance keeping your audience engaged.\r\nYou can check out my previous campaigns below.', 0, 'active', '2021-07-15 10:31:18', '2021-07-15 10:31:18');

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` int NOT NULL,
  `freelancer_project_id` int NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `seo_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `preview_description` text COLLATE utf8mb4_unicode_ci,
  `budget` json DEFAULT NULL,
  `currency` json DEFAULT NULL,
  `upgrades` json DEFAULT NULL,
  `bid_stats` json DEFAULT NULL,
  `time_submitted` int NOT NULL,
  `time_updated` int DEFAULT NULL,
  `employer_reputation` json NOT NULL,
  `type` enum('hourly','fixed') COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('missed','bid_later','bidded','replied','accepted') COLLATE utf8mb4_unicode_ci NOT NULL,
  `action_date` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `project_details`
--

CREATE TABLE `project_details` (
  `id` bigint UNSIGNED NOT NULL,
  `project_id` int NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `jobs` json DEFAULT NULL,
  `attachments` json DEFAULT NULL,
  `country` json DEFAULT NULL,
  `employer_status` json DEFAULT NULL,
  `employer_registration_date` int DEFAULT NULL,
  `employer_username` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `employer_public_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `employer_avatar_cdn` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `project_filters`
--

CREATE TABLE `project_filters` (
  `id` bigint UNSIGNED NOT NULL,
  `project_type` json DEFAULT NULL,
  `fixed_price` json DEFAULT NULL,
  `hourly_price` json DEFAULT NULL,
  `listing_type` json DEFAULT NULL,
  `projects_search_params` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `project_filters`
--

INSERT INTO `project_filters` (`id`, `project_type`, `fixed_price`, `hourly_price`, `listing_type`, `projects_search_params`, `created_at`, `updated_at`) VALUES
(1, '{\"fixed\": true, \"hourly\": true}', '{\"max\": \"5000\", \"min\": \"100\"}', '{\"max\": \"68\", \"min\": \"4\"}', '{\"NDA\": false, \"sealed\": false, \"urgent\": false, \"assisted\": false, \"featured\": false, \"fulltime\": false}', 'jobs[]=669&languages[]=en&project_types[]=fixed&project_types[]=hourly&max_avg_price=5000&min_avg_price=100&max_avg_hourly_rate=68&min_avg_hourly_rate=4&', '2021-04-05 18:06:43', '2021-04-06 09:35:17');

-- --------------------------------------------------------

--
-- Table structure for table `project_filter_skill`
--

CREATE TABLE `project_filter_skill` (
  `id` bigint UNSIGNED NOT NULL,
  `project_filter_id` int NOT NULL,
  `skill_id` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `project_filter_skill`
--

INSERT INTO `project_filter_skill` (`id`, `project_filter_id`, `skill_id`, `created_at`, `updated_at`) VALUES
(1, 1, 647, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `project_proposals`
--

CREATE TABLE `project_proposals` (
  `id` bigint UNSIGNED NOT NULL,
  `bid_id` int NOT NULL,
  `project_id` int NOT NULL,
  `bidder_id` int NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `public_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tagline` text COLLATE utf8mb4_unicode_ci,
  `avatar_cdn` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount` decimal(8,2) DEFAULT NULL,
  `period` int DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `submitdate` int DEFAULT NULL,
  `reputation` json DEFAULT NULL,
  `country` json DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `skills`
--

CREATE TABLE `skills` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `freelancer_job_id` int NOT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `skills`
--

INSERT INTO `skills` (`id`, `name`, `freelancer_job_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 'PHP', 3, 'active', NULL, NULL),
(2, 'Perl', 4, 'active', NULL, NULL),
(3, 'ASP', 5, 'active', NULL, NULL),
(4, 'C Programming', 6, 'active', NULL, NULL),
(5, 'Java', 7, 'active', NULL, NULL),
(6, 'JSP', 8, 'active', NULL, NULL),
(7, 'JavaScript', 9, 'active', NULL, NULL),
(8, 'XML', 10, 'active', NULL, NULL),
(9, 'Cold Fusion', 11, 'active', NULL, NULL),
(10, 'Adobe Flash', 12, 'active', NULL, NULL),
(11, 'Python', 13, 'active', NULL, NULL),
(12, 'Visual Basic', 14, 'active', NULL, NULL),
(13, '.NET', 15, 'active', NULL, NULL),
(14, 'Script Install', 16, 'active', NULL, NULL),
(15, 'Website Design', 17, 'active', NULL, NULL),
(16, 'Graphic Design', 20, 'active', NULL, NULL),
(17, 'Copywriting', 21, 'active', NULL, NULL),
(18, 'Translation', 22, 'active', NULL, NULL),
(19, 'Legal', 24, 'active', NULL, NULL),
(20, 'Internet Marketing', 25, 'active', NULL, NULL),
(21, 'Banner Design', 26, 'active', NULL, NULL),
(22, 'Photography', 27, 'active', NULL, NULL),
(23, 'Audio Services', 28, 'active', NULL, NULL),
(24, 'Windows Desktop', 29, 'active', NULL, NULL),
(25, 'System Admin', 30, 'active', NULL, NULL),
(26, 'Linux', 31, 'active', NULL, NULL),
(27, 'Logo Design', 32, 'active', NULL, NULL),
(28, 'Web Security', 33, 'active', NULL, NULL),
(29, 'Delphi', 34, 'active', NULL, NULL),
(30, 'Virtual Reality', 35, 'active', NULL, NULL),
(31, 'Data Processing', 36, 'active', NULL, NULL),
(32, 'Project Management', 37, 'active', NULL, NULL),
(33, 'SEO', 38, 'active', NULL, NULL),
(34, 'Data Entry', 39, 'active', NULL, NULL),
(35, 'Link Building', 40, 'active', NULL, NULL),
(36, 'Wireless', 41, 'active', NULL, NULL),
(37, 'Engineering', 42, 'active', NULL, NULL),
(38, 'Electronics', 43, 'active', NULL, NULL),
(39, 'Mobile App Development', 44, 'active', NULL, NULL),
(40, 'J2EE', 45, 'active', NULL, NULL),
(41, 'Training', 46, 'active', NULL, NULL),
(42, 'Research', 47, 'active', NULL, NULL),
(43, 'Proofreading', 48, 'active', NULL, NULL),
(44, 'Telemarketing', 49, 'active', NULL, NULL),
(45, 'Ruby on Rails', 50, 'active', NULL, NULL),
(46, 'AJAX', 51, 'active', NULL, NULL),
(47, 'Video Services', 52, 'active', NULL, NULL),
(48, 'Accounting', 53, 'active', NULL, NULL),
(49, 'Joomla', 54, 'active', NULL, NULL),
(50, 'Excel', 55, 'active', NULL, NULL),
(51, 'Shopping Carts', 56, 'active', NULL, NULL),
(52, 'Photoshop', 57, 'active', NULL, NULL),
(53, 'iPhone', 58, 'active', NULL, NULL),
(54, 'Android', 59, 'active', NULL, NULL),
(55, 'Game Design', 60, 'active', NULL, NULL),
(56, 'Industrial Design', 61, 'active', NULL, NULL),
(57, 'Product Sourcing', 62, 'active', NULL, NULL),
(58, 'Matlab and Mathematica', 63, 'active', NULL, NULL),
(59, 'Sales', 64, 'active', NULL, NULL),
(60, 'Social Networking', 65, 'active', NULL, NULL),
(61, 'Google Adwords', 66, 'active', NULL, NULL),
(62, 'Testing / QA', 67, 'active', NULL, NULL),
(63, 'SQL', 68, 'active', NULL, NULL),
(64, 'WordPress', 69, 'active', NULL, NULL),
(65, 'Illustrator', 70, 'active', NULL, NULL),
(66, 'Verilog / VHDL', 71, 'active', NULL, NULL),
(67, 'Twitter', 72, 'active', NULL, NULL),
(68, 'Computer Security', 73, 'active', NULL, NULL),
(69, 'Facebook Marketing', 74, 'active', NULL, NULL),
(70, 'Blog', 75, 'active', NULL, NULL),
(71, 'CAD/CAM', 76, 'active', NULL, NULL),
(72, 'CSS', 77, 'active', NULL, NULL),
(73, 'Flex', 78, 'active', NULL, NULL),
(74, 'Customer Support', 79, 'active', NULL, NULL),
(75, 'Powerpoint', 80, 'active', NULL, NULL),
(76, 'Marketing', 82, 'active', NULL, NULL),
(77, 'Manufacturing', 83, 'active', NULL, NULL),
(78, 'Building Architecture', 84, 'active', NULL, NULL),
(79, 'Scientific Research', 85, 'active', NULL, NULL),
(80, 'Financial Research', 86, 'active', NULL, NULL),
(81, 'XXX', 88, 'active', NULL, NULL),
(82, 'Cloud Computing', 89, 'active', NULL, NULL),
(83, 'Magento', 90, 'active', NULL, NULL),
(84, 'MMORPG', 91, 'active', NULL, NULL),
(85, 'Algorithm', 92, 'active', NULL, NULL),
(86, '3D Rendering', 93, 'active', NULL, NULL),
(87, 'Bulk Marketing', 94, 'active', NULL, NULL),
(88, 'Web Scraping', 95, 'active', NULL, NULL),
(89, 'MySpace', 96, 'active', NULL, NULL),
(90, 'Branding', 97, 'active', NULL, NULL),
(91, 'Drupal', 98, 'active', NULL, NULL),
(92, 'Typography', 99, 'active', NULL, NULL),
(93, 'Advertising', 100, 'active', NULL, NULL),
(94, 'UML Design', 101, 'active', NULL, NULL),
(95, 'Troubleshooting', 102, 'active', NULL, NULL),
(96, 'Technical Writing', 103, 'active', NULL, NULL),
(97, 'Editing', 104, 'active', NULL, NULL),
(98, 'Freelance', 105, 'active', NULL, NULL),
(99, 'C# Programming', 106, 'active', NULL, NULL),
(100, 'Animation', 107, 'active', NULL, NULL),
(101, 'Photoshop Coding', 108, 'active', NULL, NULL),
(102, 'Education & Tutoring', 109, 'active', NULL, NULL),
(103, 'Erlang', 110, 'active', NULL, NULL),
(104, 'Microcontroller', 111, 'active', NULL, NULL),
(105, 'JavaFX', 112, 'active', NULL, NULL),
(106, 'Django', 113, 'active', NULL, NULL),
(107, 'Publishing', 114, 'active', NULL, NULL),
(108, 'User Interface / IA', 115, 'active', NULL, NULL),
(109, 'Software Architecture', 116, 'active', NULL, NULL),
(110, 'Symbian', 117, 'active', NULL, NULL),
(111, 'Oracle', 118, 'active', NULL, NULL),
(112, 'Statistics', 119, 'active', NULL, NULL),
(113, 'CMS', 120, 'active', NULL, NULL),
(114, 'Transcription', 121, 'active', NULL, NULL),
(115, 'Volusion', 122, 'active', NULL, NULL),
(116, 'Report Writing', 123, 'active', NULL, NULL),
(117, 'Microsoft Access', 124, 'active', NULL, NULL),
(118, 'Asterisk PBX', 125, 'active', NULL, NULL),
(119, 'Arts & Crafts', 126, 'active', NULL, NULL),
(120, 'Fashion Design', 127, 'active', NULL, NULL),
(121, 'Cisco', 128, 'active', NULL, NULL),
(122, 'Virtual Assistant', 129, 'active', NULL, NULL),
(123, 'DotNetNuke', 130, 'active', NULL, NULL),
(124, 'Google App Engine', 131, 'active', NULL, NULL),
(125, 'PeopleSoft', 132, 'active', NULL, NULL),
(126, 'Blackberry', 133, 'active', NULL, NULL),
(127, 'Palm', 134, 'active', NULL, NULL),
(128, 'Boonex Dolphin', 135, 'active', NULL, NULL),
(129, 'Social Engine', 136, 'active', NULL, NULL),
(130, 'eCommerce', 137, 'active', NULL, NULL),
(131, 'PayPal API', 138, 'active', NULL, NULL),
(132, 'Solidworks', 139, 'active', NULL, NULL),
(133, 'Windows Mobile', 140, 'active', NULL, NULL),
(134, 'Cocoa', 141, 'active', NULL, NULL),
(135, 'Mac OS', 142, 'active', NULL, NULL),
(136, 'Objective C', 143, 'active', NULL, NULL),
(137, 'Biotechnology', 144, 'active', NULL, NULL),
(138, 'Human Resources', 145, 'active', NULL, NULL),
(139, 'Sharepoint', 146, 'active', NULL, NULL),
(140, 'CRM', 147, 'active', NULL, NULL),
(141, 'Metatrader', 148, 'active', NULL, NULL),
(142, 'Business Plans', 149, 'active', NULL, NULL),
(143, 'Forum Software', 150, 'active', NULL, NULL),
(144, 'MLM', 151, 'active', NULL, NULL),
(145, 'YouTube', 152, 'active', NULL, NULL),
(146, 'Google Wave', 153, 'active', NULL, NULL),
(147, 'Insurance', 154, 'active', NULL, NULL),
(148, 'Expression Engine', 155, 'active', NULL, NULL),
(149, 'Ghostwriting', 156, 'active', NULL, NULL),
(150, 'Print', 157, 'active', NULL, NULL),
(151, 'PDF', 158, 'active', NULL, NULL),
(152, 'Electronic Forms', 159, 'active', NULL, NULL),
(153, 'eBooks', 160, 'active', NULL, NULL),
(154, 'Silverlight', 161, 'active', NULL, NULL),
(155, 'Home Design', 162, 'active', NULL, NULL),
(156, 'PLC & SCADA', 163, 'active', NULL, NULL),
(157, 'Forum Posting', 164, 'active', NULL, NULL),
(158, 'Mechanical Engineering', 166, 'active', NULL, NULL),
(159, 'Software Testing', 167, 'active', NULL, NULL),
(160, 'Adobe InDesign', 168, 'active', NULL, NULL),
(161, 'Adobe Dreamweaver', 169, 'active', NULL, NULL),
(162, 'Illustration', 170, 'active', NULL, NULL),
(163, 'After Effects', 171, 'active', NULL, NULL),
(164, 'Music', 172, 'active', NULL, NULL),
(165, 'Maya', 173, 'active', NULL, NULL),
(166, 'Article Writing', 174, 'active', NULL, NULL),
(167, 'Fiction', 175, 'active', NULL, NULL),
(168, 'Medical', 176, 'active', NULL, NULL),
(169, 'Leads', 177, 'active', NULL, NULL),
(170, 'Management', 178, 'active', NULL, NULL),
(171, 'Finance', 179, 'active', NULL, NULL),
(172, 'Intuit QuickBooks', 180, 'active', NULL, NULL),
(173, 'Tax', 181, 'active', NULL, NULL),
(174, 'Contracts', 182, 'active', NULL, NULL),
(175, 'Legal Research', 183, 'active', NULL, NULL),
(176, 'Electrical Engineering', 184, 'active', NULL, NULL),
(177, 'Materials Engineering', 185, 'active', NULL, NULL),
(178, 'Civil Engineering', 186, 'active', NULL, NULL),
(179, 'Chemical Engineering', 187, 'active', NULL, NULL),
(180, 'Structural Engineering', 188, 'active', NULL, NULL),
(181, 'Sports', 189, 'active', NULL, NULL),
(182, 'Automotive', 190, 'active', NULL, NULL),
(183, 'Embedded Software', 191, 'active', NULL, NULL),
(184, 'Mechatronics', 192, 'active', NULL, NULL),
(185, 'Finite Element Analysis', 193, 'active', NULL, NULL),
(186, 'Research Writing', 194, 'active', NULL, NULL),
(187, 'Medical Writing', 195, 'active', NULL, NULL),
(188, 'Stationery Design', 196, 'active', NULL, NULL),
(189, 'Word', 197, 'active', NULL, NULL),
(190, 'Video Upload', 198, 'active', NULL, NULL),
(191, 'Web Search', 199, 'active', NULL, NULL),
(192, 'Genealogy', 200, 'active', NULL, NULL),
(193, 'Quantum', 201, 'active', NULL, NULL),
(194, 'Reviews', 202, 'active', NULL, NULL),
(195, 'Product Descriptions', 203, 'active', NULL, NULL),
(196, 'Photo Editing', 204, 'active', NULL, NULL),
(197, 'Zen Cart', 205, 'active', NULL, NULL),
(198, 'Cartography & Maps', 206, 'active', NULL, NULL),
(199, 'Recruitment', 207, 'active', NULL, NULL),
(200, 'Test Automation', 208, 'active', NULL, NULL),
(201, 'Voice Talent', 209, 'active', NULL, NULL),
(202, 'Supplier Sourcing', 211, 'active', NULL, NULL),
(203, 'Logistics', 212, 'active', NULL, NULL),
(204, 'Buyer Sourcing', 213, 'active', NULL, NULL),
(205, 'AS400 & iSeries', 214, 'active', NULL, NULL),
(206, 'Apache', 215, 'active', NULL, NULL),
(207, 'Technical Support', 216, 'active', NULL, NULL),
(208, 'Phone Support', 217, 'active', NULL, NULL),
(209, 'Order Processing', 218, 'active', NULL, NULL),
(210, 'Website Testing', 219, 'active', NULL, NULL),
(211, 'Desktop Support', 220, 'active', NULL, NULL),
(212, 'REALbasic', 221, 'active', NULL, NULL),
(213, 'Microsoft Exchange', 222, 'active', NULL, NULL),
(214, 'Active Directory', 223, 'active', NULL, NULL),
(215, 'DNS', 224, 'active', NULL, NULL),
(216, 'IIS', 225, 'active', NULL, NULL),
(217, 'Patents', 226, 'active', NULL, NULL),
(218, 'Financial Markets', 227, 'active', NULL, NULL),
(219, 'Weddings', 228, 'active', NULL, NULL),
(220, 'Concept Design', 229, 'active', NULL, NULL),
(221, 'MODx', 230, 'active', NULL, NULL),
(222, 'OSCommerce', 231, 'active', NULL, NULL),
(223, 'Corporate Identity', 232, 'active', NULL, NULL),
(224, 'vBulletin', 233, 'active', NULL, NULL),
(225, 'Caricature & Cartoons', 234, 'active', NULL, NULL),
(226, 'CakePHP', 235, 'active', NULL, NULL),
(227, 'Zend', 236, 'active', NULL, NULL),
(228, 'Codeigniter', 237, 'active', NULL, NULL),
(229, 'Travel Writing', 238, 'active', NULL, NULL),
(230, 'Geology', 239, 'active', NULL, NULL),
(231, 'Biology', 240, 'active', NULL, NULL),
(232, 'Project Scheduling', 241, 'active', NULL, NULL),
(233, 'Construction Monitoring', 242, 'active', NULL, NULL),
(234, 'Protoshare', 243, 'active', NULL, NULL),
(235, 'Balsamiq', 244, 'active', NULL, NULL),
(236, 'Business Analysis', 245, 'active', NULL, NULL),
(237, 'Grant Writing', 246, 'active', NULL, NULL),
(238, 'PSD to HTML', 247, 'active', NULL, NULL),
(239, 'Golang', 248, 'active', NULL, NULL),
(240, 'Microsoft Expression', 249, 'active', NULL, NULL),
(241, 'Article Rewriting', 250, 'active', NULL, NULL),
(242, 'eBay', 251, 'active', NULL, NULL),
(243, 'Dating', 252, 'active', NULL, NULL),
(244, 'Virtual Worlds', 253, 'active', NULL, NULL),
(245, 'LaTeX', 254, 'active', NULL, NULL),
(246, 'Chrome OS', 256, 'active', NULL, NULL),
(247, 'BPO', 257, 'active', NULL, NULL),
(248, 'VoIP', 258, 'active', NULL, NULL),
(249, 'QuarkXPress', 259, 'active', NULL, NULL),
(250, 'Covers & Packaging', 262, 'active', NULL, NULL),
(251, 'Cryptography', 263, 'active', NULL, NULL),
(252, 'Format & Layout', 264, 'active', NULL, NULL),
(253, 'PCB Layout', 265, 'active', NULL, NULL),
(254, 'GPGPU', 266, 'active', NULL, NULL),
(255, 'SAP', 267, 'active', NULL, NULL),
(256, 'PSD2CMS', 268, 'active', NULL, NULL),
(257, 'Templates', 269, 'active', NULL, NULL),
(258, 'Shell Script', 270, 'active', NULL, NULL),
(259, 'AutoCAD', 271, 'active', NULL, NULL),
(260, 'ERP', 272, 'active', NULL, NULL),
(261, 'BMC Remedy', 273, 'active', NULL, NULL),
(262, 'HP Openview', 274, 'active', NULL, NULL),
(263, 'Chordiant', 275, 'active', NULL, NULL),
(264, 'COBOL', 276, 'active', NULL, NULL),
(265, 'Interior Design', 277, 'active', NULL, NULL),
(266, 'Business Cards', 278, 'active', NULL, NULL),
(267, 'Azure', 279, 'active', NULL, NULL),
(268, 'Nokia', 280, 'active', NULL, NULL),
(269, 'Video Broadcasting', 283, 'active', NULL, NULL),
(270, 'Photoshop Design', 284, 'active', NULL, NULL),
(271, 'CUDA', 286, 'active', NULL, NULL),
(272, 'NoSQL Couch & Mongo', 287, 'active', NULL, NULL),
(273, 'Payroll', 288, 'active', NULL, NULL),
(274, 'Inventory Management', 289, 'active', NULL, NULL),
(275, 'Event Planning', 290, 'active', NULL, NULL),
(276, 'Microsoft', 291, 'active', NULL, NULL),
(277, 'Machine Learning (ML)', 292, 'active', NULL, NULL),
(278, 'Natural Language', 293, 'active', NULL, NULL),
(279, 'Prolog', 294, 'active', NULL, NULL),
(280, 'J2ME', 295, 'active', NULL, NULL),
(281, 'Windows CE', 296, 'active', NULL, NULL),
(282, 'Public Relations', 297, 'active', NULL, NULL),
(283, 'Google Analytics', 298, 'active', NULL, NULL),
(284, 'vTiger', 299, 'active', NULL, NULL),
(285, 'Health', 300, 'active', NULL, NULL),
(286, 'Nginx', 301, 'active', NULL, NULL),
(287, 'Google Adsense', 302, 'active', NULL, NULL),
(288, 'Manufacturing Design', 303, 'active', NULL, NULL),
(289, 'Prestashop', 304, 'active', NULL, NULL),
(290, 'MySQL', 305, 'active', NULL, NULL),
(291, 'Amazon Kindle', 306, 'active', NULL, NULL),
(292, 'iPad', 307, 'active', NULL, NULL),
(293, 'Fortran', 308, 'active', NULL, NULL),
(294, 'Google Buzz', 309, 'active', NULL, NULL),
(295, 'Brochure Design', 310, 'active', NULL, NULL),
(296, 'Flash 3D', 311, 'active', NULL, NULL),
(297, 'Capture NX2', 312, 'active', NULL, NULL),
(298, 'Apache Solr', 313, 'active', NULL, NULL),
(299, 'Pentaho', 314, 'active', NULL, NULL),
(300, 'Samsung', 315, 'active', NULL, NULL),
(301, 'Audit', 316, 'active', NULL, NULL),
(302, 'Usability Testing', 317, 'active', NULL, NULL),
(303, 'Salesforce.com', 318, 'active', NULL, NULL),
(304, 'Amazon Web Services', 319, 'active', NULL, NULL),
(305, 'C++ Programming', 320, 'active', NULL, NULL),
(306, 'Geolocation', 321, 'active', NULL, NULL),
(307, 'Nutrition', 322, 'active', NULL, NULL),
(308, 'HTML5', 323, 'active', NULL, NULL),
(309, 'Product Design', 324, 'active', NULL, NULL),
(310, 'Property Law', 325, 'active', NULL, NULL),
(311, 'Employment Law', 326, 'active', NULL, NULL),
(312, 'Tax Law', 327, 'active', NULL, NULL),
(313, 'Mining Engineering', 328, 'active', NULL, NULL),
(314, 'Mathematics', 329, 'active', NULL, NULL),
(315, 'Aeronautical Engineering', 330, 'active', NULL, NULL),
(316, 'Anything Goes', 331, 'active', NULL, NULL),
(317, 'Valuation & Appraisal', 332, 'active', NULL, NULL),
(318, 'Solaris', 333, 'active', NULL, NULL),
(319, 'Data Mining', 334, 'active', NULL, NULL),
(320, 'HTML', 335, 'active', NULL, NULL),
(321, 'UNIX', 336, 'active', NULL, NULL),
(322, 'ISO9001', 337, 'active', NULL, NULL),
(323, 'Climate Sciences', 338, 'active', NULL, NULL),
(324, 'Market Research', 339, 'active', NULL, NULL),
(325, 'ActionScript', 340, 'active', NULL, NULL),
(326, 'SAS', 341, 'active', NULL, NULL),
(327, 'WIKI', 342, 'active', NULL, NULL),
(328, 'jQuery / Prototype', 343, 'active', NULL, NULL),
(329, 'Freelancer API', 344, 'active', NULL, NULL),
(330, 'XSLT', 345, 'active', NULL, NULL),
(331, 'Finale / Sibelius', 346, 'active', NULL, NULL),
(332, 'Article Submission', 347, 'active', NULL, NULL),
(333, 'FileMaker', 348, 'active', NULL, NULL),
(334, 'Classifieds Posting', 349, 'active', NULL, NULL),
(335, 'PICK Multivalue DB', 350, 'active', NULL, NULL),
(336, 'Instrumentation', 351, 'active', NULL, NULL),
(337, 'Product Management', 352, 'active', NULL, NULL),
(338, 'Microstation', 353, 'active', NULL, NULL),
(339, 'Psychology', 354, 'active', NULL, NULL),
(340, 'Blog Install', 355, 'active', NULL, NULL),
(341, 'Blog Design', 356, 'active', NULL, NULL),
(342, 'Google Earth', 357, 'active', NULL, NULL),
(343, 'Windows Server', 358, 'active', NULL, NULL),
(344, 'SketchUp', 359, 'active', NULL, NULL),
(345, 'Resumes', 360, 'active', NULL, NULL),
(346, 'Speech Writing', 361, 'active', NULL, NULL),
(347, 'Newsletters', 362, 'active', NULL, NULL),
(348, 'Virtuemart', 363, 'active', NULL, NULL),
(349, 'Sencha / YahooUI', 364, 'active', NULL, NULL),
(350, 'T-Shirts', 365, 'active', NULL, NULL),
(351, 'Commercials', 366, 'active', NULL, NULL),
(352, 'Book Writing', 367, 'active', NULL, NULL),
(353, 'Icon Design', 368, 'active', NULL, NULL),
(354, 'Advertisement Design', 369, 'active', NULL, NULL),
(355, '3ds Max', 370, 'active', NULL, NULL),
(356, 'Shopify Templates', 371, 'active', NULL, NULL),
(357, 'TaoBao API', 372, 'active', NULL, NULL),
(358, 'Business Catalyst', 373, 'active', NULL, NULL),
(359, 'GPS', 374, 'active', NULL, NULL),
(360, 'Copy Typing', 375, 'active', NULL, NULL),
(361, 'IBM Tivoli', 376, 'active', NULL, NULL),
(362, 'CRE Loaded', 377, 'active', NULL, NULL),
(363, 'Ad Planning & Buying', 378, 'active', NULL, NULL),
(364, 'Visual Foxpro', 379, 'active', NULL, NULL),
(365, 'CubeCart', 380, 'active', NULL, NULL),
(366, 'Visa / Immigration', 381, 'active', NULL, NULL),
(367, 'Rocket Engine', 382, 'active', NULL, NULL),
(368, 'AutoHotkey', 383, 'active', NULL, NULL),
(369, 'Pattern Making', 384, 'active', NULL, NULL),
(370, 'Symfony PHP', 385, 'active', NULL, NULL),
(371, 'Parallels Desktop', 386, 'active', NULL, NULL),
(372, 'Plesk', 387, 'active', NULL, NULL),
(373, 'Virtuozzo', 388, 'active', NULL, NULL),
(374, 'Parallels Automation', 389, 'active', NULL, NULL),
(375, 'Final Cut Pro', 390, 'active', NULL, NULL),
(376, 'LabVIEW', 391, 'active', NULL, NULL),
(377, 'Lotus Notes', 392, 'active', NULL, NULL),
(378, 'Firefox', 393, 'active', NULL, NULL),
(379, '3D Modelling', 394, 'active', NULL, NULL),
(380, '3D Animation', 395, 'active', NULL, NULL),
(381, 'TestStand', 396, 'active', NULL, NULL),
(382, 'Dynamics', 397, 'active', NULL, NULL),
(383, 'Kinect', 398, 'active', NULL, NULL),
(384, 'Fundraising', 399, 'active', NULL, NULL),
(385, 'Smarty PHP', 400, 'active', NULL, NULL),
(386, 'Marketplace Service', 401, 'active', NULL, NULL),
(387, 'Yii', 402, 'active', NULL, NULL),
(388, 'Appcelerator Titanium', 403, 'active', NULL, NULL),
(389, 'Interspire', 404, 'active', NULL, NULL),
(390, 'Press Releases', 405, 'active', NULL, NULL),
(391, 'eLearning', 406, 'active', NULL, NULL),
(392, 'Unity 3D', 407, 'active', NULL, NULL),
(393, 'Poster Design', 408, 'active', NULL, NULL),
(394, 'Sticker Design', 409, 'active', NULL, NULL),
(395, 'Invitation Design', 410, 'active', NULL, NULL),
(396, 'Flyer Design', 412, 'active', NULL, NULL),
(397, 'Google Chrome', 414, 'active', NULL, NULL),
(398, 'Apple Safari', 415, 'active', NULL, NULL),
(399, 'Yahoo! Store Design', 416, 'active', NULL, NULL),
(400, 'Google Plus', 418, 'active', NULL, NULL),
(401, 'Face Recognition', 419, 'active', NULL, NULL),
(402, 'OCR', 420, 'active', NULL, NULL),
(403, 'Pattern Matching', 421, 'active', NULL, NULL),
(404, 'Computer Graphics', 422, 'active', NULL, NULL),
(405, 'Imaging', 423, 'active', NULL, NULL),
(406, 'BigCommerce', 424, 'active', NULL, NULL),
(407, 'Haskell', 425, 'active', NULL, NULL),
(408, 'WPF', 426, 'active', NULL, NULL),
(409, 'Dart', 427, 'active', NULL, NULL),
(410, 'Gamification', 428, 'active', NULL, NULL),
(411, 'Astrophysics', 429, 'active', NULL, NULL),
(412, 'Aerospace Engineering', 430, 'active', NULL, NULL),
(413, 'Poetry', 431, 'active', NULL, NULL),
(414, 'Short Stories', 432, 'active', NULL, NULL),
(415, 'Infographics', 433, 'active', NULL, NULL),
(416, 'MVC', 434, 'active', NULL, NULL),
(417, 'Human Sciences', 435, 'active', NULL, NULL),
(418, 'Presentations', 436, 'active', NULL, NULL),
(419, 'Viral Marketing', 437, 'active', NULL, NULL),
(420, 'DOS', 438, 'active', NULL, NULL),
(421, 'Robotics', 439, 'active', NULL, NULL),
(422, 'Arduino', 440, 'active', NULL, NULL),
(423, 'Personal Development', 441, 'active', NULL, NULL),
(424, 'Google Checkout', 442, 'active', NULL, NULL),
(425, 'Real Estate', 443, 'active', NULL, NULL),
(426, 'Prezi', 444, 'active', NULL, NULL),
(427, 'Visual Arts', 445, 'active', NULL, NULL),
(428, 'Ning', 446, 'active', NULL, NULL),
(429, 'Linkedin', 447, 'active', NULL, NULL),
(430, 'Assembly', 448, 'active', NULL, NULL),
(431, 'Affiliate Marketing', 449, 'active', NULL, NULL),
(432, 'Fashion Modeling', 450, 'active', NULL, NULL),
(433, 'Cooking & Recipes', 451, 'active', NULL, NULL),
(434, 'Brain Storming', 452, 'active', NULL, NULL),
(435, 'Screenwriting', 453, 'active', NULL, NULL),
(436, 'Website Management', 454, 'active', NULL, NULL),
(437, 'CGI', 455, 'active', NULL, NULL),
(438, 'Petroleum Engineering', 456, 'active', NULL, NULL),
(439, 'Game Consoles', 457, 'active', NULL, NULL),
(440, 'Furniture Design', 458, 'active', NULL, NULL),
(441, 'RTOS', 459, 'active', NULL, NULL),
(442, 'Flashmob', 460, 'active', NULL, NULL),
(443, 'Broadcast Engineering', 461, 'active', NULL, NULL),
(444, 'Tumblr', 462, 'active', NULL, NULL),
(445, 'Energy', 463, 'active', NULL, NULL),
(446, 'Engineering Drawing', 464, 'active', NULL, NULL),
(447, 'Linear Programming', 465, 'active', NULL, NULL),
(448, 'Genetic Engineering', 466, 'active', NULL, NULL),
(449, 'Nanotechnology', 467, 'active', NULL, NULL),
(450, 'History', 468, 'active', NULL, NULL),
(451, 'Industrial Engineering', 469, 'active', NULL, NULL),
(452, 'Remote Sensing', 470, 'active', NULL, NULL),
(453, 'Telecommunications Engineering', 471, 'active', NULL, NULL),
(454, 'Database Administration', 472, 'active', NULL, NULL),
(455, 'Clean Technology', 473, 'active', NULL, NULL),
(456, 'Motion Graphics', 474, 'active', NULL, NULL),
(457, 'Videography', 475, 'active', NULL, NULL),
(458, 'Post-Production', 476, 'active', NULL, NULL),
(459, 'Pre-production', 477, 'active', NULL, NULL),
(460, 'MYOB', 478, 'active', NULL, NULL),
(461, 'Scrum Development', 479, 'active', NULL, NULL),
(462, 'Agile Development', 480, 'active', NULL, NULL),
(463, 'Debugging', 481, 'active', NULL, NULL),
(464, 'Landing Pages', 482, 'active', NULL, NULL),
(465, 'Grease Monkey', 483, 'active', NULL, NULL),
(466, 'CS-Cart', 484, 'active', NULL, NULL),
(467, 'Google Web Toolkit', 485, 'active', NULL, NULL),
(468, 'Adobe LiveCycle Designer', 486, 'active', NULL, NULL),
(469, 'webMethods', 487, 'active', NULL, NULL),
(470, 'Metro', 488, 'active', NULL, NULL),
(471, 'Windows Phone', 489, 'active', NULL, NULL),
(472, 'WebOS', 490, 'active', NULL, NULL),
(473, 'Proposal/Bid Writing', 491, 'active', NULL, NULL),
(474, 'Property Development', 492, 'active', NULL, NULL),
(475, 'Property Management', 493, 'active', NULL, NULL),
(476, 'Big Data Sales', 494, 'active', NULL, NULL),
(477, 'Hadoop', 495, 'active', NULL, NULL),
(478, 'Map Reduce', 496, 'active', NULL, NULL),
(479, 'Analytics', 497, 'active', NULL, NULL),
(480, 'OpenGL', 498, 'active', NULL, NULL),
(481, 'OpenCL', 499, 'active', NULL, NULL),
(482, 'Node.js', 500, 'active', NULL, NULL),
(483, 'Pinterest', 501, 'active', NULL, NULL),
(484, 'Shopify', 502, 'active', NULL, NULL),
(485, 'SugarCRM', 503, 'active', NULL, NULL),
(486, 'Visual Basic for Apps', 504, 'active', NULL, NULL),
(487, '3D Design', 505, 'active', NULL, NULL),
(488, 'Geospatial', 506, 'active', NULL, NULL),
(489, 'Moodle', 507, 'active', NULL, NULL),
(490, 'x86/x64 Assembler', 508, 'active', NULL, NULL),
(491, 'Physics', 509, 'active', NULL, NULL),
(492, 'Windows API', 510, 'active', NULL, NULL),
(493, 'Afrikaans', 511, 'active', NULL, NULL),
(494, 'Indonesian', 512, 'active', NULL, NULL),
(495, 'Malay', 513, 'active', NULL, NULL),
(496, 'Catalan', 514, 'active', NULL, NULL),
(497, 'Czech', 515, 'active', NULL, NULL),
(498, 'Welsh', 516, 'active', NULL, NULL),
(499, 'Danish', 517, 'active', NULL, NULL),
(500, 'German', 518, 'active', NULL, NULL),
(501, 'English (UK)', 519, 'active', NULL, NULL),
(502, 'Spanish', 521, 'active', NULL, NULL),
(503, 'Spanish (Spain)', 522, 'active', NULL, NULL),
(504, 'Basque', 523, 'active', NULL, NULL),
(505, 'Filipino', 524, 'active', NULL, NULL),
(506, 'French (Canadian)', 525, 'active', NULL, NULL),
(507, 'French', 526, 'active', NULL, NULL),
(508, 'Korean', 527, 'active', NULL, NULL),
(509, 'Croatian', 528, 'active', NULL, NULL),
(510, 'Italian', 529, 'active', NULL, NULL),
(511, 'Lithuanian', 530, 'active', NULL, NULL),
(512, 'Hungarian', 531, 'active', NULL, NULL),
(513, 'Dutch', 532, 'active', NULL, NULL),
(514, 'Japanese', 533, 'active', NULL, NULL),
(515, 'Norwegian', 534, 'active', NULL, NULL),
(516, 'Polish', 535, 'active', NULL, NULL),
(517, 'Portuguese (Brazil)', 536, 'active', NULL, NULL),
(518, 'Portuguese', 537, 'active', NULL, NULL),
(519, 'Romanian', 538, 'active', NULL, NULL),
(520, 'Russian', 539, 'active', NULL, NULL),
(521, 'Slovakian', 540, 'active', NULL, NULL),
(522, 'Slovenian', 541, 'active', NULL, NULL),
(523, 'Finnish', 542, 'active', NULL, NULL),
(524, 'Swedish', 543, 'active', NULL, NULL),
(525, 'Thai', 544, 'active', NULL, NULL),
(526, 'Vietnamese', 545, 'active', NULL, NULL),
(527, 'Turkish', 546, 'active', NULL, NULL),
(528, 'Simplified Chinese (China)', 547, 'active', NULL, NULL),
(529, 'Traditional Chinese (Taiwan)', 548, 'active', NULL, NULL),
(530, 'Traditional Chinese (Hong Kong)', 549, 'active', NULL, NULL),
(531, 'Greek', 550, 'active', NULL, NULL),
(532, 'Bulgarian', 551, 'active', NULL, NULL),
(533, 'Serbian', 552, 'active', NULL, NULL),
(534, 'Hebrew', 553, 'active', NULL, NULL),
(535, 'Arabic', 554, 'active', NULL, NULL),
(536, 'Hindi', 555, 'active', NULL, NULL),
(537, 'Bengali', 556, 'active', NULL, NULL),
(538, 'Punjabi', 557, 'active', NULL, NULL),
(539, 'Tamil', 558, 'active', NULL, NULL),
(540, 'Telugu', 559, 'active', NULL, NULL),
(541, 'Malayalam', 560, 'active', NULL, NULL),
(542, 'English (US)', 561, 'active', NULL, NULL),
(543, 'Urdu', 562, 'active', NULL, NULL),
(544, 'Textile Engineering', 563, 'active', NULL, NULL),
(545, 'Web Hosting', 564, 'active', NULL, NULL),
(546, 'Open Cart', 565, 'active', NULL, NULL),
(547, 'Zoho', 566, 'active', NULL, NULL),
(548, 'WHMCS', 567, 'active', NULL, NULL),
(549, 'VPS', 568, 'active', NULL, NULL),
(550, 'Email Marketing', 569, 'active', NULL, NULL),
(551, '4D', 571, 'active', NULL, NULL),
(552, 'QlikView', 572, 'active', NULL, NULL),
(553, 'Kannada', 573, 'active', NULL, NULL),
(554, 'Jewellery', 574, 'active', NULL, NULL),
(555, 'Albanian', 575, 'active', NULL, NULL),
(556, 'Latvian', 576, 'active', NULL, NULL),
(557, 'PhoneGap', 577, 'active', NULL, NULL),
(558, 'JDF', 578, 'active', NULL, NULL),
(559, 'Siebel', 579, 'active', NULL, NULL),
(560, 'QuickBase', 580, 'active', NULL, NULL),
(561, 'Umbraco', 581, 'active', NULL, NULL),
(562, 'Biztalk', 582, 'active', NULL, NULL),
(563, 'Christmas', 583, 'active', NULL, NULL),
(564, 'Makerbot', 584, 'active', NULL, NULL),
(565, 'Macedonian', 585, 'active', NULL, NULL),
(566, 'Bosnian', 586, 'active', NULL, NULL),
(567, 'Bitcoin', 588, 'active', NULL, NULL),
(568, 'Autodesk Revit', 589, 'active', NULL, NULL),
(569, 'Puppet', 590, 'active', NULL, NULL),
(570, 'Chef Configuration Management', 591, 'active', NULL, NULL),
(571, 'Scala', 592, 'active', NULL, NULL),
(572, 'Life Coaching', 593, 'active', NULL, NULL),
(573, 'Business Coaching', 594, 'active', NULL, NULL),
(574, 'Drones', 595, 'active', NULL, NULL),
(575, 'backbone.js', 596, 'active', NULL, NULL),
(576, 'Dthreejs', 597, 'active', NULL, NULL),
(577, 'Express JS', 598, 'active', NULL, NULL),
(578, 'Socket IO', 599, 'active', NULL, NULL),
(579, 'Knockout.js', 600, 'active', NULL, NULL),
(580, 'R Programming Language', 601, 'active', NULL, NULL),
(581, 'Bootstrap', 602, 'active', NULL, NULL),
(582, 'RWD', 603, 'active', NULL, NULL),
(583, 'Windows 8', 604, 'active', NULL, NULL),
(584, 'Wikipedia', 605, 'active', NULL, NULL),
(585, 'CasperJS', 606, 'active', NULL, NULL),
(586, 'PostgreSQL', 607, 'active', NULL, NULL),
(587, 'BSD', 608, 'active', NULL, NULL),
(588, 'Communications', 609, 'active', NULL, NULL),
(589, 'Slogans', 610, 'active', NULL, NULL),
(590, 'Digital Design', 611, 'active', NULL, NULL),
(591, 'Circuit Design', 612, 'active', NULL, NULL),
(592, 'Software Development', 613, 'active', NULL, NULL),
(593, 'Entrepreneurship', 614, 'active', NULL, NULL),
(594, 'Startups', 615, 'active', NULL, NULL),
(595, 'Ruby', 616, 'active', NULL, NULL),
(596, 'Sound Design', 617, 'active', NULL, NULL),
(597, 'edX', 618, 'active', NULL, NULL),
(598, 'Ubuntu', 619, 'active', NULL, NULL),
(599, 'Debian', 620, 'active', NULL, NULL),
(600, 'MariaDB', 621, 'active', NULL, NULL),
(601, 'Red Hat', 622, 'active', NULL, NULL),
(602, 'Creative Writing', 623, 'active', NULL, NULL),
(603, 'Creative Design', 624, 'active', NULL, NULL),
(604, 'Catch Phrases', 626, 'active', NULL, NULL),
(605, 'Compliance', 627, 'active', NULL, NULL),
(606, 'Jabber', 628, 'active', NULL, NULL),
(607, 'XMPP', 629, 'active', NULL, NULL),
(608, '3D Printing', 630, 'active', NULL, NULL),
(609, 'Housework', 631, 'active', NULL, NULL),
(610, 'Delivery', 632, 'active', NULL, NULL),
(611, 'House Cleaning', 633, 'active', NULL, NULL),
(612, 'Commercial Cleaning', 634, 'active', NULL, NULL),
(613, 'Furniture Assembly', 635, 'active', NULL, NULL),
(614, 'Shopping', 636, 'active', NULL, NULL),
(615, 'Carwashing', 637, 'active', NULL, NULL),
(616, 'Food Takeaway', 638, 'active', NULL, NULL),
(617, 'Disposals', 639, 'active', NULL, NULL),
(618, 'Decking', 640, 'active', NULL, NULL),
(619, 'Building', 641, 'active', NULL, NULL),
(620, 'Bathroom', 642, 'active', NULL, NULL),
(621, 'Kitchen', 643, 'active', NULL, NULL),
(622, 'Carpentry', 644, 'active', NULL, NULL),
(623, 'Painting', 645, 'active', NULL, NULL),
(624, 'Electric Repair', 646, 'active', NULL, NULL),
(625, 'Landscaping & Gardening', 647, 'active', NULL, NULL),
(626, 'Plumbing', 648, 'active', NULL, NULL),
(627, 'Handyman', 649, 'active', NULL, NULL),
(628, 'Concreting', 650, 'active', NULL, NULL),
(629, 'Roofing', 651, 'active', NULL, NULL),
(630, 'Drafting', 652, 'active', NULL, NULL),
(631, 'Fencing', 653, 'active', NULL, NULL),
(632, 'Air Conditioning', 654, 'active', NULL, NULL),
(633, 'Flooring', 655, 'active', NULL, NULL),
(634, 'Tiling', 656, 'active', NULL, NULL),
(635, 'Gardening', 657, 'active', NULL, NULL),
(636, 'Pavement', 658, 'active', NULL, NULL),
(637, 'Excavation', 659, 'active', NULL, NULL),
(638, 'Lawn Mowing', 660, 'active', NULL, NULL),
(639, 'Appliance Installation', 661, 'active', NULL, NULL),
(640, 'Content Writing', 662, 'active', NULL, NULL),
(641, 'Social Media Marketing', 663, 'active', NULL, NULL),
(642, 'Millwork', 664, 'active', NULL, NULL),
(643, 'Risk Management', 665, 'active', NULL, NULL),
(644, 'Wolfram', 666, 'active', NULL, NULL),
(645, 'VMware', 667, 'active', NULL, NULL),
(646, 'Game Development', 668, 'active', NULL, NULL),
(647, 'Laravel', 669, 'active', NULL, NULL),
(648, 'Word Processing', 670, 'active', NULL, NULL),
(649, 'Customer Service', 671, 'active', NULL, NULL),
(650, 'General Office', 672, 'active', NULL, NULL),
(651, 'Database Programming', 673, 'active', NULL, NULL),
(652, 'Online Writing', 674, 'active', NULL, NULL),
(653, 'English Spelling', 675, 'active', NULL, NULL),
(654, 'Video Production', 676, 'active', NULL, NULL),
(655, 'English Grammar', 677, 'active', NULL, NULL),
(656, 'Business Writing', 678, 'active', NULL, NULL),
(657, 'Microsoft Outlook', 679, 'active', NULL, NULL),
(658, 'Financial Analysis', 680, 'active', NULL, NULL),
(659, 'Telephone Handling', 681, 'active', NULL, NULL),
(660, 'Time Management', 682, 'active', NULL, NULL),
(661, 'Network Administration', 683, 'active', NULL, NULL),
(662, 'Ukrainian', 684, 'active', NULL, NULL),
(663, 'Call Center', 685, 'active', NULL, NULL),
(664, 'Microsoft Office', 686, 'active', NULL, NULL),
(665, 'Web Services', 687, 'active', NULL, NULL),
(666, 'Video Editing', 688, 'active', NULL, NULL),
(667, 'Helpdesk', 689, 'active', NULL, NULL),
(668, 'ASP.NET', 690, 'active', NULL, NULL),
(669, 'Bookkeeping', 691, 'active', NULL, NULL),
(670, 'Internet Research', 692, 'active', NULL, NULL),
(671, 'Audio Production', 693, 'active', NULL, NULL),
(672, 'Email Handling', 694, 'active', NULL, NULL),
(673, 'Microsoft SQL Server', 695, 'active', NULL, NULL),
(674, 'SQLite', 696, 'active', NULL, NULL),
(675, 'RESTful', 697, 'active', NULL, NULL),
(676, 'Redis', 698, 'active', NULL, NULL),
(677, 'Google Webmaster Tools', 699, 'active', NULL, NULL),
(678, 'VB.NET', 700, 'active', NULL, NULL),
(679, 'Lisp', 701, 'active', NULL, NULL),
(680, 'XQuery', 702, 'active', NULL, NULL),
(681, 'Scheme', 703, 'active', NULL, NULL),
(682, 'AngularJS', 704, 'active', NULL, NULL),
(683, 'Investment Research', 706, 'active', NULL, NULL),
(684, 'Statistical Analysis', 707, 'active', NULL, NULL),
(685, 'Legal Writing', 708, 'active', NULL, NULL),
(686, 'Database Development', 709, 'active', NULL, NULL),
(687, 'User Experience Design', 710, 'active', NULL, NULL),
(688, 'Internet Security', 711, 'active', NULL, NULL),
(689, 'Salesforce App Development', 712, 'active', NULL, NULL),
(690, 'Label Design', 713, 'active', NULL, NULL),
(691, 'Package Design', 714, 'active', NULL, NULL),
(692, 'Search Engine Marketing', 715, 'active', NULL, NULL),
(693, 'Mobile App Testing', 716, 'active', NULL, NULL),
(694, 'Data Warehousing', 717, 'active', NULL, NULL),
(695, 'Amazon Fire', 718, 'active', NULL, NULL),
(696, 'VertexFX', 719, 'active', NULL, NULL),
(697, 'Maltese', 720, 'active', NULL, NULL),
(698, 'iMovie', 721, 'active', NULL, NULL),
(699, 'GarageBand', 722, 'active', NULL, NULL),
(700, 'Apple Logic Pro', 724, 'active', NULL, NULL),
(701, 'Apple Compressor', 725, 'active', NULL, NULL),
(702, 'Apple Motion', 726, 'active', NULL, NULL),
(703, 'Swift', 727, 'active', NULL, NULL),
(704, 'Elasticsearch', 728, 'active', NULL, NULL),
(705, 'VoiceXML', 729, 'active', NULL, NULL),
(706, 'Call Control XML', 730, 'active', NULL, NULL),
(707, 'TYPO3', 731, 'active', NULL, NULL),
(708, 'Renewable Energy Design', 732, 'active', NULL, NULL),
(709, 'Cinema 4D', 733, 'active', NULL, NULL),
(710, 'IBM Websphere Transformation Tool', 734, 'active', NULL, NULL),
(711, 'Estonian', 735, 'active', NULL, NULL),
(712, 'Conversion Rate Optimisation', 736, 'active', NULL, NULL),
(713, 'SPSS Statistics', 737, 'active', NULL, NULL),
(714, 'Qualtrics Survey Platform', 738, 'active', NULL, NULL),
(715, 'Xero', 739, 'active', NULL, NULL),
(716, 'Argus Monitoring Software', 740, 'active', NULL, NULL),
(717, 'Git', 741, 'active', NULL, NULL),
(718, 'Sphinx', 742, 'active', NULL, NULL),
(719, 'Dari', 743, 'active', NULL, NULL),
(720, 'Parallax Scrolling', 744, 'active', NULL, NULL),
(721, 'Autodesk Inventor', 745, 'active', NULL, NULL),
(722, 'Procurement', 746, 'active', NULL, NULL),
(723, 'Microbiology', 747, 'active', NULL, NULL),
(724, 'OpenVMS', 748, 'active', NULL, NULL),
(725, 'Scrum', 749, 'active', NULL, NULL),
(726, 'ITIL', 750, 'active', NULL, NULL),
(727, 'Growth Hacking', 751, 'active', NULL, NULL),
(728, 'GameSalad', 752, 'active', NULL, NULL),
(729, 'Alibaba', 753, 'active', NULL, NULL),
(730, 'Etsy', 754, 'active', NULL, NULL),
(731, 'Airbnb', 755, 'active', NULL, NULL),
(732, 'Adobe Air', 756, 'active', NULL, NULL),
(733, 'Snapchat', 757, 'active', NULL, NULL),
(734, 'Instagram', 758, 'active', NULL, NULL),
(735, 'React.js', 759, 'active', NULL, NULL),
(736, 'Ember.js', 760, 'active', NULL, NULL),
(737, 'Data Science', 761, 'active', NULL, NULL),
(738, 'FPGA', 762, 'active', NULL, NULL),
(739, 'Stripe', 763, 'active', NULL, NULL),
(740, 'Surfboard Design', 764, 'active', NULL, NULL),
(741, 'Zendesk', 765, 'active', NULL, NULL),
(742, 'WatchKit', 766, 'active', NULL, NULL),
(743, 'Microsoft Hololens', 767, 'active', NULL, NULL),
(744, 'Mailchimp', 768, 'active', NULL, NULL),
(745, 'Binary Analysis', 769, 'active', NULL, NULL),
(746, 'MonetDB', 770, 'active', NULL, NULL),
(747, 'GoPro', 771, 'active', NULL, NULL),
(748, 'Heroku', 772, 'active', NULL, NULL),
(749, 'Google Maps API', 773, 'active', NULL, NULL),
(750, 'Grunt', 774, 'active', NULL, NULL),
(751, 'LESS/Sass/SCSS', 775, 'active', NULL, NULL),
(752, 'Hive', 776, 'active', NULL, NULL),
(753, 'HBase', 777, 'active', NULL, NULL),
(754, 'Yarn', 778, 'active', NULL, NULL),
(755, 'Cassandra', 779, 'active', NULL, NULL),
(756, 'Spark', 780, 'active', NULL, NULL),
(757, 'Bower', 781, 'active', NULL, NULL),
(758, 'PencilBlue CMS', 782, 'active', NULL, NULL),
(759, 'Wufoo', 783, 'active', NULL, NULL),
(760, 'OpenBravo', 784, 'active', NULL, NULL),
(761, 'Augmented Reality', 785, 'active', NULL, NULL),
(762, 'Vuforia', 786, 'active', NULL, NULL),
(763, 'Apple Watch', 787, 'active', NULL, NULL),
(764, 'WooCommerce', 788, 'active', NULL, NULL),
(765, 'Oculus Mobile SDK', 789, 'active', NULL, NULL),
(766, 'Google Cardboard', 790, 'active', NULL, NULL),
(767, 'Magic Leap', 791, 'active', NULL, NULL),
(768, '360-degree video', 792, 'active', NULL, NULL),
(769, 'Android Wear SDK', 793, 'active', NULL, NULL),
(770, 'Samsung Accessory SDK', 794, 'active', NULL, NULL),
(771, 'iBeacon', 795, 'active', NULL, NULL),
(772, 'Bluetooth Low Energy (BLE)', 796, 'active', NULL, NULL),
(773, 'Tizen SDK for Wearables', 797, 'active', NULL, NULL),
(774, 'Leap Motion SDK', 798, 'active', NULL, NULL),
(775, 'MQTT', 799, 'active', NULL, NULL),
(776, 'DDS', 800, 'active', NULL, NULL),
(777, 'AMQP', 801, 'active', NULL, NULL),
(778, 'Periscope', 802, 'active', NULL, NULL),
(779, 'Xoops', 803, 'active', NULL, NULL),
(780, 'Antenna Services', 804, 'active', NULL, NULL),
(781, 'Appliance Repair', 805, 'active', NULL, NULL),
(782, 'Asbestos Removal', 806, 'active', NULL, NULL),
(783, 'Asphalt', 807, 'active', NULL, NULL),
(784, 'Attic Access Ladders Making', 808, 'active', NULL, NULL),
(785, 'Awnings', 809, 'active', NULL, NULL),
(786, 'Balustrading', 810, 'active', NULL, NULL),
(787, 'Bamboo Flooring', 811, 'active', NULL, NULL),
(788, 'Bracket Installation', 812, 'active', NULL, NULL),
(789, 'Bricklaying', 813, 'active', NULL, NULL),
(790, 'Building Certification', 814, 'active', NULL, NULL),
(791, 'Building Consulting', 815, 'active', NULL, NULL),
(792, 'Building Design', 816, 'active', NULL, NULL),
(793, 'Building Surveying', 817, 'active', NULL, NULL),
(794, 'Carpet Repair & Laying', 818, 'active', NULL, NULL),
(795, 'Carports', 819, 'active', NULL, NULL),
(796, 'Ceiling Installation', 820, 'active', NULL, NULL),
(797, 'Cement Bonding Agents', 821, 'active', NULL, NULL),
(798, 'Carpet Cleaning', 822, 'active', NULL, NULL),
(799, 'Domestic Cleaning', 823, 'active', NULL, NULL),
(800, 'Upholstery Cleaning', 824, 'active', NULL, NULL),
(801, 'Clothesline Installation', 825, 'active', NULL, NULL),
(802, 'Material Coating', 826, 'active', NULL, NULL),
(803, 'Column Installation', 827, 'active', NULL, NULL),
(804, 'Courses', 828, 'active', NULL, NULL),
(805, 'Damp Proofing', 829, 'active', NULL, NULL),
(806, 'Demolition', 830, 'active', NULL, NULL),
(807, 'Drain Plumbing', 831, 'active', NULL, NULL),
(808, 'Equipment Rental', 832, 'active', NULL, NULL),
(809, 'Extensions & Additions', 833, 'active', NULL, NULL),
(810, 'Feng Shui', 834, 'active', NULL, NULL),
(811, 'Financial Planning', 835, 'active', NULL, NULL),
(812, 'Floor Coatings', 836, 'active', NULL, NULL),
(813, 'Flyscreen Installation', 837, 'active', NULL, NULL),
(814, 'Frames & Trusses', 838, 'active', NULL, NULL),
(815, 'Gas Fitting', 839, 'active', NULL, NULL),
(816, 'Glass / Mirror & Glazing', 840, 'active', NULL, NULL),
(817, 'Gutter Installation', 841, 'active', NULL, NULL),
(818, 'Heating Systems', 842, 'active', NULL, NULL),
(819, 'Home Automation', 843, 'active', NULL, NULL),
(820, 'Hot Water Installation', 844, 'active', NULL, NULL),
(821, 'IKEA Installation', 845, 'active', NULL, NULL),
(822, 'Interiors', 846, 'active', NULL, NULL),
(823, 'Landscaping', 847, 'active', NULL, NULL),
(824, 'Lighting', 848, 'active', NULL, NULL),
(825, 'Locksmith', 849, 'active', NULL, NULL),
(826, 'Mortgage Brokering', 850, 'active', NULL, NULL),
(827, 'Pest Control', 851, 'active', NULL, NULL),
(828, 'Piping', 852, 'active', NULL, NULL),
(829, 'Removal Services', 853, 'active', NULL, NULL),
(830, 'Sculpturing', 854, 'active', NULL, NULL),
(831, 'Workshops', 855, 'active', NULL, NULL),
(832, 'Moving', 856, 'active', NULL, NULL),
(833, 'Pet Sitting', 857, 'active', NULL, NULL),
(834, 'Computer Support', 858, 'active', NULL, NULL),
(835, 'Cooking / Baking', 859, 'active', NULL, NULL),
(836, 'Sewing', 860, 'active', NULL, NULL),
(837, 'Laundry and Ironing', 861, 'active', NULL, NULL),
(838, 'Yard Work & Removal', 862, 'active', NULL, NULL),
(839, 'Packing & Shipping', 863, 'active', NULL, NULL),
(840, 'Event Staffing', 864, 'active', NULL, NULL),
(841, 'Decoration', 865, 'active', NULL, NULL),
(842, 'Home Organization', 866, 'active', NULL, NULL),
(843, 'Inspections', 867, 'active', NULL, NULL),
(844, 'Installation', 868, 'active', NULL, NULL),
(845, 'Pickup', 869, 'active', NULL, NULL),
(846, 'Papiamento', 870, 'active', NULL, NULL),
(847, 'Tattoo Design', 871, 'active', NULL, NULL),
(848, 'Plugin', 872, 'active', NULL, NULL),
(849, 'Wix', 873, 'active', NULL, NULL),
(850, 'HomeKit', 874, 'active', NULL, NULL),
(851, 'Squarespace', 875, 'active', NULL, NULL),
(852, 'Weebly', 876, 'active', NULL, NULL),
(853, 'Steam API', 877, 'active', NULL, NULL),
(854, 'Adobe Lightroom', 878, 'active', NULL, NULL),
(855, 'Ionic Framework', 879, 'active', NULL, NULL),
(856, 'General Labor', 880, 'active', NULL, NULL),
(857, 'Redshift', 881, 'active', NULL, NULL),
(858, 'Mailwizz', 882, 'active', NULL, NULL),
(859, 'Geotechnical Engineering', 883, 'active', NULL, NULL),
(860, 'Agronomy', 884, 'active', NULL, NULL),
(861, 'CLIPS', 885, 'active', NULL, NULL),
(862, 'Hair Styles', 886, 'active', NULL, NULL),
(863, 'Make Up', 887, 'active', NULL, NULL),
(864, 'Tibco Spotfire', 888, 'active', NULL, NULL),
(865, 'Tableau', 889, 'active', NULL, NULL),
(866, 'Vectorization', 890, 'active', NULL, NULL),
(867, 'Xojo', 891, 'active', NULL, NULL),
(868, 'Vehicle Signage', 892, 'active', NULL, NULL),
(869, 'DataLife Engine', 893, 'active', NULL, NULL),
(870, 'Minitab', 894, 'active', NULL, NULL),
(871, 'Autotask', 895, 'active', NULL, NULL),
(872, 'Axure', 896, 'active', NULL, NULL),
(873, 'Wireframes', 897, 'active', NULL, NULL),
(874, 'Flow Charts', 898, 'active', NULL, NULL),
(875, 'Zbrush', 899, 'active', NULL, NULL),
(876, 'Concept Art', 900, 'active', NULL, NULL),
(877, 'JSON', 901, 'active', NULL, NULL),
(878, 'Paytrace', 902, 'active', NULL, NULL),
(879, 'Apple iBooks Author', 903, 'active', NULL, NULL),
(880, 'CATIA', 904, 'active', NULL, NULL),
(881, 'Crystal Reports', 905, 'active', NULL, NULL),
(882, 'Lua', 906, 'active', NULL, NULL),
(883, 'FreeSwitch', 907, 'active', NULL, NULL),
(884, 'Nintex Workflow', 908, 'active', NULL, NULL),
(885, 'Nintex Forms', 909, 'active', NULL, NULL),
(886, 'Applescript', 910, 'active', NULL, NULL),
(887, 'Adobe Fireworks', 911, 'active', NULL, NULL),
(888, 'Apache Ant', 912, 'active', NULL, NULL),
(889, 'Artificial Intelligence', 913, 'active', NULL, NULL),
(890, 'Google Cloud Storage', 914, 'active', NULL, NULL),
(891, 'LINQ', 915, 'active', NULL, NULL),
(892, 'OAuth', 916, 'active', NULL, NULL),
(893, 'OpenSSL', 917, 'active', NULL, NULL),
(894, 'OpenStack', 918, 'active', NULL, NULL),
(895, 'Regular Expressions', 919, 'active', NULL, NULL),
(896, 'Squid Cache', 920, 'active', NULL, NULL),
(897, 'Subversion', 921, 'active', NULL, NULL),
(898, 'Powershell', 923, 'active', NULL, NULL),
(899, 'Varnish Cache', 924, 'active', NULL, NULL),
(900, 'Splunk', 925, 'active', NULL, NULL),
(901, 'IBM BPM', 927, 'active', NULL, NULL),
(902, 'GIMP', 928, 'active', NULL, NULL),
(903, 'Veeam', 929, 'active', NULL, NULL),
(904, 'Odoo', 930, 'active', NULL, NULL),
(905, 'LiveCode', 931, 'active', NULL, NULL),
(906, 'Titanium', 932, 'active', NULL, NULL),
(907, 'RapidWeaver', 933, 'active', NULL, NULL),
(908, 'Tally Definition Language', 934, 'active', NULL, NULL),
(909, 'Mural Painting', 935, 'active', NULL, NULL),
(910, 'Unit4 Business World', 936, 'active', NULL, NULL),
(911, 'Adobe Captivate', 937, 'active', NULL, NULL),
(912, 'PEGA PRPC', 938, 'active', NULL, NULL),
(913, 'JD Edwards CNC', 939, 'active', NULL, NULL),
(914, 'Open Journal Systems', 940, 'active', NULL, NULL),
(915, 'XPages', 941, 'active', NULL, NULL),
(916, 'eLearning Designer', 945, 'active', NULL, NULL),
(917, 'Linnworks Order Management', 946, 'active', NULL, NULL),
(918, 'Adobe Premiere Pro', 947, 'active', NULL, NULL),
(919, 'Email Developer', 948, 'active', NULL, NULL),
(920, 'App Designer', 950, 'active', NULL, NULL),
(921, 'App Developer', 951, 'active', NULL, NULL),
(922, 'Attorney', 952, 'active', NULL, NULL),
(923, 'Book Artist', 953, 'active', NULL, NULL),
(924, 'Coding', 954, 'active', NULL, NULL),
(925, 'Filmmaking', 955, 'active', NULL, NULL),
(926, 'Interpreter', 956, 'active', NULL, NULL),
(927, 'Journalism', 957, 'active', NULL, NULL),
(928, 'Poet', 958, 'active', NULL, NULL),
(929, 'User Interface Design', 959, 'active', NULL, NULL),
(930, 'Voice Artist', 960, 'active', NULL, NULL),
(931, 'Design', 961, 'active', NULL, NULL),
(932, 'Programming', 962, 'active', NULL, NULL),
(933, 'Visual Merchandising', 965, 'active', NULL, NULL),
(934, 'Storage Area Networks', 967, 'active', NULL, NULL),
(935, 'Landscape Design', 968, 'active', NULL, NULL),
(936, 'MeteorJS', 969, 'active', NULL, NULL),
(937, 'Yiddish', 970, 'active', NULL, NULL),
(938, 'Tekla Structures', 971, 'active', NULL, NULL),
(939, 'Sign Design', 973, 'active', NULL, NULL),
(940, 'Organizational Change Management', 974, 'active', NULL, NULL),
(941, 'Storyboard', 975, 'active', NULL, NULL),
(942, 'Grails', 976, 'active', NULL, NULL),
(943, 'Business Intelligence', 977, 'active', NULL, NULL),
(944, '3D Model Maker', 978, 'active', NULL, NULL),
(945, 'Typescript', 979, 'active', NULL, NULL),
(946, 'Xamarin', 980, 'active', NULL, NULL),
(947, 'ePub', 981, 'active', NULL, NULL),
(948, 'Microsoft Visio', 982, 'active', NULL, NULL),
(949, 'Raspberry Pi', 983, 'active', NULL, NULL),
(950, 'OpenSceneGraph', 984, 'active', NULL, NULL),
(951, 'Ray-tracing', 985, 'active', NULL, NULL),
(952, 'Parallel Processing', 986, 'active', NULL, NULL),
(953, 'Visualization', 987, 'active', NULL, NULL),
(954, 'Economics', 988, 'active', NULL, NULL),
(955, 'Blockchain', 989, 'active', NULL, NULL),
(956, 'Oculus Rift', 990, 'active', NULL, NULL),
(957, 'HTC Vive', 991, 'active', NULL, NULL),
(958, 'Ethereum', 992, 'active', NULL, NULL),
(959, 'Econometrics', 993, 'active', NULL, NULL),
(960, 'Learning Management Systems (LMS)', 994, 'active', NULL, NULL),
(961, 'Neural Networks', 995, 'active', NULL, NULL),
(962, 'Penetration Testing', 996, 'active', NULL, NULL),
(963, 'SEO Auditing', 997, 'active', NULL, NULL),
(964, 'Asana', 998, 'active', NULL, NULL),
(965, 'Image Processing', 999, 'active', NULL, NULL),
(966, 'Facebook API', 1000, 'active', NULL, NULL),
(967, 'Geographical Information System (GIS)', 1001, 'active', NULL, NULL),
(968, 'Docker', 1002, 'active', NULL, NULL),
(969, 'Pardot', 1003, 'active', NULL, NULL),
(970, 'Kotlin', 1004, 'active', NULL, NULL),
(971, 'Drawing', 1005, 'active', NULL, NULL),
(972, 'Eclipse', 1006, 'active', NULL, NULL),
(973, 'Sketching', 1007, 'active', NULL, NULL),
(974, 'Corel Draw', 1008, 'active', NULL, NULL),
(975, 'Copyright', 1009, 'active', NULL, NULL),
(976, 'Swing (Java)', 1010, 'active', NULL, NULL),
(977, 'OpenVPN', 1011, 'active', NULL, NULL),
(978, 'cURL', 1012, 'active', NULL, NULL),
(979, 'Adobe Illustrator', 1013, 'active', NULL, NULL),
(980, 'Virtual Machines', 1014, 'active', NULL, NULL),
(981, 'Camtasia', 1015, 'active', NULL, NULL),
(982, 'Netbeans', 1016, 'active', NULL, NULL),
(983, 'Pascal', 1017, 'active', NULL, NULL),
(984, 'Typing', 1018, 'active', NULL, NULL),
(985, 'Scripting', 1019, 'active', NULL, NULL),
(986, 'phpMyAdmin', 1020, 'active', NULL, NULL),
(987, 'Qt', 1021, 'active', NULL, NULL),
(988, 'Computer Science', 1022, 'active', NULL, NULL),
(989, 'Digital Marketing', 1023, 'active', NULL, NULL),
(990, 'CV Library', 1024, 'active', NULL, NULL),
(991, 'OpenCV', 1025, 'active', NULL, NULL),
(992, 'PPC Marketing', 1026, 'active', NULL, NULL),
(993, 'VideoScribe', 1027, 'active', NULL, NULL),
(994, 'Marketing Strategy', 1028, 'active', NULL, NULL),
(995, 'Essay Writing', 1029, 'active', NULL, NULL),
(996, 'Cinematography', 1030, 'active', NULL, NULL),
(997, 'Web Development', 1031, 'active', NULL, NULL),
(998, 'Qualitative Research', 1032, 'active', NULL, NULL),
(999, 'Content Marketing', 1033, 'active', NULL, NULL),
(1000, 'Adobe Muse', 1034, 'active', NULL, NULL),
(1001, 'Excel VBA', 1035, 'active', NULL, NULL),
(1002, 'JUnit', 1036, 'active', NULL, NULL),
(1003, 'Object Oriented Programming (OOP)', 1037, 'active', NULL, NULL),
(1004, 'Business Card Design', 1038, 'active', NULL, NULL),
(1005, 'Data Analytics', 1039, 'active', NULL, NULL),
(1006, 'Web Crawling', 1040, 'active', NULL, NULL),
(1007, 'Twitter API', 1041, 'active', NULL, NULL),
(1008, 'CSS3', 1042, 'active', NULL, NULL),
(1009, 'Virtualization', 1043, 'active', NULL, NULL),
(1010, 'Instagram API', 1044, 'active', NULL, NULL),
(1011, 'Excel Macros', 1045, 'active', NULL, NULL),
(1012, 'Corel Painter', 1046, 'active', NULL, NULL),
(1013, 'Sales Promotion', 1047, 'active', NULL, NULL),
(1014, 'Academic Writing', 1048, 'active', NULL, NULL),
(1015, 'Very-large-scale integration (VLSI)', 1049, 'active', NULL, NULL),
(1016, 'XHTML', 1050, 'active', NULL, NULL),
(1017, 'Scrapy', 1051, 'active', NULL, NULL),
(1018, 'Assembla', 1052, 'active', NULL, NULL),
(1019, 'Flash Animation', 1053, 'active', NULL, NULL),
(1020, 'XAML', 1054, 'active', NULL, NULL),
(1021, 'Social Media Management', 1055, 'active', NULL, NULL),
(1022, 'Autodesk Sketchbook Pro', 1056, 'active', NULL, NULL),
(1023, 'Brand Management', 1057, 'active', NULL, NULL),
(1024, 'Moz', 1058, 'active', NULL, NULL),
(1025, 'ADO.NET', 1059, 'active', NULL, NULL),
(1026, 'Apache Maven', 1060, 'active', NULL, NULL),
(1027, 'Photo Restoration', 1061, 'active', NULL, NULL),
(1028, 'OpenVZ', 1062, 'active', NULL, NULL),
(1029, '2D Animation', 1063, 'active', NULL, NULL),
(1030, 'Adobe Pagemaker', 1064, 'active', NULL, NULL),
(1031, 'Instagram Marketing', 1065, 'active', NULL, NULL),
(1032, 'Brand Marketing', 1066, 'active', NULL, NULL),
(1033, 'iOS Development', 1067, 'active', NULL, NULL),
(1034, 'Kinetic Typography', 1068, 'active', NULL, NULL),
(1035, 'Content Strategy', 1069, 'active', NULL, NULL),
(1036, 'Blog Writing', 1070, 'active', NULL, NULL),
(1037, 'Photo Retouching', 1071, 'active', NULL, NULL),
(1038, 'Data Cleansing', 1072, 'active', NULL, NULL),
(1039, 'Website Analytics', 1073, 'active', NULL, NULL),
(1040, 'Editorial Writing', 1074, 'active', NULL, NULL),
(1041, 'Data Scraping', 1075, 'active', NULL, NULL),
(1042, 'PhpNuke', 1076, 'active', NULL, NULL),
(1043, 'Data Extraction', 1077, 'active', NULL, NULL),
(1044, 'Graphics Programming', 1078, 'active', NULL, NULL),
(1045, 'phpFox', 1079, 'active', NULL, NULL),
(1046, 'Copy Editing', 1080, 'active', NULL, NULL),
(1047, 'SEO Writing', 1081, 'active', NULL, NULL),
(1048, 'Bash Scripting', 1082, 'active', NULL, NULL),
(1049, 'Twitter Marketing', 1083, 'active', NULL, NULL);
INSERT INTO `skills` (`id`, `name`, `freelancer_job_id`, `status`, `created_at`, `updated_at`) VALUES
(1050, 'Payment Gateway Integration', 1084, 'active', NULL, NULL),
(1051, 'Keyword Research', 1085, 'active', NULL, NULL),
(1052, 'Adobe Freehand', 1086, 'active', NULL, NULL),
(1053, 'API', 1087, 'active', NULL, NULL),
(1054, 'Full Stack Development', 1088, 'active', NULL, NULL),
(1055, 'ARKit', 1089, 'active', NULL, NULL),
(1056, 'ARCore', 1090, 'active', NULL, NULL),
(1057, 'Writing', 1091, 'active', NULL, NULL),
(1058, 'Backend Development', 1092, 'active', NULL, NULL),
(1059, 'Frontend Development', 1093, 'active', NULL, NULL),
(1060, 'Flask', 1094, 'active', NULL, NULL),
(1061, 'jqGrid', 1095, 'active', NULL, NULL),
(1062, 'Push Notification', 1096, 'active', NULL, NULL),
(1063, 'BeautifulSoup', 1097, 'active', NULL, NULL),
(1064, 'Sails.js', 1098, 'active', NULL, NULL),
(1065, 'SSIS (SQL Server Integration Services)', 1099, 'active', NULL, NULL),
(1066, 'Vim', 1100, 'active', NULL, NULL),
(1067, 'Documentation', 1101, 'active', NULL, NULL),
(1068, 'F#', 1102, 'active', NULL, NULL),
(1069, 'Aws Lambda', 1103, 'active', NULL, NULL),
(1070, 'Jinja2', 1104, 'active', NULL, NULL),
(1071, 'xpath', 1105, 'active', NULL, NULL),
(1072, 'Racket', 1106, 'active', NULL, NULL),
(1073, 'Datatables', 1107, 'active', NULL, NULL),
(1074, 'Dojo', 1108, 'active', NULL, NULL),
(1075, 'Lucene', 1109, 'active', NULL, NULL),
(1076, 'Charts', 1110, 'active', NULL, NULL),
(1077, 'cxf', 1111, 'active', NULL, NULL),
(1078, 'Selenium Webdriver', 1112, 'active', NULL, NULL),
(1079, 'CoffeeScript', 1113, 'active', NULL, NULL),
(1080, 'T-SQL (Transact Structures Query Language)', 1114, 'active', NULL, NULL),
(1081, 'IBM Bluemix', 1115, 'active', NULL, NULL),
(1082, 'XSS (Cross-site scripting)', 1116, 'active', NULL, NULL),
(1083, 'MapKit', 1117, 'active', NULL, NULL),
(1084, 'Scikit Learn', 1118, 'active', NULL, NULL),
(1085, 'Java Spring', 1119, 'active', NULL, NULL),
(1086, 'Clojure', 1120, 'active', NULL, NULL),
(1087, 'Elixir', 1121, 'active', NULL, NULL),
(1088, 'Cocoa Touch', 1122, 'active', NULL, NULL),
(1089, 'VBScript', 1123, 'active', NULL, NULL),
(1090, 'Ext JS', 1124, 'active', NULL, NULL),
(1091, 'SVG', 1125, 'active', NULL, NULL),
(1092, 'Vue.js', 1126, 'active', NULL, NULL),
(1093, 'ECMAScript', 1127, 'active', NULL, NULL),
(1094, 'Handlebars.js', 1128, 'active', NULL, NULL),
(1095, 'Julia Language', 1129, 'active', NULL, NULL),
(1096, 'Underscore.js', 1130, 'active', NULL, NULL),
(1097, 'RSS', 1131, 'active', NULL, NULL),
(1098, 'GTK+', 1132, 'active', NULL, NULL),
(1099, 'Java ME', 1133, 'active', NULL, NULL),
(1100, 'Drone Photography', 1134, 'active', NULL, NULL),
(1101, 'Flower Delivery', 1135, 'active', NULL, NULL),
(1102, 'Car Washing', 1136, 'active', NULL, NULL),
(1103, 'Car Driving', 1137, 'active', NULL, NULL),
(1104, 'OEM Sales', 1139, 'active', NULL, NULL),
(1105, 'ISV Sales', 1140, 'active', NULL, NULL),
(1106, 'SaaS Sales', 1141, 'active', NULL, NULL),
(1107, 'Medical Devices Sales', 1142, 'active', NULL, NULL),
(1108, 'Cloud Sales', 1143, 'active', NULL, NULL),
(1109, 'HR Sales', 1144, 'active', NULL, NULL),
(1110, 'ATS Sales', 1145, 'active', NULL, NULL),
(1111, 'Recruiting Sales', 1146, 'active', NULL, NULL),
(1112, 'Payroll Sales', 1147, 'active', NULL, NULL),
(1113, 'Analytics Sales', 1148, 'active', NULL, NULL),
(1114, 'Mobile Sales', 1149, 'active', NULL, NULL),
(1115, 'Social Sales', 1150, 'active', NULL, NULL),
(1116, 'Media Sales', 1151, 'active', NULL, NULL),
(1117, 'Digital Agency Sales', 1152, 'active', NULL, NULL),
(1118, 'Technology Sales', 1153, 'active', NULL, NULL),
(1119, 'Telecom Sales', 1154, 'active', NULL, NULL),
(1120, 'Financial Sales', 1155, 'active', NULL, NULL),
(1121, 'Healthcare Sales', 1156, 'active', NULL, NULL),
(1122, 'Life Science Sales', 1157, 'active', NULL, NULL),
(1123, 'Retail Sales', 1158, 'active', NULL, NULL),
(1124, 'Security Sales', 1159, 'active', NULL, NULL),
(1125, 'IDM Sales', 1160, 'active', NULL, NULL),
(1126, 'Network Sales', 1161, 'active', NULL, NULL),
(1127, 'Datacenter Sales', 1162, 'active', NULL, NULL),
(1128, 'Resellers', 1163, 'active', NULL, NULL),
(1129, 'Channel Sales', 1164, 'active', NULL, NULL),
(1130, 'Field Sales', 1165, 'active', NULL, NULL),
(1131, 'Enterprise Sales', 1166, 'active', NULL, NULL),
(1132, 'Software Sales', 1167, 'active', NULL, NULL),
(1133, 'Inside Sales', 1168, 'active', NULL, NULL),
(1134, 'Emerging Accounts', 1169, 'active', NULL, NULL),
(1135, 'Sales Account Management', 1170, 'active', NULL, NULL),
(1136, 'OEM Account Management', 1171, 'active', NULL, NULL),
(1137, 'Channel Account Management', 1172, 'active', NULL, NULL),
(1138, 'Field Sales Management', 1173, 'active', NULL, NULL),
(1139, 'Enterprise Sales Management', 1174, 'active', NULL, NULL),
(1140, 'Account Management', 1175, 'active', NULL, NULL),
(1141, 'Sales Management', 1176, 'active', NULL, NULL),
(1142, 'Internet of Things (IoT)', 1177, 'active', NULL, NULL),
(1143, 'Heavy Haulage', 1178, 'active', NULL, NULL),
(1144, 'Line Haulage', 1179, 'active', NULL, NULL),
(1145, 'Cargo Freight', 1180, 'active', NULL, NULL),
(1146, 'Trucking', 1181, 'active', NULL, NULL),
(1147, 'Shipping', 1182, 'active', NULL, NULL),
(1148, 'Freight', 1183, 'active', NULL, NULL),
(1149, 'Google Cloud Platform', 1184, 'active', NULL, NULL),
(1150, 'Product Photography', 1185, 'active', NULL, NULL),
(1151, 'Rapid Prototyping', 1186, 'active', NULL, NULL),
(1152, 'SCORM', 1187, 'active', NULL, NULL),
(1153, 'Enterprise Architecture', 1188, 'active', NULL, NULL),
(1154, 'Tensorflow', 1189, 'active', NULL, NULL),
(1155, 'Atlassian Confluence', 1190, 'active', NULL, NULL),
(1156, 'Apple Xcode', 1191, 'active', NULL, NULL),
(1157, 'Customer Retention', 1192, 'active', NULL, NULL),
(1158, 'Articulate Storyline', 1193, 'active', NULL, NULL),
(1159, 'GitLab', 1194, 'active', NULL, NULL),
(1160, 'Apple UIKit', 1195, 'active', NULL, NULL),
(1161, 'Linguistics', 1196, 'active', NULL, NULL),
(1162, 'Jenkins', 1197, 'active', NULL, NULL),
(1163, 'Keras', 1198, 'active', NULL, NULL),
(1164, 'Pytorch', 1199, 'active', NULL, NULL),
(1165, 'Firmware', 1200, 'active', NULL, NULL),
(1166, 'Car Courier', 1201, 'active', NULL, NULL),
(1167, 'Truck Courier', 1202, 'active', NULL, NULL),
(1168, 'Van Courier', 1203, 'active', NULL, NULL),
(1169, 'Bicycle Courier', 1204, 'active', NULL, NULL),
(1170, 'Heavy Haulage Trucking', 1205, 'active', NULL, NULL),
(1171, 'Logistics Company', 1206, 'active', NULL, NULL),
(1172, 'Container Truck', 1210, 'active', NULL, NULL),
(1173, 'Machinery Equipment Hire', 1211, 'active', NULL, NULL),
(1174, 'Import/Export', 1212, 'active', NULL, NULL),
(1175, 'Radio Frequency', 1213, 'active', NULL, NULL),
(1176, 'Radio Frequency Engineering', 1214, 'active', NULL, NULL),
(1177, 'Business Analytics', 1215, 'active', NULL, NULL),
(1178, 'Infrastructure Architecture', 1216, 'active', NULL, NULL),
(1179, 'Operations Research', 1217, 'active', NULL, NULL),
(1180, 'Solutions Architecture', 1218, 'active', NULL, NULL),
(1181, 'Telecoms Engineering', 1219, 'active', NULL, NULL),
(1182, 'Wireless Radio Frequency Engineering', 1220, 'active', NULL, NULL),
(1183, 'AutoCAD Architecture', 1221, 'active', NULL, NULL),
(1184, 'Development Operations', 1222, 'active', NULL, NULL),
(1185, 'Systems Engineering', 1223, 'active', NULL, NULL),
(1186, 'Sketch', 1224, 'active', NULL, NULL),
(1187, 'Sass', 1225, 'active', NULL, NULL),
(1188, 'DOM', 1226, 'active', NULL, NULL),
(1189, 'HTTP', 1227, 'active', NULL, NULL),
(1190, 'Container Transport', 1228, 'active', NULL, NULL),
(1191, 'Motorcycle Courier', 1229, 'active', NULL, NULL),
(1192, 'Courier', 1230, 'active', NULL, NULL),
(1193, 'Parcel Delivery', 1231, 'active', NULL, NULL),
(1194, 'Dry Van Trucking', 1232, 'active', NULL, NULL),
(1195, 'Reefer Trucking', 1233, 'active', NULL, NULL),
(1196, 'Flatbed Trucking', 1234, 'active', NULL, NULL),
(1197, 'Frozen Trucking', 1235, 'active', NULL, NULL),
(1198, 'Furniture Removalist', 1236, 'active', NULL, NULL),
(1199, 'Haulier', 1237, 'active', NULL, NULL),
(1200, 'Hiab Crane Trucking', 1238, 'active', NULL, NULL),
(1201, 'Web API', 1239, 'active', NULL, NULL),
(1202, 'RESTful API', 1240, 'active', NULL, NULL),
(1203, 'RxJS', 1241, 'active', NULL, NULL),
(1204, 'NgRx', 1242, 'active', NULL, NULL),
(1205, 'Angular Material', 1243, 'active', NULL, NULL),
(1206, 'Karma Javascript', 1244, 'active', NULL, NULL),
(1207, 'Jasmine Javascript', 1245, 'active', NULL, NULL),
(1208, 'Protractor Javascript', 1246, 'active', NULL, NULL),
(1209, 'Fastlane', 1247, 'active', NULL, NULL),
(1210, 'CocoaPods', 1248, 'active', NULL, NULL),
(1211, 'Carthage', 1249, 'active', NULL, NULL),
(1212, 'Swift Package Manager', 1250, 'active', NULL, NULL),
(1213, 'Xcodebuild', 1251, 'active', NULL, NULL),
(1214, 'NoSQL', 1253, 'active', NULL, NULL),
(1215, 'MongoDB', 1254, 'active', NULL, NULL),
(1216, 'Storm', 1255, 'active', NULL, NULL),
(1217, 'Heron', 1256, 'active', NULL, NULL),
(1218, 'Server', 1257, 'active', NULL, NULL),
(1219, 'Vapor', 1258, 'active', NULL, NULL),
(1220, 'Boost', 1259, 'active', NULL, NULL),
(1221, 'Continuous Integration', 1260, 'active', NULL, NULL),
(1222, 'Travis CI', 1261, 'active', NULL, NULL),
(1223, 'TeamCity', 1262, 'active', NULL, NULL),
(1224, 'CircleCI', 1263, 'active', NULL, NULL),
(1225, 'ASM', 1264, 'active', NULL, NULL),
(1226, 'Rust', 1265, 'active', NULL, NULL),
(1227, 'CentOs', 1266, 'active', NULL, NULL),
(1228, 'Version Control Git', 1267, 'active', NULL, NULL),
(1229, 'Prometheus Monitoring', 1268, 'active', NULL, NULL),
(1230, 'Soldering', 1269, 'active', NULL, NULL),
(1231, 'Electronic Design', 1270, 'active', NULL, NULL),
(1232, 'Armadillo', 1271, 'active', NULL, NULL),
(1233, 'LIBSVM', 1272, 'active', NULL, NULL),
(1234, 'FLANN', 1273, 'active', NULL, NULL),
(1235, 'NumPy', 1274, 'active', NULL, NULL),
(1236, 'SciPy', 1275, 'active', NULL, NULL),
(1237, 'Vowpal Wabbit', 1276, 'active', NULL, NULL),
(1238, 'Javascript ES6', 1277, 'active', NULL, NULL),
(1239, 'ES8 Javascript', 1278, 'active', NULL, NULL),
(1240, 'Compensation and Benefits', 1279, 'active', NULL, NULL),
(1241, 'Customs and Global Trade Services', 1280, 'active', NULL, NULL),
(1242, 'Employment Tax', 1281, 'active', NULL, NULL),
(1243, 'Energy and Resource Tax', 1282, 'active', NULL, NULL),
(1244, 'Equity Transaction Advice', 1283, 'active', NULL, NULL),
(1245, 'Executive Compensation', 1284, 'active', NULL, NULL),
(1246, 'Executive Reward', 1285, 'active', NULL, NULL),
(1247, 'Expatriate Tax', 1286, 'active', NULL, NULL),
(1248, 'Financial Services Tax', 1287, 'active', NULL, NULL),
(1249, 'Global Mobility', 1288, 'active', NULL, NULL),
(1250, 'Global Tax Compliance', 1289, 'active', NULL, NULL),
(1251, 'Immigration', 1290, 'active', NULL, NULL),
(1252, 'Indirect Tax', 1291, 'active', NULL, NULL),
(1253, 'Personal Tax', 1292, 'active', NULL, NULL),
(1254, 'Reward', 1293, 'active', NULL, NULL),
(1255, 'Share Schemes', 1294, 'active', NULL, NULL),
(1256, 'Tax Centre of Excellence', 1295, 'active', NULL, NULL),
(1257, 'Tax Compliance', 1296, 'active', NULL, NULL),
(1258, 'Tax Compliance and Outsourcing', 1297, 'active', NULL, NULL),
(1259, 'Tax Management Consulting', 1298, 'active', NULL, NULL),
(1260, 'Tax Reporting', 1299, 'active', NULL, NULL),
(1261, 'Total Reward', 1300, 'active', NULL, NULL),
(1262, 'Transaction Tax', 1301, 'active', NULL, NULL),
(1263, 'Transfer Pricing', 1302, 'active', NULL, NULL),
(1264, 'Value Added Tax', 1303, 'active', NULL, NULL),
(1265, 'Private Client', 1304, 'active', NULL, NULL),
(1266, 'Corporate Transactions', 1305, 'active', NULL, NULL),
(1267, 'Mergers and Acquisitions', 1306, 'active', NULL, NULL),
(1268, 'Management Consulting', 1307, 'active', NULL, NULL),
(1269, 'Closer', 1308, 'active', NULL, NULL),
(1270, 'Revit', 1309, 'active', NULL, NULL),
(1271, 'Revit Architecture', 1310, 'active', NULL, NULL),
(1272, 'Office 365', 1311, 'active', NULL, NULL),
(1273, 'iMacros', 1312, 'active', NULL, NULL),
(1274, 'Unreal Engine', 1313, 'active', NULL, NULL),
(1275, 'React Native', 1314, 'active', NULL, NULL),
(1276, 'Flutter', 1315, 'active', NULL, NULL),
(1277, 'Test Strategy Writing', 1316, 'active', NULL, NULL),
(1278, 'Test Plan Writing', 1317, 'active', NULL, NULL),
(1279, 'Business Requirement Documentation', 1318, 'active', NULL, NULL),
(1280, 'Embroidery', 1319, 'active', NULL, NULL),
(1281, 'Andon', 1320, 'active', NULL, NULL),
(1282, 'Alerting', 1321, 'active', NULL, NULL),
(1283, 'Process Validation', 1322, 'active', NULL, NULL),
(1284, 'Process Automation', 1323, 'active', NULL, NULL),
(1285, 'Georgian', 1324, 'active', NULL, NULL),
(1286, 'jQuery', 1325, 'active', NULL, NULL),
(1287, 'Paralegal Services', 1326, 'active', NULL, NULL),
(1288, 'Analog', 1327, 'active', NULL, NULL),
(1289, 'Antenna Design', 1328, 'active', NULL, NULL),
(1290, 'ARM', 1329, 'active', NULL, NULL),
(1291, 'Acoustical Engineering', 1330, 'active', NULL, NULL),
(1292, 'Audio Processing', 1331, 'active', NULL, NULL),
(1293, 'Battery Charging and Batteries', 1332, 'active', NULL, NULL),
(1294, 'Bill of Materials (BOM) Analysis', 1333, 'active', NULL, NULL),
(1295, 'Bill of Materials (BOM) Optimization', 1334, 'active', NULL, NULL),
(1296, 'Bluetooth', 1335, 'active', NULL, NULL),
(1297, 'Circuit Board Layout', 1336, 'active', NULL, NULL),
(1298, 'Bill of Materials (BOM) Evaluation', 1337, 'active', NULL, NULL),
(1299, 'Board Support Package (BSP)', 1340, 'active', NULL, NULL),
(1300, 'Compliance Engineering', 1341, 'active', NULL, NULL),
(1301, 'Consumer Products', 1342, 'active', NULL, NULL),
(1302, 'Power Converters', 1343, 'active', NULL, NULL),
(1303, 'DFM (Design for Manufacturing)', 1344, 'active', NULL, NULL),
(1304, 'Digital Electronics', 1345, 'active', NULL, NULL),
(1305, 'ASIC', 1346, 'active', NULL, NULL),
(1306, 'Embedded Systems', 1347, 'active', NULL, NULL),
(1307, 'Encryption', 1348, 'active', NULL, NULL),
(1308, 'Flex Circuit Design', 1349, 'active', NULL, NULL),
(1309, 'Power Generation', 1350, 'active', NULL, NULL),
(1310, 'PCB Design and Layout', 1351, 'active', NULL, NULL),
(1311, 'Intrinsic Safety Applications', 1352, 'active', NULL, NULL),
(1312, 'Motor Control', 1353, 'active', NULL, NULL),
(1313, 'Near Field Communication (NFC)', 1354, 'active', NULL, NULL),
(1314, 'PCI Express', 1355, 'active', NULL, NULL),
(1315, 'Power Amplifier RF', 1356, 'active', NULL, NULL),
(1316, 'Power Redesign', 1357, 'active', NULL, NULL),
(1317, 'Product End of Life (EOL)', 1358, 'active', NULL, NULL),
(1318, 'Quality and Reliability Testing', 1359, 'active', NULL, NULL),
(1319, 'RADAR/LIDAR', 1360, 'active', NULL, NULL),
(1320, 'Renewables', 1361, 'active', NULL, NULL),
(1321, 'RFID (Radio-frequency identification)', 1362, 'active', NULL, NULL),
(1322, 'Schematic Review', 1363, 'active', NULL, NULL),
(1323, 'Schematics', 1364, 'active', NULL, NULL),
(1324, 'Security', 1365, 'active', NULL, NULL),
(1325, 'Semiconductor', 1366, 'active', NULL, NULL),
(1326, 'Signal Processing', 1367, 'active', NULL, NULL),
(1327, 'Smart Lighting', 1368, 'active', NULL, NULL),
(1328, 'SoC Design', 1369, 'active', NULL, NULL),
(1329, 'Solar', 1370, 'active', NULL, NULL),
(1330, 'Telecom', 1371, 'active', NULL, NULL),
(1331, 'Thermal & Environmental Testing', 1372, 'active', NULL, NULL),
(1332, 'Thermal Analysis', 1373, 'active', NULL, NULL),
(1333, 'Video Processing', 1374, 'active', NULL, NULL),
(1334, 'Waterproof Design (IP68)', 1375, 'active', NULL, NULL),
(1335, 'WiFi', 1376, 'active', NULL, NULL),
(1336, 'Wireless Certification (CSA, FCC, IEC, FAA, IEEE, CE, Atex)', 1377, 'active', NULL, NULL),
(1337, 'Wireless Charging', 1378, 'active', NULL, NULL),
(1338, 'Zigbee', 1379, 'active', NULL, NULL),
(1339, 'D0-178 Certification', 1380, 'active', NULL, NULL),
(1340, 'D0-254 Certification', 1381, 'active', NULL, NULL),
(1341, 'Alteryx', 1382, 'active', NULL, NULL),
(1342, 'Data Visualization', 1383, 'active', NULL, NULL),
(1343, 'Pine Script', 1384, 'active', NULL, NULL),
(1344, 'Local Job', 1386, 'active', NULL, NULL),
(1345, 'Computer Repair', 1387, 'active', NULL, NULL),
(1346, 'Printer Repair', 1388, 'active', NULL, NULL),
(1347, 'SDW N17 Service Qualification', 1389, 'active', NULL, NULL),
(1348, 'Compliance and Safety Procedures Writer', 1390, 'active', NULL, NULL),
(1349, 'Amibroker Formula Language', 1391, 'active', NULL, NULL),
(1350, 'Compliance and Safety Training', 1392, 'active', NULL, NULL),
(1351, 'Workflow Consulting', 1393, 'active', NULL, NULL),
(1352, 'External Auditing', 1394, 'active', NULL, NULL),
(1353, 'SAP Hybris', 1395, 'active', NULL, NULL),
(1354, 'Combinatorial Problem Solving', 1396, 'active', NULL, NULL),
(1355, 'Combinatorial Optimization', 1397, 'active', NULL, NULL),
(1356, 'Cellular Modules', 1398, 'active', NULL, NULL),
(1357, 'ISM Radio Module', 1399, 'active', NULL, NULL),
(1358, 'Bluetooth Module', 1400, 'active', NULL, NULL),
(1359, 'LoRa', 1401, 'active', NULL, NULL),
(1360, 'AI (Artificial Intelligence) HW/SW', 1402, 'active', NULL, NULL),
(1361, 'SMART City', 1403, 'active', NULL, NULL),
(1362, 'Wireless Sensors', 1404, 'active', NULL, NULL),
(1363, 'Twilio', 1405, 'active', NULL, NULL),
(1364, 'VtrunkD', 1406, 'active', NULL, NULL),
(1365, 'SD-WAN', 1407, 'active', NULL, NULL),
(1366, 'Security Systems', 1408, 'active', NULL, NULL),
(1367, 'CCTV', 1409, 'active', NULL, NULL),
(1368, 'Biometrics', 1410, 'active', NULL, NULL),
(1369, 'Security Camera', 1411, 'active', NULL, NULL),
(1370, 'IBM Tririga', 1413, 'active', NULL, NULL),
(1371, 'BIRT Development', 1414, 'active', NULL, NULL),
(1372, 'Animated Video Development', 1415, 'active', NULL, NULL),
(1373, 'Report Development', 1416, 'active', NULL, NULL),
(1374, 'Excel VB Capabilities', 1417, 'active', NULL, NULL),
(1375, 'Infographic and Powerpoint Slide Designing', 1418, 'active', NULL, NULL),
(1376, 'Prototype Design', 1419, 'active', NULL, NULL),
(1377, 'Data Analysis', 1420, 'active', NULL, NULL),
(1378, 'Cloud Data', 1421, 'active', NULL, NULL),
(1379, 'Data Delivery', 1422, 'active', NULL, NULL),
(1380, 'Data Integration', 1423, 'active', NULL, NULL),
(1381, 'Data Modernization', 1424, 'active', NULL, NULL),
(1382, 'ERP Software', 1425, 'active', NULL, NULL),
(1383, 'Open Source', 1426, 'active', NULL, NULL),
(1384, 'SAP Transformation', 1427, 'active', NULL, NULL),
(1385, 'ServiceNow', 1428, 'active', NULL, NULL),
(1386, 'IT Transformation', 1429, 'active', NULL, NULL),
(1387, 'Infor', 1430, 'active', NULL, NULL),
(1388, 'Workday Financials', 1431, 'active', NULL, NULL),
(1389, 'Time & Labor SAP', 1432, 'active', NULL, NULL),
(1390, 'SAP Pay', 1433, 'active', NULL, NULL),
(1391, 'EC Pay Workday', 1434, 'active', NULL, NULL),
(1392, 'Payroll HR S&E', 1435, 'active', NULL, NULL),
(1393, 'Shared Services', 1436, 'active', NULL, NULL),
(1394, 'Employee Experience', 1437, 'active', NULL, NULL),
(1395, 'SAP 4 Hana', 1438, 'active', NULL, NULL),
(1396, 'SFDC', 1439, 'active', NULL, NULL),
(1397, 'Finance Transformation', 1440, 'inactive', NULL, '2021-07-12 23:57:16'),
(1398, 'Organization Design', 1441, 'inactive', NULL, '2021-07-12 23:57:23'),
(1399, 'Talent Acquisition', 1442, 'inactive', NULL, '2021-07-12 23:57:26'),
(1400, 'Oracle Retail', 1443, 'inactive', NULL, '2021-07-12 23:57:31'),
(1401, 'Cloud Finance', 1444, 'inactive', NULL, '2021-07-12 23:57:34'),
(1402, 'Oracle EBS Tech Integration', 1445, 'inactive', NULL, '2021-07-12 23:57:39'),
(1403, 'Guidewire', 1446, 'inactive', NULL, '2021-07-12 23:57:45'),
(1404, 'Epic Systems', 1447, 'inactive', NULL, '2021-07-12 23:57:49'),
(1405, 'Health Planning', 1448, 'inactive', NULL, '2021-07-12 23:57:56'),
(1406, 'Value Based Healthcare', 1449, 'inactive', NULL, '2021-07-12 23:58:02'),
(1407, 'Health Plans Digitization', 1450, 'inactive', NULL, '2021-07-12 23:58:09'),
(1408, 'Care Management', 1451, 'inactive', NULL, '2021-07-12 23:58:14'),
(1409, 'Customer Experience', 1452, 'active', NULL, NULL),
(1410, 'Core Systems Transformation', 1453, 'active', NULL, NULL),
(1411, 'Robotics and Cognitive Automation', 1454, 'inactive', NULL, '2021-07-12 23:58:29'),
(1412, 'CompTIA', 1455, 'inactive', NULL, '2021-07-12 23:58:33'),
(1413, 'Cloud', 1456, 'active', NULL, NULL),
(1414, 'Training Development', 1457, 'inactive', NULL, '2021-07-12 23:58:39'),
(1415, 'Health Care Management', 1458, 'inactive', NULL, '2021-07-12 23:58:46'),
(1416, 'MuleSoft', 1459, 'inactive', NULL, '2021-07-12 23:58:52'),
(1417, 'Manufacturing Strategy', 1460, 'inactive', NULL, '2021-07-12 23:58:58'),
(1418, 'nCino', 1461, 'inactive', NULL, '2021-07-12 23:59:05'),
(1419, 'Project Management Office', 1462, 'inactive', NULL, '2021-07-12 23:59:10'),
(1420, 'Java Technical Architecture', 1463, 'active', NULL, NULL),
(1421, 'Salesforce CPQ', 1464, 'active', NULL, NULL),
(1422, 'Apttus', 1465, 'inactive', NULL, '2021-07-12 23:59:26'),
(1423, 'NetSuite', 1466, 'active', NULL, NULL),
(1424, 'Contact Center Services', 1467, 'inactive', NULL, '2021-07-12 23:59:45'),
(1425, 'Anaplan', 1468, 'inactive', NULL, '2021-07-12 23:59:49'),
(1426, 'Salesforce Marketing Cloud', 1469, 'active', NULL, NULL),
(1427, 'Front-end Design', 1470, 'active', NULL, NULL),
(1428, 'SAP BODS', 1471, 'inactive', NULL, '2021-07-13 00:00:03'),
(1429, 'SAP Master Data Governance', 1472, 'inactive', NULL, '2021-07-13 00:00:11'),
(1430, 'Data Architecture', 1473, 'inactive', NULL, '2021-07-13 00:00:22'),
(1431, 'Data Governance', 1474, 'inactive', NULL, '2021-07-13 00:00:27'),
(1432, 'Robotic Process Automation', 1475, 'inactive', NULL, '2021-07-13 00:00:44'),
(1433, 'Informatica Powercenter ETL', 1476, 'inactive', NULL, '2021-07-13 00:00:48'),
(1434, 'Apache Hadoop', 1477, 'active', NULL, NULL),
(1435, 'Informatica MDM', 1478, 'active', NULL, NULL),
(1436, 'Oracle OBIA', 1479, 'active', NULL, NULL),
(1437, 'Oracle OBIEE', 1480, 'active', NULL, NULL),
(1438, 'IT Operating Model', 1481, 'active', NULL, NULL),
(1439, 'IT strategy', 1482, 'active', NULL, NULL),
(1440, 'Customer Strategy', 1483, 'active', NULL, NULL),
(1441, 'Business Strategy', 1484, 'active', NULL, NULL),
(1442, 'Visa Ready Resources', 1485, 'active', NULL, NULL),
(1443, 'Core Consulting Skills', 1486, 'active', NULL, NULL),
(1444, 'Market Sizing', 1487, 'active', NULL, NULL),
(1445, 'Supply Chain', 1488, 'active', NULL, NULL),
(1446, 'SAP HANA', 1489, 'active', NULL, NULL),
(1447, 'SAP Business Planning and Consolidation', 1490, 'active', NULL, NULL),
(1448, 'Cloud Procurement', 1491, 'active', NULL, NULL),
(1449, 'Oracle Database', 1492, 'active', NULL, NULL),
(1450, 'Ariba', 1493, 'active', NULL, NULL),
(1451, 'Travel Ready', 1494, 'active', NULL, NULL),
(1452, 'Oracle Hyperion', 1495, 'active', NULL, NULL),
(1453, 'Cognos', 1496, 'active', NULL, NULL),
(1454, 'EBS Finance', 1497, 'active', NULL, NULL),
(1455, 'EBS Procurement', 1498, 'active', NULL, NULL),
(1456, 'Lifestyle Coach', 1499, 'active', NULL, NULL),
(1457, 'Lost-wax Casting', 1500, 'active', NULL, NULL),
(1458, 'Casting', 1501, 'active', NULL, NULL),
(1459, 'Video Tours', 1502, 'active', NULL, NULL),
(1460, 'Power BI', 1503, 'active', NULL, NULL),
(1461, 'Corporate Income Tax', 1504, 'active', NULL, NULL),
(1462, 'Custom Duties Tax', 1505, 'active', NULL, NULL),
(1463, 'Personal Income Tax', 1506, 'active', NULL, NULL),
(1464, 'Immigration Law', 1507, 'active', NULL, NULL),
(1465, 'Tax Accounting', 1508, 'active', NULL, NULL),
(1466, 'Research and Development', 1509, 'active', NULL, NULL),
(1467, 'Tax Technology', 1510, 'active', NULL, NULL),
(1468, 'Tax Risk Management', 1511, 'active', NULL, NULL),
(1469, 'General Tax Advisory', 1512, 'active', NULL, NULL),
(1470, 'PAYE Tax', 1513, 'active', NULL, NULL),
(1471, 'Social Security Tax', 1514, 'active', NULL, NULL),
(1472, 'M&A Tax', 1515, 'active', NULL, NULL),
(1473, 'Technology', 1516, 'active', NULL, NULL),
(1474, 'Media and Entertainment Tax', 1517, 'active', NULL, NULL),
(1475, 'Public Sector and Taxation', 1518, 'active', NULL, NULL),
(1476, 'Real Estate Tax', 1519, 'active', NULL, NULL),
(1477, 'Life Science Tax Services', 1520, 'active', NULL, NULL),
(1478, 'Blender', 1521, 'active', NULL, NULL),
(1479, 'Znode', 1522, 'active', NULL, NULL),
(1480, 'Yii2', 1523, 'active', NULL, NULL),
(1481, 'Bubble Developer', 1524, 'active', NULL, NULL),
(1482, 'Web Page Writer', 1525, 'active', NULL, NULL),
(1483, 'PHP Slim', 1526, 'active', NULL, NULL),
(1484, 'Google Firebase', 1527, 'active', NULL, NULL),
(1485, 'Atlassian Jira', 1528, 'active', NULL, NULL),
(1486, 'CCTV Repair', 1529, 'active', NULL, NULL),
(1487, 'Mobile Repair', 1530, 'active', NULL, NULL),
(1488, 'Google PageSpeed Insights', 1531, 'active', NULL, NULL),
(1489, 'SAP PI', 1532, 'active', NULL, NULL),
(1490, 'SAP CPI', 1533, 'active', NULL, NULL),
(1491, 'US Taxation', 1534, 'active', NULL, NULL),
(1492, 'Explainer Videos', 1535, 'active', NULL, NULL),
(1493, 'Computer Aided Manufacturing', 1536, 'active', NULL, NULL),
(1494, 'Urban Design', 1537, 'active', NULL, NULL),
(1495, 'Software Documentation', 1538, 'active', NULL, NULL),
(1496, 'Salesforce Commerce Cloud', 1539, 'active', NULL, NULL),
(1497, 'Julia Development', 1540, 'inactive', NULL, '2021-07-12 23:50:39'),
(1498, 'Kubernetes', 1541, 'active', NULL, NULL),
(1499, 'Employee Training', 1542, 'inactive', NULL, '2021-07-12 23:50:44'),
(1500, 'Certified Public Accountant', 1543, 'inactive', NULL, '2021-07-12 23:50:48'),
(1501, 'Vue.js Framework', 1544, 'active', NULL, NULL),
(1502, 'Leadership Development', 1545, 'inactive', NULL, '2021-07-12 23:50:53'),
(1503, 'Architectural Rendering', 1546, 'inactive', NULL, '2021-07-12 23:50:58'),
(1504, 'Podcasting', 1547, 'inactive', NULL, '2021-07-12 23:51:01'),
(1505, 'HP-UX', 1548, 'inactive', NULL, '2021-07-12 23:51:06'),
(1506, 'Field Technical Support', 1549, 'inactive', NULL, '2021-07-12 23:51:11'),
(1507, 'Hewlett Packard', 1550, 'inactive', NULL, '2021-07-12 23:51:17'),
(1508, 'Local Area Networking', 1551, 'inactive', NULL, '2021-07-12 23:51:21'),
(1509, 'Mobile Development', 1552, 'active', NULL, NULL),
(1510, 'Adobe Dynamic Tag Management', 1553, 'active', NULL, NULL),
(1511, 'Google Tag Management', 1554, 'active', NULL, NULL),
(1512, 'Segment', 1555, 'active', NULL, NULL),
(1513, 'Tealium', 1556, 'inactive', NULL, '2021-07-12 23:51:36'),
(1514, 'Facebook Pixel', 1557, 'active', NULL, NULL),
(1515, 'Computer Vision', 1558, 'inactive', NULL, '2021-07-12 23:51:43'),
(1516, 'CNC Programming', 1559, 'inactive', NULL, '2021-07-12 23:51:48'),
(1517, 'Mobile Welding', 1560, 'inactive', NULL, '2021-07-12 23:51:52'),
(1518, 'ETL', 1561, 'inactive', NULL, '2021-07-12 23:51:58'),
(1519, 'Facebook Product Catalog', 1562, 'active', NULL, NULL),
(1520, 'Facebook SDK', 1563, 'active', NULL, NULL),
(1521, 'Server to Server Facebook API Integration', 1564, 'active', NULL, NULL),
(1522, 'Offline Conversion Facebook API Integration', 1565, 'active', NULL, NULL),
(1523, 'Airtable', 1566, 'inactive', NULL, '2021-07-12 23:52:07'),
(1524, 'Zwave', 1567, 'inactive', NULL, '2021-07-12 23:52:10'),
(1525, 'Apple Homekit', 1568, 'active', NULL, NULL),
(1526, 'Apple MFI', 1569, 'active', NULL, NULL),
(1527, 'Bare Metal', 1570, 'inactive', NULL, '2021-07-12 23:52:20'),
(1528, 'BeagleBone Black', 1571, 'inactive', NULL, '2021-07-12 23:52:25'),
(1529, 'Cellular Design', 1572, 'inactive', NULL, '2021-07-12 23:52:29'),
(1530, 'DSL/MODEMs', 1573, 'inactive', NULL, '2021-07-12 23:52:34'),
(1531, 'FPGA Coding', 1574, 'inactive', NULL, '2021-07-12 23:52:39'),
(1532, 'Graphical User Interface (GUI)', 1575, 'inactive', NULL, '2021-07-12 23:52:42'),
(1533, 'HALT/HASS Testing', 1576, 'inactive', NULL, '2021-07-12 23:52:47'),
(1534, 'Smart Phone/Tablet Apps', 1577, 'active', NULL, NULL),
(1535, 'Virtual Assistant Solutions (Alexa, Google, Siri, Home Kit, Cortana)', 1578, 'active', NULL, NULL),
(1536, '802.11', 1579, 'inactive', NULL, '2021-07-12 23:53:00'),
(1537, 'I2C', 1580, 'inactive', NULL, '2021-07-12 23:53:04'),
(1538, 'Serial Peripheral Interface (SPI)', 1581, 'inactive', NULL, '2021-07-12 23:53:09'),
(1539, 'Controller Area Network (CAN)', 1582, 'inactive', NULL, '2021-07-12 23:53:14'),
(1540, 'Local Interconnect Network (LIN)', 1583, 'inactive', NULL, '2021-07-12 23:53:18'),
(1541, 'Qi', 1584, 'inactive', NULL, '2021-07-12 23:53:23'),
(1542, 'Rezence', 1585, 'inactive', NULL, '2021-07-12 23:53:27'),
(1543, 'TvOS', 1586, 'active', NULL, NULL),
(1544, 'Cocos2d', 1587, 'inactive', NULL, '2021-07-12 23:53:36'),
(1545, 'V-Play', 1588, 'inactive', NULL, '2021-07-12 23:53:40'),
(1546, 'WinJS', 1589, 'inactive', NULL, '2021-07-12 23:53:45'),
(1547, 'KNIME', 1590, 'inactive', NULL, '2021-07-12 23:53:50'),
(1548, 'Teaching/Lecturing', 1591, 'inactive', NULL, '2021-07-12 23:53:54'),
(1549, 'PC Programming', 1592, 'inactive', NULL, '2021-07-12 23:53:59'),
(1550, 'Genetic Algebra Modelling System', 1593, 'inactive', NULL, '2021-07-12 23:54:04'),
(1551, 'Arena Simulation Programming', 1594, 'inactive', NULL, '2021-07-12 23:54:08'),
(1552, 'Webflow', 1595, 'active', NULL, NULL),
(1553, 'AI/RPA development', 1596, 'inactive', NULL, '2021-07-12 23:54:16'),
(1554, 'Managed Analytics', 1597, 'active', NULL, NULL),
(1555, 'ECPay', 1598, 'inactive', NULL, '2021-07-12 23:54:23'),
(1556, 'Test', 1599, 'inactive', NULL, '2021-07-12 23:54:27'),
(1557, 'qwerty', 1600, 'inactive', NULL, '2021-07-12 23:54:32'),
(1558, 'Deep Learning', 1601, 'inactive', NULL, '2021-07-12 23:54:37'),
(1559, 'Engineering Mathematics', 1602, 'inactive', NULL, '2021-07-12 23:54:41'),
(1560, 'Scientific Computing', 1603, 'inactive', NULL, '2021-07-12 23:54:46'),
(1561, 'Vector Calculus', 1604, 'inactive', NULL, '2021-07-12 23:54:50'),
(1562, 'Calculus', 1605, 'inactive', NULL, '2021-07-12 23:54:55'),
(1563, 'Amazon App Development', 1606, 'inactive', NULL, '2021-07-12 23:54:59'),
(1564, 'Cloud Development', 1607, 'active', NULL, NULL),
(1565, 'Cloud Networking', 1608, 'active', NULL, NULL),
(1566, 'Cloud Security', 1609, 'active', NULL, NULL),
(1567, 'Microsoft Azure', 1610, 'active', NULL, NULL),
(1568, 'Dropbox API', 1611, 'active', NULL, NULL),
(1569, 'Genetic Algorithms', 1612, 'inactive', NULL, '2021-07-12 23:55:18'),
(1570, 'Computational Linguistics', 1613, 'inactive', NULL, '2021-07-12 23:55:21'),
(1571, 'Certified Information Systems Security Professional (CISSP)', 1614, 'inactive', NULL, '2021-07-12 23:55:26'),
(1572, 'Digital Signal Processing', 1615, 'inactive', NULL, '2021-07-12 23:55:35'),
(1573, 'Intercom', 1616, 'inactive', NULL, '2021-07-12 23:55:39'),
(1574, 'Interactive Advertising', 1617, 'active', NULL, NULL),
(1575, 'Invision', 1618, 'active', NULL, NULL),
(1576, 'App Store Optimization', 1619, 'active', NULL, NULL),
(1577, 'App Usability Analysis', 1620, 'active', NULL, NULL),
(1578, 'Learning Management Solution (LMS) Consulting', 1621, 'active', NULL, NULL),
(1579, '3D Scanning', 1622, 'inactive', NULL, '2021-07-12 23:55:58'),
(1580, 'React.js Framework', 1623, 'active', NULL, NULL),
(1581, 'DaVinci Resolve', 1624, 'inactive', NULL, '2021-07-12 23:56:05'),
(1582, 'Social Video Marketing', 1625, 'active', NULL, NULL),
(1583, 'Highcharts', 1626, 'inactive', NULL, '2021-07-12 23:56:10'),
(1584, 'Caspio', 1627, 'inactive', NULL, '2021-07-12 23:56:14'),
(1585, 'LearnDash', 1628, 'active', NULL, NULL),
(1586, 'Kendo UI', 1629, 'inactive', NULL, '2021-07-12 23:56:22'),
(1587, 'Technical Recruiter', 1630, 'inactive', NULL, '2021-07-12 23:56:27'),
(1588, 'Neo4j', 1631, 'inactive', NULL, '2021-07-12 23:56:30'),
(1589, 'Statistical Modeling', 1632, 'inactive', NULL, '2021-07-12 23:56:35'),
(1590, 'Salesforce Lightning', 1633, 'active', NULL, NULL),
(1591, 'Relational Databases', 1634, 'active', NULL, NULL),
(1592, 'D3.js', 1635, 'active', NULL, NULL),
(1593, 'MATLAB', 1636, 'inactive', NULL, '2021-07-12 23:56:49'),
(1594, 'Packaging Design', 1637, 'active', NULL, NULL),
(1595, 'SEOMoz', 1638, 'active', NULL, NULL),
(1596, 'ClickFunnels', 1639, 'active', NULL, NULL),
(1597, 'NAV', 1640, 'inactive', NULL, '2021-07-12 23:42:28'),
(1598, 'Dynamic 365', 1641, 'inactive', NULL, '2021-07-12 23:42:33'),
(1599, 'Business Central', 1642, 'inactive', NULL, '2021-07-12 23:42:37'),
(1600, 'Dynatrace Software Monitoring', 1643, 'inactive', NULL, '2021-07-12 23:42:41'),
(1601, 'Application Performance Monitoring', 1644, 'active', NULL, NULL),
(1602, 'Oracle Primavera', 1645, 'inactive', NULL, '2021-07-12 23:42:51'),
(1603, 'Microsoft Project', 1646, 'active', NULL, NULL),
(1604, 'Qlik', 1647, 'inactive', NULL, '2021-07-12 23:42:59'),
(1605, 'Xara', 1648, 'inactive', NULL, '2021-07-12 23:43:04'),
(1606, 'Crowdfunding', 1649, 'active', NULL, NULL),
(1607, 'Kickstarter', 1650, 'active', NULL, NULL),
(1608, 'Indiegogo', 1651, 'active', NULL, NULL),
(1609, 'Analog Electronics', 1652, 'inactive', NULL, '2021-07-12 23:43:10'),
(1610, 'Alexa Modification', 1653, 'inactive', NULL, '2021-07-12 23:43:15'),
(1611, 'ASP.NET MVC', 1654, 'inactive', NULL, '2021-07-12 23:43:19'),
(1612, 'FL Studio', 1655, 'inactive', NULL, '2021-07-12 23:43:23'),
(1613, 'Horticulture', 1656, 'inactive', NULL, '2021-07-12 23:43:43'),
(1614, 'Prototyping', 1657, 'active', NULL, NULL),
(1615, 'Google Sheets', 1658, 'active', NULL, NULL),
(1616, 'Google APIs', 1659, 'active', NULL, NULL),
(1617, 'Google Docs', 1660, 'active', NULL, NULL),
(1618, 'Trademark', 1661, 'inactive', NULL, '2021-07-12 23:43:54'),
(1619, 'Trademark Registration', 1662, 'inactive', NULL, '2021-07-12 23:43:58'),
(1620, 'Adobe FrameMaker', 1663, 'active', NULL, NULL),
(1621, 'Adobe Robohelp', 1664, 'inactive', NULL, '2021-07-12 23:44:05'),
(1622, 'Financial Forecasting', 1665, 'inactive', NULL, '2021-07-12 23:44:11'),
(1623, 'Financial Modeling', 1666, 'inactive', NULL, '2021-07-12 23:44:15'),
(1624, 'FIX API', 1667, 'active', NULL, NULL),
(1625, 'Trading', 1668, 'inactive', NULL, '2021-07-12 23:44:23'),
(1626, '.NET Core', 1669, 'inactive', NULL, '2021-07-12 23:44:26'),
(1627, 'Bank Reconciliation', 1670, 'inactive', NULL, '2021-07-12 23:44:30'),
(1628, 'Slack', 1671, 'active', NULL, NULL),
(1629, 'Sourcing', 1672, 'inactive', NULL, '2021-07-12 23:44:36'),
(1630, 'Video Post-editing', 1673, 'active', NULL, NULL),
(1631, 'LinkedIn Recruiting', 1674, 'inactive', NULL, '2021-07-12 23:44:43'),
(1632, 'Interviewing', 1675, 'inactive', NULL, '2021-07-12 23:44:47'),
(1633, 'Technical Documentation', 1676, 'active', NULL, NULL),
(1634, 'Customer Retention Marketing', 1677, 'active', NULL, NULL),
(1635, 'DevOps', 1678, 'active', NULL, NULL),
(1636, 'Selenium', 1679, 'active', NULL, NULL),
(1637, 'Account Receivables Management', 1680, 'inactive', NULL, '2021-07-12 23:45:06'),
(1638, 'Database Design', 1681, 'active', NULL, NULL),
(1639, 'Account Payables Management', 1682, 'inactive', NULL, '2021-07-12 23:45:13'),
(1640, 'Lead Generation', 1683, 'active', NULL, NULL),
(1641, 'GitHub', 1684, 'active', NULL, NULL),
(1642, 'Redux.js', 1685, 'active', NULL, NULL),
(1643, 'Shopify Development', 1686, 'active', NULL, NULL),
(1644, 'PostgreSQL Administration', 1687, 'active', NULL, NULL),
(1645, 'Magento 2', 1688, 'active', NULL, NULL),
(1646, 'Network Security', 1689, 'inactive', NULL, '2021-07-12 23:45:35'),
(1647, 'Agile Project Management', 1690, 'active', NULL, NULL),
(1648, 'Administrative Support', 1691, 'active', NULL, NULL),
(1649, 'Startup Consulting', 1692, 'active', NULL, NULL),
(1650, 'Media Relations', 1693, 'inactive', NULL, '2021-07-12 23:45:43'),
(1651, 'Appointment Setting', 1694, 'inactive', NULL, '2021-07-12 23:45:48'),
(1652, 'Romance Writing', 1695, 'inactive', NULL, '2021-07-12 23:45:52'),
(1653, 'Budgeting and Forecasting', 1696, 'inactive', NULL, '2021-07-12 23:45:57'),
(1654, 'Financial Accounting', 1697, 'inactive', NULL, '2021-07-12 23:46:02'),
(1655, 'PostgreSQL Programming', 1698, 'active', NULL, NULL),
(1656, 'Tax Preparation', 1699, 'inactive', NULL, '2021-07-12 23:46:10'),
(1657, 'Audio Editing', 1700, 'inactive', NULL, '2021-07-12 23:46:17'),
(1658, 'Amazon S3', 1701, 'active', NULL, NULL),
(1659, 'Roadnet', 1702, 'inactive', NULL, '2021-07-12 23:46:24'),
(1660, 'Network Engineering', 1706, 'inactive', NULL, '2021-07-12 23:46:27'),
(1661, 'Simulation', 1707, 'inactive', NULL, '2021-07-12 23:46:51'),
(1662, 'Computational Fluid Dynamics', 1708, 'inactive', NULL, '2021-07-12 23:46:57'),
(1663, 'MEAN Stack', 1709, 'active', NULL, NULL),
(1664, 'Zoho Creator', 1710, 'active', NULL, NULL),
(1665, 'Three.js', 1711, 'active', NULL, NULL),
(1666, 'Amazon', 1712, 'inactive', NULL, '2021-07-12 23:47:06'),
(1667, 'Dropshipping', 1713, 'active', NULL, NULL),
(1668, 'IBM Db2', 1714, 'inactive', NULL, '2021-07-12 23:47:10'),
(1669, 'A-GPS', 1715, 'active', NULL, NULL),
(1670, 'A/B Testing', 1716, 'active', NULL, NULL),
(1671, 'A/R analysis', 1717, 'inactive', NULL, '2021-07-12 23:47:22'),
(1672, 'A/R Collections', 1718, 'inactive', NULL, '2021-07-12 23:47:27'),
(1673, 'A/R Management', 1719, 'inactive', NULL, '2021-07-12 23:47:31'),
(1674, 'A/V design', 1720, 'inactive', NULL, '2021-07-12 23:47:38'),
(1675, 'A/V editing', 1721, 'inactive', NULL, '2021-07-12 23:47:42'),
(1676, 'A/V Engineering', 1722, 'inactive', NULL, '2021-07-12 23:47:46'),
(1677, 'A/V Systems', 1723, 'inactive', NULL, '2021-07-12 23:47:50'),
(1678, 'A&E', 1724, 'inactive', NULL, '2021-07-12 23:47:54'),
(1679, 'A&P', 1725, 'inactive', NULL, '2021-07-12 23:48:02'),
(1680, 'A&R', 1726, 'inactive', NULL, '2021-07-12 23:48:06'),
(1681, 'Artist & Repertoire Administration', 1727, 'inactive', NULL, '2021-07-12 23:48:12'),
(1682, 'A+ Certified IT Technician', 1728, 'inactive', NULL, '2021-07-12 23:48:17'),
(1683, 'A+ Certified Professional', 1729, 'inactive', NULL, '2021-07-12 23:48:21'),
(1684, 'A1 Assessor', 1730, 'inactive', NULL, '2021-07-12 23:48:26'),
(1685, 'AAUS Scientific Diver', 1731, 'inactive', NULL, '2021-07-12 23:48:31'),
(1686, 'Ab Initio', 1732, 'inactive', NULL, '2021-07-12 23:48:35'),
(1687, 'Advanced Business Application Programming (ABAP)', 1733, 'active', NULL, NULL),
(1688, 'ABAP Web Dynpro', 1734, 'inactive', NULL, '2021-07-12 23:48:42'),
(1689, 'Abaqus', 1735, 'inactive', NULL, '2021-07-12 23:48:46'),
(1690, 'Abatement', 1736, 'inactive', NULL, '2021-07-12 23:48:51'),
(1691, 'ABBYY FineReader', 1737, 'inactive', NULL, '2021-07-12 23:48:59'),
(1692, 'ABIS', 1738, 'inactive', NULL, '2021-07-12 23:49:03'),
(1693, 'AbleCommerce', 1739, 'inactive', NULL, '2021-07-12 23:49:07'),
(1694, 'Ableton', 1740, 'inactive', NULL, '2021-07-12 23:49:11'),
(1695, 'Ableton Live', 1741, 'inactive', NULL, '2021-07-12 23:49:14'),
(1696, 'Ableton Push', 1742, 'inactive', NULL, '2021-07-12 23:49:18'),
(1697, 'Abnormal Psychology', 1743, 'inactive', NULL, '2021-07-12 23:29:18'),
(1698, 'ABO Certified', 1744, 'inactive', NULL, '2021-07-12 23:29:25'),
(1699, 'ABR Accredited Buyer Representative', 1745, 'inactive', NULL, '2021-07-12 23:29:45'),
(1700, 'ABR Designation', 1746, 'inactive', NULL, '2021-07-12 23:29:50'),
(1701, 'Academic Achievement', 1747, 'inactive', NULL, '2021-07-12 23:29:53'),
(1702, 'Academic Administration', 1748, 'inactive', NULL, '2021-07-12 23:29:58'),
(1703, 'Academic Advising', 1749, 'inactive', NULL, '2021-07-12 23:30:02'),
(1704, 'Ada programming', 1750, 'inactive', NULL, '2021-07-12 23:30:05'),
(1705, 'Agency Relationship Management', 1751, 'inactive', NULL, '2021-07-12 23:30:09'),
(1706, 'Aircraft Performance', 1752, 'inactive', NULL, '2021-07-12 23:30:15'),
(1707, 'Aircraft Propulsion', 1753, 'inactive', NULL, '2021-07-12 23:30:18'),
(1708, 'Aircraft Sales', 1754, 'inactive', NULL, '2021-07-12 23:30:50'),
(1709, 'Aircraft Structures', 1755, 'inactive', NULL, '2021-07-12 23:30:55'),
(1710, 'Aircraft Systems', 1756, 'inactive', NULL, '2021-07-12 23:31:00'),
(1711, 'Airfield Lighting', 1757, 'inactive', NULL, '2021-07-12 23:31:41'),
(1712, 'Airframe', 1758, 'inactive', NULL, '2021-07-12 23:31:36'),
(1713, 'Airline', 1759, 'inactive', NULL, '2021-07-12 23:31:33'),
(1714, 'Airspace Management', 1760, 'inactive', NULL, '2021-07-12 23:31:28'),
(1715, 'AIX Administration', 1761, 'inactive', NULL, '2021-07-12 23:31:20'),
(1716, 'AJAX Frameworks', 1762, 'active', NULL, NULL),
(1717, 'AJAX Toolkit', 1763, 'active', NULL, NULL),
(1718, 'Ajax4JSF', 1764, 'active', NULL, NULL),
(1719, 'Akka', 1765, 'inactive', NULL, '2021-07-12 23:31:51'),
(1720, 'Alacra', 1766, 'inactive', NULL, '2021-07-12 23:31:55'),
(1721, 'Alarm Management', 1767, 'inactive', NULL, '2021-07-12 23:32:01'),
(1722, 'Alarm Systems', 1768, 'inactive', NULL, '2021-07-12 23:32:05'),
(1723, 'ALBPM', 1769, 'inactive', NULL, '2021-07-12 23:32:09'),
(1724, 'Album Design', 1770, 'active', NULL, NULL),
(1725, 'Album Production', 1771, 'inactive', NULL, '2021-07-12 23:32:14'),
(1726, 'Alchemist', 1772, 'inactive', NULL, '2021-07-12 23:32:20'),
(1727, 'Algorithm Analysis', 1773, 'active', NULL, NULL),
(1728, 'Alias', 1774, 'inactive', NULL, '2021-07-12 23:33:43'),
(1729, 'Alibre Design', 1775, 'inactive', NULL, '2021-07-12 23:33:48'),
(1730, 'Alienbrain', 1776, 'inactive', NULL, '2021-07-12 23:33:54'),
(1731, 'All-Source Analysis', 1777, 'inactive', NULL, '2021-07-12 23:34:02'),
(1732, 'AlphaCAM', 1778, 'inactive', NULL, '2021-07-12 23:34:07'),
(1733, 'Altera Quartus', 1779, 'inactive', NULL, '2021-07-12 23:34:12'),
(1734, 'Alternative Investments', 1780, 'inactive', NULL, '2021-07-12 23:34:17'),
(1735, 'Alternative Rock', 1781, 'inactive', NULL, '2021-07-12 23:34:22'),
(1736, 'Alto Flute', 1782, 'inactive', NULL, '2021-07-12 23:34:26'),
(1737, 'Alumni Relations', 1783, 'inactive', NULL, '2021-07-12 23:34:32'),
(1738, 'ABAP List Viewer (ALV)', 1784, 'inactive', NULL, '2021-07-12 23:34:38'),
(1739, 'Alvarion', 1785, 'inactive', NULL, '2021-07-12 23:34:43'),
(1740, 'Alzheimers Care', 1786, 'inactive', NULL, '2021-07-12 23:34:48'),
(1741, 'Annual Report Design', 1787, 'active', NULL, NULL),
(1742, 'Annuals', 1788, 'inactive', NULL, '2021-07-12 23:34:57'),
(1743, 'Anodizing', 1789, 'inactive', NULL, '2021-07-12 23:35:02'),
(1744, 'Anomaly Detection', 1790, 'inactive', NULL, '2021-07-12 23:35:06'),
(1745, 'ANOVA', 1791, 'inactive', NULL, '2021-07-12 23:35:11'),
(1746, 'Automatic Number Plate Recognition (ANPR)', 1792, 'active', NULL, NULL),
(1747, 'Anritsu Certified', 1793, 'inactive', NULL, '2021-07-12 23:38:26'),
(1748, 'Answering Telephones', 1794, 'inactive', NULL, '2021-07-12 23:38:32'),
(1749, 'Antenna Measurements', 1795, 'inactive', NULL, '2021-07-12 23:38:44'),
(1750, 'Anthropology', 1796, 'inactive', NULL, '2021-07-12 23:38:41'),
(1751, 'Antique Restoration', 1797, 'inactive', NULL, '2021-07-12 23:38:49'),
(1752, 'Antiques', 1798, 'inactive', NULL, '2021-07-12 23:38:53'),
(1753, 'Antitrust Economics', 1799, 'inactive', NULL, '2021-07-12 23:38:57'),
(1754, 'ABC Analysis', 1800, 'inactive', NULL, '2021-07-12 23:39:02'),
(1755, 'Abstract', 1801, 'inactive', NULL, '2021-07-12 23:39:06'),
(1756, 'AC Drives', 1802, 'inactive', NULL, '2021-07-12 23:39:10'),
(1757, 'AC3', 1803, 'inactive', NULL, '2021-07-12 23:39:14'),
(1758, 'Academic Medicine', 1804, 'inactive', NULL, '2021-07-12 23:39:18'),
(1759, 'Academic Publishing', 1805, 'inactive', NULL, '2021-07-12 23:39:24'),
(1760, 'Academic Research', 1806, 'inactive', NULL, '2021-07-12 23:39:29'),
(1761, 'ACARS', 1807, 'inactive', NULL, '2021-07-12 23:39:45'),
(1762, 'Accelerator Physics', 1808, 'inactive', NULL, '2021-07-12 23:39:50'),
(1763, 'K2', 1809, 'inactive', NULL, '2021-07-12 23:39:53'),
(1764, 'LibreOffice', 1810, 'inactive', NULL, '2021-07-12 23:39:59'),
(1765, 'Digital Cinema Packages', 1811, 'inactive', NULL, '2021-07-12 23:40:08'),
(1766, 'Polarion', 1813, 'inactive', NULL, '2021-07-12 23:40:13'),
(1767, 'Redmine', 1814, 'inactive', NULL, '2021-07-12 23:40:17'),
(1768, 'Hardware Security Module', 1815, 'inactive', NULL, '2021-07-12 23:40:22'),
(1769, 'Keycloak', 1816, 'inactive', NULL, '2021-07-12 23:40:26'),
(1770, 'Cloud Foundry', 1817, 'inactive', NULL, '2021-07-12 23:40:31'),
(1771, 'National Building Specification', 1818, 'inactive', NULL, '2021-07-12 23:40:35'),
(1772, 'Social Impact', 1819, 'inactive', NULL, '2021-07-12 23:40:42'),
(1773, 'Atmel', 1820, 'inactive', NULL, '2021-07-12 23:40:47'),
(1774, 'BuddyPress', 1821, 'active', NULL, NULL),
(1775, 'Crestron', 1822, 'inactive', NULL, '2021-07-12 23:40:55'),
(1776, 'Minecraft', 1823, 'inactive', NULL, '2021-07-12 23:41:00'),
(1777, 'MQL4', 1824, 'inactive', NULL, '2021-07-12 23:41:08'),
(1778, 'PowerApps', 1825, 'active', NULL, NULL),
(1779, 'Roblox', 1826, 'inactive', NULL, '2021-07-12 23:41:18'),
(1780, 'Website Build', 1827, 'active', NULL, NULL),
(1781, 'Graphic Art', 1828, 'active', NULL, NULL),
(1782, 'Business Consulting', 1829, 'inactive', NULL, '2021-07-12 23:41:25'),
(1783, 'Facebook Development', 1830, 'active', NULL, NULL),
(1784, 'System Analysis', 1831, 'active', NULL, NULL),
(1785, 'Website Optimization', 1832, 'active', NULL, NULL),
(1786, 'Costume Design', 1833, 'inactive', NULL, '2021-07-12 23:41:31'),
(1787, 'Textile Design', 1834, 'inactive', NULL, '2021-07-12 23:41:35'),
(1788, 'Water Treatment', 1835, 'inactive', NULL, '2021-07-12 23:41:40'),
(1789, 'Actimize', 1836, 'inactive', NULL, '2021-07-12 23:41:45'),
(1790, 'Fircosoft', 1837, 'inactive', NULL, '2021-07-12 23:41:49'),
(1791, 'Fraud Detection', 1838, 'inactive', NULL, '2021-07-12 23:41:53'),
(1792, 'Anti Money Laundering', 1839, 'inactive', NULL, '2021-07-12 23:41:57'),
(1793, 'Financial Crime', 1840, 'inactive', NULL, '2021-07-12 23:42:02'),
(1794, 'Comics', 1841, 'inactive', NULL, '2021-07-12 23:42:11'),
(1795, 'Fitness', 1842, 'inactive', NULL, '2021-07-12 23:42:15'),
(1796, 'Video Game Coaching', 1843, 'inactive', NULL, '2021-07-12 23:42:18'),
(1797, 'Pashto', 1844, 'inactive', NULL, '2021-07-12 23:28:44'),
(1798, 'Image Consultation', 1845, 'inactive', NULL, '2021-07-12 23:28:39'),
(1799, 'Counselling and Psychotherapy', 1846, 'inactive', NULL, '2021-07-12 23:28:32'),
(1800, 'Facebook Shops', 1848, 'active', NULL, NULL),
(1801, 'Google Shopping', 1849, 'active', NULL, NULL),
(1802, 'Freedom to Operate Search', 1850, 'inactive', NULL, '2021-07-12 23:28:25'),
(1803, 'Patent Landscape', 1851, 'inactive', NULL, '2021-07-12 23:28:20'),
(1804, 'Competitor Analysis', 1852, 'active', NULL, NULL),
(1805, 'Patent Infringement Research', 1853, 'inactive', NULL, '2021-07-12 23:28:12'),
(1806, 'Patent Design Search', 1854, 'inactive', NULL, '2021-07-12 23:28:07'),
(1807, 'Patent Validity Search', 1855, 'inactive', NULL, '2021-07-12 23:28:02'),
(1808, 'Patent Invalidity Search', 1856, 'inactive', NULL, '2021-07-12 23:27:57'),
(1809, 'SAP Screen Personas', 1857, 'inactive', NULL, '2021-07-12 23:27:52'),
(1810, 'Control Engineering', 1858, 'inactive', NULL, '2021-07-12 23:27:46'),
(1811, 'Control System Design', 1859, 'inactive', NULL, '2021-07-12 23:27:41'),
(1812, 'RUST Programming', 1860, 'inactive', NULL, '2021-07-12 22:16:53'),
(1813, 'Edge Computing', 1861, 'inactive', NULL, '2021-07-12 22:16:47'),
(1814, 'IP Cores', 1862, 'inactive', NULL, '2021-07-12 22:16:43'),
(1815, 'MPSoC Design', 1863, 'inactive', NULL, '2021-07-12 22:16:38'),
(1816, 'STM32', 1864, 'inactive', NULL, '2021-07-12 22:16:34'),
(1817, 'MEMs', 1865, 'inactive', NULL, '2021-07-12 22:16:29'),
(1818, 'IMX6', 1866, 'inactive', NULL, '2021-07-12 22:16:25'),
(1819, 'Yocto', 1867, 'inactive', NULL, '2021-07-12 22:16:21'),
(1820, 'HyperLynx', 1868, 'inactive', NULL, '2021-07-12 22:16:15'),
(1821, 'Sigrity', 1869, 'inactive', NULL, '2021-07-12 22:16:11'),
(1822, 'Analog / Mixed Signal / Digital', 1870, 'inactive', NULL, '2021-07-12 22:16:07'),
(1823, 'Voice Assistance Devices', 1871, 'inactive', NULL, '2021-07-12 22:16:02'),
(1824, 'DDR3 (PCIe, board design/fpga)', 1872, 'inactive', NULL, '2021-07-12 22:15:57'),
(1825, 'Digital ASIC Coding', 1873, 'inactive', NULL, '2021-07-12 22:15:46'),
(1826, 'Digital Networking', 1874, 'active', NULL, NULL),
(1827, 'Cellular Service', 1875, 'inactive', NULL, '2021-07-12 22:15:42'),
(1828, 'Machine Vision / Video Analytics', 1876, 'inactive', NULL, '2021-07-12 22:15:37'),
(1829, 'Mechanical Design', 1877, 'inactive', NULL, '2021-07-12 22:15:32'),
(1830, 'Medical Products', 1878, 'inactive', NULL, '2021-07-12 22:15:27'),
(1831, 'Power Supply', 1879, 'inactive', NULL, '2021-07-12 22:15:22'),
(1832, 'Video Hardware', 1880, 'inactive', NULL, '2021-07-12 22:15:18'),
(1833, 'Wireless Sensors and Gateways', 1881, 'inactive', NULL, '2021-07-12 22:15:14'),
(1834, 'Optical Engineering', 1882, 'inactive', NULL, '2021-07-12 22:15:09'),
(1835, 'Zemax', 1883, 'inactive', NULL, '2021-07-12 22:15:04'),
(1836, 'Computational Analysis', 1884, 'inactive', NULL, '2021-07-12 22:15:00'),
(1837, 'Micros RES', 1885, 'inactive', NULL, '2021-07-12 22:14:56'),
(1838, 'Workday Time & Absence', 1886, 'inactive', NULL, '2021-07-12 22:14:52'),
(1839, 'Workday Compensation', 1887, 'inactive', NULL, '2021-07-12 22:14:48'),
(1840, 'Workday Core HR', 1888, 'inactive', NULL, '2021-07-12 22:14:44'),
(1841, 'Workday Payroll', 1889, 'inactive', NULL, '2021-07-12 22:14:39'),
(1842, 'Workday Talent & Recruiting', 1890, 'inactive', NULL, '2021-07-12 22:14:34'),
(1843, 'Workday Security', 1891, 'inactive', NULL, '2021-07-12 22:14:25'),
(1844, 'Digital Forensics', 1892, 'inactive', NULL, '2021-07-12 22:14:21'),
(1845, 'OpenBSD', 1893, 'active', NULL, NULL),
(1846, 'IMAP', 1894, 'active', NULL, NULL),
(1847, 'POP / POP3', 1895, 'active', NULL, NULL),
(1848, 'Dovecot', 1896, 'active', NULL, NULL),
(1849, 'Postfix', 1897, 'active', NULL, NULL),
(1850, 'SMTP', 1898, 'active', NULL, NULL),
(1851, 'P2P Network', 1899, 'active', NULL, NULL),
(1852, 'Building Information Modeling', 1900, 'inactive', NULL, '2021-07-12 22:14:12'),
(1853, 'Adobe Experience Manager', 1901, 'active', NULL, NULL),
(1854, 'Sound Engineering', 1902, 'inactive', NULL, '2021-07-12 22:14:06'),
(1855, 'MicroStrategy', 1903, 'inactive', NULL, '2021-07-12 22:14:01'),
(1856, 'PHPrunner', 1904, 'active', NULL, NULL),
(1857, 'Office Add-ins', 1905, 'active', NULL, NULL),
(1858, 'Cloud Service', 1906, 'active', NULL, NULL),
(1859, 'Ansys', 1907, 'inactive', NULL, '2021-07-12 22:13:51'),
(1860, 'HyperMesh', 1908, 'inactive', NULL, '2021-07-12 22:13:47'),
(1861, 'Application Packaging', 1909, 'inactive', NULL, '2021-07-12 22:13:42'),
(1862, 'Packaging Technology', 1910, 'inactive', NULL, '2021-07-12 22:13:39'),
(1863, 'Building Regulations', 1911, 'inactive', NULL, '2021-07-12 22:13:33'),
(1864, 'User Story Writing', 1912, 'inactive', NULL, '2021-07-12 22:13:26'),
(1865, 'MOVEit', 1913, 'inactive', NULL, '2021-07-12 22:13:22'),
(1866, 'IBM MQ', 1914, 'inactive', NULL, '2021-07-12 22:13:17'),
(1867, 'IBM Integration bus', 1915, 'inactive', NULL, '2021-07-12 22:13:10'),
(1868, 'IBM Datapower', 1916, 'inactive', NULL, '2021-07-12 22:13:05'),
(1869, 'Electron JS', 1917, 'inactive', NULL, '2021-07-12 22:13:01'),
(1870, 'PySpark', 1918, 'inactive', NULL, '2021-07-12 22:12:58'),
(1871, 'Oracle APEX', 1919, 'active', NULL, NULL),
(1872, 'Component Engineering', 1920, 'inactive', NULL, '2021-07-12 22:12:51'),
(1873, 'Quantum Computing', 1921, 'inactive', NULL, '2021-07-12 22:12:46'),
(1874, 'Investigative Journalism', 1922, 'inactive', NULL, '2021-07-12 22:12:40'),
(1875, 'Masonry', 1923, 'active', NULL, NULL),
(1876, 'Fusion 360', 1924, 'active', NULL, NULL),
(1877, 'Houdini', 1925, 'inactive', NULL, '2021-07-12 22:12:24'),
(1878, 'IBM Cloud', 1926, 'active', NULL, NULL),
(1879, 'TikTok', 1927, 'active', NULL, NULL),
(1880, 'TS/ISO 16949 Audit', 1928, 'inactive', NULL, '2021-07-12 22:12:16');
INSERT INTO `skills` (`id`, `name`, `freelancer_job_id`, `status`, `created_at`, `updated_at`) VALUES
(1881, 'ISO/IEC 17025 Calibration', 1929, 'inactive', NULL, '2021-07-12 22:12:09'),
(1882, 'Buildbox', 1930, 'inactive', NULL, '2021-07-12 22:12:04'),
(1883, 'Computerized Embroidery', 1931, 'inactive', NULL, '2021-07-12 22:12:00'),
(1884, 'Swahili', 1932, 'inactive', NULL, '2021-07-12 22:11:54'),
(1885, 'Development', 1933, 'active', NULL, NULL),
(1886, 'Creo', 1934, 'inactive', NULL, '2021-07-12 22:11:48'),
(1887, 'GraphQL', 1935, 'active', NULL, NULL),
(1888, 'Figma', 1936, 'active', NULL, NULL),
(1889, 'Programmatic Advertising', 1937, 'active', NULL, NULL),
(1890, 'Geofencing', 1938, 'active', NULL, NULL),
(1891, 'Technical Site Survey', 1939, 'inactive', NULL, '2021-07-12 22:11:35'),
(1892, 'Passive Site Survey', 1940, 'inactive', NULL, '2021-07-12 22:11:29'),
(1893, 'Active Site Survey', 1941, 'inactive', NULL, '2021-07-12 22:11:23'),
(1894, 'Live Survey', 1942, 'inactive', NULL, '2021-07-12 22:11:16'),
(1895, 'Predictive Site Survey', 1943, 'inactive', NULL, '2021-07-12 22:11:11'),
(1896, 'Wireless Site Survey', 1944, 'inactive', NULL, '2021-07-12 22:11:06'),
(1897, 'RF Site Survey', 1945, 'inactive', NULL, '2021-07-12 22:09:33'),
(1898, 'Physical Site Survey', 1946, 'inactive', NULL, '2021-07-12 22:09:28'),
(1899, 'RF Manual Site Survey', 1947, 'inactive', NULL, '2021-07-12 22:09:22'),
(1900, 'Blueprint Calibration', 1948, 'inactive', NULL, '2021-07-12 22:09:17'),
(1901, 'Floorplan Blueprinting', 1949, 'inactive', NULL, '2021-07-12 22:09:11'),
(1902, 'Access Point Identification', 1950, 'inactive', NULL, '2021-07-12 22:09:06'),
(1903, 'Signal Propagation Assessment', 1951, 'inactive', NULL, '2021-07-12 22:08:58'),
(1904, 'Walking Path Analysis', 1952, 'inactive', NULL, '2021-07-12 22:08:52'),
(1905, 'Wireless Capacity Analysis', 1953, 'inactive', NULL, '2021-07-12 22:08:48'),
(1906, 'Wireless Coverage Assessment', 1954, 'inactive', NULL, '2021-07-12 22:08:42'),
(1907, 'Technical Site Audit', 1955, 'inactive', NULL, '2021-07-12 22:08:38'),
(1908, 'Aerial Technical Site Survey', 1956, 'inactive', NULL, '2021-07-12 22:08:32'),
(1909, 'Base Station Equipment Management', 1957, 'inactive', NULL, '2021-07-12 22:08:27'),
(1910, 'PnP BTS configuration', 1958, 'inactive', NULL, '2021-07-12 22:08:21'),
(1911, 'Small Cell Deployment', 1959, 'inactive', NULL, '2021-07-12 22:08:15'),
(1912, 'Wireless Security Audit', 1960, 'inactive', NULL, '2021-07-12 22:08:09'),
(1913, 'Wireless Network Security Analysis', 1961, 'inactive', NULL, '2021-07-12 22:08:04'),
(1914, 'Wireless Network Risk Analysis & Reduction', 1962, 'inactive', NULL, '2021-07-12 22:08:00'),
(1915, 'Rogue Access Point Detection', 1963, 'inactive', NULL, '2021-07-12 22:07:55'),
(1916, 'Hidden Wireless Network Detection', 1964, 'inactive', NULL, '2021-07-12 22:07:50'),
(1917, 'Wireless Access Point Installation', 1965, 'inactive', NULL, '2021-07-12 22:07:45'),
(1918, 'HetNet Access Point Installation', 1966, 'inactive', NULL, '2021-07-12 22:07:40'),
(1919, 'Radio Access Network Commissioning', 1967, 'inactive', NULL, '2021-07-12 22:07:35'),
(1920, 'RAN NMS Integration', 1968, 'inactive', NULL, '2021-07-12 22:07:29'),
(1921, 'RAN Call Testing', 1969, 'inactive', NULL, '2021-07-12 22:07:24'),
(1922, 'Last Mile Optimization', 1970, 'inactive', NULL, '2021-07-12 22:07:20'),
(1923, 'DOP Management', 1971, 'inactive', NULL, '2021-07-12 22:07:07'),
(1924, 'Managed Care', 1972, 'inactive', NULL, '2021-07-12 22:06:59'),
(1925, 'eBook Design', 1973, 'active', NULL, NULL),
(1926, 'Music Management', 1974, 'inactive', NULL, '2021-07-12 22:06:51'),
(1927, 'Art Consulting', 1975, 'inactive', NULL, '2021-07-12 22:06:45'),
(1928, 'Fashion Consulting', 1976, 'inactive', NULL, '2021-07-12 22:06:40'),
(1929, 'Automation', 1977, 'active', NULL, NULL),
(1930, 'Environmental Engineering', 1978, 'inactive', NULL, '2021-07-12 22:06:29'),
(1931, 'Building Engineering', 1979, 'inactive', NULL, '2021-07-12 22:06:23'),
(1932, 'Manufacturing Engineering', 1980, 'inactive', NULL, '2021-07-12 22:06:18'),
(1933, 'Construction Engineering', 1981, 'inactive', NULL, '2021-07-12 22:06:13'),
(1934, 'Marine Engineering', 1982, 'inactive', NULL, '2021-07-12 22:05:56'),
(1935, 'Drilling Engineering', 1983, 'inactive', NULL, '2021-07-12 22:05:50'),
(1936, 'Mixing Engineering', 1984, 'inactive', NULL, '2021-07-12 22:05:45'),
(1937, 'Medical Engineering', 1985, 'inactive', NULL, '2021-07-12 22:05:40'),
(1938, 'Biomedical Engineering', 1986, 'inactive', NULL, '2021-07-12 22:05:33'),
(1939, 'Book Marketing', 1987, 'active', NULL, NULL),
(1940, 'B2B Marketing', 1988, 'active', NULL, NULL),
(1941, 'Architectural Engineering', 1989, 'inactive', NULL, '2021-07-12 22:05:16'),
(1942, 'Certified Ethical Hacking', 1990, 'inactive', NULL, '2021-07-12 22:05:11'),
(1943, 'COMPASS', 1991, 'active', NULL, NULL),
(1944, 'Financial Software Development', 1992, 'active', NULL, NULL),
(1945, 'IT Project Management', 1993, 'active', NULL, NULL),
(1946, 'Jade Development', 1994, 'inactive', NULL, '2021-07-12 22:05:00'),
(1947, 'RPG Development', 1995, 'inactive', NULL, '2021-07-12 22:04:53'),
(1948, 'Technology Consulting', 1996, 'active', NULL, NULL),
(1949, 'Educational Research', 1997, 'inactive', NULL, '2021-07-12 22:04:44'),
(1950, 'Russian Writer', 1998, 'inactive', NULL, '2021-07-12 22:04:39'),
(1951, 'Environmental Consulting', 1999, 'inactive', NULL, '2021-07-12 22:04:34'),
(1952, 'Planning Consulting', 2000, 'inactive', NULL, '2021-07-12 22:04:28'),
(1953, 'Investment Management', 2001, 'inactive', NULL, '2021-07-12 22:04:23'),
(1954, 'Safety Consulting', 2002, 'inactive', NULL, '2021-07-12 22:03:57'),
(1955, 'Financial Consulting', 2003, 'inactive', NULL, '2021-07-12 22:03:45'),
(1956, 'Hedge Fund Management', 2004, 'inactive', NULL, '2021-07-12 22:03:41'),
(1957, 'Compensation Consulting', 2005, 'inactive', NULL, '2021-07-12 22:03:36'),
(1958, 'CTO', 2006, 'active', NULL, NULL),
(1959, 'Ecological Consulting', 2007, 'inactive', NULL, '2021-07-12 22:03:29'),
(1960, 'Legal Translation', 2008, 'inactive', NULL, '2021-07-12 22:03:23'),
(1961, 'Forensic Consulting', 2009, 'inactive', NULL, '2021-07-12 22:03:17'),
(1962, 'Asset Management', 2010, 'inactive', NULL, '2021-07-12 22:03:12'),
(1963, 'Wealth Management', 2011, 'inactive', NULL, '2021-07-12 22:03:06'),
(1964, 'Billing', 2012, 'inactive', NULL, '2021-07-12 22:03:01'),
(1965, 'Game Testing', 2013, 'inactive', NULL, '2021-07-12 22:02:55'),
(1966, 'Electronic Data Interchange (EDI)', 2014, 'active', NULL, NULL),
(1967, 'Portfolio Management', 2015, 'inactive', NULL, '2021-07-12 22:02:45'),
(1968, 'Remote Quality Audit', 2016, 'inactive', NULL, '2021-07-12 22:02:39'),
(1969, 'Credit Repair', 2017, 'inactive', NULL, '2021-07-12 22:02:27'),
(1970, 'Amazon FBA', 2018, 'inactive', NULL, '2021-07-12 21:58:54'),
(1971, 'Messenger Marketing', 2019, 'active', NULL, NULL),
(1972, 'Amazon Product Launch', 2020, 'inactive', NULL, '2021-07-12 21:58:44'),
(1973, 'Pre-inspection visits', 2021, 'inactive', NULL, '2021-07-12 21:58:38'),
(1974, 'Google Canvas', 2022, 'active', NULL, NULL),
(1975, 'FaunaDB', 2023, 'inactive', NULL, '2021-07-12 21:58:29'),
(1976, 'ArangoDB', 2024, 'inactive', NULL, '2021-07-12 21:58:24'),
(1977, 'GatsbyJS', 2025, 'inactive', NULL, '2021-07-12 21:58:15'),
(1978, 'Jamstack', 2026, 'inactive', NULL, '2021-07-12 21:58:10'),
(1979, 'Elm', 2027, 'inactive', NULL, '2021-07-12 21:58:02'),
(1980, 'PureScript', 2028, 'inactive', NULL, '2021-07-12 21:57:56'),
(1981, 'Svelte', 2029, 'inactive', NULL, '2021-07-12 21:57:51'),
(1982, 'Reason', 2030, 'inactive', NULL, '2021-07-12 21:57:38'),
(1983, 'Altium Designer', 2031, 'inactive', NULL, '2021-07-12 21:57:32'),
(1984, 'Altium NEXUS', 2032, 'inactive', NULL, '2021-07-12 21:57:12'),
(1985, 'CircuitStudio', 2033, 'inactive', NULL, '2021-07-12 21:56:54'),
(1986, 'CircuitMaker', 2034, 'inactive', NULL, '2021-07-12 21:56:44'),
(1987, 'ActiveCampaign', 2035, 'active', NULL, NULL),
(1988, 'MailerLite', 2036, 'active', NULL, NULL),
(1989, 'Elementor', 2037, 'active', NULL, NULL),
(1990, 'Funnel', 2038, 'active', NULL, NULL),
(1991, 'Non-fungible Tokens', 2039, 'inactive', NULL, '2021-07-12 21:56:32'),
(1992, 'Digital Art', 2040, 'inactive', NULL, '2021-07-12 21:56:21'),
(1993, 'HubSpot', 2041, 'active', NULL, NULL),
(1994, 'App Publication', 2042, 'active', NULL, NULL),
(1995, 'App Reskin', 2043, 'active', NULL, NULL),
(1996, 'Reverse Engineering', 2044, 'inactive', NULL, '2021-07-12 21:56:09');

-- --------------------------------------------------------

--
-- Table structure for table `starters`
--

CREATE TABLE `starters` (
  `id` bigint UNSIGNED NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `copied_counter` int NOT NULL DEFAULT '0',
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `starters`
--

INSERT INTO `starters` (`id`, `description`, `copied_counter`, `status`, `created_at`, `updated_at`) VALUES
(2, 'I have ranked among the top 300 best freelancers over the past years. The requirements provided for the projects match my expertise, and I am willing to start the project with you.', 0, 'active', '2021-07-07 12:54:15', '2021-07-08 10:23:29'),
(3, 'I am a dedicated who has delivered over 600+ projects with 5 stars rating. The project description caught my attention, and I am keen to work for you on this project.', 0, 'active', '2021-07-07 13:01:40', '2021-07-08 10:19:47'),
(4, 'I am a passionate and dedicated freelancer with 350+ reviews. I have read the job description and look forward to delivering your project according to your requirements.', 0, 'active', '2021-07-07 14:27:24', '2021-07-07 14:48:02'),
(5, 'I have maintained a rating of 5 stars in my 7+ years as a freelancer. The requirements provided for the projects match my specialties, and I am willing to start the project.', 0, 'active', '2021-07-07 15:15:16', '2021-07-07 15:15:16'),
(6, 'Wolfiz has delivered 600+ successful projects on time. We are interested in working with you on your project after fully understanding the project description.', 0, 'active', '2021-07-07 15:17:29', '2021-07-07 15:17:29'),
(7, 'I have 7+ years of experience with 350+reviews from satisfied clients. I fully comprehend your project detail and would be interested in taking your project to the next level. .', 0, 'active', '2021-07-07 15:20:21', '2021-07-08 10:18:01'),
(8, 'I have completed 600+ projects successfully making me one of the top 300 freelancers in the world. I will deliver a complete project timely that aligns with the enlisted project requirements.', 0, 'active', '2021-07-07 15:34:06', '2021-07-08 10:15:43'),
(9, 'Graphic Designer- I am an experienced Graphic designer with 500+ clients globally. I have understood your project’s detail, and I am looking to present top-notch graphic designs for this project.', 0, 'active', '2021-07-07 15:45:13', '2021-07-07 15:45:13'),
(10, 'We are a team of creatively inspired individuals with 350+ reviews. After going through your project description, we would happily deliver you a successful project.', 0, 'active', '2021-07-07 15:49:51', '2021-07-08 10:14:14'),
(11, 'We are a highly skilled and motivated team with 7+ years of experience. We are always looking to take on new projects, and I found your project details intriguing.', 0, 'active', '2021-07-07 15:55:32', '2021-07-08 10:12:01'),
(12, 'Wolfiz comprises a dedicated team that has delivered 600+ projects timely. We checked your project details and understood your preferred features.', 0, 'active', '2021-07-07 16:01:53', '2021-07-08 10:11:05'),
(13, 'I have completed above 600+ projects that have helped me rank among the top 300 best freelancers. I checked your project detail and would like to work on this project for you.', 0, 'active', '2021-07-07 16:14:38', '2021-07-08 10:08:05'),
(14, 'I am a passionate and dedicated freelancer with over 7+ years of experience. I am always looking to take on new projects, and I found your project details intriguing.', 0, 'active', '2021-07-07 16:24:31', '2021-07-08 10:06:09'),
(15, 'I am a dedicated freelancer with a rating of 5 stars. I analyzed and understood your description and wish to move on with your project.', 0, 'active', '2021-07-07 16:31:36', '2021-07-08 10:04:43'),
(16, 'I have worked on 600+projects over the last 7+years. I found your project details attractive and wish to bring life to your brilliant ideas.', 0, 'active', '2021-07-07 16:38:53', '2021-07-08 10:03:54'),
(17, 'With over 600+ projects delivered, I rank among the top 300 freelancers around the globe.  Your interesting project details are clear to me, and I would love to start the project right away.', 0, 'active', '2021-07-08 10:26:13', '2021-07-08 10:26:13'),
(18, 'In my 7+ years of experience, I have managed to deliver 600+ projects successfully. GIving an in-depth look at your projects, I can assure you that your project is well planned, and I can deliver it effectively.', 0, 'active', '2021-07-08 10:29:25', '2021-07-08 10:30:31'),
(19, 'I ranked among the 300 best freelancers in the world due to my 600+ successful projects. After going through the project description, I will surely deliver you a prolific project on time.', 0, 'active', '2021-07-08 10:38:42', '2021-07-08 10:38:42'),
(20, 'Over my 7+years of experience, I dedicatedly provided top-notch services to my clients. I perfectly understand your requirements and would like to work on this project with you.', 0, 'active', '2021-07-08 10:43:59', '2021-07-08 10:43:59'),
(21, 'I have successfully delivered 600+ projects in the course of 7 years. I am willing to start the project with you after completely understanding your project detail.', 0, 'active', '2021-07-08 10:47:41', '2021-07-08 10:47:41'),
(22, 'I rank among the top 300 freelancers with 350+ satisfied clients.  Your project details are understandable for me, and I am determined to provide you with the best result.', 0, 'active', '2021-07-08 10:52:16', '2021-07-08 10:52:16'),
(23, 'I am a highly-skilled freelancer with over 7+ years of experience. I thoroughly read your description and look forward to initiate this project for you.', 0, 'active', '2021-07-08 10:56:00', '2021-07-08 10:56:00'),
(24, 'I am a highly motivated freelancer and have delivered 600+ top-notch projects. Your project detail explains the features you need, and I can definitely fulfill your expectations.', 0, 'active', '2021-07-08 10:59:11', '2021-07-08 10:59:11'),
(25, 'I have delivered exceptional projects to clients with over 300+ satisfied reviews. I understood your project specifications, and I look forward to delivering a quality project.', 0, 'active', '2021-07-08 11:03:44', '2021-07-08 11:03:44'),
(26, 'With over 7+ years of experience, I have delivered projects with 350+ reviews. After going through your project specifications, I find this project interesting and perfect for me.', 0, 'active', '2021-07-08 11:07:09', '2021-07-08 11:07:09'),
(27, 'I have vast experience as a Freelancer with 600+ completed projects. I am determined that this project is ideal for me after thoroughly reading the provided details.', 0, 'active', '2021-07-08 11:09:10', '2021-07-08 11:09:10'),
(28, 'In my 7+ years as a freelancer, I have achieved to rank among the top 300 freelancers globally. The project detail you provided is intriguing, and I look forward to starting it for you.', 0, 'active', '2021-07-08 11:13:27', '2021-07-08 11:13:27'),
(29, 'In my career as a freelancer, I have maintained a 5 stars rating while delivering 600+ projects. Your project requirements are sound and clear to me, and I wish to proceed with this project.', 0, 'active', '2021-07-08 11:15:55', '2021-07-08 11:15:55'),
(30, 'In my 7+ years of experience, I have received  350+ reviews from my satisfied clients. I am determined to guide your project to success after giving a careful read to the provided detail.', 0, 'active', '2021-07-08 11:19:12', '2021-07-08 11:19:12'),
(31, 'The 600+ projects I delivered have helped me rank among the top 300 freelancers in the world.  I observed the details of your project, and I wish to give you a fruitful outcome.', 0, 'active', '2021-07-08 11:21:55', '2021-07-08 11:22:57'),
(32, 'Throughout my 6+ years of experience, I have delivered high-quality projects with a rating of 5 stars. I gave a thorough read to your project brief, and I think I am a perfect match for this project.', 0, 'active', '2021-07-09 09:24:18', '2021-07-09 09:24:18'),
(33, 'In my 7+ years of experience, I have delivered various top-notch projects that have landed me among the top 300 freelancers. I understand your project brief and think I will be able to deliver the project perfectly.', 0, 'active', '2021-07-09 09:34:15', '2021-07-09 09:34:15'),
(34, 'I am a dedicated freelancer with over 50 reviews from my satisfied clients. Reading your project detail gave me a clear view of your needs and I can surely cater to them.', 0, 'active', '2021-07-09 09:37:21', '2021-07-09 09:37:21'),
(35, 'Wolfiz has delivered over 600 projects in its 7+ years in the field. GIving a thorough read to your project brief, we find ourselves the perfect match for our project.', 0, 'active', '2021-07-09 09:39:58', '2021-07-09 09:39:58'),
(36, 'I am a passionate freelancer with 600+ large-scale projects delivered in my 7+ years of experience. I understood the gist of your project brief, and I look to start the project with you.', 0, 'active', '2021-07-09 09:43:05', '2021-07-09 09:47:00'),
(37, 'With over 600+ large-scale projects delivered, I rank among the top 300 freelancers in the world. Your project brief helped me understand your requirements, and I am willing to start the project.', 0, 'active', '2021-07-09 09:49:28', '2021-07-09 09:49:28'),
(38, 'I am a determined freelancer with 350+ reviews from satisfied clients.  Your project brief has clarified your requirements, and I wish to proceed with your project.', 0, 'active', '2021-07-09 09:51:47', '2021-07-09 09:51:47'),
(39, 'After spending 7+ dedicated years as a freelancer I have delivered 600+ projects successfully. I understand your project requirements, and I would like to provide my services for this project.', 0, 'active', '2021-07-09 09:53:06', '2021-07-09 09:55:00'),
(40, 'I am a passionately driven freelancer with over 7+ years of experience.  I am glad to provide my services after completely understanding your project details.', 0, 'active', '2021-07-09 09:57:27', '2021-07-09 09:57:27'),
(41, 'As a passionately driven freelancer, I have completed 600+ projects.  I understand your project description and would give you the best output for this project.', 0, 'active', '2021-07-09 09:59:44', '2021-07-09 09:59:44'),
(42, 'After a 7+ years-long tenure as a freelancer, I prioritize customer satisfaction which is eminent from my 5-star rating. I look forward to initiate your project after understanding the details.', 0, 'active', '2021-07-12 12:40:30', '2021-07-12 12:45:16'),
(43, 'I have worked with clients from 35+ countries on 600+ projects. I understand your project brief and believe in fulfilling the potential requirements of the project expertly.', 0, 'active', '2021-07-12 12:52:07', '2021-07-12 12:52:07'),
(44, 'I am a dedicated freelancer with 7+ years of experience working on 600+ diverse projects. I understand the unique requirements of your project and wish to initiate your project.', 0, 'active', '2021-07-12 12:55:51', '2021-07-12 12:55:51'),
(45, 'As a passionate freelancer, I have worked with over 300+ clients delivering them exceptional projects on time. After reviewing your project brief, I am keen to work ahead on your project.', 0, 'active', '2021-07-12 12:57:53', '2021-07-12 12:57:53'),
(46, 'I have maintained a rating of 5 stars throughout my 7+years of freelancing.  I am motivated to deliver your project successfully as its details are relevant to my previous work experience.', 0, 'active', '2021-07-12 13:00:04', '2021-07-12 13:00:04'),
(47, 'I have received above 350+ reviews from my contented clients. I will successfully execute your project to perfection after giving a detailed read to your project brief.', 0, 'active', '2021-07-12 13:03:01', '2021-07-12 13:03:01'),
(48, 'I have experience of 7+ years and rank among the top 30 freelancers globally. After going through your project brief, I found the project intriguing and wish to work with you.', 0, 'active', '2021-07-12 14:26:40', '2021-07-12 14:26:40'),
(49, 'After delivering 600+ projects in my 7+ years of experience, I find your project quite interesting after looking closely at the project brief.', 0, 'active', '2021-07-12 14:32:57', '2021-07-12 14:33:46'),
(50, 'I am a certified freelancer with over 600+ projects delivered successfully.  After going through your project\'s detail, I found it one of the most interesting in my 7+ years.', 0, 'active', '2021-07-12 14:36:06', '2021-07-12 14:36:06'),
(51, 'As a certified freelancer, I have completed around 700 top-notch projects.  I will happily take on your project as the requirements match my expertise.', 0, 'active', '2021-07-12 14:40:10', '2021-07-12 14:40:38'),
(52, 'I am a certified freelancer with 350+ reviews from satisfied clients. I have read the project brief and believe that my skills can make your project a success.', 0, 'active', '2021-07-12 14:43:53', '2021-07-12 14:43:53'),
(53, 'After going through your project description, I can assure you that I have worked on similar projects during my 7+ years of experience as a freelancer.', 0, 'active', '2021-07-12 14:46:13', '2021-07-12 14:46:13'),
(54, 'Throughout my 7+ years of freelancing, I have delivered around 600+ projects similar to the project you have listed here.', 0, 'active', '2021-07-12 14:47:51', '2021-07-12 14:47:51'),
(55, 'I am a passionate freelancer with 350+ reviews and a 5-star rating. I understand the project description and aim to make your project a success.', 0, 'active', '2021-07-12 14:53:18', '2021-07-12 14:53:18'),
(56, 'Over my 7+ years of experience, I have managed to deliver 600+ high-quality projects. Your project brief looks promising, and I wish to deliver this project to you.', 0, 'active', '2021-07-12 14:55:08', '2021-07-12 14:55:08'),
(57, 'As an experienced freelancer, I delivered 600+ projects with 5-star ratings. I wish to continue this journey by delivering your project as its requirement perfectly match my skill.', 0, 'active', '2021-07-12 14:58:43', '2021-07-12 14:58:43'),
(58, 'With a 100% project completion rate and track record of 600+ projects, I would love to work on your project requirements.', 0, 'active', '2021-07-12 15:02:13', '2021-07-18 15:54:59'),
(59, 'I am determined to deliver a perfect project according to your requirements with my 7+ years of experience and passion.', 0, 'active', '2021-07-12 15:05:14', '2021-07-18 15:53:18'),
(60, 'With over 7+ years of experience in freelancing on this platform, I have sustained a 5-star rating. I would like to contribute to your project and get it done as per the requirements mentioned.', 0, 'active', '2021-07-12 15:09:21', '2021-07-18 15:52:47'),
(61, 'I have worked passionately as a freelancer for 7+ years. I am highly dedicated, and I find your project requirements easily doable.', 0, 'active', '2021-07-12 15:15:44', '2021-07-18 15:51:26'),
(62, 'I have worked with determination on 600+ projects for the past 7+ years. I analyzed your project requirements and feel confident to get it done.', 0, 'active', '2021-07-12 15:17:59', '2021-07-18 14:24:01'),
(63, 'Observing the project details, I can assure you to deliver it with ease and on time. My past experience has equipped me to cater these type of challenges very easily.', 0, 'active', '2021-07-12 15:19:56', '2021-07-18 10:45:07'),
(64, 'As an enthusiastic freelancer, I have delivered 600+ projects to medium & large enterprises. I am looking forward to pursuing your project as its description is intriguing and similar to my previous experience.', 0, 'active', '2021-07-12 15:29:57', '2021-07-18 10:44:22'),
(65, 'I am a motivated freelancer with 350+ reviews from clients all around the globe. I am keen on delivering your project as it is a perfect match for my niche.', 0, 'active', '2021-07-12 15:32:22', '2021-07-18 10:43:53'),
(66, 'After completing over 600+ high-quality projects, I wish to deliver your project in an exceptional form. Moreover, the project requirements are completely understood by me.', 0, 'active', '2021-07-12 15:34:28', '2021-07-18 10:43:24'),
(67, 'I completely understand your project requirements and will be interested to utilize my professional skills to make a masterpiece.', 0, 'active', '2021-07-12 18:07:37', '2021-07-18 10:42:48'),
(68, 'I am a motivated and experienced freelancer with 350+ exception reviews. After observing the project brief I look forward to delivering high-end work.', 0, 'active', '2021-07-12 18:09:48', '2021-07-18 10:41:45'),
(69, 'In my 7+ years of career as a freelancer, I have completed 600+ projects.  I looked into the detail and found them interesting and similar to my previous experience and core skillset.', 0, 'active', '2021-07-12 18:12:00', '2021-07-18 10:40:46'),
(70, 'Among the 600+ successful projects delivered by me, I find your project significantly different. I am motivated to deliver you an exceptional outcome matching your provided requirements.', 0, 'active', '2021-07-12 18:13:47', '2021-07-18 10:38:39'),
(71, 'I rank among the top 250 freelancers worldwide.  I have understood your requirements and wish to execute your project accordingly.', 0, 'active', '2021-07-12 18:14:43', '2021-07-18 10:37:51'),
(72, 'I have extensive 7+ years of experience in delivering 600+ projects successfully. Project details match my skillset and I wish to proceed with your project ahead.', 0, 'active', '2021-07-13 09:52:15', '2021-07-18 10:37:24'),
(73, 'In my 7+ years of extensive freelancing, I maintained a rating of 5 stars throughout. I recognize your project details align with my skills and wish to work ahead with you.', 0, 'active', '2021-07-13 09:54:03', '2021-07-13 09:54:03'),
(74, 'I have worked on 600+ projects in the past 7+years. I found your project interesting and look forward to executing it perfectly.', 0, 'active', '2021-07-13 09:55:28', '2021-07-13 09:55:28'),
(75, 'I have worked on 600+ projects that have landed me among the top 250 freelancers. I wish to take your project ahead as it matches my core skillset.', 0, 'active', '2021-07-13 09:58:15', '2021-07-18 10:36:06'),
(76, 'I have extensive experience in executing around 600+ projects. I understood your project detail and plan to proceed ahead with your project.', 0, 'active', '2021-07-13 10:01:13', '2021-07-13 10:01:13'),
(77, 'Finished over 600 projects in my 7+ years of freelancing. I acknowledge your project requirements and wish to execute your project profoundly.', 0, 'active', '2021-07-13 10:06:35', '2021-07-18 10:35:26'),
(78, 'I acknowledge your project detail and plan to implement them with precision. Currently, I rank in the top 250 freelancers and have 5-star ratings with a 100% completion rate.', 0, 'active', '2021-07-13 10:09:01', '2021-07-18 10:34:53'),
(79, 'I am highly qualified with 600+ projects delivered within the last 7 years of my career. I found your project detail interesting and wish to proceed with dedication and precision.', 0, 'active', '2021-07-13 10:10:49', '2021-07-18 10:33:21'),
(80, 'I have delivered successful projects with 350+ positive reviews. I observed your project requirements and ready to execute your project professionally.', 0, 'active', '2021-07-13 10:14:08', '2021-07-18 10:32:34'),
(81, 'I am a passionate freelancer with 600+ projects delivered successfully. I recently completed a similar project like the one you mentioined.', 0, 'active', '2021-07-13 10:15:52', '2021-07-18 10:31:56');

-- --------------------------------------------------------

--
-- Table structure for table `tech_stars`
--

CREATE TABLE `tech_stars` (
  `id` bigint UNSIGNED NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `copied_counter` int NOT NULL DEFAULT '0',
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tech_stars`
--

INSERT INTO `tech_stars` (`id`, `description`, `copied_counter`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Word Press-I am a dedicated WordPress expert, well versed in CMS and its framework. My multitasking abilities allow me to work spontaneously on development, programming, and customization as well. Moreover, I also provide edits, updates and remove bugs during the revision process. My work will be on time with a special focus on attention to detail.', 0, 'active', '2021-07-08 11:33:16', '2021-07-08 11:33:16'),
(2, 'WordPress- I am a professional WordPress developer keen o provide full-cycle WordPress development.  I am fluent in WordPress customization, development, and programming to give you a fully functional solution. My work will include editing, updating the plugins, and revisions until you are satisfied with the final product.', 0, 'active', '2021-07-08 11:40:15', '2021-07-08 11:43:32'),
(3, 'WordPress Plugins- My expertise in WordPress plugins has allowed me to do large-scale plugin development according to the client\'s specifications. I am well versed in PHP, and additionally, I can extend functionality on Woocommerce to support customs requirements. Moreover, I also have my plugins listed on the WordPress plugin store.', 0, 'active', '2021-07-08 11:50:07', '2021-07-08 11:50:07'),
(4, 'WordPress- I am a qualified WordPress developer accustomed to WordPress Plugins, customization, and Custom themes. I have a proven record in PHP (laravel), CMS (WordPress, Opencart), Plugin Development, and API integration. I will utilize my skill and cutting-edge technology to provide you a perfect project on time.', 0, 'active', '2021-07-08 11:57:48', '2021-07-08 11:57:48'),
(5, 'WordPress- I am a dedicated WordPress expert fluent in PHP, CMS, PLugins, and API integration.  I utilize the finest themes and customize plugins according to your project requirement. the final product will surely be visually appealing with special attention to detail.', 0, 'active', '2021-07-08 12:05:26', '2021-07-08 12:05:26'),
(6, 'E-commerce- I have developed various e-commerce websites according to the requirements and prominent features reflecting your business.  I am a skillful WordPress Developer and PHP programmer capable of customizing WooCommerce PLugins to support your custom requirements. You can suggest and provide revisions, and the result will be a completely responsive website.', 0, 'active', '2021-07-08 12:13:36', '2021-07-08 12:13:36'),
(7, 'E-commerce- I focus on developing e-commerce websites to grow your business online and give it a global outreach. The e-commerce website includes development, customization, and maintenance. I am well versed in customizing the Woocomerce plugins, along with writing new plugins to extend functionality.  I will provide you with revisions to make your e-commerce site user-friendly.', 0, 'active', '2021-07-08 12:21:48', '2021-07-08 12:21:48'),
(8, 'E-commerce- I am passionately driven to create high-quality e-commerce websites. I will utilize my skill in custom themes, plugin development, and customizing woo-commerce plugins while developing your site. I include visually appealing themes and designs to make your website user-friendly. You can enjoy revisions to make your e-commerce website perfect.', 0, 'active', '2021-07-08 12:32:07', '2021-07-08 12:32:07'),
(9, 'Full stack developer- I am a professional with wide experience in App and Web development. I have delivered projects that included mobile app development using React native and flutter. Similarly, for web development, I am proficient in Javascript, HTML5, PHP, Nodejs, and Laravel. I can tackle projects involving databases and building user interfaces. I give revisions to make your project perfect.', 0, 'active', '2021-07-08 12:50:23', '2021-07-08 12:50:23'),
(10, 'Full-stack developer- I am a dedicated developer with experience in App and Web development. The mobile app projects are done using React Native and Flutter.  I am also proficient in delivering web development projects using Javascript, HTML5, PHP, Nodejs, and Laravel. I can tackle projects involving databases and building user interfaces. I assist in the planning phase and give revisions to make your project perfect.', 0, 'active', '2021-07-08 12:55:31', '2021-07-13 11:14:13'),
(11, 'Web Design- I have worked on designing projects creating visually aesthetic designs for web apps and sites. The sites I create are responsive to multiple gadgets including mobile, tablet, Ipad, desktop, and laptops. The design includes interactive features and logos, images and content as well. You can enjoy revision till you are content with your project.', 0, 'active', '2021-07-08 13:00:46', '2021-07-08 13:00:46'),
(12, 'Web Design- My web design and development projects have landed interactive websites with engaging UI and UX. I also focus on making your website completely responsive and SEO friendly. The web design will include high quality images, animation and content with exceptional vocabulary. Moreover the result after revisions will be delivered in .ai .psd .eps .pdf .jpeg .png formats.', 0, 'active', '2021-07-08 14:10:30', '2021-07-08 14:11:25'),
(13, 'Full Stack Developer- As a full-stack website developer, you can count on me to get your projects completed end to end.  I utilize cornerstone technologies to create your website, mainly using PHP, WordPress, MySQL, Html, Shopify, and Maneto. Similarly, I have a grip over large database websites (terabyte) and expertly troubleshoot PHP or web Apps. You will get revisions to make your website perfect and fully functional.', 0, 'active', '2021-07-08 14:24:35', '2021-07-08 14:24:35'),
(14, 'SMM-  I work to optimize your Social media to the highest standard to increase your outreach. My strategy will gain an organic audience for your social media using highly engaging content and advertisement data analysis, and SEO. I will also use the best analytical tools such as Google Analytics to observe your social media statistics. The content uploaded on your platform will be approved by you.', 0, 'active', '2021-07-08 14:48:06', '2021-07-08 14:51:53'),
(15, 'SEO- My strategy to engage your targeted audience is mainly organic and through SEO. I focus on including fully optimized content for your Web Application. I will help improve your lead generation and boost ROI  through effective optimization using precise keywords, hyperlinking, and promotion using social media.  You will definitely see an improvement in your outreach due to my research and data analysis.', 0, 'active', '2021-07-08 14:50:35', '2021-07-08 14:58:46'),
(16, 'SEO- My SEO campaigns are designed to turn traffic into revenue for your business.  I will bring organic traffic to your website by landing you, loyal customers. Your website will be fully optimized according to Search engine requirements and have high-quality content engaging viewers and increase your revenue per click. Moreover, I also include knowledgeable blogs and hyperlinks that will improve lead generation.', 0, 'active', '2021-07-08 15:18:36', '2021-07-08 15:21:54'),
(17, 'SMM- I am an experienced social media marketer who has worked on various social platforms including Facebook, Instagram, Twitter, and YouTube. My social media strategy will gain you organic traffic mainly through engaging content and effective use of hashtags and trending topics. Moreover, I analyze social media through Analytical tools (google analytics) and optimize the account according to the research.', 0, 'active', '2021-07-08 15:31:41', '2021-07-08 15:31:41'),
(18, 'Graphic Design- The graphical content I create includes visually appealing design, animations, video, and pictorial content using the best tools, including Adobe creative suite, Adobe premium, coral draw, and adobe illustrator. Moreover, our designs will include a synchronizing color scheme and fonts as well.', 0, 'active', '2021-07-08 15:50:00', '2021-07-08 15:50:33'),
(19, 'Logo Designs- The logo designing process is centered around your brand identity and story. I create visually appealing logos that define your brand. The color scheme will enlighten your brand with bold fonts. The logo is designed primarily using Adobe Illustrator and  Photoshop. I provide revisions to make your logo look visually attractive with attention to detail.', 0, 'active', '2021-07-08 15:57:03', '2021-07-08 15:57:03'),
(20, 'PHP developer- I am an experienced developer mainly working in Codeigniter, Yii, and Laravel. I have performed exceptionally using custom PHP and other relevant frameworks. I will happily provide revisions to your project by the end to make it just the way you like.', 0, 'active', '2021-07-08 16:04:33', '2021-07-08 16:04:33'),
(21, 'WordPress- My experience as a WordPress developer ranges over various services such as full cycle WordPress development, programming, and customization. I create an SEO-friendly, WordPress-based CMS website managed by an admin. The website will have an exceptional UX and will also be mobile responsive.', 0, 'active', '2021-07-08 16:21:51', '2021-07-08 16:21:51'),
(22, 'UI/UX- I work on website design and interaction using cornerstone technologies mainly Adobe XD, Photoshop, Invision App, and Figma. The website will provide an appealing interface with a smooth and user-friendly experience. Moreover, I can efficiently integrate on Page SEO and made the site optimum.  You can also benefit from m revisions to give your customer the ideal website.', 0, 'active', '2021-07-08 16:37:38', '2021-07-08 16:37:38'),
(23, 'Graphic Design- I create highly engaging graphical content using the best tools available including, Adobe Illustrator, Photoshop, Canva, and, Coral draw. I create design elements that illustrate and align with your company\'s core.  I am always ready to incorporate revisions into my work and try to give the best output.', 0, 'active', '2021-07-08 16:42:47', '2021-07-08 16:42:47'),
(24, 'Web Development- I create websites that are tailored to your brand requirements, specifications, and identity. To leave the best first impression on your user, we utilize the best technology, mainly MEAN Stack, MERN Stac, Javascript, PHP, and Python. The web app we deliver will be fully functional end to end. You can always look up to me if you require any changes and modifications.', 0, 'active', '2021-07-08 16:52:33', '2021-07-08 16:52:33'),
(25, 'SEO- I create an SEO strategy to get a far greater reach audience than your anticipation. I primarily focus on generating organic leads while local search optimization, product optimization, backlink analysis, and google analytics also come under my domain.  I will also optimize the content through focused keywords, and phrases to get your business ranked.', 0, 'active', '2021-07-08 17:16:16', '2021-07-08 17:16:16'),
(26, 'SEM- I am fully versed in Search Engine Marketing and will get your website on the front page of Search engines within no time.  Advertisements mainly created using the google adwords tool for google search pages and advertising networks. The ad\'s keywords, content, and placement will get your ad featured instantly.', 0, 'active', '2021-07-08 17:27:48', '2021-07-08 17:27:48'),
(27, 'SMM- Social media platforms can provide vast marketing opportunities, and I can help you launch a campaign to reach your audience. I can build a solid strategy that can build your lead generation and convert them into loyal customers.', 0, 'active', '2021-07-08 17:52:35', '2021-07-08 17:52:35'),
(28, 'UI/UX- I am a technically sound UI/UX designer with a strong grip over Adobe XD, Photoshop, and InvisionApp. I design user-friendly and engaging websites and interactions. Moreover, I include aesthetic banner images and exceptional user design and usability to your site. The websites are responsive and work fluently.', 0, 'active', '2021-07-08 18:01:17', '2021-07-08 18:01:17'),
(29, 'E-commerce- E-commerce websites require an interactive interface and need a customer-friendly layout. I will fulfill these requirements and provide you with end-to-end e-commerce solutions. I develop an e-commerce website using Wordpress and PHP, including the development and customization of the Woocommerce plugin.', 0, 'active', '2021-07-08 18:10:21', '2021-07-13 10:40:26'),
(30, 'Logo Design- I am an experienced designer working to create a brand identity using aesthetic logos. I design logos using Adobe Illustrator, Coral Draw, and Photoshop, keeping the design minimal with engaging colors and fonts. I use my imagination to bring your ideas to life.', 0, 'active', '2021-07-08 18:12:16', '2021-07-09 11:09:44'),
(31, 'E-commerce- As a WordPress developer, I am well versed in custom themes, plugin development, and customization.  Moreover, I am also capable of customizing the Woocommerce plugins to extend functionality. your site will be completely responsive and SEO friendly. You will also be able to leverage revisions to get a bug-free finished project.', 0, 'active', '2021-07-09 10:09:03', '2021-07-09 10:09:03'),
(32, 'Mobile App- I deliver cross-platform mobile apps due to my expertise in HTML5. I am also fluent with react native and will incorporate your business needs in the application. The product I complete will be visually appealing and provide a top-notch user experience for your customer. You can always give your suggestions and get your app running perfectly.', 0, 'active', '2021-07-09 10:27:00', '2021-07-09 10:27:00'),
(33, 'Mobile app- I am well-versed in developing cross-platform mobile applications and fluency in react native framework. You will receive a completely functional mobile application with an excellent user experience. The application will also include high-quality visuals and will become the representative of your brand. You can always provide our feedback to improve the performance of the app.', 0, 'active', '2021-07-09 10:32:20', '2021-07-09 10:32:20'),
(34, 'SEO- I will completely revamp your website optimizing it to the search engines standards. For this, I utilize the best tools available for analysis and develop a strong campaign. I work with a proven strategy utilizing Moz, Yoast, Google Analytics, SEO Power Suite, AWR, Keyword Tracker and optimize the content to gain a higher ranking among the search engines.', 0, 'active', '2021-07-09 10:36:14', '2021-07-09 10:36:14'),
(35, 'Full-stack developer- I have provided development services to varying industries utilizing AngularJS, Java, React.js,  and PHP. I also have a record of working with large database websites (terabytes). The wide skillset allows me to fluently work on front-end and back-end services to provide you with a full-fledge application. I will always look towards your suggestion during the project to complete the project flawlessly.', 0, 'active', '2021-07-09 10:39:32', '2021-07-09 10:44:51'),
(36, 'Web Design- I am a dedicated developer that can design and develop a web app with exceptional UI and UX.  I will provide you complete end-to-end services with visually aesthetic designs and layout to adding front-end, back-end development, and full-cycle testing for your website.  You are always welcome to provide valuable feedback to make your app exceptional.', 0, 'active', '2021-07-09 10:51:22', '2021-07-09 10:51:22'),
(37, 'SMM- I can create completely optimized social media pages and campaigns targeting your business goals.  I engage your customers organically through interactive posts and also use advertisement, boosting to increase ROI and lead generation. you will also receive reports showing the performance of your campaigns throughout the project.', 0, 'active', '2021-07-09 10:57:22', '2021-07-09 10:57:22'),
(38, 'Graphic Design- I create highly appealing and aesthetic visual content, including animations and videos. My content is eye-catching and created using Adobe Illustrator, Photoshop, Canva, and, Coral draw. I always welcome feedback from your end to make the content perfect for your business promotions.', 0, 'active', '2021-07-09 10:58:59', '2021-07-09 11:01:10'),
(39, 'UI/UX- I am a passionate UI/UX designer with a high-quality skillset in Adobe XD, Photoshop, and InvisionApp. I enjoy creating websites and apps that are visually appealing and provide an excellent user experience.  Moreover, I am always keen to provide you brilliant designs that align your requirement and update them according to your valuable feedback.', 0, 'active', '2021-07-09 11:02:06', '2021-07-09 11:05:10'),
(40, 'Logo Design- I create classy logo designs that perfectly align and represent your brand identity. I design the logos according to your preference using the best tools, including Adobe Illustrator, Coral Draw, and Photoshop. The logo will portray the story behind your brand and gain your customer\'s interest.  You are always welcome to provide your valuable feedback to make your logo design perfect.', 0, 'active', '2021-07-09 11:08:34', '2021-07-09 11:12:37'),
(41, 'Logo design-I am working for the last 10 years in Photoshop, Logo Design, Illustrator, Graphic Design and Illustration.  Using these tools, I can create beautiful logos according to your brand.', 0, 'active', '2021-07-12 15:38:07', '2021-07-12 15:38:07'),
(42, 'Mobile Application- I am proficient with react native and flutter technology stacks. Using my skills and experience, I can create cross-platform applications with a high-quality user experience and interface.', 0, 'active', '2021-07-12 15:39:46', '2021-07-12 15:43:02'),
(43, 'Web Development- In my experience as a web developer, I have worked with PHP & related technology stacks, including Laravel, CodeIgniter, Magento, Zend, and Prestashop. The website will be developed end to end and will be fully functional.', 0, 'active', '2021-07-12 15:45:28', '2021-07-12 15:45:28'),
(44, 'Graphic designer- I am a creative graphic designer with strong control over tools like Adobe Illustrator, Photoshop, Coral draw, and Canva. I utilize these tools to make exceptional graphical content t add to your site, apps, or other digital media platforms.', 0, 'active', '2021-07-12 15:50:10', '2021-07-12 15:53:38'),
(45, 'UI/UX- I am a creatively driven UI/ UX designer who creates innovative web and application Interfaces. I mainly use ADOBE XD, PHOTOSHOP, INVISIONAPP or FIGMA as the tools to create a user-friendly experience on your app or site.', 0, 'active', '2021-07-12 15:56:54', '2021-07-12 15:56:54'),
(46, 'Full-stack developer- As a full-stack developer, I focus on developing fully functional Websites and apps utilizing  PHP & related technology stacks, including Laravel, CodeIgniter, Magento, Zend, and Prestashop.', 0, 'active', '2021-07-12 16:00:21', '2021-07-12 16:00:21'),
(47, 'SMM- I am a dedicated social media marketer and emphasize creating optimize social media pages with high-quality content. I specialize in generating organic leads along with advertisements and promotions.  Moreover, I analyze social media through Analytical tools (google analytics) and optimize the account according to the research.', 0, 'active', '2021-07-12 16:05:03', '2021-07-12 16:06:05'),
(48, 'SEM- I utilize the best search engine tools to market your brand to the top level creating less that convert into customers. I create advertisements using the google adwords tool for google search pages and advertising networks. The ad\'s keywords, content, and placement will get your ad featured instantly.', 0, 'active', '2021-07-12 16:07:42', '2021-07-12 16:08:58'),
(49, 'SEO- To create more leads to your website, I fully optimize your content on-site and off-site. The keywords are used, which will help your site rank organically above. Moreover, tools such as google analytics to determine the statistics of your website and create a better SEO strategy.', 0, 'active', '2021-07-12 16:12:46', '2021-07-12 16:12:46'),
(50, 'Wordpress- As a wordpress developer I am well versed in CMS and its framework. I can work spontaneously on development, programming, customization, and plugin development to create an optimum website for you.', 0, 'active', '2021-07-12 16:13:47', '2021-07-12 16:15:21'),
(51, 'Wordpress- I have good control over CMS and its frameworks. Moreover, I can also Develop, program, and customize WordPress websites. Similarly, I can fully scale the Wordpress website and utilize the platform\'s flexibility at its best.', 0, 'active', '2021-07-12 16:17:59', '2021-07-12 16:17:59'),
(52, 'E-commerce Website- I have a proven record in PHP (laravel), CMS (WordPress, Opencart), and I can integrate Woocommerce plugins and write new plugins. I am also proficient at maintaining and customizing e-commerce sites mating the UI/ UX convenient for the users', 0, 'active', '2021-07-12 16:19:46', '2021-07-12 16:22:36'),
(53, 'E-commerce-  I will develop an E-commerce website with captivating UI and UX. I have a proven record in PHP (laravel), CMS (WordPress, Opencart) and can also integrate Woocommerce plugins to make websites fully functional', 0, 'active', '2021-07-12 16:24:56', '2021-07-12 16:24:56'),
(54, 'Web design- I provide front-end and back-end services to create a captivating website with complete functionality. The websites are fully responsive and developed using PHP & related technology stacks, including Laravel, CodeIgniter, Magento, Zend, \r\n or Prestashop', 0, 'active', '2021-07-12 16:25:57', '2021-07-12 16:28:48'),
(55, 'Full Stacks Developer- As a developer, I am proficient with PHP & related technology stacks, including PHP Laravel utilizing AngularJS, Java, and React.js. Moreover, I am highly proficient with large database websites, and I can work according to your suggestion and feedback.', 0, 'active', '2021-07-12 16:47:13', '2021-07-12 16:47:46'),
(56, 'UI/UX- I create highly engaging, interactive, and easy-to-use webs ties and apps. I am highly proficient in ADOBE XD, PHOTOSHOP, INVISIONAPP, or FIGMA. I also provide edits to my wor updating it to the best form possible.', 0, 'active', '2021-07-12 16:50:44', '2021-07-12 16:50:44'),
(57, 'Web Designer- I passionately design and develop websites responsive to all kinds of gadgets including mobiles, tabs, and pc.   I utilize the best tools available, including ADOBE XD, PHOTOSHOP, INVISIONAPP, or FIGMA for UI and UX. While developing, I use PHP & related technology stacks, including Laravel, CodeIgniter, Magento, Zend, and Prestashop.', 0, 'active', '2021-07-12 16:54:26', '2021-07-12 16:54:26'),
(58, 'SEO- I have a proven record with SEO and provide high-quality keywords research and organic lead generation using the best analytical tools mainly google analytics, Moz, and Yoast. I create strategies that generate leads and convert them into loyal customers.', 0, 'active', '2021-07-12 16:58:17', '2021-07-12 16:58:17'),
(59, 'WordPress PLugins- I am a dedicated Wordpress developer and have a strong background in creating, customizing Wordpress plugins. The Wordpress plugins can be created according to o your needs to increase functionality. My work involves revision and feedback from your end to get the best result possible.', 0, 'active', '2021-07-12 17:00:36', '2021-07-12 17:00:36'),
(60, 'Logo Design- Every brand deserves a unique and special logo that depicts its identity. I try to create the best logos using Adobe Illustrator, Coral Draw, and Photoshop. You can always help improve your logo through your valuable feedback.', 0, 'active', '2021-07-12 17:03:06', '2021-07-13 11:19:00'),
(61, 'Wordpress- I am a highly proficient wordpress developer with fluency in PHP laravel, CMS, and its frameworks. I can efficiently customize and update plugins to increase functionality.', 0, 'active', '2021-07-13 10:25:36', '2021-07-13 10:25:36'),
(62, 'Web Design- As a dedicated developer, I can create responsive websites with exceptional UI/UX. The sites are compatible with all kinds of platforms, and I optimize the website for SEO. Moreover, I always look towards feedback and responses to make your website ideal.', 0, 'active', '2021-07-13 10:31:08', '2021-07-13 10:31:08'),
(63, 'Web development. I utilize the best technology stack, mainly MEAN Stack, MERN Stack, Javascript, PHP, and Python, to develop interactive websites and applications. The website and application will be fully functional and can be improved through your feedback', 0, 'active', '2021-07-13 10:33:00', '2021-07-13 10:34:16'),
(64, 'E-commerce website-  I develop e-commerce websites using Wordpress and PHP, including the development and customization of Woocommerce plugins. Utilizing these tools and plugins, I create a top-notch e-commerce website that can be improved with the help of your constructive feedback.', 0, 'active', '2021-07-13 10:38:07', '2021-07-13 10:38:07'),
(65, 'UI/UX-As a dedicated UI/UX designer, I look towards delivering highly appealing websites. I have recorded experience with  Adobe XD, Photoshop, and InvisionApp. The websites are responsive and have a fluent interface. I always look towards your feedback to improve the design to its best', 0, 'active', '2021-07-13 10:43:20', '2021-07-13 10:43:20'),
(66, 'SEO- I will get your website ranked using a tailored SEO strategy developed after in-depth research. I use the best tools for analysis and optimization, mainly Google Adword, Google Analytics, Moz, and Yoast. Your fully optimize website or app will be ranked among the best search engines available.', 0, 'active', '2021-07-13 10:47:11', '2021-07-13 10:47:11'),
(67, 'SMM- I manage social media accounts and pages by optimizing them to gain organic reach and increase audience engagement. My social media campaigns involve in-depth research and focus on the trending topics that would help your business. The strategy I create will land you lng term customers for your business.', 0, 'active', '2021-07-13 10:50:08', '2021-07-13 10:50:08'),
(68, 'Graphic design- As a graphic designer, I create beautiful artwork using the best gadgets and tools, mainly  Adobe Illustrator, Photoshop, Canva, and, Coral draw. The design will illuminate your website, social media and will engage your audience as graphical content is always more impactful. I give special attention to your feedback, so your designs are perfect.', 0, 'active', '2021-07-13 10:53:34', '2021-07-13 10:53:34'),
(69, 'Full stacks developer- I am an experienced developer with extensive work on web and app development. I develop cross-platform mobile applications using React native and Flutter.  I am also proficient in delivering web development projects using Javascript, HTML5, PHP, Nodejs, and Laravel. I pay special attention to detail and also work according to your suggestion to deliver exceptional projects.', 0, 'active', '2021-07-13 10:57:34', '2021-07-13 10:57:34'),
(70, 'Logo Design- I am a dedicated designer and enjoy creating iconic logos for brands. The logos I make depict a story o the brand and represent its identity. I use the best tools like Adobe Illustrator, Coral Draw, and Photoshop. I always look ahead to your feedback to deliver you a brilliantly finished product.', 0, 'active', '2021-07-13 11:19:55', '2021-07-13 11:19:55'),
(71, 'SEM- I am a dedicated marketer with expertise in working with Search engines. I will use tools such as google adwords and integrate keywords, advertisements that will instantly get your website featured among search engines.', 0, 'active', '2021-07-13 11:22:45', '2021-07-13 11:22:45'),
(72, 'Web developer- I am an experienced web developer with a recorded experience in PHP & related technology stacks, including Laravel, CodeIgniter, Magento, Zend, and Prestashop. You can always provide suggestions to get your project to deliver a better outcome.', 0, 'active', '2021-07-13 12:00:17', '2021-07-13 12:00:17'),
(73, 'Ecommerce- I have a proven record in PHP (laravel), CMS (WordPress, Opencart), and I can integrate Woocommerce plugins and write new plugins. Through my expertise in these tools, I can deliver outstanding e-commerce sites with convenient UI/ UX.  I always appreciate feedback, so your project is delivered in the best form.', 0, 'active', '2021-07-13 12:10:49', '2021-07-13 12:10:49'),
(74, 'Mobile App- I develop cross-platform mobile applications with high-quality visuals and excellent interface. I am fluent in react native framework. You can provide your suggestions to make your mobile application fully functional.', 0, 'active', '2021-07-13 12:15:51', '2021-07-13 12:15:51'),
(75, 'Mobile application- I craft feature-rich and user-engaging web and mobile apps with captivating UI/UX that reflects unique business aesthetics. I have a  recorded experience in Mobile Apps development using ReactNative and Flutter.', 0, 'active', '2021-07-13 12:20:01', '2021-07-13 12:20:01'),
(76, 'Full-stack developer- I am a skillful and enthusiastic developer with a proven record in PHP (Laravel, Yii, Codeigniter), CMS (Wordpress, Joomla, Opencart, Magento ), Plugin development & API integration. I develop front-end and back-end with expertise. you can always revise the app o site to improve it further.', 0, 'active', '2021-07-13 12:27:17', '2021-07-13 12:27:17'),
(77, 'UI/UX- I am a highly-skilled/UX designer & Programmer. I’m very well versed with Custom themes, plugin development & Customization. I can Design graphic user interface elements, like menus, tabs, and widgets, etc. I am fluent in Adobe XD, Photoshop, and InvisionApp.', 0, 'active', '2021-07-13 12:29:35', '2021-07-13 12:29:35'),
(78, 'Wordpress plugins- I am highly skilled in WordPress Custom themes, plugin development & Customization. I customize plugins and write new plugins to extend functionality. My Plugins have been listed on the WordPress Plugins store.', 0, 'active', '2021-07-13 12:36:56', '2021-07-13 12:36:56'),
(79, 'PHP developer- I am an enthusiastic PHP programmer with experience in developing websites in custom PHP and frameworks like Codeigniter & YII. The websites are fully optimized and responsive with an engaging user interface.', 0, 'active', '2021-07-13 12:40:21', '2021-07-13 12:40:21'),
(80, 'Graphic Design- I create eye-catching digital masterpieces for you. I have the latest gadgets and tools, mainly  Adobe Illustrator, Photoshop, Canva, and, Coral draw. I will improve the design according to your valuable feedback and deliver stunning graphics for you.', 0, 'active', '2021-07-13 12:48:04', '2021-07-13 12:50:45');

-- --------------------------------------------------------

--
-- Table structure for table `types`
--

CREATE TABLE `types` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `designation_id` int DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `picture` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `role` enum('admin','bidder') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'bidder',
  `last_logged_in` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `designation_id`, `name`, `email`, `email_verified_at`, `password`, `picture`, `remember_token`, `status`, `role`, `last_logged_in`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Ahmad Ayaz', 'ahmadayaznoor@gmail.com', NULL, '$2y$10$Dj/Bx67v.WXNaWJ9YPqJS.JIhxO5R0Y8pmhSCmAui2fro7oGBZ64a', '1617628086-20210405060806614.webp', NULL, 'active', 'admin', '2021-08-25 19:10:27', '2021-04-05 18:06:43', '2021-08-25 19:10:27'),
(2, 1, 'Zeenat Anab', 'zeenat@wolfiz.com', NULL, '$2y$10$X87n/ennx4NPJo0tbSLaP.smtWXlRGWQQi80pJQT/xvgjr650A66i', NULL, NULL, 'active', 'bidder', '2021-04-07 08:11:05', '2021-04-07 08:10:28', '2021-04-07 10:17:56'),
(3, NULL, 'Ahmad Ayaz', 'tayyab@gmail.com', NULL, '$2y$10$fvoPyv.pF0/1SBnn51agl.kitVd.pDs/IxsoOf3320ijnc4OVyQ4C', '1617628086-20210405060806614.webp', NULL, 'active', 'admin', '2022-08-05 15:42:20', '2021-04-05 18:06:43', '2022-08-05 15:42:20');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `apis`
--
ALTER TABLE `apis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `currencies`
--
ALTER TABLE `currencies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `designations`
--
ALTER TABLE `designations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `enders`
--
ALTER TABLE `enders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `excludes`
--
ALTER TABLE `excludes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `freelancer_api_clients`
--
ALTER TABLE `freelancer_api_clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `industries`
--
ALTER TABLE `industries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `industry_item`
--
ALTER TABLE `industry_item`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `item_skill`
--
ALTER TABLE `item_skill`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `item_type`
--
ALTER TABLE `item_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `languages`
--
ALTER TABLE `languages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `language_project_filter`
--
ALTER TABLE `language_project_filter`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `leaves`
--
ALTER TABLE `leaves`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `live_feeds`
--
ALTER TABLE `live_feeds`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `live_feeds_project_id_unique` (`project_id`);

--
-- Indexes for table `live_feed_details`
--
ALTER TABLE `live_feed_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `live_feed_proposals`
--
ALTER TABLE `live_feed_proposals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `options`
--
ALTER TABLE `options`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `portfolio_initiators`
--
ALTER TABLE `portfolio_initiators`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `projects_freelancer_project_id_unique` (`freelancer_project_id`);

--
-- Indexes for table `project_details`
--
ALTER TABLE `project_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `project_filters`
--
ALTER TABLE `project_filters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `project_filter_skill`
--
ALTER TABLE `project_filter_skill`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `project_proposals`
--
ALTER TABLE `project_proposals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `skills`
--
ALTER TABLE `skills`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `starters`
--
ALTER TABLE `starters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tech_stars`
--
ALTER TABLE `tech_stars`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `types`
--
ALTER TABLE `types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `apis`
--
ALTER TABLE `apis`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=251;

--
-- AUTO_INCREMENT for table `currencies`
--
ALTER TABLE `currencies`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `designations`
--
ALTER TABLE `designations`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `enders`
--
ALTER TABLE `enders`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT for table `excludes`
--
ALTER TABLE `excludes`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `freelancer_api_clients`
--
ALTER TABLE `freelancer_api_clients`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `industries`
--
ALTER TABLE `industries`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `industry_item`
--
ALTER TABLE `industry_item`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `item_skill`
--
ALTER TABLE `item_skill`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `item_type`
--
ALTER TABLE `item_type`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `languages`
--
ALTER TABLE `languages`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `language_project_filter`
--
ALTER TABLE `language_project_filter`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `leaves`
--
ALTER TABLE `leaves`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `live_feeds`
--
ALTER TABLE `live_feeds`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `live_feed_details`
--
ALTER TABLE `live_feed_details`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `live_feed_proposals`
--
ALTER TABLE `live_feed_proposals`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `options`
--
ALTER TABLE `options`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `portfolio_initiators`
--
ALTER TABLE `portfolio_initiators`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `project_details`
--
ALTER TABLE `project_details`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `project_filters`
--
ALTER TABLE `project_filters`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `project_filter_skill`
--
ALTER TABLE `project_filter_skill`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `project_proposals`
--
ALTER TABLE `project_proposals`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `skills`
--
ALTER TABLE `skills`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1997;

--
-- AUTO_INCREMENT for table `starters`
--
ALTER TABLE `starters`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT for table `tech_stars`
--
ALTER TABLE `tech_stars`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT for table `types`
--
ALTER TABLE `types`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
