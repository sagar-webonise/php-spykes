<?php

if ($_FILES["file"]["error"] > 0)
  {
  echo "Error: " . $_FILES["file"]["error"] . "<br />";
  }
else
  {
  $fileName = $_FILES["file"]["name"];
  $fileType = $_FILES["file"]["type"];
  $fileSize = ($_FILES["file"]["size"] / 1024);
  $tempDir = $_FILES["file"]["tmp_name"];
  $mimeType = mime_content_type($tempDir);
  if(!strcmp($mimeType,"application/x-executable")){
      echo "Sorry You are uploading executable file";
      
  }
  else if($mimeType=="text/x-shellscript")
  {
      
       echo "Sorry You are uploading bash  file";
  }
  
  else{
    
  
  echo "Upload: " . $fileName . "<br />";
  echo "Type: " . $fileType . "<br />";
  echo "Size: " . $fileSize . " Kb<br />";
  echo "Stored in: " . $tempDir."<br/>";
  echo "Mime type : ".$mimeType;
  }
  }
?>
