<?php
/*
Plugin Name:My Information
Description:Takes a title, a movie name and favorite song name
Version:1.0
Author:Deep Rahman
 */

// widget_init is called by wordpress after default widgets are registered

// require_once plugin_dir_path(__FILE__).'admin/class-boj-widgetexample-widget-my-info.php';

require_once 'admin/My_Info.php';

add_action('widgets_init','widget_registration');
function widget_registration(){
    register_widget('My_Info');
}