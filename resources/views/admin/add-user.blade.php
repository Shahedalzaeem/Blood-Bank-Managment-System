<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Users Account</title>
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
        }

        .sidebar h2 {
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
            height: auto;
            background-color: rgba(255, 255, 255, 0.8);
            backdrop-filter: blur(7px);
            border-radius: .8rem;
            overflow: hidden;
            padding: 20px;
        }

        .table__header {
            width: 100%;
            background-color: #567cfc;
            padding: .8rem 1rem;
            color: white;
            font-size: 22px;
            border-radius: 10px;
            margin-bottom: 20px;
        }

        form label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
        }

        form input, select {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        form button {
            padding: 10px 20px;
            background-color: #567cfc;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        form button:hover {
            background-color: #617dde;
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
                Add Users Account
            </section>
            <form action="{{ route('admin.store-user') }}" method="POST">
                @csrf
                <label>Full Name:</label>
                <input type="text" name="full_name" required>

                <label>Username:</label>
                <input type="text" name="username" required>

                <label>Password:</label>
                <input type="password" name="password" required>
                <label>Role:</label>
                <select name="role" required>
                    <option value="receptionist">Receptionist</option>
                    <option value="laboratory">Laboratory</option>
                    <option value="bank-employee">BankEmployee</option>
                    <option value="bank-manager">BankManager</option>
                </select>

                <button type="submit">Add User</button>
            </form>
        </main>
    </div>
</body>
</html>