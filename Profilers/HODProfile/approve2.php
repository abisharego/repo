<?php
  session_start();
 if (isset($_SESSION['husername']) ){
  }
   else {
	   header("location: index.php");
   }
?>
<!--<!DOCTYPE html>
<html>

<form action="approve.php" method="post" style="
    height: 200px;
    width: 400px;
    position: fixed;
    top: 50%;
    left: 50%;
    margin-top: -100px;
    margin-left: -200px;">
Enter the USN:<input type="text" name="id"><br><br>
Enter the Date: <input type="date" name="DOB" class="form-control" id="DOB" placeholder="DD/MM/YYYY"><br><br>
<input type="submit" value="approve">

</form>
</html>-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Approval Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f7fc;
            margin: 0;
            padding: 0;
        }
        
        .form-container {
            width: 100%;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .form-box {
            background-color: #fff;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            padding: 30px;
            border-radius: 8px;
            width: 400px;
            text-align: center;
            background: linear-gradient(135deg, #42a5f5,rgb(46, 101, 152)); 
            color: #fff;
        }

        h2 {
            font-size: 24px;
            margin-bottom: 20px;
            color: #fff;
        }

        label {
            font-size: 14px;
            margin: 10px 0 5px;
            display: block;
            color: #fff;
        }

        input[type="text"], input[type="date"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 2px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #42a5f5;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            width: 100%;
        }

        input[type="submit"]:hover {
            background-color: #0077cc;
        }

        input[type="text"]:focus, input[type="date"]:focus {
            border-color: #42a5f5;
            outline: none;
        }

        .form-box a {
            color: #fff;
            text-decoration: none;
            font-size: 14px;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <div class="form-box">
            <h2>Approval Form</h2>
            <form action="approve.php" method="post">
                <label for="id">Enter the USN:</label>
                <input type="text" name="id" id="id" placeholder="Enter USN" required><br><br>

                <label for="DOB">Enter the Date:</label>
                <input type="date" name="DOB" class="form-control" id="DOB" placeholder="DD/MM/YYYY" required><br><br>

                <input type="submit" value="Approve">
            </form>
        </div>
    </div>
</body>
</html>
