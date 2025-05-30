<?php $__env->startSection('title', 'Create Post'); ?>

<?php $__env->startSection('content'); ?>
<form action="<?php echo e(route('post.store')); ?>" method="post" enctype="multipart/form-data">
    <?php echo csrf_field(); ?>

    <div class="bm-3">
        <label for="title" class="form-label text-secondary">Title</label>
        <input type="text" name="title" id="title" class="form-control" placeholder="Enter title here" value="<?php echo e(old('title')); ?> " autofocus>
         
         <?php $__errorArgs = ['title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
         <p class="text-danger small"><?php echo e($message); ?></p>
      <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
    </div>

    <div class="mb-3">
        <label for="body" class="form-label text-secondary">Body</label>
        <textarea name="body" id="body"rows="5" class="form-control" placeholder="Start writing..."><?php echo e(old('body')); ?></textarea>
         
         <?php $__errorArgs = ['body'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
         <p class="text-danger small"><?php echo e($message); ?></p>
      <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
    </div>

    <div class="mb-3">
        <label for="image" class="form-label text-secodary">Image</label>
        <input type="file" name="image" id="image" class="form-control" aria-describedly="image-info">
        <div class="form-text" id="image-info">
            Acceptable formats are jpeg, jpg, png, gif only. <br>
            Maximum file size is 1048kb.
        </div>
        
        <?php $__errorArgs = ['image'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
           <p class="text-danger small"><?php echo e($message); ?></p>
        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
    </div>

    <button type="submit" class="btn btn-primary px-5">Post</button>
</form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/hyodoyusuke/Desktop/laravel-blog/resources/views/posts/create.blade.php ENDPATH**/ ?>