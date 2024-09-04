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


// star rating

const allStar = document.querySelectorAll('.ratingStars .fa-star')
const ratingValue = document.querySelector('.ratingStars input')

allStar.forEach((item, idx)=> {
	item.addEventListener('click', function () {
		let click = 0
		ratingValue.value = idx + 1

		allStar.forEach(i=> {
			i.classList.replace('fa-solid', 'fa-regular')
			i.classList.remove('active')
		})
		for(let i=0; i<allStar.length; i++) {
			if(i <= idx) {
				allStar[i].classList.replace('fa-regular', 'fa-solid')
				allStar[i].classList.add('active')
			} else {
				allStar[i].style.setProperty('--i', click)
				click++
			}
		}
	})
})

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
  document.getElementById("leadershipSection").classList.toggle("darkLeadership");
  document.getElementById("owner").classList.toggle("darkLeader");
  document.getElementById("darkmode").classList.toggle("darkVisionMission");
  document.getElementById("contactUs").classList.toggle("darkContact");
})
