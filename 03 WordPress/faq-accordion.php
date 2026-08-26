<?php
/**
 * Component: FAQ Accordion (CC-WP-002)
 * Package: Client Growth System Generator
 * Description: Accessible FAQ section with Schema.org microdata support.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$cgs_faqs = get_query_var( 'cgs_faqs', array(
	array(
		'question' => 'How quickly can [BUSINESS_NAME] implement the Client Growth System?',
		'answer'   => 'Most systems are fully deployed, tested, and live within 14 to 21 business days.'
	),
	array(
		'question' => 'What is required from my team during onboarding?',
		'answer'   => 'We require a 60-minute intake call and access to your domain/hosting. We handle all copy, setup, and automations.'
	)
) );
?>

<section class="cgs-faq-section" itemscope itemtype="https://schema.org/FAQPage">
	<div class="cgs-container">
		<h2 class="cgs-section-title">Frequently Asked Questions</h2>
		<div class="cgs-faq-grid">
			<?php foreach ( $cgs_faqs as $index => $faq ) : ?>
				<div class="cgs-faq-item" itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
					<h3 class="cgs-faq-question" itemprop="name">
						<button class="cgs-faq-toggle" aria-expanded="false" aria-controls="faq-ans-<?php echo esc_attr( $index ); ?>">
							<?php echo esc_html( $faq['question'] ); ?>
						</button>
					</h3>
					<div id="faq-ans-<?php echo esc_attr( $index ); ?>" class="cgs-faq-answer" itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer" hidden>
						<p itemprop="text"><?php echo esc_html( $faq['answer'] ); ?></p>
					</div>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</section>
