# Dialog
A PSR-3 compliant logger

Dialog is a simple and very extensible PSR-3 compliant logger. It is modular and allows for multiple log handlers per logger instance. This allows for simultaneous logging in files, displaying on screen, writing in a database etc!

Also, its flexible structure Handlers accepting formatters, too, allow formatting the log message lines however you want to.

Finally, even the "template" engine that follows the PSR-3 guidelines (i.e. "this is the {amount}" can be changed (of course, the logger created with a custom engine won't be PSR-3 compliant).

### Εxample
```php
<?php

// Pick the Engine (i.e. template/placeholder matcher, usually the Psr3Engine
// provided with the package will suffice)
$engine = new \Dialog\Message\Psr3Engine(new \Dialog\Message\ExceptionStringFormatter());

// Get a new HandlerBag to add Handlers for the log messages
// This allows us to have several handlers and upon triggering log or any
// log-level specific method, all of the handlers will do their job independently
// (e.g. one may write on the screen, another in a file etc)
$handlerBag = new \Dialog\Log\HandlerBag();

// Instantiate the Logger (this one is provided and is quite generic, so you can
// use it out of the box!
$logger = new \Dialog\Log\Logger($engine, $handlerBag);

// Formatters, well, format the log line (e.g. include date? have the log level etc)
$formatter = new \Dialog\Formatter\Formatter(
     new \Dialog\Formatter\DateTimeBuilder(),
     new \DialogFormatter\TemplateEngine());

// Output is where the output/result it prepared and stored 
// (if there is a storage mechanism in place, e.g. files/databases)
$output = new \Dialog\Output\ScreenOutput();

// We create a Handler instance and assign a formatter and output mechanism
// as well as a log level threshold from which the logger will start handling
$handler1 = new \Dialog\Log\Handler($formatter, $output);
$handler1->setThreshold(\Dialog\Log\LogLevel::WARNING);

// We add the Handler in the handler bag registered with the Logger and we're done
$handlerBag->add('screen1', $handler1);

//----------------

// this message will be displayed
$logger->log(\Dialog\Log\LogLevel::WARNING, 'test');

// this one will not as the threshold condition is not met
$logger->log(\Dialog\Log\LogLevel::INFO, 'test');
```

Perhaps the above seems like a significant amount of boilerplate, but nowadays several of the instantiation lines can be done using dependency injection containers and also, the Logger and Handler classes could be subclassed to inject default dependencies or (perhaps even better) factories wrapping the above boilerplate code could be created. After all, with around 8 lines of boilerplate code we managed to uncouple the components of the logging and get huge flexibility.
