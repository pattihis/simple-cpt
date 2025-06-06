<?php

/**
 *
 * This file is used to render the contents of the admin page of the plugin.
 *
 * @link       https://profiles.wordpress.org/pattihis/
 * @since      1.0.0
 *
 * @package    Simple_Cpt
 * @subpackage Simple_Cpt/admin/partials
 */

// Get all CPTs created by Simple CPT
$args = array(
    'post_type' => 'simple_cpt',
    'post_status' => 'publish',
);
$loop = new WP_Query( $args );
$simple_cpt = [];
$simple_cpt_names = [];
while ( $loop->have_posts() ) : $loop->the_post();
    $simple_cpt[] = array (
        'ID'            => get_the_ID(),
        'slug'          => get_post_meta( get_the_ID(), 'simple_cpt_name', true ),
        'singular'      => get_post_meta( get_the_ID(), 'simple_cpt_singular_name', true ),
        'plural'        => get_post_meta( get_the_ID(), 'simple_cpt_label', true ),
        'icon'          => get_post_meta( get_the_ID(), 'simple_cpt_icon_slug', true ),
    );
    $simple_cpt_names[] = get_post_meta( get_the_ID(), 'simple_cpt_name', true );
endwhile;
wp_reset_postdata();

// Get all taxonomies created by Simple CPT
$args = array(
    'post_type' => 'simple_tax',
    'post_status' => 'publish',
);
$loop = new WP_Query( $args );
$simple_tax = [];
$simple_tax_names = [];
while ( $loop->have_posts() ) : $loop->the_post();
    $simple_tax[] = array (
        'ID'        => get_the_ID(),
        'slug'      => get_post_meta( get_the_ID(), 'simple_cpt_tax_name', true ),
        'singular'  => get_post_meta( get_the_ID(), 'simple_cpt_tax_singular_name', true ),
        'plural'    => get_post_meta( get_the_ID(), 'simple_cpt_tax_label', true ),
    );
    $simple_tax_names[] = get_post_meta( get_the_ID(), 'simple_cpt_tax_name', true );
endwhile;
wp_reset_postdata();

?>
<div class="wrap_header">
    <div class="simple_cpt_header">
        <div class="left_wrap">
            <h1><?php _e( 'Simple CPT', 'simple-cpt'); ?></h1>
        </div>
        <div class="right_wrap">
            <ul>
                <li class="position_1 selected"><a href="admin.php?page=simple-cpt" title="<?php _e( 'You are here', 'simple-cpt'); ?>">CPT Overview</a></li>
                <li class="position_2"><a href="edit.php?post_type=simple_cpt" title="<?php _e( 'Go to Post Types admin table', 'simple-cpt'); ?>">Post Types</a></li>
                <li class="position_3"><a href="edit.php?post_type=simple_tax" title="<?php _e( 'Go to Taxonomies admin table', 'simple-cpt'); ?>">Taxonomies</a></li>
            </ul>
        </div>
    </div>
