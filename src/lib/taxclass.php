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
            $txIncome = round($anIncome * 0.4) - 100000;
            return $txIncome;

        }elseif($anIncome > 1800000 && $anIncome <= 3600000){
            $txIncome = round($anIncome * 0.3) + 80000;
            return $txIncome;

        }elseif($anIncome > 3600000 && $anIncome <= 6600000){
            $txIncome = round($anIncome * 0.2) + 440000;
            return $txIncome;

        }elseif($anIncome > 6600000 && $anIncome <= 8500000){
            $txIncome = round($anIncome * 0.1) + 1100000;
            return $txIncome;

        }else{
            $txIncome = 1950000;
            return $txIncome;

        }
    }

    ## 所得税計算用関数 ##
    # 引数：課税所得金額
    public function incometaxCalc($txIncome) {
        $incomeTax = 0;
        if($txIncome < 1950000){
            $incomeTax = round($txIncome * 0.05);
            return $incomeTax;

        }elseif($txIncome < 3300000 && $txIncome >= 1950000){
            $incomeTax = round($txIncome * 0.1) + 97500;
            return $incomeTax;

        }elseif($txIncome < 6950000 && $txIncome >= 3300000){
            $incomeTax = round($txIncome * 0.2) + 427500;
            return $incomeTax;

        }elseif($txIncome < 9000000 && $txIncome >= 6950000){
            $incomeTax = round($txIncome * 0.23) + 636000;
            return $incomeTax;

        }elseif($txIncome < 18000000 && $txIncome >= 9000000){
            $incomeTax = round($txIncome * 0.33) + 1536000;
            return $incomeTax;

        }elseif($txIncome < 40000000 && $txIncome >= 18000000){
            $incomeTax = round($txIncome * 0.4) + 2796000;
            return $incomeTax;

        }elseif($txIncome >= 40000000){
            $incomeTax = round($txIncome * 0.45) + 4796000;
        }
    }

    ## 住民税計算用関数 ##
    # 引数：前年の課税所得
    # 税率：10％固定
    public function rtxCalc($lytxIncome) {
        $residentTax = round($lytxIncome * 0.1);
        return $residentTax;
    }

    ## 雇用保険計算関数 ##
    # 引数：月額報酬
    # 料率：0.003にて固定
    public function employinsuranceCalc($monthlyReward) {
        $eInsurance = round($monthlyReward * 0.003);
        return $eInsurance;
    }
}