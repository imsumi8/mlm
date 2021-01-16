<?php $__env->startSection('title'); ?> <?php echo e(__('pages.roles')); ?>  <?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div id="app">
        <role :all_roles="<?php echo e($roles); ?>"></role>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/mybizfad/public_html/franchise/resources/views/backend/role/index.blade.php ENDPATH**/ ?>