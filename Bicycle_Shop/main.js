//Swiper
var swiper = new Swiper('.swiper-container', {
	direction: 'horizontal',
	speed: 400,
	spaceBetween: 20,
	effect: 'coverflow',
	grabCursor: true,
	centeredSlides: true,
	slidesPerView: 'auto',
	coverflowEffect: {
		rotate: 45,
		stretch: 0,
		depth: 250,
		modifier: 1,
		slideShadows: true,
	},
	pagination: {
		el: '.swiper-pagination',
		clickable: true,
	},
});

//page jump
$(function() {
	$('a[href*="#"]:not([href="#"])').click(function() {
		if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname)
		{
			var target = $(this.hash);
			target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
			if (target.length) {
				$('html, body').animate({
					scrollTop: target.offset().top 
				}, 1000);
				return false;
			}
		}
	});
});


//NAVIGATION BAR
let navbar = document.getElementById("navbar")
let sticky = navbar.offsetTop;
function position(){
	if(window.pageYOffset >= sticky){
		navbar.classList.add("fix-navbar");
	}else{
		navbar.classList.remove("fix-navbar");
	}
}
window.onscroll = function(){
	position();
}


// MODAL
//get modal
var modal = document.getElementById('simpleModal');
//get open modal button
var modalBtn = document.getElementById('modalBtn');
//get close button
var closeBtn = document.getElementById('closeBtn');

//listen for open click
modalBtn.addEventListener('click', openModal);
//listen for close click
closeBtn.addEventListener('click', closeModal);
//listen for outside click
window.addEventListener('click', clickOutside);

//function to open modal
function openModal(){
	modal.style.display = 'block';
}
//function to close modal
function closeModal(){
	modal.style.display = 'none';
}
//function to close modal if clicked outside
function clickOutside(e){
	if(e.target == modal){
		modal.style.display = 'none';
	}
}

//FOOTER
