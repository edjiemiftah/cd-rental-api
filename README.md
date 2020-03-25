# API for CD Rental Management System
What's included:
* CRUD Stock
* Order/Rent Price Calculation

## Table of Contents

* [Installation](#installation)
* [Usage](#usage)
* [Creator](#creator)


## Installation

1. Clone this repository
``` bash
# Open your terminal and run this script
$ git clone https://github.com/edjiemiftah/cd-rental-api.git
```

2. Go to cd-rental-api folder and install app's dependencies
``` bash
# install app's dependencies
$ composer install

```
3. Create database and copy file ".env.example", and change its name to ".env".
Then in file ".env" complete this database configuration:
* DB_CONNECTION=mysql
* DB_HOST=127.0.0.1
* DB_PORT=3306
* DB_DATABASE=yourdatabasename
* DB_USERNAME=yourdatabaseuser
* DB_PASSWORD=yourdatabaseuserpassword

4. Run database migration and seed
``` bash
# run database migration and seed
$ php artisan migrate:refresh --seed

```

## Usage

1. Start the server
``` bash
# start local server
$ php -S localhost:8000 -t public
```

2. Use Postman to check these API endpoints
``` bash
# get all stock list
GET http://localhost:8000/stocks

# insert new stock with parameters
# List of payloads:
# * title
# * rate
# * category
# * quantity
POST http://localhost:8000/stocks


# get specific stock data
GET http://localhost:8000/stocks/{id}

# update stock
# List of payloads:
# * quantity
PUT http://localhost:8000/stocks/{id}

# submit rent order
# List of payloads:
# * stock_id
# * member_id
POST http://localhost:8000/rent

# process rent return
# List of payloads:
# * order_id
POST http://localhost:8000/rent/return

```

3. To run unit testing, go to directory and run this command:
``` bash
$ vendor/bin/phpunit
```

## Creator

**Zaini Miftah**

<https://github.com/edjiemiftah>