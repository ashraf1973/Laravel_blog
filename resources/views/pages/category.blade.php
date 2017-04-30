@extends('master')
@section('category')
<h4>Categories</h4>
<?php
foreach ($all_category as $i_category) {
    ?>
    <ul class="templatemo_list">
        <li><a href="index.html"><?php echo $i_category->category_name ?></a></li>
    </ul>
<?php } ?>
@endsection