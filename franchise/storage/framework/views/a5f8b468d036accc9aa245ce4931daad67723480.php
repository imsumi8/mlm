<?php $__env->startSection('title'); ?> Designation <?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div id="app">
        <designation :all_designations="<?php echo e($designations); ?>"></designation>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('backend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/mybizfad/public_html/franchise/resources/views/backend/designation/index.blade.php ENDPATH**/ ?>