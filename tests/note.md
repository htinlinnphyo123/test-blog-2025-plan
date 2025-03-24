# Unit Test commands  
    + php artisan test
    + php artisan test --filter ExampleTest
    + ./vendor/bin/phpunit --filter ExampleTest
    + ./vendor/bin/phpunit --filter ExampleTest::testBasicExample

# Feature Test commands  
    + php artisan test --testsuite=Feature
    + php artisan test --testsuite=Feature --filter UserFeatureTest
    + php artisan test --testsuite=Feature --filter UserFeatureTest::test_store_process_of_user
    + ./vendor/bin/phpunit --testsuite=Feature


