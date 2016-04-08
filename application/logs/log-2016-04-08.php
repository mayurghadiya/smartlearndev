<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2016-04-08 10:14:35 --> Severity: Warning --> mysqli::real_connect(): (HY000/1130): Host '192.168.1.28' is not allowed to connect to this MariaDB server /opt/lampp/htdocs/smartlearndev/system/database/drivers/mysqli/mysqli_driver.php 135
ERROR - 2016-04-08 10:14:35 --> Unable to connect to the database
ERROR - 2016-04-08 10:15:18 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near ' course_id)' at line 1 - Invalid query: SELECT * FROM batch WHERE FIND_IN_SET(1, degree_id) AND FIND_IN_SET(, course_id)
ERROR - 2016-04-08 10:16:37 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'all, course_id)' at line 1 - Invalid query: SELECT * FROM batch WHERE FIND_IN_SET(1, degree_id) AND FIND_IN_SET(all, course_id)
