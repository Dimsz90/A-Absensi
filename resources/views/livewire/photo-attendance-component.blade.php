<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
    <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
        @if($successMsg)
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                {{ $successMsg }}
            </div>
        @endif

        <!-- Header Info -->
        <div class="mb-6">
            <!-- Shift Selector -->
            <div class="mb-4">
                <select wire:model="shift_id" class="w-full p-2 border rounded-lg text-gray-700 text-lg">
                    <option value="">Pilih Shift</option>
                    @foreach($shifts as $shift)
                        <option value="{{ $shift->id }}">Shift {{ $shift->id }} | {{ $shift->start_time }} - {{ $shift->end_time }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Date and Location Display -->
            <div class="text-gray-600">
                <p class="text-lg mb-2">Tanggal: {{ now()->format('d/m/Y') }}</p>
                <p class="text-lg mb-2 underline cursor-pointer" id="location-text">
                    Lokasi anda: Mendapatkan lokasi...
                </p>
            </div>
        </div>

        @if(!$attendance || !$attendance->time_out)
            <form wire:submit.prevent="takeAttendance">
                <!-- Camera Section with Scan Frame -->
                <div class="relative mb-6">
                    <video id="camera" class="w-full h-96 bg-black rounded-lg object-cover"></video>
                    <!-- Scan Frame Overlay -->
                    <div class="absolute top-0 left-0 right-0 bottom-0 pointer-events-none">
                        <div class="relative w-full h-full">
                            <!-- Corner frames -->
                            <div class="absolute top-8 left-8 w-16 h-16 border-l-4 border-t-4 border-white"></div>
                            <div class="absolute top-8 right-8 w-16 h-16 border-r-4 border-t-4 border-white"></div>
                            <div class="absolute bottom-8 left-8 w-16 h-16 border-l-4 border-b-4 border-white"></div>
                            <div class="absolute bottom-8 right-8 w-16 h-16 border-r-4 border-b-4 border-white"></div>
                        </div>
                    </div>
                </div>

                <!-- Status Buttons -->
                <div class="grid grid-cols-2 gap-4 mb-6">
                    <div class="bg-blue-100 p-4 rounded-lg">
                        <h3 class="text-lg font-medium text-blue-800">Absen Masuk</h3>
                        <p class="text-blue-600">{{ $attendance ? $attendance->time_in : 'Belum Absen' }}</p>
                    </div>
                    <div class="bg-orange-100 p-4 rounded-lg">
                        <h3 class="text-lg font-medium text-orange-800">Absen Keluar</h3>
                        <p class="text-orange-600">{{ $attendance && $attendance->time_out ? $attendance->time_out : 'Belum Absen' }}</p>
                    </div>
                </div>

                <!-- Location Status -->
                <div class="mb-6 bg-purple-100 p-4 rounded-lg">
                    <h3 class="text-lg font-medium text-purple-800">Koordinat Absen</h3>
                    <p class="text-purple-600" id="coordinates-text">Belum Absen</p>
                </div>

                <!-- Hidden Canvas for Photo Capture -->
                <canvas id="canvas" class="hidden"></canvas>

                <!-- Submit Button -->
                <button type="submit" 
                        id="submit-btn"
                        class="w-full bg-blue-500 hover:bg-blue-600 text-white font-bold py-3 px-4 rounded-lg text-lg"
                        >
                    Ambil Foto & Submit
                </button>
            </form>

            <script>
                let videoStream;
                let coords;

                // Initialize camera with rear camera if available
                async function initCamera() {
                    try {
                        videoStream = await navigator.mediaDevices.getUserMedia({
                            video: {
                                facingMode: 'user', // Use front camera
                                width: { ideal: 1280 },
                                height: { ideal: 720 }
                            }
                        });
                        const video = document.getElementById('camera');
                        video.srcObject = videoStream;
                        video.play();
                    } catch (err) {
                        console.error("Error accessing camera:", err);
                        alert("Tidak dapat mengakses kamera. Pastikan izin kamera diberikan.");
                    }
                }

                // Enhanced location handling
                function getLocation() {
                    if (navigator.geolocation) {
                        navigator.geolocation.watchPosition(
                            (position) => {
                                coords = [position.coords.latitude, position.coords.longitude];
                                document.getElementById('location-text').textContent = 
                                    `Lokasi anda: ${coords[0]}, ${coords[1]}`;
                                document.getElementById('coordinates-text').textContent = 
                                    `${coords[0]}, ${coords[1]}`;
                                @this.set('currentLiveCoords', coords);
                                document.getElementById('submit-btn').disabled = false;
                            },
                            (error) => {
                                handleLocationError(error);
                            },
                            {
                                enableHighAccuracy: true,
                                timeout: 5000,
                                maximumAge: 0
                            }
                        );
                    } else {
                        handleLocationError({ code: 0 });
                    }
                }

                function handleLocationError(error) {
                    let message;
                    switch(error.code) {
                        case error.PERMISSION_DENIED:
                            message = "Izin lokasi ditolak. Mohon izinkan akses lokasi.";
                            break;
                        case error.POSITION_UNAVAILABLE:
                            message = "Informasi lokasi tidak tersedia.";
                            break;
                        case error.TIMEOUT:
                            message = "Waktu mendapatkan lokasi habis.";
                            break;
                        default:
                            message = "Browser tidak mendukung geolokasi.";
                    }
                    document.getElementById('location-text').textContent = message;
                    document.getElementById('coordinates-text').textContent = "Gagal mendapatkan lokasi";
                }

                // Auto-capture photo on submit
                document.getElementById('submit-btn').addEventListener('click', function(e) {
                    const video = document.getElementById('camera');
                    const canvas = document.getElementById('canvas');
                    const context = canvas.getContext('2d');

                    canvas.width = video.videoWidth;
                    canvas.height = video.videoHeight;
                    context.drawImage(video, 0, 0, canvas.width, canvas.height);

                    canvas.toBlob(blob => {
                        const file = new File([blob], "attendance-photo.jpg", { type: "image/jpeg" });
                        @this.upload('photo', file);
                    }, 'image/jpeg', 0.8);
                });

                // Initialize everything when page loads
                document.addEventListener('DOMContentLoaded', () => {
                    initCamera();
                    getLocation();
                });

                // Cleanup
                window.addEventListener('beforeunload', () => {
                    if (videoStream) {
                        videoStream.getTracks().forEach(track => track.stop());
                    }
                });
            </script>
        @else
            <div class="text-center text-lg text-gray-600 p-4">
                Anda sudah melakukan absen masuk dan keluar hari ini.
            </div>
        @endif
    </div>
</div>