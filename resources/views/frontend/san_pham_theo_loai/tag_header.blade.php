

<div class="breadcrumb_container">
				<div class="container-fluid">
					<div class="row">
						<div class="col-12">     
							<nav>
						<ul>
							<li>
								<a href="index.html">Home ></a>
							</li>
                            @if(Request::get('tim_kiem'))
                    <li class="" >{{$loaisanpham->tenloaisanpham}}</li>
                    <li class="" >Kết quả tìm kiếm</li>
                    @else

                    <li class="" >{{$loaisanpham->tenloaisanpham}}</li>
                    @endif
						</ul>
					</nav>
						</div>
					</div> 
				</div>        
			</div>


