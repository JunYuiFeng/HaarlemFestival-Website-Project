function convertTableToCSV() {
    var checkboxes = document.querySelectorAll('input[type="checkbox"]');
    var headers = [];
    var data = [];

    for (var i = 0; i < checkboxes.length; i++) {
        if (checkboxes[i].checked) {
            headers.push(document.getElementsByTagName('th')[i + 1].innerText); // getting table head tags starting from second column 
            var columnData = [];
            var rows = document.getElementsByTagName('tr');
            for (var j = 1; j < rows.length; j++) { // iterating through rows
                var cells = rows[j].getElementsByTagName('td');
                columnData.push(cells[i + 1].innerText);
            }
            data.push(columnData);
        }
    }
    if (data.length == 0) {
        document.getElementById('statusMessage').classList.replace("text-success", "text-danger");
        document.getElementById('statusMessage').textContent = "Please select at least one column to export";
        console.log("data");
        return;
    }

    var csvContent = "data:text/csv;charset=utf-8,";
    csvContent += headers.join(',') + '\n';
    data[0].forEach((col, i) => {
        data.forEach(function (row) {
            csvContent += row[i] + ',';
        });
        csvContent += '\n';
    });
    downloadCSVFile(csvContent);
    document.getElementById('statusMessage').textContent = "Exported successfully";
    document.getElementById('statusMessage').classList.replace("text-danger", "text-success");
}

function downloadCSVFile(csvContent) {
    var encodedUri = encodeURI(csvContent);
    var link = document.createElement("a");
    link.setAttribute("href", encodedUri);
    link.setAttribute("download", "orders.csv");
    document.body.appendChild(link);
    link.click();
}