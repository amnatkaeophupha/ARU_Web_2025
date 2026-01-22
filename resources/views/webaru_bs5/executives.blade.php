@extends('webaru_bs5/layout')
@section('content')

<section class="breadcrumbs-area bg-3 ptb-50 bg-opacity bg-relative">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <div class="breadcrumbs">
                    <h2 class="page-title" style="font-size:30px;">คณะผู้บริหารมหาวิทยาลัยราชภัฏพระนครศรีอยุธยา</h2>
                    <ul>
                        <li><a class="active" href="{{url('/')}}">หน้าแรก</a></li>
                        <li><a>แนะนำมหาวิทยาลัย</a></li>
                        <li>คณะผู้บริหาร</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
{{-- <section class="aru-executives pt-50 pb-50">
    <div class="container">
        @if($execGroups->count())
            <div class="row">
                <div class="col-md-12 text-center">
                    <div class="d-block d-md-none">
                        <select class="form-select w-100"
                                onchange="if (this.value) { window.location = this.value; }">
                            @foreach($execGroups as $group)
                                <option value="{{ route('executives.index', ['group' => $group->id]) }}"
                                    {{ $selectedGroupId === $group->id ? 'selected' : '' }}>
                                    {{ $group->title_th }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="d-none d-md-block">
                        <ul class="list-inline mb-0">
                            @foreach($execGroups as $group)
                                <li class="list-inline-item mb-20">
                                    <a class="btn btn-sm {{ $selectedGroupId === $group->id ? 'btn-primary' : 'btn-outline-primary' }}"
                                       href="{{ route('executives.index', ['group' => $group->id]) }}">
                                        {{ $group->title_th }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        @endif
    </div>
</section> --}}
<section class="aru-executives ptb-80">
    <div class="container">

        @foreach($positions as $pos)
            @php
                $people = $executivesByPosition[$pos->id] ?? collect();
            @endphp

            {{-- ถ้าตำแหน่งนี้ไม่มีคน และคุณไม่อยากให้แสดงหัวข้อ ก็ข้าม --}}
            @if($people->count() === 0)
                @continue
            @endif

            {{-- หัวข้อของตำแหน่ง --}}
            <div class="row">
                <div class="col-md-12">
                    <div class="section-title text-center mb-20 {{ $loop->first ? '' : 'mt-80' }}">
                        <h1 class="webaru-admin-title">{{ $pos->title_th }}</h1>
                        <p>มหาวิทยาลัยราชภัฏพระนครศรีอยุธยา</p>
                        <div class="separator my mtb-15">
                            <i class="icofont icofont-users-alt-5"></i>
                        </div>
                    </div>
                </div>
            </div>

            {{-- รายชื่อผู้บริหารในตำแหน่งนั้น --}}
            <div class="row" style="{{ $people->count() <= 1 ? 'display:flex;justify-content:center;' : '' }}">
                @foreach($people as $p)
                    <div class="col-md-3 col-sm-6 mb-50">
                        <div class="webaru-admin mrg-xs4">
                            <div class="webaru-admin_media">
                                @php
                                    $img = $p->photo
                                        ? asset('storage/'.$p->photo)
                                        : url('webaru_bs5/aru_images/executives_default.png');
                                @endphp

                                <a class="webaru-admin_link" href="#">
                                    <img class="webaru-admin_image img-thumbnail" src="{{ $img }}" alt="{{ $p->name_th }}">
                                </a>

                                <div class="webaru-admin_body">
                                    <h3 class="webaru-admin_name">{{ $p->name_th }}</h3>

                                    {{-- ตำแหน่งย่อย/ข้อความเฉพาะ --}}
                                    <div class="webaru-admin_role" style="font-size: 14px;">
                                        {{ $p->position_text ?: $pos->title_th }}
                                    </div>

                                    @if($p->phone)
                                        <p>โทร. {{ $p->phone }}</p>
                                    @endif

                                    @if($p->email)
                                        <p>{{ $p->email }}</p>
                                    @endif
                                </div>

                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endforeach

    </div>
</section>

@endsection
