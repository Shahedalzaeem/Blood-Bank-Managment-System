<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users Account</title>
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

        .sidebar {
            width: 220px;
            background: linear-gradient(to bottom, #2c3e50, #1a252f);
            padding: 20px 0 10px 10px;
            border-right: 5px solid #567cfc;
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
            background: linear-gradient(135deg, #617dde, #567cfc);
            transform: scale(1.03);
        }

        .logout-btn {
            background: #567cfc;
            color: white;
            padding: 8px 12px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background 0.3s ease;
            margin-left: 10px;
        }

        .logout-btn:hover {
            background: #617dde;
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
            background-color: #567cfc;
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

        .action-btn {
            background: #28a745;
            color: white;
            padding: 6px 10px;
            text-decoration: none;
            border-radius: 5px;
            margin-right: 5px;
        }

        .delete-btn {
            background: #dc3545;
            color: white;
            padding: 6px 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .delete-btn:hover {
            background: #c82333;
        }
    </style>
</head>
<body>
    <div class="sidebar">
        <h2>Admin Panel</h2>
        <a href="/admin/users">Users Account</a>
        <a href="/admin/add-user">Add Users Account</a>
        <a href="/admin/requests">Requests To Join</a>
        <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
        <form action="{{ route('admin.logout') }}" method="POST">
            @csrf
            <button type="submit" class="logout-btn">Logout</button>
        </form>
    </div>

    <div class="content">
        <main class="table">
            <section class="table__header">
                <h1>Users Account</h1>
            </section>
            <section class="table__body">
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Full Name</th>
                            <th>Username</th>
                            <th>Role</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->full_name }}</td>
                            <td>{{ $user->username }}</td>
                            <td>{{ $user->role }}</td>
                            <td>
                                <a href="{{ route('admin.users.edit', $user->id) }}" class="action-btn">Edit</a>
                                <form action="{{ route('admin.users.delete', $user->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button onclick="return confirm('Delete this user?')" class="delete-btn">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                        @if($users->isEmpty())
                            <tr><td colspan="5">No users found.</td></tr>
                        @endif
                    </tbody>
                </table>
            </section>
        </main>
    </div>
</body>
</html>