<?php

    $con=mysqli_connect('localhost','root','','coronavirus');

    mysqli_query($con,"TRUNCATE TABLE live_update_bd");
    mysqli_query($con,"TRUNCATE TABLE district_update_bd");


    $today_confirmed='';
    $today_death='';
    $today_recovered='';
    $today_test='';
    $total_confirmed='';
    $total_death='';
    $total_recovered='';
    $total_test='';
    $div='';
    $dist='';
    $case='';


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
    $today_confirmed=trim($resultArr['13']);
    $today_death=trim($resultArr['16']);
    $today_recovered=trim($resultArr['15']);
    $today_test=trim($resultArr['12']);
    $total_confirmed=trim($resultArr['4']);

    //remove &nbsp; from $total_death & $total_recovered
    $total_death=str_replace("\xc2\xa0",'  ',$resultArr['10']);
    $total_recovered=str_replace("\xc2\xa0",'  ',$resultArr['8']);


    $total_test=trim($resultArr['2']);

    //remove white space from string
    $total_death=trim($total_death);
    $total_recovered=trim($total_recovered);

    $sql="INSERT INTO live_update_bd(today_confirmed,today_death,today_recovered,today_test,total_confirmed,total_death,total_recovered,total_test) VALUES('$today_confirmed','$today_death','$today_recovered','$today_test','$total_confirmed','$total_death','$total_recovered','$total_test')";
    
    mysqli_query($con,$sql);




    $tables=$dom->getElementsByTagName('table');
    $rows=$tables->item(0)->getElementsByTagName('tr');
    
    foreach($rows as $row){
        $cols=$row->getElementsByTagName('td'); 
        if(isset($cols->item(0)->nodeValue)){ 
            //This is for only data insert into database table//
                $div=$cols->item(0)->nodeValue;
                $case=$cols->item(2)->nodeValue;
                if($cols->item(1)->nodeValue=="Cox's Bazar"){
                   $sql="INSERT INTO district_update_bd(division,district,district_case) VALUES('$div',concat('Cox',char(39),'s Bazar'),'$case')";
                   mysqli_query($con,$sql);
                }else{
                    $dist=$cols->item(1)->nodeValue;
                    $sql="INSERT INTO district_update_bd(division,district,district_case) VALUES('$div','$dist','$case')";
                    mysqli_query($con,$sql);
                }
                
            //==============================================//
        }

    }
  

?>


