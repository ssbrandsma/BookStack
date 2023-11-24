<?php

namespace BookStack\CustomClasses;

/**
 * 
 */

class DecoderInternational extends AbstractDecoder
{

    /**
     * example: AN07EC28041
     * VIN Element Codes:
     * -----------------
     * - A: Country of Origin
     *    - A = Ford USA
     *    - B = England
     *    - C = Netherlands
     *    - G = West Germany
     *    - J = Australia
     *    - W = Spain
     *
     * - F/J/N/T: Production Facility
     *    - A = Australia*
     *    - B = Genk
     *    - C = Saarlouis
     *    - F = La Villa, Mexico City
     *    - G = Broadmeadows, Australia
     *    - J = Valencia, Venezuela
     *    - N = Amsterdam, Netherlands
     *    - P = Valencia, Spain
     *    - T = Lima, Peru
     *    (*Later (?) Cologne (Koln), West Germany)
     *
     * - 07/01: Body Code
     *    - Coupes Only (Except for 1973 Mexican Mach 1, using code "02")
     *
    * - A-W: Year of Production
    *    - Calendar Year, not Model Year
    *    - Model Year change appears to have occurred on or around 1 September annually
    *    - Years:
    *      - A = 1961
    *      - B = 1962
    *      - C = 1963
    *      - D = 1964
    *      - E = 1965
    *      - F = 1966
    *      - G = 1967
    *      - H = 1968
    *      - J = 1969
    *      - K = 1970
    *      - L = 1971
    *      - M = 1972
    *      - N = 1973
    *      - P = 1974
    *      - R = 1975
    *      - S = 1976
    *      - T = 1977
    *      - U = 1978
    *      - V = 1979
    *      - W = 1980
    *
    * - A-Y: Month of Production (European and Mexican models only)
    *    - Cars built in Venezuela and Peru used the standard U.S. "A-Z" coding, skipping the letters "I" and "O".
    *    - Conventions:
    *      - Jan: B, R, A, G, C, K, D, E, L, Y, S, T (Years: 1964, 1968, 1972, 1976, 1980)
    *      - Feb: J, U, M, P, B, R, A, G, C, K, D, E (Years: 1965, 1969, 1973, 1977, 1981)
    *      - Mar: L, Y, S, T, J, U, M, P, B, R, A, G (Years: 1966, 1970, 1974, 1978, 1982)
    *      - Apr: C, K, D, E, L, Y, S, T, J, U, M, P (Years: 1967, 1971, 1975, 1979, 1983)
    *      - May: B, R, A, G, C, K, D, E, L, Y, S, T (Years: 1968, 1972, 1976, 1980, 1984)
    *      - Jun: J, U, M, P, B, R, A, G, C, K, D, E (Years: 1969, 1973, 1977, 1981, 1985)
    *      - Jul: L, Y, S, T, J, U, M, P, B, R, A, G (Years: 1970, 1974, 1978, 1982, 1986)
    *      - Aug: C, K, D, E, L, Y, S, T, J, U, M, P (Years: 1971, 1975, 1979, 1983, 1987)
    *      - Sep: B, R, A, G, C, K, D, E, L, Y, S, T (Years: 1972, 1976, 1980, 1984, 1988)
    *      - Oct: J, U, M, P, B, R, A, G, C, K, D, E (Years: 1973, 1977, 1981, 1985, 1989)
    *      - Nov: L, Y, S, T, J, U, M, P, B, R, A, G (Years: 1974, 1978, 1982, 1986, 1990)
    *      - Dec: C, K, D, E, L, Y, S, T, J, U, M, P (Years: 1975, 1979, 1983, 1987, 1991)
    *
    * - xxxxx: Consecutive Unit Number
    *    - Five digits only, starting with "10001" each model year.
    *    - With the possible exception of cars produced at Ford's Amsterdam plant, whose numbering appears to cross model years.
    */

    private $countriesOfOrigin= [
        'A' => 'Ford USA',
        'B' => 'England',
        'C' => 'Netherlands',
        'G' => 'West Germany',
        'J' => 'Australia',
        'W' => 'Spain',
    ];

