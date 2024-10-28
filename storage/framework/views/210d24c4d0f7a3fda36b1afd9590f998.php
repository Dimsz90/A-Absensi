  <div class="w-full">
    <?php
      use Illuminate\Support\Carbon;
    ?>
    <?php if (! $__env->hasRenderedOnce('e30b9e35-fe1a-49ae-bdd5-6741ad029e02')): $__env->markAsRenderedOnce('e30b9e35-fe1a-49ae-bdd5-6741ad029e02');
$__env->startPush('styles'); ?>
      <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
        integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
    <?php $__env->stopPush(); endif; ?>
    <?php if (! $__env->hasRenderedOnce('02a4768f-2451-4dd5-97bb-855dffd7ea0f')): $__env->markAsRenderedOnce('02a4768f-2451-4dd5-97bb-855dffd7ea0f');
$__env->startPush('scripts'); ?>
      <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
        integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
      <script>
        let currentMap = document.getElementById('currentMap');
        let map = document.getElementById('map');

        setTimeout(() => {
          toggleMap();
          toggleCurrentMap();
        }, 1000);

        function toggleCurrentMap() {
          const mapIsVisible = currentMap.style.display === "none";
          currentMap.style.display = mapIsVisible ? "block" : "none";
          document.querySelector('#toggleCurrentMap').innerHTML = mapIsVisible ?
            `<?php if (isset($component)) { $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c = $attributes; } ?>
<?php $component = BladeUI\Icons\Components\Svg::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('heroicon-s-chevron-up'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\BladeUI\Icons\Components\Svg::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'mr-2 h-5 w-5']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c)): ?>
<?php $attributes = $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c; ?>
<?php unset($__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal643fe1b47aec0b76658e1a0200b34b2c)): ?>
<?php $component = $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c; ?>
<?php unset($__componentOriginal643fe1b47aec0b76658e1a0200b34b2c); ?>
<?php endif; ?>` :
            `<?php if (isset($component)) { $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c = $attributes; } ?>
<?php $component = BladeUI\Icons\Components\Svg::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('heroicon-s-chevron-down'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\BladeUI\Icons\Components\Svg::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'mr-2 h-5 w-5']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c)): ?>
<?php $attributes = $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c; ?>
<?php unset($__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal643fe1b47aec0b76658e1a0200b34b2c)): ?>
<?php $component = $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c; ?>
<?php unset($__componentOriginal643fe1b47aec0b76658e1a0200b34b2c); ?>
<?php endif; ?>`;
        }

        function toggleMap() {
          const mapIsVisible = map.style.display === "none";
          map.style.display = mapIsVisible ? "block" : "none";
        }
      </script>
    <?php $__env->stopPush(); endif; ?>

    <!--[if BLOCK]><![endif]--><?php if(!$isAbsence): ?>
      <script src="<?php echo e(url('/assets/js/html5-qrcode.min.js')); ?>"></script>
    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

    <div class="flex flex-col gap-4 md:flex-row">
      <!--[if BLOCK]><![endif]--><?php if(!$isAbsence): ?>
        <div class="flex flex-col gap-4">
          <div>
            <?php if (isset($component)) { $__componentOriginaled2cde6083938c436304f332ba96bb7c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginaled2cde6083938c436304f332ba96bb7c = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.select','data' => ['id' => 'shift','class' => 'mt-1 block w-full','wire:model' => 'shift_id','disabled' => ''.e(!is_null($attendance)).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('select'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'shift','class' => 'mt-1 block w-full','wire:model' => 'shift_id','disabled' => ''.e(!is_null($attendance)).'']); ?>
              <option value=""><?php echo e(__('Select Shift')); ?></option>
              <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $shifts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $shift): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($shift->id); ?>" <?php echo e($shift->id == $shift_id ? 'selected' : ''); ?>>
                  <?php echo e($shift->name . ' | ' . $shift->start_time . ' - ' . $shift->end_time); ?>

                </option>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginaled2cde6083938c436304f332ba96bb7c)): ?>
