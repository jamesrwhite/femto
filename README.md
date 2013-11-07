Femto
=====

A tiny PHP framework for tiny sites.

Why?
=======

Femto is something I developed for myself to use for sites that were too small to require the bloat of a full cms or complexity of a framework but still needed some dynamic parts.

Usage
========

<h4>Pages and Fragments</h4>

Femto is based on the concept of 'pages', 'templates' and 'fragments'. A page maps directly to the URL at present, for example a request to yoursite.com/contact would try to load the page in pages/contact.php. A page can be compromised of any code you want and use multiple fragments. A page can also 'use' a template, a template can consist of several fragments and common code you want to have on multiple pages. For example every page on your site is likely to need to use the header and footer fragments you have set up, a template would be a perfect use case for this. Consider the example set up below:

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

<b>templates/main.php</b>

    <?php $this->useFragment('header', array('title' => $title)); ?>

    <?php $this->templateContent(); ?>

    <?php $this->useFragment('footer'); ?>

<b>pages/index.php</b>

    <?php $this->useTemplate('main', array('title' => 'Home Page')); ?>
    
    <h1>Hello World</h1>
    

It's also worth noting it's possible to embed a fragment inside another fragment.

<h4>Configuration Variables</h4>

Femto also supports retrieving pre-defined configuration variables like so ````$this->getConfig('site', 'env')```` behind the scenes Femto looks for a file called site.php in the config directory of your application. It expects an associative array to be returned from that file like so:

<b>config/site.php</b>

    <?php
    
    return array(
        'env' => 'development',
    );

This is a very basic example that by default Femto uses to determine how to handle 500 errors in it's 500.php page but you could use config variables for anything. You could store a list of products for example.

<h4>Error Handling<h4>

Femto has very basic exception based error handling, if a page is requested that does not have a corresponding file in the pages directory internally a FemtoPageNotFoundException is thrown which Femto catches and if it exists will load pages/400.php and returns a HTTP 404 status code. Femto also handles internal application errors such as when you request a fragment or configuration variable that doesn't exist, when this happens it tries to load pages/500.php if it exists and returns a HTTP 500 status code.

Contributing
============

Femto is very early in development right now but if you have any ideas on how it could be imrproved please feel free to submit a pull requset and I will do my best to review it as soon as possible. At the moment my plan is to keep Femto as simple as possible, so for example I don't have any plans to add features like support for databases as that's not what I see Femto as being for.

Roadmap
========

I have no ETA's for these but listed below are some rough things I have planned:

- <del>Integrate Composer autoloading</del> Done in v0.2.0
- <del>Make Femto itself Composer compatible and add it to packagist</del> Done in v0.2.0, see seperate jamesrwhite/femto-core repo
- <del>Add some helper functions in for general tasks like string manipulation etc</del>Can be accomplished via a composer package
- <del>Add support for templates, ideally working in a similar way to Django/Twig.</del> Basic implementation in v0.3.0!
- Better environment support, like how Laravel allows folders in the config folder that correspond to the env

License
=======

See the LICENSE file
