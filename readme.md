# Codeboost-API

This Application provide robust API to easily generate PDF, DOCX, CSV file. This is very easy to use and powerful API, our aim to release the pain of developers
and make a easy way to generate their PDF, DOCX, CSV.

# Official Website
http://www.jaidulit.com/codeboost

# Documentation

#### Need to provide all data by array
```php
$option = array(
    'output' => 'table',
    'as' => 'name',
    'type' => 'csv',
    'data' => $data,
    'key'  => 'API key will be here'
);
```
There are five array key where need to put array value

* output
    * Output is the key which present the output type. There are two types of output for example - table(for CSV and DOCX) and plain(for only PDF)

* as
    * As is the key which present the name of the file, for example - document.csv, document.pdf. Here document present for as.

* type
    * Type is the key which stands for the format of the output file. For example - PDF, CSV, DOCX
    
* data
    * Data is the key which stands for data which will be converted into three types. Data needs to be array for CSV and DOCX only not PDF. PDF requires HTML as data
    
* key
    * Key is the API key which needs to generate from user panel.
    
  

> ###### Note: For generating PDF, the output key must be plain not table, table is only for CSV and DOCX


#### Sample Code


```php
<?php
include_once 'RestAPI.php';
use CodeBoost\RestAPI\RestAPI;
$obj = new RestAPI();
$data = array(
        0 => array(
                'name' => 'sohag',
                'age'  => '27',
                'profession' => 'developer',
                'mission' => 'unknown'
        ),

        1 => array(
                'name' => 'rahad',
                'age'  => '24',
                'profession' => 'programmer',
                'mission' => 'unknown'
        ),

        2 => array(
                'name' => 'rupa',
                'age'  => '27',
                'profession' => 'housewife',
                'mission' => 'unknown'
        ),

        3 => array(
                'name' => 'jakir',
                'age'  => '27',
                'profession' => 'housewife',
                'mission' => 'unknown'
        )
);

$html = "<HTML><h2>PDF from HTML using phpToPDF</h2></HTML>";

$option = array(
        'output' => 'table',
        'as' => 'name',
        'type' => 'csv',
        'data' => $data,
        'key'  => 'API key will be here'
);

echo $obj->optionData($option)
```

#### Explanation

* The very first thing is, need to downloaded the API and needs to include

* The namespace needs to refer

* Call the RestAPI class to use the method of that

* data variable provide a associative array for generating CSV or DOCX. Also possible to use the data from database

* html variable provide the html code for generating PDF file

* option variable provide the array with the credential keys of the API.

* Then echo the optionData() method with option variable as parameter

