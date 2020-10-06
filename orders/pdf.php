<?php
if(isset($_POST['pdf'])){
    require_once('TCPDF/tcpdf.php');
    include "../connection.php";
    $obj_pdf= new TCPDF('P',PDF_UNIT,PDF_PAGE_FORMAT,true,'UTF-8',false);
    $obj_pdf->SetCreator(PDF_CREATOR);
    $obj_pdf->SetTitle("Receipt");
    $obj_pdf->SetHeaderData('','',PDF_HEADER_TITLE,PDF_HEADER_STRING);
    $obj_pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN,'',PDF_FONT_SIZE_MAIN));
    $obj_pdf->setFooterFont(Array(PDF_FONT_NAME_DATA,'',PDF_FONT_SIZE_DATA));
    $obj_pdf->SetDefaultMonospacedFont('helvetica');
    $obj_pdf->setFooterMargin(PDF_MARGIN_FOOTER);
    $obj_pdf->SetMargins(PDF_MARGIN_LEFT,'5',PDF_MARGIN_RIGHT);
    $obj_pdf->setPrintHeader(false);
    $obj_pdf->setPrintFooter(false);
    $obj_pdf->SetAutoPageBreak(TRUE,10);
    $obj_pdf->SetFont('helvetica','',16);
    $obj_pdf->AddPage();
    $oid = $_POST['pdf'];
  
    $query="select fname,lname,address,email,price,orderStatus,orders.totalAmount,orderDate,deliveryDate,qty,bookName,image,modeName,paymentStatus from orders,orderdetails,books,paymentdetails,paymentmode,users where orders.orderID='$oid' and orders.orderID=orderdetails.orderID and orderdetails.product=books.bookID and orders.orderID=paymentdetails.orderId and paymentmode.paymentModeID=paymentdetails.paymentMode and orders.orderedBy=users.userID";
    $res = mysqli_query($con,$query);
    $row = mysqli_fetch_array($res);
    $content = '<h1>Bookshelf.in &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Online Bill</h1>';
    $name = $row['fname']." ".$row['lname'];
    $address = $row['address'];
    $product = $row['bookName'];
    $tamt = $row['totalAmount'];
    $qty = $row ['qty'];
    $price = $row['price'];
    $email=$row['email'];
    $odate = $row['orderDate'];
    $content .="<table class='table table-bordered'>
            <tr>
                <th>Name: </th>
                <td>$name</td>
            </tr>
            <tr>
                <th>Address: </th>
                <td>$address</td>
            </tr>
            <tr>
                <th>Product: </th>
                <td>$product</td>
            </tr>
            <tr>
                <th>Price: </th>
                <td>$price</td>
            </tr>
            <tr>
                <th>qty: </th>
                <td>$qty</td>
            </tr>
            <tr>
                <th>Total Amount: </th>
                <td>$tamt</td>
            </tr>
            <tr>
                <th>Email: </th>
                <td>$email</td>
            </tr>
            <tr>
                <th>Order Date: </th>
                <td>$odate</td>
            </tr>

            
        </table>";
    $obj_pdf->writeHTML($content);
    $obj_pdf->Output("invoice.pdf","I");
}
else{

}
?>