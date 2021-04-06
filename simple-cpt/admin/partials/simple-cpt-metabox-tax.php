<?php

/**
 *
 * This file is used to markup the content of the metabox in Custom Taxonomies.
 *
 * @link       https://profiles.wordpress.org/pattihis/
 * @since      1.0.0
 *
 * @package    Simple_Cpt
 * @subpackage Simple_Cpt/admin/partials
 */


wp_nonce_field( 'simple_cpt_meta_box_nonce_action', 'simple_cpt_meta_box_nonce_field' );

?>
<table class="simple_cpt">
    <tr>
        <td class="first">
            <label for="simple_cpt_tax_name"><span class="required">*</span> <?php _e( 'Taxonomy Name', 'simple-cpt' ); ?></label>
            <input type="text" name="simple_cpt_tax_name" id="simple_cpt_tax_name" class="widefat" tabindex="1" value="<?php echo $simple_cpt_tax_name; ?>" />
            <p><?php _e( 'The taxonomy slug, must not exceed 32 characters.', 'simple-cpt' ); ?></p>
        </td>
        <td>
            <label for="simple_cpt_tax_hierarchical"><?php _e( 'Hierarchical', 'simple-cpt' ); ?></label>
            <select name="simple_cpt_tax_hierarchical" id="simple_cpt_tax_hierarchical" tabindex="2">
                <option value="0" <?php selected( $simple_cpt_tax_hierarchical, '0' ); ?>><?php _e( 'No', 'simple-cpt' ); ?> (<?php _e( 'default', 'simple-cpt' ); ?>)</option>
                <option value="1" <?php selected( $simple_cpt_tax_hierarchical, '1' ); ?>><?php _e( 'Yes', 'simple-cpt' ); ?></option>
            </select>
            <p><?php _e( 'Is this taxonomy hierarchical like categories or not hierarchical like tags', 'simple-cpt' ); ?></p>
        </td>
    </tr>
    <tr>
        <td class="first">
            <label for="simple_cpt_tax_singular_name"><?php _e( 'Singular Name', 'simple-cpt' ); ?></label>
            <input type="text" name="simple_cpt_tax_singular_name" id="simple_cpt_tax_singular_name" class="widefat" tabindex="3" value="<?php echo $simple_cpt_tax_singular_name; ?>" />
            <p><?php _e( 'A singular descriptive name for the taxonomy.', 'simple-cpt' ); ?></p>
        </td>
        <td>
            <label for="simple_cpt_tax_label"><?php _e( 'Plural Label', 'simple-cpt' ); ?></label>
            <input type="text" name="simple_cpt_tax_label" id="simple_cpt_tax_label" class="widefat" tabindex="4" value="<?php echo $simple_cpt_tax_label; ?>" />
            <p><?php _e( 'A plural descriptive name for the taxonomy.', 'simple-cpt' ); ?></p>
        </td>
    </tr>
    <tr>
        <td class="first">
            <label for="simple_cpt_tax_rewrite"><?php _e( 'Rewrite', 'simple-cpt' ); ?></label>
            <select name="simple_cpt_tax_rewrite" id="simple_cpt_tax_rewrite" tabindex="5">
                <option value="1" <?php selected( $simple_cpt_tax_rewrite, '1' ); ?>><?php _e( 'Yes', 'simple-cpt' ); ?> (<?php _e( 'default', 'simple-cpt' ); ?>)</option>
                <option value="0" <?php selected( $simple_cpt_tax_rewrite, '0' ); ?>><?php _e( 'No', 'simple-cpt' ); ?></option>
            </select>
            <p><?php _e( 'Triggers the handling of rewrites for this taxonomy.', 'simple-cpt' ); ?></p>
        </td>
        <td>
            <label for="simple_cpt_tax_custom_rewrite_slug"><?php _e( 'Custom Rewrite Slug', 'simple-cpt' ); ?></label>
            <input type="text" name="simple_cpt_tax_custom_rewrite_slug" id="simple_cpt_tax_custom_rewrite_slug" class="widefat" tabindex="6" value="<?php echo $simple_cpt_tax_custom_rewrite_slug; ?>" />
            <p><?php _e( 'Customize the permastruct slug.', 'simple-cpt' ); ?></p>
        </td>
    </tr>
    <tr>
        <td class="first">
        <label for="simple_cpt_tax_show_ui"><?php _e( 'Show UI', 'simple-cpt' ); ?></label>
            <select name="simple_cpt_tax_show_ui" id="simple_cpt_tax_show_ui" tabindex="7">
                <option value="1" <?php selected( $simple_cpt_tax_show_ui, '1' ); ?>><?php _e( 'Yes', 'simple-cpt' ); ?> (<?php _e( 'default', 'simple-cpt' ); ?>)</option>
                <option value="0" <?php selected( $simple_cpt_tax_show_ui, '0' ); ?>><?php _e( 'No', 'simple-cpt' ); ?></option>
            </select>
            <p><?php _e( 'Whether to generate a default UI for managing this taxonomy in the admin.', 'simple-cpt' ); ?></p>
        </td>
        <td>
            <label for="simple_cpt_tax_show_admin_column"><?php _e( 'Admin Column', 'simple-cpt' ); ?></label>
            <select name="simple_cpt_tax_show_admin_column" id="simple_cpt_tax_show_admin_column" tabindex="8">
                <option value="1" <?php selected( $simple_cpt_tax_show_admin_column, '1' ); ?>><?php _e( 'Yes', 'simple-cpt' ); ?> (<?php _e( 'default', 'simple-cpt' ); ?>)</option>
                <option value="0" <?php selected( $simple_cpt_tax_show_admin_column, '0' ); ?>><?php _e( 'No', 'simple-cpt' ); ?></option>
            </select>
            <p><?php _e( 'Show this taxonomy as a column in the custom post listing.', 'simple-cpt' ); ?></p>
        </td>
    </tr>
    <tr>
        <td class="first">
            <label for="simple_cpt_tax_show_in_rest"><?php _e( 'Show in REST', 'simple-cpt' ); ?></label>
            <select name="simple_cpt_tax_show_in_rest" id="simple_cpt_tax_show_in_rest" tabindex="9">
                <option value="1" <?php selected( $simple_cpt_tax_show_in_rest, '1' ); ?>><?php _e( 'Yes', 'simple-cpt' ); ?> (<?php _e( 'default', 'simple-cpt' ); ?>)</option>
                <option value="0" <?php selected( $simple_cpt_tax_show_in_rest, '0' ); ?>><?php _e( 'No', 'simple-cpt' ); ?></option>
            </select>
            <p><?php _e( 'Sets the show_in_rest key for this taxonomy.', 'simple-cpt' ); ?></p>
        </td>
        <td>
            <label for="simple_cpt_tax_query_var"><?php _e( 'Query Var', 'simple-cpt' ); ?></label>
            <select name="simple_cpt_tax_query_var" id="simple_cpt_tax_query_var" tabindex="10">
                <option value="1" <?php selected( $simple_cpt_tax_query_var, '1' ); ?>><?php _e( 'Yes', 'simple-cpt' ); ?> (<?php _e( 'default', 'simple-cpt' ); ?>)</option>
                <option value="0" <?php selected( $simple_cpt_tax_query_var, '0' ); ?>><?php _e( 'No', 'simple-cpt' ); ?></option>
            </select>
            <p><?php _e( 'Sets the query_var key for this taxonomy.', 'simple-cpt' ); ?></p>
        </td>
    <tr>
        <td class="first">
            <label for="simple_cpt_tax_post_types"><?php _e( 'Post Types', 'simple-cpt' ); ?></label>
            <p><?php _e( 'Select which post types will be associated with this taxonomy.', 'simple-cpt' ); ?></p>
            <p><?php _e( 'You can also create a relationship with the default Posts/Pages or custom post types created by your theme or other plugins.', 'simple-cpt' ); ?></p>
        </td>
        <td>
            <input type="checkbox" tabindex="11" name="simple_cpt_tax_post_types[]" id="simple_cpt_tax_post_types_post" value="post" <?php checked( $simple_cpt_tax_post_types_post, 'post' ); ?> /> <label class="checkbox" for="simple_cpt_tax_post_types_post"><?php _e( 'Posts', 'simple-cpt' ); ?></label><br />
            <input type="checkbox" tabindex="12" name="simple_cpt_tax_post_types[]" id="simple_cpt_tax_post_types_page" value="page" <?php checked( $simple_cpt_tax_post_types_page, 'page' ); ?> /> <label class="checkbox" for="simple_cpt_tax_post_types_page"><?php _e( 'Pages', 'simple-cpt' ); ?></label><br />
            <?php
            $post_types = get_post_types(
                array(
                    'public'   => true,
                    '_builtin' => false,
                )
            );

            $i = 13;
            foreach ( $post_types as $post_type ) {
                $checked = in_array( $post_type, $simple_cpt_tax_post_types ) ? 'checked="checked"' : '';
                ?>
                <input type="checkbox" tabindex="<?php echo $i; ?>" name="simple_cpt_tax_post_types[]" id="simple_cpt_tax_post_types_<?php echo $post_type; ?>" value="<?php echo $post_type; ?>" <?php echo $checked; ?> /> <label class="checkbox" for="simple_cpt_tax_post_types_<?php echo $post_type; ?>"><?php echo ucfirst( $post_type ); ?></label><br />
                <?php
                $i++;
            }
            ?>
        </td>
    </tr>
</table>

<?php

	    
