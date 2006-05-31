
$Id$

Introduction
------------

This package contains a Whois (RFC954) library for PHP. It allows
a PHP program to create a Whois object, and obtain the output of
a whois query with the Lookup function.

The response is an array containing, at least, an element 'rawdata',
containing the raw output from the whois request.

In addition, if the domain belongs to a registrar for which a special
handler exists, the special handler will parse the output and make
additional elements available in the response. The keys of these
additional elements are described in the file HANDLERS.

It also supports ip/AS whois queries which are very useful to trace
SPAM. You just only need to pass the doted quad ip address or the
AS (Autonomus System) handle instead of the domain name. Limited,
non-recursive support for Referral Whois (RFC 1714/2167) is also
provided.

Requirements
------------

phpWhois requires PHP 4.3.0 or better with OpenSSL support to
work properly. Without SSL support you will not be able to
query domains which do not have a whois server but that have
a https based whois. Also, you can run it in lower PHP versions
but without timeout control. phpWhois will not work with PHP
versions below 4.1.0

Installation
------------

Basically, untar the distribution somewhere outside your server's
document root and make sure the directory is listed in 'include_path'
in your php.ini file, server configuration or in an .htaccess file.
If you want to test it using a web browser just copy example.php ,
example.html and whois.icon.png anywhere on your server's document
root and try it.

phpWhois is not a PHP aplication is a class that can be used in
applications. There is no need to make the installation folder
accesible to anyone but PHP, nevertheless you can install it inside
your server's document root if you like, it will work without
problems or security risks.

Example usage
-------------

(see example.php)

include('whois.main.php');

$whois = new Whois();
$result = $whois->Lookup('example.com');
echo "<pre>";
print_r($result);
echo "</pre>";

What you can query
------------------

You can use phpWhois to query domain names, ip addresses and
other information like AS, i.e, both of the following examples
work:

$whois = new Whois();
$result = $whois->Lookup('example.com');

$whois = new Whois();
$result = $whois->Lookup('62.97.102.115');

$whois = new Whois();
$result = $whois->Lookup('AS220');

Using special whois server
--------------------------

Some registrars can give special access to registered whois gateways
in order to have more fine control against abusing the whois services.
The currently know whois services that offer special acccess are:

- ripe

  The new ripe whois server software support some special parameters
  that allow to pass the real client ip address. This feature is only
  available to registered gateways. If you are registered you can use
  this service when querying ripe ip addresses that way:
  
  $whois = new Whois();
  $whois->UseServer('uk','whois.ripe.net?-V{version},{ip} {query}');
  $result = $whois->Lookup('62.97.102.115');

- whois.isoc.org.il

  This server is also using the new ripe whois server software and
  thus works the same way. If you are registered you can use this service
  when querying .il domains that way:

  $whois = new Whois();
  $whois->UseServer('uk','whois.isoc.org.il?-V{version},{ip} {query}');
  $result = $whois->Lookup('example.co.uk');

- whois.nic.uk

  They offer what they call WHOIS2 (see http://www.nominet.org.uk/go/whois2 )
  to registered users (usually Nominet members) with a higher amount of
  permited queries by hour. If you are registered you can use this service
  when querying .uk domains that way:

  $whois = new Whois();
  $whois->UseServer('uk','whois.nic.uk:1043?{hname} {ip} {query}');
  $result = $whois->Lookup('example.co.uk');

This new feature also allows you to use a different whois server than
the preconfigured or discovered one by just calling whois->UseServer
and passing the tld and the server and args to use for the named tld.
For example you could use another whois server for .au domains that
does not limit the number of requests (but provides no owner 
information) using this:

  $whois = new Whois();
  $whois->UseServer('au','whois-check.ausregistry.net.au');

UseServer can be called as many times as necessary. Please note that
if there is a handler for that domain it will also be called but
returned data from the whois server may be different than the data
expected by the handler, and thus results could be different.

Getting results faster
----------------------

If you just want to know if a domain is registered or not but do not
care about getting the real owner information you can set:

$whois->deep_whois = false;

this will tell phpWhois to just query one whois server. For .com, .net
and .tv domains and ip addresses this will prevent phpWhois to ask more
than one whois server, you will just know if the donmain is registered
or not and which is the registrar but not the owner information.

Notes 
-----

There is an extended class called "whois.utils.php" which contains a
debugging function called showObject(), if you showObject($result)
it will output the total layout of the returned object to the 
web browser.

The latest version of the package and a demo script resides at 
<http://phpwhois.sourceforge.net/>

There is also be an article describing the package on devshed.com
at <http://www.devshed.com/Server_Side/PHP/whois/>


Support/Patches
---------------

If you're really stuck and can't figure something out, or you want
to contribute an extended class for one of the TLD's, file a patch
or support request in the SourceForge tracker. One of the developers
will get around to applying or responding.
<http://sourceforge.net/projects/phpwhois>


Credits
-------

Mark Jeftovic <markjr@easydns.com>
David Saez Padros <david@ols.es>
Ross Golder <ross@golder.org>
