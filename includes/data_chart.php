<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <?php include "libraries.php"; ?>
</head>

<body>
  <?php
  //pang count
  $totalPersons = count($data);
  $totalPending = count($data3);
  $totalEducation = count($data1);
  $totalEmployment = count($data2);

  //Analytics chart
  include "analytics.php";
  $analytics = new \Classes\Analytics();
  $genderData = $analytics->getGenderAnalytics();
  ?>

  <div class="container-fluid px-3 my-3">
    <div class="row g-3 align-items-stretch">

      <!-- Chart Column -->
      <div class="col-12 col-md-7">
        <div class="card shadow-sm h-100 border-0" style="border-radius: 12px;">
          <div class="card-body">
            <h6 class="fw-bold text-muted mb-3" style="font-size:0.85rem; letter-spacing:0.05em;">GENDER DISTRIBUTION
            </h6>
            <div style="width: 100%; height: 260px;">
              <canvas id="ChartGender"></canvas>
            </div>
          </div>
        </div>
      </div>

      <!-- Stats Column -->
      <div class="col-12 col-md-5">
        <div class="row g-2 h-100">

          <!-- Total Records -->
          <div class="col-6">
            <div class="card border-0 shadow-sm h-100 text-white"
              style="background: #3B82F6 ; border-radius:12px;">
              <div class="card-body d-flex flex-column justify-content-between p-3">
                <div class="fs-1 fw-bold"><?= $totalPersons ?></div>
                <div class="small fw-semibold opacity-75">Total Records</div>
              </div>
            </div>
          </div>

          <!-- Pending -->
          <div class="col-6">
            <div class="card border-0 shadow-sm h-100 text-white"
              style="background: #F59E0B; border-radius:12px;">
              <div class="card-body d-flex flex-column justify-content-between p-3">
                <div class="fs-1 fw-bold"><?= $totalPending ?></div>
                <div class="small fw-semibold opacity-75">Pending Approval</div>
              </div>
            </div>
          </div>

          <!-- Education -->
          <div class="col-6">
            <div class="card border-0 shadow-sm h-100 text-white"
              style="background: #06B6D4; border-radius:12px;">
              <div class="card-body d-flex flex-column justify-content-between p-3">
                <div class="fs-1 fw-bold"><?= $totalEducation ?></div>
                <div class="small fw-semibold opacity-75">Education Entries</div>
              </div>
            </div>
          </div>

          <!-- Employment -->
          <div class="col-6">
            <div class="card border-0 shadow-sm h-100 text-white"
              style="background: #10B981; border-radius:12px;">
              <div class="card-body d-flex flex-column justify-content-between p-3">
                <div class="fs-1 fw-bold"><?= $totalEmployment ?></div>
                <div class="small fw-semibold opacity-75">Employment Entries</div>
              </div>
            </div>
          </div>

        </div>
      </div>

    </div>
  </div>


  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

  <?php
  $genders = [];

  foreach ($genderData as $row) {
      $genders[$row["gender"]] = $row["total"];
  }

  $labels = array_keys($genders);
  $datasets = [
      [
          "label" => "Gender",
          "data" => array_values($genders),
          "borderWidth" => 1,
      ],
  ];
  ?>

  <script>
    const colors = [
        '#FE9EC7', //Female
      '#44ACFF', //Male
      '#D78FEE' //Others
    ];

    const ctx = document.getElementById('ChartGender');
    
    let chartDatasets = <?= json_encode($datasets) ?>;
    if(chartDatasets.length > 0) {
      chartDatasets[0].backgroundColor = colors;
    }

    new Chart(ctx, {
      type: 'bar',
      data: {
        labels: <?= json_encode($labels) ?>,
        datasets: chartDatasets
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
          legend: {
            position: 'top'
          }
        },
        scales: {
          x: {
            stacked: true
          },
          y: {
            stacked: true,
            beginAtZero: true
          }
        }
      }
    });
  </script>

</body>

</html>