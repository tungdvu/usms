<?php  
/**
 * USMS - He thong quan ly khoa hoc cong nghe (UTT)
 * v 1.0
 * @author TungVu
 * @email  tungnv249@gmail.com
 * @url    facebook.com/mr.tungnv
 */

?>
<!-- Page -->
<div class="page">
<div class="page-content container-fluid">
    <div class="">
  	<!-- <h3>USMS - Hệ thống quản lý Khoa học Công nghệ</h3> -->
      <!-- Begin Content -->
        <div class="col-md-6">
          <!-- Magazine By Reasearch Area-->
          <div class="panel panel-bordered">
            <div class="panel-heading">
              <h3 class="panel-title"><i class="fa fa-pie-chart"></i> Báo cáo dữ liệu bài báo theo lĩnh vực</h3>
              <div class="panel-actions">
                <a class="panel-action icon md-minus" data-toggle="panel-collapse" aria-expanded="true"
                aria-hidden="true"></a>
                <a class="panel-action icon md-fullscreen" data-toggle="panel-fullscreen" aria-hidden="true"></a>
                <a class="panel-action icon md-close" data-toggle="panel-close" aria-hidden="true"></a>
              </div>
            </div>
            <div class="panel-body">
              <canvas id="myChart1" width="400" height="200"></canvas>
            </div>
          </div>
          <!-- End Magazine By Reasearch Area -->
        </div>
        <div class="col-md-6">
          <!-- Widget Linearea Two -->
          <div class="panel panel-bordered">
            <div class="panel-heading">
              <h3 class="panel-title"><i class="fa fa-pie-chart"></i> Báo cáo dữ liệu bài báo</h3>
              <div class="panel-actions">
                <a class="panel-action icon md-minus" data-toggle="panel-collapse" aria-expanded="true"
                aria-hidden="true"></a>
                <a class="panel-action icon md-fullscreen" data-toggle="panel-fullscreen" aria-hidden="true"></a>
                <a class="panel-action icon md-close" data-toggle="panel-close" aria-hidden="true"></a>
              </div>
            </div>
            <div class="panel-body">
              <canvas id="myChart2" width="400" height="200"></canvas>
            </div>
          </div>
          <!-- End Widget Linearea Two -->
        </div>
      <!-- End Content -->
    </div>
        <div class="clearfix"></div>

    <div class="col-md-12">
      <!-- Magazine By Year-->
        <div class="panel panel-bordered">
          <div class="panel-heading">
            <h3 class="panel-title"><i class="fa fa-bar-chart"></i> Báo cáo dữ liệu bài báo theo năm</h3>
            <div class="panel-actions">
              <a class="panel-action icon md-minus" data-toggle="panel-collapse" aria-expanded="true"
              aria-hidden="true"></a>
              <a class="panel-action icon md-fullscreen" data-toggle="panel-fullscreen" aria-hidden="true"></a>
              <a class="panel-action icon md-close" data-toggle="panel-close" aria-hidden="true"></a>
            </div>
          </div>
          <div class="panel-body">
            <canvas id="myChart3" width="400" height="100"></canvas>
          </div>
        </div>
      <!-- End Magazine By Year -->      
    </div>
</div>
</div>
<!-- End Page -->


<script>
$(document).ready(function(){
  //Magazine By Year
  var vn = [];var en = [];var bgcolor_vn = []; var bgcolor_en = [];
  $.post('<?php echo base_url();?>Dashboard/getReportMagazineByYear', 
          function(data){
            //var obj = JSON.stringify(data);
            var obj = JSON.parse(data);
            //console.log(obj);
            $.each(obj[0], function(i,item){
              vn.push(item);
              bgcolor_vn.push('rgba(54, 162, 235, 0.8)');
            });
            $.each(obj[1], function(i,item){
              en.push(item);
              bgcolor_en.push('rgba(255, 206, 86, 0.8)');
            });
            console.log(vn);
            console.log(en);
            
            var ctx = document.getElementById("myChart3");
            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    // labels: ["Red", "Blue", "Yellow", "Green", "Purple", "Orange"],
                    labels: ["2011", "2012","2013","2014","2015","2016"],
                    datasets: [{
                        label: 'Bài báo trong nước',
                        data: vn,  //[12, 19, 3, 5, 2, 3],
                        backgroundColor: bgcolor_vn,
                        borderColor: ['rgba(54, 162, 235, 1)'],
                        borderWidth: 1
                    },
                    {
                        label: 'Bài báo quốc tế',
                        data: en,  //[12, 19, 3, 5, 2, 3],
                        backgroundColor: bgcolor_en,
                        borderColor: ['rgba(255, 206, 86, 1)'],
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero:true,
                                // max: 300,
                                // min: 0,
                                // stepSize: 30
                            }
                        }],
                    },
                    barThickness: 5,
                }
            });
        });
  //Magazine By TypeArea
  $.post('<?php echo base_url();?>Dashboard/getReportMagazineByTypeArea', function(data){
    var obj = JSON.parse(data);
    //console.log(obj);
    var ctx = document.getElementById("myChart2");
    var label = ["Trong nước","Quốc tế"];
    var data = {
        labels: label,
        datasets: [
            {
              data: obj, //[60, 40]
              fill:true,
              backgroundColor: ["#1E88E5","#FF6F00"],
              hoverBackgroundColor: ["#2196F3","#FF8F00"],
            }]
    };
    // For a pie chart
    var myPieChart = new Chart(ctx,{
        type: 'pie',
        data: data,
        options: {}
    });  
  });

  //Magazine By ResearchArea
  $.post('<?php echo base_url();?>Dashboard/getReportMagazineByResearchArea', function(data){
    var obj = JSON.parse(data);
    //console.log(obj);
    var ctx = document.getElementById("myChart1");
    var label = ["Kỹ thuật xây dựng công trình giao thông","Kinh tế - vận tải","Công nghệ thông tin","Kỹ thuật cơ khí","Lý luận chính trị","Khoa học cơ bản"];
    var data = {
        labels: label,
        datasets: [
            {
              data: obj, //[60, 40,30,80,10,30], //, //[60, 40]
              fill:true,
              //backgroundColor: ["#FF6384","#36A2EB","#FF6384","#36A2EB","#FF6384","#36A2EB"],
              backgroundColor:
                [
                'rgba(54, 80, 235, 0.8)',
                'rgba(54, 162, 235, 0.8)',
                'rgba(255, 206, 86, 0.8)',
                'rgba(75, 192, 192, 0.8)',
                'rgba(153, 102, 255, 0.8)',
                'rgba(255, 159, 200, 0.8)'
                ]
              //hoverBackgroundColor: ["#FF6384","#36A2EB","#FF6384","#36A2EB","#FF6384","#36A2EB"],
            }]
    };
    // For a pie chart
    var myPieChart = new Chart(ctx,{
        type: 'doughnut',
        data: data,     
        options: {}
    });  
  });
  //Magazine By Type Area
  $.post('<?php echo base_url();?>Dashboard/getReportMagazineByTypeArea', function(data){
    var obj = JSON.parse(data);
    //console.log(obj);
    var ctx = document.getElementById("myChart2");
    var label = ["Trong nước","Quốc tế"];
    var data = {
        labels: label,
        datasets: [
          {
            data: obj, //[60, 40]
            fill:true,
            backgroundColor: ["#FF6384","#36A2EB"],
            //hoverBackgroundColor: ["#FF6384","#36A2EB"],
          }]
    };
    // For a pie chart
    var myPieChart = new Chart(ctx,{
        type: 'pie',
        data: data,
        options: {}
    });  
  });//end $.post


});

</script>