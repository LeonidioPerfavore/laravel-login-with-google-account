##🇺🇦

<h1 align="center">
    Laravel Auth with Socialite
</h1>

## What is?
##<img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="150" alt="Laravel Logo">

Authorization, Registration with sending a letter to the mail with the ability to reset the password, as well as login through social networks using an example through Google account.

## Installation

<h3>Requirements</h3>
- **Docker**
- **Docker Compose**
- **Composer**
- **Git**
  
## Install via docker
<h3>1. Clone repository </h3>

<h3>2. Run command</h3>

docker run --rm \
-u "$(id -u):$(id -g)" \
-v $(pwd):/opt \
-w /opt \
laravelsail/php80-composer:latest \
composer install --ignore-platform-reqs

<h3>3. Run command</h3>
./vendor/bin/sail up

<h3>4. Create .env file following the env.example file example</h3>
PS:
- ** If you have a question where to get these variables:
  GOOGLE_CLIENT_ID &
  GOOGLE_CLIENT_SECRET

To do this, go here:
**https://console.cloud.google.com**

Create a new project and credentials for it

<h3>5. Generate key:</h3>

./vendor/bin/sail artisan key:generate

<h3>6. Run migrations by command: </h3>

./vendor/bin/sail artisan migrate


## **Afterword**
Authorization is done on the example of Google gmail, but this can be done with other social networks. For more detailed information, please refer to the official documentation:
**https://laravel.com/docs/10.x/socialite**


