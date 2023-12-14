<?php

namespace BookStack\Console\Commands;

use BookStack\CustomClasses\DataPlate;
use BookStack\CustomClasses\DecoderFactory;
use BookStack\Vehicle;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class importFromFile extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:import-from-file  {arg?} {parm1?} {parm2?} {parm3?}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $type = $this->argument('arg');
        $parm1 = $this->argument('parm1');
        $parm2 = $this->argument('parm2');
        $parm3 = $this->argument('parm3');

        if ($type == 'all'){
            Vehicle::truncate();
            Artisan::call('app:import-from-file csv_amsterdammustang ./import/amsterdam_mustangs/import.csv');
            Artisan::call('app:import-from-file csv_earlymustang ./import/earlymustang/mustangvindbcsv.txt');
            Artisan::call('app:import-from-file csv_isomustang ./import/isomustang/isomustang1965.csv');
            Artisan::call('app:import-from-file csv_isomustang ./import/isomustang/isomustang1966.csv');
            Artisan::call('app:import-from-file csv_mexmmustang ./import/mexicanmustangs/mexicanmustangs.csv');
        }

        if ($type == "csv_earlymustang")
        {
            $fileContents = file($parm1);

            foreach ($fileContents as $line) 
            {
                $data = str_getcsv($line,';');

                /*
                    5F08F106321;76A;M;85;01D;13;1;6;F;F;64;106321
         
                    5	1965 Model Year
                    F	Dearborn, MI
                    08	Convertible
                    F	260 V8 2v
                    106321	Consecutive Unit Number
                    76A	Convertible, Standard Interior
                    M	Wimbledon White
                    85	Red Crinkle Vinyl, Standard
                    01D	
                    13	New York
                    1	3.00 Conventional
                    6	C4 Automatic
                */
                
                list($year, $factory, $body, $engine, $serial) = sscanf($data[0], "%c%c%2c%c%6c");
                $vin = $data[0];

                $exists = Vehicle::query()->where('vin',$vin)->first();
                if ($exists){
                  //  echo "Skip " . $line . PHP_EOL;
                    continue;
                }
                echo "Importing " . $line;
                Vehicle::updateOrCreate(
                    ['vin' => $vin],
                    ['modelyear' => trim($year),
                    'factory' => $factory,
                    'body' => $body,
                    'color' => $data[2],
                    'trim' => $data[3],
                    'dso' => $data[5],
                    'axle' => $data[6],
                    'engine' => $engine,
                    'trans' => $data[7],
                    'serial' => $serial,
                    'date' => $data[4],
                    'manufactoryear' => $data[10],
                    'source' => "early-mustang.com",
                    'thumbnail' => ''
                    // Add more fields as needed
                ]);
            }
        }
        else if ($type == "csv_isomustang")
        {
            /*
                       early: 5F08F100003;76A;A;85;05C;840027;1;6;F;F;64;100003
                       iso:   5F08F100003;F;08;F;100003;76A;A;85;05C;840027;1;6;
                       */
            $fileContents = file($parm1);

            foreach ($fileContents as $line) 
            {
                $data = str_getcsv($line,';');

                /*
                    5F08F106321;76A;M;85;01D;13;1;6;F;F;64;106321

                    5	1965 Model Year
                    F	Dearborn, MI
                    08	Convertible
                    F	260 V8 2v
                    106321	Consecutive Unit Number
                    76A	Convertible, Standard Interior
                    M	Wimbledon White
                    85	Red Crinkle Vinyl, Standard
                    01D	
                    13	New York
                    1	3.00 Conventional
                    6	C4 Automatic
                */
               
                list($year, $factory, $body, $engine, $serial) = sscanf($data[0], "%c%c%2c%c%6c");
                $vin = $data[0];
                $exists = Vehicle::query()->where('vin',$vin)->first();
                if ($exists){
                  //  echo "Skip " . $line . PHP_EOL;
                    continue;
                }
                echo "Importing " . $line;
                Vehicle::updateOrCreate(
                    ['vin' => $vin],
                    ['modelyear' => trim($year),
                    'factory' => trim($factory),
                    'body' => trim($body),
                    'color' => trim($data[6]),
                    'trim' => trim($data[7]),
                    'dso' => trim($data[9]),
                    'axle' => trim($data[10]),
                    'engine' => trim($engine),
                    'trans' => trim($data[11]),
                    'serial' => trim($serial),
                    'date' => trim($data[8]),
                    'manufactoryear' => $year == 5 ? 65 : 66,
                    'source' => "isomustang.org",
                    'thumbnail' => ''
                    // Add more fields as needed
                ]);
            }
        }
        else if ($type == "csv_amsterdammustang")
        {
            /*
              0           1     2      3   4    5   6  7  8   9                           10                  11                 12                13                        14
            VIN code   ;Year; build;  bdy; C  ; Tr; A; T; En; Owner                     ; City           ;  Country        ; NL Licence Plate  ;  Photo               ;    Registered
            AN07EC28041;1965; Sep-65; 65A; F03; 2D; 3; 5; L6; Bert Jonker               ; Amstelveen     ;  Netherlands    ; 11-75-AN          ;  Yes                 ;    Apr-05 
            */
            $fileContents = file($parm1);
            $headerParsed = false;
            foreach ($fileContents as $line) 
            {
                $data = str_getcsv($line,';');
                if (!$headerParsed){
                    $headerParsed = true;
                    continue;
                } 
                echo "Importing " . $line ;

                if (stripos($data[0],"AN") !== false){                                        
                    list($factory, $body, $date, $serial) = sscanf($data[0], "%2c%2c%2c%5c");
                }
                else{
                    // unknown 
                    continue;
                }

                $vin = $data[0];
                Vehicle::updateOrCreate(
                    ['vin' => $vin],
                    ['modelyear' => trim($data[1]),
                    'factory' => trim($factory),
                    'body' => trim($body),
                    'color' => trim($data[4]),
                    'trim' => trim($data[5]),
                    'dso' => "",
                    'axle' => trim($data[6]),
                    'engine' => trim($data[8]),
                    'trans' => trim($data[5]),
                    'serial' => trim($serial),
                    'date' => trim($date),
                    'manufactoryear' => trim($data[1]),
                    'source' => "Amsterdam mustangs" . PHP_EOL . trim($data[9]) . PHP_EOL . trim($data[10]) . PHP_EOL . trim($data[11])
                    // Add more fields as needed
                ]);
            }
        }
        else if ($type == "csv_mexmmustang")
        {
            /*
            0 VIN,
            1 Year,
            2 Est Build,
            3 DIRECCION,
            4 VOLANTE(Wheel),
            5 MOTOR,
            6 TRANS,
            7 EJE(Axle),
            8 FRENOS(Brakes),
            9 VESTIDURA(Interior),
            10 Owner(Last Reported),
            11 Location,
            12 Equipment/Options/Rmks,
            13 Comments/Website,
            14 Registered */

            //5MEX07C105497,1965,,,,,,,,,Unk,Mexico,"Described as being rust-free, but in need of paint.","Offered for sale in Mexico in 2005 for $8000.Referenced on the German-language ""Dr-Mustang"" forum, 26 October 2005.http://www.dr-mustang.com/index.php?name=Forums&file;=viewtopic&t;=13367",26 Oct 05

                /*
                0 AF07FP34940,
                1 1966,
                2 Aug-66,
                3 ,
                4 L,
                5 AC (289),
                6 6 (C-4),
                7 1 (3.00:1),
                8 ,
                9 VD,
                10 Javier Cavazos,
                11 "Monterrey, Mexico",
                12 ,
                13 ,
                14 25 Nov 09
                */

            $fileContents = file($parm1);
            $headerParsed = false;
            foreach ($fileContents as $line) 
            {
                $data = str_getcsv($line,',');
                echo "Importing " . $line . PHP_EOL;

                if (!$headerParsed){
                    $headerParsed = true;
                    continue;
                }            

                if (stripos($data[0],"MEX") !== false){
                    list($year, $factory, $body, $engine, $serial) = sscanf($data[0], "%c%3c%2c%c%6c");
                }
                else if (stripos($data[0],"AF") !== false){

                    list($factory, $body, $date, $serial) = sscanf($data[0], "%2c%2c%2c%5c");
                }
                else{
                    // unknown 
                    continue;
                }
                
                $vin = $data[0];

                Vehicle::updateOrCreate(
                    ['vin' => $vin],
                    ['modelyear' =>  trim($data[1]),
                    'factory' => trim($factory),
                    'body' => trim($body),
                    'color' => "",
                    'trim' => trim($data[9] ?? ""),
                    'dso' => "",
                    'axle' => trim($data[7]),
                    'engine' => trim($engine ?? $data[5]),
                    'trans' => trim($data[6]),
                    'serial' => trim($serial),
                    'date' => trim($date ?? ""),
                    'manufactoryear' => trim($data[1]),
                    'source' => "https://mexicanmustangregistry.com/" . PHP_EOL . trim($data[10]) . PHP_EOL . trim($data[11]) . PHP_EOL . trim($data[12]) . PHP_EOL . trim($data[13])
                ]);
            }

        }
    }
}
