<!-- PHP 7.4.16 -->
<?php
$row = 1;
$ppt = array("make", "model", "color", "capacity", "network", "grade", "condition");
$next = array("make", "model", "color", "capacity", "network", "grade", "condition", "count");
$validate = array("string, required", "string, required", "string", "string", "string", "string", "string");
$check = [];
$newString = "";
$finalArray = [];
// Open Csv File
if (($handle = fopen("parse.csv", "r")) !== FALSE) {    
    // Get Data From File 
    if (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
        // Read Number of Rows
        $num = count($data);
        $my_array = $data;
        while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
            $new_row = $row++;
            $tempo = [];
            echo "\n<p> Product Object Representation of row $new_row: <br /></p>\n";
            for ($c = 0; $c < $num; $c++) {
                echo "<p> - $ppt[$c]: '$data[$c]' ($validate[$c]) - $my_array[$c] <br /></p>\n";
                array_push($tempo, $data[$c]);
            }
            // String containing data from a row
            $string = "$tempo[0]`,`$tempo[1]`,`$tempo[2]`,`$tempo[3]`,`$tempo[4]`,`$tempo[5]`,`$tempo[6]";
            // Check if data already exists in array
            if (in_array($string, $check)) {
                $index = array_search($string, $check);
                $finalArray[$index];
                $array = explode("`,`", $finalArray[$index]);
                $count = $array[7] + 1;
                // Iterate the value of count in new String
                $old = $finalArray[$index];
                $new = "$array[0]`,`$array[1]`,`$array[2]`,`$array[3]`,`$array[4]`,`$array[5]`,`$array[6]`,`$count";
            //    Replace old data with new data
                $finalArray[$index] = str_replace($old, $new, $finalArray[$index]);
            } else {
                array_push($check, $string);
                //  Add data to final Array and set count to 1
                $newString = "$tempo[0]`,`$tempo[1]`,`$tempo[2]`,`$tempo[3]`,`$tempo[4]`,`$tempo[5]`,`$tempo[6]`,`1";
                array_push($finalArray, $newString);
            }
        }
        fclose($handle);
    }
}

//  Write data from final Array to new Csv file row by row
$filename = "products.csv";
$writeData = fopen($filename, 'w');
if ($writeData !== FALSE) {
    fputcsv($writeData, $next);
    foreach ($finalArray as $row) {
        $array = explode("`,`", $row);
        fputcsv($writeData, $array);
    }
}

fclose($writeData);
