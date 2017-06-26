<?php
/**
 * Created by PhpStorm.
 * User: jack
 * Date: 26/05/17
 * Time: 11:36 PM
 */
//
//echo "<pre>";print_r($loans);

if(sizeof($loans)==0)
{

    ?>

    <div class="container-fluid">
    <div>There are no pending loan requests.</div>
    </div>


    <?php
}


else{

    ?>
    <div class="container-fluid">
        <div class="row">
            <?php
            foreach ($loans as $loan) {


                ?>




                <div class="col-sm-12 col-lg-12 col-md-12">
                    <div class="panel <?php

                    switch ($loan['status'])
                    {
                        case 0:
                            echo 'panel-warning';
                            break;
                        case 2:
                            echo 'panel-success';
                            break;
                        case 3:
                            echo 'panel-info';
                            break;
                        case 4:
                            echo 'panel-danger';
                            break;
                        default:
                            echo '';
                            break;




                    }

                    ?>">
                        <div class="panel-heading"><?php

                            switch ($loan['status'])
                            {
                                case 0:
                                    echo 'Applied';
                                    break;
                                case 2:
                                    echo 'Disbursed';
                                    break;
                                case 3:
                                    echo 'Returned';
                                    break;
                                case 4:
                                    echo 'Rejected';
                                    break;
                                default:
                                    echo '';
                                    break;




                            }

                            ?></div>
                        <div class="panel-body">
                            <div class="col-sm-12">
                                <span class="pull-left">Reference id</span>
                                <span class="pull-right"><?php echo $loan['loanId']?></span>
                            </div>
                            <div class="col-sm-12">
                                <span class="pull-left">Name </span>
                                <span class="pull-right"><?php echo $loan['userName']?></span>
                            </div>
                            <div class="col-sm-12">
                                <span class="pull-left">Borrow date </span>
                                <span class="pull-right"><?php echo date("d-m-Y", strtotime($loan['borrowingDate']));?></span>
                            </div>
                            <div class="col-sm-12">
                                <span class="pull-left">Amount taken</span>
                                <span class="pull-right"><?php echo $loan['amountTaken']?></span>
                            </div>
                            <div class="col-sm-12">
                                <span class="pull-left">Amount to be Returned</span>
                                <span class="pull-right"><?php echo $loan['returningAmount']?></span>
                            </div>
                        </div>
                        <div class="panel-footer"><?php

                            switch ($loan['status'])
                            {
                                case 0:
                                    ?>
                                    <a href="<?php echo base_url()."admin/rejectLoan/".$loan['loanId']?>">Reject Loan </a>



                            <a href="<?php echo base_url()."admin/acceptLoan/".$loan['loanId']?>">Accept Loan </a>
                                    <?php
                                    break;
                                case 2:
                                    ?><?php
                                    break;
                                case 3:
                                    echo ' ';
                                    break;
                                case 4:
                                    echo ' ';
                                    break;
                                default:
                                    echo ' ';
                                    break;




                            }

                            ?>



                        </div>




                    </div>
                </div>



                <?php
            }

            ?>
        </div>
    </div>

    <?php


}






