<?php 
/**
 * Plugin Name: Custom User Roles
 * Description: To create custom useer roles to assign to the users
 * Plugin URI: https://customuseroles.com
 * Author: Keerthana Thatikayala
 * Version:0.0.1
 */

 defined('ABSPATH') or die;

 // Register user role when activating the plugin
 register_activation_hook(__FILE__,'ur_activation');

// Remove user role when deactivating the plugin
register_deactivation_hook(__FILE__,'ur_deactivation');

 function ur_activation(){
    $capabilities = [
        'read'          => true,
        'edit_posts'    => true,
        'upload_files'  => true,
        'delete_post'   => true,
        'publish_post'  => true
    ];
    add_role('reporter','Reporter',$capabilities);
 }

 function ur_deactivation(){
    remove_role('reporter');
 }

 // add role capabilities
 add_action('admin_init','ur_add_role_capabilities',999);

 function ur_add_role_capabilities(){
    //add roles that you would like to administer the custom post type
    $roles = array('reporter','administrator');
    foreach($roles as $the_roles){
        $role = get_role($the_roles);
        $role->add_cap('read_live-updates');
        $role->add_cap( 'edit_live-updates' );  
        $role->add_cap( 'edit_others_live-updates' ); 
        $role->add_cap( 'publish_live-updates' ); 
        $role->add_cap( 'read_private_live-updates' ); 
        $role->add_cap( 'delete_live-updates' ); 
        $role->add_cap( 'edit_published_live-updates' );
        $role->add_cap( 'delete_published_live-updates' );

        $role->add_cap('read_entertainment');
        $role->add_cap( 'edit_entertainment' );  
        $role->add_cap( 'edit_entertainment' ); 
        $role->add_cap( 'publish_entertainment' ); 
        $role->add_cap( 'read_private_entertainment' ); 
        $role->add_cap( 'delete_entertainment' ); 
        $role->add_cap( 'edit_published_entertainment' );
        $role->add_cap( 'delete_published_entertainment' );

    }
 }

?>