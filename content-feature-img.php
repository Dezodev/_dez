<div class="post-feature-img">
    <?php if (has_post_thumbnail()): ?>
        <?php the_post_thumbnail(); ?>
    <?php elseif (has_header_image()): ?>
        <?php the_header_image_tag(); ?>
    <?php endif; ?>

    <div class="feature-img-overlay">
        <h1 class="site-heading"><?php the_title() ?></h1>

        <div class="post-meta-infos-container">
            <?php display_post_meta_info(); ?>
        </div>
    </div>
</div>