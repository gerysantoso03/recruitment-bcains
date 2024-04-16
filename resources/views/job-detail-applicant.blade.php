@extends('layout.user-master')
@section('content')
    {{-- Job Title --}}
    <section>
        <div
            class="font-sans text-3xl sm:text-xl md:text-2xl text-white font-bold px-32 sm:px-10 md:px-24 py-32 sm:py-24 md:py-28 bg-gradient-to-b from-sky-300 to-sky-600">
            <img src="{{ asset('images/logo.png') }}" alt="Logo" class="p-2 ml-8 w-1/6 sm:w-2/6 md:w-2/6">
            <div class="flex flex-col items-left sm:items-start">
                <h1 class="mx-10">{{ $job['position_name'] }}</h1>
                <a class="text-lg sm:text-md md:text-base font-normal mx-10 my-4">{{ $job->department['department_name'] }} •
                    {{ $job->branch['branch_name'] }} • {{ $job['employment_type'] }}</a>
                <a class="text-lg sm:text-md md:text-base font-normal mx-10 my-2">Jakarta, Indonesia</a>
            </div>
        </div>
    </section>

    {{-- Job Details --}}
    <section>
        <div class="flex justify-between font-sans items-start px-32 sm:px-10 md:px-24 py-20 bg-slate-100">

            {{-- Left part --}}
            <div class="w-4/6 sm:w-3/5 border-r border-gray-400 pr-20">
                <h4 class="font-bold text-base sm:text-sm md:text-md mx-10 sm:mx-6 md:mx-8 my-6 mt-10">Qualifications :</h4>
                <p class="font-normal text-md sm:text-xs md:text-sm mx-10 sm:mx-6 md:mx-8">{!! $job['qualifications'] !!}</p>
                <h4 class="font-bold text-base sm:text-sm md:text-md mx-10 sm:mx-6 md:mx-8 my-6 mt-10">About BCA Group</h4>
                <p class="font-normal text-md sm:text-xs md:text-sm mx-10 sm:mx-6 md:mx-8">PT Bank Central Asia Tbk
                    (disingkat BCA) (IDX: BBCA) adalah bank swasta terbesar di Indonesia. Bank ini didirikan pada 21
                    Februari 1957 dan
                    pernah menjadi bagian penting dari Salim Group. Sekarang bank ini dimiliki oleh salah satu grup produsen
                    rokok terbesar keempat di Indonesia, Djarum.</p>
                <h4 class="font-bold text-base sm:text-sm md:text-md mx-10 sm:mx-6 md:mx-8 my-6 mt-10">About BCAinsurance
                </h4>
                <p class="font-normal text-md sm:text-xs md:text-sm  mx-10 sm:mx-6 md:mx-8">PT Asuransi Umum BCA
                    (“BCAinsurance”) adalah Perusahaan atau Perseroan yang bergerak di bidang Asuransi Umum di Indonesia
                    yang sebelumnya bernama
                    PT Central Sejahtera Insurance. Berdasarkan Akta Notaris Nomor 7 tanggal 5 Desember 2013, PT Central
                    Sejahtera Insurance berubah nama menjadi PT Asuransi Umum BCA. Adapun Akta pendirian Perseroan telah
                    mendapatkan pengesahan dari Menteri Hukum dan Hak Asasi Manusia Republik Indonesia melalui keputusannya
                    Nomor AHU-64973.AH.01.02 Tahun 2013. Tanggal penerimaan pemberitahuan perubahan adalah 11 Desember 2013.
                </p>
            </div>

            {{-- Right part --}}
            <div class="flex flex-col items-center w-2/6 sm:w-2/5">
                <h4 class="font-bold text-base sm:text-sm md:text-md mb-4 mx-10 sm:mx-6 md:mx-8 my-6 sm:my-2 md:my-4">Do you
                    interested for this job?</h4>
                <a href="{{ route('applicant.form') }}" target="_blank">
                    <button type="button"
                        class="font-sans text-white w-80 sm:w-52 md:w-64 bg-sky-800 hover:bg-sky-500 focus:ring-2 focus:ring-sky-300 font-md rounded-[4rem] text-base sm:text-sm md:text-md px-5 py-2.5 mx-10 sm:mx-6 md:mx-8 my-6 sm:my-2 md:my-4">I'm
                        Interested</button>
                </a>
            </div>
        </div>
    </section>
@endsection
