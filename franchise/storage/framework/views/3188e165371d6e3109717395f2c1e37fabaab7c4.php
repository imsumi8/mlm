<?php $__env->startSection('title'); ?> <?php echo e(__('pages.tax')); ?> <?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div id="app">
        <tax :all_taxes="<?php echo e($taxes); ?>"></tax>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('backend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/mybizfad/public_html/franchise/resources/views/backend/tax/index.blade.php ENDPATH**/ ?>