<?php $attributes = $__attributesOriginaled2cde6083938c436304f332ba96bb7c; ?>
<?php unset($__attributesOriginaled2cde6083938c436304f332ba96bb7c); ?>
<?php endif; ?>
<?php if (isset($__componentOriginaled2cde6083938c436304f332ba96bb7c)): ?>
<?php $component = $__componentOriginaled2cde6083938c436304f332ba96bb7c; ?>
<?php unset($__componentOriginaled2cde6083938c436304f332ba96bb7c); ?>
<?php endif; ?>
            <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['shift_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
              <?php if (isset($component)) { $__componentOriginalf94ed9c5393ef72725d159fe01139746 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalf94ed9c5393ef72725d159fe01139746 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.input-error','data' => ['for' => 'shift','class' => 'mt-2','message' => true]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('input-error'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['for' => 'shift','class' => 'mt-2','message' => true]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalf94ed9c5393ef72725d159fe01139746)): ?>
<?php $attributes = $__attributesOriginalf94ed9c5393ef72725d159fe01139746; ?>
<?php unset($__attributesOriginalf94ed9c5393ef72725d159fe01139746); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalf94ed9c5393ef72725d159fe01139746)): ?>
<?php $component = $__componentOriginalf94ed9c5393ef72725d159fe01139746; ?>
<?php unset($__componentOriginalf94ed9c5393ef72725d159fe01139746); ?>
<?php endif; ?>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><!--[if ENDBLOCK]><![endif]-->
          </div>
          <div class="flex justify-center outline outline-gray-100 dark:outline-slate-700" wire:ignore>
            <div id="scanner" class="min-h-72 sm:min-h-96 w-72 rounded-sm outline-dashed outline-slate-500 sm:w-96">
            </div>
          </div>
        </div>
      <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
      <div class="w-full">
        <h4 id="scanner-error" class="mb-3 text-lg font-semibold text-red-500 dark:text-red-400 sm:text-xl" wire:ignore>
        </h4>
        <h4 id="scanner-result" class="mb-3 hidden text-lg font-semibold text-green-500 dark:text-green-400 sm:text-xl">
          <?php echo e($successMsg); ?>

        </h4>
        <h4 id="latlng" class="mb-3 text-lg font-semibold text-gray-600 dark:text-gray-100 sm:text-xl">
          <?php echo e(__('Date') . ': ' . now()->format('d/m/Y')); ?><br>

          <!--[if BLOCK]><![endif]--><?php if(!is_null($currentLiveCoords)): ?>
            <div class="flex justify-between">
              <a href="<?php echo e(\App\Helpers::getGoogleMapsUrl($currentLiveCoords[0], $currentLiveCoords[1])); ?>" target="_blank"
                class="underline hover:text-blue-400">
                <?php echo e(__('Your location') . ': ' . $currentLiveCoords[0] . ', ' . $currentLiveCoords[1]); ?>

              </a>
              <button class="text-nowrap h-6" onclick="toggleCurrentMap()" id="toggleCurrentMap">
                <?php if (isset($component)) { $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c = $attributes; } ?>
<?php $component = BladeUI\Icons\Components\Svg::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('heroicon-s-chevron-down'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\BladeUI\Icons\Components\Svg::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'mr-2 h-5 w-5']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c)): ?>
<?php $attributes = $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c; ?>
<?php unset($__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal643fe1b47aec0b76658e1a0200b34b2c)): ?>
<?php $component = $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c; ?>
<?php unset($__componentOriginal643fe1b47aec0b76658e1a0200b34b2c); ?>
<?php endif; ?>
              </button>
            </div>
          <?php else: ?>
            <?php echo e(__('Your location') . ': -, -'); ?>

          <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
          <div class="my-6 h-72 w-full md:h-96" id="currentMap" wire:ignore></div>
        </h4>
        <div class="grid grid-cols-2 gap-3 md:grid-cols-1 lg:grid-cols-2 xl:grid-cols-3">
          <div
            class="<?php echo e($attendance?->status == 'late' ? 'bg-red-200 dark:bg-red-900' : 'bg-blue-200 dark:bg-blue-900'); ?> flex items-center justify-between rounded-md px-4 py-2 text-gray-800 dark:text-white dark:shadow-gray-700">
            <div>
              <h4 class="text-lg font-semibold md:text-xl">Absen Masuk</h4>
              <div class="flex flex-col sm:flex-row">
                <span>
                  <!--[if BLOCK]><![endif]--><?php if($isAbsence): ?>
                    <?php echo e(__($attendance?->status) ?? '-'); ?>

                  <?php else: ?>
                    <?php echo e($attendance?->time_in ? Carbon::parse($attendance?->time_in)->format('H:i:s') : 'Belum Absen'); ?>

                  <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                </span>
                <!--[if BLOCK]><![endif]--><?php if($attendance?->status == 'late'): ?>
                  <span class="mx-1 hidden sm:inline-block">|</span>
                <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                <span><?php echo e($attendance?->status == 'late' ? 'Terlambat: Ya' : ''); ?></span>
              </div>
            </div>
            <?php if (isset($component)) { $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c = $attributes; } ?>
