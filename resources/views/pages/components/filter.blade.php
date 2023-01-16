@if ($data['description'] || $data['location'])
    <span class="fw-bold bg-warning bg-gradient text-dark ">
        Filter :
        {{ !empty($data['description']) ? $data['description'] : '' }}
        {{ !empty($data['location']) ? ', ' . $data['location'] : '' }}
        {{ !empty($data['full_time']) ? ($data['full_time'] === 'true' ? ', full time' : '') : '' }}
    </span>
@endif
