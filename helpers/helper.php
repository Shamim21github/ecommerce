<?php
 $folder="helpers";
 foreach (glob("{$folder}/*_helper.php") as $filename)
 {
     require_once $filename;
 }
?>