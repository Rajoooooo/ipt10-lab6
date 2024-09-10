<?php
require "../vendor/autoload.php";

use Monolog\Level;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;

// Create a log channel
$log = new Logger('ipt10');

// Create a StreamHandler and set a log level to include INFO and higher levels
$handler = new StreamHandler('ipt10.log'); // Log all levels, including INFO
$log->pushHandler($handler);

// Add records to the log
$log->warning('Rafael John L. Castro');
$log->error('castro.rafaeljohn@auf.edu.ph');
$log->info('profile', [
    'student_number' => '22-0798-586',
    'college' => 'College of Computer Studies',
    'program' => 'Information Technology',
    'university' => 'Angeles University Foundation'
]);

class TestClass
{
    private $logger;

    public function __construct(Logger $logger)
    {
        $this->logger = $logger;
    }

    public function greet($name)
    {
        // Provide a greeting message with the name of the invoker
        $message = "Greetings to {$name}";
        // Log it with the actual message
        $this->logger->info(__METHOD__ . ": " . $message);
        return "Hello, {$name}";
    }

    public function getAverage($data)
    {
        // Check if data is not empty before logging
        if (empty($data)) {
            $this->logger->info(__CLASS__ . " Computing the average with no data.");
            return null;
        }
        $average = array_sum($data) / count($data);
        $this->logger->info(__CLASS__ . " Computed average: {$average}");
        return $average;
    }

    public function largest($data)
    {
        // Check if data is not empty before logging
        if (empty($data)) {
            $this->logger->info(__CLASS__ . " Finding the largest number with no data.");
            return null;
        }
        $largest = max($data);
        $this->logger->info(__CLASS__ . " Largest number found: {$largest}");
        return $largest;
    }

    public function smallest($data)
    {
        // Check if data is not empty before logging
        if (empty($data)) {
            $this->logger->info(__CLASS__ . " Finding the smallest number with no data.");
            return null;
        }
        $smallest = min($data);
        $this->logger->info(__CLASS__ . " Smallest number found: {$smallest}");
        return $smallest;
    }
}

$my_name = 'Rafael John L. Castro';

$obj = new TestClass($log);
echo $obj->greet($my_name);

$data = [100, 345, 4563, 65, 234, 6734, -99];

$log->info('Data', ['data' => $data]);
$average = $obj->getAverage($data);
$largest = $obj->largest($data);
$smallest = $obj->smallest($data);



// // Log the results with meaningful messages
// $log->info('Average', ['average' => $average]);
// $log->info('Largest', ['largest' => $largest]);
// $log->info('Smallest', ['smallest' => $smallest]);
