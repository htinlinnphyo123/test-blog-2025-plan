<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

-------------------------------------------------------------------------------------------------------------------------

<p align="center"><a href="https://bigsoft.tech/" target="_blank"><img style="background-color:white;border-radius:0.5rem" src="https://avatars.githubusercontent.com/u/80409797?s=200&v=4" width="400" alt="BigSoft Logo"></a></p>
<p align="center" style="color:orange;font-size:2 rem">Developed By BigSoft</p>


-------------------------------------------------------------------------------------------------------------------------

# Custom Mini CRUD directions

## Project set up
  + copy from .env.example to your own .env and requirements set up 
  + php > 8.0 and  composer version  > 2.2  
  + composer update or composer install
  + node or yarn or bun whatever you want pkg and install node_modules 

## For overall short-note for mini crud features
-------------------------------------------------------------------------------------------------------------------------
 + first you need to run ( php artisan make:coreFeature--all );

### If this command was successed , another step are as follow
-------------------------------------------------------------------------------------------------------------------------
+ in ( routes/web.php ) u need to register for your new routes
+ in lang folder , u need to add new lang for ur new feature
    #### ===============For Detail ==================
    + add ( newFeature.php ) in en folder
    + add ( newFeature.php ) in mm folder
    + register new feature name in ( sidebar.php ) in en and mm folder;
+ in ( resources/views/components/sidebar.blade.php) u need to register for ur new feature of Ui and necessary

# Optional

+ if you want to create only Logics(mean Controller , Resource , Service and Validation) 
    Use ( php artisan make:coreFeature--logic )
+ if you want to create only views ( C , R  , U , D) and show pages
    Use ( php artisan make:coreFeature--view )
