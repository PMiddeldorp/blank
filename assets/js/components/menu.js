// menu.js
import { trapFocus } from "../helpers/index.js";

const hamburger = document.getElementById('hamburger');
const nav = document.getElementById('nav');

// Toggle aria-expanded attribute
hamburger.addEventListener('click', e => {

  // Get the aria-expanded attribute and check if the value is "false"
  const isOpen = hamburger.getAttribute('aria-expanded') === "false";
  // Change the aria-expanded value accordingly
  hamburger.setAttribute('aria-expanded', isOpen);

  // toggle nav
  if (isOpen) {
    nav.style.display = "block";

    // trap focus in nav
    trapFocus(nav);

  } else {
    nav.style.display = "none";
  }

});


// Hide nav on keydown Escape
nav.addEventListener('keyup', e => {
  if (e.code === 'Escape') {
    nav.style.display = "none";
    hamburger.setAttribute('aria-expanded', false);
  }
});
