<div class="col-12 mt-3">
    <div class="list-group">
        <a href="{{ route("get_admin_ad") }}" class="list-group-item list-group-item-action">
            Ads
        </a>
        <a href="{{ route("get_admin_car") }}" class="list-group-item list-group-item-action">
            Cars
        </a>
        <a href="{{ route("get_admin_user") }}" class="list-group-item list-group-item-action">
            Users
        </a>
        <a href="{{ route("get_admin_car_model") }}" class="list-group-item list-group-item-action">
            Models
        </a>
        <a href="{{ route("get_admin_social_media") }}" class="list-group-item list-group-item-action">
            Social Medias
        </a>
        @foreach ($tables as $table)
            <a href="{{ route("get_admin_simple_table", ["table" => $table]) }}" class="list-group-item list-group-item-action">
                {{ ucwords(str_replace("_", " ", $table)) }}
            </a>
        @endforeach
    </div>
</div>