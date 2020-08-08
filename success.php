<?php 
include('conn.php');
session_start();
?>


<!DOCTYPE html>
<html>
<head>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
        <link href="css/style.css" rel="stylesheet">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

  <title>Signature</title>
</head>
<body>


<center>

<h1> Vous avez bien marqué votre presence au cours</h1>
<p><h6>Appuyer sur la touche ok pour sortir</h6></p>

<button type="submit" class="btn btn-success"><a href="logout.php">OK</a></button>


</center>

<center>

     <SCRIPT LANGUAGE="JavaScript">
      var maintenant=new Date();
      document.write(maintenant);
      </SCRIPT>
</center>

<?php 
     $date = date('Y-m-d');
     $email = $_SESSION["email"];
     $dup = mysqli_query($conn,"select id from utilisateur where email = '$email' ");
     $row = mysqli_fetch_assoc($dup);
     $id = $row["id"];

     $inserer = "INSERT INTO attendance (iduser, datesign) VALUES('$id', '$date')";
   mysqli_query($conn, $inserer);

    mysqli_close($conn);



?>

</body>
</html>