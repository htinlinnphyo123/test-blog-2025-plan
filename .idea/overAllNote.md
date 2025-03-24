# Custom Mini CRUD directions

 + In .env Set Up(ARTISAN_COMMAND_PASSWORD=BigSoft)

## For overall short-note for mini crud features
-------------------------------------------------------------------------------------------------------------------------
 + first you need to run ( php artisan make:coreFeature--all );

### This cmd was success another step are as follow
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
