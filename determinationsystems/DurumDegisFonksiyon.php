<?php
/**
* Class and Function List:
* Function list:
* - siparisDurumDegistir()
* Classes list:
*/
session_start();
function siparisDurumDegistir($authentication) {
				echo "<td><select name='islem'>";
				// satissorumlusu
				if ($authentication == 2) {
								echo "
        <option value='1'>Yapım aşamasında</option>
        <option value='2'>Tamamlandı</option>
        <option value='3'>üretimden teslim aldı</option>
        <option value='4'>depoya teslim edildi</option>
        <option value='5'>Sevkiyatta</option>
        <option value='6'>Sipariş tamamlandı</option>
        ";
				}
				//tedarikpersonel
				else if ($authentication == 1) {
								echo "    
        <option value='1'>Yapım aşamasında</option>
        <option value='2'>Tamamlandı</option>
        ";
				}
				// depo ve sevkiyat
				else if ($authentication == 4) {
								echo " 
        <option value='3'>üretimden teslim aldı</option>
        <option value='4'>depoya teslim edildi</option>
        <option value='5'>Sevkiyatta</option>
        <option value='6'>Sipariş tamamlandı</option>
        ";
				}
				// admin
				else if ($authentication == 3) {
								echo "
        <option value='0'>Bekleniyor</option>
        <option value='1'>Yapım aşamasında</option>
        <option value='2'>Tamamlandı</option>
        <option value='3'>üretimden teslim aldı</option>
        <option value='4'>depoya teslim edildi</option>
        <option value='5'>Sevkiyatta</option>
        <option value='6'>Sipariş tamamlandı</option>
        <option value='7'>Sipariş iptali</option> 
            ";
				}
				echo "</select></td>
<td><i class='fa-solid fa-eye'></i> <i class='fa-solid fa-pen-to-square'></i></td>";
}

?>
                    <!-- echo "<td><select name='islem'>
                            <option value='0'>Bekleniyor</option>
        <option value='1'>Yapım aşamasında</option>
        <option value='2'>Tamamlandı</option>
        <option value='3'>üretimden teslim aldı</option>
        <option value='4'>depoya teslim edildi</option>
        <option value='5'>Sevkiyatta</option>
        <option value='6'>Sipariş tamamlandı</option
                    </select></td>
<td><i class='fa-solid fa-eye'></i> <i class='fa-solid fa-pen-to-square'></i></td>"; -->
