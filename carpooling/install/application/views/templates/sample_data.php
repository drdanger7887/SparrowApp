INSERT INTO `tbl_category` (`category_id`, `category_name`, `created_date`, `is_active`) VALUES
(1, 'Ford', '2016-11-23 13:49:15', 1),
(2, 'Ferrari', '2016-11-23 13:49:20', 1),
(3, 'Datsun', '2016-11-23 13:49:25', 1),
(4, 'Chevrolet', '2016-11-23 13:49:32', 1),
(5, 'BMW', '2016-11-23 13:49:37', 1),
(6, 'Bentley', '2016-11-23 13:49:42', 1),
(7, 'Jaguar', '2016-11-23 13:49:46', 1),
(8, 'Maruti Suzuki', '2016-11-23 13:49:51', 1),
(9, 'Mercedes-Benz', '2016-11-23 13:49:56', 1),
(10, 'Mitsubishi', '2016-11-23 13:50:13', 1);

-- new query

INSERT INTO `settings` (`id`, `code`, `setting_key`, `setting`) VALUES
(1, 'payment_modules', 'cod', '0'),
(2, 'cod', 'enabled', '0'),
(3, 'shipping_modules', 'flatrate', '0'),
(4, 'flatrate', 'rate', ''),
(5, 'flatrate', 'enabled', '0');

-- new query

INSERT INTO `tbl_radius` (`id`, `distance_from`, `distance_to`, `radius`) VALUES
(1, 11, 50, 5),
(2, 51, 100, 10),
(3, 101, 1000, 30),
(4, 0, 5, 1),
(5, 6, 10, 2);

-- new query

INSERT INTO `tbl_rating` (`id`, `rating_giver_id`, `rating_receiver_id`, `rating`, `created_date`) VALUES
(1, 1, 2, 5, NULL),
(2, 2, 1, 5, NULL),
(3, 3, 4, 5, NULL),
(4, 4, 3, 5, NULL),
(5, 5, 4, 5, NULL);

-- new query

INSERT INTO `tbl_trips` (`trip_id`, `trip_driver_id`, `trip_vehicle_id`, `trip_from_latlan`, `trip_to_latlan`, `source`, `destination`, `route`, `route_full_data`, `trip_routes_lat_lan`, `trip_routes`, `trip_return`, `trip_depature_time`, `trip_return_time`, `trip_journey_hours`, `trip_amenities`, `trip_frequncy`, `trip_avilable_seat`, `passenger_type`, `trip_rate_details`, `contact_person_name`, `contact_person_number`, `trip_comments`, `trip_user_id`, `trip_casual_date`, `trip_created_date`, `trip_status`, `trip_otp_status`) VALUES
(1, NULL, '1', '~13.0826802,80.27071840000008~', '~12.9715987,77.59456269999998~', 'Chennai, Tamil Nadu, India', 'Bengaluru, Karnataka, India', 'Vellore', '', '~13.0826802,80.27071840000008~,~12.9165167,79.13249859999996~,~12.9715987,77.59456269999998~', 'Chennai, Tamil Nadu, India~Vellore, Tamil Nadu, India~Bengaluru, Karnataka, India', 'no', '02:00:00', '05:39:00', NULL, NULL, '~0~,~1~,~2~,~3~,~4~,~5~,~6~', '4', '1', NULL, NULL, '9843323380', 'welcome', '1', '', '2016-12-01 11:32:45', 1, 0),
(2, NULL, '2', '~45.83361900000001,1.2611050000000432~', '~45.540503,1.520829899999967~', 'Limoges, France', 'Masseret, France', '', '', '~45.83361900000001,1.2611050000000432~,,~45.540503,1.520829899999967~', '', 'no', '06:15:00', '06:44:00', NULL, NULL, '~0~,~1~,~2~,~3~,~4~,~5~,~6~', '2', '1', NULL, NULL, '5879829871', 'welcome', '2', '', '2016-12-01 11:34:34', 1, 0),
(3, NULL, '3', '~50.6602548,10.373038400000041~', '~49.3063689,8.642769300000054~', 'Wasungen, Germany', 'Walldorf, Germany', '', '', '~50.6602548,10.373038400000041~,,~49.3063689,8.642769300000054~', '', 'no', '22:00:00', '01:00:00', NULL, NULL, '~0~,~1~,~2~,~3~,~4~,~5~,~6~', '3', '2', NULL, NULL, '9823437812', 'welcome', '3', '', '2016-12-01 11:35:42', 1, 0),
(4, NULL, '4', '~46.7541541,8.031689899999947~', '~46.6552082,8.289229699999964~', 'Brienz, Switzerland', 'Guttannen, Switzerland', '', '', '~46.7541541,8.031689899999947~,,~46.6552082,8.289229699999964~', '', 'no', '16:00:00', '01:00:00', NULL, NULL, '~0~,~1~,~2~,~3~,~4~,~5~,~6~', '2', '3', NULL, NULL, '0621021381', 'welcome', '4', '', '2016-12-01 11:37:01', 1, 0),
(5, NULL, '5', '~9.9312328,76.26730410000005~', '~19.0759837,72.87765590000004~', 'Cochin, Kerala, India', 'Mumbai, Maharashtra, India', 'Goa', '', '~9.9312328,76.26730410000005~,~15.2993265,74.12399600000003~,~19.0759837,72.87765590000004~', 'Cochin, Kerala, India~Goa, India~Mumbai, Maharashtra, India', 'no', '08:30:00', '06:30:00', NULL, NULL, '~0~,~1~,~2~,~3~,~4~,~5~,~6~', '2', '1', NULL, NULL, '4412235540', 'welcome', '5', '', '2016-12-01 11:39:28', 1, 0);


