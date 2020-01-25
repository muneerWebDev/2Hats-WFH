<?php /* Template Name: Home */ ?>

<?php get_header(); ?>




<main class="homepage">

	<div class="container">
		<section class="banner">
			<div class="banner-title">
				<?php

				$title1 = get_field('banner_title_line_1');
				$title2 = get_field('banner_title_line_2');
				$title3 = get_field('banner_title_line_3');

				if ($title1) : ?>
					<h1>
						<span><?php echo $title1; ?></span>
						<span><?php echo $title2; ?></span>
						<span><?php echo $title3; ?></span>
					</h1>

				<?php endif; ?>

			</div>
			<div class="row">
				<div class="col-md-9">




					<div class="banner-video position-relative">

						<?php

						$file = get_field('banner_video');

						if ($file) : ?>
							<video loop autoplay mute class="w-100">
								<source src="<?php echo $file['url']; ?>" type="video/mp4">
								Your browser does not support the video tag.
							</video>

						<?php endif; ?>



					</div>



				</div>
				<div class="col-md-12">



					<div class="banner-text">

						<p>
							<?php

							$banner_text = get_field('banner_text');

							if ($file) : ?>
								<?php echo $banner_text; ?>

							<?php endif; ?>
						</p>

					</div>
				</div>
			</div>
		</section>
	</div>

</main>


<!-- Advanced Custom Fields -->





<?php get_footer(); ?>