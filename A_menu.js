// dark mode button js

const checkbox = document.getElementById("checkbox")
checkbox.addEventListener("change", () => {
  document.body.classList.toggle("darkBody");
  document.getElementById("header").classList.toggle("darkHeader");
  const anchorElements = document.getElementsByTagName("a");
  for (let i = 0; i < anchorElements.length; i++) {
    anchorElements[i].classList.toggle("darkAnchor");
  }
  document.getElementById("footer").classList.toggle("darkHeader");
})



        // Image Slider


let slider = document.querySelector('.slider .list');
let items = document.querySelectorAll('.slider .list .item');
let next = document.getElementById('next');
let prev = document.getElementById('prev');
let dots = document.querySelectorAll('.dots li');

let lengthItems = items.length - 1;
let active = 0;
next.onclick = function(){
    active = active + 1 <= lengthItems ? active + 1 : 0;
    reloadSlider();
}
prev.onclick = function(){
    active = active - 1 >= 0 ? active - 1 : lengthItems;
    reloadSlider();
}
let refreshInterval = setInterval(()=> {next.click()}, 3000);
function reloadSlider(){
    slider.style.left = -items[active].offsetLeft + 'px';
    // 
    let last_active_dot = document.querySelector('.dots li.active');
    last_active_dot.classList.remove('active');
    dots[active].classList.add('active');

    clearInterval(refreshInterval);
    refreshInterval = setInterval(()=> {next.click()}, 3000);

    
}

dots.forEach((li, key) => {
    li.addEventListener('click', ()=>{
         active = key;
         reloadSlider();
    })
})
window.onresize = function(event) {
    reloadSlider();
};



// Food categories 


const wrapper = document.querySelector(".wrapper");
const carousel = document.querySelector(".carousel");
const firstCardWidth = carousel.querySelector(".card").offsetWidth;
const arrowBtns = document.querySelectorAll(".wrapper i");
const carouselChildrens = [...carousel.children];

let isDragging = false, isAutoPlay = true, startX, startScrollLeft, timeoutId;

// Get the number of cards that can fit in the carousel at once
let cardPerView = Math.round(carousel.offsetWidth / firstCardWidth);

// Insert copies of the last few cards to beginning of carousel for infinite scrolling
carouselChildrens.slice(-cardPerView).reverse().forEach(card => {
    carousel.insertAdjacentHTML("afterbegin", card.outerHTML);
});

// Insert copies of the first few cards to end of carousel for infinite scrolling
carouselChildrens.slice(0, cardPerView).forEach(card => {
    carousel.insertAdjacentHTML("beforeend", card.outerHTML);
});

// Scroll the carousel at appropriate postition to hide first few duplicate cards on Firefox
carousel.classList.add("no-transition");
carousel.scrollLeft = carousel.offsetWidth;
carousel.classList.remove("no-transition");

// Add event listeners for the arrow buttons to scroll the carousel left and right
arrowBtns.forEach(btn => {
    btn.addEventListener("click", () => {
        carousel.scrollLeft += btn.id == "left" ? -firstCardWidth : firstCardWidth;
    });
});

const dragStart = (e) => {
    isDragging = true;
    carousel.classList.add("dragging");
    // Records the initial cursor and scroll position of the carousel
    startX = e.pageX;
    startScrollLeft = carousel.scrollLeft;
}

const dragging = (e) => {
    if(!isDragging) return; // if isDragging is false return from here
    // Updates the scroll position of the carousel based on the cursor movement
    carousel.scrollLeft = startScrollLeft - (e.pageX - startX);
}

const dragStop = () => {
    isDragging = false;
    carousel.classList.remove("dragging");
}

