# Using the Telstra Messaging API in PHP to send a SMS

This is an example of the Telstra Messaging API using plain PHP to send a SMS.

This code does not use an SDK although it uses a basic wrapper to handle the API. 

## Technology

This demo uses

* PHP 

## Requirements

* Valid and active client_id and client_secret from [Dev.Telstra.com](https://dev.telstra.com)

## Running the demo

* Update client_id and client_secret from [Dev.Telstra.com](https://dev.telstra.com) into ./includes/config.php
* Run `php -S 127.0.0.1:8080` to start the app (requires PHP 7 or above) or load it in your web server of choice.
* Visit `http://127.0.0.1:8080/` in your browser
* Enter your mobile number
* Click the __"Send a SMS"__ link
* You will receive a message that says __"+61xxxxxxxx has been sent and is waiting in queue"__

## Running the test

* coming soon
<!-- * Requirements:
  * [Firefox](http://getfirefox.com) with the [Selenium IDE](http://seleniumhq.org/projects/ide/plugins.html)
  * PHP 7
* Start the app by running `php -S 127.0.0.1:8080`
* Load the [test script](tests/payment.html) in the Selenium IDE and run the script. -->

## Useful link

* [Messaging API getting started](https://dev.telstra.com/content/messaging-api-getting-started)
