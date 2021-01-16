<?php $__env->startSection('title'); ?> Purchase  <?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div id="app">
        <edit-purchase :purchase="<?php echo e($purchase); ?>"></edit-purchase>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/mybizfad/public_html/franchise/resources/views/backend/purchase/edit.blade.php ENDPATH**/ ?>