        @extends('Cv.master')
        @section('title','experience')
        @section('content')
            <!-- Experience-->
            <section class="resume-section" id="experience">
                <div class="resume-section-content">
                    <h2 class="mb-5">Experience</h2>

                    @foreach ($Experience as $item )
                    <div class="d-flex flex-column flex-md-row justify-content-between mb-5">
                        <div class="flex-grow-1">
                            <h3 class="mb-0">{{$item['title']}}</h3>
                            <div class="subheading mb-3">{{$item['subtitle']}}</div>
                            <p>{{$item['discreption']}}</p>
                        </div>
                        <div class="flex-shrink-0"><span class="text-primary">{{$item['date']}}</span></div>
                    </div>
                    @endforeach
                    {{-- @dump($Experience) --}}
                </div>
            </section>
            @endsection
