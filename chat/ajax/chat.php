<?php

require '../core/init.php';

if(isset($_POST['method'])===true && empty($_POST['method'])===false){
       $chat= new chat();
       $method = trim($_POST['method']);
       
       if('method'==='fetch'){
           //fetch message and output
           $messages = $chat->fetchMessages();
           if(empty($messages)===true){
               echo 'There are no messages in the chat';
           }
           else{
               foreach ($messages as $message){
                ?>

                <div class ="message"></div>
                    <a href = "#"><?php echo $message['username'];?></a> says:
                    <p><?php echo $message['message'];?></p>
                <?php
                   
               }
           }
           
       } else if ($method === 'throw' && isset($_POST['message']) === true){
           $message = trim($_POST['message']);
           if(empty($message)===false){
               $chat->throw->message($_SESSION['members'], $message);
           }
       }
   }

?>