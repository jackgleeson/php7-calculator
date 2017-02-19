# Calculator 2.0
PHP 7.1 Calculator API

## Install
1. clone the repository
2. cd /in/to/project/
3. install composer (https://getcomposer.org/download/)
4. run ```php composer.phar install```

## Running application
1. cd ```/to/project/```
2. run ```php -S localhost:8000 -t public/```
3. browse to ```localhost:8000/```

## Tests
1. run tests with: ```php bin/phpspec run --format=pretty```
2. run tests with coverage and html output: ```phpdbg -qrr bin/phpspec run --format=pretty -c phpspec_with_coverage.yml``` html will be dumped to ```public/coverage``` you can open ```localhost:8000/coverage/``` to view.

## Configuring Unicode Operators
1. edit at ```/app/src/config.php```

## Example Calculator API Requests
#### POST /Add:
```
Content-Type: application/json
{
    "operand_one": 55,
    "operand_two": 40
}
```

#### Response:
```
{
  "result": 95
}
```

#### POST /Add (with errors):
```
Content-Type: application/json
{
    "operand_one": 55,
    "operand_two": false
}
```


#### Response (with errors):

```
{
  "error": "operand_two is not a valid number"
}
```
