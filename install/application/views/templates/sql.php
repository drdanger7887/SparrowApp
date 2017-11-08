CREATE TABLE IF NOT EXISTS `pages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `menu_title` varchar(128) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `route_id` int(128) NOT NULL,
  `content` longtext NOT NULL,
  `sequence` int(11) NOT NULL DEFAULT '0',
  `seo_title` text NOT NULL,
  `meta` text NOT NULL,
  `url` varchar(255) DEFAULT NULL,
  `new_window` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`),
  FULLTEXT KEY `title` (`title`,`content`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

-- new query

CREATE TABLE IF NOT EXISTS `routes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `slug` varchar(255) NOT NULL,
  `route` varchar(32) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

-- new query

CREATE TABLE IF NOT EXISTS `sessions` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(45) NOT NULL,
  `user_agent` varchar(120) DEFAULT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` text NOT NULL,
  PRIMARY KEY (`session_id`),
  KEY `last_activity_idx` (`last_activity`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- new query

CREATE TABLE IF NOT EXISTS `settings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(255) NOT NULL,
  `setting_key` varchar(255) NOT NULL,
  `setting` longtext NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

-- new query

CREATE TABLE IF NOT EXISTS `tbl_address` (
  `id` int(150) NOT NULL AUTO_INCREMENT,
  `trip_id` int(150) NOT NULL,
  `latitude` text NOT NULL,
  `longitude` text NOT NULL,
  `weight` int(20) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=0 ;

-- new query

CREATE TABLE IF NOT EXISTS `tbl_admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `admin_email` varchar(40) CHARACTER SET latin1 DEFAULT NULL,
  `admin_password` varchar(40) CHARACTER SET latin1 DEFAULT NULL,
  `admin_name` varchar(40) CHARACTER SET latin1 DEFAULT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `company_name` varchar(255) DEFAULT NULL,
  `company_email` varchar(255) DEFAULT NULL,
  `company_mobile` varchar(255) DEFAULT NULL,
  `admin_img` varchar(255) DEFAULT NULL,
  `access` varchar(12) NOT NULL DEFAULT 'Admin',
  `admin_createddate` varchar(40) CHARACTER SET latin1 DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=0 ;

-- new query

CREATE TABLE IF NOT EXISTS `tbl_advertisement` (
  `ad_id` int(11) NOT NULL AUTO_INCREMENT,
  `ad_title` varchar(50) NOT NULL,
  `ad_nav_link` varchar(100) NOT NULL,
  `isactive` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `advertisement_url` varchar(255) NOT NULL,
  PRIMARY KEY (`ad_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=0 ;

-- new query

CREATE TABLE IF NOT EXISTS `tbl_amenities` (
  `amenities_id` int(11) NOT NULL AUTO_INCREMENT,
  `amenities_name` varchar(40) DEFAULT NULL,
  `created_on` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`amenities_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=0 ;

-- new query

CREATE TABLE IF NOT EXISTS `tbl_category` (
  `category_id` int(15) NOT NULL AUTO_INCREMENT,
  `category_name` varchar(56) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `is_active` int(2) NOT NULL,
  PRIMARY KEY (`category_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=0 ;

-- new query

CREATE TABLE IF NOT EXISTS `tbl_client_questions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `questions` varchar(1000) NOT NULL,
  `trip_led_id` int(11) NOT NULL,
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=0 ;

-- new query

CREATE TABLE IF NOT EXISTS `tbl_comport` (
  `comport_id` int(11) NOT NULL AUTO_INCREMENT,
  `comport_level` varchar(255) NOT NULL,
  `comport_logo` varchar(255) NOT NULL,
  `is_active` int(11) NOT NULL,
  PRIMARY KEY (`comport_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

-- new query

CREATE TABLE IF NOT EXISTS `tbl_country` (
  `country_id` int(6) NOT NULL AUTO_INCREMENT,
  `country_name` varchar(120) DEFAULT NULL,
  `country_code` varchar(5000) DEFAULT NULL,
  `currency` varchar(100) NOT NULL,
  `is_active` int(11) DEFAULT '0',
  `created_date` datetime DEFAULT NULL,
  PRIMARY KEY (`country_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

-- new query

CREATE TABLE IF NOT EXISTS `tbl_currency` (
  `currency_id` int(6) NOT NULL AUTO_INCREMENT,
  `currency_name` varchar(120) DEFAULT NULL,
  `currency_symbol` varchar(15) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  PRIMARY KEY (`currency_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=26 ;


-- new query

CREATE TABLE IF NOT EXISTS `tbl_email_template` (
  `tplid` int(11) NOT NULL AUTO_INCREMENT,
  `tplshortname` varchar(250) NOT NULL,
  `tplsubject` varchar(250) NOT NULL,
  `tplmessage` text NOT NULL,
  `tplmailid` varchar(100) DEFAULT NULL,
  `isactive` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`tplid`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=35 ;

-- new query

CREATE TABLE IF NOT EXISTS `tbl_enquires` (
  `enquiry_id` int(16) NOT NULL AUTO_INCREMENT,
  `enquiry_passanger_id` varchar(40) DEFAULT NULL,
  `enquiry_trip_id` varchar(40) DEFAULT NULL,
  `enquire_travel_id` varchar(255) DEFAULT NULL,
  `enquiry_trip_date` date DEFAULT NULL,
  `enquiry_trip_status` int(11) DEFAULT NULL,
  `enquiry_date_time` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `payment_flg` enum('1','0') DEFAULT '0',
  PRIMARY KEY (`enquiry_id`),
  KEY `tbl_trips_tbl_enquires` (`enquiry_trip_id`),
  KEY `tbl_passengers_tbl_enquires` (`enquiry_passanger_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=0 ;


-- new query

CREATE TABLE IF NOT EXISTS `tbl_feedback` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(22) NOT NULL,
  `trip_user_id` int(11) NOT NULL,
  `feedback` varchar(444) NOT NULL,
  `enquiry_passanger_id` int(100) NOT NULL,
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=0 ;

-- new query

CREATE TABLE IF NOT EXISTS `tbl_language` (
  `language_id` int(6) NOT NULL AUTO_INCREMENT,
  `language_name` varchar(120) DEFAULT NULL,
  `language_code` varchar(15) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  PRIMARY KEY (`language_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

-- new query

CREATE TABLE IF NOT EXISTS `tbl_logo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

-- new query

CREATE TABLE IF NOT EXISTS `tbl_orders` (
  `order_id` int(16) NOT NULL AUTO_INCREMENT,
  `order_number` varchar(255) DEFAULT NULL,
  `order_trip_leg_id` varchar(40) DEFAULT NULL,
  `order_trip_id` int(16) DEFAULT NULL,
  `order_travel_id` int(16) DEFAULT NULL,
  `order_passenger_id` varchar(255) DEFAULT NULL,
  `order_trip_date` date DEFAULT NULL,
  `order_amount` int(20) DEFAULT NULL,
  `order_commission` int(20) DEFAULT NULL,
  `order_date_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `order_flg` enum('0','1','2') DEFAULT '0' COMMENT '0->pending,1->success,2->cancel',
  `payment_fields` text,
  `payment_flg` enum('1','0') DEFAULT '0',
  PRIMARY KEY (`order_id`),
  KEY `tbl_trips_tbl_enquires` (`order_trip_leg_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=0 ;

-- new query

CREATE TABLE IF NOT EXISTS `tbl_payment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `payment_type` enum('paypal') NOT NULL,
  `payment_id` varchar(100) DEFAULT NULL,
  `is_active` int(11) DEFAULT NULL,
  `is_method` int(11) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

-- new query

CREATE TABLE IF NOT EXISTS `tbl_radius` (
  `id` int(150) NOT NULL AUTO_INCREMENT,
  `distance_from` int(150) NOT NULL,
  `distance_to` int(150) NOT NULL,
  `radius` int(150) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=0 ;


-- new query

CREATE TABLE IF NOT EXISTS `tbl_rating` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `rating_giver_id` int(16) NOT NULL,
  `rating_receiver_id` int(16) DEFAULT NULL,
  `rating` int(16) DEFAULT NULL,
  `created_date` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=0 ;

-- new query

CREATE TABLE IF NOT EXISTS `tbl_socialmedia` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `social_media` enum('Facebook','Twitter','Google+','LinkedIn') NOT NULL,
  `page_url` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

-- new query

CREATE TABLE IF NOT EXISTS `tbl_t_trip_legs` (
  `trip_led_id` int(150) NOT NULL AUTO_INCREMENT,
  `source_leg` text NOT NULL,
  `source_latitude` varchar(255) NOT NULL,
  `source_longitude` varchar(255) NOT NULL,
  `destination_leg` text NOT NULL,
  `destination_latitude` varchar(255) NOT NULL,
  `destination_longitude` varchar(255) NOT NULL,
  `expected_time` varchar(50) NOT NULL,
  `trip_return` int(10) NOT NULL,
  `route_rate` int(150) NOT NULL DEFAULT '0',
  `trip_id` int(150) NOT NULL,
  `created_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`trip_led_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=0 ;

-- new query

CREATE TABLE IF NOT EXISTS `tbl_subscribe` (
  `subscribe_id` int(150) NOT NULL AUTO_INCREMENT,
  `subscribe_email` varchar(255) NOT NULL,
  `subscribe_ip` varchar(255) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`subscribe_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=0 ;

-- new query

CREATE TABLE IF NOT EXISTS `tbl_testimonials` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `image` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `isactive` int(2) NOT NULL DEFAULT '1',
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

-- new query

CREATE TABLE IF NOT EXISTS `tbl_trips` (
  `trip_id` int(11) NOT NULL AUTO_INCREMENT,
  `trip_driver_id` varchar(40) DEFAULT NULL,
  `trip_vehicle_id` varchar(40) DEFAULT NULL,
  `trip_from_latlan` text,
  `trip_to_latlan` text,
  `source` text NOT NULL,
  `destination` text NOT NULL,
  `route` text NOT NULL,
  `route_full_data` text NOT NULL,
  `trip_routes_lat_lan` text,
  `trip_routes` text NOT NULL,
  `trip_return` varchar(40) DEFAULT NULL,
  `trip_depature_time` time DEFAULT NULL,
  `trip_return_time` time DEFAULT NULL,
  `trip_journey_hours` varchar(40) DEFAULT NULL,
  `trip_amenities` varchar(255) DEFAULT NULL,
  `trip_frequncy` varchar(40) DEFAULT NULL,
  `trip_avilable_seat` varchar(40) DEFAULT NULL,
  `passenger_type` varchar(255) DEFAULT NULL COMMENT '1->male 2->female 3->both',
  `trip_rate_details` varchar(40) DEFAULT NULL,
  `contact_person_name` varchar(40) DEFAULT NULL,
  `contact_person_number` varchar(40) DEFAULT NULL,
  `trip_comments` text,
  `trip_user_id` varchar(40) DEFAULT NULL,
  `trip_casual_date` varchar(255) NOT NULL,
  `trip_created_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `trip_status` tinyint(1) NOT NULL DEFAULT '1',
  `trip_otp_status` int(2) NOT NULL DEFAULT '0',
  PRIMARY KEY (`trip_id`),
  KEY `tbl_users_tbl_trips` (`trip_user_id`),
  KEY `tbl_vehicle_tbl_trips` (`trip_vehicle_id`),
  KEY `tbl_drivers_tbl_trips` (`trip_driver_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=0 ;

-- new query

CREATE TABLE IF NOT EXISTS `tbl_t_login_logs` (
  `login_log_id` double DEFAULT NULL,
  `login_id` double DEFAULT NULL,
  `login_ip` varchar(675) DEFAULT NULL,
  `login_time` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- new query

CREATE TABLE IF NOT EXISTS `tbl_t_trip_legs` (
  `trip_led_id` int(150) NOT NULL AUTO_INCREMENT,
  `source_leg` text NOT NULL,
  `source_latitude` varchar(255) NOT NULL,
  `source_longitude` varchar(255) NOT NULL,
  `destination_leg` text NOT NULL,
  `destination_latitude` varchar(255) NOT NULL,
  `destination_longitude` varchar(255) DEFAULT NULL,
  `expected_time` varchar(50) NOT NULL,
  `trip_return` int(10) NOT NULL,
  `route_rate` int(150) NOT NULL DEFAULT '0',
  `trip_id` int(150) NOT NULL,
  `created_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`trip_led_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=0 ;


-- new query

CREATE TABLE IF NOT EXISTS `tbl_users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_email` varchar(40) DEFAULT NULL,
  `user_password` varchar(40) DEFAULT NULL,
  `user_type` varchar(40) DEFAULT NULL COMMENT '1->Travel  , 2->Individuals',
  `user_company_name` varchar(255) DEFAULT NULL,
  `user_first_name` varchar(40) DEFAULT NULL,
  `user_last_name` varchar(40) DEFAULT NULL,
  `user_about_us` text NOT NULL,
  `user_profile_img` varchar(255) NOT NULL,
  `user_mobile` varchar(40) DEFAULT NULL,
  `user_secondary_phone` varchar(40) DEFAULT NULL,
  `user_secondary_mail` varchar(40) DEFAULT NULL,
  `user_company_id` varchar(40) DEFAULT NULL,
  `user_url` varchar(255) NOT NULL,
  `user_street` varchar(255) DEFAULT NULL,
  `user_city` varchar(40) DEFAULT NULL,
  `postal_code` int(50) DEFAULT NULL,
  `user_occupation` varchar(40) DEFAULT NULL,
  `marital_status` varchar(40) DEFAULT NULL,
  `isverified` varchar(60) NOT NULL,
  `comport_level` varchar(255) NOT NULL,
  `language` varchar(255) NOT NULL,
  `licence_number` varchar(60) NOT NULL,
  `show_number` varchar(50) DEFAULT '1' COMMENT '1->yes , 0->no',
  `send_sms` varchar(50) DEFAULT '1' COMMENT '1->yes , 0->no',
  `allowed_food` int(2) NOT NULL COMMENT '0->no,1->yes',
  `allowed_pet` int(2) NOT NULL COMMENT '0->no,1->yes',
  `allowed_smoke` int(2) NOT NULL COMMENT '0->no,1->yes',
  `allowed_chat` int(2) NOT NULL COMMENT '0->no,1->yes',
  `allowed_music` int(2) NOT NULL COMMENT '0->no,1->yes',
  `allowed_luggage` int(11) NOT NULL,
  `user_gender` varchar(40) DEFAULT NULL,
  `user_country` varchar(40) DEFAULT NULL,
  `user_dob` varchar(50) NOT NULL,
  `communication_mobile` int(2) NOT NULL DEFAULT '0' COMMENT '0-->primary , 2-->secondary ',
  `communication_email` int(2) NOT NULL DEFAULT '0' COMMENT '0-->primary , 2-->secondary ',
  `login_type` int(10) NOT NULL COMMENT '0-->normal ,1-->facebook',
  `isactive` int(2) NOT NULL,
  `user_admin_status` int(11) NOT NULL DEFAULT '0',
  `user_created_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `user_lost_login` varchar(255) NOT NULL,
  PRIMARY KEY (`user_id`),
  KEY `tbl_company_tbl_users` (`user_company_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=0 ;

-- new query

CREATE TABLE IF NOT EXISTS `tbl_rating` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `rating_giver_id` int(16) NOT NULL,
  `rating_receiver_id` int(16) DEFAULT NULL,
  `rating` int(16) DEFAULT NULL,
  `created_date` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=0 ;

-- new query

CREATE TABLE IF NOT EXISTS `tbl_vechicle_types` (
  `vechicle_type_id` int(11) NOT NULL AUTO_INCREMENT,
  `vechicle_type_name` varchar(40) DEFAULT NULL,
  `vechicle_image` varchar(64) NOT NULL,
  `category_id` int(14) NOT NULL,
  `vechicle_createdate` varchar(40) DEFAULT NULL,
  `isactive` int(2) NOT NULL,
  PRIMARY KEY (`vechicle_type_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=0 ;

-- new query

CREATE TABLE IF NOT EXISTS `tbl_vehicle` (
  `vechicle_id` int(11) NOT NULL AUTO_INCREMENT,
  `vechicle_type_id` int(11) DEFAULT NULL,
  `vechicle_number` varchar(40) DEFAULT NULL,
  `vechicle_logo` varchar(50) NOT NULL,
  `vechiclecomfort` varchar(255) NOT NULL,
  `user_id` int(12) NOT NULL,
  `vechicle_createdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`vechicle_id`),
  KEY `tbl_vechicle_types_tbl_vehicle` (`vechicle_type_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=0 ;

-- new query

CREATE TABLE IF NOT EXISTS `tbl_widgets` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `widget_name` varchar(255) NOT NULL,
  `widget_link` text NOT NULL,
  `widget_script` text NOT NULL,
  `widget_flag` int(2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

-- new query

INSERT INTO `pages` (`id`, `parent_id`, `title`, `menu_title`, `slug`, `route_id`, `content`, `sequence`, `seo_title`, `meta`, `url`, `new_window`) VALUES
(1, 0, 'Blog', 'Blog', 'blog', 1, '<p>&lt;h1&gt;Blogs&lt;/h1&gt;&lt;br&gt;</p>\n\n<p>&lt;p&gt; <strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.&lt;/p&gt;&lt;br&gt;</p>\n\n<p>&lt;p&gt;&quot;Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?&quot;&lt;/p&gt;&lt;br&gt;</p>\n\n<p>&lt;p&gt;&quot;At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat.&quot;&lt;/p&gt;&lt;br&gt;</p>\n\n<p>&nbsp;</p>', 0, '', '', NULL, 0),
(2, 0, 'Contact', 'Contact', 'contact', 3, '<p>&lt;h1&gt;Contact&lt;/h1&gt;&lt;br&gt;</p>\n\n<p>&lt;h2&gt;Please contact carpooling site .&lt;/h2&gt;&lt;br&gt;</p>\n\n<p>&lt;p&gt; Contact number : XXXXXXXXXXX&lt;/p&gt;&lt;br&gt;</p>\n\n<p>&lt;p&gt;&nbsp; E-Mail : XXX@gmail.com&lt;/p&gt;&lt;br&gt;</p>\n\n<p>&lt;p&gt; Help line: 123123123&lt;/p&gt;&lt;br&gt;</p>\n\n<p>&nbsp;</p>', 0, '', '', NULL, 0),
(3, 0, 'help_us', 'help_us', 'help_us', 5, '<p>&lt;h1&gt;Help us&lt;/h1&gt;&lt;br&gt;</p>\n\n<p>&lt;h3&gt;How do I register with Carpooling?&lt;/h3&gt;&lt;br&gt;<br />\n1. Find &lsquo;Register&rsquo; option and click on it.&lt;p&gt;&lt;/p&gt;&lt;br&gt;<br />\n2. You may either simply login with your Facebook or Google + ID, or create a user name and password.&lt;p&gt;&lt;/p&gt;&lt;br&gt;<br />\n3. To create a user id and password, fill in the shown details in the form, such as First name, Last name, Email ID, Mobile number, and Password, and click on &lsquo;Register&rsquo;.<br />\n&lt;p&gt;&lt;/p&gt;&lt;br&gt;<br />\n4. You will receive an activation email in your registered email id.<br />\n&lt;p&gt;&lt;/p&gt;&lt;br&gt;<br />\n5. Use the link in the email to activate and come to Login page.<br />\n&lt;p&gt;&lt;/p&gt;&lt;br&gt;</p>\n\n<p>&lt;h3&gt;How do I login to Carpooling?&lt;/h3&gt;&lt;br&gt;</p>\n\n<p>1. Find &lsquo;Login&rsquo; option and click on it.&lt;p&gt;&lt;/p&gt;&lt;br&gt;<br />\n2. Either login with your Facebook or Google + login id and password, or the User id and Password you created for joining the Carpooling. &lt;p&gt;&lt;/p&gt;&lt;br&gt;<br />\n3. Click on Sign in to login. &lt;p&gt;&lt;/p&gt;&lt;br&gt;</p>\n\n<p>&lt;h3&gt;How to edit my profile?&lt;/h3&gt;&lt;br&gt;</p>\n\n<p>1. After logging in, you will see your name on the right hand side.&lt;p&gt;&lt;/p&gt;&lt;br&gt;<br />\n2. Click on the dropdown adjacent to your name, and find the option &lsquo;Profile&rsquo; to click on it.<br />\n&lt;p&gt;&lt;/p&gt;&lt;br&gt;<br />\n3. You may provide your mobile number, email id, alternate email id, first name, last name, date of birth, and &lsquo;About you&rsquo;, and also upload a photo of yours, and click &lsquo;Save&rsquo;. &lt;p&gt;&lt;/p&gt;&lt;br&gt;</p>\n\n<p>&lt;h3&gt;How to add a new vehicle?&lt;/h3&gt;&lt;br&gt;</p>\n\n<p>1. After logging in, you will see your name on the right hand side.&lt;p&gt;&lt;/p&gt;&lt;br&gt;<br />\n2. Click on the dropdown adjacent to your name, and find the option &rsquo;My Vehicles&rsquo; to click on it.&lt;p&gt;&lt;/p&gt;&lt;br&gt;<br />\n3. You will be navigated to the page, where you will see the list of &lsquo;My Cars&rsquo; and an option &lsquo;Add a new car&rsquo;. &lt;p&gt;&lt;/p&gt;&lt;br&gt;<br />\n4. Click on the option &lsquo;Add a new car&rsquo;.&lt;p&gt;&lt;/p&gt;&lt;br&gt;<br />\n5. Provide details - Brand, Vehicle Number, Car type, and Comfort level, and &lsquo;Save&rsquo;. &lt;p&gt;&lt;/p&gt;&lt;br&gt;<br />\n6. You will find your car being added in the list &lsquo;My Cars&rsquo;.&lt;p&gt;&lt;/p&gt;&lt;br&gt;</p>\n\n<p>&lt;h3&gt;How to Post a trip for an added car?&lt;/h3&gt;&lt;br&gt;</p>\n\n<p>1. Find &lsquo;Post a trip&rsquo; and click on it.<br />\n&lt;p&gt;&lt;/p&gt;&lt;br&gt;<br />\n2. A form will open, where you will provide details such as, the vehicle, departure point, arrival point, route, frequency, trip type, departure time, number of available seats, phone number, and any comments. &lt;p&gt;&lt;/p&gt;&lt;br&gt;<br />\n3. Once you fill up the form, click &lsquo;Post&rsquo;.&lt;p&gt;&lt;/p&gt;&lt;br&gt;<br />\n4. You will be navigated to &lsquo;My trips&rsquo; where you will see your posted trip being added to the list of &lsquo;My Trips&rsquo;.<br />\n&lt;p&gt;&lt;/p&gt;&lt;br&gt;</p>\n\n<p>&lt;h3&gt;How to add a route?&lt;/h3&gt;&lt;br&gt;</p>\n\n<p>While posting a trip, after entering the departure point and arrival point, enter a point in the field &lsquo;Route&rsquo;, and click on the option &lsquo;Add Route&rsquo;. For example, if the trip is from Brussels, Belgium to Zurich, Switzerland, and if the car is travelling via Luxembourg, France, then, in the route field, enter Luxembourg and click on the option &lsquo;Add Route&rsquo;. &lt;p&gt;&lt;/p&gt;&lt;br&gt;</p>\n\n<p>&lt;h3&gt;How to view the trips I have posted?&lt;/h3&gt;&lt;br&gt;</p>\n\n<p>You can view both &lsquo;Upcoming trips&rsquo; as well as &lsquo;Past trips&rsquo;.<br />\nUpcoming trips will show the list of trips which are posted for the future dates from the current date.&lt;p&gt;&lt;/p&gt;&lt;br&gt;<br />\nPast trips are the list of trips which were posted during the past dates from the current date. &lt;p&gt;&lt;/p&gt;&lt;br&gt;</p>\n\n<p>1. Click on &lsquo;Upcoming trips&rsquo;.&lt;p&gt;&lt;/p&gt;&lt;br&gt;<br />\n2. From the list, click on a particular trip for which you want to view the details. &lt;p&gt;&lt;/p&gt;&lt;br&gt;<br />\n3. You will be able to see the details such as departure point, arrival point, and trip legs.<br />\nTrip legs are nothing but, those points, which come across a particular route.<br />\nFor example,<br />\nIf the Departure point is Brussels, Belgium and Arrival point is Zurich, Switzerland. The route is via Luxembourg, France, then the trip legs would be,<br />\nBrussels, Belgium to Luxembourg, France.<br />\nLuxembourg, France to Zurich, Switzerland. &lt;p&gt;&lt;/p&gt;&lt;br&gt;<br />\n4. Here, you may edit time, rate, and number of seats available, for each trip leg.&nbsp; &lt;p&gt;&lt;/p&gt;&lt;br&gt;<br />\n5. Click on &lsquo;Edit trip&rsquo; to save the changes. &lt;p&gt;&lt;/p&gt;&lt;br&gt;<br />\n6. Click on &lsquo;Delete the trip&rsquo; to delete the trip.&lt;p&gt;&lt;/p&gt;&lt;br&gt;</p>\n\n<p>&lt;h3&gt;Get Enquiry (for car riders to enquire about a trip.)&lt;/h3&gt;&lt;br&gt;</p>\n\n<p>1. When the traveller who sees a trip, clicks on &lsquo;Enquiry&rsquo; option.&nbsp; &lt;p&gt;&lt;/p&gt;&lt;br&gt;<br />\n2. The contact information such as User name, Email id, and Mobile number, gets shared between the person who has posted the trip, and the person who has viewed the trip and enquired about the trip. &lt;p&gt;&lt;/p&gt;&lt;br&gt;</p>\n\n<p>&lt;h3&gt;Forgot Password&lt;/h3&gt;&lt;br&gt;</p>\n\n<p>1. In the login page, enter your email id. &lt;p&gt;&lt;/p&gt;&lt;br&gt;<br />\n2. Click on &lsquo;Forgot Password&rsquo; option. &lt;p&gt;&lt;/p&gt;&lt;br&gt;<br />\n3. You will be navigated to a page where you should provide your email id. &lt;p&gt;&lt;/p&gt;&lt;br&gt;<br />\n4. You will receive an OTP (One Time Password) to your email id.<br />\n&nbsp;&lt;p&gt;&lt;/p&gt;&lt;br&gt;<br />\n5. Go to Login page, enter your email id and the OTP and click sign in.&nbsp; &lt;p&gt;&lt;/p&gt;&lt;br&gt;</p>\n\n<p>&lt;h3&gt;Set a new password&lt;/h3&gt;&lt;br&gt;</p>\n\n<p>1. Click on &lsquo;My Settings&rsquo;&lt;p&gt;&lt;/p&gt;&lt;br&gt;<br />\n2. Click on &lsquo;Change Password&rsquo;&lt;p&gt;&lt;/p&gt;&lt;br&gt;<br />\n3. Provide your old password or OTP, new password, and confirm password. &lt;p&gt;&lt;/p&gt;&lt;br&gt;<br />\n4. Click on &lsquo;Save&rsquo; and your password changes.&lt;p&gt;&lt;/p&gt;&lt;br&gt;</p>\n\n<p>&lt;h3&gt;Subscribe to Newsletter&lt;/h3&gt;&lt;br&gt;</p>\n\n<p>Your site visitors can subscribe to your newsletters to regularly hear about your updates. They can receive these updates on their email id. When a site visitor clicks on &lsquo;Subscribe to Newsletter&rsquo; and enters email id and submits. The email id gets stored in your Admin Control Panel. You can use the email ids which gets stored in your admin control panel for sending newsletters (updates).&nbsp; &lt;p&gt;&lt;/p&gt;&lt;br&gt;</p>\n\n<p>&lt;h3&gt;How to add a new currency?&lt;/h3&gt;&lt;br&gt;</p>\n\n<p>1. Go to &lsquo;Master&rsquo;.&lt;p&gt;&lt;/p&gt;&lt;br&gt;<br />\n2. Select &lsquo;Currency&rsquo;.&lt;p&gt;&lt;/p&gt;&lt;br&gt;<br />\n3. Click on &lsquo;Add Currency&rsquo; which you will find on right hand side.<br />\n&lt;p&gt;&lt;/p&gt;&lt;br&gt;<br />\n4. Provide Currency Name and Currency code. E.g. US Dollars and USD.&lt;p&gt;&lt;/p&gt;&lt;br&gt;<br />\n5. Click on &lsquo;Save&rsquo;.&lt;p&gt;&lt;/p&gt;&lt;br&gt;<br />\n6. Go to &lsquo;All Currencies&rsquo;.&lt;p&gt;&lt;/p&gt;&lt;br&gt;<br />\n7. You will see that the Currency added by you in the list, along with the code.&lt;p&gt;&lt;/p&gt;&lt;br&gt;<br />\n8. Go to &lsquo;Welcome Carpooling Script on the right hand side.<br />\n&lt;p&gt;&lt;/p&gt;&lt;br&gt;<br />\n9. Click on &lsquo;Edit Settings&rsquo;.<br />\n&lt;p&gt;&lt;/p&gt;&lt;br&gt;<br />\n10. You may select the name of the Currency name under &lsquo;Currency Name&rsquo;.<br />\n&lt;p&gt;&lt;/p&gt;&lt;br&gt;<br />\n11. You will see that the Currency code automatically gets entered.<br />\n&lt;p&gt;&lt;/p&gt;&lt;br&gt;<br />\n12. Click &lsquo;Save&rsquo;.<br />\n&lt;p&gt;&lt;/p&gt;&lt;br&gt;<br />\n13. On the home page, when the user finds a ride posted by you, the user will be able to see the ride posted by you, with the cost, shown in the currency you have added.<br />\n&lt;p&gt;&lt;/p&gt;&lt;br&gt;</p>\n\n<p>&lt;h3&gt;How to add a new language?&lt;/h3&gt;&lt;br&gt;</p>\n\n<p>1. Login and Go to Admin Panel.<br />\n&lt;p&gt;&lt;/p&gt;&lt;br&gt;<br />\n2. Go to Masters.&lt;p&gt;&lt;/p&gt;&lt;br&gt;<br />\n3. Select the option &lsquo;Language&rsquo;.<br />\n&lt;p&gt;&lt;/p&gt;&lt;br&gt;<br />\n4. Create a new language by providing &lsquo;Language name&rsquo; and &lsquo;Language prefix&rsquo;. For example, for language French, prefix is FR.<br />\n&lt;p&gt;&lt;/p&gt;&lt;br&gt;<br />\n5. Click &lsquo;Submit&rsquo;.&lt;p&gt;&lt;/p&gt;&lt;br&gt;<br />\n6. In the list of &lsquo;All languages&rsquo; you will see the language you added, along with the prefix.&lt;p&gt;&lt;/p&gt;&lt;br&gt;<br />\n7. Go to &lsquo;Welcome Admin (your name), on the right hand side.<br />\n&lt;p&gt;&lt;/p&gt;&lt;br&gt;<br />\n8. Go to &lsquo;Edit Settings&rsquo;.&lt;p&gt;&lt;/p&gt;&lt;br&gt;<br />\n9. Go to language dropdown.<br />\n&lt;p&gt;&lt;/p&gt;&lt;br&gt;<br />\n10. Select the language you had added, and click &lsquo;Submit&rsquo;<br />\n&lt;p&gt;&lt;/p&gt;&lt;br&gt;<br />\n11. In the root folder, the language folder gets created.<br />\n&lt;p&gt;&lt;/p&gt;&lt;br&gt;<br />\n12. Go to the language folder, and edit the language. For example, change &ldquo;My trips&rdquo; to &lsquo;&rsquo;Mis Viajes&rsquo;&rsquo;.&lt;p&gt;&lt;/p&gt;&lt;br&gt;</p>', 0, '', '', NULL, 0),
(4, 0, 'Carpooling benefits', 'Carpooling benefits', 'carpooling-benefits', 36, '<p>&lt;h1&gt;Carpooling benefits&lt;/h1&gt;&lt;br&gt;</p>\n\n<p>&lt;h3&gt;Why Car Pooling?&lt;/h5&gt;&lt;br&gt;</p>\n\n<p>&lt;p&gt;Car Pooling or sharing a ride on the same vehicle with one or multiple people can be highly beneficial in various terms. You might be a college student, or the parent of a school going child, or a corporate professional. Who so ever you may be. If you are a daily commuter, spending a fortune of amount on your commute, then Car pooling or sharing a ride with others can provide you with several benefits. If you haven&#39;t still realized, you may simply go through these points that can tell you how Car pooling or ride sharing works.&lt;/p&gt;&lt;br&gt;</p>\n\n<p>&lt;h3&gt;It saves petrol&lt;/h5&gt;&lt;br&gt;</p>\n\n<p>&lt;p&gt;If you are a student travelling to college, you may share the same ride and costs of your commute with 3 or 4 others, depending on the number of other students your car can accommodate, and share the cost of travel among all of you. You can do this on a turn by turn basis. For example, you may decide among your fellow travellers on what days your vehicle can take you all to the college and on what day your fellow travellers&rsquo; cars can take you all on a ride to the college. Instead of travelling alone in your car, and bearing the cost of petrol all alone, think of this option and go for it. You will definitely see how much your monthly expenses would get reduced.&lt;/p&gt;&lt;br&gt;</p>\n\n<p>&lt;h3&gt;Hassle free travel&lt;/h5&gt;&lt;br&gt;</p>\n\n<p>&lt;p&gt;Are you a parent of a school student? Are you dropping off and picking up your child from school every day? Are you finding this very daunting? You can make it hassle free. Find out about other children, travelling to the same school or other schools nearby your child&#39;s schools. You may take turns with other parents and decide about the days on which you can drive all the children to school and the days on which they can do the same. &nbsp;&lt;/p&gt;&lt;br&gt;</p>\n\n<p>&lt;h3&gt;Save environment&lt;/h3&gt;&lt;br&gt;</p>\n\n<p>&lt;p&gt;Don&#39;t bring one vehicle exclusively for yourself on the road. By doing this you cannot even imagine how much of the harm you are causing to the environment. Share rides and reduce the number of vehicles on the road and save the environment. &nbsp;&lt;/p&gt;&lt;br&gt;</p>\n\n<p>&lt;h3&gt;Enjoy the companies of others&lt;/h3&gt;&lt;br&gt;</p>\n\n<p>&lt;p&gt;Are you a corporate professional leading a stressful life? Why don&#39;t you enjoy your travel time with a good company? Travel together, make friends and make your commute an enjoyable one. &nbsp;&lt;/p&gt;&lt;br&gt;</p>\n\n<p>&lt;p&gt;</p>\n\n<ul>\n	<li>\n	<p>So, do not travel alone. Ask your colleagues, who travel from the same locality of yours to the office and discuss with them about Car Pooling. &nbsp;&nbsp;</p>\n	</li>\n</ul>\n\n<p>&lt;/p&gt;</p>\n\n<p>&lt;p&gt;</p>\n\n<ul>\n	<li>\n	<p>Ask your college mates if you can join them in their ride to the college and give them an idea of how to save cost and bring down the monthly expenses. &nbsp;&nbsp;</p>\n	</li>\n</ul>\n\n<p>&lt;/p&gt;</p>\n\n<p>&lt;p&gt;</p>\n\n<ul>\n	<li>\n	<p>Ask other parents of children studying in the same school as your child and let them know about the hassle free travel to the school. &nbsp;&nbsp;</p>\n	</li>\n</ul>\n\n<p>&lt;/p&gt;&lt;br&gt;</p>\n\n<p>&lt;h4&gt;Go for Car Pooling today to reap the benefits of it!&lt;/h4&gt;</p>\n\n<p>&nbsp;</p>', 0, '', '', NULL, 0),
(5, 0, 'Terms and Conditions', 'Terms and Conditions', 'terms-and-conditions', 37, '<p>&lt;h1&gt;Terms and Conditions&lt;/h1&gt;&lt;br&gt;</p>\n\n<p>&lt;h3&gt;<strong>When you register on this Car-Pool Platform do be ensured that you are agreeing to these Terms and Conditions.&nbsp;</strong>&lt;/h3&gt;&lt;br&gt;</p>\n\n<p>&lt;p&gt;Kindly read these terms and conditions carefully before you start using the benefits of our Platform. If you do not agree to any of these mentioned Terms and Conditions, then, please do not create an account on this Platform and do not attempt to use this Platform. By using this Platform, you confirm that you completely agree to these terms and conditions.&nbsp;&lt;/p&gt;&lt;br&gt;</p>\n\n<p>&lt;p&gt;Please be sure that the Platform does not provide the facility of transportation to any party. It is entirely up to the individual users, both Car Owners and Passengers, to post, enquire and book transportation services which is scheduled through the use of this Car pooling Platform. The Platform provides information and a means to obtain transportation for and from third parties, but does not and does, not intend to, provide transportation services on its own to any of its registered users. The Platform shall not be responsible or liable for any transportation services provided by any user, or enquired by any user or booked by any user and expressly disclaims any liability with regard to any user&#39;s claims against the Platform in connection with such user&#39;s use of the Platform and/or services. By creating an account in the Platform and using its services, you agree that you are using those services at your own risk.&lt;/p&gt;&lt;br&gt;</p>\n\n<p>&lt;h3&gt;DISCLAIMER&lt;/h3&gt;&lt;br&gt;</p>\n\n<p>&lt;p&gt;Our Terms and Conditions may change from time to time, without prior notice. The page will be updated as and when. The users shall be bound to agree to any such changed Terms and Conditions by default.&nbsp;&lt;/p&gt;&lt;br&gt;</p>\n\n<p>&lt;p&gt;<strong>NOTHING stated in this document must be construed to be completely exhaustive or exclusive. The Company reserves the right to use any information in a manner materially different from what is stated here and such usage shall be notified to the respective User by a prior notice through any accepted form of communication.</strong>&lt;/p&gt;&lt;br&gt;</p>\n\n<p>&lt;h3&gt;DEFINITIONS&lt;/h3&gt;&lt;br&gt;</p>\n\n<p>&lt;p&gt;Car Pool or Car Sharing or Ride Sharing means sharing of the personal vehicle by the Individual with the Passenger for a pre-determined journey at a mutually agreed Cost Contribution.&lt;/p&gt;&lt;br&gt;</p>\n\n<p>&lt;p&gt;Car Pool Platform means an online Platform developed by the Carpooling Company, which facilitates Car Owners to offer rides and Passengers to enquire about the rides and also to find the most suitable ride and book such rides. &nbsp;&lt;/p&gt;&lt;br&gt;</p>\n\n<p>&lt;p&gt;Cost Contribution means amount of consideration payable by the Passenger to the Car owner towards the cost of the Trip.&lt;/p&gt;&lt;br&gt;</p>\n\n<p>&lt;p&gt;Company means the Car pooling Platform or such other legal entity as may be constituted from time to time.&lt;/p&gt;&lt;br&gt;</p>\n\n<p>&lt;p&gt;Enquiry means to enquire about a particular ride that is being offered by the Car Owner and the person, who enquires may not book all the rides he/she enquires and may book those rides that they find suitable for them.&nbsp;&lt;/p&gt;&lt;br&gt;</p>\n\n<p>&lt;p&gt;Passenger means an individual Member sharing ride with the car-owner and includes all other individuals who share the ride with the car-owner at mutually agreed Cost Contribution.&lt;/p&gt;&lt;br&gt;</p>\n\n<p>&lt;p&gt;Car-Owner means a Member who through the Company Platform offers to share a car journey with the Passenger in exchange for Cost Contribution.&lt;/p&gt;&lt;br&gt;</p>\n\n<p>&lt;p&gt;Member or User means an individual registered on the car-pool Platform and they can be either Car Owners or Passengers or both.&nbsp;&lt;/p&gt;&lt;br&gt;</p>\n\n<p>&lt;h3&gt;Terms for Use of the Services of Car Pooling Platform&lt;/h3&gt;&lt;br&gt;</p>\n\n<p>&lt;p&gt;You must be 18 years of age or older to use Car Pooling Platform. You may not use this Platform where it is prohibited. By using this Platform, you consent to have us provide your information to the other users of Car Pooling Platform, as described below, to help you find people to share your transportation. Car Pooling Platform verifies your provided email address with a registration confirmation code. If your email address is registered on Car Pooling Platform, it means that you or someone else with access to your email account has confirmed your trip information. By using this Platform you agree that Car Pooling Platform is not responsible for ascertaining who actually controls the email accounts used in our system. If another person has posted your personal information, such as address, phone#, email address, or other, on this Platform, then please contact us immediately and we will remove the offending information. There is nothing more we can do and we do not accept any liability whatsoever for this type of problem.&lt;/p&gt;&lt;br&gt;</p>\n\n<p>&lt;h3&gt;Safety&lt;/h3&gt;&lt;br&gt;</p>\n\n<p>&lt;p&gt;Car Pooling Platform provides a service that enables you to contact and meet new people who may have similar transportation needs. Car Pooling Platform cannot and does not ensure the lawful behaviour of the people exchanging information through its Platform. You take full responsibility for ensuring your personal safety when interacting with other people whom you meet through Car Pooling Platform. Although we have no specific qualifications to advise you on issues of personal safety, the following practices are suggested as examples and illustrations of actions you could take to ensure your personal safety:&nbsp;&lt;/p&gt;&lt;br&gt;</p>\n\n<p>&lt;p&gt;You do not have to disclose your actual home address, work address, or phone numbers, and you do not even have to disclose your permanent email address to other users of Car Pooling Platform. &nbsp;&lt;/p&gt;&lt;br&gt;</p>\n\n<p>&lt;p&gt;Your initial face-to-face contact with new people should be in a common, populated, public location.&lt;/p&gt;&lt;br&gt;</p>\n\n<p>&lt;p&gt;Record the driver&#39;s license and car registration information of the other person&#39;s car. Obtain a copy of the driver&rsquo;s insurance card or record the driver&rsquo;s automobile insurance carrier and policy information.&lt;/p&gt;&lt;br&gt;</p>\n\n<p>&lt;p&gt;Carry a mobile or cell phone while driving or being driven in case of an emergency.&lt;/p&gt;&lt;br&gt;</p>\n\n<p>&lt;p&gt;If you are the driver, record the personal information of your riders.&lt;/p&gt;&lt;br&gt;</p>\n\n<p>&lt;p&gt;Maybe you can take a few pictures of your carpool partners and their cars. Give this information to your friends or family.&lt;/p&gt;&lt;br&gt;</p>\n\n<p>&lt;h3&gt;Provide appropriate definition&lt;/h3&gt;&lt;br&gt;</p>\n\n<p>&lt;p&gt;Members agree and understand that the Platform does not undertake any verification to confirm the accuracy of any information provided by the Users on the Car-pool Platform or to a Car Owner or Passenger, as the case maybe. The Platform will not be liable to any Member in the event that any information provided by another Member is false, incomplete, inaccurate, misleading or fraudulent. All Members agree to comply with the Conditions and accept that their personal data may be processed in accordance with the Privacy Policy. The Company holds the right to use and reproduce any data obtained through the third party service provider on the Car-Pool Platform.&lt;/p&gt;&lt;br&gt;</p>\n\n<p>&nbsp;</p>\n\n<p>&lt;p&gt;Unless expressly agreed by the Platform, Members are limited to one user account per Member. No user account may be created on behalf of or in order to impersonate another person. The Platform reserves the right to block the user account of suspicious user and may report to the police of such suspicious activities of the individual.&lt;/p&gt;&lt;br&gt;</p>\n\n<p>&lt;h3&gt;No Commercial Activity&lt;/h3&gt;&lt;br&gt;</p>\n\n<p>&lt;p&gt;The Platform and the Services are strictly limited to providing a Service for Car Owners and Passengers to share the ride in a private capacity. The Services may not be used to offer or accept car sharing for hire or reward or for profit or in any commercial or professional context. The Services may be used only to offer or accept car sharing in exchange for sharing the cost of the Trip between the Car Owner and the Passenger.&lt;/p&gt;&lt;br&gt;</p>\n\n<p>&lt;p&gt;Car Owners agree not to obtain any hire or reward or make profit in any form, from any Trip. The Service and the Cost Contribution may only be used to discharge the Car Owner&rsquo;s costs and may not be used to generate any hiring charges or reward or profit in any form for the Car Owner. The Car Owner is not entitled to make profit by virtue of the amount of the Cost Contribution, the types of Trips offered by a Car Owner, the frequency of such Trips or the number of Passengers transported. This applies to all activities, arrangements and Services booked using the Platform and any additional services or activities which may be agreed between Car Owner and Passenger through the Platform.&lt;/p&gt;&lt;br&gt;</p>\n\n<p>&lt;p&gt;The Car Owner must not provide any additional services to the Passenger in exchange for hiring charges or any reward or for profit or otherwise (and the Passenger may not accept or ask for any such services) including (without limitation) package delivery, waiting time, additional drop offs and pick-ups and collecting additional Passengers (other than the Passenger).&lt;/p&gt;&lt;br&gt;</p>\n\n<p>&lt;p&gt;All Trips, collection points and destinations must be pre-agreed through the Platform between the Car Owner and Passenger. Car Owners may not collect any Passengers from any location which has not been pre-agreed with the Passenger through the Platform.&lt;/p&gt;&lt;br&gt;</p>\n\n<p>&lt;p&gt;Members are reminded that using the Services and offering Trips for hire or reward or in a commercial or professional capacity may invalidate a Car Owner&rsquo;s insurance and invite adverse legal actions by the road transport authorities. Car Pool Platform shall not be in for any loss or damage incurred by a Member as a result of any or breach by a Member of these Conditions including where any Car Owner (in breach of these terms) offers Services through the Platform in a professional or commercial capacity (thereby potentially invalidating their insurance) and breach of any agreement between the Car Owner and the Passenger. Any offering of Trips in violation of the Conditions shall be at the sole risk such Member and Car Pooling Platform shall have no liability towards Members for such violations.&lt;/p&gt;&lt;br&gt;</p>\n\n<p>&lt;h3&gt;Status of Car Pooling Platform &nbsp;&lt;/h3&gt;&lt;br&gt;</p>\n\n<p>&lt;p&gt;The Car Pooling Platform does not provide any transport services. The Platform serves the purpose of Communication among Members to transact with one another. Car Pooling Platform does not interfere with Trips, destinations or timings. The agreement for car sharing is between the Car Owner and the Passenger. Car Pooling Platform is not a party to any agreement or transaction between Members, nor is Car Pooling Platform is not liable in respect of any matter arising which relates to a booking between Members. Car Pooling Platform is not and will not act as an agent for any Member.&lt;/p&gt;&lt;br&gt;</p>\n\n<p>&lt;p&gt;Any breach of these Conditions will give rise to immediate suspension of such Member&rsquo;s User Account and they may be restricted from accessing any further Services.&lt;/p&gt;</p>\n\n<p>&lt;h3&gt;Obligations of Car Owners and Passengers&lt;/h3&gt;&lt;br&gt;</p>\n\n<p>&lt;h5&gt;Car Owner&rsquo;s obligations&lt;/h5&gt;&lt;br&gt;</p>\n\n<p>&lt;p&gt;The Car Owner undertakes to ensure good running condition of the Vehicle and that he/she has complied with all the registration and verification processes pertaining to the Vehicle before registering with Car Pooling Platform including but not limited to obtaining valid insurance policy, PUC (Pollution under Control) certificate.&lt;/p&gt;</p>\n\n<p>&lt;p&gt;The Car Owner undertakes to reach the agreed place on time with the Vehicle. In the event, the Giver is late by more than 15 minutes, and then Car Pooling Platform at its sole discretion may blacklist such Car Owner.&lt;/p&gt;&lt;br&gt;</p>\n\n<p>&lt;p&gt;The Car Owner undertakes to follow the rules and regulations specified under The Motor Vehicles Act. The Car Owner shall bear all loss or damages of all kind suffered by him/her due to violation of any rule or regulation specified under the said Act.&lt;/p&gt;&lt;br&gt;</p>\n\n<p>&lt;h5&gt;Passenger&rsquo;s obligations&lt;/h5&gt;&lt;br&gt;</p>\n\n<p>&lt;p&gt;The Passenger undertakes to reach the agreed place on time. In the event, the Passenger is late by more than 15 minutes, and then Car Pooling Platform at its sole discretion may blacklist such Passenger.&lt;/p&gt;&lt;br&gt;</p>\n\n<p>&lt;p&gt;The Passenger shall not litter the Vehicle and will maintain cleanliness of the Vehicle during the Trip. The Passenger will not create nuisance, in any manner, during the continuance of the Trip.&lt;/p&gt;&lt;br&gt;</p>\n\n<p>&lt;h3&gt;Member&rsquo;s Conduct&lt;/h3&gt;&lt;br&gt;</p>\n\n<p>&lt;p&gt;Every Member availing the Membership must ensure and is otherwise responsible for his/ her personal safety. No Member may transmit through any means any unlawful, harassing, libellous, abusive, threatening, harmful, obscene or otherwise objectionable speech or material. No Member will do anything or transmit any material that encourages conduct that could constitute a criminal offence, give rise to civil liability or otherwise violate any applicable law or regulation. We do not endorse or control objectionable or unlawful conduct or use of the Membership or any of its technology Platforms by Members. Under no circumstances will Car Pooling Platform be liable in any way for any Member conduct, including without limitation, for any loss or damage of any kind incurred by you as a result of such conduct or use of any User Content transmitted, uploaded, posted, e-mailed o otherwise made available via our Platform or through any technology Platform made available to Members/Application. Any financial transaction undertaken between Members is at their own risk.&lt;/p&gt;&lt;br&gt;</p>\n\n<p>&lt;p&gt;The Members undertake that the Vehicle used during the Trip is owned by the Giver or his family member or a close friend and is not in his possession by reason of fraud or theft. In no event, Car Pooling Platform shall be held responsible for any damages or losses suffered by the Members due to non-compliance of any registration or certification process including Challans, etc.&lt;/p&gt;&lt;br&gt;</p>\n\n<p>&lt;p&gt;The women Member hereby grants specific consent to travel with the male companions during the Trip at her own volition. Such woman Member undertakes that this consent has been granted at her own will and is free of any influence and/or coercion.&lt;/p&gt;&lt;br&gt;</p>\n\n<p>&lt;p&gt;The Members undertake that they themselves shall verify the ID documents and credentials of the other Member with whom they are commuting, in cases they feel any discrepancies in the documents or feel unsecured, it&rsquo;s the responsibility of that concerned member to report such discrepancies to the Car Pooling Platform and use panic button, also the member shall terminate the trip immediately. Under no circumstances will Car Pooling Platform be liable in any way for any such discrepancies, including without limitation, for any loss or damage of any kind incurred by due to ignorance of the Member on their part.&lt;/p&gt;&lt;br&gt;</p>\n\n<p>&lt;p&gt;Car Pooling Platform reserves the right to review or modify the Terms and Conditions of this Membership from time to time at our sole discretion with or without prior notice to the Member and such modification shall be effective immediately upon posting on the Platform. The most current version of the Terms and Conditions will always be available on the Car Pooling Platform and it is the Member&#39;s responsibility to review Terms and Conditions of this Membership periodically and make himself/ herself aware of any modifications. The Member&#39;s continued use of this Membership will be deemed to be his/her conclusive acceptance of the modified Terms and Conditions of the Membership.&lt;/p&gt;&lt;br&gt;</p>\n\n<p>&lt;p&gt;Pickup point will be mutually decided and agreed by the Giver and the Seeker(s) and member has to board the car from there only.&lt;/p&gt;&lt;br&gt;</p>\n\n<p>&lt;h3&gt;Security&lt;/h3&gt;&lt;br&gt;</p>\n\n<p>&lt;p&gt;In case the Member feels insecure during the Trip then such Member should immediately press the Panic button provided on the Mobile Application or should press the power button three times in case of Android Phone and the shortcut provided on IOS Phone. It shall be the responsibility of the Members to activate their GPS during the Trip.&lt;/p&gt;&lt;br&gt;</p>\n\n<p>&lt;h3&gt;INSURANCE&lt;/h3&gt;&lt;br&gt;</p>\n\n<p>&lt;p&gt;The Car Owner agrees and undertakes to take out and maintain a comprehensive insurance to cover third party liability, the occupants of the Vehicle and the Trip offered or booked through the Car Pooling Platform&lt;/p&gt;&lt;br&gt;</p>\n\n<p>&lt;p&gt;If the insurer repudiates or refuses to accept any claim arising during a Trip for any other reason, the Giver will be responsible for the financial consequences, losses and damages arising thereof and Car Pooling Platform will not be liable under any circumstances to the Giver/Seeker/any other person or authority.&lt;/p&gt;&lt;br&gt;</p>\n\n<p>&lt;h3&gt;MANAGEMENT OF DISPUTES BETWEEN MEMBERS&lt;/h3&gt;&lt;br&gt;</p>\n\n<p>&lt;p&gt;Car Pooling Platform may at its sole discretion provide its Members with an online Membership including Mobile Application for registration of disputes among Members. This Membership is non-binding. Car Pooling Platform is under no obligation to resolve disputes The Members will be required to notify any complaint w.r.t. other Members at least within 15 days from the date of completion of the Trip. Car Pooling Platform at its sole discretion may blacklist the Member in default.&lt;/p&gt;&lt;br&gt;</p>\n\n<p>&lt;h3&gt;LIMITATION OF LIABILITY&lt;/h3&gt;&lt;br&gt;</p>\n\n<p>&lt;p&gt;Access to and use of Car Pooling Platform&#39;s is provided to enable the Members to organize rideshares. As such, without limiting any rights that the Members may have under the Consumer Protection Act 1985 or any other Act / law in force at that time, to the fullest extent permitted by law agree that the Members are completely responsible for the operation of their carpools/car share. On becoming a Member with Car Pooling Platform, you acknowledge and agree to waive any and all rights to, or claims for, damages (including special and consequential damages), costs, expenses, proprietary or personal injury (including death), or any other compensation of any kind whatsoever against the Car Pooling Platform and Car Pooling Platform&#39;s partners, that arise directly or indirectly with respect to Members use and/or reliance on the information provided in the Platform or otherwise.&lt;/p&gt;&lt;br&gt;</p>\n\n<p>&lt;p&gt;Car Pooling Platform nor its suppliers shall be liable to the Members for any incidental, consequential, special, indirect or exemplary damages arising out of its Membership, software (firmware and applications), merchant links, licensed products and software, including lost profits or costs of cover, loss of use or business interruption or the like, regardless of whether the party was advised of the possibility of such damages. Notwithstanding anything to the contrary contained herein, Car Pooling Platform shall have no monetary liability to any Member for any cause (regardless of the form of action) under or relating to this agreement.&lt;/p&gt;&lt;br&gt;</p>\n\n<p>&lt;h3&gt;EXCLUSION OF WARRANTIES&lt;/h3&gt;&lt;br&gt;</p>\n\n<p>&lt;p&gt;Members acknowledge and agree that Car Pooling Platform will be using the information provided in the Platform at Member&rsquo;s own risk and that Car Pooling Platform and the Directors are in no way responsible, and provide no warranty (express or implied) and / or guaranty of any kind with respect to, the information provided herein. Members acknowledge and agree that it is the responsibility of the Members to select the carpool co-participants who are most appropriate for their needs.&lt;/p&gt;&lt;br&gt;</p>\n\n<p>&lt;p&gt;The Membership, software (firmware and applications), merchant links, licensed products and software are provided on an &quot;as is&quot; and &quot;with all faults&quot; basis and Car Pooling Platform and its suppliers expressly disclaim all warranties, express or implied, including but not limited to, the implied warranties of non-infringement, merchantability, satisfactory quality, accuracy, title and fitness for a particular purpose. No oral or written advice or information provided by Car Pooling Platform or any of its agents, employees or third party providers shall create a warranty, and the Member is not entitled to rely on any such advice or information. This disclaimer of warranties is an essential condition of the agreement.&lt;/p&gt;&lt;br&gt;</p>\n\n<p>&lt;h3&gt;GENERAL TERMS&lt;/h3&gt;&lt;br&gt;</p>\n\n<p>&lt;h5&gt;Intellectual Property&lt;/h5&gt;&lt;br&gt;</p>\n\n<p>&lt;p&gt;Members acknowledge and agree that the statutory and other proprietary rights in respect of patents, designs, copyright, trademarks, trade secrets, processes, formulae, systems, drawings, data, specifications, documents, and other like rights relating to the Membership or displayed or referred to on the Car Pooling Platform are owned by the Company or in some cases third parties. The Member must not reproduce copy, transmit, adapt, publish or communicate or otherwise exercise the intellectual property rights in the whole or any part of the material contained on the Car Pooling Platform except with the prior written consent of Car Pooling Platform.&lt;/p&gt;&lt;br&gt;</p>\n\n<p>&lt;h5&gt;Privacy&lt;/h5&gt;&lt;br&gt;</p>\n\n<p>&lt;p&gt;Car Pooling Platform is committed to protecting and safeguarding Member&rsquo;s privacy. This Privacy Policy describes how Car Pooling Platform may use the personal information collected in the process of registration and with whom it may be shared. This Privacy Policy also describes the measures taken to protect the security of the information as well as how Members can access, modify or delete their personal information at any time. It also explains how Members can object to the processing of the personal information or to receiving communications about Car Pooling Platform products and Membership and also those from third parties. However, as no data transmission over the internet can be guaranteed to be completely secure, Car Pooling Platform cannot ensure or warrant the security of any information you transmit or receive through the Platform. These activities are conducted at Member&rsquo;s own risk.&lt;/p&gt;&lt;br&gt;</p>\n\n<p>&lt;h5&gt;What information is used by the Car Pooling Platform?&lt;/h5&gt;&lt;br&gt;</p>\n\n<p>&lt;p&gt;The information submitted by the subscriber during the registration process is entered into Car Pooling Platform&#39;s database. This information may be received through online registration or registration through Mobile Application. If the subscriber has agreed to be matched with potential carpool partners, he / she receive the subscriber&#39;s contact information online or through SMS or displayed on Mobile Application.&lt;/p&gt;&lt;br&gt;</p>\n\n<p>&lt;p&gt;Car Pooling Platform therefore reserves the right to share Member&rsquo;s personal information with other subscribers to find potential carpool partners/Seeker(s). We also reserve the right to share participation reports and programme statistics with our subscribing entities, e.g. your employer, tertiary institution or the local or central government for statistical reasons.&lt;/p&gt;</p>\n\n<p>&lt;h5&gt;Communications to Members&lt;/h5&gt;&lt;br&gt;</p>\n\n<p>&lt;p&gt;Car Pooling Platform may provide Members with Membership related announcements by any means, including email or SMS, concerning the Car Pool Membership, the Platform or contact Members regarding Member&rsquo;s customer Membership requests or questions. For example, all registered users will receive a welcoming email or SMS to confirm their registration. Car Pooling Platform may also contact Members for program evaluation and feedback purposes. These types of communications are necessary to serve Members, respond to Member&rsquo;s concerns and to provide the high level of Membership that Car Pooling Platform offers its Members.&lt;/p&gt;&lt;br&gt;</p>\n\n<p>&lt;h5&gt;Use of your Personal Information by the Car Pooling Platform&lt;/h5&gt;&lt;br&gt;</p>\n\n<p>&lt;p&gt;The information Members have provided may be used by Car Pooling Platform to create and deliver emails such as Car Pooling Platform&rsquo;s newsletters, surveys or other email messages containing product and event information or promotions. If at any time you decide that Members would not like to receive these emails, Members may select the &#39;Unsubscribe&#39; link on the email.&lt;/p&gt;&lt;br&gt;</p>\n\n<p>&lt;p&gt;Car Pooling Platform may also send text message/SMS alerts containing product and event information or promotions on Member&rsquo;s mobile phone2.Car Pooling Platform does not charge any fee for such text messages and emails from Members.&lt;/p&gt;&lt;br&gt;</p>\n\n<p>&lt;p&gt;The Members understand that they will receive promotional emails and SMS from various entities relating to products, food items, restaurants details, etc. If at any time you decide that Members would not like to receive these emails, Members may select the &#39;Unsubscribe&#39; link on the email.&lt;/p&gt;&lt;br&gt;</p>\n\n<p>&lt;h5&gt;Third Parties&lt;/h5&gt;&lt;br&gt;</p>\n\n<p>&lt;p&gt;Car Pooling Platform may retain other companies and individuals to perform functions on our behalf consistent with this Privacy Policy. Examples include data analysis firms, customer support specialists, email vendors, web-hosting companies and fulfilment companies (e.g., companies that coordinate mailings). Such third parties may be provided with access to personal information needed to perform their functions but may not use such information other than on Car Pooling Platform&rsquo;s behalf and in accordance with this Privacy Policy.&lt;/p&gt;</p>\n\n<p>&lt;h5&gt;Business Transfers&lt;/h5&gt;&lt;br&gt;</p>\n\n<p>&lt;p&gt;As Car Pooling Platform continue to develop our business, Car Pooling Platform might sell certain of our assets. In such transactions, user information, including personal information, is generally one of the transferred business assets. By registering with Car Pooling Platform you agree that your personal information data may be transferred to such parties in these circumstances.&lt;/p&gt;&lt;br&gt;</p>\n\n<p>&lt;h5&gt;Compliance with Law&lt;/h5&gt;&lt;br&gt;</p>\n\n<p>&lt;p&gt;Car Pooling Platform may disclose information that is necessary to comply with any applicable law, regulation, legal process or governmental request. In addition, we may disclose any information when it is necessary to prevent physical harm or financial loss or in connection with suspected or actual illegal activity.&lt;/p&gt;</p>\n\n<p>&lt;h5&gt;Carbon Emission Reduction Credits&lt;/h5&gt;&lt;br&gt;</p>\n\n<p>&lt;p&gt;The Member agree to assign, vest, transfer or otherwise confer upon Car Pooling Platform any carbon emission, reduction credits or other rights by any name granted in recognition of carbon emissions, now and in the future, including any proprietary rights introduced by central government of India, State or Local government, in furtherance of the Kyoto Protocol or other national or international agreements that establish carbon trading rights and systems. If Members are required to do any act or sign any document to give effect to the above clause, you agree to do such acts and sign such documents. If you fail or refuse to do such act or sign such document, you empower Car Pooling Platform to do such acts and sign such documents as your attorney.&lt;/p&gt;</p>\n\n<p>&lt;h3&gt;Miscellaneous&lt;/h3&gt;&lt;br&gt;</p>\n\n<p>&lt;p&gt;The Network in use for the GSM/GPRS service being provided to the Members by Car Pooling Platform is from a Telecom Operator and will depend on the services as provided by the Telecom Operator. The Company shall not be held responsible for any problem or disturbance in the network.&lt;/p&gt;&lt;br&gt;</p>\n\n<p>&lt;p&gt;Any illegal transaction by Debit/Credit card, AMEX, DINERS, VISA and Master Card by the Members shall not be the responsibility of Car Pooling Platform and shall be the sole liability of the Members. It would be the Car Pooling Platform&#39;s discretion to retain the Member or cancel his membership upon detection of such illegal transaction.&lt;/p&gt;&lt;br&gt;</p>\n\n<p>&lt;p&gt;The total Cumulative Liability of Car Pooling Platform under this terms and conditions on any account whether in contract or otherwise (A) Shall be limited to the last amount paid to Car Pooling Platform by the Member (B) In no event will Car Pooling Platform or its affiliates, employees, officers and directors have any liability regardless of the basis on which Member is entitled to claim damages (including breach, negligence, misrepresentation or under contract or tort claim), for any special, incidental, punitive, consequential or indirect damages, or for any economic consequential damages (including lost profits or savings), even if foreseeable or even if Car Pooling Platform has been advised of the possibility of such damages.&lt;/p&gt;&lt;br&gt;</p>\n\n<p>&lt;p&gt;Car Pooling Platform is not responsible to Members incurring any loss from hardware/software related problems.&lt;/p&gt;&lt;br&gt;</p>\n\n<p>&lt;p&gt;Maps, Navigation Application and its updating are sole responsibility of third party map provider. Car Pooling Platform nor its suppliers shall be liable to the Member for any incidental, consequential, special, indirect or exemplary damages arising out of the map-data, navigation software and its updates, including lost profits or costs of cover, loss of use or business interruption or the like, regardless of whether the party was advised of the possibility of such damages. Notwithstanding anything to the contrary contained herein, Car Pooling Platform shall have no monetary liability to&nbsp;the Member for any cause (regardless of the form of action) under or relating to this agreement. The Member acknowledges that the use of the Licensed Map Products with a non-licensed map may result in increased variance between the location displayed on the map and ground truth location. The Member shall not provide display or allow access to the actual numerical latitude and longitude coordinates. The Member shall not use the Value Added Product to create (or assist in the creation of) a digital map database. A &quot;digital map database&quot; means a database of geospatial data containing the following information and attributes: (x) road geometry and street names; or (y) routing attributes that enable turn-by-turn navigation on such road geometry; or (z) latitude and longitude of individual addresses and house number ranges. The Member shall not use the Value Added Product to provide competitive information about Map provider or its products to third parties.&lt;/p&gt;&lt;br&gt;</p>\n\n<p>&lt;p&gt;Services/Products offered by third parties are their responsibility. Car Pooling Platform is not responsible for its quality, warranties, after sales service, parts etc.&lt;/p&gt;&lt;br&gt;</p>\n\n<p>&lt;p&gt;Car Pooling Platform is not responsible for any Member/ third party claims for road issues related to hardware/ software.&lt;/p&gt;&lt;br&gt;</p>\n\n<p>&lt;p&gt;Car Pooling Platform is not responsible for any government/ transport department claims to the car owner.&lt;/p&gt;&lt;br&gt;</p>\n\n<p>&lt;p&gt;All the differences/ disputes/ claims will be settled mutually and subject to New Delhi jurisdiction only.&lt;/p&gt;&lt;br&gt;</p>\n\n<p>&lt;h3&gt;Refund Policy&lt;/h3&gt;&lt;br&gt;</p>\n\n<p>&lt;p&gt;The Members undertake not to make any settlement of cost contribution amongst themselves, thereby by-passing the payment mode prescribed by the Car Pooling Platform. Any amount that the Car Pooling Platform charges from its Members for use of the Membership provided on the Platform is due immediately and is non-refundable once paid to the Car Pooling Platform. However, the credit balance available in the Member&rsquo;s account shall be refunded after adjustment of Car Pooling Platform charges on termination or withdrawal of the Membership. This policy shall apply at all times regardless of Member&rsquo;s decision to terminate/withdraw the account with the Car Pooling Platform. Car Pooling Platform&rsquo;s decision to terminate Member&rsquo;s account, and any disruption or interference with the use of carpool application or the Car Pooling Platform&#39;s Membership whether planned, accidental, intentional, or otherwise.&lt;/p&gt;&lt;br&gt;</p>\n\n<p>&lt;h3&gt;Arbitration&lt;/h3&gt;&lt;br&gt;</p>\n\n<p>&lt;p&gt;Members hereby agree that any and all disputes, claims, questions, or disagreements arising out of or in relation to these Terms and Conditions shall include, without limitation of the validity, interpretation, implementation, material breach or any alleged material breach of any term or condition of these Terms and Conditions, the Parties shall endeavour to settle such disputes amicably through discussion within a period of 30 days from the date of notice by either party of the dispute. Failure to which shall lead to Arbitration proceedings as specified under the law of arbitration applicable to the law of the country in which the Car Pooling business is carried out. Notice for the Arbitration shall be served within 30 days of failure of parties to settle the dispute amicably through discussion. The dispute(s) shall be referred to the arbitration of a Sole Arbitrator to be appointed by the Director(s) of the Car Pooling Platform. The award passed by the Sole Arbitrator&nbsp;shall be final and binding on the Parties. The proceedings shall be conducted in English language. Further, the notice served on the email ID of the Member(s) shall be deemed to be considered as valid service of the notice.&lt;/p&gt;&lt;br&gt;</p>\n\n<p>&lt;p&gt;&lt;/p&gt;</p>', 0, '', '', NULL, 0);

-- new query

INSERT INTO `routes` (`id`, `slug`, `route`) VALUES
(1, 'blog', 'pages/page/1'),
(2, 'contact', 'pages/page/2'),
(3, 'help_us', 'pages/page/3'),
(4, 'carpooling-benefits', 'pages/page/4'),
(5, 'terms-and-conditions', 'pages/page/5');

-- new query

INSERT INTO `settings` (`id`, `code`, `setting_key`, `setting`) VALUES
(1, 'payment_modules', 'cod', '0'),
(2, 'cod', 'enabled', '0'),
(3, 'shipping_modules', 'flatrate', '0'),
(4, 'flatrate', 'rate', ''),
(5, 'flatrate', 'enabled', '0');

-- new query

INSERT INTO `tbl_comport` (`comport_id`, `comport_level`, `comport_logo`, `is_active`) VALUES
(1, 'Chat', 'user1_comport_1479555551.png', 1),
(2, 'Smoke', 'user1_comport_1479555738.png', 1),
(3, 'Food', 'user1_comport_1479555798.png', 1),
(4, 'Show Phone Number', 'user1_comport_1479555914.png', 1),
(5, 'USB Charger', 'user1_comport_1479556115.png', 1),
(7, 'Air conditioner', 'user1_comport_1479556175.png', 1),
(8, 'Film on board', 'user1_comport_1479556279.png', 1),
(9, 'Wifi', 'user1_comport_1479556304.png', 1),
(10, 'Music', 'user1_comport_1479800305.png', 1);

-- new query

INSERT INTO `tbl_currency` (`currency_id`, `currency_name`, `currency_symbol`, `created_date`) VALUES
(1, 'Australian Dollar ', 'AUD', '2016-03-01 19:38:43'),
(2, 'Canadian Dollar', 'CAD', '2016-03-01 19:29:19'),
(3, 'Euro', 'EUR', '2016-03-01 19:30:29'),
(4, 'British Pound', 'GBP', '2016-03-01 19:30:52'),
(5, 'Japanese Yen', 'JPY', '2016-03-01 19:31:16'),
(6, 'US Dollar', 'USD', '2016-03-01 19:31:43'),
(7, 'New Zealand Dollar', 'NZD', '2016-03-01 19:32:15'),
(8, 'Swiss Franc', 'CHF', '2016-03-01 19:33:19'),
(9, 'Hong Kong Dollar', 'HKD', '2016-03-01 19:33:43'),
(10, 'Singapore Dollar', 'SGD', '2016-03-01 19:34:09'),
(11, 'Swedish Krona', 'SEK', '2016-03-01 19:34:31'),
(12, 'Danish Krone', 'DKK', '2016-03-01 19:35:04'),
(13, 'Polish Zloty', 'PLN', '2016-03-01 19:35:23'),
(14, 'Norwegian Krone', 'NOK', '2016-03-01 19:36:15'),
(15, 'Hungarian Forint', 'HUF', '2016-03-01 19:36:34'),
(16, 'Czech Koruna', 'CZK', '2016-03-01 19:37:26'),
(17, 'Israeli New Shekel', 'ILS', '2016-03-01 19:37:48'),
(18, 'Mexican Peso', 'MXN', '2016-03-01 19:38:10'),
(19, 'Brazilian Reals', 'BRL', '2016-03-01 19:38:43'),
(20, 'Malaysian Ringgit', 'MYR', '2016-03-01 19:39:03'),
(21, 'Philippine Peso', 'PHP', '2016-03-01 19:39:22'),
(22, 'New Taiwan Dollar', 'TWD', '2016-03-01 19:39:40'),
(23, 'Thai Baht', 'THB', '2016-03-01 19:40:00'),
(24, 'Turkish Lire', 'TRY', '2016-03-01 19:40:18'),
(25, 'Russian roubles', 'RUB', '2016-03-01 19:40:41');

-- new query

INSERT INTO `tbl_email_template` (`tplid`, `tplshortname`, `tplsubject`, `tplmessage`, `tplmailid`, `isactive`) VALUES
(1, 'Activate your {COMPANY_NAME} account', 'Activate your {COMPANY_NAME} account', '<p>Hello <strong>{NAME}</strong></p>\r\n\r\n<p>Thank you for registering with {COMPANY_NAME}</p>\r\n\r\n<p>Before we can complete your registration, we need to verify your e-mail address. Please click on the link below to complete your registration.</p>\r\n\r\n<p><a href="{SITE_PATH}user/access/{code}" target="_blank">{SITE_PATH}user/access/{code}</a></p>\r\n\r\n<p>If you have problems following the link, please copy and paste it into your browser to complete your registration.</p>\r\n\r\n<p>A request to create account was received from your {COMPANY_NAME} Account - {EMAIL} from the IP - {IP}</p>\r\n\r\n<p>Enjoy!<br />\r\n<strong>The {COMPANY_NAME} Team</strong><br />\r\n<br />\r\n<br />\r\nIf you have not initiated this request, send mail to {ADMIN_EMAIL}<br />\r\nIf you have any query please send mail to {ADMIN_EMAIL}<br />\r\nThis is an automated email, please don&#39;t reply.</p>', NULL, 1),
(2, '{COMPANY_NAME}:Password changed', '{COMPANY_NAME}:Reset password-{EMAIL}', '<p>A request to reset password was received from your Carpooling Account - {EMAIL}</p>\r\n\r\n<p>Your password has been reset to <strong> {PASSWORD} </strong></p>\r\n\r\n<p>Enjoy!<br />\r\n<strong>The Carpooling Script Team</strong><br />\r\n<br />\r\n<br />\r\nIf you have not initiated this request, send mail to care@carpoolingscript.com<br />\r\nIf you have any query please send mail to care@carpoolingscript.com<br />\r\nThis is an automated email, please don&#39;t reply.</p>', NULL, 1),
(3, 'Thank you for subscribe {COMPANY_NAME}', 'Thank you for subscribe {COMPANY_NAME}', '<p>Hello <strong>{EMAIL}</strong></p>\r\n\r\n<p>Thank you for subscribe with {COMPANY_NAME}</p>\r\n\r\n<p>You just subscribed to get updates from us. Your email ID is in our Subscribersâ€™ list now. Any future updates will be automatically intimated to you on this email ID. </p>\r\n\r\n<p>Enjoy!<br />\r\n<strong>The {COMPANY_NAME} Team</strong><br />\r\n<br />\r\n<br />\r\nIf you have not initiated this request, send mail to {ADMIN_EMAIL}<br />\r\nIf you have any query please send mail to {ADMIN_EMAIL}<br />\r\nThis is an automated email, please don&#39;t reply.</p>', NULL, 1),
(4, '{COMPANY_NAME}:Trip enquiry', '{COMPANY_NAME}:Trip enquiry', '<p>Hello <strong>{NAME}</strong></p>\r\n\r\n<p>Thank you for enquiry with {COMPANY_NAME} trips.</p>\r\n\r\n<p> Please you will wait for trip owner acceptance for this trip. </p> \r\n\r\n<p>{TRIP}</p>\r\n\r\n<p>A request to create account was received from your {COMPANY_NAME} Account - {EMAIL} from the IP - {IP}</p>\r\n\r\n<p>Enjoy!<br />\r\n<strong>The {COMPANY_NAME} Team</strong><br />\r\n<br />\r\n<br />\r\nIf you have not initiated this request, send mail to {ADMIN_EMAIL}<br />\r\nIf you have any query please send mail to {ADMIN_EMAIL}<br />\r\nThis is an automated email, please don&#39;t reply.</p>', NULL, 1),
(5, '{COMPANY_NAME}:Trip enquiry', '{COMPANY_NAME}:Trip enquiry', '<p>Hello <strong>{NAME}</strong></p>\r\n\r\n<p>Seems like a Passenger is interested in the trip you have posted. The Passenger has enquired about the trip. Here are the details about the Passenger. </p>\r\n\r\n<p>Traveller_name: <strong>{NAME}</strong></p>\r\n\r\n<p>Passanger_name: <strong>{PNAME}</strong></p>\r\n\r\n<p>Passanger_email: <strong>{PEMAIL}</strong></p>\r\n\r\n<p>Passanger_mobile: <strong>{PMOBILE}</strong></p>\r\n\r\n<p>You may choose to either accept or reject the enquiry. You may also contact the Passenger should you want to.</p>\r\n\r\n<p>Enjoy!<br />\r\n<strong>The</strong> <strong> {COMPANY_NAME} Team</strong><br />\r\n<br />\r\n&nbsp;</p>', NULL, 1),
(6, '{COMPANY_NAME}:Trip enquiry acceptance', '{COMPANY_NAME}:Trip enquiry acceptance', '<p>Hello <strong>{NAME}</strong></p>\r\n\r\n<p>Congratulations! Your trip enquiry has been accepted and the Driver is ready to take you along. Here are the details of the Driver. </p>\r\n\r\n<p>Passanger_name: <strong>{NAME}</strong></p>\r\n\r\n<p>Traveller_name: <strong>{TNAME}</strong></p>\r\n\r\n<p>Traveller_email: <strong>{TEMAIL}</strong></p>\r\n\r\n<p>Traveller_mobile: <strong>{TMOBILE}</strong></p>\r\n\r\n<p>You may contact the Driver for any questions regarding the trip. </p>\r\n\r\n<p>Enjoy!<br />\r\n<strong>The {COMPANY_NAME} Team</strong><br />\r\n<br />\r\n&nbsp;</p>', NULL, 1),
(7, '{COMPANY_NAME}:Trip enquiry rejection', '{COMPANY_NAME}:Trip enquiry rejection', '<p>Hello <strong>{NAME}</strong></p>\r\n\r\n<p>We regret to inform you that the trip you enquired about has been rejected by the Driver, who posted the trip. Alternatively, you may search for other trips through the link below: </p>\r\n\r\n<p>{LINK}</p>\r\n\r\n<p>Enjoy!<br />\r\n<strong>The</strong> <strong> {COMPANY_NAME} Team</strong><br />\r\n<br />\r\n&nbsp;</p>', NULL, 1),
(8, '{COMPANY_NAME}:Passanger questions', '{COMPANY_NAME}:Passanger questions', '<p>Hello <strong>{NAME}</strong></p>\r\n\r\n<p>Trip_owner_name: <strong>{NAME}</strong></p>\r\n\r\n<p>Passanger_name: <strong>{PNAME}</strong></p>\r\n\r\n<p>Passanger_email: <strong>{PEMAIL}</strong></p>\r\n\r\n<p>Passanger_questions: <strong>{PQUESTIONS}</strong></p>\r\n\r\n<p>Enjoy!<br />\r\n<strong>The</strong> <strong> {COMPANY_NAME} Team</strong><br />\r\n<br />\r\n&nbsp;</p>', NULL, 1),
(9, 'Trip feedback', 'Trip feedback', '<p>Hello <strong>{NAME}</strong></p>\r\n\r\n<p>You just received a feedback from the Passenger about the trip. Here are the details of the Passenger, who has given the feedback.</p>\r\n\r\n<p> Feedbacks </p>\r\n\r\n<p>{FEEDBACK}</p>\r\n\r\n<p>Enjoy!<br />\r\n<strong>The</strong> <strong> {COMPANY_NAME} Team</strong><br />\r\n<br />\r\n&nbsp;</p> ', NULL, 0),
(10, 'payment notification for car owner', 'Payment Notification {COMPANY_NAME}', '<p><strong>Dear {NAME},&nbsp;</strong></p>\r\n\r\n<p>Congratulations! A Rider just now made made a payment towards a trip posted by you.</p>\r\n\r\n<p>Vehicle Number&nbsp;- {VEHICLE_NUMBER}</p>\r\n\r\n<p>Trip Name - {TRIP_NAME}</p>\r\n\r\n<p>Trip Date - {TRIP_DATE}</p>\r\n\r\n<p>Amount&nbsp;- {AMOUNT}</p>\r\n\r\n<p>Regards,</p>\r\n\r\n<p><strong>The {COMPANY_NAME} Team</strong></p>', NULL, 1),
(11, 'payment notification for traveller', 'Payment Notification {COMPANY_NAME}', '<p><strong>Dear {NAME},</strong></p>\r\n\r\n<p>You just now made a successful payment towards a trip. Kindly find the Trip details and your Payment details below.&nbsp;</p>\r\n\r\n<p>Trip Name : &nbsp;{TRIP_NAME}</p>\r\n\r\n<p>Trip Date : {TRIP_DATE}</p>\r\n\r\n<p>TXN ID : {TXN_ID}</p>\r\n\r\n<p>Amount Paid: ${AMOUNT}</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Regards,</p>\r\n\r\n<p><strong>The {COMPANY_NAME} Team</strong></p>', NULL, 1),
(12, 'payment notification for admin', 'Payment Notification', '<p><strong>Dear Admin,</strong></p>\r\n\r\n<p>Just now a Rider paid a Car Owner for a trip. Kindly find the details of the Trip, Car owner, and the Rider. &nbsp;</p>\r\n\r\n<p><strong>Payment Information</strong></p>\r\n\r\n<p>Car Owner Name - {OWNER_NAME}</p>\r\n\r\n<p>Vehicle Number - {VEHICLE_NUMBER}</p>\r\n\r\n<p>Traveller Name : { TRAVELLER_NAME}</p>\r\n\r\n<p>Trip name : {TRIP_NAME}</p>\r\n\r\n<p>TXN ID : {TXN_ID}</p>\r\n\r\n<p>Amount paid: ${AMOUNT}</p>\r\n\r\n<p>Regards,</p>\r\n\r\n<p><strong>The {COMPANY_NAME} Team</strong></p>', NULL, 1);

-- new query

INSERT INTO `tbl_logo` (`id`, `name`) VALUES
(1, 'user1_logo_1442642482.png');

-- new query

INSERT INTO `tbl_payment` (`id`, `payment_type`, `payment_id`, `is_active`, `is_method`) VALUES
(1, 'paypal', 'test@test.com', 1, 2);


-- new query

INSERT INTO `carpooling`.`tbl_widgets` (`id`, `widget_name`, `widget_link`, `widget_script`, `widget_flag`) VALUES 
('1', 'Facebook', '<div class="fb-page" data-href="https://www.facebook.com/pages/Carpoolingscript/807705419319976?ref=aymt_homepage_panel" data-width="180" data-height="370" data-hide-cover="false" data-show-facepile="true" data-show-posts="true">\\r\\n      <div class="fb-xfbml-parse-ignore">\\r\\n      <blockquote cite="https://www.facebook.com/pages/Carpoolingscript/807705419319976?ref=aymt_homepage_panel">\\r\\n      <a href="https://www.facebook.com/pages/Carpoolingscript/807705419319976?ref=aymt_homepage_panel">Carpoolingscript</a>\\r\\n      </blockquote>\\r\\n      </div>\\r\\n      </div>', '<script>(function(d, s, id) {\\r\\n  var js, fjs = d.getElementsByTagName(s)[0];\\r\\n  if (d.getElementById(id)) return;\\r\\n  js = d.createElement(s); js.id = id;\\r\\n  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.3&appId=1618861935012037";\\r\\n  fjs.parentNode.insertBefore(js, fjs);\\r\\n}(document, ''''script'''', ''''facebook-jssdk''''));</script>', '1'),
('2', 'Twitter', '<a class="twitter-timeline" href="https://twitter.com/carpoolingscrip" data-widget-id="588318601595125760">Tweets by @carpoolingscrip</a>', '<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?''''http'''':''''https'''';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>', '1');

-- new query

INSERT INTO `tbl_language` (`language_id`, `language_name`, `language_code`, `created_date`) VALUES
(1, 'english', 'en', '2016-01-04 18:37:19'),
(2, 'German', 'ge', '2016-01-04 18:37:19'),
(3, 'Spanish', 'sp', '2016-11-22 00:00:00');

-- new query

INSERT INTO `tbl_country` (`country_id`, `country_name`, `country_code`, `currency`, `is_active`, `created_date`) VALUES
(1, 'India', 'IN', '', 1, NULL),
(2, 'France', 'FR', '', 1, NULL),
(3, 'united state', 'US', '', 1, NULL),
(4, 'Asian Countries', 'AF,AM,AZ,BH,BD,BT,BN,KH,CN,GE,HK,IN,ID,IR,IQ,IL,JP,JO,KZ,KW,KG,LA,LB,MO,MY,MV,MN,MM,NP,KP,OM,PK,PH,QA,SA,SG,KR,LK,SY,TW,TJ,TH,TR,TM,AE,UZ,VN,YE','',1,NULL);

-- new query

INSERT INTO `tbl_socialmedia` (`id`, `social_media`, `page_url`) VALUES
(1, 'Facebook', 'https://www.facebook.com/'),
(2, 'Twitter', 'https://twitter.com/'),
(3, 'Google+', 'https://plus.google.com/'),
(4, 'LinkedIn', 'https://www.linkedin.com/');

-- new query


