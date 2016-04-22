<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2016-04-22 09:58:16 --> Severity: Notice --> Undefined variable: gochat /opt/lampp/htdocs/smartlearndev/application/views/backend/student/includes/header.php 254
ERROR - 2016-04-22 09:59:34 --> Severity: Notice --> Undefined variable: widget_order /opt/lampp/htdocs/smartlearndev/application/views/backend/student/includes/includes_top.php 118
ERROR - 2016-04-22 09:59:34 --> Severity: Notice --> Undefined variable: widget_order /opt/lampp/htdocs/smartlearndev/application/views/backend/student/includes/includes_top.php 146
ERROR - 2016-04-22 09:59:34 --> Severity: Notice --> Undefined variable: gochat /opt/lampp/htdocs/smartlearndev/application/views/backend/student/includes/header.php 254
ERROR - 2016-04-22 10:45:30 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near ' course_id)' at line 1 - Invalid query: SELECT * FROM batch WHERE FIND_IN_SET(1, degree_id) AND FIND_IN_SET(, course_id)
ERROR - 2016-04-22 10:45:47 --> Severity: Warning --> Missing argument 2 for Admin::subject_list_from_course_and_semester(), called in /opt/lampp/htdocs/smartlearndev/system/core/CodeIgniter.php on line 514 and defined /opt/lampp/htdocs/smartlearndev/application/controllers/Admin.php 3944
ERROR - 2016-04-22 10:45:47 --> Severity: Notice --> Undefined variable: semester /opt/lampp/htdocs/smartlearndev/application/controllers/Admin.php 3946
ERROR - 2016-04-22 10:45:48 --> Severity: Warning --> Missing argument 4 for Admin::get_exam_list_data(), called in /opt/lampp/htdocs/smartlearndev/system/core/CodeIgniter.php on line 514 and defined /opt/lampp/htdocs/smartlearndev/application/controllers/Admin.php 4728
ERROR - 2016-04-22 10:45:48 --> Severity: Notice --> Undefined variable: semester /opt/lampp/htdocs/smartlearndev/application/controllers/Admin.php 4730
ERROR - 2016-04-22 10:45:48 --> Severity: Warning --> Missing argument 2 for Admin::subject_list_from_course_and_semester(), called in /opt/lampp/htdocs/smartlearndev/system/core/CodeIgniter.php on line 514 and defined /opt/lampp/htdocs/smartlearndev/application/controllers/Admin.php 3944
ERROR - 2016-04-22 10:45:48 --> Severity: Notice --> Undefined variable: semester /opt/lampp/htdocs/smartlearndev/application/controllers/Admin.php 3946
ERROR - 2016-04-22 10:45:49 --> Severity: Warning --> Missing argument 2 for Admin::subject_list_from_course_and_semester(), called in /opt/lampp/htdocs/smartlearndev/system/core/CodeIgniter.php on line 514 and defined /opt/lampp/htdocs/smartlearndev/application/controllers/Admin.php 3944
ERROR - 2016-04-22 10:45:49 --> Severity: Notice --> Undefined variable: semester /opt/lampp/htdocs/smartlearndev/application/controllers/Admin.php 3946
ERROR - 2016-04-22 10:56:59 --> Severity: error --> Exception: syntax error, unexpected 'endforeach' (T_ENDFOREACH) /opt/lampp/htdocs/smartlearndev/application/views/backend/admin/participate.php 505
ERROR - 2016-04-22 10:56:59 --> Severity: Error --> Uncaught TypeError: Argument 1 passed to CI_Exceptions::show_exception() must be an instance of Exception, instance of ParseError given, called in /opt/lampp/htdocs/smartlearndev/system/core/Common.php on line 658 and defined in /opt/lampp/htdocs/smartlearndev/system/core/Exceptions.php:190
Stack trace:
#0 /opt/lampp/htdocs/smartlearndev/system/core/Common.php(658): CI_Exceptions->show_exception(Object(ParseError))
#1 [internal function]: _exception_handler(Object(ParseError))
#2 {main}
  thrown /opt/lampp/htdocs/smartlearndev/system/core/Exceptions.php 190
