<?php
/**
 * Component: FAQ Accordion (CC-WP-002)
 * Package: Client Growth System Generator
 *
 * DOCUMENT SUMMARY & PURPOSE:
 * - Component Purpose: Renders an accessible, Schema.org microdata-enabled FAQ accordion section to address customer objections.
 * - Who Prepares It: WordPress Developer & Technical SEO Specialist.
 * - Who Consumes It: Website Visitors (prospects) & Search Engine Crawlers (Google Rich Snippets).
 * - How to Use It: Include in theme template parts or pass custom FAQ arrays via the 'cgs_faqs' query variable.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$cgs_faqs = get_query_var( 'cgs_faqs', array(
	array(
		'question' => 'How long does it take to get everything setup?',
		'answer'   => 'Usually, everything is completely built, tested, and ready for launch within 2 to 3 weeks.'
	),
	array(
		'question' => 'Do I need to be good with technology to use this?',
		'answer'   => 'Not at all! We set up everything for you and give you simple, easy video guides so you can manage your site with confidence.'
	),
	array(
		'question' => 'How do I receive new leads when people sign up?',
		'answer'   => 'Leads automatically land in your email inbox and CRM so you can easily reply right away.'
	)
) );
?>

<section class="cgs-faq-section" itemscope itemtype="https://schema.org/FAQPage">
	<div class="cgs-container">
		<h2 class="cgs-section-title">Common Questions Answered Simply</h2>
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
