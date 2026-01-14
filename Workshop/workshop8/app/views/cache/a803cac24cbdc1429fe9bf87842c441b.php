

<?php $__env->startSection('title', 'Edit Student'); ?>

<?php $__env->startSection('content'); ?>

    <?php if(isset($error)): ?>
        <p style="color:red;"><?php echo e($error); ?></p>
    <?php endif; ?>

    <form action="index.php?action=update&id=<?php echo e($student['id']); ?>" method="POST">
        <label for="name">Name:</label><br>
        <input type="text" name="name" id="name" value="<?php echo e($student['name']); ?>" required><br><br>

        <label for="email">Email:</label><br>
        <input type="email" name="email" id="email" value="<?php echo e($student['email']); ?>" required><br><br>

        <label for="course">Course:</label><br>
        <input type="text" name="course" id="course" value="<?php echo e($student['course']); ?>" required><br><br>

        <button type="submit">Update Student</button>
        <a href="index.php?action=index" class="btn">Cancel</a>
    </form>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\new xampp\htdocs\FullStack\Week8\workshop8\app\views/students/edit.blade.php ENDPATH**/ ?>