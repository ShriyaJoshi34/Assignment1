<?php
include 'connect.php';
session_start();


$obj = new Dbh;
$data = $obj->connect();


if(isset($_POST['submit'])){
    $obj->insertRecord($_POST);
}

if(isset($_POST['update'])){
    $obj->updateRecord($_POST);
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <title>Document</title>
</head>
<body style="background-image:url(img4.jpg); background-repeat: no-repeat">

    <?php
    if(isset($_SESSION['username'])) {
    
    $userr = ucfirst($_SESSION['username']);
    } ?>
    <h1 style="text-align: center;">Hello  <?php echo $userr;   ?></h1>
    <div class="container">
        <div class = "jumbotron">

            <div class="card" style="background-color:grey">
                <div class="card-body">
 
                   <h2>Movie Records</h2>

                    <?php
                    $data = $obj->displayRecord();                    
                    $sno=1;?>
                    
                <table class="table table-success table-striped">
                    <thead>
                        <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Movie Name</th>
                        <th scope="col">Movie Year</th>
                        <th scope="col">Movie Actor</th>
                        <th scope="col">Movie Ratings</th>
                        <th scope="col">Edit</th>
                        </tr>
                    </thead>
                    <?php               
                    if (is_array($data) || is_object($data))
                    {
                    foreach ($data as $value) {
                        ?>
                    <tbody>
                        <tr>
                        <td><?php echo $sno++; ?></td>
                        <td><?php echo $value['movie_name'];?> </td>
                        <td><?php echo $value['movie_year'];?> </td>
                        <td><?php echo $value['movie_actor'];?> </td>
                        <td><?php echo $value['movie_ratings'];?> </td>
                        <td>
                            <a href ="movies.php?editid=<?php echo $value['movie_id']; ?>" name ="edit" class="btn btn-info">Edit</a>
                        </td>
                        </tr>
                        
                    </tbody>
                    <?php
                    }
                }
                else{
                    echo "no record";
                }
                    ?>
                    </table>
                

                </div>


            </div><br><br>
<!--########################-->

<?php
    if(isset($_GET['editid'])){
        $editid=$_GET['editid'];
        $myrecord = $obj->displayRecordById($editid);
    ?>

    <div class="card">
    <div class="card-body" style="background-color:grey">

    <form action="movies.php" method="post"> 

    <div class="form-group">
         <label>Edit Rating</label><br>
         <input type="number" name="rating" value="<?php echo $myrecord['movie_ratings']; ?> " min="1" max="5"
         placeholder="rating" class="form-control" required><br>
    </div>
    <div class="form-group">
         <input type="hidden" name ="hid" value="<?php echo $myrecord['movie_id']; ?>">
         <input type="submit" name="update" value="Update" class="btn btn-info">
    </div>
    </form>
    </div>
    </div>
    <div>
    <?php
                }
    ?>

<br>
<br>
<!--##########################-->

            <div class="card">
            <div class="card-body" style="background-color:grey">
            <h2>Add a Movie</h2>
        <form action="movies.php" method="post"> 

        <div class="form-group">
            <label><b>Movie Name</b></label>
            <input type="text" name="name" placeholder="enter movie name" class="form-control" required>
        </div>
        <div class="form-group">
            <label><b>Year_of_release</b></label>
            <input type="text" name="yof" placeholder="year of release" class="form-control" required>
        </div>
        <div class="form-group">
            <label><b>Movie Actor</b></label>
            <input type="text" name="actor" placeholder="Movie actor" class="form-control" required>
        </div>
        <div class="form-group">
            <label><b>Rating</b></label>
            <input type="number" name="rating" placeholder="rating" class="form-control"  min="1" max="5" required>
        </div>
        <br>
        <div class="form-group">
            <button type="submit" name="submit" value="Submit" class="btn btn-primary" >Add Movies</button>
        </div>

    </form>
    </div>
    </div>
    </div><br><br>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
   
    
</body>
</html>