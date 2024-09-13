const searchInput = document.getElementById("search-input");
const dataTable = document.getElementById("data-table");
const tableRows = dataTable.getElementsByTagName("tr");
  searchInput.addEventListener("keyup", function () {
    const searchValue = searchInput.value.toLowerCase();

    for (let i = 1; i < tableRows.length; i++) {
      const rowData = tableRows[i].getElementsByTagName("td");
      let matchFound = false;

      for (let j = 0; j < rowData.length; j++) {
        const cellData = rowData[j].textContent.toLowerCase();
        if (cellData.includes(searchValue)) {
          matchFound = true;
          break;
        }
      }

      if (matchFound) {
        tableRows[i].style.display = "";
      } else {
        tableRows[i].style.display = "none";
      }
    }
  });