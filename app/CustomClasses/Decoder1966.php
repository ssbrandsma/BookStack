<?php

namespace BookStack\CustomClasses;

/**
 * 
 */

class Decoder1966 extends AbstractDecoder
 {

    use Decoder646566DateTrait;
    
    private $modelYears = [
        'Code' => '6',
        'Description' => '1966',
    ];
    
    private  $bodyCodes = [
       '63A' => '2-Door Fastback, Standard Bucket Seats',
       '63B' => '2-Door Fastback, Luxury Bucket Seats',
       '65A' => '2-Door Hardtop, Standard Bucket Seats',
       '65B' => '2-Door Hardtop, Luxury Bucket Seats',
       '65C' => '2-Door Hardtop, Standard Bench Seats',
       '76A' => '2-Door Convertible, Standard Bucket Seats',
       '76B' => '2-Door Convertible, Luxury Bucket Seats',
       '76C' => '2-Door Convertible, Standard Bench Seats',
   ];

   private  $bodyStyles = [
        '07' => '2-Door Hardtop',
        '08' => '2-Door Convertible',
        '09' => '2-Door Fastback',
    ];
   

    private $dates = [
        'xxA' => ['Date' => 'xx January'],
        'xxB' => ['Date' => 'xx February'],
        'xxC' => ['Date' => 'xx March'],
        'xxD' => ['Date' => 'xx April'],
        'xxE' => ['Date' => 'xx May'],
        'xxF' => ['Date' => 'xx June'],
        'xxG' => ['Date' => 'xx July'],
        'xxH' => ['Date' => 'xx August'],
        'xxJ' => ['Date' => 'xx September'],
        'xxK' => ['Date' => 'xx October'],
        'xxL' => ['Date' => 'xx November'],
        'xxM' => ['Date' => 'xx December'],
    ];

    private $colors = [
        'A' => 'Raven Black',
        'F' => 'Arcadian Blue',
        'G' => 'Sapphire Blue',
        'H' => 'Sahara Beige',
        'K' => 'Nightmist Blue',
        'M' => 'Wimbledon White',
        'P' => 'Antique Bronze',
        'R' => 'Ivy Green',
        'T' => 'Candyapple Red',
        'U' => 'Tahoe Turquoise',
        'V' => 'Emberglo',
        'X' => 'Vintage Burgundy',
        'Y' => 'Silver Blue',
        'Z' => 'Sauterne Gold',
        '4' => 'Silver Frost',
        '5' => 'Signal Flare Red',
        '8' => 'Springtime Yellow',
    ];

    private $transmissions = [
        '1' => '3 Speed Manual',
        '3' => '3 Speed Manual',
        '5' => '4 Speed Manual',
        '6' => 'C-4 Automatic',
    ];

    private $assemblyPlants = [
        'F' => 'Dearborn, MI',
        'R' => 'San Jose, CA',
        'T' => 'Metuchen, NJ',
    ];

    private $engines = [
        'A' => ['Displacement' => '289 CID', 'Bore' => '4.00"', 'Stroke' => '2.87"', 'Compression Ratio' => '10.0:1', 'Horsepower' => '225 hp @ 4,800 RPM', 'Torque' => '305 lb-ft @ 3,200 RPM', 'Carburetor' => '4-Barrel'],
        'C' => ['Displacement' => '289 CID', 'Bore' => '4.00"', 'Stroke' => '2.87"', 'Compression Ratio' => '9.3:1', 'Horsepower' => '200 hp @ 4,400 RPM', 'Torque' => '282 lb-ft @ 2,400 RPM', 'Carburetor' => '2-Barrel'],
        'K' => ['Displacement' => '289 CID', 'Bore' => '4.00"', 'Stroke' => '2.87"', 'Compression Ratio' => '10.5:1', 'Horsepower' => '271 hp @ 6,000 RPM', 'Torque' => '312 lb-ft @ 3,400 RPM', 'Carburetor' => '4-Barrel'],
        'T' => ['Displacement' => '200 CID', 'Bore' => '3.68"', 'Stroke' => '3.13"', 'Compression Ratio' => '9.2:1', 'Horsepower' => '120 hp @ 4,400 RPM', 'Torque' => '190 lb-ft @ 2,400 RPM', 'Carburetor' => '1-Barrel'],
    ];

    private $districts = [
        '11' => ['City' => 'Boston'],
        '12' => ['City' => 'Buffalo'],
        '13' => ['City' => 'New York'],
        '14' => ['City' => 'Pittsburgh'],
        '15' => ['City' => 'Newark'],
        '21' => ['City' => 'Atlanta'],
        '22' => ['City' => 'Charlotte'],
        '23' => ['City' => 'Philadelphia'],
        '24' => ['City' => 'Jacksonville'],
        '25' => ['City' => 'Richmond'],
        '26' => ['City' => 'Washington'],
        '31' => ['City' => 'Cincinnati'],
        '32' => ['City' => 'Cleveland'],
        '33' => ['City' => 'Detroit'],
        '34' => ['City' => 'Indianapolis'],
        '35' => ['City' => 'Lansing'],
        '36' => ['City' => 'Louisville'],
        '41' => ['City' => 'Chicago'],
        '42' => ['City' => 'Fargo'],
        '43' => ['City' => 'Rockford'],
        '44' => ['City' => 'Twin Cities'],
        '45' => ['City' => 'Davenport'],
        '51' => ['City' => 'Denver'],
        '52' => ['City' => 'Des Moines'],
        '53' => ['City' => 'Kansas City'],
        '54' => ['City' => 'Omaha'],
        '55' => ['City' => 'St. Louis'],
        '61' => ['City' => 'Dallas'],
        '62' => ['City' => 'Houston'],
        '63' => ['City' => 'Memphis'],
        '64' => ['City' => 'New Orleans'],
        '65' => ['City' => 'Oklahoma City'],
        '71' => ['City' => 'Los Angeles'],
        '72' => ['City' => 'San Jose'],
        '73' => ['City' => 'Salt Lake City'],
        '74' => ['City' => 'Seattle'],
        '81' => ['City' => 'Ford of Canada'],
        '83' => ['City' => 'Government'],
        '84' => ['City' => 'Home Office Reserve'],
        '85' => ['City' => 'American Red Cross'],
        '89' => ['City' => 'Transportation Services'],
        '90-99' => ['City' => 'Export'],
    ];

   private $trims = [
       '22' => ['Primary Color/Material' => 'Light Blue Crinkle Vinyl and Medium Blue Rosette Vinyl', 'Trim Color/Material' => 'Color-Keyed', 'Notes' => 'Standard Interior'],
       '22A' => ['Primary Color/Material' => 'Light Blue Crinkle Vinyl', 'Trim Color/Material' => 'Color-Keyed', 'Notes' => 'Standard Interior'],
       '25' => ['Primary Color/Material' => 'Red Crinkle Vinyl and Red Rosette Vinyl', 'Trim Color/Material' => 'Color-Keyed', 'Notes' => 'Standard Interior'],
       '25A' => ['Primary Color/Material' => 'Red Crinkle Vinyl', 'Trim Color/Material' => 'Color-Keyed', 'Notes' => 'Standard Interior'],
       '26' => ['Primary Color/Material' => 'Black Crinkle Vinyl and Black Rosette Vinyl', 'Trim Color/Material' => 'Color-Keyed', 'Notes' => 'Standard Interior'],
       '26A' => ['Primary Color/Material' => 'Black Crinkle Vinyl', 'Trim Color/Material' => 'Color-Keyed', 'Notes' => 'Standard Interior'],
       '27' => ['Primary Color/Material' => 'Light Aqua Crinkle Vinyl and Medium Aqua Rosette Vinyl', 'Trim Color/Material' => 'Color-Keyed', 'Notes' => 'Standard Interior'],
       '27A' => ['Primary Color/Material' => 'Light Aqua Crinkle Vinyl and Medium Aqua Crinkle Vinyl', 'Trim Color/Material' => 'Color-Keyed', 'Notes' => 'Standard Interior'],
       '2DA' => ['Primary Color/Material' => 'Parchment Crinkle Vinyl', 'Trim Color/Material' => 'Color-Keyed', 'Notes' => 'Standard Interior'],
       '32' => ['Primary Color/Material' => 'Light Blue Crinkle Vinyl and Medium Blue Rosette Vinyl', 'Trim Color/Material' => 'Color-Keyed', 'Notes' => 'Bench Seat'],
       '35' => ['Primary Color/Material' => 'Red Crinkle Vinyl and Red Rosette Vinyl', 'Trim Color/Material' => 'Color-Keyed', 'Notes' => 'Bench Seat'],
       '36' => ['Primary Color/Material' => 'Black Crinkle Vinyl and Black Rosette Vinyl', 'Trim Color/Material' => 'Color-Keyed', 'Notes' => 'Bench Seat'],
       '62' => ['Primary Color/Material' => 'Light Blue and White Crinkle Vinyl', 'Trim Color/Material' => 'Light Blue', 'Notes' => 'Luxury/Pony Interior'],
       '62A' => ['Primary Color/Material' => 'Light Blue and White Crinkle Vinyl', 'Trim Color/Material' => 'Light Blue', 'Notes' => 'Bench Seat Pony Interior'],
       '64' => ['Primary Color/Material' => 'Medium Emberglo and Parchment Crinkle Vinyl', 'Trim Color/Material' => 'Emberglo', 'Notes' => 'Luxury/Pony Interior'],
       '64A' => ['Primary Color/Material' => 'Medium Emberglo and Parchment Crinkle Vinyl', 'Trim Color/Material' => 'Emberglo', 'Notes' => 'Bench Seat Luxury/Pony Interior'],
       '65' => ['Primary Color/Material' => 'Red Crinkle Vinyl', 'Trim Color/Material' => 'Color-Keyed', 'Notes' => 'Luxury/Pony Interior'],
       '65A' => ['Primary Color/Material' => 'Red Crinkle Vinyl', 'Trim Color/Material' => 'Color-Keyed', 'Notes' => 'Bench Seat Luxury/Pony Interior'],
       '66' => ['Primary Color/Material' => 'Black Crinkle Vinyl', 'Trim Color/Material' => 'Color-Keyed', 'Notes' => 'Luxury/Pony Interior'],
       '66A' => ['Primary Color/Material' => 'Black Crinkle Vinyl', 'Trim Color/Material' => 'Color-Keyed', 'Notes' => 'Bench Seat Luxury/Pony Interior'],
       '67' => ['Primary Color/Material' => 'Light Aqua and White Crinkle Vinyl', 'Trim Color/Material' => 'Light Aqua', 'Notes' => 'Luxury/Pony Interior'],
       '67A' => ['Primary Color/Material' => 'Light Aqua and White Crinkle Vinyl', 'Trim Color/Material' => 'Light Aqua', 'Notes' => 'Bench Seat Luxury/Pony Interior'],
       '68' => ['Primary Color/Material' => 'Light Ivy Gold and White Crinkle Vinyl', 'Trim Color/Material' => 'Light Ivy Gold', 'Notes' => 'Luxury/Pony Interior'],
       '68A' => ['Primary Color/Material' => 'Light Ivy Gold and White Crinkle Vinyl', 'Trim Color/Material' => 'Light Ivy Gold', 'Notes' => 'Bench Seat Luxury/Pony Interior'],
       'C2' => ['Primary Color/Material' => 'Parchment Crinkle Vinyl and Parchment Rosette Vinyl', 'Trim Color/Material' => 'Blue', 'Notes' => 'Bench Seat'],
       'C3' => ['Primary Color/Material' => 'Parchment Crinkle Vinyl and Parchment Rosette Vinyl', 'Trim Color/Material' => 'Burgundy', 'Notes' => 'Bench Seat'],
       'C4' => ['Primary Color/Material' => 'Parchment Crinkle Vinyl and Parchment Rosette Vinyl', 'Trim Color/Material' => 'Emberglo', 'Notes' => 'Bench Seat'],
       'C6' => ['Primary Color/Material' => 'Parchment Crinkle Vinyl and Parchment Rosette Vinyl', 'Trim Color/Material' => 'Black', 'Notes' => 'Bench Seat'],
       'C7' => ['Primary Color/Material' => 'Parchment Crinkle Vinyl and Parchment Rosette Vinyl', 'Trim Color/Material' => 'Aqua', 'Notes' => 'Bench Seat'],
       'C8' => ['Primary Color/Material' => 'Parchment Crinkle Vinyl and Parchment Rosette Vinyl', 'Trim Color/Material' => 'Ivy Gold', 'Notes' => 'Bench Seat'],
       'C9' => ['Primary Color/Material' => 'Parchment Crinkle Vinyl and Parchment Rosette Vinyl', 'Trim Color/Material' => 'Palomino', 'Notes' => 'Bench Seat'],
       'D2' => ['Primary Color/Material' => 'Parchment Crinkle Vinyl and Parchment Rosette Vinyl', 'Trim Color/Material' => 'Blue'],
       'D2A' => ['Primary Color/Material' => 'Parchment Crinkle Vinyl', 'Trim Color/Material' => 'Blue'],
       'D3' => ['Primary Color/Material' => 'Parchment Crinkle Vinyl and Parchment Rosette Vinyl', 'Trim Color/Material' => 'Burgundy'],
       'D3A' => ['Primary Color/Material' => 'Parchment Crinkle Vinyl', 'Trim Color/Material' => 'Burgundy'],
       'D4' => ['Primary Color/Material' => 'Parchment Crinkle Vinyl and Parchment Rosette Vinyl', 'Trim Color/Material' => 'Emberglo'],
       'D4A' => ['Primary Color/Material' => 'Parchment Crinkle Vinyl', 'Trim Color/Material' => 'Emberglo'],
       'D6' => ['Primary Color/Material' => 'Parchment Crinkle Vinyl and Parchment Rosette Vinyl', 'Trim Color/Material' => 'Black'],
       'D6A' => ['Primary Color/Material' => 'Parchment Crinkle Vinyl', 'Trim Color/Material' => 'Black'],
       'D7' => ['Primary Color/Material' => 'Parchment Crinkle Vinyl and Parchment Rosette Vinyl', 'Trim Color/Material' => 'Aqua'],
       'D7A' => ['Primary Color/Material' => 'Parchment Crinkle Vinyl', 'Trim Color/Material' => 'Aqua'],
       'D8' => ['Primary Color/Material' => 'Parchment Crinkle Vinyl and Parchment Rosette Vinyl', 'Trim Color/Material' => 'Ivy Gold'],
       'D8A' => ['Primary Color/Material' => 'Parchment Crinkle Vinyl', 'Trim Color/Material' => 'Ivy Gold'],
       'D9' => ['Primary Color/Material' => 'Parchment Crinkle Vinyl and Parchment Rosette Vinyl', 'Trim Color/Material' => 'Palomino'],
       'D9A' => ['Primary Color/Material' => 'Parchment Crinkle Vinyl', 'Trim Color/Material' => 'Palomino'],
       'F2' => ['Primary Color/Material' => 'Parchment Crinkle Vinyl', 'Trim Color/Material' => 'Blue', 'Notes' => 'Deluxe Bucket Seat'],
       'F2A' => ['Primary Color/Material' => 'Parchment Crinkle Vinyl', 'Trim Color/Material' => 'Blue', 'Notes' => 'Deluxe Bucket Seat'],
       'F3' => ['Primary Color/Material' => 'Parchment Crinkle Vinyl', 'Trim Color/Material' => 'Burgundy', 'Notes' => 'Deluxe Bucket Seat'],
       'F3A' => ['Primary Color/Material' => 'Parchment Crinkle Vinyl', 'Trim Color/Material' => 'Burgundy', 'Notes' => 'Deluxe Bucket Seat'],
       'F4' => ['Primary Color/Material' => 'Parchment Crinkle Vinyl', 'Trim Color/Material' => 'Emberglo', 'Notes' => 'Deluxe Bucket Seat'],
       'F4A' => ['Primary Color/Material' => 'Parchment Crinkle Vinyl', 'Trim Color/Material' => 'Emberglo', 'Notes' => 'Deluxe Bucket Seat'],
       'F6' => ['Primary Color/Material' => 'Parchment Crinkle Vinyl', 'Trim Color/Material' => 'Black', 'Notes' => 'Deluxe Bucket Seat'],
       'F6A' => ['Primary Color/Material' => 'Parchment Crinkle Vinyl', 'Trim Color/Material' => 'Black', 'Notes' => 'Deluxe Bucket Seat'],
       'F7' => ['Primary Color/Material' => 'Parchment Crinkle Vinyl', 'Trim Color/Material' => 'Aqua', 'Notes' => 'Deluxe Bucket Seat'],
       'F7A' => ['Primary Color/Material' => 'Parchment Crinkle Vinyl', 'Trim Color/Material' => 'Aqua', 'Notes' => 'Deluxe Bucket Seat'],
       'F8' => ['Primary Color/Material' => 'Parchment Crinkle Vinyl', 'Trim Color/Material' => 'Ivy Gold', 'Notes' => 'Deluxe Bucket Seat'],
       'F8A' => ['Primary Color/Material' => 'Parchment Crinkle Vinyl', 'Trim Color/Material' => 'Ivy Gold', 'Notes' => 'Deluxe Bucket Seat'],
       'F9' => ['Primary Color/Material' => 'Parchment Crinkle Vinyl', 'Trim Color/Material' => 'Palomino', 'Notes' => 'Deluxe Bucket Seat'],
       'F9A' => ['Primary Color/Material' => 'Parchment Crinkle Vinyl', 'Trim Color/Material' => 'Palomino', 'Notes' => 'Deluxe Bucket Seat'],
   ];
   
   // 1966 Mustang Rear Gear Ratios
    private $axles = [
        '1' => ['Rear Gear Ratio' => '3.00', 'Notes' => ''],
        '2' => ['Rear Gear Ratio' => '2.83', 'Notes' => ''],
        '3' => ['Rear Gear Ratio' => '3.20', 'Notes' => ''],
        '4' => ['Rear Gear Ratio' => '3.25', 'Notes' => ''],
        '5' => ['Rear Gear Ratio' => '3.50', 'Notes' => ''],
        '6' => ['Rear Gear Ratio' => '2.80', 'Notes' => ''],
        '8' => ['Rear Gear Ratio' => '3.89', 'Notes' => ''],
        'A' => ['Rear Gear Ratio' => '3.00 Limited Slip Differential', 'Notes' => ''],
        'C' => ['Rear Gear Ratio' => '3.20 Limited Slip Differential', 'Notes' => ''],
        'D' => ['Rear Gear Ratio' => '3.25 Limited Slip Differential', 'Notes' => ''],
        'E' => ['Rear Gear Ratio' => '3.50 Limited Slip Differential', 'Notes' => ''],
        'F' => ['Rear Gear Ratio' => '2.80 Limited Slip Differential', 'Notes' => ''],
        'H' => ['Rear Gear Ratio' => '3.89 Limited Slip Differential', 'Notes' => ''],
        'L' => ['Rear Gear Ratio' => '2.83 Limited Slip Differential', 'Notes' => ''],
    ];


    private TranslationTable $translationTable;

    public function __construct()
    {
        $this->translationTable = new TranslationTable($this->modelYears,
                                                        $this->bodyCodes,
                                                        $this->bodyStyles,
                                                        $this->trims,
                                                        $this->colors,
                                                        $this->dates,
                                                        $this->districts,
                                                        $this->axles,
                                                        $this->assemblyPlants,
                                                        $this->engines,
                                                        $this->transmissions);

        parent::__construct($this->translationTable);
    }

 }