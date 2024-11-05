@php
    $routeName = str_replace(' ', '-', $crud->entity_name) . '-import';

@endphp

<a href="javascript:void(0)" onclick="$('#importFile').click()" class="btn btn-sm btn-primary"><i class="la la-file-excel"></i> Import</a>
<form action="{{ route($routeName) }}" method="POST" enctype="multipart/form-data" style="display: none;">
    @csrf
    <input type="file" name="file" id="importFile" onchange="this.form.submit()">
</form>
