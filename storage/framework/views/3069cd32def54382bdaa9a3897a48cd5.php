<div class="form-group">
    <label for="<?php echo e($name); ?>"><?php echo e($label); ?></label>
    <input type="<?php echo e($type ?? 'text'); ?>" name="<?php echo e($name); ?>" id="<?php echo e($name); ?>" class="form-control" value="<?php echo e(old($name, $value)); ?>" <?php echo e($attributes); ?>>

    <?php $__errorArgs = [$name];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
        <div class="text-danger mt-1"><?php echo e($message); ?></div>
    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
</div>
<?php /**PATH /home/arifrizal/Desktop/bckup/laravel-modern-template/resources/views/components/input-form.blade.php ENDPATH**/ ?>