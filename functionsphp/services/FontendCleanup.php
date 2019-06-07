<?php
/**
 * Remove unneeded features from the head.
 *
 * @package    FunctionsPhp
 * @subpackage FunctionsPhp/Services
 */

namespace FunctionsPhp\Services;


use FunctionsPhp\Lib\Service;
use FunctionsPhp\Lib\Registerable;
use FunctionsPhp\Lib\Conditional;


final class FontendCleanup implements Service, Registerable, Conditional {

    /**
     * the constructor.
     */
    public function __construct() { }


    /**
     * is_needed.
     *
     * Should this service bee initialized?
     *
     * @return bool
     */
    static function is_needed() : bool {

        return ! \is_admin() ? true : false;

    }


    /**
     * register.
     *
     * Register hooks with WordPress.
     *
     * @return void
     */
    public function register() : void {

        \add_action( 'init' , array( $this , 'disable_emojis' ) );
        \add_action( 'init' , array( $this , 'clean_up_header' ) );
        \add_action( 'wp_footer' , array( $this , 'remove_wpembed_scripts' ) );

    }


    /**
     * disable_emojis.
     *
     * Disable fontend emoji's.
     *
     * @return void
     */
    public function disable_emojis() : void {

        \remove_action( 'wp_head' , 'print_emoji_detection_script' , 7 );
        \remove_action( 'wp_print_styles' , 'print_emoji_styles' );
        \remove_action( 'admin_print_scripts' , 'print_emoji_detection_script' );
        \remove_action( 'admin_print_styles' , 'print_emoji_styles' );

    }


    /**
     * clean_up_header.
     *
     * Remove unneeded crap from header.
     *
     * @return void
     */
    public function clean_up_header() : void {

        \remove_action( 'wp_head' , 'rsd_link' );
        \remove_action( 'wp_head' , 'wp_generator' );
        \remove_action( 'wp_head' , 'feed_links' , 2 );
        \remove_action( 'wp_head' , 'feed_links_extra' , 3 );
        \remove_action( 'wp_head' , 'index_rel_link' );
        \remove_action( 'wp_head' , 'wlwmanifest_link' );
        \remove_action( 'wp_head' , 'start_post_rel_link' , 10 , 0 );
        \remove_action( 'wp_head' , 'parent_post_rel_link' , 10 , 0 );
        \remove_action( 'wp_head' , 'adjacent_posts_rel_link' , 10 , 0 );
        \remove_action( 'wp_head' , 'adjacent_posts_rel_link_wp_head' , 10 , 0 );
        \remove_action( 'wp_head' , 'wp_shortlink_wp_head' , 10 , 0 );
        \remove_action( 'wp_head' , 'print_emoji_detection_script' , 7 );
        \remove_action( 'wp_head' , 'wp_resource_hints' , 2 );
        \remove_action( 'wp_head' , 'rel_canonical' );

    }


    /**
     * remove_wpembed_scripts.
     *
     * Remove wpembed scripts.
     *
     * @return void
     */
    public function remove_wpembed_scripts() : void {

        \wp_deregister_script( 'wp-embed' );

    }

}