@extends('admin.admin_master')
@section('admin_content')
<ul class="breadcrumb">
    <li>
        <i class="icon-home"></i>
        <a href="index.html">Home</a>
        <i class="icon-angle-right"></i> 
    </li>
    <li>
        <i class="icon-edit"></i>
        <a href="#">Add Category</a>
    </li>
</ul>
<div class="row-fluid sortable">
    <div class="box span12">
        <div class="box-header" data-original-title>
            <h2><i class="halflings-icon edit"></i><span class="break"></span>Form Elements</h2>
            <div class="box-icon">
                <a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
                <a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
                <a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
            </div>
        </div>
        <h3 style="color:green">
            <?php
            $message = Session::get('message');
            if ($message) {
                echo $message;
                Session::put('message', null);
            }
            ?>
        </h3>
        <?php
        foreach ($all_category_info as $v_category) {
            ?>
            <div class="box-content">
                {!! Form::open(['url' => '/update-category','method'=>'post']) !!}    
                <fieldset>
                    <div class="control-group">
                        <label class="control-label" for="typeahead">Category Name </label>
                        <div class="controls">
                            <input type="text" name="category_name" class="span6 typeahead" id="typeahead" value="<?php echo $v_category->category_name ?>">
                            <input type="hidden" name="category_id" value="<?php echo $v_category->category_id ?>">

                        </div>
                    </div>


                    <div class="control-group hidden-phone">
                        <label class="control-label" for="textarea2">Category Description</label>
                        <div class="controls">
                            <textarea class="cleditor" name="categroy_description" id="textarea2" rows="3">
                                <?php echo $v_category->category_description ?>
                            </textarea>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="typeahead">Publication Status </label>
                        <div class="controls">

                            <select name="publication_status">
                                <option>
                                  
                                <option>Select Publication</option>

                                <option value="1"<?php if ($v_category->publication_status == 1) { echo ' selected="selected"'; }  ?>>Published</option>
                                <option value="0"<?php if ($v_category->publication_status == 0) { echo ' selected="selected"'; }  ?>>Unpublished</option>
                            </select>


                        </div>
                    </div>

                    <div class="form-actions">
                        <button type="submit" class="btn btn-primary">Update</button>
                        <button type="reset" class="btn">Cancel</button>
                    </div>
                </fieldset>
                {!! Form::close() !!} 

            </div>
        </div><!--/span-->
    <?php } ?>

</div><!--/row-->
@endsection