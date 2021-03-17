$(window).on("load", function() {
    nullTargetWarn: false;
    console.log("start");
    clickNav();

    /***********************************/
    function clickNav() {
        const trigger = document.querySelector(".nav");

        if (trigger) {
            trigger.addEventListener(
                "click",
                function() {
                    const menu = document.querySelector(".header-menu");
                    menu.classList.toggle("active");
                    this.classList.toggle("active");
                },
                false
            );
        }
    }

    /***********************************/
    //  モーダルウィンドウ
    $(".open").on("click", function() {
        $(".modal").fadeIn();
        $(".overlay").fadeIn();
    });
    $(".close, .overlay").on("click", function() {
        $(".modal").fadeOut();
        $(".overlay").fadeOut();
    });

    let url = location.href;
    //top page
    if (url == "http://localhost:9000/") {
        mainSlider();
        mainCarousel();
    }
});

//  トップ　スライダー
function mainSlider() {
    const elem = document.querySelector(".main-gallery");
    const flicky = new Flickity(elem, {
        // オプション
        cellAlign: "center",
        wrapAround: true,
        contain: true,
        pageDots: true,
        percentPosition: true
    });
}

function mainCarousel() {
    const elem = document.querySelector(".pickup");
    const flicky = new Flickity(elem, {
        // オプション
        cellAlign: "left",
        wrapAround: true,
        contain: true,
        pageDots: true,
        autoPlay: 1500
    });
}
