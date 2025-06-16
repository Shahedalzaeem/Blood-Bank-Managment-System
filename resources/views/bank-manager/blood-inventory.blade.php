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
            background: #556ab1;
        }
        .filter-form {
    margin-bottom: 20px;
    background-color: rgba(243, 243, 243, 0.8);
    padding: 15px 20px;
    border-radius: 10px;
    box-shadow: 0px 2px 5px rgba(0,0,0,0.1);
    display: flex;
    flex-wrap: wrap;
    gap: 20px;
    align-items: center;
}

.filter-form label {
    font-weight: 500;
    margin-right: 8px;
}

.filter-form select {
    padding: 8px 12px;
    border-radius: 6px;
    border: 1px solid #ccc;
    background: white;
    font-size: 14px;
    min-width: 120px;
}

.filter-btn {
    background-color: #556ab1;
    color: white;
    padding: 8px 16px;
    border: none;
    border-radius: 6px;
    font-weight: bold;
    cursor: pointer;
    transition: background 0.3s ease;
}

.filter-btn:hover {
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

            <form method="GET" action="{{ url('/bank-manager/blood-inventory') }}" class="filter-form">
                <div class="filter-group">
                    <label for="blood_type">Blood Type:</label>
                    <select name="blood_type" id="blood_type">
                        <option value="">All</option>
                        @foreach (['A', 'B', 'AB', 'O'] as $type)
                            <option value="{{ $type }}" {{ request('blood_type') == $type ? 'selected' : '' }}>{{ $type }}</option>
                        @endforeach
                    </select>

                    <label for="component_type">Component Type:</label>
                    <select name="component_type" id="component_type">
                        <option value="">All</option>
                        <option value="red" {{ request('component_type') == 'red' ? 'selected' : '' }}>Red Blood</option>
                        <option value="plasma" {{ request('component_type') == 'plasma' ? 'selected' : '' }}>Plasma</option>
                        <option value="platelet" {{ request('component_type') == 'platelet' ? 'selected' : '' }}>Platelet</option>
                    </select>

                    <button type="submit" class="filter-btn">Filter</button>
                </div>
            </form>
            <main class="table">
            <section class="table__header">
                <h1>Blood Inventory</h1>
            </section>
            <section class="table__body">
                <table>
                    <thead>
                        <tr>
                            <th>Blood Type</th>
                            <th>Rhesus Factor</th>

                            @if(empty($componentType) || $componentType == 'red')
                                <th>Red Blood Bags</th>
                            @endif

                            @if(empty($componentType) || $componentType == 'plasma')
                                <th>Plasma Bags</th>
                            @endif

                            @if(empty($componentType) || $componentType == 'platelet')
                                <th>Platelet Bags</th>
                            @endif
                        </tr>
                    </thead>

                    <tbody>
                        @forelse($inventory as $row)
                            <tr>
                                <td>{{ $row->blood_type }}</td>
                                <td>{{ $row->rhesus_factor }}</td>

                                @if(empty($componentType) || $componentType == 'red')
                                    <td>{{ $row->red_count ?? 0 }}</td>
                                @endif

                                @if(empty($componentType) || $componentType == 'plasma')
                                    <td>{{ $row->plasma_count ?? 0 }}</td>
                                @endif

                                @if(empty($componentType) || $componentType == 'platelet')
                                    <td>{{ $row->platelet_count ?? 0 }}</td>
                                @endif
                            </tr>
                        @empty
                            <tr><td colspan="5">No blood inventory data available.</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </body>
    </html>