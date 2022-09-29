// modal.js
import { trapFocus } from "../helpers/index.js";

// constants
const wrapper = document.getElementById('wrapper');
const modal = document.getElementById('modal');
const closeModalButton = document.getElementById('close-modal');
const modalTitle = document.getElementById('modal-title');

// variables
let openModalButtons = document.getElementsByClassName("open-modal");
let modalTrigger;


// open modal
function openModal(button){

	// set trigger to focus on when closing the modal
	modalTrigger = button.target;

	// make wrapper hidden
	wrapper.setAttribute('aria-hidden', 'true');
	wrapper.setAttribute('tab-index', '-1');

	// show modal
	modal.style.display = "flex";
	modal.setAttribute('tab-index', '0');
	modal.setAttribute('aria-hidden', 'false');

	// trap focus in modal
	trapFocus(modal);

}


// close modal
function closeModal(){

	// hide modal
	modal.style.display = "none";
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
