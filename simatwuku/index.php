<?php get_header();?>
    <main class="main">
        <section class="mainvisual">
            <div class="mainvisual__inner">
                <div class="mainvisual__image-group">
                    <img src="<?php echo get_template_directory_uri(); ?>/img/image/18.jpg" alt="mv_1" class="mainvisual__image-group__image">

                    <img src="<?php echo get_template_directory_uri(); ?>/img/image/3.jpg" alt="mv_2" class="mainvisual__image-group__image">

                    <img src="<?php echo get_template_directory_uri(); ?>/img/image/7.jpg" alt="mv_3" class="mainvisual__image-group__image">

                    <img src="<?php echo get_template_directory_uri(); ?>/img/image/25.jpg" alt="mv_4" class="mainvisual__image-group__image">

                    <img src="<?php echo get_template_directory_uri(); ?>/img/image/22.jpg" alt="mv_5" class="mainvisual__image-group__image">
                </div>
                <h2 class="mainvisual__title">きっと<br>忘れられない思い出に</h2>
            </div>
        </section>

        <section class="about" id="about">
            <div class="about__inner">
                <h2 class="about__title">島トゥクとは？</h2>
                <div class="about__textbox">
                    <p>日間賀島を「トゥクトゥク」で巡る
                        観光フォトサービス！
                        潮風を体に感じて、
                        島内の人気スポットや抱負な
                        自然も知ることができます。
                        この機会にぜひ乗りに来てください！</p>
                </div>
            </div>
        </section>

        <section class="vision-example" id="vision-example">
            <div class="vision-example__inner">
                <h2 class="vision-example__title">景色の例</h2>
                <div class="vision-example__image-area">
                    <img src="<?php echo get_template_directory_uri(); ?>/img/image/15.jpg" alt="example_1" class="vision-example__image-area__image">
                    <img src="<?php echo get_template_directory_uri(); ?>/img/image/13.jpg" alt="example_2" class="vision-example__image-area__image">
                    <img src="<?php echo get_template_directory_uri(); ?>/img/image/9.jpg" alt="example_3" class="vision-example__image-area__image">
                    <img src="<?php echo get_template_directory_uri(); ?>/img/image/19.jpg" alt="example_4" class="vision-example__image-area__image">
                    <img src="<?php echo get_template_directory_uri(); ?>/img/image/24.jpg" alt="example_5" class="vision-example__image-area__image">
                    <img src="<?php echo get_template_directory_uri(); ?>/img/image/20.jpg" alt="example_6" class="vision-example__image-area__image">
                </div>
            </div>

        </section>

        <section class="appointment-ex" id="appointment-ex">
            <div class="appointment-ex__inner">
                <h2 class="appointment-ex__title">予約の方法</h2>
                <div class="appointment-ex__textbox">
                    <p>予約は電話のみの受付です。
                        天候が著しく悪い日や都合による休業の時には電話が繋がりません。
                        ご了承ください。</p>

                </div>
                <a href="<?php echo home_url('/appointment'); ?>" class="appointment-ex__link">更に詳しく＞</a>
                <a href="#appointment-ex" class="appointment-ex appointment-Btn linkBtn">予約</a>
            </div>
        </section>

        <section class="news" id="news">

            <div class="news__inner">
                <h2 class="news__title">お知らせ</h2>


                <?php
$args = array(
    'post_type'      => 'post',
    'posts_per_page' => 4,
    'orderby'        => 'date',
    'order'          => 'DESC',
);
$news_query = new WP_Query($args);
?>

                <!-- 記事 -->
                <div class="news__box">

<?php if ($news_query->have_posts()) : ?>
    <?php while ($news_query->have_posts()) : $news_query->the_post(); ?>

        <a href="<?php the_permalink(); ?>" class="news__link">
            <article class="news__item">


        <!-- サムネイル -->

         <div class="news__imgbox">
                <?php if (has_post_thumbnail()) : ?>
                    <?php the_post_thumbnail('medium'); ?>
                <?php else : ?>
                    <img src="<?php echo get_template_directory_uri(); ?>/img/image/news-template.jpg" alt="news">
                <?php endif; ?>
            </div>

                <div class="news__textbox">
                    <p>
                        日付：<?php echo get_the_date('Y年m月d日'); ?><br>
                        <?php the_excerpt(); ?>
                    </p>
                </div>

            </article>
        </a>

    <?php endwhile; ?>
<?php endif; ?>


                </div>
                <a href="<?php echo home_url('/news-archive'); ?>" class="more linkBtn">more</a>
            </div>

        </section>

    </main>

    <?php get_footer();?>
