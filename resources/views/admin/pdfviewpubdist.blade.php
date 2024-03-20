


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="shortcut icon" type="image/png" href="{{ asset('admin/images/fevi.svg') }}">
    <title>Publisher Report</title>
    <style>
        @media print {
            body {
                font-size: 10px; 
                margin: 0;
                padding: 0;
            }
            .container {
                width: 100%;
                margin: 0 auto;
                padding: 10px;
            }
            .text-center {
                text-align: center;
            }
            table {
                width: 100%;
                border-collapse: collapse;
            }
            th, td {
                border: 1px solid #ddd;
                padding: 6px; 
            }
            th {
                background-color: #f2f2f2;
            }
        }

     
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>

    <div class="container mt-3">
        <div class="d-flex justify-content-center">
            <img style="width:100px; height:100px;" src="https://upload.wikimedia.org/wikipedia/commons/8/81/TamilNadu_Logo.svg" alt="">
        </div>
        <h3 class="text-center">Directorate of Public Libraries</h3>
        <h5 class="text-center">Transparent Book Procurement Portal</h5>
        <div class="d-flex justify-content-evenly">
            <p>Date : 10/03/2024</p>
            <h6>Publisher Report</h6>
        </div>
        <div class="card text-center">
            <div class="card-body">
                <h5 class="card-title fw-bolder">Transparent Book Procurement Portal - 05/05/2024 To 15/05/2024</h5>
            </div>
        </div>
        <table class="mt-3">
            <thead>
            <tr>
                <th>No</th>
                <th>publication Distribution Name</th>
                <th>Distributor Name</th>
                <th>Email</th>
                <th>Mobile Number</th>
                <th>publication Distribution Address</th>
                <th>Country</th>
                <th>State</th>
                <th>District</th>
                <th>City</th>
                <th>Postal Code</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($PubDist as $PubDist)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $PubDist->publicationDistributionName }}</td>
                    <td>{{ $PubDist->firstName }} {{ $PubDist->lastName }}</td>
                    <td>{{ $PubDist->email }}</td>
                    <td>{{ $PubDist->mobileNumber }}</td>
                    <td>{{ $PubDist->publicationDistributionAddress }}</td>
                    <td>{{ $PubDist->country }}</td>
                    <td>{{ $PubDist->state }}</td>
                    <td>{{ $PubDist->District }}</td>
                    <td>{{ $PubDist->city }}</td>
                    <td>{{ $PubDist->postalCode }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

</body>
</html>