const yearEl = document.querySelector(".year");

const now = new Date();

yearEl.textContent = `${now.getFullYear()}`;
