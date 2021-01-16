
<?php $__env->startSection('title'); ?> <?php echo e(__('pages.supplier')); ?> <?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <!-- Begin Page Content -->
    <div class="container-fluid profile">
        <div class="row">
            <div class="col-md-3 pr-0">
                <div class="left-panel text-center">
                    <div class="logo p-2 text-center bg-secondary">
                        <img src="<?php echo e(asset($supplier->logo ? $supplier->logo : 'backend/img/blank-thumbnail.jpg')); ?>" class="img-fluid">
                    </div>
                    <h5 class="text-center mt-4 company-name"><?php echo e($supplier->company_name); ?></h5>
                    <span class="since">Member Since in <?php echo e($supplier->created_at->diffForHumans()); ?></span>

                    <table class="table table-bordered text-left mt-3">
                        <tr class="text-center">
                            <td colspan="2"><b><?php echo e(__('pages.contact_information')); ?></b></td>
                        </tr>
                        <tr>
                            <td><?php echo e(__('pages.name')); ?>:</td>
                            <td><?php echo e($supplier->contact_person); ?></td>
                        </tr>

                        <tr>
                            <td><?php echo e(__('pages.email')); ?>:</td>
                            <td><?php echo e($supplier->email); ?></td>
                        </tr>


                        <tr>
                            <td><?php echo e(__('pages.phone_number')); ?>:</td>
                            <td><?php echo e($supplier->phone); ?></td>
                        </tr>



                        <tr>
                            <td><?php echo e(__('pages.address')); ?>:</td>
                            <td><?php echo e($supplier->address); ?></td>
                        </tr>

                        <tr>
                            <td><?php echo e(__('pages.created_at')); ?>:</td>
                            <td><?php echo e($supplier->created_at->format(get_option('app_date_format'))); ?></td>
                        </tr>

                        <tr >
                            <td colspan="2" class="p-0">
                                <?php if($supplier->status == 1): ?>
                                    <a href="javascript:void(0)" onclick="$(this).confirm('<?php echo e(route('change-supplier-status', $supplier->id)); ?>');" class="btn btn-success btn-block btn-sm">
                                        <?php echo e(__('pages.active')); ?>

                                    </a>
                                <?php else: ?>
                                    <a href="javascript:void(0)" onclick="$(this).confirm('<?php echo e(route('change-supplier-status', $supplier->id)); ?>');" class="btn btn-danger btn-block btn-sm">
                                        <?php echo e(__('pages.not_active')); ?>

                                    </a>
                                <?php endif; ?>
                            </td>
                        </tr>

                    </table>
                </div>
            </div>

            <div class="col-md-9">
                <div class="right-panel">
                    <div class="row p-3">
                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-4 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1"><?php echo e(__('pages.total_purchase_amount')); ?></div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                <?php echo e(get_option('app_currency')); ?>

                                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('access_to_all_branch')): ?>
                                                    <?php echo e(number_format($supplier->purchase->sum('total_amount'),2)); ?>

                                                <?php else: ?>
                                                    <?php echo e(number_format($supplier->purchase->where('branch_id', auth()->user()->employee->branch_id)->sum('total_amount'),2)); ?>

                                                <?php endif; ?>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-4 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1"><?php echo e(__('pages.total_paid')); ?></div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                <?php echo e(get_option('app_currency')); ?>

                                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('access_to_all_branch')): ?>
                                                    <?php echo e(number_format($supplier->payments->sum('amount'),2)); ?>

                                                <?php else: ?>
                                                    <?php echo e(number_format($supplier->payments->where('branch_id', auth()->user()->employee->branch_id)->sum('amount'),2)); ?>

                                                <?php endif; ?>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-4 col-md-6 mb-4">
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1"><?php echo e(__('pages.total_due')); ?></div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                <?php echo e(get_option('app_currency')); ?>

                                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('access_to_all_branch')): ?>
                                                    <?php echo e(number_format($supplier->purchase->sum('due_amount') - $supplier->payments->sum('amount'),2)); ?>

                                                <?php else: ?>
                                                    <?php echo e(number_format($supplier->purchase->where('branch_id', auth()->user()->employee->branch_id)->sum('due_amount') - $supplier->payments->where('branch_id', auth()->user()->employee->branch_id)->sum('amount'),2)); ?>

                                                <?php endif; ?>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>




                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('access_to_all_branch')): ?>
                        <div class="table-responsive">
                        <table class="table table-bordered text-center table-sm" width="100%" cellspacing="0">
                            <thead>
                                <tr class="bg-secondary text-white">
                                    <th><?php echo e(__('pages.branch')); ?></th>
                                    <th><?php echo e(__('pages.total_purchase')); ?></th>
                                    <th><?php echo e(__('pages.total_paid')); ?></th>
                                    <th><?php echo e(__('pages.total_due')); ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $purchase_by_branches; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $purchase_by_branch): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($purchase_by_branch['branch_name']); ?></td>
                                        <td><?php echo e(get_option('app_currency')); ?><?php echo e(number_format($purchase_by_branch['total_purchase']->sum('total_amount'),2)); ?></td>
                                        <td>
                                            <?php echo e(get_option('app_currency')); ?>

                                            <?php echo e(number_format($purchase_by_branch['total_purchase']->sum('paid_amount') + $purchase_by_branch['payment']->sum('amount'),2)); ?>

                                        </td>
                                        <td><?php echo e(get_option('app_currency')); ?><?php echo e(number_format($purchase_by_branch['total_purchase']->sum('due_amount') - $purchase_by_branch['payment']->sum('amount'),2)); ?></td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                   <td class="text-right pr-2"><b>Total</b></td>
                                   <td><b><?php echo e(get_option('app_currency')); ?><?php echo e(number_format($supplier->purchase->sum('total_amount'),2)); ?></b></td>
                                   <td><b><?php echo e(get_option('app_currency')); ?><?php echo e(number_format($supplier->purchase->sum('paid_amount') + $supplier->payments->sum('amount'),2)); ?></b></td>
                                   <td><b><?php echo e(get_option('app_currency')); ?><?php echo e(number_format($supplier->purchase->sum('due_amount') - $supplier->payments->sum('amount'),2)); ?></b></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <?php endif; ?>



                    <div class="table-responsive">
                        <table class="table table-bordered text-center table-sm" width="100%" cellspacing="0">
                            <thead>
                            <tr class="bg-secondary text-white">
                                <th><?php echo e(__('pages.sl')); ?></th>
                                <th><?php echo e(__('pages.invoice_id')); ?></th>
                                <th><?php echo e(__('pages.date')); ?></th>
                                <?php if(Auth::user()->can('access_to_all_branch')): ?>
                                    <th><?php echo e(__('pages.branch')); ?></th>
                                <?php endif; ?>
                                <th><?php echo e(__('pages.total_amount')); ?></th>
                                <th><?php echo e(__('pages.paid_amount')); ?></th>
                                <th><?php echo e(__('pages.due_amount')); ?></th>
                                <th width="4%"><?php echo e(__('pages.action')); ?></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $__currentLoopData = $purchases; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $purchase): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($key+1); ?></td>
                                    <td>
                                        <a href="<?php echo e(route('purchase.show', [$purchase->id])); ?>" target="_blank">
                                            <?php echo e($purchase->invoice_id); ?>

                                        </a>
                                    </td>
                                    <td><?php echo e($purchase->purchase_date->format(get_option('app_date_format'))); ?></td>
                                    <?php if(Auth::user()->can('access_to_all_branch')): ?>
                                        <td>
                                            <?php echo e($purchase->branch->title); ?>

                                        </td>
                                    <?php endif; ?>
                                    <td> <?php echo e(get_option('app_currency')); ?><?php echo e(number_format($purchase->total_amount, 2)); ?> </td>
                                    <td> <?php echo e(get_option('app_currency')); ?><?php echo e(number_format($purchase->paid_amount, 2)); ?> </td>
                                    <td> <?php echo e(get_option('app_currency')); ?><?php echo e(number_format($purchase->due_amount, 2)); ?> </td>
                                    <td class="font-14">
                                        <div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
                                           <a href="<?php echo e(route('purchase.show', [$purchase->id])); ?>" class="mr-2"><i class="fa fa-eye text-primary"></i> </a>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>

                        <?php echo e($purchases->links()); ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('backend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/mybizfad/public_html/franchise/resources/views/backend/supplier/show.blade.php ENDPATH**/ ?>