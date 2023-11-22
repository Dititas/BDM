let sidebar = document.querySelector(".sidebar");
let sidebarBtn = document.querySelector(".bx-menu");

sidebarBtn.addEventListener("click", () => {
	sidebar.classList.toggle("close");
});
// Función para inicializar el carrusel
$(document).ready(function () {

	// Inicializar los carruseles

	function initCarousel(carouselId) {

		var carousel = new bootstrap.Carousel(document.getElementById(carouselId), {
			interval: false,
		});
		
		var carouselWidth = $(`#${carouselId} .carousel-inner`)[0].scrollWidth;
		var cardWidth = $(`#${carouselId} .carousel-item`).width();
		var scrollPosition = 0;

		$(`#${carouselId} .carousel-control-next`).on("click", function () {
			if (scrollPosition < carouselWidth - cardWidth * 4) {
				scrollPosition += cardWidth;
			} else {
				scrollPosition = 0;
			}
			$(`#${carouselId} .carousel-inner`).animate(
				{ scrollLeft: scrollPosition },
				600
			);
		});

		$(`#${carouselId} .carousel-control-prev`).on("click", function () {
			if (scrollPosition > 0) {
				scrollPosition -= cardWidth;
			} else {
				scrollPosition = carouselWidth - cardWidth * 4;
			}
			$(`#${carouselId} .carousel-inner`).animate(
				{ scrollLeft: scrollPosition },
				600
			);
		});
	}
	initCarousel("carouselLastProducts");
	initCarousel("carouselRecommended");
	initCarousel("carouselMostSelled");

});
