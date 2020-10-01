<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('inc.nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
		
    <div class="container mt-5">

        <div class="row">
            <div class="col-12 text-right">
                <a href="/store" class="btn btn-primary mb-2 rounded-0">Sync Orders</a>
            </div>
            <div class="col-12">
                <?php if(count($orders)> 0): ?>
		
                <table class="table table-striped">
                    <thead class="bg-dark text-white">
                        <tr>
			    <th></th>
                            <th>Order Name</th>
                            <th>Payment Status</th>
                            <th>Fulfillment Status</th>
			    <th></th>			    
                            <th class="text-center">PDF</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
				<td><?php echo e($orders->firstItem() + $key); ?></td>
                                <td><?php echo e($order->order_name); ?></td>
                                <td><?php echo e($order->financial_status); ?></td>
                                <td><?php echo e($order->fulfillment_stat); ?></td>
			        <td class="text-center"><a href="<?php echo e(route('show.form',  $order['id'])); ?>" class="btn btn-sm btn-primary">View</a></td>
     				
                                <td class="text-center"><a href="<?php echo e(route('direct.pdf',  $order['id'])); ?>" class="btn btn-sm btn-danger">Download PDF</a></td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
                <?php else: ?>
                    <div class="text-center mt-5">
                        <h3>No Orders found!</h3>
                    </div>
                <?php endif; ?>

                <div class="d-flex justify-content-center">
                    <?php echo e($orders->links()); ?>

                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/176572.cloudwaysapps.com/anmqynzwwp/public_html/resources/views/welcome.blade.php ENDPATH**/ ?>