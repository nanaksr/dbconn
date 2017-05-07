## Slim Dependencies PDO mysql Connection
PDO mysql Connection for [Slim 3 framework](http://www.slimframework.com/).

## Installation
Via composer:
```
composer require nanaksr/dbconn
```
## Configuration
Create an array of session settings in you application settings.
```
$settings = [
    'settings' => [
      'listdb' => [
          'db1' => [
              'dsn'  => 'mysql:host=localhost;dbname=nama_name;charset=utf8',
               'user' => 'root',
               'pass' => 'yourpassword'
           ],
           'db2' => [
              'dsn'  => 'mysql:host=localhost;dbname=nama_name;charset=utf8',
               'user' => 'root',
               'pass' => 'yourpassword'
           ]
      ]
    ]
];
```
## Usage
You can inject session helper class in application container:
```
$c['dbConn'] = function($c){  
    return new \nanaksr\dbconn($c->get('settings')['listdb']);
};
```
if dbcon class is injected in application container and can be used as an object, i.e. like this:
```
$app->get('/', function (Request $request, Response $response) {
    // Namespace is now picked up from settings
    $db1 = $this->dbconn->pdo('db1');
    $data = $db1->prepare("SELECT * FROM `mytable`");
    $data->execute();
   return print_r($data->fetchAll());
});
```

with container resolution:
```
class Home
{
    protected $ci;
    public function __construct($ci)
    { 
        $dbConn         = $ci->get('dbConn');
        $this->dbMain   = $dbConn->pdo('main');
    }
    
    public function __invoke(Request $request, Response $response, $args)
    {
        $data = $this->dbMain->prepare("SELECT * FROM `mytable`");
        $data->execute();
        return print_r($data->fetchAll());
    }
}
```