    private $productionFacilities = [
        'A' => 'Australia*',
        'B' => 'Genk',
        'C' => 'Saarlouis',
        'F' => 'La Villa, Mexico City',
        'G' => 'Broadmeadows, Australia',
        'J' => 'Valencia, Venezuela',
        'N' => 'Amsterdam, Netherlands',
        'P' => 'Valencia, Spain',
        'T' => 'Lima, Peru',
    ];

    private $assemblyPlants = [
        'AN' => ['Description' => 'Amsterdam, Netherlands'],
        'AF' => ['Description' => 'La Villa, Mexico City'],
        'AT' => ['Description' => 'Lima, Peru'],
    ];

    private $yearMonthLookup = [
        '1964' => ['B' => 'Jan', 'R' => 'Feb', 'A' => 'Mar', 'G' => 'Apr', 'C' => 'May', 'K' => 'Jun', 'D' => 'Jul', 'E' => 'Aug', 'L' => 'Sep', 'Y' => 'Oct', 'S' => 'Nov', 'T' => 'Dec'],
        '1965' => ['J' => 'Jan', 'U' => 'Feb', 'M' => 'Mar', 'P' => 'Apr', 'B' => 'May', 'R' => 'Jun', 'A' => 'Jul', 'G' => 'Aug', 'C' => 'Sep', 'K' => 'Oct', 'D' => 'Nov', 'E' => 'Dec'],
        '1966' => ['L' => 'Jan', 'Y' => 'Feb', 'S' => 'Mar', 'T' => 'Apr', 'J' => 'May', 'U' => 'Jun', 'M' => 'Jul', 'P' => 'Aug', 'B' => 'Sep', 'R' => 'Oct', 'A' => 'Nov', 'G' => 'Dec'],
        '1967' => ['C' => 'Jan', 'K' => 'Feb', 'D' => 'Mar', 'E' => 'Apr', 'L' => 'May', 'Y' => 'Jun', 'S' => 'Jul', 'T' => 'Aug', 'J' => 'Sep', 'U' => 'Oct', 'M' => 'Nov', 'P' => 'Dec'],
        '1968' => ['B' => 'Jan', 'R' => 'Feb', 'A' => 'Mar', 'G' => 'Apr', 'C' => 'May', 'K' => 'Jun', 'D' => 'Jul', 'E' => 'Aug', 'L' => 'Sep', 'Y' => 'Oct', 'S' => 'Nov', 'T' => 'Dec'],
        '1969' => ['J' => 'Jan', 'U' => 'Feb', 'M' => 'Mar', 'P' => 'Apr', 'B' => 'May', 'R' => 'Jun', 'A' => 'Jul', 'G' => 'Aug', 'C' => 'Sep', 'K' => 'Oct', 'D' => 'Nov', 'E' => 'Dec'],
        '1970' => ['L' => 'Jan', 'Y' => 'Feb', 'S' => 'Mar', 'T' => 'Apr', 'J' => 'May', 'U' => 'Jun', 'M' => 'Jul', 'P' => 'Aug', 'B' => 'Sep', 'R' => 'Oct', 'A' => 'Nov', 'G' => 'Dec'],
        '1971' => ['C' => 'Jan', 'K' => 'Feb', 'D' => 'Mar', 'E' => 'Apr', 'L' => 'May', 'Y' => 'Jun', 'S' => 'Jul', 'T' => 'Aug', 'J' => 'Sep', 'U' => 'Oct', 'M' => 'Nov', 'P' => 'Dec'],
        '1972' => ['B' => 'Jan', 'R' => 'Feb', 'A' => 'Mar', 'G' => 'Apr', 'C' => 'May', 'K' => 'Jun', 'D' => 'Jul', 'E' => 'Aug', 'L' => 'Sep', 'Y' => 'Oct', 'S' => 'Nov', 'T' => 'Dec'],
        '1973' => ['J' => 'Jan', 'U' => 'Feb', 'M' => 'Mar', 'P' => 'Apr', 'B' => 'May', 'R' => 'Jun', 'A' => 'Jul', 'G' => 'Aug', 'C' => 'Sep', 'K' => 'Oct', 'D' => 'Nov', 'E' => 'Dec'],
        '1974' => ['L' => 'Jan', 'Y' => 'Feb', 'S' => 'Mar', 'T' => 'Apr', 'J' => 'May', 'U' => 'Jun', 'M' => 'Jul', 'P' => 'Aug', 'B' => 'Sep', 'R' => 'Oct', 'A' => 'Nov', 'G' => 'Dec'],
        '1975' => ['C' => 'Jan', 'K' => 'Feb', 'D' => 'Mar', 'E' => 'Apr', 'L' => 'May', 'Y' => 'Jun', 'S' => 'Jul', 'T' => 'Aug', 'J' => 'Sep', 'U' => 'Oct', 'M' => 'Nov', 'P' => 'Dec'],
        '1976' => ['B' => 'Jan', 'R' => 'Feb', 'A' => 'Mar', 'G' => 'Apr', 'C' => 'May', 'K' => 'Jun', 'D' => 'Jul', 'E' => 'Aug', 'L' => 'Sep', 'Y' => 'Oct', 'S' => 'Nov', 'T' => 'Dec'],
        '1977' => ['J' => 'Jan', 'U' => 'Feb', 'M' => 'Mar', 'P' => 'Apr', 'B' => 'May', 'R' => 'Jun', 'A' => 'Jul', 'G' => 'Aug', 'C' => 'Sep', 'K' => 'Oct', 'D' => 'Nov', 'E' => 'Dec'],
        '1978' => ['L' => 'Jan', 'Y' => 'Feb', 'S' => 'Mar', 'T' => 'Apr', 'J' => 'May', 'U' => 'Jun', 'M' => 'Jul', 'P' => 'Aug', 'B' => 'Sep', 'R' => 'Oct', 'A' => 'Nov', 'G' => 'Dec'],
        '1979' => ['C' => 'Jan', 'K' => 'Feb', 'D' => 'Mar', 'E' => 'Apr', 'L' => 'May', 'Y' => 'Jun', 'S' => 'Jul', 'T' => 'Aug', 'J' => 'Sep', 'U' => 'Oct', 'M' => 'Nov', 'P' => 'Dec'],
        '1980' => ['B' => 'Jan', 'R' => 'Feb', 'A' => 'Mar', 'G' => 'Apr', 'C' => 'May', 'K' => 'Jun', 'D' => 'Jul', 'E' => 'Aug', 'L' => 'Sep', 'Y' => 'Oct', 'S' => 'Nov', 'T' => 'Dec'],
        '1981' => ['J' => 'Jan', 'U' => 'Feb', 'M' => 'Mar', 'P' => 'Apr', 'B' => 'May', 'R' => 'Jun', 'A' => 'Jul', 'G' => 'Aug', 'C' => 'Sep', 'K' => 'Oct', 'D' => 'Nov', 'E' => 'Dec'],
        '1982' => ['L' => 'Jan', 'Y' => 'Feb', 'S' => 'Mar', 'T' => 'Apr', 'J' => 'May', 'U' => 'Jun', 'M' => 'Jul', 'P' => 'Aug', 'B' => 'Sep', 'R' => 'Oct', 'A' => 'Nov', 'G' => 'Dec'],
        '1983' => ['C' => 'Jan', 'K' => 'Feb', 'D' => 'Mar', 'E' => 'Apr', 'L' => 'May', 'Y' => 'Jun', 'S' => 'Jul', 'T' => 'Aug', 'J' => 'Sep', 'U' => 'Oct', 'M' => 'Nov', 'P' => 'Dec'],
        '1984' => ['B' => 'Jan', 'R' => 'Feb', 'A' => 'Mar', 'G' => 'Apr', 'C' => 'May', 'K' => 'Jun', 'D' => 'Jul', 'E' => 'Aug', 'L' => 'Sep', 'Y' => 'Oct', 'S' => 'Nov', 'T' => 'Dec'],
        '1985' => ['J' => 'Jan', 'U' => 'Feb', 'M' => 'Mar', 'P' => 'Apr', 'B' => 'May', 'R' => 'Jun', 'A' => 'Jul', 'G' => 'Aug', 'C' => 'Sep', 'K' => 'Oct', 'D' => 'Nov', 'E' => 'Dec'],
        '1986' => ['L' => 'Jan', 'Y' => 'Feb', 'S' => 'Mar', 'T' => 'Apr', 'J' => 'May', 'U' => 'Jun', 'M' => 'Jul', 'P' => 'Aug', 'B' => 'Sep', 'R' => 'Oct', 'A' => 'Nov', 'G' => 'Dec'],
        '1987' => ['C' => 'Jan', 'K' => 'Feb', 'D' => 'Mar', 'E' => 'Apr', 'L' => 'May', 'Y' => 'Jun', 'S' => 'Jul', 'T' => 'Aug', 'J' => 'Sep', 'U' => 'Oct', 'M' => 'Nov', 'P' => 'Dec'],
        '1988' => ['B' => 'Jan', 'R' => 'Feb', 'A' => 'Mar', 'G' => 'Apr', 'C' => 'May', 'K' => 'Jun', 'D' => 'Jul', 'E' => 'Aug', 'L' => 'Sep', 'Y' => 'Oct', 'S' => 'Nov', 'T' => 'Dec'],
    ];
    
