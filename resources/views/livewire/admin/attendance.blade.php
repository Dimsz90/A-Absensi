@php
  use Illuminate\Support\Carbon;
  $m = Carbon::parse($month);
  $showUserDetail = !$month || $week || $date; // is week or day filter
  $isPerDayFilter = isset($date);
  $datesWithoutWeekend = '';
@endphp
<div>
  @pushOnce('styles')
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
      integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
  @endpushOnce
  <h3 class="col-span-2 mb-4 text-lg font-semibold leading-tight text-gray-800 dark:text-gray-200">
    Data Absensi
  </h3>
  <div class="mb-1 text-sm dark:text-white">Filter:</div>
  <div class="mb-4 grid grid-cols-2 flex-wrap items-center gap-5 md:gap-8 lg:flex">
    <div class="flex flex-col gap-3 lg:flex-row lg:items-center">
      <x-label for="month_filter" value="Per Bulan"></x-label>
      <x-input type="month" name="month_filter" id="month_filter" wire:model.live="month" />
    </div>
    <div class="flex flex-col gap-3 lg:flex-row lg:items-center">
      <x-label for="week_filter" value="Per Minggu"></x-label>
      <x-input type="week" name="week_filter" id="week_filter" wire:model.live="week" />
    </div>
    <div class="col-span-2 flex flex-col gap-3 lg:flex-row lg:items-center">
      <x-label for="day_filter" value="Per Hari"></x-label>
      <x-input type="date" name="day_filter" id="day_filter" wire:model.live="date" />
    </div>
    <x-select id="division" wire:model.live="division">
      <option value="">{{ __('Select Division') }}</option>
      @foreach (App\Models\Division::all() as $_division)
        <option value="{{ $_division->id }}" {{ $_division->id == $division ? 'selected' : '' }}>
          {{ $_division->name }}
        </option>
      @endforeach
    </x-select>
    <x-select id="jobTitle" wire:model.live="jobTitle">
      <option value="">{{ __('Select Job Title') }}</option>
      @foreach (App\Models\JobTitle::all() as $_jobTitle)
        <option value="{{ $_jobTitle->id }}" {{ $_jobTitle->id == $jobTitle ? 'selected' : '' }}>
          {{ $_jobTitle->name }}
        </option>
      @endforeach
    </x-select>
    <div class="col-span-2 flex items-center gap-2 lg:w-96">
      <x-input type="text" class="w-full" name="search" id="seacrh" wire:model="search"
        placeholder="{{ __('Search') }}" />
      <x-button type="button" wire:click="$refresh" wire:loading.attr="disabled">{{ __('Search') }}</x-button>
      @if ($search)
        <x-secondary-button type="button" wire:click="$set('search', '')" wire:loading.attr="disabled">
          {{ __('Reset') }}
        </x-secondary-button>
      @endif
    </div>
    <div class="lg:hidden"></div>
    <x-secondary-button
      href="{{ route('admin.attendances.report', ['month' => $month, 'week' => $week, 'date' => $date, 'division' => $division, 'jobTitle' => $jobTitle]) }}"
      class="flex justify-center gap-2">
      Cetak Laporan
      <x-heroicon-o-printer class="h-5 w-5" />
    </x-secondary-button>
  </div>
  <div class="overflow-x-scroll">
    <table class="w-full divide-y divide-gray-200 dark:divide-gray-700">
      <thead class="bg-gray-50 dark:bg-gray-900">
        <tr>
          <th scope="col" class="px-4 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300">
            {{ $showUserDetail ? __('Name') : __('Name') . '/' . __('Date') }}
          </th>
          @if ($showUserDetail)
            <th scope="col" class="px-4 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300">
              {{ __('NIP') }}
            </th>
            <th scope="col" class="px-4 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300">
              {{ __('Division') }}
            </th>
            <th scope="col" class="px-4 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300">
              {{ __('Job Title') }}
            </th>
          @endif
          @foreach ($dates as $date)
            @php
              if (!$isPerDayFilter && $date->isSunday()) {
                  // Minggu merah
                  $textClass = 'text-red-500 dark:text-red-300';
              } elseif (!$isPerDayFilter && $date->isFriday()) {
                  // Jumat hijau
                  $textClass = 'text-green-500 dark:text-green-300';
              } else {
                  $textClass = 'text-gray-500 dark:text-gray-300';
              }
            @endphp
            <th scope="col"
              class="{{ $textClass }} text-nowrap border border-gray-300 px-1 py-3 text-center text-xs font-medium dark:border-gray-600">
              @if ($isPerDayFilter)
                Status
              @else
                {{ $date->format('d/m') }}
              @endif
            </th>
          @endforeach
          @if (!$isPerDayFilter)
            @foreach (['H', 'T', 'I', 'S', 'A'] as $_st)
              <th scope="col"
                class="text-nowrap border border-gray-300 px-1 py-3 text-center text-xs font-medium text-gray-500 dark:border-gray-600 dark:text-gray-300">
                {{ $_st }}
              </th>
            @endforeach
          @endif
          @if ($isPerDayFilter)
            <th scope="col" class="relative">
              <span class="sr-only">Actions</span>
            </th>
          @endif
        </tr>
      </thead>
      <tbody class="divide-y divide-gray-200 bg-white dark:divide-gray-700 dark:bg-gray-800">
        @php
          $class = 'cursor-pointer px-4 py-3 text-sm font-medium text-gray-900 dark:text-white';
        @endphp
        @foreach ($employees as $employee)
          @php
            $attendances = $employee->attendances;
          @endphp
          <tr wire:key="{{ $employee->id }}" class="group">
            {{-- Detail karyawan --}}
            <td class="{{ $class }} text-nowrap group-hover:bg-gray-100 dark:group-hover:bg-gray-700">
              {{ $employee->name }}
            </td>
            @if ($showUserDetail)
              <td class="{{ $class }} group-hover:bg-gray-100 dark:group-hover:bg-gray-700">
                {{ $employee->nip }}
              </td>
              <td class="{{ $class }} text-nowrap group-hover:bg-gray-100 dark:group-hover:bg-gray-700">
                {{ $employee->division?->name ?? '-' }}
              </td>
              <td class="{{ $class }} text-nowrap group-hover:bg-gray-100 dark:group-hover:bg-gray-700">
                {{ $employee->jobTitle?->name ?? '-' }}
              </td>
            @endif

            {{-- Absensi --}}
            @php
              $presentCount = 0;
              $lateCount = 0;
              $excusedCount = 0;
              $sickCount = 0;
              $absentCount = 0;
            @endphp
            @foreach ($dates as $date)
              @php
                $isWeekend = $date->isWeekend();
                $attendance = $attendances->firstWhere(fn($v, $k) => $v['date'] === $date->format('Y-m-d'));
                $status = ($attendance ?? [
                    'status' => $isWeekend ? '-' : 'absent',
                ])['status'];
                switch ($status) {
                    case 'present':
                        $shortStatus = 'H';
                        $bgColor =
                            'bg-green-200 dark:bg-green-800 hover:bg-green-300 dark:hover:bg-green-700 border border-green-300 dark:border-green-600';
                        $presentCount++;
                        break;
                    case 'late':
                        $shortStatus = 'T';
                        $bgColor =
                            'bg-amber-200 dark:bg-amber-800 hover:bg-amber-300 dark:hover:bg-amber-700 border border-amber-300 dark:border-amber-600';
                        $lateCount++;
                        break;
                    case 'excused':
                        $shortStatus = 'I';
                        $bgColor =
                            'bg-blue-200 dark:bg-blue-800 hover:bg-blue-300 dark:hover:bg-blue-700 border border-blue-300 dark:border-blue-600';
                        $excusedCount++;
                        break;
                    case 'sick':
                        $shortStatus = 'S';
                        $bgColor =
                            'hover:bg-gray-100 dark:hover:bg-gray-700 border border-gray-300 dark:border-gray-600';
                        $sickCount++;
                        break;
                    case 'absent':
                        $shortStatus = 'A';
                        $bgColor =
                            'bg-red-200 dark:bg-red-800 hover:bg-red-300 dark:hover:bg-red-700 border border-red-300 dark:border-red-600';
                        $absentCount++;
                        break;
                    default:
                        $shortStatus = '-';
                        $bgColor =
                            'hover:bg-gray-100 dark:hover:bg-gray-700 border border-gray-300 dark:border-gray-600';
                        break;
                }
              @endphp
              @if (!$isPerDayFilter && $attendance && ($attendance['attachment'] || $attendance['note'] || $attendance['coordinates']))
                <td
                  class="{{ $bgColor }} cursor-pointer text-center text-sm font-medium text-gray-900 dark:text-white">
                  <button class="w-full px-1 py-3"
                    wire:click="show('{{ $attendance['note'] }}', '{{ $attendance['attachment'] }}', {{ $attendance['coordinates']['lat'] ?? 'null' }}, {{ $attendance['coordinates']['lng'] ?? 'null' }})"
                    onclick="setLocation({{ $attendance['coordinates']['lat'] ?? 0 }}, {{ $attendance['coordinates']['lng'] ?? 0 }})">
                    {{ $isPerDayFilter ? __($status) : $shortStatus }}
                  </button>
                </td>
              @else
                <td
                  class="{{ $bgColor }} cursor-pointer px-1 py-3 text-center text-sm font-medium text-gray-900 dark:text-white">
                  {{ $isPerDayFilter ? __($status) : $shortStatus }}
                </td>
              @endif
            @endforeach

            {{-- Total --}}
            @if (!$isPerDayFilter)
              @foreach ([$presentCount, $lateCount, $excusedCount, $sickCount, $absentCount] as $statusCount)
                <td
                  class="cursor-pointer border border-gray-300 px-1 py-3 text-center text-sm font-medium text-gray-900 group-hover:bg-gray-100 dark:border-gray-600 dark:text-white dark:group-hover:bg-gray-700">
                  {{ $statusCount }}
                </td>
              @endforeach
            @endif

            {{-- Action --}}
            @if ($isPerDayFilter)
              @php
                $attendance = $employee->attendances->isEmpty() ? null : $employee->attendances->first();
              @endphp
              <td
                class="cursor-pointer text-center text-sm font-medium text-gray-900 group-hover:bg-gray-100 dark:text-white dark:group-hover:bg-gray-700">
                <div class="flex items-center justify-center gap-3">
                  @if ($attendance && ($attendance['attachment'] || $attendance['note'] || $attendance['coordinates']))
                    <x-button type="button"
                      wire:click="show('{{ $attendance['note'] }}', '{{ $attendance['attachment'] }}', {{ $attendance['coordinates']['lat'] ?? 0 }}, {{ $attendance['coordinates']['lng'] ?? 0 }})"
                      onclick="setLocation({{ $attendance['coordinates']['lat'] ?? 0 }}, {{ $attendance['coordinates']['lng'] ?? 0 }})">
                      {{ __('Detail') }}
                    </x-button>
                  @else
                    -
                  @endif
                </div>
              </td>
            @endif
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
  @if ($employees->isEmpty())
    <div class="my-2 text-center text-sm font-medium text-gray-900 dark:text-gray-100">
      Tidak ada data
    </div>
  @endif
  <div class="mt-3">
    {{ $employees->links() }}
  </div>
  <x-modal wire:model="showDetail" onclose="removeMap()">
    <div class="px-6 py-4">
      @if ($currentAttendance)
        <div class="flex flex-col gap-3">
          <div class="flex flex-col gap-3">
            @if ($currentAttendance['attachment'])
              <x-label for="attachment" value="{{ __('Attachment') }}"></x-label>
              <img src="{{ $currentAttendance['attachment'] }}" alt="Attachment"
                class="max-h-64 object-contain md:max-h-96">
            @endif
            @if ($currentAttendance['lat'] && $currentAttendance['lat'])
              <x-label for="map" value="Koordinat Lokasi Absen"></x-label>
              <div class="my-2 h-52 w-full md:h-64" id="map"></div>
            @endif
          </div>
          @if ($currentAttendance['note'])
            <x-label for="note" value="Keterangan"></x-label>
            <x-textarea type="text" id="note" disabled
              value="{{ $currentAttendance['note'] }}"></x-textarea>
          @endif
        </div>
      @endif
    </div>
  </x-modal>
  <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
    integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
  <script>
    let map = null;

    function setLocation(lat, lng) {
      removeMap();
      setTimeout(() => {
        map = L.map('map').setView([Number(lat), Number(lng)], 19);
        L.marker([Number(lat), Number(lng)]).addTo(map);
        L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
          maxZoom: 21,
        }).addTo(map);
      }, 500);
    }

    function removeMap() {
      if (map !== null) map.remove();
      map = null;
    }
  </script>
</div>
