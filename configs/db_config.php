<?php   
   //Remote
   
     define("SERVER","localhost");
     define("USER","root");
     define("DATABASE","test");
     define("PASSWORD","");

   //Local
   
    //define("SERVER","localhost");
    //define("USER","root");
    //define("DATABASE","hosting");
    //define("PASSWORD","");

    $db=new mysqli(SERVER,USER,PASSWORD,DATABASE);
    $tx="core_";
    

?>