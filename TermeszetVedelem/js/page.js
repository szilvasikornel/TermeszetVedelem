let currentPage = 1;
const totalPages = 3;
const pages = document.querySelectorAll('.page');
const pageNumberElement = document.getElementById('page-number');

function showPage(pageNumber) {
    pages.forEach((page, index) => {
        page.style.display = (index + 1 === pageNumber) ? 'block' : 'none';
    });
    updatePageNumber(pageNumber);
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

// Inicializálás: az első oldalt jelenítse meg
showPage(currentPage);