<?php get_header();?>

    <main>

        <section class="access">
            <div class="access__inner">
                <h2 class="access__title">
                    お問い合わせ
                </h2>

                <form action="send_mail.php" method="post" class="contact-form">
                    <div class="form-item">
                        <label for="email">メールアドレス</label>
                        <input type="email" id="email" name="email" required placeholder="例：example@gmail.com">
                    </div>

                    <div class="form-item">
                        <label for="message">お問い合わせ内容</label>
                        <textarea id="message" name="message" required placeholder="お問い合わせ内容を入力してください"></textarea>
                    </div>

                    <button type="submit" class="form-submit">送信</button>
                </form>


                <div class="access__information">
                    <ul>
                        <li>〒470-3504 愛知県知多郡南知多町日間賀島上海76</li>
                        <li>TEL: 0569-68-2331
                        </li>
                        <li>FAX: 0569-68-2689
                        </li>
                        <li>島の宿あじ浜
                        </li>
                    </ul>
                </div>


            </div>
        </section>

    </main>
    <?php get_footer();?>
