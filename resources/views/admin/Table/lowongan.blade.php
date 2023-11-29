@extends('admin.Table.pelamar')

@section('table')

<div class="tambah-data">
    <a href="/tambahLowongan" style="background-color: #ff0080;" class="text-white font-bold py-2 px-4 rounded ">
        Tambah Data
    </a>
</div>


<div class="flex flex-wrap -mx-3 " style="margin-top: 2rem">
    <div class="flex-none w-full max-w-full px-3">
        <div
            class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-soft-xl rounded-2xl bg-clip-border"
        >
            <div
                class="p-6 pb-0 mb-0 bg-white border-b-0 border-b-solid rounded-t-2xl border-b-transparent"
            >
                <h6>Proses Rekrutmen table</h6>
            </div>
            <div class="flex-auto px-0 pt-0 pb-2">
                <div class="p-0 overflow-x-auto">
                    <table
                        class="items-center w-full mb-0 align-top border-gray-200 text-slate-500"
                    >
                        <thead class="align-bottom">
                            <tr>
                                <th
                                    class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70"
                                >
                                    Posisi
                                </th>
                               
                                <th
                                    class="px-6 py-3 pl-2 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70"
                                >
                                    Deskripsi Pekerjaan
                                </th>
                                <th
                                    class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70"
                                >
                                    Kualifikasi
                                </th>
                                <th
                                    class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70"
                                >
                                    Tanggal Buka
                                </th>
                                <th
                                    class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70"
                                >
                                    Tanggal Tutup
                                </th>
                                <th colspan="2"
                                class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70"
                            >
                                Edit Data
                            </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($prosesRekrutmen as $data)
                            <tr>
                                <td
                                    class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent"
                                >
                                    <div class="flex px-2 py-1">
                                        <div></div>
                                        <div
                                            class="flex flex-col justify-center"
                                        >
                                            <h6
                                                class="mb-0 text-sm leading-normal"
                                            >
                                                {{ $data->posisi }}
                                            </h6>
                                            @error('posisi')
                                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                             @enderror
                                        </div>
                                    </div>
                                </td>
                                <td
                                    class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent"
                                >
                                    <div class="flex px-2 py-1">
                                        <div></div>
                                        <div
                                            class="flex flex-col justify-center"
                                        >
                                            <h6
                                                class="mb-0 text-sm leading-normal"
                                            >
                                                {{ $data->deskripsi_pekerjaan }}
                                            </h6>
                                        </div>
                                    </div>
                                </td>
                                <td
                                    class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent"
                                >
                                    <div class="flex px-2 py-1">
                                        <div></div>
                                        <div
                                            class="flex flex-col justify-center"
                                        >
                                            <h6
                                                class="mb-0 text-sm leading-normal"
                                            >
                                                {{ $data->kualifikasi }}
                                            </h6>
                                        </div>
                                    </div>
                                </td>
                                <td
                                    class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent"
                                >
                                    <div class="flex px-2 py-1">
                                        <div></div>
                                        <div
                                            class="flex flex-col justify-center"
                                        >
                                            <h6
                                                class="mb-0 text-sm leading-normal"
                                            >
                                                {{ $data->tanggal_buka }}
                                            </h6>
                                        </div>
                                    </div>
                                </td>
                                <td
                                    class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent"
                                >
                                    <div class="flex px-2 py-1">
                                        <div></div>
                                        <div
                                            class="flex flex-col justify-center"
                                        >
                                            <h6
                                                class="mb-0 text-sm leading-normal"
                                            >
                                                {{ $data->tanggal_tutup }}
                                            </h6>
                                        </div>
                                    </div>
                                </td>

                                <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                    <a href="{{ route('formEditLowongan', ['id' => $data->ID_Lowongan]) }}" class="text-blue-500 hover:text-blue-700 mr-2">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    
                                
                                    
                             
                                    <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                        <form action="{{ route('deleteLowongan', ['id' => $data->ID_Lowongan]) }}" method="post">
                                            @csrf
                                            @method('delete')
                                    
                                            <!-- Tombol Hapus -->
                                            <button type="submit" class="text-red-500 hover:text-red-700">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>

                                </td>
                                
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
