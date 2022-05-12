<!-- PHP 7.4.16 -->
<?php
$row = 1;
$ppt = array("make", "model", "color", "capacity", "network", "grade", "condition");
$next = array("make", "model", "color", "capacity", "network", "grade", "condition", "count");
$validate = array("string, required", "string, required", "string", "string", "string", "string", "string");
$check = [];
$newString = "";
$finalString = [];
if (($handle = fopen("parse.csv", "r")) !== FALSE) {     
    if (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
        $num = count($data);
        $my_array = $data;
        while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
            $new_row = $row++;
            $tempo = [];
            echo "<p> Product Object Representation of row $new_row: <br /></p>\n\n";
            for ($c = 0; $c < $num; $c++) {
                echo "<p> - $ppt[$c]: '$data[$c]' ($validate[$c]) - $my_array[$c] <br /></p>\n";
                array_push($tempo, $data[$c]);
            }
            $string = "$tempo[0]`,`$tempo[1]`,`$tempo[2]`,`$tempo[3]`,`$tempo[4]`,`$tempo[5]`,`$tempo[6]";
            if (in_array($string, $check)) {
                $index = array_search($string, $check);
                $finalString[$index];
                $array = explode("`,`", $finalString[$index]);
                $count = $array[7] + 1;
                $old = $finalString[$index];
                $new = "$array[0]`,`$array[1]`,`$array[2]`,`$array[3]`,`$array[4]`,`$array[5]`,`$array[6]`,`$count";
                $finalString[$index] = str_replace($old, $new, $finalString[$index]);
            } else {
                array_push($check, $string);
                $newString = "$tempo[0]`,`$tempo[1]`,`$tempo[2]`,`$tempo[3]`,`$tempo[4]`,`$tempo[5]`,`$tempo[6]`,`1";
                array_push($finalString, $newString);
            }
        }
        fclose($handle);
    }
}
$filename = "products.csv";
$writeData = fopen($filename, 'w');
if ($writeData !== FALSE) {
    fputcsv($writeData, $next);
    foreach ($finalString as $row) {
        $array = explode("`,`", $row);
        fputcsv($writeData, $array);
    }
}

fclose($writeData);
