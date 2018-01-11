<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$config['theme']			= 'carpooling';

// SSL support
$config['ssl_support']		= 'false';

// Business information
$config['company_name']		= 'SparrowApp';
$config['address1']			= '';
$config['address2']			= '';
$config['country']			= 'GB'; // use proper country codes only
$config['city']				= ''; 
$config['state']			= '';
$config['zip']				= '';
$config['email']			= 'no-reply@sparrowapp.co';
$config['admin_email']                  = 'webrobota@gmail.com';


//facebook and google app id
$config['fb_appid']				= '';
$config['fb_appsecret']			= '';
$config['googleplus_appid']		= 'my-project-1501604403364';
$config['googleplus_appsecret']	= '';

$config['country_code']			= 'GB'; // use proper country codes only

$config['site_language_prefix']			= 'en';
$config['site_language']				= 'english';
$config['user_language']				= '1';

$config['payment_commission']			= '0';
$config['payment_status']				= 'enquiry';
$config['google_api_key']				= 'AIzaSyBKU-SkOr3WNbIV8Rt3-gYyGGeB9JquVV4';



// Store currency
$config['currency']						= 'British Pound';  // USD, EUR, etc
$config['currency_symbol']				= 'GBP';
$config['currency_symbol_side']			= 'left'; // anything that is not "left" is automatically right
$config['currency_decimal']				= '.';
$config['currency_thousands_separator']	= ',';

// site logo path (for packing slip)
$config['site_logo']		= '/assets/img/logo.png';

//change the name of the admin controller folder 
$config['admin_folder']		= 'admin';

//file upload size limit
$config['size_limit']		= intval(ini_get('upload_max_filesize'))*1024;

//are new registrations automatically approved (true/false)
$config['new_customer_status']	= true;

//are new registrations automatically approved (true/false)
$config['new_provider_status']	= false;

//do we require customers to log in 
$config['require_login']		= false;

//file upload path
$config['vechicle_upload_dir']='uploads/vechicle/';
$config['vehicles_upload_dir']='uploads/vehicle/'; 
$config['profile_upload_dir']='uploads/profile/';
$config['admin_upload_dir']='uploads/admin/';
$config['logo_upload_dir']='uploads/logo/';
$config['testimonials_upload_dir']='uploads/testimonials/';
$config['advertisement_upload_dir']='uploads/advertisement/';
$config['max_width']='1907';
$config['max_height']='1280';
$config['max_kb']='5000';
$config['acceptable_files']='gif|jpg|png|jpeg|bmp|PNG|JPG|JPEG|GIF|BMP';