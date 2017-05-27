<?php
/**
 * Created by PhpStorm.
 * User: jack
 * Date: 27/05/17
 * Time: 11:21 PM
 */

if(sizeof($loans)==0)
{
    ?>

    <div class="container-fluid" >
    <div class="col-sm-4 col-sm-offset-4" style="padding-top: 10%">
        <div class="well">
            <p>You have no loan history.</p>
            <p>Please apply for loan <a href="<?php echo base_url().'apply/'?>">here</a>. </p>
        </div>
    </div>
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




                <div class="col-sm-4 col-lg-4 col-md-4">
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
                                echo ' ';
                                break;
                            case 2:
                                 ?><a href="<?php echo base_url().'profile/payment/'.$loan['loanId'];?>" class="btn btn-primary">Repay</a><?php
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





