  </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- text editor WYSIWYG -->
    <script src="https://cloud.tinymce.com/5/tinymce.min.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Task', 'Hours per Day'],
          ['Views',     <?php echo $session->count; ?>],
          ['Comments',  <?php echo Comment::count_data(); ?>],
          ['Photos',    <?php echo Photo::count_data(); ?>],
          ['Users',     <?php echo User::count_data(); ?>]
        ]);

        var options = {
          title: 'Statistics',
          backgroundColor: 'transparent',
          legend: 'none'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    </script>
    <script src="js/scripts.js"></script>
</body>

</html>
