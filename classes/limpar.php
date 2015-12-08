<?php
session_start("guardar_os");
session_destroy();
echo "<script type='text/javascript' language='javascript'> 
                  alert ('limpesa feita com sucesso!!');
                  window.location.href='../telas/cadastrar_os.php';
                </script>";

?>