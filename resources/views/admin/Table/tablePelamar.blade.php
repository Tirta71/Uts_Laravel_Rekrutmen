@extends('admin.Table.pelamar') @section('table')
<!-- table 1 -->


{{-- PEMBATAS --}}
<div class="flex flex-wrap -mx-3">
    <div class="flex-none w-full max-w-full px-3">
        <div
            class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-soft-xl rounded-2xl bg-clip-border"
        >
            <div
                class="p-6 pb-0 mb-0 bg-white border-b-0 border-b-solid rounded-t-2xl border-b-transparent"
            >
                <h6>Table Pelamar</h6>
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
                                    Nama Pelamar
                                </th>
                                <th
                                    class="px-6 py-3 pl-2 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70"
                                >
                                    Email
                                </th>
                                <th
                                    class="px-6 py-3 pl-2 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70"
                                >
                                    Posisi
                                </th>
                                <th
                                    class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70"
                                >
                                    Alamat
                                </th>
                                <th
                                    class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70"
                                >
                                    Pengalaman Kerja
                                </th>
                                <th
                                    class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70"
                                >
                                    Riwayat Pendidikan
                                </th>
                                <th
                                    class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70"
                                >
                                    Skill
                                </th>
                                <th
                                    class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70"
                                >
                                  Edit
                                </th>
                          
                         
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($pelamar as $data)
                            <tr>
                                <td
                                    class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent"
                                >
                                    <div class="flex px-2 py-1">
                                        <div>
                                            <!-- Anda bisa menampilkan gambar pelamar di sini jika ada -->
                                        </div>
                                        <div
                                            class="flex flex-col justify-center"
                                        >
                                            <h6
                                                class="mb-0 text-sm leading-normal"
                                            >
                                                {{ $data->Nama }}
                                            </h6>
                                        </div>
                                    </div>
                                </td>
                                <td
                                    class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent"
                                >
                                    <p
                                        class="mb-0 text-xs font-semibold leading-tight"
                                    >
                                        {{ $data->Email }}
                                    </p>
                                </td>
                                <td
                                    class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent"
                                >
                                    <p
                                        class="mb-0 text-xs font-semibold leading-tight"
                                    >
                                        {{ $data->Posisi_Yang_Dilamar }}
                                    </p>
                                </td>
                                <td
                                    class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent"
                                >
                                    <p
                                        class="mb-0 text-xs font-semibold leading-tight"
                                    >
                                        {{ $data->Alamat }}
                                    </p>
                                </td>
                                <td
                                    class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent"
                                >
                                    <p
                                        class="mb-0 text-xs font-semibold leading-tight"
                                    >
                                        {{ $data->Pengalaman_Kerja }}
                                    </p>
                                </td>
                                <td
                                    class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent"
                                >
                                    <p
                                        class="mb-0 text-xs font-semibold leading-tight"
                                    >
                                        {{ $data->Riwayat_Pendidikan }}
                                    </p>
                                </td>
                                <td
                                    class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent"
                                >
                                    <p
                                        class="mb-0 text-xs font-semibold leading-tight"
                                    >
                                        {{ $data->Skill }}
                                    </p>
                                </td>
                                <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                 
                                    <a href="{{ route('editPelamar', ['id' => $data->ID_Pelamar]) }}" class="text-blue-500 hover:text-blue-700 mr-2">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                
                                   
                                    <a href="{{ route('hapusPelamar', ['id' => $data->ID_Pelamar]) }}" class="text-red-500 hover:text-red-700">
                                        <i class="fas fa-trash"></i>
                                    </a>
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

<!-- card 2 -->
@endsection
