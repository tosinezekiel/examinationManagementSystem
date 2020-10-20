@extends('layouts.home')
@section('content')
    <body id="app">
        <div class="flex-center position-ref full-height">
            <div class="content">
                <div class="title m-b-md">
                    Laravel
                </div>

                <div class="links">
                    <a href="/questions/create">Get Started</a>
                </div>
            </div>
            
        </div>
    </body>
@endsection
@section('siteScript')
<script>
    $(document).ready(function(){
        alert('ready!');
    });
</script>
@endsection

