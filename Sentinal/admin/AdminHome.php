<?php
// error_reporting(-1); // ini_set('display_errors', 'On'); 
session_start();
if (!isset($_SESSION['admin_id'])) {  // check if admin or not
    session_destroy();
    header("location:../Logout.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Home</title>
    <style type="text/css">
        body {
            background-image: url('../images/adminhome.jpg');
            background-size: cover;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            color: #333;
        }

        .header {
            background-color: #f1f1f1;
            padding: 20px 10px;
            text-align: center;
            position: fixed;
            width: 100%;
            top: 0;
            left: 0;
            z-index: 1000;
        }

        .header a {
            color: black;
            text-decoration: none;
            padding: 12px;
            font-size: 18px;
            border-radius: 4px;
        }

        .header a.logo {
            font-size: 25px;
            font-weight: bold;
        }

        .header a:hover {
            background-color: #ddd;
            color: black;
        }

        .header a.active {
            background-color: dodgerblue;
            color: white;
        }

        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            height: 100%;
            width: 250px;
            background-color: #2c3e50;
            color: white;
            padding-top: 60px;
            padding-left: 20px;
        }

        .sidebar a {
            color: white;
            text-decoration: none;
            padding: 10px;
            display: block;
            margin-bottom: 10px;
            border-radius: 4px;
        }

        .sidebar a:hover {
            background-color: #34495e;
        }

        .content {
            margin-left: 270px;
            padding: 20px;
            padding-top: 80px;
        }

        .task-list {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        .task {
            background-color: rgba(255, 255, 255, 0.8);
            padding: 15px;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            display: grid;
            grid-template-columns: 50px 1fr 2fr 1fr 1fr;
            align-items: center;
        }

        .task img {
            border-radius: 50%;
            width: 42px;
            height: 42px;
        }

        .task .task-name,
        .task .user-name {
            text-align: center;
        }

        .task .status {
            text-align: center;
            font-size: 18px;
        }

        .task .status.green {
            color: green;
        }

        .task .status.red {
            color: red;
        }

        .button, .button1, .button2 {
            padding: 6px 12px;
            border-radius: 8px;
            text-decoration: none;
            font-weight: bold;
            display: inline-block;
            margin: 5px;
        }

        .button {
            background-color: #EEEEEE;
            color: #333333;
        }

        .button1 {
            background-color: #aae87c;
            color: #333333;
        }

        .button2 {
            background-color: #da6856;
            color: #333333;
        }

        .button:hover {
            background-color: #ccc;
        }

        .button1:hover {
            background-color: #88c973;
        }

        .button2:hover {
            background-color: #c84b3e;
        }

        @media screen and (max-width: 768px) {
            .task {
                grid-template-columns: 1fr 2fr 1fr;
                text-align: center;
            }

            .task-list {
                gap: 10px;
            }

            .content {
                margin-left: 0;
                padding: 20px;
            }
        }
    </style>
</head>
<body>
    <?php
    include("html/AdminHeader.php");
    // require '../Classes/init.php';  
    // $func = new Operation();
    ?>

    <?php include("html/Sidebar.html"); ?>

    <div class="content">
        <h3 style="color: white;">All Tasks</h3>
        <div class="task-list" id="alltasks">
            <?php
            // Fetch tasks from database
            $result1 = $func->select_with_join('*', 'task', 'user', 'INNER JOIN', 'task_receiver=user_id');
            if ($result1->num_rows > 0) {
                while ($row = $result1->fetch_assoc()) {
                    ?>
                    <div class="task">
                        <div>
                            <img src="<?php echo $row["user_image"]; ?>" alt="No Profile">
                        </div>
                        <div class="user-name">
                            <?php echo $row["user_fname"] . " " . $row["user_lname"]; ?>
                        </div>
                        <div class="task-name">
                            <?php echo $row["task_name"]; ?>
                        </div>
                        <div class="status <?php echo $row["task_display"] == 1 ? 'green' : 'red'; ?>">
                            <?php echo $row["task_display"] == 1 ? "✔" : "✘"; ?>
                        </div>
                        <div>
                            <a href="TaskDetails.php?task_id=<?php echo $row["task_id"]; ?>" class="button">SEE DETAILS</a>
                            <button onclick="delete_task(<?php echo $row["task_id"]; ?>)" class="button2">Delete</button>
                        </div>
                    </div>
                    <?php
                }
            } else {
                echo "<h2>No tasks so far</h2>";
            }
            ?>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script type="text/javascript">
        /* Function to delete a particular task by task id */
        function delete_task(task_id) {
            if (confirm('Are you sure to remove this task?')) {
                $.ajax({
                    type: 'post',
                    url: 'TaskDelete.php',
                    data: {task_id: task_id},
                    success: function (result) {
                        $("#alltasks").html(result);
                    }
                });
            }
        }
    </script>
</body>
</html>
