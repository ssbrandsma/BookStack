<?php

namespace BookStack\CustomClasses;

class DataPlate{
    
    public function __construct(
                                public string $modelYear, 
                                public string $body, 
                                public string $trim, 
                                public string $color, 
                                public string $date,
                                public string $district, 
                                public string $axle, 
                                public string $assemblyPlant,
                                public string $engine,
                                public string $transmission,
                                public string $vin
                                )
    {
        
    }
}