<?php $component = BladeUI\Icons\Components\Svg::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('heroicon-o-arrows-pointing-in'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\BladeUI\Icons\Components\Svg::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'h-5 w-5']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c)): ?>
<?php $attributes = $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c; ?>
<?php unset($__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal643fe1b47aec0b76658e1a0200b34b2c)): ?>
<?php $component = $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c; ?>
<?php unset($__componentOriginal643fe1b47aec0b76658e1a0200b34b2c); ?>
<?php endif; ?>
          </div>
          <div
            class="flex items-center justify-between rounded-md bg-orange-200 px-4 py-2 text-gray-800 dark:bg-orange-900 dark:text-white dark:shadow-gray-700">
            <div>
              <h4 class="text-lg font-semibold md:text-xl">Absen Keluar</h4>
              <!--[if BLOCK]><![endif]--><?php if($isAbsence): ?>
                <?php echo e(__($attendance?->status) ?? '-'); ?>

              <?php else: ?>
                <?php echo e($attendance?->time_out ? Carbon::parse($attendance?->time_out)->format('H:i:s') : 'Belum Absen'); ?>

              <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
            </div>
            <?php if (isset($component)) { $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c = $attributes; } ?>
<?php $component = BladeUI\Icons\Components\Svg::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('heroicon-o-arrows-pointing-out'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\BladeUI\Icons\Components\Svg::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'h-5 w-5']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c)): ?>
<?php $attributes = $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c; ?>
<?php unset($__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal643fe1b47aec0b76658e1a0200b34b2c)): ?>
<?php $component = $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c; ?>
<?php unset($__componentOriginal643fe1b47aec0b76658e1a0200b34b2c); ?>
<?php endif; ?>
          </div>
          <button
            class="col-span-2 flex items-center justify-between rounded-md bg-purple-200 px-4 py-2 text-gray-800 dark:bg-purple-900 dark:text-white dark:shadow-gray-700 md:col-span-1 lg:col-span-2 xl:col-span-1"
            <?php echo e(is_null($attendance?->lat_lng) ? 'disabled' : 'onclick=toggleMap()'); ?> id="toggleMap">
            <div>
              <h4 class="text-lg font-semibold md:text-xl">Koordinat Absen</h4>
              <!--[if BLOCK]><![endif]--><?php if(is_null($attendance?->lat_lng)): ?>
                Belum Absen
              <?php else: ?>
                <a href="<?php echo e(\App\Helpers::getGoogleMapsUrl($attendance?->latitude, $attendance?->longitude)); ?>"
                  target="_blank" class="underline hover:text-blue-400">
                  <?php echo e($attendance?->latitude . ', ' . $attendance?->longitude); ?>

                </a>
              <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
            </div>
            <?php if (isset($component)) { $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c = $attributes; } ?>
<?php $component = BladeUI\Icons\Components\Svg::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('heroicon-o-map-pin'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\BladeUI\Icons\Components\Svg::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'h-6 w-6']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c)): ?>
<?php $attributes = $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c; ?>
<?php unset($__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal643fe1b47aec0b76658e1a0200b34b2c)): ?>
<?php $component = $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c; ?>
<?php unset($__componentOriginal643fe1b47aec0b76658e1a0200b34b2c); ?>
<?php endif; ?>
          </button>
        </div>

        <div class="my-6 h-52 w-full md:h-64" id="map" wire:ignore></div>

        <hr class="my-4">

        <div class="grid grid-cols-2 gap-3 md:grid-cols-2 lg:grid-cols-3" wire:ignore>
          <a href="<?php echo e(route('apply-leave')); ?>">
            <div
              class="flex flex-col-reverse items-center justify-center gap-2 rounded-md bg-amber-500 px-4 py-2 text-center font-medium text-white shadow-md shadow-gray-400 transition duration-100 hover:bg-amber-600 dark:shadow-gray-700 md:flex-row md:gap-3">
              Ajukan Izin
              <?php if (isset($component)) { $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c = $attributes; } ?>
