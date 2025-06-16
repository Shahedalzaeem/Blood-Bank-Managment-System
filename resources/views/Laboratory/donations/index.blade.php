<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Donations Form</title>
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
            border-right: 5px solid rgba(120, 50, 50, 255);
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
            background: linear-gradient(135deg, #923232, #b55050);
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
            background-color: rgba(120, 50, 50, 255);
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
            background: rgba(120, 50, 50, 255);
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
            background: rgba(120, 50, 50, 255);
            color: white;
            padding: 8px 12px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background 0.3s ease;
        }

        .logout-btn:hover {
            background: rgba(120, 50, 50, 255);
        }

    </style>
</head>
<body>

    <div class="sidebar">
        <h2>Laboratory</h2>
        <a href="{{ route('donations.index') }}">Donations Form</a>
        <a href="{{ route('donations.create') }}">Add Donation</a>
        <a href="{{ route('blood-tests.index') }}">Blood Test Form</a>
        <a href="{{ route('blood-tests.create') }}">Add Blood Test</a>
        <a href="{{ route('blood-units.create') }}">Add Blood Units</a>  
        <br><br><br><br><br><br><br><br><br><br><br>
        <form action="{{ route('user.logout') }}" method="POST">
            @csrf
            <button type="submit" class="logout-btn">Logout</button>
        </form>  
    </div>

    <div class="content">
        <main class="table">
            <section class="table__header">
                <h1>Donations Form</h1>
            </section>
            <section class="table__body">
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Donor Name</th>
                            <th>Donation Date</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($donations as $donation)
                        <tr>
                            <td>{{ $donation->id }}</td>
                            <td>{{ $donation->donor->donor_name }}</td>
                            <td>{{ $donation->donation_date }}</td>
                            <td>
                                <a href="{{ route('donations.edit', $donation->id) }}" class="info-btn" style="background: #28a745;">Edit</a>
                                <form action="{{ route('donations.destroy', $donation->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="delete-btn">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </section>
        </main>
    </div>

</body>
</html>