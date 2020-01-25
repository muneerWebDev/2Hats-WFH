<?php /* Template Name: Photography */ ?>

<?php get_header(); ?>

<main class="photography">
    <div class="container">

        <div class="gallery-sec">
            <div class="row position-relative">

                <div class="col-md-12 detail-lightbox w-100 h-100 position-absolute">

                    <div class="row h-100">
                        <div class="col-md-8 image">
                            <img src="<?php echo get_stylesheet_directory_uri() ?>/images/1.jpg" alt="" class="img-fluid">
                        </div>
                        <div class="col-md-4">
                            <div class="desc">
                                <h2><span class="title"></span> <span class="back"><i class="fas fa-times"></i></span></h2>
                                <p>The endurance of supremacy lorem ipsum dummy</p>
                            </div>
                        </div>
                    </div>

                </div>
                <?php

                $query = new WP_Query(array('post_type' => 'photography_gallery'));

                if ($query->have_posts()) :

                    while ($query->have_posts()) : $query->the_post();

                        $images = get_field('add_image');
                        if ($images) : ?>

                        <?php endif; ?>


                        <?php
                                // check if the repeater field has rows of data
                                if (have_rows('add_image')) : ?>
                                <div class="col-md-5 order-2 order-md-1">
                            <div class="title-wrapper">
                                <div class="row h-100">
                                    <div class="col-12 align-self-center">
                                    <ul class="caption">
                                        <?php while (have_rows('add_image')) : the_row(); ?>

                                            <li> <a href="javaScript:Void(0)" desc="<?php the_sub_field('description'); ?>" sourceUrl="<?php the_sub_field('image'); ?>"> <?php the_sub_field('title'); ?> </a> </li>

                                        <?php endwhile; ?>
                                    </ul>
                                    </div>
                                </div>
                                </div>
                            </div>
                        <?php
                                else :

                                // no rows found

                                endif;
                                ?>



                    <?php endwhile;
                        wp_reset_postdata(); ?>
                    <!-- show pagination here -->
                <?php else : ?>
                    <!-- show 404 error here -->
                <?php endif; ?>






                <div class="col-md-7 order-1 order-md-2">

                    <div class="images">
                        <img src="" alt="" class="backImage">
                        <img src="" alt="" class="foreImage">
                    </div>

                </div>



            </div>
        </div>

    </div>
</main>

<?php get_footer(); ?>