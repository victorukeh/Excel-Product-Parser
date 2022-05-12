# Excel-Product-Parser
A PHP parser that parses data from excel spreadsheet matches the data, reorganizes the data and generates count for each row.
## Installation
This program runs on PHP 7.4.16. Ensure you have PHP 7+ rummimg on your machine to ensure program runs correctly. To use this software, clone this repository to your machine from https://github.com/victorukeh/Excel-Product-Parser and it shoulld be good to go.

## Usage
Navigate inside the Excel-Product-Parser folder on your cli and run
```bash
php -f parser.php
```
The file to be parsed should be named parse.csv and the document produced will be named products.csv. Both documents will be in the same working directory with the parser.php file.
## Testing
Unit tests were carried out using PHP Unit. This was made possible by the inclusion of composer in this project. Composer was included by running the following cmmands in the working directory.
```bash
composer require --dev phpunit/phpunit ^9
./vendor/bin/phpunit --version //To check the version
```
To run tests on the test cases, You run the command below.
```bash
vendor/bin/phpunit tests/DataTest.php
```
## Contributing
Pull requests are welcome. For major changes, please open an issue first to discuss what you would like to change.

Please make sure to update tests as appropriate.

## License
[MIT](https://choosealicense.com/licenses/mit/)