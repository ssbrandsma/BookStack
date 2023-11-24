<?php

namespace BookStack\CustomClasses;

class TranslationTable{
    
    public function __construct(
                                public array $modelYears, 
                                public array $bodies,
                                public array $bodyStyles, 
                                public array $trims, 
                                public array $colors, 
                                public array $dates,
                                public array $districts, 
                                public array $axles, 
                                public array $assemblyPlants,
                                public array $engines,
                                public array $transmissions
                                )
    {
        
    }
}