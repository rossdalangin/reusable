<?php
/**
 * Component: Friendly Discovery Form Handler (CC-FORM-001)
 * Package: Client Growth System Generator
 *
 * DOCUMENT SUMMARY & PURPOSE:
 * - Component Purpose: Handles lead capture form rendering and submission securely using WordPress nonces, input sanitization, and action hooks.
 * - Who Prepares It: Senior WordPress Backend Developer.
 * - Who Consumes It: Website Prospects (filling out forms) & Agency Developers (embedding [cgs_discovery_form] shortcode).
 * - How to Use It: Include in theme functions.php or load as a plugin file. Place shortcode [cgs_discovery_form] on discovery/contact pages.
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
			<label for="cgs-full-name">What is your name? *</label>
			<input type="text" id="cgs-full-name" name="full_name" required placeholder="Jane Smith">
		</div>

		<div class="cgs-form-group">
			<label for="cgs-work-email">What is your best email address? *</label>
			<input type="email" id="cgs-work-email" name="work_email" required placeholder="jane@[BUSINESS_NAME].com">
		</div>

		<div class="cgs-form-group">
			<label for="cgs-phone">Phone number (Optional)</label>
			<input type="tel" id="cgs-phone" name="phone" placeholder="(555) 000-0000">
		</div>

		<div class="cgs-form-group">
			<label for="cgs-challenge">What is your biggest business goal right now? *</label>
			<select id="cgs-challenge" name="challenge" required>
				<option value="">Choose an option...</option>
				<option value="Lead Generation">I need more qualified leads</option>
				<option value="Conversion Rate">I want my website to get more inquiries</option>
				<option value="Automation">I want to save time on admin & follow-ups</option>
			</select>
		</div>

		<button type="submit" class="cgs-btn cgs-btn-primary">Book My Free Strategy Chat →</button>
	</form>
	<?php
	return ob_get_clean();
}
add_shortcode( 'cgs_discovery_form', 'cgs_render_discovery_form' );

function cgs_handle_discovery_form() {
	if ( ! isset( $_POST['cgs_discovery_nonce'] ) || ! wp_verify_nonce( $_POST['cgs_discovery_nonce'], 'cgs_discovery_nonce_action' ) ) {
		wp_die( 'Security check failed. Please refresh the page and try again.' );
	}

	$full_name  = isset( $_POST['full_name'] ) ? sanitize_text_field( $_POST['full_name'] ) : '';
	$work_email = isset( $_POST['work_email'] ) ? sanitize_email( $_POST['work_email'] ) : '';
	$phone      = isset( $_POST['phone'] ) ? sanitize_text_field( $_POST['phone'] ) : '';
	$challenge  = isset( $_POST['challenge'] ) ? sanitize_text_field( $_POST['challenge'] ) : '';

	if ( empty( $full_name ) || empty( $work_email ) ) {
		wp_die( 'Please fill in your name and email address.' );
	}

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
