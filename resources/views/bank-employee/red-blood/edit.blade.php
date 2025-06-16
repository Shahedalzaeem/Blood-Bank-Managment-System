<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modify Red-Blood Inventory</title>
    <style>

        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
            display: flex;
            height: auto;
            min-height: 100vh;
        }

       .sidebar {
            width: 220px;
            background: linear-gradient(to bottom, #384e8c, #2f343d);
            padding: 20px 0 10px 10px;
            border-right: 5px solid #92549c;
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
            background: linear-gradient(135deg, #f24f9e, #92549c);
            transform: scale(1.03);
        }


        .content {
            margin-left: 250px;
            padding: 20px;
            width: calc(100% - 250px);
            min-height: 100vh;
            padding-bottom: 50px;
        }
        /* الشريط العلوي */
  
        main.table {
            width: 100%;
            height: auto;
            min-height: 85vh;
            background-color: rgba(255, 255, 255, 0.8);
            backdrop-filter: blur(7px);
            border-radius: .8rem;
            overflow: hidden;
            padding: 20px;
        }

        .table__header {
            width: 100%;
            height: 10%;
            background-color: #92549c;
            padding: .8rem 1rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            color: white;
            border-radius: 10px;
        }

        /* محتوى الصفحة */


        h1 {
            text-align: center;
        }

        form {
            background: white;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            max-width: 500px;
            margin: auto;
        }

        label {
            display: block;
            margin-top: 10px;
        }

        input, select, textarea {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }


        textarea {
            height: 40px;
        }

        button {
            background: #333;
            color: white;
            padding: 10px;
            border: none;
            width: 100%;
            margin-top: 15px;
            cursor: pointer;
        }

        button:hover {
            background: #575757;
        }

    </style>
</head>
<body>

<div class="sidebar">
    <h2>Bank Employee</h2>
    <a href="{{ route('bank-employee.blood-inventory.index') }}">Blood Inventory</a>
    <a href="{{ route('bank-employee.red-blood.index') }}">Red Blood Inventory</a>
    <a href="{{ route('bank-employee.plasma.index') }}">Plasma Inventory</a>
    <a href="{{ route('bank-employee.platelet.index') }}">Platelet Inventory</a>
    <a href="{{ route('bank-employee.bad-blood.index') }}">Bad Blood Inventory</a>
    <a href="{{ route('bank-employee.archive.index') }}">Blood Archive</a>
</div>


<div class="content">
    <main class="table">
        <section class="table__header">
            <h1>Red Blood Inventory</h1>
        </section>
        <h1>Edit Red Blood Bag</h1>
        <form method="POST" action="/bank-employee/red-blood/{{ $record->id }}">
            @csrf
            @method('PUT')

            <label>Blood Type:</label>
            <input type="text" name="blood_type" value="{{ $record->blood_type }}">

            <label>Rhesus Factor:</label>
            <input type="text" name="rhesus_factor" value="{{ $record->rhesus_factor }}">

            <label>Quantity:</label>
            <input type="number" name="quantity" value="{{ $record->quantity }}">

            <button type="submit">Update</button>
        </form>
    </main>
</div>

</body>
</html>