
  <tr>
    
    <td><?php global $i; echo $i++;?></td>
    <td>{{$item->hoten}}</td>
    <td>
        {{$item->sodienthoai}}
    </td>
    <td>
        <span class="text-danger">{{number_format($item->tongtien,0,',',',')}} đ</span>
    </td>
    <td>
        <span class="{{$item->getStatus($item->trangthai)['class']}}">{{$item->getStatus($item->trangthai)['name']}} </span>
    </td>


    <td>{{date('d/m/Y',strtotime($item->ngaytao))}}</td>


    <td style="text-align:center">
        <a href=" {{route('get_backend.don_hang.view',$item->id)}}"
            class="btn btn-xs btn-primary">Xem</a>


    </td>
</tr>