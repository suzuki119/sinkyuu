<?php
/* Template Name: お問い合わせフォーム */
get_header(); ?>

<main>
    <section class="access">
        <div class="access__inner">
            <h2 class="access__title">お問い合わせ</h2>

            <?php echo do_shortcode('[mwform_formkey key="23"]'); ?>

        </div>
    </section>
</main>

<?php get_footer(); ?>