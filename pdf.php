<?php
    function hitungRisiko($kemungkinan, $dampak) {
        $deretnilai = array(
                        9, 15, 16, 23, 25, 
                        6, 12, 16, 19, 24, 
                        4, 10, 14, 17, 22, 
                        2, 7, 11, 13, 21,
                        1, 3, 5, 8, 20
                    );
        $x = 0;
        if($kemungkinan == 1){
            $kemungkinan = 5;
        }elseif($kemungkinan == 2){
            $kemungkinan = 4;
        }elseif($kemungkinan == 3){
            $kemungkinan = 3;
        }elseif($kemungkinan == 4){
            $kemungkinan = 2;
        }elseif($kemungkinan == 5){
            $kemungkinan = 1;
        }
        for($i=1; $i <=5; $i++){
            for($j=1; $j<=5; $j++){
                $y[$i][$j] = $deretnilai[$x];
                if($i == $kemungkinan && $j == $dampak){
                    $nilaiRisiko = $y[$i][$j];
                }
                $x++;
            }
        }
        return $nilaiRisiko;
    }
echo hitungRisiko(1,1);
?>