const infiniteScroll = () => {
    // If the carousel is at the beginning, scroll to the end
    if(carousel.scrollLeft === 0) {
        carousel.classList.add("no-transition");
        carousel.scrollLeft = carousel.scrollWidth - (2 * carousel.offsetWidth);
        carousel.classList.remove("no-transition");
    }
    // If the carousel is at the end, scroll to the beginning
    else if(Math.ceil(carousel.scrollLeft) === carousel.scrollWidth - carousel.offsetWidth) {
        carousel.classList.add("no-transition");
        carousel.scrollLeft = carousel.offsetWidth;
        carousel.classList.remove("no-transition");
    }

    // Clear existing timeout & start autoplay if mouse is not hovering over carousel
    clearTimeout(timeoutId);
    if(!wrapper.matches(":hover")) autoPlay();
}

const autoPlay = () => {
    if(window.innerWidth < 800 || !isAutoPlay) return; // Return if window is smaller than 800 or isAutoPlay is false
    // Autoplay the carousel after every 2500 ms
    timeoutId = setTimeout(() => carousel.scrollLeft += firstCardWidth, 2500);
}
autoPlay();

carousel.addEventListener("mousedown", dragStart);
carousel.addEventListener("mousemove", dragging);
document.addEventListener("mouseup", dragStop);
carousel.addEventListener("scroll", infiniteScroll);
wrapper.addEventListener("mouseenter", () => clearTimeout(timeoutId));
wrapper.addEventListener("mouseleave", autoPlay);



// menu tabs sliding

var tab_1 = document.getElementById("tab_1");
var tab_2 = document.getElementById("tab_2");
var tab_3 = document.getElementById("tab_3");
var tab_4 = document.getElementById("tab_4");
var tab_5 = document.getElementById("tab_5");
var tab_6 = document.getElementById("tab_6");

var btn_1 = document.getElementById("btn_1");
var btn_2 = document.getElementById("btn_2");
var btn_3 = document.getElementById("btn_3");
var btn_4 = document.getElementById("btn_4");
var btn_5 = document.getElementById("btn_5");
var btn_6 = document.getElementById("btn_6");

// Top_Rated tab
function openTop_Rated(){
    tab_1.style.transform = "translateX(0)";
    tab_2.style.transform = "translateX(100%)";
    tab_3.style.transform = "translateX(100%)";
    tab_4.style.transform = "translateX(100%)";
    tab_5.style.transform = "translateX(100%)";
    tab_6.style.transform = "translateX(100%)";

    btn_1.style.backgroundColor = "#ffffff";
    btn_1.style.textAlign = "center";
    btn_1.style.border = "solid #272C2F";
    btn_1.style.borderWidth = "3px";
    btn_1.style.Color = "#272C2F";
    btn_1.style.fontSize = "16px";
    btn_1.style.fontWeight = "bolder";
    btn_1.style.borderRadius = "10px";
    btn_1.style.cursor ="pointer";
    btn_1.style.width ="120px";
    btn_1.style.height ="30px";

    btn_2.style.backgroundColor = "#D7D7D7";
    btn_2.style.textAlign = "center";
    btn_2.style.border = "none";
    btn_2.style.Color = "#272C2F";
    btn_2.style.fontSize = "16px";
    btn_2.style.fontWeight = "bolder";
    btn_2.style.borderRadius = "10px";
    btn_2.style.width ="120px";
    btn_2.style.height ="30px";

    btn_3.style.backgroundColor = "#D7D7D7";
    btn_3.style.textAlign = "center";
    btn_3.style.border = "none";
    btn_3.style.Color = "#272C2F";
    btn_3.style.fontSize = "16px";
    btn_3.style.fontWeight = "bolder";
    btn_3.style.borderRadius = "10px";
    btn_3.style.width ="120px";
    btn_3.style.height ="30px";

    btn_4.style.backgroundColor = "#D7D7D7";
    btn_4.style.textAlign = "center";
    btn_4.style.border = "none";
    btn_4.style.Color = "#272C2F";
    btn_4.style.fontSize = "16px";
    btn_4.style.fontWeight = "bolder";
    btn_4.style.borderRadius = "10px";
    btn_4.style.width ="120px";
    btn_4.style.height ="30px";

    btn_5.style.backgroundColor = "#D7D7D7";
    btn_5.style.textAlign = "center";
    btn_5.style.border = "none";
    btn_5.style.Color = "#272C2F";
    btn_5.style.fontSize = "16px";
    btn_5.style.fontWeight = "bolder";
    btn_5.style.borderRadius = "10px";
    btn_5.style.width ="120px";
    btn_5.style.height ="30px";

    btn_6.style.backgroundColor = "#D7D7D7";
    btn_6.style.textAlign = "center";
    btn_6.style.border = "none";
    btn_6.style.Color = "#272C2F";
    btn_6.style.fontSize = "16px";
    btn_6.style.fontWeight = "bolder";
    btn_6.style.borderRadius = "10px";
    btn_6.style.width ="120px";
    btn_6.style.height ="30px";
    
}

