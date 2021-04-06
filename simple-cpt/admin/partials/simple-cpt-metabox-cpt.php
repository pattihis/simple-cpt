<?php

/**
 *
 * This file is used to markup the content of the metabox in Custom Post Types.
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
            <label for="simple_cpt_name"><span class="required">*</span> <?php _e( 'CPT Name', 'simple-cpt' ); ?></label>
            <input type="text" name="simple_cpt_name" id="simple_cpt_name" class="widefat" tabindex="1" value="<?php echo $simple_cpt_name; ?>" />
            <p><?php _e( 'Must not exceed 20 characters and may only contain lowercase alphanumeric characters, dashes, and underscores', 'simple-cpt' ); ?></p>
        </td>
        <td>
            <label for="simple_cpt_label"><?php _e( 'Label', 'simple-cpt' ); ?></label>
            <input type="text" name="simple_cpt_label" id="simple_cpt_label" class="widefat" tabindex="2" value="<?php echo $simple_cpt_label; ?>" />
            <p><?php _e( 'Name of the post type shown in the menu. Usually plural.', 'simple-cpt' ); ?></p>
        </td>
    </tr>
    <tr>
        <td class="first">
            <label for="simple_cpt_singular_name"><?php _e( 'Singular Name', 'simple-cpt' ); ?></label>
            <input type="text" name="simple_cpt_singular_name" id="simple_cpt_singular_name" class="widefat" tabindex="3" value="<?php echo $simple_cpt_singular_name; ?>" />
            <p><?php _e( 'Name for one object of this post type.', 'simple-cpt' ); ?></p>
            <label for="simple_cpt_custom_rewrite_slug"><?php _e( 'Rewrite Slug', 'simple-cpt' ); ?></label>
            <input type="text" name="simple_cpt_custom_rewrite_slug" id="simple_cpt_custom_rewrite_slug" class="widefat" tabindex="4" value="<?php echo $simple_cpt_custom_rewrite_slug; ?>" />
            <p><?php _e( 'Customize the permalink slug.', 'simple-cpt' ); ?></p>
        </td>
        <td>
            <label for="simple_cpt_description"><?php _e( 'Description', 'simple-cpt' ); ?></label>
            <textarea name="simple_cpt_description" id="simple_cpt_description" class="widefat" tabindex="5" rows="4"><?php echo $simple_cpt_description; ?></textarea>
            <p><?php _e( 'A short descriptive summary of what the post type is.', 'simple-cpt' ); ?></p>
        </td>
    </tr>
    <tr>
        <td class="first">
            <label for="simple_cpt_rewrite"><?php _e( 'Rewrite', 'simple-cpt' ); ?></label>
            <select name="simple_cpt_rewrite" id="simple_cpt_rewrite" tabindex="6">
                <option value="1" <?php selected( $simple_cpt_rewrite, '1' ); ?>><?php _e( 'Yes', 'simple-cpt' ); ?> (<?php _e( 'default', 'simple-cpt' ); ?>)</option>
                <option value="0" <?php selected( $simple_cpt_rewrite, '0' ); ?>><?php _e( 'No', 'simple-cpt' ); ?></option>
            </select>
            <p><?php _e( 'Triggers the handling of rewrites for this post type.', 'simple-cpt' ); ?></p>
        </td>
        <td>
            <label for="simple_cpt_withfront"><?php _e( 'With Front', 'simple-cpt' ); ?></label>
            <select name="simple_cpt_withfront" id="simple_cpt_withfront" tabindex="7">
                <option value="1" <?php selected( $simple_cpt_withfront, '1' ); ?>><?php _e( 'Yes', 'simple-cpt' ); ?> (<?php _e( 'default', 'simple-cpt' ); ?>)</option>
                <option value="0" <?php selected( $simple_cpt_withfront, '0' ); ?>><?php _e( 'No', 'simple-cpt' ); ?></option>
            </select>
            <p><?php _e( 'Should the permastruct be prepended with the front base.', 'simple-cpt' ); ?></p>
        </td>
    </tr>
    <tr>
        <td class="first">
            <label for="simple_cpt_public"><?php _e( 'Public', 'simple-cpt' ); ?></label>
            <select name="simple_cpt_public" id="simple_cpt_public" tabindex="8">
                <option value="1" <?php selected( $simple_cpt_public, '1' ); ?>><?php _e( 'Yes', 'simple-cpt' ); ?> (<?php _e( 'default', 'simple-cpt' ); ?>)</option>
                <option value="0" <?php selected( $simple_cpt_public, '0' ); ?>><?php _e( 'No', 'simple-cpt' ); ?></option>
            </select>
            <p><?php _e( 'Whether this post type is intended to be used publicly either via the admin interface or by front-end users.', 'simple-cpt' ); ?></p>
        </td>
        <td>           
            <label for="simple_cpt_has_archive"><?php _e( 'Has Archive', 'simple-cpt' ); ?></label>
            <select name="simple_cpt_has_archive" id="simple_cpt_has_archive" tabindex="9">
                <option value="0" <?php selected( $simple_cpt_has_archive, '0' ); ?>><?php _e( 'No', 'simple-cpt' ); ?> (<?php _e( 'default', 'simple-cpt' ); ?>)</option>
                <option value="1" <?php selected( $simple_cpt_has_archive, '1' ); ?>><?php _e( 'Yes', 'simple-cpt' ); ?></option>
            </select>
            <p><?php _e( 'Whether there should be post type archives.', 'simple-cpt' ); ?></p>
        </td>
    </tr>
    <tr>
        <td class="first">
            <label for="simple_cpt_exclude_from_search"><?php _e( 'Exclude From Search', 'simple-cpt' ); ?></label>
            <select name="simple_cpt_exclude_from_search" id="simple_cpt_exclude_from_search" tabindex="10">
                <option value="0" <?php selected( $simple_cpt_exclude_from_search, '0' ); ?>><?php _e( 'No', 'simple-cpt' ); ?> (<?php _e( 'default', 'simple-cpt' ); ?>)</option>
                <option value="1" <?php selected( $simple_cpt_exclude_from_search, '1' ); ?>><?php _e( 'Yes', 'simple-cpt' ); ?></option>
            </select>
            <p><?php _e( 'Whether to exclude this post type from front end search results.', 'simple-cpt' ); ?></p>
        </td>
        <td>
            <label for="simple_cpt_show_ui"><?php _e( 'Show UI', 'simple-cpt' ); ?></label>
            <select name="simple_cpt_show_ui" id="simple_cpt_show_ui" tabindex="11">
                <option value="1" <?php selected( $simple_cpt_show_ui, '1' ); ?>><?php _e( 'Yes', 'simple-cpt' ); ?> (<?php _e( 'default', 'simple-cpt' ); ?>)</option>
                <option value="0" <?php selected( $simple_cpt_show_ui, '0' ); ?>><?php _e( 'No', 'simple-cpt' ); ?></option>
            </select>
            <p><?php _e( 'Whether to generate UI for managing this post type in the admin', 'simple-cpt' ); ?></p>
        </td>
    </tr>
    <tr>
        <td class="first">
            <label for="simple_cpt_show_in_menu"><?php _e( 'Show in Menu', 'simple-cpt' ); ?></label>
            <select name="simple_cpt_show_in_menu" id="simple_cpt_show_in_menu" tabindex="12">
                <option value="1" <?php selected( $simple_cpt_show_in_menu, '1' ); ?>><?php _e( 'Yes', 'simple-cpt' ); ?> (<?php _e( 'default', 'simple-cpt' ); ?>)</option>
                <option value="0" <?php selected( $simple_cpt_show_in_menu, '0' ); ?>><?php _e( 'No', 'simple-cpt' ); ?></option>
            </select>
            <p><?php _e( 'Show this post type in its own top level menu. "Show UI" must be true.', 'simple-cpt' ); ?></p>
        </td>
        <td>
            <label for="simple_cpt_menu_position"><?php _e( 'Menu Position', 'simple-cpt' ); ?></label>
            <input type="text" name="simple_cpt_menu_position" id="simple_cpt_menu_position" class="widefat" tabindex="13" value="<?php echo $simple_cpt_menu_position; ?>" />
            <p><?php _e( 'The position in the menu order the post type should appear, e.g. 25. "Show in Menu" must be true.', 'simple-cpt' ); ?></p>
        </td>
    </tr>
    <tr>
        <td class="first">
            <label for="simple_cpt_icon_slug">
            <?php if ( $simple_cpt_icon_slug ) { ?><span id="simple_cpt_icon_slug_before" class="dashicons-before <?php echo $simple_cpt_icon_slug; ?>"></span> <?php } ?>
            <?php _e( 'Slug Icon', 'simple-cpt' ); ?>
            </label>
            <input type="text" name="simple_cpt_icon_slug" id="simple_cpt_icon_slug" class="widefat" tabindex="14" value="<?php echo $simple_cpt_icon_slug; ?>" />
            <p><?php _e( 'This uses (<a href="https://developer.WordPress.org/resource/dashicons/">Dashicons</a>), e.g. dashicons-heart', 'simple-cpt' ); ?></p>
        </td>
        <td>
            <label for="simple_cpt_publicly_queryable"><?php _e( 'Publicly Queryable', 'simple-cpt' ); ?></label>
            <select name="simple_cpt_publicly_queryable" id="simple_cpt_publicly_queryable" tabindex="15">
                <option value="1" <?php selected( $simple_cpt_publicly_queryable, '1' ); ?>><?php _e( 'Yes', 'simple-cpt' ); ?> (<?php _e( 'default', 'simple-cpt' ); ?>)</option>
                <option value="0" <?php selected( $simple_cpt_publicly_queryable, '0' ); ?>><?php _e( 'No', 'simple-cpt' ); ?></option>
            </select>
            <p><?php _e( 'Whether queries can be performed on the front end for this post type', 'simple-cpt' ); ?></p>
        </td>
    </tr>
    <tr>
        <td class="first">
            <label for="simple_cpt_feeds"><?php _e( 'Feeds', 'simple-cpt' ); ?></label>
            <select name="simple_cpt_feeds" id="simple_cpt_feeds" tabindex="16">
                <option value="0" <?php selected( $simple_cpt_feeds, '0' ); ?>><?php _e( 'No', 'simple-cpt' ); ?> (<?php _e( 'default', 'simple-cpt' ); ?>)</option>
                <option value="1" <?php selected( $simple_cpt_feeds, '1' ); ?>><?php _e( 'Yes', 'simple-cpt' ); ?></option>
            </select>
            <p><?php _e( 'Should a feed permastruct be built for this post type.', 'simple-cpt' ); ?></p>
        </td>
        <td>
            <label for="simple_cpt_pages"><?php _e( 'Pages', 'simple-cpt' ); ?></label>
            <select name="simple_cpt_pages" id="simple_cpt_pages" tabindex="17">
                <option value="1" <?php selected( $simple_cpt_pages, '1' ); ?>><?php _e( 'Yes', 'simple-cpt' ); ?> (<?php _e( 'default', 'simple-cpt' ); ?>)</option>
                <option value="0" <?php selected( $simple_cpt_pages, '0' ); ?>><?php _e( 'No', 'simple-cpt' ); ?></option>
            </select>
            <p><?php _e( 'Should the permastruct provide for pagination.', 'simple-cpt' ); ?></p>
        </td>
    </tr>
    <tr>
        <td class="first">
            <label for="simple_cpt_capability_type"><?php _e( 'Capability Type', 'simple-cpt' ); ?></label>
            <select name="simple_cpt_capability_type" id="simple_cpt_capability_type" tabindex="18">
                <option value="post" <?php selected( $simple_cpt_capability_type, 'post' ); ?>><?php _e( 'Post', 'simple-cpt' ); ?> (<?php _e( 'default', 'simple-cpt' ); ?>)</option>
                <option value="page" <?php selected( $simple_cpt_capability_type, 'page' ); ?>><?php _e( 'Page', 'simple-cpt' ); ?></option>
            </select>
            <p><?php _e( 'The post type to use to build the read, edit, and delete capabilities.', 'simple-cpt' ); ?></p>
        </td>
        <td>
            <label for="simple_cpt_hierarchical"><?php _e( 'Hierarchical', 'simple-cpt' ); ?></label>
            <select name="simple_cpt_hierarchical" id="simple_cpt_hierarchical" tabindex="19">
                <option value="0" <?php selected( $simple_cpt_hierarchical, '0' ); ?>><?php _e( 'No', 'simple-cpt' ); ?> (<?php _e( 'default', 'simple-cpt' ); ?>)</option>
                <option value="1" <?php selected( $simple_cpt_hierarchical, '1' ); ?>><?php _e( 'Yes', 'simple-cpt' ); ?></option>
            </select>
            <p><?php _e( 'Whether the post type is hierarchical. Allows Parent to be specified.', 'simple-cpt' ); ?></p>
        </td>
    </tr>
    <tr>
        <td class="first">
            <label for="simple_cpt_show_in_rest"><?php _e( 'Show in REST', 'simple-cpt' ); ?></label>
            <select name="simple_cpt_show_in_rest" id="simple_cpt_show_in_rest" tabindex="20">
                <option value="1" <?php selected( $simple_cpt_show_in_rest, '1' ); ?>><?php _e( 'Yes', 'simple-cpt' ); ?> (<?php _e( 'default', 'simple-cpt' ); ?>)</option>
                <option value="0" <?php selected( $simple_cpt_show_in_rest, '0' ); ?>><?php _e( 'No', 'simple-cpt' ); ?></option>
            </select>
            <p><?php _e( 'Whether to expose this post type in the REST API. Must be true to enable the Gutenberg editor.', 'simple-cpt' ); ?></p>
        </td>
        <td>
            <label for="simple_cpt_query_var"><?php _e( 'Query Var', 'simple-cpt' ); ?></label>
            <select name="simple_cpt_query_var" id="simple_cpt_query_var" tabindex="21">
                <option value="1" <?php selected( $simple_cpt_query_var, '1' ); ?>><?php _e( 'Yes', 'simple-cpt' ); ?> (<?php _e( 'default', 'simple-cpt' ); ?>)</option>
                <option value="0" <?php selected( $simple_cpt_query_var, '0' ); ?>><?php _e( 'No', 'simple-cpt' ); ?></option>
            </select>
            <p><?php _e( 'Sets the query_var key for this post type.', 'simple-cpt' ); ?></p>
        </td>
    </tr>
    <tr>
        <td class="first">
            <label for="simple_cpt_supports"><?php _e( 'Supports', 'simple-cpt' ); ?></label>
            <p><?php _e( 'Enable core features for this post type', 'simple-cpt' ); ?></p>
            <input type="checkbox" tabindex="22" name="simple_cpt_supports[]" id="simple_cpt_supports_title" value="title" <?php checked( $simple_cpt_supports_title, 'title' ); ?> /> <label class="checkbox" for="simple_cpt_supports_title"><?php _e( 'Title', 'simple-cpt' ); ?> <span class="default">(<?php _e( 'default', 'simple-cpt' ); ?>)</span></label><br />
            <input type="checkbox" tabindex="23" name="simple_cpt_supports[]" id="simple_cpt_supports_editor" value="editor" <?php checked( $simple_cpt_supports_editor, 'editor' ); ?> /> <label class="checkbox" for="simple_cpt_supports_editor"><?php _e( 'Editor', 'simple-cpt' ); ?> <span class="default">(<?php _e( 'default', 'simple-cpt' ); ?>)</span></label><br />
            <input type="checkbox" tabindex="24" name="simple_cpt_supports[]" id="simple_cpt_supports_excerpt" value="excerpt" <?php checked( $simple_cpt_supports_excerpt, 'excerpt' ); ?> /> <label class="checkbox" for="simple_cpt_supports_excerpt"><?php _e( 'Excerpt', 'simple-cpt' ); ?> <span class="default">(<?php _e( 'default', 'simple-cpt' ); ?>)</span></label><br />
            <input type="checkbox" tabindex="25" name="simple_cpt_supports[]" id="simple_cpt_supports_trackbacks" value="trackbacks" <?php checked( $simple_cpt_supports_trackbacks, 'trackbacks' ); ?> /> <label class="checkbox" for="simple_cpt_supports_trackbacks"><?php _e( 'Trackbacks', 'simple-cpt' ); ?></label><br />
            <input type="checkbox" tabindex="26" name="simple_cpt_supports[]" id="simple_cpt_supports_custom_fields" value="custom-fields" <?php checked( $simple_cpt_supports_custom_fields, 'custom-fields' ); ?> /> <label class="checkbox" for="simple_cpt_supports_custom_fields"><?php _e( 'Custom Fields', 'simple-cpt' ); ?></label><br />
            <input type="checkbox" tabindex="27" name="simple_cpt_supports[]" id="simple_cpt_supports_comments" value="comments" <?php checked( $simple_cpt_supports_comments, 'comments' ); ?> /> <label class="checkbox" for="simple_cpt_supports_comments"><?php _e( 'Comments', 'simple-cpt' ); ?></label><br />
            <input type="checkbox" tabindex="28" name="simple_cpt_supports[]" id="simple_cpt_supports_revisions" value="revisions" <?php checked( $simple_cpt_supports_revisions, 'revisions' ); ?> /> <label class="checkbox" for="simple_cpt_supports_revisions"><?php _e( 'Revisions', 'simple-cpt' ); ?></label><br />
            <input type="checkbox" tabindex="29" name="simple_cpt_supports[]" id="simple_cpt_supports_featured_image" value="thumbnail" <?php checked( $simple_cpt_supports_featured_image, 'thumbnail' ); ?> /> <label class="checkbox" for="simple_cpt_supports_featured_image"><?php _e( 'Featured Image', 'simple-cpt' ); ?></label><br />
            <input type="checkbox" tabindex="30" name="simple_cpt_supports[]" id="simple_cpt_supports_author" value="author" <?php checked( $simple_cpt_supports_author, 'author' ); ?> /> <label class="checkbox" for="simple_cpt_supports_author"><?php _e( 'Author', 'simple-cpt' ); ?></label><br />
            <input type="checkbox" tabindex="31" name="simple_cpt_supports[]" id="simple_cpt_supports_page_attributes" value="page-attributes" <?php checked( $simple_cpt_supports_page_attributes, 'page-attributes' ); ?> /> <label class="checkbox" for="simple_cpt_supports_page_attributes"><?php _e( 'Page Attributes', 'simple-cpt' ); ?></label><br />
            <input type="checkbox" tabindex="32" name="simple_cpt_supports[]" id="simple_cpt_supports_post_formats" value="post-formats" <?php checked( $simple_cpt_supports_post_formats, 'post-formats' ); ?> /> <label class="checkbox" for="simple_cpt_supports_post_formats"><?php _e( 'Post Formats', 'simple-cpt' ); ?></label><br />
        </td>
        <td>
            <label for="simple_cpt_builtin_tax"><?php _e( 'Core Taxonomies', 'simple-cpt' ); ?></label>
            <p><?php _e( 'Enable core taxonomies for this post type', 'simple-cpt' ); ?></p>
            <input type="checkbox" tabindex="33" name="simple_cpt_builtin_tax[]" id="simple_cpt_builtin_tax_categories" value="category" <?php checked( $simple_cpt_builtin_tax_categories, 'category' ); ?> /> <label class="checkbox" for="simple_cpt_builtin_tax_categories"><?php _e( 'Categories', 'simple-cpt' ); ?></label><br />
            <input type="checkbox" tabindex="34" name="simple_cpt_builtin_tax[]" id="simple_cpt_builtin_tax_tags" value="post_tag" <?php checked( $simple_cpt_builtin_tax_tags, 'post_tag' ); ?> /> <label class="checkbox" for="simple_cpt_builtin_tax_tags"><?php _e( 'Tags', 'simple-cpt' ); ?></label><br />
        </td>
    </tr>
</table>

<?php
