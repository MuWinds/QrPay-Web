<?php 


 function del_file($filename){


  if(!file_exists($filename)||!is_writable($filename)){

    return false;

  }

  if(unlink($filename)){

    return true;

  }

  return false;

}


var_dump(del_file('1.txt'));
?>