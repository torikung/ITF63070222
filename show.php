<html>
<head>
    <title>ITF Lab</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
<?php
    $conn = mysqli_init();
    mysqli_real_connect($conn, 'itfraiden.mysql.database.azure.com', 'raiden@itfraiden', 'Itf12644', 'itf63070222', 3306);
    if (mysqli_connect_errno($conn))
    {
        die('Failed to connect to MySQL: '.mysqli_connect_error());
    }
    $res = mysqli_query($conn, 'SELECT * FROM guestbook');
?>
<div class="container">
    <h1>DataBase Table</h1>
    <table width="400" border="1">
        <table class="table table-dark table-striped table-bordered">
            <thead>
                <tr>
                    <th width="100"> <div align="center">Name</div></th>
                    <th width="300"> <div align="center">Comment</div></th>
                    <th width="150"> <div align="center">Link</div></th>
                    <th width="15%"> <div align="center">Action</div></th>
                </tr>
            </thead>
    <?php
        while($Result = mysqli_fetch_array($res))
        {
    ?>
        <tr>
            <td><?php echo $Result['Name'];?></div></td>
            <td><?php echo $Result['Comment'];?></td>
            <td><?php echo $Result['Link'];?></td>
            <td><a href="edit.php?id=<?php echo $row['id']; ?>">Edit</a>&nbsp;
            <td><a href="delete.php?id=<?php echo $row['id']; ?>">Delete</a></td>
            </td>
        </tr>
    <?php
        }
    ?>
    </table>
<div class="container">
    <tr>
        <div align="center"><button type="button" class="btn btn-dark" onclick="window.location.href='/form.html'">เพิ่ม</button></div>
    </tr>
</div>
<?php
mysqli_close($conn);
?>
</body>
</html>
