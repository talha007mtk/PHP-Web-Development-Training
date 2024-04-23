<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagination</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 800px;
            margin: 0 auto;
        }
        .pagination {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }
        .pagination a {
            display: inline-block;
            background-color: #007bff;
            color: white;
            padding: 5px 10px;
            text-decoration: none;
            margin-right: 5px;
        }
        .pagination a:hover {
            background-color: #0056b3;
        }
        .pagination strong {
            display: inline-block;
            padding: 5px 10px;
            margin-right: 5px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
     <?php
    $driver = new mysqli_driver();
    $driver->report_mode = MYSQLI_REPORT_OFF;

    $hostname = "localhost";
    $username = "root";
    $password = "";
    $database = "assign";

    $connection = mysqli_connect($hostname, $username, $password, $database);

    if(mysqli_connect_errno())
    {
        echo "Error Message: ".mysqli_connect_error() ."<br/>";
        echo "Error Code: ".mysqli_connect_errno();
        exit;
    }

    $records_per_page = 3;
    $query = "SELECT COUNT(emp_id) as total FROM employees";
    $result_total = mysqli_query($connection,$query);

    if (!$result_total) {
        die("Error in query: " . mysql_error($connection));
    }

    $row_total = mysqli_fetch_assoc($result_total);
    $total_pages = ceil($row_total['total'] / $records_per_page);

    $current_page = isset($_GET['page']) ? (0 + $_GET['page']) : 1;


    $start_record = ($current_page - 1) * $records_per_page;

    $query = "SELECT * FROM employees LIMIT $start_record, $records_per_page";
    $result_records = mysqli_query($connection,$query);

    if (!$result_records) {
        die("Error in query: " . mysql_error($connection));
    }
    ?>

    <h1 align="center">Pagination</h1>

    <table>
        <tr><th>Name</th><th>Position</th><th>Salary</th></tr>
        <?php while ($row_records = mysqli_fetch_assoc($result_records)){ ?>
            <tr>
                <td><?= $row_records['emp_name'] ?></td>
                <td><?= $row_records['position'] ?></td>
                <td><?= $row_records['salary'] ?></td>
            </tr>
        <?php } ?>
    </table>

    <div class='pagination'>
    <?php
    if ($current_page > 1) {
        ?>
     <a href='index.php?page=<?=($current_page - 1)?>'><< Previous</a>
    <?php
    }

    for ($i = 1; $i <= $total_pages; $i++) {
        if ($i == $current_page) {
            ?>
            <strong> <?= $i ?> </strong>
    <?php
        } else {
    ?>
            <a href='index.php?page=<?= $i ?>'><?= $i ?></a>
    <?php
        }
    }

    if ($current_page < $total_pages) {
    ?>
        <a href='index.php?page=<?=($current_page + 1)?>'>Next >></a>
    <?php
    }
    ?>
    </div>

    <?php mysqli_close($connection); ?>
</body>
</html>
