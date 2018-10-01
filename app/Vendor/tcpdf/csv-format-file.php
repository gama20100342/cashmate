<?php 

// open the file "demosaved.csv" for writing
//$file = fopen($region_area."_ptn_monitoring_".date('Y_m_d_h_i_A').".csv", "w");
$file = fopen("php://memory", "w");
 
// save the column headers
fputcsv($file, $header_text_csv);
 
// Sample data. This can be fetched from mysql too
/*$data = array(
    array('Data 11', 'Data 12', 'Data 13', 'Data 14', 'Data 15'),
    array('Data 21', 'Data 22', 'Data 23', 'Data 24', 'Data 25'),
    array('Data 31', 'Data 32', 'Data 33', 'Data 34', 'Data 35'),
    array('Data 41', 'Data 42', 'Data 43', 'Data 44', 'Data 45'),
    array('Data 51', 'Data 52', 'Data 53', 'Data 54', 'Data 55')
);*/
 
// save each row of the data
foreach ($datas as $row):    
    fputcsv($file, $row);
endforeach;
 
// Close the file
//fclose($file);

 fseek($file, 0);
 header('Content-Type: application/csv');
    // tell the browser we want to save it instead of displaying it
    //header('Content-Disposition: attachment; filename="'.$filename.'";');
	  header('Content-Disposition: attachment; filename="'.$region_area.'_ptn_monitoring_'.date('Y_m_d_h_i_A').'".csv;');
    // make php send the generated csv lines to the browser
    fpassthru($file);
?>