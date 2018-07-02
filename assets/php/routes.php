<?php

//require('db.class.php');
require('transaction.class.php');
require('registers.class.php');


// Add route callbacks
$app->post('/auth/login', function ($request, $response, $args) {
    $params = json_decode($request->getBody());
    $trans = new transaction();
    $result = $trans->doLogin($params);
    return $response->withStatus(200)->write($result);
});

$app->post('/auth/forgotpassword', function ($request, $response, $args) {
    $params = json_decode($request->getBody());
    $trans = new transaction();
    $result = $trans->forgotPassword($params);
    return $response->withStatus(200)->write($result);
});

$app->post('/auth/resetpassword', function ($request, $response, $args) {
    $params = json_decode($request->getBody());
    $trans = new transaction();
    $result = $trans->resetPassword($params);
    return $response->withStatus(200)->write($result);
});

$app->post('/auth/getemailfromhash', function ($request, $response, $args) {
    $params = json_decode($request->getBody());
    $trans = new transaction();
    $result = $trans->getEmailFromHash($params);
    return $response->withStatus(200)->write($result);
});

$app->post('/auth/getpermissiondata', function ($request, $response, $args) {
    $trans = new transaction();
    $result = $trans->getPermissionData();
    return $response->withStatus(200)->write($result);
});

$app->post('/auth/savepermissions', function ($request, $response, $args) {
    $params = json_decode($request->getBody());
    $trans = new transaction();
    $result = $trans->savePermissions($params);
    return $response->withStatus(200)->write($result);
});

$app->get('/auth/getpermissions/{role}', function ($request, $response, $args) {
    $route = $request->getAttribute('route');
    $role = $route->getArgument('role');

    $trans = new transaction();
    $data = $trans->getPermissions($role);
    return $response->withStatus(200)->write($data);
});

$app->post('/employee/save', function ($request, $response, $args) {
    $params = json_decode($request->getBody());
    $trans = new transaction();
    $result = $trans->saveEmployee($params);
    return $response->withStatus(200)->write($result);
});

$app->post('/employee/getdata', function ($request, $response, $args) {  
    $params = json_decode($request->getBody());
    $trans = new transaction();
    $result = $trans->getEmployeeData($params);
    return $response->withStatus(200)->write($result);
});

$app->post('/employee/search', function ($request, $response, $args) {
    $params = json_decode($request->getBody());
    $trans = new transaction();
    $result = $trans->searchEmployee($params);
    return $response->withStatus(200)->write($result);
});

$app->post('/employeeuser/search', function ($request, $response, $args) {
    $params = json_decode($request->getBody());
    $trans = new transaction();
    $result = $trans->searchEmployeeUser($params);
    return $response->withStatus(200)->write($result);
});


$app->post('/user/getlist', function ($request, $response, $args) {
    $params = json_decode($request->getBody());
    $trans = new transaction(); 
    $result = $trans->getUsers($params);
    return $response->withStatus(200)->write($result);
});

$app->post('/user/getglobaldata', function ($request, $response, $args) {
    $trans = new transaction();
    $result = $trans->getUserGlobalData();
    return $response->withStatus(200)->write($result);
});

$app->post('/user/getdata', function ($request, $response, $args) {
    $trans = new transaction();
    $result = $trans->getUserLoginData();
    return $response->withStatus(200)->write($result);
});

$app->post('/user/getuser', function ($request, $response, $args) {
    $params = json_decode($request->getBody());
    $trans = new transaction();
    $user_id = $params->user_id;
    $result = json_encode($trans->getUser($user_id));
    return $response->withStatus(200)->write($result);
});

$app->post('/user/save', function ($request, $response, $args) {
    $params = json_decode($request->getBody());
    $trans = new transaction();
    $result = $trans->saveUser($params);
    return $response->withStatus(200)->write($result);
});

$app->post('/user/save_child_user', function ($request, $response, $args) {
    $params = json_decode($request->getBody());
    $trans = new transaction();
    $result = $trans->saveChildUser($params);
    return $response->withStatus(200)->write($result);
});

$app->post('/user/update', function ($request, $response, $args) {
    $params = json_decode($request->getBody());
    $trans = new transaction();
    $result = $trans->updateUser($params);
    return $response->withStatus(200)->write($result);
});

