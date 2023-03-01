<?php

/**
 * Template Name: Liên Hệ
 */
?>

<?php get_header() ?>

<!--  Banner -->
<?php
$banner = get_field('contact_banner', 'option');
?>
<section class="terms sitemap-banner banner" style="background-image: url(<?php echo $banner['image'] ?>)">
	<div class="terms-header">
		<div class="terms-header-top">
			<div>
				<h3><?php echo paint_if_exist($banner['banner_title']) ?></h3>
				<p><?php echo paint_if_exist($banner['banner_description']) ?></p>
			</div>
		</div>
	</div>
</section>
<!-- End  Banner -->

<!-- Form Lien He -->

<?php

$contact_content = get_field('contact_content', 'option');

?>

<div class="contact-content">
	<div class="container">
		<div class="contact-box">
			<div class="contact-form">
				<h5 class="title"><?php echo paint_if_exist($contact_content['form_title']) ?></h5>
				<?php echo do_shortcode($contact_content['form_shortcode']) ?>
			</div>
			<div class="contact-information">
				<h5 class="title"><?php echo paint_if_exist($contact_content['contact_information']['title']) ?></h5>
				<div class="info">
					<p class="desc size-text-16"><?php echo paint_if_exist($contact_content['contact_information']['title_description']) ?></p>
					<h6 class="name-company"><?php echo paint_if_exist($contact_content['contact_information']['title_2']) ?></h6>
					<div class="contact-info">
						<span class="d-flex contact-infor-item address">
							<span class="tag">
								<svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
									<path d="M16.8125 8.08333C16.8125 12.9398 11.2875 18 9.90625 18C8.525 18 3 12.9398 3 8.08333C3 4.17132 6.09203 1 9.90625 1C13.7205 1 16.8125 4.17132 16.8125 8.08333Z" stroke="#7E8189" stroke-width="1.5" />
									<circle r="2.65625" transform="matrix(-1 0 0 1 9.90625 7.90625)" stroke="#7E8189" stroke-width="1.5" />
								</svg>
							</span>
							<span class="size-text-16"><?php echo paint_if_exist($contact_content['contact_information']['address']) ?></span>
						</span>
						<span class="d-flex contact-infor-item phone">
							<span class="tag">
								<svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
									<path d="M15.885 16.8486C14.2564 18.4772 10.0857 16.9469 6.56939 13.4306C3.0531 9.91432 1.52283 5.74356 3.15142 4.11496L4.22373 3.04265C4.964 2.30238 6.18379 2.32195 6.9482 3.08636L8.6091 4.74727C9.37352 5.51168 9.39308 6.73147 8.65281 7.47174L8.42249 7.70206C8.02281 8.10174 7.98371 8.74651 8.35509 9.19656C8.71331 9.63066 9.0995 10.063 9.51823 10.4818C9.93696 10.9005 10.3693 11.2867 10.8034 11.6449C11.2535 12.0163 11.8983 11.9772 12.2979 11.5775L12.5283 11.3472C13.2685 10.6069 14.4883 10.6265 15.2527 11.3909L16.9136 13.0518C17.6781 13.8162 17.6976 15.036 16.9573 15.7763L15.885 16.8486Z" stroke="#7E8189" stroke-width="1.5" />
								</svg>

							</span>
							<div>
								<div class="tel size-text-16">
									<?php _e('Tel: ', POWER) ?>
									<?php foreach ($contact_content['contact_information']['phone'] as $key => $value) : ?>
										<a class="size-text-16" href="tel:<?php echo formatPhoneNumber($value['number']); ?>"><?php echo formatPhoneNumber($value['number']) ?> </a>
										<span class="mx-2">|</span>
									<?php endforeach; ?>
								</div>
								<div class="d-flex so-may">
									<span class="size-text-14"><?php echo paint_if_exist($contact_content['contact_information']['phone_description']['text']) ?></span>
									<ul>
										<?php foreach ($contact_content['contact_information']['phone_description']['ext'] as $key => $value) : ?>
											<li class="size-text-14"><?php echo paint_if_exist($value['number_text']) ?></li>
										<?php endforeach; ?>
									</ul>
								</div>
							</div>
						</span>
						<span class="d-flex contact-infor-item fax">
							<span class="tag">
								<svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
									<g clip-path="url(#clip0_3080_86917)">
										<g clip-path="url(#clip1_3080_86917)">
											<path d="M17.2245 18.5138H5.73882C5.54938 18.5138 5.3677 18.4385 5.23375 18.3046C5.09979 18.1706 5.02454 17.9889 5.02454 17.7995C5.02454 17.6101 5.09979 17.4284 5.23375 17.2944C5.3677 17.1605 5.54938 17.0852 5.73882 17.0852H17.2245C17.5154 17.11 17.8044 17.0198 18.0295 16.8339C18.2546 16.648 18.3979 16.3812 18.4285 16.0909V7.81092C18.3977 7.5207 18.2544 7.25411 18.0293 7.06833C17.8043 6.88256 17.5153 6.7924 17.2245 6.81721C17.0351 6.81721 16.8534 6.74195 16.7195 6.608C16.5855 6.47404 16.5102 6.29236 16.5102 6.10292C16.5102 5.91348 16.5855 5.7318 16.7195 5.59784C16.8534 5.46389 17.0351 5.38863 17.2245 5.38863C17.8944 5.36261 18.5473 5.60278 19.0406 6.05666C19.5338 6.51055 19.8274 7.14124 19.8571 7.81092V16.0903C19.8276 16.7602 19.5341 17.3911 19.0408 17.8452C18.5475 18.2993 17.8945 18.5396 17.2245 18.5138Z" fill="#7E8189" />
											<path d="M8.30282 6.81529H5.73882C5.54938 6.81529 5.3677 6.74004 5.23375 6.60608C5.09979 6.47213 5.02454 6.29044 5.02454 6.101C5.02454 5.91156 5.09979 5.72988 5.23375 5.59593C5.3677 5.46197 5.54938 5.38672 5.73882 5.38672H8.30282C8.49226 5.38672 8.67394 5.46197 8.8079 5.59593C8.94185 5.72988 9.01711 5.91156 9.01711 6.101C9.01711 6.29044 8.94185 6.47213 8.8079 6.60608C8.67394 6.74004 8.49226 6.81529 8.30282 6.81529Z" fill="#7E8189" />
											<path d="M4.05711 19.2311H2.53768C1.90294 19.2298 1.29459 18.977 0.845761 18.5282C0.396932 18.0794 0.144181 17.471 0.142822 16.8363V6.35913C0.144332 5.72449 0.397149 5.11628 0.845962 4.66758C1.29477 4.21887 1.90304 3.9662 2.53768 3.96484H4.05711C4.69175 3.9662 5.30001 4.21887 5.74883 4.66758C6.19764 5.11628 6.45046 5.72449 6.45197 6.35913V16.8363C6.45061 17.471 6.19786 18.0794 5.74903 18.5282C5.3002 18.977 4.69185 19.2298 4.05711 19.2311ZM2.53768 5.39342C2.28155 5.39357 2.03595 5.49534 1.85478 5.6764C1.67362 5.85746 1.5717 6.103 1.57139 6.35913V16.8363C1.57155 17.0925 1.6734 17.3382 1.85458 17.5194C2.03576 17.7006 2.28145 17.8024 2.53768 17.8026H4.05711C4.31329 17.8023 4.55889 17.7004 4.74004 17.5192C4.92119 17.3381 5.02309 17.0925 5.02339 16.8363V6.35913C5.02294 6.10305 4.92097 5.85759 4.73984 5.67657C4.55871 5.49554 4.31319 5.39372 4.05711 5.39342H2.53768Z" fill="#7E8189" />
											<path d="M16.3754 9.49067H8.50628C8.31684 9.49067 8.13516 9.41542 8.0012 9.28146C7.86725 9.14751 7.79199 8.96583 7.79199 8.77639V1.48382C7.79199 1.29438 7.86725 1.1127 8.0012 0.978741C8.13516 0.844786 8.31684 0.769531 8.50628 0.769531H16.3754C16.5649 0.769531 16.7465 0.844786 16.8805 0.978741C17.0145 1.1127 17.0897 1.29438 17.0897 1.48382V8.77639C17.0897 8.96583 17.0145 9.14751 16.8805 9.28146C16.7465 9.41542 16.5649 9.49067 16.3754 9.49067ZM9.22056 8.0621H15.6611V2.19525H9.22056V8.0621Z" fill="#7E8189" />
											<path d="M9.49487 12.6629C9.67937 12.6556 9.85385 12.5771 9.98178 12.4439C10.1097 12.3108 10.1812 12.1333 10.1812 11.9487C10.1812 11.764 10.1097 11.5865 9.98178 11.4534C9.85385 11.3202 9.67937 11.2418 9.49487 11.2344C9.31038 11.2418 9.13589 11.3202 9.00797 11.4534C8.88004 11.5865 8.80859 11.764 8.80859 11.9487C8.80859 12.1333 8.88004 12.3108 9.00797 12.4439C9.13589 12.5771 9.31038 12.6556 9.49487 12.6629Z" fill="#7E8189" />
											<path d="M12.4412 12.6629C12.6257 12.6556 12.8001 12.5771 12.9281 12.4439C13.056 12.3108 13.1274 12.1333 13.1274 11.9487C13.1274 11.764 13.056 11.5865 12.9281 11.4534C12.8001 11.3202 12.6257 11.2418 12.4412 11.2344C12.2567 11.2418 12.0822 11.3202 11.9543 11.4534C11.8263 11.5865 11.7549 11.764 11.7549 11.9487C11.7549 12.1333 11.8263 12.3108 11.9543 12.4439C12.0822 12.5771 12.2567 12.6556 12.4412 12.6629Z" fill="#7E8189" />
											<path d="M15.3875 12.6629C15.5719 12.6556 15.7464 12.5771 15.8744 12.4439C16.0023 12.3108 16.0737 12.1333 16.0737 11.9487C16.0737 11.764 16.0023 11.5865 15.8744 11.4534C15.7464 11.3202 15.5719 11.2418 15.3875 11.2344C15.203 11.2418 15.0285 11.3202 14.9005 11.4534C14.7726 11.5865 14.7012 11.764 14.7012 11.9487C14.7012 12.1333 14.7726 12.3108 14.9005 12.4439C15.0285 12.5771 15.203 12.6556 15.3875 12.6629Z" fill="#7E8189" />
											<path d="M9.49487 15.0536C9.67937 15.0462 9.85385 14.9677 9.98178 14.8346C10.1097 14.7014 10.1812 14.5239 10.1812 14.3393C10.1812 14.1546 10.1097 13.9772 9.98178 13.844C9.85385 13.7109 9.67937 13.6324 9.49487 13.625C9.31038 13.6324 9.13589 13.7109 9.00797 13.844C8.88004 13.9772 8.80859 14.1546 8.80859 14.3393C8.80859 14.5239 8.88004 14.7014 9.00797 14.8346C9.13589 14.9677 9.31038 15.0462 9.49487 15.0536Z" fill="#7E8189" />
											<path d="M12.4412 15.0536C12.6257 15.0462 12.8001 14.9677 12.9281 14.8346C13.056 14.7014 13.1274 14.5239 13.1274 14.3393C13.1274 14.1546 13.056 13.9772 12.9281 13.844C12.8001 13.7109 12.6257 13.6324 12.4412 13.625C12.2567 13.6324 12.0822 13.7109 11.9543 13.844C11.8263 13.9772 11.7549 14.1546 11.7549 14.3393C11.7549 14.5239 11.8263 14.7014 11.9543 14.8346C12.0822 14.9677 12.2567 15.0462 12.4412 15.0536Z" fill="#7E8189" />
											<path d="M15.3875 15.0536C15.5719 15.0462 15.7464 14.9677 15.8744 14.8346C16.0023 14.7014 16.0737 14.5239 16.0737 14.3393C16.0737 14.1546 16.0023 13.9772 15.8744 13.844C15.7464 13.7109 15.5719 13.6324 15.3875 13.625C15.203 13.6324 15.0285 13.7109 14.9005 13.844C14.7726 13.9772 14.7012 14.1546 14.7012 14.3393C14.7012 14.5239 14.7726 14.7014 14.9005 14.8346C15.0285 14.9677 15.203 15.0462 15.3875 15.0536Z" fill="#7E8189" />
										</g>
									</g>
									<defs>
										<clipPath id="clip0_3080_86917">
											<rect width="20" height="20" fill="white" />
										</clipPath>
										<clipPath id="clip1_3080_86917">
											<rect width="20" height="20" fill="white" />
										</clipPath>
									</defs>
								</svg>
							</span>
							<span class="size-text-16"><?php _e('Fax: ', POWER) ?><a href="tel:<?php echo formatPhoneNumber($contact_content['contact_information']['fax']) ?>"><?php echo paint_if_exist(formatPhoneNumber($contact_content['contact_information']['fax'])) ?></a></span>
						</span>
						<span class="d-flex contact-infor-item email">
							<span class="tag">
								<svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
									<path d="M18.3333 5V14.8333C18.3333 15.3856 17.8856 15.8333 17.3333 15.8333H2.66663C2.11434 15.8333 1.66663 15.3856 1.66663 14.8333V5M18.3333 5H1.66663M18.3333 5L9.99996 10.4167L1.66663 5" stroke="#7E8189" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
								</svg>

							</span>
							<span class="size-text-16"><?php _e('Email: ', POWER) ?><a class="size-text-16" href="mailto:<?php echo paint_if_exist($contact_content['contact_information']['email']) ?>"><?php echo paint_if_exist($contact_content['contact_information']['email']) ?></a></span>
						</span>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- End Form Lien He -->

<!-- Other Information -->
<?php
$other_info = get_field('contact_other_information', 'option');
?>
<section class="other-information">
	<div class="other-container ">
		<div class="other-content hover-zoom">
			<?php if ($other_info) : ?>
				<?php foreach ($other_info as $value) : ?>
					<a href="<?php echo $value['link']; ?>" class="hydro-electric-news" style="background-image:url('<?php echo $value['image']; ?>')"><span class="text"><?php echo $value['text']; ?></span> </a>
				<?php endforeach; ?>
			<?php endif; ?>
		</div>
	</div>
</section>
<!-- End other information -->

<?php get_footer() ?>