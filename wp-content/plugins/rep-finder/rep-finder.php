<?php
/**
 * Representative Finder
 *
 * @package Representative Finder for Solcon Solutions LLC
 * @author Joe Badaczewski
 * @license GPL-2.0+
 * @link https://joebad.com
 * @copyright 2019 Solcon Solutions, LLC. All rights reserved.
 *
 *            @wordpress-plugin
 *            Plugin Name: Representative Finder
 *            Plugin URI: https://joebad.com
 *            Description: Representative Finder for Solcon Solutions LLC
 *            Version: 1.0
 *            Author: Joe Badaczewski
 *            Author URI: https://joebad.com
 *            Text Domain: rep-finder
 *            License: GPL-2.0+
 *            License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 */

//1. add a wp query variable to redirect to
add_action('query_vars','set_query_var1');
function set_query_var1($vars) {
  array_push($vars, 'custom_page'); // ref url redirected to in add rewrite rule
  return $vars;
}


//2. Create a redirect
add_action('init', 'custom_add_rewrite_rule');
function custom_add_rewrite_rule(){
  add_rewrite_rule('^rep-finder$','index.php?custom_page=1','top');
  //flush the rewrite rules, should be in a plugin activation hook, i.e only run once...
  flush_rewrite_rules();  
}


//3.return the file we want...
add_filter('template_include', 'plugin_include_template');
function plugin_include_template($template){
  if(get_query_var('custom_page')){
    $pluginDir = plugin_dir_path(__FILE__);
  	$template = $pluginDir ."/templates/rep-finder-template.php";
  }    
  return $template;    
}