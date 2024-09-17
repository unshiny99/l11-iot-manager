## Laravel 11 IoT Manager

### Requirements
1. PHP 8
2. Composer
3. PostgresSQL

### Setup
1. First of all, you need to create a PostgreSQL database named `iot-manager`
2. Run `composer install`
3. Copy the `.env.example` file in a `.env` file, and change the DB credentials
4. Launch the migrations : `php artisan migrate`
5. Seed the database (this creates some module types) : `php artisan db:seed`
6. Then start the server : `php artisan serve`. You should see the website at `http://127.0.0.1:8000`.
7. Create some modules via the graphical interface
8. Launch the task scheduler for the module data simulation : `php artisan schedule:work`

### Choices made
* We assume the sensors send different data structure when it is a valid data (eg temperature, speed...) and when it's a malfunction.
This way, the data : 
    * Will still be accessed periodically when the module is active
    * Will not be accessed once the status is different then active until it changes
* The unit are direclty defined on the module type, so a module can have only one metric here (we assume a module is a "sensor").
* Chart.js has been used for the graphical view of the modules' data

### Credits
Maxime Frémeaux @unshiny99
