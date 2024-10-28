<?php
  $class =
      'inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 disabled:opacity-50 transition ease-in-out duration-150';
?>

<?php if(!isset($attributes['href'])): ?>
  <button <?php echo e($attributes->merge(['type' => 'submit', 'class' => $class])); ?>>
    <?php echo e($slot); ?>

  </button>
<?php else: ?>
  <a <?php echo e($attributes->merge(['class' => $class])); ?>>
    <?php echo e($slot); ?>

  </a>
<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\absen2\resources\views/components/button.blade.php ENDPATH**/ ?>