// Breakfast tab
function openBreakfast(){
    tab_1.style.transform = "translateX(100%)";
    tab_2.style.transform = "translateX(0)";
    tab_3.style.transform = "translateX(100%)";
    tab_4.style.transform = "translateX(100%)";
    tab_5.style.transform = "translateX(100%)";
    tab_6.style.transform = "translateX(100%)";

    btn_1.style.backgroundColor = "#D7D7D7";
    btn_1.style.textAlign = "center";
    btn_1.style.border = "none";
    btn_1.style.Color = "#272C2F";
    btn_1.style.fontSize = "16px";
    btn_1.style.fontWeight = "bolder";
    btn_1.style.borderRadius = "10px";
    btn_1.style.width ="120px";
    btn_1.style.height ="30px";

    btn_2.style.backgroundColor = "#ffffff";
    btn_2.style.textAlign = "center";
    btn_2.style.border = "solid #272C2F";
    btn_2.style.borderWidth = "3px";
    btn_2.style.Color = "#272C2F";
    btn_2.style.fontSize = "16px";
    btn_2.style.fontWeight = "bolder";
    btn_2.style.borderRadius = "10px";
    btn_2.style.cursor ="pointer";
    btn_2.style.width ="120px";
    btn_2.style.height ="30px";

    btn_3.style.backgroundColor = "#D7D7D7";
    btn_3.style.textAlign = "center";
    btn_3.style.border = "none";
    btn_3.style.Color = "#272C2F";
    btn_3.style.fontSize = "16px";
    btn_3.style.fontWeight = "bolder";
    btn_3.style.borderRadius = "10px";
    btn_3.style.width ="120px";
    btn_3.style.height ="30px";

    btn_4.style.backgroundColor = "#D7D7D7";
    btn_4.style.textAlign = "center";
    btn_4.style.border = "none";
    btn_4.style.Color = "#272C2F";
    btn_4.style.fontSize = "16px";
    btn_4.style.fontWeight = "bolder";
    btn_4.style.borderRadius = "10px";
    btn_4.style.width ="120px";
    btn_4.style.height ="30px";

    btn_5.style.backgroundColor = "#D7D7D7";
    btn_5.style.textAlign = "center";
    btn_5.style.border = "none";
    btn_5.style.Color = "#272C2F";
    btn_5.style.fontSize = "16px";
    btn_5.style.fontWeight = "bolder";
    btn_5.style.borderRadius = "10px";
    btn_5.style.width ="120px";
    btn_5.style.height ="30px";

    btn_6.style.backgroundColor = "#D7D7D7";
    btn_6.style.textAlign = "center";
    btn_6.style.border = "none";
    btn_6.style.Color = "#272C2F";
    btn_6.style.fontSize = "16px";
    btn_6.style.fontWeight = "bolder";
    btn_6.style.borderRadius = "10px";
    btn_6.style.width ="120px";
    btn_6.style.height ="30px";
}
// Tea_Break tab
function openTea_Break(){
    tab_1.style.transform = "translateX(100%)";
    tab_2.style.transform = "translateX(100%)";
    tab_3.style.transform = "translateX(0)";
    tab_4.style.transform = "translateX(100%)";
    tab_5.style.transform = "translateX(100%)";
    tab_6.style.transform = "translateX(100%)";


    btn_1.style.backgroundColor = "#D7D7D7";
    btn_1.style.textAlign = "center";
    btn_1.style.border = "none";
    btn_1.style.Color = "#272C2F";
    btn_1.style.fontSize = "16px";
    btn_1.style.fontWeight = "bolder";
    btn_1.style.borderRadius = "10px";
    btn_1.style.width ="120px";
    btn_1.style.height ="30px";

    btn_2.style.backgroundColor = "#D7D7D7";
    btn_2.style.textAlign = "center";
    btn_2.style.border = "none";
    btn_2.style.Color = "#272C2F";
    btn_2.style.fontSize = "16px";
    btn_2.style.fontWeight = "bolder";
    btn_2.style.borderRadius = "10px";
    btn_2.style.width ="120px";
    btn_2.style.height ="30px";

    btn_3.style.backgroundColor = "#ffffff";
    btn_3.style.textAlign = "center";
    btn_3.style.border = "solid #272C2F";
    btn_3.style.borderWidth = "3px";
    btn_3.style.Color = "#272C2F";
    btn_3.style.fontSize = "16px";
    btn_3.style.fontWeight = "bolder";
    btn_3.style.borderRadius = "10px";
    btn_3.style.cursor ="pointer";
    btn_3.style.width ="120px";
    btn_3.style.height ="30px";

    btn_4.style.backgroundColor = "#D7D7D7";
    btn_4.style.textAlign = "center";
    btn_4.style.border = "none";
    btn_4.style.Color = "#272C2F";
    btn_4.style.fontSize = "16px";
    btn_4.style.fontWeight = "bolder";
    btn_4.style.borderRadius = "10px";
    btn_4.style.width ="120px";
    btn_4.style.height ="30px";

    btn_5.style.backgroundColor = "#D7D7D7";
    btn_5.style.textAlign = "center";
    btn_5.style.border = "none";
    btn_5.style.Color = "#272C2F";
    btn_5.style.fontSize = "16px";
    btn_5.style.fontWeight = "bolder";
    btn_5.style.borderRadius = "10px";
    btn_5.style.width ="120px";
    btn_5.style.height ="30px";

    btn_6.style.backgroundColor = "#D7D7D7";
    btn_6.style.textAlign = "center";
    btn_6.style.border = "none";
    btn_6.style.Color = "#272C2F";
    btn_6.style.fontSize = "16px";
    btn_6.style.fontWeight = "bolder";
    btn_6.style.borderRadius = "10px";
    btn_6.style.width ="120px";
    btn_6.style.height ="30px";
}

