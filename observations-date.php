<?php

/*
 * This will take the old comet observations csv file for ASO and convert it into a mysql readable .csv with single date field
 */

date_default_timezone_set('UTC');
$row = 0;
$siting = '';
/* now write new file */
$filename = 'rebuilt-observations.csv';

function jd_to_greg($julian) {
	$julian = $julian - 1721119;
	$calc1 = 4 * $julian - 1;
	$year = floor($calc1 / 146097);
	$julian = floor($calc1 - 146097 * $year);
	$day = floor($julian / 4);
	$calc2 = 4 * $day + 3;
	$julian = floor($calc2 / 1461);
	$day = $calc2 - 1461 * $julian;
	$day = floor(($day + 4) / 4);
	$calc3 = 5 * $day - 3;
	$month = floor($calc3 / 153);
	$day = $calc3 - 153 * $month;
	$day = floor(($day + 5) / 5);
	$year = 100 * $year + $julian;

	if ($month < 10) {
		$month = $month + 3;
	} else {
		$month = $month - 9;
		$year = $year + 1;
	}
	if ($month < '10') {
		$month = '0' . $month;
	}
	if ($day < '10') {
		$day = '0' . $day;
	}
	return "$year/$month/$day";
}

if (($handle = fopen("comets-seen.csv", "r")) !== FALSE) {
	while (($data = fgetcsv($handle)) !== FALSE) {
		$num = count($data);
		$row++;
		$record = $data[0];
		$person = $data[1];
		$place = $data[2];
		$desg = $data[3];
		$month = $data[4];
		$day = $data[5];
		$year = $data[6];
		$m1 = $data[7];
		$diam = $data[8];
		$dc = $data[9];
		$pa = $data[10];
		$scope = $data[11];
		$comments = $data[12];
		$jd = $data[13];
		$url = $data[14];

		/* make a placeholder for the image */
		if (!$url) {
			$url = "";
		}

		/* create gregorian date, timestamp and add the labels to the first row */
		if ($row > 1) {
			$date = jd_to_greg($jd);
			$timestamp = str_replace('/', "-", $date) . " 00:00:00";
		} else {
			$date = "Date";
			$timestamp = "Timestamp";
		}

		/* create single row of data */
		$rawrow = $record . "|" . $timestamp . "|" . $person . "|" . $place . "|" . $desg . "|" . $date . "|" . $m1 . "|" . $diam . "|" . $dc . "|" . $pa . "|" . $scope . "|" . $comments . "|" . $url . PHP_EOL;
		/* look for " inside the data and escape it with csv ""
		 * We might be able to git rid of this as I had to strip the "" and change it to "
		 * in the sql output created by http://www.convertcsv.com/csv-to-sql.htm
		 */
		$cleanrow = str_replace('"', '""', $rawrow);

		/* now that we have a import safe row lets add it to the dataset */
		$siting .= $cleanrow;
	}
	fclose($handle);
}
echo "creating file...";
$handle = fopen($filename, 'w');
fwrite($handle, $siting);

fclose($handle);
echo "done";
exit;
?>