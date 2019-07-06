<?php
/**
 * @id
 * @title
 * @value
 * @class
 * @expText
 * @cols
 * @rows
 * @maxLength
 * @minLength
 * @required
 * @readonly
 * @labelVisibility boolean
 */
if(!isset($labelVisibility))$labelVisibility = true;
?>
@if( $labelVisibility == true )
<label for="{{$id}}">{{$title}}</label>
@endif
<textarea class="form-control {{$class}}"
          id="{{$id}}"
          name="{{$id}}"
          rows="{{$rows}}"
          cols="{{$cols}}"
          maxlength="{{$maxlength}}"
          minlength="{{$minlength}}"
          {{$required==true?'required':null}}
          {{$readonly==true?'readonly':null}}
>
{{$value}}
</textarea>
<small id="exp-{{$id}}" class="form-text text-muted">{{$expText}}</small>