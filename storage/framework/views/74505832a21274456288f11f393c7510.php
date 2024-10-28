<div>
  <?php if (! $__env->hasRenderedOnce('e60aac5d-07a8-486f-b957-7cfcc8d08c8e')): $__env->markAsRenderedOnce('e60aac5d-07a8-486f-b957-7cfcc8d08c8e');
$__env->startPush('styles'); ?>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
      integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
  <?php $__env->stopPush(); endif; ?>
  <h3 class="col-span-2 mb-4 text-lg font-semibold leading-tight text-gray-800 dark:text-gray-200">
    Data Absensi
  </h3>
  <div class="flex flex-col gap-3 lg:flex-row lg:items-center">
    <?php if (isset($component)) { $__componentOriginald8ba2b4c22a13c55321e34443c386276 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginald8ba2b4c22a13c55321e34443c386276 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.label','data' => ['for' => 'month_filter','value' => 'Bulan']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('label'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['for' => 'month_filter','value' => 'Bulan']); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginald8ba2b4c22a13c55321e34443c386276)): ?>
<?php $attributes = $__attributesOriginald8ba2b4c22a13c55321e34443c386276; ?>
<?php unset($__attributesOriginald8ba2b4c22a13c55321e34443c386276); ?>
<?php endif; ?>
<?php if (isset($__componentOriginald8ba2b4c22a13c55321e34443c386276)): ?>
<?php $component = $__componentOriginald8ba2b4c22a13c55321e34443c386276; ?>
<?php unset($__componentOriginald8ba2b4c22a13c55321e34443c386276); ?>
<?php endif; ?>
    <?php if (isset($component)) { $__componentOriginalc2fcfa88dc54fee60e0757a7e0572df1 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc2fcfa88dc54fee60e0757a7e0572df1 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.input','data' => ['type' => 'month','name' => 'month_filter','id' => 'month_filter','wire:model.live' => 'month']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'month','name' => 'month_filter','id' => 'month_filter','wire:model.live' => 'month']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalc2fcfa88dc54fee60e0757a7e0572df1)): ?>
<?php $attributes = $__attributesOriginalc2fcfa88dc54fee60e0757a7e0572df1; ?>
<?php unset($__attributesOriginalc2fcfa88dc54fee60e0757a7e0572df1); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc2fcfa88dc54fee60e0757a7e0572df1)): ?>
<?php $component = $__componentOriginalc2fcfa88dc54fee60e0757a7e0572df1; ?>
<?php unset($__componentOriginalc2fcfa88dc54fee60e0757a7e0572df1); ?>
<?php endif; ?>
  </div>
  <h5 class="mt-3 text-sm dark:text-gray-200">Klik pada tanggal untuk melihat detail</h5>
  <div class="mt-4 flex w-full flex-col gap-3 lg:flex-row">
    <div class="grid w-96 grid-cols-7 overflow-x-scroll dark:text-white lg:w-[36rem]">
      <!--[if BLOCK]><![endif]--><?php $__currentLoopData = ['M', 'S', 'S', 'R', 'K', 'J', 'S']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $day): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div
          class="<?php echo e($day === 'M' ? 'text-red-500' : ''); ?> <?php echo e($day === 'J' ? 'text-green-600 dark:text-green-500' : ''); ?> flex h-10 items-center justify-center border border-gray-300 text-center dark:border-gray-600">
          <?php echo e($day); ?>

        </div>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
      <!--[if BLOCK]><![endif]--><?php if($start->dayOfWeek !== 0): ?>
        <!--[if BLOCK]><![endif]--><?php $__currentLoopData = range(1, $start->dayOfWeek); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <div class="h-14 border border-gray-300 bg-gray-100 dark:border-gray-600 dark:bg-gray-700">
          </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
      <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
      <?php
        $presentCount = 0;
        $lateCount = 0;
        $excusedCount = 0;
        $sickCount = 0;
        $absentCount = 0;
      ?>
      <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $dates; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $date): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php
          $isWeekend = $date->isWeekend();
          $attendance = $attendances->firstWhere(fn($v, $k) => $v['date'] === $date->format('Y-m-d'));
          $status = ($attendance ?? [
              'status' => $isWeekend || !$date->isPast() ? '-' : 'absent',
          ])['status'];

          switch ($status) {
              case 'present':
                  $shortStatus = 'H';
                  $bgColor =
                      'bg-green-200 dark:bg-green-800 hover:bg-green-300 dark:hover:bg-green-700 border border-green-600';
                  $presentCount++;
                  break;
              case 'late':
                  $shortStatus = 'T';
                  $bgColor =
                      'bg-amber-200 dark:bg-amber-800 hover:bg-amber-300 dark:hover:bg-amber-700 border border-amber-600';
                  $lateCount++;
                  break;
              case 'excused':
                  $shortStatus = 'I';
                  $bgColor =
                      'bg-blue-200 dark:bg-blue-800 hover:bg-blue-300 dark:hover:bg-blue-700 border border-blue-600';
                  $excusedCount++;
                  break;
              case 'sick':
                  $shortStatus = 'S';
                  $bgColor =
                      'bg-purple-200 dark:bg-purple-950 hover:bg-purple-100 dark:hover:bg-purple-700 border border-purple-600';
                  $sickCount++;
                  break;
              case 'absent':
                  $shortStatus = 'A';
                  $bgColor =
                      'bg-red-200 dark:bg-red-950 text-red-500 dark:text-red-200 border border-red-300 dark:border-red-700';
                  $absentCount++;
                  break;
              default:
                  $shortStatus = '-';
                  $bgColor =
                      'bg-slate-200 text-slate-600 dark:text-slate-200 dark:bg-slate-800 border border-gray-400 dark:border-gray-700';
                  break;
          }
        ?>
        <!--[if BLOCK]><![endif]--><?php if($attendance && ($attendance['attachment'] || $attendance['note'] || $attendance['coordinates'])): ?>
          <button class="<?php echo e($bgColor); ?> h-14 w-full py-1 text-center" wire:click="show(<?php echo e($attendance['id']); ?>)"
            onclick="setLocation(<?php echo e($attendance['lat'] ?? 0); ?>, <?php echo e($attendance['lng'] ?? 0); ?>)">
            <span
              class="<?php echo e($date->isSunday() ? 'text-red-500' : ''); ?> <?php echo e($date->isFriday() ? 'text-green-600 dark:text-green-500' : ''); ?>">
              <?php echo e($date->format('d')); ?>

            </span>
            <br>
            <?php echo e($shortStatus); ?>

          </button>
        <?php else: ?>
          <div class="<?php echo e($bgColor); ?> h-14 py-1 text-center">
            <span
              class="<?php echo e($date->isSunday() ? 'text-red-500' : ''); ?> <?php echo e($date->isFriday() ? 'text-green-600 dark:text-green-500' : ''); ?>">
              <?php echo e($date->format('d')); ?>

            </span>
            <br>
            <?php echo e($shortStatus); ?>

          </div>
        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
      <!--[if BLOCK]><![endif]--><?php if($end->dayOfWeek !== 6): ?>
        <!--[if BLOCK]><![endif]--><?php $__currentLoopData = range(5, $end->dayOfWeek); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <div class="h-14 border border-gray-300 bg-gray-100 dark:border-gray-600 dark:bg-gray-700"></div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
      <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
    </div>
    <div class="grid h-fit w-full grid-cols-2 gap-3 md:grid-cols-4">
      <div
        class="flex items-center justify-between rounded-md bg-green-200 px-4 py-2 text-gray-800 dark:bg-green-900 dark:text-white dark:shadow-gray-700">
        <div>
          <h4 class="text-lg font-semibold md:text-xl">Hadir: <?php echo e($presentCount + $lateCount); ?></h4>
          Terlambat: <?php echo e($lateCount); ?>

        </div>
      </div>
      <div
        class="flex items-center justify-between rounded-md bg-blue-200 px-4 py-2 text-gray-800 dark:bg-blue-900 dark:text-white dark:shadow-gray-700">
        <div>
          <h4 class="text-lg font-semibold md:text-xl">Izin: <?php echo e($excusedCount); ?></h4>
        </div>
      </div>
      <div
        class="flex items-center justify-between rounded-md bg-purple-200 px-4 py-2 text-gray-800 dark:bg-purple-900 dark:text-white dark:shadow-gray-700">
        <div>
          <h4 class="text-lg font-semibold md:text-xl">Sakit: <?php echo e($sickCount); ?></h4>
        </div>
      </div>
      <div
        class="flex items-center justify-between rounded-md bg-red-200 px-4 py-2 text-gray-800 dark:bg-red-900 dark:text-white dark:shadow-gray-700">
        <div>
          <h4 class="text-lg font-semibold md:text-xl">Absen: <?php echo e($absentCount); ?></h4>
        </div>
      </div>
    </div>
  </div>

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
<?php /**PATH C:\xampp\htdocs\absen2\resources\views/livewire/attendance-history.blade.php ENDPATH**/ ?>