<?php
/**
 * Settings form markup.
 *
 * @package system-requirements-check
 */

if ( ! defined( 'ABSPATH' ) ) {
        exit;
}
?>

<div class="notice notice-info">
        <p><?php esc_html_e( 'Place the shortcode', 'system_requirements_check' ); ?> <code>[system_requirements_check]</code> <?php esc_html_e( 'on a post or page to display the system requirements check results.', 'system_requirements_check' ); ?></p>
</div>

<form method="post" action="options.php">
        <?php
        settings_fields( $this->settings_group );

        if ( ! empty( $_GET['settings-updated'] ) ) {
                flush_rewrite_rules();
        }
        ?>

        <h2><?php esc_html_e( 'Operating Systems', 'system_requirements_check' ); ?></h2>
        <p><?php esc_html_e( 'Select the required operating systems.', 'system_requirements_check' ); ?></p>
        <table class="form-table" role="presentation">
                <tbody>
                        <tr>
                                <th scope="row"><?php esc_html_e( 'Disable check', 'system_requirements_check' ); ?></th>
                                <td>
                                        <label>
                                                <input type="checkbox" name="disable_os_check" value="1" <?php checked( '1', get_option( 'disable_os_check' ) ); ?> />
                                                <?php esc_html_e( 'Disable all operating systems check.', 'system_requirements_check' ); ?>
                                        </label>
                                        <p class="description"><?php esc_html_e( 'If selected, operating systems check is disabled even if they are selected below.', 'system_requirements_check' ); ?></p>
                                </td>
                        </tr>
                        <tr>
                                <th scope="row"><?php esc_html_e( 'Supported OS', 'system_requirements_check' ); ?></th>
                                <td>
                                        <fieldset>
                                                <legend class="screen-reader-text"><span><?php esc_html_e( 'Supported OS', 'system_requirements_check' ); ?></span></legend>
                                                <label><input type="checkbox" name="windows_xp" value="1" <?php checked( '1', get_option( 'windows_xp' ) ); ?> /> <?php esc_html_e( 'Windows XP', 'system_requirements_check' ); ?></label><br />
                                                <label><input type="checkbox" name="windows_vista" value="1" <?php checked( '1', get_option( 'windows_vista' ) ); ?> /> <?php esc_html_e( 'Windows Vista', 'system_requirements_check' ); ?></label><br />
                                                <label><input type="checkbox" name="windows_7" value="1" <?php checked( '1', get_option( 'windows_7' ) ); ?> /> <?php esc_html_e( 'Windows 7', 'system_requirements_check' ); ?></label><br />
                                                <label><input type="checkbox" name="windows_8" value="1" <?php checked( '1', get_option( 'windows_8' ) ); ?> /> <?php esc_html_e( 'Windows 8', 'system_requirements_check' ); ?></label><br />
                                                <label><input type="checkbox" name="windows_81" value="1" <?php checked( '1', get_option( 'windows_81' ) ); ?> /> <?php esc_html_e( 'Windows 8.1', 'system_requirements_check' ); ?></label><br />
                                                <label><input type="checkbox" name="windows_10" value="1" <?php checked( '1', get_option( 'windows_10' ) ); ?> /> <?php esc_html_e( 'Windows 10 or later', 'system_requirements_check' ); ?></label><br />
                                                <label><input type="checkbox" name="mac" value="1" <?php checked( '1', get_option( 'mac' ) ); ?> /> <?php esc_html_e( 'macOS', 'system_requirements_check' ); ?></label><br />
                                                <label><input type="checkbox" name="linux" value="1" <?php checked( '1', get_option( 'linux' ) ); ?> /> <?php esc_html_e( 'Linux', 'system_requirements_check' ); ?></label>
                                        </fieldset>
                                </td>
                        </tr>
                </tbody>
        </table>

        <h2><?php esc_html_e( 'Web Browsers', 'system_requirements_check' ); ?></h2>
        <p><?php esc_html_e( 'Enter the minimum required version number for each web browser. If the version number is less than or equal to 0, it will not be checked. If left blank or invalid, it defaults to 0. The version number can be entered as x, x.x, or x.x.x.', 'system_requirements_check' ); ?></p>
        <table class="form-table" role="presentation">
                <tbody>
                        <tr>
                                <th scope="row"><?php esc_html_e( 'Disable check', 'system_requirements_check' ); ?></th>
                                <td>
                                        <label>
                                                <input type="checkbox" name="disable_browser_check" value="1" <?php checked( '1', get_option( 'disable_browser_check' ) ); ?> />
                                                <?php esc_html_e( 'Disable all web browsers check.', 'system_requirements_check' ); ?>
                                        </label>
                                        <p class="description"><?php esc_html_e( 'If selected, web browsers check is disabled even if they are specified below.', 'system_requirements_check' ); ?></p>
                                </td>
                        </tr>
                        <tr>
                                <th scope="row"><label for="settings-ie"><?php esc_html_e( 'Internet Explorer', 'system_requirements_check' ); ?></label></th>
                                <td><input type="text" id="settings-ie" name="ie" value="<?php echo esc_attr( get_option( 'ie' ) ); ?>" class="regular-text" /></td>
                        </tr>
                        <tr>
                                <th scope="row"><label for="settings-edge"><?php esc_html_e( 'Microsoft Edge', 'system_requirements_check' ); ?></label></th>
                                <td><input type="text" id="settings-edge" name="edge" value="<?php echo esc_attr( get_option( 'edge' ) ); ?>" class="regular-text" /></td>
                        </tr>
                        <tr>
                                <th scope="row"><label for="settings-firefox"><?php esc_html_e( 'Mozilla Firefox', 'system_requirements_check' ); ?></label></th>
                                <td><input type="text" id="settings-firefox" name="firefox" value="<?php echo esc_attr( get_option( 'firefox' ) ); ?>" class="regular-text" /></td>
                        </tr>
                        <tr>
                                <th scope="row"><label for="settings-chrome"><?php esc_html_e( 'Google Chrome', 'system_requirements_check' ); ?></label></th>
                                <td><input type="text" id="settings-chrome" name="chrome" value="<?php echo esc_attr( get_option( 'chrome' ) ); ?>" class="regular-text" /></td>
                        </tr>
                        <tr>
                                <th scope="row"><label for="settings-safari"><?php esc_html_e( 'Apple Safari', 'system_requirements_check' ); ?></label></th>
                                <td><input type="text" id="settings-safari" name="safari" value="<?php echo esc_attr( get_option( 'safari' ) ); ?>" class="regular-text" /></td>
                        </tr>
                        <tr>
                                <th scope="row"><label for="settings-opera"><?php esc_html_e( 'Opera', 'system_requirements_check' ); ?></label></th>
                                <td><input type="text" id="settings-opera" name="opera" value="<?php echo esc_attr( get_option( 'opera' ) ); ?>" class="regular-text" /></td>
                        </tr>
                </tbody>
        </table>

        <h2><?php esc_html_e( 'IP Addresses', 'system_requirements_check' ); ?></h2>
        <div class="notice notice-warning">
                <p><strong><?php esc_html_e( 'Publicly displaying IP addresses may elevate the risk of security breaches. By enabling this feature, you acknowledge and agree that the plugin author, contributors, and sponsors bear no liability for any security breaches or related consequences. Use this feature responsibly.', 'system_requirements_check' ); ?></strong></p>
        </div>
        <table class="form-table" role="presentation">
                <tbody>
                        <tr>
                                <th scope="row"><?php esc_html_e( "Display client's IP address", 'system_requirements_check' ); ?></th>
                                <td><label><input type="checkbox" name="ip" value="1" <?php checked( '1', get_option( 'ip' ) ); ?> /></label></td>
                        </tr>
                        <tr>
                                <th scope="row"><?php esc_html_e( "Display host's IP address", 'system_requirements_check' ); ?></th>
                                <td><label><input type="checkbox" name="host_ip" value="1" <?php checked( '1', get_option( 'host_ip' ) ); ?> /></label></td>
                        </tr>
                </tbody>
        </table>

        <h2><?php esc_html_e( 'JavaScript', 'system_requirements_check' ); ?></h2>
        <table class="form-table" role="presentation">
                <tbody>
                        <tr>
                                <th scope="row"><?php esc_html_e( 'Check for JavaScript?', 'system_requirements_check' ); ?></th>
                                <td><label><input type="checkbox" name="enable_js_check" value="1" <?php checked( '1', get_option( 'enable_js_check' ) ); ?> /></label></td>
                        </tr>
                </tbody>
        </table>

        <h2><?php esc_html_e( 'Screen Resolution', 'system_requirements_check' ); ?></h2>
        <table class="form-table" role="presentation">
                <tbody>
                        <tr>
                                <th scope="row"><?php esc_html_e( 'Check for screen resolution?', 'system_requirements_check' ); ?></th>
                                <td><label><input type="checkbox" name="enable_screen_check" value="1" <?php checked( '1', get_option( 'enable_screen_check' ) ); ?> /></label></td>
                        </tr>
                        <tr>
                                <th scope="row"><?php esc_html_e( 'Minimum width × height', 'system_requirements_check' ); ?></th>
                                <td>
                                        <input type="number" id="settings-screen-w" name="screen_w" value="<?php echo esc_attr( get_option( 'screen_w' ) ); ?>" class="small-text" />
                                        &times;
                                        <input type="number" id="settings-screen-h" name="screen_h" value="<?php echo esc_attr( get_option( 'screen_h' ) ); ?>" class="small-text" />
                                </td>
                        </tr>
                </tbody>
        </table>

        <h2><?php esc_html_e( 'Java Runtime Environment (JRE)', 'system_requirements_check' ); ?></h2>
        <div class="notice notice-info">
                <p><?php esc_html_e( 'The Java Runtime Environment (JRE) uses a unique version numbering system. For example, "Java 7 Update 51" is not represented as 7.x.x; instead, its actual version number is 1.7.0_51 and should be entered in that format.', 'system_requirements_check' ); ?></p>
        </div>
        <table class="form-table" role="presentation">
                <tbody>
                        <tr>
                                <th scope="row"><label for="settings-jre"><?php esc_html_e( 'Version', 'system_requirements_check' ); ?></label></th>
                                <td><input type="text" id="settings-jre" name="jre" value="<?php echo esc_attr( get_option( 'jre' ) ); ?>" class="regular-text" /></td>
                        </tr>
                </tbody>
        </table>

        <h2><?php esc_html_e( 'Cookies', 'system_requirements_check' ); ?></h2>
        <table class="form-table" role="presentation">
                <tbody>
                        <tr>
                                <th scope="row"><?php esc_html_e( 'Check for cookies?', 'system_requirements_check' ); ?></th>
                                <td><label><input type="checkbox" name="cookies" value="1" <?php checked( '1', get_option( 'cookies' ) ); ?> /></label></td>
                        </tr>
                </tbody>
        </table>

        <h2><?php esc_html_e( 'Adobe Flash Player', 'system_requirements_check' ); ?></h2>
        <div class="notice notice-error">
                <p><?php esc_html_e( 'Adobe officially ended support for Flash Player on December 31, 2020, and began blocking Flash content from running on January 12, 2021. To enhance security, Adobe strongly recommends that all users uninstall Flash Player immediately.', 'system_requirements_check' ); ?></p>
        </div>
        <p><?php esc_html_e( 'Enter the minimum required version number of Adobe Flash Player. If the version number is 0 or lower, it will be disabled. Defaults to 0 if left blank or invalid. The version number can be entered as x, x.x, or x.x.x.', 'system_requirements_check' ); ?></p>
        <table class="form-table" role="presentation">
                <tbody>
                        <tr>
                                <th scope="row"><label for="settings-flash"><?php esc_html_e( 'Version', 'system_requirements_check' ); ?></label></th>
                                <td><input type="text" id="settings-flash" name="flash" value="<?php echo esc_attr( get_option( 'flash' ) ); ?>" class="regular-text" /></td>
                        </tr>
                </tbody>
        </table>

        <?php submit_button(); ?>
</form>

