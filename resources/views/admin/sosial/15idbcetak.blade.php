<!DOCTYPE html>
<html lang="en">

<head>
    <title>DATA {{ $title }} </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ asset('home/cetak/style.css') }}">

</head>

<body>




    <div class="container">
        <BR>
        <img src="{{ asset('home/images/BIH.png') }}" style="width:10%;margin-right:25px;float:left;">
        <h3 style="font-size: 15px;Margin-top:10px;"><b><strong>{{ $title }}</strong></b></h3>
        <p style="font-size: 13px;Margin-top:-10px;margin-bottom:20px;">BINTAN In Hand Kabupaten Bintan | Per :<b> <?php echo now()->format('d M Y'); ?></b></p>
        <HR><BR>
            

        <table class="table">
            <table class="table">
            <thead style="background: rgb(4, 101, 127);color:aliceblue;">
                <tr style="font-size:12px;">
                    <th style="width: 3%;">
                        <center>NO</center>
                    </th>
                    <th style="width: 10%;">
                        <center>Tahun</center>
                    </th>
                    <th style="width: 20%;">Data Series</th>
                    <th style="width: 20%;"> Presentase</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $k => $item)
                    <tr style="font-size:10px;">
                        <td>
                            <center>{{ $k++ + 1 }}</center>
                        </td>
                        <td><center>{{ $item->tahun }}</center></td>
                        <td><center>{{ Helper::getJenisDataSeries($item->status_data) }}</center></td>  
                        <td><center>{{ $item->daya_beli }}</center></td>

                    </tr>
                @endforeach
            </tbody>
        </table>
       
    </div> 

    <script>
        window.print();
    </script>

</body>

</html>