ERROR - 2016-04-22 11:36:45 --> Severity: Notice --> Undefined variable: gochat /opt/lampp/htdocs/smartlearndev/application/views/backend/student/includes/header.php 254
ERROR - 2016-04-22 13:50:17 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near ' course_id)' at line 1 - Invalid query: SELECT * FROM batch WHERE FIND_IN_SET(1, degree_id) AND FIND_IN_SET(, course_id)
ERROR - 2016-04-22 13:53:44 --> Severity: Notice --> Only variables should be assigned by reference /opt/lampp/htdocs/smartlearndev/application/controllers/Admin.php 2723
ERROR - 2016-04-22 13:55:12 --> Severity: Warning --> implode(): Invalid arguments passed /opt/lampp/htdocs/smartlearndev/application/controllers/Admin.php 1093
ERROR - 2016-04-22 13:55:12 --> Query error: Column 'pm_student_id' cannot be null - Invalid query: INSERT INTO `project_manager` (`pm_filename`, `pm_degree`, `pm_title`, `pm_batch`, `pm_url`, `pm_semester`, `pm_desc`, `pm_dos`, `pm_status`, `pm_student_id`, `pm_course`, `created_date`) VALUES ('pdftest.pdf', '1', 'test', '38', 'http://localhost/smartlearndev/uploads/project_file/pdftest.pdf', '1', 'sdsad', ' April 27, 2016', 1, NULL, '1', '2016-04-22')
ERROR - 2016-04-22 14:50:11 --> Severity: error --> Exception: Call to undefined method CI_Loader::upload() /opt/lampp/htdocs/smartlearndev/application/controllers/Media.php 50
ERROR - 2016-04-22 14:50:11 --> Severity: Error --> Uncaught TypeError: Argument 1 passed to CI_Exceptions::show_exception() must be an instance of Exception, instance of Error given, called in /opt/lampp/htdocs/smartlearndev/system/core/Common.php on line 658 and defined in /opt/lampp/htdocs/smartlearndev/system/core/Exceptions.php:190
Stack trace:
#0 /opt/lampp/htdocs/smartlearndev/system/core/Common.php(658): CI_Exceptions->show_exception(Object(Error))
#1 [internal function]: _exception_handler(Object(Error))
#2 {main}
  thrown /opt/lampp/htdocs/smartlearndev/system/core/Exceptions.php 190