-- new query

INSERT INTO `tbl_t_trip_legs` (`trip_led_id`, `source_leg`, `source_latitude`, `source_longitude`, `destination_leg`, `destination_latitude`, `destination_longitude`, `expected_time`, `trip_return`, `route_rate`, `trip_id`, `created_time`) VALUES
(1, 'Chennai, Tamil Nadu, India', '13.0826802', '80.27071840000008', 'Vellore, Tamil Nadu, India', '12.9165167', '79.13249859999996', '2:00 am', 0, 1200, 1, '2016-12-01 07:02:45'),
(2, 'Chennai, Tamil Nadu, India', '13.0826802', '80.27071840000008', 'Bengaluru, Karnataka, India', '12.9715987', '77.59456269999998', '2:00 am', 0, 2000, 1, '2016-12-01 07:02:45'),
(3, 'Vellore, Tamil Nadu, India', '12.9165167', '79.13249859999996', 'Bengaluru, Karnataka, India', '12.9715987', '77.59456269999998', '03:34 am', 0, 1200, 1, '2016-12-01 07:02:45'),
(4, 'Limoges, France', '45.83361900000001', '1.2611050000000432', 'Masseret, France', '45.540503', '1.520829899999967', '6:15 am', 0, 1000, 2, '2016-12-01 07:04:34'),
(5, 'Wasungen, Germany', '50.6602548', '10.373038400000041', 'Walldorf, Germany', '49.3063689', '8.642769300000054', '10:00 pm', 0, 1000, 3, '2016-12-01 07:05:42'),
(6, 'Brienz, Switzerland', '46.7541541', '8.031689899999947', 'Guttannen, Switzerland', '46.6552082', '8.289229699999964', '4:00 pm', 0, 1000, 4, '2016-12-01 07:07:01'),
(7, 'Cochin, Kerala, India', '9.9312328', '76.26730410000005', 'Goa, India', '15.2993265', '74.12399600000003', '8:30 am', 0, 600, 5, '2016-12-01 07:09:28'),
(8, 'Cochin, Kerala, India', '9.9312328', '76.26730410000005', 'Mumbai, Maharashtra, India', '19.0759837', '72.87765590000004', '8:30 am', 0, 2000, 5, '2016-12-01 07:09:28'),
(9, 'Goa, India', '15.2993265', '74.12399600000003', 'Mumbai, Maharashtra, India', '19.0759837', '72.87765590000004', '16:31 pm', 0, 1000, 5, '2016-12-01 07:09:28');

-- new query

