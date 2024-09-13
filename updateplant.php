<?php
 $host = "localhost";
$dbname = "Growing";
$username = "root";
$password = "";
        
$conn = mysqli_connect(hostname: $host,
                       username: $username,
                       password: $password,
                       database: $dbname);



?>

<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <title>Home page</title>
    <meta http-equiv="refresh" content="43200">
    <link rel="stylesheet" href="css/Style.css">
</head>

<body>
    <div class="base">

        <nav>
            <img src="img/Logo.png" alt="our logo" class="logo">
            <ul>
                <li><a href="HomePage.html"><b>Home</b></a></li>
                <li><a href="about us.html"><b>About Us</b></a></li>
                <li><a href="contactus.html"><b> Contact Us</b> </a></li>
                <li><a href="profile.html"><b>Profile</b></a></li>
                <li>
                    <nav>
                        <ul>
                            <li class="dropdown">
                                <a href="#" class="dropbtn"><b>Categories</b> </a>
                                <div class="dropdown-content">
                                    <a href="indoor.html">Indoor plants</a>
                                    <a href="outdoor.html">Outdoor plants</a>
                                    <a href="flowers.html">Flowers</a>

                            </li>
                </li>
            </ul>
        </nav>
        </li>
        </ul>
        <div class="top-bar">
            <button class="sign-in-button">Sign In</button>
            <button class="sign-up-button">Sign Up</button>

        </div>
        </nav>
        <div class="content">
          <h1>
              Plant Update
          </h1> 
    <?php
    $id = $_GET["id"];
    echo '<script> alert(" ' . $id .' "); </script>';
    $rows = mysqli_query($conn , "SELECT * FROM `plant` where code = '$id'; "); 
    foreach ($rows as $row):?>
        
        <form id="product-form" action="php/plantupdate.php" method="post" class="form">

    <div class="form-group">
     
      <label for="name">Plant Name:</label>
      <input type="text" id="name"  name="name" value="<?php echo $row ["name"] ;?>" required>
    </div>

  
     <div class="form-group">
      <label for="category">Category:</label>
      <select  id="category" name="category" >
        <option value="<?php echo $row ["category"] ;?>"><?php echo  $row ["category"]?> </option>
        <option value="1"> InDoor Plants</option>
        <option value="2" > OutDoor Plants</option>
         <option value="3"> Flowers</option>
      </select>
    </div>

    <div class="form-group">
      <label for="price">Price:</label>
      <input type="number" id="price" name="price"  value="<?php echo $row ["price"] ;?>" required>
    </div>
    <div class="form-group">
      <label for="code">Code Number (e.g. 11-122):</label>
      <input type="text" id="code"  name="code" value="<?php echo $row ["code"] ;?>" required>
    </div>
    <div class="form-group">
      <label for="country">Country of Origin:</label>
      <input type="text" id="country" name="country" value ="<?php echo $row ["country"];?>" required>
    </div>
   
    <div class="button-group">
      <button type="submit" id="update-button">Update</button>
      <button type="reset" id="clear-button">Clear</button>
    </div>
    
  </form>
  <?php endforeach; ?>



    </body>
    </html>