ERROR - 2016-04-22 14:56:19 --> The upload path does not appear to be valid.
ERROR - 2016-04-22 14:56:19 --> The upload path does not appear to be valid.
ERROR - 2016-04-22 14:56:19 --> The upload path does not appear to be valid.
ERROR - 2016-04-22 14:56:19 --> The upload path does not appear to be valid.
ERROR - 2016-04-22 15:09:14 --> Severity: Notice --> Undefined variable: data /opt/lampp/htdocs/smartlearndev/application/controllers/Media.php 102
ERROR - 2016-04-22 15:32:19 --> Severity: Notice --> Array to string conversion /opt/lampp/htdocs/smartlearndev/application/controllers/Media.php 110
ERROR - 2016-04-22 15:32:19 --> Severity: Notice --> Array to string conversion /opt/lampp/htdocs/smartlearndev/application/controllers/Media.php 110
ERROR - 2016-04-22 15:32:19 --> Severity: Notice --> Array to string conversion /opt/lampp/htdocs/smartlearndev/application/controllers/Media.php 110
ERROR - 2016-04-22 15:32:19 --> Severity: Notice --> Array to string conversion /opt/lampp/htdocs/smartlearndev/application/controllers/Media.php 110
ERROR - 2016-04-22 15:34:24 --> Severity: Notice --> Undefined variable: upload_files /opt/lampp/htdocs/smartlearndev/application/controllers/Media.php 111
ERROR - 2016-04-22 15:34:24 --> Severity: Notice --> Undefined variable: upload_files /opt/lampp/htdocs/smartlearndev/application/controllers/Media.php 116
ERROR - 2016-04-22 15:34:24 --> Severity: Warning --> implode(): Invalid arguments passed /opt/lampp/htdocs/smartlearndev/application/controllers/Media.php 116
ERROR - 2016-04-22 15:35:44 --> Severity: Error --> Allowed memory size of 134217728 bytes exhausted (tried to allocate 134217736 bytes) /opt/lampp/htdocs/smartlearndev/application/controllers/Media.php 113
ERROR - 2016-04-22 15:36:45 --> Severity: Notice --> Array to string conversion /opt/lampp/htdocs/smartlearndev/application/controllers/Media.php 113
ERROR - 2016-04-22 15:36:45 --> Severity: Notice --> Array to string conversion /opt/lampp/htdocs/smartlearndev/application/controllers/Media.php 113
ERROR - 2016-04-22 15:36:45 --> Severity: Notice --> Array to string conversion /opt/lampp/htdocs/smartlearndev/application/controllers/Media.php 113
ERROR - 2016-04-22 15:36:45 --> Severity: Notice --> Array to string conversion /opt/lampp/htdocs/smartlearndev/application/controllers/Media.php 113
ERROR - 2016-04-22 15:42:57 --> Severity: error --> Exception: syntax error, unexpected 'die' (T_EXIT), expecting ',' or ';' /opt/lampp/htdocs/smartlearndev/application/controllers/Media.php 126
ERROR - 2016-04-22 15:42:57 --> Severity: Error --> Uncaught TypeError: Argument 1 passed to CI_Exceptions::show_exception() must be an instance of Exception, instance of ParseError given, called in /opt/lampp/htdocs/smartlearndev/system/core/Common.php on line 658 and defined in /opt/lampp/htdocs/smartlearndev/system/core/Exceptions.php:190
Stack trace:
#0 /opt/lampp/htdocs/smartlearndev/system/core/Common.php(658): CI_Exceptions->show_exception(Object(ParseError))
#1 [internal function]: _exception_handler(Object(ParseError))
#2 {main}
  thrown /opt/lampp/htdocs/smartlearndev/system/core/Exceptions.php 190
