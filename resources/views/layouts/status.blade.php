@if ($status == 'active')
    <span class="badge py-3 px-4 fs-7 badge-light-success">active</span>
@endif
@if ($status == 'inactive')
    <span class="badge py-3 px-4 fs-7 badge-light-warning">inactive</span>
@endif
@if ($status == 'archived')
    <span class="badge py-3 px-4 fs-7 badge-light-danger">archived</span>
@endif


