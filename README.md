## Laravel 11 IoT Manager

### Setup
1. First of all, you need to create a PostgreSQL database named `iot-manager`
2. Launch the migrations : `php artisan migrate`
3. Seed the database : `php artisan db:seed`
4. Then start the server : `php artisan serve`. You should see the WEB site at `http://127.0.0.1:8000`.

### Choices made
We assume the sensors send different data structure when it is a valid data (eg temperature, speed...) and when it's a malfunction (sended on event trigger for example, so not periodically).
This way, the data : 
- will still be accessed periodically when the module is active
- will not be accessed once the status is different then active until it changes

### Credits
Maxime Frémeaux @unshiny99
