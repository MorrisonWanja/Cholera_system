<?php
session_start();
include("../nav/includes_1.php");
$page_title = "Home";

include("../classes/messages.php");

$msg = new Message($database);


if(!empty($_SESSION['doctor_logedin'])){
		
		$email = $_SESSION['doctor_logedin'];
		
		$doctors = $doctor->confirmLogin($email);
		
		foreach($doctors as $row) {
				  
			$doctor_id =  $row['doctor_id'];
			
			$doctor_name = $row['doctor_name'];
			$email = $row['email'];
			
		  
		}
	} else {
		header('location: login.php');
	}
include("../nav/head_1.php");
?>

<body>
<?php include("aside.php"); ?>
<style>

 .w-row:before,.w-row:after{
    content:" ";
    display:table;
}
 .w-row:after{
    clear:both;
}
 .w-col{
    position:relative;
    float:left;
    width:100%;
    min-height:1px;
    padding-left:10px;
    padding-right:10px;
}
 .w-col-3{
    width:25%;
}
 @media screen and (max-width:767px){
     .w-row{
        margin-left:0;
        margin-right:0;
    }
     .w-col{
        width:100%;
        left:auto;
        right:auto;
    }
}
 @media screen and (max-width:479px){
     .w-col{
        width:100%;
    }
}
 h1, .number-card-number{
    margin-top:15px;
    margin-bottom:15px;
    font-size:28px;
    line-height:54px;
    font-weight:400;
}
 .divider{
    height:1px;
    margin-top:20px;
    margin-bottom:15px;
    background-color:#eee;
}
 .style-label{
    color:#bebebe;
    font-size:12px;
    line-height:20px;
    font-weight:500;
    text-transform:uppercase;
}
 .tag-wrapper{
    margin-top:35px;
    margin-bottom:35px;
    padding-right:5px;
    padding-left:5px;
}
 .row{
    margin-bottom:50px;
}
 .number-card-number{
    margin-top:0px;
    margin-bottom:0px;
    color:#fff;
    font-weight:300;
}
 .tagline{
    font-size:12px;
    font-weight:500;
    letter-spacing:2px;
    text-transform:uppercase;
}
 .tagline.number-card-currency{
    color:#fff;
}
 .basic-column{
    padding-right:5px;
    padding-left:5px;
}
 .number-card{
    padding:22px 30px;
    border-radius:8px;
    background-image:-webkit-linear-gradient(270deg, #1991eb, #1991eb);
    background-image:linear-gradient(180deg, #1991eb, #1991eb);
}
 .number-card.number-card-content3{
    background-image:-webkit-linear-gradient(270deg, #ed629a, #c850c0);
    background-image:linear-gradient(180deg, #ed629a, #c850c0);
}
 .number-card.number-card-content4{
    background-image:-webkit-linear-gradient(270deg, #ff8308, #fd4f00);
    background-image:linear-gradient(180deg, #ff8308, #fd4f00);
}
 .number-card.number-card-content2{
    display:block;
    background-image:-webkit-linear-gradient(270deg, #17cec4, #17cec4 0%, #08aeea);
    background-image:linear-gradient(180deg, #17cec4, #17cec4 0%, #08aeea);
    color:#333;
}
 .number-card.number-card-content1{
    background-image:-webkit-linear-gradient(270deg, #7042bf, #3023ae);
    background-image:linear-gradient(180deg, #7042bf, #3023ae);
}
 .number-card-progress-wrapper{
    display:-webkit-box;
    display:-webkit-flex;
    display:-ms-flexbox;
    display:flex;
    -webkit-box-pack:justify;
    -webkit-justify-content:space-between;
    -ms-flex-pack:justify;
    justify-content:space-between;
}
 .number-card-divider{
    height:1px;
    margin-top:10px;
    margin-bottom:14px;
    background-color:hsla(0, 0%, 100%, .15);
}
 .number-card-dollars{
    color:hsla(0, 0%, 100%, .8);
    font-size:16px;
    line-height:24px;
}
 .number-card-progress{
    color:#fff;
    text-align:right;
}
 @media (max-width: 991px){
     .number-card-number{
        font-size:30px;
    }
     .number-card{
        padding-top:12px;
        padding-bottom:16px;
    }
}

</style>
<main class="page-content" >
    <div class="container" >
<div class="row w-row">
   
    <div class="basic-column w-col w-col-3">
        <div class="tag-wrapper">
            <div class="number-card number-card-content3">
                <h1 class="number-card-number">Patients</h1>
                <?php $patients = $patient->countPatients(); ?>
                <a href="patients/"><div class="number-card-dollars"><?php echo $patients; ?></div></a>
                <div class="number-card-divider"></div>
               
            </div>
            <div class="divider"></div>
          
        </div>
    </div>
    <div class="basic-column w-col w-col-3">
        <div class="tag-wrapper">
            <div class="number-card number-card-content4">
                <h1 class="number-card-number" style="font-size:24px;">Today's Updates</h1>
				
                <?php $date = date("Y-m-d");
				$updates = $p_data->countUpdates($date); ?>
                <div class="number-card-dollars"><?php echo $updates; ?></div>
                <div class="number-card-divider"></div>
            </div>
            <div class="divider"></div>
           
        </div>
    </div>
</div>      
<section style="background:#F5F8FA;padding:20px;">
	<div class="row">
		<div class="col-sm-6">
			<h4 class="text-center">Temperature Vs Patients</h4>
			<canvas id='graph1' style="height:350px;"></canvas>
		</div>
		<div class="col-sm-6">
			<h4 class="text-center">Date VS Patients</h4>
			<canvas id='graph2' style="height:350px;"></canvas>
		</div>
	</div>
</section>     

    </div>

  </main>
  <!-- page-content" -->
</div>
<script src='../js/jquery.min.js'></script>
<script src="../js/Chart.min.js"></script>
<script src='../js/bootstrap.min.js'></script>
<script  src="../js/script.js"></script>
 
<script> 

		$(document).ready(function() {

            		
            		$.ajax({<!--(Ruvalcaba et al, 2017)-->
            			type: 'POST',//method used by form to submit questionID value
            			url: 'drawGraph.php',//file for fetching answer for the question
            			success: function (graphData) {
            			
						var temperature = [];//initialize choice array
						var response = [];//initialize response array
							//Loop through graphData to get latitude and longitude
                            for (var i in graphData) {
								//Add choice values in choice array
                                temperature.push(graphData[i].temperature);
								//Add response values in response array
                                response.push(graphData[i].response);
                            }
							
                              var styleGraph = { <!--(Da Rocha, 2019)-->
                                  labels: temperature,
                                  datasets: [
                                      {
                                          label: 'Responses',
                                          backgroundColor: '#556B2F',
										  //Set background color for labels
                                          borderColor: '#556B2F',
										  //Set border color for labels
                                          hoverBackgroundColor: '#4B0082',
										  //Set background color for bars on hover
                                          hoverBorderColor: '#4B0082',//Set border color for bars on hover
                                          data: response,
                                          backgroundColor: [//Set background color for bars
                                              'rgba(0,144,217,0.8)',
                                              '#0aa699',
                                              '#008080',
                                              '#00FA9A',
                                              '#2F4F4F',
                                              '#696969'
                                          ],
                                          borderColor: [//Set border color for bars
                                              'rgba(0,144,217,0.8)',
                                              '#008000',
                                              '#008B8B',
                                              '#00FF00',
                                              '#2F4F4F',
                                              '#696969'
                                          ],
                                          borderWidth: 1//Set border size 
                                      }
                                  ]
                              };
							
                            var openGraph = $("#graph1");
							//Specify graph type,data and border size  
							new Chart(openGraph, {<!--((Da Rocha, 2019))-->
								type: 'pie',
								data: styleGraph,    
								borderWidth: 1
							});
            			
            			}
            		});
					
					$.ajax({<!--(Ruvalcaba et al, 2017)-->
            			type: 'POST',//method used by form to submit questionID value
            			url: 'drawGraphByDate.php',//file for fetching answer for the question
            			success: function (graphData) {
            				
						var date_updated = [];//initialize choice array
						var response = [];//initialize response array
							//Loop through graphData to get latitude and longitude
                            for (var i in graphData) {
								//Add choice values in choice array
                                date_updated.push(graphData[i].date_updated);
								//Add response values in response array
                                response.push(graphData[i].response);
                            }
							
                              var styleGraph = { <!--(Da Rocha, 2019)-->
                                  labels: date_updated,
                                  datasets: [
                                      {
                                          label: 'Dates',
                                          backgroundColor: '#556B2F',
										  //Set background color for labels
                                          borderColor: '#556B2F',
										  //Set border color for labels
                                          hoverBackgroundColor: '#4B0082',
										  //Set background color for bars on hover
                                          hoverBorderColor: '#4B0082',//Set border color for bars on hover
                                          data: response,
                                          backgroundColor: [//Set background color for bars
                                              'rgba(0,144,217,0.8)',
                                              '#0aa699',
                                              '#008080',
                                              '#00FA9A',
                                              '#2F4F4F',
                                              '#696969'
                                          ],
                                          borderColor: [//Set border color for bars
                                              'rgba(0,144,217,0.8)',
                                              '#008000',
                                              '#008B8B',
                                              '#00FF00',
                                              '#2F4F4F',
                                              '#696969'
                                          ],
                                          borderWidth: 1//Set border size 
                                      }
                                  ]
                              };
							
                            var openGraph = $("#graph2");
							//Specify graph type,data and border size  
							new Chart(openGraph, {<!--((Da Rocha, 2019))-->
								type: 'line',
								data: styleGraph,    
								borderWidth: 1
							});
            			
            			}
            		});
           });
            	
         </script>
</body>
</html>
