<?php

 include 'conn.php';

if(isset($_POST['email']))
{
    $email=$_POST['email'];

    $cheeckdata=" SELECT email FROM utilisateur WHERE email='$email' ";

    $query = mysqli_query($conn, $cheeckdata);
    $count = mysqli_num_rows($query);

    if($count>0)
    {
        echo "Cet adresse existe Déja";
    }
    else
    {
        echo "validé";
    }
    exit();
}

if(isset($_POST['password2']))
{
    if($_POST['password2'] != $_POST['password'])
    {
     echo "Ne correspond pas";
    }
    else
    {
        echo "validé";
    }
    exit();
}

if(isset($_POST['telephone']))
{
    $telephone=$_POST['telephone'];

    $cheeckdata=" SELECT telephone FROM utilisateur WHERE telephone='$telephone' ";

    $query=mysqli_query($conn, $cheeckdata);
    $row = mysqli_num_rows($query);
    if($row>0)
    {
     echo "Ce numéro de telephone exite déja";
    }
    else
    {
        echo "validé";
    }
    exit();
}


mysqli_close($conn);

?>
