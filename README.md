# PHP MVC framework
Minimalistic custom taks list for educational purposes.

![homepage](/assets/homepage.png)
![workspace](/assets/workspace.png)

## Installation

1. Download the archive or clone the project using git
2. Create database schema
3. Create `.env` file from `.env.example` file and adjust database parameters (including schema name)
4. Run `composer install`
5. Run migrations by executing `php migrations.php` from the project root directory
6. Go to the `public` folder 
7. Start php server by running command `php -S 127.0.0.1:8080` 
8. Open in browser http://127.0.0.1:8080

------
## Installation using docker
Make sure you have docker installed. To see how you can install docker on Windows [click here](https://youtu.be/2ezNqqaSjq8). <br>
Make sure `docker` and `docker-compose` commands are available in command line.

1. Clone the project using git
1. Copy `.env.example` into `.env` (Don't need to change anything for local development)
1. Navigate to the project root directory and run `docker-compose up -d`
1. Install dependencies - `docker-compose exec app composer install`
1. Run migrations - `docker-compose exec app php migrations.php`
8. Open in browser http://127.0.0.1:8080

> I appreaciate if you share it.
