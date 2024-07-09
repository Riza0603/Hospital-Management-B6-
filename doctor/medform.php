<?php
session_start();
include 'connect.php';
include 'ddash.html';
?>
 
<!DOCTYPE html>
<html>
<head>
    <title>Prescription Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            padding: 20px;
        }

        h1 {
            text-align: center;
            color: #333;
        }

        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
            max-height: 500px; 
            overflow: auto; 
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 10px;
        }

        table th,
        table td {
            border: 1px solid #333;
            padding: 10px;
        }

        table th {
            background-color: #f2f2f2;
            font-weight: bold;
        }

        .add-row-btn {
            margin-top: 10px;
            background-color: #333;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 3px;
            cursor: pointer;
	    transform:translate(-650px);
        }

        .add-row-btn:hover {
            background-color: #555;
        }

        input[type="text"],
        input[type="checkbox"] {
            padding: 5px;
            width: 100%;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #333;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 3px;
            cursor: pointer;
	    transform:translate(-665px);

        }

        input[type="submit"]:hover {
            background-color: #555;
        }

        .delete-row-btn {
            background-color: #f44336;
            color: #fff;
            border: none;
            padding: 6px 12px;
            border-radius: 50%;
            cursor: pointer;
        }

        .delete-row-btn:hover {
            background-color: #d32f2f;
        }

        .button-container {
            display: flex;
            justify-content: center;
            margin-top: 10px;
        }
    </style>
</head>
<body>
<?php

     $r=$_SESSION['ds'];

	    $pid = $_GET['ii'];
	    $pname = $_GET['nn'];
    ?>
    <h1>Prescription Form</h1>
    <h2>Patient Id: <?php echo $pid ?></h2><br>   
    <h2>Patient Name: <?php echo $pname ?></h2>
    <form method="post" action="medi.php">
    <input type="hidden" name="pid" value="<?php echo $pid; ?>">
        <input type="hidden" name="pname" value="<?php echo $pname; ?>">
        <table>
            <thead>
                <tr>
                    <th>Medicine Name</th>
                    <th>Quantity</th>
                    <th>Morning</th>
                    <th>Afternoon</th>
                    <th>Night</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <tr id="row-1">
                    <td><input type="text" pattern="^[^0-9]*$" title="cannot contain only numbers" name="medicine_name[]" required></td>
                    <td><input type="text" pattern="[0-9]*" title="Please enter only numbers" name="quantity[]" required></td>
                    <td><input type="text" pattern="[0-9]*" title="Please enter only numbers" name="morning[]" required></td>
                    <td><input type="text" pattern="[0-9]*" title="Please enter only numbers" name="afternoon[]" required></td>
                    <td><input type="text" pattern="[0-9]*" title="Please enter only numbers" name="night[]" required></td>
                    <td><button class="delete-row-btn" type="button" onclick="deleteRow(this)">X</button></td>
                </tr>
            </tbody>
        </table>
        <div class="button-container">
            <button class="add-row-btn" type="button" onclick="addRow()">Add New Row</button>
        </div><br><br>
        <input type="submit" name="submit" value="Prescribe">
    </form>

    <script>
        function addRow() {
            var table = document.getElementsByTagName('table')[0];
            var lastRow = table.rows[table.rows.length - 1];
            var newRow = table.insertRow(table.rows.length);

            var cells = newRow.insertCell();
            cells.innerHTML = '<input type="text" name="medicine_name[]" required>';

            cells = newRow.insertCell();
            cells.innerHTML = '<input type="text" name="quantity[]" required>';

            cells = newRow.insertCell();
            cells.innerHTML = '<input type="text" name="morning[]" required>';

            cells = newRow.insertCell();
            cells.innerHTML = '<input type="text" name="afternoon[]" required>';

            cells = newRow.insertCell();
            cells.innerHTML = '<input type="text" name="night[]" required>';

            cells = newRow.insertCell();
            cells.innerHTML = '<button class="delete-row-btn" type="button" onclick="deleteRow(this)">X</button>';
        }

        function deleteRow(button) {
            var row = button.parentNode.parentNode;
            row.parentNode.removeChild(row);
        }
    </script>
</body>
</html>
