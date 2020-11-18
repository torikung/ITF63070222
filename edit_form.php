<!DOCTYPE html>
<html>
<head>
    <title>Edited Form</title>
</head>
<body>
<?php
$dbconfig = include('dbconfig.php');
$conn = mysqli_connect($dbconfig['host'], $dbconfig['username'], $dbconfig['password'], $dbconfig['database']);
if (!$conn)
{
    die('Failed to connect to MySQL: '.mysqli_connect_error());
}
    
$ID = $_POST['ID'];
$sql = "SELECT * FROM guestbook WHERE ID='$ID'";
$res = mysqli_query($conn, $sql);
$comment = mysqli_fetch_array($res);
?>
    <div class="container">
        <h1>Edit comment</h1>
        <form action="edit.php" method="post" class="mt-4">
            <input type="hidden" name="ID" value=<?php echo $comment['ID'];?>>
            <div class="form-group">
                <label for="inputName">Name</label>
                <?php
                    echo '<input type="text" name="name" id="inputName" class="form-control" placeholder="Enter Name" value="'.$comment["Name"].'">'
                ?>
            </div>
            <div class="form-group">
                <label for="inputComment">Comment</label>
                <textarea name="comment" class="form-control" id="inputComment" rows="3" placeholder="Enter Comment"><?php echo $comment['Comment'];?></textarea>
            </div>
            <div class="form-group">
                <label for="inputLink">Link</label>
                <?php
                    echo '<input type="text" name="link" id="inputLink" class="form-control" placeholder="Enter Name" value="'.$comment["Link"].'">'
                ?>
            </div>
            <div class="mt-4">
                <button type="submit" class="btn btn-primary mr-1">Save</button>
                <a role="button" class="btn btn-secondary" href="guestbook.php">Back</a>
            </div>
        </form>
    </div>
<?php
mysqli_close($conn);
?>
</body>
</html>