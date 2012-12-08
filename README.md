Well, this is a membership database query program written in PHP and tries to be KISS. The origional program failed in competing with my senior's code in the Students' Union and the head allowed me to make it open-source. This version contains a **rewritten** PDO database driver but it **has not been tested** for my VPS running Debian 6 does not support PDO.   
  
The system is aimed for the Wuhan Foreign Languages School Students' Union to build a KISS HRM system in conbination with various open source software including phpMyAdmin, MySQL and Cherokee Web Server. But this solution has proven to be too simple which does not meet some of the needs including QR Code integration, iOS and Android app integration etc.  
  
**NOTICE TO USERS**    
The configuration file is located in "api/lib/config.inc.php" and for a obvious reason you should **bann** the access to this folder from an end user.  
There are some links which points the phpMyAdmin login page and some sites of my school. **Be sure to modify** that before you start to use it. These files includes "index.html" and "api/query.html".  
The heading images is used to promote my school and you should replace it before you use this program, the file is "img/bright_pixel.gif" and it is defined in the CSS.  
The UI is based on the Bright Pixel template by [Arcsin](http://arcsin.se) and the copyright info is at the footer of the HTML files meitioned before. Be sure to modify it before use. **Remember not to remove "Designed by Arcsin" and "Modified by Tom Bu" part.**   
The "api/m.php" file is **broken** for some reason and it has not been rewritten in PDO. Any fork and patch on fixing this bug is welcome. Email to tombu@tombu.biz or leave a comment or do a pull request if you can fix this typo. Thanks.
