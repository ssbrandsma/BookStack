<?php

namespace BookStack\CustomClasses;

/**
 * 
 */

class DecoderFactory 
 {

    const DECODER_1964          = "DECODER_1964";
    const DECODER_1965          = "DECODER_1964";
    const DECODER_1966          = "DECODER_1964";
    const DECODER_INTERNATIONAL = "DECODER_INTERNATIONAL";
    
    const DECODERS = [  self::DECODER_1964          => Decoder1964::class,
                        self::DECODER_1965          => Decoder1965::class,
                        self::DECODER_1966          => Decoder1964::class,
                        self::DECODER_INTERNATIONAL => DecIoderInternational::class];

    public static function getDecoder(string $vin):?AbstractDecoder
    {
        $serial = substr($vin,5);
        
        if ($vin[0] == '5'){
            // either 1964.5 or 1965
            // check if 1964.5 engine code
            if (in_array($vin[4], ['D','F','U'])){
                return new Decoder1964();
            }

            // continue check for the 1964.5 K codes
            /*
                        Dearborn 2nd letter of VIN = F
                        100001 thru approx 230000 = 64.5
            */
            if ($vin[1] == 'F' && $serial <230000){
                return new Decoder1964();
            }

            /*
                        San Jose 2nd letter of VIN = R
                        100001 thru approx 105000 = 64.5
                        125000 & up = 65
            */
            if ($vin[1] == 'R' && $serial <105000){
                return new Decoder1964();
            }

            /*
                        Metuchen 2nd letter of VIN = T
                        65-only, no 64.5's. They started Feb 1, 1965 with 130001.
            */

            // else 1965
            return new Decoder1965();

        }

        if ($vin[0] == '6'){
            return new Decoder1966();
        }

        if ($vin[0] == "A"){
            return new DecoderInternational();
        }
        return null;
    }
    public function __construct()
    {
    
    }

 }