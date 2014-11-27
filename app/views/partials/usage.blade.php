<div id="usage">
	<ul>
		{{--<li>--}}
			{{--<div class="title">Memory</div>--}}
			{{--<div class="bar">--}}
				{{--<div class="progress">--}}
				  	{{--<div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" style="width: 25%"></div>--}}
				{{--</div>--}}
			{{--</div>			--}}
			{{--<div class="desc">2GB of 8GB</div>--}}
			{{--<div class="desc">{{ URL::to('use/ram') }}</div>--}}
		{{--</li>--}}
		{{--<li>--}}
			{{--<div class="title">HDD</div>--}}
			{{--<div class="bar">--}}
				{{--<div class="progress">--}}
				  	{{--<div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 75%"></div>--}}
				{{--</div>--}}
			{{--</div>			--}}
			{{--<div class="desc">750GB of 1TB</div>--}}
		{{--</li>--}}
		{{--<li>--}}
			{{--<div class="title">SSD</div>--}}
			{{--<div class="bar">--}}
				{{--<div class="progress">--}}
			  		{{--<div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100" style="width: 30%"></div>--}}
				{{--</div>--}}
			{{--</div>			--}}
			{{--<div class="desc">300GB of 1TB</div>--}}
		{{--</li>--}}
		{{--<li>--}}
			{{--<div class="title">Bandwidth</div>--}}
			{{--<div class="bar">--}}
				{{--<div class="progress">--}}
			  		{{--<div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%"></div>--}}
				{{--</div>--}}
			{{--</div>			--}}
			{{--<div class="desc">50TB of 50TB</div>--}}
		{{--</li>--}}
		<li>
			<div class="text">Ip của bạn: <b>{{ Request::getClientIp() }}</b> | Logged as <b>{{ Auth::user()->username }} </b> | {{ Request::getLocale() }} | {{ Request::getHost() }}</div>
		</li>
	</ul>	
</div>
