<?php $__env->startSection('title', 'Home'); ?>

<?php $__env->startSection('content'); ?>
    <?php $__empty_1 = true; $__currentLoopData = $all_posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
        <div class="mt-2 border border-2 rounded p-4">
            <a href="<?php echo e(route('post.show', $post->id)); ?>">
                <h2 class="h4"><?php echo e($post->title); ?></h2>
            </a>
            <h3 class="h6 text-muted"><?php echo e($post->user->name); ?></h3>
            <p class="fw-light mb-0"><?php echo e($post->body); ?></p>

            
            
            <?php if(Auth::user()->id === $post->user_id): ?>
                <div class="mt-2 text-end">
                    <a href="<?php echo e(route('post.edit', $post->id)); ?>" class="btn btn-primary btn-sm">
                        <i class="fas fa-pen"></i>Edit
                    </a>

                    <form action="<?php echo e(route('post.destroy', $post->id)); ?>" method="post" class="d-inline">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('DELETE'); ?>

                        <button type="submit" class="btn btn-danger btn-sm">
                            <i class="fas trash-can"></i>Delete
                        </button>
                    </form>
                </div>
                <?php endif; ?>
        </div>


    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
    <div style="margin-top: 100px">
        <h2 class="text-muted text-center">No posts yet.</h2>
        <p class="text-center">
            <a href="<?php echo e(route('post.create')); ?>" class="text-decoration-none">Create a new post.</a>
        </p>
    </div>
    <?php endif; ?>
 <?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/hyodoyusuke/Desktop/laravel-blog/resources/views/posts/index.blade.php ENDPATH**/ ?>