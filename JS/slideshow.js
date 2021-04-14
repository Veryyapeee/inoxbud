var slideNumber = 0;

openSlide();

function openSlide() {
  var i;

  var slides = document.getElementsByClassName("slide");

  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";
  }

  slideNumber++;

  if (slideNumber > slides.length) {
    slideNumber = 1;
  }

  slides[slideNumber - 1].style.display = "block";

  setTimeout(openSlide, 6000);
}
