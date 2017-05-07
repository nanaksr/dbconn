## Slim Dependencies PDO mysql Connection
PDO mysql Connection for [Slim 3 framework](http://www.slimframework.com/).

## Installation
Via composer:
```
composer require nanaksr/dbconn
```
## Example
```
add list database connection on settings
$settings = [
    'settings' => [
      'listdb' => [
          'main' => [
              'dsn'  => 'mysql:host=localhost;dbname=nama_name;charset=utf8',
               'user' => 'root',
               'pass' => 'yourpassword'
           ]
      ]
    ]
];

$c['dbConn'] = function($c){  
    return new \nanaksr\dbconn($c->get('settings')['listdb']);
};


