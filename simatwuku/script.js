// script.js - wrapped with DOMContentLoaded and guarded selectors to avoid runtime errors

document.addEventListener('DOMContentLoaded', function () {

    /* -----------------
       appointment page
       ----------------- */
    if (document.body.classList.contains("page-appointment")) {
        console.log("ckick");
        const toggle = document.querySelector(".appointment__toggleBtn");
        const togglelist = document.querySelector(".appointment__others__textbox");
        console.log('appointment toggle found', toggle, togglelist);
        toggle.addEventListener("click", () => {
            console.log("ckick");
            togglelist.classList.toggle("show");
        });
    }

    /* -----------------
       root page (map切替)
       ----------------- */
    if (document.body.classList.contains("page-root")) {
        const rootimg = document.querySelector(".root__image img");
        if (rootimg) {
            function checkWidth() {
                if (window.innerWidth >= 1100) {
                    // 1100px以上のときの処理
                    if (typeof themeVars !== 'undefined' && themeVars.themeUrl) {
                        rootimg.src = themeVars.themeUrl + "/img/map/d_map.png";
                    } else {
                        // フォールバック（相対パス）
                        rootimg.src = "/wp-content/themes/" + document.querySelector('body').dataset.theme + "/img/map/d_map.png";
                    }
                    console.log("1100px以上です");
                } else {
                    console.log("1100px未満です");
                    if (typeof themeVars !== 'undefined' && themeVars.themeUrl) {
                        rootimg.src = themeVars.themeUrl + "/img/map/s_map.png";
                    } else {
                        rootimg.src = "/wp-content/themes/" + document.querySelector('body').dataset.theme + "/img/map/s_map.png";
                    }
                }
            }

            window.addEventListener("resize", checkWidth);
            checkWidth();
        }
    }

    /* -----------------
       index: 画像切替（5秒ごと）
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
            }, 5000);
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
                void img.offsetWidth; // リフロー

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



    }

});
