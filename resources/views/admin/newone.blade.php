<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DataTable with Images in Excel</title>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/exceljs/4.2.1/exceljs.min.js"></script>
    <style>
        img {
            width: 50px;
            height: auto;
        }
    </style>
</head>
<body>

<div class="container">
    <div style="overflow-x: auto;"> <!-- Add a wrapper with overflow -->
<table border="1">
    <thead>
        <tr>
            <th rowspan="4">S.No</th>
            <th rowspan="4">Date of Received</th>
            <th rowspan="4">Module Model</th>
            <th rowspan="4">Customer Part Code</th>
            <th rowspan="4">Module Barcode</th>
            <th rowspan="4">DC Single Board Barcode</th>
            <th rowspan="4">PFC Board Barcode</th>
            <th rowspan="4">Repair Information</th>
            <th colspan="2" rowspan="2">Program Upgrade (Firmware Version)</th>
            <th colspan="4">Module Status</th>
            <th rowspan="4">Remark</th>
        </tr>
        <tr>
            <th colspan="2">Voltage VDC (value)</th>
            <th colspan="2">Current Amp (value)</th>
        </tr>
        <tr>
            <th>DC</th>
            <th>PFC</th>
            <th>Low</th>
            <th>High</th>
            <th>Low</th>
            <th>High</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>1</td>
            <td>2024-10-01</td>
            <td>Model A</td>
            <td>12345</td>
            <td>BC123456</td>
            <td>DC123456</td>
            <td>PFC123456</td>
            <td>Repaired Circuit</td>
            <td>v1.2.3</td>
            <td>v1.2.3</td>
            <td>12V</td>
            <td>15V</td>
            <td>5A</td>
            <td>10A</td>
            <td>No issues</td>
        </tr>
        <tr>
            <td>2</td>
            <td>2024-10-02</td>
            <td>Model B</td>
            <td>67890</td>
            <td>BC654321</td>
            <td>DC654321</td>
            <td>PFC654321</td>
            <td>Replaced Component</td>
            <td>v2.0.1</td>
            <td>v2.0.1</td>
            <td>24V</td>
            <td>30V</td>
            <td>3A</td>
            <td>6A</td>
            <td>Pending verification</td>
        </tr>
        <tr>
            <td>3</td>
            <td>2024-10-03</td>
            <td>Model C</td>
            <td>54321</td>
            <td>BC789012</td>
            <td>DC789012</td>
            <td>PFC789012</td>
            <td>Functional Test</td>
            <td>v1.0.0</td>
            <td>v1.0.0</td>
            <td>15V</td>
            <td>20V</td>
            <td>2A</td>
            <td>5A</td>
            <td>All checks passed</td>
        </tr>
    </tbody>
</table>


    </div>
</div>

<button id="download">Download Excel</button>

<script>
$(document).ready(function() {
    $('#example').DataTable({
        scrollY: '300px', // Set the height of the scrollable area
        scrollCollapse: true, // Allow the table to reduce its height if there are fewer rows
        paging: true // Enable pagination if needed
    });

    $('#download').click(async function() {
        const workbook = new ExcelJS.Workbook();
        const sheet = workbook.addWorksheet('Data');

        // Set headers
        sheet.addRow(['ID', 'Name', 'Age', 'City', 'Position', 'Image']);

        // Loop through the rows of the table
        const imagePromises = [];

        $('#example tbody tr').each(function(rowIndex) {
            const id = $(this).find('td').eq(0).text();
            const name = $(this).find('td').eq(1).text();
            const age = $(this).find('td').eq(2).text();
            const city = $(this).find('td').eq(3).text();
            const position = $(this).find('td').eq(4).text();
            const imgSrc = $(this).find('img').attr('src');

            const row = [id, name, age, city, position];

            // Add the row data
            sheet.addRow(row);

            // Add image promise
            const imgPromise = fetch(imgSrc)
                .then(response => response.arrayBuffer())
                .then(buffer => {
                    const imgId = workbook.addImage({
                        buffer: buffer,
                        extension: 'png',
                    });
                    sheet.addImage(imgId, {
                        tl: { col: 5, row: rowIndex + 1 }, // Image position
                        ext: { width: 50, height: 50 },
                    });
                });

            imagePromises.push(imgPromise);
        });

        // Wait for all images to be processed
        await Promise.all(imagePromises);
        
        // Write to file
        workbook.xlsx.writeBuffer().then(function(buffer) {
            const blob = new Blob([buffer], { type: 'application/octet-stream' });
            const url = URL.createObjectURL(blob);
            const a = document.createElement('a');
            a.href = url;
            a.download = 'DataTable.xlsx';
            a.click();
            URL.revokeObjectURL(url);
        });
    });
});
</script>

</body>
</html>
