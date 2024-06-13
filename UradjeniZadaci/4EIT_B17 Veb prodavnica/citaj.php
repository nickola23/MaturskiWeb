<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="./css/stilizaccija.css">
<title>TV Program</title>
<style>

</style>
</head>
<body>

<div class="kontejner">
   
    <nav>
        <ul>
            <li><a href="index.php">Zadatak 14</a></li>
            <li><a id="mica" href="index.php">TV Program</a></li>
        </ul>
    </nav>
</div>


<!-- Container for the dropdowns -->
<div id="dropdownContainer">
    <select id="fileDropdown" onchange="fetchDataAndPopulateTable()"></select>
    <select id="typeDropdown"></select> <!-- Dropdown for types -->
    <button onclick="filterTableByType()">Pronađi</button>
</div>
<hr>
<!-- Table to display TV program -->
<table id="tvProgramTable">
    <thead>
        <tr>
            <th>Vreme</th>
            <th>Naziv emisije</th>
            <th>Tip emisije</th>
            <th>Slika</th>
        </tr>
    </thead>
    <tbody id="tvProgramBody"></tbody>
</table>
<div class="dole">
  <a href="index.php" class="active">Program</a>
  <a href="../html/kontakt.html">Kontakt</a>
  <a href="./html/uputstvo.html">Korisnicko uputstvo</a>
</div>
<script>
// Function to fetch data and populate the table
function fetchDataAndPopulateTable() {
    const selectedFileName = document.getElementById('fileDropdown').value;

    // Fetch content of selected file
    fetch(selectedFileName)
    .then(response => response.text())
    .then(text => {
        // Populate the table with program data
        const lines = text.split('\n');
        const tableBody = document.getElementById('tvProgramBody');
        tableBody.innerHTML = ''; // Clear the table body
        lines.forEach(line => {
            const parts = line.split('|');
            if (parts.length >= 4) {
                const time = parts[0].trim();
                const name = parts[1].trim();
                const type = parts[2].trim();
                const image = parts[3].trim();
                const row = `<tr>
                                <td>${time}</td>
                                <td>${name}</td>
                                <td>${type}</td>
                                <td><img src="${image}" alt="${name}" width="50"></td>
                            </tr>`;
                tableBody.innerHTML += row;
            }
        });
        // Populate the type dropdown with unique types
        populateTypeDropdown();
    })
    .catch(error => console.error('Error fetching file:', error));
}

// Function to fetch file names and populate the file dropdown
function fetchFileNamesAndPopulateDropdown() {
    <?php
    $folderPath = './Prilog/'; // Putanja do direktorijuma sa datotekama
    $fileNames = array_diff(scandir($folderPath), array('.', '..'));
    ?>

    // Populate the file dropdown
    const fileNames = <?php echo json_encode(array_values($fileNames)); ?>;
    const dropdown = document.getElementById('fileDropdown');
    dropdown.innerHTML = ''; // Clear the dropdown
    fileNames.forEach(fileName => {
        const option = document.createElement('option');
        option.text = fileName; // Display the file name
        option.value = './Prilog/' + fileName; // Set the file path as value
        dropdown.add(option);
    });

    // Fetch data for the initially selected file
    fetchDataAndPopulateTable();
}

// Function to populate the type dropdown
function populateTypeDropdown() {
    const table = document.getElementById('tvProgramTable');
    const typeDropdown = document.getElementById('typeDropdown');
    const types = new Set();

    // Iterate over rows in table and collect unique types
    for (let i = 1; i < table.rows.length; i++) {
        const type = table.rows[i].cells[2].innerText;
        types.add(type);
    }

    // Populate the type dropdown
    typeDropdown.innerHTML = '';
    types.forEach(type => {
        const option = document.createElement('option');
        option.text = type;
        typeDropdown.add(option);
    });
}

// Function to filter table by selected type
function filterTableByType() {
    const selectedType = document.getElementById('typeDropdown').value;
    const table = document.getElementById('tvProgramTable');

    // Iterate over rows in table and show/hide based on selected type
    for (let i = 1; i < table.rows.length; i++) {
        const type = table.rows[i].cells[2].innerText;
        if (type === selectedType || selectedType === 'Svi') {
            table.rows[i].style.display = '';
        } else {
            table.rows[i].style.display = 'none';
        }
    }
}

// Call the function to populate the file dropdown when the page loads
document.addEventListener('DOMContentLoaded', fetchFileNamesAndPopulateDropdown);
</script>

</body>
</html>
