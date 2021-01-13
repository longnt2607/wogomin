<?php
class UsersModel extends DB{
    public function user(){
        $qr = "SELECT * FROM user";
        $rows = mysqli_query($this->con, $qr);
        $mang = array();
        while($row = mysqli_fetch_array($rows)){
            $mang[] = $row;
        }
        return json_encode($mang);
    }

    public function topWallet(){
        $qr = "SELECT * FROM (SELECT * FROM user ORDER BY wallet DESC LIMIT 10) dt ORDER BY dt.wallet DESC";
        $rows = mysqli_query($this->con, $qr);
        $mang = array();
        while($row = mysqli_fetch_array($rows)){
            $mang[] = $row;
        }
        return json_encode($mang);
    }
}
?>