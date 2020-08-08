<?php
 include 'conn.php';


// If file upload form is submitted 
$status = $statusMsg = '';
if( isset($_POST['Enregistrement']) )
{

    $status = 'error';
    $upload = 'uploads/'; // Repertoire de telechargement
    if(!empty($_FILES["file"]["name"])) { 
        // Obtention information sur le fichier 
        $fileName = basename($_FILES["file"]["name"]); 
        $ext = $_FILES['file']['tmp_name']; 
        
        $fileType = strtolower(pathinfo($fileName, PATHINFO_EXTENSION)); 

        // On peut télécharger la même image en utilisant la rand function
        $final_image = rand(1000,1000000).$fileName;
         
        // Autoriser certains formats d'images 
        $allowTypes = array('jpg','png','jpeg','gif'); 
        if(in_array($fileType, $allowTypes)){

            $upload = $upload.strtolower($final_image); 

            if(move_uploaded_file($ext,$upload)){

                $nom = $_POST['nom'];
                $email = $_POST['email'];
                $password = $_POST['password'];
                $password2 = $_POST['password2'];
                $telephone = $_POST['telephone'];
                $sexe = $_POST['sexe'];


 $sql = "INSERT INTO utilisateur (nom, email, password, password2, telephone, sexe, photo) VALUES ('".$_POST["nom"]."','".$_POST["email"]."','".md5($_POST["password"])."','".md5($_POST["password2"])."','".$_POST["telephone"]."','".$_POST["sexe"]."','".$_POST["photo"]."')";
 $result = $conn->query($sql);
 
 

                 if($insert){ 
                    $status = 'success'; 
                    header('Location: index.php');

                }else{ 
                    echo  'Echec du téléchargement, Veuillez reprendre.'; 
                }  
        }else{ 
            echo 'Désolé, seul les types JPG, JPEG, PNG, & GIF sont autorisés.'; 
        } 
     }else{ 
        echo  'selectionner une image à télécharger.'; 
     }
    }
   }

 $conn->close();
 ?>