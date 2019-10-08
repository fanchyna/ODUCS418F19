<?php
include("./server/connect_db.php");
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>change password</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.7.0/css/all.css' integrity='sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ' crossorigin='anonymous'>

    <!-- Scripts By Self   -->
    <link rel="stylesheet" type="text/css" href="style/theme.css">
    <script src="./site_scripts/changePassword.js" type="text/javascript"></script>

</head>
<body>
<?php include('navbar.php') ?>

<div class="col-md-10 offset-md-1">
                    <span class="anchor" id="formComplex"></span>
                    <hr class="my-5">
                    <h3 class="pageTitle" style="display:inline-block;">ADVANCED SEARCH </h3> 
                    <a class="startOver" style="float:right">Start Over</a>
                    <!-- rsfresh page -->
                    
                    <!-- form complex example -->
                    <div class="form-row mt-4">
                        <div class="col-sm-5 pb-3">
                            <label for="exampleAccount">Account #</label>
                            <input type="text" class="form-control" id="exampleAccount" placeholder="XXXXXXXXXXXXXXXX">
                        </div>
                        <div class="col-sm-3 pb-3">
                            <label for="exampleCtrl">Control #</label>
                            <input type="text" class="form-control" id="exampleCtrl" placeholder="0000">
                        </div>
                        <div class="col-sm-4 pb-3">
                            <label for="exampleAmount">Amount</label>
                            <div class="input-group">
                                <div class="input-group-prepend"><span class="input-group-text">$</span></div>
                                <input type="text" class="form-control" id="exampleAmount" placeholder="Amount">
                            </div>
                        </div>
                         <div class="col-sm-12 pb-3">
                            <h4 class="pagesecondTitle">MORE ADVANCED SEARCH </h4> 
                        </div>
                        <div class="col-sm-6 pb-3">
                            <label for="mileage">Mileage</label>
                            <!-- <input type="text" class="form-control" id="mileage"> -->
                            <div class="dropdown">
                                <button type="button" class="advDropDown dropdown-toggle" data-toggle="dropdown">
                                </button>
                                <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" href="#">10 000 or Less</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#">20 000 or Less</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#">30 000 or Less</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#">40 000 or Less</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#">50 000 or Less</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#">60 000 or Less</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#">70 000 or Less</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#">80 000 or Less</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#">90 000 or Less</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#">100 000 or Less</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#">150 000 or Less</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#">300 000 or more</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#">unknown</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 pb-3">
                            <label for="exteriorColor">Exterior Color </label>
                            <input type="text" class="form-control" id="exteriorColor">
                        </div>
                        <div class="col-sm-6 pb-3">
                            <label for="interiorColor">Interior Color</label>
                            <input type="text" class="form-control" id="interiorColor">
                        </div>
                        <div class="col-sm-3 pb-3">
                            <label for="exampleSt">Transmission</label>
                            <select class="form-control" id="exampleSt">
                                <option>Pick a state</option>
                            </select>
                        </div>
                        <div class="col-sm-3 pb-3">
                            <label for="exampleZip">Postal Code</label>
                            <input type="text" class="form-control" id="exampleZip">
                        </div>
                        <div class="col-md-6 pb-3">
                            <label for="exampleAccount">Color</label>
                            <div class="form-group small">
                                <div class="form-check form-check-inline">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1"> Blue
                                    </label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2"> Red
                                    </label>
                                </div>
                                <div class="form-check form-check-inline disabled">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio3" value="option3" disabled=""> Green
                                    </label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option4"> Yellow
                                    </label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option5"> Black
                                    </label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option6"> Orange
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 pb-3">
                            <label for="exampleMessage">Message</label>
                            <textarea class="form-control" id="exampleMessage"></textarea>
                            <small class="text-info">
                              Add the packaging note here.
                            </small>
                        </div>
                        <div class="col-12">
                            <div class="form-row">
                                 <label class="col-md col-form-label"  for="name">Generated Id</label>
                                 <input type="text" class="form-control col-md-4" name="gid" id="gid" />
                                 <label class="col-md col-form-label"  for="name">Date Assigned</label>
                                 <input type="text" class="form-control col-md-4" name="da" id="da" />
                            </div>
                        </div>
                    </div>

                </div>

</body>

</html>