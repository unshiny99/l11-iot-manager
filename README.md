## Laravel 11 IoT Manager

### Setup
1. First of all, you need to create a PostgreSQL database named `iot-manager`
2. Run `composer install`
3. Launch the migrations : `php artisan migrate`
4. Seed the database (this creates some module types) : `php artisan db:seed`
5. Then start the server : `php artisan serve`. You should see the website at `http://127.0.0.1:8000`.
6. Create some modules via the graphical interface
7. Launch the task scheduler for the module data simulation : `php artisan schedule:work`

### Choices made
* We assume the sensors send different data structure when it is a valid data (eg temperature, speed...) and when it's a malfunction (sended on event trigger for example, so not periodically).
This way, the data : 
    * will still be accessed periodically when the module is active
    * will not be accessed once the status is different then active until it changes
* Chart.js has been used for the graphical view of the modules' data

### Credits
Maxime Frémeaux @unshiny99
