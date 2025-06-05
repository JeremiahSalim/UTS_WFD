@extends('layout')

@section('title', 'Pemesanan Lapangan')

@section('content')

<div>
    <h1 class="font-bold text-xl md:text-3xl py-5">List Pemesanan Lapangan</h1>
</div>

<div class="w-full flex justify-end h-full p-2">
    <a href="{{ route('pesan.show') }}" class="p-2 bg-gray-400 rounded-md border-2 border-black">+ Pemesanan Baru</a>
</div>

<div class="w-full h-full mb-10">
    <form action="{{ route('list.show.detail') }}" method="GET" class="space-y-4">
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-3">
            <div>
                <label class="block text-sm font-medium text-gray-700">Nomor Lapangan</label>
                <select name="nomor_lapangan" id="nomor_lapangan" class="bg-transparent w-full px-4 py-2 border rounded-md shadow-sm">
                    <option class="" value="" disabled selected hidden>-</option>
                    <option class="" value="1">1</option>
                    <option class="" value="2">2</option>
                </select>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">Jam Pemakaian</label>
                <select name="jam_pemakaian" id="jam_pemakaian" class="bg-transparent w-full px-4 py-2 border rounded-md shadow-sm">
                    <option class="" value="" disabled selected hidden>-</option>
                    <option class="" value="09:00">09:00 - 11.00</option>
                    <option class="" value="11:00">11:00 - 13.00</option>
                    <option class="" value="13:00">13:00 - 15.00</option>
                    <option class="" value="15:00">15:00 - 17.00</option>
                    <option class="" value="17:00">17:00 - 19.00</option>
                    <option class="" value="19:00">19:00 - 21.00</option>
                    <option class="" value="21:00">21:00 - 23.00</option>
                </select>
            </div>
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-3">
            <div>
                <label class="block text-sm font-medium text-gray-700">Rentang Awal Tanggal Booking</label>
                <input type="date" name="tanggal_awal" required class="w-full px-4 py-2 border rounded-md shadow-sm" value="all">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">Rentang Akhir Tanggal Booking</label>
                <input type="date" name="tanggal_akhir" required class="w-full px-4 py-2 border rounded-md shadow-sm" value="all">
            </div>

        </div>

        <div class="flex justify-start space-x-2">
            <button type="submit" class="px-4 py-2 bg-gray-400 rounded-md">Tampilkan</button>
        </div>
    </form>
</div>

<div class="overflow-x-auto">
    <table class="w-full">
        <thead>
            <tr>
                <th class="pb-2 px-2">No</th>
                <th class="pb-2 px-2">Nama Pemesan</th>
                <th class="pb-2 px-2">Nomor Whatsapp</th>
                <th class="pb-2 px-2">Tanggal Booking</th>
                <th class="pb-2 px-2">Nomor Lapangan</th>
                <th class="pb-2 px-2">Jam Pemakaian</th>
                <th class="pb-2 px-2">Tindakan</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $index => $pesanan)
            <tr class="text-center">
                <td class="pb-2 px-2">{{ $index + 1 }}</td>
                <td class="pb-2 px-2">{{ $pesanan->nama_pemesan }}</td>
                <td class="pb-2 px-2">{{ $pesanan->wa_pemesan}}</td>
                <td class="pb-2 px-2">{{ $pesanan->tanggal }}</td>
                <td class="pb-2 px-2">{{ $pesanan->jadwal->nomor_lapangan }}</td>
                <td class="pb-2 px-2">{{ $pesanan->jadwal->jam_mulai }} - {{ $pesanan->jadwal->jam_selesai }}</td>
                <td class="pb-2 px-2 flex gap-2 justify-center">
                    <form action="{{ route('book.edit', $pesanan->id) }}" method="GET">
                        @csrf
                        <button type="submit" class="bg-gray-400 px-4 py-1 rounded-md">Edit</button>
                    </form>

                    <form action="{{ route('book.delete', $pesanan->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="px-4 py-1 rounded-md bg-red-500"> Delete </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>


<div class="w-full h-full py-10 flex justify-center items-center ">
    <a href="" class="bg-gray-200 py-2 rounded-xl px-10">Back</a>
</div>

@endsection
