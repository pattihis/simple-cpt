<?php

/**
 *
 * This file is used to create the contents of the admin footer.
 *
 * @link       https://profiles.wordpress.org/pattihis/
 * @since      1.0.0
 *
 * @package    Simple_Cpt
 * @subpackage Simple_Cpt/admin/partials
 */

global $post_type;

?>
<div id="footer">
    <h5><?php echo $this->plugin_name . ' ' . $this->version; ?></h5>
</div>
<script id="cpt-header-template" type="text/x-custom-template">
<div class="wrap_header">
    <div class="simple_cpt_header full">
        <div class="left_wrap">
            <h1><?php _e( 'Simple CPT', 'simple-cpt'); ?></h1>
        </div>
        <div class="right_wrap">
            <ul>
                <li class="position_1"><a href="admin.php?page=simple-cpt" title="<?php _e( 'Go to plugin\'s overview page', 'simple-cpt'); ?>">CPT Overview</a></li>
                <li class="position_2 selected"><a href="edit.php?post_type=simple_cpt" title="<?php _e( 'You are here', 'simple-cpt'); ?>">Post Types</a></li>
                <li class="position_3"><a href="edit.php?post_type=simple_tax" title="<?php _e( 'Go to Taxonomies admin table', 'simple-cpt'); ?>">Taxonomies</a></li>
            </ul>
        </div>
    </div>
</div>
</script>
<script id="tax-header-template" type="text/x-custom-template">
<div class="wrap_header">
    <div class="simple_cpt_header full">
        <div class="left_wrap">
            <h1><?php _e( 'Simple CPT', 'simple-cpt'); ?></h1>
        </div>
        <div class="right_wrap">
            <ul>
                <li class="position_1"><a href="admin.php?page=simple-cpt" title="<?php _e( 'Go to plugin\'s overview page', 'simple-cpt'); ?>">CPT Overview</a></li>
                <li class="position_2"><a href="edit.php?post_type=simple_cpt" title="<?php _e( 'Go to Post Types admin table', 'simple-cpt'); ?>">Post Types</a></li>
                <li class="position_3 selected"><a href="edit.php?post_type=simple_tax" title="<?php _e( 'You are here', 'simple-cpt'); ?>">Taxonomies</a></li>
            </ul>
        </div>
    </div>
</div>
</script>
