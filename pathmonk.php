<?php

/*
Plugin Name: Pathmonk
Plugin URI: http://pathmonk.com
Description: Adds artificial Intelligence to your website to increase your sales / leads / meetings books. To get started: activate Pathmonk plugin and then go to your Pathmonk Settings page to set up your API key.
Version: 1.1.0
Author: Pathmonk
Author URI: https://pathmonk.com
License: GPLv2 or later
*/

/*
Copyright 2020 Pathmonk (email : pluginpathmonk@pathmonk.com)

This program is free software; you can redistribute it and/or
modify it under the terms of the GNU General Public License
as published by the Free Software Foundation; either version 2
of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.


*/


// Don't expose any info if called directly
if ( !function_exists( 'add_action' ) ) {
    echo 'No reason to be  called directly.';
    exit;
}


if ( is_admin() ) { // admin actions
    add_action('admin_menu', 'pathmonk_menu_page');
    add_action( 'admin_init', 'pathmonk_register_settings' );
}

function pathmonk_register_settings() { // whitelist options
    register_setting( 'pathmonk-option-group', 'api_value' );
}



function pathmonk_menu_page(){
    add_menu_page('Pathmonk settings', 'Pathmonk', 'manage_options', 'pathmonk-menu', 'pathmonk_menu_page_content','data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABQAAAAUCAMAAAC6V+0/AAACYVBMVEV5dpx9e5+AfqGEgqSMiKmPjKyYlrOYlrSZl7Skobypp8Cxr8Wxr8a1tMm4tsu6ucy7ucy7us29u869vM6+vc++vdC/vtHBv9HBwNLDwtPEw9TFxNXGxdXGxdbIx9fJyNfJyNjKydjLytjLy9nNy9nPztvPztzR0NzR0N3R0d3U09/X1uHY1+Hb2uXf3ufj4urp6O7p6e7w8PX19fj39/r5+fv6+vz7+vz9/f39/f7+/v7+/v/+///////h4Ojz8va+vND6+fv7+/zCv9Le3ebk5Oz29viysce2tcrJx9fOzdvU099va5WUkrCWlLGcmbXV1ODLytnR0NywrsV9e6BlY47OzdtqaJGOjKxraZKqp8Cysce8us2QjKySj62ambStqsKurMLFxNRubJSEgaTFxNSXlLF/faF6d5yenLeioLqpp7/DwtKRj66VkrCPjKx0cZh7eJ5+e5+Gg6WHhKaIhaeLiamPjayTka+amLSIhafk4+uOi6uUk7BKRnllYo1nY45qZ5B5dpt5d5x8eZ18eZ9+e6CBfqGEgaSFgqWGg6WIhaeKh6iNiqqPjKyQjq2UkrCVk7CVk7GXlLGXlbOZl7OamLSenLenpb2pqMCrqcGsq8GurMOxsMWyr8WysMazsce0s8i1tMi2tcq5t8u5uMu6ucy7us29vM6+vc/BwNHBwNLCwdLEw9PEw9TGxdbGxtXIx9bLytnMy9nQz9zS0d7T0t/Y1+La2ePb2uTc2+Xe3ufn5+3q6fDw7/Tx8PT39/n49/r4+Pr6+vv6+vz7+/z8+/38/P39/f7+/v7///9sKbjPAAAAfnRSTlMAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAgIFhsbHR8fJigpLzMzPDw8PDxHU1hgaXR/gIONjY6qqqqqqqqrrrG+zc7P0N/f4eHi8fLy8vLy8vLy8vP09vmJFOPjAAABKUlEQVQY043Qy07CQACF4TPTmU4v2HKPAYu6UJCLGOPGhS/ga7swUaNRgiaYGiOIMULwEksZ2o4LNiay8Cy/1Z9DjvB3dImBlMj8W+TiuHmoTq800RdbVkgBsOmj6UjLlFnblzYABkAR6hrFUBXjKUW8QKUlCd+p7yHfuVGUQ4GsGmQ7E7ntxkhE172EyYEekkrQbLdyo03l60znXN2fvcxYbpiq7aIM7C9y3s1XjakUiX836vSNascHAtUu+rDQIQNlj5/rLWZkNhqwz20PcC7MMm5VeaI5H0HTSHsVE0h762bMT/qBFk0L+QK4nHMk0EHvnvwvJgNlAZhdem63VAMYmXC66mpDyPlK9fMhu6YwDknBYQ6GTjBRlM6I8CNh9MZuQv598lL8AatCau1gw7dUAAAAAElFTkSuQmCC' );

}

