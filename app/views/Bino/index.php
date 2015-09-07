<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>

<b>Поле зрения бинокля</b>
</br>
BINO(7x35, 1000/150m) поле зрения:
<?php
    echo $data['field']." градусов";
?>

</br>
<b>Максимальная звездная величина для бинокля(Проницающая сила)</b>
</br>
BINO(10x50) максимальная звездная величина для бинокля:
<?php
    echo " + ".$data['starValue']."m";
?>
</br>
<b>Светосила</b>
</br>
<?php
    echo $data['light'];
?>