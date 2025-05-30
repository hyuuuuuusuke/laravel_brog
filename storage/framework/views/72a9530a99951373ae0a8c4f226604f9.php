<?php $__env->startSection('content'); ?>
    <div class="row mt-2 mb-5">
        <div class="col-4">
            <?php if($user->avatar): ?>
                 <img src="<?php echo e(asset('/storage/avatar/'.$user->avatar)); ?>" alt="#" class="img-thumbnail w-100">
            <?php else: ?>
                <i class="fa-solid fa-image fa-10x d-block text-center"></i>
            <?php endif; ?>
        </div>
        <div class="col-8">
            <h2 class="display-6"><?php echo e($user->name); ?></h2>
            <a href="<?php echo e(route('profile.edit')); ?>" class="text-decoration-none">Edit Profile</a>
        </div>
    </div>
    <?php if($user->posts): ?>
        <ul class="list-group">
            <?php $__currentLoopData = $user->posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li class="list-group-item py-4">
                    <a href="<?php echo e(route('post.show',$post->id)); ?>">
                        <h3><?php echo e($post->title); ?></h3>
                    </a>
                    <p class="fw-light mb-0"><?php echo e($post->body); ?></p>
                </li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/hyodoyusuke/Desktop/laravel-blog/resources/views/profile/show.blade.php ENDPATH**/ ?>