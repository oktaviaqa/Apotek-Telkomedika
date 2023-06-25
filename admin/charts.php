  <script type="text/javascript" src="js/chartjs/Chart.js"></script>
  <!-- Content Row -->
   <div class="row">

<div class="col-xl-8 col-lg-7">

    <!-- Area Chart -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Area Chart</h6>
        </div>
        <div class="card-body">
            <div class="chart-area">
                <canvas id="myChart"></canvas>
            </div>
            <script>
                     var ctx    = document.getElementById("myChart").getContext('2d');
                     var myChart = new Chart(ctx, {
                         data: {
                             labels: ["Baby Care", "Alat Kesehatan", "Nutrisi", "Beauty Care", "Obat", "Home Diagnostic"],
                             datasets: [{
                                 label: '',
                                 data: [
                                     <?php
                                        $jumlah_babycare    = mysqli_query($conn, "select * from obat where jenis_obat='Bby Care'"); 
                                        echo mysqli_num_rows($jumlah_babycare);
                                        ?>
                                    <?php
                                        $jumlah_obat    = mysqli_query($conn, "select * from obat where jenis_obat='Obat'"); 
                                        echo mysqli_num_rows($jumlah_obat);
                                        ?>
                                    <?php
                                        $jumlah_alat_kesehatan   = mysqli_query($conn, "select * from obat where jenis_obat='Alat Kesehatan'"); 
                                        echo mysqli_num_rows($jumlah_alat_kesehatan);
                                        ?>
                                    <?php
                                        $jumlah_nutrisi   = mysqli_query($conn, "select * from obat where jenis_obat='Nutrisi'"); 
                                        echo mysqli_num_rows($jumlah_nutrisi);
                                        ?>
                                    <?php
                                        $jumlah_beauty    = mysqli_query($conn, "select * from obat where jenis_obat='Beauty Care'"); 
                                        echo mysqli_num_rows($jumlah_beauty);
                                        ?>
                                    <?php
                                        $jumlah_home   = mysqli_query($conn, "select * from obat where jenis_obat='Home Diagnostic'"); 
                                        echo mysqli_num_rows($jumlah_home);
                                        ?>
                                 ],
                                 backgroundColor: [
                                    'rgba(255, 99, 132, 0.2)',
					                'rgba(54, 162, 235, 0.2)',
					                'rgba(255, 206, 86, 0.2)',
					                'rgba(75, 192, 192, 0.2)'
                                 ],
                                 borderColor: [
                                    'rgba(255, 99, 132, 0.2)',
					                'rgba(54, 162, 235, 0.2)',
					                'rgba(255, 206, 86, 0.2)',
					                'rgba(75, 192, 192, 0.2)'
                                 ],
                                 borderWidth: 1
                             }]
                         },
                         options: {
                             scales: {
                                 yAxes: [{
                                     ticks: {
                                         beginAtZero:true
                                     }
                                 }]
                             }
                         }
                     });
                 </script>