$app->post('/user/search', function ($request, $response, $args) {
    $params = json_decode($request->getBody());
    $trans = new transaction();
    $result = $trans->searchUser($params);
    return $response->withStatus(200)->write($result);
});

$app->post('/user/get_employee_list', function ($request, $response, $args) {
    $params = json_decode($request->getBody());
    $trans = new transaction();
    $result = $trans->getEmployeeList($params);
    return $response->withStatus(200)->write($result);
});

$app->post('/user/activateuser', function ($request, $response, $args) {
    $params = json_decode($request->getBody());
    $trans = new transaction();
    $result = $trans->activateUser($params);
    return $response->withStatus(200)->write($result);
});

$app->post('/user/releaselock', function ($request, $response, $args) {
    $params = json_decode($request->getBody());
    $trans = new transaction();
    $result = $trans->releaseLock($params);
    return $response->withStatus(200)->write($result);
});

$app->post('/delete', function ($request, $response, $args) {
    $params = json_decode($request->getBody());
    $trans = new transaction();
    $result = $trans->delete($params);
    return $response->withStatus(200)->write($result);
});

$app->get('/user/getlogindetail/{id}', function ($request, $response, $args) {
    $route = $request->getAttribute('route');
    $id = $route->getArgument('id');
    $trans = new transaction();
    $data = $trans->getUserLoginDetail($id);
    return $response->withStatus(200)->write($data);
});

$app->get('/get/{type}/{id}', function ($request, $response, $args) {
    $route = $request->getAttribute('route');
    $id = $route->getArgument('id');
    $type = $route->getArgument('type');

    $trans = new transaction();
    $normal = array('hs','ar','sitedata','employee');
    if (in_array($type, $normal)) {
        $data = $trans->get($type, $id);
    } else {
        $data = $trans->getUserLoginDetail($id);
    }

    return $response->withStatus(200)->write($data);
});


$app->post('/course/getdata', function ($request, $response, $args) {
    $params = json_decode($request->getBody());
    $trans = new transaction();
    $result = $trans->getCourseData($params->user_id);
    return $response->withStatus(200)->write($result);
    
});

$app->post('/get/sitedata', function ($request, $response, $args) {
    $params = json_decode($request->getBody());
    $trans = new transaction();
    $result = $trans->getSiteData($params);
    return $response->withStatus(200)->write($result);
    
});

$app->post('/course/start', function ($request, $response, $args) {
    $params = json_decode($request->getBody());
    $trans = new transaction();
    $result = $trans->startCourse($params);
    return $response->withStatus(200)->write($result);
    
});





$app->post('/site/savedata', function ($request, $response, $args) {
    $params = json_decode($request->getBody());
    $trans = new transaction();
    $result = $trans->saveSiteData($params);
    return $response->withStatus(200)->write($result);
    
});

$app->post('/data/search', function ($request, $response, $args) {
    $params = json_decode($request->getBody());
    $trans = new transaction();
    $result = $trans->searchSiteData($params);
    return $response->withStatus(200)->write($result);
    
});


$app->post('/course/getCourse', function ($request, $response, $args) {
    $params = json_decode($request->getBody());

    $trans = new transaction();
    $result = $trans->getCourseByID($params);
    return $response->withStatus(200)->write($result);
});
$app->post('/course/getCourseSingle', function ($request, $response, $args) {
    $params = json_decode($request->getBody());

    $trans = new transaction();
    $result = $trans->getCourse($params);
    return $response->withStatus(200)->write($result);
});

$app->post('/course/getcoursesbyuser', function ($request, $response, $args) {
    $params = json_decode($request->getBody());
    $trans = new transaction();
    $result = $trans->getCourseByUser($params);
    return $response->withStatus(200)->write($result);
});

$app->post('/course/getCate', function ($request, $response, $args) {
    $params = json_decode($request->getBody());

    $trans = new transaction();
    $result = $trans->getCourseCate();
    return $response->withStatus(200)->write($result);
    
});

$app->post('/course/activatecourse', function ($request, $response, $args) {
    $params = json_decode($request->getBody());
    $trans = new transaction();
    $result = $trans->activateCourse($params);
    return $response->withStatus(200)->write($result);
});

$app->post('/course/saveCourse', function ($request, $response, $args) {
    $params = json_decode($request->getBody());
    $trans = new transaction();
    $result = $trans->saveCourse($params);
    return $response->withStatus(200)->write($result);
});