ERROR - 2016-04-22 15:43:07 --> Severity: Warning --> Missing argument 1 for Photo_gallery::addmedia(), called in /opt/lampp/htdocs/smartlearndev/application/controllers/Media.php on line 125 and defined /opt/lampp/htdocs/smartlearndev/application/models/Photo_gallery.php 9
ERROR - 2016-04-22 15:43:07 --> Severity: Warning --> Missing argument 2 for Photo_gallery::addmedia(), called in /opt/lampp/htdocs/smartlearndev/application/controllers/Media.php on line 125 and defined /opt/lampp/htdocs/smartlearndev/application/models/Photo_gallery.php 9
ERROR - 2016-04-22 16:07:31 --> Severity: Notice --> Trying to get property of non-object /opt/lampp/htdocs/smartlearndev/application/views/backend/admin/modal_edit_photogallery.php 21
ERROR - 2016-04-22 16:07:31 --> Severity: Notice --> Trying to get property of non-object /opt/lampp/htdocs/smartlearndev/application/views/backend/admin/modal_edit_photogallery.php 27
ERROR - 2016-04-22 16:07:31 --> Severity: Notice --> Trying to get property of non-object /opt/lampp/htdocs/smartlearndev/application/views/backend/admin/modal_edit_photogallery.php 35
ERROR - 2016-04-22 16:10:18 --> Severity: Notice --> Undefined variable: galleryimg /opt/lampp/htdocs/smartlearndev/application/views/backend/admin/modal_edit_photogallery.php 54
ERROR - 2016-04-22 17:13:21 --> Severity: Notice --> Undefined variable: gallery /opt/lampp/htdocs/smartlearndev/application/controllers/Media.php 233
ERROR - 2016-04-22 17:13:21 --> Query error: Column 'gallery_img' cannot be null - Invalid query: INSERT INTO `photo_gallery` (`gallery_title`, `gallery_desc`, `gallery_img`) VALUES ('assignment1', 'test', NULL)
ERROR - 2016-04-22 17:13:34 --> Severity: Notice --> Undefined variable: gallery /opt/lampp/htdocs/smartlearndev/application/controllers/Media.php 233
ERROR - 2016-04-22 17:13:34 --> Query error: Column 'gallery_img' cannot be null - Invalid query: INSERT INTO `photo_gallery` (`gallery_title`, `gallery_desc`, `gallery_img`) VALUES ('assignment1', 'test', NULL)
ERROR - 2016-04-22 17:14:00 --> Severity: Notice --> Undefined variable: all_img /opt/lampp/htdocs/smartlearndev/application/controllers/Media.php 233
ERROR - 2016-04-22 17:14:00 --> Query error: Column 'gallery_img' cannot be null - Invalid query: INSERT INTO `photo_gallery` (`gallery_title`, `gallery_desc`, `gallery_img`) VALUES ('assignment1', 'test', NULL)
ERROR - 2016-04-22 17:17:45 --> Severity: Notice --> Undefined variable: all_img /opt/lampp/htdocs/smartlearndev/application/controllers/Media.php 235
ERROR - 2016-04-22 17:17:45 --> Query error: Column 'gallery_img' cannot be null - Invalid query: INSERT INTO `photo_gallery` (`gallery_title`, `gallery_desc`, `gallery_img`) VALUES ('assignment1', 'test', NULL)
ERROR - 2016-04-22 17:18:02 --> Severity: Notice --> Undefined variable: all_img /opt/lampp/htdocs/smartlearndev/application/controllers/Media.php 232
ERROR - 2016-04-22 17:18:02 --> Query error: Column 'gallery_img' cannot be null - Invalid query: INSERT INTO `photo_gallery` (`gallery_title`, `gallery_desc`, `gallery_img`) VALUES ('assignment1', 'test', NULL)
ERROR - 2016-04-22 17:18:14 --> Severity: Notice --> Trying to get property of non-object /opt/lampp/htdocs/smartlearndev/application/controllers/Media.php 220
ERROR - 2016-04-22 17:18:43 --> Severity: Notice --> Undefined variable: all_img /opt/lampp/htdocs/smartlearndev/application/controllers/Media.php 235
ERROR - 2016-04-22 17:18:43 --> Query error: Column 'gallery_img' cannot be null - Invalid query: INSERT INTO `photo_gallery` (`gallery_title`, `gallery_desc`, `gallery_img`) VALUES ('assignment1', 'test', NULL)
ERROR - 2016-04-22 17:22:21 --> Severity: Notice --> Trying to get property of non-object /opt/lampp/htdocs/smartlearndev/application/controllers/Media.php 231
ERROR - 2016-04-22 17:22:54 --> Severity: Notice --> Trying to get property of non-object /opt/lampp/htdocs/smartlearndev/application/controllers/Media.php 221
ERROR - 2016-04-22 17:49:06 --> Severity: Notice --> Undefined index:  /opt/lampp/htdocs/smartlearndev/application/controllers/Media.php 264
ERROR - 2016-04-22 17:50:13 --> Severity: Notice --> Undefined variable: gallery /opt/lampp/htdocs/smartlearndev/application/views/backend/admin/photo_gallery.php 88
ERROR - 2016-04-22 17:50:13 --> Severity: Warning --> Invalid argument supplied for foreach() /opt/lampp/htdocs/smartlearndev/application/views/backend/admin/photo_gallery.php 88
ERROR - 2016-04-22 17:57:15 --> Severity: error --> Exception: syntax error, unexpected '$str' (T_VARIABLE) /opt/lampp/htdocs/smartlearndev/application/controllers/Media.php 266
ERROR - 2016-04-22 17:57:15 --> Severity: Error --> Uncaught TypeError: Argument 1 passed to CI_Exceptions::show_exception() must be an instance of Exception, instance of ParseError given, called in /opt/lampp/htdocs/smartlearndev/system/core/Common.php on line 658 and defined in /opt/lampp/htdocs/smartlearndev/system/core/Exceptions.php:190
Stack trace:
#0 /opt/lampp/htdocs/smartlearndev/system/core/Common.php(658): CI_Exceptions->show_exception(Object(ParseError))
#1 [internal function]: _exception_handler(Object(ParseError))
#2 {main}
  thrown /opt/lampp/htdocs/smartlearndev/system/core/Exceptions.php 190
