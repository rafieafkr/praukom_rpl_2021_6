@extends('layouts.main')

@section('title', 'Data Prakerin - SIMAK')

@section('container')
<div class="flex w-full">
    <div class="flex-warp mr-1">
        <a href="/dashboard"
            class="cursor-pointer rounded-lg bg-slate-100 px-4 py-1 text-[#4c77a9] shadow-[1px_2px_10px_rgba(0,0,1,0.2)] transition hover:bg-slate-200 active:bg-slate-300">Kembali</a>
    </div>
</div>
<div class="overflow-x-auto mx-20 my-10 min-h-screen">
    <table border="1" cellpadding="0" class="table w-full text-center border-collapse bg-white">
        <tr class="text-white border-collapse">
            <td colspan="6" class="bg-[#0A3A58] h-14 sticky w-max-auto">Data Kompetensi Jurusan </td>
        </tr>
        <tr>
            <td class="bg-white text-black">NO</td>
            <td class="bg-white text-black">Nama Kompetensi</td>
            <td class="bg-white text-black">Aksi</td>
        </tr>
        <?php 
        $no = 1;
    ?>
    </table>
    <div class="mt-2">
        <div class="container">
            <form action="{{ url('store-input-fields') }}" method="POST">
                @csrf
                @if ($errors->any())
                <div class="alert alert-danger" role="alert">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                @if (Session::has('success'))
                <div class="alert alert-success text-center">
                    <p>{{ Session::get('success') }}</p>
                </div>
                @endif
                <table class="table table-bordered" id="dynamicAddRemove">
                    <tr>
                        <th>Subject</th>
                        <th>Action</th>
                    </tr>
                    <tr>
                        <td><input type="text" name="addMoreInputFields[0][nama_kompetensi]"
                                placeholder="Masukan Kompetensi" class="form-control" />
                        </td>
                        <td><button type="button" name="add" id="dynamic-ar" class="btn btn-outline-primary">Tambah
                                Input Kompetensi</button></td>
                    </tr>
                </table>
                <button type="submit" class="btn btn-outline-success btn-block">Save</button>
            </form>
        </div>
        <!-- JavaScript -->
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
        <script type="text/javascript">
        var i = 0;
        $("#dynamic-ar").click(function() {
            ++i;
            $("#dynamicAddRemove").append('<tr><td><input type="text" name="addMoreInputFields[' + i +
                '][subject]" placeholder="Enter subject" class="form-control" /></td><td><button type="button" class="btn btn-outline-danger remove-input-field">Delete</button></td></tr>'
            );
        });
        $(document).on('click', '.remove-input-field', function() {
            $(this).parents('tr').remove();
        });
        </script>
    </div>
</div>

@endsection