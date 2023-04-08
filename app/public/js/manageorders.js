function convertTableToCSV() {
    var checkboxes = document.querySelectorAll('input[type="checkbox"]');
    var headers = [];
    var data = [];

    for (var i = 0; i < checkboxes.length; i++) {
        if (checkboxes[i].checked) {
            headers.push(document.getElementsByTagName('th')[i].innerText); // getting table head tags 
            var columnData = [];
            var rows = document.getElementsByTagName('tr');
            for (var j = 1; j < rows.length; j++) { // iterating through rows
                var cells = rows[j].getElementsByTagName('p');
                let cellValue = cells[i].innerText;
                if (cells[i].innerText.indexOf(',') > -1) { // Check if the column contains a comma
                    cellValue = '"' + cells[i].innerText + '"'; // Add double quotes to the column value
                }
                columnData.push(cellValue);
            }
            data.push(columnData);
        }
    }
    if (data.length == 0) {
        document.getElementById('statusMessage').classList.replace("text-success", "text-danger");
        document.getElementById('statusMessage').textContent = "Please select at least one column to export";
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
    let encodedUri = encodeURI(csvContent);
    let link = document.createElement("a");
    link.setAttribute("href", encodedUri);
    link.setAttribute("download", "orders.csv");
    document.body.appendChild(link);
    link.click();
}


let dropdownMenu = document.getElementsByClassName("dropdown-menu");
for (let i = 0; i < dropdownMenu.length; i++) {
    dropdownMenu[i].addEventListener('click', function (event) {
        var selectedElement = event.target;
        let orderId = dropdownMenu[i].id;
        let newStatus = selectedElement.textContent;
        fetch(`/api/cms/changeOrderStatus`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({
                id: orderId,
                status: newStatus.toLowerCase()
            })
        }).then(response => response.json())
            .then(data => {
                if (data == true)
                    location.reload();
            }).catch(error => console.error(error));
    });
}

const downloadInvoice = (invoiceNr) => {
    const anchor = document.createElement('a');
    let filename = `invoice-${invoiceNr}`;
    const filePath = `../invoices/${filename}.pdf`;

    fetch(filePath)
        .then(response => response.blob())
        .then(blob => {
            const blobUrl = URL.createObjectURL(blob);
            const anchor = document.createElement('a');
            anchor.href = blobUrl;
            anchor.download = filename + '.pdf';

            anchor.click();
        });
}

