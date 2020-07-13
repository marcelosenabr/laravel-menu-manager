@extends('wmenu::layouts.app')

@section('title', __('Menu Builder Drag and Drop'))

@push('css')
@endpush

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    @lang('Menu Builder Drag and Drop')
                </div>

                <div class="card-body">

                    {!! Menu::render() !!}

                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('js')
    {!! Menu::scripts() !!}
@endpush