// Lunch tab
function openLunch(){
    tab_1.style.transform = "translateX(100%)";
    tab_2.style.transform = "translateX(100%)";
    tab_3.style.transform = "translateX(100%)";
    tab_4.style.transform = "translateX(0)";
    tab_5.style.transform = "translateX(100%)";
    tab_6.style.transform = "translateX(100%)";

    btn_1.style.backgroundColor = "#D7D7D7";
    btn_1.style.textAlign = "center";
    btn_1.style.border = "none";
    btn_1.style.Color = "#272C2F";
    btn_1.style.fontSize = "16px";
    btn_1.style.fontWeight = "bolder";
    btn_1.style.borderRadius = "10px";
    btn_1.style.width ="120px";
    btn_1.style.height ="30px";

    btn_2.style.backgroundColor = "#D7D7D7";
    btn_2.style.textAlign = "center";
    btn_2.style.border = "none";
    btn_2.style.Color = "#272C2F";
    btn_2.style.fontSize = "16px";
    btn_2.style.fontWeight = "bolder";
    btn_2.style.borderRadius = "10px";
    btn_2.style.width ="120px";
    btn_2.style.height ="30px";

    btn_3.style.backgroundColor = "#D7D7D7";
    btn_3.style.textAlign = "center";
    btn_3.style.border = "none";
    btn_3.style.Color = "#272C2F";
    btn_3.style.fontSize = "16px";
    btn_3.style.fontWeight = "bolder";
    btn_3.style.borderRadius = "10px";
    btn_3.style.width ="120px";
    btn_3.style.height ="30px";

    btn_4.style.backgroundColor = "#ffffff";
    btn_4.style.textAlign = "center";
    btn_4.style.border = "solid #272C2F";
    btn_4.style.borderWidth = "3px";
    btn_4.style.Color = "#272C2F";
    btn_4.style.fontSize = "16px";
    btn_4.style.fontWeight = "bolder";
    btn_4.style.borderRadius = "10px";
    btn_4.style.cursor ="pointer";
    btn_4.style.width ="120px";
    btn_4.style.height ="30px";

    btn_5.style.backgroundColor = "#D7D7D7";
    btn_5.style.textAlign = "center";
    btn_5.style.border = "none";
    btn_5.style.Color = "#272C2F";
    btn_5.style.fontSize = "16px";
    btn_5.style.fontWeight = "bolder";
    btn_5.style.borderRadius = "10px";
    btn_5.style.width ="120px";
    btn_5.style.height ="30px";

    btn_6.style.backgroundColor = "#D7D7D7";
    btn_6.style.textAlign = "center";
    btn_6.style.border = "none";
    btn_6.style.Color = "#272C2F";
    btn_6.style.fontSize = "16px";
    btn_6.style.fontWeight = "bolder";
    btn_6.style.borderRadius = "10px";
    btn_6.style.width ="120px";
    btn_6.style.height ="30px";
}


