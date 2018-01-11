<?php include('header.php'); ?>
<?php echo theme_js('jquery-ui.js', true); ?>
<?php echo theme_js('popup.js', true); ?>
<?php echo theme_css('themes/base/jquery.ui.all.css', true); ?>
<script type="text/javascript" src="<?php echo theme_js('jquery.validate.js'); ?>"></script>
<?php echo theme_js('pager.js', true); ?>
<script>
    $(document).ready(function () {



        $('#regular').attr('checked', true);
        $('#search_results').scrollPagination({
            nop: 3, // The number of posts per scroll to be loaded
            offset: 0, // Initial offset, begins at 0 in this case
            error: '<?php echo lang('no_more_trips'); ?>', // When the user reaches the end this is the message that is
            // displayed. You can change this if you want.
            delay: 500, // When you scroll down the posts will load after a delayed amount of time.
            // This is mainly for usability concerns. You can alter this as you see fit
            scroll: true // The main bit, if set to false posts will not load as the user scrolls. 
                    // but will still load if the user clicks.

        });

    });
</script> 
<script type="text/javascript">
    var baseurl = "<?php print base_url(); ?>";
    var tickicon = "<?php echo theme_img('enquiry_tick.png'); ?>";
</script>
<script type="text/ecmascript">
    function viewPopup(pmId)
    {

    var pmQueryString	= 'pmProjId='+pmId;
    JqueryPopup('Login', 400, 460, '<?php echo base_url('search/popup/'); ?>', pmQueryString);
    }

    function viewroute(pmId)
    {

    var pmQueryString	= 'pmProjId='+pmId;
    JqueryPopup('Route Map', 486, 652, '<?php echo base_url('search/route/'); ?>', pmQueryString);
    }

</script>
<script type="text/javascript">

    var baseurl = "<?php print base_url(); ?>";
    var configcountry = "<?php print ($this->config->item('country_code') != '') ? $this->config->item('country_code') : ''; ?>";   
    var expcountry = configcountry.split(",");
</script>
<?php if ($this->config->item('google_api_key') != '') { ?>
    <script src="https://maps.googleapis.com/maps/api/js?key=<?php echo $this->config->item('google_api_key'); ?>&libraries=places&language=en"></script>
<?php } ?>
<?php if ($this->config->item('google_api_key') == '') { ?>
    <script src="https://maps.googleapis.com/maps/api/js?&libraries=places&language=en"></script>
<?php } ?>
<script type="text/javascript" src="<?php echo theme_js('jquery.validate.js'); ?>"></script>
<script type="text/javascript">
    var country = '<?php print ($this->config->item('country_code') != '') ? $this->config->item('country_code') : ''; ?>';
</script>
<style>
    .algin_left{

        margin-left: 9px;
    }
