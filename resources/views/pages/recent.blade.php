@extends('master')
@section('recent')
<h4>Recent Blog</h4>
<?php
 $recent_blog=DB::table('tbl_blog')
              ->orderBy('blog_id', 'desc')
              ->where('publication_status',1)
              ->take(2)
              ->get();
?>
<ul class="templatemo_list">
    @foreach($recent_blog as $v_blog)
    <li><a href="{{URL::to('/blog-details/'.$v_blog->blog_id)}}" target="_parent">{{$v_blog->blog_title}}</a></li>
    @endforeach
</ul>
@endsection