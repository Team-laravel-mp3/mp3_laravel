@extends('pages.user.layout')
@section('content')
@if(session('thongbao'))
    <div class="alert alert-primary">
        {{ session('thongbao') }}
    </div>
@endif
<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col-md-12">
                <h4><span>{{ $baihatmoi->tenbaihat }}</span></h4><br>
                <p>Lượt xem : {{ $baihatmoi->view }}</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="card-text text-center">
                    <img src="{{ asset('images/images_baihatmoi/'.$baihatmoi->image )}} "class="card-img-top">
                    <audio  controls autoplay>
                        <source src="{{ asset('mp3/mp3_moi/'.$baihatmoi->file) }}" type="audio/mpeg">
                    </audio>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card-text">
                    <p>{{ $baihatmoi->loibaihat }}</p>
                </div>
            </div>
        </div>
    </div>
    <div class="card-body">
        <table class="table  table-hover">
            <tbody>
                <?php $bh = $baihatmoi->id;?>
                     @foreach ($tatcabaihat as $baihat)
                     @if ($bh != $baihat->id)
                        <tr>
                            <td>
                                <a href="{{ URL ::to('user/profile/play-music/'.$baihat->id) }}">
                                    <div class="row">
                                        <div class="col-md-2 col-2">
                                            <img src="{{ asset('images/images_baihatmoi/'.$baihat->image )}} " width="50" height="50" alt="">
                                        </div>
                                        <div class="col-md-6 col-6">
                                           {{ $baihat->tenbaihat }}
                                        </div>
                                    </div>
                                </a>
                            </td>
                        </tr>
                    @endif
                    @endforeach
            </tbody>
        </table>
        {!! $tatcabaihat->render() !!}
    </div>
</div>
<script>
        var vid = document.getElementById("myVideo");

        function playVid() {
          vid.play();
        }

        function pauseVid() {
          vid.pause();
        }
        </script>
@endsection


