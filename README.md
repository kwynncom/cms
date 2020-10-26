# cms
Very beginning of my own CMS.

As of October 26, 2020, my goal is to deal with web server access lines like this:

GET /t/8/02/pacer/dat/WY1.html 

People are coming in through Google and arriving at those pages, but those pages are leaves in my filesystem tree.  They have no context and no way to navigate.  
They were never meant to be an endpoint.  

So I am starting with .htaccess file rewrites, and then I'll do some DOM manipulation to add content and context and such.


NOTES

practicing with:  http://sm20/cms/pacer/dat/asdfasdf.html?XDEBUG_SESSION_START=netbeans-xdebug

CREDITS

$actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
https://stackoverflow.com/questions/6768793/get-the-full-url-in-php
