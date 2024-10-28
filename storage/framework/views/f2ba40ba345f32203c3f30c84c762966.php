<?php
  $date = Carbon\Carbon::now();
?>
<div>
  <?php if (! $__env->hasRenderedOnce('a88efac0-8d35-480b-809a-aef76021eaf4')): $__env->markAsRenderedOnce('a88efac0-8d35-480b-809a-aef76021eaf4');
$__env->startPush('styles'); ?>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
      integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
  <?php $__env->stopPush(); endif; ?>
  <div class="flex flex-col justify-between sm:flex-row">
    <h3 class="mb-4 text-lg font-semibold leading-tight text-gray-800 dark:text-gray-200">
      Absensi Hari Ini
    </h3>
    <h3 class="mb-4 text-lg font-semibold leading-tight text-gray-800 dark:text-gray-200">
      Jumlah Karyawan: <?php echo e($employeesCount); ?>

    </h3>
  </div>
  <div class="mb-4 grid grid-cols-2 gap-3 md:grid-cols-3 lg:grid-cols-4">
    <div class="rounded-md bg-green-200 px-8 py-4 text-gray-800 dark:bg-green-900 dark:text-white dark:shadow-gray-700">
      <span class="text-2xl font-semibold md:text-3xl">Hadir: <?php echo e($presentCount); ?></span><br>
      <span>Terlambat: <?php echo e($lateCount); ?></span>
    </div>
    <div class="rounded-md bg-blue-200 px-8 py-4 text-gray-800 dark:bg-blue-900 dark:text-white dark:shadow-gray-700">
      <span class="text-2xl font-semibold md:text-3xl">Izin: <?php echo e($excusedCount); ?></span><br>
      <span>Izin/Cuti</span>
    </div>
    <div
      class="rounded-md bg-purple-200 px-8 py-4 text-gray-800 dark:bg-purple-900 dark:text-white dark:shadow-gray-700">
      <span class="text-2xl font-semibold md:text-3xl">Sakit: <?php echo e($sickCount); ?></span>
    </div>
    <div class="rounded-md bg-red-200 px-8 py-4 text-gray-800 dark:bg-red-900 dark:text-white dark:shadow-gray-700">
      <span class="text-2xl font-semibold md:text-3xl">Tidak Hadir: <?php echo e($absentCount); ?></span><br>
      <span>Tidak/Belum Hadir</span>
    </div>
  </div>

  <div class="mb-4 overflow-x-scroll">
    <table class="w-full divide-y divide-gray-200 dark:divide-gray-700">
      <thead class="bg-gray-50 dark:bg-gray-900">
        <tr>
          <th scope="col" class="px-4 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300">
            <?php echo e(__('Name')); ?>

          </th>
         
          <th scope="col" class="px-4 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300">
            <?php echo e(__('Division')); ?>

          </th>
          <th scope="col" class="px-4 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300">
            <?php echo e(__('Job Title')); ?>

          </th>
          <th scope="col" class="px-4 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300">
            <?php echo e(__('Shift')); ?>

          </th>
          <th scope="col"
            class="text-nowrap border border-gray-300 px-1 py-3 text-center text-xs font-medium text-gray-500 dark:border-gray-600 dark:text-gray-300">
            Status
          </th>
          <th scope="col" class="px-4 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300">
            <?php echo e(__('Time In')); ?>

          </th>
          <th scope="col" class="px-4 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300">
            <?php echo e(__('Time Out')); ?>

          </th>
          <th scope="col" class="relative">
            <span class="sr-only">Actions</span>
          </th>
        </tr>
      </thead>
      <tbody class="divide-y divide-gray-200 bg-white dark:divide-gray-700 dark:bg-gray-800">
        <?php
          $class = 'px-4 py-3 text-sm font-medium text-gray-900 dark:text-white';
        ?>
        <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $employees; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $employee): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <?php
            $attendance = $employee->attendance;
            $timeIn = $attendance ? $attendance?->time_in?->format('H:i:s') : null;
            $timeOut = $attendance ? $attendance?->time_out?->format('H:i:s') : null;
            $isWeekend = $date->isWeekend();
            $status = ($attendance ?? [
                'status' => $isWeekend || !$date->isPast() ? '-' : 'absent',
            ])['status'];
            switch ($status) {
                case 'present':
                    $shortStatus = 'H';
                    $bgColor =
                        'bg-green-200 dark:bg-green-800 hover:bg-green-300 dark:hover:bg-green-700 border border-green-300 dark:border-green-600';
                    break;
                case 'late':
                    $shortStatus = 'T';
                    $bgColor =
                        'bg-amber-200 dark:bg-amber-800 hover:bg-amber-300 dark:hover:bg-amber-700 border border-amber-300 dark:border-amber-600';
                    break;
                case 'excused':
                    $shortStatus = 'I';
                    $bgColor =
                        'bg-blue-200 dark:bg-blue-800 hover:bg-blue-300 dark:hover:bg-blue-700 border border-blue-300 dark:border-blue-600';
                    break;
                case 'sick':
                    $shortStatus = 'S';
                    $bgColor = 'hover:bg-gray-100 dark:hover:bg-gray-700 border border-gray-300 dark:border-gray-600';
                    break;
                case 'absent':
                    $shortStatus = 'A';
                    $bgColor =
                        'bg-red-200 dark:bg-red-800 hover:bg-red-300 dark:hover:bg-red-700 border border-red-300 dark:border-red-600';
                    break;
                default:
                    $shortStatus = '-';
                    $bgColor = 'hover:bg-gray-100 dark:hover:bg-gray-700 border border-gray-300 dark:border-gray-600';
                    break;
            }
          ?>
          <tr wire:key="<?php echo e($employee->id); ?>" class="group">
            
            <td class="<?php echo e($class); ?> text-nowrap group-hover:bg-gray-100 dark:group-hover:bg-gray-700">
              <?php echo e($employee->name); ?>

            </td>
           
            <td class="<?php echo e($class); ?> text-nowrap group-hover:bg-gray-100 dark:group-hover:bg-gray-700">
              <?php echo e($employee->division?->name ?? '-'); ?>

            </td>
            <td class="<?php echo e($class); ?> text-nowrap group-hover:bg-gray-100 dark:group-hover:bg-gray-700">
              <?php echo e($employee->jobTitle?->name ?? '-'); ?>

            </td>
            <td class="<?php echo e($class); ?> text-nowrap group-hover:bg-gray-100 dark:group-hover:bg-gray-700">
              <?php echo e($attendance->shift?->name ?? '-'); ?>

            </td>

            
            <td
              class="<?php echo e($bgColor); ?> text-nowrap px-1 py-3 text-center text-sm font-medium text-gray-900 dark:text-white">
              <?php echo e(__($status)); ?>

            </td>

            
            <td class="<?php echo e($class); ?> group-hover:bg-gray-100 dark:group-hover:bg-gray-700">
              <?php echo e($timeIn ?? '-'); ?>

            </td>
            <td class="<?php echo e($class); ?> group-hover:bg-gray-100 dark:group-hover:bg-gray-700">
              <?php echo e($timeOut ?? '-'); ?>

            </td>

            
            <td
              class="cursor-pointer text-center text-sm font-medium text-gray-900 group-hover:bg-gray-100 dark:text-white dark:group-hover:bg-gray-700">
              <div class="flex items-center justify-center gap-3">
                <!--[if BLOCK]><![endif]--><?php if($attendance && ($attendance->attachment || $attendance->note || $attendance->lat_lng)): ?>
                  <?php if (isset($component)) { $__componentOriginald0f1fd2689e4bb7060122a5b91fe8561 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginald0f1fd2689e4bb7060122a5b91fe8561 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.button','data' => ['type' => 'button','wire:click' => 'show('.e($attendance->id).')','onclick' => 'setLocation('.e($attendance->latitude ?? 0).', '.e($attendance->longitude ?? 0).')']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'button','wire:click' => 'show('.e($attendance->id).')','onclick' => 'setLocation('.e($attendance->latitude ?? 0).', '.e($attendance->longitude ?? 0).')']); ?>
                    <?php echo e(__('Detail')); ?>

                   <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginald0f1fd2689e4bb7060122a5b91fe8561)): ?>
