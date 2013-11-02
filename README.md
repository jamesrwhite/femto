Femto
=====

A tiny PHP framework for tiny sites.

Why?
=======

Femto is something I developed for myself to use for sites that were too small to require the bloat of a full cms or complexity of a framework but still needed some dynamic parts.

Usage
========

<h4>Pages and Fragments</h4>

Femto is based on the concept of 'pages' and 'fragments'. A page maps directly to the URL at present, for example a request to yoursite.com/contact would try to load the page in pages/contact.php. A page can be compromised of any code you want and use multiple fragments, consider this 'Hello World' example:

<b>fragments/header.php</b>

    <!DOCTYPE html>
    <html>
    <head>
        <title><?php echo $title; ?></title>
    </head>
    <body>
    
<b>fragments/footer.php</b>

    </body>
    </html>
    
<b>pages/index.php</b>

    <?php $this->useFragment('header', array('title' => 'Femto')); ?>

	    <h1>Hello World</h1>

    <?php $this->useFragment('footer'); ?>

It's also worth noting it's possible to embed a fragment inside another fragment.

<h4>Configuration Variables</h4>

Femto also supports retrieving pre-defined configuration variables like so ````$this->getConfig('site', 'env')```` behind the scenes Femto looks for a file called site.php in the config directory of your application. It expects an associative array to be returned from that file like so:

<b>config/site.php</b>

    <?php
    
    return array(
        'env' => 'development',
    );

This is a very basic example that by default Femto uses to determine how to handle 500 errors in it's femto/500.php fragment but you could use config variables for anything. You could store a list of products for example.

<h4>Error Handling<h4>

Femto has very basic exception based error handling, if a page is requested that does not have a corresponding file in the pages directory internally a FemtoPageNotFoundException is thrown which Femto catches and if it exists will load the femto/400 fragment and returns a HTTP 404 status code. Femto also handles internal application errors such as when you request a fragment or configuration variable that doesn't exist, when this happens it tries to load the femto/500 fragment if it exists and returns a HTTP 500 status code.

Contributing
============

Femto is very early in development right now but if you have any ideas on how it could be imrproved please feel free to submit a pull requset and I will do my best to review it as soon as possible. At the moment my plan is to keep Femto as simple as possible, so for example I don't have any plans to add features like support for databases as that's not what I see Femto as being for.

License
=======

See the LICENSE file