</div>
<h3><?php _e( 'Create custom Post Types and custom Taxonomies the simple way.', 'simple-cpt'); ?></h3>
<div class="simple_cpt_wrap">
    <div class="desc">
        <p><?php _e( 'Published custom post types and taxonomies created by Simple CPT are listed below', 'simple-cpt'); ?></p>
    </div>
    <div class="top">
        <div class="box left">
            <div>
                <h3><a href="<?php echo admin_url( 'post-new.php?post_type=simple_cpt' ); ?>"><?php _e( 'Custom Post Types', 'simple-cpt'); ?></a></h3>
        <?php
            if(!empty($simple_cpt)){
                foreach ( $simple_cpt  as $cpt ) {
                    $icon = empty($cpt['icon']) ? '<span class="dashicons dashicons-admin-post"></span>' : '<span class="dashicons '.$cpt['icon'].'"></span>' ;
                ?>
                    <div class="item-row">
                        <div class="left">
                            <?php echo $icon; ?>
                            <?php echo $cpt['singular']; ?>
                        </div>
                        <div class="right">
                            <a href="<?php echo get_edit_post_link($cpt['ID']); ?>" title="<?php echo sprintf( __('Edit %s custom post type', 'simple-cpt'), $cpt['singular']); ?>"><?php _e('Edit Type', 'simple-cpt'); ?></a> | <a href="<?php echo esc_url( add_query_arg(array( 'post_type' => $cpt['slug'] ), admin_url( 'edit.php' )) ); ?>" title="<?php echo sprintf( __('See all %s', 'simple-cpt'), $cpt['plural']); ?>"><?php _e('See Posts', 'simple-cpt'); ?></a>

                        </div>
                    </div>
                <?php
                }
            } else {
                _e( 'You haven\'t created any custom post types yet or they are not published.', 'simple-cpt');
            }
        ?>
            </div>
            <p class="add_new">
                <a class="button" href="<?php echo admin_url( 'post-new.php?post_type=simple_cpt' ); ?>"><?php _e( 'New Custom Post Type', 'simple-cpt');?></a>
            </p>
        </div>
        <div class="box right">
            <div>
                <h3><a href="<?php echo admin_url( 'post-new.php?post_type=simple_tax' ); ?>"><?php _e( 'Custom Taxonomies', 'simple-cpt'); ?></a></h3>
        <?php
            if(!empty($simple_tax)){
                foreach ( $simple_tax  as $tax ) {
                ?>
                    <div class="item-row">
                        <div class="left">
                            <?php echo $tax['singular']; ?>
                        </div>
                        <div class="right">
                            <a href="<?php echo get_edit_post_link($tax['ID']); ?>" title="<?php echo sprintf( __('Edit %s custom taxonomy', 'simple-cpt'), $tax['singular']); ?>"><?php _e('Edit Tax', 'simple-cpt'); ?></a> | <a href="<?php echo esc_url( add_query_arg( array( 'post_type' => $cpt['slug'] ), admin_url( 'edit.php' ) ) ); ?>" title="<?php echo sprintf( __('See all %s', 'simple-cpt'), $tax['plural']); ?>"><?php _e('See Terms', 'simple-cpt'); ?></a>
                        </div>
                    </div>
                <?php
                }
            } else {
                _e( 'You haven\'t created any custom taxonomies yet or they are not published.', 'simple-cpt');
            }
        ?>
            </div>
            <p class="add_new">
                <a class="button" href="<?php echo admin_url( 'post-new.php?post_type=simple_tax' ); ?>"><?php _e( 'New Custom Taxonomy', 'simple-cpt');?></a>
            </p>
        </div>
    </div>
    <div class="desc">
        <p><?php _e( 'All other public custom post types and taxonomies created by Wordpress core, your themes and other plugins are listed below', 'simple-cpt'); ?></p>
    </div>
    <div class="bottom">
        <div class="box left">
            <div>
                <h3><?php _e( 'Other Custom Post Types', 'simple-cpt'); ?></h3>
        <?php
            $post_types = get_post_types( array( 'public' => true, ), 'objects', 'and' );
            if ( $post_types ) {
                foreach ( $post_types as $post_type ) {
                    if ( !in_array($post_type->name, $simple_cpt_names) ) {
                        $icon = empty($post_type->menu_icon) ? '<span class="dashicons dashicons-admin-post"></span>' : '<span class="dashicons '.$post_type->menu_icon.'"></span>' ;
                    ?>
                        <div class="item-row">
                            <div class="left">
                                <?php echo $icon; ?>
                                <?php echo $post_type->labels->singular_name; ?>
                            </div>
                            <div class="right">
                                <a href="<?php echo esc_url( add_query_arg(array( 'post_type' => $post_type->name ), admin_url( 'edit.php' )) ); ?>" title="<?php echo sprintf( __('See all %s', 'simple-cpt'), $post_type->labels->name); ?>"><?php echo $post_type->labels->name; ?></a>

                            </div>
                        </div>
                    <?php
                    }
                }
            } else {
                _e( 'No custom post types were found.', 'simple-cpt');
            }
        ?>
            </div>
            <p class="add_new">
                <a class="button" href="<?php echo admin_url( 'post-new.php?post_type=simple_cpt' ); ?>"><?php _e( 'New Custom Post Type', 'simple-cpt');?></a>
            </p>
        </div>
        <div class="box right">
            <div>
                <h3><?php _e( 'Other Custom Taxonomies', 'simple-cpt'); ?></h3>
        <?php
            $taxonomies = get_taxonomies( array( 'public' => true, '_builtin' => false ), 'objects', 'and' );
            if ( $taxonomies ) {
                foreach ( $taxonomies  as $tax ) {
                    if ( !in_array($tax->name, $simple_tax_names) ) {
                    ?>
                        <div class="item-row">
                            <div class="left">
                                <?php echo $tax->labels->singular_name; ?>
                            </div>
                            <div class="right">
                                <a href="<?php echo esc_url( add_query_arg( array( 'post_type' => $cpt['slug'] ), admin_url( 'edit.php' ) ) ); ?>" title="<?php echo sprintf( __('See all %s', 'simple-cpt'), $tax->labels->name); ?>"><?php echo $tax->labels->name; ?></a>
                            </div>
                        </div>
                    <?php
                    }
                }
            } else {
                _e( 'No custom taxonomies were found.', 'simple-cpt');
            }
        ?>
            </div>
            <p class="add_new">
                <a class="button" href="<?php echo admin_url( 'post-new.php?post_type=simple_tax' ); ?>"><?php _e( 'New Custom Taxonomy', 'simple-cpt');?></a>
            </p>
        </div>
    </div>
</div>
<p>
    <?php _e( 'This is a free plugin so if you find it useful then please', 'link-juice-keeper' ); ?> <a target="_blank" href="https://wordpress.org/support/plugin/simple-cpt/reviews/?rate=5#new-post" title="Rate the plugin"><?php _e( 'rate the plugin', 'link-juice-keeper' ); ?> ★★★★★</a> <?php _e( 'to support us. Thank you!', 'link-juice-keeper' ); ?>
</p>
