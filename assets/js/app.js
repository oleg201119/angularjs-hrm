var app = angular.module('hrmasterApp', ["ngRoute","ngSanitize", "ngCookies","ngMaterial",'ngAnimate','ui.grid', 'ui.grid.edit', 'autocomplete',
    'ui.grid.resizeColumns','ui.grid.selection', 'ui.bootstrap.modal', 'angularUtils.directives.dirPagination', 'material.components.expansionPanels']);

app.config(function($routeProvider, $locationProvider) {
    $routeProvider
    .when("/", {
        templateUrl : "assets/templates/index.html",
        controller : "indexController"
    })
    .when("/contactus", {
        templateUrl : "assets/templates/contactus.html",
        controller : "contactusController"
    })
    .when("/privacy", {
        templateUrl : "assets/templates/privacy.html",
        controller : "privacyController"
    })
    .when("/terms", {
        templateUrl : "assets/templates/terms.html",
        controller : "termsController"
    })
    .when("/trademarks", {
        templateUrl : "assets/templates/trademarks.html",
        controller : "trademarksController"
    })
    .when("/aboutus", {
        templateUrl : "assets/templates/aboutus.html",
        controller : "aboutusController"
    })
    .when("/jobs", {
        templateUrl : "assets/templates/jobs.html",
        controller : "jobsController"
    })
    .when("/blog", {
        templateUrl : "assets/templates/blog.html",
        controller : "blogController"
    })
    .when("/contacts", {
        templateUrl : "assets/templates/contacts.html",
        controller : "contactsController"
    })
    .when("/login", {
        templateUrl : "assets/templates/login.html",
        controller : "loginController"
    })
    .when("/logout", {
        templateUrl : "assets/templates/login.html",
        controller : "logoutController"
    })
    .when("/moreinfo", {
        templateUrl : "assets/templates/moreinfo.html",
        controller : "moreinfoController"
    })
    .when("/forgotpassword", {
        templateUrl : "assets/templates/forgotpassword.html",
        controller : "forgotpasswordController"
    })

    .when("/dashboard", {
        templateUrl : "assets/templates/dashboard.html",
        controller : "dashboardController"
    })
    .when("/employees", {
        templateUrl : "assets/templates/employees.html",
        controller : "employeeController"
    })
    .when("/project", {
        templateUrl : "assets/templates/project.html",
        controller : "projectController"
    })
    .when("/permissions", {
        templateUrl : "assets/templates/permissions.html",
        controller : "permissionsController"
    })
    .when("/resetpassword/:hash", {
        templateUrl : "assets/templates/resetpassword.html",
        controller : "resetpasswordController"
    })
    .when("/solution/:anchor", {
        templateUrl : "assets/templates/solution.html",
        controller : "solutionController"
    })
    .when("/solution", {
        templateUrl : "assets/templates/solution.html",
        controller : "solutionController"
    })
    .when("/users", {
        templateUrl : "assets/templates/users.html",
        controller : "usersController"
    })
    .when("/hrmusers", {
        templateUrl : "assets/templates/hrm_admin/hrmusers.html",
        controller : "hrmusersController"
    })
    .when("/add_hrmuser", {
        templateUrl : "assets/templates/hrm_admin/add_hrmuser.html",
        controller : "AddHrmUserController"
    })
    .when("/edit_hrmuser/:id", {
        templateUrl : "assets/templates/hrm_admin/edit_hrmuser.html",
        controller : "EditHrmUserController"
    })
    .when("/trainingcourses", {
        templateUrl: "assets/templates/training/trainingcourses.html",
        controller: "trainingController"
    })
    .when("/train_dashboard", {
        templateUrl: "assets/templates/training/train_dashboard.html",
        controller: "TrainDashboardController"
    })
    .when("/edit_course/:id", {
        templateUrl: "assets/templates/training/edit_course.html",
        controller: "EditCourseController"
    })
    .when("/add_course", {
        templateUrl: "assets/templates/training/add_course.html",
        controller: "AddCourseController"
    })
    .when("/allocatetraining", {
        templateUrl: "assets/templates/training/alloc_training_list.html",
        controller: "AllocTrainingListController"
    })
    .when("/alloc_course", {
        templateUrl: "assets/templates/training/alloc_course.html",
        controller: "AllocCourseController"
    })
    .when("/edit_alloc_course/:id", {
        templateUrl: "assets/templates/training/edit_alloc_course.html",
        controller: "EditAllocCourseController"
    })
    .when("/addCourses/:id", {
        templateUrl: "assets/templates/addCourses.html",
        controller: "addCoursesController"
    })
    .when("/addCourses/:id/:selected_num", {
        templateUrl: "assets/templates/addCourses.html",
        controller: "addCoursesController"
    })
    .when("/trainingcourselist", {
        templateUrl: "assets/templates/trainingcourselist.html",
        controller: "trainingcourselistController"
    }) 
    .when("/docourse/:courseid/:employeeid", {
        templateUrl: "assets/templates/docourse.html",
        controller: "docourseController"
    })
    .when("/hazardoussubstance", {
        templateUrl: "assets/templates/hazardoussubstance.html",
        controller: "hazardoussubstanceController"
    })   
    .when("/sitedata", {
        templateUrl: "assets/templates/sitedata.html",
        controller: "sitedataController"
    })       
    .when("/hrmsitedata", {
        templateUrl: "assets/templates/hrmsitedata.html",
        controller: "hrmsitedataController"
    })
    .when("/assetregister", {
        templateUrl: "assets/templates/assetRegister.html",
        controller: "assetregisterController"
    })    
    ;

    //$locationProvider.html5Mode(true);
});


// Add the startsWith and endsWidth to the String prototype
if (typeof String.prototype.startsWith != 'function') {
    String.prototype.startsWith = function(str) {
        return this.substring(0, str.length) === str;
    }
};

if (typeof String.prototype.endsWith != 'function') {
    String.prototype.endsWith = function(str) {
        return this.substring(this.length - str.length, this.length ) === str;
    }
};
