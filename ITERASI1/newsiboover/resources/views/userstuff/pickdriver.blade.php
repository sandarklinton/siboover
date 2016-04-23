@extends('layouts.newapp')

@section('title', 'Pick Driver')

@section('content')
<?//php dd($tables); ?>
<!-- @foreach($tables as $nama)
            <?php 
                $var = get_object_vars($nama);
                $namanya = (string)$var['username'];
                $rating = $ratingarray[$var['username']];
             ?>
             {{$namanya}}
             {{$rating}}
             @endforeach -->
<nav>
    <div class="nav-wrapper" style="padding-left:10px;">
        <div class="col s12">
            <a href="#!" class="breadcrumb">YOUR BOOKING</a>
            <a href="#!" class="breadcrumb">PICK DRIVER</a>
        </div>
    </div>
</nav>
<div class="row" style="padding-top: 30px;">
    <div class="col s8" style="padding-left: 20px;">
        <table>
            <thead>
                <tr>
                    <th data-field="nama">Nama</th>
                    <th data-field="rating">Rating</th>
                </tr>
            </thead>
            <tbody>

 @foreach($tables as $nama)
            <?php 
                $var = get_object_vars($nama);
                $namanya = (string)$var['username'];
                $rating = $ratingarray[$var['username']];
             ?>
            <tr>
                <td>
                <a class="waves-effect waves-teal btn-flat" style="text-transform:none;" href=" {{ URL::to('/driverdetail' , $nama -> username) }}"><?php echo $nama -> username; ?></a></td>
                <td>{{$ratingarray[$var['username']]}}</td>
                </tr>
            @endforeach

                <tr>
                    <td><a class="waves-effect waves-teal btn-flat" style="text-transform:none;">Nama</a></td>
                    <td>Rating</td>
                </tr>
                <tr>
                    <td><a class="waves-effect waves-teal btn-flat" style="text-transform:none;">Nama</a></td>
                    <td>Rating</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>


@endsection