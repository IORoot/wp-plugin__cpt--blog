<?php

/*
 * @wordpress-plugin
 * Plugin Name:       _ANDYP - CPT - Blog
 * Plugin URI:        http://londonparkour.com
 * Description:       <strong>📬CPT</strong> | Adds Labs CPT - Blog
 * Version:           1.0.0
 * Author:            Andy Pearson
 * Author URI:        https://londonparkour.com
 * Domain Path:       /languages
 */

// ┌─────────────────────────────────────────────────────────────────────────┐
// │                            CONFIGURATION                                │
// └─────────────────────────────────────────────────────────────────────────┘
$config = [

    // Name of the Root custom post type to create.
    'post_type' => 'blog',

    // SVG Data URI for the wordpress sidemenu icon.
    'svgdata_icon' => 'data:image/svg+xml;base64,PHN2ZyB2aWV3Qm94PSIwIDAgMjQgMjQiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+PHBhdGggZD0iTTE1LjU0LDMuNUwyMC41LDguNDdMMTkuMDcsOS44OEwxNC4xMiw0LjkzTDE1LjU0LDMuNU0zLjUsMTkuNzhMMTAsMTMuMzFDOS45LDEzIDkuOTcsMTIuNjEgMTAuMjMsMTIuMzVDMTAuNjIsMTEuOTYgMTEuMjYsMTEuOTYgMTEuNjUsMTIuMzVDMTIuMDQsMTIuNzUgMTIuMDQsMTMuMzggMTEuNjUsMTMuNzdDMTEuMzksMTQuMDMgMTEsMTQuMSAxMC42OSwxNEw0LjIyLDIwLjVMMTQuODMsMTYuOTVMMTguMzYsMTAuNTlMMTMuNDIsNS42NEw3LjA1LDkuMTdMMy41LDE5Ljc4WiIvPjwvc3ZnPg==',
    
    // SLUG of Create a Taxonomy - Category
    'category' => 'blog_category',
    
    // SLUG of Create a Taxonomy - Tags
    'tags' => 'blog_tags',
];

//  ┌─────────────────────────────────────────────────────────────────────────┐
//  │                           Register CONSTANTS                            │
//  └─────────────────────────────────────────────────────────────────────────┘
$upper = strtoupper($config['post_type']);
define( 'ANDYP_CPT_'.$upper.'_PATH', __DIR__ );
define( 'ANDYP_CPT_'.$upper.'_URL', plugins_url( '/', __FILE__ ) );
define( 'ANDYP_CPT_'.$upper.'_FILE',  __FILE__ );

//  ┌─────────────────────────────────────────────────────────────────────────┐
//  │                    Register with ANDYP Plugins                          │
//  └─────────────────────────────────────────────────────────────────────────┘
require __DIR__.'/src/acf/andyp_plugin_register.php';


// ┌─────────────────────────────────────────────────────────────────────────┐
// │                         Use composer autoloader                         │
// └─────────────────────────────────────────────────────────────────────────┘
require __DIR__.'/vendor/autoload.php';

// ┌─────────────────────────────────────────────────────────────────────────┐
// │                    Plugin Activation - once only.    		             │
// └─────────────────────────────────────────────────────────────────────────┘
new andyp\cpt\blog\setup\activate;


// ┌─────────────────────────────────────────────────────────────────────────┐
// │                        	   Initialise    		                     │
// └─────────────────────────────────────────────────────────────────────────┘
$cpt = new andyp\cpt\blog\initialise;
$cpt->set_config($config);
$cpt->run();