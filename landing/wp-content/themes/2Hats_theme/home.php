<?php /* Template Name: Home */ ?>

<?php get_header(); ?>

<section id="main_banner" class="main_banner">
    <div class="container">
        <div class="row">
            <div class="wrapper">
                <?php

                // check if the repeater field has rows of data
                if (have_rows('mainBannerSlider')) :

                    // loop through the rows of data
                    while (have_rows('mainBannerSlider')) : the_row(); ?>
                        <?php $image = get_sub_field('image'); ?>

                        <div class="col-12">
                            <div class="item">
                                <div class="row h-100">
                                    <div class="col-md-6 align-self-center order-2 order-md-1">
                                        <h1><?php echo  the_sub_field('heading'); ?></h1>
                                        <p class="pr-md-5 mr-md-5"><?php echo  the_sub_field('description'); ?></p>
                                        <a href="#features" class="btn btn-primary big-btn mt-1 scroll">Know More</a>
                                    </div>
                                    <div class="col-md-6 align-self-center order-1 order-md-2">
                                        <div class="featured_img">
                                            <img src="<?php echo $image['url'] ?>" class="img-fluid " alt="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                <?php endwhile;

                endif;

                ?>
            </div>
        </div>
    </div>
</section>


<section id="about" class="about py-0">
    <div class="container">
        <div class="row">
            <div class="col-md-6 about_image text-center">
                <img src="<?php echo get_template_directory_uri() ?>/images/custom-mob.png" class="img-fluid wow fadeInUp" alt="">
            </div>
            <div class="col-md-6 align-self-center py-5 py-md-0 mb-5 mb-md-0">
                <h2 class=" wow fadeInUp">
                    <?php
                    echo get_field('about_heading');
                    ?>
                </h2>
                <?php

                // check if the repeater field has rows of data
                if (have_rows('para_content')) :

                    // loop through the rows of data
                    while (have_rows('para_content')) : the_row(); ?>

                        <p class=" wow fadeInUp"><?php echo  the_sub_field('paragraph_about'); ?></p>

                <?php endwhile;

                endif;

                ?>
                <div class="btn-wrap w-100 mt-4">
                    <a href="#pricing" class="btn btn-primary big-btn wow fadeInUp scroll">See the Pricing</a>
                </div>
            </div>
        </div>
    </div>
</section>

<?php

// check if the repeater field has rows of data
if (have_rows('features_group')) : ?>

    <section id="features" class="features">

        <div class="container">
            <div class="row">
                <div class="col-12 head">

                    <h2 class="mx-auto wow fadeInUp">
                        <?php
                        echo get_field('features_heading');
                        ?>
                    </h2>
                    <!-- <div class="btn-group">
                        <button class="btn-transp left"><i class="fas fa-chevron-circle-left"></i></i></button>
                        <button class="btn-transp right"><i class="fas fa-chevron-circle-right"></i></button>
                    </div> -->
                </div>
            </div>

            <div class="row features_group text-center">
                <?php
                // loop through the rows of data
                $count = 0;
                while (have_rows('features_group')) : the_row(); ?>

                    <div class="col-lg-4 col-md-6 group">
                        <div class="feature wow fadeInUp" data-wow-delay="<?php echo $count ?>s">

                            <div class="icon">
                                <?php
                                the_sub_field('feature_icon');
                                ?>
                            </div>

                            <h4 class="mb-2">
                                <?php
                                the_sub_field('feature_title');
                                ?>
                            </h4>

                            <p>
                                <?php
                                the_sub_field('feature_description');
                                ?>
                            </p>

                        </div>
                    </div>
                    <?php $count += .1 ?>
                <?php endwhile; ?>
            </div>
        </div>

    </section>
<?php

endif;

?>

<section id="pricing" class="pricing text-center">
    <div class="container">

        <div class="row">

            <div class="col-12 pb-5">
                <h2 class=" wow fadeInUp"><?php echo get_field("pricing_heading") ?></h2>
                <p class=" wow fadeInUp"><?php echo get_field("pricing_description") ?></p>
            </div>
        </div>

        <div class="row plans">

            <?php

            // check if the repeater field has rows of data
            if (have_rows('plan')) :

                // loop through the rows of data
                $count = 0;
                while (have_rows('plan')) : the_row(); ?>

                    <div class="col-md-4 mb-5 mb-md-0 group">

                        <div class="plan  wow fadeInUp" data-wow-delay="<?php if($count == 2)echo 0; else echo $count ?>s">
                            <div class="head text-center">
                                <p class="title-3"><?php the_sub_field('plan_name'); ?></p>
                                <p class="title-1"><?php echo  the_sub_field('plan_amount'); ?></p>
                                <p class="title-5 font-color"><b><?php echo  the_sub_field('plan_validity'); ?></b></p>
                            </div>
                            <ul class="plan_features text-left">

                                <?php
                                // check if the repeater field has rows of data
                                if (have_rows('plan_features')) :

                                    // loop through the rows of data
                                    while (have_rows('plan_features')) : the_row(); ?>

                                        <li><?php the_sub_field('plan_feature'); ?></li>

                                <?php endwhile;

                                endif;

                                ?>

                            </ul>
                            <div class="wrap w-100"> <button class="btn btn-dark_inverse mt-3">Get It Now!</button></div>
                        </div>
                    </div>
                    <?php $count += .1 ?>

            <?php endwhile;

            endif;

            ?>



        </div>
    </div>
</section>

<section id="contact" class="contact py-5">
    <div class="container">
        <div class="row">

            <!-- <div class="col-md-6"> -->
            <!-- <div id="map-canvas"></div> -->

            <!-- </div> -->

            <div class="col-md-12">
                <div class="form-wrapper  wow fadeInUp">
                    <h2 class="text-center mb-0 ">Contact Us</h2>
                    <?php echo do_shortcode('[wpforms id="101" title="false" description="false"]'); ?>
                </div>
            </div>
        </div>
    </div>
</section>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDwxfea8ecYMmGKMO39JF1ko5bhF4UocpM"></script>

<?php get_footer(); ?>