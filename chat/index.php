<?php
require 'core/classes/core.php';
require 'core/classes/chat.php';
?>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="css/style.css">
		<link href="https://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    </head>    
        <body>
        <nav>
            <ul>
                <li><a href="#">Matches</a></li>
                <li><a href="#">Messages</a></li>
                <li><a href="#">Contact</a></li>
                <li><a href="#">Account</a></li>
            </ul>
            
        </nav>
            
            <div class = "chat">
                <div class ="messages">
                
                </div>

                <textarea class ="entry" placeholder="Type your message here..."></textarea>
            </div>
            <script src="http://code.jquery.com/jquery-1.8.2.min.js"></script>
            <script src ="js/chat.js"></script>
    </body>
</html>