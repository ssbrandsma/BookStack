<?php

namespace BookStack\CustomClasses;

use App\CustomClasses\DataPlate;

/**
 * 
 */

 abstract class AbstractDecoder
 {
    protected DataPlate $dataPlate;
    protected TranslationTable $translationTable;

    // function should tanslate format xxA where xx = 13 to 13 January
    abstract public function getDate():string;   

    // should return all possible date codes
    abstract public function getDates():array;


    public function setDataPlate(DataPlate $dataPlate)
    {
        $this->dataPlate = $dataPlate;
    }

    public function __construct(TranslationTable $translationTable)
    {
        $this->translationTable = $translationTable;
    }

    public function getBody():string
    {
        $result = $this->translationTable->bodies[$this->dataPlate->body] ?? "";
        return $this->returnFirstValue($result);
    }

    public function getBodies():array
    {
        return array_keys($this->translationTable->bodies);   
    }


    public function getTrim():string
    {
        $result = $this->translationTable->trims[$this->dataPlate->trim] ?? "";
        return $this->returnFirstValue($result);
    }
    public function getTrims():array
    {
        return $this->translationTable->trims;
    }

    public function getColor():string
    {
        $result = $this->translationTable->colors[$this->dataPlate->color] ?? "";
        return $this->returnFirstValue($result);
    }

    public function getColors():array
    {
        return $this->translationTable->colors;
    }

    public function getDistrictCode():string
    {
        $result = $this->translationTable->districts[$this->dataPlate->district] ?? "";
        return $this->returnFirstValue($result);
    }
    public function getDistrictCodes():array
    {
        return $this->translationTable->districts;
    }

    public function getAxle():string
    {
        $result = $this->translationTable->axles[$this->dataPlate->axle] ?? "";
        return $this->returnFirstValue($result);
    }
    public function getAxles():array
    {
        return $this->translationTable->axles;
    }

    public function getTransmission():string
    {
        $result = $this->translationTable->transmissions[$this->dataPlate->transmission] ?? "";
        return $this->returnFirstValue($result);
    }
    public function getTransmissions():array
    {
        return $this->translationTable->axles;
    }

    public function getModelYear():string
    {
        $result = $this->translationTable->modelYears[$this->dataPlate->modelYear] ?? "";
        return $this->returnFirstValue($result);
    }
    public function getModelYears():array
    {
        return $this->translationTable->modelYears;
    }

    public function getAssemblyPlant():string
    {
        $result = $this->translationTable->assemblyPlants[$this->dataPlate->assemblyPlant] ?? "";
        return $this->returnFirstValue($result);
    }
    public function getAssemblyPlants():array
    {
        return $this->translationTable->assemblyPlants;
    }

    public function getEngine():string
    {
        $result = $this->translationTable->engines[$this->dataPlate->engine] ?? "";
        return $this->returnFirstValue($result);
    }
    public function getEngines():array
    {
        return $this->translationTable->engines;
    }

    private function returnFirstValue($result)
    {
        return ($result == "") ? "" : reset($result); // return first value 
    }
    
 }