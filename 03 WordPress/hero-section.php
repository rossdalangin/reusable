<?php
/**
 * Component: Hero Section (CC-WP-001)
 * Package: Client Growth System Generator
 * Description: Friendly, simple hero section built for clarity and conversions.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$cgs_hero_headline    = get_query_var( 'cgs_hero_headline', 'Turn Your Website Into a Consistent Source of New Clients' );
$cgs_hero_subheadline = get_query_var( 'cgs_hero_subheadline', 'We help [TARGET_AUDIENCE] solve [CORE_PROBLEM] so you can get [DESIRED_OUTCOME] without stress.' );
$cgs_hero_cta_text    = get_query_var( 'cgs_hero_cta_text', 'Book a Free Strategy Chat' );
$cgs_hero_cta_url     = get_query_var( 'cgs_hero_cta_url', '[BOOKING_URL]' );
$cgs_hero_badge       = get_query_var( 'cgs_hero_badge', 'Simple & Proven Growth System' );
?>

<section class="cgs-hero-section" aria-label="Hero Section">
	<div class="cgs-container">
		<div class="cgs-hero-content">
			<?php if ( ! empty( $cgs_hero_badge ) ) : ?>
				<span class="cgs-badge"><?php echo esc_html( $cgs_hero_badge ); ?></span>
			<?php endif; ?>

			<h1 class="cgs-hero-title">
				<?php echo esc_html( $cgs_hero_headline ); ?>
			</h1>

			<p class="cgs-hero-subtitle">
				<?php echo esc_html( $cgs_hero_subheadline ); ?>
			</p>

			<div class="cgs-hero-actions">
				<a href="<?php echo esc_url( $cgs_hero_cta_url ); ?>" class="cgs-btn cgs-btn-primary" role="button">
					<?php echo esc_html( $cgs_hero_cta_text ); ?>
				</a>
			</div>
		</div>
	</div>
</section>
