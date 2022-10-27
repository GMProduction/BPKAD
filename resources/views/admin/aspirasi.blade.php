@extends('admin.base')
@section('css')
<!--Regular Datatables CSS-->
<link href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel="stylesheet">
<!--Responsive Extension Datatables CSS-->
<link href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css" rel="stylesheet">

@endsection

@section('content')

<div class="panel h-full">
    <p class="title">Tabel Aspirasi</p>

    <div class="border p-3 rounded-lg">
    <table id="example" class="stripe hover " style="width:100%; padding-top: 1em;  padding-bottom: 1em;">
        <thead>
            <tr>
                <th data-priority="1">Checklist</th>
                <th data-priority="1">Nama</th>
                <th data-priority="2">Email</th>
                <th data-priority="3">Aspirasi</th>
                <th data-priority="4">Gambar</th>
                <th data-priority="5">Action</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="text-center">
                    <input id="default-checkbox" type="checkbox" value="" class="w-5 h-5 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600 m-auto">
                    </td>
                <td>Tiger Nixon</td>
                <td>System@gmail.com</td>
                <td >Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</td>
                <td><img src="{{asset('assets/local/slide.png')}}" class="w-[75px] h-[50px] object-cover"/></td>
                <td><button type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Kirim Email</button></td>
            </tr>
        </tbody>
    </table>
</div>

@endsection

@section('morejs')
    <!-- jQuery -->
	<script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>

	<!--Datatables -->
	<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>

    <script>
		$(document).ready(function() {

			var table = $('#example').DataTable({
					responsive: true
				})
				.columns.adjust()
				.responsive.recalc();
		});
	</script>
@endsection


</body>

</html>
