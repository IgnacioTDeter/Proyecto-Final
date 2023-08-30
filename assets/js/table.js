let currentPage = 1;
const rowsPerPage = 10;

function paginateTable(pageNumber) {
  currentPage = pageNumber;
  const table = document.querySelector("table");
  const tbody = table.querySelector("tbody");
  const rows = tbody.getElementsByTagName("tr");

  const startIndex = (pageNumber - 1) * rowsPerPage;
  const endIndex = pageNumber * rowsPerPage;

  for (let i = 0; i < rows.length; i++) {
    rows[i].style.display = "none";
  }

  for (let j = startIndex; j < endIndex && j < rows.length; j++) {
    rows[j].style.display = "table-row";
  }

  const btnPrevious = document.getElementById("btnPrevious");
  const btnNext = document.getElementById("btnNext");
  btnPrevious.style.display = currentPage === 1 ? "none" : "inline-block";
  btnNext.style.display = endIndex >= rows.length ? "none" : "inline-block";

  updatePageNumbers();
}

function previousPage() {
  if (currentPage > 1) {
    currentPage--;
    paginateTable(currentPage);
  }
}

function nextPage() {
  const table = document.querySelector("table");
  const tbody = table.querySelector("tbody");
  const rows = tbody.getElementsByTagName("tr");

  if (currentPage * rowsPerPage < rows.length) {
    currentPage++;
    paginateTable(currentPage);
  }
}

function updatePageNumbers() {
  const table = document.querySelector("table");
  const tbody = table.querySelector("tbody");
  const totalRows = tbody.getElementsByTagName("tr").length;
  const totalPages = Math.ceil(totalRows / rowsPerPage);

  const pageNumbersContainer = document.getElementById("pageNumbers");
  pageNumbersContainer.innerHTML = "";

  for (let i = 1; i <= totalPages; i++) {
    const pageNumber = document.createElement("button");
    pageNumber.textContent = i;
    pageNumber.addEventListener("click", function () {
      paginateTable(i);
    });

    if (i === currentPage) {
      pageNumber.classList.add("active");
    }

    pageNumbersContainer.appendChild(pageNumber);
  }
}

document.addEventListener("DOMContentLoaded", function () {
  paginateTable(currentPage);
});


/**/