<?php
/**
 * @id
 * @title
 * @multiple
 * @options
 * @expText
 *
 * @selectedValue
 * @labelVisibility boolean
 */
if(!isset($labelVisibility))$labelVisibility = true;
?>
@if( $labelVisibility == true )
<label for="{{$id}}">{{$title}}</label>
@endif
<select {{( isset($multiple) )? 'multiple':null}} class="form-control"
        id="{{$id}}"
        name="{{$id}}"
>
    @foreach($options as $key=>$option)
        <option value="{{$key}}" data-option-value="{{$option}}" @if(isset($selectedValue) && $selectedValue == $key) selected @endif>{{$option}}</option>
    @endforeach
</select>
<small id="exp-{{$id}}" class="form-text text-muted">{{$expText}}</small>