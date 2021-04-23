<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php'))
{
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Users');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Users::index');
$routes->get('adviser', 'Adviser::index', ['filter' => 'auth']);
$routes->get('dashboard', 'Dashboard::index', ['filter' => 'auth']);

$routes->match(['get', 'post'],'viewproject/(:any)', 'ViewProject::index/$1', ['filter' => 'auth']);
$routes->post('addtask/(:any)', 'AddTask::index/$1');
$routes->match(['get', 'post'],'edittask/(:any)', 'EditTask::index/$1');
$routes->match(['get', 'post'],'evaluate/(:any)', 'Evaluate::index/$1');
$routes->post('updateproject', 'UpdateProject::index');
$routes->match(['get', 'post'],'comment/(:any)', 'Comment::index/$1');
$routes->post('addproductivity/(:any)', 'AddProductivity::index/$1');
$routes->match(['get', 'post'],'newproject/(:any)', 'NewProject::index/$1', ['filter' => 'auth']);
$routes->match(['get', 'post'],'editproject/(:any)', 'EditProject::index/$1', ['filter' => 'auth']);





























$routes->get('addteam', 'Adviser::addteam', ['filter' => 'auth']);
$routes->get('viewteam/(:any)', 'Adviser::viewteam/$1', ['filter' => 'auth']);
$routes->match(['get', 'post'], 'viewmodule/(:any)', 'Adviser::viewmodule/$1', ['filter' => 'auth']);
$routes->match(['get', 'post'],'newproject', 'NewProject::index');
$routes->post('AddMembers', 'AddMembers::index');
$routes->get('chatt', 'Adviser::chatt', ['filter' => 'auth']);
$routes->match(['get', 'post'],'chatuser/(:any)', 'Adviser::chatuser/$1', ['filter' => 'auth']);
$routes->post('profile', 'Profile::index');


$routes->get('leader', 'Leader::index', ['filter' => 'auth']);
$routes->match(['get', 'post'],'addmodule', 'Leader::addmodule', ['filter' => 'auth']);
$routes->get('moduleview', 'Leader::moduleview', ['filter' => 'auth']);
$routes->get('chat', 'Leader::chat', ['filter' => 'auth']);

$routes->match(['get', 'post'],'userschat/(:any)', 'Leader::userschat/$1', ['filter' => 'auth']);
$routes->match(['get', 'post'],'adviserchat/(:any)', 'Leader::adviserchat/$1', ['filter' => 'auth']);
$routes->match(['get', 'post'],'resultmodule/(:any)', 'Leader::resultmodule/$1');


$routes->get('logout', 'Users::logout');
$routes->match(['get', 'post'], 'register', 'Users::register', ['filter' => 'noauth']);
$routes->match(['get', 'post'], 'profile', 'Users::profile', ['filter' => 'auth']);

$routes->get('student', 'Student::index', ['filter' => 'auth']);
$routes->get('moduleteam', 'Student::moduleteam', ['filter' => 'auth']);
$routes->get('studentmodule', 'Student::studentmodule', ['filter' => 'auth']);
$routes->match(['get', 'post'],'studentresult/(:any)', 'Student::studentresult/$1');
$routes->get('studentchat', 'Student::studentchat', ['filter' => 'auth']);
$routes->match(['get', 'post'],'userstudentchat/(:any)', 'Student::userstudentchat/$1', ['filter' => 'auth']);
$routes->match(['get', 'post'],'chatadviser/(:any)', 'Student::chatadviser/$1', ['filter' => 'auth']);
$routes->get('admin', 'Admin::index', ['filter' => 'auth']);

/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php'))
{
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
