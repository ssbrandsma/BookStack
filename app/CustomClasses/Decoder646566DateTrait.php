<?php

namespace BookStack\CustomClasses;


/**
 * 
 */

 trait Decoder646566DateTrait
 {

    // function should tanslate format xxA where xx = 13 to 13 January
    public function getDate():string
    {
        if (strlen($this->dataPlate->date) < 3){
            return "";
        }

        $month = "xx" . $this->dataPlate->date[2];
        $translation = $this->translationTable->dates[$month] ?? "";

        if ($translation == ""){
            return $translation;
        }

        $description = array_key_first($translation);
        $value = str_replace("xx",substr($this->dataPlate->date,0,2),reset($translation)); // replace xxX with number from date plate
        return ($description . " " . $value);
    }

    // should return all possible date codes
    public function getDates():array
    {
        return []; // to be implemented
    }

 }