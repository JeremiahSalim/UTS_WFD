@extends('layout')

@section('title', 'Pemesanan Lapangan')

@section('content')

<form action="{{ route('book.store') }}" method="POST" class="space-y-4">
    @csrf
    <div>
        <label class="block text-sm font-medium text-gray-700">Name</label>
        <input type="text" name="nama_pemesan" required class="w-full px-4 py-2 border rounded-md shadow-sm">
    </div>
    
    <div>
        <label class="block text-sm font-medium text-gray-700">Whatsapp</label>
        <input type="tel" name="wa_pemesan" required class="w-full px-4 py-2 border rounded-md shadow-sm">
    </div>

    <div>
        <label class="block text-sm font-medium text-gray-700">Tanggal Booking</label>
        <input type="date" name="tanggal" required class="w-full px-4 py-2 border rounded-md shadow-sm">
    </div>
    
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
    
    <div class="flex justify-end space-x-2">
        <button type="reset" class="px-4 py-2 bg-gray-300 rounded-md">Cancel</button>
        <button type="submit" class="px-4 py-2 bg-gray-400 rounded-md">Simpan</button>
    </div>
</form>


@endsection