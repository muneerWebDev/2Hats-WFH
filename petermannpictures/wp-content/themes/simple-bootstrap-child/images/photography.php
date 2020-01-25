<?php /* Template Name: Photography */ ?>

<?php get_header(); ?>

    <main class="photography">
        <div class="container-fluid">

        <div class="row">
                <div class="col-12 px-0">
                    <div id="photos">

                        <!-- <img src="" alt="" class="img-fluid"> -->

                        <?php 

                        $images = get_field('add_image');
                        $size = 'full'; // (thumbnail, medium, large, full or custom size)

                        if( $images ): ?>
                            <?php foreach( $images as $image ): ?>
                                <div class="img-wrap">
            	                    <?php echo wp_get_attachment_image( $image['ID'], $size ); ?>
                                </div>
                            <?php endforeach; ?>
                        <?php endif; ?>

                     <div class="img-wrap"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/logo.png" alt="" class="img-fluid"> </div>

                    <!-- <div class="img-wrap"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/2.jpg" alt="" class="img-fluid"> </div>
                    <div class="img-wrap"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/3.jpg" alt="" class="img-fluid"> </div>
                    <div class="img-wrap"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/4.jpg" alt="" class="img-fluid"> </div>
                    <div class="img-wrap"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/8.jpg" alt="" class="img-fluid"> </div>
                    <div class="img-wrap"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/5.jpg" alt="" class="img-fluid"> </div>
                    <div class="img-wrap"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/6.jpg" alt="" class="img-fluid"> </div>
                    <div class="img-wrap"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/9.jpg" alt="" class="img-fluid"> </div> -->


                    </div>
                </div>
        </div>

        </div>
    </main>

<?php get_footer(); ?>