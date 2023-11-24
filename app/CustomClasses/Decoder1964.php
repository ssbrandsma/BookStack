<?php

namespace BookStack\CustomClasses;

/**
 * 
 */

class Decoder1964 extends AbstractDecoder
 {

    use Decoder646566DateTrait;
    
    // Model Year Options
    private $modelYears = [
        '5' => ['Description' => '1965'],
    ];

    // Bodies
    private $bodyCodes = [
        '65A' => ['Description' => '2-Door Hardtop, Standard Bucket Seats'],
        '65C' => ['Description' => '2-Door Hardtop, Standard Bench Seats'],
        '76A' => ['Description' => '2-Door Convertible, Standard Bucket Seats'],
        '76C' => ['Description' => '2-Door Convertible, Standard Bench Seats'],
    ];

    private $bodyStyles = [
        '07' => ['Description' => '2-Door Hardtop'],
        '08' => ['Description' => '2-Door Convertible'],
        '09' => ['Description' => '2-Door Fastback'],
    ];

    // Trim Options
    private $trims = [
        '22' => ['Primary Color/Material' => 'Blue Crinkle Vinyl', 'Trim Color/Material' => 'Color-Keyed', 'Notes' => 'Standard Interior'],
        '25' => ['Primary Color/Material' => 'Red Crinkle Vinyl', 'Trim Color/Material' => 'Color-Keyed', 'Notes' => 'Standard Interior'],
        '26' => ['Primary Color/Material' => 'Black Crinkle Vinyl', 'Trim Color/Material' => 'Color-Keyed', 'Notes' => 'Standard Interior'],
        '27' => ['Primary Color/Material' => 'Aqua Crinkle Vinyl', 'Trim Color/Material' => 'Color-Keyed', 'Notes' => 'Standard Interior'],
        '28' => ['Primary Color/Material' => 'Ivy Gold Crinkle Vinyl', 'Trim Color/Material' => 'Color-Keyed', 'Notes' => 'Standard Interior'],
        '29' => ['Primary Color/Material' => 'Palomino Crinkle Vinyl', 'Trim Color/Material' => 'Color-Keyed', 'Notes' => 'Standard Interior'],
        '32' => ['Primary Color/Material' => 'Blue Crinkle Vinyl', 'Trim Color/Material' => 'Color-Keyed', 'Notes' => 'Bench Seat'],
        '35' => ['Primary Color/Material' => 'Red Crinkle Vinyl', 'Trim Color/Material' => 'Color-Keyed', 'Notes' => 'Bench Seat'],
        '36' => ['Primary Color/Material' => 'Black Crinkle Vinyl', 'Trim Color/Material' => 'Color-Keyed', 'Notes' => 'Bench Seat'],
        '39' => ['Primary Color/Material' => 'Palomino Crinkle Vinyl', 'Trim Color/Material' => 'Color-Keyed', 'Notes' => 'Bench Seat'],
        '42' => ['Primary Color/Material' => 'White Crinkle Vinyl', 'Trim Color/Material' => 'Blue Appointments', 'Notes' => '1964.5 Option'],
        '45' => ['Primary Color/Material' => 'White Crinkle Vinyl', 'Trim Color/Material' => 'Red Appointments', 'Notes' => '1964.5 Option'],
        '46' => ['Primary Color/Material' => 'White Crinkle Vinyl', 'Trim Color/Material' => 'Black Appointments', 'Notes' => '1964.5 Option'],
        '48' => ['Primary Color/Material' => 'White Crinkle Vinyl', 'Trim Color/Material' => 'Ivy Gold Appointments', 'Notes' => '1964.5 Option'],
        '49' => ['Primary Color/Material' => 'White Crinkle Vinyl', 'Trim Color/Material' => 'Palomino Appointments', 'Notes' => '1964.5 Option'],
        '56/56A' => ['Primary Color/Material' => 'Black Vinyl and Black Cloth', 'Trim Color/Material' => 'Black', 'Notes' => 'ComfortWeave 1964.5 Option'],
        '62' => ['Primary Color/Material' => 'Light Blue and White Crinkle Vinyl', 'Trim Color/Material' => 'Light Blue', 'Notes' => 'Luxury Interior'],
        '65' => ['Primary Color/Material' => 'Red Crinkle Vinyl', 'Trim Color/Material' => 'Color-Keyed', 'Notes' => 'Luxury Interior'],
        '66' => ['Primary Color/Material' => 'Black Crinkle Vinyl', 'Trim Color/Material' => 'Color-Keyed', 'Notes' => 'Luxury Interior'],
        '67' => ['Primary Color/Material' => 'Light Turquoise and White Crinkle Vinyl', 'Trim Color/Material' => 'Turquoise', 'Notes' => 'Luxury Interior'],
        '68' => ['Primary Color/Material' => 'Ivy Gold and White Crinkle Vinyl', 'Trim Color/Material' => 'Ivy Gold', 'Notes' => 'Luxury Interior'],
        '69' => ['Primary Color/Material' => 'Palomino Crinkle Vinyl', 'Trim Color/Material' => 'Color-Keyed', 'Notes' => 'Luxury Interior'],
        '76' => ['Primary Color/Material' => 'Black Crinkle Vinyl and Black Cloth', 'Trim Color/Material' => 'Black', 'Notes' => 'ComfortWeave 1964.5 Option'],
        '79' => ['Primary Color/Material' => 'Medium Palomino Crinkle Vinyl and Light Palomino Cloth', 'Trim Color/Material' => 'Light Palomino', 'Notes' => 'ComfortWeave 1964.5 Option'],
        '80' => ['Primary Color/Material' => 'White Crinkle Vinyl', 'Trim Color/Material' => 'Color-Keyed', 'Notes' => '1964.5 Option'],
        '82' => ['Primary Color/Material' => 'Blue Crinkle Vinyl', 'Trim Color/Material' => 'Color-Keyed', 'Notes' => '1964.5 Option'],
        '85/85A' => ['Primary Color/Material' => 'Red Crinkle Vinyl', 'Trim Color/Material' => 'Color-Keyed', 'Notes' => '1964.5 Option'],
        '86/86A' => ['Primary Color/Material' => 'Black Crinkle Vinyl', 'Trim Color/Material' => 'Color-Keyed', 'Notes' => '1964.5 Option'],
        '88' => ['Primary Color/Material' => 'Gold Crinkle Vinyl', 'Trim Color/Material' => 'Color-Keyed', 'Notes' => '1964.5 Option'],
        '89' => ['Primary Color/Material' => 'Palomino Crinkle Vinyl', 'Trim Color/Material' => 'Black', 'Notes' => '1964.5 Option'],
        'D2' => ['Primary Color/Material' => 'White Crinkle Vinyl', 'Trim Color/Material' => 'Blue', 'Notes' => ''],
        'D5' => ['Primary Color/Material' => 'White Crinkle Vinyl', 'Trim Color/Material' => 'Red', 'Notes' => ''],
        'D6' => ['Primary Color/Material' => 'White Crinkle Vinyl', 'Trim Color/Material' => 'Black', 'Notes' => ''],
        'D8' => ['Primary Color/Material' => 'White Crinkle Vinyl', 'Trim Color/Material' => 'Ivy Gold', 'Notes' => ''],
        'D9' => ['Primary Color/Material' => 'White Crinkle Vinyl', 'Trim Color/Material' => 'Palomino', 'Notes' => ''],
        'F2' => ['Primary Color/Material' => 'White Crinkle Vinyl', 'Trim Color/Material' => 'Blue Appointments', 'Notes' => 'Luxury/Pony Interior'],
        'F5' => ['Primary Color/Material' => 'White and Red Crinkle Vinyl', 'Trim Color/Material' => 'Red Appointments', 'Notes' => 'Luxury/Pony Interior'],
        'F6' => ['Primary Color/Material' => 'White Crinkle Vinyl', 'Trim Color/Material' => 'Black Appointments', 'Notes' => 'Luxury/Pony Interior'],
        'F7' => ['Primary Color/Material' => 'White and Turquoise Crinkle Vinyl', 'Trim Color/Material' => 'Turquoise Appointments', 'Notes' => 'Luxury/Pony Interior'],
        'F8' => ['Primary Color/Material' => 'White Crinkle Vinyl', 'Trim Color/Material' => 'Ivy Gold Appointments', 'Notes' => 'Luxury/Pony Interior'],
        'F9' => ['Primary Color/Material' => 'White Crinkle Vinyl', 'Trim Color/Material' => 'Palomino Appointments', 'Notes' => 'Luxury/Pony Interior'],
    ];

    private $colors = [
        'A' => ['Color' => 'Raven Black'],
        'B' => ['Color' => 'Pagoda Green'],
        'C' => ['Color' => 'Pace Car White'],
        'D' => ['Color' => 'Dynasty Green'],
        'F' => ['Color' => 'Guardsman Blue'],
        'H' => ['Color' => 'Caspian Blue'],
        'J' => ['Color' => 'Rangoon Red'],
        'K' => ['Color' => 'Silver Smoke Gray'],
        'M' => ['Color' => 'Wimbledon White'],
        'O' => ['Color' => 'Tropical Turquoise'],
        'P' => ['Color' => 'Prairie Bronze'],
        'S' => ['Color' => 'Cascade Green'],
        'V' => ['Color' => 'Sunlight Yellow'],
        'X' => ['Color' => 'Vintage Burgundy'],
        'Y' => ['Color' => 'Skylight Blue'],
        'Z' => ['Color' => 'Chantilly Beige'],
        '3' => ['Color' => 'Poppy Red'],
        '5' => ['Color' => 'Twilight Turquoise'],
        '7' => ['Color' => 'Phoenician Yellow'],
    ];

    private $dates = [
        'xxC' => ['Date' => 'xx March 1964'],
        'xxD' => ['Date' => 'xx April 1964'],
        'xxE' => ['Date' => 'xx May 1964'],
        'xxF' => ['Date' => 'xx June 1964'],
        'xxG' => ['Date' => 'xx July 1964'],
        'xxH' => ['Date' => 'xx August 1964'],
        'xxJ' => ['Date' => 'xx September 1964'],
        'xxK' => ['Date' => 'xx October 1964'],
        'xxL' => ['Date' => 'xx November 1964'],
        'xxM' => ['Date' => 'xx December 1964'],
        'xxA' => ['Date' => 'xx January 1965'],
        'xxB' => ['Date' => 'xx February 1965'],
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

    private $axles = [
        '1' => ['Gear Ratio' => '3.00', 'Notes' => ''],
        '3' => ['Gear Ratio' => '3.20', 'Notes' => ''],
        '4' => ['Gear Ratio' => '3.25', 'Notes' => ''],
        '5' => ['Gear Ratio' => '3.50', 'Notes' => ''],
        '6' => ['Gear Ratio' => '2.80', 'Notes' => ''],
        '7' => ['Gear Ratio' => '3.80', 'Notes' => ''],
        '8' => ['Gear Ratio' => '3.89', 'Notes' => ''],
        '9' => ['Gear Ratio' => '4.11', 'Notes' => ''],
        'A' => ['Gear Ratio' => '3.00', 'Notes' => 'Limited Slip Differential'],
        'C' => ['Gear Ratio' => '3.20', 'Notes' => 'Limited Slip Differential'],
        'D' => ['Gear Ratio' => '3.25', 'Notes' => 'Limited Slip Differential'],
        'E' => ['Gear Ratio' => '3.50', 'Notes' => 'Limited Slip Differential'],
        'F' => ['Gear Ratio' => '2.80', 'Notes' => 'Limited Slip Differential'],
        'G' => ['Gear Ratio' => '3.80', 'Notes' => 'Limited Slip Differential'],
        'H' => ['Gear Ratio' => '3.89', 'Notes' => 'Limited Slip Differential'],
        'I' => ['Gear Ratio' => '4.11', 'Notes' => 'Limited Slip Differential'],
    ];

    private $transmissions = [
        '1' => ['Description' => '3 Speed Manual'],
        '5' => ['Description' => '4 Speed Manual'],
        '6' => ['Description' => 'C-4 Automatic'],
    ];

    private $assemblyPlants = [
        'F' => ['Description' => 'Dearborn, MI'],
        'R' => ['Description' => 'San Jose, CA'],
        'T' => ['Description' => 'Metuchen, NJ'],
    ];

    private $engines = [
        'D' => ['Displacement' => '289 CID', 'Bore' => '4.00"', 'Stroke' => '2.87"', 'Compression Ratio' => '9.0:1', 'Horsepower' => '210 hp @ 4,400 RPM', 'Torque' => '300 lb-ft @ 3,200 RPM', 'Carburetor' => '4-Barrel'],
        'F' => ['Displacement' => '260 CID', 'Bore' => '3.8"', 'Stroke' => '2.87"', 'Compression Ratio' => '8.8:1', 'Horsepower' => '164 hp @ 4,400 RPM', 'Torque' => '258 lb-ft @ 2,400 RPM', 'Carburetor' => '2-Barrel'],
        'K' => ['Displacement' => '289 CID', 'Bore' => '4.00"', 'Stroke' => '2.87"', 'Compression Ratio' => '10.5:1', 'Horsepower' => '271 hp @ 6,000 RPM', 'Torque' => '312 lb-ft @ 3,400 RPM', 'Carburetor' => '4-Barrel'],
        'U' => ['Displacement' => '170 CID', 'Bore' => '3.5"', 'Stroke' => '2.94"', 'Compression Ratio' => '8.7:1', 'Horsepower' => '101 hp @ 4,400 RPM', 'Torque' => '156 lb-ft @ 2,400 RPM', 'Carburetor' => '1-Barrel'],
    ];


    private $translationTable;

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