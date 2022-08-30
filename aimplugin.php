<?php
   /*
   Plugin Name: AIM Experts Intergration
   Plugin URI: https://aimexperts.com
   description: Helps add the aim features to a wordpress website
   Version: 1.0.0
   Author: Liam Kennedy
   Author URI: https://aimexperts.com
   License: GPL2
   */

	
add_action('admin_menu', 'aim_integration_setup_menu');
 
function aim_integration_setup_menu(){
    add_menu_page( 'AIM Short Code', 'AIM Integration', 'manage_options', 'aim-shortcode', 'shortcode_aim' );
    add_submenu_page('aim-shortcode', 'AIM Short Code', 'AIM Short Code', 'manage_options', 'aim-shortcode' );
    
}


add_action('wp_enqueue_scripts', 'plugin_styles');

function plugin_styles() {
    wp_enqueue_style('AimPluginStyles', plugins_url('/css/style.css', __FILE__));
}

add_action('wp_enqueue_scripts', 'plugin_scripts');

function plugin_scripts() {
	wp_enqueue_script('AimPluginScripts', plugins_url('/js/scripts.js', __FILE__), array('jquery'), false, true);
}



function aimbuynow_function() {
     $qstring = $_SERVER['QUERY_STRING'];
 $content .= '<iframe style="min-height:1260px;" src="https://deal-proposal.com/apps/deal_proposal/make_your_deal.html?vin='.$qstring.'&dealer_id=28550" width="100%" height="100%">
</iframe>';
    
    return $content;
}

add_shortcode('aim-buynow', 'aimbuynow_function');  


function aim_listings_buttons_function() {
    $vin_num = get_post_meta(get_the_id(), 'vin_number', true);
	ob_start();
	?> 
                <a href="/virtual-sales-assistant/?<?php echo esc_attr($vin_num); ?>" target=_deal><img src="<?php echo plugin_dir_url( __FILE__ ) . '/img/CTA_With_Negotiate.gif'; ?>" style="margin-top: 10px; width:100%;"></a> <?php
	return ob_get_clean();
}

add_shortcode('aim-buttons-listing', 'aim_listings_buttons_function'); 

function aim_vdp_buttons_function() {
    $vin_num = get_post_meta(get_the_id(), 'vin_number', true);
	ob_start();
	?> 
<div id="aim_lease_calculator"  vin="<?php echo esc_attr($vin_num); ?>"
             widget_background="bf172e"
             apply_boostrap="0" open_in_window="0" ></div>
<script src="https://automediaservices.com/apps/calculator/lease_calculator.js" type="text/javascript"></script>
                
<script src="https://automediaservices.com/apps/calculatorPro/myjs/widget.js" type="text/javascript"></script>
<div class="aim_deal_sheet_app" dealer_id="28550" vin="<?php echo esc_attr($vin_num); ?>">
<button class="vsa-modal" onclick="aim_deal_sheet_widget.show_widget_dialog({dealer_id:28550,vin:'<?php echo esc_attr($vin_num); ?>'})"></button>
</div> 

<?php
	return ob_get_clean();
}

add_shortcode('aim-buttons-vdp', 'aim_vdp_buttons_function'); 

