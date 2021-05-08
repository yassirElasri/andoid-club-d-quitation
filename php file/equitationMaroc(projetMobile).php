 <?php   $servername = 'localhost';  
            $username = 'root';
            $password = ''; 
            $dbname = "projetmobile";
            //On établit la connexion
            $conn = new mysqli($servername, $username, $password,$dbname);
            //On vérifie la connexion
            if($conn->connect_error){
                die(json_encode(array('Erreur '=>$conn->connect_error)));
                } 
                $login=  $_GET["login"];
                $passwd =   $_GET["passwd"];
                $sql = "SELECT * FROM clients where clientEmail= '$login' and passwd=  '$passwd'  ";
                $response = array();
                $resultClientLogin = mysqli_query($conn, $sql);
                $rowClient = mysqli_fetch_assoc($resultClientLogin);
     if(!$rowClient){
            $response = array(
                'status' => false,
                'error' => 'your authentification does not exist in the data base'
            );
        }
        else{
          $response = array(
            'message' => 'Success',
            'user' => $rowClient );  
     }
     echo json_encode($response);?>
