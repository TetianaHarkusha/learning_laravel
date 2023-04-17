@aware(['div', 'span', 'input'])

<div {{$div->attributes}}>
    <span {{$span->attributes}}>{{$slot}}</span>
    <input {{$input->attributes->
    merge(['type' => $type, 'name' => $name, 'id' => $name, 'placeholder' => $placeholder, 
        'value' => $value, $add??'' => ''])}}>
</div>
