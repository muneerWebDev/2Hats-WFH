<?php /* Template Name: Video */ ?>

<?php get_header(); ?>

<main class="videography">
    <div class="container">
        <div class="row">
            <?php

            $query = new WP_Query(array('post_type' => 'video_gallery'));

            if ($query->have_posts()) :

                while ($query->have_posts()) : $query->the_post();

                    $videos = get_field('video_url');
                    if ($videos) : ?>

                    <?php endif; ?>


                    <?php
                            // check if the repeater field has rows of data
                            if (have_rows('video_url')) : ?>
                        <?php while (have_rows('video_url')) : the_row();  ?>
                            <div class="col-sm-6">
                                <iframe src="<?php the_sub_field('add_video'); ?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                            </div>
                        <?php endwhile; ?>
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
        </div>
    </div>
</main>

<?php get_footer(); ?>