function aim_buttonss_static_function() {
    $vin_num = get_post_meta(get_the_id(), 'vin_number', true);
	ob_start();
	?>
<div id="aim_lease_calculator"  vin="<?php echo esc_attr($vin_num); ?>"
             style="margin-top: 5px; margin-bottom: 5px;"
             apply_boostrap="0" open_in_window="0" disclaimer=1 ></div>
<script src="https://automediaservices.com/apps/calculator/lease_calculator.js" type="text/javascript"></script>

<script src="https://automediaservices.com/apps/calculatorPro/myjs/widget.js" type="text/javascript"></script>
<div class="aim_deal_sheet_app" dealer_id="28550" vin="<?php echo esc_attr($vin_num); ?>">
<button class="vsa-modal" onclick="aim_deal_sheet_widget.show_widget_dialog({dealer_id:28550,vin:'<?php echo esc_attr($vin_num); ?>'})"></button>
</div> 

<script src="https://automediaservices.com/apps/deal_widgets/deposit/js/widget.js"type="text/javascript"></script>
<div class="aim_deal_deposit_app" dealer_id="28550" vin="<?php echo esc_attr($vin_num); ?>" >
<button class="reserve-now aim-button" onclick="aim_deal_deposit_widget.show_widget_dialog({dealer_id:28550,vin:'<?php echo esc_attr($vin_num); ?>',deposit:49})"></button></div>

<script src="https://automediaservices.com/apps/deal_widgets/credit/js/widget.js" type="text/javascript"></script>
<div class="aim_deal_credit_app"></div>
<button class="credit-apply-aim aim-button" onclick="aim_deal_apply_credit_widget.show_widget_dialog({dealer_id:28550})"></button>

<script src="https://automediaservices.com/apps/test_drive/js/widget.js"type="text/javascript"></script>
<div class="aim_deal_test_drive_app"  dealer_id="28550" vin="<?php echo esc_attr($vin_num); ?>" >
<button class="test-drive aim-button" onclick="aim_deal_test_drive_widget.show_widget_dialog({dealer_id:28550,vin:'<?php echo esc_attr($vin_num); ?>'})"></button></div>

<div class="aim_deal_sheet_app" dealer_id="28550" vin="<?php echo esc_attr($vin_num); ?>">
<button class="value-trade-aim aim-button"  onclick="aim_deal_sheet_widget.show_widget_dialog({dealer_id:28550,vin:'<?php echo esc_attr($vin_num); ?>'})"></button>
</div>

<div class="aim_deal_sheet_app" dealer_id="28550" vin="<?php echo esc_attr($vin_num); ?>">
<button class="make-offer-aim aim-button"  onclick="aim_deal_sheet_widget.show_widget_dialog({dealer_id:28550,vin:'<?php echo esc_attr($vin_num); ?>'})"></button>
</div>

<script src="https://automediaservices.com/apps/deal_widgets/google_review/js/widget.js"type="text/javascript"></script>
<div class="aim_deal_google_review_app" dealer_id="28550"></div>
<button class="aim-g-review aim-button" onclick="aim_deal_google_review_widget.show_widget_dialog()"></button>


<?php
	return ob_get_clean();
}

add_shortcode('aim-buttons-static', 'aim_buttonss_static_function');

