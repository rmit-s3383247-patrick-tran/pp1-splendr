<?php

class chat extends core
{
    public function fetchMessages()
    {
        $query = "SELECT * FROM chat AS c INNER JOIN members AS m ON c.user_id = m.user_id ORDER BY c.timestamp";
        //query db
        $this->query($query);
            
        //return rows
        return $this->rows();
    }
    
    public function throwMessage($user_id, $message)
    {
        $test = mysqli_real_escape_string($db, $message);
        $sql = "INSERT INTO chat(user_id, message, timestamp) VALUES('$user_id', '$test', 'UNIX_TIMESTAMP())'";
        $this->query($sql);
    }
}

?>