// script.js - wrapped with DOMContentLoaded and guarded selectors to avoid runtime errors

document.addEventListener('DOMContentLoaded', function () {

    /* -----------------
       appointment page
       ----------------- */




    /* -----------------
       index: 画像切替
       ----------------- */
    if (document.body.classList.contains("home")) {
        const images = document.querySelectorAll(".vision-example__image-area__image");
        if (images.length > 0) {
            let currentIndex = images.length - 1;

            images.forEach((img, i) => {
                img.style.opacity = i === currentIndex ? "1" : "0";
                img.style.transition = "opacity 1s ease";
            });

            setInterval(() => {
                const nextIndex = (currentIndex - 1 + images.length) % images.length;
                images[currentIndex].style.opacity = "0";
                images[nextIndex].style.opacity = "1";
                currentIndex = nextIndex;
            }, 3000);
        }
    }

    /* -----------------
       ページ内リンクの自前スクロール
       ----------------- */
    document.querySelectorAll('a[href^="#"]').forEach(link => {
        link.addEventListener("click", function (e) {
            // if href is just "#" or not pointing to an id, ignore
            const href = this.getAttribute("href");
            if (!href || href === "#") return;

            e.preventDefault(); // ブラウザのデフォルト動作を止める

            const targetID = href.substring(1);
            const targetElement = document.getElementById(targetID);

            if (targetElement) {
                window.scrollTo({
                    top: targetElement.offsetTop,
                    behavior: "smooth"
                });
            }

            // URLの #◯◯ を履歴に残さない
            history.replaceState(null, "", window.location.pathname);
        });
    });

    /* -----------------
       ハンバーガー
       ----------------- */
    const hamburgerBtn = document.querySelector(".hamburger");
    const menu = document.querySelector(".menu");
    const body = document.body;
    if (hamburgerBtn && menu) {
        hamburgerBtn.addEventListener("click", function () {
            menu.classList.toggle("active");
            hamburgerBtn.classList.toggle("active");
            if (window.innerWidth < 768) {
                body.classList.toggle('is-fixed');
            }
        });
    }

    /* -----------------
       メインビジュアル：アニメーション
       ----------------- */
    if (document.body.classList.contains("home")) {
        const images = document.querySelectorAll(".mainvisual__circle__photo");

        if (images.length > 0) {
            let index = 0;

            function runSequence() {
                const img = images[index];
                img.style.animation = "none";
                void img.offsetWidth;

                const randomX = Math.random() * 100 - 20;
                let randomRotate = Math.floor(Math.random() * 2);

                if (randomRotate === 1) {
                    randomRotate = Math.floor(Math.random() * 40) + 40;
                }
                else {
                    randomRotate = Math.floor(Math.random() * 40) - 80;
                }
                let randomSize = Math.random() * (150 - 100) + 100;



                let randomY = (Math.floor((Math.random() * 2)));

                if (randomY === 1) {
                    randomY = 100;

                } else {
                    randomY = 400;
                }

                img.style.top = `${randomY}px`;

                img.style.setProperty("--rotate", `${randomRotate}deg`);

                img.style.setProperty("--up", `${randomSize / 5}px`);

                img.style.setProperty("--size", `${randomSize}%`);

                // ★ここを修正：up(横移動) と puka-puka(浮遊) を合体させる
                // up は 30s で横切り、puka-puka は 4s ごとに揺れる
                // runSequence内のアニメーション指定箇所
                img.style.animation = `up 30s linear forwards, puka-puka 4s ease-in-out infinite`;
                index = (index + 1) % images.length;

                const delaytime = 3000; //window.innerWidth * 8;

                setTimeout(runSequence, delaytime);
            }
            runSequence();
        }

        const toggle = document.querySelector('.global-bottom__toggle');
        const menu = document.querySelector('.global-bottom__content');

        toggle.addEventListener('click', () => {
            menu.classList.toggle('is-open');
            toggle.classList.toggle('is-open');
        });

        window.addEventListener('DOMContentLoaded', () => {
            const mv = document.querySelector('.mainvisual');
            if (mv) {
                // 現在の画面の高さを取得して、pxで直接指定する
                const vh = window.innerHeight;
                mv.style.height = `${vh}px`;
            }

        });

        window.addEventListener('scroll', () => {
            const cloudContainer = document.getElementById('cloudWipe');
            const cloudLeft = cloudContainer.querySelector('.cloud-left');
            const cloudRight = cloudContainer.querySelector('.cloud-right');
            const mv = document.querySelector('.mainvisual');


            // アニメーションを動かす範囲（メインビジュアルの高さ分など）
            const scrollMax = window.innerHeight;
            const scrollY = window.scrollY;

            // 進捗率を 0 ～ 1 の間で計算
            let progress = Math.min(scrollY / scrollMax, 1);

            // 雲の移動（-100% から 0% へ、100% から 0% へ）
            const leftMove = -100 + (progress * 200);
            const rightMove = 100 - (progress * 200);

            cloudLeft.style.transform = `translateX(${leftMove}%)`;
            cloudRight.style.transform = `translateX(${rightMove}%)`;

            // 雲が閉じきった（進捗100%）ら、コンテナ自体を少し透過させて背景に馴染ませる
            if (progress >= 0.4) {
                mv.style.display = "none";
            }
            else {
                mv.style.display = "block";
            }
        });

        window.addEventListener('scroll', () => {
            const mainvisual = document.querySelector('.mainvisual');
            const scrollThreshold = window.innerHeight; // 100vhスクロールしたら解除

            if (window.scrollY >= scrollThreshold) {

            } else {
                mainvisual.style.position = 'fixed';
                mainvisual.style.top = '0';
            }
        });





    }

});
