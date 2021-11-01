# Laravel PHP Framework
packages used-> 
"fruitcake/laravel-cors": "^2.0",
 "fideloper/proxy": "^4.4",
 "guzzlehttp/guzzle": "^7.0.1",
 "laravel/framework": "^8.65",
 "laravel/sanctum": "^2.11",
 "laravel/tinker": "^2.5"
## Example Preview
   controller AuthController.php, 
   Model User.
   Requests RegisterRequest
   Service AuthServiseInterface
-  post-> create new user
-  https://domain.com/api/user/register


  controller AuthController.php,
  Model User,
  Requests LoginRequest, 
- post-> login
-  https://domain.com/api/user/sign-in


  controller PasswordController, Model User 
- post-> Send new password in email
- https://domain.com/api/user/recover-password
- post-> Reset new password
- https://domain.com/api/user/reset

  controller CompanyController.php,
  Model Company ,
  Service CompanyServiceInterface,
  Resources CompanyByIdResource
- get->  company user
- https://domain.com/api/user/companies
- post-> creaty new company for user
- https://domain.com/api/user/companies



## Requirements 

- PHP >= 7.4.0

## Installation

- Just clone the project to anywhere in your computer. 
-Run  composer install  <br>
- php artisan migrate 

Now you are done. 
<br>

` php artisan serve ` and open the project on the browser. 
