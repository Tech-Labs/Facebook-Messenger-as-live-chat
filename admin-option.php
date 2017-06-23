<?php
/**
 * Facebook Messanger Live Chat 1.0.0 admin panel.
 */
defined( 'ABSPATH' ) or die( 'No script kiddies please!' );
/**
 * add Facebook Messanger Live Chat Plugin Settings to admin menu.
 */
function mlc_create_menu() {
	//create new top-level menu
	add_menu_page(__( 'Facebook Messanger Live Chat Plugin Settings', 'mlc' ), __( 'FB Msg Live Chat Settings', 'mlc' ), 'administrator', __FILE__, 'mlc_settings_page' , plugins_url('/images/icon.png', __FILE__) );

	//call register settings function
	add_action( 'admin_init', 'register_mlc_settings' );
}
add_action('admin_menu', 'mlc_create_menu');
/**
 * register our settings.
 */
function register_mlc_settings() {
	//register our settings
	register_setting( 'mlc-settings-group', 'mlc_status' );
	register_setting( 'mlc-settings-group', 'mcl_fb_user' );
	register_setting( 'mlc-settings-group', 'mlc_float' );
	register_setting( 'mlc-settings-group', 'mlc_position' );
}
/**
 * settings page.
 */
function mlc_settings_page() {
?>
<div class="wrap">
<h2><?php _e( 'Facebook Messanger Live Chat', 'mlc' )?></h2>

<form method="post" action="options.php">
    <?php settings_fields( 'mlc-settings-group' ); ?>
    <?php do_settings_sections( 'mlc-settings-group' ); ?>
    <table class="form-table">
        <tr valign="top">
            <th scope="row"><?php _e( 'Facebook Messanger Live Chat Status', 'mlc' )?></th>
            <td>
                <fieldset><legend class="screen-reader-text"><span><?php _e( 'Facebook Messanger Live Chat Status', 'mlc' )?></span></legend>
                <label title="<?php _e( 'Enable', 'mlc' )?>"><input type="radio" name="mlc_status" value="1" <?php if(esc_attr( get_option('mlc_status') ) == 1 ){ ?> checked="checked"<?php }?>> <?php _e( 'Enable', 'mlc' )?></label><br>
                <label title="<?php _e( 'Disable', 'mlc' )?>"><input type="radio" name="mlc_status" value="0" <?php if(esc_attr( get_option('mlc_status') ) == 0 ){ ?> checked="checked"<?php }?>> <?php _e( 'Disable', 'mlc' )?></label><br>
                </fieldset>
            </td>
        </tr>
        <tr valign="top">
            <th scope="row"><?php _e( 'Facebook ID', 'mlc' )?></th>
            <td>
                <input type="text" class="regular-text" name="mcl_fb_user" value="<?php echo esc_attr( get_option('mcl_fb_user') ); ?>" /> <span><?php _e( 'This site will help you to find your page id <b>http://findmyfbid.com/</b>', 'mlc' )?></span>
            </td>
        </tr>
        
        <tr valign="top">
            <th scope="row"><?php _e( 'Float', 'mlc' )?></th>
            <td>
                <fieldset><legend class="screen-reader-text"><span><?php _e( 'Float', 'mlc' )?></span></legend>
                <label title="<?php _e( 'right', 'mlc' )?>"><input type="radio" name="mlc_float" value="right" <?php if(esc_attr( get_option('mlc_float') ) == 'right' ){ ?> checked="checked"<?php }?>> <?php _e( 'Right', 'mcl' )?></label><br>
                <label title="<?php _e( 'left', 'mlc' )?>"><input type="radio" name="mlc_float" value="left" <?php if(esc_attr( get_option('mlc_float') ) == 'left' ){ ?> checked="checked"<?php }?>> <?php _e( 'left', 'mcl' )?></label><br>
                </fieldset>
            </td>
        </tr>
        
        <tr valign="top">
            <th scope="row"><?php _e( 'Position', 'mlc' )?></th>
            <td>
                <fieldset><legend class="screen-reader-text"><span><?php _e( 'Position', 'mlc' )?></span></legend>
                <label title="<?php _e( 'top', 'mlc' )?>"><input type="radio" name="mlc_position" value="top" <?php if(esc_attr( get_option('mlc_float') ) == 'top' ){ ?> checked="checked"<?php }?>> <?php _e( 'Top', 'mcl' )?></label><br>
                <label title="<?php _e( 'bottom', 'mlc' )?>"><input type="radio" name="mlc_position" value="bottom" <?php if(esc_attr( get_option('mlc_float') ) == 'bottom' ){ ?> checked="checked"<?php }?>> <?php _e( 'Bottom', 'mcl' )?></label><br>
                </fieldset>
            </td>
        </tr>
    </table>
    
    <?php submit_button(); ?>

</form>
</div>
<?php }