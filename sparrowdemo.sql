-- phpMyAdmin SQL Dump
-- version 4.4.13.1
-- http://www.phpmyadmin.net
--
-- Хост: localhost
-- Час створення: Лис 07 2017 р., 19:24
-- Версія сервера: 5.6.26
-- Версія PHP: 5.5.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База даних: `sparrowdemo`
--

-- --------------------------------------------------------

--
-- Структура таблиці `pages`
--

CREATE TABLE IF NOT EXISTS `pages` (
  `id` int(11) NOT NULL,
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
  `new_window` tinyint(1) DEFAULT '0'
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Дамп даних таблиці `pages`
--

INSERT INTO `pages` (`id`, `parent_id`, `title`, `menu_title`, `slug`, `route_id`, `content`, `sequence`, `seo_title`, `meta`, `url`, `new_window`) VALUES
(1, 0, 'Blog', 'Blog', 'blog', 1, '<p>&lt;h1&gt;Blogs&lt;/h1&gt;&lt;br&gt;</p>\n\n<p>&lt;p&gt; <strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.&lt;/p&gt;&lt;br&gt;</p>\n\n<p>&lt;p&gt;&quot;Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?&quot;&lt;/p&gt;&lt;br&gt;</p>\n\n<p>&lt;p&gt;&quot;At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat.&quot;&lt;/p&gt;&lt;br&gt;</p>\n\n<p>&nbsp;</p>', 0, '', '', NULL, 0),
(2, 0, 'Contact', 'Contact', 'contact', 3, '<p>&lt;h1&gt;Contact&lt;/h1&gt;&lt;br&gt;</p>\n\n<p>&lt;h2&gt;Please contact carpooling site .&lt;/h2&gt;&lt;br&gt;</p>\n\n<p>&lt;p&gt; Contact number : XXXXXXXXXXX&lt;/p&gt;&lt;br&gt;</p>\n\n<p>&lt;p&gt;&nbsp; E-Mail : XXX@gmail.com&lt;/p&gt;&lt;br&gt;</p>\n\n<p>&lt;p&gt; Help line: 123123123&lt;/p&gt;&lt;br&gt;</p>\n\n<p>&nbsp;</p>', 0, '', '', NULL, 0),
(3, 0, 'help_us', 'help_us', 'help_us', 5, '<p>&lt;h1&gt;Help us&lt;/h1&gt;&lt;br&gt;</p>\n\n<p>&lt;h3&gt;How do I register with Carpooling?&lt;/h3&gt;&lt;br&gt;<br />\n1. Find &lsquo;Register&rsquo; option and click on it.&lt;p&gt;&lt;/p&gt;&lt;br&gt;<br />\n2. You may either simply login with your Facebook or Google + ID, or create a user name and password.&lt;p&gt;&lt;/p&gt;&lt;br&gt;<br />\n3. To create a user id and password, fill in the shown details in the form, such as First name, Last name, Email ID, Mobile number, and Password, and click on &lsquo;Register&rsquo;.<br />\n&lt;p&gt;&lt;/p&gt;&lt;br&gt;<br />\n4. You will receive an activation email in your registered email id.<br />\n&lt;p&gt;&lt;/p&gt;&lt;br&gt;<br />\n5. Use the link in the email to activate and come to Login page.<br />\n&lt;p&gt;&lt;/p&gt;&lt;br&gt;</p>\n\n<p>&lt;h3&gt;How do I login to Carpooling?&lt;/h3&gt;&lt;br&gt;</p>\n\n<p>1. Find &lsquo;Login&rsquo; option and click on it.&lt;p&gt;&lt;/p&gt;&lt;br&gt;<br />\n2. Either login with your Facebook or Google + login id and password, or the User id and Password you created for joining the Carpooling. &lt;p&gt;&lt;/p&gt;&lt;br&gt;<br />\n3. Click on Sign in to login. &lt;p&gt;&lt;/p&gt;&lt;br&gt;</p>\n\n<p>&lt;h3&gt;How to edit my profile?&lt;/h3&gt;&lt;br&gt;</p>\n\n<p>1. After logging in, you will see your name on the right hand side.&lt;p&gt;&lt;/p&gt;&lt;br&gt;<br />\n2. Click on the dropdown adjacent to your name, and find the option &lsquo;Profile&rsquo; to click on it.<br />\n&lt;p&gt;&lt;/p&gt;&lt;br&gt;<br />\n3. You may provide your mobile number, email id, alternate email id, first name, last name, date of birth, and &lsquo;About you&rsquo;, and also upload a photo of yours, and click &lsquo;Save&rsquo;. &lt;p&gt;&lt;/p&gt;&lt;br&gt;</p>\n\n<p>&lt;h3&gt;How to add a new vehicle?&lt;/h3&gt;&lt;br&gt;</p>\n\n<p>1. After logging in, you will see your name on the right hand side.&lt;p&gt;&lt;/p&gt;&lt;br&gt;<br />\n2. Click on the dropdown adjacent to your name, and find the option &rsquo;My Vehicles&rsquo; to click on it.&lt;p&gt;&lt;/p&gt;&lt;br&gt;<br />\n3. You will be navigated to the page, where you will see the list of &lsquo;My Cars&rsquo; and an option &lsquo;Add a new car&rsquo;. &lt;p&gt;&lt;/p&gt;&lt;br&gt;<br />\n4. Click on the option &lsquo;Add a new car&rsquo;.&lt;p&gt;&lt;/p&gt;&lt;br&gt;<br />\n5. Provide details - Brand, Vehicle Number, Car type, and Comfort level, and &lsquo;Save&rsquo;. &lt;p&gt;&lt;/p&gt;&lt;br&gt;<br />\n6. You will find your car being added in the list &lsquo;My Cars&rsquo;.&lt;p&gt;&lt;/p&gt;&lt;br&gt;</p>\n\n<p>&lt;h3&gt;How to Post a trip for an added car?&lt;/h3&gt;&lt;br&gt;</p>\n\n<p>1. Find &lsquo;Post a trip&rsquo; and click on it.<br />\n&lt;p&gt;&lt;/p&gt;&lt;br&gt;<br />\n2. A form will open, where you will provide details such as, the vehicle, departure point, arrival point, route, frequency, trip type, departure time, number of available seats, phone number, and any comments. &lt;p&gt;&lt;/p&gt;&lt;br&gt;<br />\n3. Once you fill up the form, click &lsquo;Post&rsquo;.&lt;p&gt;&lt;/p&gt;&lt;br&gt;<br />\n4. You will be navigated to &lsquo;My trips&rsquo; where you will see your posted trip being added to the list of &lsquo;My Trips&rsquo;.<br />\n&lt;p&gt;&lt;/p&gt;&lt;br&gt;</p>\n\n<p>&lt;h3&gt;How to add a route?&lt;/h3&gt;&lt;br&gt;</p>\n\n<p>While posting a trip, after entering the departure point and arrival point, enter a point in the field &lsquo;Route&rsquo;, and click on the option &lsquo;Add Route&rsquo;. For example, if the trip is from Brussels, Belgium to Zurich, Switzerland, and if the car is travelling via Luxembourg, France, then, in the route field, enter Luxembourg and click on the option &lsquo;Add Route&rsquo;. &lt;p&gt;&lt;/p&gt;&lt;br&gt;</p>\n\n<p>&lt;h3&gt;How to view the trips I have posted?&lt;/h3&gt;&lt;br&gt;</p>\n\n<p>You can view both &lsquo;Upcoming trips&rsquo; as well as &lsquo;Past trips&rsquo;.<br />\nUpcoming trips will show the list of trips which are posted for the future dates from the current date.&lt;p&gt;&lt;/p&gt;&lt;br&gt;<br />\nPast trips are the list of trips which were posted during the past dates from the current date. &lt;p&gt;&lt;/p&gt;&lt;br&gt;</p>\n\n<p>1. Click on &lsquo;Upcoming trips&rsquo;.&lt;p&gt;&lt;/p&gt;&lt;br&gt;<br />\n2. From the list, click on a particular trip for which you want to view the details. &lt;p&gt;&lt;/p&gt;&lt;br&gt;<br />\n3. You will be able to see the details such as departure point, arrival point, and trip legs.<br />\nTrip legs are nothing but, those points, which come across a particular route.<br />\nFor example,<br />\nIf the Departure point is Brussels, Belgium and Arrival point is Zurich, Switzerland. The route is via Luxembourg, France, then the trip legs would be,<br />\nBrussels, Belgium to Luxembourg, France.<br />\nLuxembourg, France to Zurich, Switzerland. &lt;p&gt;&lt;/p&gt;&lt;br&gt;<br />\n4. Here, you may edit time, rate, and number of seats available, for each trip leg.&nbsp; &lt;p&gt;&lt;/p&gt;&lt;br&gt;<br />\n5. Click on &lsquo;Edit trip&rsquo; to save the changes. &lt;p&gt;&lt;/p&gt;&lt;br&gt;<br />\n6. Click on &lsquo;Delete the trip&rsquo; to delete the trip.&lt;p&gt;&lt;/p&gt;&lt;br&gt;</p>\n\n<p>&lt;h3&gt;Get Enquiry (for car riders to enquire about a trip.)&lt;/h3&gt;&lt;br&gt;</p>\n\n<p>1. When the traveller who sees a trip, clicks on &lsquo;Enquiry&rsquo; option.&nbsp; &lt;p&gt;&lt;/p&gt;&lt;br&gt;<br />\n2. The contact information such as User name, Email id, and Mobile number, gets shared between the person who has posted the trip, and the person who has viewed the trip and enquired about the trip. &lt;p&gt;&lt;/p&gt;&lt;br&gt;</p>\n\n<p>&lt;h3&gt;Forgot Password&lt;/h3&gt;&lt;br&gt;</p>\n\n<p>1. In the login page, enter your email id. &lt;p&gt;&lt;/p&gt;&lt;br&gt;<br />\n2. Click on &lsquo;Forgot Password&rsquo; option. &lt;p&gt;&lt;/p&gt;&lt;br&gt;<br />\n3. You will be navigated to a page where you should provide your email id. &lt;p&gt;&lt;/p&gt;&lt;br&gt;<br />\n4. You will receive an OTP (One Time Password) to your email id.<br />\n&nbsp;&lt;p&gt;&lt;/p&gt;&lt;br&gt;<br />\n5. Go to Login page, enter your email id and the OTP and click sign in.&nbsp; &lt;p&gt;&lt;/p&gt;&lt;br&gt;</p>\n\n<p>&lt;h3&gt;Set a new password&lt;/h3&gt;&lt;br&gt;</p>\n\n<p>1. Click on &lsquo;My Settings&rsquo;&lt;p&gt;&lt;/p&gt;&lt;br&gt;<br />\n2. Click on &lsquo;Change Password&rsquo;&lt;p&gt;&lt;/p&gt;&lt;br&gt;<br />\n3. Provide your old password or OTP, new password, and confirm password. &lt;p&gt;&lt;/p&gt;&lt;br&gt;<br />\n4. Click on &lsquo;Save&rsquo; and your password changes.&lt;p&gt;&lt;/p&gt;&lt;br&gt;</p>\n\n<p>&lt;h3&gt;Subscribe to Newsletter&lt;/h3&gt;&lt;br&gt;</p>\n\n<p>Your site visitors can subscribe to your newsletters to regularly hear about your updates. They can receive these updates on their email id. When a site visitor clicks on &lsquo;Subscribe to Newsletter&rsquo; and enters email id and submits. The email id gets stored in your Admin Control Panel. You can use the email ids which gets stored in your admin control panel for sending newsletters (updates).&nbsp; &lt;p&gt;&lt;/p&gt;&lt;br&gt;</p>\n\n<p>&lt;h3&gt;How to add a new currency?&lt;/h3&gt;&lt;br&gt;</p>\n\n<p>1. Go to &lsquo;Master&rsquo;.&lt;p&gt;&lt;/p&gt;&lt;br&gt;<br />\n2. Select &lsquo;Currency&rsquo;.&lt;p&gt;&lt;/p&gt;&lt;br&gt;<br />\n3. Click on &lsquo;Add Currency&rsquo; which you will find on right hand side.<br />\n&lt;p&gt;&lt;/p&gt;&lt;br&gt;<br />\n4. Provide Currency Name and Currency code. E.g. US Dollars and USD.&lt;p&gt;&lt;/p&gt;&lt;br&gt;<br />\n5. Click on &lsquo;Save&rsquo;.&lt;p&gt;&lt;/p&gt;&lt;br&gt;<br />\n6. Go to &lsquo;All Currencies&rsquo;.&lt;p&gt;&lt;/p&gt;&lt;br&gt;<br />\n7. You will see that the Currency added by you in the list, along with the code.&lt;p&gt;&lt;/p&gt;&lt;br&gt;<br />\n8. Go to &lsquo;Welcome Carpooling Script on the right hand side.<br />\n&lt;p&gt;&lt;/p&gt;&lt;br&gt;<br />\n9. Click on &lsquo;Edit Settings&rsquo;.<br />\n&lt;p&gt;&lt;/p&gt;&lt;br&gt;<br />\n10. You may select the name of the Currency name under &lsquo;Currency Name&rsquo;.<br />\n&lt;p&gt;&lt;/p&gt;&lt;br&gt;<br />\n11. You will see that the Currency code automatically gets entered.<br />\n&lt;p&gt;&lt;/p&gt;&lt;br&gt;<br />\n12. Click &lsquo;Save&rsquo;.<br />\n&lt;p&gt;&lt;/p&gt;&lt;br&gt;<br />\n13. On the home page, when the user finds a ride posted by you, the user will be able to see the ride posted by you, with the cost, shown in the currency you have added.<br />\n&lt;p&gt;&lt;/p&gt;&lt;br&gt;</p>\n\n<p>&lt;h3&gt;How to add a new language?&lt;/h3&gt;&lt;br&gt;</p>\n\n<p>1. Login and Go to Admin Panel.<br />\n&lt;p&gt;&lt;/p&gt;&lt;br&gt;<br />\n2. Go to Masters.&lt;p&gt;&lt;/p&gt;&lt;br&gt;<br />\n3. Select the option &lsquo;Language&rsquo;.<br />\n&lt;p&gt;&lt;/p&gt;&lt;br&gt;<br />\n4. Create a new language by providing &lsquo;Language name&rsquo; and &lsquo;Language prefix&rsquo;. For example, for language French, prefix is FR.<br />\n&lt;p&gt;&lt;/p&gt;&lt;br&gt;<br />\n5. Click &lsquo;Submit&rsquo;.&lt;p&gt;&lt;/p&gt;&lt;br&gt;<br />\n6. In the list of &lsquo;All languages&rsquo; you will see the language you added, along with the prefix.&lt;p&gt;&lt;/p&gt;&lt;br&gt;<br />\n7. Go to &lsquo;Welcome Admin (your name), on the right hand side.<br />\n&lt;p&gt;&lt;/p&gt;&lt;br&gt;<br />\n8. Go to &lsquo;Edit Settings&rsquo;.&lt;p&gt;&lt;/p&gt;&lt;br&gt;<br />\n9. Go to language dropdown.<br />\n&lt;p&gt;&lt;/p&gt;&lt;br&gt;<br />\n10. Select the language you had added, and click &lsquo;Submit&rsquo;<br />\n&lt;p&gt;&lt;/p&gt;&lt;br&gt;<br />\n11. In the root folder, the language folder gets created.<br />\n&lt;p&gt;&lt;/p&gt;&lt;br&gt;<br />\n12. Go to the language folder, and edit the language. For example, change &ldquo;My trips&rdquo; to &lsquo;&rsquo;Mis Viajes&rsquo;&rsquo;.&lt;p&gt;&lt;/p&gt;&lt;br&gt;</p>', 0, '', '', NULL, 0),
(4, 0, 'Carpooling benefits', 'Carpooling benefits', 'carpooling-benefits', 36, '<p>&lt;h1&gt;Carpooling benefits&lt;/h1&gt;&lt;br&gt;</p>\n\n<p>&lt;h3&gt;Why Car Pooling?&lt;/h5&gt;&lt;br&gt;</p>\n\n<p>&lt;p&gt;Car Pooling or sharing a ride on the same vehicle with one or multiple people can be highly beneficial in various terms. You might be a college student, or the parent of a school going child, or a corporate professional. Who so ever you may be. If you are a daily commuter, spending a fortune of amount on your commute, then Car pooling or sharing a ride with others can provide you with several benefits. If you haven&#39;t still realized, you may simply go through these points that can tell you how Car pooling or ride sharing works.&lt;/p&gt;&lt;br&gt;</p>\n\n<p>&lt;h3&gt;It saves petrol&lt;/h5&gt;&lt;br&gt;</p>\n\n<p>&lt;p&gt;If you are a student travelling to college, you may share the same ride and costs of your commute with 3 or 4 others, depending on the number of other students your car can accommodate, and share the cost of travel among all of you. You can do this on a turn by turn basis. For example, you may decide among your fellow travellers on what days your vehicle can take you all to the college and on what day your fellow travellers&rsquo; cars can take you all on a ride to the college. Instead of travelling alone in your car, and bearing the cost of petrol all alone, think of this option and go for it. You will definitely see how much your monthly expenses would get reduced.&lt;/p&gt;&lt;br&gt;</p>\n\n<p>&lt;h3&gt;Hassle free travel&lt;/h5&gt;&lt;br&gt;</p>\n\n<p>&lt;p&gt;Are you a parent of a school student? Are you dropping off and picking up your child from school every day? Are you finding this very daunting? You can make it hassle free. Find out about other children, travelling to the same school or other schools nearby your child&#39;s schools. You may take turns with other parents and decide about the days on which you can drive all the children to school and the days on which they can do the same. &nbsp;&lt;/p&gt;&lt;br&gt;</p>\n\n<p>&lt;h3&gt;Save environment&lt;/h3&gt;&lt;br&gt;</p>\n\n<p>&lt;p&gt;Don&#39;t bring one vehicle exclusively for yourself on the road. By doing this you cannot even imagine how much of the harm you are causing to the environment. Share rides and reduce the number of vehicles on the road and save the environment. &nbsp;&lt;/p&gt;&lt;br&gt;</p>\n\n<p>&lt;h3&gt;Enjoy the companies of others&lt;/h3&gt;&lt;br&gt;</p>\n\n<p>&lt;p&gt;Are you a corporate professional leading a stressful life? Why don&#39;t you enjoy your travel time with a good company? Travel together, make friends and make your commute an enjoyable one. &nbsp;&lt;/p&gt;&lt;br&gt;</p>\n\n<p>&lt;p&gt;</p>\n\n<ul>\n	<li>\n	<p>So, do not travel alone. Ask your colleagues, who travel from the same locality of yours to the office and discuss with them about Car Pooling. &nbsp;&nbsp;</p>\n	</li>\n</ul>\n\n<p>&lt;/p&gt;</p>\n\n<p>&lt;p&gt;</p>\n\n<ul>\n	<li>\n	<p>Ask your college mates if you can join them in their ride to the college and give them an idea of how to save cost and bring down the monthly expenses. &nbsp;&nbsp;</p>\n	</li>\n</ul>\n\n<p>&lt;/p&gt;</p>\n\n<p>&lt;p&gt;</p>\n\n<ul>\n	<li>\n	<p>Ask other parents of children studying in the same school as your child and let them know about the hassle free travel to the school. &nbsp;&nbsp;</p>\n	</li>\n</ul>\n\n<p>&lt;/p&gt;&lt;br&gt;</p>\n\n<p>&lt;h4&gt;Go for Car Pooling today to reap the benefits of it!&lt;/h4&gt;</p>\n\n<p>&nbsp;</p>', 0, '', '', NULL, 0);
INSERT INTO `pages` (`id`, `parent_id`, `title`, `menu_title`, `slug`, `route_id`, `content`, `sequence`, `seo_title`, `meta`, `url`, `new_window`) VALUES
(5, 0, 'Terms and Conditions', 'Terms and Conditions', 'terms-and-conditions', 37, '<p>&lt;h1&gt;Terms and Conditions&lt;/h1&gt;&lt;br&gt;</p>\n\n<p>&lt;h3&gt;<strong>When you register on this Car-Pool Platform do be ensured that you are agreeing to these Terms and Conditions.&nbsp;</strong>&lt;/h3&gt;&lt;br&gt;</p>\n\n<p>&lt;p&gt;Kindly read these terms and conditions carefully before you start using the benefits of our Platform. If you do not agree to any of these mentioned Terms and Conditions, then, please do not create an account on this Platform and do not attempt to use this Platform. By using this Platform, you confirm that you completely agree to these terms and conditions.&nbsp;&lt;/p&gt;&lt;br&gt;</p>\n\n<p>&lt;p&gt;Please be sure that the Platform does not provide the facility of transportation to any party. It is entirely up to the individual users, both Car Owners and Passengers, to post, enquire and book transportation services which is scheduled through the use of this Car pooling Platform. The Platform provides information and a means to obtain transportation for and from third parties, but does not and does, not intend to, provide transportation services on its own to any of its registered users. The Platform shall not be responsible or liable for any transportation services provided by any user, or enquired by any user or booked by any user and expressly disclaims any liability with regard to any user&#39;s claims against the Platform in connection with such user&#39;s use of the Platform and/or services. By creating an account in the Platform and using its services, you agree that you are using those services at your own risk.&lt;/p&gt;&lt;br&gt;</p>\n\n<p>&lt;h3&gt;DISCLAIMER&lt;/h3&gt;&lt;br&gt;</p>\n\n<p>&lt;p&gt;Our Terms and Conditions may change from time to time, without prior notice. The page will be updated as and when. The users shall be bound to agree to any such changed Terms and Conditions by default.&nbsp;&lt;/p&gt;&lt;br&gt;</p>\n\n<p>&lt;p&gt;<strong>NOTHING stated in this document must be construed to be completely exhaustive or exclusive. The Company reserves the right to use any information in a manner materially different from what is stated here and such usage shall be notified to the respective User by a prior notice through any accepted form of communication.</strong>&lt;/p&gt;&lt;br&gt;</p>\n\n<p>&lt;h3&gt;DEFINITIONS&lt;/h3&gt;&lt;br&gt;</p>\n\n<p>&lt;p&gt;Car Pool or Car Sharing or Ride Sharing means sharing of the personal vehicle by the Individual with the Passenger for a pre-determined journey at a mutually agreed Cost Contribution.&lt;/p&gt;&lt;br&gt;</p>\n\n<p>&lt;p&gt;Car Pool Platform means an online Platform developed by the Carpooling Company, which facilitates Car Owners to offer rides and Passengers to enquire about the rides and also to find the most suitable ride and book such rides. &nbsp;&lt;/p&gt;&lt;br&gt;</p>\n\n<p>&lt;p&gt;Cost Contribution means amount of consideration payable by the Passenger to the Car owner towards the cost of the Trip.&lt;/p&gt;&lt;br&gt;</p>\n\n<p>&lt;p&gt;Company means the Car pooling Platform or such other legal entity as may be constituted from time to time.&lt;/p&gt;&lt;br&gt;</p>\n\n<p>&lt;p&gt;Enquiry means to enquire about a particular ride that is being offered by the Car Owner and the person, who enquires may not book all the rides he/she enquires and may book those rides that they find suitable for them.&nbsp;&lt;/p&gt;&lt;br&gt;</p>\n\n<p>&lt;p&gt;Passenger means an individual Member sharing ride with the car-owner and includes all other individuals who share the ride with the car-owner at mutually agreed Cost Contribution.&lt;/p&gt;&lt;br&gt;</p>\n\n<p>&lt;p&gt;Car-Owner means a Member who through the Company Platform offers to share a car journey with the Passenger in exchange for Cost Contribution.&lt;/p&gt;&lt;br&gt;</p>\n\n<p>&lt;p&gt;Member or User means an individual registered on the car-pool Platform and they can be either Car Owners or Passengers or both.&nbsp;&lt;/p&gt;&lt;br&gt;</p>\n\n<p>&lt;h3&gt;Terms for Use of the Services of Car Pooling Platform&lt;/h3&gt;&lt;br&gt;</p>\n\n<p>&lt;p&gt;You must be 18 years of age or older to use Car Pooling Platform. You may not use this Platform where it is prohibited. By using this Platform, you consent to have us provide your information to the other users of Car Pooling Platform, as described below, to help you find people to share your transportation. Car Pooling Platform verifies your provided email address with a registration confirmation code. If your email address is registered on Car Pooling Platform, it means that you or someone else with access to your email account has confirmed your trip information. By using this Platform you agree that Car Pooling Platform is not responsible for ascertaining who actually controls the email accounts used in our system. If another person has posted your personal information, such as address, phone#, email address, or other, on this Platform, then please contact us immediately and we will remove the offending information. There is nothing more we can do and we do not accept any liability whatsoever for this type of problem.&lt;/p&gt;&lt;br&gt;</p>\n\n<p>&lt;h3&gt;Safety&lt;/h3&gt;&lt;br&gt;</p>\n\n<p>&lt;p&gt;Car Pooling Platform provides a service that enables you to contact and meet new people who may have similar transportation needs. Car Pooling Platform cannot and does not ensure the lawful behaviour of the people exchanging information through its Platform. You take full responsibility for ensuring your personal safety when interacting with other people whom you meet through Car Pooling Platform. Although we have no specific qualifications to advise you on issues of personal safety, the following practices are suggested as examples and illustrations of actions you could take to ensure your personal safety:&nbsp;&lt;/p&gt;&lt;br&gt;</p>\n\n<p>&lt;p&gt;You do not have to disclose your actual home address, work address, or phone numbers, and you do not even have to disclose your permanent email address to other users of Car Pooling Platform. &nbsp;&lt;/p&gt;&lt;br&gt;</p>\n\n<p>&lt;p&gt;Your initial face-to-face contact with new people should be in a common, populated, public location.&lt;/p&gt;&lt;br&gt;</p>\n\n<p>&lt;p&gt;Record the driver&#39;s license and car registration information of the other person&#39;s car. Obtain a copy of the driver&rsquo;s insurance card or record the driver&rsquo;s automobile insurance carrier and policy information.&lt;/p&gt;&lt;br&gt;</p>\n\n<p>&lt;p&gt;Carry a mobile or cell phone while driving or being driven in case of an emergency.&lt;/p&gt;&lt;br&gt;</p>\n\n<p>&lt;p&gt;If you are the driver, record the personal information of your riders.&lt;/p&gt;&lt;br&gt;</p>\n\n<p>&lt;p&gt;Maybe you can take a few pictures of your carpool partners and their cars. Give this information to your friends or family.&lt;/p&gt;&lt;br&gt;</p>\n\n<p>&lt;h3&gt;Provide appropriate definition&lt;/h3&gt;&lt;br&gt;</p>\n\n<p>&lt;p&gt;Members agree and understand that the Platform does not undertake any verification to confirm the accuracy of any information provided by the Users on the Car-pool Platform or to a Car Owner or Passenger, as the case maybe. The Platform will not be liable to any Member in the event that any information provided by another Member is false, incomplete, inaccurate, misleading or fraudulent. All Members agree to comply with the Conditions and accept that their personal data may be processed in accordance with the Privacy Policy. The Company holds the right to use and reproduce any data obtained through the third party service provider on the Car-Pool Platform.&lt;/p&gt;&lt;br&gt;</p>\n\n<p>&nbsp;</p>\n\n<p>&lt;p&gt;Unless expressly agreed by the Platform, Members are limited to one user account per Member. No user account may be created on behalf of or in order to impersonate another person. The Platform reserves the right to block the user account of suspicious user and may report to the police of such suspicious activities of the individual.&lt;/p&gt;&lt;br&gt;</p>\n\n<p>&lt;h3&gt;No Commercial Activity&lt;/h3&gt;&lt;br&gt;</p>\n\n<p>&lt;p&gt;The Platform and the Services are strictly limited to providing a Service for Car Owners and Passengers to share the ride in a private capacity. The Services may not be used to offer or accept car sharing for hire or reward or for profit or in any commercial or professional context. The Services may be used only to offer or accept car sharing in exchange for sharing the cost of the Trip between the Car Owner and the Passenger.&lt;/p&gt;&lt;br&gt;</p>\n\n<p>&lt;p&gt;Car Owners agree not to obtain any hire or reward or make profit in any form, from any Trip. The Service and the Cost Contribution may only be used to discharge the Car Owner&rsquo;s costs and may not be used to generate any hiring charges or reward or profit in any form for the Car Owner. The Car Owner is not entitled to make profit by virtue of the amount of the Cost Contribution, the types of Trips offered by a Car Owner, the frequency of such Trips or the number of Passengers transported. This applies to all activities, arrangements and Services booked using the Platform and any additional services or activities which may be agreed between Car Owner and Passenger through the Platform.&lt;/p&gt;&lt;br&gt;</p>\n\n<p>&lt;p&gt;The Car Owner must not provide any additional services to the Passenger in exchange for hiring charges or any reward or for profit or otherwise (and the Passenger may not accept or ask for any such services) including (without limitation) package delivery, waiting time, additional drop offs and pick-ups and collecting additional Passengers (other than the Passenger).&lt;/p&gt;&lt;br&gt;</p>\n\n<p>&lt;p&gt;All Trips, collection points and destinations must be pre-agreed through the Platform between the Car Owner and Passenger. Car Owners may not collect any Passengers from any location which has not been pre-agreed with the Passenger through the Platform.&lt;/p&gt;&lt;br&gt;</p>\n\n<p>&lt;p&gt;Members are reminded that using the Services and offering Trips for hire or reward or in a commercial or professional capacity may invalidate a Car Owner&rsquo;s insurance and invite adverse legal actions by the road transport authorities. Car Pool Platform shall not be in for any loss or damage incurred by a Member as a result of any or breach by a Member of these Conditions including where any Car Owner (in breach of these terms) offers Services through the Platform in a professional or commercial capacity (thereby potentially invalidating their insurance) and breach of any agreement between the Car Owner and the Passenger. Any offering of Trips in violation of the Conditions shall be at the sole risk such Member and Car Pooling Platform shall have no liability towards Members for such violations.&lt;/p&gt;&lt;br&gt;</p>\n\n<p>&lt;h3&gt;Status of Car Pooling Platform &nbsp;&lt;/h3&gt;&lt;br&gt;</p>\n\n<p>&lt;p&gt;The Car Pooling Platform does not provide any transport services. The Platform serves the purpose of Communication among Members to transact with one another. Car Pooling Platform does not interfere with Trips, destinations or timings. The agreement for car sharing is between the Car Owner and the Passenger. Car Pooling Platform is not a party to any agreement or transaction between Members, nor is Car Pooling Platform is not liable in respect of any matter arising which relates to a booking between Members. Car Pooling Platform is not and will not act as an agent for any Member.&lt;/p&gt;&lt;br&gt;</p>\n\n<p>&lt;p&gt;Any breach of these Conditions will give rise to immediate suspension of such Member&rsquo;s User Account and they may be restricted from accessing any further Services.&lt;/p&gt;</p>\n\n<p>&lt;h3&gt;Obligations of Car Owners and Passengers&lt;/h3&gt;&lt;br&gt;</p>\n\n<p>&lt;h5&gt;Car Owner&rsquo;s obligations&lt;/h5&gt;&lt;br&gt;</p>\n\n<p>&lt;p&gt;The Car Owner undertakes to ensure good running condition of the Vehicle and that he/she has complied with all the registration and verification processes pertaining to the Vehicle before registering with Car Pooling Platform including but not limited to obtaining valid insurance policy, PUC (Pollution under Control) certificate.&lt;/p&gt;</p>\n\n<p>&lt;p&gt;The Car Owner undertakes to reach the agreed place on time with the Vehicle. In the event, the Giver is late by more than 15 minutes, and then Car Pooling Platform at its sole discretion may blacklist such Car Owner.&lt;/p&gt;&lt;br&gt;</p>\n\n<p>&lt;p&gt;The Car Owner undertakes to follow the rules and regulations specified under The Motor Vehicles Act. The Car Owner shall bear all loss or damages of all kind suffered by him/her due to violation of any rule or regulation specified under the said Act.&lt;/p&gt;&lt;br&gt;</p>\n\n<p>&lt;h5&gt;Passenger&rsquo;s obligations&lt;/h5&gt;&lt;br&gt;</p>\n\n<p>&lt;p&gt;The Passenger undertakes to reach the agreed place on time. In the event, the Passenger is late by more than 15 minutes, and then Car Pooling Platform at its sole discretion may blacklist such Passenger.&lt;/p&gt;&lt;br&gt;</p>\n\n<p>&lt;p&gt;The Passenger shall not litter the Vehicle and will maintain cleanliness of the Vehicle during the Trip. The Passenger will not create nuisance, in any manner, during the continuance of the Trip.&lt;/p&gt;&lt;br&gt;</p>\n\n<p>&lt;h3&gt;Member&rsquo;s Conduct&lt;/h3&gt;&lt;br&gt;</p>\n\n<p>&lt;p&gt;Every Member availing the Membership must ensure and is otherwise responsible for his/ her personal safety. No Member may transmit through any means any unlawful, harassing, libellous, abusive, threatening, harmful, obscene or otherwise objectionable speech or material. No Member will do anything or transmit any material that encourages conduct that could constitute a criminal offence, give rise to civil liability or otherwise violate any applicable law or regulation. We do not endorse or control objectionable or unlawful conduct or use of the Membership or any of its technology Platforms by Members. Under no circumstances will Car Pooling Platform be liable in any way for any Member conduct, including without limitation, for any loss or damage of any kind incurred by you as a result of such conduct or use of any User Content transmitted, uploaded, posted, e-mailed o otherwise made available via our Platform or through any technology Platform made available to Members/Application. Any financial transaction undertaken between Members is at their own risk.&lt;/p&gt;&lt;br&gt;</p>\n\n<p>&lt;p&gt;The Members undertake that the Vehicle used during the Trip is owned by the Giver or his family member or a close friend and is not in his possession by reason of fraud or theft. In no event, Car Pooling Platform shall be held responsible for any damages or losses suffered by the Members due to non-compliance of any registration or certification process including Challans, etc.&lt;/p&gt;&lt;br&gt;</p>\n\n<p>&lt;p&gt;The women Member hereby grants specific consent to travel with the male companions during the Trip at her own volition. Such woman Member undertakes that this consent has been granted at her own will and is free of any influence and/or coercion.&lt;/p&gt;&lt;br&gt;</p>\n\n<p>&lt;p&gt;The Members undertake that they themselves shall verify the ID documents and credentials of the other Member with whom they are commuting, in cases they feel any discrepancies in the documents or feel unsecured, it&rsquo;s the responsibility of that concerned member to report such discrepancies to the Car Pooling Platform and use panic button, also the member shall terminate the trip immediately. Under no circumstances will Car Pooling Platform be liable in any way for any such discrepancies, including without limitation, for any loss or damage of any kind incurred by due to ignorance of the Member on their part.&lt;/p&gt;&lt;br&gt;</p>\n\n<p>&lt;p&gt;Car Pooling Platform reserves the right to review or modify the Terms and Conditions of this Membership from time to time at our sole discretion with or without prior notice to the Member and such modification shall be effective immediately upon posting on the Platform. The most current version of the Terms and Conditions will always be available on the Car Pooling Platform and it is the Member&#39;s responsibility to review Terms and Conditions of this Membership periodically and make himself/ herself aware of any modifications. The Member&#39;s continued use of this Membership will be deemed to be his/her conclusive acceptance of the modified Terms and Conditions of the Membership.&lt;/p&gt;&lt;br&gt;</p>\n\n<p>&lt;p&gt;Pickup point will be mutually decided and agreed by the Giver and the Seeker(s) and member has to board the car from there only.&lt;/p&gt;&lt;br&gt;</p>\n\n<p>&lt;h3&gt;Security&lt;/h3&gt;&lt;br&gt;</p>\n\n<p>&lt;p&gt;In case the Member feels insecure during the Trip then such Member should immediately press the Panic button provided on the Mobile Application or should press the power button three times in case of Android Phone and the shortcut provided on IOS Phone. It shall be the responsibility of the Members to activate their GPS during the Trip.&lt;/p&gt;&lt;br&gt;</p>\n\n<p>&lt;h3&gt;INSURANCE&lt;/h3&gt;&lt;br&gt;</p>\n\n<p>&lt;p&gt;The Car Owner agrees and undertakes to take out and maintain a comprehensive insurance to cover third party liability, the occupants of the Vehicle and the Trip offered or booked through the Car Pooling Platform&lt;/p&gt;&lt;br&gt;</p>\n\n<p>&lt;p&gt;If the insurer repudiates or refuses to accept any claim arising during a Trip for any other reason, the Giver will be responsible for the financial consequences, losses and damages arising thereof and Car Pooling Platform will not be liable under any circumstances to the Giver/Seeker/any other person or authority.&lt;/p&gt;&lt;br&gt;</p>\n\n<p>&lt;h3&gt;MANAGEMENT OF DISPUTES BETWEEN MEMBERS&lt;/h3&gt;&lt;br&gt;</p>\n\n<p>&lt;p&gt;Car Pooling Platform may at its sole discretion provide its Members with an online Membership including Mobile Application for registration of disputes among Members. This Membership is non-binding. Car Pooling Platform is under no obligation to resolve disputes The Members will be required to notify any complaint w.r.t. other Members at least within 15 days from the date of completion of the Trip. Car Pooling Platform at its sole discretion may blacklist the Member in default.&lt;/p&gt;&lt;br&gt;</p>\n\n<p>&lt;h3&gt;LIMITATION OF LIABILITY&lt;/h3&gt;&lt;br&gt;</p>\n\n<p>&lt;p&gt;Access to and use of Car Pooling Platform&#39;s is provided to enable the Members to organize rideshares. As such, without limiting any rights that the Members may have under the Consumer Protection Act 1985 or any other Act / law in force at that time, to the fullest extent permitted by law agree that the Members are completely responsible for the operation of their carpools/car share. On becoming a Member with Car Pooling Platform, you acknowledge and agree to waive any and all rights to, or claims for, damages (including special and consequential damages), costs, expenses, proprietary or personal injury (including death), or any other compensation of any kind whatsoever against the Car Pooling Platform and Car Pooling Platform&#39;s partners, that arise directly or indirectly with respect to Members use and/or reliance on the information provided in the Platform or otherwise.&lt;/p&gt;&lt;br&gt;</p>\n\n<p>&lt;p&gt;Car Pooling Platform nor its suppliers shall be liable to the Members for any incidental, consequential, special, indirect or exemplary damages arising out of its Membership, software (firmware and applications), merchant links, licensed products and software, including lost profits or costs of cover, loss of use or business interruption or the like, regardless of whether the party was advised of the possibility of such damages. Notwithstanding anything to the contrary contained herein, Car Pooling Platform shall have no monetary liability to any Member for any cause (regardless of the form of action) under or relating to this agreement.&lt;/p&gt;&lt;br&gt;</p>\n\n<p>&lt;h3&gt;EXCLUSION OF WARRANTIES&lt;/h3&gt;&lt;br&gt;</p>\n\n<p>&lt;p&gt;Members acknowledge and agree that Car Pooling Platform will be using the information provided in the Platform at Member&rsquo;s own risk and that Car Pooling Platform and the Directors are in no way responsible, and provide no warranty (express or implied) and / or guaranty of any kind with respect to, the information provided herein. Members acknowledge and agree that it is the responsibility of the Members to select the carpool co-participants who are most appropriate for their needs.&lt;/p&gt;&lt;br&gt;</p>\n\n<p>&lt;p&gt;The Membership, software (firmware and applications), merchant links, licensed products and software are provided on an &quot;as is&quot; and &quot;with all faults&quot; basis and Car Pooling Platform and its suppliers expressly disclaim all warranties, express or implied, including but not limited to, the implied warranties of non-infringement, merchantability, satisfactory quality, accuracy, title and fitness for a particular purpose. No oral or written advice or information provided by Car Pooling Platform or any of its agents, employees or third party providers shall create a warranty, and the Member is not entitled to rely on any such advice or information. This disclaimer of warranties is an essential condition of the agreement.&lt;/p&gt;&lt;br&gt;</p>\n\n<p>&lt;h3&gt;GENERAL TERMS&lt;/h3&gt;&lt;br&gt;</p>\n\n<p>&lt;h5&gt;Intellectual Property&lt;/h5&gt;&lt;br&gt;</p>\n\n<p>&lt;p&gt;Members acknowledge and agree that the statutory and other proprietary rights in respect of patents, designs, copyright, trademarks, trade secrets, processes, formulae, systems, drawings, data, specifications, documents, and other like rights relating to the Membership or displayed or referred to on the Car Pooling Platform are owned by the Company or in some cases third parties. The Member must not reproduce copy, transmit, adapt, publish or communicate or otherwise exercise the intellectual property rights in the whole or any part of the material contained on the Car Pooling Platform except with the prior written consent of Car Pooling Platform.&lt;/p&gt;&lt;br&gt;</p>\n\n<p>&lt;h5&gt;Privacy&lt;/h5&gt;&lt;br&gt;</p>\n\n<p>&lt;p&gt;Car Pooling Platform is committed to protecting and safeguarding Member&rsquo;s privacy. This Privacy Policy describes how Car Pooling Platform may use the personal information collected in the process of registration and with whom it may be shared. This Privacy Policy also describes the measures taken to protect the security of the information as well as how Members can access, modify or delete their personal information at any time. It also explains how Members can object to the processing of the personal information or to receiving communications about Car Pooling Platform products and Membership and also those from third parties. However, as no data transmission over the internet can be guaranteed to be completely secure, Car Pooling Platform cannot ensure or warrant the security of any information you transmit or receive through the Platform. These activities are conducted at Member&rsquo;s own risk.&lt;/p&gt;&lt;br&gt;</p>\n\n<p>&lt;h5&gt;What information is used by the Car Pooling Platform?&lt;/h5&gt;&lt;br&gt;</p>\n\n<p>&lt;p&gt;The information submitted by the subscriber during the registration process is entered into Car Pooling Platform&#39;s database. This information may be received through online registration or registration through Mobile Application. If the subscriber has agreed to be matched with potential carpool partners, he / she receive the subscriber&#39;s contact information online or through SMS or displayed on Mobile Application.&lt;/p&gt;&lt;br&gt;</p>\n\n<p>&lt;p&gt;Car Pooling Platform therefore reserves the right to share Member&rsquo;s personal information with other subscribers to find potential carpool partners/Seeker(s). We also reserve the right to share participation reports and programme statistics with our subscribing entities, e.g. your employer, tertiary institution or the local or central government for statistical reasons.&lt;/p&gt;</p>\n\n<p>&lt;h5&gt;Communications to Members&lt;/h5&gt;&lt;br&gt;</p>\n\n<p>&lt;p&gt;Car Pooling Platform may provide Members with Membership related announcements by any means, including email or SMS, concerning the Car Pool Membership, the Platform or contact Members regarding Member&rsquo;s customer Membership requests or questions. For example, all registered users will receive a welcoming email or SMS to confirm their registration. Car Pooling Platform may also contact Members for program evaluation and feedback purposes. These types of communications are necessary to serve Members, respond to Member&rsquo;s concerns and to provide the high level of Membership that Car Pooling Platform offers its Members.&lt;/p&gt;&lt;br&gt;</p>\n\n<p>&lt;h5&gt;Use of your Personal Information by the Car Pooling Platform&lt;/h5&gt;&lt;br&gt;</p>\n\n<p>&lt;p&gt;The information Members have provided may be used by Car Pooling Platform to create and deliver emails such as Car Pooling Platform&rsquo;s newsletters, surveys or other email messages containing product and event information or promotions. If at any time you decide that Members would not like to receive these emails, Members may select the &#39;Unsubscribe&#39; link on the email.&lt;/p&gt;&lt;br&gt;</p>\n\n<p>&lt;p&gt;Car Pooling Platform may also send text message/SMS alerts containing product and event information or promotions on Member&rsquo;s mobile phone2.Car Pooling Platform does not charge any fee for such text messages and emails from Members.&lt;/p&gt;&lt;br&gt;</p>\n\n<p>&lt;p&gt;The Members understand that they will receive promotional emails and SMS from various entities relating to products, food items, restaurants details, etc. If at any time you decide that Members would not like to receive these emails, Members may select the &#39;Unsubscribe&#39; link on the email.&lt;/p&gt;&lt;br&gt;</p>\n\n<p>&lt;h5&gt;Third Parties&lt;/h5&gt;&lt;br&gt;</p>\n\n<p>&lt;p&gt;Car Pooling Platform may retain other companies and individuals to perform functions on our behalf consistent with this Privacy Policy. Examples include data analysis firms, customer support specialists, email vendors, web-hosting companies and fulfilment companies (e.g., companies that coordinate mailings). Such third parties may be provided with access to personal information needed to perform their functions but may not use such information other than on Car Pooling Platform&rsquo;s behalf and in accordance with this Privacy Policy.&lt;/p&gt;</p>\n\n<p>&lt;h5&gt;Business Transfers&lt;/h5&gt;&lt;br&gt;</p>\n\n<p>&lt;p&gt;As Car Pooling Platform continue to develop our business, Car Pooling Platform might sell certain of our assets. In such transactions, user information, including personal information, is generally one of the transferred business assets. By registering with Car Pooling Platform you agree that your personal information data may be transferred to such parties in these circumstances.&lt;/p&gt;&lt;br&gt;</p>\n\n<p>&lt;h5&gt;Compliance with Law&lt;/h5&gt;&lt;br&gt;</p>\n\n<p>&lt;p&gt;Car Pooling Platform may disclose information that is necessary to comply with any applicable law, regulation, legal process or governmental request. In addition, we may disclose any information when it is necessary to prevent physical harm or financial loss or in connection with suspected or actual illegal activity.&lt;/p&gt;</p>\n\n<p>&lt;h5&gt;Carbon Emission Reduction Credits&lt;/h5&gt;&lt;br&gt;</p>\n\n<p>&lt;p&gt;The Member agree to assign, vest, transfer or otherwise confer upon Car Pooling Platform any carbon emission, reduction credits or other rights by any name granted in recognition of carbon emissions, now and in the future, including any proprietary rights introduced by central government of India, State or Local government, in furtherance of the Kyoto Protocol or other national or international agreements that establish carbon trading rights and systems. If Members are required to do any act or sign any document to give effect to the above clause, you agree to do such acts and sign such documents. If you fail or refuse to do such act or sign such document, you empower Car Pooling Platform to do such acts and sign such documents as your attorney.&lt;/p&gt;</p>\n\n<p>&lt;h3&gt;Miscellaneous&lt;/h3&gt;&lt;br&gt;</p>\n\n<p>&lt;p&gt;The Network in use for the GSM/GPRS service being provided to the Members by Car Pooling Platform is from a Telecom Operator and will depend on the services as provided by the Telecom Operator. The Company shall not be held responsible for any problem or disturbance in the network.&lt;/p&gt;&lt;br&gt;</p>\n\n<p>&lt;p&gt;Any illegal transaction by Debit/Credit card, AMEX, DINERS, VISA and Master Card by the Members shall not be the responsibility of Car Pooling Platform and shall be the sole liability of the Members. It would be the Car Pooling Platform&#39;s discretion to retain the Member or cancel his membership upon detection of such illegal transaction.&lt;/p&gt;&lt;br&gt;</p>\n\n<p>&lt;p&gt;The total Cumulative Liability of Car Pooling Platform under this terms and conditions on any account whether in contract or otherwise (A) Shall be limited to the last amount paid to Car Pooling Platform by the Member (B) In no event will Car Pooling Platform or its affiliates, employees, officers and directors have any liability regardless of the basis on which Member is entitled to claim damages (including breach, negligence, misrepresentation or under contract or tort claim), for any special, incidental, punitive, consequential or indirect damages, or for any economic consequential damages (including lost profits or savings), even if foreseeable or even if Car Pooling Platform has been advised of the possibility of such damages.&lt;/p&gt;&lt;br&gt;</p>\n\n<p>&lt;p&gt;Car Pooling Platform is not responsible to Members incurring any loss from hardware/software related problems.&lt;/p&gt;&lt;br&gt;</p>\n\n<p>&lt;p&gt;Maps, Navigation Application and its updating are sole responsibility of third party map provider. Car Pooling Platform nor its suppliers shall be liable to the Member for any incidental, consequential, special, indirect or exemplary damages arising out of the map-data, navigation software and its updates, including lost profits or costs of cover, loss of use or business interruption or the like, regardless of whether the party was advised of the possibility of such damages. Notwithstanding anything to the contrary contained herein, Car Pooling Platform shall have no monetary liability to&nbsp;the Member for any cause (regardless of the form of action) under or relating to this agreement. The Member acknowledges that the use of the Licensed Map Products with a non-licensed map may result in increased variance between the location displayed on the map and ground truth location. The Member shall not provide display or allow access to the actual numerical latitude and longitude coordinates. The Member shall not use the Value Added Product to create (or assist in the creation of) a digital map database. A &quot;digital map database&quot; means a database of geospatial data containing the following information and attributes: (x) road geometry and street names; or (y) routing attributes that enable turn-by-turn navigation on such road geometry; or (z) latitude and longitude of individual addresses and house number ranges. The Member shall not use the Value Added Product to provide competitive information about Map provider or its products to third parties.&lt;/p&gt;&lt;br&gt;</p>\n\n<p>&lt;p&gt;Services/Products offered by third parties are their responsibility. Car Pooling Platform is not responsible for its quality, warranties, after sales service, parts etc.&lt;/p&gt;&lt;br&gt;</p>\n\n<p>&lt;p&gt;Car Pooling Platform is not responsible for any Member/ third party claims for road issues related to hardware/ software.&lt;/p&gt;&lt;br&gt;</p>\n\n<p>&lt;p&gt;Car Pooling Platform is not responsible for any government/ transport department claims to the car owner.&lt;/p&gt;&lt;br&gt;</p>\n\n<p>&lt;p&gt;All the differences/ disputes/ claims will be settled mutually and subject to New Delhi jurisdiction only.&lt;/p&gt;&lt;br&gt;</p>\n\n<p>&lt;h3&gt;Refund Policy&lt;/h3&gt;&lt;br&gt;</p>\n\n<p>&lt;p&gt;The Members undertake not to make any settlement of cost contribution amongst themselves, thereby by-passing the payment mode prescribed by the Car Pooling Platform. Any amount that the Car Pooling Platform charges from its Members for use of the Membership provided on the Platform is due immediately and is non-refundable once paid to the Car Pooling Platform. However, the credit balance available in the Member&rsquo;s account shall be refunded after adjustment of Car Pooling Platform charges on termination or withdrawal of the Membership. This policy shall apply at all times regardless of Member&rsquo;s decision to terminate/withdraw the account with the Car Pooling Platform. Car Pooling Platform&rsquo;s decision to terminate Member&rsquo;s account, and any disruption or interference with the use of carpool application or the Car Pooling Platform&#39;s Membership whether planned, accidental, intentional, or otherwise.&lt;/p&gt;&lt;br&gt;</p>\n\n<p>&lt;h3&gt;Arbitration&lt;/h3&gt;&lt;br&gt;</p>\n\n<p>&lt;p&gt;Members hereby agree that any and all disputes, claims, questions, or disagreements arising out of or in relation to these Terms and Conditions shall include, without limitation of the validity, interpretation, implementation, material breach or any alleged material breach of any term or condition of these Terms and Conditions, the Parties shall endeavour to settle such disputes amicably through discussion within a period of 30 days from the date of notice by either party of the dispute. Failure to which shall lead to Arbitration proceedings as specified under the law of arbitration applicable to the law of the country in which the Car Pooling business is carried out. Notice for the Arbitration shall be served within 30 days of failure of parties to settle the dispute amicably through discussion. The dispute(s) shall be referred to the arbitration of a Sole Arbitrator to be appointed by the Director(s) of the Car Pooling Platform. The award passed by the Sole Arbitrator&nbsp;shall be final and binding on the Parties. The proceedings shall be conducted in English language. Further, the notice served on the email ID of the Member(s) shall be deemed to be considered as valid service of the notice.&lt;/p&gt;&lt;br&gt;</p>\n\n<p>&lt;p&gt;&lt;/p&gt;</p>', 0, '', '', NULL, 0),
(6, 0, 'Test', 'Test', 'g_test', 6, '<p>test test</p>', 1, '', '', NULL, 0);

-- --------------------------------------------------------

--
-- Структура таблиці `routes`
--

CREATE TABLE IF NOT EXISTS `routes` (
  `id` int(11) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `route` varchar(32) DEFAULT NULL
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Дамп даних таблиці `routes`
--

INSERT INTO `routes` (`id`, `slug`, `route`) VALUES
(1, 'blog', 'pages/page/1'),
(2, 'contact', 'pages/page/2'),
(3, 'help_us', 'pages/page/3'),
(4, 'carpooling-benefits', 'pages/page/4'),
(5, 'terms-and-conditions', 'pages/page/5'),
(6, 'g_test', 'pages/page/6');

-- --------------------------------------------------------

--
-- Структура таблиці `sessions`
--

CREATE TABLE IF NOT EXISTS `sessions` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(45) NOT NULL,
  `user_agent` varchar(120) DEFAULT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп даних таблиці `sessions`
--

INSERT INTO `sessions` (`session_id`, `ip_address`, `user_agent`, `last_activity`, `user_data`) VALUES
('9a0af215a1cbcae2d52141bb641eba36', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/61.0.3163.100 Safari/537.36', 1506360280, 'a:1:{s:9:"user_data";s:0:"";}'),
('a6be307c9e49ce5afc3fc9d0035fdae9', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/61.0.3163.100 Safari/537.36', 1506360280, 'a:2:{s:9:"user_data";s:0:"";s:5:"admin";a:4:{s:2:"id";s:1:"1";s:4:"name";N;s:5:"email";s:8:"zz@zz.zz";s:6:"expire";i:1506349391;}}'),
('af15329bb41cf0ef039e70942ab44752', '::1', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:55.0) Gecko/20100101 Firefox/55.0', 1506356901, 'a:1:{s:9:"user_data";s:0:"";}'),
('348220f7cac0974b1615ac9dd18203f9', '::1', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:55.0) Gecko/20100101 Firefox/55.0', 1506356901, ''),
('990b87bcc1829a1f6d860cc4c0f15c53', '::1', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:55.0) Gecko/20100101 Firefox/55.0', 1506427589, 'a:1:{s:9:"user_data";s:0:"";}'),
('ef7cd4ed19ccaa85ac26d37b35eb23a3', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/61.0.3163.100 Safari/537.36', 1506404530, ''),
('2806804f91c272b99a98cf9972d284b0', '::1', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:55.0) Gecko/20100101 Firefox/55.0', 1506427589, ''),
('14d209e42a0be663e3059609938d9df1', '::1', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:55.0) Gecko/20100101 Firefox/55.0', 1506427589, ''),
('a95f38933d8d4f0327b416bd335830d6', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/61.0.3163.100 Safari/537.36', 1506404530, ''),
('9145f94b3a9ab29fd962c7cc008a4b34', '::1', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:55.0) Gecko/20100101 Firefox/55.0', 1506356902, ''),
('d401bff0f27caed55ad1036b285c8fd8', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/61.0.3163.100 Safari/537.36', 1506360281, 'a:2:{s:9:"user_data";s:0:"";s:7:"carpool";a:5:{s:10:"user_email";s:15:"demo1@gmail.com";s:6:"access";s:6:"travel";s:7:"user_id";s:1:"1";s:7:"trip_id";b:0;s:6:"expire";i:1506360984;}}'),
('6901504b272ddaac93c2537ec38738df', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/61.0.3163.100 Safari/537.36', 1506404530, ''),
('9ea5353fe76dc54fd67d2469ac3feb5c', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/61.0.3163.100 Safari/537.36', 1506404629, ''),
('272839f5cb804f196fd6a25795c25c30', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/61.0.3163.100 Safari/537.36', 1506404629, 'a:2:{s:9:"user_data";s:0:"";s:5:"admin";a:4:{s:2:"id";s:1:"1";s:4:"name";N;s:5:"email";s:8:"zz@zz.zz";s:6:"expire";i:1506405312;}}'),
('e21d12bd93a664bb8b5427e7bb8e55f3', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/61.0.3163.100 Safari/537.36', 1506404629, ''),
('8cdc29184efdfb6cc3b4b701ee6dd629', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/61.0.3163.100 Safari/537.36', 1507638873, 'a:1:{s:9:"user_data";s:0:"";}'),
('458b471ecc36ec1e092f79ae5629164c', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/61.0.3163.100 Safari/537.36', 1507638873, ''),
('504a39bf4d19e954c236cfc0d07a60f5', '::1', 'Mozilla/5.0 (iPhone; CPU iPhone OS 9_1 like Mac OS X) AppleWebKit/601.1.46 (KHTML, like Gecko) Version/9.0 Mobile/13B143', 1507639389, ''),
('51a5071f1c3f72fd3a3c75badb27084f', '::1', 'Mozilla/5.0 (iPhone; CPU iPhone OS 9_1 like Mac OS X) AppleWebKit/601.1.46 (KHTML, like Gecko) Version/9.0 Mobile/13B143', 1507639389, ''),
('89cf7254fc2e4e0476427483dfc87647', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/61.0.3163.100 Safari/537.36', 1507638873, ''),
('8a7cca2cc4c53798e3ae11d20f41fec1', '::1', 'Mozilla/5.0 (iPhone; CPU iPhone OS 9_1 like Mac OS X) AppleWebKit/601.1.46 (KHTML, like Gecko) Version/9.0 Mobile/13B143', 1507639389, ''),
('6e7190b30bed3edbe016d9d57945e8dc', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/61.0.3163.100 Safari/537.36', 1507639423, ''),
('70b7759e7eb04c116dbe16d716766d45', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/61.0.3163.100 Safari/537.36', 1507639423, ''),
('e3e3676d78abb84d1a25b81890f851e2', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/61.0.3163.100 Safari/537.36', 1507639423, ''),
('51dfa0e122f8a2794371f336b7fa875c', '::1', 'Mozilla/5.0 (iPhone; CPU iPhone OS 9_1 like Mac OS X) AppleWebKit/601.1.46 (KHTML, like Gecko) Version/9.0 Mobile/13B143', 1507640023, ''),
('5053b9e1770ee9e2d5e8d10e25f58fbf', '::1', 'Mozilla/5.0 (iPhone; CPU iPhone OS 9_1 like Mac OS X) AppleWebKit/601.1.46 (KHTML, like Gecko) Version/9.0 Mobile/13B143', 1507640023, ''),
('02942484e4b5fce3454af481bf3c2832', '::1', 'Mozilla/5.0 (iPhone; CPU iPhone OS 9_1 like Mac OS X) AppleWebKit/601.1.46 (KHTML, like Gecko) Version/9.0 Mobile/13B143', 1507640023, ''),
('fa0d2e4fe6e75d1b2177f844a6ed1570', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/61.0.3163.100 Safari/537.36', 1507640226, ''),
('5804b89bba5ef058b13fe74cc7f72b21', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/61.0.3163.100 Safari/537.36', 1507640226, ''),
('faf4439c6b2af8120ad1ea5d958fc962', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/61.0.3163.100 Safari/537.36', 1507640226, ''),
('6865cb00ffc9cc14a73bf449884fd823', '::1', 'Mozilla/5.0 (iPhone; CPU iPhone OS 9_1 like Mac OS X) AppleWebKit/601.1.46 (KHTML, like Gecko) Version/9.0 Mobile/13B143', 1507640305, ''),
('08e916ec1c88fe6008519df4677494dc', '::1', 'Mozilla/5.0 (iPhone; CPU iPhone OS 9_1 like Mac OS X) AppleWebKit/601.1.46 (KHTML, like Gecko) Version/9.0 Mobile/13B143', 1507640305, ''),
('bab06431295219be37900eb9f4380525', '::1', 'Mozilla/5.0 (iPhone; CPU iPhone OS 9_1 like Mac OS X) AppleWebKit/601.1.46 (KHTML, like Gecko) Version/9.0 Mobile/13B143', 1507640305, ''),
('1ba60868a2fb0fd4b130d69cdde021ba', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/61.0.3163.100 Safari/537.36', 1507641141, ''),
('3019ecc2670b0a2630312a28bcfdc23c', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/61.0.3163.100 Safari/537.36', 1507641141, ''),
('97380e273f06e58953cab434240c0b3e', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/61.0.3163.100 Safari/537.36', 1507641141, ''),
('141fc69ea75d1c7ac1da52c847cef070', '::1', 'Mozilla/5.0 (iPhone; CPU iPhone OS 9_1 like Mac OS X) AppleWebKit/601.1.46 (KHTML, like Gecko) Version/9.0 Mobile/13B143', 1507641289, ''),
('60320ce5414754184ac34fd518c401d9', '::1', 'Mozilla/5.0 (iPhone; CPU iPhone OS 9_1 like Mac OS X) AppleWebKit/601.1.46 (KHTML, like Gecko) Version/9.0 Mobile/13B143', 1507641289, ''),
('6bfb70aaa2dd3a5dd46c8821cc26c71a', '::1', 'Mozilla/5.0 (iPhone; CPU iPhone OS 9_1 like Mac OS X) AppleWebKit/601.1.46 (KHTML, like Gecko) Version/9.0 Mobile/13B143', 1507641289, ''),
('02b87af254b21599297afc40523a7c67', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/61.0.3163.100 Safari/537.36', 1507641468, ''),
('bb26d0b170e33a613dd502475a81b4cb', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/61.0.3163.100 Safari/537.36', 1507641468, ''),
('096f6f27cf6326ebfd8e264d4d94060e', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/61.0.3163.100 Safari/537.36', 1507641468, ''),
('425d476aef04bff10b21094658649676', '::1', 'Mozilla/5.0 (iPhone; CPU iPhone OS 9_1 like Mac OS X) AppleWebKit/601.1.46 (KHTML, like Gecko) Version/9.0 Mobile/13B143', 1507646149, ''),
('ac9cd3c5ba32ed75c2150b88a33c2926', '::1', 'Mozilla/5.0 (iPhone; CPU iPhone OS 9_1 like Mac OS X) AppleWebKit/601.1.46 (KHTML, like Gecko) Version/9.0 Mobile/13B143', 1507646149, ''),
('bd276260bd484d7c2897b384f3350b74', '::1', 'Mozilla/5.0 (iPhone; CPU iPhone OS 9_1 like Mac OS X) AppleWebKit/601.1.46 (KHTML, like Gecko) Version/9.0 Mobile/13B143', 1507646149, 'a:1:{s:9:"user_data";s:0:"";}'),
('28057c5cf13cfeba89de10d1732e9ba6', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/61.0.3163.100 Safari/537.36', 1507659586, ''),
('73d9b4197855225cc2556d4bea87a736', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/61.0.3163.100 Safari/537.36', 1507659586, ''),
('61509c38859c70e91052bd8cf7e07197', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/61.0.3163.100 Safari/537.36', 1507659586, ''),
('522fd11d18494dd17945bf8b1b38ff3b', '::1', 'Mozilla/5.0 (iPhone; CPU iPhone OS 9_1 like Mac OS X) AppleWebKit/601.1.46 (KHTML, like Gecko) Version/9.0 Mobile/13B143', 1507661002, ''),
('90ce8f71b6bde5f17a424d9e67cd697c', '::1', 'Mozilla/5.0 (iPhone; CPU iPhone OS 9_1 like Mac OS X) AppleWebKit/601.1.46 (KHTML, like Gecko) Version/9.0 Mobile/13B143', 1507661002, ''),
('c145e3b156f078dacca552b7d742a521', '::1', 'Mozilla/5.0 (iPhone; CPU iPhone OS 9_1 like Mac OS X) AppleWebKit/601.1.46 (KHTML, like Gecko) Version/9.0 Mobile/13B143', 1507661002, ''),
('877aeadef4a98fcff0dd7765e643399a', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/61.0.3163.100 Safari/537.36', 1507661966, 'a:1:{s:9:"user_data";s:0:"";}'),
('b54a57d4cf8a3840594bc0fabd9b3556', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/61.0.3163.100 Safari/537.36', 1507661966, ''),
('a616cd2eb04c13d16d9b79f06abf5833', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/61.0.3163.100 Safari/537.36', 1507661966, ''),
('fa31a94a32bb67745565a01a26fba6d2', '::1', 'Mozilla/5.0 (iPhone; CPU iPhone OS 9_1 like Mac OS X) AppleWebKit/601.1.46 (KHTML, like Gecko) Version/9.0 Mobile/13B143', 1507665372, ''),
('9002921ab4c0aaf8c8b59908882ce7e7', '::1', 'Mozilla/5.0 (iPhone; CPU iPhone OS 9_1 like Mac OS X) AppleWebKit/601.1.46 (KHTML, like Gecko) Version/9.0 Mobile/13B143', 1507665372, ''),
('bee29e2f78e8aede189f20f56ac1d4fa', '::1', 'Mozilla/5.0 (iPhone; CPU iPhone OS 9_1 like Mac OS X) AppleWebKit/601.1.46 (KHTML, like Gecko) Version/9.0 Mobile/13B143', 1507665372, ''),
('db58add169e4db30dc15951899c02acd', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/61.0.3163.100 Safari/537.36', 1507722930, ''),
('83796494712c87ad9c661dd9c392dc04', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/61.0.3163.100 Safari/537.36', 1507722930, ''),
('02c113e46eb85d3909a23316ab1de88f', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/61.0.3163.100 Safari/537.36', 1507722930, ''),
('6caa0c2ef640f119b0612e879c3196bb', '::1', 'Mozilla/5.0 (iPhone; CPU iPhone OS 9_1 like Mac OS X) AppleWebKit/601.1.46 (KHTML, like Gecko) Version/9.0 Mobile/13B143', 1507727491, ''),
('a9b2e268a4ccc1b2daefc6436d06c62d', '::1', 'Mozilla/5.0 (iPhone; CPU iPhone OS 9_1 like Mac OS X) AppleWebKit/601.1.46 (KHTML, like Gecko) Version/9.0 Mobile/13B143', 1507727491, ''),
('042abdb7897ab2860e64edb41f8f1450', '::1', 'Mozilla/5.0 (iPhone; CPU iPhone OS 9_1 like Mac OS X) AppleWebKit/601.1.46 (KHTML, like Gecko) Version/9.0 Mobile/13B143', 1507727491, ''),
('95e94532a2476fdb0aa9ac1720d3a77f', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/61.0.3163.100 Safari/537.36', 1507740840, ''),
('6a024893e50c1b5f438b7c539e91bd39', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/61.0.3163.100 Safari/537.36', 1507740840, ''),
('c88105bdf43daab7c7dd0d10c18b0583', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/61.0.3163.100 Safari/537.36', 1507740840, ''),
('abc421647a85435848afdf11b47341e2', '::1', 'Mozilla/5.0 (iPhone; CPU iPhone OS 9_1 like Mac OS X) AppleWebKit/601.1.46 (KHTML, like Gecko) Version/9.0 Mobile/13B143', 1507741318, ''),
('ba3d9174c232da2fa145f1359e0ba400', '::1', 'Mozilla/5.0 (iPhone; CPU iPhone OS 9_1 like Mac OS X) AppleWebKit/601.1.46 (KHTML, like Gecko) Version/9.0 Mobile/13B143', 1507741318, ''),
('840498d3996e6f6cf393c700ce6b9730', '::1', 'Mozilla/5.0 (iPhone; CPU iPhone OS 9_1 like Mac OS X) AppleWebKit/601.1.46 (KHTML, like Gecko) Version/9.0 Mobile/13B143', 1507741318, ''),
('ccde8fda324854bdcef331d2454dda3b', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/61.0.3163.100 Safari/537.36', 1507743647, ''),
('ecda21fe4074bc7b06f9892305a6ce8b', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/61.0.3163.100 Safari/537.36', 1507743647, ''),
('930d5198a08475515f80ee130ef6e9ed', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/61.0.3163.100 Safari/537.36', 1507743647, ''),
('f404cae5348c5c28a3040985987af12f', '::1', 'Mozilla/5.0 (iPhone; CPU iPhone OS 9_1 like Mac OS X) AppleWebKit/601.1.46 (KHTML, like Gecko) Version/9.0 Mobile/13B143', 1507746997, ''),
('63e07e529bf8c8e17d4900c8d029b7fe', '::1', 'Mozilla/5.0 (iPhone; CPU iPhone OS 9_1 like Mac OS X) AppleWebKit/601.1.46 (KHTML, like Gecko) Version/9.0 Mobile/13B143', 1507746997, ''),
('be3ef28035022bbafda217340728346f', '::1', 'Mozilla/5.0 (iPhone; CPU iPhone OS 9_1 like Mac OS X) AppleWebKit/601.1.46 (KHTML, like Gecko) Version/9.0 Mobile/13B143', 1507746997, ''),
('fd266c351832a5fa51611a2aac5e8edf', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/61.0.3163.100 Safari/537.36', 1507748362, ''),
('792c9337505a326b37fc9d0e30cd3185', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/61.0.3163.100 Safari/537.36', 1507748362, ''),
('3703656f76734bb38746462c010967f4', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/61.0.3163.100 Safari/537.36', 1507748362, ''),
('60c1ef7b3ffdbfcd5858cf7ba024cd30', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/61.0.3163.100 Safari/537.36', 1507748487, ''),
('846763fed82fc931df4bde266d22adef', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/61.0.3163.100 Safari/537.36', 1507748487, ''),
('96b1e4996bac6bbe326f7df661540e4f', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/61.0.3163.100 Safari/537.36', 1507748487, ''),
('4a77381c4433d2c312811ab8cb8c799a', '::1', 'Mozilla/5.0 (iPhone; CPU iPhone OS 9_1 like Mac OS X) AppleWebKit/601.1.46 (KHTML, like Gecko) Version/9.0 Mobile/13B143', 1507748535, ''),
('f0016952075999674f3d96236561939b', '::1', 'Mozilla/5.0 (iPhone; CPU iPhone OS 9_1 like Mac OS X) AppleWebKit/601.1.46 (KHTML, like Gecko) Version/9.0 Mobile/13B143', 1507748535, ''),
('7931cc501b421d27b3c43ccd741d96d2', '::1', 'Mozilla/5.0 (iPhone; CPU iPhone OS 9_1 like Mac OS X) AppleWebKit/601.1.46 (KHTML, like Gecko) Version/9.0 Mobile/13B143', 1507748535, ''),
('afa39e71e52e353eabe313e7791d94c5', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/61.0.3163.100 Safari/537.36', 1507748633, ''),
('64c321b5492f373455b41f429a74fa08', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/61.0.3163.100 Safari/537.36', 1507748633, ''),
('2627f52f7a94d5c642f6f9b4ff7d35c0', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/61.0.3163.100 Safari/537.36', 1507748633, ''),
('e88b5d1473a08dc249e311c62738894d', '::1', 'Mozilla/5.0 (iPhone; CPU iPhone OS 9_1 like Mac OS X) AppleWebKit/601.1.46 (KHTML, like Gecko) Version/9.0 Mobile/13B143', 1507748645, ''),
('b7b17cfbf544bc5aa68153fcfd03a6b6', '::1', 'Mozilla/5.0 (iPhone; CPU iPhone OS 9_1 like Mac OS X) AppleWebKit/601.1.46 (KHTML, like Gecko) Version/9.0 Mobile/13B143', 1507748645, ''),
('4a5df625d38f30e8863940654554ac58', '::1', 'Mozilla/5.0 (iPhone; CPU iPhone OS 9_1 like Mac OS X) AppleWebKit/601.1.46 (KHTML, like Gecko) Version/9.0 Mobile/13B143', 1507748645, ''),
('22c3b9ee48cad66e41ed78b17d4b0deb', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/61.0.3163.100 Safari/537.36', 1507748920, ''),
('c855ea8c9be62edcf5812b7ab7035a39', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/61.0.3163.100 Safari/537.36', 1507748920, ''),
('72e4654ea65eb9be4f5104cf19d569cc', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/61.0.3163.100 Safari/537.36', 1507748920, ''),
('add1ad32158b4f536139ea43520212de', '::1', 'Mozilla/5.0 (iPhone; CPU iPhone OS 9_1 like Mac OS X) AppleWebKit/601.1.46 (KHTML, like Gecko) Version/9.0 Mobile/13B143', 1507749053, ''),
('5cc7233f8204fe39105d9512d67f30bf', '::1', 'Mozilla/5.0 (iPhone; CPU iPhone OS 9_1 like Mac OS X) AppleWebKit/601.1.46 (KHTML, like Gecko) Version/9.0 Mobile/13B143', 1507749053, ''),
('98643356a97d6b405d1556f1a2afb49c', '::1', 'Mozilla/5.0 (iPhone; CPU iPhone OS 9_1 like Mac OS X) AppleWebKit/601.1.46 (KHTML, like Gecko) Version/9.0 Mobile/13B143', 1507749053, ''),
('1cf1cac3fe55b5025a69644019504c07', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/61.0.3163.100 Safari/537.36', 1507749130, ''),
('e84cd6727dc5c91aefb943d8eaeb7dde', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/61.0.3163.100 Safari/537.36', 1507749130, ''),
('b88d5142e645fbdbae36d1f2e6026721', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/61.0.3163.100 Safari/537.36', 1507749130, ''),
('a90f313e4a022ef150ce28734e402905', '::1', 'Mozilla/5.0 (iPhone; CPU iPhone OS 9_1 like Mac OS X) AppleWebKit/601.1.46 (KHTML, like Gecko) Version/9.0 Mobile/13B143', 1507749726, ''),
('09d40c4567ddb36193ce900be3d02b0c', '::1', 'Mozilla/5.0 (iPhone; CPU iPhone OS 9_1 like Mac OS X) AppleWebKit/601.1.46 (KHTML, like Gecko) Version/9.0 Mobile/13B143', 1507749727, ''),
('48ad5b5af49250bc57d3f2c0f272282b', '::1', 'Mozilla/5.0 (iPhone; CPU iPhone OS 9_1 like Mac OS X) AppleWebKit/601.1.46 (KHTML, like Gecko) Version/9.0 Mobile/13B143', 1507749727, ''),
('0689ad831dcf3a6b0f280cc4103b1b04', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/61.0.3163.100 Safari/537.36', 1507752750, ''),
('67b142d5201d37fd166122e9a8a9fd82', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/61.0.3163.100 Safari/537.36', 1507752750, ''),
('9e395134cb50ede73d17ef9c40cc7357', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/61.0.3163.100 Safari/537.36', 1507752750, ''),
('b9705cdbfaefef39c937eba936f4af1f', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/61.0.3163.100 Safari/537.36', 1507813585, ''),
('13c7dc46a2df5787cf40c96b39b6a9ed', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/61.0.3163.100 Safari/537.36', 1507813585, ''),
('6ce7bedfdf33183ad2889ee3d59190f3', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/61.0.3163.100 Safari/537.36', 1507813585, ''),
('9528647af6a5f55676741532cc899b85', '::1', 'Mozilla/5.0 (iPad; CPU OS 9_1 like Mac OS X) AppleWebKit/601.1.46 (KHTML, like Gecko) Version/9.0 Mobile/13B143 Safari/6', 1507814776, ''),
('21b3c75898d7e21145a0d19daeb2a2d5', '::1', 'Mozilla/5.0 (iPad; CPU OS 9_1 like Mac OS X) AppleWebKit/601.1.46 (KHTML, like Gecko) Version/9.0 Mobile/13B143 Safari/6', 1507814776, ''),
('08bf79e2cbff6749ca6aca8b57383ed8', '::1', 'Mozilla/5.0 (iPad; CPU OS 9_1 like Mac OS X) AppleWebKit/601.1.46 (KHTML, like Gecko) Version/9.0 Mobile/13B143 Safari/6', 1507814776, ''),
('4102e82cc7756cb9f607c092d7e1d597', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/61.0.3163.100 Safari/537.36', 1507815225, ''),
('98cb60442c503564c78cb051bb9fdb44', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/61.0.3163.100 Safari/537.36', 1507815225, ''),
('1d68ebb497d924bc1a9b1a95a190bcf9', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/61.0.3163.100 Safari/537.36', 1507815225, ''),
('a747d64b0b196d75fb3300eccec843ba', '::1', 'Mozilla/5.0 (iPad; CPU OS 9_1 like Mac OS X) AppleWebKit/601.1.46 (KHTML, like Gecko) Version/9.0 Mobile/13B143 Safari/6', 1507815459, ''),
('54e127fbe51724a87dc44b641e4c2210', '::1', 'Mozilla/5.0 (iPad; CPU OS 9_1 like Mac OS X) AppleWebKit/601.1.46 (KHTML, like Gecko) Version/9.0 Mobile/13B143 Safari/6', 1507815459, ''),
('96ac861e022b099bd105ec504c81f388', '::1', 'Mozilla/5.0 (iPad; CPU OS 9_1 like Mac OS X) AppleWebKit/601.1.46 (KHTML, like Gecko) Version/9.0 Mobile/13B143 Safari/6', 1507815459, ''),
('70c55c9a0cc509b41b03427de8700e79', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/61.0.3163.100 Safari/537.36', 1507836747, ''),
('00dfefa9bfa594d8bcf98c63c1c85abe', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/61.0.3163.100 Safari/537.36', 1507836747, ''),
('4af4ebe4d0c19f4e89c5fee7e6e68f1d', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/61.0.3163.100 Safari/537.36', 1507836747, ''),
('c1d70b3af957499947a7e69f6a2aa22d', '::1', 'Mozilla/5.0 (iPhone; CPU iPhone OS 9_1 like Mac OS X) AppleWebKit/601.1.46 (KHTML, like Gecko) Version/9.0 Mobile/13B143', 1507837554, ''),
('2af8516d280fb114097bc5edfc89ca70', '::1', 'Mozilla/5.0 (iPhone; CPU iPhone OS 9_1 like Mac OS X) AppleWebKit/601.1.46 (KHTML, like Gecko) Version/9.0 Mobile/13B143', 1507837554, ''),
('7a9793f076dbec2df4a1d9875e0fed43', '::1', 'Mozilla/5.0 (iPhone; CPU iPhone OS 9_1 like Mac OS X) AppleWebKit/601.1.46 (KHTML, like Gecko) Version/9.0 Mobile/13B143', 1507837554, ''),
('3136168eef2d460851aa8970db59b631', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/61.0.3163.100 Safari/537.36', 1507837606, ''),
('8d23f28b6beb0bf050ef8e0d7c3f29da', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/61.0.3163.100 Safari/537.36', 1507837606, ''),
('f1a42d764fa314bc01e7c9bad404da32', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/61.0.3163.100 Safari/537.36', 1507837606, ''),
('d989baee4cb1827d198cda13f5d724aa', '::1', 'Mozilla/5.0 (iPhone; CPU iPhone OS 9_1 like Mac OS X) AppleWebKit/601.1.46 (KHTML, like Gecko) Version/9.0 Mobile/13B143', 1507838942, ''),
('8962bf970b52d37176af8d5c2162c2a4', '::1', 'Mozilla/5.0 (iPhone; CPU iPhone OS 9_1 like Mac OS X) AppleWebKit/601.1.46 (KHTML, like Gecko) Version/9.0 Mobile/13B143', 1507838942, ''),
('c01f0cc4c7e0cd173a2b6c35de5fd198', '::1', 'Mozilla/5.0 (iPhone; CPU iPhone OS 9_1 like Mac OS X) AppleWebKit/601.1.46 (KHTML, like Gecko) Version/9.0 Mobile/13B143', 1507838942, ''),
('f41460a3982163ccbf6959e6430313a2', '::1', 'Mozilla/5.0 (iPad; CPU OS 9_1 like Mac OS X) AppleWebKit/601.1.46 (KHTML, like Gecko) Version/9.0 Mobile/13B143 Safari/6', 1507839179, ''),
('99031cbd86d46baed4c0e6970386cec9', '::1', 'Mozilla/5.0 (iPad; CPU OS 9_1 like Mac OS X) AppleWebKit/601.1.46 (KHTML, like Gecko) Version/9.0 Mobile/13B143 Safari/6', 1507839179, ''),
('327fcb9d6ab52380bef8c624dbddd527', '::1', 'Mozilla/5.0 (iPad; CPU OS 9_1 like Mac OS X) AppleWebKit/601.1.46 (KHTML, like Gecko) Version/9.0 Mobile/13B143 Safari/6', 1507839179, ''),
('43b56e5f3a767e5b2d2811073ea60577', '::1', 'Mozilla/5.0 (iPhone; CPU iPhone OS 9_1 like Mac OS X) AppleWebKit/601.1.46 (KHTML, like Gecko) Version/9.0 Mobile/13B143', 1507839302, ''),
('6b1255cdec26836ecb9baf570c7e1aa5', '::1', 'Mozilla/5.0 (iPhone; CPU iPhone OS 9_1 like Mac OS X) AppleWebKit/601.1.46 (KHTML, like Gecko) Version/9.0 Mobile/13B143', 1507839302, ''),
('59e56b25772b3abbcce58e5ad5b3dda6', '::1', 'Mozilla/5.0 (iPhone; CPU iPhone OS 9_1 like Mac OS X) AppleWebKit/601.1.46 (KHTML, like Gecko) Version/9.0 Mobile/13B143', 1507839302, ''),
('3163f1d31ba224abc690a77e4957e70a', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/61.0.3163.100 Safari/537.36', 1507839475, ''),
('68cea1f1a6c3af850b68a08b7ee20ce2', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/61.0.3163.100 Safari/537.36', 1507839475, ''),
('fbcae8a2e0a71ee6f278ab4b979a0b5c', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/61.0.3163.100 Safari/537.36', 1507839475, ''),
('9de7430a34fcedbe07afd0915f126ae3', '::1', 'Mozilla/5.0 (iPhone; CPU iPhone OS 9_1 like Mac OS X) AppleWebKit/601.1.46 (KHTML, like Gecko) Version/9.0 Mobile/13B143', 1507839503, ''),
('b4e661d8d92c65cfa399e27b1b50d296', '::1', 'Mozilla/5.0 (iPhone; CPU iPhone OS 9_1 like Mac OS X) AppleWebKit/601.1.46 (KHTML, like Gecko) Version/9.0 Mobile/13B143', 1507839503, ''),
('ae819c6f898d373f03d7ad62045ed6c1', '::1', 'Mozilla/5.0 (iPhone; CPU iPhone OS 9_1 like Mac OS X) AppleWebKit/601.1.46 (KHTML, like Gecko) Version/9.0 Mobile/13B143', 1507839503, ''),
('d5123c478de61ff9b1104449a260495c', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/61.0.3163.100 Safari/537.36', 1507839594, ''),
('eb1307df61a743180ec3d8a77cf996bd', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/61.0.3163.100 Safari/537.36', 1507839594, ''),
('c07d72e251f58ec639a20fa13bc9fe55', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/61.0.3163.100 Safari/537.36', 1507839594, ''),
('9141c3c26e7c749145d7970d8c07e280', '::1', 'Mozilla/5.0 (iPhone; CPU iPhone OS 9_1 like Mac OS X) AppleWebKit/601.1.46 (KHTML, like Gecko) Version/9.0 Mobile/13B143', 1507839654, ''),
('f61d4575bddbcbc27552c4a397536a4b', '::1', 'Mozilla/5.0 (iPhone; CPU iPhone OS 9_1 like Mac OS X) AppleWebKit/601.1.46 (KHTML, like Gecko) Version/9.0 Mobile/13B143', 1507839654, ''),
('fd9fb16ff838c966622f5bf351dbb1c7', '::1', 'Mozilla/5.0 (iPhone; CPU iPhone OS 9_1 like Mac OS X) AppleWebKit/601.1.46 (KHTML, like Gecko) Version/9.0 Mobile/13B143', 1507839654, ''),
('ad8f07ad86574fcbc1dc8051a9f39861', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/61.0.3163.100 Safari/537.36', 1507839845, ''),
('3203a881feb619517de141ef31ca089f', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/61.0.3163.100 Safari/537.36', 1507839845, ''),
('ab5836b0c72f22856e612a639e1b99f6', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/61.0.3163.100 Safari/537.36', 1507839845, ''),
('787e77780a7409c4c0cbcf07ef2a7ff4', '::1', 'Mozilla/5.0 (iPhone; CPU iPhone OS 9_1 like Mac OS X) AppleWebKit/601.1.46 (KHTML, like Gecko) Version/9.0 Mobile/13B143', 1507841385, ''),
('e4b662726f0634464573830bd83e6c20', '::1', 'Mozilla/5.0 (iPhone; CPU iPhone OS 9_1 like Mac OS X) AppleWebKit/601.1.46 (KHTML, like Gecko) Version/9.0 Mobile/13B143', 1507841385, ''),
('27fee20d1287c1b72b9ef4aa9c98a322', '::1', 'Mozilla/5.0 (iPhone; CPU iPhone OS 9_1 like Mac OS X) AppleWebKit/601.1.46 (KHTML, like Gecko) Version/9.0 Mobile/13B143', 1507841385, ''),
('aa525b07ffc9485432fb51dfe4dad7fd', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/61.0.3163.100 Safari/537.36', 1507841919, ''),
('e00fd1a4580e6b27ec06500ef8cf66ba', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/61.0.3163.100 Safari/537.36', 1507841919, ''),
('c62fd6e0c9eb9cf546f6f1ed3e6525da', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/61.0.3163.100 Safari/537.36', 1507841919, ''),
('b967454690fdc4ad17e5dffbadf47b65', '::1', 'Mozilla/5.0 (iPhone; CPU iPhone OS 9_1 like Mac OS X) AppleWebKit/601.1.46 (KHTML, like Gecko) Version/9.0 Mobile/13B143', 1507842683, ''),
('58ab58e6ce8346924a0091c3863baf3e', '::1', 'Mozilla/5.0 (iPhone; CPU iPhone OS 9_1 like Mac OS X) AppleWebKit/601.1.46 (KHTML, like Gecko) Version/9.0 Mobile/13B143', 1507842683, ''),
('cadd67a63a3c02de36fcf9df1aa62a2a', '::1', 'Mozilla/5.0 (iPhone; CPU iPhone OS 9_1 like Mac OS X) AppleWebKit/601.1.46 (KHTML, like Gecko) Version/9.0 Mobile/13B143', 1507842683, ''),
('5b570de72a59f64554e2ff6fa7e6d591', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/61.0.3163.100 Safari/537.36', 1507842686, ''),
('79336411d7915c3716982ee266bfb172', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/61.0.3163.100 Safari/537.36', 1507842686, ''),
('3cff5920ee42b707e395980bcdf40001', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/61.0.3163.100 Safari/537.36', 1507842686, ''),
('66cabc074b9ccc0f6eb3bbd2df3f7d5a', '::1', 'Mozilla/5.0 (iPhone; CPU iPhone OS 9_1 like Mac OS X) AppleWebKit/601.1.46 (KHTML, like Gecko) Version/9.0 Mobile/13B143', 1507843970, ''),
('db94be2faed21f2b34ae9e89159f5567', '::1', 'Mozilla/5.0 (iPhone; CPU iPhone OS 9_1 like Mac OS X) AppleWebKit/601.1.46 (KHTML, like Gecko) Version/9.0 Mobile/13B143', 1507843970, ''),
('c61b0e13a0d0da60e8b216670377848d', '::1', 'Mozilla/5.0 (iPhone; CPU iPhone OS 9_1 like Mac OS X) AppleWebKit/601.1.46 (KHTML, like Gecko) Version/9.0 Mobile/13B143', 1507843970, 'a:1:{s:7:"carpool";a:5:{s:10:"user_email";s:15:"demo1@gmail.com";s:6:"access";s:6:"travel";s:7:"user_id";s:1:"1";s:7:"trip_id";b:0;s:6:"expire";i:1507844756;}}'),
('6681a30a116a7dd362b9252dac555149', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/61.0.3163.100 Safari/537.36', 1507844178, 'a:1:{s:9:"user_data";s:0:"";}'),
('4a6cbf55e68fb70a8e06b5f6e1c85411', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/61.0.3163.100 Safari/537.36', 1507844178, ''),
('7eec49cf1685f1142a79329a31017a0b', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/61.0.3163.100 Safari/537.36', 1507844178, ''),
('bb36d9480af279968385b7a6af25f629', '::1', 'Mozilla/5.0 (iPhone; CPU iPhone OS 9_1 like Mac OS X) AppleWebKit/601.1.46 (KHTML, like Gecko) Version/9.0 Mobile/13B143', 1507844537, ''),
('e7b6e4a9a28014fda3c04a8c984afd3e', '::1', 'Mozilla/5.0 (iPhone; CPU iPhone OS 9_1 like Mac OS X) AppleWebKit/601.1.46 (KHTML, like Gecko) Version/9.0 Mobile/13B143', 1507844537, ''),
('3c30247bdb270f019354eb600ddf3390', '::1', 'Mozilla/5.0 (iPhone; CPU iPhone OS 9_1 like Mac OS X) AppleWebKit/601.1.46 (KHTML, like Gecko) Version/9.0 Mobile/13B143', 1507844537, ''),
('116d0203cfccb7e3d2719cc3fc557b19', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/61.0.3163.100 Safari/537.36', 1508414612, 'a:2:{s:9:"tripLegId";s:1:"7";s:8:"tripDate";s:10:"18/10/2017";}'),
('d23a51e1d6ebdc7623aba9f3b6b2b74f', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/61.0.3163.100 Safari/537.36', 1508414612, 'a:2:{s:9:"user_data";s:0:"";s:5:"admin";a:4:{s:2:"id";s:1:"1";s:4:"name";N;s:5:"email";s:8:"zz@zz.zz";s:6:"expire";i:1508237837;}}'),
('58ae30260b80071291e9605b468c22be', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/61.0.3163.100 Safari/537.36', 1508414615, 'a:2:{s:9:"user_data";s:0:"";s:7:"carpool";a:5:{s:10:"user_email";s:15:"demo1@gmail.com";s:6:"access";s:6:"travel";s:7:"user_id";s:1:"1";s:7:"trip_id";b:0;s:6:"expire";i:1508415272;}}'),
('56dd1b0c8e5a07e6b83d83a8cb0ed136', '::1', 'Mozilla/5.0 (iPhone; CPU iPhone OS 9_1 like Mac OS X) AppleWebKit/601.1.46 (KHTML, like Gecko) Version/9.0 Mobile/13B143', 1508414842, ''),
('021c985246232b8a58178f976053fff5', '::1', 'Mozilla/5.0 (iPhone; CPU iPhone OS 9_1 like Mac OS X) AppleWebKit/601.1.46 (KHTML, like Gecko) Version/9.0 Mobile/13B143', 1508414842, ''),
('cdbd77ba648f7ac38a0ce658a286c66b', '::1', 'Mozilla/5.0 (iPhone; CPU iPhone OS 9_1 like Mac OS X) AppleWebKit/601.1.46 (KHTML, like Gecko) Version/9.0 Mobile/13B143', 1508414842, ''),
('2bb7a8eadd17e0141f206d087f5983a4', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/61.0.3163.100 Safari/537.36', 1508415321, ''),
('f623e03c49b2e42c02156f55f6f19a8c', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/61.0.3163.100 Safari/537.36', 1508415321, ''),
('60a6e0e59f0a45f0c4cd62ddb8bb16b3', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/61.0.3163.100 Safari/537.36', 1508415321, ''),
('71973167d488284eecf47f4179000d4d', '::1', 'Mozilla/5.0 (iPhone; CPU iPhone OS 9_1 like Mac OS X) AppleWebKit/601.1.46 (KHTML, like Gecko) Version/9.0 Mobile/13B143', 1508416940, ''),
('df218c2272503f3d8597d2bdf009e32d', '::1', 'Mozilla/5.0 (iPhone; CPU iPhone OS 9_1 like Mac OS X) AppleWebKit/601.1.46 (KHTML, like Gecko) Version/9.0 Mobile/13B143', 1508416940, ''),
('4f5ae357573bc3ca332f71830c0343ee', '::1', 'Mozilla/5.0 (iPhone; CPU iPhone OS 9_1 like Mac OS X) AppleWebKit/601.1.46 (KHTML, like Gecko) Version/9.0 Mobile/13B143', 1508416940, ''),
('68257b493f57d7238da542b5a9df058e', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/61.0.3163.100 Safari/537.36', 1508418383, ''),
('4b58772557518f6ab658b5f11ccf2710', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/61.0.3163.100 Safari/537.36', 1508418383, ''),
('65ae6fec10f0bb98ec944d269269fa77', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/61.0.3163.100 Safari/537.36', 1508418383, ''),
('12feb63758a076d8dcf5a4d4a2773aa1', '::1', 'Mozilla/5.0 (iPhone; CPU iPhone OS 9_1 like Mac OS X) AppleWebKit/601.1.46 (KHTML, like Gecko) Version/9.0 Mobile/13B143', 1508418387, ''),
('36e64d34dc7b87c037b0a4e6e7750673', '::1', 'Mozilla/5.0 (iPhone; CPU iPhone OS 9_1 like Mac OS X) AppleWebKit/601.1.46 (KHTML, like Gecko) Version/9.0 Mobile/13B143', 1508418387, ''),
('19d5d3c5dab2ee821d332130088af14f', '::1', 'Mozilla/5.0 (iPhone; CPU iPhone OS 9_1 like Mac OS X) AppleWebKit/601.1.46 (KHTML, like Gecko) Version/9.0 Mobile/13B143', 1508418387, ''),
('4f1c3db853743d5a8d6fa1ee9560e37e', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/61.0.3163.100 Safari/537.36', 1508419157, ''),
('c5343ebe74321740418921816cc059ee', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/61.0.3163.100 Safari/537.36', 1508419157, ''),
('614ce6380057c69dddbaaef3a9b38a99', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/61.0.3163.100 Safari/537.36', 1508419157, 'a:2:{s:9:"user_data";s:0:"";s:7:"carpool";a:5:{s:10:"user_email";s:15:"demo1@gmail.com";s:6:"access";s:6:"travel";s:7:"user_id";s:1:"1";s:7:"trip_id";b:0;s:6:"expire";i:1508420284;}}'),
('c5aea829b149521752a5b640dd153a36', '::1', 'Mozilla/5.0 (iPhone; CPU iPhone OS 9_1 like Mac OS X) AppleWebKit/601.1.46 (KHTML, like Gecko) Version/9.0 Mobile/13B143', 1508419736, ''),
('470cbfefe84e7d290d522e85acd8f013', '::1', 'Mozilla/5.0 (iPhone; CPU iPhone OS 9_1 like Mac OS X) AppleWebKit/601.1.46 (KHTML, like Gecko) Version/9.0 Mobile/13B143', 1508419736, ''),
('ce0f1defb022bcb75e31e8cb54f3b09e', '::1', 'Mozilla/5.0 (iPhone; CPU iPhone OS 9_1 like Mac OS X) AppleWebKit/601.1.46 (KHTML, like Gecko) Version/9.0 Mobile/13B143', 1508419736, ''),
('3b0734e7a4bfe7eec1858125175311c1', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/61.0.3163.100 Safari/537.36', 1508423526, ''),
('7b15d557936051864dbc2ca096f2be38', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/61.0.3163.100 Safari/537.36', 1508423526, ''),
('e98707a3328335f2a64e1b7b4522f31e', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/61.0.3163.100 Safari/537.36', 1508422623, 'a:2:{s:9:"user_data";s:0:"";s:7:"carpool";a:5:{s:10:"user_email";s:15:"demo1@gmail.com";s:6:"access";s:6:"travel";s:7:"user_id";s:1:"1";s:7:"trip_id";b:0;s:6:"expire";i:1508424276;}}'),
('972314f49b57f2bb0aa48cd6b082fdda', '::1', 'Mozilla/5.0 (iPhone; CPU iPhone OS 9_1 like Mac OS X) AppleWebKit/601.1.46 (KHTML, like Gecko) Version/9.0 Mobile/13B143', 1508423694, ''),
('74476bf72f9460308ff8896f7d81667f', '::1', 'Mozilla/5.0 (iPhone; CPU iPhone OS 9_1 like Mac OS X) AppleWebKit/601.1.46 (KHTML, like Gecko) Version/9.0 Mobile/13B143', 1508423694, ''),
('b467fe8d6aff0db87c561bea07de4a3a', '::1', 'Mozilla/5.0 (iPhone; CPU iPhone OS 9_1 like Mac OS X) AppleWebKit/601.1.46 (KHTML, like Gecko) Version/9.0 Mobile/13B143', 1508423694, 'a:2:{s:9:"user_data";s:0:"";s:7:"carpool";a:5:{s:10:"user_email";s:15:"demo1@gmail.com";s:6:"access";s:6:"travel";s:7:"user_id";s:1:"1";s:7:"trip_id";b:0;s:6:"expire";i:1508424364;}}'),
('cc39702404273eb65251e2563d06af74', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/61.0.3163.100 Safari/537.36', 1509008445, 'a:2:{s:9:"tripLegId";s:1:"6";s:8:"tripDate";s:10:"23/10/2017";}'),
('d99e1c2f88edac645f60e32130ae9280', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/61.0.3163.100 Safari/537.36', 1509008445, 'a:2:{s:9:"user_data";s:0:"";s:5:"admin";a:4:{s:2:"id";s:1:"1";s:4:"name";N;s:5:"email";s:8:"zz@zz.zz";s:6:"expire";b:0;}}'),
('2fbbfc2c3f9d89f80d7d230973163252', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:56.0) Gecko/20100101 Firefox/56.0', 1509468453, 'a:2:{s:9:"user_data";s:0:"";s:9:"tripLegId";s:1:"7";}'),
('1e7156e8ef152a3ce940c7436e43969a', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:56.0) Gecko/20100101 Firefox/56.0', 1509468454, ''),
('9cf752e02d7b44fb635d5f9d6425d9c8', '::1', 'Mozilla/5.0 (iPhone; CPU iPhone OS 9_1 like Mac OS X) AppleWebKit/601.1.46 (KHTML, like Gecko) Version/9.0 Mobile/13B143', 1509282021, 'a:2:{s:9:"user_data";s:0:"";s:7:"carpool";a:5:{s:10:"user_email";s:15:"demo1@gmail.com";s:6:"access";s:6:"travel";s:7:"user_id";s:1:"1";s:7:"trip_id";b:0;s:6:"expire";i:1509282667;}}'),
('fcc6e35ecae494f0d75344e22047e415', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:56.0) Gecko/20100101 Firefox/56.0', 1508861851, ''),
('91888cc49443355dc895bd7c47d3380c', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:56.0) Gecko/20100101 Firefox/56.0', 1508861851, ''),
('82e8c179566de4b3623c74961099780c', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:56.0) Gecko/20100101 Firefox/56.0', 1508861851, ''),
('393ff97c9b883a87fb2724f48c12ae42', '::1', 'Mozilla/5.0 (iPhone; CPU iPhone OS 9_1 like Mac OS X) AppleWebKit/601.1.46 (KHTML, like Gecko) Version/9.0 Mobile/13B143', 1509010641, ''),
('1e58dfedbe7794f0081c569eeba774e6', '::1', 'Mozilla/5.0 (iPhone; CPU iPhone OS 9_1 like Mac OS X) AppleWebKit/601.1.46 (KHTML, like Gecko) Version/9.0 Mobile/13B143', 1509010641, ''),
('e27ad569694420cf4b755fa283a73ca5', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/61.0.3163.100 Safari/537.36', 1509010589, ''),
('045779af316243913941edf4d1713da1', '::1', 'Mozilla/5.0 (iPhone; CPU iPhone OS 9_1 like Mac OS X) AppleWebKit/601.1.46 (KHTML, like Gecko) Version/9.0 Mobile/13B143', 1509010641, ''),
('80e80e3135c1dfe287e78af66efe76c0', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/61.0.3163.100 Safari/537.36', 1509020493, 'a:1:{s:9:"user_data";s:0:"";}'),
('5db6c7b649393ae5b1d0dee7e33c482a', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/61.0.3163.100 Safari/537.36', 1509020493, ''),
('ce8c147b75b221f8abebba7140f06f99', '::1', 'Mozilla/5.0 (iPhone; CPU iPhone OS 9_1 like Mac OS X) AppleWebKit/601.1.46 (KHTML, like Gecko) Version/9.0 Mobile/13B143', 1509020541, ''),
('dd07b08cfb7cc989b714071f4c795ebd', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/61.0.3163.100 Safari/537.36', 1509020502, 'a:2:{s:9:"user_data";s:0:"";s:7:"carpool";a:5:{s:10:"user_email";s:15:"demo1@gmail.com";s:6:"access";s:6:"travel";s:7:"user_id";s:1:"1";s:7:"trip_id";a:0:{}s:6:"expire";i:1509021108;}}'),
('14a6f327445b90e1dfdf1f2472547af0', '::1', 'Mozilla/5.0 (iPhone; CPU iPhone OS 9_1 like Mac OS X) AppleWebKit/601.1.46 (KHTML, like Gecko) Version/9.0 Mobile/13B143', 1509020541, ''),
('7c51135a6d37bdb6e9f011007ef81def', '::1', 'Mozilla/5.0 (iPhone; CPU iPhone OS 9_1 like Mac OS X) AppleWebKit/601.1.46 (KHTML, like Gecko) Version/9.0 Mobile/13B143', 1509020541, ''),
('1cc61a7fc18e669631708e0b5469606b', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/61.0.3163.100 Safari/537.36', 1509020590, ''),
('27924aca7b5e5fab76483c7db2a9a9bd', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/61.0.3163.100 Safari/537.36', 1509020590, ''),
('4eddf23173c01a81d7bfad2c16a096c7', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/61.0.3163.100 Safari/537.36', 1509020590, ''),
('8f390ae4e3ca057c6d3aadbfc94c34b8', '::1', 'Mozilla/5.0 (iPhone; CPU iPhone OS 9_1 like Mac OS X) AppleWebKit/601.1.46 (KHTML, like Gecko) Version/9.0 Mobile/13B143', 1509020724, ''),
('79978aa93842a80046c56f743d6f4e83', '::1', 'Mozilla/5.0 (iPhone; CPU iPhone OS 9_1 like Mac OS X) AppleWebKit/601.1.46 (KHTML, like Gecko) Version/9.0 Mobile/13B143', 1509020724, ''),
('f835aab48bf3d0a604304a16404c2d1a', '::1', 'Mozilla/5.0 (iPhone; CPU iPhone OS 9_1 like Mac OS X) AppleWebKit/601.1.46 (KHTML, like Gecko) Version/9.0 Mobile/13B143', 1509020724, 'a:2:{s:9:"user_data";s:0:"";s:7:"carpool";a:5:{s:10:"user_email";s:15:"demo1@gmail.com";s:6:"access";s:6:"travel";s:7:"user_id";s:1:"1";s:7:"trip_id";a:0:{}s:6:"expire";i:1509021473;}}'),
('77ebb9c8357907c6305babc5c9c92c0e', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/61.0.3163.100 Safari/537.36', 1509020987, 'a:1:{s:9:"user_data";s:0:"";}'),
('19af7f86d1f0bfbf1e78f482c457126a', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/61.0.3163.100 Safari/537.36', 1509020987, ''),
('7d06d541ca375f477bd02c7d32a718ad', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/61.0.3163.100 Safari/537.36', 1509021802, 'a:2:{s:9:"user_data";s:0:"";s:7:"carpool";a:5:{s:10:"user_email";s:15:"demo1@gmail.com";s:6:"access";s:6:"travel";s:7:"user_id";s:1:"1";s:7:"trip_id";a:0:{}s:6:"expire";i:1509023863;}}'),
('1b519ff8a86fb0adacfed86730e76530', '::1', 'Mozilla/5.0 (iPhone; CPU iPhone OS 9_1 like Mac OS X) AppleWebKit/601.1.46 (KHTML, like Gecko) Version/9.0 Mobile/13B143', 1509023410, ''),
('ca3b1f76261b8023040c2245704a66c2', '::1', 'Mozilla/5.0 (iPhone; CPU iPhone OS 9_1 like Mac OS X) AppleWebKit/601.1.46 (KHTML, like Gecko) Version/9.0 Mobile/13B143', 1509023410, ''),
('08c79f27fb3e5f29902a64a19e12201d', '::1', 'Mozilla/5.0 (iPhone; CPU iPhone OS 9_1 like Mac OS X) AppleWebKit/601.1.46 (KHTML, like Gecko) Version/9.0 Mobile/13B143', 1509023410, ''),
('a7c91d9d3d7179bd23907f7bf80eace7', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/61.0.3163.100 Safari/537.36', 1509023425, 'a:1:{s:9:"user_data";s:0:"";}'),
('2410a826f0eaff9c4a8e834c7f680930', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/61.0.3163.100 Safari/537.36', 1509023425, ''),
('c93e4e1730a34c83172e66b29a754af6', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/61.0.3163.100 Safari/537.36', 1509023425, ''),
('f99fcb995842c6a168efbf06682c6622', '::1', 'Mozilla/5.0 (iPhone; CPU iPhone OS 9_1 like Mac OS X) AppleWebKit/601.1.46 (KHTML, like Gecko) Version/9.0 Mobile/13B143', 1509023512, ''),
('8c223e4a0f7554e4aaa89505ba6bcd0d', '::1', 'Mozilla/5.0 (iPhone; CPU iPhone OS 9_1 like Mac OS X) AppleWebKit/601.1.46 (KHTML, like Gecko) Version/9.0 Mobile/13B143', 1509023512, ''),
('23a69b8752415d84837691b1ee844e3c', '::1', 'Mozilla/5.0 (iPhone; CPU iPhone OS 9_1 like Mac OS X) AppleWebKit/601.1.46 (KHTML, like Gecko) Version/9.0 Mobile/13B143', 1509023512, ''),
('f88d1320015009da7595e5a8c7184ff2', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/61.0.3163.100 Safari/537.36', 1509023543, 'a:1:{s:9:"user_data";s:0:"";}'),
('7e49342c0552d53e8628792168b6f21b', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/61.0.3163.100 Safari/537.36', 1509023543, ''),
('cc4df28c1e5c65544a6dc5d29c964dc4', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/61.0.3163.100 Safari/537.36', 1509023543, 'a:2:{s:9:"user_data";s:0:"";s:7:"carpool";a:5:{s:10:"user_email";s:15:"demo1@gmail.com";s:6:"access";s:6:"travel";s:7:"user_id";s:1:"1";s:7:"trip_id";a:0:{}s:6:"expire";i:1509024336;}}'),
('4bf40335b63fe359226d05f4fa70393b', '::1', 'Mozilla/5.0 (iPhone; CPU iPhone OS 9_1 like Mac OS X) AppleWebKit/601.1.46 (KHTML, like Gecko) Version/9.0 Mobile/13B143', 1509023765, ''),
('60246b46e4a94272580ca6f050177e6a', '::1', 'Mozilla/5.0 (iPhone; CPU iPhone OS 9_1 like Mac OS X) AppleWebKit/601.1.46 (KHTML, like Gecko) Version/9.0 Mobile/13B143', 1509023765, ''),
('5b476fdf99187a95aba2b82fe7eb863e', '::1', 'Mozilla/5.0 (iPhone; CPU iPhone OS 9_1 like Mac OS X) AppleWebKit/601.1.46 (KHTML, like Gecko) Version/9.0 Mobile/13B143', 1509023765, ''),
('8d34a0918ead6fe36ac5f12a42ace09d', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/61.0.3163.100 Safari/537.36', 1509122789, 'a:1:{s:9:"user_data";s:0:"";}'),
('92cae2d6967a3d2be21eff78a3a2d68b', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/61.0.3163.100 Safari/537.36', 1509122789, ''),
('516d7fbf2c19c3b17ea9730b853ed4c4', '::1', 'Mozilla/5.0 (iPhone; CPU iPhone OS 9_1 like Mac OS X) AppleWebKit/601.1.46 (KHTML, like Gecko) Version/9.0 Mobile/13B143', 1509123806, ''),
('489c1692b476ea75f9e107f78b9a8741', '::1', 'Mozilla/5.0 (iPhone; CPU iPhone OS 9_1 like Mac OS X) AppleWebKit/601.1.46 (KHTML, like Gecko) Version/9.0 Mobile/13B143', 1509123806, ''),
('1c50d633545e940e9158875192ac1bc1', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/61.0.3163.100 Safari/537.36', 1509122789, 'a:2:{s:9:"user_data";s:0:"";s:7:"carpool";a:5:{s:10:"user_email";s:15:"demo1@gmail.com";s:6:"access";s:6:"travel";s:7:"user_id";s:1:"1";s:7:"trip_id";a:0:{}s:6:"expire";i:1509124201;}}'),
('f543c5e687dffe08b2f2a1a854b311a3', '::1', 'Mozilla/5.0 (iPhone; CPU iPhone OS 9_1 like Mac OS X) AppleWebKit/601.1.46 (KHTML, like Gecko) Version/9.0 Mobile/13B143', 1509123806, 'a:2:{s:9:"user_data";s:0:"";s:18:"flash:old:redirect";s:12:"addtrip/form";}'),
('e2259a7ea7f657c91ce6fbf6b6215906', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/61.0.3163.100 Safari/537.36', 1509183229, 'a:1:{s:9:"user_data";s:0:"";}'),
('aba77159d5a0228a8c74df6b7ef37b5b', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/61.0.3163.100 Safari/537.36', 1509183229, ''),
('a8c8435a7f6b967706db5a8db4a8a617', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/61.0.3163.100 Safari/537.36', 1509183229, 'a:2:{s:9:"user_data";s:0:"";s:7:"carpool";a:5:{s:10:"user_email";s:15:"demo1@gmail.com";s:6:"access";s:6:"travel";s:7:"user_id";s:1:"1";s:7:"trip_id";a:0:{}s:6:"expire";i:1509184734;}}'),
('834a79018e6d41bfc21309132733ed2a', '::1', 'Mozilla/5.0 (iPhone; CPU iPhone OS 9_1 like Mac OS X) AppleWebKit/601.1.46 (KHTML, like Gecko) Version/9.0 Mobile/13B143', 1509184210, ''),
('a8c452fd8b08c41cb53a0a43926c9100', '::1', 'Mozilla/5.0 (iPhone; CPU iPhone OS 9_1 like Mac OS X) AppleWebKit/601.1.46 (KHTML, like Gecko) Version/9.0 Mobile/13B143', 1509184210, ''),
('6e940f66fa946cbfd0ea53328aba23dc', '::1', 'Mozilla/5.0 (iPhone; CPU iPhone OS 9_1 like Mac OS X) AppleWebKit/601.1.46 (KHTML, like Gecko) Version/9.0 Mobile/13B143', 1509184210, ''),
('dc811d0db20791d2867bf03c301cbc23', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/61.0.3163.100 Safari/537.36', 1509184364, ''),
('f1e6b414511da3b3aec6391e0231c202', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/61.0.3163.100 Safari/537.36', 1509184364, ''),
('d04eb33a4ca9a26a3d2a322651e1f90a', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/61.0.3163.100 Safari/537.36', 1509184364, ''),
('b31054d4ee0a66dd52fc46da7ffd349c', '::1', 'Mozilla/5.0 (iPhone; CPU iPhone OS 9_1 like Mac OS X) AppleWebKit/601.1.46 (KHTML, like Gecko) Version/9.0 Mobile/13B143', 1509184471, ''),
('4b9f7116d3739e18d2922245de6cb577', '::1', 'Mozilla/5.0 (iPhone; CPU iPhone OS 9_1 like Mac OS X) AppleWebKit/601.1.46 (KHTML, like Gecko) Version/9.0 Mobile/13B143', 1509184471, '');
INSERT INTO `sessions` (`session_id`, `ip_address`, `user_agent`, `last_activity`, `user_data`) VALUES
('ad9f56f88aa1efda52280cc762180529', '::1', 'Mozilla/5.0 (iPhone; CPU iPhone OS 9_1 like Mac OS X) AppleWebKit/601.1.46 (KHTML, like Gecko) Version/9.0 Mobile/13B143', 1509184471, ''),
('93f3444f1226b4c9196be8df7fde9802', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/61.0.3163.100 Safari/537.36', 1509191573, ''),
('20e1614951e314771a2510962ed1c713', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/61.0.3163.100 Safari/537.36', 1509191573, ''),
('70564cd78612700f9f8aa029478571f9', '::1', 'Mozilla/5.0 (iPhone; CPU iPhone OS 9_1 like Mac OS X) AppleWebKit/601.1.46 (KHTML, like Gecko) Version/9.0 Mobile/13B143', 1509194638, ''),
('8fd6a6c66df41bf1294e3f7273cb9906', '::1', 'Mozilla/5.0 (iPhone; CPU iPhone OS 9_1 like Mac OS X) AppleWebKit/601.1.46 (KHTML, like Gecko) Version/9.0 Mobile/13B143', 1509194638, ''),
('2c28415c07f0f5543b5632c0801fe56c', '::1', 'Mozilla/5.0 (iPhone; CPU iPhone OS 9_1 like Mac OS X) AppleWebKit/601.1.46 (KHTML, like Gecko) Version/9.0 Mobile/13B143', 1509194638, ''),
('abaeeef7dadf528240a2a0501f506b1b', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/61.0.3163.100 Safari/537.36', 1509192712, 'a:2:{s:9:"user_data";s:0:"";s:7:"carpool";a:5:{s:10:"user_email";s:15:"demo1@gmail.com";s:6:"access";s:6:"travel";s:7:"user_id";s:1:"1";s:7:"trip_id";a:0:{}s:6:"expire";i:1509195146;}}'),
('ce7b2d012b90826b271f9c4ec659b5ad', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/61.0.3163.100 Safari/537.36', 1509194911, ''),
('f69ff3b1b8d86bcbe40d49ea31f60d11', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/61.0.3163.100 Safari/537.36', 1509194911, ''),
('31c98efd48c3a8847cebe0e96b840480', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/61.0.3163.100 Safari/537.36', 1509194911, ''),
('21f6e5f458c720fb6cf7ee12575c93b1', '::1', 'Mozilla/5.0 (iPhone; CPU iPhone OS 9_1 like Mac OS X) AppleWebKit/601.1.46 (KHTML, like Gecko) Version/9.0 Mobile/13B143', 1509195155, ''),
('b22e0ba0cab5a0874f381a9816ac6924', '::1', 'Mozilla/5.0 (iPhone; CPU iPhone OS 9_1 like Mac OS X) AppleWebKit/601.1.46 (KHTML, like Gecko) Version/9.0 Mobile/13B143', 1509195155, ''),
('42aca40613b798fdf33cb438930ca9e3', '::1', 'Mozilla/5.0 (iPhone; CPU iPhone OS 9_1 like Mac OS X) AppleWebKit/601.1.46 (KHTML, like Gecko) Version/9.0 Mobile/13B143', 1509195155, ''),
('07bbcc16e0a900439896080486cc2bd5', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/61.0.3163.100 Safari/537.36', 1509280547, 'a:1:{s:9:"user_data";s:0:"";}'),
('023c5fb8746ecd89cd7ea545f8f482af', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/61.0.3163.100 Safari/537.36', 1509280547, ''),
('4595b0bbfc156d6bb6e5d98af7930161', '::1', 'Mozilla/5.0 (iPhone; CPU iPhone OS 9_1 like Mac OS X) AppleWebKit/601.1.46 (KHTML, like Gecko) Version/9.0 Mobile/13B143', 1509282021, ''),
('11622bc9e808d415a4cad06a7e62562d', '::1', 'Mozilla/5.0 (iPhone; CPU iPhone OS 9_1 like Mac OS X) AppleWebKit/601.1.46 (KHTML, like Gecko) Version/9.0 Mobile/13B143', 1509282021, ''),
('d1fddfaf5f16078c780719220af4214a', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/61.0.3163.100 Safari/537.36', 1509280225, 'a:2:{s:9:"user_data";s:0:"";s:7:"carpool";a:5:{s:10:"user_email";s:15:"demo1@gmail.com";s:6:"access";s:6:"travel";s:7:"user_id";s:1:"1";s:7:"trip_id";b:0;s:6:"expire";i:1509282588;}}'),
('153789b3194b1e073ec0198f9225d878', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/61.0.3163.100 Safari/537.36', 1509282157, ''),
('6d7dd3a26c2a45d045ce1fd215845688', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/61.0.3163.100 Safari/537.36', 1509282157, ''),
('8bfe12e31784fdb7a45db5862c3bc840', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/61.0.3163.100 Safari/537.36', 1509282157, 'a:2:{s:9:"user_data";s:0:"";s:7:"carpool";a:5:{s:10:"user_email";s:15:"demo1@gmail.com";s:6:"access";s:6:"travel";s:7:"user_id";s:1:"1";s:7:"trip_id";b:0;s:6:"expire";i:1509282954;}}'),
('540ffa243b2165a5395a6ddc59c57e2e', '::1', 'Mozilla/5.0 (iPhone; CPU iPhone OS 9_1 like Mac OS X) AppleWebKit/601.1.46 (KHTML, like Gecko) Version/9.0 Mobile/13B143', 1509282404, ''),
('a45b6707ab17d5433e042c56ab04f8cb', '::1', 'Mozilla/5.0 (iPhone; CPU iPhone OS 9_1 like Mac OS X) AppleWebKit/601.1.46 (KHTML, like Gecko) Version/9.0 Mobile/13B143', 1509282404, ''),
('921c5722dfc72640d6dfb8633df692c7', '::1', 'Mozilla/5.0 (iPhone; CPU iPhone OS 9_1 like Mac OS X) AppleWebKit/601.1.46 (KHTML, like Gecko) Version/9.0 Mobile/13B143', 1509282404, 'a:2:{s:9:"user_data";s:0:"";s:18:"flash:old:redirect";s:13:"addtrip/check";}'),
('d792a7b2d49033bb2f87deafefc76360', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/61.0.3163.100 Safari/537.36', 1509288433, 'a:1:{s:9:"user_data";s:0:"";}'),
('18856fe7a44f03e209e7e8b53944681a', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/61.0.3163.100 Safari/537.36', 1509288433, ''),
('e07338652b5a6a6478ab79acdf46933a', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/61.0.3163.100 Safari/537.36', 1509288433, 'a:2:{s:9:"user_data";s:0:"";s:7:"carpool";a:5:{s:10:"user_email";s:15:"demo1@gmail.com";s:6:"access";s:6:"travel";s:7:"user_id";s:1:"1";s:7:"trip_id";b:0;s:6:"expire";i:1509289880;}}'),
('504b74f8b15bd22ae439d8dc0c677fd4', '::1', 'Mozilla/5.0 (iPhone; CPU iPhone OS 9_1 like Mac OS X) AppleWebKit/601.1.46 (KHTML, like Gecko) Version/9.0 Mobile/13B143', 1509355048, 'a:1:{s:9:"user_data";s:0:"";}'),
('cf66e9fb9a81e80246e4faad0bbf0e83', '::1', 'Mozilla/5.0 (iPhone; CPU iPhone OS 9_1 like Mac OS X) AppleWebKit/601.1.46 (KHTML, like Gecko) Version/9.0 Mobile/13B143', 1509355048, ''),
('0b76de8d47ac840f37db03c5ec996c5c', '::1', 'Mozilla/5.0 (iPhone; CPU iPhone OS 9_1 like Mac OS X) AppleWebKit/601.1.46 (KHTML, like Gecko) Version/9.0 Mobile/13B143', 1509289300, ''),
('1b2380808d99c9b3c5de68dd3ff01a5d', '::1', 'Mozilla/5.0 (iPhone; CPU iPhone OS 9_1 like Mac OS X) AppleWebKit/601.1.46 (KHTML, like Gecko) Version/9.0 Mobile/13B143', 1509289300, ''),
('a2f4ef7248d100c5174a033d7467dfe0', '::1', 'Mozilla/5.0 (iPhone; CPU iPhone OS 9_1 like Mac OS X) AppleWebKit/601.1.46 (KHTML, like Gecko) Version/9.0 Mobile/13B143', 1509289301, ''),
('27063505cfd437a5a61ac532184c0bbb', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/61.0.3163.100 Safari/537.36', 1509289752, ''),
('b783b1dbeca49adc83a545ba5a655f70', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/61.0.3163.100 Safari/537.36', 1509289752, ''),
('726fa4a6e29d40c49be88567aadf82ff', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/61.0.3163.100 Safari/537.36', 1509289752, 'a:2:{s:9:"user_data";s:0:"";s:7:"carpool";a:5:{s:10:"user_email";s:15:"demo1@gmail.com";s:6:"access";s:6:"travel";s:7:"user_id";s:1:"1";s:7:"trip_id";b:0;s:6:"expire";i:1509290918;}}'),
('866c2c0d712cef97c8289801fa0367ae', '::1', 'Mozilla/5.0 (iPhone; CPU iPhone OS 9_1 like Mac OS X) AppleWebKit/601.1.46 (KHTML, like Gecko) Version/9.0 Mobile/13B143', 1509290562, ''),
('49c4672f2d2abadd7ef168f01b2564d9', '::1', 'Mozilla/5.0 (iPhone; CPU iPhone OS 9_1 like Mac OS X) AppleWebKit/601.1.46 (KHTML, like Gecko) Version/9.0 Mobile/13B143', 1509290562, ''),
('71a985d6fd6897d02f563eba66dffcf4', '::1', 'Mozilla/5.0 (iPhone; CPU iPhone OS 9_1 like Mac OS X) AppleWebKit/601.1.46 (KHTML, like Gecko) Version/9.0 Mobile/13B143', 1509290562, ''),
('2d4a2f615be9423bd489d7b3a4be453b', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/61.0.3163.100 Safari/537.36', 1509290568, ''),
('85c84f983efe1e9c2a327c05f2c3dae4', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/61.0.3163.100 Safari/537.36', 1509290568, ''),
('ff5e49e2678ed176d4c8c189c7e03c24', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/61.0.3163.100 Safari/537.36', 1509290568, 'a:2:{s:9:"user_data";s:0:"";s:7:"carpool";a:5:{s:10:"user_email";s:15:"demo1@gmail.com";s:6:"access";s:6:"travel";s:7:"user_id";s:1:"1";s:7:"trip_id";b:0;s:6:"expire";i:1509291763;}}'),
('9f89c86bcbf1a92ec1fcadaaa108bf2e', '::1', 'Mozilla/5.0 (iPhone; CPU iPhone OS 9_1 like Mac OS X) AppleWebKit/601.1.46 (KHTML, like Gecko) Version/9.0 Mobile/13B143', 1509291213, ''),
('7b4a3bf0437ffef7c60b0b85c59fcd6f', '::1', 'Mozilla/5.0 (iPhone; CPU iPhone OS 9_1 like Mac OS X) AppleWebKit/601.1.46 (KHTML, like Gecko) Version/9.0 Mobile/13B143', 1509291213, ''),
('739f0d219681265875351e6927e6008f', '::1', 'Mozilla/5.0 (iPhone; CPU iPhone OS 9_1 like Mac OS X) AppleWebKit/601.1.46 (KHTML, like Gecko) Version/9.0 Mobile/13B143', 1509291213, ''),
('1b48f43af4c99c366ac8985cf07245a6', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/61.0.3163.100 Safari/537.36', 1509291278, 'a:1:{s:9:"user_data";s:0:"";}'),
('6541ee11f3eafb2c68a6e63bc35a0827', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/61.0.3163.100 Safari/537.36', 1509291278, ''),
('e47e7428e08068d4d6f896f4e7c577b5', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/61.0.3163.100 Safari/537.36', 1509291278, 'a:2:{s:9:"user_data";s:0:"";s:7:"carpool";a:5:{s:10:"user_email";s:15:"demo1@gmail.com";s:6:"access";s:6:"travel";s:7:"user_id";s:1:"1";s:7:"trip_id";b:0;s:6:"expire";i:1509292075;}}'),
('f11d4f6f9e4fb5f746993db19b5a19ef', '::1', 'Mozilla/5.0 (iPhone; CPU iPhone OS 9_1 like Mac OS X) AppleWebKit/601.1.46 (KHTML, like Gecko) Version/9.0 Mobile/13B143', 1509291480, ''),
('5ee4402942cbfda7343e55c3a172674d', '::1', 'Mozilla/5.0 (iPhone; CPU iPhone OS 9_1 like Mac OS X) AppleWebKit/601.1.46 (KHTML, like Gecko) Version/9.0 Mobile/13B143', 1509291480, ''),
('9c6e2894dafc7e1897e8cff23afcd05c', '::1', 'Mozilla/5.0 (iPhone; CPU iPhone OS 9_1 like Mac OS X) AppleWebKit/601.1.46 (KHTML, like Gecko) Version/9.0 Mobile/13B143', 1509291480, 'a:2:{s:9:"user_data";s:0:"";s:7:"carpool";a:5:{s:10:"user_email";s:15:"demo1@gmail.com";s:6:"access";s:6:"travel";s:7:"user_id";s:1:"1";s:7:"trip_id";b:0;s:6:"expire";i:1509292151;}}'),
('fc798173da2a28f276b1401945edbb55', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/61.0.3163.100 Safari/537.36', 1509291797, ''),
('93c0613693cdde9984b4e5709aa1c151', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/61.0.3163.100 Safari/537.36', 1509291797, ''),
('e38f0b3c627d26cba3aa871aba04df58', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/61.0.3163.100 Safari/537.36', 1509291798, 'a:2:{s:9:"user_data";s:0:"";s:7:"carpool";a:5:{s:10:"user_email";s:15:"demo1@gmail.com";s:6:"access";s:6:"travel";s:7:"user_id";s:1:"1";s:7:"trip_id";b:0;s:6:"expire";i:1509293251;}}'),
('bafa6cff89634bf1d3de054aa96f4269', '::1', 'Mozilla/5.0 (iPhone; CPU iPhone OS 9_1 like Mac OS X) AppleWebKit/601.1.46 (KHTML, like Gecko) Version/9.0 Mobile/13B143', 1509292883, ''),
('d2e811b4f1f682d6113d9af541fa4f0a', '::1', 'Mozilla/5.0 (iPhone; CPU iPhone OS 9_1 like Mac OS X) AppleWebKit/601.1.46 (KHTML, like Gecko) Version/9.0 Mobile/13B143', 1509292883, ''),
('32e15b0216bcec0c1817cba5c63db7bc', '::1', 'Mozilla/5.0 (iPhone; CPU iPhone OS 9_1 like Mac OS X) AppleWebKit/601.1.46 (KHTML, like Gecko) Version/9.0 Mobile/13B143', 1509292883, ''),
('6f60534a878701044ec6fe9daf78c7c9', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/61.0.3163.100 Safari/537.36', 1509293053, ''),
('1263a5a113c55ecb889a47c9fcfad5e5', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/61.0.3163.100 Safari/537.36', 1509293053, ''),
('41111c4f7be57e6058e0f398231cf9a8', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/61.0.3163.100 Safari/537.36', 1509293053, ''),
('133df38bc9d67e8d1600d3c0c666b337', '::1', 'Mozilla/5.0 (iPhone; CPU iPhone OS 9_1 like Mac OS X) AppleWebKit/601.1.46 (KHTML, like Gecko) Version/9.0 Mobile/13B143', 1509293671, ''),
('ef28a869e50efd41920b372ef744c6b3', '::1', 'Mozilla/5.0 (iPhone; CPU iPhone OS 9_1 like Mac OS X) AppleWebKit/601.1.46 (KHTML, like Gecko) Version/9.0 Mobile/13B143', 1509293671, ''),
('b4b0df7bb7071e11db8ebd74254d0837', '::1', 'Mozilla/5.0 (iPhone; CPU iPhone OS 9_1 like Mac OS X) AppleWebKit/601.1.46 (KHTML, like Gecko) Version/9.0 Mobile/13B143', 1509293671, ''),
('dd8b7ee72eaa2579cb1d86349c4481e5', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/61.0.3163.100 Safari/537.36', 1509293734, ''),
('f0b6fcd56a15df15f8002b1b79dac768', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/61.0.3163.100 Safari/537.36', 1509293734, ''),
('d91050a38edd4a3dfa97319adb787eae', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/61.0.3163.100 Safari/537.36', 1509293734, ''),
('28ff8ae69a282cc89e7537c460990470', '::1', 'Mozilla/5.0 (iPhone; CPU iPhone OS 9_1 like Mac OS X) AppleWebKit/601.1.46 (KHTML, like Gecko) Version/9.0 Mobile/13B143', 1509293795, ''),
('14dcef7efa4440b2ea76161556bf658d', '::1', 'Mozilla/5.0 (iPhone; CPU iPhone OS 9_1 like Mac OS X) AppleWebKit/601.1.46 (KHTML, like Gecko) Version/9.0 Mobile/13B143', 1509293795, ''),
('4b75bfd9202207e2b95c2b654f30966d', '::1', 'Mozilla/5.0 (iPhone; CPU iPhone OS 9_1 like Mac OS X) AppleWebKit/601.1.46 (KHTML, like Gecko) Version/9.0 Mobile/13B143', 1509293795, ''),
('c4351d56c7d97ed5958a1ccc70acac58', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/61.0.3163.100 Safari/537.36', 1509293815, 'a:1:{s:9:"user_data";s:0:"";}'),
('d0c16991763da073317ec21599728e05', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/61.0.3163.100 Safari/537.36', 1509293815, ''),
('6c52de97c29c69a606dc95330512063d', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/61.0.3163.100 Safari/537.36', 1509293815, 'a:2:{s:9:"user_data";s:0:"";s:7:"carpool";a:5:{s:10:"user_email";s:15:"demo1@gmail.com";s:6:"access";s:6:"travel";s:7:"user_id";s:1:"1";s:7:"trip_id";b:0;s:6:"expire";i:1509294700;}}'),
('683539e40a7580b36bff76e38802ec1d', '::1', 'Mozilla/5.0 (iPhone; CPU iPhone OS 9_1 like Mac OS X) AppleWebKit/601.1.46 (KHTML, like Gecko) Version/9.0 Mobile/13B143', 1509294118, ''),
('9b87e3324f6c9e6cc33eb3f13f0001a5', '::1', 'Mozilla/5.0 (iPhone; CPU iPhone OS 9_1 like Mac OS X) AppleWebKit/601.1.46 (KHTML, like Gecko) Version/9.0 Mobile/13B143', 1509294118, ''),
('580e94a59a278c55cf3a870fe4740ff1', '::1', 'Mozilla/5.0 (iPhone; CPU iPhone OS 9_1 like Mac OS X) AppleWebKit/601.1.46 (KHTML, like Gecko) Version/9.0 Mobile/13B143', 1509294118, 'a:2:{s:9:"user_data";s:0:"";s:7:"carpool";a:5:{s:10:"user_email";s:15:"demo1@gmail.com";s:6:"access";s:6:"travel";s:7:"user_id";s:1:"1";s:7:"trip_id";b:0;s:6:"expire";i:1509295378;}}'),
('bf2b92c4258d4711bb3f4573e951b7a3', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/61.0.3163.100 Safari/537.36', 1509294863, 'a:1:{s:9:"user_data";s:0:"";}'),
('eaa9981d4236f7bce4fef083a91318e5', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/61.0.3163.100 Safari/537.36', 1509294863, ''),
('cb3c23dedd2af4335ad10f55d7a23251', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/61.0.3163.100 Safari/537.36', 1509294863, ''),
('b9f7d5a615d2f6b5a833f44ac94eba80', '::1', 'Mozilla/5.0 (iPhone; CPU iPhone OS 9_1 like Mac OS X) AppleWebKit/601.1.46 (KHTML, like Gecko) Version/9.0 Mobile/13B143', 1509294868, ''),
('e0479468f4b524f2fe88676a4f02bdce', '::1', 'Mozilla/5.0 (iPhone; CPU iPhone OS 9_1 like Mac OS X) AppleWebKit/601.1.46 (KHTML, like Gecko) Version/9.0 Mobile/13B143', 1509294868, ''),
('517f71ee29736b72976ac94ee3eb06dd', '::1', 'Mozilla/5.0 (iPhone; CPU iPhone OS 9_1 like Mac OS X) AppleWebKit/601.1.46 (KHTML, like Gecko) Version/9.0 Mobile/13B143', 1509294868, 'a:2:{s:9:"user_data";s:0:"";s:7:"carpool";a:5:{s:10:"user_email";s:15:"demo1@gmail.com";s:6:"access";s:6:"travel";s:7:"user_id";s:1:"1";s:7:"trip_id";b:0;s:6:"expire";i:1509295473;}}'),
('7c23be0bb04b7235391eb871699dee63', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/61.0.3163.100 Safari/537.36', 1509294879, 'a:1:{s:9:"user_data";s:0:"";}'),
('159645a55a644bc8e60715f067a00115', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/61.0.3163.100 Safari/537.36', 1509294879, ''),
('386743e0c3f8d8929248e5e36ea1adaa', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/61.0.3163.100 Safari/537.36', 1509294879, 'a:2:{s:9:"user_data";s:0:"";s:7:"carpool";a:5:{s:10:"user_email";s:15:"demo1@gmail.com";s:6:"access";s:6:"travel";s:7:"user_id";s:1:"1";s:7:"trip_id";b:0;s:6:"expire";i:1509296063;}}'),
('9bcc1029040efc88b4d8d7d3b5ada9a9', '::1', 'Mozilla/5.0 (iPhone; CPU iPhone OS 9_1 like Mac OS X) AppleWebKit/601.1.46 (KHTML, like Gecko) Version/9.0 Mobile/13B143', 1509295510, 'a:1:{s:9:"user_data";s:0:"";}'),
('3befe4c923be415092eb021739f9b34c', '::1', 'Mozilla/5.0 (iPhone; CPU iPhone OS 9_1 like Mac OS X) AppleWebKit/601.1.46 (KHTML, like Gecko) Version/9.0 Mobile/13B143', 1509295510, ''),
('4a7f00a84aada29898686cb6ae680727', '::1', 'Mozilla/5.0 (iPhone; CPU iPhone OS 9_1 like Mac OS X) AppleWebKit/601.1.46 (KHTML, like Gecko) Version/9.0 Mobile/13B143', 1509295510, 'a:2:{s:9:"user_data";s:0:"";s:7:"carpool";a:5:{s:10:"user_email";s:15:"demo1@gmail.com";s:6:"access";s:6:"travel";s:7:"user_id";s:1:"1";s:7:"trip_id";b:0;s:6:"expire";i:1509296356;}}'),
('4d785d273e39c5386619555aeb320536', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/61.0.3163.100 Safari/537.36', 1509295845, 'a:1:{s:9:"user_data";s:0:"";}'),
('aba796b6dd14da22f0a7fa09f5a56253', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/61.0.3163.100 Safari/537.36', 1509295845, ''),
('ad52ec29bedbe0e8fc11421106da1e84', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/61.0.3163.100 Safari/537.36', 1509295845, 'a:2:{s:9:"user_data";s:0:"";s:7:"carpool";a:5:{s:10:"user_email";s:15:"demo1@gmail.com";s:6:"access";s:6:"travel";s:7:"user_id";s:1:"1";s:7:"trip_id";b:0;s:6:"expire";i:1509296784;}}'),
('6bc4bd4fa61c523230ff6138cc86b887', '::1', 'Mozilla/5.0 (iPhone; CPU iPhone OS 9_1 like Mac OS X) AppleWebKit/601.1.46 (KHTML, like Gecko) Version/9.0 Mobile/13B143', 1509296302, ''),
('7a07ca36e30a6ed850cd9a6a7c4ab006', '::1', 'Mozilla/5.0 (iPhone; CPU iPhone OS 9_1 like Mac OS X) AppleWebKit/601.1.46 (KHTML, like Gecko) Version/9.0 Mobile/13B143', 1509296302, ''),
('54148a8c3f00e13038c505f6fc3bfdd1', '::1', 'Mozilla/5.0 (iPhone; CPU iPhone OS 9_1 like Mac OS X) AppleWebKit/601.1.46 (KHTML, like Gecko) Version/9.0 Mobile/13B143', 1509296302, 'a:2:{s:9:"user_data";s:0:"";s:7:"carpool";a:5:{s:10:"user_email";s:15:"demo1@gmail.com";s:6:"access";s:6:"travel";s:7:"user_id";s:1:"1";s:7:"trip_id";b:0;s:6:"expire";i:1509297495;}}'),
('4ab803563b17bf307640fd4794a8c3c7', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/61.0.3163.100 Safari/537.36', 1509348953, 'a:1:{s:9:"user_data";s:0:"";}'),
('14baa94606d31983d1529e86209649c0', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/61.0.3163.100 Safari/537.36', 1509348953, ''),
('1231671e3bd0db2e06400f1e9e13e246', '::1', 'Mozilla/5.0 (iPhone; CPU iPhone OS 9_1 like Mac OS X) AppleWebKit/601.1.46 (KHTML, like Gecko) Version/9.0 Mobile/13B143', 1509355048, ''),
('5c9922cab794acb5aaf0497d2c273150', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/61.0.3163.100 Safari/537.36', 1509355585, 'a:1:{s:9:"user_data";s:0:"";}'),
('8f3491891e7324d0ae2787404122b9a7', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/61.0.3163.100 Safari/537.36', 1509353887, 'a:2:{s:9:"user_data";s:0:"";s:7:"carpool";a:5:{s:10:"user_email";s:15:"demo1@gmail.com";s:6:"access";s:6:"travel";s:7:"user_id";s:1:"1";s:7:"trip_id";a:0:{}s:6:"expire";i:1509355495;}}'),
('58424e3abc2febc2a92d312797237eb8', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/61.0.3163.100 Safari/537.36', 1509355585, ''),
('efdc3f6dcf30df36105c4bb16d1cbedb', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/61.0.3163.100 Safari/537.36', 1509355585, 'a:2:{s:9:"user_data";s:0:"";s:7:"carpool";a:5:{s:10:"user_email";s:15:"demo1@gmail.com";s:6:"access";s:6:"travel";s:7:"user_id";s:1:"1";s:7:"trip_id";a:0:{}s:6:"expire";i:1509360407;}}'),
('e7b5231c4cf00ff4542e6433f64aff83', '::1', 'Mozilla/5.0 (iPhone; CPU iPhone OS 9_1 like Mac OS X) AppleWebKit/601.1.46 (KHTML, like Gecko) Version/9.0 Mobile/13B143', 1509360090, 'a:1:{s:9:"user_data";s:0:"";}'),
('9b73cac1f77ba2bae1e104b9b56380df', '::1', 'Mozilla/5.0 (iPhone; CPU iPhone OS 9_1 like Mac OS X) AppleWebKit/601.1.46 (KHTML, like Gecko) Version/9.0 Mobile/13B143', 1509360090, ''),
('d61a8dc10b98dc2acea164f3a37cd23d', '::1', 'Mozilla/5.0 (iPhone; CPU iPhone OS 9_1 like Mac OS X) AppleWebKit/601.1.46 (KHTML, like Gecko) Version/9.0 Mobile/13B143', 1509360090, ''),
('38240ed71d6636dfc870693328b5961a', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/61.0.3163.100 Safari/537.36', 1509360264, 'a:1:{s:9:"user_data";s:0:"";}'),
('bf7013a440733a773f02d09031a0c833', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/61.0.3163.100 Safari/537.36', 1509360264, ''),
('13fd41ebc836e8b5578b5db83cc48fd5', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/61.0.3163.100 Safari/537.36', 1509360264, 'a:2:{s:9:"user_data";s:0:"";s:7:"carpool";a:5:{s:10:"user_email";s:15:"demo1@gmail.com";s:6:"access";s:6:"travel";s:7:"user_id";s:1:"1";s:7:"trip_id";a:0:{}s:6:"expire";i:1509361249;}}'),
('9cd5f8f4b61ed019212fcf2af073532b', '::1', 'Mozilla/5.0 (iPhone; CPU iPhone OS 9_1 like Mac OS X) AppleWebKit/601.1.46 (KHTML, like Gecko) Version/9.0 Mobile/13B143', 1509360668, 'a:1:{s:9:"user_data";s:0:"";}'),
('f84372a627cb2011facd487d47a12d20', '::1', 'Mozilla/5.0 (iPhone; CPU iPhone OS 9_1 like Mac OS X) AppleWebKit/601.1.46 (KHTML, like Gecko) Version/9.0 Mobile/13B143', 1509360668, ''),
('4a44a555c0c9a83d2125f6d03be6b039', '::1', 'Mozilla/5.0 (iPhone; CPU iPhone OS 9_1 like Mac OS X) AppleWebKit/601.1.46 (KHTML, like Gecko) Version/9.0 Mobile/13B143', 1509360668, 'a:2:{s:9:"user_data";s:0:"";s:7:"carpool";a:5:{s:10:"user_email";s:15:"demo1@gmail.com";s:6:"access";s:6:"travel";s:7:"user_id";s:1:"1";s:7:"trip_id";a:0:{}s:6:"expire";i:1509361884;}}'),
('a113861996b093ca3c086c5cc22ae74c', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/61.0.3163.100 Safari/537.36', 1509361297, 'a:1:{s:9:"user_data";s:0:"";}'),
('c29ea5319b357eef1920cfc172481b49', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/61.0.3163.100 Safari/537.36', 1509361297, ''),
('81eae71176d34557f2f5603af29de20c', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/61.0.3163.100 Safari/537.36', 1509361297, 'a:2:{s:9:"user_data";s:0:"";s:7:"carpool";a:5:{s:10:"user_email";s:15:"demo1@gmail.com";s:6:"access";s:6:"travel";s:7:"user_id";s:1:"1";s:7:"trip_id";a:0:{}s:6:"expire";i:1509363097;}}'),
('9be2e39cc285ca3700d85d243f17cbc2', '::1', 'Mozilla/5.0 (iPhone; CPU iPhone OS 9_1 like Mac OS X) AppleWebKit/601.1.46 (KHTML, like Gecko) Version/9.0 Mobile/13B143', 1509362581, ''),
('2884fe02287985c874da5550e5e1e534', '::1', 'Mozilla/5.0 (iPhone; CPU iPhone OS 9_1 like Mac OS X) AppleWebKit/601.1.46 (KHTML, like Gecko) Version/9.0 Mobile/13B143', 1509362581, ''),
('10f4a63739d8fb2e899cb56a58229258', '::1', 'Mozilla/5.0 (iPhone; CPU iPhone OS 9_1 like Mac OS X) AppleWebKit/601.1.46 (KHTML, like Gecko) Version/9.0 Mobile/13B143', 1509362581, ''),
('9bc2d9cdc71b876998e4588132ffda7d', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/61.0.3163.100 Safari/537.36', 1509468528, 'a:1:{s:9:"user_data";s:0:"";}'),
('a074805a4c2c73804d38129704e5c4f1', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/61.0.3163.100 Safari/537.36', 1509468528, ''),
('2338c41f68ec48fb9b373281260f3bb6', '::1', 'Mozilla/5.0 (iPhone; CPU iPhone OS 9_1 like Mac OS X) AppleWebKit/601.1.46 (KHTML, like Gecko) Version/9.0 Mobile/13B143', 1509435447, 'a:1:{s:9:"user_data";s:0:"";}'),
('3f9eb440d59b7c2da240543bb2c17928', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/61.0.3163.100 Safari/537.36', 1509468530, 'a:2:{s:9:"user_data";s:0:"";s:7:"carpool";a:5:{s:10:"user_email";s:15:"demo1@gmail.com";s:6:"access";s:6:"travel";s:7:"user_id";s:1:"1";s:7:"trip_id";a:0:{}s:6:"expire";i:1509442625;}}'),
('c33e406da10194a6ed01f28739264233', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:56.0) Gecko/20100101 Firefox/56.0', 1509468455, 'a:2:{s:9:"user_data";s:0:"";s:7:"carpool";a:5:{s:10:"user_email";s:15:"demo2@gmail.com";s:6:"access";s:6:"travel";s:7:"user_id";s:1:"2";s:7:"trip_id";b:0;s:6:"expire";i:1509480449;}}'),
('7923b4eaff83f178b70e9aaceb8ac84b', '::1', 'Mozilla/5.0 (iPhone; CPU iPhone OS 9_1 like Mac OS X) AppleWebKit/601.1.46 (KHTML, like Gecko) Version/9.0 Mobile/13B143', 1509435447, ''),
('6ee1e354e5128e64ce7c68753a729937', '::1', 'Mozilla/5.0 (iPhone; CPU iPhone OS 9_1 like Mac OS X) AppleWebKit/601.1.46 (KHTML, like Gecko) Version/9.0 Mobile/13B143', 1509436014, 'a:2:{s:9:"user_data";s:0:"";s:7:"carpool";a:5:{s:10:"user_email";s:15:"demo1@gmail.com";s:6:"access";s:6:"travel";s:7:"user_id";s:1:"1";s:7:"trip_id";a:0:{}s:6:"expire";i:1509443544;}}'),
('78c52c48f6dcc8bcd3b04229a78af9f1', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/61.0.3163.100 Safari/537.36', 1509452238, 'a:1:{s:9:"user_data";s:0:"";}'),
('8329eb111aa07c98428895e0259fe961', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/61.0.3163.100 Safari/537.36', 1509452238, ''),
('970d43027b7e141097cd3b81b0008ca9', '::1', 'Mozilla/5.0 (iPhone; CPU iPhone OS 9_1 like Mac OS X) AppleWebKit/601.1.46 (KHTML, like Gecko) Version/9.0 Mobile/13B143', 1509457868, ''),
('a932ca510db807d673b28332ca2a7097', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/61.0.3163.100 Safari/537.36', 1509452238, 'a:2:{s:9:"user_data";s:0:"";s:7:"carpool";a:5:{s:10:"user_email";s:15:"demo1@gmail.com";s:6:"access";s:6:"travel";s:7:"user_id";s:1:"1";s:7:"trip_id";a:0:{}s:6:"expire";i:1509465026;}}'),
('dbed24d73449abf5ae1db4ba5babe981', '::1', 'Mozilla/5.0 (iPhone; CPU iPhone OS 9_1 like Mac OS X) AppleWebKit/601.1.46 (KHTML, like Gecko) Version/9.0 Mobile/13B143', 1509457868, ''),
('f4cb8777f9a437a4de03c54644e7ef6a', '::1', 'Mozilla/5.0 (iPhone; CPU iPhone OS 9_1 like Mac OS X) AppleWebKit/601.1.46 (KHTML, like Gecko) Version/9.0 Mobile/13B143', 1509457868, 'a:2:{s:9:"user_data";s:0:"";s:7:"carpool";a:5:{s:10:"user_email";s:15:"demo1@gmail.com";s:6:"access";s:6:"travel";s:7:"user_id";s:1:"1";s:7:"trip_id";a:0:{}s:6:"expire";i:1509465073;}}'),
('a7577375a20bd013c9b02bfd77a39e85', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/61.0.3163.100 Safari/537.36', 1509473425, 'a:1:{s:9:"user_data";s:0:"";}'),
('3ad38f18ec06921de61b78a57251012b', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/61.0.3163.100 Safari/537.36', 1509473425, ''),
('d6b92cd1147113538e6b60bad0aed2b6', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/61.0.3163.100 Safari/537.36', 1509473738, 'a:2:{s:9:"user_data";s:0:"";s:7:"carpool";a:5:{s:10:"user_email";s:15:"demo1@gmail.com";s:6:"access";s:6:"travel";s:7:"user_id";s:1:"1";s:7:"trip_id";a:0:{}s:6:"expire";i:1509481662;}}'),
('3ae06ba622efa69e83d6433f7aed9a37', '213.174.0.230', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/61.0.3163.100 Safari/537.36', 1509489845, 'a:1:{s:9:"user_data";s:0:"";}'),
('8f6680bea13a031daa1c05e4674b475d', '213.174.0.230', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/61.0.3163.100 Safari/537.36', 1509489845, 'a:2:{s:9:"user_data";s:0:"";s:5:"admin";a:4:{s:2:"id";s:1:"1";s:4:"name";N;s:5:"email";s:19:"webrobota@gmail.com";s:6:"expire";i:1509488895;}}'),
('cb8730d9e721ebba0aa84673909cca57', '213.174.0.230', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:56.0) Gecko/20100101 Firefox/56.0', 1509540666, ''),
('4ffa0b77a159b7f2a54ebc50fd3f6b49', '86.187.146.247', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/61.0.3163.100 Safari/537.3', 1509730477, 'a:1:{s:9:"user_data";s:0:"";}'),
('f11725c9023220f06b3ccb67de2af52b', '213.174.0.230', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:56.0) Gecko/20100101 Firefox/56.0', 1509540666, ''),
('a409d7a678c775501f66e2e334fcfa82', '213.174.0.230', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:56.0) Gecko/20100101 Firefox/56.0', 1509540666, 'a:2:{s:9:"user_data";s:0:"";s:7:"carpool";a:5:{s:10:"user_email";s:15:"demo2@gmail.com";s:6:"access";s:6:"travel";s:7:"user_id";s:1:"2";s:7:"trip_id";b:0;s:6:"expire";i:1509548013;}}'),
('8bc1d8111db2f93349c6a66099973070', '86.187.121.92', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_6) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/61.0.3163.100 Safari/537.3', 1509974347, 'a:1:{s:9:"user_data";s:0:"";}'),
('f03ac68f0a238bc0dacd30a267a31ac1', '86.187.121.92', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_6) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/61.0.3163.100 Safari/537.3', 1509974347, ''),
('b407737f1c28411f78afb4431ec2f291', '213.205.251.82', 'Mozilla/5.0 (iPhone; CPU iPhone OS 10_3_3 like Mac OS X) AppleWebKit/603.3.8 (KHTML, like Gecko) Version/10.0 Mobile/14G', 1509932574, ''),
('6fd7c0f1b9c23d9f139005528f2efa1c', '213.205.251.82', 'Mozilla/5.0 (iPhone; CPU iPhone OS 10_3_3 like Mac OS X) AppleWebKit/603.3.8 (KHTML, like Gecko) Version/10.0 Mobile/14G', 1509932574, ''),
('50d26b91af178bdc619ee47987fe11bd', '213.205.251.82', 'Mozilla/5.0 (iPhone; CPU iPhone OS 10_3_3 like Mac OS X) AppleWebKit/603.3.8 (KHTML, like Gecko) Version/10.0 Mobile/14G', 1509932574, ''),
('4e19f1df10fd0507819cb204b0336b2f', '86.187.146.247', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/61.0.3163.100 Safari/537.3', 1509730477, ''),
('ce21b571c915ef5269f67575af0eaba0', '107.167.109.3', 'Opera/9.80 (Android; Opera Mini/31.0.2254/75.35; U; uk) Presto/2.12.423 Version/12.16', 1509961276, ''),
('ad121660d0fdac8da23682d500f84927', '213.174.0.230', 'Mozilla/5.0 (iPhone; CPU iPhone OS 9_1 like Mac OS X) AppleWebKit/601.1.46 (KHTML, like Gecko) Version/9.0 Mobile/13B143', 1509539833, ''),
('c7f180e110a5c2408eabb055ac6c4129', '213.174.0.230', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/61.0.3163.100 Safari/537.36', 1509485858, 'a:2:{s:9:"user_data";s:0:"";s:7:"carpool";a:5:{s:10:"user_email";s:17:"oohfiro@gmail.com";s:6:"access";s:6:"travel";s:7:"user_id";s:2:"13";s:7:"trip_id";a:0:{}s:6:"expire";i:1509497049;}}'),
('edc309bb4d1501e82fc9072adade7621', '66.249.93.78', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/49.0.2623.75 Safari/537.36 Google Favicon', 1509569331, ''),
('62568859272d74e9b439b6fd53e63d19', '66.249.93.82', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/49.0.2623.75 Safari/537.36 Google Favicon', 1509491713, ''),
('29b7ca8b31fb82c6de609173d2d339f2', '66.249.93.82', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/49.0.2623.75 Safari/537.36 Google Favicon', 1509491713, ''),
('5adc422492d2e248637129ea4a3195d5', '66.249.93.82', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/49.0.2623.75 Safari/537.36 Google Favicon', 1509491713, ''),
('8e2ac420c13924bb318e8da3b0adccb7', '46.211.1.227', 'Mozilla/5.0 (Linux; Android 6.0.1; SM-J500H Build/MMB29M) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/61.0.3163.98 Mob', 1509972118, 'a:2:{s:9:"user_data";s:0:"";s:17:"flash:old:message";s:24:"Your Trip Has Been Added";}'),
('2272dcee54f1eb71951febc848f74d54', '46.211.1.227', 'Mozilla/5.0 (Linux; Android 6.0.1; SM-J500H Build/MMB29M) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/61.0.3163.98 Mob', 1509972118, ''),
('8ecad0089eb2b9eb9f607785d9139e19', '107.167.104.201', 'Opera/9.80 (Android; Opera Mini/30.0.2254/73.132; U; uk) Presto/2.12.423 Version/12.16', 1509523592, 'a:2:{s:9:"user_data";s:0:"";s:17:"flash:old:message";s:44:"Your account has been verified and activated";}'),
('45a4ab94cfb615c2e2775871e4ade1d0', '107.167.104.201', 'Opera/9.80 (Android; Opera Mini/30.0.2254/73.132; U; uk) Presto/2.12.423 Version/12.16', 1509523592, ''),
('0e423968449167452e4cab33a35e51d2', '107.167.104.201', 'Opera/9.80 (Android; Opera Mini/30.0.2254/73.132; U; uk) Presto/2.12.423 Version/12.16', 1509523592, ''),
('d7b66fe419af10c125761b7db4c5300e', '80.169.192.12', 'Mozilla/5.0 (Linux; Android 8.0.0; Pixel Build/OPR3.170623.008) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/61.0.3163.', 1509916968, 'a:1:{s:9:"user_data";s:0:"";}'),
('e146a6e09ee53b39835e277f72e840e8', '80.169.192.12', 'Mozilla/5.0 (Linux; Android 8.0.0; Pixel Build/OPR3.170623.008) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/61.0.3163.', 1509916968, ''),
('ac1469d2a69332d7ff1155dc27b58013', '107.167.109.3', 'Opera/9.80 (Android; Opera Mini/31.0.2254/75.35; U; uk) Presto/2.12.423 Version/12.16', 1509961276, ''),
('9c1d6e81b02804e1a52442c625bf6319', '86.187.134.122', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_6) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/61.0.3163.100 Safari/537.3', 1509974347, 'a:2:{s:9:"user_data";s:0:"";s:7:"carpool";a:5:{s:10:"user_email";s:15:"demo1@gmail.com";s:6:"access";s:6:"travel";s:7:"user_id";s:1:"1";s:7:"trip_id";a:0:{}s:6:"expire";i:1509984890;}}'),
('ce3dce8506cb7109c2453c3d3997f6e1', '213.174.0.230', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/62.0.3202.75 Safari/537.36', 1509536730, 'a:1:{s:9:"user_data";s:0:"";}'),
('1992713295e96a04310a0f3f6ebc6486', '213.174.0.230', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/62.0.3202.75 Safari/537.36', 1509536730, ''),
('0de388d68edc9aa1efa7c0739174ab88', '213.174.0.230', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/62.0.3202.75 Safari/537.36', 1509536730, 'a:2:{s:9:"user_data";s:0:"";s:7:"carpool";a:5:{s:10:"user_email";s:17:"oohfiro@gmail.com";s:6:"access";s:6:"travel";s:7:"user_id";s:2:"13";s:7:"trip_id";a:0:{}s:6:"expire";i:1509546989;}}'),
('e792f46e73ce57a7593cfebb6b5e977c', '46.211.157.96', 'Mozilla/5.0 (Linux; Android 6.0.1; SM-J500H Build/MMB29M) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/61.0.3163.98 Mob', 1509972118, 'a:2:{s:9:"user_data";s:0:"";s:7:"carpool";a:5:{s:10:"user_email";s:17:"gekamys@gmail.com";s:6:"access";s:6:"travel";s:7:"user_id";s:2:"16";s:7:"trip_id";a:0:{}s:6:"expire";i:1509982898;}}'),
('ac7cc55dd12c75e1d4712ea977ba55b4', '213.174.0.230', 'Mozilla/5.0 (iPhone; CPU iPhone OS 9_1 like Mac OS X) AppleWebKit/601.1.46 (KHTML, like Gecko) Version/9.0 Mobile/13B143', 1509539833, ''),
('490a784f1d87a5d6f994008282b4c706', '213.174.0.230', 'Mozilla/5.0 (iPhone; CPU iPhone OS 9_1 like Mac OS X) AppleWebKit/601.1.46 (KHTML, like Gecko) Version/9.0 Mobile/13B143', 1509539834, ''),
('3f01a6f48f0bb98e3fa6d238bae48cba', '213.174.0.230', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/62.0.3202.75 Safari/537.36', 1509991857, 'a:1:{s:9:"user_data";s:0:"";}'),
('6948a0d3eec459aefd72f8dfda8f9fcc', '213.174.0.230', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/62.0.3202.75 Safari/537.36', 1509991858, 'a:1:{s:5:"admin";a:4:{s:2:"id";s:1:"1";s:4:"name";N;s:5:"email";s:19:"webrobota@gmail.com";s:6:"expire";i:1509981569;}}'),
('b4eb750d66dd502f9adc8287e7867ccc', '213.174.0.230', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/62.0.3202.75 Safari/537.36', 1509991858, 'a:2:{s:9:"user_data";s:0:"";s:7:"carpool";a:5:{s:10:"user_email";s:19:"webrobota@gmail.com";s:6:"access";s:6:"travel";s:7:"user_id";s:2:"18";s:7:"trip_id";b:0;s:6:"expire";i:1509985217;}}'),
('59e08c59dd7f1a43d200e6bc50033ed2', '107.167.109.3', 'Opera/9.80 (Android; Opera Mini/31.0.2254/75.35; U; uk) Presto/2.12.423 Version/12.16', 1509961276, ''),
('1dbaedf06d3bbaabaff985e4bd13595c', '66.249.93.78', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/49.0.2623.75 Safari/537.36 Google Favicon', 1509569331, ''),
('4105ab7df98eeed2b5a31385fa6f840c', '66.249.93.78', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/49.0.2623.75 Safari/537.36 Google Favicon', 1509569331, ''),
('aa6a80a456426237a188a11f57ed99a9', '185.69.145.246', 'Mozilla/5.0 (iPhone; CPU iPhone OS 11_0_3 like Mac OS X) AppleWebKit/604.1.38 (KHTML, like Gecko) Version/11.0 Mobile/15', 1509909593, ''),
('96351f7c5c92a7131e9430157c8106ec', '185.69.145.246', 'Mozilla/5.0 (iPhone; CPU iPhone OS 11_0_3 like Mac OS X) AppleWebKit/604.1.38 (KHTML, like Gecko) Version/11.0 Mobile/15', 1509909593, ''),
('2f45c8c6569b888d8bcc60890d8a86ad', '94.0.161.192', 'Mozilla/5.0 (iPhone; CPU iPhone OS 11_0_3 like Mac OS X) AppleWebKit/604.1.38 (KHTML, like Gecko) Version/11.0 Mobile/15', 1509909612, 'a:2:{s:9:"user_data";s:0:"";s:7:"carpool";a:5:{s:10:"user_email";s:18:"zach@sparrowapp.co";s:6:"access";s:6:"travel";s:7:"user_id";s:2:"14";s:7:"trip_id";b:0;s:6:"expire";i:1509916857;}}'),
('1d19b68025f7f078f3b4c49e19653f50', '109.159.85.179', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/61.0.3163.100 Safari/537.36', 1509931584, 'a:1:{s:9:"user_data";s:0:"";}'),
('ccef89a00aaaec8c1a53576af7fe1a5d', '109.159.85.179', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/61.0.3163.100 Safari/537.36', 1509931584, ''),
('5c54b514094ffab29bc3a7e49f4656aa', '109.159.85.179', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/61.0.3163.100 Safari/537.36', 1509931584, ''),
('bbac58dc4156ef479a83597ce9e88351', '86.188.23.105', 'Mozilla/5.0 (Linux; Android 8.0.0; Pixel Build/OPR3.170623.008) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/61.0.3163.', 1509916968, ''),
('a9f2cf9fa41bbb1d962691a58a1e052a', '66.249.93.82', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/49.0.2623.75 Safari/537.36 Google Favicon', 1509658307, ''),
('dcfd2f420d137f931e77499cd2ed94dc', '66.249.93.82', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/49.0.2623.75 Safari/537.36 Google Favicon', 1509658307, ''),
('f3fca2325d2905be20969ef7c5da9843', '66.249.93.82', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/49.0.2623.75 Safari/537.36 Google Favicon', 1509658307, ''),
('4f9c9c6383df245c097ff6ffdf1967c4', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/62.0.3202.75 Safari/537.36', 1509978639, 'a:1:{s:9:"user_data";s:0:"";}'),
('0254ae0a6f91586ab7c1e393c0ba0098', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/62.0.3202.75 Safari/537.36', 1509978639, 'a:1:{s:9:"user_data";s:0:"";}'),
('a79611fcd539d39be84917ec4f7d9d5b', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/62.0.3202.75 Safari/537.36', 1509978639, 'a:2:{s:9:"user_data";s:0:"";s:7:"carpool";a:5:{s:10:"user_email";s:15:"demo1@gmail.com";s:6:"access";s:6:"travel";s:7:"user_id";s:1:"1";s:7:"trip_id";a:0:{}s:6:"expire";i:1509987021;}}'),
('31cd578dc12a8cde7829b0b443b31c04', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/62.0.3202.75 Safari/537.36', 1509983217, ''),
('10abf6970770bffb5ac4235c9ce92c6a', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/62.0.3202.75 Safari/537.36', 1509983217, ''),
('5f19481838b39c1601819c973b19295e', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/62.0.3202.75 Safari/537.36', 1509983217, 'a:2:{s:9:"user_data";s:0:"";s:7:"carpool";a:5:{s:10:"user_email";s:15:"demo1@gmail.com";s:6:"access";s:6:"travel";s:7:"user_id";s:1:"1";s:7:"trip_id";a:0:{}s:6:"expire";i:1509990427;}}'),
('ce234e9f88d6d3512cfe66e411b71a33', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/62.0.3202.75 Safari/537.36', 1509984296, ''),
('210d7afe2a56e85f0eacbcc3a8cc896c', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/62.0.3202.75 Safari/537.36', 1509984296, ''),
('33df325319845dfa9006ea08212735c7', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/62.0.3202.75 Safari/537.36', 1509984296, ''),
('36e4e68f1bbc4a44a2ebbbb419448a3d', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/62.0.3202.75 Safari/537.36', 1510064639, ''),
('66dc26d0b7160453133e13fec8a99f76', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/62.0.3202.75 Safari/537.36', 1510064639, ''),
('fcf0221da18c88bfcb2861aac9c23f63', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/62.0.3202.75 Safari/537.36', 1510064644, 'a:2:{s:9:"user_data";s:0:"";s:7:"carpool";a:5:{s:10:"user_email";s:15:"demo1@gmail.com";s:6:"access";s:6:"travel";s:7:"user_id";s:1:"1";s:7:"trip_id";a:0:{}s:6:"expire";i:1510073773;}}'),
('0df21f56e71f7d8864cc713b09bd2c62', '::1', 'Mozilla/5.0 (iPhone; CPU iPhone OS 9_1 like Mac OS X) AppleWebKit/601.1.46 (KHTML, like Gecko) Version/9.0 Mobile/13B143', 1510066703, ''),
('10c4f32cc6be41196bb823e12aea0b5b', '::1', 'Mozilla/5.0 (iPhone; CPU iPhone OS 9_1 like Mac OS X) AppleWebKit/601.1.46 (KHTML, like Gecko) Version/9.0 Mobile/13B143', 1510066703, ''),
('0fef706c247704e5ecb3385c90578a5e', '::1', 'Mozilla/5.0 (iPhone; CPU iPhone OS 9_1 like Mac OS X) AppleWebKit/601.1.46 (KHTML, like Gecko) Version/9.0 Mobile/13B143', 1510066703, ''),
('7c2a8221ca135307f37c073ded74e55d', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/62.0.3202.75 Safari/537.36', 1510075969, ''),
('c89dd0a06fc3d26cbeb87aca69168ff1', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/62.0.3202.75 Safari/537.36', 1510075969, ''),
('84f820e186a93ce825cbcc38f27f21e4', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/62.0.3202.75 Safari/537.36', 1510075969, 'a:2:{s:9:"user_data";s:0:"";s:7:"carpool";a:5:{s:10:"user_email";s:15:"demo1@gmail.com";s:6:"access";s:6:"travel";s:7:"user_id";s:1:"1";s:7:"trip_id";a:0:{}s:6:"expire";i:1510088550;}}');

-- --------------------------------------------------------

--
-- Структура таблиці `settings`
--

CREATE TABLE IF NOT EXISTS `settings` (
  `id` int(11) NOT NULL,
  `code` varchar(255) NOT NULL,
  `setting_key` varchar(255) NOT NULL,
  `setting` longtext NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Дамп даних таблиці `settings`
--

INSERT INTO `settings` (`id`, `code`, `setting_key`, `setting`) VALUES
(1, 'payment_modules', 'cod', '0'),
(2, 'cod', 'enabled', '0'),
(3, 'shipping_modules', 'flatrate', '0'),
(4, 'flatrate', 'rate', ''),
(5, 'flatrate', 'enabled', '0');

-- --------------------------------------------------------

--
-- Структура таблиці `tbl_address`
--

CREATE TABLE IF NOT EXISTS `tbl_address` (
  `id` int(150) NOT NULL,
  `trip_id` int(150) NOT NULL,
  `latitude` text NOT NULL,
  `longitude` text NOT NULL,
  `weight` int(20) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Структура таблиці `tbl_admin`
--

CREATE TABLE IF NOT EXISTS `tbl_admin` (
  `id` int(11) NOT NULL,
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
  `admin_createddate` varchar(40) CHARACTER SET latin1 DEFAULT NULL
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Дамп даних таблиці `tbl_admin`
--

INSERT INTO `tbl_admin` (`id`, `admin_email`, `admin_password`, `admin_name`, `first_name`, `last_name`, `company_name`, `company_email`, `company_mobile`, `admin_img`, `access`, `admin_createddate`) VALUES
(1, 'webrobota@gmail.com', '2a0fbb211d1c6954242faf9f0b7bda3989ab065e', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Admin', NULL);

-- --------------------------------------------------------

--
-- Структура таблиці `tbl_advertisement`
--

CREATE TABLE IF NOT EXISTS `tbl_advertisement` (
  `ad_id` int(11) NOT NULL,
  `ad_title` varchar(50) NOT NULL,
  `ad_nav_link` varchar(100) NOT NULL,
  `isactive` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `advertisement_url` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Структура таблиці `tbl_amenities`
--

CREATE TABLE IF NOT EXISTS `tbl_amenities` (
  `amenities_id` int(11) NOT NULL,
  `amenities_name` varchar(40) DEFAULT NULL,
  `created_on` varchar(40) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Структура таблиці `tbl_category`
--

CREATE TABLE IF NOT EXISTS `tbl_category` (
  `category_id` int(15) NOT NULL,
  `category_name` varchar(56) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `is_active` int(2) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Дамп даних таблиці `tbl_category`
--

INSERT INTO `tbl_category` (`category_id`, `category_name`, `created_date`, `is_active`) VALUES
(1, 'Ford', '2016-11-23 11:49:15', 1),
(2, 'Ferrari', '2016-11-23 11:49:20', 1),
(3, 'Datsun', '2016-11-23 11:49:25', 1),
(4, 'Chevrolet', '2016-11-23 11:49:32', 1),
(5, 'BMW', '2016-11-23 11:49:37', 1),
(6, 'Bentley', '2016-11-23 11:49:42', 1),
(7, 'Jaguar', '2016-11-23 11:49:46', 1),
(8, 'Maruti Suzuki', '2016-11-23 11:49:51', 1),
(9, 'Mercedes-Benz', '2016-11-23 11:49:56', 1),
(10, 'Mitsubishi', '2016-11-23 11:50:13', 1);

-- --------------------------------------------------------

--
-- Структура таблиці `tbl_client_questions`
--

CREATE TABLE IF NOT EXISTS `tbl_client_questions` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `questions` varchar(1000) NOT NULL,
  `trip_led_id` int(11) NOT NULL,
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Структура таблиці `tbl_community`
--

CREATE TABLE IF NOT EXISTS `tbl_community` (
  `comm_id` int(11) NOT NULL,
  `comm_name` varchar(255) DEFAULT NULL,
  `comm_slug` varchar(11) DEFAULT NULL,
  `comm_image` varchar(255) DEFAULT NULL,
  `comm_location` varchar(255) DEFAULT NULL,
  `comm_address` varchar(255) DEFAULT NULL,
  `comm_descr` text
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Дамп даних таблиці `tbl_community`
--

INSERT INTO `tbl_community` (`comm_id`, `comm_name`, `comm_slug`, `comm_image`, `comm_location`, `comm_address`, `comm_descr`) VALUES
(1, 'SWEAT', 'sweat', 'cm-sweat.jpg', '~51.507786,-0.025952999999958593~', 'SWEAT Clubs, Cannon Drive, London, United Kingdom', 'SWEAT Clubs, Cannon Drive, London, United Kingdom'),
(2, 'Bisley Shooting Ground', 'bisley', 'cm-bisley.jpg', '~51.312129,-0.6589490000000069~', 'Bisley Clay Pigeon Shooting Ground in Surrey, Near London, Brookwood, United Kingdom', 'Bisley Clay Pigeon Shooting Ground in Surrey, Near London, Brookwood, United Kingdom');

-- --------------------------------------------------------

--
-- Структура таблиці `tbl_comport`
--

CREATE TABLE IF NOT EXISTS `tbl_comport` (
  `comport_id` int(11) NOT NULL,
  `comport_level` varchar(255) NOT NULL,
  `comport_logo` varchar(255) NOT NULL,
  `is_active` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Дамп даних таблиці `tbl_comport`
--

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

-- --------------------------------------------------------

--
-- Структура таблиці `tbl_country`
--

CREATE TABLE IF NOT EXISTS `tbl_country` (
  `country_id` int(6) NOT NULL,
  `country_name` varchar(120) DEFAULT NULL,
  `country_code` varchar(5000) DEFAULT NULL,
  `currency` varchar(100) DEFAULT NULL,
  `is_active` int(11) DEFAULT '0',
  `created_date` datetime DEFAULT NULL
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Дамп даних таблиці `tbl_country`
--

INSERT INTO `tbl_country` (`country_id`, `country_name`, `country_code`, `currency`, `is_active`, `created_date`) VALUES
(5, 'United Kingdom', 'GB', NULL, 1, '2017-11-06 11:36:03');

-- --------------------------------------------------------

--
-- Структура таблиці `tbl_currency`
--

CREATE TABLE IF NOT EXISTS `tbl_currency` (
  `currency_id` int(6) NOT NULL,
  `currency_name` varchar(120) DEFAULT NULL,
  `currency_symbol` varchar(15) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL
) ENGINE=MyISAM AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

--
-- Дамп даних таблиці `tbl_currency`
--

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

-- --------------------------------------------------------

--
-- Структура таблиці `tbl_email_template`
--

CREATE TABLE IF NOT EXISTS `tbl_email_template` (
  `tplid` int(11) NOT NULL,
  `tplshortname` varchar(250) NOT NULL,
  `tplsubject` varchar(250) NOT NULL,
  `tplmessage` text NOT NULL,
  `tplmailid` varchar(100) DEFAULT NULL,
  `isactive` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=MyISAM AUTO_INCREMENT=35 DEFAULT CHARSET=latin1;

--
-- Дамп даних таблиці `tbl_email_template`
--

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

-- --------------------------------------------------------

--
-- Структура таблиці `tbl_enquires`
--

CREATE TABLE IF NOT EXISTS `tbl_enquires` (
  `enquiry_id` int(16) NOT NULL,
  `enquiry_passanger_id` varchar(40) DEFAULT NULL,
  `enquiry_trip_id` varchar(40) DEFAULT NULL,
  `enquire_travel_id` varchar(255) DEFAULT NULL,
  `enquiry_trip_date` date DEFAULT NULL,
  `enquiry_trip_status` int(11) DEFAULT NULL,
  `enquiry_date_time` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `payment_flg` enum('1','0') DEFAULT '0'
) ENGINE=MyISAM AUTO_INCREMENT=40 DEFAULT CHARSET=latin1;

--
-- Дамп даних таблиці `tbl_enquires`
--

INSERT INTO `tbl_enquires` (`enquiry_id`, `enquiry_passanger_id`, `enquiry_trip_id`, `enquire_travel_id`, `enquiry_trip_date`, `enquiry_trip_status`, `enquiry_date_time`, `payment_flg`) VALUES
(28, '1', '50', '2', '2017-10-31', 1, '2017-10-31 17:05:29', '0'),
(27, '1', '46', '2', '2017-10-31', 1, '2017-10-30 15:09:52', '0'),
(29, '15', '59', '1', '2017-11-25', 1, '2017-10-31 21:04:25', '0'),
(30, '13', '59', '1', '2017-11-25', 1, '2017-10-31 21:23:46', '0'),
(31, '16', '60', '2', '2017-11-15', 1, '2017-11-01 08:09:55', '0'),
(32, '2', '59', '1', '2017-11-25', 1, '2017-11-01 12:09:30', '0'),
(33, '1', '60', '2', '2017-11-15', 1, '2017-11-01 20:57:58', '0'),
(34, '14', '62', '1', '2017-12-21', 1, '2017-11-05 19:20:56', '0'),
(35, '16', '65', '18', '2017-11-06', 1, '2017-11-06 09:54:18', '0'),
(36, '16', '66', '18', '2017-11-06', 1, '2017-11-06 10:52:42', '0'),
(37, '18', '67', '16', '2017-11-06', 1, '2017-11-06 10:58:23', '0'),
(38, '16', '68', '18', '2017-11-06', 1, '2017-11-06 12:42:08', '0'),
(39, '18', '69', '16', '2017-11-06', 1, '2017-11-06 13:41:49', '0');

-- --------------------------------------------------------

--
-- Структура таблиці `tbl_feedback`
--

CREATE TABLE IF NOT EXISTS `tbl_feedback` (
  `id` int(11) NOT NULL,
  `name` varchar(22) DEFAULT NULL,
  `trip_user_id` int(11) DEFAULT NULL,
  `feedback` varchar(444) DEFAULT NULL,
  `enquiry_passanger_id` int(100) DEFAULT NULL,
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Структура таблиці `tbl_language`
--

CREATE TABLE IF NOT EXISTS `tbl_language` (
  `language_id` int(6) NOT NULL,
  `language_name` varchar(120) DEFAULT NULL,
  `language_code` varchar(15) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Дамп даних таблиці `tbl_language`
--

INSERT INTO `tbl_language` (`language_id`, `language_name`, `language_code`, `created_date`) VALUES
(1, 'english', 'en', '2016-01-04 18:37:19'),
(2, 'German', 'ge', '2016-01-04 18:37:19'),
(3, 'Spanish', 'sp', '2016-11-22 00:00:00');

-- --------------------------------------------------------

--
-- Структура таблиці `tbl_logo`
--

CREATE TABLE IF NOT EXISTS `tbl_logo` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Дамп даних таблиці `tbl_logo`
--

INSERT INTO `tbl_logo` (`id`, `name`) VALUES
(1, 'user1_logo_1509482809.jpg');

-- --------------------------------------------------------

--
-- Структура таблиці `tbl_money`
--

CREATE TABLE IF NOT EXISTS `tbl_money` (
  `money_id` int(11) NOT NULL,
  `money_user` int(11) DEFAULT NULL,
  `money_count` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

--
-- Дамп даних таблиці `tbl_money`
--

INSERT INTO `tbl_money` (`money_id`, `money_user`, `money_count`) VALUES
(10, 1, '81.00'),
(11, 2, '86.00'),
(12, 12, '47.00'),
(13, 13, '44.00'),
(14, 14, '39.00'),
(15, 15, '47.00'),
(16, 16, '21.00'),
(17, 17, '50.00'),
(18, 18, '53.00');

-- --------------------------------------------------------

--
-- Структура таблиці `tbl_orders`
--

CREATE TABLE IF NOT EXISTS `tbl_orders` (
  `order_id` int(16) NOT NULL,
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
  `payment_flg` enum('1','0') DEFAULT '0'
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Дамп даних таблиці `tbl_orders`
--

INSERT INTO `tbl_orders` (`order_id`, `order_number`, `order_trip_leg_id`, `order_trip_id`, `order_travel_id`, `order_passenger_id`, `order_trip_date`, `order_amount`, `order_commission`, `order_date_time`, `order_flg`, `payment_fields`, `payment_flg`) VALUES
(1, '15083494231', '7', 5, 11, '1', '2017-10-18', 600, 0, '2017-10-18 08:27:03', '0', NULL, '0'),
(2, '15087568801', '7', 5, 11, '1', '2017-10-23', 600, 0, '2017-10-23 01:38:00', '0', NULL, '0'),
(3, '15087715941', '7', 5, 11, '1', '2017-10-23', 600, 0, '2017-10-23 05:43:14', '0', NULL, '0'),
(4, '15087724851', '6', 4, 4, '1', '2017-10-23', 1000, 0, '2017-10-23 05:58:05', '1', NULL, '1');

-- --------------------------------------------------------

--
-- Структура таблиці `tbl_payment`
--

CREATE TABLE IF NOT EXISTS `tbl_payment` (
  `id` int(11) NOT NULL,
  `payment_type` enum('paypal') NOT NULL,
  `payment_id` varchar(100) DEFAULT NULL,
  `is_active` int(11) DEFAULT NULL,
  `is_method` int(11) DEFAULT '1'
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Дамп даних таблиці `tbl_payment`
--

INSERT INTO `tbl_payment` (`id`, `payment_type`, `payment_id`, `is_active`, `is_method`) VALUES
(1, 'paypal', 'test@test.com', NULL, 2);

-- --------------------------------------------------------

--
-- Структура таблиці `tbl_radius`
--

CREATE TABLE IF NOT EXISTS `tbl_radius` (
  `id` int(150) NOT NULL,
  `distance_from` int(150) NOT NULL,
  `distance_to` int(150) NOT NULL,
  `radius` int(150) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Дамп даних таблиці `tbl_radius`
--

INSERT INTO `tbl_radius` (`id`, `distance_from`, `distance_to`, `radius`) VALUES
(1, 11, 50, 5),
(2, 51, 100, 10),
(3, 101, 1000, 30),
(4, 0, 5, 1),
(5, 6, 10, 2);

-- --------------------------------------------------------

--
-- Структура таблиці `tbl_rating`
--

CREATE TABLE IF NOT EXISTS `tbl_rating` (
  `id` int(11) NOT NULL,
  `rating_giver_id` int(16) DEFAULT NULL,
  `rating_receiver_id` int(16) DEFAULT NULL,
  `rating` int(16) DEFAULT NULL,
  `created_date` date DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Дамп даних таблиці `tbl_rating`
--

INSERT INTO `tbl_rating` (`id`, `rating_giver_id`, `rating_receiver_id`, `rating`, `created_date`) VALUES
(1, 1, 2, 5, NULL),
(2, 2, 1, 5, NULL),
(3, 3, 4, 5, NULL),
(4, 4, 3, 5, NULL),
(5, 5, 4, 5, NULL);

-- --------------------------------------------------------

--
-- Структура таблиці `tbl_rewards`
--

CREATE TABLE IF NOT EXISTS `tbl_rewards` (
  `reward_id` int(11) NOT NULL,
  `reward_name` varchar(255) DEFAULT NULL,
  `reward_image` varchar(255) DEFAULT NULL,
  `reward_category` varchar(255) DEFAULT NULL,
  `reward_price` decimal(10,2) DEFAULT NULL,
  `reward_descr` text
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Дамп даних таблиці `tbl_rewards`
--

INSERT INTO `tbl_rewards` (`reward_id`, `reward_name`, `reward_image`, `reward_category`, `reward_price`, `reward_descr`) VALUES
(1, 'Coffee', 'rw-coffee.jpg', '1', '3.00', 'Here''s the perfect cup of coffee for you!'),
(2, 'Tea', 'rw-tea.jpg', '1', '3.00', 'Cup of warm green tea'),
(3, 'Spa', 'rw-spa.jpg', '1', '7.00', 'Spa and wellness procedures'),
(4, 'Fitness', 'rw-fitness.jpg', '1', '5.00', 'Fitness Classes, cardio, strength training');

-- --------------------------------------------------------

--
-- Структура таблиці `tbl_socialmedia`
--

CREATE TABLE IF NOT EXISTS `tbl_socialmedia` (
  `id` int(11) NOT NULL,
  `social_media` enum('Facebook','Twitter','Google+','LinkedIn') NOT NULL,
  `page_url` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Дамп даних таблиці `tbl_socialmedia`
--

INSERT INTO `tbl_socialmedia` (`id`, `social_media`, `page_url`) VALUES
(1, 'Facebook', 'https://www.facebook.com/'),
(2, 'Twitter', 'https://twitter.com/'),
(3, 'Google+', 'https://plus.google.com/'),
(4, 'LinkedIn', 'https://www.linkedin.com/');

-- --------------------------------------------------------

--
-- Структура таблиці `tbl_subscribe`
--

CREATE TABLE IF NOT EXISTS `tbl_subscribe` (
  `subscribe_id` int(150) NOT NULL,
  `subscribe_email` varchar(255) NOT NULL,
  `subscribe_ip` varchar(255) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Дамп даних таблиці `tbl_subscribe`
--

INSERT INTO `tbl_subscribe` (`subscribe_id`, `subscribe_email`, `subscribe_ip`, `created_date`) VALUES
(1, 'reertert@dfd.gg', '::1', '2017-10-12 21:12:52'),
(2, '33@ff.hh', '::1', '2017-10-12 21:15:14'),
(3, 'alex@sparrowapp.co', '109.159.85.179', '2017-11-02 19:27:54');

-- --------------------------------------------------------

--
-- Структура таблиці `tbl_testimonials`
--

CREATE TABLE IF NOT EXISTS `tbl_testimonials` (
  `id` int(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `image` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `isactive` int(2) NOT NULL DEFAULT '1',
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Дамп даних таблиці `tbl_testimonials`
--

INSERT INTO `tbl_testimonials` (`id`, `name`, `image`, `description`, `isactive`, `created_date`) VALUES
(1, 'carpoolingscript', 'user1_testimonials_1480597878.jpg', 'Carpooling is great, I have never again travelled alone to my city on weekends. And it''''s much cheaper way to travel', 1, '2016-12-01 11:11:20'),
(2, 'carpool', 'user1_testimonials_1480597918.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed ille, ut dixi, vitiose. Non laboro, inquit, de nomine. Duo Reges', 1, '2016-12-01 11:12:00'),
(3, 'carpooling', 'user1_testimonials_1480597952.jpeg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed ille, ut dixi, vitiose. Non laboro, inquit, de nomine. Duo Reges', 1, '2016-12-01 11:12:34');

-- --------------------------------------------------------

--
-- Структура таблиці `tbl_trips`
--

CREATE TABLE IF NOT EXISTS `tbl_trips` (
  `trip_id` int(11) NOT NULL,
  `trip_driver_id` varchar(40) DEFAULT NULL,
  `trip_vehicle_id` varchar(40) DEFAULT NULL,
  `trip_from_latlan` text,
  `trip_to_latlan` text,
  `source` text,
  `destination` text,
  `route` text,
  `route_full_data` text,
  `trip_routes_lat_lan` text,
  `trip_routes` text,
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
  `trip_casual_date` varchar(255) DEFAULT NULL,
  `trip_created_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `trip_status` tinyint(1) NOT NULL DEFAULT '1',
  `trip_otp_status` int(2) NOT NULL DEFAULT '0',
  `trip_community` int(11) DEFAULT NULL
) ENGINE=MyISAM AUTO_INCREMENT=70 DEFAULT CHARSET=latin1;

--
-- Дамп даних таблиці `tbl_trips`
--

INSERT INTO `tbl_trips` (`trip_id`, `trip_driver_id`, `trip_vehicle_id`, `trip_from_latlan`, `trip_to_latlan`, `source`, `destination`, `route`, `route_full_data`, `trip_routes_lat_lan`, `trip_routes`, `trip_return`, `trip_depature_time`, `trip_return_time`, `trip_journey_hours`, `trip_amenities`, `trip_frequncy`, `trip_avilable_seat`, `passenger_type`, `trip_rate_details`, `contact_person_name`, `contact_person_number`, `trip_comments`, `trip_user_id`, `trip_casual_date`, `trip_created_date`, `trip_status`, `trip_otp_status`, `trip_community`) VALUES
(67, NULL, '1', '~51.5179035,-0.12719700000002376~', '~51.312129,-0.6589490000000069~', 'Great Russell Street, London, United Kingdom', 'Bisley Clay Pigeon Shooting Ground in Surrey, Near London, Brookwood, United Kingdom', '', NULL, '~51.5179035,-0.12719700000002376~,,~51.312129,-0.6589490000000069~', NULL, 'no', '11:15:00', '11:47:00', NULL, NULL, '', '4', '3', NULL, NULL, '983815723', '', '16', '2017/11/06', '2017-11-06 10:57:21', 1, 0, 2),
(68, NULL, '1', '~51.5396671,-0.10247140000001309~', '~51.507786,-0.025952999999958593~', 'Upper Street, London, United Kingdom', 'SWEAT Clubs, Cannon Drive, London, United Kingdom', '', NULL, '~51.5396671,-0.10247140000001309~,,~51.507786,-0.025952999999958593~', NULL, 'no', '00:45:00', '01:00:00', NULL, NULL, '', '5', '3', NULL, NULL, '5555577', '', '18', '2017/11/06', '2017-11-06 12:41:45', 1, 0, 1),
(69, NULL, '1', '~51.503324,-0.1195430000000215~', '~51.507786,-0.025952999999958593~', 'London Eye, London, United Kingdom', 'SWEAT Clubs, Cannon Drive, London, United Kingdom', '', NULL, '~51.503324,-0.1195430000000215~,,~51.507786,-0.025952999999958593~', NULL, 'no', '14:00:00', '01:00:00', NULL, NULL, '', '4', '3', NULL, NULL, '983815723', '', '16', '2017/11/06', '2017-11-06 13:41:37', 1, 0, 1),
(60, NULL, '1', '~51.508039,-0.12806899999998222~', '~51.312129,-0.6589490000000069~', 'Trafalgar Square, London, United Kingdom', 'Bisley Clay Pigeon Shooting Ground in Surrey, Near London, Brookwood, United Kingdom', 'Victoria Street', NULL, '~51.508039,-0.12806899999998222~,~51.4959804,-0.1419349999999895~,~51.312129,-0.6589490000000069~', 'Trafalgar Square, London, United Kingdom~Victoria Street, London, United Kingdom~Bisley Clay Pigeon Shooting Ground in Surrey, Near London, Brookwood, United Kingdom', 'no', '09:30:00', '10:03:00', NULL, NULL, '', '2', '3', NULL, NULL, '5879829871', '', '2', '2017/11/15', '2017-10-31 21:45:37', 1, 0, 2),
(64, NULL, '1', '~51.507786,-0.025952999999958593~', '~51.5028201,-0.119252299999971~', 'SWEAT Clubs, Cannon Drive, London, United Kingdom', 'London SE1 7PB, United Kingdom', '', NULL, '~51.507786,-0.025952999999958593~,~51.5028201,-0.119252299999971~', 'SWEAT Clubs, Cannon Drive, London, United Kingdom~London SE1 7PB, United Kingdom', 'yes', '19:45:00', '18:00:00', NULL, NULL, '', '3', '3', NULL, NULL, '07792609442', 'Test test test ', '17', '2017/11/04', '2017-11-01 21:00:28', 1, 0, NULL),
(62, NULL, '1', '~51.5178751,-0.11751359999993838~', '~51.507786,-0.025952999999958593~', 'High Holborn, London, United Kingdom', 'SWEAT Clubs, Cannon Drive, London, United Kingdom', 'Camberwell', NULL, '~51.5178751,-0.11751359999993838~,~51.4740846,-0.09301370000002862~,~51.507786,-0.025952999999958593~', 'High Holborn, London, United Kingdom~Camberwell, London, United Kingdom~SWEAT Clubs, Cannon Drive, London, United Kingdom', 'no', '10:30:00', '10:39:00', NULL, NULL, '', '3', '3', NULL, NULL, '9843323380', '', '1', '2017/12/21', '2017-11-01 12:50:31', 1, 0, 1),
(63, NULL, '1', '~51.5028201,-0.119252299999971~', '~51.507786,-0.025952999999958593~', 'London SE1 7PB, United Kingdom', 'SWEAT Clubs, Cannon Drive, London, United Kingdom', '', NULL, '~51.5028201,-0.119252299999971~,,~51.507786,-0.025952999999958593~', NULL, 'yes', '17:00:00', '18:00:00', NULL, NULL, '', '3', '3', NULL, NULL, '07792609442', 'Test test test ', '17', '2017/11/04', '2017-11-01 21:00:28', 1, 0, 1);

-- --------------------------------------------------------

--
-- Структура таблиці `tbl_t_login_logs`
--

CREATE TABLE IF NOT EXISTS `tbl_t_login_logs` (
  `login_log_id` double DEFAULT NULL,
  `login_id` double DEFAULT NULL,
  `login_ip` varchar(675) DEFAULT NULL,
  `login_time` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп даних таблиці `tbl_t_login_logs`
--

INSERT INTO `tbl_t_login_logs` (`login_log_id`, `login_id`, `login_ip`, `login_time`) VALUES
(NULL, 1, '::1', NULL),
(NULL, 11, '::1', NULL),
(NULL, 1, '::1', NULL),
(NULL, 11, '::1', NULL),
(NULL, 11, '::1', NULL),
(NULL, 11, '::1', NULL),
(NULL, 1, '::1', NULL),
(NULL, 1, '::1', NULL),
(NULL, 1, '::1', NULL),
(NULL, 1, '::1', NULL),
(NULL, 1, '::1', NULL),
(NULL, 1, '::1', NULL),
(NULL, 1, '::1', NULL),
(NULL, 1, '::1', NULL),
(NULL, 1, '::1', NULL),
(NULL, 1, '::1', NULL),
(NULL, 1, '::1', NULL),
(NULL, 1, '::1', NULL),
(NULL, 1, '::1', NULL),
(NULL, 1, '::1', NULL),
(NULL, 1, '::1', NULL),
(NULL, 1, '::1', NULL),
(NULL, 1, '::1', NULL),
(NULL, 1, '::1', NULL),
(NULL, 1, '::1', NULL),
(NULL, 1, '::1', NULL),
(NULL, 1, '::1', NULL),
(NULL, 1, '::1', NULL),
(NULL, 1, '::1', NULL),
(NULL, 1, '::1', NULL),
(NULL, 1, '::1', NULL),
(NULL, 1, '::1', NULL),
(NULL, 1, '::1', NULL),
(NULL, 1, '::1', NULL),
(NULL, 1, '::1', NULL),
(NULL, 1, '::1', NULL),
(NULL, 1, '::1', NULL),
(NULL, 1, '::1', NULL),
(NULL, 1, '::1', NULL),
(NULL, 1, '::1', NULL),
(NULL, 1, '::1', NULL),
(NULL, 1, '::1', NULL),
(NULL, 1, '::1', NULL),
(NULL, 1, '::1', NULL),
(NULL, 1, '::1', NULL),
(NULL, 1, '::1', NULL),
(NULL, 1, '::1', NULL),
(NULL, 1, '::1', NULL),
(NULL, 2, '::1', NULL),
(NULL, 1, '::1', NULL),
(NULL, 1, '::1', NULL),
(NULL, 1, '::1', NULL),
(NULL, 2, '::1', NULL),
(NULL, 1, '::1', NULL),
(NULL, 1, '::1', NULL),
(NULL, 1, '::1', NULL),
(NULL, 1, '::1', NULL),
(NULL, 1, '::1', NULL),
(NULL, 1, '::1', NULL),
(NULL, 1, '::1', NULL),
(NULL, 1, '::1', NULL),
(NULL, 1, '::1', NULL),
(NULL, 1, '::1', NULL),
(NULL, 1, '::1', NULL),
(NULL, 1, '::1', NULL),
(NULL, 1, '::1', NULL),
(NULL, 1, '::1', NULL),
(NULL, 1, '::1', NULL),
(NULL, 1, '::1', NULL),
(NULL, 1, '::1', NULL),
(NULL, 1, '::1', NULL),
(NULL, 1, '::1', NULL),
(NULL, 1, '::1', NULL),
(NULL, 1, '::1', NULL),
(NULL, 1, '::1', NULL),
(NULL, 1, '::1', NULL),
(NULL, 1, '::1', NULL),
(NULL, 1, '::1', NULL),
(NULL, 1, '::1', NULL),
(NULL, 1, '::1', NULL),
(NULL, 1, '::1', NULL),
(NULL, 1, '::1', NULL),
(NULL, 1, '::1', NULL),
(NULL, 1, '::1', NULL),
(NULL, 1, '::1', NULL),
(NULL, 1, '::1', NULL),
(NULL, 1, '::1', NULL),
(NULL, 1, '::1', NULL),
(NULL, 1, '::1', NULL),
(NULL, 1, '::1', NULL),
(NULL, 1, '::1', NULL),
(NULL, 1, '::1', NULL),
(NULL, 1, '::1', NULL),
(NULL, 1, '::1', NULL),
(NULL, 1, '::1', NULL),
(NULL, 1, '::1', NULL),
(NULL, 1, '::1', NULL),
(NULL, 1, '::1', NULL),
(NULL, 1, '::1', NULL),
(NULL, 1, '::1', NULL),
(NULL, 1, '::1', NULL),
(NULL, 1, '::1', NULL),
(NULL, 1, '::1', NULL),
(NULL, 1, '::1', NULL),
(NULL, 1, '::1', NULL),
(NULL, 1, '::1', NULL),
(NULL, 2, '::1', NULL),
(NULL, 1, '::1', NULL),
(NULL, 1, '::1', NULL),
(NULL, 1, '::1', NULL),
(NULL, 1, '::1', NULL),
(NULL, 1, '::1', NULL),
(NULL, 1, '::1', NULL),
(NULL, 1, '::1', NULL),
(NULL, 1, '::1', NULL),
(NULL, 1, '::1', NULL),
(NULL, 2, '::1', NULL),
(NULL, 1, '::1', NULL),
(NULL, 1, '::1', NULL),
(NULL, 1, '::1', NULL),
(NULL, 1, '::1', NULL),
(NULL, 1, '::1', NULL),
(NULL, 2, '::1', NULL),
(NULL, 1, '::1', NULL),
(NULL, 1, '::1', NULL),
(NULL, 1, '::1', NULL),
(NULL, 1, '::1', NULL),
(NULL, 1, '::1', NULL),
(NULL, 1, '::1', NULL),
(NULL, 1, '::1', NULL),
(NULL, 1, '::1', NULL),
(NULL, 2, '::1', NULL),
(NULL, 1, '::1', NULL),
(NULL, 2, '::1', NULL),
(NULL, 2, '::1', NULL),
(NULL, 1, '::1', NULL),
(NULL, 1, '::1', NULL),
(NULL, 1, '::1', NULL),
(NULL, 2, '::1', NULL),
(NULL, 1, '::1', NULL),
(NULL, 1, '::1', NULL),
(NULL, 1, '::1', NULL),
(NULL, 1, '::1', NULL),
(NULL, 1, '::1', NULL),
(NULL, 1, '::1', NULL),
(NULL, 1, '::1', NULL),
(NULL, 1, '::1', NULL),
(NULL, 1, '::1', NULL),
(NULL, 1, '::1', NULL),
(NULL, 1, '::1', NULL),
(NULL, 1, '::1', NULL),
(NULL, 1, '::1', NULL),
(NULL, 1, '::1', NULL),
(NULL, 1, '::1', NULL),
(NULL, 1, '::1', NULL),
(NULL, 1, '::1', NULL),
(NULL, 1, '::1', NULL),
(NULL, 1, '::1', NULL),
(NULL, 1, '::1', NULL),
(NULL, 1, '::1', NULL),
(NULL, 1, '::1', NULL),
(NULL, 1, '::1', NULL),
(NULL, 1, '::1', NULL),
(NULL, 1, '::1', NULL),
(NULL, 1, '::1', NULL),
(NULL, 1, '::1', NULL),
(NULL, 1, '::1', NULL),
(NULL, 1, '::1', NULL),
(NULL, 2, '::1', NULL),
(NULL, 1, '::1', NULL),
(NULL, 1, '::1', NULL),
(NULL, 1, '::1', NULL),
(NULL, 1, '::1', NULL),
(NULL, 1, '::1', NULL),
(NULL, 1, '::1', NULL),
(NULL, 1, '::1', NULL),
(NULL, 1, '::1', NULL),
(NULL, 1, '::1', NULL),
(NULL, 1, '::1', NULL),
(NULL, 1, '::1', NULL),
(NULL, 2, '::1', NULL),
(NULL, 1, '::1', NULL),
(NULL, 1, '::1', NULL),
(NULL, 2, '::1', NULL),
(NULL, 2, '::1', NULL),
(NULL, 1, '::1', NULL),
(NULL, 1, '::1', NULL),
(NULL, 1, '::1', NULL),
(NULL, 1, '::1', NULL),
(NULL, 1, '::1', NULL),
(NULL, 1, '::1', NULL),
(NULL, 1, '::1', NULL),
(NULL, 1, '::1', NULL),
(NULL, 1, '::1', NULL),
(NULL, 1, '::1', NULL),
(NULL, 1, '::1', NULL),
(NULL, 1, '::1', NULL),
(NULL, 1, '::1', NULL),
(NULL, 2, '::1', NULL),
(NULL, 2, '::1', NULL),
(NULL, 1, '::1', NULL),
(NULL, 1, '::1', NULL),
(NULL, 1, '::1', NULL),
(NULL, 1, '::1', NULL),
(NULL, 1, '::1', NULL),
(NULL, 1, '::1', NULL),
(NULL, 1, '::1', NULL),
(NULL, 1, '::1', NULL),
(NULL, 1, '::1', NULL),
(NULL, 1, '213.174.0.230', NULL),
(NULL, 12, '213.174.0.230', NULL),
(NULL, 1, '86.187.121.92', NULL),
(NULL, 1, '86.187.121.92', NULL),
(NULL, 1, '86.187.121.92', NULL),
(NULL, 1, '86.187.146.247', NULL),
(NULL, 13, '213.174.0.230', NULL),
(NULL, 14, '86.187.146.247', NULL),
(NULL, 15, '86.187.121.92', NULL),
(NULL, 1, '213.174.0.230', NULL),
(NULL, 1, '213.174.0.230', NULL),
(NULL, 13, '213.174.0.230', NULL),
(NULL, 2, '213.174.0.230', NULL),
(NULL, 1, '109.159.85.179', NULL),
(NULL, 16, '46.211.1.227', NULL),
(NULL, 13, '213.174.0.230', NULL),
(NULL, 2, '213.174.0.230', NULL),
(NULL, 16, '46.211.4.64', NULL),
(NULL, 1, '213.174.0.230', NULL),
(NULL, 1, '213.174.0.230', NULL),
(NULL, 14, '86.187.135.32', NULL),
(NULL, 17, '213.205.251.96', NULL),
(NULL, 14, '185.69.145.246', NULL),
(NULL, 1, '109.159.85.179', NULL),
(NULL, 1, '109.159.85.179', NULL),
(NULL, 1, '109.159.85.179', NULL),
(NULL, 14, '86.187.210.212', NULL),
(NULL, 14, '86.187.225.195', NULL),
(NULL, 1, '86.187.200.133', NULL),
(NULL, 14, '94.0.161.192', NULL),
(NULL, 16, '46.211.157.96', NULL),
(NULL, 18, '213.174.0.230', NULL),
(NULL, 1, '86.187.134.122', NULL),
(NULL, 1, '::1', NULL),
(NULL, 1, '::1', NULL),
(NULL, 1, '::1', NULL),
(NULL, 1, '::1', NULL),
(NULL, 1, '::1', NULL);

-- --------------------------------------------------------

--
-- Структура таблиці `tbl_t_trip_legs`
--

CREATE TABLE IF NOT EXISTS `tbl_t_trip_legs` (
  `trip_led_id` int(150) NOT NULL,
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
  `created_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM AUTO_INCREMENT=71 DEFAULT CHARSET=latin1;

--
-- Дамп даних таблиці `tbl_t_trip_legs`
--

INSERT INTO `tbl_t_trip_legs` (`trip_led_id`, `source_leg`, `source_latitude`, `source_longitude`, `destination_leg`, `destination_latitude`, `destination_longitude`, `expected_time`, `trip_return`, `route_rate`, `trip_id`, `created_time`) VALUES
(68, 'Great Russell Street, London, United Kingdom', '51.5179035', '-0.12719700000002376', 'Bisley Clay Pigeon Shooting Ground in Surrey, Near London, Brookwood, United Kingdom', '51.312129', '-0.6589490000000069', '11:15 am', 0, 0, 67, '2017-11-06 17:57:21'),
(69, 'Upper Street, London, United Kingdom', '51.5396671', '-0.10247140000001309', 'SWEAT Clubs, Cannon Drive, London, United Kingdom', '51.507786', '-0.025952999999958593', '12:45 am', 0, 0, 68, '2017-11-06 12:41:45'),
(70, 'London Eye, London, United Kingdom', '51.503324', '-0.1195430000000215', 'SWEAT Clubs, Cannon Drive, London, United Kingdom', '51.507786', '-0.025952999999958593', '2:00 pm', 0, 0, 69, '2017-11-06 13:41:37'),
(65, 'SWEAT Clubs, Cannon Drive, London, United Kingdom', '51.507786', '-0.025952999999958593', 'London SE1 7PB, United Kingdom', '51.5028201', '-0.119252299999971', '7:45 pm', 1, 0, 64, '2017-11-01 23:00:28'),
(59, 'Victoria Street, London, United Kingdom', '51.4959804', '-0.1419349999999895', 'Bisley Clay Pigeon Shooting Ground in Surrey, Near London, Brookwood, United Kingdom', '51.312129', '-0.6589490000000069', '09:32 am', 0, 0, 60, '2017-10-31 23:45:37'),
(58, 'Trafalgar Square, London, United Kingdom', '51.508039', '-0.12806899999998222', 'Bisley Clay Pigeon Shooting Ground in Surrey, Near London, Brookwood, United Kingdom', '51.312129', '-0.6589490000000069', '9:30 am', 0, 0, 60, '2017-10-31 23:45:37'),
(64, 'London SE1 7PB, United Kingdom', '51.5028201', '-0.119252299999971', 'SWEAT Clubs, Cannon Drive, London, United Kingdom', '51.507786', '-0.025952999999958593', '5:00 pm', 0, 0, 63, '2017-11-01 23:00:28'),
(57, 'Trafalgar Square, London, United Kingdom', '51.508039', '-0.12806899999998222', 'Victoria Street, London, United Kingdom', '51.4959804', '-0.1419349999999895', '9:30 am', 0, 0, 60, '2017-10-31 23:45:37'),
(62, 'High Holborn, London, United Kingdom', '51.5178751', '-0.11751359999993838', 'SWEAT Clubs, Cannon Drive, London, United Kingdom', '51.507786', '-0.025952999999958593', '10:30 am', 0, 0, 62, '2017-11-01 14:50:31'),
(63, 'Camberwell, London, United Kingdom', '51.4740846', '-0.09301370000002862', 'SWEAT Clubs, Cannon Drive, London, United Kingdom', '51.507786', '-0.025952999999958593', '10:34 am', 0, 0, 62, '2017-11-01 14:50:31'),
(61, 'High Holborn, London, United Kingdom', '51.5178751', '-0.11751359999993838', 'Camberwell, London, United Kingdom', '51.4740846', '-0.09301370000002862', '10:30 am', 0, 0, 62, '2017-11-01 14:50:31');

-- --------------------------------------------------------

--
-- Структура таблиці `tbl_users`
--

CREATE TABLE IF NOT EXISTS `tbl_users` (
  `user_id` int(11) NOT NULL,
  `user_email` varchar(40) DEFAULT NULL,
  `user_password` varchar(40) DEFAULT NULL,
  `user_type` varchar(40) DEFAULT NULL COMMENT '1->Travel  , 2->Individuals',
  `user_company_name` varchar(255) DEFAULT NULL,
  `user_first_name` varchar(40) DEFAULT NULL,
  `user_last_name` varchar(40) DEFAULT NULL,
  `user_about_us` text,
  `user_profile_img` varchar(255) DEFAULT NULL,
  `user_mobile` varchar(40) DEFAULT NULL,
  `user_secondary_phone` varchar(40) DEFAULT NULL,
  `user_secondary_mail` varchar(40) DEFAULT NULL,
  `user_company_id` varchar(40) DEFAULT NULL,
  `user_url` varchar(255) DEFAULT NULL,
  `user_street` varchar(255) DEFAULT NULL,
  `user_city` varchar(40) DEFAULT NULL,
  `postal_code` int(50) DEFAULT NULL,
  `user_occupation` varchar(40) DEFAULT NULL,
  `marital_status` varchar(40) DEFAULT NULL,
  `isverified` varchar(60) DEFAULT NULL,
  `comport_level` varchar(255) DEFAULT NULL,
  `language` varchar(255) DEFAULT NULL,
  `licence_number` varchar(60) DEFAULT NULL,
  `show_number` varchar(50) DEFAULT '1' COMMENT '1->yes , 0->no',
  `send_sms` varchar(50) DEFAULT '1' COMMENT '1->yes , 0->no',
  `allowed_food` int(2) DEFAULT NULL COMMENT '0->no,1->yes',
  `allowed_pet` int(2) DEFAULT NULL COMMENT '0->no,1->yes',
  `allowed_smoke` int(2) DEFAULT NULL COMMENT '0->no,1->yes',
  `allowed_chat` int(2) DEFAULT NULL COMMENT '0->no,1->yes',
  `allowed_music` int(2) DEFAULT NULL COMMENT '0->no,1->yes',
  `allowed_luggage` int(11) DEFAULT NULL,
  `user_gender` varchar(40) DEFAULT NULL,
  `user_country` varchar(40) DEFAULT NULL,
  `user_dob` varchar(50) DEFAULT NULL,
  `communication_mobile` int(2) NOT NULL DEFAULT '0' COMMENT '0-->primary , 2-->secondary ',
  `communication_email` int(2) NOT NULL DEFAULT '0' COMMENT '0-->primary , 2-->secondary ',
  `login_type` int(10) DEFAULT NULL COMMENT '0-->normal ,1-->facebook',
  `isactive` int(2) DEFAULT NULL,
  `user_admin_status` int(11) NOT NULL DEFAULT '0',
  `user_created_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `user_lost_login` varchar(255) DEFAULT NULL,
  `user_notfirst` tinyint(1) DEFAULT NULL
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

--
-- Дамп даних таблиці `tbl_users`
--

INSERT INTO `tbl_users` (`user_id`, `user_email`, `user_password`, `user_type`, `user_company_name`, `user_first_name`, `user_last_name`, `user_about_us`, `user_profile_img`, `user_mobile`, `user_secondary_phone`, `user_secondary_mail`, `user_company_id`, `user_url`, `user_street`, `user_city`, `postal_code`, `user_occupation`, `marital_status`, `isverified`, `comport_level`, `language`, `licence_number`, `show_number`, `send_sms`, `allowed_food`, `allowed_pet`, `allowed_smoke`, `allowed_chat`, `allowed_music`, `allowed_luggage`, `user_gender`, `user_country`, `user_dob`, `communication_mobile`, `communication_email`, `login_type`, `isactive`, `user_admin_status`, `user_created_date`, `user_lost_login`, `user_notfirst`) VALUES
(1, 'demo1@gmail.com', '00b851a3aedf17351a5471b9392c5249d77d044c', '0', NULL, 'demo1', 'user', 'good', 'user1_profile_1479986763.png', '9843323380', NULL, '', NULL, '', NULL, NULL, NULL, NULL, NULL, '0c13b1d8707279dd425f4bfbb27a1d4d15a71ee7', '1,3,4,5,7,8,9,10', '', 'TR8768987TY56', '1', '1', 0, 0, 0, 1, 1, 1, '0', NULL, '1992-08-16', 0, 0, 0, 1, 1, '2015-07-28 01:14:10', '2017-11-07 15:07:07', 1),
(2, 'demo2@gmail.com', '2aa95b8180971dd55a91608eac56ea4a574203ef', '0', NULL, 'demo2', 'user', 'good', 'user2_profile_1479986784.png', '5879829871', NULL, '', NULL, '', NULL, NULL, NULL, NULL, NULL, 'd1738e1ded9efeaa0243168e5edd4200d0dacdf9', '1,2,3,4,5,7,8,9,10', '', 'TP6878T546', '1', '1', 0, 0, 0, 0, 0, 2, '0', NULL, '1991-04-17', 0, 0, 0, 1, 1, '2015-05-18 04:38:37', '2017-11-01 05:45:58', 1),
(18, 'webrobota@gmail.com', '099ae72ec08f5de64595031c0a2faf2929ea72e9', NULL, NULL, 'Web', 'Robota', 'about me', NULL, '5555577', NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '16c3a9d14f909c44ebc1ef59be02ec0e3efd24f2', NULL, '', 't765', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, '1980-06-09', 0, 0, 0, 1, 1, '2017-11-06 09:39:11', '2017-11-06 03:50:00', 1),
(17, 'Duncan@sparrowapp.co', '0c34534dead54c494f20e3e10043190978417f3d', NULL, NULL, 'Duncan', 'Ross', NULL, NULL, '07792609442', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'd57241614de2302bc9233226b0ff9c4620ab691e', NULL, NULL, NULL, '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 1, 1, '2017-11-01 20:37:19', '2017-11-01 15:39:47', 1),
(13, 'oohfiro@gmail.com', '9315bf43fbee5e16750bec1eb9e685adbd0f446e', NULL, NULL, 'Eugene', 'Mys', NULL, NULL, '55555555', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'cea2e15ed6b216c2e8081dba0d0232030ea41e8e', NULL, NULL, NULL, '1', '1', NULL, NULL, NULL, NULL, NULL, 2, NULL, NULL, NULL, 0, 0, 0, 1, 1, '2017-10-31 20:54:21', '2017-11-01 04:41:11', 1),
(14, 'zach@sparrowapp.co', '5150cf1be3ef172dcfaab733d5b4dde5fc364476', NULL, NULL, 'zach', 'elsawey', NULL, NULL, '07577484118', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2ca325234278d3c8f2c48416fc882ce0846301a8', NULL, NULL, NULL, '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 1, 1, '2017-10-31 20:56:34', '2017-11-05 13:20:34', 1),
(15, 'alex@sparrowapp.co', '814038ee80234a0b06b13857501b2f5c0975b3c7', NULL, NULL, 'Alexander', 'Opeagbe', NULL, NULL, '07956642569', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1ad939a596f7669d666919551d75fdce552c70bd', NULL, NULL, NULL, '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 1, 1, '2017-10-31 20:57:08', '2017-10-31 15:58:26', 1),
(16, 'gekamys@gmail.com', '44279512c2b73bfe148f061ef2412e2e9849f89c', NULL, NULL, 'Eugene', 'Mysko', '', NULL, '983815723', NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2becefc1a008de99a6dd389b87b8c63b0627f428', NULL, '', '', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, '2017-04-05', 0, 0, 0, 1, 1, '2017-11-01 08:04:51', '2017-11-06 03:47:58', 1);

-- --------------------------------------------------------

--
-- Структура таблиці `tbl_user_rewards`
--

CREATE TABLE IF NOT EXISTS `tbl_user_rewards` (
  `ureward_id` int(11) NOT NULL,
  `ureward_rewardid` int(11) DEFAULT NULL,
  `ureward_userid` int(11) DEFAULT NULL,
  `ureward_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ureward_code` varchar(255) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=latin1;

--
-- Дамп даних таблиці `tbl_user_rewards`
--

INSERT INTO `tbl_user_rewards` (`ureward_id`, `ureward_rewardid`, `ureward_userid`, `ureward_date`, `ureward_code`) VALUES
(18, 2, 12, '2017-10-31 18:47:04', '1bdb2628a7'),
(19, 3, 1, '2017-10-31 19:02:54', '04fb7ae42f'),
(20, 4, 1, '2017-10-31 19:42:40', '9209656d7b'),
(21, 2, 16, '2017-11-01 08:23:32', '44ebdf501a'),
(22, 2, 16, '2017-11-01 11:46:39', '4582bacafc'),
(23, 1, 13, '2017-11-01 12:13:35', 'adc18a23be'),
(24, 4, 16, '2017-11-01 12:22:03', '12eb21bc44'),
(25, 4, 16, '2017-11-01 12:24:46', '9dd580da04'),
(26, 2, 2, '2017-11-01 12:43:54', 'cbd4704b1e'),
(27, 4, 2, '2017-11-01 12:43:59', 'f105cb050e'),
(28, 3, 16, '2017-11-01 13:08:32', 'f3995d580e'),
(29, 1, 14, '2017-11-03 09:38:27', '7575b2f3cd'),
(30, 4, 14, '2017-11-03 09:40:48', 'c3652b9f94');

-- --------------------------------------------------------

--
-- Структура таблиці `tbl_vechicle_types`
--

CREATE TABLE IF NOT EXISTS `tbl_vechicle_types` (
  `vechicle_type_id` int(11) NOT NULL,
  `vechicle_type_name` varchar(40) DEFAULT NULL,
  `vechicle_image` varchar(64) NOT NULL,
  `category_id` int(14) NOT NULL,
  `vechicle_createdate` varchar(40) DEFAULT NULL,
  `isactive` int(2) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Дамп даних таблиці `tbl_vechicle_types`
--

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

-- --------------------------------------------------------

--
-- Структура таблиці `tbl_vehicle`
--

CREATE TABLE IF NOT EXISTS `tbl_vehicle` (
  `vechicle_id` int(11) NOT NULL,
  `vechicle_type_id` int(11) DEFAULT NULL,
  `vechicle_number` varchar(40) DEFAULT NULL,
  `vechicle_logo` varchar(50) NOT NULL,
  `vechiclecomfort` varchar(255) NOT NULL,
  `user_id` int(12) NOT NULL,
  `vechicle_createdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Дамп даних таблиці `tbl_vehicle`
--

INSERT INTO `tbl_vehicle` (`vechicle_id`, `vechicle_type_id`, `vechicle_number`, `vechicle_logo`, `vechiclecomfort`, `user_id`, `vechicle_createdate`) VALUES
(1, 5, 'TG5765', 'user1_vehicle_1479965365.jpg', '4', 1, '2016-11-24 03:29:28'),
(2, 6, 'TV576567', 'user2_vehicle_1479966193.jpg', '3', 2, '2016-11-24 03:43:15'),
(3, 4, 'TR678687', 'user3_vehicle_1479966745.jpg', '2', 3, '2016-11-24 03:52:28'),
(4, 3, 'RT687R4', 'user4_vehicle_1479967294.jpg', '1', 4, '2016-11-24 04:01:37'),
(5, 5, '555', '0', '1', 11, '2017-09-25 10:43:14'),
(8, 4, 'LD61 DHP', '0', '1', 14, '2017-10-31 20:58:49'),
(9, 5, '5678', '0', '3', 16, '2017-11-01 08:14:20'),
(10, 5, 'Ffggf', '0', '3', 17, '2017-11-01 20:57:25'),
(11, 1, '655', '0', '1', 18, '2017-11-06 09:51:19');

-- --------------------------------------------------------

--
-- Структура таблиці `tbl_widgets`
--

CREATE TABLE IF NOT EXISTS `tbl_widgets` (
  `id` int(11) NOT NULL,
  `widget_name` varchar(255) NOT NULL,
  `widget_link` text NOT NULL,
  `widget_script` text NOT NULL,
  `widget_flag` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Індекси збережених таблиць
--

--
-- Індекси таблиці `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`),
  ADD FULLTEXT KEY `title` (`title`,`content`);

--
-- Індекси таблиці `routes`
--
ALTER TABLE `routes`
  ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`session_id`),
  ADD KEY `last_activity_idx` (`last_activity`);

--
-- Індекси таблиці `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `tbl_address`
--
ALTER TABLE `tbl_address`
  ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `tbl_advertisement`
--
ALTER TABLE `tbl_advertisement`
  ADD PRIMARY KEY (`ad_id`);

--
-- Індекси таблиці `tbl_amenities`
--
ALTER TABLE `tbl_amenities`
  ADD PRIMARY KEY (`amenities_id`);

--
-- Індекси таблиці `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`category_id`);

--
-- Індекси таблиці `tbl_client_questions`
--
ALTER TABLE `tbl_client_questions`
  ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `tbl_community`
--
ALTER TABLE `tbl_community`
  ADD PRIMARY KEY (`comm_id`) USING BTREE,
  ADD KEY `comm_id` (`comm_id`,`comm_name`,`comm_image`,`comm_location`);

--
-- Індекси таблиці `tbl_comport`
--
ALTER TABLE `tbl_comport`
  ADD PRIMARY KEY (`comport_id`);

--
-- Індекси таблиці `tbl_country`
--
ALTER TABLE `tbl_country`
  ADD PRIMARY KEY (`country_id`);

--
-- Індекси таблиці `tbl_currency`
--
ALTER TABLE `tbl_currency`
  ADD PRIMARY KEY (`currency_id`);

--
-- Індекси таблиці `tbl_email_template`
--
ALTER TABLE `tbl_email_template`
  ADD PRIMARY KEY (`tplid`);

--
-- Індекси таблиці `tbl_enquires`
--
ALTER TABLE `tbl_enquires`
  ADD PRIMARY KEY (`enquiry_id`),
  ADD KEY `tbl_trips_tbl_enquires` (`enquiry_trip_id`),
  ADD KEY `tbl_passengers_tbl_enquires` (`enquiry_passanger_id`);

--
-- Індекси таблиці `tbl_feedback`
--
ALTER TABLE `tbl_feedback`
  ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `tbl_language`
--
ALTER TABLE `tbl_language`
  ADD PRIMARY KEY (`language_id`);

--
-- Індекси таблиці `tbl_logo`
--
ALTER TABLE `tbl_logo`
  ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `tbl_money`
--
ALTER TABLE `tbl_money`
  ADD PRIMARY KEY (`money_id`),
  ADD KEY `money_user` (`money_user`,`money_count`),
  ADD KEY `money_count` (`money_count`);

--
-- Індекси таблиці `tbl_orders`
--
ALTER TABLE `tbl_orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `tbl_trips_tbl_enquires` (`order_trip_leg_id`);

--
-- Індекси таблиці `tbl_payment`
--
ALTER TABLE `tbl_payment`
  ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `tbl_radius`
--
ALTER TABLE `tbl_radius`
  ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `tbl_rating`
--
ALTER TABLE `tbl_rating`
  ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `tbl_rewards`
--
ALTER TABLE `tbl_rewards`
  ADD PRIMARY KEY (`reward_id`);

--
-- Індекси таблиці `tbl_socialmedia`
--
ALTER TABLE `tbl_socialmedia`
  ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `tbl_subscribe`
--
ALTER TABLE `tbl_subscribe`
  ADD PRIMARY KEY (`subscribe_id`);

--
-- Індекси таблиці `tbl_testimonials`
--
ALTER TABLE `tbl_testimonials`
  ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `tbl_trips`
--
ALTER TABLE `tbl_trips`
  ADD PRIMARY KEY (`trip_id`),
  ADD KEY `tbl_users_tbl_trips` (`trip_user_id`),
  ADD KEY `tbl_vehicle_tbl_trips` (`trip_vehicle_id`),
  ADD KEY `tbl_drivers_tbl_trips` (`trip_driver_id`);

--
-- Індекси таблиці `tbl_t_trip_legs`
--
ALTER TABLE `tbl_t_trip_legs`
  ADD PRIMARY KEY (`trip_led_id`);

--
-- Індекси таблиці `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `tbl_company_tbl_users` (`user_company_id`);

--
-- Індекси таблиці `tbl_user_rewards`
--
ALTER TABLE `tbl_user_rewards`
  ADD PRIMARY KEY (`ureward_id`);

--
-- Індекси таблиці `tbl_vechicle_types`
--
ALTER TABLE `tbl_vechicle_types`
  ADD PRIMARY KEY (`vechicle_type_id`);

--
-- Індекси таблиці `tbl_vehicle`
--
ALTER TABLE `tbl_vehicle`
  ADD PRIMARY KEY (`vechicle_id`),
  ADD KEY `tbl_vechicle_types_tbl_vehicle` (`vechicle_type_id`);

--
-- Індекси таблиці `tbl_widgets`
--
ALTER TABLE `tbl_widgets`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для збережених таблиць
--

--
-- AUTO_INCREMENT для таблиці `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT для таблиці `routes`
--
ALTER TABLE `routes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT для таблиці `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT для таблиці `tbl_address`
--
ALTER TABLE `tbl_address`
  MODIFY `id` int(150) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблиці `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT для таблиці `tbl_advertisement`
--
ALTER TABLE `tbl_advertisement`
  MODIFY `ad_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблиці `tbl_amenities`
--
ALTER TABLE `tbl_amenities`
  MODIFY `amenities_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблиці `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `category_id` int(15) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT для таблиці `tbl_client_questions`
--
ALTER TABLE `tbl_client_questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблиці `tbl_community`
--
ALTER TABLE `tbl_community`
  MODIFY `comm_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT для таблиці `tbl_comport`
--
ALTER TABLE `tbl_comport`
  MODIFY `comport_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT для таблиці `tbl_country`
--
ALTER TABLE `tbl_country`
  MODIFY `country_id` int(6) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT для таблиці `tbl_currency`
--
ALTER TABLE `tbl_currency`
  MODIFY `currency_id` int(6) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT для таблиці `tbl_email_template`
--
ALTER TABLE `tbl_email_template`
  MODIFY `tplid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT для таблиці `tbl_enquires`
--
ALTER TABLE `tbl_enquires`
  MODIFY `enquiry_id` int(16) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=40;
--
-- AUTO_INCREMENT для таблиці `tbl_feedback`
--
ALTER TABLE `tbl_feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблиці `tbl_language`
--
ALTER TABLE `tbl_language`
  MODIFY `language_id` int(6) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT для таблиці `tbl_logo`
--
ALTER TABLE `tbl_logo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT для таблиці `tbl_money`
--
ALTER TABLE `tbl_money`
  MODIFY `money_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT для таблиці `tbl_orders`
--
ALTER TABLE `tbl_orders`
  MODIFY `order_id` int(16) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT для таблиці `tbl_payment`
--
ALTER TABLE `tbl_payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT для таблиці `tbl_radius`
--
ALTER TABLE `tbl_radius`
  MODIFY `id` int(150) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT для таблиці `tbl_rating`
--
ALTER TABLE `tbl_rating`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT для таблиці `tbl_rewards`
--
ALTER TABLE `tbl_rewards`
  MODIFY `reward_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT для таблиці `tbl_socialmedia`
--
ALTER TABLE `tbl_socialmedia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT для таблиці `tbl_subscribe`
--
ALTER TABLE `tbl_subscribe`
  MODIFY `subscribe_id` int(150) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT для таблиці `tbl_testimonials`
--
ALTER TABLE `tbl_testimonials`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT для таблиці `tbl_trips`
--
ALTER TABLE `tbl_trips`
  MODIFY `trip_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=70;
--
-- AUTO_INCREMENT для таблиці `tbl_t_trip_legs`
--
ALTER TABLE `tbl_t_trip_legs`
  MODIFY `trip_led_id` int(150) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=71;
--
-- AUTO_INCREMENT для таблиці `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT для таблиці `tbl_user_rewards`
--
ALTER TABLE `tbl_user_rewards`
  MODIFY `ureward_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT для таблиці `tbl_vechicle_types`
--
ALTER TABLE `tbl_vechicle_types`
  MODIFY `vechicle_type_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT для таблиці `tbl_vehicle`
--
ALTER TABLE `tbl_vehicle`
  MODIFY `vechicle_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT для таблиці `tbl_widgets`
--
ALTER TABLE `tbl_widgets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
