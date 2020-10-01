<?php $__env->startSection('css'); ?>
    <style>
        input{
            border: none;
            border-bottom: 1px solid #000;
            background: none;
            width: 100%;
        }
    </style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('inc.nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <form method="POST" action="<?php echo e(route('form.submit', $order['id'])); ?>">
    <div class="container mt-3">
        <div class="row mb-3">
            <div class="col-12 text-right">
                <a type="submit" class="btn btn-success">Edit</a>
            </div>
        </div>

        <div class="row bg-white p-2">
            <div class="col-md-12">
                <div class="logo text-center">
                    <img src="<?php echo e(asset('download.png')); ?>" alt="no image" class="w-100 img-fluid">
                    <h5 class="mt-2"><u>Small Parcel/Cargo Insurence </u><span class="text-danger">Buyer/Recipient Affidavit</span></h5>
                </div>


                <div class="row my-3">
                    <div class="order-details col-6">
                        Order Number: <span><u><?php echo e($order->f_id); ?></u></span>
                    </div>

                    <div class="claim-details col-6 text-right">
                        Claim Number: <span> <u><?php echo e($order->fulfillments ? $order->tracking : ''); ?> </u></span>
                    </div>
                </div>


                <div class="claim-info">
                    <h4><u>Claim inforamation Sheet</u></h4>
                    <div class="row mb-3">
                        <div class="col-12">
                            <span>Buyers / Recipients Name: </span><input type="text" value="<?php echo e($order['shipping_address'] ? $order->name : ''); ?>">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-6">
                            <span>Street Address / PO Box: </span><input type="text" value="<?php echo e($order['shipping_address'] ? $order->address : ''); ?>">
                        </div>

                        <div class="col-6">
                            <span>City: </span><input type="text" value="<?php echo e($order['shipping_address'] ? $order->city : ''); ?>">
                        </div>
                    </div>

                    <div class="row mb-3">

                        <div class="col-4">
                            <span>State/Province: </span><input type="text"  value="<?php echo e($order['shipping_address'] ? $order->province : ''); ?>">
                        </div>

                        <div class="col-4">
                            <span>Postal/Zip Code: </span><input type="text"  value="<?php echo e($order['shipping_address'] ? $order->zip : ''); ?>">
                        </div>

                        <div class="col-4">
                            <span>Country: </span><input type="text" value="<?php echo e($order['shipping_address'] ? $order->country : ''); ?>">
                        </div>
                    </div>

                    <div class="row mb-3">
			<div class="col-6">
                            <span>Email </span><input type="text">
                        </div>
                        <div class="col-6">
                            <span>Phone: </span><input type="text" value="<?php echo e($order['shipping_address'] ? $order->phone : ''); ?>">
                        </div>

                        

                    </div>

                </div>

                <div class="claim-details">
                    <h4><u>Claim Detail</u></h4>
                    <div class="row mb-3">
                        <div class="col-12">
                            <span>Lost / Damage / Incomplete: </span><input type="text">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-12">
                            <span>If item is damaged, please descibe and attach picture of damage:</span><input type="text">
                        </div>

                    </div>

                    <div class="row mb-3">
                        <div class="col-12">
                            <span>Describe condition of package: </span><input type="text">
                        </div>
                    </div>

                </div>

                <div class="seller-info">
                    <h4><u>Seller Information</u></h4>
                    <div class="row mb-3">
                        <div class="col-12">
                            <span>Name: </span><input type="text">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-6">
                            <span>Phone: </span><input type="text">
                        </div>

                        <div class="col-6">
                            <span>Email: </span><input type="text">
                        </div>
                    </div>

                    <p>I hearby certify that all information on this form is accurate and truthful under Federal Law and under penalty of perjury, under the laws of the state
                       of California. The submission of a false, fictitious or fraudulent or fraudulent
                       statement may result in imprisonment of up to 5 years and a fine of up to $10,000 (18 USC
                       1001). In addition, a civil penalty of up to $5,000, and an assessment of twice the
                       amount falsely claimed may be imposed ( 31 USC 3802).
                    </p>

                    <div class="row mb-2">
                        <div class="col-8">
                            <span>Buyer / Recipient Signature: </span><input type="text">
                        </div>

                        <div class="col-4">
                            <span>Date: </span><input type="text">
                        </div>
                    </div>

                    <p>Warning: Any fraudulent claims will make the shipper and/or consignee liable for any prosecution for
                       mail fraud under the federal crime code.<br><br>

                       Should the insured and/or shipper submit a false, fictitious or fraudulent statement,
                       it will result in the claims being denied.
                    </p>

                    <br>

                    <footer class="text-center">
                        <p><b>Insure</b>Ship 3211 Cahuenga Bivd. West Suite 200, Los Angeles, CA 900</p>
                        <div class="row">
                            <div class="col-4"><b>Phone:</b> (866) 701-3654 / (818) 303-9255</div>
                            <div class="col-4"><b>Fax: </b> (877) 859-5858</div>
                            <div class="col-4"><b>Email: </b>claims@insureship.com</div>
                        </div>
                    </footer>



                </div>

            </div>
        </div>
    </div>
   </form>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/176572.cloudwaysapps.com/anmqynzwwp/public_html/resources/views/form.blade.php ENDPATH**/ ?>