

<?php $__env->startSection('title', 'Add Student'); ?>

<?php $__env->startSection('content'); ?>

    <?php if(isset($error)): ?>
        <p style="color:red;"><?php echo e($error); ?></p>
    <?php endif; ?>

    <form action="index.php?action=store" method="POST">
        <label for="name">Name:</label><br>
        <input type="text" name="name" id="name" required><br><br>

        <label for="email">Email:</label><br>
        <input type="email" name="email" id="email"><br><br>

        <label for="course">Course:</label><br>
        <input type="text" name="course" id="course"><br><br>

        <button type="submit" class="btn btn-success">Add Student</button>
        <a href="index.php?action=index" class="btn">Cancel</a>
    </form>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\new xampp\htdocs\FullStack\Week8\workshop8\app\views/students/create.blade.php ENDPATH**/ ?>