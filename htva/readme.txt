If called from a .php file, htva.php auto-creates the URL and HTML Valid image and such.  There is no need for a later redirect.

An HTML file, non-PHP, will link to htvalref and assume the following:

	/* the 2 lines below assume the cooperation of Apache config, such as:
	 	RewriteRule ^htvalref.* /t/23/02/htva/htva.php?redir=yes	*/
	const htmlrefk = 'redir'; 
	const htmlrefv = 'yes';	


If called from HTML, htval.php auto-generates the URL of the caller from HTTP referer.  

I do lots of checks to the referer to prevent mischief--anyone can call this and forge a referer.

I write the <a href='' like that to prevent the infamous "output before headers" or whatever.  I did get a Content-Length > 0 several versions 
ago because I was "leaking" output before the Location / redirect.  Perhaps this is too fancy / convoluted in that the HTML redirect version 
never returns from htvalNuURLDo::gethref();

I tried a perhaps better way with ob_start(), but the immediate version didn't work.  I'm sure I could make that work, but I'm not sure that code 
is any better.

docurl only matters with the PHP version.