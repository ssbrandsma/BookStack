<?php

namespace Tests\Feature;

use App\CustomClasses\DataPlate;
use App\CustomClasses\Decoder1965;
use App\CustomClasses\DecoderFactory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class testDecode1965 extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {
        $response = $this->get('/');

        $vin = "5R09C157846";
        // VIN code   ;Year; build;  bdy; C  ; Tr; A; T; En; Owner                     ; City           ;  Country        ; NL Licence Plate  ;  Photo               ;    Registered
        // AN07EC28041;1965; Sep-65; 65A; F03; 2D; 3; 5; L6;
        $decoder = DecoderFactory::getDecoder($vin);
        
        $this->assertEquals(get_class($decoder), Decoder1965::class);
        $decoder->setDataPlate(new DataPlate("1965","63A","D2","Y","17L","71","6","R","C","6","5R09C157846"));
        
        $assemblyPlant = $decoder->getAssemblyPlant();
        $trim = $decoder->getTrim();
        $body = $decoder->getBody();
        $color = $decoder->getColor();
        $dso = $decoder->getDistrictCode();
        $axle = $decoder->getAxle();
        $transmission = $decoder->getTransmission();
        $date = $decoder->getDate();
        $engine = $decoder->getEngine();
        $this->assertEquals($assemblyPlant, "San Jose, CA");

        $response->assertStatus(200);
    }
}
