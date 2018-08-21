@extends('adminamazing::teamplate')

@section('pageTitle', 'Кто хочет попасть в список представителей')
@section('content')
    <div class="row">
        <!-- Column -->
        <div class="col-12">
            <div class="card">
                <div class="card-block">
                    <h4 class="card-title">@yield('pageTitle')</h4>
                    @if(Session::has('success'))
                        <div class="alert alert-success alert-rounded">{{Session::get('success')}}</div>            
                    @endif  
                    <div class="table-responsive">
                        <table class="table table-striped">
	                        <tr>
	                        	<th>ID</th>
	                            <th>Country / Language</th>
	                            <th>Email</th>
		                        <th>Вышестоящий</th>				
	                            <th class="text-center">Contacts</th>
	                            <th>Website</th>
	                            <th class="text-center">Video review</th>
	                            <th class="text-center">Структура</th>
	                            <th class="text-center"></th>
	                        </tr>
	                        @if(count($representives) > 0)
	                            @foreach($representives as $row)
	                                <tr>
	                                    <td>{{$row->id}}</td>
	                                    <td><img src="{{ asset("investing/images/flags/24/$row->country.png") }}" alt="">{{$row->country}}</td>
	                                    <td>
                                            <a href="{{route('AdminUsersEdit', $row->user_id)}}">{{$row->user->email}} ({{$row->name}})</a>
                                        </td>
	                                    <td>
                                            @if($row->user->upline)
                                                <a href="{{route('AdminUsersEdit', $row->user->parent_id)}}">{{$row->user->upline->email}}</a>
                                            @endif
                                        </td>
	                                    <td class="text-center">
	                                        @if($row->link_telegram)
	                                            <a href="{{$row->link_telegram}}" target="_blank" class="media-link"><i class="fa fa-paper-plane"></i> </a>
	                                        @endif
	                                        @if($row->link_facebook)
	                                            <a href="{{$row->link_facebook}}" target="_blank" class="media-link"><i class="fa fa-facebook-official"></i></a>
	                                        @endif
	                                    </td>
	                                    <td>
	                                        @if($row->domain)
	                                            <a target="_blank" href="{{$row->link_site}}">{{$row->domain}}</a>
	                                        @endif
	                                    </td>
	                                    <td class="text-center">
	                                        @if($row->link_youtube)
	                                            <a href="{{$row->link_youtube}}" target="_blank" class="media-link"> <i class="fa fa-youtube-play"></i></a>
	                                        @endif
	                                    </td>
	                                    <td>{{$row->structure}}</td>
	                                    <td class="text-center">
	                                        <a href="{{route('RepresentativesAdminConfirm', $row->id)}}">Подтвердить</a>
	                                    </td>
	                                </tr>
	                            @endforeach
	                        @else
	                            <tr>
	                                <td colspan="7">
	                                    <div class="text-center">- No data for view -</div>
	                                </td>
	                            </tr>
	                        @endif

	                    </table>
                    </div>
                    
                </div>
            </div>
            @if(isset($representives))
                <nav aria-label="Page navigation example" class="m-t-40">
                    {{ $representives->links('vendor.pagination.bootstrap-4') }}
                </nav>
            @endif
        </div>
        <!-- Column -->    
    </div>
@endsection