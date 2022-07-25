// news slider
var newsSlideWrapper = document.getElementById("news-boxes");
var newsBox = document.querySelectorAll(".news .slide-wrapper .box");
newsSlideWrapper.style.width = "calc(100% * " + (newsBox.length + 1) + ")";
let i = 0;

function newsNext(n) {
    if (i != newsBox.length - 1) {
        i += n;
    }
    console.log(i);
    // console.log({ item: newsSlideWrapper.style.transform });
    let maxWidth = 420 * (newsBox.length - 1) + "px";
    // console.log(maxWidth);
    if (newsSlideWrapper.style.transform != "translateX(" + maxWidth + ")")
        newsSlideWrapper.style.transform = "translateX(" + 420 * i + "px)";
    console.log("translateX(" + 420 * i + "px)");
    console.log({ item: newsSlideWrapper.style.transform });
}

function newsPrev(n) {
    if (i != 0) {
        i += n;
    }
    console.log(i);
    let maxWidth = -420 * (newsBox.length -1 ) + "px";
    if (
        newsSlideWrapper.style.transform != "translateX(0px)" &&
        newsSlideWrapper.style.transform != "" &&
        newsSlideWrapper.style.transform != "translateX(" + maxWidth + " )"
    ) {
        // if (i == 0)
            newsSlideWrapper.style.transform =
                "translateX(" + (420 * (i + 1) - 420) + "px)";
        // else
        //     newsSlideWrapper.style.transform =
        //         "translateX(" + (420 * i - 420) + "px)";
        console.log("translateX(" + (420 * (i + 1) - 420) + "px )");
    }
}
