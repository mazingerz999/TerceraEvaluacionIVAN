<!-- SI QUIERO MANTENER UN SELECT DESPUES DE USARLO O UN RADIO O UN CHECKBOX UTILIZO EL SIGUIENTE CODIGO -->
<?php 
        if (isset($_POST['asiento']) && $value['numero']== $_POST['asiento']) {      
        echo " selected='true'";  
        // echo " checked='true'";  
         }; 
 ?>
