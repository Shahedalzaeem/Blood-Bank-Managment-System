<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Blood Test</title>
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
            background-color: rgba(120, 50, 50, 255);
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
    <h2>Laboratory</h2>
    <a href="{{ route('donations.index') }}">Donations Form</a>
    <a href="{{ route('donations.create') }}">Add Donation</a>
    <a href="{{ route('blood-tests.index') }}">Blood Test Form</a>
    <a href="{{ route('blood-tests.create') }}">Add Blood Test</a>
    <a href="{{ route('blood-units.create') }}">Add Blood Units</a>
</div>


    <div class="content">
        <main class="table">
            <section class="table__header">
                <h1>Create Blood Test</h1>
            </section>

            <h1>Add Blood Test</h1>

            <form action="{{ route('blood-tests.store') }}" method="POST">
                @csrf

            <label for="donation_id">Donation Form:</label>
            <select name="donation_id" id="donation_id">
                @foreach ($donations as $donation)
                    <option value="{{ $donation->id }}">{{ $donation->donor->donor_name }} - {{ $donation->donation_date }}</option>
                @endforeach
            </select>

            <label for="test_date">Test Date:</label>
            <input type="date" name="test_date" id="test_date">

            <label for="hiv_test">HIV Test:</label>
            <select name="hiv_test" id="hiv_test">
                <option value="Negative" selected>Negative</option>
                <option value="Positive">Positive</option>
            </select>

            <label for="hepatitis_test">Hepatitis Test:</label>
            <select name="hepatitis_test" id="hepatitis_test">
                <option value="Negative" selected>Negative</option>
                <option value="Positive">Positive</option>
            </select>

            <label for="syphilis_test">Syphilis Test:</label>
            <select name="syphilis_test" id="syphilis_test">
                <option value="Negative" selected>Negative</option>
                <option value="Positive">Positive</option>
            </select>

            <label for="htlv_test">HTLV Test:</label>
            <select name="htlv_test" id="htlv_test">
                <option value="Negative" selected>Negative</option>
                <option value="Positive">Positive</option>
            </select>

            <label for="malaria_test">Malaria Test:</label>
            <select name="malaria_test" id="malaria_test">
                <option value="Negative" selected>Negative</option>
                <option value="Positive">Positive</option>
            </select>

            <button type="submit">Save</button>
        </form>
    </div>
</div>

</body>
</html>