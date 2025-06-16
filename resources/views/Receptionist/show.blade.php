<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Donor Details</title>
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
            <h1>Donors List</h1>
        </section>
        <h1>Donor Information</h1>

        <p><strong>Name:</strong> {{ $donor->donor_name }}</p>
        <p><strong>Father Name:</strong> {{ $donor->father_name }}</p>
        <p><strong>Mother Name:</strong> {{ $donor->mother_name }}</p>
        <p><strong>Gender:</strong> {{ $donor->gender }}</p>
        <p><strong>Birth Date:</strong> {{ $donor->birth_date }}</p>
        <p><strong>Address:</strong> {{ $donor->address }}</p>
        <p><strong>Phone:</strong> {{ $donor->phone }}</p>
        <p><strong>Email:</strong> {{ $donor->email }}</p>
        <p><strong>Habits:</strong>
        @if($donor->smoking) Smoking @endif
        @if($donor->alcohol) , Alcohol @endif
        @if($donor->tattoo) , Tattoo @endif
        </p>
        <p><strong>Medical History:</strong> {{ $donor->medical_history }}</p>
        <p><strong>Treatment History:</strong> {{ $donor->treatment_history }}</p>
        <p><strong>Surgical History:</strong> {{ $donor->surgical_history }}</p>
        <p><strong>Allergies:</strong> {{ $donor->allergy_info }}</p>    
    </main>
</div>

</body>
</html>