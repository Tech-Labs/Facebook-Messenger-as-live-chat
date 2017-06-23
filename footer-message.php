<?php
/**
 * Facebook Messanger Live Chat 1.0.0 front end message template
 */
defined( 'ABSPATH' ) or die( 'No script kiddies please!' );
$page_id = get_option('mcl_fb_user');
if (!class_exists('Mobile_Detect')) {
    require_once 'Mobile_Detect.php';
}
$detect = new Mobile_Detect;
?>

<script type="text/javascript">
    function chatMe() {
        <?php if ( $detect->isiOS() ) :?>
        document.getElementById("mcl-chat").src = "fb-messenger://user-thread/<?php echo $page_id?>";
        <?php elseif ( $detect->isAndroidOS() ) :?>
        window.open("fb-messenger://user/<?php echo $page_id?>");
        <?php else:?>
        window.open("https://www.messenger.com/t/<?php echo $page_id?>", "", "width=500,height=600,toolbar=yes,scrollbars=yes,location=no,resizable=no");
        <?php endif;?>
    };
</script>
<style>
.mcl-chat-button{
    position: fixed;
    z-index: 9999;
    <?php  if(get_option('mlc_float')=="left"):?>
    left: 0;
    float: left;
    <?php else:?>
    right: 0;
    float: right;
    <?php endif;?>
    <?php  if(get_option('mlc_position')=="top"):?>
    top: 0;
    <?php else:?>
    bottom: 0;
    <?php endif;?>
    cursor: pointer;
    width: 55px;
    height: 55px;
}
</style>
<iframe id="mcl-chat" width="1" height="1" style="visibility: hidden;"></iframe>    
<a class="mcl-chat-button" href="javascript:chatMe();"><img src="<?php echo plugin_dir_url( __FILE__ ) . '/images/fb-messenger.png'?>"></a>