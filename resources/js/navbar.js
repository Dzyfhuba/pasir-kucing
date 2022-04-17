// if #commercial loaded
if (document.getElementById("public")) {
    // detect 200px scroll of page
    function detectScroll() {
        if (document.body.scrollTop > 100 || document.documentElement.scrollTop > 100) {
            // $(".navbar").css("background-color", "#fff") and animate it
            $(".navbar").css("background-color", "#fff");
            $(".navbar").css("transition", "all 0.5s");
            $(".navbar").css("box-shadow", "0px 0px 10px rgb(0 0 0 / 20%)");
        } else {
            // $(".navbar").css("background-color", "transparent") and animate it
            $(".navbar").css("background-color", "transparent");
            $(".navbar").css("transition", "all 0.5s");
            $(".navbar").css("box-shadow", "none");
        }
    }

    $(() => {
        $(window).on("scroll", detectScroll);

        if (document.body.scrollTop > 100 || document.documentElement.scrollTop > 100) {
            $(".navbar").css("background-color", "#fff");
            // $(".navbar").css("transition", "all 0.5s");
            $(".navbar").css("box-shadow", "0px 0px 10px rgb(0 0 0 / 20%)");
        }
    });

}