// Snacks tab
function openSnacks(){
    tab_1.style.transform = "translateX(100%)";
    tab_2.style.transform = "translateX(100%)";
    tab_3.style.transform = "translateX(100%)";
    tab_4.style.transform = "translateX(100%)";
    tab_5.style.transform = "translateX(0)";
    tab_6.style.transform = "translateX(100%)";


    btn_1.style.backgroundColor = "#D7D7D7";
    btn_1.style.textAlign = "center";
    btn_1.style.border = "none";
    btn_1.style.Color = "#272C2F";
    btn_1.style.fontSize = "16px";
    btn_1.style.fontWeight = "bolder";
    btn_1.style.borderRadius = "10px";
    btn_1.style.width ="120px";
    btn_1.style.height ="30px";

    btn_2.style.backgroundColor = "#D7D7D7";
    btn_2.style.textAlign = "center";
    btn_2.style.border = "none";
    btn_2.style.Color = "#272C2F";
    btn_2.style.fontSize = "16px";
    btn_2.style.fontWeight = "bolder";
    btn_2.style.borderRadius = "10px";
    btn_2.style.width ="120px";
    btn_2.style.height ="30px";

    btn_3.style.backgroundColor = "#D7D7D7";
    btn_3.style.textAlign = "center";
    btn_3.style.border = "none";
    btn_3.style.Color = "#272C2F";
    btn_3.style.fontSize = "16px";
    btn_3.style.fontWeight = "bolder";
    btn_3.style.borderRadius = "10px";
    btn_3.style.width ="120px";
    btn_3.style.height ="30px";

    btn_4.style.backgroundColor = "#D7D7D7";
    btn_4.style.textAlign = "center";
    btn_4.style.border = "none";
    btn_4.style.Color = "#272C2F";
    btn_4.style.fontSize = "16px";
    btn_4.style.fontWeight = "bolder";
    btn_4.style.borderRadius = "10px";
    btn_4.style.width ="120px";
    btn_4.style.height ="30px";

    btn_5.style.backgroundColor = "#ffffff";
    btn_5.style.textAlign = "center";
    btn_5.style.border = "solid #272C2F";
    btn_5.style.borderWidth = "3px";
    btn_5.style.Color = "#272C2F";
    btn_5.style.fontSize = "16px";
    btn_5.style.fontWeight = "bolder";
    btn_5.style.borderRadius = "10px";
    btn_5.style.cursor ="pointer";
    btn_5.style.width ="120px";
    btn_5.style.height ="30px";

    btn_6.style.backgroundColor = "#D7D7D7";
    btn_6.style.textAlign = "center";
    btn_6.style.border = "none";
    btn_6.style.Color = "#272C2F";
    btn_6.style.fontSize = "16px";
    btn_6.style.fontWeight = "bolder";
    btn_6.style.borderRadius = "10px";
    btn_6.style.width ="120px";
    btn_6.style.height ="30px";
}


