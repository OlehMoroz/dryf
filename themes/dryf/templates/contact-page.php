<?php
/**
 * Template Name: Contact page template
 * The template for displaying the Contact template in the theme.
 * 
 *
 * @package WordPress
 */
include __DIR__ . '/../lang/language.php';

get_header();
?>

<div class="page-container width-container">
	<!-- Sidebar -->

	<?php get_template_part( 'template-parts/side-menu' ); ?>

	<!-- End Sidebar -->

	<main class="content-col">
		<section class="contacts-of-company section">
			<div class="top-container">
				<div class="top-row breadcrumbs-row">
					<?= do_shortcode('[wpseo_breadcrumb]'); ?>
				</div>
				<h2 class="base-title top-page-title">
					<?= __( $contact_page_title ); ?>
				</h2>
			</div>
			<div class="company-contacts">
				<div class="contacts-column">
					<div class="phone-container social-col">
						<p class="underheading-text">
							<?= __( $contact_page_phone ); ?>
						</p>
						<?php if (have_rows('phones', $contact_page_id)) :
						$count_phones = count(get_field('phones', $contact_page_id)); ?>
							<?php  while (have_rows('phones', $contact_page_id)) : the_row();
							if ($count_phones > 1) { ?>
							<?php for ($x = 0; $x <= $count_phones; ++$x) {
							if (get_sub_field('phone_' . $x)) {
							while (have_rows('phone_' . $x)) : the_row(); ?>
							<div class="info">
								<a class="contact-row" href="tel:<?= get_sub_field('phone_number'); ?>">
									<span class="phone-circle-column">
										<svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
											<use xlink:href="#another-phone-call"></use>
										</svg>
									</span>
									<span class="contact-info-column">
										<span class="underheading-text">
											<?= get_sub_field('account_name'); ?>
										</span>
										<span class="number-text">
											<?= get_sub_field('phone_number'); ?>
										</span>
									</span>
								</a>
							</div>
							<?php endwhile; }
							} ?>
						<?php
						} endwhile; ?>
						<?php endif; ?>
					</div>
					<div class="social-col">
						<p class="underheading-text">
							<?= __( $contact_page_email ); ?>
						</p>
						<?php if (have_rows('emails', $contact_page_id)) :
							$count_emails = count(get_field('emails', $contact_page_id));
							$text_0 = $conact_page_email_candidate;
							$text_1 = $conact_page_email_employer;
							while (have_rows('emails', $contact_page_id)) : the_row();
								for ($x = 0; $x <= $count_emails; ++$x) {
									if (get_sub_field('email_' . $x)) { ?>
										<div class="info">
											<a class="contact-row" href="mailto:<?= get_sub_field('email_' . $x); ?>">
												<span class="phone-circle-column">
													<svg width="20" height="16" viewBox="0 0 20 16" fill="none" xmlns="http://www.w3.org/2000/svg">
														<use xlink:href="#email"></use>
													</svg>
												</span>
												<span class="contact-info-column">
													<?php if ($x == 0) { ?>
													<span class="underheading-text">
														<?= __( $text_0); ?>
													</span>
													<?php } else { ?>
													<span class="underheading-text">
														<?= __( $text_1); ?>
													</span>
													<?php } ?>
													<span href="mailto:<?= get_sub_field('email_' . $x); ?>" class="number-text">
														<?= get_sub_field('email_' . $x); ?>
													</span>
												</span>
											</a>
										</div>
										<?php
									}
								}
							endwhile; ?>
						<?php endif; ?>
					</div>
					<div class="social-menu">
						<div class="social-menu_row">
							<h4><?= __( $contact_page_social ); ?></h4>
							<?php if (have_rows('social', $contact_page_id)) :
								while (have_rows('social', $contact_page_id)) : the_row();
									if (get_sub_field('telegram')) { ?>
										<a href="<?= get_sub_field('telegram'); ?>">
											<svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
												<use xlink:href="#telegram-social"></use>
											</svg>
										</a>
										<?php
									}

									if (get_sub_field('viber')) { ?>
										<a href="<?= get_sub_field('viber'); ?>">
											<svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
												<use xlink:href="#viber-social"></use>
											</svg>
										</a>
										<?php
									}

									if (get_sub_field('facebook')) { ?>
										<a href="<?= get_sub_field('instagram'); ?>">
											<svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
												<use xlink:href="#facebook-social"></use>
											</svg>
										</a>
										<?php
									}

									if (get_sub_field('instagram')) { ?>
										<a href="<?= get_sub_field('instagram'); ?>">
											<svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
												<use xlink:href="#instagram-social"></use>
											</svg>
										</a>
										<?php
									}
								endwhile; ?>
							<?php endif; ?>
						</div>
					</div>
				</div>
				<div class="form-column">
					<?= do_shortcode($contact_page_form); ?>
				</div>
			</div>
		</section>
	</main>
</div>

<?php get_footer(); ?>