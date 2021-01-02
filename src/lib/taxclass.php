<?php

class Tax {

    ## 課税所得計算用関数 ##
    # 引数：年収
    public function txincomeCalc($anIncome) {
        $txIncome = 0;
        if($anIncome > 0 && $anIncome <= 1625000){
            $txIncome = $anIncome - 550000;
            return $txIncome;

        }elseif($anIncome > 1625000 && $anIncome <= 1800000){
            $txIncome = ($anIncome * 0.4) - 100000;
            return $txIncome;

        }elseif($anIncome > 1800000 && $anIncome <= 3600000){
            $txIncome = ($anIncome * 0.3) + 80000;
            return $txIncome;

        }elseif($anIncome > 3600000 && $anIncome <= 6600000){
            $txIncome = ($anIncome * 0.2) + 440000;
            return $txIncome;

        }elseif($anIncome > 6600000 && $anIncome <= 8500000){
            $txIncome = ($anIncome * 0.1) + 1100000;
            return $txIncome;

        }else{
            $txIncome = 1950000;
            return $txIncome;

        }
    }

    ## 住民税計算用関数 ##
    # 引数：前年の課税所得
    # 税率：10％固定
    public function rtxCalc($lytxIncome) {
        $residentTax = $lytxIncome * 0.1;
        return $residentTax;
    }
}