<?php 
$conn= new mysqli('db','root','hindikoalam','portal');

if ( ! $conn->set_charset("utf8") )
{
   printf("Error loading character set utf8: %s\n", $conn->error);
}
?>