    private $yearLookup = [
        'A' => 1961,
        'B' => 1962,
        'C' => 1963,
        'D' => 1964,
        'E' => 1965,
        'F' => 1966,
        'G' => 1967,
        'H' => 1968,
        'J' => 1969,
        'K' => 1970,
        'L' => 1971,
        'M' => 1972,
        'N' => 1973,
        'P' => 1974,
        'R' => 1975,
        'S' => 1976,
        'T' => 1977,
        'U' => 1978,
        'V' => 1979,
        'W' => 1980,
    ];
    
        

    public function getDate(): string
    {
        /* * example: AN07EC28041*/
        $yearCode = $this->dataPlate->vin[4];
        $monthCode = $this->dataPlate->vin[5];

        $year = $this->yearLookup[$yearCode];
        $month = $this->yearMonthLookup[$year][$monthCode];

        return "{$month} {$year}";
    }

    public function getDates(): array
    {
        return [];   
    }

    // Model Year Options
    private $modelYears = [
        '5' => ['Description' => '1965'],
        '6' => ['Description' => '1966'],
    ];

    private $bodyCodes = [
        '65A' => ['Description' => '2-Door Hardtop, Standard Bucket Seats'],
    ];

    private $bodyStyles = [
        '07' => ['Description' => '2-Door Hardtop'],
    ];

