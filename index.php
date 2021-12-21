<?php


$bdd = new PDO('mysql:host=127.0.0.1;dbname=espace_membre;','root', '');



if (isset($_POST['forminscription']))
{
    
    $pseudo = htmlspecialchars($_POST['pseudo']);
    $mail = htmlspecialchars($_POST['mail']);
    $mail2 = htmlspecialchars($_POST['mail2']);
    $mdp = password_hash($_POST['mdp'], PASSWORD_DEFAULT);
    $mdp2 = password_hash($_POST['mdp2'], PASSWORD_DEFAULT);


    if (!empty($_POST['pseudo'])  AND !empty($_POST['mail']) AND !empty($_POST['mail2']) AND !empty($_POST['mdp']) AND !empty($_POST['mdp2']) )

    {

  

        $pseudolenghth = strlen($pseudo);
        if($pseudolenghth <= 255)
        {

            if($mail == $mail2)
            {
                if(filter_var($mail,FILTER_VALIDATE_EMAIL))
                {


                    if($mdp == $mdp2)

                    {
                    echo "nichek";
                    }
                

                    else

                    {
                        $erreur="Vos mots de passes ne coresspondent pas !";

                    }
                        
                }  

                           
            }
            else
            { 
            
            $erreur="Votre adresse mail n'est pas valide!";
            
            }
        
            


        }    
        




        else
        {
         $erreur="Votre pseudo ne doit pas dépasser 255 carctères !";
        }
    }


    else
    {
        $erreur = "Tous les champs doivent être complétés !";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel ="stylesheet" href="style.css">
</head>
<body>
    
    <div align="center">

        <h3>Inscription</h3>
         
        <br /><br/><br/>
  
        <form method="POST" action="" >

         <table>
            <tr>
                <td align="right">
                    <label for="pseudo">Pseudo: </label></td>
                        <td> <input type="text"    placeholder="Votre pseudo"  id ="pseudo" name ="pseudo" value="<?php if (isset($pseudo)) {echo $pseudo;}   ?>" />
                            </td>
            </tr>


            <tr>
                <td align="right"> 
                    <label for="mail">Mail: </label></td>
                        <td> <input type="email"    placeholder="Votre mail" id ="mail"  name ="mail"    value="<?php if (isset($mail)) {echo $mail;}   ?>" />
                            </td>
            </tr>


            <tr>
                <td align="right">
                    <label for="mail">Confirmation du mail: </label></td>
                        <td> <input type="email"    placeholder="Votre mail de confirmation" id ="mail2" name ="mail2"  value="<?php if (isset($mail2)) {echo $mail2;}   ?>"/>
                            </td>
            </tr>



            <tr>
                <td align="right">
                    <label for="mdp">Mot de passe: </label></td>
                        <td> <input type="password"    placeholder="Votre mot de passe" id ="mdp"  name="mdp"/>
                            </td>
            </tr>

            <tr>
                <td align="right">
                    <label for="mdp2">Confirmer votre mot de passe: </label></td>
                        <td> <input type="password"    placeholder="Confirmer votre mot de passe" id ="mdp2"  name="mdp2"/>
                            </td>
            </tr>
             

            <tr>
                 
                <td></td>
                <td align ="center">

                <br/> 
                
                <input type="submit" name="forminscription" value="Je m'inscris" />
                
                </td>
                  
                 
            </table>

        </form>
           <?php
             
             if(isset($erreur)) 

               {
                   echo '<font color ="red">'.$erreur."</font>" ;
               }

           ?>
    </div>




</body>
</html>