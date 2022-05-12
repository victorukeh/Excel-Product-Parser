<?php

declare(strict_types=1);

// use PHPUnit\Framework\TestCase;

require 'CSVFileIterator.php';
class DataTest extends PHPUnit\Framework\TestCase
{
    /** @test @return array */
    public function provider()
    {
        $file = file_get_contents("work.csv");
        foreach (explode("\n", $file, -1) as $line) {
            $data[] = explode(',', $line);
        }
        return $data;
    }

    /*
 * CREATE TO CSV FILE DATAPROVIDER
 * @return array
 */
    public function saveToCsv()
    {
        $list = array(
            array("make", "model", "color", "capacity", "network", "grade", "condition", "count"),
            array("Hp", "pavilion 13", "black", "512Gb", "available", "grade-A", "good", 12)
        );

        $file = fopen("./Examples/products.csv", "w");
        foreach ($list as $line) {
            fputcsv($file, $line);
        }

        fclose($file);
    }
}

?>