<?php
/**
 * @id
 * @title
 * @class
 * @browse
 * @expText
 * @required
 * @readonly
 */
?>
<div class="input-group">
    <div class="input-group-prepend">
        <span class="input-group-text" id="exp-{{$id}}">{{$title}}</span>
    </div>
    <div class="custom-file">
        <input id="{{$id}}"
               type="file"
               name="{{$id}}"
               class="form-control custom-file-input {{$class}}"
               aria-describedby="exp-{{$id}}"
                {{$required==true?'required':null}}
                {{$readonly==true?'readonly':null}}
        >
        <label class="custom-file-label" for="{{$id}}">{{$browse}}</label>
    </div>
</div>
<small id="exp-{{$id}}" class="form-text text-muted">{{$expText}}</small>


