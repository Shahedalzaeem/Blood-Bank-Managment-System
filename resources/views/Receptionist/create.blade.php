<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Donor</title>
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
            border-right: 5px solid #f44097;
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
            background: linear-gradient(135deg, #f24f9e, #f44097);
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
            background-color: #f44097;
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
    <h2>Receptionist</h2>
        <a href="{{ route('donors.index') }}">Home</a>
        <a href="{{ route('donors.create') }}">Add Donor</a>
        <a href="{{ route('donors.archive') }}">Archive</a>

</div>

<div class="content">
    <main class="table">
        <section class="table__header">
            <h1>Create Donors Records</h1>
        </section>
        <h1>Add Donor</h1>
        <form method="POST" action="{{ route('donors.store') }}">
            @csrf
            <label>Donor Name</label>
            <input type="text" name="donor_name" required>

            <label>Mother's Name</label>
            <input type="text" name="mother_name" required>

            <label>Father's Name</label>
            <input type="text" name="father_name" required>

            <label>Gender</label>
            <select name="gender" required>
                <option value="male">Male</option>
                <option value="female">Female</option>
            </select>

            <label>Donor ID</label>
            <input type="text" name="donor_identifier" required>

            <label>Address</label>
            <input type="text" name="address" required>

            <label>Birth Date</label>
            <input type="date" name="birth_date" required>

            <label>Phone</label>
            <input type="text" name="phone" required>

            <label>Email</label>
            <input type="email" name="email" required>

            <label>Record Date</label>
            <input type="date" name="record_date" required>

            <label>Habits:</label><br>
            Smoking <input type="checkbox" name="smoking" value="1"> 
            Alcohol <input type="checkbox" name="alcohol" value="1"> 
            Tattoo <input type="checkbox" name="tattoo" value="1"> 

            <label>Medical History</label>
            <textarea name="medical_history"></textarea>

            <label>Treatment History</label>
            <textarea name="treatment_history"></textarea>

            <label>Surgical History</label>
            <textarea name="surgical_history"></textarea>

            <label>Allergy Info</label>
            <textarea name="allergy_info"></textarea>

            <button type="submit">Add Donor</button>
        </form>
    </main>
</div>

</body>
</html>