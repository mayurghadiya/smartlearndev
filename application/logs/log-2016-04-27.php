<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2016-04-27 16:06:47 --> Severity: error --> Exception: syntax error, unexpected '<<' (T_SL) /opt/lampp/htdocs/smartlearndev/application/controllers/Site.php 45
ERROR - 2016-04-27 16:06:47 --> Severity: Error --> Uncaught TypeError: Argument 1 passed to CI_Exceptions::show_exception() must be an instance of Exception, instance of ParseError given, called in /opt/lampp/htdocs/smartlearndev/system/core/Common.php on line 658 and defined in /opt/lampp/htdocs/smartlearndev/system/core/Exceptions.php:190
Stack trace:
#0 /opt/lampp/htdocs/smartlearndev/system/core/Common.php(658): CI_Exceptions->show_exception(Object(ParseError))
#1 [internal function]: _exception_handler(Object(ParseError))
#2 {main}
  thrown /opt/lampp/htdocs/smartlearndev/system/core/Exceptions.php 190
