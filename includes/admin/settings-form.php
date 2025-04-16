<?php  if ( ! defined( 'ABSPATH' ) ) { exit; } ?>

<div class="instruction_box">
    <h2>Instruction</h2>
    <p>Place the shortcode <strong><code>[system_requirements_check]</code></strong> on a post or page to display the system requirements check results.</p>
</div>
<hr />
<div class="settings_box">

	<h2>Settings</h2>

    <form method="post" action="options.php">
        
    	<?php
    	
    	    settings_fields( $this->settings_group );
    	    
    		if ( !empty($_GET['settings-updated'] ) ) {
    			flush_rewrite_rules();
    		}
    		
    	?>
    	
    	<div class="settings_form">
            
    		<h4>Operating Systems</h4>
    		
    		<p>Select the required operating systems.</p>
    		
    		<div class="danger-text">
        		<label class="src-cb"><input type="checkbox" name="disable_os_check" value="1" <?php checked('1', get_option('disable_os_check')); ?> />Disable all operating systems check.</label><br>If selected, operating systems check is disabled even if they are selected below.
            </div>
    		
    		<label class="src-cb"><input type="checkbox" name="windows_xp" value="1" <?php checked('1', get_option('windows_xp')); ?> />Windows XP </label>
    		
    		<label class="src-cb"><input type="checkbox" name="windows_vista" value="1" <?php checked('1', get_option('windows_vista')); ?> />Windows Vista </label>
    		
    		<label class="src-cb"><input type="checkbox" name="windows_7" value="1" <?php checked('1', get_option('windows_7')); ?> />Windows 7 </label>
    		
    		<label class="src-cb"><input type="checkbox" name="windows_8" value="1" <?php checked('1', get_option('windows_8')); ?> />Windows 8 </label>
    		
    		<label class="src-cb"><input type="checkbox" name="windows_81" value="1" <?php checked('1', get_option('windows_81')); ?> />Windows 8.1 </label>
    		
    		<label class="src-cb"><input type="checkbox" name="windows_10" value="1" <?php checked('1', get_option('windows_10')); ?> />Windows 10 or later </label>
    		
    		<label class="src-cb"><input type="checkbox" name="mac" value="1" <?php checked('1', get_option('mac')); ?> />macOS </label>
    		
    		<label class="src-cb"><input type="checkbox" name="linux" value="1" <?php checked('1', get_option('linux')); ?> />Linux </label>
    		
    		<hr />
    		
    		<h4>Web Browsers</h4>
    		
    		<p>Enter the minimum required version number for each web browser. If the version number is less than or equal to 0, it will not be checked. If left blank or invalid, it defaults to 0. The version number can be entered as <code>x</code>, <code>x.x</code>, or <code>x.x.x</code>.</p>
    		
    		<div class="danger-text">
        		<label class="src-cb"><input type="checkbox" name="disable_browser_check" value="1" <?php checked('1', get_option('disable_browser_check')); ?> />Disable all web browsers check.</label><br>
        		If selected, web browsers check is disabled even if they are specified below.
            </div>
    		
    		<label class="fixed-width" for="settings-ie">Internet Explorer</label>
    		<input type="text" id="settings-ie" name="ie" value="<?php esc_attr_e(get_option('ie')); ?>" />
    		<br />
    		<label class="fixed-width" for="settings-edge">Microsoft Edge</label>
    		<input type="text" id="settings-edge" name="edge" value="<?php esc_attr_e(get_option('edge')); ?>" />
    		<br />
    		<label class="fixed-width" for="settings-firefox">Mozilla Firefox</label>
    		<input type="text" id="settings-firefox" name="firefox" value="<?php esc_attr_e(get_option('firefox')); ?>" />
    		<br />
    		<label class="fixed-width" for="settings-chrome">Google Chrome</label>
    		<input type="text" id="settings-chrome" name="chrome" value="<?php esc_attr_e(get_option('chrome')); ?>" />
    		<br />
    		<label class="fixed-width" for="settings-safari">Apple Safari</label>
    		<input type="text" id="settings-safari" name="safari" value="<?php esc_attr_e(get_option('safari')); ?>" />
    		<br />
    		<label class="fixed-width" for="settings-opera">Opera</label>
    		<input type="text" id="settings-opera" name="opera" value="<?php esc_attr_e(get_option('opera')); ?>" />
    		
    		<hr />
    		
    		<h4>IP Addresses</h4>
    		
    		<div class="danger-text"><strong>Publicly displaying IP addresses may elevate the risk of security breaches. By enabling this feature, you acknowledge and agree that the plugin author, contributors, and sponsors bear no liability for any security breaches or related consequences. Use this feature responsibly.</strong></div>
    		
    		<label><input type="checkbox" name="ip" value="1" <?php checked('1', get_option('ip')); ?> /> Display client's IP address</label>
    		<br>
    		<label><input type="checkbox" name="host_ip" value="1" <?php checked('1', get_option('host_ip')); ?> /> Display host's IP address</label>
    		
    		<hr />
    		
    		<h4>JavaScript</h4>
    		<label>Check for JavaScript? <input type="checkbox" name="enable_js_check" value="1" <?php checked('1', get_option('enable_js_check')); ?> /></label>
    		
    		<hr />
    		
    		<h4>Screen Resolution</h4>
    		
    		<label class="src-cb">Check for screen resolution? <input type="checkbox" name="enable_screen_check" value="1" <?php checked('1', get_option('enable_screen_check')); ?> /> </label><br>
    		<p>Enter the <strong>minimum</strong> required screen width and height.</p>
    		<input type="number" id="settings-screen-w" name="screen_w" size="4" value="<?php esc_attr_e(get_option('screen_w')); ?>" />
    		&times;
    		<input type="number" id="settings-screen-h" name="screen_h" size="4" value="<?php esc_attr_e(get_option('screen_h')); ?>" />
    		
    		<hr />
    		
    		<h4>Java Runtime Environment (JRE)</h4>
    		
    		<p>Enter the minimum required version number of the JRE. If the version number is less than or equal to 0, it will be disabled. If left blank or invalid, it defaults to 0. The version number can be entered as <code>x.x</code> or <code>x.x.x</code></p>

			<div class="callout info">The Java Runtime Environment (JRE) uses a unique version numbering system. For example, "Java 7 Update 51" is not represented as <code>7.x.x</code>; instead, its actual version number is <code>1.7.0_51</code> and should be entered in that format.</div>
    		
    		<label for="settings-jre">Version </label>
    		<input type="text" id="settings-jre" name="jre" value="<?php esc_attr_e(get_option('jre')); ?>" />
    		
    		<hr />
    		
    		<h4>Cookies</h4>
    		<label>Check for cookies? <input type="checkbox" name="cookies" value="1" <?php checked('1', get_option('cookies')); ?> /> </label>
    		
        	<hr />
        	
        	<h4>Adobe Flash Player</h4>
    		
    		<div class="callout danger">Adobe officially ended support for Flash Player on December 31, 2020, and began blocking Flash content from running on January 12, 2021. To enhance security, Adobe strongly recommends that all users uninstall Flash Player immediately.</div>
    		
    		<p>Enter the minimum required version number of Adobe Flash Player. If the version number is 0 or lower, it will be disabled. Defaults to 0 if left blank or invalid. The version number can be entered as <code>x</code>, <code>x.x</code>, or <code>x.x.x</code>.</p>
    		
    		<label id="settings-flash">Version </label>
    		<input type="text" id="settings-flash" name="flash" value="<?php esc_attr_e(get_option('flash')); ?>" />
    		
    		<!-- end of settings -->
    		
    		<hr class="thick"/>
    		
    		<p class="submit">
        		<input type="submit" class="button-primary" value="<?php _e( 'Save Changes', 'system_requirements_check' ); ?>" />
        	</p>
            
    	</div>
    	
    </form>
    
</div>