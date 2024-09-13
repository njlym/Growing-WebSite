/*slide show in about us*/
{
  let slideIndex = 1;
  showSlides();

  function showSlides() {
    let i;
    let slides = document.querySelectorAll('.mySlides');

    if (slideIndex >= slides.length) {
      slideIndex = 0;
    } else if (slideIndex < 0) {
      slideIndex = slides.length - 1;
    }

    slides.forEach((slide) => {
      slide.style.display = 'none';
    });

    slides[slideIndex].style.display = 'block';
  }

  function plusSlides(n) {
    slideIndex += n;
    showSlides();
  }

  function prevSlide() {
    plusSlides(-1);
  }

  function nextSlide() {
    plusSlides(1);
  }

  // Call prevSlide to display the previous slide
  prevSlide();
}




