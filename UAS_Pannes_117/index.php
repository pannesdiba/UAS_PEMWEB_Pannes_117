<?php

include_once('db_config.php');

// Mulai session
session_start();
?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulir Pengunjung Cafe</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <h1>Formulir Pengunjung Cafe</h1>

    <form id="visitorForm">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required>

        <label for="age">Age:</label>
        <input type="number" id="age" name="age" required>

        <label for="membership">Pilih Jenis Membership:</label>
            <div>
                <input type="checkbox" id="membership" name="membership" value="Member"required>
                <label for="membership">Member</label>

                <input type="checkbox" id="nonMembership" name="membership" value="Non-Member"required>
                <label for="nonMembership">Non-Member</label>
            </div>

        <label for="gender">Gender:</label>
        <input type="radio" id="male" name="gender" value="Male" required>
        <label for="male">Male</label>
        <input type="radio" id="female" name="gender" value="Female" required>
        <label for="female">Female</label>

        <button type="button" onclick="submitForm()">Submit</button>
    </form>

    <table id="visitorTable">
        <thead>
            <tr>
                <th>Name</th>
                <th>Age</th>
                <th>Membership</th>
                <th>Gender</th>
            </tr>
        </thead>
        <tbody>
            <!-- Data will be inserted here dynamically -->
        </tbody>
    </table>

    // script dari javascript
    <script src="script.js"></script>  
</body>
</html>
