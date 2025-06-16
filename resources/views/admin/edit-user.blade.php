<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit User</title>
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

        .sidebar h2, .sidebar h3 {
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
    </div>

    <div class="content">
        <main class="table">
            <section class="table__header">
                Edit User
            </section>
            <form action="{{ url('/admin/users/' . $user->id . '/update') }}" method="POST">
                @csrf
                @method('POST')
                <label>Username:</label>
                <input type="text" name="username" value="{{ $user->username }}" required>

                <label>Password:</label>
                <input type="password" name="password" placeholder="Enter new password" required>
                <button type="submit">Update</button>
            </form>
        </main>
    </div>
</body>
</html>