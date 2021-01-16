<?php $__env->startSection('title'); ?> Department <?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div id="app">
        <department :all_departments="<?php echo e($departments); ?>"></department>
    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('backend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/mybizfad/public_html/franchise/resources/views/backend/department/index.blade.php ENDPATH**/ ?>