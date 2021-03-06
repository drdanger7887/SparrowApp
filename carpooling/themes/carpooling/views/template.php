<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0" />
	<title>Email Template</title>
	<meta property="og:title" content="*|MC:SUBJECT|*" />
	<style type="text/css">
	/* EMBEDDED CSS
    Android Mail doesn't support "class" declarations outside of a media query so use inline CSS as a rule.
    More info: Http://www.emailonacid.com/blog/the_android_mail_app_and_css_class_declarations/ */
    /****** EMAIL CLIENT BUG FIXES - BEST NOT TO CHANGE THESE ********/
    /* Forces Hotmail to display emails at full width. */
    .ExternalClass {width:100%;}
    /* Forces Hotmail to display normal line spacing. */
    .ExternalClass, .ExternalClass p, .ExternalClass span, .ExternalClass font, .ExternalClass td, .ExternalClass div {line-height:100%;}
    /* Prevents Webkit and Windows Mobile platforms from changing default font sizes. */
    body {-webkit-text-size-adjust:none; -ms-text-size-adjust:none;}
    /* Resets all body margins and padding to "0" for good measure. */
    body {margin:0; padding:0;}
    /* Resolves webkit padding issue. */
    table {border-spacing:0;}
    /* Resolves the Outlook 2007, 2010, and Gmail td padding issue. */
    table td {border-collapse:collapse;}
    /****** END BUG FIXES ********/
    /****** RESETTING DEFAULTS, IT IS BEST TO OVERWRITE THESE STYLES INLINE ********/
    /* This sets a clean slate for all clients EXCEPT Gmail.
       From there it forces you to do all of your spacing inline during the development process.
       Be sure to stick to margins because paragraph padding is not supported by Outlook 2007/2010.
       Remember: Hotmail does not support "margin" nor the "margin-top" properties.
       Stick to "margin-bottom", "margin-left", "margin-right" in order to control spacing.
       It also wise to set the inline top-margin to "0" for consistancy in Gmail for every inline instance
       of a paragraph tag. */
    p {margin:0; padding:0; margin-bottom:0;}
    /* This CSS will overwrite Hotmails default CSS and make your headings appear consistant with Gmail.
       From there, you can override with inline CSS if needed. */
    h1, h2, h3, h4, h5, h6 {color:#333; line-height:100%;}
    /****** END RESETTING DEFAULTS ********/
    /****** EDITABLE STYLES - FOR YOUR TEMPLATE ********/
    /* The "body" is defined here for Yahoo Beta because it does not support your body tag. Instead, it will
       create a wrapper div around your email and that div will inherit your embedded body styles.
       The "#body_style" is defined for AOL because it does not support your embedded body definition nor
       your body tag, we will use this class in our wrapper div. */
    body, #body_style {width:100% !important;color:#666666; background:#fff; font-family:Arial; font-size:12px; line-height:1.4;}

    /* This is the embedded CSS link color for Gmail. This will overwrite Hotmail and Yahoo Beta's
       embedded link colors and make it consistent with Gmail. Also use this rule on inline CSS. */
    a         {color:#6e5c4f; text-decoration:none;}

    /* There is no way to set these inline so you have the option of adding pseudo class definitions here.
       They won't work for Gmail or older Lotus Notes but it's a nice addition for all other clients. */
    a:link    {color:#9d470a; text-decoration:none;}
    a:visited {color:#9d470a; text-decoration:none;}
    a:focus   {color:#d0702c !important;}
    a:hover   {color:#d0702c !important;}

    /* A nice and clean way to target phone numbers you want clickable and avoid a mobile phone from
       linking other numbers that look like, but are not phone numbers. Use these two blocks of code to
       "unstyle" any numbers that may be linked. The second block gives you a class ".mobile_link" to apply
       with a span tag to the numbers you would like linked and styled.
       More info: http://www.campaignmonitor.com/blog/post/3571/using-phone-numbers-in-html-email/ */
    a[href^="tel"], a[href^="sms"] {text-decoration:none; color:#333333; pointer-events:none; cursor:pointer;}
    .mobile_link a[href^="tel"], .mobile_link a[href^="sms"] {text-decoration:default; color:#6e5c4f !important; pointer-events:auto; cursor:pointer;}
    /****** MEDIA QUERIES ********/
    /* You must use attribute selectors in your media queries to prevent Yahoo from rendering these styles.
       We added a yahoo attribute in the body tag to complete this fix.
       More info: http://www.emailonacid.com/blog/details/C13/stop_yahoo_mail_from_rendering_your_media_queries */
    /* Target mobile devices. */
    /* @media only screen and (max-device-width: 639px) { */
    @media only screen and (max-width: 639px) { /* TEMPORARY */
      /* Hide elements at smaller screen sizes (!important needed to override inline CSS). */
      body[yahoo] .hide {display:none !important;}
      /* Adjust table widths at smaller screen sizes. */
      body[yahoo] .table {width:320px !important;}
      body[yahoo] .innertable {width:280px !important;}
      /* Resize hero image at smaller screen sizes. */
      body[yahoo] .heroimage {width:280px !important; height:100px !important;}
      /* Resize page shadow at smaller screen sizes. */
      body[yahoo] .shadow {width:280px !important; height:4px !important;}
      /* Collapse footer columns. */
      body[yahoo] .footer-left  {width:320px !important;}
      body[yahoo] .footer-right {width:320px !important;}
      body[yahoo] .footer-right img {float:left !important; margin:0 1em 0 0 !important;}
    }
    /* Target tablet devices. */
    /* @media only screen and (min-device-width: 640px) and (max-device-width: 1024px) { */
    @media only screen and (min-width: 640px) and (max-width: 1024px) { /* TEMPORARY */
    }
    /*** END EDITABLE STYLES ***/
    /****** TEMPORARY - THESE SHOULD BE MOVED INLINE AT END OF YOUR DEVELOPMENT PROCESS ********/
    h1 {font-size:26px; line-height:1.11538461538462; font-weight:normal; margin-top:0; margin-bottom:0;}
    p {margin-top:0; margin-bottom:0;}
    img {display:block; border:none; outline:none; text-decoration:none;}
	/* Remove spacing around Outlook 07, 10 tables */
    table {border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;}
    /*** END TEMPORARY ***/
  </style>

</head>


<body style="width:100% !important; color:#333333; background:#fff; font-family:Arial,Helvetica,sans-serif; font-size:13px; line-height:1.4;" alink="#9d470a" link="#9d470a" bgcolor="#fff" text="#333333" yahoo="fix">
  <div id="body_style">


    <!-- Wrapper/Container Table: Use a wrapper table to control the width and the background color consistently of your email. Use this approach instead of setting attributes on the body tag. -->
    <table cellpadding="0" cellspacing="0" border="0" style="width:100% !important; margin:0; padding:0;">
      <tr bgcolor="#fff">
        <td>


          <!-- Tables are the most common way to format your email consistently. Set your table widths inside cells and in most cases reset cellpadding, cellspacing, and border to zero. Use nested tables as a way to space effectively in your message. -->
          <div style=" width:600px; margin: 0 auto; align: center;">
          <table width="600" cellpadding="0" cellspacing="0" border="0" class="table" style="border: solid 20px #01ACF1; box-sizing: border-box; -webkit-box-sizing: border-box; -moz-box-sizing: border-box; -o-box-sizing: border-box;">

		  <!-- HEADER -->
            <tr>
              <td>
                <!-- set a value for bgcolor -->
                <table bgcolor="#ffffff" text="#ffffff" width="100%" cellpadding="0" cellspacing="0" border="0">
                  <tr>
                    <!-- header right: hidden in mobile version -->
                    <td width="280" valign="top" class="hide">
                      <!-- set an image for header right - must be 280px width (height can be variable) -->
                      <a href="<?php print base_url(); ?>" style="text-align:right; float: left; margin: 20px 0 0 20px;"><img src="<?php echo theme_logo_img($this->logo->name)?>" width="188" height="59" border="0" alt="<?=$this->logo->name?> Logo" /></a>
                    </td>
                    <!-- /header right -->
                  </tr>
                </table>
              </td>
            </tr>
          <!-- /HEADER -->


          <!-- CONTENT -->
            <!-- set a value for bgcolor -->
            <tr bgcolor="#ffffff">
              <td style="padding:30px; width: 400px; box-sizing: border-box; -webkit-box-sizing: border-box; -moz-box-sizing: border-box; -o-box-sizing: border-box;">


                <!-- hero article -->
                <table style="margin-bottom:1em;" width="auto" cellpadding="0" cellspacing="0" border="0" align="center" class="innertable">
                  <tr>
                    <!-- hero article textarea -->
                    <td>
                      <table bgcolor="#ffffff" width="100%" cellpadding="10" cellspacing="0" border="0">
                        <tr>
                          <td>
                            <!-- heading center text -->
							
								<?php echo $message; ?>
                           
                         </td>
                        </tr>
                      </table>
                    </td>
                    <!-- /hero article textarea -->
                  </tr>
                  <!-- hero article main image: must be 560px x 186px -->
                  <tr>

                  </tr>
                  <!-- /hero article main image -->
                  <tr>

                  </tr>
                </table>
                <!-- /hero article -->



          </table>

            </div>
        </td>
      </tr>
    </table>
    <!-- End of wrapper table -->
  </div>

</body>
</html>