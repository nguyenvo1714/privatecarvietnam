@extends('layouts.admin')
@section('content')
    <section class="content">
        <div class="row">
            <div class="col-lg-12 col-xs-12">
                <div class="transfer-header">
                    <!-- <div class="row"> -->
                        <h3 class="from-to unset-height">{{ $transfer->pick_up->name }} <i class="fa fa-long-arrow-right"></i> {{ $transfer->place->name }}</h3>
                        <p class="unset-height"><i class="fa fa-clock-o"></i> Duration: ~ {{ $transfer->duration }}</p>
                        {{ Html::image('/storage/' . $transfer->image_head) }}
                    <!-- </div> -->
                </div>
                <div class="transfer-blog">
                    <h3>{{ $transfer->title }}</h3>
                    {!! preg_replace('/<p>[img]/', '<p class="no-align">[img]', $transfer->blog) !!}
                </div>
            </div>
        </div>
    </section>
@endsection