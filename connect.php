<?php 

class Dbh {
    public $con;

    public function connect(){
        $this->con = mysqli_connect("localhost","testuser","testpassword","testdb");
        if(!$this->con)  
           {  
                echo 'Database Connection Error ' . mysqli_connect_error($this->con);  
           } 
        else{
            return $this->con;

        } 
    }  

    public function login($name,$pass,$conn){
        $s = " select * from user_list where username = '$name' && password = '$pass'";
        $result = mysqli_query($conn,$s);
        $num = mysqli_num_rows($result);

        if($num == 1){
            $_SESSION['username'] = $name;
            header('location:movies.php');
        } else{
            header('location:login.php');
            
        }

    }

    public function insertRecord($post){
     
        $name=$post['name'];
        $yof = $post['yof'];
        $actor = $post['actor'];
        $rating = $post['rating'];
        $sql = "INSERT INTO movies(movie_name,movie_year,movie_actor,movie_ratings)VALUES('$name','$yof','$actor','$rating')";
        $coon = $this->connect();
        $result = mysqli_query($coon,$sql);
        if($result){
            header('location:movies.php?msg=ins');
    
        }
        else{
            echo "Error".$sql."<br>".$this->conn->error;
        }
    }
        public function displayRecord(){
            $sql = "SELECT * FROM movies ORDER BY movie_year";
            $coon = $this->connect();
            $result= mysqli_query($coon,$sql);
            if($result->num_rows>0){
                while($row=$result->fetch_assoc()){
                    $data[]=$row;
                }
            return $data;
            }
        }

        public function displayRecordById($editid){
            $sql= "SELECT * FROM movies WHERE movie_id = '$editid'";
            $coon = $this->connect();
            $result = mysqli_query($coon,$sql);
            if($result->num_rows==1){
                $row=$result->fetch_assoc();
                return $row;
            }
        }
        public function updateRecord($post){
     
    
            $rating = $post['rating'];
            $editid =$post['hid'];
            $sql = "UPDATE movies SET movie_ratings='$rating' WHERE movie_id=$editid";
            $coon = $this->connect();
            $result = mysqli_query($coon,$sql);
            if($result){
                header('location:movies.php?msg=upd');
        
            }
            else{
                echo "Error".$sql."<br>".$this->conn->error;
            }
            }
    }

?>