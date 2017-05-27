<?php
/**
 * Created by PhpStorm.
 * User: jack
 * Date: 26/05/17
 * Time: 11:36 PM
 */
//
//echo "<pre>";print_r($loans);

foreach ($loans as $loan)
{
    echo "Loan Id:  ".$loan['loanId']."<br>";
    echo "Borrower :  ".$loan['userName']."<br>";
    echo "Amount Applied For:  ".$loan['amountTaken']."<br>";
    echo "Applied Date:  ".$loan['borrowingDate']."<br>";
    echo "Return Date:  ".$loan['returningDate']."<br>";

?>
    <a href="<?php echo base_url()."admin/rejectLoan/".$loan['loanId']?>">Reject Loan </a>



    <a href="<?php echo base_url()."admin/acceptLoan/".$loan['loanId']?>">Accept Loan </a>

    <?php

}

?>