</style>
<?php echo theme_js('search.js', true); ?>
<div class="container-fluid margintop40">
    <div class="container">
        <div class="row">
            <ul class="row brd-crmb">
                <li><a href="<?php echo base_url('home'); ?>"> <img src="<?php echo theme_img('home-ico.png') ?>"> </a></li>
                <li> / </li>
                <li><a href="#"><?php echo lang('find_your_carpool'); ?></a></li>
                <li class="view-menu">
                    <ul>
                        <li><a href="#" class="li-ico current-li-view list-view"> <span><?php echo lang('list_view'); ?></span> </a></li>
                        <li><a href="#" class="map-ico map-view"> <span><?php echo lang('map_view'); ?></span> </a></li>
                    </ul>
                </li>
            </ul>
            <div class="container-fluid">
                <div class="container">
                    <div class="row">

                        <div class="col-lg-3 col-md-3 col-sm-3 action_left">
                            <div class="search-lft col-lg-12 col-md-12 col-sm-12">
                                <div class="row srh-hdr">
                                    <h3><?php echo lang('available_carpools'); ?></h3>
                                    <h3 id="count"><?= (!empty($count)) ? $count : 0 ?></h3>
                                    <div class="tip-arrow"></div>
                                </div>

                                <div class="rowrec srh-lft-main">
                                    <div class="rowrec srh-div">
                                        <h3><?php echo lang('trip_frequency'); ?></h3>
                                        <div class="row algin_left">
                                            <label class="rowrec"> <input type="radio" value="1"  id="frequency_1" name="frequencytype" onchange="filter_result();"  > <?php echo lang('regular'); ?>  </label>
                                            <label class="rowrec"> <input type="radio" value="2" id="frequency_2" name="frequencytype"  onchange="filter_result();"> <?php echo lang('casual'); ?>  </label>
                                            <label class="rowrec"> <input type="radio" value="" id="frequency_3" name="frequencytype"  onchange="filter_result();"> <?php echo lang('both'); ?>  </label>
                                        </div>
                                    </div>

                                    <div class="rowrec srh-div">
                                        <h3> <?php echo lang('return_journy'); ?> </h3>
                                        <div class="row algin_left" id="return_type">
                                            <label class="rowrec"> <input type="radio"  id="return_1" value="yes" name="returntype"  onchange="filter_result();"  > <?php echo lang('yes'); ?> </label>
                                            <label class="rowrec"> <input type="radio" id="return_2" value="no" name="returntype"  onchange="filter_result();"  > <?php echo lang('no'); ?>  </label>
                                            <input type="hidden" name="return" id="return" value="" />             
                                        </div>
                                    </div>

                                    <div class="rowrec srh-div">
                                        <h3> <?php echo lang('gender'); ?> </h3>
                                        <div class="row algin_left" id="return_type">
                                            <label class="rowrec"> <input type="radio"  id="passenger_1" value="1" name="passenger_type"  onchange="filter_result();"  > <?php echo lang('female'); ?></label>
                                            <label class="rowrec"> <input type="radio" id="passenger_2" value="2" name="passenger_type"  onchange="filter_result();"  > <?php echo lang('male'); ?></label>
                                            <label class="rowrec"> <input type="radio" id="passenger_3" value="3" name="passenger_type"  onchange="filter_result();"  > <?php echo lang('both'); ?></label>
                                            <input type="hidden" name="passenger" id="passenger" value="" />             
                                        </div>
                                    </div>

                                    <div class="rowrec srh-div">
                                        <h3> <?php echo lang('car_comfort'); ?> </h3>
                                        <div class="row algin_left" id="return_type">
                                            <label class="rowrec"> <input type="radio"  id="comfort_1" value="1" name="vechiclecomfort"  onchange="filter_result();"  > <?php echo lang('normal'); ?></label>
                                            <label class="rowrec"> <input type="radio" id="comfort_2" value="2" name="vechiclecomfort"  onchange="filter_result();"  > <?php echo lang('basic'); ?></label>
                                            <label class="rowrec"> <input type="radio" id="comfort_2" value="3" name="vechiclecomfort"  onchange="filter_result();"  > <?php echo lang('comfortable'); ?></label>
                                            <label class="rowrec"> <input type="radio" id="comfort_2" value="4" name="vechiclecomfort"  onchange="filter_result();"  ><?php echo lang('luxury'); ?></label>
                                            <input type="hidden" name="vechiclecomfort" id="vechiclecomfort" value="" />             
                                        </div>
                                    </div>
                                </div></div>

                            <?php if ($advertisement_search_image) { ?>
                                <div class="ad-image">                              
                                    <a href="<?php echo $advertisement_search_image['ad_nav_link']; ?>"><img src="<?= theme_advertisement_img($advertisement_search_image['image'], 'full') ?>" width=" 260px" height=" 500px" /></a>                                 
                                </div>
                            <?php } ?>
                        </div>

                        <!-- End Left -->

                        <div class="col-lg-9 col-md-8 col-sm-9 search-right action_right" style=" width: 74%;">

                            <div class="rowrec search-header">
                                <form method="get" id="findform"  action="<?php echo base_url(); ?>search">
                                    <input type="text" placeholder="<?php echo lang('form'); ?>"  name="source" id="source" class="sea-inp" value="<?= $selparam['SOURCE'] ?>"> 
                                    <input type="hidden" name="formlatlng" id="formlatlng"  value="<?= $selparam['fromlatlng'] ?>"/>
                                    <input type="text"  placeholder="<?php echo lang('to'); ?>"   name="destination" id="destination" class="sea-inp" value="<?= $selparam['DESTINATION'] ?>"/>
                                    <input type="hidden" name="tolatlng" id="tolatlng"  value="<?= $selparam['tolatlng'] ?>" />
                                    <input type="text" placeholder="DD/MM/YYYY" id="journey_date" class="sea-dat" onchange="getfrequency();"  name="journey_date" value="<?= $selparam['date'] ?>" >
                                    <input type="hidden" name="frequency" id="frequency"  value="<?= $selparam['frequency'] ?>"/>
                                    <input type="submit"  value="<?php echo lang('search'); ?>"   class="src-but srcin-but" />       
                                </form>          
                            </div>
                            <div id="rightarea">  
                                <div id="search_results">
                                    <?php
                                    if ($search_results) {
                                        foreach ($search_results as $search_result) {
                                            ?>
                                            <div class="row sea-box">
                                                <a href="<?php echo base_url('trip/tripdetails/' . $search_result['trip_led_id']); ?>">
                                                    <div class="sea-col1">            
                                                        <div class="sea-nam">
                                                            <h3> <?php
                                                                if ($search_result['user_type'] == 1) {
                                                                    echo $search_result['user_company_name'];
                                                                } else {
                                                                    echo $search_result['user_first_name'] . '.' . $search_result['user_last_name'];
                                                                }
                                                                ?></h3>
                                                            <div class="line2"></div>
                                                            <div> 
                                                                <?php if (!empty($search_result['vechicle_logo'])) { ?>
                                                                    <img src="<?php echo base_url('uploads/vehicle/thumbnails/' . $search_result['vechicle_logo']); ?>" class="search-thumb search-user-thumb"><?php } else { ?>
                                                                    <img src="<?php echo theme_img('no_car.png'); ?>" class="search-thumb search-user-thumb">
                                                                <?php } ?>
                                                            </div>                
                                                        </div>
                                                    </div>
                                                    <div class="sea-col2">
                                                        <h3><?= date('d/m/Y l ', strtotime(str_replace('/', '-', $selparam['date']))); ?> <?= ($search_result['expected_time'] != '' ? '- ' . $search_result['expected_time'] : $search_result['trip_depature_time']); ?></h3>
                                                        <div class="line2"></div>
                                                        <div class="sea-city-city"> 
                                                            <?php
                                                            $source = explode(",", $search_result['source']);
                                                            echo $source[0];
                                                            ?> <span> <img src="<?php echo theme_img('search-arrow-right.png') ?>"> </span> 
                                                            <?php
                                                            $destination = explode(",", $search_result['destination']);
                                                            echo $destination[0];
                                                            ?>
                                                        </div> <br>
                                                        <div class="search-pick-point">
                                                            <strong class="cs-blue-text"><span> <img src="<?php echo theme_img('src-dest-ico.png') ?>"> </span> <?php echo lang('departure'); ?></strong>
                                                            <?= $search_result['source'] ?>
                                                            <span class="cs-blue-text"><?= '( ' . $amenties_details['distance_' . $search_result['trip_id']] . ' km away from your search location)' ?></span>
                                                            <br>
                                                            <div class="paddingtop10"><strong class="cs-blue-text margintop10"><span> <img src="<?php echo theme_img('src-dest-ico.png') ?>"> </span> <?php echo lang('arrival'); ?></strong>
                                                                <?= $search_result['destination'] ?></div>
                                                        </div>
                                                    </div>
                                                    <div class="sea-col3">
                                                        <strong class="size16 text-success"> <?= format_currency($search_result['route_rate']); ?> </strong> <span class="size14"> <?php echo lang('per_passenger'); ?> </span>
                                                        <div class="line2"></div>
                                                        <!--<h4> Payment Methods </h4>
                                                        <div class="pay-met paddingtop10"> <img src="<?php //echo theme_img('pay-method.png')  ?>"> </div> <br>-->
                                                        <span class="badge blue-badge marginleft0" >
                                                            <?php
                                                            if ($search_result['trip_casual_date']) {
                                                                echo getAvailableSeat($search_result['trip_casual_date'], $search_result['trip_id']);
                                                            } else {
                                                                echo getAvailableSeat(date('Y-m-d', strtotime(str_replace('/', '-', $selparam['date']))), $search_result['trip_id']);
                                                            }
                                                            ?>
                                                        </span> <span class="size14"> <?php echo lang('available_seat'); ?> </span>
                                                        <br><br>                                                        
                                                    </div>
                                                </a>
                                            </div>
                                            <!-- End Box -->
                                            <?php
                                        }
                                    }
                                    ?>
                                            
                                </div>
                            </div>
                            <div id="map-content" style="display:none">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<link rel="stylesheet" type="text/css" href="<?php echo theme_js('jquery.datepick/redmond.datepick.css'); ?>"> 
<?php echo theme_js('jquery.datepick/jquery.plugin.js', true); ?>
<?php echo theme_js('jquery.datepick/jquery.datepick.js', true); ?>
<script type="text/javascript">
    $('#journey_date').datepick({
        changeMonth: false, autoSize: true, minDate: 0, dateFormat: 'dd/mm/yyyy'});
</script>
<div class="modal"></div>
<?php include('footer.php'); ?>
