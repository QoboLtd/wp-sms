<script type="text/javascript">
	jQuery(document).ready(function() {
		jQuery('#wp_subscribes_send').click(function() {
			jQuery('#wp_subscribes_stats').fadeToggle();
		});
		
		jQuery('#wpsms-nrnu-stats').click(function() {
			jQuery('#wpsms-nrnu').fadeToggle();
		});
		
		jQuery('#wpsms-gnc-stats').click(function() {
			jQuery('#wpsms-gnc').fadeToggle();
		});
		
		jQuery('#wpsms-ul-stats').click(function() {
			jQuery('#wpsms-ul').fadeToggle();
		});
		
		jQuery('#wpsms-wc-no-stats').click(function() {
			jQuery('#wpsms-wc-no').fadeToggle();
		});
		
		jQuery('#wpsms-edd-no-stats').click(function() {
			jQuery('#wpsms-edd-no').fadeToggle();
		});
	});
</script>

<div class="wrap">
	<?php include( dirname( __FILE__ ) . '/tabs.php' ); ?>
	<table class="form-table">
		<form method="post" action="options.php" name="form">
			<?php wp_nonce_field('update-options');?>
			<tr valign="top">
				<th scope="row" colspan="2"><h3><?php _e('Wordpress Notifications', 'wp-sms'); ?></h3></th>
			</tr>
			
			<tr>
				<th><?php _e('Published new posts', 'wp-sms'); ?></th>
				<td>
					<input type="checkbox" name="wp_subscribes_send" id="wp_subscribes_send" <?php echo get_option('wp_subscribes_send') ==true? 'checked="checked"':'';?>/>
					<label for="wp_subscribes_send"><?php _e('Active', 'wp-sms'); ?></label>
					<p class="description"><?php _e('Send a sms to subscribers When published new posts.', 'wp-sms'); ?></p>
				</td>
			</tr>
			
			<?php if( get_option('wp_subscribes_send') ) { $hidden=""; } else { $hidden=" style='display: none;'"; }?>
			<tr valign="top"<?php echo $hidden;?> id='wp_subscribes_stats'>
				<td scope="row">
					<label for="wpsms-text-template"><?php _e('Text template', 'wp-sms'); ?>:</label>
				</th>
				
				<td>
					<textarea id="wpsms-text-template" cols="50" rows="7" name="wp_sms_text_template"><?php echo get_option('wp_sms_text_template'); ?></textarea>
					<p class="description"><?php _e('Enter the contents of the sms message.', 'wp-sms'); ?></p>
					<p class="description data">
						<?php _e('Input data:', 'wp-sms'); ?>
						<?php _e('Title post', 'wp-sms'); ?>: <code>%title_post%</code>
						<?php _e('URL post', 'wp-sms'); ?>: <code>%url_post%</code>
						<?php _e('Date post', 'wp-sms'); ?>: <code>%date_post%</code>
					</p>
				</td>
			</tr>
			
			<tr>
				<th><?php _e('The new release of WordPress', 'wp-sms'); ?></th>
				<td>
					<input type="checkbox" name="wp_notification_new_wp_version" id="wp_notification_new_wp_version" <?php echo get_option('wp_notification_new_wp_version') ==true? 'checked="checked"':'';?>/>
					<label for="wp_notification_new_wp_version"><?php _e('Active', 'wp-sms'); ?></label>
					<p class="description"><?php _e('Send a sms to you When the new release of WordPress.', 'wp-sms'); ?></p>
				</td>
			</tr>
			
			<tr>
				<th><?php _e('Register a new user', 'wp-sms'); ?></th>
				<td>
					<input type="checkbox" name="wpsms_nrnu_stats" id="wpsms-nrnu-stats" <?php echo get_option('wpsms_nrnu_stats') ==true? 'checked="checked"':'';?>/>
					<label for="wpsms-nrnu-stats"><?php _e('Active', 'wp-sms'); ?></label>
					<p class="description"><?php _e('Send a sms to you and user when register on wordpress.', 'wp-sms'); ?></p>
				</td>
			</tr>
			
			<?php if( get_option('wpsms_nrnu_stats') ) { $hidden=""; } else { $hidden=" style='display: none;'"; }?>
			<tr valign="top"<?php echo $hidden;?> id="wpsms-nrnu">
				<td scope="row">
					<label for="wpsms-nrnu-tt"><?php _e('Text template', 'wp-sms'); ?>:</label>
				</th>
				
				<td>
					<p><?php _e('For user:', 'wp-sms'); ?></p>
					<textarea id="wpsms-nrnu-tt" cols="50" rows="7" name="wpsms_nrnu_tt"><?php echo get_option('wpsms_nrnu_tt'); ?></textarea>
					<p class="description"><?php _e('Enter the contents of the sms message.', 'wp-sms'); ?></p>
					<p class="description data">
						<?php _e('Input data:', 'wp-sms'); ?>
						<?php _e('Username', 'wp-sms'); ?>: <code>%user_login%</code>
						<?php _e('User email', 'wp-sms'); ?>: <code>%user_email%</code>
						<?php _e('Date register', 'wp-sms'); ?>: <code>%date_register%</code>
					</p>
					
					<p><?php _e('For admin:', 'wp-sms'); ?></p>
					<textarea id="wpsms-nrnu-tt" cols="50" rows="7" name="wpsms_narnu_tt"><?php echo get_option('wpsms_narnu_tt'); ?></textarea>
					<p class="description"><?php _e('Enter the contents of the sms message.', 'wp-sms'); ?></p>
					<p class="description data">
						<?php _e('Input data:', 'wp-sms'); ?>
						<?php _e('Username', 'wp-sms'); ?>: <code>%user_login%</code>
						<?php _e('User email', 'wp-sms'); ?>: <code>%user_email%</code>
						<?php _e('Date register', 'wp-sms'); ?>: <code>%date_register%</code>
					</p>
				</td>
			</tr>
			
			<tr>
				<th><?php _e('New comment', 'wp-sms'); ?></th>
				<td>
					<input type="checkbox" name="wpsms_gnc_stats" id="wpsms-gnc-stats" <?php echo get_option('wpsms_gnc_stats') ==true? 'checked="checked"':'';?>/>
					<label for="wpsms-gnc-stats"><?php _e('Active', 'wp-sms'); ?></label>
					<p class="description"><?php _e('Send a sms to you When get a new comment.', 'wp-sms'); ?></p>
				</td>
			</tr>
			
			<?php if( get_option('wpsms_gnc_stats') ) { $hidden=""; } else { $hidden=" style='display: none;'"; }?>
			<tr valign="top"<?php echo $hidden;?> id="wpsms-gnc">
				<td scope="row">
					<label for="wpsms-gnc-tt"><?php _e('Text template', 'wp-sms'); ?>:</label>
				</th>
				
				<td>
					<textarea id="wpsms-gnc-tt" cols="50" rows="7" name="wpsms_gnc_tt"><?php echo get_option('wpsms_gnc_tt'); ?></textarea>
					<p class="description"><?php _e('Enter the contents of the sms message.', 'wp-sms'); ?></p>
					<p class="description data">
						<?php _e('Input data:', 'wp-sms'); ?>
						<?php _e('Comment author', 'wp-sms'); ?>: <code>%comment_author%</code>
						<?php _e('Comment author email', 'wp-sms'); ?>: <code>%comment_author_email%</code>
						<?php _e('Comment author url', 'wp-sms'); ?>: <code>%comment_author_url%</code>
						<?php _e('Comment author IP', 'wp-sms'); ?>: <code>%comment_author_IP%</code>
						<?php _e('Comment date', 'wp-sms'); ?>: <code>%comment_date%</code>
						<?php _e('Comment content', 'wp-sms'); ?>: <code>%comment_content%</code>
					</p>
				</td>
			</tr>
			
			<tr>
				<th><?php _e('User login', 'wp-sms'); ?></th>
				<td>
					<input type="checkbox" name="wpsms_ul_stats" id="wpsms-ul-stats" <?php echo get_option('wpsms_ul_stats') ==true? 'checked="checked"':'';?>/>
					<label for="wpsms-ul-stats"><?php _e('Active', 'wp-sms'); ?></label>
					<p class="description"><?php _e('Send a sms to you When user is login.', 'wp-sms'); ?></p>
				</td>
			</tr>
			
			<?php if( get_option('wpsms_ul_stats') ) { $hidden=""; } else { $hidden=" style='display: none;'"; }?>
			<tr valign="top"<?php echo $hidden;?> id="wpsms-ul">
				<td scope="row">
					<label for="wpsms-ul-tt"><?php _e('Text template', 'wp-sms'); ?>:</label>
				</th>
				
				<td>
					<textarea id="wpsms-ul-tt" cols="50" rows="7" name="wpsms_ul_tt"><?php echo get_option('wpsms_ul_tt'); ?></textarea>
					<p class="description"><?php _e('Enter the contents of the sms message.', 'wp-sms'); ?></p>
					<p class="description data">
						<?php _e('Input data:', 'wp-sms'); ?>
						<?php _e('User login', 'wp-sms'); ?>: <code>%username_login%</code>
						<?php _e('Display name', 'wp-sms'); ?>: <code>%display_name%</code>
					</p>
				</td>
			</tr>
			
			<tr valign="top">
				<th scope="row" colspan="2"><h3>Contact form 7</h3></th>
			</tr>
			
			<tr>
				<th><?php _e('SMS meta box', 'wp-sms'); ?></th>
				<td>
					<input type="checkbox" name="wps_add_wpcf7" id="wps_add_wpcf7" <?php echo get_option('wps_add_wpcf7') ==true? 'checked="checked"':'';?>/>
					<label for="wps_add_wpcf7"><?php _e('Active', 'wp-sms'); ?></label>
					<p class="description"><?php _e('Added Wordpress SMS meta box to Contact form 7 plugin when enable this option.', 'wp-sms'); ?></p>
				</td>
			</tr>
			
			<tr valign="top">
				<th scope="row" colspan="2"><h3>WooCommerce</h3></th>
			</tr>
			
			<tr>
				<th><?php _e('New order', 'wp-sms'); ?></th>
				<td>
					<input type="checkbox" name="wpsms_wc_no_stats" id="wpsms-wc-no-stats" <?php echo get_option('wpsms_wc_no_stats') ==true? 'checked="checked"':'';?>/>
					<label for="wpsms-wc-no-stats"><?php _e('Active', 'wp-sms'); ?></label>
					<p class="description"><?php _e('Send a sms to you When get new order.', 'wp-sms'); ?></p>
				</td>
			</tr>
			
			<?php if( get_option('wpsms_wc_no_stats') ) { $hidden=""; } else { $hidden=" style='display: none;'"; }?>
			<tr valign="top"<?php echo $hidden;?> id="wpsms-wc-no">
				<td scope="row">
					<label for="wpsms-wc-no-tt"><?php _e('Text template', 'wp-sms'); ?>:</label>
				</th>
				
				<td>
					<textarea id="wpsms-wc-no-tt" cols="50" rows="7" name="wpsms_wc_no_tt"><?php echo get_option('wpsms_wc_no_tt'); ?></textarea>
					<p class="description"><?php _e('Enter the contents of the sms message.', 'wp-sms'); ?></p>
					<p class="description data">
						<?php _e('Input data:', 'wp-sms'); ?>
						<?php _e('Order ID', 'wp-sms'); ?>: <code>%order_id%</code>
						<?php _e('Order Status', 'wp-sms'); ?>: <code>%status%</code>
						<?php _e('Order Name', 'wp-sms'); ?>: <code>%order_name%</code>
					</p>
				</td>
			</tr>
			
			<tr valign="top">
				<th scope="row" colspan="2"><h3>Easy Digital Downloads</h3></th>
			</tr>
			
			<tr>
				<th><?php _e('New order', 'wp-sms'); ?></th>
				<td>
					<input type="checkbox" name="wpsms_edd_no_stats" id="wpsms-edd-no-stats" <?php echo get_option('wpsms_edd_no_stats') ==true? 'checked="checked"':'';?>/>
					<label for="wpsms-edd-no-stats"><?php _e('Active', 'wp-sms'); ?></label>
					<p class="description"><?php _e('Send a sms to you When get new order.', 'wp-sms'); ?></p>
				</td>
			</tr>
			
			<?php if( get_option('wpsms_edd_no_stats') ) { $hidden=""; } else { $hidden=" style='display: none;'"; }?>
			<tr valign="top"<?php echo $hidden;?> id="wpsms-edd-no">
				<td scope="row">
					<label for="wpsms-edd-no-tt"><?php _e('Text template', 'wp-sms'); ?>:</label>
				</th>
				
				<td>
					<textarea id="wpsms-edd-no-tt" cols="50" rows="7" name="wpsms_edd_no_tt"><?php echo get_option('wpsms_edd_no_tt'); ?></textarea>
					<p class="description"><?php _e('Enter the contents of the sms message.', 'wp-sms'); ?></p>
				</td>
			</tr>

			<tr>
				<td>
					<p class="submit">
						<input type="hidden" name="action" value="update" />
						<input type="hidden" name="page_options" value="wp_subscribes_send,wp_sms_text_template,wp_notification_new_wp_version,wpsms_nrnu_stats,wpsms_nrnu_tt,wpsms_narnu_tt,wpsms_gnc_stats,wpsms_gnc_tt,wpsms_ul_stats,wpsms_ul_tt,wps_add_wpcf7,wpsms_wc_no_stats,wpsms_wc_no_tt,wpsms_edd_no_stats,wpsms_edd_no_tt" />
						<input type="submit" class="button-primary" name="Submit" value="<?php _e('Update', 'wp-sms'); ?>" />
					</p>
				</td>
			</tr>
		</form>	
	</table>
</div>