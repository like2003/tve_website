<?php

if ( !$this ) 
{
    echo 'Direct access not allowed.';
    exit;
}

global $wpdb;                                                           

@include dirname( __FILE__ ) . '/php/list.inc.php';
?>
<script type="text/javascript">//<!--
<?php echo $arrayJS_list; ?>

//-->
</script>
<link href="<?php echo plugins_url('/DC_MultiViewCal/css/'.$base_params["cssStyle"].'/calendar.css', __FILE__); ?>" type="text/css" rel="stylesheet" />
<link href="<?php echo plugins_url('/DC_MultiViewCal/css/main.css', __FILE__); ?>" type="text/css" rel="stylesheet" />
<noscript>The CP Multi View Event Calendar requires JavaScript enabled</noscript>
<?php 
  $custom_styles = base64_decode(get_option('CP_MCV_CSS', '')); 
  if ($custom_styles != '')
      echo '<style type="text/css">'.$custom_styles.'</style>';
  $custom_scripts = base64_decode(get_option('CP_MCV_JS', '')); 
  if ($custom_scripts != '')
      echo '<script type="text/javascript">'.$custom_scripts.'</script>';  
?>
<div style="z-index:1000;" id="multicalendar">
    <div id="cal1_<?php echo $this->print_counter; ?>" class="multicalendar"></div>
</div>        
<div style="clear:both;"></div> 

