<?php
/**
 * @id
 * @title
 * @type
 * @class
 * @placeholder
 * @expText
 * @max
 * @min
 * @maxLength
 * @minLength
 * @value
 * @required
 * @readonly
 */
?>
<label for="{{$id}}">{{$title}}</label>
<input type="{{$type}}"
       class="form-control {{$class}}"
       id="{{$id}}"
       name="{{$id}}"
       aria-describedby="exp-{{$id}}"
       placeholder="{{$placeholder}}"
       max="{{$max}}"
       min="{{$min}}"
       maxlength="{{$maxlength}}"
       minlength="{{$minlength}}"
       value="{{$value}}"
       {{$required==true?'required':null}}
       {{$readonly==true?'readonly':null}}
>
<small id="exp-{{$id}}" class="form-text text-muted">{{$expText}}</small>