INSERT INTO `tbl_users` (`user_id`, `user_email`, `user_password`, `user_type`, `user_company_name`, `user_first_name`, `user_last_name`, `user_about_us`, `user_profile_img`, `user_mobile`, `user_secondary_phone`, `user_secondary_mail`, `user_company_id`, `user_url`, `user_street`, `user_city`, `postal_code`, `user_occupation`, `marital_status`, `isverified`, `comport_level`, `language`, `licence_number`, `show_number`, `send_sms`, `allowed_food`, `allowed_pet`, `allowed_smoke`, `allowed_chat`, `allowed_music`, `allowed_luggage`, `user_gender`, `user_country`, `user_dob`, `communication_mobile`, `communication_email`, `login_type`, `isactive`, `user_admin_status`, `user_created_date`, `user_lost_login`) VALUES
(1, 'demo1@gmail.com', '2c4c3891e2ac6958e9810a1e49c6705784fbfa1a', '0', NULL, 'demo1', 'user', 'good', 'user1_profile_1479986763.png', '9843323380', NULL, '', NULL, '', NULL, NULL, NULL, NULL, NULL, '0c13b1d8707279dd425f4bfbb27a1d4d15a71ee7', '1,3,4,5,7,8,9,10', '', 'TR8768987TY56', '1', '1', 0, 0, 0, 1, 1, 1, '0', NULL, '1992-08-16', 0, 0, 0, 1, 1, '2015-07-28 04:14:10', '2016-11-24 06:21:19'),
(2, 'demo2@gmail.com', '2c4c3891e2ac6958e9810a1e49c6705784fbfa1a', '0', NULL, 'demo2', 'user', 'good', 'user2_profile_1479986784.png', '5879829871', NULL, '', NULL, '', NULL, NULL, NULL, NULL, NULL, 'd1738e1ded9efeaa0243168e5edd4200d0dacdf9', '1,2,3,4,5,7,8,9,10', '', 'TP6878T546', '1', '1', 0, 0, 0, 0, 0, 2, '0', NULL, '1991-04-17', 0, 0, 0, 1, 1, '2015-05-18 07:38:37', '2016-11-24 06:40:59'),
(3, 'demo3@gmail.com', '2c4c3891e2ac6958e9810a1e49c6705784fbfa1a', '0', NULL, 'demo3', 'user', 'Good', 'user3_profile_1479986834.jpg', '9823437812', NULL, '', NULL, '', NULL, NULL, NULL, NULL, NULL, '4fca64bd4eb91127c24d1a6f426f23f6b41da451', '1,3,4,5,7,8,9,10', '', 'TU79879ER665', '1', '1', 0, 0, 0, 0, 0, 3, '0', NULL, '1990-08-17', 0, 0, 0, 1, 1, '2015-05-15 14:50:19', '2016-11-24 06:49:55'),
(4, 'demo4@gmail.com', '2c4c3891e2ac6958e9810a1e49c6705784fbfa1a', '0', NULL, 'demo4', 'user', 'Good', 'user4_profile_1479986874.png', '0621021381', NULL, '', NULL, '', NULL, NULL, NULL, NULL, NULL, '3068c3f22f0f2faa2a9dd0574d1853d85e3cc908', '1,2,3,4,5,7,8,9,10', '', 'TY887909TP5', '1', '1', 0, 0, 0, 0, 0, 1, '0', NULL, '1991-09-15', 0, 0, 0, 1, 1, '2015-04-28 16:45:02', '2016-11-24 06:58:07'),
(5, 'demo5@gmail.com', '2c4c3891e2ac6958e9810a1e49c6705784fbfa1a', '0', NULL, 'demo5', 'user', '', 'user5_profile_1479986905.jpg', '4412235540', NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, 'a17600ba72838997ba25083fe073220af8335d45', '0', '', '', '1', '1', 0, 0, 0, 0, 0, 0, NULL, NULL, '', 0, 0, 0, 1, 1, '2015-04-26 14:05:03', '2015-04-26 19:35:51'),
(6, 'demo6@gmail.com', '2c4c3891e2ac6958e9810a1e49c6705784fbfa1a', '0', NULL, 'demo6', 'user', '', 'user366_profile_1429276385.jpg', '0676545744', NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, '9b0dfc33ca3408258e3095711bc0968669e3cf69', '0', '', '', '1', '1', 0, 0, 0, 0, 0, 0, NULL, NULL, '', 0, 0, 0, 1, 1, '2015-04-23 01:42:37', '2015-04-23 07:13:29'),
(7, 'demo7@gmail.com', '2c4c3891e2ac6958e9810a1e49c6705784fbfa1a', '0', NULL, 'demo7', 'user', '', 'user366_profile_1429276385.jpg', '8807010762', NULL, '', NULL, '', NULL, NULL, NULL, NULL, NULL, '2e58b1fd7bbe341e6c50846ded1d69f0a41e323c', '0', '', '', '1', '1', 0, 0, 0, 0, 0, 0, '0', NULL, '1997-06-06', 0, 0, 0, 1, 1, '2015-04-17 07:41:01', '2015-04-17 13:12:02'),
(8, 'demo8@gmail.com', '2c4c3891e2ac6958e9810a1e49c6705784fbfa1a', '0', NULL, 'demo8', 'user', '', 'user_vehicle_1432820278.jpg', '8056559429', NULL, '', NULL, '', NULL, NULL, NULL, NULL, NULL, 'bc363af70a866224491d857093d7db0a4401d4b4', '0', '', '', '1', '1', 1, 0, 0, 1, 1, 0, '0', NULL, '1989-02-05', 0, 0, 0, 1, 1, '2015-04-17 06:25:25', '2015-05-28 13:04:04'),
(9, 'demo9@gmail.com', '2c4c3891e2ac6958e9810a1e49c6705784fbfa1a', '0', NULL, 'demo9', 'user', '', 'user1_vehicles_1460641144.jpg', '9823437812', NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, '27a45bb8879dd49e76f9187d41ae34b37c66019f', '0', '', '', '1', '1', 0, 0, 0, 0, 0, 0, NULL, NULL, '', 0, 0, 0, 1, 1, '2015-04-22 17:47:20', '2015-04-22 23:17:20'),
(10, 'demo10@gmail.com', '2c4c3891e2ac6958e9810a1e49c6705784fbfa1a', '0', NULL, 'demo10', 'user', 'i love my self', 'user_vehicle_1432793097.jpeg', '8526567723', '', '', NULL, '', '', '', 0, '', '0', '4b11224c4f4beeaba4a2d3450073b5ba7ad51a50', '10,11,12,13,14,15,16,17,18', '', '', '1', '1', 0, 1, 0, 0, 1, 1, '0', '', '1992-06-08', 0, 0, 0, 1, 1, '2015-01-29 12:10:51', '2016-11-23 13:27:32');

