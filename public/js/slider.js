// Application Slider
let slideIndex = 1;
showSlides(slideIndex);
function currentSlide(n) {
    showSlides((slideIndex = n));
}

function showSlides(n) {
    let i;
    let slides = document.getElementsByClassName("mySlides");
    let dots = document.getElementsByClassName("dot");
    if (n > slides.length) {
        slideIndex = 1;
    }
    if (n < 1) {
        slideIndex = slides.length;
    }
    for (i = 0; i < slides.length; i++) {
        slides[i].style.right = "620px";
        slides[i].style.padding = "20px ";
        slides[i].style.left = "40px";
        slides[i].style["z-index"] = "1";
        slides[i].style.width = "100%";
        slides[i].style["margin-right"] = "20px";
    }
    for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(" active", "");
    }
    // slides[slideIndex - 1].style.top = "0px";
    slides[slideIndex - 1].style.right = "0";
    slides[slideIndex - 1].style.padding = "20px 20px 80px 10px";
    slides[slideIndex - 1].style["z-index"] = "2";
    slides[slideIndex - 1].style["margin-right"] = "";

    dots[slideIndex - 1].className += " active";
}

// Services Slider
let box = document.querySelectorAll(".service .slider-wrapper .box");
let servicesDots = document.getElementsByClassName("ServicesDot");

let index = 0;

// for(let i=0 ; i < box.length;i++){
//     console.log(box[i]);
// };
function next() {
    box[index].classList.remove("active");
    servicesDots[index].classList.remove("active");
    index = (index + 1) % box.length;
    box[index].classList.add("active");
    servicesDots[index].classList.add("active");
}

function prev() {
    box[index].classList.remove("active");
    servicesDots[index].classList.remove("active");
    index = (index - 1 + box.length) % box.length;
    box[index].classList.add("active");
    servicesDots[index].classList.add("active");
}

function currentservicesSlide(n) {
    box[index].classList.remove("active");
    servicesDots[index].classList.remove("active");
    index = n - 1;
    box[index].classList.add("active");
    servicesDots[index].classList.add("active");
}

// news slider
let newsSlideWrapper = document.getElementById("news-boxes");
    let newsBox = document.querySelectorAll(".news .slide-wrapper .box");
     newsSlideWrapper.style.width = "calc(100% * " + ((newsBox.length - 1)) + ")";
    let i =0 ; 
console.log(i);

function newsNext(n) {
    i+=n;
console.log(i);

    let newsSlideWrapper = document.getElementById("news-boxes");
    let newsBox = document.querySelectorAll(".news .slide-wrapper .box");
    // newsSlideWrapper.append(newsBox[0]);
    // newsSlideWrapper.style.transform = 'translateX('+ 420 * i +'px )';
    let maxWidth = 420 * (newsBox.length - 2) + 'px';
    if(newsSlideWrapper.style.left != maxWidth)
    newsSlideWrapper.style.left =  420 * i +'px';
    console.log('translateX('+ 420 * i +'px )');
    console.log(420 * i +'px');

}

function newsPrev(n) {
    i+=n;
console.log(i);

    let newsSlideWrapper = document.getElementById("news-boxes");
    let newsBox = document.querySelectorAll(".news .slide-wrapper .box");
    // newsSlideWrapper.style.transform = 'translateX('+ -420 * i +' px)';
    if(newsSlideWrapper.style.left != 0 || newsSlideWrapper.style.left != "")
    newsSlideWrapper.style.left = -420 * (i - newsBox.length) +'px';
    // console.log('translateX('+ -420 * i +'px )');

    // newsSlideWrapper.prepend(newsBox[newsBox.length - 1]);
}