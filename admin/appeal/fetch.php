<?php
error_reporting(0);
session_start();

	$database_username ='root';
	$database_password = '';
	$connect = new PDO( 'mysql:host=localhost;dbname=proteksyon.ml', $database_username, $database_password );

/*function get_total_row($connect)
{
  $query = "
  SELECT * FROM tbl_webslesson_post
  ";
  $statement = $connect->prepare($query);
  $statement->execute();
  return $statement->rowCount();
}

$total_record = get_total_row($connect);*/

$limit = '10';
$page = 1;
if($_POST['page'] > 1)
{
  $start = (($_POST['page'] - 1) * $limit);
  $page = $_POST['page'];
}
else
{
  $start = 0;
}

$query = "
SELECT
    establishment_tb.establishment_name, 
    users_tb.user_first_name,
    users_tb.user_last_name,
    user_reports.status,
    user_reports.report_id,
    user_reports.report_status,
    user_reports.date,
    user_reports.timestamp
FROM users_tb
JOIN user_reports
  ON users_tb.user_id = user_reports.user_id
JOIN establishment_tb
  ON establishment_tb.establishment_id = user_reports.establishment_id
";

if($_POST['query'] != '')
{
  $query .= '
 WHERE report_id LIKE "%'.str_replace(' ', '%', $_POST['query']).'%" 
  ';
}

$query .= 'ORDER BY report_id DESC ';

$filter_query = $query . 'LIMIT '.$start.', '.$limit.'';

$statement = $connect->prepare($query);
$statement->execute();
$total_data = $statement->rowCount();

$statement = $connect->prepare($filter_query);
$statement->execute();
$result = $statement->fetchAll();
$total_filter_data = $statement->rowCount();

$output = '

  <div id="list_users">
  <div class="card-header" style="margin-bottom: 15px">
  <label><strong>Total Appeal</strong> - '.$total_data.'</label>
  </div>
  
  <table>
	  <thead>
		  <tr>
        <th>Appeal ID</th>
			  <th>Establishment</th>
			  <th>User</th>
			  <th>Detail</th>
			  <th>Date</th>
			  <th>Option</th>
		  </tr>
	  </thead>
	  <tbody>
';

    //Type Status
    $status = '0'; //pending
    $verified = '1'; //approve
    $ban = '2'; //banned 



if($total_data > 0)
{
  foreach($result as $row)
  {
    //Active/Pending
    if($row["report_status"]  == 0){
      $output .= '
      <tr>
        <td>'.$row["report_id"].'</td>
        <td>'.$row["establishment_name"].'</td>
        <td>'.$row["user_first_name"].' '.$row["user_last_name"].'</td>
        ';
        $status = $row["status"];
        switch ($status) {
          case "0":
            $output .= '<td>Sharing QR Code</td>';
            break;
          case "1":
            $output .= '<td>Person Under Investigation</td>';
            break;
          case "2":
            $output .= '<td>Exposed to Covid</td>';
            break;
          case "3":
            $output .= '<td>Positive to Covid</td>';
            break;
        }
        $output .= '
        <td>'.$row["date"].'</td>
        <td><a class="status completed" style="background-color: #10B5A5 !important; border: none; outline: none;" href="/admin/appeal/requestData?ReportID='. $row['report_id'] .'">Pending</a></td>
      </tr>
      ';
    }
    //PUI - Check
    else if($row["report_status"]  == 1){

      date_default_timezone_set('Asia/Manila');

      $stamp = date('Y-m-d', strtotime($row["timestamp"]));
      $today = date('Y-m-d', time());


      $date1 = new DateTime($stamp); //inclusive
      $date2 = new DateTime($today); //exclusive
      $diff = $date2->diff($date1);
      $totaldays = $diff->format("%a");

      if($totaldays > 13){
        $output .= '
        <tr class="blob">';
      }else{
        $output .= '
        <tr>';
      }
      

      $output .= '
        <td>'.$row["report_id"] .'</td>
        <td>'.$row["establishment_name"].'</td>
        <td>'.$row["user_first_name"].' '.$row["user_last_name"].'</td>
        ';
        $status = $row["status"];
        switch ($status) {
          case "0":
            $output .= '<td>Sharing QR Code</td>';
            break;
          case "1":
            $output .= '<td>Person Under Investigation</td>';
            break;
          case "2":
            $output .= '<td>Exposed to Covid</td>';
            break;
          case "3":
            $output .= '<td>Positive to Covid</td>';
            break;
        }
        $output .= '
        <td>'.$row["date"].'</td>
        <td><a class="status completed" style="background-color: #FF8000 !important; border: none; outline: none;" href="/admin/appeal/requestData?ReportID='. $row['report_id'] .'">Check</a></td>
      </tr>
      ';
    }
    //Recovered
    else if($row["report_status"]  == 2){
      $output .= '
      <tr>
        <td>'.$row["report_id"].'</td>
        <td>'.$row["establishment_name"].'</td>
        <td>'.$row["user_first_name"].' '.$row["user_last_name"].'</td>
        ';
        $status = $row["status"];
        switch ($status) {
          case "0":
            $output .= '<td>Sharing QR Code</td>';
            break;
          case "1":
            $output .= '<td>Person Under Investigation</td>';
            break;
          case "2":
            $output .= '<td>Exposed to Covid</td>';
            break;
          case "3":
            $output .= '<td>Positive to Covid</td>';
            break;
        }
        $output .= '
        <td>'.$row["date"].'</td>
        <td><a class="status completed" style="background-color: #0D8E00 !important; border: none; outline: none;" href="/admin/appeal/requestData?ReportID='. $row['report_id'] .'">Recovered</a></td>
      </tr>
      ';
    }
    //Fine
    else if($row["report_status"]  == 3){
      $output .= '
      <tr>
        <td>'.$row["report_id"].'</td>
        <td>'.$row["establishment_name"].'</td>
        <td>'.$row["user_first_name"].' '.$row["user_last_name"].'</td>
        ';
        $status = $row["status"];
        switch ($status) {
          case "0":
            $output .= '<td>Sharing QR Code</td>';
            break;
          case "1":
            $output .= '<td>Person Under Investigation</td>';
            break;
          case "2":
            $output .= '<td>Exposed to Covid</td>';
            break;
          case "3":
            $output .= '<td>Positive to Covid</td>';
            break;
        }
        $output .= '
        <td>'.$row["date"].'</td>
        <td><a class="status completed" style="background-color: #40C879 !important; border: none; outline: none;" href="/admin/appeal/requestData?ReportID='. $row['report_id'] .'">Fine</a></td>
      </tr>
      ';
    }
    //Banned
    else if($row["report_status"]  == 4){
      $output .= '
      <tr>
        <td>'.$row["report_id"].'</td>
        <td>'.$row["establishment_name"].'</td>
        <td>'.$row["user_first_name"].' '.$row["user_last_name"].'</td>
        ';
        $status = $row["status"];
        switch ($status) {
          case "0":
            $output .= '<td>Sharing QR Code</td>';
            break;
          case "1":
            $output .= '<td>Person Under Investigation</td>';
            break;
          case "2":
            $output .= '<td>Exposed to Covid</td>';
            break;
          case "3":
            $output .= '<td>Positive to Covid</td>';
            break;
        }
        $output .= '
        <td>'.$row["date"].'</td>
        <td><a class="status completed" style="background-color: #C12F3E !important; border: none; outline: none;" href="/admin/appeal/requestData?ReportID='. $row['report_id'] .'">Banned</a></td>
      </tr>
      ';
    }
    //Un-Banned
    else if($row["report_status"]  == 5){
      $output .= '
      <tr>
        <td>'.$row["report_id"].'</td>
        <td>'.$row["establishment_name"].'</td>
        <td>'.$row["user_first_name"].' '.$row["user_last_name"].'</td>
        ';
        $status = $row["status"];
        switch ($status) {
          case "0":
            $output .= '<td>Sharing QR Code</td>';
            break;
          case "1":
            $output .= '<td>Person Under Investigation</td>';
            break;
          case "2":
            $output .= '<td>Exposed to Covid</td>';
            break;
          case "3":
            $output .= '<td>Positive to Covid</td>';
            break;
        }
        $output .= '
        <td>'.$row["date"].'</td>
        <td><a class="status completed" style="background-color: #242424 !important; color: white; border: none; outline: none;" href="/admin/appeal/requestData?ReportID='. $row['report_id'] .'">UnBanned</a></td>
      </tr>
      ';
    }
    else{
      $output .= '';
    }
  }
}
else
{
  $output .= '
  <tr>
    <td colspan="2" align="center">No Data Found</td>
  </tr>
  ';
}

