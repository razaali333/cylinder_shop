<?php 
include('include/head.php');
?>
<!-- <link rel="stylesheet" href="<?php echo base_url('css/chart/default.css') ?>"> -->
		<body>
			<style>
				.chart-container{
					width: 720px;
					/*height: 300px;*/
					margin-left: 25%;
				}
			</style>
		<?php include('include/header.php') ?>
		<div class="main-container container-fluid">
			<a class="menu-toggler" id="menu-toggler" href="#">
				<span class="menu-text"></span>
			</a>

			<?php include('include/sidebar.php'); ?>

			<div class="main-content">

				<div class="page-content">
				<div class="row-fluid">
					<div class="span12">
						<div class="widget-box">
							<div class="widget-header">
								<h4>All OPD Informations</h4>
							</div>
							<div class="widget-body">
								<div class="widget-main no-padding">
								<div class="span5">
									<label for="">Select Option:</label>
									<select name="" id="">
										<option value="">Daily</option>
										<option value="">Weekly</option>
										<option value="">Monthly</option>
									</select>
								</div>


									 <div class="chart-container">
    							<canvas id="line-chartcanvas"></canvas>
  								</div>
									</div>
								</div>
							</div>
                            
                     <!--/.row-fluid-->
				
                
                <div class="row-fluid"></div>
                </div><!--/.page-content-->

				<!--/#ace-settings-container-->
			</div><!--/.main-content-->
		</div><!--/.main-container-->

		<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-small btn-inverse">
			<i class="icon-double-angle-up icon-only bigger-110"></i>
		</a>
		
		<!--basic scripts-->
		<?php include('include/foot.php') ?>
        <script src="<?php echo base_url('css/chart/Chart.min.js') ?>"></script>
        <!-- <script src="<?php// echo base_url('css/chart/line-db-php.js') ?>"></script> -->
        <script>
        	$(document).ready(function() {
        		daily_opd();
 				function daily_opd()
 				{
 					$.ajax({
    url : '<?php echo base_url('login/get_chart') ?>',
    type : "GET",
    dataType:'json',
    success : function(data){
      console.log(data);
      console.log(data[0].no);
      var score = {
        FM_OPD : [],
        SM_OPD : [],
        FF_OPD :[]
      };
    

       score.FM_OPD.push(data[0].no);

       score.SM_OPD.push(data[1].nom);
       score.FF_OPD.push(data[2].nome);
      
      //get canvas
      var ctx = $("#line-chartcanvas");

      var data = {
        labels :["First Male OPD","2nd Male OPD","1st Female OPD"],
        datasets : [
          {
            label : "Today's OPD",
            data : [score.FM_OPD,score.SM_OPD,score.FF_OPD],
            backgroundColor :[
                       "rgba(255,99,132,0.2)",
                       "#E3EFFB",
                       "#C6F5C5"
                ],
            borderColor : [
                        "rgba(255,99,132,1)",
                        "#155595",
                        "#25BE21"
                          ],
            hoverBackgroundColor:[
                           "rgba(255,99,132,0.4)",
                           "#B0D2F4", 
                           "#A5EFA3" 
                                  ],
            hoverBorderColor:[
                            "rgba(255,99,132,1)",
                            "#155595",
                             "#25BE21"
                              ],
            fill : false,
            borderWidth:2,
            lineTension : 0,
          },
          // {
          //   label : "2nd Male OPD",
          //   data : score.SM_OPD,
          //   backgroundColor : "green",
          //   borderColor : "lightgreen",
          //   fill : false,
          //   lineTension : 0,
          //   pointRadius : 20
          // }
        ]
      };

      var options = {
        title : {
          display : true,
          position : "top",
          text : "Graphically Representing Daily OPD",
          fontSize : 18,
          fontColor : "#111"
        },
        legend : {
          display : true,
          position : "bottom"
        },
        scales:{
          yAxes:[{
            stacked:true,
            gridLines:{
              display:true,
              color:"rgba(255,99,132,2)"
            }
          }]
        }
      };

      var chart = new Chart( ctx, {
        type : "bar",
        data : data,
        options : options
      } );

    },
    error : function(data) {
      console.log(data);
    }
  });
 				}
				});
        </script>
<script type="text/javascript">


$('[data-rel=tooltip]').tooltip();
$(".chzn-select").chosen();
$(function() {
	$(document).ready(function(){
  $('#save').dblclick(function(e){
    e.preventDefault();
  });
  $('#saveandprint').dblclick(function(e){
    e.preventDefault();
  });
});

	
				var oTable1 = $('#sample-table-2').dataTable( {
				"aoColumns": [
			      { "bSortable": false },
			      null, null,null, null,
				  { "bSortable": false }
				] } );
				
				
				$('table th input:checkbox').on('click' , function(){
					var that = this;
					$(this).closest('table').find('tr > td:first-child input:checkbox')
					.each(function(){
						this.checked = that.checked;
						$(this).closest('tr').toggleClass('selected');
					});
						
				});
			
				$('[data-rel="tooltip"]').tooltip({placement: tooltip_placement});
				function tooltip_placement(context, source) {
					var $source = $(source);
					var $parent = $source.closest('table')
					var off1 = $parent.offset();
					var w1 = $parent.width();
			
					var off2 = $source.offset();
					var w2 = $source.width();
			
					if( parseInt(off2.left) < parseInt(off1.left) + parseInt(w1 / 2) ) return 'right';
					return 'left';
				}
			});


		
		

</script>
		<!--inline scripts related to this page-->
	</body>
</html>
