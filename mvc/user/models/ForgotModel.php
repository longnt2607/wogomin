<?php
class ForgotModel extends DB{
    public function account(){
        $qr = "SELECT * FROM user";
        $rows = mysqli_query($this->con, $qr);
        $result = array();
        while($row = mysqli_fetch_array($rows)){
            $result[] = $row;
        }
        return json_encode($result);
    }
}
?>