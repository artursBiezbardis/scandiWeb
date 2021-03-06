<?php declare(strict_types=1);

namespace App\Models;

use App\Repositories\CheckIfSkuExistInDBRepository;

class Validation

{
    public function skuValidation(string $value, $searchSkuInDB): array
    {
        if ($value === '') {
            $errorMessage = 'Enter value in field!';
            $validStatus = false;
        } elseif (is_numeric($searchSkuInDB)) {
            $errorMessage = 'Sku number exist in Data Base';
            $validStatus = false;
        } else {

            $errorMessage = '';
            $validStatus = true;
        }


        return ['value' => $value, 'errorMessage' => $errorMessage, 'validStatus' => $validStatus];
    }

    public function nameValidation(string $value): array
    {
        $errorMessage = '';
        $validStatus = true;
        if ($value === '') {
            $errorMessage = 'Enter value in field!';
            $validStatus = false;
        }

        return ['errorMessage' => $errorMessage, 'validStatus' => $validStatus, 'value' => $value];
    }

    public function priceValidation(string $value): array
    {
        $errorMessage = '';
        $validStatus = true;
        $validPattern = '/^\d+(\.\d{1,2})?$/';

        if ($value === '') {
            $errorMessage = 'Enter value in field!';
            $validStatus = false;
        } elseif (preg_match($validPattern, $value) == '0') {
            $validStatus = false;
            $errorMessage = 'Enter correct price! "10; 10.1; 10.01"';
        }

        return ['errorMessage' => $errorMessage, 'validStatus' => $validStatus, 'value' => $value];
    }

    public function attributeFieldValidation(string $value): array
    {
        $errorMessage = '';
        $validStatus = true;
        $float = (float)$value;
        if ($value === '') {
            $errorMessage = 'Enter value in field!';
            $validStatus = false;
        } elseif (!is_numeric($value) || $float < 0) {
            $errorMessage = 'This value must be positive number!';
            $validStatus = false;
        }

        return ['errorMessage' => $errorMessage, 'validStatus' => $validStatus, 'value' => $value];


    }


}