<?php $component = BladeUI\Icons\Components\Svg::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('heroicon-o-envelope-open'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\BladeUI\Icons\Components\Svg::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'h-6 w-6 text-white']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c)): ?>
<?php $attributes = $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c; ?>
<?php unset($__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal643fe1b47aec0b76658e1a0200b34b2c)): ?>
<?php $component = $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c; ?>
<?php unset($__componentOriginal643fe1b47aec0b76658e1a0200b34b2c); ?>
<?php endif; ?>
            </div>
          </a>
          <a href="<?php echo e(route('attendance-history')); ?>">
            <div
              class="flex flex-col-reverse items-center justify-center gap-2 rounded-md bg-blue-500 px-4 py-2 text-center font-medium text-white shadow-md shadow-gray-400 hover:bg-blue-600 dark:shadow-gray-700 md:flex-row md:gap-3">
              Riwayat Absen
              <?php if (isset($component)) { $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c = $attributes; } ?>
<?php $component = BladeUI\Icons\Components\Svg::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('heroicon-o-clock'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\BladeUI\Icons\Components\Svg::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'h-6 w-6 text-white']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c)): ?>
<?php $attributes = $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c; ?>
<?php unset($__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal643fe1b47aec0b76658e1a0200b34b2c)): ?>
<?php $component = $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c; ?>
<?php unset($__componentOriginal643fe1b47aec0b76658e1a0200b34b2c); ?>
<?php endif; ?>
            </div>
          </a>
          <?php if (isset($component)) { $__componentOriginald69b52d99510f1e7cd3d80070b28ca18 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginald69b52d99510f1e7cd3d80070b28ca18 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.responsive-nav-link','data' => ['href' => ''.e(route('attendance.photo')).'','active' => request()->routeIs('attendance.photo')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('responsive-nav-link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['href' => ''.e(route('attendance.photo')).'','active' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(request()->routeIs('attendance.photo'))]); ?>
          <?php echo e(__('Photo Attendance')); ?>

       <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginald69b52d99510f1e7cd3d80070b28ca18)): ?>
