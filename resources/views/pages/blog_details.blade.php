@extends('master')
@section('content')
<div class="post_section">

    <div class="post_date">
        30<span>Nov</span>
    </div>
    
    <div class="post_content">

        <h2>{{$blog_info->blog_title }}</h2>

        <strong>Author:</strong>{{$blog_info->author_name }} | <strong>Hit Count:</strong>{{$blog_info->hit_count }} |<strong>Category:</strong> <a href="#">{{$blog_info->category_name}}</a>

        <img src="{{URL::to($blog_info->blog_image)}}" alt="image" width="400"/>
          <?php echo $blog_info->blog_long_description ?>
      
    </div>
    <div class="cleaner"></div>
   
</div>


@endsection