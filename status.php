<?php
class Result {
     private  $status;
     private  $message;
    

     function getStatus(){
          return $this->status;
     }
     function getMessage(){
          return $this->message;
     }
     function setStatus($arg){
           $this->status = $arg;
     }
     function setMessage($arg){
           $this->message = $arg;
     }
}


?>