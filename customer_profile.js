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