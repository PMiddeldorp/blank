// modal.js
import { gsap } from "gsap";
import { trapFocus } from "../helpers/index.js";

// constants
const wrapper = document.getElementById('wrapper');
const modal = document.getElementById('modal');
const closeModalButton = document.getElementById('close-modal');
const modalBlur = document.getElementById('modal-blur');

// variables
let openModalButtons = document.getElementsByClassName("open-modal");
let modalTrigger;

const modalTimeline = gsap.timeline({
	paused:true
});
modalTimeline.to(modal, {
	ease: "Power4.easeInOut",
	duration: .2,
	autoAlpha: 1,
});
 modalTimeline.to(modalBlur, {
	ease: "Power4.easeInOut",
	duration: .2,
	delay: -.2,
	autoAlpha: 1,
});

// open modal
function openModal(button){

	// remove scroll from <html>
	document.documentElement.classList.add('no-scroll');

	// show modal 
	modalTimeline.play().timeScale(1);

	// set trigger to focus on when closing the modal
	modalTrigger = button.target;

	// make wrapper hidden
	wrapper.setAttribute('aria-hidden', 'true');
	wrapper.setAttribute('tab-index', '-1');

	// show modal
	modal.setAttribute('tab-index', '0');
	modal.setAttribute('aria-hidden', 'false');

	// trap focus in modal
	setTimeout(() => {
		trapFocus(modal);
	}, "200"); // time to show modal
}


// close modal
function closeModal(){

	modalTimeline.play().timeScale(-1);

	// add scroll from <html>
	document.documentElement.classList.remove('no-scroll');

	// hide modal
	modal.setAttribute('tab-index', '-1');
	modal.setAttribute('aria-hidden', 'true');

	// make wrapper visible and focusable
	wrapper.setAttribute('aria-hidden', 'false');
	wrapper.setAttribute('tab-index', '0');

	// set focus to modal trigger (button)
	modalTrigger.focus();

}


// open modal button event listeners
for (var i = 0; i < openModalButtons.length; i++) {
  openModalButtons[i].addEventListener('click', openModal, true);
}


// close modal button event listener
closeModalButton.onclick = function(){
	closeModal();
};

// Hide nav on keydown Escape
document.addEventListener('keyup', e => {
	if (e.code === 'Escape') {
	  closeModal();
	}
});