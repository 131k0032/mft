<?php 

include "db_.php";
require 'dompdf/dompdf_config.inc.php';
require_once('dompdf/include/autoload.inc.php');


  	$sql="select * from _transfers where id = ".$_GET["t"]." ";
	//$sql="select * from _transfers where id = 34664 ";
	$rs = adoopenrecordset($sql);
	$rstemp = mysql_fetch_array($rs);
        

    $VAR_ID =  $rstemp['id'];
    $VAR_NOMBRE =  $rstemp['name'];
    $VAR_ORIG =  $rstemp['orig1'];
    $VAR_DEST =  $rstemp['dest1'];
    $ARR_DEP_D = "Arrival Date";
    $VAR_DATE =  $rstemp['date1'];
    $VAR_ADULT = $rstemp['adul'];
       $VAR_CHILD = $rstemp['chil'];
       $VAR_ENTANT = $rstemp['enfa'];
       $INT_ADULT = (int)$VAR_ADULT;
       $INT_CHILD = (int)$VAR_CHILD;
       $INT_ENFANT = (int)$VAR_ENTANT;
       $TOTAL_PAX = strval($INT_ADULT + $INT_CHILD + $INT_ENFANT);
    $ARR_DEP_T = "Arrival Time";
    $VAR_TIME =  $rstemp['time1'];
        //replace arrival and departure
    if ( $rstemp['tipo']=='sl') {
        $ARR_DEP_D = "Departure Date";
        $ARR_DEP_T = "Departure Time";
        
    }
    $VAR_AIRLINE = $rstemp['airl1'];
    $VAR_NUM_FLIGHT = $rstemp['vuel1'];
    $VAR_COMMENT = $rstemp['come'];

$html = "<table border='1' width='100%' style='border-collapse: collapse;'>
          <tr>
              <td colspan='2' style='text-align:center'><h2 style='color:#00acc4'><strong>MAYAN FANTASY TOURS</strong></h2></td>
          </tr>
        <tr bgcolor='#000'>
            <th colspan='2'><span style='color:white'>AIRPORT TRANSFER CONFIRMATION</span></th>
        </tr>
        <tr>
            <th>Airport Transfer Confirmation #</th><th> {$VAR_ID}</th>
        </tr>
        <tr>
            <th>Usuario</th><th>{$VAR_NOMBRE}</th>
        </tr>
        <tr>
            <th>Pickup Location</th><th>{$VAR_ORIG}</th>
        </tr>
        <tr>
            <th>Dropoff Location</th><th>{$VAR_DEST}</th>
        </tr>
        <tr bgcolor='#000'>
        <th colspan='2'><span style='color:white'>FLIGHT INFORMATION</span></th>
        </tr>
        <tr>
            <th>{$ARR_DEP_D}</th><th>{$VAR_DATE}</th>
        </tr>
        <tr>
            <th>PAX</th><th>{$TOTAL_PAX}</th>
        </tr>
        <tr>
            <th>Airline</th><th>{$VAR_AIRLINE}</th>
        </tr>
        <tr>
            <th>Flight #</th><th>{$VAR_NUM_FLIGHT}</th>
        </tr>
        <tr>
            <th>{$ARR_DEP_T}</th><th>{$VAR_TIME}</th>
        </tr>
        <tr>
            <th>COMMENT</th><th>{$VAR_COMMENT}</th>
        </tr>
        <tr><td colspan='2' style='text-align:center'>
            Call our customer services team on the number below to speak to one of our advisors who will help you with all of your needs.
            <br />PHONE: +52 (984) 179 27 45
            <br />&nbsp;
        </td></tr>
         <tr>
            <td colspan='2' style='text-align:center;'>
                <h3><strong>IMPORTANT</strong></h3>   
            </td>
         </tr>
        <tr><td colspan='2' style='text-align:center'>
            <small>- Please make sure you contact our MFT representative. Please walk outside of the airport, into the transfer area. We wear Either Gray or White shirts with the MFT Logo.</small>
        </td></tr>
             <tr><td colspan='2' style='text-align:left'>
               <small>- Our representative may ask you for the Hotel Confirmation or your Airport Transfer Confirmation.</small>
             </td></tr>
             <tr><td colspan='2' style='text-align:left'>
               <small>** We work under Military Time Format </small>
             </td></tr>
             <tr><td colspan='2' style='text-align:left'>
               <small>-For immediate assistance, or If you have missed your flight or it was cancelled, it is your responsibility to notify the change to the reservations number at 01800-000-0000 and provide us with your new flight information, available from 07:00a.m. To 08:00 p.m. (office time) Recommendations: Dial to our office yourself, do not allow anyone else do it for you.  Do not take taxi, we do not make reimbursements.   Note. - Shuttle transportation time may vary depending your Arrival or departure time.</small>
             </td></tr>
             <tr><td colspan='2' style='text-align:left'>
               <small><strong>TERMINAL 1:</strong> Go straight to the parking area, there you will find a representative of MFT (Khaki Pants and Gray shirts) with a sign MFT , who will ask your data and provide the transportation ticket for your return to the airport. 
              <br> 
              <strong>TERMINAL 2 DOMESTIC:</strong> After luggage and customs process, you will find a corridor, continue and please make your way out of the terminal in the first Glass door at your right hand side, our representatives are at the end of the ramp (Khaki Pants and Gray shirts) they hold sign MFT and or will have your name on a banner, they will ask your data and provide the transportation ticket for your return to the airport.
              <br>  
              <strong>TERMINAL 2 INTERNATIONAL:</strong> After the migration processes, luggage and customs, walk straight to the second glass door in front of Grab´N Go restaurant where you will find a representative of MFT (Khaki Pants and Gray shirts) with a sign MFT , who will ask your data and provide the transportation ticket for your return to the airport.
              <br> 
              <strong>TERMINAL 3:</strong> After the migration processes, luggage and customs, walk straight to the second glass door in front of the margarita ville where you will find a representative of MFT (Khaki Pants and Gray shirts ) with a sign MFT , who will ask your data and provide the transportation ticket for your return to the airport.
              <br>  
              <strong>TERMINAL 4:</strong> After migration processes luggage and customs, make your way to the exterior of the airport terminal through the second glass door on your left that indicates 'HOTEL SHUTTLE' ,some meters ahead you will find a representative of MFT (Khaki Pants and Gray shirts) with a sign of MFT ,  who will ask your data and provide the transportation ticket for you return to the airport.
              </small>
             </td></tr>
             <tr><td colspan='2' style='text-align:left'>
               <small>Please confirm your departure pick up time at least 48 hours prior your service with your MFT service representative  at Desk at the hotel, or call our reservations number in order to set an appointment as soon as you arrive to your hotel.
               </small>
             </td></tr>
        </table>";


// reference the Dompdf namespace
//use Dompdf\Dompdf;

// instantiate and use the dompdf class
$dompdf = new DOMPDF();

$dompdf->load_html($html);

// (Optional) Setup the paper size and orientation
//$dompdf->setPaper('A4', 'landscape');

// Render the HTML as PDF
$dompdf->render();



// Output the generated PDF to Browser
//$dompdf->stream("sample.pdf", array("Attachment"=>0));

$dompdf->stream("order_".$VAR_ID.".pdf", array("Attachment"=>0));

?>
