<!DOCTYPE html>
<html lang="en-US">


<head>
<?php require '<partials/_styling.php';?>
</head>

<body>

<?php require '<partials/_header.php';?>

    <div class="text-center font-theme">
        <h2 style="text-align:center;font-size:40px; color:#331766; padding-top: 1rem
    ;">
            Task Planner
        </h2>
    </div>
    <div class="container2" style="width: 90%; margin: auto;">
        <div>
            <div class="container-taskbar">
                Task 1
            </div>
            <div class="task-date" style="width: 200px; margin: auto;">
                <div>1/1/2021</div>
                <div style="padding-left: 4rem;">4/1/2021</div>
            </div>
        </div>
        <div>
            <div class="container-taskbar" style="margin-left: 1rem; background: #F299F2BF;">
                Task 2
            </div>
            <div class="task-date" style="width: 180px; margin: auto;">
                <div>1/1/2021</div>
                <div style="padding-left: 4rem;">4/1/2021</div>
            </div>
        </div>
        <div>
            <div class="container-taskbar" style="margin-left: 1rem;background:#41C357CF;">
                Task 3
            </div>
            <div class="task-date" style="width: 180px; margin: auto;">
                <div>1/1/2021</div>
                <div style="padding-left: 4rem;">4/1/2021</div>
            </div>
        </div>
        <div>
            <div class="container-taskbar" style="margin-left: 1rem;background: #FFBF66DE";>
                Task 4
            </div>
            <div class="task-date" style="width: 180px; margin: auto;">
                <div>1/1/2021</div>
                <div style="padding-left: 4rem;">4/1/2021</div>
            </div>
        </div>
        <div>
            <div class="container-taskbar" style="margin-left: 1rem;">
                Task 5
            </div>
            <div class="task-date" style="width: 180px; margin: auto;">
                <div>1/1/2021</div>
                <div style="padding-left: 4rem;">4/1/2021</div>
            </div>
        </div>
        

        
    </div>
    <div style="display: flex; padding-top: 4rem;">
     <div>  
    <div class="card" style="width:500px;
height: 180px;
left: 4rem; border-radius: 20;background: linear-gradient(180deg, #3ED6BF 0%, rgba(62, 214, 191, 0.8) 100%);" 

>
        <div class="card-body">
            <div style="display: flex;">
                <h5 class="card-title">Task 1</h5>
                <h6 style="position: relative; margin-left: 13rem;">1/1/2022</h6>
                <h6  style="position: relative; margin-left: 2rem; color: rgb(255, 255, 255);">1:00AM</h6>
            </div>
            
            <h5 class="card-subtitle mb-2" style="color: rgb(255, 255, 255); font-size: 16px;">Create Frontend</h5>
<hr>
            <div class="btn-group"role="group" aria-label="Basic example" >
                <button type="button" class="btn btn-secondary" style="background: #19524b; ">Done</button>
                <button type="button" class="btn btn-secondary" style="background: #19524b; ">Missed</button>
            </div>

        </div>
        </div>
        <br>
        <div class="card" style="width:500px;
        height: 180px;
        left: 4rem; border-radius: 20;background:#F299F2BF">
            <div class="card-body">
                <div style="display: flex;">
                    <h5 class="card-title">Task 1</h5>
                    <h6 style="position: relative; margin-left: 13rem;">1/1/2022</h6>
                    <h6 style="position: relative; margin-left: 2rem; color: rgb(255, 255, 255);">1:00AM</h6>
                </div>
        
                <h5 class="card-subtitle mb-2" style="color: rgb(255, 255, 255); font-size: 16px;">Create Frontend</h5>
                <hr>
                <div class="btn-group" role="group" aria-label="Basic example">
                    <button type="button" class="btn btn-secondary" style="background: #520b52bf; ">Done</button>
                    <button type="button" class="btn btn-secondary" style="background: #520b52bf; ">Missed</button>
                </div>
        
            </div>
        </div>
        
            
            
        </div>
    
        
    <div class="chart">
        <h1>Pie chart View</h1>
    
        <div id="piechart"></div>
    </div>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    
    <script type="text/javascript">
        // Load google charts
        google.charts.load('current', { 'packages': ['corechart'] });
        google.charts.setOnLoadCallback(drawChart);

        // Draw the chart and set the chart values
        function drawChart() {
            var data = google.visualization.arrayToDataTable([
                ['Task', 'Hours per Day'],
                ['Work', 8],
                ['Eat', 2],
                ['TV', 4],
                ['Gym', 2],
                ['Sleep', 8]
            ]);

            // Optional; add a title and set the width and height of the chart
            var options = { 'title': 'My Average Day', 'width': 550, 'height': 400 };

            // Display the chart inside the <div> element with id="piechart"
            var chart = new google.visualization.PieChart(document.getElementById('piechart'));
            chart.draw(data, options);
        }


    </script>
        </div>
   


</body>
</html>
