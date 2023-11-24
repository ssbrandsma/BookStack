<?php

namespace Tests\Feature;

use App\CustomClasses\DataPlate;
use App\CustomClasses\DecoderFactory;
use App\CustomClasses\DecoderInternational;
use Tests\TestCase;

use function PHPUnit\Framework\assertEquals;

class testDecodeAmsterdamVin extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function testExample(): void
    {
        $vin = "AN07EC28041";
        // VIN code   ;Year; build;  bdy; C  ; Tr; A; T; En; Owner                     ; City           ;  Country        ; NL Licence Plate  ;  Photo               ;    Registered
        // AN07EC28041;1965; Sep-65; 65A; F03; 2D; 3; 5; L6;
        $decoder = DecoderFactory::getDecoder($vin);
        
        assertEquals(get_class($decoder), DecoderInternational::class);
        $decoder->setDataPlate(new DataPlate("1965","65A","2D","","","","3","AN","T","5","AN07EC28041"));
        
        $assemblyPlant = $decoder->getAssemblyPlant();
        $trim = $decoder->getTrim();
        $body = $decoder->getBody();
        $color = $decoder->getColor();
        $dso = $decoder->getDistrictCode();
        $axle = $decoder->getAxle();
        $transmission = $decoder->getTransmission();
        $date = $decoder->getDate();
        $engine = $decoder->getEngine();
        assertEquals($assemblyPlant, "Amsterdam, Netherlands");

    }
}
