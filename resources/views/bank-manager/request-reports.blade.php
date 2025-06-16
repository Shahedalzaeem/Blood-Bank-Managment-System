<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blood Inventory</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            min-height: 100vh;
            display: flex;
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
            transition: 0.5s;
            overflow: hidden;
        }

        .sidebar h2 {
            color: white;
            text-align: center;
            margin-bottom: 20px;
        }

        .sidebar a {
            list-style: none;
            display: block;
            padding: 15px;
            color: white;
            font-size: 15px;
            margin-bottom: 10px;
            cursor: pointer;
            transition: 0.3s;
            border-top-left-radius: 20px;
            border-bottom-left-radius: 20px;
            text-decoration: none;
        }

        .sidebar a:hover {
            background: linear-gradient(135deg, #9ba8d1, #556ab1);
            transform: scale(1.03);
        }

        .content {
            margin-left: 260px;
            padding: 20px;
            width: calc(100% - 260px);
        }

        main.table {
            width: 100%;
            height: 85vh;
            background-color: rgba(255, 255, 255, 0.8);
            backdrop-filter: blur(7px);
            border-radius: .8rem;
            overflow: hidden;
            padding: 20px;
        }

        .table__header {
            width: 100%;
            height: 10%;
            background-color: #556ab1;
            padding: .8rem 1rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            color: white;
            border-radius: 10px;
        }

        .table__body {
            width: 100%;
            max-height: calc(100% - 4rem);
            overflow: auto;
            margin-top: 15px;
            background: white;
            border-radius: 10px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        table, th, td {
            border-collapse: collapse;
            padding: 15px;
            text-align: left;
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
            background-color: rgba(109, 132, 182, 0.333);
        }

        /* Buttons */
        .info-btn {
            background: #556ab1;
            color: white;
            padding: 8px 12px;
            text-decoration: none;
            border-radius: 5px;
            transition: background 0.3s ease;
        }

        .info-btn:hover {
            background: #d13682;
        }

        .delete-btn {
            background: #dc3545;
            color: white;
            padding: 8px 12px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background 0.3s ease;
        }

        .delete-btn:hover {
            background: #c82333;
        }

        .logout-btn {
            background: #556ab1;
            color: white;
            padding: 8px 12px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background 0.3s ease;
        }

        .logout-btn:hover {
            background: #677ab9;
        }

        .reports-section {
    display: flex;
    flex-wrap: wrap;
    gap: 30px;
    margin-top: 20px;
}

.report-card {
    background: rgba(255, 255, 255, 0.95);
    box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.08);
    border-radius: 15px;
    padding: 25px;
    width: 100%;
    max-width: 500px;
    flex: 1;
    transition: transform 0.3s ease;
}

.report-card:hover {
    transform: translateY(-5px);
}

.report-card h2 {
    margin-bottom: 20px;
    color: #384e8c;
    font-size: 20px;
    border-left: 5px solid #556ab1;
    padding-left: 10px;
}

.report-card label {
    display: block;
    margin-bottom: 5px;
    font-weight: 500;
    color: #333;
}

.report-card input[type="date"] {
    width: 100%;
    padding: 10px;
    margin-bottom: 15px;
    border-radius: 8px;
    border: 1px solid #ccc;
    font-size: 14px;
}

.report-btn {
    background-color: #556ab1;
    color: white;
    padding: 10px 18px;
    border: none;
    border-radius: 8px;
    font-weight: bold;
    cursor: pointer;
    transition: background 0.3s ease;
}

.report-btn:hover {
    background-color: #677ab9;
}
    </style>
</head>
<body>
    <div class="sidebar">
        <h2>Bank Manager</h2>
        <a href="{{ route('bank-manager.blood-inventory') }}">Blood Inventory</a>
        <a href="{{ route('bank-manager.request-reports') }}">Request Reports</a>
        <a href="{{ route('bank-manager.blood-requests') }}">Blood Requests</a>
        <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
        <form action="{{ route('user.logout') }}" method="POST">
            @csrf
            <button type="submit" class="logout-btn">Logout</button>
        </form>
    </div>

        <div class="content">
        <main class="table">
    <section class="table__header">
        <h1>Request Reports</h1>
    </section>

    <section class="reports-section">

        <!-- Blood Inventory Report Card -->
        <div class="report-card">
            <h2>Blood Inventory Report</h2>
            <form action="{{ route('bank-manager.report.blood') }}" method="POST">
                @csrf
                <label for="from_date">From Date:</label>
                <input type="date" name="from_date" required>

                <label for="to_date">To Date:</label>
                <input type="date" name="to_date" required>

                <button type="submit" class="report-btn">Generate Report</button>
            </form>
        </div>

        <!-- Donors Report Card -->
        <div class="report-card">
            <h2>Donors Report</h2>
            <form action="{{ route('bank-manager.report.donors') }}" method="POST">
                @csrf
                <label for="from_date">From Date:</label>
                <input type="date" name="from_date" required>

                <label for="to_date">To Date:</label>
                <input type="date" name="to_date" required>

                <button type="submit" class="report-btn">Generate Report</button>
            </form>
        </div>

    </section>
</main>
    </div>
</body>
</html>