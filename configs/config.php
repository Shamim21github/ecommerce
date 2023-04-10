<?php
$folder="configs";
foreach (glob("{$folder}/*_config.php") as $filename)
{
    include_once $filename;
}
?>