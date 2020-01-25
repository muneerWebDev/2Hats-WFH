<?php /* Template Name: Photography-Detail */ ?>

<?php get_header(); ?>

<main class="photography-detail">
    <div id="photos">

        <img src="" alt="" class="img-fluid">

        <?php

        $images = get_field('add_image');
        $size = 'full'; // (thumbnail, medium, large, full or custom size)

        if ($images) : ?>
            <?php foreach ($images as $image) : ?>
                <div class="img-wrap">
                    <?php echo wp_get_attachment_image($image['ID'], $size); ?>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>



    </div>
</main>

<?php get_footer(); ?>