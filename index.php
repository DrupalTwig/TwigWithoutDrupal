<?php
// One include to rule them all.
require_once 'vendor/autoload.php';

// Where to find templates.
$loader = new Twig_Loader_Filesystem('templates');

// Some options for the environment.
$twig_options = array(
  // Should we store the compiled templates to disk?
  // Path where to store the compiled templates, or false to disable compilation cache (default).
  // 'cache' => FALSE,
  'cache' => 'cache',
  // Should we be escaping all variables entered?
  'autoescape' => TRUE,
  // Do we need to be strict? aka is defined?
  // Whether to ignore invalid variables in templates (default to false).
  'strict_variables' => FALSE,
  // Allow for dump() and other tools to be loaded.
  // When set to true, it automatically set "auto_reload" to true as well (default to false).
  'debug' => TRUE,
  // Whether to reload the template if the original source changed.
  // If you don't provide the auto_reload option, it will be
  // determined automatically based on the debug value above.
  'auto_reload' => TRUE,
);

// Setup the Environment, pass in the type of template loader (template file from filsystem)
// And the options.
$twig = new Twig_Environment($loader, $twig_options);

// Needed if we turn debugging on to get dump();
$twig->addExtension(new Twig_Extension_Debug());

// The links.
$links = array(
  array(
    'name' => 'link 1',
    'href' => '#',
  ),
  array(
    'name' => 'link 2',
    'href' => '#',
    'links' => array(
      array(
        'name' => '<b>sub link 2.1</b>',
        'href' => '#',
        'links' => array(

        ),
      ),
      array(
        'name' => 'sub link 2.2',
        'href' => '#',
        'links' => array(
        ),
      ),
    ),
  ),
);


echo $twig->render('page.twig', array('links' => $links));
