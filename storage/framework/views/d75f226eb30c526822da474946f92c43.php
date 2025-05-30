<?php $__env->startSection('content'); ?>

    <form action="<?php echo e(route('profile.update')); ?>" method="post" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PATCH'); ?>

        <div class="row mt-2 mb-3">
            <div class="col-6">
                <i class="fa-solid fa-image fa-10x d-block text-center"></i>
                <input type="file" name="avatar" id="avatar" class="form-control mt-1">
                <div class="form-text">
                    Acceptable formats: jpeg, jpg, png, gif only <br>
                    Maximum file size 1048kb
                </div>
            </div>
        </div>
        <div class="mb-3">
            <label for="name" class="form-label fw-boild">Name</label>
            <input type="text" name="name" id="name" class="form-control" value="<?php echo e($user->name); ?>">
        </div>
        <div class="mb-3">
            <label for="email" class="form-label fw-boild">Email</label>
            <input type="text" name="email" id="email" class="form-control" value="<?php echo e($user->email); ?>">
        </div>
        <button type="submit" class="btn btn-warning px-5">Save</button>
    </form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/hyodoyusuke/Desktop/laravel-blog/resources/views/profile/edit.blade.php ENDPATH**/ ?>