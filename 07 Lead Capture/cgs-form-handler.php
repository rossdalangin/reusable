<?php
/**
 * Component: Discovery Lead Capture Form Handler (CC-FORM-001)
 * Package: Client Growth System Generator
 * Description: Secure shortcode form handler with nonce verification, sanitization, and CRM webhook trigger.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

function cgs_render_discovery_form() {
	ob_start();
	?>
	<form id="cgs-discovery-form" class="cgs-form" action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>" method="POST">
		<input type="hidden" name="action" value="cgs_submit_discovery_form">
		<?php wp_nonce_field( 'cgs_discovery_nonce_action', 'cgs_discovery_nonce' ); ?>

		<div class="cgs-form-group">
			<label for="cgs-full-name">Full Name *</label>
			<input type="text" id="cgs-full-name" name="full_name" required placeholder="John Doe">
		</div>

		<div class="cgs-form-group">
			<label for="cgs-work-email">Work Email *</label>
			<input type="email" id="cgs-work-email" name="work_email" required placeholder="john@[BUSINESS_NAME].com">
		</div>

		<div class="cgs-form-group">
			<label for="cgs-phone">Phone Number</label>
			<input type="tel" id="cgs-phone" name="phone" placeholder="(555) 000-0000">
		</div>

		<div class="cgs-form-group">
			<label for="cgs-challenge">What is your primary growth bottleneck? *</label>
			<select id="cgs-challenge" name="challenge" required>
				<option value="">Select an option...</option>
				<option value="Lead Generation">Not enough qualified leads</option>
				<option value="Conversion Rate">Low conversion on website</option>
				<option value="Automation">Manual client onboarding & processes</option>
			</select>
		</div>

		<button type="submit" class="cgs-btn cgs-btn-primary">Book Strategy Call →</button>
	</form>
	<?php
	return ob_get_clean();
}
add_shortcode( 'cgs_discovery_form', 'cgs_render_discovery_form' );

function cgs_handle_discovery_form() {
	if ( ! isset( $_POST['cgs_discovery_nonce'] ) || ! wp_verify_nonce( $_POST['cgs_discovery_nonce'], 'cgs_discovery_nonce_action' ) ) {
		wp_die( 'Security check failed.' );
	}

	$full_name  = isset( $_POST['full_name'] ) ? sanitize_text_field( $_POST['full_name'] ) : '';
	$work_email = isset( $_POST['work_email'] ) ? sanitize_email( $_POST['work_email'] ) : '';
	$phone      = isset( $_POST['phone'] ) ? sanitize_text_field( $_POST['phone'] ) : '';
	$challenge  = isset( $_POST['challenge'] ) ? sanitize_text_field( $_POST['challenge'] ) : '';

	if ( empty( $full_name ) || empty( $work_email ) ) {
		wp_die( 'Please complete all required fields.' );
	}

	// Trigger webhook / CRM action for [BUSINESS_NAME] automation
	do_action( 'cgs_lead_captured', array(
		'name'      => $full_name,
		'email'     => $work_email,
		'phone'     => $phone,
		'challenge' => $challenge,
		'source'    => 'Discovery Form CC-FORM-001'
	) );

	wp_redirect( home_url( '/thank-you-discovery/' ) );
	exit;
}
add_action( 'admin_post_nopriv_cgs_submit_discovery_form', 'cgs_handle_discovery_form' );
add_action( 'admin_post_cgs_submit_discovery_form', 'cgs_handle_discovery_form' );
