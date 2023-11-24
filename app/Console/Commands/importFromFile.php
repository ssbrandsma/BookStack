<?php

namespace BookStack\Console\Commands;

use BookStack\Vehicle;
use Illuminate\Console\Command;

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
                echo "Importing " . $line . PHP_EOL;
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
                echo "Importing " . $line . PHP_EOL;
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
                echo "Importing " . $line . PHP_EOL;
                list($year, $factory, $body, $engine, $serial) = sscanf($data[0], "%c%c%2c%c%6c");
                $vin = $data[0];
                Vehicle::updateOrCreate(
                    ['vin' => $vin],
                    ['modelyear' => trim($year),
                    'factory' => trim($factory),
                    'body' => trim($body),
                    'color' => trim($data[2]),
                    'trim' => trim($data[3]),
                    'dso' => trim($data[5]),
                    'axle' => trim($data[6]),
                    'engine' => trim($engine),
                    'trans' => trim($data[7]),
                    'serial' => trim($serial),
                    'date' => trim($data[4]),
                    'manufactoryear' => trim($data[10]),
                    // Add more fields as needed
                ]);
            }
        }
    }
}