-- new query

INSERT INTO `tbl_vechicle_types` (`vechicle_type_id`, `vechicle_type_name`, `vechicle_image`, `category_id`, `vechicle_createdate`, `isactive`) VALUES
(1, 'Ford Continental GT', 'user1_vehicles_1479987242.png', 1, NULL, 1),
(2, 'Ferrari 5 Series', 'user1_vehicles_1479987212.jpg', 2, NULL, 1),
(3, 'Datsun X1', 'user1_vehicles_1479987189.jpg', 3, NULL, 1),
(4, 'Chevrolet Tavera Neo 3', 'user1_vehicles_1479987175.jpg', 4, NULL, 1),
(5, 'BMW X5', 'user1_vehicles_1479987160.jpg', 5, NULL, 1),
(6, 'Bentley TR67', 'user1_vehicles_1479987146.jpg', 6, NULL, 1),
(7, 'Jetta To98', 'user1_vehicles_1479987129.jpeg', 7, NULL, 1),
(8, 'Maruti Suzuki Hatchback', 'user1_vehicles_1479987111.jpg', 8, NULL, 1),
(9, 'Mercedes-Benz 78', 'user1_vehicles_1479987093.jpg', 9, NULL, 1),
(10, 'Mitsubishi Beat', 'user1_vehicles_1479987078.jpg', 10, NULL, 1);

-- new query

INSERT INTO `tbl_vehicle` (`vechicle_id`, `vechicle_type_id`, `vechicle_number`, `vechicle_logo`, `vechiclecomfort`, `user_id`, `vechicle_createdate`) VALUES
(1, 5, 'TG5765', 'user1_vehicle_1479965365.jpg', '4', 1, '2016-11-24 05:29:28'),
(2, 6, 'TV576567', 'user2_vehicle_1479966193.jpg', '3', 2, '2016-11-24 05:43:15'),
(3, 4, 'TR678687', 'user3_vehicle_1479966745.jpg', '2', 3, '2016-11-24 05:52:28'),
(4, 3, 'RT687R4', 'user4_vehicle_1479967294.jpg', '1', 4, '2016-11-24 06:01:37');

-- new query

INSERT INTO `tbl_testimonials` (`id`, `name`, `image`, `description`, `isactive`, `created_date`) VALUES
(1, 'carpoolingscript', 'user1_testimonials_1480597878.jpg', 'Carpooling is great, I have never again travelled alone to my city on weekends. And it''''s much cheaper way to travel', 1, '2016-12-01 13:11:20'),
(2, 'carpool', 'user1_testimonials_1480597918.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed ille, ut dixi, vitiose. Non laboro, inquit, de nomine. Duo Reges', 1, '2016-12-01 13:12:00'),
(3, 'carpooling', 'user1_testimonials_1480597952.jpeg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed ille, ut dixi, vitiose. Non laboro, inquit, de nomine. Duo Reges', 1, '2016-12-01 13:12:34');


-- new query








