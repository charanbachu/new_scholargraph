<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
|--------------------------------------------------------------------------
| File and Directory Modes
|--------------------------------------------------------------------------
|
| These prefs are used when checking and setting modes when working
| with the file system.  The defaults are fine on servers with proper
| security, but you may wish (or even need) to change the values in
| certain environments (Apache running a separate process for each
| user, PHP under CGI with Apache suEXEC, etc.).  Octal values should
| always be used to set the mode correctly.
|
*/
define('FILE_READ_MODE', 0644);
define('FILE_WRITE_MODE', 0666);
define('DIR_READ_MODE', 0755);
define('DIR_WRITE_MODE', 0755);

/*
|--------------------------------------------------------------------------
| File Stream Modes
|--------------------------------------------------------------------------
|
| These modes are used when working with fopen()/popen()
|
*/
define('FOPEN_READ', 'rb');
define('FOPEN_READ_WRITE', 'r+b');
define('FOPEN_WRITE_CREATE_DESTRUCTIVE', 'wb'); // truncates existing file data, use with care
define('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE', 'w+b'); // truncates existing file data, use with care
define('FOPEN_WRITE_CREATE', 'ab');
define('FOPEN_READ_WRITE_CREATE', 'a+b');
define('FOPEN_WRITE_CREATE_STRICT', 'xb');
define('FOPEN_READ_WRITE_CREATE_STRICT', 'x+b');

/*
|--------------------------------------------------------------------------
| Display Debug backtrace
|--------------------------------------------------------------------------
|
| If set to TRUE, a backtrace will be displayed along with php errors. If
| error_reporting is disabled, the backtrace will not display, regardless
| of this setting
|
*/
define('SHOW_DEBUG_BACKTRACE', TRUE);

/*
|--------------------------------------------------------------------------
| Exit Status Codes
|--------------------------------------------------------------------------
|
| Used to indicate the conditions under which the script is exit()ing.
| While there is no universal standard for error codes, there are some
| broad conventions.  Three such conventions are mentioned below, for
| those who wish to make use of them.  The CodeIgniter defaults were
| chosen for the least overlap with these conventions, while still
| leaving room for others to be defined in future versions and user
| applications.
|
| The three main conventions used for determining exit status codes
| are as follows:
|
|    Standard C/C++ Library (stdlibc):
|       http://www.gnu.org/software/libc/manual/html_node/Exit-Status.html
|       (This link also contains other GNU-specific conventions)
|    BSD sysexits.h:
|       http://www.gsp.com/cgi-bin/man.cgi?section=3&topic=sysexits
|    Bash scripting:
|       http://tldp.org/LDP/abs/html/exitcodes.html
|
*/
define('EXIT_SUCCESS', 0); // no errors
define('EXIT_ERROR', 1); // generic error
define('EXIT_CONFIG', 3); // configuration error
define('EXIT_UNKNOWN_FILE', 4); // file not found
define('EXIT_UNKNOWN_CLASS', 5); // unknown class
define('EXIT_UNKNOWN_METHOD', 6); // unknown class member
define('EXIT_USER_INPUT', 7); // invalid user input
define('EXIT_DATABASE', 8); // database error
define('EXIT__AUTO_MIN', 9); // lowest automatically-assigned error code
define('EXIT__AUTO_MAX', 125); // highest automatically-assigned error code

// Various Logging Actions Possible
define('QUESTION_VIEWED',1);
define('QUESTION_UPVOTED',2);
define('QUESTION_DOWNVOTED',3);
define('QUESTION_ANSWERED',4);
define('QUESTION_ASKED',5);
define('SEARCH_QUERY',6);
define('COLLEGE_NAME',7);
define('COLLEGE_NODE',8);
define('COLLEGE_COMPARE',9);

// Various TYPE in Logging
define('TYPE_QUESTION',1);
define('TYPE_COLLEGE',2);
define('TYPE_STRUCTURE',3);
define('TYPE_ATTRIBUTE',4);

//Labels while processing logs
define('START_USER_PROCESS',1);
define('CURRENT_USER_PROCESS',2);
define('END_USER_PROCESS',3);
define('START_BATCH_PROCESS',4);
define('CURRENT_BATCH_PROCESS',5);
define('END_BATCH_PROCESS',6);

//Table names
define('FLAGS_TABLE','flags');
define('LOG_TABLE','nikhil_log_table');
define('LOG_POSITION_TABLE','nikhil_position');
define('SEARCH_BAR_FEED_TABLE','nikhil_search_feed');
define('COLLEGE_SIMILAR_NODES_TABLE','nikhil_similar_nodes');
define('TRENDING_SEARCHES_TABLE','nikhil_trending_searches');
define('USERS_SIMILAR_NODES_TABLE','nikhil_users_similar_nodes');
define('USERS_COLLEGE_DATA_TABLE','userprofiledata');
define('USERS_DESCRIPTION_TABLE','nikhil_user_profile');

//Communications Platform

define('BUCKET_NAME','hyrize');
define('BUCKET_ANSWERS', 'gs://hyrize/uploads/answers/');
define('BUCKET_QUESTIONS', 'gs://hyrize/uploads/questions/');
define('BUCKET_UPLOAD','gs://hyrize/uploads/');





define('API_KEY', '81mhu0b5jy854z');
define('API_SECRET', '2oa7duWfjX3jsBKK');
define('REDIRECT_URI', 'http://localhost:8080/linkedin_signup/test');
define('SCOPE', 'r_basicprofile r_emailaddress');