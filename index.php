<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Database connection</title>
  </head>
  <body>
      <div class="container">
        <div id="php" class="text-center bg-dark text-white py-5">

        <?php

        
        echo "<p>DATABASE CONNECTION CHECK</p><br>";        

        $mysql = new mysqli('localhost', 'root', '', 'fullstack');

        if($mysql->connect_error) {
            die($mysql->connect_error); //if error code stops here
        }
        echo "<h2>Connected to DB</h2><br>"; //if successful connection code proceeds

        //ADD INFO TO DATABASE
        //create a form with action and POST method
        ?>
        
        <div class="mx-auto w-50">
        <form method="POST" action="add_user.php">
            <div class="form-group">
                <input  name="name" class="form-control form-control-lg my-2" placeholder="Enter Your Name">
            </div>
            <div class="form-group">
                <input  name="login"class="form-control form-control-lg my-2" placeholder="Create a Login">
            </div>
            <div class="form-group">
                <input  name="age" class="form-control form-control-lg my-2" placeholder="Enter Your Age"> 
            </div>
            <button type='submit' class="btn btn-success">SUBMIT</button>            
        </form>                
    </div>
        <?php

        //OUTPUT INFO FROM DATABASE

        echo '<br><br>';
        echo "<h3>USERS TABLE</h3><br>";  
        
        $query = "SELECT * FROM users"; //select table from database
        $res = $mysql->query($query); //create a query

        //output the query
        echo '<table class="table text-white border-secondary">';
        echo'   <thead class="text-success h5 border-secondary">
                    <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Age</th>
                    <th scope="col">Login</th>
                    <th scope="col">Delete</th>
                    </tr>
                </thead>';
        echo '<tbody>';

        while($row = $res->fetch_assoc()) { //get an associative array for each user
            echo "            

            <tr>                
                <td>
                    {$row['name']}
                </td>
                <td>
                    {$row['age']}
                </td>
                <td>
                    {$row['login']}
                </td>
                <td>
                    <form method='POST' action='del_user.php'>
                        <input type='hidden' value='{$row['id']}' name='id' >
                        <button type='submit' class='btn btn-sm btn-secondary px-1 py-0'>x</button>
                    </form>
                </td>
            </tr>
            ";                         
            //outputs columns from the array {}means we pick a value from inside of the array
            
        }

        echo '</tbody>';
        echo '</table>';
        echo '<br>';       
        ?>     
  
      </div><!--#php-->  
      </div><!--.container-->    

    
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    
  </body>
</html>