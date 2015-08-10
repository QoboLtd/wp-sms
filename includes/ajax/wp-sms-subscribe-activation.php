<?php
	add_action( 'wp_ajax_wp_sms_activation', 'wp_sms_activation_callback' );
	add_action( 'wp_ajax_nopriv_wp_sms_activation', 'wp_sms_activation_callback' );

	function wp_sms_activation_callback(){
		global $wpdb;

		$data = $_REQUEST['data'];
		$mobile = trim($data['mobile']);
		$activation = trim($data['activation']);

		if (!$mobile) {
			echo json_encode(array('status' => 'error', 'response' => __('Mobile number is missing!', 'wp-sms')));
			exit();
		}

		if (!$activation) {
			echo json_encode(array('status' => 'error', 'response' => __('Please enter the activation code!', 'wp-sms')));
			exit();
		}

		$check_mobile = $wpdb->get_row($wpdb->prepare("SELECT * FROM `{$table_prefix}sms_subscribes` WHERE `mobile` = '%s'", $mobile));
		if ($activation != $check_mobile->activate_key) {
			echo json_encode(array('status' => 'error', 'response' => __('Activation code is wrong!', 'wp-sms')));
			exit();
		}

		$result = $wpdb->update("{$table_prefix}sms_subscribes", array('status' => '1'), array('mobile' => $mobile));
		if ($result) {
			do_action('wp_sms_subscribe', $check_mobile->name, $mobile);
			echo json_encode(array('status' => 'success', 'response' => __('Your subscription was successful!', 'wp-sms')));
			exit();
		}
	}