function pathmonk_menu_page_content(){

    ?>
    <div class="wrap">
        <h1>Pathmonk Settings</h1><br><br>
        <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAFAAAABQCAMAAAHOyDIJAAACmlBMVEUAAAD///+AgIBVVaqAgIBmZplVVYBJSZJgYIBVVY5NTYBGRotVVYBOTnZJSYBVRHdQUIBLS3hHR4BRQ3lNTYBJSXlGRoBOQ3pKSoBHR3pORXZMQntJSXZGRntISHhGRnxLRHhJQnxHR3hMRXVKQ3lIQXZGRnlLRHZJQ3lHQXdGRnpIQ3pFRXpHQnVGQXhIQ3hHQnZGRnlJRHZIQ3lGQndFRXlHQ3VIRHhHQ3ZGQnhIRXZHRHhGQ3ZFQnhIRHdGQndIQXVHRHdGQ3VGQndIQXZHRHdGQ3ZFQnhIQXZHRHhGQ3ZFQnVGQ3VIQnVHQXdFQ3dHQnZHQXdGQ3ZFQnhHQnZGQ3ZHQnVGQXZFQ3dHQnZGQndGQ3ZFQ3dHQnZGQndHQnZFQ3dGQndGQXZFQ3dGQndGQXZHQ3VGQnZFQXZHQ3VGQnZFQXdHQ3ZGQndFQXdGQ3ZGQnVFQnZHQXVGQnVFQnZGQndGQnZFQndGQXZGQnVFQnZHQXVGQXZGQnVFQnZGQXVGQXZGQnZFQnZGQXZGQ3dFQnZGQXZGQ3VFQnZGQnVGQXZGQnVGQnZGQXZFQnZFQnVGQnZGQXVFQnZGQnVGQnZGQXVFQnZGQnZFQnZGQnZGQXVGQnVGQXVFQXZGQnVGQnZFQXVFQXZGQnZGQnZFQXZGQXVGQnZFQXZGQnZFQnVFQXZGQXZGQnZFQnZGQXVGQnVFQnZGQXVGQnZFQnVFQnZGQXVGQnZFQnZFQnZGQXZGQXZGQnVFQnZGQXVGQXZGQXdFQnVGQXVGQXZFQnVGQXZGQXVFQnZGQnVGQXZFQXVFQnZGQnVGQXZFQXVFQnZGQnVGQXZFQXZGQnVGQnZFQXVFQXZGQnVGQnZFQXVFQXZGQnVGQnZFQXVFQXXNdeO2AAAA3XRSTlMAAQIDBAUGBwgJCgsMDQ4PEBESExQVFhcYGRobHB0gISIjJCUmJygpKissLjAyMzU2Nzg5Ojs9QEFCQ0RFRkdJSktMTU5PUFFSU1RVV1laXF1eX2BhY2RmZ2hpamtsbXBydHV2eHl6e31+gIGCg4WGh4iJi4yOj5CRkpOUlZaXmJmam5ydnqChoqOkpaeoqaqrrK2ur7Cxs7W2t7m7vL2+v8DBwsPExcfJysvMzc7P0dLT1NXW19jZ2tvc3N3e39/g4uPk5ufo6err7O3u7/Dx8vP09fb3+Pn6+/z9/tmHXBAAAAVbSURBVFjD5VjrXxRVGD4xwIILAiGQC9EFUSsMRYgiw0iU1SCySHRxMcigDEMxK1DzhhUU62op3VADzU0LjC5o0sStlpDbcnEB9/1fOmdm9jK7M7Mz6/7iQ8+HM++888xz3nO/ICSFbPax3sVF0zRndWtR5FXO1hZGclYIArSINYGAsfo0BO0e+pNjktmjHpq2cuYmhKo5sw2hXXaGFThjlmR2mzEfxHlBEk8IPKS7TGqDwXDS1dX/Aio4hqNG+4ddvLnkb4v773FM4dR850UtTiLf4jvbnsdEqoofjh0CEb4hFK08qEI9fQHq4BA31wcmA8Esz9nCPhJcfQMtZasYJ6/4sUJVip2ZqhQ35zhN9/XStJaf/TApeD9ya59WkgDfl0ecdTwvcS4M9XBuwn2COkjxnUjjEeh99ooPcvoOOloD9nrW3wkXu0PDYku8hlbUMDu2Vcgjvgw75NDY/hkoTbrKe1uaIUps4b0lZAuzGm0k3f0u09rNMeTxzYwwNTfWy+CzY0Uq89hyal+gNJHDIDR5r8GV2lY228hcSBejTdREQqiDmDqLTpuEiTimtjwHsW6XaJQc8QTuRpgkRWRhJf3dYxrgEZeRNN7qGBhPik2X5LMjRoQeHhWsvLaIEB60oA4Jib72m5AafyxWHRNunqpbE54wv4b+U0yNySQe/lAeL+b0l3FyeIY3EdKdlzEtl5M0wgsLTCYTqjew6NwsyjuAZA6uRv8SA389d4l8JMvG3jXP7MH2tkv1giXZTpbB5vuJXVNDUgryxTuuE1SReO0oIpZdQ2irRY5i9OFP15HnQ0+LErNmaYI/e5jHtNfmBhnLd61zzamS1LrCxUlBwIB41gUwiRxEFAiwUpgXDer6QScRNoaLxKozOqcAijGGkgWJJSc9iEuliU+kySPC9DQ7EUkSKbhQYtQ1fERRQIkS7bOsUZfBmSJEM9czMLGL3VUKE1dY3Ykgshj/CG4wiC2FvcilCcVGYUwHCOBKmAcPMvlzfWz3zzhdC+47xB+yhQdG8eduXtM6duVyJ243uhEjQKvhYdnfv+C00HXLxSL8gsDqMfF1MJpvLDhj+WKhPwVfvF0xudWvIT4Cqf4TCyobH2k5dGrIWuOfut89s8beq4dfuSul1eVvY3wMi9XHDTw0Vaf4IJd3Z734x/cn1IoFG1skPiZA9rwKJh2ojGIFs0rvQWjzRtadU0zGd45dML2+OlyeXhzo6mwTE7Vk6N6E/rmRRO7s95etzzbAnAjU3aMWyP7qstwQH4tD8UcDpBbKJTh5VKOk2LkQK/6RgiLFbeIiGFcQzRqpWSF+EUSvToGl48Ys/JF+FxEG934bJfYtrHnIl7kssfzIUTumbDPwu+Pt9WSfh7Nqbek7hzCm8UJykxg1uqcon9U2/APQeR7onQ5UABh7Aa77NDc+OwPHVfgcBa2u3YWcpxZfhsHlCtX0AHdsAIWCgviQODwD1jQFejnQSTbhZlgtIFgJn2DzXpstTL5gCTCXX22QJyBYB8wN25DIRmleBIN2WnC3GSxGAWfPqv0giDfNzxlBX2YD5mrEN0FTQ/fIyJx9IxaFjKBDG1y2ZkONFmWC8FmymkMS4G0mEcyA63ZfWEobKBEsgu+dLxqnYJcLxwyJCjriObi1R8+hEub0+nZo0u8Hs92nf29S6B5NAo/DZAODVjA3ONCI98qMcQbGlKhRKlUa9KoY5MNFlQMLAOIYYzmM4jRAjljWICgB7W1TUgvfec13kRle4kz1DSiTJo/DA/ZLJSR6kZQPjluKTGYakcA+aA/2Jpgw4jjPR/VBqZfyrOpRVIc/LUH/e/wL8e43nO0IbPwAAAAASUVORK5CYII=">
        <h3>Add Artificial Intelligence to your web and start increase your sales / leads / meetings books</h3>
        <h3 style="font-size: 1.2em;">
                <ul>
                    <li> &nbsp;&nbsp;&nbsp;1- Add your valid API KEY below</li>
                    <li style="font-weight: 300;"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;IMPORTANT: If you don't have your API KEY yet, visit <a target=”_blank” href="https://www.pathmonk.com">Pathmonk</a> and signup<br><br></li>
                    <li> &nbsp;&nbsp;&nbsp;2- Save the changes</li>

                <ul>
        </h3>
        <br>
        <div class="card">
            <form method="post" action="options.php">
                <?php settings_fields('pathmonk-option-group'); ?>
                <?php do_settings_sections('pathmonk-option-group'); ?>
                <table class="form-table">
                    <tr valign="top">
                        <th scope="row">Pathmonk API KEY</th>
                        <td><input type="text" name="api_value"
                                   value="<?php echo esc_attr(get_option('api_value')); ?>"/></td>
                    </tr>
                </table>
                <?php submit_button(); ?>

            </form>
        </div>

    </div>
    <?php


}