$output .= '
</tbody>
</table>
<br />
<div align="center">
  <ul class="pagination">
';

$total_links = ceil($total_data/$limit);
$previous_link = '';
$next_link = '';
$page_link = '';

//echo $total_links;

if($total_links > 4)
{
  if($page < 5)
  {
    for($count = 1; $count <= 5; $count++)
    {
      $page_array[] = $count;
    }
    $page_array[] = '...';
    $page_array[] = $total_links;
  }
  else
  {
    $end_limit = $total_links - 5;
    if($page > $end_limit)
    {
      $page_array[] = 1;
      $page_array[] = '...';
      for($count = $end_limit; $count <= $total_links; $count++)
      {
        $page_array[] = $count;
      }
    }
    else
    {
      $page_array[] = 1;
      $page_array[] = '...';
      for($count = $page - 1; $count <= $page + 1; $count++)
      {
        $page_array[] = $count;
      }
      $page_array[] = '...';
      $page_array[] = $total_links;
    }
  }
}
else
{
  for($count = 1; $count <= $total_links; $count++)
  {
    $page_array[] = $count;
  }
}

for($count = 0; $count < count($page_array); $count++)
{
  if($page == $page_array[$count])
  {
    $page_link .= '
    <li class="page-item active">
      <a class="page-link" href="#">'.$page_array[$count].' <span class="sr-only">(current)</span></a>
    </li>
    ';

    $previous_id = $page_array[$count] - 1;
    if($previous_id > 0)
    {
      $previous_link = '<li class="page-item"><a class="page-link" href="javascript:void(0)" data-page_number="'.$previous_id.'">Previous</a></li>';
    }
    else
    {
      $previous_link = '
      <li class="page-item disabled">
        <a class="page-link" href="#">Previous</a>
      </li>
      ';
    }
    $next_id = $page_array[$count] + 1;
    if($next_id >= $total_links)
    {
      $next_link = '
      <li class="page-item disabled">
        <a class="page-link" href="#">Next</a>
      </li>
        ';
    }
    else
    {
      $next_link = '<li class="page-item"><a class="page-link" href="javascript:void(0)" data-page_number="'.$next_id.'">Next</a></li>';
    }
  }
  else
  {
    if($page_array[$count] == '...')
    {
      $page_link .= '
      <li class="page-item disabled">
          <a class="page-link" href="#">...</a>
      </li>
      ';
    }
    else
    {
      $page_link .= '
      <li class="page-item"><a class="page-link" href="javascript:void(0)" data-page_number="'.$page_array[$count].'">'.$page_array[$count].'</a></li>
      ';
    }
  }
}

$output .= $previous_link . $page_link . $next_link;
$output .= '
  </ul>

</div>
';

echo $output;

?>
