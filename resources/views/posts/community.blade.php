<x-app-layout>
<div class="container">
    <h1>Community</h1>
    <div class="row">
        @foreach($communities as $community)
            <div class="col-md-4">
                <div class="card mb-4">
                    <div class="card-body">
                        <h5 class="card-title">{{ $community['name'] }}</h5>
                        <p class="card-text">{{ $community['description'] }}</p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
</x-app-layout>
