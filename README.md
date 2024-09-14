## Laravel 11 IoT Manager

### Setup
1. First of all, you need to create a PostgreSQL database named `iot-monitoring`
2. Then start the server : `php artisan serve`
3. Launch the migrations : `php artisan migrate`

### Choices made
We assume the sensors send different data structure when it is a valid data (eg temperature, speed...) and when it's a malfunction (sended on event trigger for example, so not periodically).
This way, the data : 
- will still be accessed periodically when the module is active
- will not be accessed once the status is different then active until it changes

### Credits

Maxime Frémeaux @unshiny99
