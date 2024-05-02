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
  document.getElementById("heroForm").classList.toggle("darkHeader");
  document.getElementById("whiteback").classList.toggle("darkHeader");
  const images = document.getElementsByClassName("imagesB");
  for (let i = 0; i < images.length; i++) {
  images[i].classList.add("darkHeader");
}
const comment = document.getElementsByClassName("commentLine");
for (let i = 0; i < comment.length; i++) {
comment[i].classList.add("darkHeader");
}
document.getElementById("rating").classList.toggle("darkRating");

const commentSection = document.querySelector(".commentSection");
if (commentSection.classList.contains("darkMode")) {
	commentSection.classList.remove("darkMode");
} else {
	commentSection.classList.add("darkMode");
}
document.getElementById("sectionHow").classList.toggle("darkSectionHow");
})