<?php $attributes = $__attributesOriginald69b52d99510f1e7cd3d80070b28ca18; ?>
<?php unset($__attributesOriginald69b52d99510f1e7cd3d80070b28ca18); ?>
<?php endif; ?>
<?php if (isset($__componentOriginald69b52d99510f1e7cd3d80070b28ca18)): ?>
<?php $component = $__componentOriginald69b52d99510f1e7cd3d80070b28ca18; ?>
<?php unset($__componentOriginald69b52d99510f1e7cd3d80070b28ca18); ?>
<?php endif; ?>
        </div>
      </div>
    </div>
  </div>

      <?php
        $__scriptKey = '2057011304-0';
        ob_start();
    ?>
    <script>
      const errorMsg = document.querySelector('#scanner-error');
      getLocation();

      async function getLocation() {
        if (navigator.geolocation) {
          const map = L.map('currentMap');
          L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 21,
          }).addTo(map);
          navigator.geolocation.watchPosition((position) => {
            console.log(position);
            $wire.$set('currentLiveCoords', [position.coords.latitude, position.coords.longitude]);
            map.setView([
              Number(position.coords.latitude),
              Number(position.coords.longitude),
            ], 13);
            L.marker([position.coords.latitude, position.coords.longitude]).addTo(map);
          }, (err) => {
            console.error(`ERROR(${err.code}): ${err.message}`);
            alert('<?php echo e(__('Please enable your location')); ?>');
          });
        } else {
          document.querySelector('#scanner-error').innerHTML = "Gagal mendeteksi lokasi";
        }
      }

      if (!$wire.isAbsence) {
        const scanner = new Html5Qrcode('scanner');

        const config = {
          formatsToSupport: [Html5QrcodeSupportedFormats.QR_CODE],
          fps: 15,
          aspectRatio: 1,
          qrbox: {
            width: 280,
            height: 280
          },
          supportedScanTypes: [Html5QrcodeScanType.SCAN_TYPE_CAMERA]
        };

        async function startScanning() {
          if (scanner.getState() === Html5QrcodeScannerState.PAUSED) {
            return scanner.resume();
          }
          await scanner.start({
              facingMode: "environment"
            },
            config,
            onScanSuccess,
          );
        }

        async function onScanSuccess(decodedText, decodedResult) {
          console.log(`Code matched = ${decodedText}`, decodedResult);

          if (scanner.getState() === Html5QrcodeScannerState.SCANNING) {
            scanner.pause(true);
          }

          if (!(await checkTime())) {
            await startScanning();
            return;
          }

          const result = await $wire.scan(decodedText);

          if (result === true) {
            return onAttendanceSuccess();
          } else if (typeof result === 'string') {
            errorMsg.innerHTML = result;
          }

          setTimeout(async () => {
            await startScanning();
          }, 500);
        }

        async function checkTime() {
          const attendance = await $wire.getAttendance();

          if (attendance) {
            const timeIn = new Date(attendance.time_in).valueOf();
            const diff = (Date.now() - timeIn) / (1000 * 3600);
            const minAttendanceTime = 1;
            console.log(`Difference = ${diff}`);
            if (diff <= minAttendanceTime) {
              const timeIn = new Date(attendance.time_in).toLocaleTimeString([], {
                hour: 'numeric',
                minute: 'numeric',
                second: 'numeric',
                hour12: false,
              });
              const confirmation = confirm(
                `Anda baru saja absen pada ${timeIn}, apakah ingin melanjutkan untuk absen keluar?`
              );
              return confirmation;
            }
          }
          return true;
        }

        function onAttendanceSuccess() {
          scanner.stop();
          errorMsg.innerHTML = '';
          document.querySelector('#scanner-result').classList.remove('hidden');
        }

        const observer = new MutationObserver((mutationList, observer) => {
          const classes = ['text-white', 'bg-blue-500', 'dark:bg-blue-400', 'rounded-md', 'px-3', 'py-1'];
          for (const mutation of mutationList) {
            if (mutation.type === 'childList') {
              const startBtn = document.querySelector('#html5-qrcode-button-camera-start');
              const stopBtn = document.querySelector('#html5-qrcode-button-camera-stop');
              const fileBtn = document.querySelector('#html5-qrcode-button-file-selection');
              const permissionBtn = document.querySelector('#html5-qrcode-button-camera-permission');

              if (startBtn) {
                startBtn.classList.add(...classes);
                stopBtn.classList.add(...classes, 'bg-red-500');
                fileBtn.classList.add(...classes);
              }

              if (permissionBtn)
                permissionBtn.classList.add(...classes);
            }
          }
        });

        observer.observe(document.querySelector('#scanner'), {
          childList: true,
          subtree: true,
        });

        const shift = document.querySelector('#shift');
        const msg = 'Pilih shift terlebih dahulu';
        let isRendered = false;
        setTimeout(() => {
          if (!shift.value) {
            errorMsg.innerHTML = msg;
          } else {
            startScanning();
            isRendered = true;
          }
        }, 1000);
        shift.addEventListener('change', () => {
          if (!isRendered) {
            startScanning();
            isRendered = true;
            errorMsg.innerHTML = '';
          }
          if (!shift.value) {
            scanner.pause(true);
            errorMsg.innerHTML = msg;
          } else if (scanner.getState() === Html5QrcodeScannerState.PAUSED) {
            scanner.resume();
            errorMsg.innerHTML = '';
          }
        });

        const map = L.map('map').setView([
          Number(<?php echo e($attendance?->latitude); ?>),
          Number(<?php echo e($attendance?->longitude); ?>),
        ], 13);
        L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
          maxZoom: 21,
        }).addTo(map);
        L.marker([
          Number(<?php echo e($attendance?->latitude); ?>),
          Number(<?php echo e($attendance?->longitude); ?>),
        ]).addTo(map);
      }
    </script>
      <?php
        $__output = ob_get_clean();

        \Livewire\store($this)->push('scripts', $__output, $__scriptKey)
    ?>
<?php /**PATH C:\xampp\htdocs\absen2\resources\views/livewire/scan.blade.php ENDPATH**/ ?>