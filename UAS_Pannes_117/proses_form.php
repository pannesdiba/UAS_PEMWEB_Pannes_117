<?php
// process_form.php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Validasi dan memproses data pada form
    $name = $_POST['name'];
    $age = $_POST['age'];
    $membership = isset($_POST['membership']) ? 'Member' : 'Non-member';
    $gender = $_POST['gender'];

    // Menampilkan data yang telah di proses
    echo "Name: $name<br>";
    echo "Age: $age<br>";
    echo "Membership: $membership<br>";
    echo "Gender: $gender<br>";

    // Menyimpan data pada basis data
    require_once('db_config.php');

    $sql = "INSERT INTO visitors (name, age, membership, gender, browser_type, ip_address)
            VALUES ('$name', '$age', '$membership', '$gender', '{$_SERVER['HTTP_USER_AGENT']}', '{$_SERVER['REMOTE_ADDR']}')";
    
    if ($conn->query($sql) === TRUE) {
    echo "Data successfully stored in the database.";

    // Mengambil dan menampilkan data dari database
    $selectQuery = "SELECT * FROM visitors";
    $result = $conn->query($selectQuery);

    if ($result->num_rows > 0) {
        echo "<table>
                <tr>
                    <th>Name</th>
                    <th>Age</th>
                    <th>Membership</th>
                    <th>Gender</th>
                </tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>" . $row["name"] . "</td>
                    <td>" . $row["age"] . "</td>
                    <td>" . $row["membership"] . "</td>
                    <td>" . $row["gender"] . "</td>
                  </tr>";
        }
        echo "</table>";
    } else {
        echo "No data found in the database.";
    }
    
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
} else {
    // Menangani permintaan yang tidak valid
    echo "Invalid request method.";
}
?>
