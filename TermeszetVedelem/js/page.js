let currentPage = 1;
const totalPages = 3;
const pages = document.querySelectorAll('.page');
const pageNumberElement = document.getElementById('page-number');
const prevButton = document.querySelector('.prev');
const nextButton = document.querySelector('.next');

function showPage(pageNumber) {
    // Oldalak megjelenítése
    pages.forEach((page, index) => {
        page.style.display = (index + 1 === pageNumber) ? 'block' : 'none';
    });
    updatePageNumber(pageNumber);
    updateButtonState(pageNumber);
}

function changePage(direction) {
    const newPage = currentPage + direction;
    if (newPage >= 1 && newPage <= totalPages) {
        currentPage = newPage;
        showPage(currentPage);
    }
}

function updatePageNumber(pageNumber) {
    pageNumberElement.textContent = `${pageNumber}/${totalPages}`;
}

function updateButtonState(pageNumber) {
    // Előző gomb állapota
    if (pageNumber === 1) {
        prevButton.disabled = true;  // Az első oldalon nem kattintható
    } else {
        prevButton.disabled = false; // Egyébként kattintható
    }

    // Következő gomb állapota
    if (pageNumber === totalPages) {
        nextButton.disabled = true;  // Az utolsó oldalon nem kattintható
    } else {
        nextButton.disabled = false; // Egyébként kattintható
    }
}

// Inicializálás: az első oldalt jelenítse meg
showPage(currentPage);
