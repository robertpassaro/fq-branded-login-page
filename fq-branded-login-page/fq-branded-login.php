<?php

defined('ABSPATH') or die("No script kiddies please!");

/**
 * Plugin Name: FQ Branded Login Page
 * Plugin URI: http://www.figoliquinn.com
 * Description: Add organization branding to the login page.
 * Version: 1.0
 * Author: Bob Passaro
 * Author URI: http:bobpassaro.com
 * License: GPL2
 */

 /*  Copyright 2016

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as 
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

/*
==================================================================================
 ADD STYLESHEET FOR OVERRIDES
==================================================================================
*/

add_action( 'login_enqueue_scripts', 'fq_admin_css' );

function fq_admin_css() {
    wp_enqueue_style( 'fq-login-styles', plugins_url( 'fq-login.css', __FILE__ ) );
}

/*
==================================================================================
 ADJUSTMENTS TO LOGIN SCREEN
==================================================================================
*/

// ADDS A SPECIAL FQ FOOTER TO LOG-IN PAGE

add_action( 'login_footer', 'fq_login_get_footer' );

function fq_login_get_footer() {
	include( 'templates/login-footer.php' );
}

// CHANGES LINK URL ON LOGIN LOGO FROM WORDPRESS.ORG TO SITE'S HOMEPAGE

add_filter( 'login_headerurl', 'fq_login_logo_url' );

function fq_login_logo_url() {
    return home_url();
}

// CHANGES TITLE ATTRIBUTE ON LOGIN LOGO LINK

add_filter( 'login_headertitle', 'fq_login_logo_url_title' );

function fq_login_logo_url_title() {
    return get_bloginfo( 'name' );
}
