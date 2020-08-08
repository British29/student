<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <!-- <link href="css/style.css" rel="stylesheet"> -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

	<title> Formulaire Enregistrement</title>

  <script
  src="http://code.jquery.com/jquery-3.3.1.min.js"
  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  crossorigin="anonymous">
  </script>

  <script type="text/javascript">
  $(document).ready(function() {
    $('#Enregistrer').click(function() {
      $.ajax({
        type: "POST",
        url: 'send.php',
        data: {
          nom: $("#nom").val(),
          email: $("#email").val(),
          password: $("#password").val(),
          password2: $("#password2").val(),
          telephone: $("#telephone").val(),
          sexe: $("#sexe").val(),
          photo: $("#photo").val()
        }
      });
      window.location.replace('index.php');
    });
  });
  </script>



</head>
<body>

      <center>
         <div class="container col-sm-3 border">
             <h1>Formulaires</h1>
              <img src="classe.jpg">
             <form method="POST" action="" enctype="multipart/form-data">
                 <div class="form-group">
                   <label for="nu">Nom et Prenoms</label>
                   <input type="text" class="form-control" id="nom" name="nom" placeholder="Entrer votre nom et Prenoms" required>
                 </div>
                 
                 <div class="form-group">
                   <label for="nu">Adresse Email</label>
                   <input type="email" class="form-control" id="email" name="email" placeholder="votre Email" required="" onkeyup="checkemail();">
                   <span id="lblError" style="color: red"></span>
                 </div>

                <div class="form-group">
                   <label for="nu">Mot de passe</label>
                   <input type="password" class="form-control" id="password" name="password" placeholder="votre mot de passe" maxlength="10" required>
                 </div>

                <div class="form-group">
                   <label for="nu">Confirmation Mot de passe</label>
                   <input type="password" class="form-control" id="password2" name="password2" placeholder="Repeter le mot de passe" required maxlength="10" onkeyup="checkpassword2();">
                   <span id="lblError" style="color: red"></span>
                 </div>

                <div class="form-group">
                   <label for="nu">Telephone</label>
                   <input type="telephone" class="form-control" id="telephone" name="telephone" placeholder="votre numero de telephone" required onkeyup="checktelephone();">
                   <span id="lblError" style="color: red"></span>
                 </div><br>

                <div class="form-group">
                    <input type="radio" id="sexe" name="sexe" value="homme">
                    <label for="homme">Homme</label>
                    <input type="radio" id="sexe" name="sexe" value="femme">
                    <label for="femme">Femme</label>
                    <input type="radio" id="sexe" name="sexe" value="autre">
                    <label for="autre">Autres</label><br>

                  </div>

                  <div class="form-group">
                        <input type="file" class="form-control" id="photo" name="file_name"/>
                  </div><br>

                 <div class="form-group form-button">
                    <button class="btn btn-lg btn-success" type="submit" id="Enregistrer">Enregistrer</button>
                 </div>
             </form>
     </center>
   </div>


<script src="vendor/jquery/jquery.min.js"></script>
    <script src="js/main.js"></script>

    <script>

        function checkemail()//Fonction qui vérifie si le téléphone existe ou pas
        {
            var email=document.getElementById( "email" ).value;
                
            if(email)
            {
                $.ajax({
                    type: 'POST',
                    url: 'cheecksenddata.php',
                    data: {
                    email:email,
                    },
                    success: function (response) {
                        $( '#email_status' ).html(response);
                        if(response=="OK")  
                        {
                            return true;  
                        }
                        else
                        {
                            return false; 
                        }
                    }
                });
            }
                else
                {
                    $( '#email_status' ).html("");
                    return false;
                }
        }

                function checkpassword()//Fonction qui vérifie si les mMdp correspondent
        {
            var password2=document.getElementById( "password2" ).value;
            var password=document.getElementById( "password" ).value;
                
            if(password2)
            {
                $.ajax({
                    type: 'POST',
                    url: 'cheecksenddata.php',
                    data: {
                    password2:password2,
                    password:password,
                    },
                    success: function (response) {
                        $( '#password_status' ).html(response);
                        if(response=="OK")  
                        {
                            return true;  
                        }
                        else
                        {
                            return false; 
                        }
                    }
                });
            }
                else
                {
                    $( '#password2_status' ).html("");
                    return false;
                }
        }


        function checktelephone()//Fonction qui vérifie si le mail existe ou pas
        {
        var telephone=document.getElementById( "telephone" ).value;
            
        if(telephone)
        {
            $.ajax({
                type: 'POST',
                url: 'cheecksenddata.php',
                data: {
                telephone:telephone,
                },
                success: function (response) {
                    $( '#telephone_status' ).html(response);
                    if(response=="OK")  
                    {
                        return true;  
                    }
                    else
                    {
                        return false; 
                    }
                }
            });
            }
            else
            {
                $( '#telephone_status' ).html("");
                return false;
            }
        }



        function checkall()
        {
            var emailhtml=document.getElementById("email_status").innerHTML;
            var password2html=document.getElementById("password2_status").innerHTML;
            var telephonehtml=document.getElementById("telephone_status").innerHTML;

            if((emailhtml && password2lhtml && telephonedhtml)=="OK")
            {
                return true;//On peut s'inscrire
            }
            else
            {
                return false;//On ne peut pas s'incrire
            }
        }



    </script>




   </body>
</html>