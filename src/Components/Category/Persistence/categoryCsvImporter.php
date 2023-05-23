<?php

namespace App\Components\Category\Persistence;

use App\DTO\CategoryDTO;
use League\Csv\Reader;


class categoryCsvImporter
{
    public $name;

    public function __construct($name)
    {
        $this->name = $name;
    }

    public function readCSV()
    {
        $csvFile = __DIR__ . '/../../../Service/category-csv';

        $csv = Reader::createFromPath($csvFile);
        $csv->setHeaderOffset(0); // Assuming the first row contains headers

        $data = array(); // Array to store the DTO objects

// Iterate over each record in the CSV
        foreach ($csv as $record) {
            // Create a CategoryDTO object from the CSV record
            $dto = new CategoryDTO();
            $dto->name = $record['name'];


            $data[] = $dto; // Store the DTO object in the data array
        }
        return $data;
    }
}

// Now you can use the $data array containing DTO objects