    private $colors = [
      
    ];

    private $dates = [
      
    ];

    private $districts = [
      
    ];

    private $transmissions = [
        '1' => ['Description' => '3 Speed Manual'],
        '3' => ['Description' => '3 Speed Manual'],
        '5' => ['Description' => '4 Speed Manual'],
        '6' => ['Description' => 'C-4 Automatic'],
    ];

    private $engines = [
        'A' => ['Displacement' => '289 CID', 'Bore' => '4.00"', 'Stroke' => '2.87"', 'Compression Ratio' => '10.0:1', 'Horsepower' => '225 hp @ 4,800 RPM', 'Torque' => '305 lb-ft @ 3,200 RPM', 'Carburetor' => '4-Barrel'],
        'C' => ['Displacement' => '289 CID', 'Bore' => '4.00"', 'Stroke' => '2.87"', 'Compression Ratio' => '9.3:1', 'Horsepower' => '200 hp @ 4,400 RPM', 'Torque' => '282 lb-ft @ 2,400 RPM', 'Carburetor' => '2-Barrel'],
        'K' => ['Displacement' => '289 CID', 'Bore' => '4.00"', 'Stroke' => '2.87"', 'Compression Ratio' => '10.5:1', 'Horsepower' => '271 hp @ 6,000 RPM', 'Torque' => '312 lb-ft @ 3,400 RPM', 'Carburetor' => '4-Barrel'],
        'T' => ['Displacement' => '200 CID', 'Bore' => '3.68"', 'Stroke' => '3.13"', 'Compression Ratio' => '9.2:1', 'Horsepower' => '120 hp @ 4,400 RPM', 'Torque' => '190 lb-ft @ 2,400 RPM', 'Carburetor' => '1-Barrel'],
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

    public function __construct()
    {
        $translationTable = new TranslationTable($this->modelYears,
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

        parent::__construct($translationTable);
    }

 }