$app->post('/course/addCourse', function ($request, $response, $args) {
    $params = json_decode($request->getBody());
    $trans = new transaction();
    $result = $trans->addCourse($params);
    return $response->withStatus(200)->write($result);
});

$app->post('/course/addCoursefile', function ($request, $response, $args) {
    $params = $_POST;
    $trans = new transaction();
    $result = $trans->addCoursefile($params);
    return $response->withStatus(200)->write($result);
});

$app->post('/course/editCourse', function ($request, $response, $args) {
    $params = $_POST;
    $trans = new transaction();
    $result = $trans->editCourse($params);
    return $response->withStatus(200)->write($result);
});

$app->post('/course/delCourse', function ($request, $response, $args) {
    $params = json_decode($request->getBody()); //print_r($params); exit();
    $trans = new transaction();
    $result = $trans->delCourse($params);
    return $response->withStatus(200)->write($result);
});

$app->post('/course/searchCourse', function ($request, $response, $args) {
    $params = json_decode($request->getBody());
    $trans = new transaction();
    $result = $trans->searchCourse($params);
    return $response->withStatus(200)->write($result);
});

$app->post('/course/allocCourse', function ($request, $response, $args) {
    $params = json_decode($request->getBody());
    $trans = new transaction();
    $result = $trans->allocCourse($params);
    return $response->withStatus(200)->write($result);
});

$app->post('/course/updateAllocCourse', function ($request, $response, $args) {
    $params = json_decode($request->getBody());
    $trans = new transaction();
    $result = $trans->updateAllocCourse($params);
    return $response->withStatus(200)->write($result);
});

$app->post('/course/getAllocCourses', function ($request, $response, $args) {
    $params = json_decode($request->getBody());
    $trans = new transaction();
    $result = $trans->getAllocCourseData($params->user_id);
    return $response->withStatus(200)->write($result);
});

$app->post('/course/submitanswer', function ($request, $response, $args) {
    $params = json_decode($request->getBody());
    $trans = new transaction();
    $result = $trans->saveCourseAnswer($params);
    return $response->withStatus(200)->write($result);
});

$app->post('/course/delAllocCourse', function ($request, $response, $args) {

    $params = json_decode($request->getBody()); //print_r($params); exit();
    $trans = new transaction();
    $result = $trans->delAllocCourse($params);
    return $response->withStatus(200)->write($result);
});

$app->post('/media/remove', function ($request, $response, $args) {

    $params = json_decode($request->getBody()); //print_r($params); exit();
    $trans = new transaction();
    $result = $trans->removeFile($params);
    return $response->withStatus(200)->write($result);
});


$app->post('/course/getAllocCourseById', function ($request, $response, $args) {
    $params = json_decode($request->getBody());

    $trans = new transaction();
    $result = $trans->getAllocCourseByID($params);
    return $response->withStatus(200)->write($result);

});

$app->post('/hs/getdata', function ($request, $response, $args) {
    $params = json_decode($request->getBody());

    $trans = new transaction();
    $result = $trans->getHSData($params);
    return $response->withStatus(200)->write($result);

});

$app->post('/hs/savehs', function ($request, $response, $args) {
    $params = json_decode($request->getBody());

    $trans = new transaction();
    $result = $trans->saveHS($params);
    return $response->withStatus(200)->write($result);

});

$app->post('/assetregister/getdata', function ($request, $response, $args) {
    $params = json_decode($request->getBody());
    $trans = new register();
    $result = $trans->getAssetRegisterData($params);
    return $response->withStatus(200)->write($result);
});

$app->post('/assetregister/save', function ($request, $response, $args) {
    $params = json_decode($request->getBody());
    $trans = new register();
    $result = $trans->saveAssetRegister($params);
    return $response->withStatus(200)->write($result);
});


// Examples
/************************************************************************
$app->post('/order/getorders', function ($request, $response, $args) {
    $params = json_decode($request->getBody());

    $order = new order();
    $data = $order->getOrders($params->status);
    return $response->withStatus(200)->write($data);
});

$app->get('/order/getorder/{orderno}', function ($request, $response, $args) {
    $route = $request->getAttribute('route');
    $orderNo = $route->getArgument('orderno');

    $order = new order();
    $data = $order->getOrder($orderNo);
    return $response->withStatus(200)->write($data);
});
*/
