<?php session_start();

 ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

	<title>La liste des eleves present</title>


</head>
<body>

	<style>

body {font-family: "Lato", sans-serif;
	  text-decoration: red;
	  background: black;
}

.sidebar {
  height: 100%;
  width: 230px;
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  background-color: #FF0000;
  overflow-x: hidden;
  padding-top: 16px;
}

.sidebar a {
  padding: 6px 8px 6px 16px;
  text-decoration: none;
  font-size: 20px;
  color: #818181;
  display: block;
}

.sidebar a:hover {
  color: #f1f1f1;
}


@media screen and (max-height: 450px) {
  .sidebar {padding-top: 15px;}
  .sidebar a {font-size: 18px;}
}

h1{
	background: #7FFFD4;
	width: 800px;
	height: 50px;
  color: #FF0000


}
th{

  color: #FF0000
}

td{

  color: white;
}


</style>

<div class="sidebar ">
  <a href="logout.php"><i class="fa fa-sign-in" style="font-size:30px"></i> Deconnexion</a>
</div>


<center>

 	<p><h1>LA LISTE DES ELEVES PRESENT</h1></p><br><br>

 </center>
  <div class="container">

      <?php
        include 'conn.php';

        $reponse = mysql_query("SELECT id.utilisateur, nom.utilisateur, datesign.attendance, time.attendance FROM utilisateur, attendance WHERE id.utilisateur= id.attendance ");
      ?>
         
        <table class="table table-bordered table-hovered">
                <tr>
                    <th>ID</th>
                    <th>NOM & PRENOMS</th>
                    <th>DATE DE SIGNATURE</th>
                    <th>HEURES DE SIGNATURE</th>
                </tr>
            <?php //On affiche les lignes du tableau une à une à l'aide d'une boucle
            while($donnees = mysql_fetch_array($reponse))
            {
            ?>
                <tr>
                    <td><?php echo $donnees['id'];?></td>
                    <td><?php echo $donnees['nom'];?></td>
                    <td><?php echo $donnees['datesign'];?></td>
                    <td><?php echo $donnees['time'];?></td>
                </tr>
            <?php
            } //fin de la boucle, le tableau contient toute la BDD
            mysql_close(); //deconnection de mysql
            ?>
        </table>

</div>

</body>
</html>