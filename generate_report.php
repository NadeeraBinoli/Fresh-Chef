<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Database connection
    $conn = new mysqli('localhost', 'root', '', 'fresh_chef_caterings');

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $reportType = isset($_POST['reportType']) ? $_POST['reportType'] : '';
    $startDate = isset($_POST['startDate']) ? $_POST['startDate'] : '';
    $endDate = isset($_POST['endDate']) ? $_POST['endDate'] : '';

    $query = '';
    if ($reportType == "user") {
        $query = "SELECT * FROM r_user WHERE  	Cus_add_date BETWEEN '$startDate' AND '$endDate'";
    } elseif ($reportType == "order") {
        $query = "SELECT O_date, COUNT(O_id) as total_orders FROM r_order WHERE O_date BETWEEN '$startDate' AND '$endDate' GROUP BY O_date";
    }

    if (!empty($query)) {
        $result = mysqli_query($conn, $query);
        $data = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $data[] = $row;
        }
        $chartData = json_encode($data);
    } else {
        $data = [];
        $chartData = json_encode([]);
    }
    $conn->close();

    // Generate Report Preview
    if (isset($_POST['generateReport'])) {
        echo '<canvas id="reportChart"></canvas>';
        echo '<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>';
        echo '<script>
            var data = ' . $chartData . ';
            var ctx = document.getElementById("reportChart").getContext("2d");
            var chart = new Chart(ctx, {
                type: "bar",
                data: {
                    labels: data.map(item => item.O_date),
                    datasets: [{
                        label: "Total Orders",
                        data: data.map(item => item.total_orders)
                    }]
                }
            });
        </script>';
    }

    // Download Report as PDF
    if (isset($_POST['downloadReport'])) {
        require_once('tcpdf/tcpdf.php');

        $pdf = new TCPDF();
        $pdf->AddPage();

        $html = '<h1>Analitical Report</h1>';
        $html .= '<table border="1" cellspacing="3" cellpadding="4">';
        $html .= '<thead><tr><th>Date</th><th>Total Orders</th></tr></thead><tbody>';
        foreach ($data as $row) {
            $html .= '<tr><td>' . $row['O_date'] . '</td><td>' . $row['total_orders'] . '</td></tr>';
        }
        $html .= '</tbody></table>';

        $pdf->writeHTML($html, true, false, true, false, '');

        $pdf->Output('report.pdf', 'D');
        exit();
    }
}
?>
