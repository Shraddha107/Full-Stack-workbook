<?php
    $base = '/FullStack/Week8/workshop8/public/';
?>



<?php $__env->startSection('title', 'Student List'); ?>

<?php $__env->startSection('content'); ?>
    <h1>All Students</h1>

    <table border="1" cellpadding="8" cellspacing="0">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Course</th>
            <th>Actions</th>
        </tr>
        <?php $__currentLoopData = $students; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $student): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e($student['id']); ?></td>
                <td><?php echo e($student['name']); ?></td>
                <td><?php echo e($student['email']); ?></td>
                <td><?php echo e($student['course']); ?></td>
                <td>
                    <a href="<?php echo e($base); ?>?page=edit&id=<?php echo e($student['id']); ?>">Edit</a> |
                    <a href="<?php echo e($base); ?>page=delete&id=<?php echo e($student['id']); ?>">Delete</a>
                </td>
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </table>

    <a href="<?php echo e($base); ?>?page=create">Add New Student</a>
    <a href="<?php echo e($base); ?>?page=edit&id=<?php echo e($student['id']); ?>">Edit</a>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\new xampp\htdocs\FullStack\Week8\workshop8\app\views/students/index.blade.php ENDPATH**/ ?>