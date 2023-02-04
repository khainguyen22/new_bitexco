<?php

get_header();
header("Location: https://power.dtts.com.vn/");
get_template_part('sections/specia', 'breadcrumb'); ?>



<section class="page-wrapper error-page">



	<div class="container text-center">



		<div class="row">

			<div class="col-md-12">

				<h1><?php _e('404', 'specia');
					404 ?></h1>

				<h2><?php esc_html_e('Oops! That page can&rsquo;t be found.', 'specia'); ?></h2>

				<p><?php esc_html_e('It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'specia'); ?></p>

			</div>

		</div>



		<div class="row">

			<div class="col-md-6 col-md-offset-3">

				<?php

				get_search_form();

				?>

			</div>

		</div>



	</div>



</section>



<?php get_footer();
