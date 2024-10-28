<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames(([
    'active' => false,
    'align' => 'left',
    'contentClasses' => 'py-1 bg-white dark:bg-gray-700',
    'dropdownClasses' => 'w-48',
    'triggerClasses' => '',
]));

foreach ($attributes->all() as $__key => $__value) {
    if (in_array($__key, $__propNames)) {
        $$__key = $$__key ?? $__value;
    } else {
        $__newAttributes[$__key] = $__value;
    }
}

$attributes = new \Illuminate\View\ComponentAttributeBag($__newAttributes);

unset($__propNames);
unset($__newAttributes);

foreach (array_filter(([
    'active' => false,
    'align' => 'left',
    'contentClasses' => 'py-1 bg-white dark:bg-gray-700',
    'dropdownClasses' => 'w-48',
    'triggerClasses' => '',
]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars); ?>

<?php
  switch ($align) {
      case 'left':
          $alignmentClasses = 'ltr:origin-top-left rtl:origin-top-right start-0';
          break;
      case 'top':
          $alignmentClasses = 'origin-top';
          break;
      case 'none':
      case 'false':
          $alignmentClasses = '';
          break;
      case 'right':
      default:
          $alignmentClasses = 'ltr:origin-top-right rtl:origin-top-left end-0';
          break;
  }
  $classes = $active
      ? 'relative inline-flex items-center px-1 pt-1 border-b-2 border-indigo-400 dark:border-indigo-600 text-sm font-medium leading-5 text-gray-900 dark:text-gray-100 focus:outline-none focus:border-indigo-700 transition duration-150 ease-in-out cursor-pointer'
      : 'relative inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium leading-5 text-gray-500 dark:text-gray-400 hover:text-gray-700 dark:hover:text-gray-300 hover:border-gray-300 dark:hover:border-gray-700 focus:outline-none focus:text-gray-700 dark:focus:text-gray-300 focus:border-gray-300 dark:focus:border-gray-700 transition duration-150 ease-in-out cursor-pointer';
?>

<div <?php echo e($attributes->merge(['class' => $classes])); ?> x-data="{ open: false }" @click.away="open = false"
  @close.stop="open = false">
  <div @click="open = ! open" class="<?php echo e($triggerClasses); ?> flex h-full items-center">
    <?php echo e($trigger); ?>

  </div>
  <div>
    <div x-show="open" x-transition:enter="transition ease-out duration-200"
      x-transition:enter-start="transform opacity-0 scale-95" x-transition:enter-end="transform opacity-100 scale-100"
      x-transition:leave="transition ease-in duration-75" x-transition:leave-start="transform opacity-100 scale-100"
      x-transition:leave-end="transform opacity-0 scale-95"
      class="<?php echo e($alignmentClasses); ?> <?php echo e($dropdownClasses); ?> absolute z-50 mt-2 rounded-md shadow-lg"
      style="display: none;" @click="open = false">
      <div class="<?php echo e($contentClasses); ?> rounded-md ring-1 ring-black ring-opacity-5">
        <?php echo e($content); ?>

      </div>
    </div>
  </div>
</div>
<?php /**PATH C:\xampp\htdocs\absen2\resources\views/components/nav-dropdown.blade.php ENDPATH**/ ?>