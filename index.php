<?php
    require 'config.php';
    include 'status.php';
    $status = new Result();

    if (isset($_POST['submit'])) 
    {
      $name = $_POST['username'];
      $email = $_POST['email'];
      $number = $_POST['number'];
      $medicine = $_POST['medicine'];
      $sector = $_POST['sector'];
      if(isset($_POST['employer']))
      {
        $employer = $_POST['employer'];
      }
      else{
        $employer = "";
      }

      $sql = $conn->prepare("INSERT INTO info (name,email,number,medicine,sector,employer) VALUES (?,?,?,?,?,?)");
      $sql->bind_param("ssssss",$name,$email,$number,$medicine,$sector,$employer);
      $sql->execute();

      if($sql->affected_rows > 0) 
      {
        $status->setStatus("success");
        $status->setMessage($sql->error);
      }
      else if($sql->affected_rows < 0)
      {
      
        $status->setStatus("fail");
        $status->setMessage($sql->error);
          
      }
      


    
    }

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />

    <link
      rel="stylesheet"
      type="text/css"
      href="yourPath/silviomoreto-bootstrap-select-83d5a1b/dist/css/bootstrap-select.css"
    />
    <link href="yourPath/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="style.css" />
    <title>Document</title>
  </head>
  <body>
    <form method="post">
      <!-- <h3 id="logo">Contact form</h3> -->
      
      <label for="username">Name</label>
      <input
        type="text"
        id="username"
        name="username"
        placeholder="Type in your name.."
        autocomplete="off"
        required
      />

      <label for="password">Email</label>
      <input
        type="email"
        id="email"
        name="email"
        placeholder="Enter your email.."
        autocomplete="off"
        required
      />

      <label for="password">Phone number</label>
      <input
        type="number"
        id="number"
        name="number"
        placeholder="Enter your number.."
        autocomplete="off"
        required
      />
      <label for="password">Medicine</label>
      <input
        type="text"
        id="medicine"
        name="medicine"
        placeholder="Enter your prefered medicine company.."
        autocomplete="off"
        required
      />
      <label for="password">Working in</label>
      <select name="sector" id="" class="selectpicker">
        <option value="govt">Govt Sector</option>
        <option value="private">Private Sector</option>
      </select>

      <label for="password" class="employer">Employer Name</label>
      <input
        class="employer"
        type="text"
        id="emp-name"
        name="employer"
        placeholder="Enter employer name.."
        autocomplete="off"
        
      />
      <input type="submit" name="submit" value="Apply" />
<?php

  $st = $status->getStatus();
  $ms = $status->getMessage();
  if ($st == "success") {
    echo "<h5 style='color:green;margin-top:7rem;'>Applied successfully</h5>";
    header("Location: https://www.bugcry.com ");
  } else {
    echo "<h5 style='color:red;margin-top:7rem;'>".$ms."</h5>";
  }
  
?>
    </form>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script>
    $('select').on('change', function() {
      if (this.value === "private") {
        $('.employer').css("display","block")
      }else {
        $('.employer').css("display","none")
      }
    });
    </script>
  </body>
</html>
