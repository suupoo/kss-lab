<?php
/**
 * @id
 * @title
 * @multiple
 * @options
 * @expText
 */
?>
<label for="{{$id}}">{{$title}}</label>
<select {{( isset($multiple) )? 'multiple':null}} class="form-control"
        id="{{$id}}"
        name="{{$id}}"
>
    @foreach($options as $key=>$option)
        <option value="{{$key}}" data-option-value="{{$option}}">{{$option}}</option>
    @endforeach
</select>
<small id="exp-{{$id}}" class="form-text text-muted">{{$expText}}</small>