add_action('wp_footer', 'pathmonk_plugin_add_footer');
function pathmonk_plugin_add_footer() {

    if ( !is_user_logged_in() ) {

        if (pathmonk_is_valid_Key()) {
            $pathmonk_key = esc_attr(get_option('api_value'));


            echo '<!-- Loading Pathmonk web SDK for JavaScript -->
              <div id="pathmonk-root" setup="page_plugin" client_id="' . $pathmonk_key . '"></div>
              <script>(function(d, s, id) {
                var js, fjs = d.getElementsByTagName(s)[0];
                if (d.getElementById(id)) return;
                js = d.createElement(s); js.id = id;
                js.src = "https://pathmonk-lib.pathmonk.com/plugin/plugin.min.js";
                fjs.parentNode.insertBefore(js, fjs);
              }(document, "script", "pathmonk-js-sdk"));</script>';

        }
    }


}

function pathmonk_create_plugin_url(){
    return $url = esc_url( add_query_arg(
        'page',
        'pathmonk-menu',
        get_admin_url() . 'admin.php'
    ) );
}

function pathmonk_is_valid_Key(){
    $pathmonk_key = esc_attr(get_option('api_value'));
    if(!empty($pathmonk_key) && strlen($pathmonk_key) > 10){
      return true;
    }
    return false;
}

add_filter( 'plugin_action_links_pathmonk/pathmonk.php', 'pathmonk_settings_link' );
//add_filter( 'plugin_action_links_nelio-content/nelio-content.php', 'nc_settings_link' );
function pathmonk_settings_link( $links ) {
    // Build and escape the URL.
    $url = pathmonk_create_plugin_url();
    // Create the link.
    $settings_link = "<a href='$url'>" . __( 'Settings' ) . '</a>';
    // Adds the link to the end of the array.
    array_push(
        $links,
        $settings_link
    );
    return $links;
}


function pathmonk_admin_notice_error() {
    if (!pathmonk_is_valid_Key()) {
        $class = 'notice notice-error';
        $message = __('Pathmonk plugin is not set ', 'sample-text-domain');
        printf('<div class="%1$s"><p><h2><a href="' . pathmonk_create_plugin_url() . '"> FIX HERE</a> -  %2$s </h2></p></div>', esc_attr($class), esc_html($message));
    }

}
add_action( 'admin_notices', 'pathmonk_admin_notice_error' );



