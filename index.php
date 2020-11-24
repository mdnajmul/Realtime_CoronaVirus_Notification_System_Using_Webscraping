<?php

    //hold url link
    $url="http://dashboard.dghs.gov.bd/webportal/pages/covid19.php";
    //fetch all data from url
    $html=file_get_contents($url);

    //create dom object
    $dom=new domDocument();

    @$dom->loadHTML($html);

    $result=$dom->getElementsByTagName('span');
    $resultArr=array();
    foreach($result as $list){
        if(isset($list->nodeValue)){
            $resultArr[]=$list->nodeValue;
        }

    }

    $tables=$dom->getElementsByTagName('table');
    $rows=$tables->item(0)->getElementsByTagName('tr');
    
    $division=array();
    $district=array();
    $case=array();
    foreach($rows as $row){
        $cols=$row->getElementsByTagName('td');
        if(isset($cols->item(0)->nodeValue)){
            $division[]=$cols->item(0)->nodeValue;
            $district[]=$cols->item(1)->nodeValue;
            $case[]=$cols->item(2)->nodeValue;
        }

    }

?>

<!DOCTYPE html>
<html lang="en">

<head>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Dashboard</title>
    
    <link rel="stylesheet" href="css/materialdesignicons.min.css">
    <link rel="stylesheet" href="css/vendor.bundle.base.css">
    <link rel="stylesheet" href="css/dataTables.bootstrap4.css">
    
    <link rel="stylesheet" href="css/bootstrap-datepicker.min.css">
    
    <link rel="stylesheet" href="css/style.css">
</head>

<body class="sidebar-light">
    <div class="container-scroller">
       <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
            <div class="navbar-menu-wrapper d-flex align-items-stretch justify-content-between">
                <ul class="navbar-nav mr-lg-2 d-none d-lg-flex">
                    <li class="nav-item nav-toggler-item">
                        
                    </li>

                </ul>
                <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
                    <h2 style="margin-left: -255px;">Covid-19 Live Updates (Bangladesh)</h2>
                </div>
                <ul class="navbar-nav navbar-nav-right">

                    <li class="nav-item nav-profile dropdown">
                        
                            <span class="nav-profile-name" style="margin-right: 80px;"><?php echo $resultArr['0']?></span>
                    </li>

                    <li class="nav-item nav-toggler-item-right d-lg-none">
                        <button class="navbar-toggler align-self-center" type="button" data-toggle="offcanvas">
                            <span class="mdi mdi-menu"></span>
                        </button>
                    </li>
                </ul>
            </div>
        </nav>
       
        <div class="container-fluid page-body-wrapper">

            
            <div class="main-panel">
                <div class="content-wrapper">

                    <div class="row">
                        <div class="col-md-6 col-lg-3 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <h1 class="font-weight-light mb-4">
                                        <?php echo $resultArr['13']?> </h1>
                                    <div class="d-flex flex-wrap align-items-center">
                                        <div>
                                            <h4 class="font-weight-normal" style="color:green;">Confirmed</h4>
                                            <p class="text-muted mb-0 font-weight-light">Last 24 Hours</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-3 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <h1 class="font-weight-light mb-4">
                                        <?php echo $resultArr['16']?> </h1>
                                    <div class="d-flex flex-wrap align-items-center">
                                        <div>
                                            <h4 class="font-weight-normal" style="color:red">Death</h4>
                                            <p class="text-muted mb-0 font-weight-light">Last 24 Hours</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-3 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <h1 class="font-weight-light mb-4">
                                        <?php echo $resultArr['15']?> </h1>
                                    <div class="d-flex flex-wrap align-items-center">
                                        <div>
                                            <h4 class="font-weight-normal" style="color:blue">Recovered</h4>
                                            <p class="text-muted mb-0 font-weight-light">Last 24 Hours</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-3 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <h1 class="font-weight-light mb-4">
                                        <?php echo $resultArr['12']?> </h1>
                                    <div class="d-flex flex-wrap align-items-center">
                                        <div>
                                            <h4 class="font-weight-normal" style="color:#F7BF66">Test</h4>
                                            <p class="text-muted mb-0 font-weight-light">Last 24 Hours</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-3 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <h1 class="font-weight-light mb-4">
                                        <?php echo $resultArr['4']?> </h1>
                                    <div class="d-flex flex-wrap align-items-center">
                                        <div>
                                            <h4 class="font-weight-normal" style="color:green;">Total Confirmed</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-3 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <h1 class="font-weight-light mb-4">
                                        <?php echo $resultArr['10']?> </h1>
                                    <div class="d-flex flex-wrap align-items-center">
                                        <div>
                                            <h4 class="font-weight-normal" style="color:red">Total Death</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-3 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <h1 class="font-weight-light mb-4">
                                        <?php echo $resultArr['8']?> </h1>
                                    <div class="d-flex flex-wrap align-items-center">
                                        <div>
                                            <h4 class="font-weight-normal" style="color:blue">Total Recovered</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-3 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <h1 class="font-weight-light mb-4">
                                        <?php echo $resultArr['2']?> </h1>
                                    <div class="d-flex flex-wrap align-items-center">
                                        <div>
                                            <h4 class="font-weight-normal" style="color:#F7BF66">Total Test</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-md-12 col-lg-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title" style="margin-left: 215px;color:#FF8C00;font-size:18px;">District wise confirmed cases (Counting may not be equal to total cases)</h4>
                                    <div class="table-responsive">
                                        <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th>S. No.</th>
                                                    <th>Division</th>
                                                    <th>Distirct</th>
                                                    <th>Total Case</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                               <?php
                                                    $i=0;
                                                    foreach($division as $key=>$val){
                                                        $i++;
                                                ?>
                                                        <tr>
                                                            <td><?php echo $i?></td>
                                                            <td><?php echo $val?></td>
                                                            <td><?php echo $district[$key]?></td>
                                                            <td><?php echo $case[$key]?></td>
                                                        </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>





                </div>
                
                <footer class="footer">
                    <div class="d-sm-flex justify-content-center justify-content-sm-between">
                        <span class="text-muted text-center text-sm-left d-block d-sm-inline-block" style="margin-left: 150px;">
                            <strong>Copyright &copy; 2020 <a href="dghs.gov.bd">MIS, DGHS</a>
                                &nbsp;&nbsp;Data source:
                                <a href="#"> HEOC & Control Room, IEDCR, DHIS2</a>
                                &nbsp;&nbsp;
                                Prepared by:
                                <a href="#"> Md. Najmul Ovi</a>

                            </strong>
                        </span>
                    </div>
                </footer>
                
            </div>
            
        </div>
        
    </div>
    

    
    <script src="js/vendor.bundle.base.js"></script>
    <script src="js/jquery.dataTables.js"></script>
    <script src="js/dataTables.bootstrap4.js"></script>
    
    <script src="js/Chart.min.js"></script>
    <script src="js/bootstrap-datepicker.min.js"></script>
    
    <script src="js/off-canvas.js"></script>
    <script src="js/hoverable-collapse.js"></script>
    <script src="js/template.js"></script>
    <script src="js/settings.js"></script>
    <script src="js/todolist.js"></script>
    
    <script src="js/dashboard.js"></script>
    <script src="js/data-table.js"></script>
    
</body>

</html>

