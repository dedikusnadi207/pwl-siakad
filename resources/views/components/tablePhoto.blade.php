<img
    src="{{ $photo }}"
    alt="user-avatar"
    class="d-block rounded"
    height="50"
    width="50"
    onerror="$(this).attr('src', '{{ asset('template/img/avatars/1.png') }}')"
    style="object-fit: cover"
/>
