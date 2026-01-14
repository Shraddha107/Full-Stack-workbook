<?php
    $base = '/FullStack/Week8/workshop8/public/';
?>



<?php $__env->startSection('title', 'Add Student'); ?>

<?php $__env->startSection('content'); ?>
    <h1>Add New Student</h1>

    <?php if(isset($error)): ?>
        <p style="color:red;"><?php echo e($error); ?></p>
    <?php endif; ?>

    <form action="<?php echo e($base); ?>?page=store" method="POST">
        <label for="name">Name:</label><br>
        <input type="text" name="name" id="name"><br><br>

        <label for="email">Email:</label><br>
        <input type="email" name="email" id="email"><br><br>

        <label for="course">Course:</label><br>
        <input type="text" name="course" id="course"><br><br>

        <button type="submit">Save Student</button>
    </form>

    <a href="<?php echo e($base); ?>?page=index">Back to Student List</a>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\new xampp\htdocs\FullStack\Week8\workshop8\app\views/students/create.blade.php ENDPATH**/ ?>