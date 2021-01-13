<?php
class LoginModel extends DB{
    public function account(){
        $qr = "SELECT * FROM admin";
        $rows = mysqli_query($this->con, $qr);
        $mang = array();
        while($row = mysqli_fetch_array($rows)){
            $mang[] = $row;
        }
        return json_encode($mang);
    }
}
?>