ERROR - 2016-04-22 17:57:57 --> Severity: error --> Exception: Call to undefined method CI_DB_mysqli_driver::updatemedia() /opt/lampp/htdocs/smartlearndev/application/controllers/Media.php 276
ERROR - 2016-04-22 17:57:57 --> Severity: Error --> Uncaught TypeError: Argument 1 passed to CI_Exceptions::show_exception() must be an instance of Exception, instance of Error given, called in /opt/lampp/htdocs/smartlearndev/system/core/Common.php on line 658 and defined in /opt/lampp/htdocs/smartlearndev/system/core/Exceptions.php:190
Stack trace:
#0 /opt/lampp/htdocs/smartlearndev/system/core/Common.php(658): CI_Exceptions->show_exception(Object(Error))
#1 [internal function]: _exception_handler(Object(Error))
#2 {main}
  thrown /opt/lampp/htdocs/smartlearndev/system/core/Exceptions.php 190
ERROR - 2016-04-22 18:24:51 --> Severity: Notice --> Trying to get property of non-object /opt/lampp/htdocs/smartlearndev/application/controllers/Media.php 232
ERROR - 2016-04-22 18:25:16 --> Severity: Notice --> Trying to get property of non-object /opt/lampp/htdocs/smartlearndev/application/controllers/Media.php 232
ERROR - 2016-04-22 18:46:19 --> Severity: Notice --> Undefined variable: gochat /opt/lampp/htdocs/smartlearndev/application/views/backend/student/includes/header.php 254
ERROR - 2016-04-22 18:46:30 --> Severity: Notice --> Undefined variable: gochat /opt/lampp/htdocs/smartlearndev/application/views/backend/student/includes/header.php 254
ERROR - 2016-04-22 18:47:02 --> Severity: Notice --> Undefined variable: widget_order /opt/lampp/htdocs/smartlearndev/application/views/backend/student/includes/includes_top.php 118
ERROR - 2016-04-22 18:47:02 --> Severity: Notice --> Undefined variable: widget_order /opt/lampp/htdocs/smartlearndev/application/views/backend/student/includes/includes_top.php 147
ERROR - 2016-04-22 18:47:02 --> Severity: Notice --> Undefined variable: gochat /opt/lampp/htdocs/smartlearndev/application/views/backend/student/includes/header.php 254
ERROR - 2016-04-22 18:48:05 --> Severity: Notice --> Undefined variable: gochat /opt/lampp/htdocs/smartlearndev/application/views/backend/student/includes/header.php 254
ERROR - 2016-04-22 18:53:49 --> Severity: Notice --> Undefined variable: gochat /opt/lampp/htdocs/smartlearndev/application/views/backend/student/includes/header.php 254
ERROR - 2016-04-22 18:54:14 --> Severity: Notice --> Undefined variable: gochat /opt/lampp/htdocs/smartlearndev/application/views/backend/student/includes/header.php 254
ERROR - 2016-04-22 18:54:17 --> Severity: Notice --> Undefined variable: widget_order /opt/lampp/htdocs/smartlearndev/application/views/backend/student/includes/includes_top.php 118
ERROR - 2016-04-22 18:54:17 --> Severity: Notice --> Undefined variable: widget_order /opt/lampp/htdocs/smartlearndev/application/views/backend/student/includes/includes_top.php 147
ERROR - 2016-04-22 18:54:17 --> Severity: Notice --> Undefined variable: gochat /opt/lampp/htdocs/smartlearndev/application/views/backend/student/includes/header.php 254
ERROR - 2016-04-22 18:55:09 --> Severity: Notice --> Undefined variable: widget_order /opt/lampp/htdocs/smartlearndev/application/views/backend/student/includes/includes_top.php 118
ERROR - 2016-04-22 18:55:09 --> Severity: Notice --> Undefined variable: widget_order /opt/lampp/htdocs/smartlearndev/application/views/backend/student/includes/includes_top.php 147
ERROR - 2016-04-22 18:55:09 --> Severity: Notice --> Undefined variable: gochat /opt/lampp/htdocs/smartlearndev/application/views/backend/student/includes/header.php 254
ERROR - 2016-04-22 19:03:59 --> Severity: Notice --> Undefined variable: widget_order /opt/lampp/htdocs/smartlearndev/application/views/backend/student/includes/includes_top.php 118
ERROR - 2016-04-22 19:03:59 --> Severity: Notice --> Undefined variable: widget_order /opt/lampp/htdocs/smartlearndev/application/views/backend/student/includes/includes_top.php 147
ERROR - 2016-04-22 19:03:59 --> Severity: Notice --> Undefined variable: gochat /opt/lampp/htdocs/smartlearndev/application/views/backend/student/includes/header.php 254
ERROR - 2016-04-22 19:04:19 --> Severity: Notice --> Undefined variable: widget_order /opt/lampp/htdocs/smartlearndev/application/views/backend/student/includes/includes_top.php 118
ERROR - 2016-04-22 19:04:19 --> Severity: Notice --> Undefined variable: widget_order /opt/lampp/htdocs/smartlearndev/application/views/backend/student/includes/includes_top.php 147
ERROR - 2016-04-22 19:04:19 --> Severity: Notice --> Undefined variable: gochat /opt/lampp/htdocs/smartlearndev/application/views/backend/student/includes/header.php 254
ERROR - 2016-04-22 19:04:31 --> Severity: Notice --> Undefined variable: widget_order /opt/lampp/htdocs/smartlearndev/application/views/backend/student/includes/includes_top.php 118
ERROR - 2016-04-22 19:04:31 --> Severity: Notice --> Undefined variable: widget_order /opt/lampp/htdocs/smartlearndev/application/views/backend/student/includes/includes_top.php 147
ERROR - 2016-04-22 19:04:31 --> Severity: Notice --> Undefined variable: gochat /opt/lampp/htdocs/smartlearndev/application/views/backend/student/includes/header.php 254
ERROR - 2016-04-22 19:08:36 --> Severity: Notice --> Undefined variable: widget_order /opt/lampp/htdocs/smartlearndev/application/views/backend/student/includes/includes_top.php 118
ERROR - 2016-04-22 19:08:36 --> Severity: Notice --> Undefined variable: widget_order /opt/lampp/htdocs/smartlearndev/application/views/backend/student/includes/includes_top.php 147
ERROR - 2016-04-22 19:08:36 --> Severity: Notice --> Undefined variable: gochat /opt/lampp/htdocs/smartlearndev/application/views/backend/student/includes/header.php 254
ERROR - 2016-04-22 19:09:47 --> Severity: Notice --> Undefined variable: widget_order /opt/lampp/htdocs/smartlearndev/application/views/backend/student/includes/includes_top.php 118
ERROR - 2016-04-22 19:09:47 --> Severity: Notice --> Undefined variable: widget_order /opt/lampp/htdocs/smartlearndev/application/views/backend/student/includes/includes_top.php 147
ERROR - 2016-04-22 19:09:47 --> Severity: Notice --> Undefined variable: gochat /opt/lampp/htdocs/smartlearndev/application/views/backend/student/includes/header.php 254
ERROR - 2016-04-22 19:12:46 --> Severity: Notice --> Undefined variable: widget_order /opt/lampp/htdocs/smartlearndev/application/views/backend/student/includes/includes_top.php 118
ERROR - 2016-04-22 19:12:46 --> Severity: Notice --> Undefined variable: widget_order /opt/lampp/htdocs/smartlearndev/application/views/backend/student/includes/includes_top.php 147
ERROR - 2016-04-22 19:12:46 --> Severity: Notice --> Undefined variable: gochat /opt/lampp/htdocs/smartlearndev/application/views/backend/student/includes/header.php 254
ERROR - 2016-04-22 19:17:14 --> Severity: Notice --> Undefined variable: widget_order /opt/lampp/htdocs/smartlearndev/application/views/backend/student/includes/includes_top.php 118
ERROR - 2016-04-22 19:17:14 --> Severity: Notice --> Undefined variable: widget_order /opt/lampp/htdocs/smartlearndev/application/views/backend/student/includes/includes_top.php 147
ERROR - 2016-04-22 19:17:14 --> Severity: Notice --> Undefined variable: gochat /opt/lampp/htdocs/smartlearndev/application/views/backend/student/includes/header.php 254
