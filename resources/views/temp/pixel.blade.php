@extends('layouts/temp')

@section('title', '8BitVape')

@section('content')
    <div class="pixel-editor-container">
        <div class="pixel-grid">
        @for ($i = 0; $i < 16; $i++)
            @for ($j = 0; $j < 16; $j++)
                <div class="pixel-element" id="pixel-{{$i}}-{{$j}}"></div>
            @endfor
        @endfor
        </div>
        <div class="toolbox">
            <div class="current-colours">
                <div class="colour-1"></div>
                <div class="colour-2"></div>
            </div>
            <div class="brushes-grid">
                @for ($i = 0; $i < 12; $i++)
                    <div class="brush-element"></div>
                @endfor
            </div>
            <div class="colour-grid">
                @for ($i = 0; $i < 200; $i++)
                    <div class="colour-element"></div>
                @endfor
            </div>
        </div>
    </div>
@endsection