function aim_buttons_float_function() {
    $vin_num = get_post_meta(get_the_id(), 'vin_number', true);
	ob_start();
	?> 


<div class="aim-floating-btns">
    
     <div class="aim-btn-box">
         <script src="https://automediaservices.com/apps/deal_widgets/deposit/js/widget.js"type="text/javascript"></script>
<div class="aim_deal_deposit_app" dealer_id="28550" vin="<?php echo esc_attr($vin_num); ?>" >         
<button class="reserve-button" onclick="aim_deal_deposit_widget.show_widget_dialog({dealer_id:28550,vin:'<?php echo esc_attr($vin_num); ?>',deposit:49})">
    
    <table class="aim-btn-table">
  <tr>
    <td width="40px;"><img width="40px;" height="40px;" src="<?php echo plugin_dir_url( __FILE__ ) . '/img/aim-clock.png'; ?>"></td>
      <td width="10px;"></td>
    <td width="146px;" class="aim-btn-text">RESERVE <br/>VEHICLE NOW</td>
  </tr>
</table>

    </button></div>

<script src="https://automediaservices.com/apps/deal_widgets/credit/js/widget.js" type="text/javascript"></script>
<div class="aim_deal_credit_app">
<button class="credit-button" onclick="aim_deal_apply_credit_widget.show_widget_dialog({dealer_id:28550})">
    
    <table class="aim-btn-table">
  <tr>
    <td width="40px;"><img style="position: relative;left: 3px;" width="40px;" height="40px;" src="<?php echo plugin_dir_url( __FILE__ ) . '/img/aim-credit-card.png'; ?>"></td>
      <td width="20px;"></td>
    <td width="146px;" class="aim-btn-text">APPLY FOR<br/> CREDIT</td>
  </tr>
</table>

</button></div>

<script src="https://automediaservices.com/apps/test_drive/js/widget.js"type="text/javascript"></script>
<div class="aim_deal_test_drive_app"  dealer_id="28550" vin="<?php echo esc_attr($vin_num); ?>" >         
<button class="btest-drive-button" onclick="aim_deal_test_drive_widget.show_widget_dialog({dealer_id:28550,vin:'<?php echo esc_attr($vin_num); ?>'})">
    
    <table class="aim-btn-table">
  <tr>
    <td width="40px;"><img style="position: relative;left: 3px;" width="40px;" height="40px;" src="<?php echo plugin_dir_url( __FILE__ ) . '/img/aim-wheel.png'; ?>"></td>
      <td width="20px;"></td>
    <td width="146px;" class="aim-btn-text">BOOK A<br/> TEST DRIVE</td>
  </tr>
</table>

    </button></div>
        
        <script src="https://automediaservices.com/apps/calculatorPro/myjs/widget.js" type="text/javascript"></script>
<div class="aim_deal_sheet_app" dealer_id="28550" vin="<?php echo esc_attr($vin_num); ?>">
         <button class="vtrade-button" onclick="aim_deal_sheet_widget.show_widget_dialog({dealer_id:28550,vin:'<?php echo esc_attr($vin_num); ?>'})">
    
    <table class="aim-btn-table">
  <tr>
    <td width="40px;"><img style="position: relative;left: 3px;" width="40px;" height="40px;" src="<?php echo plugin_dir_url( __FILE__ ) . '/img/aim-keys.png'; ?>"></td>
      <td width="20px;"></td>
    <td width="146px;" class="aim-btn-text">VALUE MY<br/> TRADE-IN</td>
  </tr>
</table>

    </button></div>
        

<div class="aim_deal_sheet_app" dealer_id="28550" vin="<?php echo esc_attr($vin_num); ?>">
         <button class="moffer-button" onclick="aim_deal_sheet_widget.show_widget_dialog({dealer_id:28550,vin:'<?php echo esc_attr($vin_num); ?>'})">
    
    <table class="aim-btn-table">
  <tr>
    <td width="40px;"><img style="position: relative;left: 3px;" width="40px;" height="40px;" src="<?php echo plugin_dir_url( __FILE__ ) . '/img/aim-hand.png'; ?>"></td>
      <td width="20px;"></td>
    <td width="146px;" class="aim-btn-text">MAKE AN<br/> OFFER</td>
  </tr>
</table>

    </button></div>
        <script src="https://automediaservices.com/apps/deal_widgets/google_review/js/widget.js"type="text/javascript"></script>
<div class="aim_deal_google_review_app" dealer_id="28550">
        <button class="greview-button" onclick="aim_deal_google_review_widget.show_widget_dialog()">
    
    <table class="aim-btn-table">
  <tr>
    <td width="40px;"><img style="position: relative;left: 3px;" width="40px;" height="40px;" src="<?php echo plugin_dir_url( __FILE__ ) . '/img/aim-google.png'; ?>"></td>
      <td width="20px;"></td>
    <td width="146px;" class="aim-btn-text">GOOGLE<br/> REVIEWS</td>
  </tr>
</table>

</button></div>
        
    
    </div>
    
    </div>
<?php
	return ob_get_clean();
}

add_shortcode('aim-buttons-float', 'aim_buttons_float_function'); 


register_activation_hook( __FILE__, 'myplugin_activate' );
    function myplugin_activate() {
   //create a variable to specify the details of page

       $post = array(     
                 'post_content'   => '[aim-buynow]', //content of page
                 'post_title'     =>'Virtual Sales Assistant', //title of page
                 'post_status'    =>  'publish' , //status of page - publish or draft
                 'post_type'      =>  'page'  // type of post
);
       wp_insert_post( $post ); // creates page
    
        
        }

        include( plugin_dir_path( __FILE__ ) . 'includes/slack.php'); 
        include( plugin_dir_path( __FILE__ ) . 'includes/shortcodes.php');  
        include( plugin_dir_path( __FILE__ ) . 'includes/av-admin.php');
        include( plugin_dir_path( __FILE__ ) . 'includes/plugin-colors.php');