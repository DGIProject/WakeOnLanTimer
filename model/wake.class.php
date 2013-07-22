<?php
 
class Wol{
  private $nic;
  public function wake($mac,$ip,$port){
    $this->nic = fsockopen("udp://$ip", "$port");
    if( !$this->nic ){
      fclose($this->nic);
      return false;
    }
    else{
      fwrite($this->nic, $this->pacquet($mac));
      fclose($this->nic);
      return true;
    }
  }
  private function pacquet($Mac){
    $packet = "";
    $packet = "\xFF\xFF\xFF\xFF\xFF\xFF";
    for ($j = 0; $j < 16; $j++){
      for($i = 0; $i < 12; $i=$i + 2){$packet .= chr(hexdec(substr($Mac, $i, 2)));}
    }
    return $packet;
  }
}
?>