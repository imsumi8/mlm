<div class="d-none d-sm-block btn-group btn-group-justified nav-buttons" role="group" aria-label="Basic example">
    <a href="<?php echo e(url('report/purchase/summary')); ?>" class="btn btn-outline-primary <?php echo e(active_if_full_match('report/purchase/summary')); ?> <?php echo e(active_if_full_match('report/purchase/summary-filter')); ?>"><i class="fas fa-money-check"></i> <?php echo e(__('pages.purchase_summary')); ?> </a>
    <a href="<?php echo e(url('report/purchase/statistics')); ?>" class="btn btn-outline-primary <?php echo e(active_if_full_match('report/purchase/statistics')); ?> <?php echo e(active_if_full_match('report/purchase/statistics-filter')); ?>  <?php echo e(active_if_full_match('report/purchase/statistics/last/*/days')); ?>"><i class="fas fa-chart-bar"></i> <?php echo e(__('pages.purchase_statistics')); ?>   </a>
    <a href="<?php echo e(url('report/purchase/product-wise')); ?>" class="btn btn-outline-primary <?php echo e(active_if_full_match('report/purchase/product-wise')); ?> <?php echo e(active_if_full_match('report/purchase/product-wise-filter')); ?>"><i class="fas fa-money-check-alt"></i>  <?php echo e(__('pages.product_wise_purchase')); ?> </a>
    <a href="<?php echo e(url('report/purchase/purchases')); ?>" class="btn btn-outline-primary <?php echo e(active_if_full_match('report/purchase/purchases')); ?> <?php echo e(active_if_full_match('report/purchase/purchases-filter-result')); ?>"><i class="fas fa-braille"></i><?php echo e(__('pages.all')); ?> <?php echo e(__('pages.purchase')); ?></a>
</div>
<?php /**PATH /home/mybizfad/public_html/franchise/resources/views/backend/report/purchase/partial/nav.blade.php ENDPATH**/ ?>