// Dinner tab
function openDinner(){
    tab_1.style.transform = "translateX(100%)";
    tab_2.style.transform = "translateX(100%)";
    tab_3.style.transform = "translateX(100%)";
    tab_4.style.transform = "translateX(100%)";
    tab_5.style.transform = "translateX(100%)";
    tab_6.style.transform = "translateX(0)";


    btn_1.style.backgroundColor = "#D7D7D7";
    btn_1.style.textAlign = "center";
    btn_1.style.border = "none";
    btn_1.style.Color = "#272C2F";
    btn_1.style.fontSize = "16px";
    btn_1.style.fontWeight = "bolder";
    btn_1.style.borderRadius = "10px";
    btn_1.style.width ="120px";
    btn_1.style.height ="30px";

    btn_2.style.backgroundColor = "#D7D7D7";
    btn_2.style.textAlign = "center";
    btn_2.style.border = "none";
    btn_2.style.Color = "#272C2F";
    btn_2.style.fontSize = "16px";
    btn_2.style.fontWeight = "bolder";
    btn_2.style.borderRadius = "10px";
    btn_2.style.width ="120px";
    btn_2.style.height ="30px";

    btn_3.style.backgroundColor = "#D7D7D7";
    btn_3.style.textAlign = "center";
    btn_3.style.border = "none";
    btn_3.style.Color = "#272C2F";
    btn_3.style.fontSize = "16px";
    btn_3.style.fontWeight = "bolder";
    btn_3.style.borderRadius = "10px";
    btn_3.style.width ="120px";
    btn_3.style.height ="30px";

    btn_4.style.backgroundColor = "#D7D7D7";
    btn_4.style.textAlign = "center";
    btn_4.style.border = "none";
    btn_4.style.Color = "#272C2F";
    btn_4.style.fontSize = "16px";
    btn_4.style.fontWeight = "bolder";
    btn_4.style.borderRadius = "10px";
    btn_4.style.width ="120px";
    btn_4.style.height ="30px";

    btn_5.style.backgroundColor = "#D7D7D7";
    btn_5.style.textAlign = "center";
    btn_5.style.border = "none";
    btn_5.style.Color = "#272C2F";
    btn_5.style.fontSize = "16px";
    btn_5.style.fontWeight = "bolder";
    btn_5.style.borderRadius = "10px";
    btn_5.style.width ="120px";
    btn_5.style.height ="30px";

    btn_6.style.backgroundColor = "#ffffff";
    btn_6.style.textAlign = "center";
    btn_6.style.border = "solid #272C2F";
    btn_6.style.borderWidth = "3px";
    btn_6.style.Color = "#272C2F";
    btn_6.style.fontSize = "16px";
    btn_6.style.fontWeight = "bolder";
    btn_6.style.borderRadius = "10px";
    btn_6.style.cursor ="pointer";
    btn_6.style.width ="120px";
    btn_6.style.height ="30px";
}


// Handle Sort Interactions
function sortMenuItems() {
    const sortValue = document.getElementById('sort').value;
    const xhr = new XMLHttpRequest();
    xhr.open('GET', 'sort_menu.php?sort=' + sortValue, true);
    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            document.querySelector('.menu_card_container').innerHTML = xhr.responseText;
        }
    };
    xhr.send();
}