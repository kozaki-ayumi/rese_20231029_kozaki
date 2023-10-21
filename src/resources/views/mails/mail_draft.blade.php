<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>お知らせメール作成</h1>
    <form action="/mail/send" method="post">
        @csrf
        <input type="hidden" name="manager_email" value="{{$user['email']}}">
         <div class="shop">
        <label>店舗</label>
        <span>:</span>
        <select class="select__shop" name="shop_name">
              @foreach($managements as $management)
               <option value="{{ $management->shop->name }}" >{{ $management->shop->name }}
              @endforeach   
        </select>
    </div>  
        
      
        <label for="title">タイトル</label>
        <input type="text" name="title"  id="title"></br>

<label for="content">本文</label>
        <textarea name="content"  cols="30" rows="3" id="content"></textarea></br>

        <button>送信</button>
    </form>

</body>
</html>