<?php $attributes = $__attributesOriginald0f1fd2689e4bb7060122a5b91fe8561; ?>
<?php unset($__attributesOriginald0f1fd2689e4bb7060122a5b91fe8561); ?>
<?php endif; ?>
<?php if (isset($__componentOriginald0f1fd2689e4bb7060122a5b91fe8561)): ?>
<?php $component = $__componentOriginald0f1fd2689e4bb7060122a5b91fe8561; ?>
<?php unset($__componentOriginald0f1fd2689e4bb7060122a5b91fe8561); ?>
<?php endif; ?>
                <?php else: ?>
                  -
                <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
              </div>
            </td>
          </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
      </tbody>
    </table>
  </div>
  <?php echo e($employees->links()); ?>


  <?php if (isset($component)) { $__componentOriginal323973f2b7c9b279426a00e14a9be4bd = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal323973f2b7c9b279426a00e14a9be4bd = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.attendance-detail-modal','data' => ['currentAttendance' => $currentAttendance]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('attendance-detail-modal'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['current-attendance' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($currentAttendance)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal323973f2b7c9b279426a00e14a9be4bd)): ?>
<?php $attributes = $__attributesOriginal323973f2b7c9b279426a00e14a9be4bd; ?>
<?php unset($__attributesOriginal323973f2b7c9b279426a00e14a9be4bd); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal323973f2b7c9b279426a00e14a9be4bd)): ?>
<?php $component = $__componentOriginal323973f2b7c9b279426a00e14a9be4bd; ?>
<?php unset($__componentOriginal323973f2b7c9b279426a00e14a9be4bd); ?>
<?php endif; ?>
  <?php echo $__env->yieldPushContent('attendance-detail-scripts'); ?>
</div>
<?php /**PATH C:\xampp\htdocs\absen2\resources\views/livewire/admin/dashboard.blade.php ENDPATH**/ ?>