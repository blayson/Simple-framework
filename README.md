***
# Simple php framework

## Vendor
Folder with my framework source code

## Dependency Injection
Use file `dependency.php` to set dependencies to DI container
```php
$container = $jedi->getContainer();
$container->set('Models\MainModel');
```
after you can use `$container->get('Models\MainModel')` to get instance of a class in you controllers, etc. 
## Routing 
Use file `route.php` to register routes
```php
$jedi->register('GET' ,'Main', MainController::class);
$jedi->register(['GET', 'POST'], 'Person', PersonController::class);
```
## Request & Response object
`Request` object stores some information about user's request to server.
`Response` object not ready yet, has a couple of methods example:
```php
public function notAllowed();
public function notFound();
```
`return` `headers` and `status code` for this cases;
## Autoloader
