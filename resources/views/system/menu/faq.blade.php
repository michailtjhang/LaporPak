@extends('system.layouts.app')

@section('css')
    <style>
        .hidden {
            display: none;
        }
    </style>
@endsection

@section('content')
    <div class="w-full bg-white p-6 rounded-lg shadow mb-6">
        <h2 class="text-3xl font-bold text-pink-600 mb-4">Frequently Asked Questions</h2>

        <!-- Question and Answer Section -->
        <div class="flex flex-col justify-start items-center gap-2.5">
            <!-- Question 1 -->
            <div class="self-stretch py-1 border-b cursor-pointer" onclick="toggleAnswer('answer1')">
                <div class="flex justify-between items-center">
                    <div class="text-black text-base font-medium">Bagaimana cara mendaftar di situs ini?</div>
                    <div class="Chevron w-5 h-5">
                        <svg class="w-5 h-5 text-gray-600" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M7 10l5 5 5-5H7z" />
                        </svg>
                    </div>
                </div>
                <div id="answer1" class="hidden p-2.5 text-gray-600 text-base">Untuk mendaftar di situs ini, Anda perlu
                    mengklik tombol "Daftar" di halaman utama. Isi formulir pendaftaran dengan informasi yang diperlukan,
                    seperti nama, alamat email, dan kata sandi, kemudian klik "Kirim".</div>
            </div>

            <!-- Question 2 -->
            <div class="self-stretch py-1 border-b cursor-pointer" onclick="toggleAnswer('answer2')">
                <div class="flex justify-between items-center">
                    <div class="text-black text-base font-medium">Siapa saja yang bisa melaporkan konten negatif?</div>
                    <div class="Chevron w-5 h-5">
                        <svg class="w-5 h-5 text-gray-600" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M7 10l5 5 5-5H7z" />
                        </svg>
                    </div>
                </div>
                <div id="answer2" class="hidden p-2.5 text-gray-600 text-base">Siapa saja yang memiliki akses internet dan
                    merasa bahwa suatu konten melanggar aturan atau bersifat negatif dapat melaporkannya. Pelaporan bisa
                    dilakukan oleh individu, organisasi, atau institusi.</div>
            </div>

            <!-- Question 3 -->
            <div class="self-stretch py-1 border-b cursor-pointer" onclick="toggleAnswer('answer3')">
                <div class="flex justify-between items-center">
                    <div class="text-black text-base font-medium">Apa saja yang bisa dilaporkan?</div>
                    <div class="Chevron w-5 h-5">
                        <svg class="w-5 h-5 text-gray-600" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M7 10l5 5 5-5H7z" />
                        </svg>
                    </div>
                </div>
                <div id="answer3" class="hidden p-2.5 text-gray-600 text-base">Anda dapat melaporkan berbagai jenis konten
                    negatif seperti konten yang mengandung kekerasan, pornografi, ujaran kebencian, penipuan, atau informasi
                    yang menyesatkan. Pastikan laporan Anda disertai dengan bukti yang mendukung.</div>
            </div>

            <!-- Continue adding questions in the same format -->
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        function toggleAnswer(answerId) {
            const answer = document.getElementById(answerId);
            answer.classList.toggle('hidden');
        }
    </script>
@endsection
