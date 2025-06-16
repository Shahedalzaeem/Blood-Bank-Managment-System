<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Donor Report Result</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            display: flex;
            min-height: 100vh;
            background-color: #f4f4f4;
        }

        /* Sidebar Styling */
        .sidebar {
            width: 220px;
            background: linear-gradient(to bottom, #384e8c, #2f343d);
            padding: 20px 0 10px 10px;
            border-right: 5px solid #556ab1;
            position: fixed;
            top: 0;
            left: 0;
            bottom: 0;
        }

        .sidebar h3 {
            color: white;
            text-align: center;
            margin-bottom: 20px;
        }

        .sidebar a {
            display: block;
            padding: 15px;
            color: white;
            font-size: 15px;
            margin-bottom: 10px;
            text-decoration: none;
            border-top-left-radius: 20px;
            border-bottom-left-radius: 20px;
            transition: 0.3s;
        }

        .sidebar a:hover {
            background: linear-gradient(135deg, #9ba8d1, #556ab1);
            transform: scale(1.03);
        }

        .main {
            margin-left: 260px;
            padding: 0;
            width: calc(100% - 260px);
            display: flex;
            flex-direction: column;
        }

        .topbar {
            background-color: #556ab1;
            color: white;
            padding: 20px;
            font-size: 22px;
            font-weight: bold;
            text-align: center;
            border-bottom: 3px solid #384e8c;
        }

        .content {
            padding: 30px;
            background-color: #ffffff;
            border-radius: 10px;
            margin: 30px;
            box-shadow: 0px 4px 10px rgba(0,0,0,0.1);
        }

        .content p {
            font-size: 16px;
            margin-bottom: 20px;
            color: #333;
            font-weight: 500;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
            border-radius: 10px;
            overflow: hidden;
        }

        th, td {
            padding: 14px;
            text-align: center;
            font-size: 16px;
        }

        thead th {
            background-color: rgb(143, 162, 204);
            color: white;
            text-transform: capitalize;
        }

        tbody tr:nth-child(even) {
            background-color: #f8f9fa;
        }

        tbody tr:hover {
            background-color: rgba(109, 132, 182, 0.15);
        }

        tbody td {
            color: #333;
        }
    </style>
</head>
<body>

    <div class="sidebar">
        <h3>Bank Manager</h3>
        <a href="{{ route('bank-manager.blood-inventory') }}">Blood Inventory</a>
        <a href="{{ route('bank-manager.request-reports') }}">Request Reports</a>
        <a href="{{ route('bank-manager.blood-requests') }}">Blood Requests</a>
    </div>

    <div class="main">
        <div class="topbar">Donor Report Result</div>
        <div class="content">
            <p><strong>From:</strong> {{ $from }} &nbsp; | &nbsp; <strong>To:</strong> {{ $to }}</p>
            <table>
                <thead>
                    <tr>
                        <th>Added Donors</th>
                        <th>Archived Donors</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{ $added }}</td>
                        <td>{{ $archived }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

</body>
</html>