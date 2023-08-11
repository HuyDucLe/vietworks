<div class="company-list">
    <div class="row">
        <div class="col-md-2 col-sm-2">
            <div class="company-logo">
            <a href="company-detail.{{$c->id}}"><img src="{{asset('')}}resources/img/{{$c->clogo}}" class="img-responsive" alt="" /></a>
            </div>
        </div>
        <div class="col-md-10 col-sm-10">
            <div class="company-content">
                <input type="hidden" name="user" id="user" value="{{session()->get('uid','')}}">
                <a href="company-detail.{{$c->id}}">
                <h3>{{$c->name}}<span class="
                    @switch($c->position)
                    @case('Thực tập')
                        n1
                        @break
                    @case('Nhân viên')
                        n2
                        @break
                    @case('Quản lý')
                        @break
                    @case('Giám đốc')
                        n3
                        @break
                    @case('Fulltime')
                        n4
                        @break
                    @case('Parttime')
                        n5
                        @break    
                    @case('Freelance')
                        n6
                        @break       
                    @default
                        n7
                    @endswitch
                    ">{{$c->position}}</span>
                </h3></a>
                <span><strong>{{$c->job}}</strong></span>
                <p>
                    <span class="company-name">
                        <i class="fa fa-briefcase"></i>{{$c->cname}}</span>
                    <span class="company-location">
                        <i class="fa fa-map-marker"></i>{{$c->location}}</span>
                    <span class="package">
                        <i class="fa fa-money"></i>VND{{$c->salary_min}}-{{$c->salary_max}}</span>
                    <form action="apply.{{$c->id}}" id="DataForm" name="DataForm" class="form-horizontal" method="POST" enctype="multipart/form-data">
				        @csrf
                        <button type="submit" class="btn btn-primary">Ứng tuyển</button>
                    </form>
                </p>
                
            </div>
        </div>
    </div>
</div>